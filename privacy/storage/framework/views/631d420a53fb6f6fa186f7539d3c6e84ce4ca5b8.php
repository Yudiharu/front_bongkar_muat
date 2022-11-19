<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <title>LAPORAN BULANAN <?php echo e($nama); ?></title>
    <style>
        body {
            font-family: sans-serif;
            /*font-family: courier;*/
            /*font-weight: bold;*/
        }
        .header {
            text-align: center;
        },
        .header, h1 {
            font-size: 11pt;
            margin-bottom: 0px;
        }

        .header, p {
            font-size: 10pt;
            margin-top: 0px;
        }
        .table_content {
            color: #232323;
            border-collapse: collapse;
            font-size: 8pt;
            margin-top: 15px;
        }

        .table_content, .border {
            border: 1px solid black;
            padding: 4px;
        }
        .table_content, thead, th {
            text-transform: uppercase;
            padding: 7px;
            text-align: center;

        }
        ul li {
            display:inline;
            list-style-type:none;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>LAPORAN BULANAN <?php echo e($nama); ?></h1>
    <p>Periode: <?php echo ($awal);?> s/d <?php echo ($akhir);?></p>


	<table class="table_content" style="margin-bottom: 25px;width: 100%;font-size: 6pt" border="1">
			 <thead>
		<tr style="background-color: #e6f2ff">
			<th>Periode</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Partnumber</th>
			<th>Begin Stock</th>
			<th>Begin Amount</th>
            <th>In Stock</th>
			<th>In Amount</th>
            <th>Out Stock</th>
            <th>Out Amount</th>
            <th>Sale Stock</th>
            <th>Sale Amount</th>
            <th>Transfer In</th>
            <th>Transfer In Amount</th>
            <th>Transfer Out</th>
            <th>Transfer Out Amount</th>
            <th>Stock Opname</th>
            <th>Amount Opname</th>
            <th>Ending Stock</th>
            <th>Ending Amount</th>
            <th>Hpp</th>
            <th>Kode Lokasi</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $monthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($item->periode); ?></td>
                <td><?php echo e($item->kode_produk); ?></td>
                <td><?php echo e($item->produk->nama_produk); ?></td>
                <td><?php echo e($item->partnumber); ?></td>
                <td><?php echo e($item->begin_stock); ?></td>
                <td><?php echo e(number_format($item->begin_amount,'0','.',',')); ?></td>
                <td><?php echo e($item->in_stock); ?></td>
                <td><?php echo e(number_format($item->in_amount,'0','.',',')); ?></td>
                <td><?php echo e($item->out_stock); ?></td>
                <td><?php echo e(number_format($item->out_amount,'0','.',',')); ?></td>
                <td><?php echo e($item->sale_stock); ?></td>
                <td><?php echo e(number_format($item->sale_amount,'0','.',',')); ?></td>
                <td><?php echo e($item->trf_in); ?></td>
                <td><?php echo e(number_format($item->trf_in_amount,'0','.',',')); ?></td>
                <td><?php echo e($item->trf_out); ?></td>
                <td><?php echo e(number_format($item->trf_out_amount,'0','.',',')); ?></td>
                <td><?php echo e($item->stock_opname); ?></td>
                <td><?php echo e(number_format($item->amount_opname,'0','.',',')); ?></td>
                <td><?php echo e($item->ending_stock); ?></td>
				<td><?php echo e(number_format($item->ending_amount,'0','.',',')); ?></td>
                <td><?php echo e(number_format($item->hpp,'0','.',',')); ?></td>
                <td><?php echo e($item->kode_lokasi); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html>