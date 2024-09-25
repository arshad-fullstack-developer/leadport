<!--totals-->
<tr class="report-results-table-totals">
    <td colspan="1"><?php echo app('translator')->get('lang.page_totals'); ?></td>

    <!--count_projects-->
    <td>
        <?php echo e($totals['count_projects']); ?></td>

    <!--count_projects_not_started-->
    <td>
        <?php echo e($totals['count_projects_not_started']); ?></td>

    <!--count_projects_on_hold-->
    <td>
        <?php echo e($totals['count_projects_on_hold']); ?></td>

    <!--count_projects_cancelled-->
    <td>
        <?php echo e($totals['count_projects_cancelled']); ?></td>

    <!--count_projects_completed-->
    <td>
        <?php echo e($totals['count_projects_completed']); ?></td>

    <!--count_tasks_due-->
    <td>
        <?php echo e($totals['count_tasks_due']); ?></td>

    <!--count_tasks_completed-->
    <td>
        <?php echo e($totals['count_tasks_completed']); ?></td>

    <!--sum_hours-->
    <td>
        <?php echo e(runtimeSecondsWholeHours($totals['sum_hours'])); ?>:<?php echo e(runtimeSecondsWholeMinutesZero($totals['sum_hours'])); ?></td>
</tr>

<!--pagination-->
<tr>
    <td class="pagination-container" data-tableexport-display="none" colspan="11">
        <div class="pagination">
            <?php echo e($projects->links('pages.reports.components.misc.pagination')); ?>

        </div>
    </td>
</tr><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/reports/projects/client/footer.blade.php ENDPATH**/ ?>