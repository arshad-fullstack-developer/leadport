<!--rows-->
<?php $__currentLoopData = $estimates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estimate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e(str_limit_reports($estimate->category_name ?? '---', 40)); ?></td>
    <td data-tableexport-cellformat=""><?php echo e($estimate->estimate_count); ?></td>
    <td class="data-type-money" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($estimate->sum_bill_amount_before_tax)); ?></td>
    <td class="data-type-money" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($estimate->sum_bill_tax_total_amount)); ?></td>
    <td class="data-type-money" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($estimate->sum_bill_discount_amount)); ?></td>
    <td class="data-type-money" data-tableexport-xlsxformatid="4">
        <?php echo e(runtimeMoneyFormat($estimate->sum_bill_adjustment_amount)); ?></td>
    <td class="data-type-money" data-tableexport-xlsxformatid="4"><?php echo e(runtimeMoneyFormat($estimate->sum_bill_final_amount)); ?>

    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/reports/estimates/category/ajax.blade.php ENDPATH**/ ?>