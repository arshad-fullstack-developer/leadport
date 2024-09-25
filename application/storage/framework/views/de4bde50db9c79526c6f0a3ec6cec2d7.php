<!--rows-->
<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>

    <!--category_name-->
    <td><?php echo e(str_limit_reports($project['category_name'] ?? '---', 40)); ?>

    </td>

    <!--count_projects_pending-->
    <td>
        <?php echo e($project['count_projects_pending']); ?></td>

    <!--count_projects_completed-->
    <td>
        <?php echo e($project['count_projects_completed']); ?></td>

    <!--count_tasks_due-->
    <td>
        <?php echo e($project['count_tasks_due']); ?></td>

    <!--count_tasks_completed-->
    <td>
        <?php echo e($project['count_tasks_completed']); ?></td>


    <!--sum_hours-->
    <td>
        <?php echo e(runtimeSecondsWholeHours($project['sum_hours'])); ?>:<?php echo e(runtimeSecondsWholeMinutesZero($project['sum_hours'])); ?></td>

    <!--sum_expenses-->
    <td class="data-type-money" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($project['sum_expenses'])); ?></td>

    <!--sum_invoices-->
    <td class="data-type-money" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($project['sum_invoices'])); ?></td>

    <!--sum_payments-->
    <td class="data-type-money" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($project['sum_payments'])); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/reports/projects/category/ajax.blade.php ENDPATH**/ ?>