<table class="table no-border">
    <tbody>
        <?php if($subscription->subscription_type =='paid'): ?>
        <!--amount-->
        <tr>
            <td><?php echo app('translator')->get('lang.amount'); ?></td>
            <td class="font-medium w-30"><?php echo e(runtimeMoneyFormat($subscription->subscription_amount)); ?></td>
        </tr>
        <!--billing cycle-->
        <tr>
            <td><?php echo app('translator')->get('lang.billing_cycle'); ?></td>
            <td class="font-medium"><?php echo e(runtimeLang($subscription->subscription_gateway_billing_cycle ?? '---')); ?>

            </td>
        </tr>
        <!--status-->
        <tr>
            <td><?php echo app('translator')->get('lang.status'); ?></td>
            <td class="font-medium"><span
                    class="label <?php echo e(runtimeSubscriptionStatusColors($subscription->subscription_status)); ?>"><?php echo e(runtimeSubscriptionStatusLang($subscription->subscription_status)); ?></span>
            </td>
        </tr>
        <?php if($subscription->subscription_status =='free-trial'): ?>
        <!--trial_end_date-->
        <tr>
            <td><?php echo app('translator')->get('lang.trial_end_date'); ?></td>
            <td class="font-medium"><?php echo e(runtimeDate($subscription->subscription_trial_end)); ?></td>
        </tr>
        <?php else: ?>
        <!--payment gateway-->
        <tr>
            <td><?php echo app('translator')->get('lang.payment_gateway'); ?></td>
            <td class="font-medium"><?php echo e(runtimeLang($subscription->subscription_gateway_name ?? '---')); ?></td>
        </tr>
        <!--payment gateway-->
        <tr>
            <td><?php echo app('translator')->get('lang.start_date'); ?></td>
            <td class="font-medium"><?php echo e(runtimeDate($subscription->subscription_date_started)); ?></td>
        </tr>
        <!--last payment-->
        <tr>
            <td><?php echo app('translator')->get('lang.last_payment'); ?></td>
            <td class="font-medium"><?php echo e(runtimeDate($subscription->subscription_date_renewed)); ?></td>
        </tr>
        <!--next payment-->
        <tr>
            <td><?php echo app('translator')->get('lang.next_payment'); ?></td>
            <td class="font-medium"><?php echo e(runtimeDate($subscription->subscription_date_next_renewal)); ?></td>
        </tr>
        <?php endif; ?>
        <?php else: ?>
        <tr>
            <td colspan="2" class="font-medium">
                <div class="alert alert-success"><?php echo app('translator')->get('lang.free_subscription_info'); ?></div>
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/subscriptions/misc/info-summary.blade.php ENDPATH**/ ?>