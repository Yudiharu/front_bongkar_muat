<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <title>LAPORAN DATA PRODUK BULANAN</title>
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
    <h1>LAPORAN DATA PRODUK BULANAN</h1>
    <p>Periode: <?php echo ($nama_bulan) ?> <?php echo ($req) ?></p>
    <?php
        $grandtotaljumlah = 0;
    ?>

    <table class="table_content" style="margin-bottom: 25px;width: 100%;" border="1">
             <thead>
        <tr style="background-color: #e6f2ff">
			<th>Periode</th>
            <th>Kode Produk</th>
			<th>Nama Produk</th>
            <th>Partnumber</th>
            <th>Kategori</th>
			<th>Begin Stock</th>
            <th>In Stock</th>
            <th>Out Stock</th>
            <th>Adjustment Stock</th>
            <th>Stock Opname</th>
            <th>Ending Stock</th>
            <th>Hpp</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $opnamedetail_cetak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($item->periode); ?></td>
                <td><?php echo e($item->kode_produk); ?></td>
				<td><?php echo e($item->nama_produk); ?></td>
                <td><?php echo e($item->partnumber); ?></td>
                <td><?php echo e($item->kode_kategori); ?></td>
                <td><?php echo e($item->begin_stock); ?></td>
                <td><?php echo e($item->in_stock); ?></td>
                <td><?php echo e($item->out_stock); ?></td>
                <td><?php echo e($item->adjustment_stock); ?></td>
                <td><?php echo e($item->stock_opname); ?></td>
                <td><?php echo e($item->ending_stock); ?></td>
                <td><?php echo e(number_format($item->hpp,'0','.',',')); ?></td>
			</tr>
			
			<?php
            $subtotal = 0;
            $subtotal += $item->ending_stock;
            $grandtotaljumlah += $subtotal;
            ?>
            
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
		
		<tfoot>
        <tr class="border">
            <td class="border" colspan="10" style="font-weight: bold">Total</td>
            <td class="border" align="center">&nbsp;<?php echo $grandtotaljumlah;?></td>
            <td class="border" ></td>
        </tr>
        </tfoot>
	</table>

    <div class="footer" style="font-size: 10pt;padding-top: 1.5cm">
        <div class="tgl" align="left">
            Palembang, <?php echo date_format($date,'d F Y');?>
        </div>
    
        <table width="100%" style="font-size:10pt; text-align:center;padding:0px; margin:0px; border-collapse:collapse" border="0">
            <tr style="padding:0px; margin:0px">
                <td width="20%">Dibuat oleh,</td>
                <td width="47%">Disetujui,</td>
            </tr>
            <tr style="padding:0px; margin:0px"><td colspan="3"><br><br><br></td></tr>
            <tr style="padding:0px; margin:0px">
                <td><b><u><?php echo $ttd; ?></u></b></td>
                <td>JULIUS LEONARD</td>
            </tr>
        </table>
    </div>
</body>
</html>