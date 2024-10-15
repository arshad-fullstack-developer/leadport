<!--CUSTOMER HAS A SUBSCRIPTION-->
<?php if(config('visibility.has_subscription')): ?>
<div class="subscription-details p-t-10">

    <div class="x-heading">
        <?php echo e($subscription->package_name ?? '---'); ?>

    </div>

    <!--SUMMARY-->
    <?php echo $__env->make('landlord.subscriptions.misc.info-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php if($subscription->subscription_type == 'paid'): ?>
    <div class="line  m-t-30 p-b-40"></div>

    <h5 class="p-b-10"><?php echo app('translator')->get('lang.payment_gateway_information'); ?></h5>

    <?php echo $__env->make('landlord.subscriptions.misc.info-gateways', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?>


</div>
<?php endif; ?>


<!--CUSTOMER DOES NPT HAVE A SUBSCRIPTION-->
<?php if(!config('visibility.has_subscription')): ?>
<div class="subscription-details text-center p-t-40">
    <img class="x-image" src="<?php echo e(url('/')); ?>/public/images/404.png" alt="404 - Not found" />
    <div class="x-message p-t-30">
        <h3><?php echo e($error['message'] ?? __('lang.no_subscription_exists_for_customer')); ?></h3>
    </div>
</div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/subscriptions/details.blade.php ENDPATH**/ ?>