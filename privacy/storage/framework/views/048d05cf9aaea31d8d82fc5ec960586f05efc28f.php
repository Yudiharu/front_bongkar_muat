<?php $__env->startSection('title', 'Permintaan Detail'); ?>

<?php $__env->startSection('content_header'); ?>
<h1> Detail Permintaan <?php echo e($permintaan->no_permintaan); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body id="body" onLoad="load()">
    <div class="box">
        <div class="box-header with-border">
            <div class="">
                <a href="<?php echo e($list_url); ?>" class="btn btn-info btn-sm">List Permintaan</a>
            </div>
            
        </div>
        <div class="box-body"> 
            <div class="row col-md-12 addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    
                    <?php echo Form::open(['id'=>'ADD']); ?>

                        <div class="row">   
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Permintaan', 'No Permintaan:')); ?>

                                        <?php echo e(Form::text('no_permintaan', $permintaan->no_permintaan, ['class'=> 'form-control','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        
                                        <?php echo e(Form::select('kode_produk',$Produk,null, ['class'=> 'form-control','required'=>'required'])); ?>

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
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','required'=>'required'])); ?>

                                    </div>
                                </div>

                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <?php echo e(Form::submit('Create data', ['class' => 'btn btn-success'])); ?>

                                    </div>
                                </div>
                            </div>
                    
                    <?php echo Form::close(); ?>    
            </div>
            <div class="row col-md-12 editform">
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route'=>'permintaandetail.updateajax','method' => 'post','id'=>'form2']); ?>

                    <div class="row">   
                        <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('No Permintaan', 'No Permintaan:')); ?>

                                    <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'ID'])); ?>

                                    <?php echo e(Form::text('no_permintaan', $permintaan->no_permintaan, ['class'=> 'form-control','readonly','id'=>'Permintaan'])); ?>

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

                    </div> 
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                                </div>
                            </div>
                        </div>
                
                <?php echo Form::close(); ?>  
                
        </div>
        
            <table class="table table-bordered table-hover" id="data-table" width="100%">
                <thead>
                <tr class="bg-primary">
                    <th>No Permintaan</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Created At</th>
                    
                    <th>Action</th>
                </tr>
                </thead>
               
                <tbody>
                    <?php $__currentLoopData = $permintaandetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($row->no_permintaan); ?></td>
                        <td><?php echo e($row->produk->nama_produk); ?></td>
                        <td><?php echo e($row->satuan->nama_satuan); ?></td>
                        <td><?php echo e($row->qty); ?></td>
                        <td><?php echo e($row->created_at); ?></td>
                        
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
            </table>
            <span class="row"><?php echo e($permintaandetail->links()); ?></span>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }

        $('#ADD').submit(function (e) {
            e.preventDefault();
            
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
        
                $.ajax({
                    url:'<?php echo route('permintaandetail.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        // setTimeout(function(){// wait for 5 secs(2)
                        //     location.reload(); // then reload the page.(3)
                        // }, 1000); 
                        location.reload(true);
                        $.notify(data.message, "success");
                        console.log(data);
                    },
                });
            
        });

        function edit(id, url) {
            var result = confirm("Want to Edit?");
            if (result) {
                // console.log(id)
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        console.log(result.qty);
                        $('#ID').val(result.id);
                        $('#Permintaan').val(result.no_permintaan);
                        $('#Produk').val(result.kode_produk);
                        $('#Satuan').val(result.kode_satuan);
                        $('#QTY').val(result.qty);
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
                    }
                });
            }

        }

        function ok(id){
            alert(id)
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>