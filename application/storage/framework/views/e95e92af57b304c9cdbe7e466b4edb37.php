<?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="payment_<?php echo e($payment->payment_id); ?>">
    <!--payment_id-->
    <td class="col_payment_id">
        <?php echo e($payment->payment_id); ?>

    </td>
    <!--payment_created-->
    <td class="col_payment_created">
        <?php echo e(runtimeDate($payment->payment_date)); ?>

    </td>
    <!--payment_transaction_id-->
    <td class="col_payment_transaction_id">
        <?php echo e($payment->payment_transaction_id ?? '---'); ?>

    </td>
    <!--payment_amount-->
    <td class="col_payment_amount">
        <?php echo e(runtimeMoneyFormat($payment->payment_amount)); ?>

    </td>
    <!--payment_gateway-->
    <td class="col_payment_amount text-ucf">
        <?php echo e($payment->payment_gateway ?? '---'); ?>

    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/account/payments/table/ajax.blade.php ENDPATH**/ ?>