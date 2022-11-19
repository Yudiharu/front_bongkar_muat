<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pemakaian Dari Tanggal <?php echo e($tanggal_awal); ?> s/d <?php echo e($tanggal_akhir); ?></title>

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
    <h1>Laporan Pemakaian Dari Tanggal <?php echo e($tanggal_awal); ?> s/d <?php echo e($tanggal_akhir); ?></h1>
    </div>
  <hr>
    <table rules="rows" class="grid" style="font-size: 10pt; vertical-align: top; width: 27cm" border="1">
    <thead>
        <tr>
            <th>No Pemakaian</th>
            <th>Tanggal Pemakaian</th>
            <th>Pemakai</th>
            <th>Tipe Pemakaian</th>
            <th>Kode Mobil</th>
            <th>Kode Alat</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Kode Satuan</th>
            <th>QTY</th>
            <th>Harga Produk</th>
            <th>Sub Total</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $pemakaiandetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->no_pemakaian); ?></td>
                <td><?php echo e($item->tanggal_pemakaian); ?></td>
                <td><?php echo e($item->pemakai); ?></td>
                <td><?php echo e($item->type); ?></td>
                <td><?php echo e($item->nopol); ?></td> 
                <td><?php echo e($item->nama_alat); ?></td>
                <td><?php echo e($item->kode_produk); ?></td>
                <td><?php echo e($item->nama_produk); ?></td>
                <td><?php echo e($item->kode_satuan); ?></td>
                <td><?php echo e($item->qty); ?></td>
                <td><?php echo e(number_format($item->harga,'0','.',',')); ?></td>
                <td><?php echo e(number_format($subtotal = $item->harga * $item->qty,'0','.',',')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<hr>
</body>
</html>