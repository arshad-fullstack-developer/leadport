<!--totals-->
<tr class="report-results-table-totals">
    <td class="no-sort" colspan="1"><?php echo app('translator')->get('lang.page_totals'); ?></td>

    <!--count_projects_pending-->
    <td class="no-sort">
        <?php echo e($totals['count_projects_pending']); ?></td>

    <!--count_projects_completed-->
    <td class="no-sort">
        <?php echo e($totals['count_projects_completed']); ?></td>

    <!--count_tasks_due-->
    <td class="no-sort">
        <?php echo e($totals['count_tasks_due']); ?></td>

    <!--count_tasks_completed-->
    <td class="no-sort"><?php echo e($totals['count_tasks_completed']); ?></td>

    <!--sum_hours-->
    <td class="no-sort">
        <?php if($totals['sum_hours'] == 0): ?>
        0
        <?php else: ?>
        <?php echo e(runtimeSecondsWholeHours($totals['sum_hours'])); ?>:<?php echo e(runtimeSecondsWholeMinutesZero($totals['sum_hours'])); ?>

        <?php endif; ?>
    </td>

    <!--sum_expenses-->
    <td class="data-type-money no-sort" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($totals['sum_expenses'] ?? 0)); ?></td>

    <!--sum_invoices-->
    <td class="data-type-money no-sort" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($totals['sum_invoices'] ?? 0)); ?>

    </td>

    <!--sum_payments-->
    <td class="data-type-money no-sort" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($totals['sum_payments'] ?? 0)); ?>

    </td>
</tr><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/reports/projects/category/footer.blade.php ENDPATH**/ ?>