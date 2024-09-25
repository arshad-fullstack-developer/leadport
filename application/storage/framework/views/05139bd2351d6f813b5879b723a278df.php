<!--rows-->
<?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>

    <!--full_name-->
    <td>
        <a href="<?php echo e(url('/clients/'.$timesheet->client_id )); ?>"><?php echo e($timesheet->client_company_name ?? '---'); ?></a>
    </td>

    <!--sum_not_invoiced-->
    <td>
        <?php echo e(runtimeSecondsWholeHours($timesheet->sum_not_invoiced)); ?>:<?php echo e(runtimeSecondsWholeMinutesZero($timesheet->sum_not_invoiced)); ?>

    </td>


    <!--sum_invoiced-->
    <td>
        <?php echo e(runtimeSecondsWholeHours($timesheet->sum_invoiced)); ?>:<?php echo e(runtimeSecondsWholeMinutesZero($timesheet->sum_invoiced)); ?>

    </td>

    <!--sum_hours-->
    <td>
        <?php echo e(runtimeSecondsWholeHours($timesheet->sum_hours)); ?>:<?php echo e(runtimeSecondsWholeMinutesZero($timesheet->sum_hours)); ?>

    </td>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/reports/timesheets/client/ajax.blade.php ENDPATH**/ ?>