
<?php $__env->startSection('settings_content'); ?>

<!--form-->
<div class="card">
    <div class="card-body" id="landlord-settings-form">

        <!--from email address-->
        <div class="form-group row">
            <label
                class="col-12 control-label col-form-label required"><?php echo e(cleanLang(__('lang.system_email_address'))); ?>*</label>
            <div class="col-12">
                <input type="text" class="form-control form-control-sm" id="settings_email_from_address"
                    name="settings_email_from_address" value="<?php echo e($settings->settings_email_from_address ?? ''); ?>">
            </div>
        </div>

        <!--from name-->
        <div class="form-group row">
            <label
                class="col-12 control-label col-form-label required"><?php echo e(cleanLang(__('lang.system_from_name'))); ?>*</label>
            <div class="col-12">
                <input type="text" class="form-control form-control-sm" id="settings_email_from_name"
                    name="settings_email_from_name" value="<?php echo e($settings->settings_email_from_name ?? ''); ?>">
            </div>
        </div>

        <!--server type-->
        <div class="form-group row">
            <label for="example-month-input"
                class="col-12 col-form-label text-left required"><?php echo e(cleanLang(__('lang.email_delivery'))); ?>*</label>
            <div class="col-12">
                <select class="select2-basic form-control form-control-sm" id="settings_email_server_type"
                    name="settings_email_server_type">
                    <option value="sendmail"
                        <?php echo e(runtimePreselected('sendmail', $settings->settings_email_server_type ?? '')); ?>>
                        Sendmail</option>
                    <option value="smtp" <?php echo e(runtimePreselected('smtp', $settings->settings_email_server_type ?? '')); ?>>
                        SMTP</option>
                </select>
            </div>
        </div>

        <!--show error if cronjob has not run before-->
        <?php if($settings->settings_cronjob_has_run != 'yes'): ?>
        <div class="splash-text">
            <div class="alert alert-danger"><?php echo e(cleanLang(__('lang.cronjob_and_emails'))); ?>. <a
                    href="https://growcrm.io/documentation/cron-job-settings/"
                    target="_blank"><?php echo app('translator')->get('lang.more_information'); ?></a></div>
        </div>
        <?php endif; ?>
        
        <!--buttons-->
        <div class="text-right">

            <!--send a test email-->
            <button type="button" class="btn btn-info edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal"
                data-url="<?php echo e(url('app-admin/settings/email/testemail')); ?>" data-loading-target="commonModalBody"
                data-modal-title="Send A Test Email" data-action-url="<?php echo e(url('app-admin/settings/email/testemail')); ?>"
                data-action-method="POST" data-action-ajax-class="" data-action-type='form'
                data-action-form-id="test-email-form""
                            data-modal-size=" modal-lg" data-header-close-icon="hidden"
                data-header-extra-close-icon="visible"
                data-action-ajax-loading-target="commonModalBody"><?php echo e(cleanLang(__('lang.send_test_email'))); ?>

            </button>

            <!--submit-->
            <button type="submit" id="submitButton"
                class="btn btn-rounded-x btn-success waves-effect text-left ajax-request"
                data-url="<?php echo e(url('app-admin/settings/email')); ?>" data-form-id="landlord-settings-form"
                data-loading-target="" data-ajax-type="post" data-type="form"
                data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('landlord.settings.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/settings/sections/email/page.blade.php ENDPATH**/ ?>