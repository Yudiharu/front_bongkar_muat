<?php $__env->startSection('title', 'Pemakaian Detail'); ?>

<?php $__env->startSection('content_header'); ?>
<h1> Detail Pemakaian <?php echo e($pemakaian->no_pemakaian); ?></h1>
<style>
/* #data-table tbody {

        display:block;
		height:200px;
		overflow: auto;
		width: 100%;
        float:left;
} */
/* 
#data-table tbody tr {
		display:table;
		width:100%;
} */
/* 
#data-table th td {
    width:10%;
    padding:8px;
    } */

/* 
#data-table thead {

        display:table;
		width:100%;
}

#data-table tfoot {

        display:table;
        width:100%;
} */




</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onLoad="load()">
    <div class="box">
        <div class="box-header with-border">
            <div class="">
                <a href="<?php echo e($list_url); ?>" class="btn btn-info btn-sm">List Pemakaian</a>
                <button onclick="tablefresh()">refresh</button>
            </div>
            
        </div>
<div class="box-body"> 
<div class="row col-md-12 addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['route'=>'pemakaiandetail.store','method' => 'post','id'=>'form1']); ?>

                        <div class="row">   
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Pemakaian', 'No Pemakaian:')); ?>

                                        <?php echo e(Form::hidden('id', null, ['class'=> 'form-control'])); ?>

                                        <?php echo e(Form::text('no_pemakaian',$pemakaian->no_pemakaian, ['class'=> 'form-control','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        
                                        <?php echo e(Form::select('kode_produk',$Produk,null,
                                         ['class'=> 'form-control','required'=>'required','onchange'=>'stock();',
                                         'id'=>'kode_produk'])); ?>

                                    </div>
                                </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        
                                        <?php echo e(Form::select('kode_satuan',$Satuan,null, ['class'=>'form-control','required'=>'required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('qty_stock', 'Stock Tersedia:')); ?>

                                            <?php echo e(Form::text('qty_stock', null, ['class'=> 'form-control','readonly','id'=>'Stock'])); ?>

                                        </div>
                                </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::number('qty', null, ['class'=>'form-control','required'=>'required','id'=>'QTY1'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Harga:')); ?>

                                        
                                        <?php echo e(Form::number('harga',null, ['class'=> 'form-control','required'=>'required','id'=>'HPP'])); ?>

                                    </div>
                                </div>

                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <?php echo e(Form::submit('Add Item', ['class' => 'btn btn-success','id'=>'submit'])); ?>

                                    
                                    </div>
                                </div>
                            </div>
                    <?php echo Form::close(); ?>

            </div>
<div class="row col-md-12 editform">
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route'=>'pemakaiandetail.updateajax','method' => 'post','id'=>'form2']); ?>

                    <div class="row">   
                        <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('No Pemakaian', 'No Pemakaian:')); ?>

                                    <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'ID'])); ?>

                                    <?php echo e(Form::text('no_pemakaian',$pemakaian->no_pemakaian, ['class'=> 'form-control','readonly','id'=>'Pemakaian'])); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                    
                                    <?php echo e(Form::select('kode_produk',$Produk,null, ['class'=> 'form-control','id'=>'Produk','required'=>'required'])); ?>

                                </div>
                            </div>
                
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                    
                                    <?php echo e(Form::select('kode_satuan',$Satuan,null, ['class'=> 'form-control','id'=>'Satuan','required'=>'required'])); ?>

                                </div>
                            </div>
                
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('qty', 'QTY:')); ?>

                                    <?php echo e(Form::text('qty', null, ['class'=> 'form-control','id'=>'QTY','required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('harga', 'Harga:')); ?>

                                    
                                    <?php echo e(Form::text('harga',null, ['class'=> 'form-control','id'=>'Harga','required'=>'required'])); ?>

                                </div>
                            </div>

                    </div> 
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <?php echo e(Form::submit('Update', ['class' => 'btn btn-success'])); ?>

                                </div>
                            </div>
                        </div>
                
                <?php echo Form::close(); ?>  
                
        </div>

<table class="table table-bordered table-hover" id="data-table" width="100%">
                <thead>
                <tr class="bg-purple">
                    <th>No Pemakaian</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    
                    
                    <th>Action</th>
                </tr>
                </thead>
               
                <tbody>
                    <?php $__currentLoopData = $Pemakaiandetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($row->no_pemakaian); ?></td>
                        <td><?php echo e($row->produk->nama_produk); ?></td>
                        <td><?php echo e($row->satuan->nama_satuan); ?></td>
                        <td><?php echo e($row->qty); ?></td>
                        <td>Rp <?php echo e(number_format($row->harga,0,",",".")); ?></td>
                        <td>Rp <?php echo e(number_format($subtotal = $row->harga * $row->qty,0,",",".")); ?></td>
                        
                        
                        <td>
                            <a href="javascript:;" onclick="edit('<?php echo e($row->id); ?>','<?php echo e($row->edit_url); ?>')" id="edit" class="btn btn-warning btn-sm"> 
                                <i class="fa fa-edit"></i>Edit</a>
                            &nbsp
                            <a href="javascript:;" onclick="del('<?php echo e($row->id); ?>','<?php echo e($row->destroy_url); ?>')" id="hapus" class="btn btn-danger btn-sm"> 
                                <i class="fa fa-times-circle"></i>Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr class="bg-purple">
                        <th class="text-center" colspan="3">Total</th>
                        <th><?php echo e($total_qty); ?></th>
                        <th></th>
                        <th>Rp <?php echo e($grand_total); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
</table>
            
        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script>

        var table=$('#data-table').DataTable({
                scrollY: 200,
                scrollX: true
            
            });
        function load(){
            $('.editform').hide();
        }

        // $(function() {
        //     window.table = $('#data-table').DataTable({
        //         scrollY: 200,
        //         scrollX: true
            
        //     });
        // });
        function tablefresh(){
                window.table.draw();
            } 
        function stock(){
            var kode_produk= $('#kode_produk').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('pemakaiandetail.stockproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk
                    },
                success: function(result) {
                        console.log(result);
                        if(result.stock == 0){
                            submit.disabled = true;
                        }else{
                            submit.disabled = false;
                        }
                        $('#Stock').val(result.stock);
                        $('#HPP').val(result.hpp);
                    },
            });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function refreshTable() {
          $('#data-table').DataTable().ajax.reload(null,false);
            // table.draw();
        }

        jQuery('#QTY1').on('change', function() {
            // do your stuff
            var stock = $('#Stock').val();
            var qty = $('#QTY1').val();
            var submit = document.getElementById("submit");
            // Check if qty more than stock
            if (qty > stock) {
                // alert('QTY Melebihi Stok Yang Tersedia');
                submit.disabled = true;
                // return false;
            }else{
                submit.disabled = false;
            }
        });
               
        function edit(id, url) {
            var result = confirm("Want to Edit?");
            if (result) {
                // console.log(id)
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        console.log(result);
                        $('#ID').val(result.id);
                        $('#Pemakaian').val(result.no_pemakaian);
                        $('#Produk').val(result.kode_produk);
                        $('#Satuan').val(result.kode_satuan);
                        $('#QTY').val(result.qty);
                        $('#Harga').val(result.harga);
                        $(".addform").hide();
                        $(".editform").show();

                    }
                });
            }

        }

        function del(id, url) {
            var result = confirm("Want to delete?");
            if (result) {
                // console.log(id)
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(result) {
                        console.log(result);
                        location.reload(true);
                        $.notify(result.message, "success");
                        // tablefresh();
                        // table.draw();
                    }
                });
            }

        }
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>