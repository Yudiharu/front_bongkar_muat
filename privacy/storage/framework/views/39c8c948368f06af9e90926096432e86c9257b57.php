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
    <h1>LAPORAN DATA PRODUK</h1>


    <table class="table_content" style="margin-bottom: 25px;width: 100%;" border="1">
    <thead>
        <tr style="background-color: #e6f2ff">
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Part Number</th>
            <th>Kode Kategori</th>
            <th>Kode Merek</th>
            <th>Kode Satuan</th>
            <th>Stock</th>
            <th>Hpp</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->kode_produk); ?></td>
                <td><?php echo e($item->nama_produk); ?></td>
                <td><?php echo e($item->partnumber); ?></td>
                <td><?php echo e($item->kode_kategori); ?></td>
                <td><?php echo e($item->kode_merek); ?></td> 
                <td><?php echo e($item->kode_satuan); ?></td>
                <td><?php echo e($item->stok); ?></td>
                <td><?php echo e(number_format($item->hpp,'0','.',',')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<hr>
</body>
</html>