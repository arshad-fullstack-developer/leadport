<?php

/** --------------------------------------------------------------------------------
 * This controller manages all the business logic for tickets
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\TicketForm;
use App\Models\Event;
use App\Models\EventTracking;
use App\Models\Lead;
use Validator;

class TicketController extends Controller {

    public $baseUrl = "https://docportgatewaynew.azurewebsites.net/api/";

    /**
     * Display a listing of tickets
     * @param object CategoryRepository instance of the repository
     * @return blade view | ajax view
     */
    public function index() {

        $response = Http::accept('application/json')->get($this->baseUrl.'HelpDesk');
        $result   = json_decode($response->getBody(), true);

        $tickets  = $result['ticket'] ?? null;
        $page     = $this->pageSettings('tickets');
        
        //show the view
        return view('pages.customtickets.wrapper',compact('page','tickets'));
    }


    public function fetchData($url) {
            $response = Http::accept('application/json')->get($url);
            return json_decode($response->getBody(), true);
    
    }

    /**
     * Show the form for creating a new ticket
     * @return \Illuminate\Http\Response
     */
    public function create() {


             $url = $this->baseUrl."Common/";

            // Batch requests for better performance
            $requests = [
                'transportType'     => $url.'HD_GetTransportType',
                'equipmentType'     => $url.'HD_GetEquipmentType',
                'loadType'          => $url.'HD_GetLoadType',
                'countries'         => $url.'GetCountries',
                'transportChannels' => $url.'GetTransportChannel',
                'carriageType'      => $url.'GetCarriageType?TransportChannelId=1',
                'orderTypes'        => $url.'GetShipmentOrderType',
                'orderStatus'       => $url.'GetShipmentOrderStatus',
                'incoterms'         => $url.'GetIncoTerms',
                ];
            
            // Batch processing of requests
            $responses = [];
            foreach ($requests as $key => $requestUrl) {
                $responses[$key] = $this->fetchData($requestUrl);
            }
            
            $page               = $this->pageSettings('create');
            $transportType      = $responses['transportType']['common'] ?? null;
            $equipmentType      = $responses['equipmentType']['common'] ?? null;
            $loadType           = $responses['loadType']['common'] ?? null;
            $countries          = $responses['countries']['country'] ?? null;
            $transportChannels  = $responses['transportChannels']['common'] ?? null;
            $carriageType       = $responses['carriageType']['common'] ?? null;
            $orderTypes         = $responses['orderTypes']['common'] ?? null;
            $orderStatus        = $responses['orderStatus']['common'] ?? null;
            $incoterms          = $responses['incoterms']['common'] ?? null;




        //show the view
        return view('pages.customtickets.components.create.wrapper',compact('page','transportType','equipmentType','loadType','countries','transportChannels','carriageType','orderTypes','orderStatus','incoterms'));
    }


    /**
     * Generate a new link for ticket form
     * @return \Illuminate\Http\Response
     */

    public function generateLink(Request $request)
    {
        // Generate a unique ID
        $uniqueId = 'formID' . bin2hex(random_bytes(10)); // More secure unique ID
        $expiryDate = now()->addDays(7); // Optional expiry date

        // Store the unique ID in the database
        $form = new TicketForm();
        $form->share_id = $uniqueId;
        $form->expiry_date = $expiryDate; // Optional
        $form->save();

        // Return the generated link
        $appURL = url('/ctickets/form');
        return response()->json(['link' => "{$appURL}?share_id={$uniqueId}"]);
    }


    /**
     * Show the form for creating a new ticket for client side
     * @return \Illuminate\Http\Response
     */
    public function ticketForm(Request $request)
    {

        $shareId = $request->query('share_id');

        // Validate the share_id
        $form = TicketForm::where('share_id', $shareId)
                    ->where('expiry_date', '>', now()) // Check if not expired
                    ->first();
        if (!$form) {
            return view('errors.404'); // Or redirect to an error page
        }

        $url = $this->baseUrl."Common/";

        // Batch requests for better performance
        $requests = [
            'countries'         => $url.'GetCountries',
            'loadType'          => $url.'HD_GetLoadType',
            'carriageType'      => $url.'GetCarriageType?TransportChannelId=1',
            'incoterms'         => $url.'GetIncoTerms',
            'ticket'            => $this->baseUrl.'HelpDesk/GetTicketByUniqueId?UniqueId='.$shareId,
        ];
        
        // Batch processing of requests
        $responses = [];
        foreach ($requests as $key => $requestUrl) {
            $responses[$key] = $this->fetchData($requestUrl);
        }
        
        $page               = $this->pageSettings('form');
        $countries          = $responses['countries']['country'] ?? null;
        $loadType           = $responses['loadType']['common'] ?? null;
        $carriageType       = $responses['carriageType']['common'] ?? null;
        $incoterms          = $responses['incoterms']['common'] ?? null;
        $ticket             = $responses['ticket'] ?? null;

        if($ticket ==  __('lang.no_data_found_for_the_given_uniqueId')){
            $ticket = null;
        }
        //show the view
        return view('pages.customtickets.components.request.page',compact('page','countries','loadType','carriageType','incoterms','ticket'));
    }


    /**
     * Store a newly created ticket  in storage.
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        //dd($request->all());
        unset($request['visibility_left_menu_toggle_button']);
        unset($request['system_language']);
        unset($request['user_has_due_reminder']);
        unset($request['resource_query']);
        unset($request['system_languages']);
        unset($request['projects_menu_list']);    
        
        $TicketDetails = [];    
        if(isset($request->goods) && count($request->goods) > 0){

                foreach($request->goods as $good){
                        $TicketDetails[] = $good;
                }
        }

        //dd($request->pickupRemarks);
        $cmrparam = array(
            "cmrparam"=> array(
                'uniqueId'                  => $request->uniqueId ?? '',
                "ShipmentOrderStatusId"     => $request->ShipmentOrderStatusId,
                "TransportChannelId"        => $request->TransportChannelId,
                "LoadTypeId"                => $request->LoadTypeId,
                "Notes"                     => $request->Notes,
                "UNCode"                    => $request->UNCode,
                "ShipmentOrderTypeId"       => $request->ShipmentOrderTypeId,
                "Quantity"                  => $request->Quantity,
                "PickupDate"                => $request->PickupDate,
                "PickupTime"                => $request->PickupTime,
                "Shipper"                   => $request->Shipper,
                "ShipperCity"               => $request->ShipperCity,
                "ShipperIndex"              => $request->ShipperIndex,
                "ShipperAddress"            => $request->ShipperAddress,
                "ShipperCountryId"          => $request->ShipperCountryId,
                "DeliveryDate"              => $request->DeliveryDate,
                "DeliveryTime"              => $request->DeliveryTime,
                "ConsigneeCountryId"        => $request->ConsigneeCountryId,
                "ConsigneeCity"             => $request->ConsigneeCity,
                "ConsigneeIndex"            => $request->ConsigneeIndex,
                "ConsigneeAddress"          => $request->ConsigneeAddress,
                "Consignee"                 => $request->Consignee,
                "IsDifferentPickup"         => ($request->IsDifferentPickup == 'on') ? true : false,
                "AltPickupCountryId"        => $request->AltPickupCountryId,
                "AltPickupCity"             => $request->AltPickupCity,
                "AltPickupIndex"            => $request->AltPickupIndex,
                "AltPickupAddress"          => $request->AltPickupAddress,
                "AltShipper"                => $request->AltShipper,
                "IsDifferentDelivery"       => ($request->IsDifferentDelivery == 'on') ? true : false,
                "AltDeliveryCountryId"      => $request->AltDeliveryCountryId,
                "AltDeliveryCity"           => $request->AltDeliveryCity,
                "AltDeliveryIndex"          => $request->AltDeliveryIndex,
                "AltDeliveryAddress"        => $request->AltDeliveryAddress,
                "AltDelivery"               => $request->AltDelivery,
                "IsTempSensitive"           => true,
                "TempValue"                 => $request->TempValue,
                "ADRValue"                  => $request->ADRValue,
                "FragileValue"              => $request->FragileValue,
                "IncotermsId"               => $request->IncotermsId,
                "ChargeableWeightTotal"     => $request->ChargeableWeightTotal,
                "orgion"                    => json_decode($request->origin, true),
                "destination"               => json_decode($request->destination, true),
                'pickupRemarks'             => $request->pickupRemarks,
                'deliveryRemarks'           => $request->deliveryRemarks,
                'goods'                     => $TicketDetails,

        )); 
        
           
          $data  = json_encode($cmrparam,true);
         // dd($data);
          $response = Http::withBody(
          $data,'application/json')->post($this->baseUrl.'/HelpDesk');

         if($response->getStatusCode() == 201){    

            $data = [
                'event_creatorid' => auth()->id() ?? 1,
                'event_item' => 'custom-ticket',
                'event_item_id' => 0,
                'event_item_lang' => 'event_closed_ticket',
                'event_item_content'  => $request->Shipper,
                'event_item_content2' => $request->Consignee,
                'event_parent_type' => 'ticket',
                'event_parent_id' => 0,
                'event_show_item' => 'yes',
                'event_show_in_timeline' => 'yes',
                'eventresource_type' => 'project',
                'event_notification_category' => 'notifications_tickets_activity',
            ];

            //record event
            if ($event_id = Event::create($data)) {
                
                $eventtracking = new EventTracking;
                $eventtracking->eventtracking_eventid = $event_id->event_id;
                $eventtracking->eventtracking_userid  = $event_id->event_creatorid ?? 1;
                $eventtracking->eventtracking_source  = 'ticket';
                $eventtracking->eventtracking_source_id = 0;
                $eventtracking->parent_type = 'ticket';
                $eventtracking->parent_id = 0;
                $eventtracking->resource_type = 'project';
                $eventtracking->resource_id = 0;
                $eventtracking->save();
                return response()->json(array(
                    'notification' => [
                        'type' => 'success',
                        'value' => __('lang.request_has_been_completed'),
                    ],
                    'skip_dom_reset' => true,
                ));
            }
            
        }else{
            return response()->json(array(
                'notification' => [
                    'type' => 'error',
                    'value' => __('lang.error_request_could_not_be_completed'),
                ],
                'skip_dom_reset' => true,
            ));
        }

    }

    /**
     * Display the specified ticket
     * @param object TicketReplyRepository instance of the repository
     * @param int $id ticket  id
     * @return \Illuminate\Http\Response
     */

    public function view($id){

        // Batch requests for better performance
        $requests = [
            'transportType'     => $this->baseUrl.'Common/HD_GetTransportType',
            'equipmentType'     => $this->baseUrl.'Common/HD_GetEquipmentType',
            'loadType'          => $this->baseUrl.'Common/HD_GetLoadType',
            'countries'         => $this->baseUrl.'Common/GetCountries',
            'transportChannels' => $this->baseUrl.'Common/GetTransportChannel',
            'carriageType'      => $this->baseUrl.'Common/GetCarriageType?TransportChannelId=1',
            'orderTypes'        => $this->baseUrl.'Common/GetShipmentOrderType',
            'orderStatus'       => $this->baseUrl.'Common/GetShipmentOrderStatus',
            'incoterms'         => $this->baseUrl.'Common/GetIncoTerms',
            'ticket'            => $this->baseUrl.'HelpDesk/'.$id,
            ];
        
        
        // Batch processing of requests
        $responses = [];
        foreach ($requests as $key => $requestUrl) {
            $responses[$key] = $this->fetchData($requestUrl);
        }
        
        // Accessing individual responses
        $transportType      = $responses['transportType']['common'] ?? null;
        $equipmentType      = $responses['equipmentType']['common'] ?? null;
        $loadType           = $responses['loadType']['common'] ?? null;
        $countries          = $responses['countries']['country'] ?? null;
        $transportChannels  = $responses['transportChannels']['common'] ?? null;
        $carriageType       = $responses['carriageType']['common'] ?? null;
        $orderTypes         = $responses['orderTypes']['common'] ?? null;
        $orderStatus        = $responses['orderStatus']['common'] ?? null;
        $incoterms          = $responses['incoterms']['common'] ?? null;

        $ticket = $responses['ticket'];
        $lead   = Lead::where('ticket_id',$id)->first();

        if (!$ticket) {
            abort(409, __('lang.ticket_not_found'));
        }

        if (isset($lead)) {
            $ticket['is_lead_convarted'] = true;
        }

        $ticket['viewmode'] = true;
        $page = $this->pageSettings('tickets');
        $ticket = $ticket;
        $transportType     = $transportType;
        $equipmentType     = $equipmentType;
        $loadType          = $loadType;
        $countries         = $countries;
        $transportChannels = $transportChannels;
        $carriageType      = $carriageType;
        $orderTypes        = $orderTypes;
        $orderStatus       = $orderStatus;
        $incoterms         = $incoterms;

        //dd($ticket);
    //response
    return view('pages.customticket.wrapper',compact('page','ticket','transportType','equipmentType','loadType','countries','transportChannels','carriageType','orderTypes','orderStatus','incoterms'));
    
  }

    /**
     * Display the specified ticket
     * @param object TicketReplyRepository instance of the repository
     * @param int $id ticket  id
     * @return \Illuminate\Http\Response
     */
    public function show(TicketReplyRepository $replyrepo, $id) {

        //get the ticket
        if (!$tickets = $this->ticketrepo->search($id)) {
            abort(409, __('lang.ticket_not_found'));
        }

        //ticket
        $ticket = $tickets->first();

        //get replies
        $replies = $replyrepo->search(['ticket_id' => $id]);

        //page settings
        $page = $this->pageSettings('ticket', $ticket);

        //mark all project events as read
        \App\Models\EventTracking::where('parent_id', $id)
            ->where('parent_type', 'ticket')
            ->where('eventtracking_userid', auth()->id())
            ->update(['eventtracking_status' => 'read']);

        //reponse payload
        $payload = [
            'page' => $page,
            'ticket' => $ticket,
            'replies' => $replies,
            'fields' => $this->getCustomFields(),
        ];

        //process reponse
        return new ShowResponse($payload);
    }

    /**
     * Show the form for editing the specified ticket
     * @param object CategoryRepository instance of the repository
     * @param int $id ticket id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {


            // Batch requests for better performance
            $requests = [
                'transportType'     => $this->baseUrl.'Common/HD_GetTransportType',
                'equipmentType'     => $this->baseUrl.'Common/HD_GetEquipmentType',
                'loadType'          => $this->baseUrl.'Common/HD_GetLoadType',
                'countries'         => $this->baseUrl.'Common/GetCountries',
                'transportChannels' => $this->baseUrl.'Common/GetTransportChannel',
                'carriageType'      => $this->baseUrl.'Common/GetCarriageType?TransportChannelId=1',
                'orderTypes'        => $this->baseUrl.'Common/GetShipmentOrderType',
                'orderStatus'       => $this->baseUrl.'Common/GetShipmentOrderStatus',
                'incoterms'         => $this->baseUrl.'Common/GetIncoTerms',
                'ticket'            => $this->baseUrl.'HelpDesk/'.$id,
                ];
            
            
            // Batch processing of requests
            $responses = [];
            foreach ($requests as $key => $requestUrl) {
                $responses[$key] = $this->fetchData($requestUrl);
            }
            
            // Accessing individual responses
            $transportType      = $responses['transportType']['common'] ?? null;
            $equipmentType      = $responses['equipmentType']['common'] ?? null;
            $loadType           = $responses['loadType']['common'] ?? null;
            $countries          = $responses['countries']['country'] ?? null;
            $transportChannels  = $responses['transportChannels']['common'] ?? null;
            $carriageType       = $responses['carriageType']['common'] ?? null;
            $orderTypes         = $responses['orderTypes']['common'] ?? null;
            $orderStatus        = $responses['orderStatus']['common'] ?? null;
            $incoterms          = $responses['incoterms']['common'] ?? null;

            $ticket = $responses['ticket'];
            $lead   = Lead::where('ticket_id',$id)->first();

            if (!$ticket) {
                abort(409, __('lang.ticket_not_found'));
            }

            if (isset($lead)) {
                $ticket['is_lead_convarted'] = true;
            }

 
            $page = $this->pageSettings('tickets');
            $ticket = $ticket;
            $transportType     = $transportType;
            $equipmentType     = $equipmentType;
            $loadType          = $loadType;
            $countries         = $countries;
            $transportChannels = $transportChannels;
            $carriageType      = $carriageType;
            $orderTypes        = $orderTypes;
            $orderStatus       = $orderStatus;
            $incoterms         = $incoterms;
    
            //dd($ticket);
        //response
        return view('pages.customticket.wrapper',compact('page','ticket','transportType','equipmentType','loadType','countries','transportChannels','carriageType','orderTypes','orderStatus','incoterms'));
    }

    
    public function convartToLead(Request $request,$id)
    {       

            $lead = Lead::where('ticket_id',$id)->first();

            if(isset($lead)) {
                abort(409, __('lang.already_ticket_convart_lead'));
            }

            $baseUrl = env('APP_URL');
            //dd($request->all());
            $leadTitle = $request->ShipperCountry.'-'.$request->ConsigneeCountry."($request->PickupDate - $request->DeliveryDate)";
            $leadDescription ="
            <a href='$baseUrl/ctickets/$id/edit' }}'>Ticket ID : $id</a><br>
            <p><strong>General Information</strong></p>
            <p>$request->OrderType, $request->Incoterms, $request->LoadType, $request->Quantity</p>
            <p>$request->Shipper</p>
            <p><strong>Pickup:</strong></p>
            <p>$request->ShipperCity, &nbsp;   $request->ShipperCountry, &nbsp; $request->ShipperAddress, &nbsp; $request->ShipperIndex</p>
            <p><strong>Delivery:</strong></p>
            <p>$request->ConsigneeCity, &nbsp; $request->ConsigneeCountry, &nbsp;  $request->ConsigneeAddress, &nbsp; $request->ConsigneeIndex</p>
            <p><strong>Goods:</strong></p>
            <p>$request->total_qty, &nbsp; $request->total_kgcalc, &nbsp;  $request->total_ldm, &nbsp;  $request->total_volume</p>
            <p><strong>Additional Information:</strong></p>
            <p>$request->IsTempSensitive, &nbsp; $request->TempValue, &nbsp;  $request->ADRValue, &nbsp;  $request->UNCode, &nbsp;  $request->FragileValue,  &nbsp;  $request->Notes</p>
            ";

            $lead = new Lead;
            $lead->ticket_id  = $id;
            $lead->lead_title = $leadTitle;
            $lead->lead_description = $leadDescription;
        
            if($lead->save() && isset($lead->lead_id)){

                $data = [
                    'event_creatorid' => auth()->id() ?? 1,
                    'event_item' => 'lead',
                    'event_item_id' => $lead->lead_id.'/'.$leadTitle,
                    'event_item_lang' => 'event_closed_leads',
                    'event_item_content'  => $request->Shipper,
                    'event_item_content2' => $request->Consignee,
                    'event_parent_type' => 'leads',
                    'event_parent_id' => $lead->lead_id,
                    'event_show_item' => 'yes',
                    'event_show_in_timeline' => 'yes',
                    'eventresource_type' => 'project',
                    'event_notification_category' => 'notifications_leads_activity',
                ];
    
                //record event
                if ($event_id = Event::create($data)) {
                    
                    $eventtracking = new EventTracking;
                    $eventtracking->eventtracking_eventid = $event_id->event_id;
                    $eventtracking->eventtracking_userid  = $event_id->event_creatorid ?? 1;
                    $eventtracking->eventtracking_source  = 'leads';
                    $eventtracking->eventtracking_source_id = 0;
                    $eventtracking->parent_type = 'leads';
                    $eventtracking->parent_id = $lead->lead_id;
                    $eventtracking->resource_type = 'project';
                    $eventtracking->resource_id = $lead->lead_id;
                    $eventtracking->save();
                    return response()->json(array(
                        'notification' => [
                            'type' => 'success',
                            'value' => __('lang.request_has_been_completed'),
                        ],
                        'skip_dom_reset' => true,
                    ));
                }
            }


    }

    public function updateTicketDetails(Request $request, $id){
          

        //dd($request->all());
        $TicketDetails = [];   

        if(isset($request->goods) && count($request->goods) > 0){

                foreach($request->goods as $good){
                        $TicketDetails[] = $good;
                }

        }
        

        $cmrparam = array(
            "cmrparam"=> array(
                "Id"                        => $id,    
                'uniqueId'                  => $request->uniqueId ?? '',
                "ShipmentOrderStatusId"     => $request->ShipmentOrderStatusId,
                "TransportChannelId"        => $request->TransportChannelId,
                "LoadTypeId"                => $request->LoadTypeId,
                "Notes"                     => $request->Notes,
                "UNCode"                    => $request->UNCode,
                "ShipmentOrderTypeId"       => $request->ShipmentOrderTypeId,
                "Quantity"                  => $request->Quantity,
                "PickupDate"                => $request->PickupDate,
                "PickupTime"                => $request->PickupTime,
                "Shipper"                   => $request->Shipper,
                "ShipperCity"               => $request->ShipperCity,
                "ShipperIndex"              => $request->ShipperIndex,
                "ShipperAddress"            => $request->ShipperAddress,
                "ShipperCountryId"          => $request->ShipperCountryId,
                "DeliveryDate"              => $request->DeliveryDate,
                "DeliveryTime"              => $request->DeliveryTime,
                "ConsigneeCountryId"        => $request->ConsigneeCountryId,
                "ConsigneeCity"             => $request->ConsigneeCity,
                "ConsigneeIndex"            => $request->ConsigneeIndex,
                "ConsigneeAddress"          => $request->ConsigneeAddress,
                "Consignee"                 => $request->Consignee,
                "IsDifferentPickup"         => ($request->IsDifferentPickup == 'on') ? true : false,
                "AltPickupCountryId"        => $request->AltPickupCountryId,
                "AltPickupCity"             => $request->AltPickupCity,
                "AltPickupIndex"            => $request->AltPickupIndex,
                "AltPickupAddress"          => $request->AltPickupAddress,
                "AltShipper"                => $request->AltShipper,
                "IsDifferentDelivery"       => ($request->IsDifferentDelivery == 'on') ? true : false,
                "AltDeliveryCountryId"      => $request->AltDeliveryCountryId,
                "AltDeliveryCity"           => $request->AltDeliveryCity,
                "AltDeliveryIndex"          => $request->AltDeliveryIndex,
                "AltDeliveryAddress"        => $request->AltDeliveryAddress,
                "AltDelivery"               => $request->AltDelivery,
                "IsTempSensitive"           => true,
                "TempValue"                 => $request->TempValue,
                "ADRValue"                  => $request->ADRValue,
                "FragileValue"              => $request->FragileValue,
                "IncotermsId"               => $request->IncotermsId,
                "ChargeableWeightTotal"     => $request->ChargeableWeightTotal,
                "orgion"                    => json_decode($request->origin, true),
                "destination"               => json_decode($request->destination, true),
                'pickupRemarks'             => $request->pickupRemarks,
                'deliveryRemarks'           => $request->deliveryRemarks,
                'goods'                     => $TicketDetails,

        ));
           
          $data  = json_encode($cmrparam,true);
          //dd($data);
          $response = Http::withBody(
          $data,'application/json')->put($this->baseUrl.'HelpDesk');

          
        if($response->getStatusCode() == 200){
            
            return response()->json(array(
                'notification' => [
                    'type' => 'success',
                    'value' => __('lang.request_has_been_completed'),
                ],
                'skip_dom_reset' => true,
            ));
        }else{
            return response()->json(array(
                'notification' => [
                    'type' => 'error',
                    'value' => __('lang.error_request_could_not_be_completed'),
                ],
                'skip_dom_reset' => true,
            ));
        }
         

}


    public function destroyTicket($id)
    {
        //dd($id);
        $url = "https://livesoftdocportgateway.azurewebsites.net/api/HelpDesk/$id";
        $response = Http::delete($url);

        if($response->getStatusCode() == 200){
            
            return response()->json(array(
                'notification' => [
                    'type' => 'success',
                    'value' => __('lang.request_has_been_completed'),
                ],
                'skip_dom_reset' => true,
            ));
        }else{
            return response()->json(array(
                'notification' => [
                    'type' => 'error',
                    'value' => __('lang.error_request_could_not_be_completed'),
                ],
                'skip_dom_reset' => true,
            ));
        }

    }


    /**
     * basic page setting for this section of the app
     * @param string $section page section (optional)
     * @param array $data any other data (optional)
     * @return array
     */
    private function pageSettings($section = '', $data = []) {

        //common settings
        $page = [
            'crumbs' => [
                __('lang.tickets'),
            ],
            'crumbs_special_class' => 'list-pages-crumbs',
            'page' => 'tickets',
            'no_results_message' => __('lang.no_results_found'),
            'mainmenu_ctickets' => 'active',
            'sidepanel_id' => 'sidepanel-filter-tickets',
            'dynamic_search_url' => url('tickets/search?action=search&ticketresource_id=' . request('ticketresource_id') . '&ticketresource_type=' . request('ticketresource_type')),
            'load_more_button_route' => 'tickets',
            'source' => 'list',
            'crumbs_col_size' => 'col-lg-5',
        ];

        //default modal settings (modify for sepecif sections)
        $page += [
            'add_button_link_url' => url('tickets/create'),
        ];

        //tickets list page
        if ($section == 'tickets') {
            $page += [
                'meta_title' => __('lang.tickets'),
                'heading' => __('lang.tickets'),
                'mainmenu_ctickets' => 'active',
            ];
            if (request('source') == 'ext') {
                $page += [
                    'list_page_actions_size' => 'col-lg-12',
                ];
            }
            return $page;
        }

        //tickets list page
        if ($section == 'create') {
            $page['crumbs'] = [
                __('lang.tickets'),
                __('lang.create_new_ticket'),
            ];
            $page += [
                'meta_title' => __('lang.open_support_ticket'),
                'heading' => __('lang.tickets'),
                'mainmenu_ctickets' => 'active',
            ];
            return $page;
        }

         //tickets form for client
        if ($section == 'form') {
            $page += [
                'page_title' => __('lang.create_new_ticket'),
                'meta_title' => __('lang.open_support_ticket'),
                'heading' => __('lang.tickets'),
                'mainmenu_ctickets' => 'active',
            ];
            return $page;
        }

        //ticket page
        if ($section == 'ticket') {
            $page['crumbs'] = [
                __('lang.support_tickets'),
                __('lang.id') . ' #' . $data->ticket_id,
            ];
            $page['page'] = 'ticket';
            $page['heading'] = $data->ticket_subject;
            $page['crumbs_col_size'] = 'col-lg-9';
            return $page;
        }

        //return
        return $page;
    }

}