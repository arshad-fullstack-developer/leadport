    <!--VENDORS-->
    <script src="<?php echo e(asset('public/js/landlord/frontend/vendor.js')); ?>"></script>

    <!-- Mobile Menu JS -->
    <script src="<?php echo e(asset('public/themes/frontend/assets/plugins/meanmenu/jquery.meanmenu.min.js')); ?>"></script>

    <!-- Main Script JS -->
    <script src="<?php echo e(asset('public/themes/frontend/assets/js/script.js')); ?>"></script>

    <!--nextloop.core.js-->
    <script src="<?php echo e(asset('public/js/landlord/frontend/ajax.js')); ?>"></script>

    <!--app.js-->
    <script src="<?php echo e(asset('public/js/landlord/frontend/app.js')); ?>"></script>

    <!--events.js-->
    <script src="<?php echo e(asset('public/js/landlord/frontend/events.js')); ?>"></script>

    <!--custom.js-->
    <script src="<?php echo e(asset('public/js/core/custom.js')); ?>"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAB-zOugcVXjeBpcYUO2apwS7zkI8C5kG0&libraries=places&callback=initMap"></script>

    <!--customer body code-->
    <?php echo _clean(config('system.settings_code_body')); ?>

<?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/frontend/layout/footerjs.blade.php ENDPATH**/ ?>