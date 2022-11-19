<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <title>LAPORAN TRANSAKSI <?php echo e($nama); ?></title>
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
    <h1>LAPORAN TRANSAKSI <?php echo e($nama); ?></h1>
    <p>Tanggal Transaksi: <?php echo ($tanggal_awal);?> s/d <?php echo ($tanggal_akhir);?></p>


	<table class="table_content" style="margin-bottom: 25px;width: 100%;font-size: 8pt" border="1">
			 <thead>
		<tr style="background-color: #e6f2ff">
			<th>Tanggal Transaksi</th>
            <th>No Transaksi</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
			<th>Qty Transaksi</th>
            <th>Satuan</th>
            <th>Harga Transaksi</th>
			<th>Total Transaksi</th>
            <th>Kode Lokasi</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($item->tanggal_transaksi); ?></td>
                <td><?php echo e($item->no_transaksi); ?></td>
                <td><?php echo e($item->kode_produk); ?></td>
                <td><?php echo e($item->produk->nama_produk); ?></td>
                <td><?php echo e($item->qty_transaksi); ?></td>
                <td><?php echo e($item->produk->kode_satuan); ?></td>
                <td><?php echo e(number_format($item->harga_transaksi,'0','.',',')); ?></td>
                <td><?php echo e(number_format($item->total_transaksi,'0','.',',')); ?></td>
                <td><?php echo e($item->kode_lokasi); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html>