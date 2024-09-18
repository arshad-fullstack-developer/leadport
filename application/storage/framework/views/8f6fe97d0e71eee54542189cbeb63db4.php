
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

            <!--submit-->
            <div class="text-right">
                <button type="submit" class="btn btn-rounded-x btn-danger btn-sm waves-effect text-left ajax-request"
                    data-url="<?php echo e(url('/app-admin/frontend/section/'.request()->segment(4).'/list')); ?>" data-form-id="landlord-settings-form"
                    data-loading-target="" data-ajax-type="post" data-type="form"
                    data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
            </div>



            <div class="line m-t-30 m-b-10"></div>

            <!--each sub section-->
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('landlord.frontend.components.icon-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landlord.frontend.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/sectionlist/page.blade.php ENDPATH**/ ?>