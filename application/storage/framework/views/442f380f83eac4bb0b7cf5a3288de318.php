<?php if($subscription->subscription_payment_method == 'automatic'): ?>
<!--free trial-->
<?php if($subscription->subscription_status == 'free-trial'): ?>
<div class="x-free-trial-info">
    <div class="alert alert-info m-t-20"><?php echo app('translator')->get('lang.subscription_currently_free_trial'); ?></div>
</div>

<!--awaiting payment-->
<?php elseif($subscription->subscription_status == 'awaiting-payment'): ?>
<div class="x-awaiting-payment-info">
    <div class="alert alert-danger m-t-20"><?php echo app('translator')->get('lang.subscription_currently_awaiting_payment'); ?></div>
</div>

<!--free plan-->
<?php elseif($subscription->subscription_status == 'awaiting-payment'): ?>
<div class="x-free-plan-info">
    <div class="alert alert-danger m-t-20"><?php echo app('translator')->get('lang.subscription_currently_awaiting_payment'); ?></div>
</div>
<!--plan inform from payment gateways-->
<?php else: ?>
<div class="x-gateway-info">
    <!--STRIPE-->
    <?php if($subscription->subscription_gateway_name == 'stripe'): ?>
    <?php echo $__env->make('landlord.subscriptions.misc.info-stripe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!--PAYPAL-->

    <!--MANUAL-->
</div>
<?php endif; ?>
<?php else: ?>
<!--offline payments-->
<div class="x-offline-payments-info">
    <div class="alert alert-info m-t-20"><?php echo app('translator')->get('lang.payments_are_made_offline'); ?></div>
</div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/subscriptions/misc/info-gateways.blade.php ENDPATH**/ ?>