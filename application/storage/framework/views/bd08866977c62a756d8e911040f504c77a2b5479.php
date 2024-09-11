<?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="subscription_<?php echo e($subscription->subscription_id); ?>">


    <!--subscription_gateway_id-->
    <td class="col_subscription_gateway_id">
        <?php if($subscription->subscription_type == 'free'): ?>
        <span><?php echo e(__('lang.free_plan_id')); ?>_<?php echo e($subscription->subscription_id); ?></span>
        <?php else: ?>
        <span title="<?php echo e($subscription->subscription_gateway_id ?? $subscription->subscription_id); ?>"><?php echo e(str_limit($subscription->subscription_gateway_id ?? $subscription->subscription_id, 17)); ?></span>
        <?php endif; ?>
        <!--archived-->
        <?php if($subscription->subscription_archived == 'yes'): ?>
        <span class="label label-icons label-icons-default m-t--5" data-toggle="tooltip" data-placement="top"
            title="<?php echo app('translator')->get('lang.archived_subscription_info'); ?>"><i class="ti-archive"></i></span>
        <?php endif; ?>
    </td>

    <!--tenant_name-->
    <td class="col_tenant_name">
        <a
            href="<?php echo e(url('app-admin/customers/'.$subscription->subscription_customerid)); ?>"><?php echo e(str_limit($subscription->tenant_name ?? '---', 15)); ?></a>
    </td>

    <!--subscription_created-->
    <td class="col_subscription_created">
        <?php echo e(runtimeDate($subscription->subscription_created)); ?>

    </td>


    <!--subscription_amount-->
    <td class="col_subscription_amount">
        <?php echo e(runtimeMoneyFormat($subscription->subscription_amount)); ?>

    </td>

    <!--subscription_date_renewed-->
    <td class="col_subscription_date_renewed">
        <?php echo e(runtimeDate($subscription->subscription_date_renewed)); ?>

    </td>

    <!--subscription_gateway_billing_cycle-->
    <td class="col_subscription_gateway_billing_cycle">
        <?php echo e(runtimeLang($subscription->subscription_gateway_billing_cycle)); ?>

    </td>

    <!--subscription_status-->
    <td class="col_subscription_status">
        <span
            class="label <?php echo e(runtimeSubscriptionStatusColors($subscription->subscription_status)); ?>"><?php echo e(runtimeLang($subscription->subscription_status)); ?></span>
    </td>

    <!--subscription_gateway-->
    <td class="col_subscription_gateway_name ucwords">
        <?php echo e($subscription->subscription_gateway_name ?? '---'); ?>

    </td>

    <!--actions-->
    <td class="subscriptions_col_action actions_column"
        id="subscriptions_col_action_<?php echo e($subscription->subscription_id); ?>">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
            <!--cancel-->
            <?php if(in_array($subscription->subscription_status, ['active', 'failed'])): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.cancel_subscription'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo e(cleanLang(__('lang.cancel_subscription'))); ?>"
                data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="POST"
                data-url="<?php echo e(urlResource('/app-admin/subscriptions/'.$subscription->subscription_id.'/cancel?ref=page')); ?>">
                <i class="ti-na"></i>
            </button>
            <?php endif; ?>

            <!--delete-->
            <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo e(cleanLang(__('lang.delete_subscription'))); ?>"
                data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
                data-url="<?php echo e(url('/app-admin')); ?>/subscriptions/<?php echo e($subscription->subscription_id); ?>">
                <i class="sl-icon-trash"></i>
            </button>

            <!--more info-->
            <button type="button" title="<?php echo e(cleanLang(__('lang.subscription_details'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-info btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal"
                data-url="<?php echo e(urlResource('app-admin/subscriptions/'.$subscription->subscription_id.'/info')); ?>"
                data-loading-target="commonModalBody"
                data-footer-visibility="hidden"
                data-modal-title="<?php echo e(cleanLang(__('lang.subscription_details'))); ?>">
                <i class="ti-info-alt"></i>
            </button>
        </span>
        <!--action button-->
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/subscriptions/table/ajax.blade.php ENDPATH**/ ?>