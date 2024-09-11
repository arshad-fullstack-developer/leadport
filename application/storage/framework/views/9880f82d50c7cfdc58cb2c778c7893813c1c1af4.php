
<?php $__env->startSection('settings_content'); ?>


<!--page heading-->
<div class="row page-titles">

    <!-- action buttons -->
    <?php echo $__env->make('landlord.frontend.pages.actions.page-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- action buttons -->

</div>
<!--page heading-->

<!--form-->
<div class="card">
    <div class="card-body" id="landlord-settings-form">


        <div class="table-responsive list-table-wrapper">
            <?php if(@count($pages) > 0): ?>
            <table id="pages-list-table" class="table m-t-0 m-b-0 table-hover no-wrap item-list" data-page-size="10"
                data-type="form" data-form-id="pages-td-container" data-ajax-type="post"
                data-url="<?php echo e(url('/app-admin/frontend/pages/update-positions')); ?>">
                <thead>
                    <tr>
                        <!--page_title-->
                        <th class="col_page_title"><a class="js-ajax-ux-request js-list-sorting" id="sort_page_title"
                                href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('app-admin/pages?action=sort&orderby=page_title&sortorder=asc')); ?>"><?php echo app('translator')->get('lang.title'); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>

                        <!--creator-->
                        <th class="col_creator"><a class="js-ajax-ux-request js-list-sorting" id="sort_creator"
                                href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('app-admin/pages?action=sort&orderby=creator&sortorder=asc')); ?>"><?php echo app('translator')->get('lang.created_by'); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>

                        <!--page_created-->
                        <th class="col_page_created"><a class="js-ajax-ux-request js-list-sorting" id="sort_page_title"
                                href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('app-admin/pages?action=sort&orderby=page_created&sortorder=asc')); ?>"><?php echo app('translator')->get('lang.created'); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>

                        <!--page_status-->
                        <th class="col_page_status"><a class="js-ajax-ux-request js-list-sorting" id="sort_page_title"
                                href="javascript:void(0)"
                                data-url="<?php echo e(urlResource('app-admin/pages?action=sort&orderby=page_status&sortorder=asc')); ?>"><?php echo app('translator')->get('lang.status'); ?><span
                                    class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>

                        <!--actions-->
                        <th class="col_action w-px-100"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.action'); ?></a></th>
                    </tr>
                </thead>
                <tbody id="pages-td-container">
                    <!--ajax content here-->
                    <?php echo $__env->make('landlord.frontend.pages.table.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!--ajax content here-->

                    <!--bulk actions - change category-->
                    <input type="hidden" id="checkbox_actions_items_category">
                </tbody>
            </table>
            <?php endif; ?> <?php if(@count($pages) == 0): ?>
            <!--nothing found-->
            <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--nothing found-->
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('landlord.frontend.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/frontend/pages/table/table.blade.php ENDPATH**/ ?>