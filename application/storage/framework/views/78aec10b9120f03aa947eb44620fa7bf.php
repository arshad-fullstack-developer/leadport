<?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="ticket_<?php echo e($ticket['Id']); ?>">
    <?php if(config('visibility.tickets_col_checkboxes')): ?>
    <td class="tickets_col_checkbox checkitem hidden" id="tickets_col_checkbox_<?php echo e($ticket['Id']); ?>">
        <!--list checkbox-->
        <span class="list-checkboxes display-inline-block w-px-20">
            <input type="checkbox" id="listcheckbox-tickets-<?php echo e($ticket['Id']); ?>"
                name="ids[<?php echo e($ticket['Id']); ?>]"
                class="listcheckbox listcheckbox-tickets filled-in chk-col-light-blue"
                data-actions-container-class="tickets-checkbox-actions-container">
            <label for="listcheckbox-tickets-<?php echo e($ticket['Id']); ?>"></label>
        </span>
    </td>
    <?php endif; ?>
    <td class="tickets_col_id"><a href="/tickets/<?php echo e($ticket['Id']); ?>"><?php echo e($ticket['Id']); ?></a></td>
    <td class="tickets_col_subject">
        <?php echo e($ticket['Shipper'] ?? '---'); ?>

    </td>
    <td class="tickets_col_client">
        <?php echo e($ticket['Consignee'] ?? '---'); ?>

    </td>
    <td class="tickets_col_department">
        <?php echo e($ticket['LoadType'] ?? '---'); ?>

    </td> 
    <td class="tickets_col_priority">
        <?php echo e($ticket['PickupDate'] ?? '---'); ?> 
    </td>
    <td class="tickets_col_activity">
        <?php echo e($ticket['DeliveryDate'] ?? '---'); ?> 
    </td>
    <td class="tickets_col_status">
       <?php echo e($ticket['Status'] ?? '---'); ?>

    </td>
    <td class="tickets_col_action actions_column">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">

            <!--delete-->
            <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo e(cleanLang(__('lang.delete_item'))); ?>" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                data-ajax-type="DELETE" data-url="<?php echo e(url('/tickets/'.$ticket['Id'].'/delete-ticket')); ?>">
                <i class="sl-icon-trash"></i>
            </button>
            <!--edit-->
           
            <a href="<?php echo e(urlResource('/ctickets/'.$ticket['Id'].'/edit')); ?>"
            class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm"
            ><i class="sl-icon-note"></i></a>

            <a href="javascript:void(0)" title="<?php echo e(cleanLang(__('lang.view'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-info btn-circle btn-sm">
                <i class="ti-new-window"></i>
            </a>
        </span>
        <!--action button-->
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/customtickets/components/table/ajax.blade.php ENDPATH**/ ?>