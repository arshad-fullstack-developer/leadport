<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="inner-page faq">

    <?php echo $__env->make('frontend.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.layout.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--page heading-->
    <div class="container page-wrapper faq">

        <div class="page-header faq-header text-center">
            <h2><?php echo _clean($content->frontend_data_1); ?></h2>
            <h5><?php echo _clean($content->frontend_data_2); ?></h5>
        </div>


        <!--faq container-->
        <div class="faq-container">

            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="each-faq" data-target="faq_<?php echo e($faq->faq_id); ?>">
                <div class="faq-title">
                    <?php echo e($faq->faq_title); ?>

                </div>
                <div class="faq-content hidden" id="faq_<?php echo e($faq->faq_id); ?>">
                    <?php echo _clean($faq->faq_content); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

    <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.layout.footerjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/frontend/faq/page.blade.php ENDPATH**/ ?>