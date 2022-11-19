<?php $__env->startSection('title', 'Pembelian Detail'); ?>

<?php $__env->startSection('content_header'); ?>
<h1> Detail Pembelian <?php echo e($pembelian->no_pembelian); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onLoad="load()">
    

    <div class="box">
        <div class="box-header with-border">
            <div class="">
                <a href="<?php echo e($list_url); ?>" class="btn btn-info btn-sm">List Pembelian</a>
            </div>
            
        </div>
        <div class="box-body"> 
            <div class="row col-md-12 addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['route' => ['pembeliandetail.store'],'method' => 'post','id'=>'form1']); ?>

                        <div class="row">   
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Penerimaan', 'No Pembelian:')); ?>

                                        <?php echo e(Form::text('no_pembelian',$pembelian->no_pembelian, ['class'=> 'form-control','readonly'])); ?>

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

                                        
                                        <?php echo e(Form::select('kode_satuan',$Satuan,null, ['class'=> 'form-control','required'=>'required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('qty', 'Stock Tersedia:')); ?>

                                            <?php echo e(Form::text('qty_stock', null, ['class'=> 'form-control','readonly','id'=>'Stock'])); ?>

                                        </div>
                                    </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','required'=>'required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Harga:')); ?>

                                        
                                        <?php echo e(Form::text('harga',null, ['class'=> 'form-control','required'=>'required','id'=>'HPP'])); ?>

                                    </div>
                                </div>

                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <?php echo e(Form::submit('Add Item', ['class' => 'btn btn-success'])); ?>

                                    </div>
                                </div>
                            </div>
                    
                    <?php echo Form::close(); ?>    
            </div>
            <div class="row col-md-12 editform">
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route'=>'pembeliandetail.updateajax','method' => 'post','id'=>'form2']); ?>

                            <div class="row">   
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::hidden('id',null, ['class'=> 'form-control','readonly','id'=>'ID'])); ?>

                                        <?php echo e(Form::label('No  Pembelian', 'No Pembelian:')); ?>

                                        <?php echo e(Form::text('no_pembelian',$pembelian->no_pembelian, ['class'=> 'form-control','readonly','id'=>'Penerimaan'])); ?>

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
                    <th>No Pembelian</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    
                    
                    
                    <th>Action</th>
                </tr>
                </thead>
               
                <tbody>
                    <?php $__currentLoopData = $pembeliandetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($row->no_pembelian); ?></td>
                        <td><?php echo e($row->produk->nama_produk); ?></td>
                        <td><?php echo e($row->satuan->nama_satuan); ?></td>
                        <td><?php echo e($row->qty); ?></td>
                        <td><?php echo e(number_format($row->harga,2,",",".")); ?></td>
                        <td><?php echo e(number_format($subtotal = $row->harga * $row->qty,2,",",".")); ?></td>
                        
                        
                        
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
                            <th><?php echo e($grand_total); ?></th>
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
         function load(){
            $('.editform').hide();
        }

        $(function() {
            $('#data-table').DataTable({
                scrollY: 200,
                scrollX: true
            
            });
        });

        function stock(){
            var kode_produk= $('#kode_produk').val();
            $.ajax({
                url:'<?php echo route('pembeliandetail.stockproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk
                    },
                success: function(result) {
                        console.log(result);
                        $('#Stock').val(result.stock);
                        $('#HPP').val(result.harga_beli);
                    },
            });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }
               
        function edit(id, url) {
            var result = confirm("Want to Edit?");
            if (result) {
                // console.log(id)
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        console.log(result);
                        $('#Pembelian').val(result.no_pembelian);
                        $('#Produk').val(result.kode_produk);
                        $('#Satuan').val(result.kode_satuan);
                        $('#QTY').val(result.qty);
                        $('#Harga').val(result.harga);
                        $('#ID').val(result.id);
                        $(".addform").hide();
                        $(".editform").show();
                        // $('#form2').attr('action', "admin/penerimaandetail/dataBaru");
                       
                    
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
                    }
                });
            }

        }
    </script>

    <script>
        function update(){
            var result = confirm("Want to Update?");
            if (result) {
                // console.log(id)
                $.ajax({
                    type: 'GET',
                    url: <?php echo route('penerimaandetail.baru'); ?>,
                    data: $('form2').serialize(),
                    success: function(result) {
                        console.log(result);
                        alert('Data Berhasil Di Update');
                        location.reload(true);
                    }
                });
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>