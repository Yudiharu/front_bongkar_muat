<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <title>LAPORAN KARTU STOK BARANG</title>
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
    <h1>LAPORAN KARTU STOK BARANG</h1>
    <p>Periode: <?php echo ($nama_bulan) ?> <?php echo ($request3) ?></p>
    <p align="left"> <b>KODE ITEM / NAMA ITEM: <?php echo $request.' / '.$nama_produk ?></b>  </p>
</div>

    <table rules="rows" class="grid" style="font-size: 9pt; vertical-align: top; width: 27cm" border="1">
        <thead>
            <tr style="background-color: #e6f2ff">
                <th>Tanggal Transaksi</th>
                <th>Jam Transaksi</th>
                <th>Nomor Transaksi</th>
                <th>Qty Transaksi</th>
                <th>Satuan</th>
                <th>Hpp</th>
                <th>Total Transaksi</th>
            </tr>
        </thead>

        <thead>
                <tr align="left">
                    <td align="left"><b>BEGIN</b></td>
                    <td></td>
                    <td></td>
                    <td align="right"><b><?php echo e($kartustok_saldo->begin_stock); ?></b></td>
                    <td></td>
                    <td></td>
                    <td align="right"><b><?php echo e($kartustok_saldo->begin_amount); ?></b></td>
                </tr>
        </thead>

        <tbody>
            <?php echo e($subqty = 0); ?>

            <?php echo e($subtotal = 0); ?>

            <?php $__currentLoopData = $kartustok_cetak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->tanggal_transaksi); ?></td>
                    <td><?php echo e($item->jam_transaksi); ?></td> 
                    <td><?php echo e($item->no_transaksi); ?></td>
                    <td align="right"><?php echo e($item->qty_transaksi); ?></td>
                    <td align="right"><?php echo e($kode_satuan); ?></td>
                    <td align="right"><?php echo e(number_format($item->harga_transaksi,'0','.',',')); ?></td>
                    <td align="right"><?php echo e(number_format($item->total_transaksi,'0','.',',')); ?></td>
                    <?php echo e($subqty += $item->qty_transaksi); ?>

                    <?php echo e($subtotal += $item->total_transaksi); ?>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

        <tfoot>
                <tr align="left">
                    <td align="left"><b>ENDING</b></td>
                    <td></td>
                    <td></td>
                    <td align="right"><b><?php echo e($kartustok_saldo->begin_stock + $subqty); ?></b></td>
                    <td></td>
                    <td></td>
                    <td align="right"><b><?php echo e(number_format( $kartustok_saldo->begin_amount + $subtotal,'0','.',',')); ?></b></td>
                </tr>
        </tfoot>
    </table>

</body>
</html>