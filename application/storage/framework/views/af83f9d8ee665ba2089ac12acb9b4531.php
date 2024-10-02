
<?php $__env->startSection('account-page'); ?>
<div class="account-wrapper">

    
    <!--currently unsubscribed-->
    <?php if(config('system.settings_saas_status') == 'unsubscribed' || config('system.settings_saas_package_id') == ''): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <?php echo app('translator')->get('lang.not_currently_subscribed'); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- page content -->
    <div class="row">
        <div class="col-12">

            <?php if(@count($packages) > 0): ?>
            <div class="row" id="packages-container">
                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--use same table as landlord-->
                <?php if($package->package_status == 'active' || ($package->package_status == 'archived' &&
                config('system.settings_saas_package_id') == $package->package_id)): ?>
                <?php echo $__env->make('landlord.packages.packages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <!--nothing found-->
            <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
    <!--page content -->


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('account.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/account/packages/wrapper.blade.php ENDPATH**/ ?>