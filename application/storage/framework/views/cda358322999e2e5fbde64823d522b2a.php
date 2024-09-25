<div class="subscription-info-modal">
    <?php echo $__env->make('landlord.subscriptions.misc.info-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="line  m-t-30 p-b-40"></div>

    <h5 class="p-b-10"><?php echo app('translator')->get('lang.payment_gateway_information'); ?></h5>



    <?php echo $__env->make('landlord.subscriptions.misc.info-gateways', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



</div><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/landlord/subscriptions/modal/info.blade.php ENDPATH**/ ?>