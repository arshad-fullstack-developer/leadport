<!--rows-->
<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>

    <!--client_company_name-->
    <td><a href="<?php echo e(url('clients/'.$project->client_id)); ?>"><?php echo e($project->client_company_name); ?></a>
    </td>

    <!--count_projects-->
    <td>
        <?php echo e($project->count_projects); ?></td>

    <!--count_projects_not_started-->
    <td>
        <?php echo e($project->count_projects_not_started); ?></td>

    <!--count_projects_on_hold-->
    <td>
        <?php echo e($project->count_projects_on_hold); ?></td>

    <!--count_projects_cancelled-->
    <td>
        <?php echo e($project->count_projects_cancelled); ?></td>

    <!--count_projects_completed-->
    <td>
        <?php echo e($project->count_projects_completed); ?></td>

    <!--count_tasks_due-->
    <td>
        <?php echo e($project->count_tasks_due); ?></td>

    <!--count_tasks_completed-->
    <td>
        <?php echo e($project->count_tasks_completed); ?></td>


    <!--sum_hours-->
    <td>
        <?php echo e(runtimeSecondsWholeHours($project->sum_hours)); ?>:<?php echo e(runtimeSecondsWholeMinutesZero($project->sum_hours)); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/reports/projects/client/ajax.blade.php ENDPATH**/ ?>