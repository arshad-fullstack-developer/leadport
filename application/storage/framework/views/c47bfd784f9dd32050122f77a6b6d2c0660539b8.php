<!--ALL THIRD PARTY JAVASCRIPTS-->
<script src="<?php echo e(asset('public/vendor/js/vendor.footer.js?v=' . config('system.versioning'))); ?>"></script>

<!--nextloop.core.js-->
<script src="<?php echo e(asset('public/js/core/ajax.js?v=' . config('system.versioning'))); ?>"></script>

<!--MAIN JS - AT END-->
<script src="<?php echo e(asset('public/js/core/boot.js?v=' . config('system.versioning'))); ?>"></script>

<!--EVENTS-->
<script src="<?php echo e(asset('public/js/core/events.js?v=' . config('system.versioning'))); ?>"></script>

<!--CORE-->
<script src="<?php echo e(asset('public/js/core/app.js?v=' . config('system.versioning'))); ?>"></script>

<!--SEARCH-->
<script src="<?php echo e(asset('public/js/core/search.js?v=' . config('system.versioning'))); ?>"></script>

<!--BILLING-->
<script src="<?php echo e(asset('public/js/core/billing.js?v=' . config('system.versioning'))); ?>"></script>

<!--PROJECT PAGE CHARTS-->
<?php if(config('visibility.projects_d3_vendor')): ?>
<script src="<?php echo e(asset('public/vendor/js/d3/d3.min.js?v=' . config('system.versioning'))); ?>"></script>
<script src="<?php echo e(asset('public/vendor/js/c3-master/c3.min.js?v=' . config('system.versioning'))); ?>"></script>
<?php endif; ?>

<!--FORM BUILDER-->
<?php if(config('visibility.web_form_builder')): ?>
<script src="<?php echo e(asset('public/vendor/js/formbuilder/form-builder.min.js?v=' . config('system.versioning'))); ?>"></script>
<script src="<?php echo e(asset('public/js/webforms/webforms.js?v=' . config('system.versioning'))); ?>"></script>
<?php endif; ?>

<!--EXPORT JS-->
<script src="<?php echo e(asset('public/js/core/export.js?v=' . config('system.versioning'))); ?>"></script>
<script src="<?php echo e(asset('public/vendor/js/exportjs/libs/FileSaver/FileSaver.min.js?v=' . config('system.versioning'))); ?>"></script>
<script src="<?php echo e(asset('public/vendor/js/exportjs/libs/js-xlsx/xlsx.core.min.js?v=' . config('system.versioning'))); ?>"></script>
<script src="<?php echo e(asset('public/vendor/js/exportjs/tableExport.min.js?v=' . config('system.versioning'))); ?>"></script>

<!--PRINTING-->
<script src="<?php echo e(asset('public/vendor/js/printthis/printthis.js?v=' . config('system.versioning'))); ?>"></script>

<!--TABLE SORTER-->
<script src="<?php echo e(asset('public/vendor/js/tablesorter/js/jquery.tablesorter.min.js?v=' . config('system.versioning'))); ?>"></script>
<?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/layout/footerjs.blade.php ENDPATH**/ ?>