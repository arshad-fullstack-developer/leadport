<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="item_<?php echo e($item->frontend_id); ?>">
    <td class="col_name">
        <!--sorting data-->
        <input type="hidden" name="sort-menu[<?php echo e($item->frontend_id); ?>]" value="<?php echo e($item->frontend_id); ?>">
        <span class="mdi mdi-drag-vertical cursor-pointer"></span>
         <?php echo e($item->frontend_data_1); ?>

    </td>
    <td class="col_link">
        <?php echo e($item->frontend_data_2); ?>

    </td>
    <td class="col_action actions_column" id="col_action_<?php echo e($item->frontend_id); ?>">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
            <!--delete-->
            <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo app('translator')->get('lang.delete_item'); ?>" data-confirm-text="<?php echo app('translator')->get('lang.are_you_sure'); ?>"
                data-ajax-type="DELETE" data-url="<?php echo e(url('/app-admin/frontend/mainmenu/'.$item->frontend_id)); ?>">
                <i class="sl-icon-trash"></i>
            </button>
            <!--edit-->
            <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal"
                data-url="<?php echo e(urlResource('/app-admin/frontend/mainmenu/'.$item->frontend_id.'/edit')); ?>"
                data-loading-target="commonModalBody" data-modal-title="<?php echo app('translator')->get('lang.edit_menu_item'); ?>"
                data-action-url="<?php echo e(urlResource('/app-admin/frontend/mainmenu/'.$item->frontend_id.'?ref=list')); ?>"
                data-action-method="PUT" data-action-ajax-class="" data-action-ajax-loading-target="items-td-container">
                <i class="sl-icon-note"></i>
            </button>
        </span>
        <!--action button-->
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/mainmenu/table/ajax.blade.php ENDPATH**/ ?>