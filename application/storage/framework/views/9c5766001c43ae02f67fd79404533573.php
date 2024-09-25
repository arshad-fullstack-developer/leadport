<!--rows-->
<?php $__currentLoopData = $timesheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timesheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>

    <!--full_name-->
    <td>
        <img src="<?php echo e(getUsersAvatar($timesheet->avatar_directory, $timesheet->avatar_filename, $timesheet->id)); ?>"
            alt="user" class="img-circle avatar-xsmall">
        <?php echo e(checkUsersName($timesheet->first_name, $timesheet->id)); ?>

    </td>

    <!--role_name-->
    <td>
        <?php echo e($timesheet->role_name); ?></td>


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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/reports/timesheets/team/ajax.blade.php ENDPATH**/ ?>