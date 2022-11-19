<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kartu Stok Barang <?php echo e($request); ?> - Periode <?php echo e($tanggal); ?> s/d <?php echo e($request2); ?></title>

    <style> 
        
     @page  {
            border: solid 1px #0b93d5;

        }

        .title {
            margin-top: 0.5cm;
        }
        .title h1 {
            text-align: left;
            font-size: 14pt;
            
        }
        

        .header {
            margin-left: 50px;
            margin-right: 0px;
            /*font-size: 10pt;*/
            padding-top: 10px;
            /*border: solid 1px #0b93d5;*/
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .clearfix {
            overflow: auto;
        }

        .content {
                margin-left: 10px;
            padding-top: 10px
        }
        .catatan {
            font-size: 10pt;
        }

        footer {
                position: fixed; 
                top: 19cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }

        /* Table desain*/
        table.grid {
            width: 100%;
        }
</style>
</head>
<body>

    <div class="title">
    <h1>Kartu Stok Barang <?php echo e($request); ?> - Periode <?php echo e($tanggal); ?> s/d <?php echo e($request2); ?></h1>
    </div>
  <hr>
    <table rules="rows" class="grid" style="font-size: 10pt; vertical-align: top; width: 27cm" border="1">
    <thead>
        <tr>
            <th>Tanggal Transaksi</th>
            <th>Stok Awal</th>
            <th>Amount Awal</th>
            <th>Jam Transaksi</th>
            <th>Nomor Transaksi</th>
            <th>Qty Transaksi</th>
            <th>Harga Transaksi</th>
            <th>Total Transaksi</th>
        </tr>
    </thead>

    <thead>
            <tr>
                <td><?php echo e($kartustok_saldo->periode); ?></td>
                <td><?php echo e($kartustok_saldo->begin_stock); ?></td>
                <td><?php echo e($kartustok_saldo->begin_amount); ?></td>
                <td colspan="5"></td>
            </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $kartustok_cetak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->tanggal_transaksi); ?></td>
                <td colspan="2"></td>
                <td><?php echo e($item->jam_transaksi); ?></td> 
                <td><?php echo e($item->no_transaksi); ?></td>
                <td><?php echo e($item->qty_transaksi); ?></td>
                <td><?php echo e(number_format($item->harga_transaksi,'0','.',',')); ?></td>
                <td><?php echo e(number_format($item->total_transaksi,'0','.',',')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<hr>
</body>
</html>