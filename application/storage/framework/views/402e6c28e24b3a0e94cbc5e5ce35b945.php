<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

    <!--page heading-->
    <div class="container page-wrapper pages-wrapper faq">

        <?php if($page['page_title']): ?>
        <div class="pages-header text-center">
            <h4><?php echo e($page['page_title'] ?? ''); ?> -- (<?php echo e(env('APP_NAME')); ?>)</h4>
        </div>
        <?php endif; ?>
        
        <!--faq container-->
        <div class="pages-container">
            <?php if(isset($ticket)): ?>
            <?php echo $__env->make('pages.customtickets.components.request.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        
            <?php else: ?>
            <?php echo $__env->make('pages.customtickets.components.request.request', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        
            <?php endif; ?>
       </div>
    </div>

    <?php echo $__env->make('frontend.layout.footerjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/customtickets/components/request/page.blade.php ENDPATH**/ ?>