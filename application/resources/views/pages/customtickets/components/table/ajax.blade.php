@foreach($tickets as $ticket)
<!--each row-->
<tr id="ticket_{{ $ticket['id'] }}">
    @if(config('visibility.tickets_col_checkboxes'))
    <td class="tickets_col_checkbox checkitem hidden" id="tickets_col_checkbox_{{ $ticket['id'] }}">
        <!--list checkbox-->
        <span class="list-checkboxes display-inline-block w-px-20">
            <input type="checkbox" id="listcheckbox-tickets-{{ $ticket['id'] }}"
                name="ids[{{ $ticket['id'] }}]"
                class="listcheckbox listcheckbox-tickets filled-in chk-col-light-blue"
                data-actions-container-class="tickets-checkbox-actions-container">
            <label for="listcheckbox-tickets-{{ $ticket['id'] }}"></label>
        </span>
    </td>
    @endif

    <td class="tickets_col_id">
        <a href="{{ urlResource('/ctickets/'.$ticket['id'].'/view') }}">{{ $ticket['id'] }}</a>
    </td>
    
    <td class="tickets_col_subject">
        {{ $ticket['shipper_name'] ?? '---' }}
    </td>
    <td class="tickets_col_client">
        {{ $ticket['consignee_name'] ?? '---'  }}
    </td>
    <td class="tickets_col_department">
        {{ $ticket['loadType']['name'] ?? '---'  }}
    </td> 

    <td class="leads_col_assigned {{ config('table.tableconfig_column_6') }} tableconfig_column_6"
        id="leads_col_assigned_{{ $ticket['id'] }}">
        <!--assigned users-->
        @if(count($ticket['assigned'] ?? []) > 0)
        @foreach($ticket['assigned'] as $user)
        <?php
        $firstNameInitial = strtoupper(substr($user['first_name'], 0, 1));
        $lastNameInitial  = strtoupper(substr($user['last_name'], 0, 1));
        $initials = $firstNameInitial . $lastNameInitial;
        ?>
        <p class="text-white bg-success img-circle avatar-xsmall text-center pt-1 custom">
            {{ $initials }}
        </p>
        @endforeach
        @else
        <span>---</span>
        @endif
        <!--assigned users-->
        @if(count($ticket['assigned'] ?? []) > 2)
        @php $more_users_title = __('lang.assigned_users'); $users = $ticket['assigned']; @endphp
        @include('misc.more-users')
        @endif
    </td> 

    <td class="tickets_col_priority">
        {{ $ticket['shipping_date'] ?? '---'  }} 
    </td>
    <td class="tickets_col_activity">
        {{ $ticket['delivery_date'] ?? '---'  }} 
    </td>
    <td class="tickets_col_status">
        {{$ticket['status']['name'] ?? '---'  }}
    </td>
    <td class="tickets_col_action actions_column">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
          
        @php
            // Extract user IDs from assigned field (array of User objects or arrays with 'id' properties)
            $assignedUserIds = collect($ticket['assigned'])->pluck('id')->toArray(); // Get an array of assigned user IDs
            $isAssigned = in_array(auth()->user()->id, $assignedUserIds); // Check if the logged-in user is assigned to the ticket
        @endphp

        <!-- Delete button -->
        <button type="button" title="{{ cleanLang(__('lang.delete')) }}"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="{{ cleanLang(__('lang.delete_item')) }}" 
                data-confirm-text="{{ cleanLang(__('lang.are_you_sure')) }}"
                data-ajax-type="POST" 
                data-url="{{ url('/ctickets/'.$ticket['id'].'/delete-ticket') }}"
                @if(!$isAssigned) disabled @endif>
            <i class="sl-icon-trash"></i>
        </button>

        <!-- Edit button -->
        @if(auth()->user()->id == 1)    
        <a href="{{ urlResource('/ctickets/'.$ticket['id'].'/edit') }}"
        class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm">
        <i class="sl-icon-note"></i>
        </a>
        @else
        <a href="{{ urlResource('/ctickets/'.$ticket['id'].'/edit') }}"
        class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm
        @if(!$isAssigned) disabled-link @endif">
        <i class="sl-icon-note"></i>
        </a>
        @endif

        <a href="{{ urlResource('/ctickets/'.$ticket['id'].'/view') }}" title="{{ cleanLang(__('lang.view')) }}"
            class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm">
            <i class="ti-new-window"></i>
        </a>
        </span>
        <!--action button-->
    </td>
</tr>
@endforeach
<!--each row-->
