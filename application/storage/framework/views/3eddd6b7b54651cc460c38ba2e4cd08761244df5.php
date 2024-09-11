<div class="splash-image" id="updatePasswordSplash">
    <img src="<?php echo e(url('/')); ?>/public/images/upload-logo.png" alt="update logo" />
</div>
<!--fileupload-->
<div class="form-group row">
    <div class="col-12">
        <div class="dropzone dz-clickable text-center file-upload-box" id="fileupload_landlord_logo">
            <div class="dz-default dz-message">
                <div>
                    <h4><?php echo e(cleanLang(__('lang.drag_drop_file'))); ?></h4>
                </div>
                <div class="p-t-10"><small><?php echo e(cleanLang(__('lang.allowed_file_types'))); ?>: (jpg|png|ico)</small></div>
                <?php if(request('logo_size') == 'frontend-logo'): ?>
                <div class="p-t-10"><small><?php echo e(cleanLang(__('lang.allowed_file_types'))); ?>: (jpg|png)</small></div>
                <div class=""><small><?php echo e(cleanLang(__('lang.best_image_dimensions'))); ?>: (185px X 45px)</small></div>
                <?php endif; ?>
                <?php if(request('logo_size') == 'frontend-favicon'): ?>
                <div class="p-t-10"><small><?php echo e(cleanLang(__('lang.allowed_file_types'))); ?>: (ico)</small></div>
                <div class=""><small><?php echo e(cleanLang(__('lang.best_image_dimensions'))); ?>: (16px X 16px)</small></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!--section js resource-->
<span class="hidden" id="js-settings-logos-modal" data-size="<?php echo e(request('logo_size')); ?>">placeholder</span><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/logo/modals/update-logo.blade.php ENDPATH**/ ?>