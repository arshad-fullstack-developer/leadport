<div class="row">
    <div class="col-lg-12">


        <!--tenant_name-->
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.name'); ?></label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm" id="full_name" name="full_name"
                    value="<?php echo e($customer->tenant_name ?? ''); ?>">
            </div>
        </div>

        <!--tenant_email-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.email'); ?></label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm" id="email_address" name="email_address"
                    value="<?php echo e($customer->tenant_email ?? ''); ?>">
            </div>
        </div>


        <!--item-->
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.plan'); ?></label>
            <div class="col-sm-12 col-lg-9">
                <select class="select2-basic form-control form-control-sm" id="plan" name="plan">
                    <option></option>
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($package->package_subscription_options == 'paid'): ?>
                    <option data-option="monthly" value="<?php echo e($package->package_id); ?>"><?php echo e($package->package_name); ?>

                        (<?php echo e(runtimeMoneyFormat($package->package_amount_monthly)); ?> / <?php echo app('translator')->get('lang.month'); ?>)
                    </option>
                    <option data-option="yearly" value="<?php echo e($package->package_id); ?>"><?php echo e($package->package_name); ?>

                        (<?php echo e(runtimeMoneyFormat($package->package_amount_yearly)); ?> / <?php echo app('translator')->get('lang.year'); ?>)
                    </option>
                    <?php else: ?>
                    <option data-option="free" value="<?php echo e($package->package_id); ?>"><?php echo e($package->package_name); ?>

                        (<?php echo app('translator')->get('lang.free'); ?>)</option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="hidden" name="billing_cycle" id="billing_cycle" value="monthly">
            </div>
        </div>


        <!--subscription_payment_method-->
        <div class="hidden" id="toggle_subscription_payment_method">
            <!--item-->
            <div class="form-group row">
                <label
                    class="col-sm-12 col-lg-5 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.billing'); ?></label>
                <div class="col-sm-12 col-lg-7">
                    <select class="select2-basic form-control form-control-sm" id="subscription_payment_method"
                        name="subscription_payment_method">
                        <option value="automatic"><?php echo app('translator')->get('lang.automatic_billing'); ?></option>
                        <option value="offline"><?php echo app('translator')->get('lang.manual_billing'); ?></option>
                    </select>
                </div>
            </div>
        </div>


        <!--free trial-->
        <div class="hidden" id="free_plan_container">
            <div class="form-group row">
                <label
                    class="col-sm-12 col-lg-5 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.free_trial'); ?></label>
                <div class="col-sm-12 col-lg-7" id="package-type-paid">
                    <select class="select2-basic form-control form-control-sm" id="free_trial" name="free_trial">
                        <option value="no"><?php echo app('translator')->get('lang.no'); ?></option>
                        <option value="yes"><?php echo app('translator')->get('lang.yes'); ?></option>
                    </select>
                </div>
            </div>

            <!--free_trial_days-->
            <div class="hidden" id="toggle_trial_date">
                <div class="form-group row">
                    <label
                        class="col-sm-12 col-lg-5 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.free_trial_duration'); ?></label>
                    <div class="col-sm-12 col-lg-7">
                        <div class="input-group input-group-sm input-group-right">
                            <input type="text" class="form-control" id="free_trial_days" name="free_trial_days"
                                value="<?php echo e(config('system.settings_free_trial_days') ?? 0); ?>">
                            <span class="input-group-addon"><?php echo app('translator')->get('lang.days'); ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--domain-->
        <div class="modal-selector m-t-30">
            <div class="form-group row">
                <label
                    class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.account_name'); ?></label>
                <div class="col-sm-12 col-lg-9">
                    <div class="input-group input-group-sm input-group-both">
                        <span class="input-group-addon">https://</span>
                        <input type="text" class="form-control" id="account_name" name="account_name"
                            value="<?php echo e($customer->subdomain ?? ''); ?>">
                        <span class="input-group-addon"> . <?php echo e(config('system.settings_base_domain')); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <?php if(config('visibility.send_welcome_email_checkbox')): ?>
        <div class="form-group form-group-checkbox row">
            <div class="col-12 p-t-5">
                <input type="checkbox" id="send_welcome_email" name="send_welcome_email"
                    class="filled-in chk-col-light-blue" checked>
                <label class="p-l-30" for="send_welcome_email"><?php echo app('translator')->get('lang.send_welcome_email'); ?></label>
            </div>
        </div>
        <?php endif; ?>

        <!--DEMO INFO-->
        <?php if(config('app.application_demo_mode')): ?>
        <div class="alert alert-danger"><h5 class="text-danger"><i class="sl-icon-danger"></i> Demo Info</h5>
          This customer's account will be created with a demo password <strong>growcrm</strong>  
        </div>
        <?php endif; ?>

    </div>
</div><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/customers/modal/add-edit-inc.blade.php ENDPATH**/ ?>