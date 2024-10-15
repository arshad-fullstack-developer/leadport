<?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="payment_<?php echo e($payment->payment_id); ?>">
    <!--payment_id-->
    <td class="col_payment_id">
        <?php echo e($payment->payment_id); ?>

    </td>
    <!--tenant_name-->
    <?php if(config('visibility.col_tenant_name')): ?>
    <td class="col_tenant_name">
        <a href="<?php echo e(url('app-admin/customers/'.$payment->payment_tenant_id)); ?>"><?php echo e($payment->tenant_name); ?></a>
    </td>
    <?php endif; ?>
    <!--payment_created-->
    <td class="col_payment_created">
        <?php echo e(runtimeDate($payment->payment_date)); ?>

    </td>
    <!--payment_transaction_id-->
    <td class="col_payment_transaction_id">
        <?php echo e($payment->payment_transaction_id ?? '---'); ?>

    </td>
    <!--payment_amount-->
    <td class="col_payment_amount">
        <?php echo e(runtimeMoneyFormat($payment->payment_amount)); ?>

    </td>
    <!--payment_gateway-->
    <?php if(config('visibility.col_payment_gateway')): ?>
    <td class="col_payment_gateway text-ucf">
        <?php echo e($payment->payment_gateway ?? '---'); ?>

    </td>
    <?php endif; ?>
    <td class="payments_col_action actions_column" id="payments_col_action_<?php echo e($payment->payment_id); ?>">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
            <!--delete-->
            <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-success"
                data-confirm-title="<?php echo app('translator')->get('lang.delete_payment'); ?>" data-confirm-text="<?php echo app('translator')->get('lang.are_you_sure'); ?>"
                data-ajax-type="DELETE" data-url="<?php echo e(url('/app-admin/payments/'.$payment->payment_id)); ?>">
                <i class="sl-icon-trash"></i>
            </button>
            <!--edit-->
            <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal"
                data-url="<?php echo e(urlResource('/app-admin/payments/'.$payment->payment_id.'/edit')); ?>"
                data-loading-target="commonModalBody" data-modal-title="<?php echo app('translator')->get('lang.edit_payment'); ?>"
                data-action-url="<?php echo e(urlResource('/app-admin/payments/'.$payment->payment_id.'?ref=list')); ?>"
                data-action-method="PUT" data-action-ajax-class=""
                data-action-ajax-loading-target="payments-td-container">
                <i class="sl-icon-note"></i>
            </button>
        </span>
        <!--action button-->
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/payments/table/ajax.blade.php ENDPATH**/ ?>