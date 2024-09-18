
<?php $__env->startSection('settings_content'); ?>


<!--page heading-->
<div class="row page-titles">

    <!-- action buttons -->
    <?php echo $__env->make('landlord.frontend.mainmenu.actions.page-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- action buttons -->

</div>
<!--page heading-->

<!--form-->
<div class="card">
    <div class="card-body" id="landlord-settings-form">

        <div class="table-responsive list-table-wrapper">
            <?php if(@count($items) > 0): ?>
            <table id="main-menu-list-table" class="table m-t-0 m-b-0 table-hover no-wrap item-list" data-page-size="10"
                data-type="form" data-form-id="main-menu-list-table" data-ajax-type="post"
                data-url="<?php echo e(url('/app-admin/frontend/mainmenu/update-positions')); ?>">
                <thead>
                    <tr>
                        <!--item-->
                        <th class="col_name">
                            <?php echo app('translator')->get('lang.name'); ?>
                        </th>
                        <!--item-->
                        <th class="col_link">
                            <?php echo app('translator')->get('lang.link'); ?>
                        </th>
                        <!--actions-->
                        <th class="col_action w-px-100"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.action'); ?></a></th>
                    </tr>
                </thead>
                <tbody id="main-menu-td-container">
                    <!--ajax content here-->
                    <?php echo $__env->make('landlord.frontend.mainmenu.table.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!--ajax content here-->

                    <!--bulk actions - change category-->
                    <input type="hidden" id="checkbox_actions_items_category">
                </tbody>
            </table>
            <?php endif; ?> <?php if(@count($items) == 0): ?>
            <!--nothing found-->
            <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--nothing found-->
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="public/js/landlord/dynamic/mainmenu.sortable.js?v=<?php echo e(config('system.versioning')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landlord.frontend.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/mainmenu/table/table.blade.php ENDPATH**/ ?>