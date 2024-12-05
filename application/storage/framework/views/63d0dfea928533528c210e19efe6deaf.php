 <?php $__env->startSection('content'); ?>
<!-- main content -->
<div class="container-fluid">

    <!--HEADER-->
    <div class="setup-header">
        <div class="x-logo font-16 font-weight-600">GROW CRM SAAS - INSTALLER</div>
    </div>
    <div class="setup-wrapper">
        <!--PROGRESS-->
        <div class="setup-progress row">
            <!--step 1-->
            <div class="col-2 steps">
                <div class="x-step active-passed setup-steps" id="steps-1">1</div>
                <div class="x-line">Welcome</div>
            </div>
            <!--step 2 -->
            <div class="col-2 steps">
                <div class="x-step setup-steps" id="steps-2">2</div>
                <div class="x-line">Requirements</div>
            </div>
            <!--step 3-->
            <div class="col-2 steps">
                <div class="x-step setup-steps" id="steps-3">3</div>
                <div class="x-line">Database</div>
            </div>
            <!--step 4-->
            <div class="col-2 steps">
                <div class="x-step setup-steps" id="steps-4">4</div>
                <div class="x-line">Settings</div>
            </div>
            <!--step 5-->
            <div class="col-2 steps">
                <div class="x-step setup-steps" id="steps-5">5</div>
                <div class="x-line">Admin User</div>
            </div>
            <!--step 6-->
            <div class="col-2 steps">
                <div class="x-step setup-steps" id="steps-6">6</div>
                <div class="x-line">Finish</div>
            </div>
        </div>

        <!--CONTENT-->
        <div class="setup-content" id="setup-content">
            <?php echo $__env->make('pages.install.welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>

</div>
<!--main content -->

<script src="public/js/landlord/install.js?v=<?php echo e(config('system.versioning')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.wrapperplain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/install/wrapper.blade.php ENDPATH**/ ?>