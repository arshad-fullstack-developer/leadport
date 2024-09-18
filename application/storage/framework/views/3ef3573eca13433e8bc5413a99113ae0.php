
<?php $__env->startSection('settings_content'); ?>

<!--tabs menu-->
<?php echo $__env->make('landlord.frontend.components.home-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--form-->
<div class="card">
    <div class="card-body" id="landlord-settings-form">

        <form class="form" id="settingsForm">


            <!--heading_1-->
            <div class="form-group row">
                <label class="col-sm-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.heading_1'); ?></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" id="frontend_data_1" name="frontend_data_1"
                        value="<?php echo e($section->frontend_data_1 ?? ''); ?>">
                </div>
            </div>

            <!--heading_2-->
            <div class="form-group row">
                <label class="col-sm-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.heading_2'); ?></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" id="frontend_data_2" name="frontend_data_2"
                        value="<?php echo e($section->frontend_data_2 ?? ''); ?>">
                </div>
            </div>

            <!--description-->
            <div class="form-group row">
                <label class="col-sm-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.description'); ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control form-control-sm tinymce-textarea" rows="15"
                        name="frontend_data_3"
                        id="frontend_data_3"><?php echo e($section->frontend_data_3 ?? ''); ?></textarea>
                </div>
            </div>


            
            <!--fileupload-->
            <div class="form-group row">
                <label class="col-sm-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.image'); ?></label>
                <div class="col-12">
                    <div class="dropzone dz-clickable" id="fileupload_image">
                        <div class="dz-default dz-message">
                            <i class="icon-Upload-toCloud"></i>
                            <span><?php echo app('translator')->get('lang.drag_drop_file'); ?></span>
                        </div>
                    </div>
                </div>
            </div>


            <!--submit-->
            <div class="text-right">
                <button type="submit" class="btn btn-rounded-x btn-danger btn-sm waves-effect text-left ajax-request"
                    data-url="<?php echo e(url('/app-admin/frontend/section/'.request()->segment(4).'/feature')); ?>" data-form-id="landlord-settings-form"
                    data-loading-target="" data-ajax-type="post" data-type="form"
                    data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
            </div>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landlord.frontend.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/feature/page.blade.php ENDPATH**/ ?>