<form class="w-100 ticket-compose" method="post" id="ticket-compose" data-user-type="{{ auth()->user()->type }}">

        <div class="form-header d-flex mb-4">
           @if(isset($orderStatus)) 
            @foreach($orderStatus as $status)
            <span class="stepIndicator">{{ $status['Name'] }}</span>
            @endforeach
           @endif  
        </div>

          <div class="btn-group" role="group" aria-label="Basic example">
             @if(isset($transportChannels)) 
              @foreach($transportChannels as $tchannel)
                <button type="button" class="btn btn-outline-success {{ ($tchannel['ID'] ==  $ticket['TransportChannelId']) ? 'active' : '' }}" onclick="selectChannel({{ $tchannel['ID'] }})"><i class="ti-sea"></i>{{ $tchannel['Name'] }}</button>
              @endforeach
            @endif
            <input type="hidden" id="TransportChannelId" name="TransportChannelId">
          </div>
          <!-- form row one -->
            <div class="row mt-3">
                <div class="col-sm-6 col-lg-6 row_1">
                    <h5><i class="bi bi-exclamation-circle-fill"></i>General Information</h5>

                    <div class="row mt-3" >
                        <div class="col">
                            <label for="id" class="form-label fw-bold">Id</label>
                          <input type="text" class="form-control" placeholder="Id" aria-label="id" disabled value="{{ $ticket['Id'] }}">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState " class="form-label fw-bold">Status</label>
                            @if(isset($orderStatus)) 
                            <select id="ShipmentOrderStatusId" class="form-control" name="ShipmentOrderStatusId" onchange="changeStatus('ShipmentOrderStatusId')">
                               @foreach($orderStatus as $status)
                              <option value="{{ $status['ID'] }}" {{ runtimePreselected($status['ID'] ?? '', $ticket['ShipmentOrderStatusId']) }}>{{ $status['Name'] }}</option>
                               @endforeach
                            </select>
                            @endif
                          </div>
                        <div class="col">
                            <label for="inputState" class="form-label fw-bold">Type</label>
                            @if(isset($carriageType)) 
                            <select id="inputState" class="form-control" name="CarriageTypeId">
                              @foreach($carriageType as $carriage)
                              <option value="{{ $carriage['ID'] }}">{{ $carriage['Name'] }}</option>
                              @endforeach
                            </select>
                            @endif
                          </div>
                      </div>
                      <div class="row mt-3" >
                        <div class="col-sm-6">
                            <label for="inputState " class="form-label fw-bold">Order Type</label>
                            @if(isset($orderTypes)) 
                            <select id="inputState" class="form-control" name="ShipmentOrderTypeId">
                              @foreach($orderTypes as $type)
                              <option value="{{ $type['ID'] }}" {{ runtimePreselected($type['ID'] ?? '', $ticket['ShipmentOrderTypeId']) }}>{{ $type['Name'] }}</option>
                              @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <label for="inputState" class="form-label fw-bold">Incoterms</label>
                              @if(isset($incoterms)) 
                              <select id="inputState" class="form-control" name="IncotermsId">
                                @foreach($incoterms as $term)
                                <option value="{{ $term['ID'] }}" {{ runtimePreselected($term['ID'] ?? '', $ticket['IncotermsId']) }}>{{ $term['Name'] }}</option>
                                @endforeach
                              </select>
                              @endif
                          </div>
                      </div>
                      <div class="row mt-3" >
                        <div class="col-6">
                            <label for="inputState " class="form-label fw-bold">Load Type</label>
                            @if(isset($loadType)) 
                            <select id="inputState" class="form-control" name="LoadTypeId">
                              @foreach($loadType as $load)
                              <option value="{{ $load['ID'] }}" {{ runtimePreselected($load['ID'] ?? '', $ticket['LoadTypeId']) }}>{{ $load['Name'] }}</option>
                              @endforeach
                            </select>
                            @endif
                        </div>

                        <div class="col-6">
                            <label for="quantity" class="form-label fw-bold">Quantity</label>
                            <input type="text" class="form-control" name="Quantity" placeholder="Quantity" aria-label="quantity" value="{{ $ticket['Quantity'] }}">
                        </div>
                           
                      </div>
                  </div>
                  <div class="col-sm-12 col-lg-6 mt-4">
                    <div id="map" class="gmap_iframe">
                    </div>
                    <input type="hidden" id="pickupLocation"   name="orgion"         value="{{  json_encode($ticket['orgion']) }}">
                    <input type="hidden" id="deliveryLocation" name="destinations"   value="{{  json_encode($ticket['destination']) }}">
                  </div>
            </div>
        <!-- form row two -->
            <div class="row mt-3 "  >

              <div class=" col-sm-12 col-lg-6 " >
                  <h5><i class="bi bi-backpack-fill"></i>Shipper</h5>

                  <div class="row mt-3" >
                    
                    <div class="col">
                      <label for="shipper_date"  class="form-label fw-bold">Date</label>
                      <input type="text" class="form-control pickadate" id="shipper_date" name="PickupDate" placeholder="Date" aria-label="date" value="{{ $ticket['PickupDate'] }}">
                  </div>
                  <div class="col">
                    <label for="id" class="form-label fw-bold">Time</label>
                    <input type="time" class="form-control" name="PickupTime" placeholder="Id" aria-label="time" value="{{ $ticket['PickupTime'] }}">
                </div>
                    </div>
                    <div class="row mt-3" >
                      <div class="col-12">
                          <label for="shipper" class="form-label fw-bold">Shipper</label>
                          <input type="text" class="form-control" placeholder="Add Shipper" name="Shipper" aria-label="shipper" value="{{ $ticket['Shipper'] }}">
                        </div>
                    </div>
                    <div class="row mt-3" >
                      <div class="col">
                        <label for="country" class="form-label fw-bold">Country </label>
                          @if(isset($countries) && count($countries) > 0)
                               <select class="form-control" name="ShipperCountryId">
                                  @foreach($countries as $country)
                                    <option value="{{ $country['ID'] }}">{{ $country['Name'] }}</option>
                                  @endforeach
                              </select>
                            @endif                     
                      </div>
                    <div class="col">
                      <label for="City" class="form-label fw-bold">City</label>
                      <input type="text" class="form-control" placeholder="City" name="ShipperCity" aria-label="City" value="{{ $ticket['ShipperCity'] }}" onkeypress="initAutocomplete('pickup_city')" id="pickup_city">
                  </div>
                      <div class="col-sm-12 col-lg-6">
                        <label for="country" class="form-label fw-bold">Index </label>
                        <input type="text" class="form-control" placeholder="Add index" name="ShipperIndex" aria-label="country" value="{{ $ticket['ShipperIndex'] }}">
                        </div>

                          <div class="col-12 mt-3">
                            <label for="Address" class="form-label fw-bold">Address </label>
                            <input type="text" class="form-control" placeholder="Address" name="ShipperAddress" value="{{ $ticket['ShipperAddress'] }}" aria-label="Address" onkeypress="initAutocomplete('pickup_address')" id="pickup_address">
                            <input type="hidden" name="origin" id="origin">
                          </div>


                            <div id="pickup-container" class="col-12 mt-3 pickup">
                            <i class="mdi mdi-plus-circle-outline text-success font-28" onclick="addPickupField('pickupRemarks')"></i>
                            <br>
                            <label for="Pickup Remark" class="form-label fw-bold">Pickup Remark</label>
                            <div id="pickupRemarks">
                                <!-- Existing delivery field -->
                                 @if(isset($ticket['pickupRemarks']) && count($ticket['pickupRemarks']) > 0)
                                    @foreach($ticket['pickupRemarks'] as $key => $remark)
                                    <div class="pickupRemarks mt-3">
                                    <input type="text" class="form-control pickup" name="pickupRemarks[{{ $key }}]" placeholder="Pickup Remark" value="{{ $remark }}" aria-label="Pickup Remark">
                                    <button type="button" class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm" onclick="removeField(this)">
                                        <i class="sl-icon-trash"></i>
                                    </button>
                                </div>
                                    @endforeach
                                    @else
                                    <div class="pickupRemarks">
                                    <input type="text" class="form-control pickup" name="pickupRemarks[0]" placeholder="Pickup Remark" aria-label="Pickup Remark">
                                    <button type="button" class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm" onclick="removeField(this)">
                                        <i class="sl-icon-trash"></i>
                                    </button>
                                </div>
                                 @endif
                                <input type="hidden" id="pickupCount" value="{{ count($ticket['pickupRemarks']) }}">
                            </div>
                        </div>

                          <div class="col-12">
                            <div class="toggle-outer">
                              <div class="toggle-inner">
                                  <input type="checkbox" id="toggle" name="IsDifferentPickup">
                              </div>
                          </div>
                          <label id="toggleLabel toggleLabel1" for="toggle">
                              Different pickup
                          </label>
                          <div id="result">
                            <div class="row mt-3" >
                              <div class="col-12">
                                  <label for="alt_shipper" class="form-label fw-bold">Shipper</label>
                                  <input type="text" class="form-control" placeholder="Add Shipper" name="AltShipper" value="{{ $ticket['AltShipper'] }}" aria-label="alt_shipper">
                              </div>
                            </div>

                          <div class="row mt-3">
                            <div class="col">
                              <label for="country" class="form-label fw-bold">Country</label>
                                @if(isset($countries) && count($countries) > 0)
                                  <select class="form-control" name="AltPickupCountryId">
                                      @foreach($countries as $country)
                                        <option value="{{ $country['ID'] }}" {{ runtimePreselected($country['ID'] ?? '', $ticket['AltPickupCountryId']) }}>{{ $country['Name'] }}</option>
                                      @endforeach
                                  </select>
                                @endif  
                          </div>
                          <div class="col">
                            <label for="City" class="form-label fw-bold">City</label>
                            <input type="text" class="form-control" name="AltPickupCity" placeholder="City" value="{{ $ticket['AltPickupCity'] }}" aria-label="City" onkeypress="initAutocomplete('dif_pickup_city')" id="dif_pickup_city">
                        </div>
                            <div class="col-sm-12 col-lg-6">
                              <label for="index" class="form-label fw-bold">Index </label>
                              <input type="text" class="form-control" name="AltPickupIndex" placeholder="Add index" value="{{ $ticket['AltPickupIndex'] }}" aria-label="index">
                              </div>
                            </div>
                            <div class="mt-3">
                              <label for="Address" class="form-label fw-bold">Address </label>
                              <input type="text" class="form-control" name="AltPickupAddress" placeholder="Address" value="{{ $ticket['AltPickupAddress'] }}" aria-label="Address" onkeypress="initAutocomplete('dif_pickup_address')" id="dif_pickup_address">
                            </div>
                          </div>
                        </div>   
                          
                    
                    </div>
                </div>

