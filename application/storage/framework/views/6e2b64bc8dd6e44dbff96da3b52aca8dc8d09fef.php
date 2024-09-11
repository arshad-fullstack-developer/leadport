
<?php $__env->startSection('settings_content'); ?>


<!--page heading-->
<div class="row page-titles">

    <!-- action buttons -->
    <?php echo $__env->make('landlord.frontend.faq.actions.page-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- action buttons -->

</div>
<!--page heading-->

<!--form-->
<div class="card">
    <div class="card-body" id="landlord-settings-form">


        <!--heading-->
        <div class="form-group row">
            <label class="col-sm-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.heading'); ?></label>
            <div class="col-sm-12">
                <input type="text" class="form-control form-control-sm" id="frontend_data_1" name="frontend_data_1"
                    value="<?php echo e($section->frontend_data_1 ?? ''); ?>">
            </div>
        </div>

        <!--subheading-->
        <div class="form-group row">
            <label class="col-sm-12 text-left control-label col-form-label required"><?php echo app('translator')->get('lang.subheading'); ?></label>
            <div class="col-sm-12">
                <input type="text" class="form-control form-control-sm" id="frontend_data_2" name="frontend_data_2"
                    value="<?php echo e($section->frontend_data_2 ?? ''); ?>">
            </div>
        </div>

        <div class="table-responsive list-table-wrapper">
            <?php if(@count($faqs) > 0): ?>
            <table id="faq-list-table" class="table m-t-0 m-b-0 table-hover no-wrap item-list" data-page-size="10"
                data-type="form" data-form-id="faq-td-container" data-ajax-type="post"
                data-url="<?php echo e(url('/app-admin/frontend/faq/update-positions')); ?>">
                <thead>
                    <tr>
                        <!--item-->
                        <th class="col_name">
                            <?php echo app('translator')->get('lang.title'); ?>
                        </th>
                        <!--actions-->
                        <th class="col_action w-px-100"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.action'); ?></a></th>
                    </tr>
                </thead>
                <tbody id="faq-td-container">
                    <!--ajax content here-->
                    <?php echo $__env->make('landlord.frontend.faq.table.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!--ajax content here-->

                    <!--bulk actions - change category-->
                    <input type="hidden" id="checkbox_actions_items_category">
                </tbody>
            </table>
            <?php endif; ?> <?php if(@count($faqs) == 0): ?>
            <!--nothing found-->
            <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--nothing found-->
            <?php endif; ?>
        </div>

        <!--submit-->
        <div class="text-right">
            <button type="submit"
                class="btn btn-rounded-x btn-danger btn-sm waves-effect text-left ajax-request"
                data-url="<?php echo e(url('/app-admin/frontend/faq/update')); ?>" data-form-id="landlord-settings-form"
                data-loading-target="" data-ajax-type="post" data-type="form"
                data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
        </div>
    </div>
</div>

<script src="public/js/landlord/dynamic/faq.sortable.js?v=<?php echo e(config('system.versioning')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landlord.frontend.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/faq/table/table.blade.php ENDPATH**/ ?>