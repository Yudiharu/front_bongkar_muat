<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Export PDF</title>
</head>
<body>
	<table border="1">
	<thead>
		<tr>
			<th>No. Pemakaian</th>
			<th>Kode Produk</th>
			<th>Harga</th>
			<th>Qty</th>
			<th>Sub Total</th>
		</tr>
		
	</thead>
	<tbody>
		<?php echo e($grandtotal = 0); ?>

		<?php $__currentLoopData = $pemakaians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemakaian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($pemakaian->no_pemakaian); ?></td>
				<td><?php echo e($pemakaian->kode_produk); ?></td>
				<td><?php echo e($pemakaian->harga); ?></td>
				<td><?php echo e($pemakaian->qty); ?></td>
				<td><?php echo e($subtotal = $pemakaian->harga * $pemakaian->qty); ?></td>
				<?php echo e($grandtotal += $subtotal); ?>

			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody> 
		 <tfoot>
                    <tr class="bg-purple">
                        <th colspan="3">Total</th>
                        <th><?php echo e($total = $pemakaian->sum('qty')); ?></th>
                        <th>Rp <?php echo e($grandtotal); ?></th>
                    </tr>
                </tfoot>
	
	</table>
</body>
</html>