<!-- form row three -->


                <div class="col-sm-12 col-lg-6">

                  <h5><i class="bi bi-geo-alt-fill"></i> Consignee </h5>

                  <div class="row mt-3" >
                    <div class="col">
                      <label for="consignee_date" class="form-label fw-bold">Date</label>
                      <input type="text" class="form-control pickadate" id="consignee_date" name="DeliveryDate" value="{{ $ticket['DeliveryDate'] }}" placeholder="Date" aria-label="date">
                  </div>
                  <div class="col">
                    <label for="id" class="form-label fw-bold">Time</label>
                    <input type="time" class="form-control" placeholder="Id" name="DeliveryTime" aria-label="time" value="{{ $ticket['DeliveryTime'] }}">
                </div>
                </div>
                
                    <div class="row mt-3" >
                      <div class="col">
                        <label for="consignee" class="form-label fw-bold">Consignee</label>
                        <input type="text" class="form-control" placeholder="Add Consignee" name="Consignee" value="{{ $ticket['Consignee'] }}" aria-label="consignee">
                    </div>
                      
                    <div class="row mt-3">

                        <div class="col">
                          <label for="country" class="form-label fw-bold">Country</label>
                             @if(isset($countries) && count($countries) > 0)
                                  <select class="form-control" name="ConsigneeCountryId">
                                      @foreach($countries as $country)
                                        <option value="{{ $country['ID'] }}" {{ runtimePreselected($country['ID'] ?? '', $ticket['ConsigneeCountryId']) }}>{{ $country['Name'] }}</option>
                                      @endforeach
                                  </select>
                                @endif               
                        </div>

                        <div class="col">
                          <label for="City" class="form-label fw-bold">City</label>
                        <input type="text" class="form-control" placeholder="City" name="ConsigneeCity" value="{{ $ticket['ConsigneeCity'] }}" aria-label="City" onkeypress="initAutocomplete('delivery')" id="delivery">
                      </div>
                      
                        <div class="col-sm-12 col-lg-6">
                        <label for="country" class="form-label fw-bold">Index</label>
                        <input type="text" class="form-control" placeholder="Add index" name="ConsigneeIndex" value="{{ $ticket['ConsigneeIndex'] }}" aria-label="country">
                        </div>
                        
                          <div class="col-12 mt-3">
                            <label for="Address" class="form-label fw-bold">Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="ConsigneeAddress" value="{{ $ticket['ConsigneeAddress'] }}" aria-label="Address" onkeypress="initAutocomplete('delivery_address')" id="delivery_address">
                            <input type="hidden" name="destination" id="destination">
                          </div>

                          <div id="delivery-container" class="col-12 mt-3 delivery">
                            <i class="mdi mdi-plus-circle-outline text-success font-28" onclick="addRemarksField('deliveryRemarks')"></i>
                            <br>
                            <label for="Delivery Remark" class="form-label fw-bold">Delivery Remark</label>
                            <div id="deliveryRemarks">
                                <!-- Existing delivery field -->

                                @if(isset($ticket['deliveryRemarks']) && count($ticket['deliveryRemarks']) > 0)
                                    @foreach($ticket['deliveryRemarks'] as $key => $remark)
                                    <div class="deliveryRemarks mt-3">
                                    <input type="text" class="form-control delivery" name="deliveryRemarks[{{ $key }}]" placeholder="Delivery Remark" value="{{ $remark }}" aria-label="Delivery Remark">
                                    <button type="button" class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm" onclick="removeField(this)">
                                        <i class="sl-icon-trash"></i>
                                    </button>
                                </div>
                                    @endforeach
                                    @else
                                    <div class="deliveryRemarks">
                                    <input type="text" class="form-control delivery" name="deliveryRemarks[0]" placeholder="Delivery Remark" aria-label="Delivery Remark">
                                    <button type="button" class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm" onclick="removeField(this)">
                                        <i class="sl-icon-trash"></i>
                                    </button>
                                </div>
                                 @endif
                                 <input type="hidden" id="deliveryCount" value="{{ count($ticket['deliveryRemarks']) }}">
                            </div>
                        </div>
                       
                          <div class="col-12">
                            <div class="toggle-outer2">
                              <div class="toggle-inner">
                                  <input type="checkbox" id="toggle2" name="IsDifferentDelivery">
                              </div>
                          </div>
                          <label id="toggleLabel toggleLabel2" for="toggle">
                              Different Delivery
                          </label>
                          <div id="result2">
                            <div class="row mt-3" >
                              <div class="col-12">
                                  <label for="alt_delivery" class="form-label fw-bold">Delivery</label>
                                  <input type="text" class="form-control" placeholder="Add Delivery" name="AltDelivery" value="{{ $ticket['AltDelivery'] }}" aria-label="alt_delivery">
                              </div>
                            </div>

                            <div class="row mt-3" >
                            <div class="col">
                              <label for="country" class="form-label fw-bold">Country </label>
                                 @if(isset($countries) && count($countries) > 0)
                                  <select class="form-control" name="AltDeliveryCountryId">
                                      @foreach($countries as $country)
                                        <option value="{{ $country['ID'] }}" {{ runtimePreselected($country['ID'] ?? '', $ticket['AltDeliveryCountryId']) }}>{{ $country['Name'] }}</option>
                                      @endforeach
                                  </select>
                                @endif 
                            </div>
                          <div class="col">
                            <label for="City" class="form-label fw-bold">City</label>
           
                            <input type="text" class="form-control" placeholder="City" name="AltDeliveryCity" value="{{ $ticket['AltDeliveryCity'] }}" aria-label="City" onkeypress="initAutocomplete('dif_delivery')" id="dif_delivery">
                        </div>
                            <div class="col-sm-12 col-lg-6">
                              <label for="index" class="form-label fw-bold">Index </label>
                              <input type="text" class="form-control" placeholder="Add index" name="AltDeliveryIndex" value="{{ $ticket['AltDeliveryIndex'] }}" aria-label="index">
                              </div>
                            </div>
                            <div class="mt-3">
                              <label for="Address" class="form-label fw-bold">Address </label>
                              <input type="text" class="form-control" placeholder="Address" name="AltDeliveryAddress" value="{{ $ticket['AltDeliveryAddress'] }}" aria-label="Address">
                            </div>

                          </div>
                        </div>  
                    
                    </div>
                  
                </div>
            </div>
          </div>

      <!-- form row four -->
            <div class="row mt-3">
                        <div class="col-sm-4 col-lg-2">
                        <label for="temp" class="form-label fw-bold">Temp Sensitive</label>
                        <input type="text" class="form-control" name="IsTempSensitive" placeholder="Type sensitive here" value="{{ $ticket['IsTempSensitive'] }}" aria-label="temp">
                    </div>
                    <div class="col-sm-4 col-lg-2">
                        <label for="range" class="form-label fw-bold">Temp Range</label>
                        <input type="text" class="form-control" name="TempValue" placeholder="Type Range here" value="{{ $ticket['TempValue'] }}" aria-label="range">
                    </div>
                    <div class="col-sm-4 col-lg-2">
                    <label for="adr" class="form-label fw-bold">ADR</label>
                    <input type="text" class="form-control" name="ADRValue" placeholder="Type ADR here" value="{{ $ticket['ADRValue'] }}" aria-label="adr">
                </div>
                <div class="col-sm-4 col-lg-2">
                    <label for="code" class="form-label fw-bold">UN Code</label>
                    <input type="text" class="form-control" name="UNCode" placeholder="Type UN code here" value="{{ $ticket['UNCode'] }}" aria-label="code">
                </div>
                <div class="col-sm-4 col-lg-2">
                <label for="fragile" class="form-label fw-bold">Fragile</label>
                <input type="text" class="form-control" name="FragileValue" placeholder="Type Fragile here" value="{{ $ticket['FragileValue'] }}" aria-label="fragile">
            </div>
            <div class="col-sm-4 col-lg-2">
                <label for="notes" class="form-label fw-bold">Notes</label>
            <input type="text" class="form-control" name="Notes" placeholder="About Notes" value="{{ $ticket['Notes'] }}"  aria-label="notes">
            </div>
             @include('pages.customticket.components.misc.edit-goods')
          </div>
          
          <div class="row mt-3">
          <label for="notes" class="form-label fw-bold">Chargeable Weight Total</label>
          <br>
          <input type="number" class="form-control" name="ChargeableWeightTotal" placeholder="Chargeable Weight Total"  value="{{ $ticket['ChargeableWeightTotal'] }}" aria-label="notes" id="ChargeableWeightTotal">
          </div>
         
					
                            <!-- <div class="form-group">
                                <textarea class="tinymce-textarea" name="ticket_message" id="ticket_message"
                                    rows="15"></textarea>
                            </div> -->
                            <!--fileupload-->
                            <!-- <div class="form-group row">
                                <div class="col-12">
                                    <div class="dropzone dz-clickable" id="fileupload_ticket">
                                        <div class="dz-default dz-message">
                                            <i class="icon-Upload-toCloud"></i>
                                            <span>{{ cleanLang(__('lang.drag_drop_file')) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--fileupload-->
                            <div class="text-lg-right">
                                <button type="submit" class="btn btn-rounded-x btn-success m-t-20 ajax-request"
                                    id="ticket-compose-form-button" data-url="{{ url('/ctickets/'.$ticket['Id'].'/update-details') }}" data-type="form"
                                    data-ajax-type="post" data-loading-overlay-target="wrapper-tickets"
                                    data-loading-overlay-classname="overlay"
                                    data-form-id="ticket-compose">{{ cleanLang(__('lang.update')) }}</button>
                                    
                                    @if(isset($ticket['Id']))
                                    <button type="submit" class="btn btn-rounded-x btn-success m-t-20 request"
                                     data-url="{{ url('/tickets/'.$ticket['Id'].'/convartToTask') }}" data-type="form" data-ajax-type="post"
                                    >{{ cleanLang(__('lang.convart_to_task')) }}</button>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    
$(document).ready(function() {

    // Set up CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Attach a click event handler to the button with the class 'ajax-request'
    $('.request').on('click', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var button = $(this);
        var url = button.data('url'); // Get the URL from the data-url attribute
        var type = button.data('type'); // Get the type from the data-type attribute
        var ajaxType = button.data('ajax-type'); // Get the AJAX type (e.g., 'post')

        // Perform the AJAX request
        $.ajax({
            url: url,
            type: ajaxType,
            data: button.closest('form').serialize(), // Serialize form data if needed
            success: function(response) {
                // Handle the successful response here
                console.log('Success:', response.notification);

                // Optionally, you can update the UI or perform other actions based on the response
                alert('Task successfully converted!');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
                alert('There was an error converting the task.');
            }
        });
    });
});
   
    var pickupdata   = JSON.parse(document.getElementById("pickupLocation").value);
    var deliverydata = JSON.parse(document.getElementById("deliveryLocation").value);

    const pickupLocation   = { lat: pickupdata.lat,   lng: pickupdata.lng}; 
    const deliveryLocation = { lat: deliverydata.lat, lng: deliverydata.lng };

    function initMap() {
            // Create a map centered at the midpoint between pickup and delivery locations
            const mapCenter = {
                lat: (pickupLocation.lat + deliveryLocation.lat) / 2,
                lng: (pickupLocation.lng + deliveryLocation.lng) / 2
            };

            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5,
                center: mapCenter
            });

            // Add a marker for pickup location
            new google.maps.Marker({
                position: pickupLocation,
                map: map,
                title: 'Pickup Location'
            });

            // Add a marker for delivery location
            new google.maps.Marker({
                position: deliveryLocation,
                map: map,
                title: 'Delivery Location'
            });

            // Optional: Draw a line between pickup and delivery locations
            const flightPath = new google.maps.Polyline({
                path: [pickupLocation, deliveryLocation],
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            flightPath.setMap(map);
    }
</script>
