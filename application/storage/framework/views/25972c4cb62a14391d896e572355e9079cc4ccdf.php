
<?php $__env->startSection('settings_content'); ?>

<!--form-->
<div class="card">
    <div class="card-body" id="landlord-settings-form">

        <form class="form" id="settingsForm">



            <!--footer section-->
            <div class="form-group row">
                <label class="col-sm-12 text-left control-label col-form-label"><?php echo app('translator')->get('lang.section_1'); ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control form-control-sm tinymce-textarea-footer" rows="5"
                        name="html_frontend_data_1" id="html_frontend_data_1"><?php echo e($section->frontend_data_1 ?? ''); ?></textarea>

                </div>
            </div>

            <!--footer section-->
            <div class="form-group row">
                <label class="col-sm-12 text-left control-label col-form-label"><?php echo app('translator')->get('lang.section_2'); ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control form-control-sm tinymce-textarea-footer" rows="5"
                        name="html_frontend_data_2" id="html_frontend_data_2"><?php echo e($section->frontend_data_2 ?? ''); ?></textarea>

                </div>
            </div>

            <!--footer section-->
            <div class="form-group row">
                <label class="col-sm-12 text-left control-label col-form-label"><?php echo app('translator')->get('lang.section_3'); ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control form-control-sm tinymce-textarea-footer" rows="5"
                        name="html_frontend_data_3" id="html_frontend_data_3"><?php echo e($section->frontend_data_3 ?? ''); ?></textarea>

                </div>
            </div>

            <!--footer section-->
            <div class="form-group row">
                <label class="col-sm-12 text-left control-label col-form-label"><?php echo app('translator')->get('lang.section_4'); ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control form-control-sm tinymce-textarea-footer" rows="5"
                        name="html_frontend_data_4" id="html_frontend_data_4"><?php echo e($section->frontend_data_4 ?? ''); ?></textarea>

                </div>
            </div>


            <!--submit-->
            <div class="text-right">
                <button type="submit" id="commonModalSubmitButton"
                    class="btn btn-rounded-x btn-danger btn-sm waves-effect text-left ajax-request"
                    data-url="<?php echo e(url('/app-admin/frontend/footer')); ?>" data-form-id="landlord-settings-form"
                    data-loading-target="" data-ajax-type="post" data-type="form"
                    data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landlord.frontend.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/footer/page.blade.php ENDPATH**/ ?>