
<?php $__env->startSection('settings_content'); ?>

<!--page heading-->
<div class="row page-titles">
    <?php echo $__env->make('landlord.misc.crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--select dropdown-->
    <div class="col-md-12 col-lg-7 clearfix p-t-19">
        <div id="list-page-actions" class="pull-right w-px-300 select-email-template-dropdown"
            id="fx-settings-emailtemplates-dropdown">
            <form id="fix-form-email-templates">
                <select class="select2-basic form-control form-control-sm text-left" data-url=""
                    id="selectEmailTemplate" name="selectEmailTemplate">
                    <option value="0"><?php echo app('translator')->get('lang.select_a_template'); ?></option>
                    <!--customer emails-->
                    <optgroup label="<?php echo e(cleanLang(__('lang.customer'))); ?>">
                        <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(url('app-admin/settings/emailtemplates/'.$template->emailtemplate_id)); ?>">
                            <?php echo e(runtimeLang($template->emailtemplate_lang)); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                    <!--admin   -->
                    <optgroup label="<?php echo e(cleanLang(__('lang.admin'))); ?>">
                        <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(url('app-admin/settings/emailtemplates/'.$template->emailtemplate_id)); ?>">
                            <?php echo e(runtimeLang($template->emailtemplate_lang)); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                    <!--other-->
                    <optgroup label="<?php echo e(cleanLang(__('lang.other'))); ?>">
                        <?php $__currentLoopData = $other; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(url('app-admin/settings/emailtemplates/'.$template->emailtemplate_id)); ?>">
                            <?php echo e(runtimeLang($template->emailtemplate_lang)); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                    <!--system-->
                    <optgroup label="<?php echo e(cleanLang(__('lang.system'))); ?>">
                        <?php $__currentLoopData = $system; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(url('app-admin/settings/emailtemplates/'.$template->emailtemplate_id)); ?>">
                            <?php echo e(runtimeLang($template->emailtemplate_lang)); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                </select>
            </form>
        </div>
    </div>
</div>





<!--form-->
<div class="card">
    <div class="card-body min-h-400" id="landlord-settings-form">
        <!--welcome-->
        <div class="row">
            <div class="col-12">
                <div class="page-notification-imaged">
                    <img src="<?php echo e(url('/')); ?>/public/images/email.png" alt="Application Settings" />
                    <div class="message">
                        <h4><?php echo e(cleanLang(__('lang.select_email_template_from_dropdown'))); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landlord.settings.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/settings/sections/emailtemplates/page.blade.php ENDPATH**/ ?>