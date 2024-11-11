<?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="ticket_<?php echo e($ticket['id']); ?>">
    <?php if(config('visibility.tickets_col_checkboxes')): ?>
    <td class="tickets_col_checkbox checkitem hidden" id="tickets_col_checkbox_<?php echo e($ticket['id']); ?>">
        <!--list checkbox-->
        <span class="list-checkboxes display-inline-block w-px-20">
            <input type="checkbox" id="listcheckbox-tickets-<?php echo e($ticket['id']); ?>"
                name="ids[<?php echo e($ticket['id']); ?>]"
                class="listcheckbox listcheckbox-tickets filled-in chk-col-light-blue"
                data-actions-container-class="tickets-checkbox-actions-container">
            <label for="listcheckbox-tickets-<?php echo e($ticket['id']); ?>"></label>
        </span>
    </td>
    <?php endif; ?>

    <td class="tickets_col_id">
        <a href="<?php echo e(urlResource('/ctickets/'.$ticket['id'].'/view')); ?>"><?php echo e($ticket['id']); ?></a>
    </td>
    
    <td class="tickets_col_subject">
        <?php echo e($ticket['shipper_name'] ?? '---'); ?>

    </td>
    <td class="tickets_col_client">
        <?php echo e($ticket['consignee_name'] ?? '---'); ?>

    </td>
    <td class="tickets_col_department">
        <?php echo e($ticket['loadType']['name'] ?? '---'); ?>

    </td> 

    <td class="leads_col_assigned <?php echo e(config('table.tableconfig_column_6')); ?> tableconfig_column_6"
        id="leads_col_assigned_<?php echo e($ticket['id']); ?>">
        <!--assigned users-->
        <?php if(count($ticket['assigned'] ?? []) > 0): ?>
        <?php $__currentLoopData = $ticket['assigned']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $firstNameInitial = strtoupper(substr($user['first_name'], 0, 1));
        $lastNameInitial  = strtoupper(substr($user['last_name'], 0, 1));
        $initials = $firstNameInitial . $lastNameInitial;
        ?>
        <p class="text-white bg-success img-circle avatar-xsmall text-center pt-1 custom">
            <?php echo e($initials); ?>

        </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <span>---</span>
        <?php endif; ?>
        <!--assigned users-->
        <?php if(count($ticket['assigned'] ?? []) > 2): ?>
        <?php $more_users_title = __('lang.assigned_users'); $users = $ticket['assigned']; ?>
        <?php echo $__env->make('misc.more-users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </td> 

    <td class="tickets_col_priority">
        <?php echo e($ticket['shipping_date'] ?? '---'); ?> 
    </td>
    <td class="tickets_col_activity">
        <?php echo e($ticket['delivery_date'] ?? '---'); ?> 
    </td>
    <td class="tickets_col_status">
        <?php echo e($ticket['status']['name'] ?? '---'); ?>

    </td>
    <td class="tickets_col_action actions_column">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
          
        <?php
            // Extract user IDs from assigned field (array of User objects or arrays with 'id' properties)
            $assignedUserIds = collect($ticket['assigned'])->pluck('id')->toArray(); // Get an array of assigned user IDs
            $isAssigned = in_array(auth()->user()->id, $assignedUserIds); // Check if the logged-in user is assigned to the ticket
        ?>

        <!-- Delete button -->
        <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo e(cleanLang(__('lang.delete_item'))); ?>" 
                data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                data-ajax-type="POST" 
                data-url="<?php echo e(url('/ctickets/'.$ticket['id'].'/delete-ticket')); ?>"
                <?php if(!$isAssigned): ?> disabled <?php endif; ?>>
            <i class="sl-icon-trash"></i>
        </button>

        <!-- Edit button -->
        <?php if(auth()->user()->id == 1): ?>    
        <a href="<?php echo e(urlResource('/ctickets/'.$ticket['id'].'/edit')); ?>"
        class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm">
        <i class="sl-icon-note"></i>
        </a>
        <?php else: ?>
        <a href="<?php echo e(urlResource('/ctickets/'.$ticket['id'].'/edit')); ?>"
        class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm
        <?php if(!$isAssigned): ?> disabled-link <?php endif; ?>">
        <i class="sl-icon-note"></i>
        </a>
        <?php endif; ?>

        <a href="<?php echo e(urlResource('/ctickets/'.$ticket['id'].'/view')); ?>" title="<?php echo e(cleanLang(__('lang.view'))); ?>"
            class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm">
            <i class="ti-new-window"></i>
        </a>
        </span>
        <!--action button-->
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/customtickets/components/table/ajax.blade.php ENDPATH**/ ?>