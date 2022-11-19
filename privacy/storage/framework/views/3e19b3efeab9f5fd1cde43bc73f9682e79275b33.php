<!DOCTYPE html>
<html lang="en">
<head>
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

	<table rules="rows" class="grid" style="font-size: 10pt; vertical-align: top; width: 27cm" border="1">
    <thead>
        <tr>
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
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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