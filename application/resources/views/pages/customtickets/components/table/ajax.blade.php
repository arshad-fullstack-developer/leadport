@foreach($tickets as $ticket)
<!--each row-->
<tr id="ticket_{{ $ticket['Id'] }}">
    @if(config('visibility.tickets_col_checkboxes'))
    <td class="tickets_col_checkbox checkitem hidden" id="tickets_col_checkbox_{{ $ticket['Id'] }}">
        <!--list checkbox-->
        <span class="list-checkboxes display-inline-block w-px-20">
            <input type="checkbox" id="listcheckbox-tickets-{{ $ticket['Id'] }}"
                name="ids[{{ $ticket['Id'] }}]"
                class="listcheckbox listcheckbox-tickets filled-in chk-col-light-blue"
                data-actions-container-class="tickets-checkbox-actions-container">
            <label for="listcheckbox-tickets-{{ $ticket['Id'] }}"></label>
        </span>
    </td>
    @endif
    <td class="tickets_col_id"><a href="{{ urlResource('/ctickets/'.$ticket['Id'].'/view') }}">{{ $ticket['Id'] }}</a></td>
    <td class="tickets_col_subject">
        {{ $ticket['Shipper'] ?? '---' }}
    </td>
    <td class="tickets_col_client">
        {{ $ticket['Consignee'] ?? '---'  }}
    </td>
    <td class="tickets_col_department">
        {{ $ticket['LoadType'] ?? '---'  }}
    </td> 
    <td class="tickets_col_priority">
        {{ $ticket['PickupDate'] ?? '---'  }} 
    </td>
    <td class="tickets_col_activity">
        {{ $ticket['DeliveryDate'] ?? '---'  }} 
    </td>
    <td class="tickets_col_status">
       {{$ticket['Status'] ?? '---'  }}
    </td>
    <td class="tickets_col_action actions_column">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">

            <!--delete-->
            <button type="button" title="{{ cleanLang(__('lang.delete')) }}"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="{{ cleanLang(__('lang.delete_item')) }}" data-confirm-text="{{ cleanLang(__('lang.are_you_sure')) }}"
                data-ajax-type="DELETE" data-url="{{ url('/tickets/'.$ticket['Id'].'/delete-ticket') }}">
                <i class="sl-icon-trash"></i>
            </button>
            <!--edit-->
           
            <a href="{{ urlResource('/ctickets/'.$ticket['Id'].'/edit') }}"
            class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm"
            ><i class="sl-icon-note"></i></a>

            <a href="{{ urlResource('/ctickets/'.$ticket['Id'].'/view') }}" title="{{ cleanLang(__('lang.view')) }}"
                class="data-toggle-action-tooltip btn btn-outline-info btn-circle btn-sm">
                <i class="ti-new-window"></i>
            </a>
        </span>
        <!--action button-->
    </td>
</tr>
@endforeach
<!--each row-->