<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pemakaian - <?php echo e($pemakaian->no_pemakaian); ?></title>

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
    <h1>Pemakaian - <?php echo e($pemakaian->no_pemakaian); ?></h1>
       
       <p><b>Jumlah Item : <?php echo e($jumlah); ?></b></p>
    </div>
  <hr>
	<table rules="rows" class="grid" style="font-size: 10pt; vertical-align: top; width: 27cm" border="1">
			 <thead>
                <tr>
                    <th>No Transaksi</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>QTY</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                 </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $pemakaiandetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($rows->no_pemakaian); ?></td>
                    <td><?php echo e($rows->produk->nama_produk); ?></td>
                    <td><?php echo e($rows->satuan->nama_satuan); ?></td>
                    <td><?php echo e($rows->qty); ?></td>
                    <td><?php echo e(number_format($rows->harga,2,",",".")); ?></td>
                    <td><?php echo e(number_format($subtotal = $rows->harga * $rows->qty,2,",",".")); ?></td>
                  </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr class="bg-purple">
                    <th class="text-center" colspan="3">Total</th>
                    <th><?php echo e($total_qty); ?></th>
                    <th></th>
                    <th>Rp <?php echo e($grand_total); ?></th>
                </tr>
            </tfoot>
	</table>
<hr>
</body>
</html>