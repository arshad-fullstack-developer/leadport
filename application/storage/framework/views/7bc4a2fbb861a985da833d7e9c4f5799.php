
<!--title-->
<?php echo $__env->make('pages.task.components.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--[dependency][lock-1] start-->
<?php if(config('visibility.task_is_locked')): ?>
<div class="alert alert-warning"><?php echo app('translator')->get('lang.task_dependency_info_cannot_be_started'); ?></div>
<?php else: ?>

<?php if($task->transport_type === 'transport'): ?>
<?php echo $__env->make('pages.task.content.customfields.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<!--description-->
<?php echo $__env->make('pages.task.components.description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--checklist-->
<?php echo $__env->make('pages.task.components.checklists', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--attachments-->
<?php echo $__env->make('pages.task.components.attachments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--comments-->
<?php if(config('visibility.tasks_standard_features')): ?>
<div class="card-comments" id="card-comments">
    <div class="x-heading"><i class="mdi mdi-message-text"></i><?php echo e(cleanLang(__('lang.comments'))); ?></div>
    <div class="x-content">
        <?php echo $__env->make('pages.task.components.post-comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--comments-->
        <div id="card-comments-container">
            <!--dynamic content here-->
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
<!--[dependency][lock-1] end--><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/task/leftpanel.blade.php ENDPATH**/ ?>