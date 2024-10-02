<!-- main content -->
<div class="container-fluid">

    <!--page heading-->
    <div class="row page-titles">

        <!-- bread crumbs -->
        <?php echo $__env->make('misc.heading-crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- bread crumbs -->

    </div>
    <!--page heading-->


    <!-- page content -->
    <div class="row">
        <div class="col-12">
            <!--clients table-->
            <?php echo $__env->make('account.payments.table.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--clients table-->
        </div>
    </div>
    <!--page content -->

</div>
<!--main content -->
<?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/account/payments/wrapper.blade.php ENDPATH**/ ?>