
<?php $__env->startSection('document'); ?>
<div class="col-12">

    <div class="docs-main-wrapper editing-mode box-shadow">

        <!--hero header-->
        <div class="hero-header-wrapper" id="hero-header-wrapper">
            <!--[element] here header-->
            <?php echo $__env->make('pages.documents.elements.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>


            <!--[element] doc to and by-->
            <?php echo $__env->make('pages.documents.elements.doc-to-by', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--[element] dates-->
            <?php echo $__env->make('pages.documents.elements.doc-details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="doc-body">
            <!--[element] editor-->
            <?php echo $__env->make('pages.documents.elements.doc-editor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<!--filter panels-->
<?php if(auth()->user()->is_team): ?>
<?php echo $__env->make('pages.documents.editing.sidepanel-hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('pages.documents.editing.sidepanel-variables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('pages.documents.editing.sidepanel-billing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('pages.documents.editing.sidepanel-details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--filter-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.documents.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/documents/editing/page.blade.php ENDPATH**/ ?>