    <?php 
    $totalQty = 0;
    $totalKgcalc = 0;
    $totalLdm = 0;
    $totalVolumeM3 = 0;
    ?>  
    <i class="mdi mdi-plus-circle-outline text-success font-28 addgoods"></i>
    <table class="table" id="table">
        <thead>
        <tr>
		<th>Quantity</th>
        <th>Units</th>
        <th>Description</th>
        <th>Weight (Br)</th>
		<th>LDM</th>
		<th>Volume (m3)</th>
		<th>Length (cm)</th>
		<th>Width (cm)</th>
		<th>Height (cm)</th>
		</tr>
        </thead>
        <tbody id="goodsTable">
        <?php $__currentLoopData = $ticket['goods']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

            <?php 
            $totalQty += $good['qty'];
            $totalKgcalc += $good['kgcalc'];
            $totalLdm += $good['ldm'];
            $totalVolumeM3 += $good['volumem3'];
            ?>
            <tr id="<?php echo e($key); ?>">
                <td><input type="number" class="form-control"  id="<?php echo e($key); ?>"   name="goods[<?php echo e($key); ?>][qty]"          value="<?php echo e($good['qty']); ?>"></td>
                <td><input type="number" class="form-control"  id="<?php echo e($key); ?>"   name="goods[<?php echo e($key); ?>][unitid]"       value="<?php echo e($good['unitid']); ?>"></td>
                <td><input type="text"   class="form-control"  id="<?php echo e($key); ?>"   name="goods[<?php echo e($key); ?>][description]"  value="<?php echo e($good['description']); ?>"></td>
                <td><input type="number" class="form-control"  id="<?php echo e($key); ?>"   name="goods[<?php echo e($key); ?>][kgcalc]"       value="<?php echo e($good['kgcalc']); ?>"></td>
                <td><input type="number" class="form-control"  id="<?php echo e($key); ?>"   name="goods[<?php echo e($key); ?>][ldm]"          value="<?php echo e($good['ldm']); ?>"></td>
                <td><input type="number" class="form-control"  id="<?php echo e($key); ?>"   name="goods[<?php echo e($key); ?>][volumem3]"     value="<?php echo e($good['volumem3']); ?>"></td>
                <td><input type="number" class="form-control"  id="<?php echo e($key); ?>"   name="goods[<?php echo e($key); ?>][lengthcm]"     value="<?php echo e($good['lengthcm']); ?>"></td>
                <td><input type="number" class="form-control"  id="<?php echo e($key); ?>"   name="goods[<?php echo e($key); ?>][widthcm]"      value="<?php echo e($good['widthcm']); ?>"></td>
                <td><input type="number" class="form-control"  id="<?php echo e($key); ?>"   name="goods[<?php echo e($key); ?>][heightcm]"     value="<?php echo e($good['heightcm']); ?>"></td>
                <td><i class="sl-icon-trash" onclick="removeIndex(this)"></i></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
         <tr>
		        <td><input type="number" class="form-control" value="<?php echo e($totalQty); ?>" disabled></td>
				<td></td>
				<td></td>
	            <td><input type="number" class="form-control" value="<?php echo e($totalKgcalc); ?>" disabled></td>
				<td><input type="number" class="form-control" value="<?php echo e($totalLdm); ?>" disabled></td>
				<td><input type="number" class="form-control" value="<?php echo e($totalVolumeM3); ?>" disabled></td>
				<td></td>
				<td></td>
                <td></td>
			    <td></td>
		</tr>
    </table> <?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/customticket/components/misc/edit-goods.blade.php ENDPATH**/ ?>