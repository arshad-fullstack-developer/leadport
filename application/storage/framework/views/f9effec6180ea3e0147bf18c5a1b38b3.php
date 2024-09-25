<!--table-->
<?php if(@count($projects ?? []) > 0): ?>
<div class="table-responsive report-results-table-container" id="report-results-container">
    <table class="table table-hover no-wrap" id="report-results-table">
        <thead>
            <tr>

                <!--client_company_name-->
                <th class="col_project_id"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.client'); ?><span
                            class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>

                <!--count_projects-->
                <th class="col_count_projects"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.all_projects'); ?><span
                            class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>
                <!--count_projects_not_started-->
                <th class="col_count_projects_pending"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.not_started'); ?><span
                            class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>
                <!--count_projects_on_hold-->
                <th class="col_count_projects"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.on_hold'); ?><span
                            class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>
                <!--count_projects_cancelled-->
                <th class="col_count_projects"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.cancelled'); ?><span
                            class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>
                <!--count_projects_completed-->
                <th class="col_count_projects_completed"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.completed'); ?><span
                            class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>

                <!--count_tasks_due-->
                <th class="col_count_tasks_due"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.due_tasks'); ?><span
                            class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>

                <!--count_tasks_completed-->
                <th class="col_count_tasks_completed"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.completed_tasks'); ?><span
                            class="sorting-icons"><i class="ti-arrows-vertical"></i></span></a></th>


                <!--sum_hours-->
                <th class="col_sum_hours"><a href="javascript:void(0)"><?php echo app('translator')->get('lang.hours_mins'); ?><span class="sorting-icons"><i
                                class="ti-arrows-vertical"></i></span></a></th>

            </tr>
        </thead>
        <tbody id="report-results-ajax-container">
            <!--rows-->
            <?php echo $__env->make('pages.reports.projects.client.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </tbody>
        <tfoot>
            <?php echo $__env->make('pages.reports.projects.client.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </tfoot>
    </table>

</div>
<?php else: ?>
<div id="report-results-container">
    <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/reports/projects/client/table.blade.php ENDPATH**/ ?>