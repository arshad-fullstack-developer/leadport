<?php $__currentLoopData = $canned_responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="canned_<?php echo e($canned->canned_id); ?>">

    <!--canned_title-->
    <td class="col_canned_title">
        <?php echo e(str_limit($canned->canned_title ?? '---', 200)); ?>

    </td>

    <!--canned_created-->
    <td class="col_canned_created">
        <?php echo e(runtimeDate($canned->canned_created)); ?>

    </td>


    <!--canned_visibility-->
    <td class="col_canned_visibility">
        <?php if($canned->canned_visibility == 'public'): ?>
        <span class="label label-outline-info"><?php echo app('translator')->get('lang.public'); ?></span>
        <?php else: ?>
        <span class="label label-outline-warning"><?php echo app('translator')->get('lang.private'); ?></span>
        <?php endif; ?>
    </td>

    <!--actions-->
    <td class="col_canned_actions actions_column">
        <!--action button-->

        <span class="list-table-action dropdown font-size-inherit">
            <!--delete-->
            <button type="button" title="<?php echo app('translator')->get('lang.delete'); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo app('translator')->get('lang.delete_item'); ?>" data-confirm-text="<?php echo app('translator')->get('lang.are_you_sure'); ?>"
                data-ajax-type="DELETE" data-url="<?php echo e(url('/canned/'.$canned->canned_id)); ?>">
                <i class="sl-icon-trash"></i>
            </button>
            <!--edit-->
            <button type="button" title="<?php echo app('translator')->get('lang.edit'); ?>"
                class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal"
                data-url="<?php echo e(urlResource('/canned/'.$canned->canned_id.'/edit')); ?>"
                data-loading-target="commonModalBody" data-modal-title="<?php echo app('translator')->get('lang.edit_item'); ?>"
                data-modal-size="modal-xl" data-action-url="<?php echo e(urlResource('/canned/'.$canned->canned_id)); ?>"
                data-action-method="PUT" data-action-ajax-class="js-ajax-ux-request"
                data-action-ajax-loading-target="canned-td-container">
                <i class="sl-icon-note"></i>
            </button>
        </span>

        <!--action button-->
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/canned/components/table/ajax.blade.php ENDPATH**/ ?>