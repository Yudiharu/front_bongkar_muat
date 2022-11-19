<?php $__env->startSection('title', 'Lokasi'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Lokasi</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
    
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Manages Lokasi</h3>
        </div>
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Lokasi</button>
                </div>
            </div>
             <table class="table table-bordered table-hover" id="data-table">
                <thead>
                <tr class="bg-purple">
                    <th>ID Lokasi</th>
                    <th>Nama Lokasi</th>
                    <th>Nickname</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                 </tr>
                </thead>
            </table>

        </div>
    </div>

<div class="modal fade" id="addform" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
            <?php echo Form::open(['id'=>'ADD']); ?>

                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('ID Lokasi', 'ID Lokasi:')); ?>

                                        <?php echo e(Form::text('id_lokasi', null, ['class'=> 'form-control','id'=>'id1','required'=>'required'])); ?>

                                        <span class="text-danger">
                                            <strong class="id-error" id="id-error"></strong>
                                        </span>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama lokasi', 'Nama Lokasi:')); ?>

                                    <?php echo e(Form::text('nama_lokasi', null, ['class'=> 'form-control','id'=>'nama1','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nickname', 'Nickname:')); ?>

                                    <?php echo e(Form::text('nickname', null, ['class'=> 'form-control','id'=>'nick1','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="nickname-error" id="nickname-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                    <?php echo e(Form::label('status', 'Status:')); ?>

                                    <?php echo e(Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control','id'=>'status1'])); ?>

                                    <span class="text-danger">
                                        <strong class="status-error" id="status-error"></strong>
                                    </span>
                                    </div>
                                </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('alamat', 'Alamat:')); ?>

                                    <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>4,'id'=>'alamat1','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="alamat-error" id="alamat-error"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="modal-footer">
                        <div class="row">
                            <?php echo e(Form::submit('Create data', ['onclick'=>'add()','class' => 'btn btn-success crud-submit','id'=>'submitForm'])); ?>

                            <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                        </div>
                    </div>
            <?php echo Form::close(); ?>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="editform" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
            <?php echo Form::open(['id'=>'EDIT']); ?>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::hidden('id_lokasi', null, ['class'=> 'form-control','id'=>'Id'])); ?>

                                <?php echo e(Form::label('nama lokasi', 'Nama Lokasi:')); ?>

                                <?php echo e(Form::text('nama_lokasi', null, ['class'=> 'form-control','id'=>'Nama'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('nickname', 'Nickname:')); ?>

                                <?php echo e(Form::text('nickname', null, ['class'=> 'form-control','id'=>'Nick'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('status', 'Status:')); ?>

                                <?php echo e(Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control','id'=>'Status'])); ?>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <?php echo e(Form::label('Alamat', 'Alamat:')); ?>

                                    <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>4,'id'=>'Alamat'])); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                        <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                    </div>
                </div>
            <?php echo Form::close(); ?>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script>
        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('masterlokasi.data'); ?>',
            columns: [
                { data: 'id_lokasi', name: 'id_lokasi' },
                { data: 'nama_lokasi', name: 'nama_lokasi' },
                { data: 'nickname', name: 'nickname' },
                { data: 'alamat', name: 'alamat' },
                { data: 'status', name: 'status' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });

        $('#ADD').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var name = $.trim($('#nama1').val());
            var nick = $.trim($('#nick1').val());
            var status = $.trim($('#status1').val());
            var alamat = $.trim($('#alamat1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

            // Check if empty of not
            if (name === '' || nick === '' || status === '' || alamat === '' ) {
                    if(name === ''){
                        $( '.name-error' ).html('Mohon di isi');
                    }
                    if(nick === ''){
                        $( '.nickname-error' ).html('Mohon di isi');
                    }
                    if(status === ''){
                        $( '.status-error' ).html('Mohon di isi');
                    }
                    if(alamat === ''){
                        $( '.alamat-error' ).html('Mohon di isi');
                    }
                // alert('Mohon Lengkapi Form Isian');
                // return false;
            }else{
                $.ajax({
                    url:'<?php echo route('masterlokasi.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#nama1').val('');
                        $('#nick1').val('');
                        $('#status1').val('');
                        $('#alamat1').val('');
                        $('.name-error').html('');
                        $('.nickname-error').html('');
                        $('.status-error').html('');
                        $('.alamat-error').html('');
                        $('#addform').modal('hide');
                        refreshTable();
                        $.notify(data.message, "success");
                    },
                });
            }
        });

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var id = $.trim($('#Id').val());
            var name = $.trim($('#Nama').val());
            var nick = $.trim($('#Nick').val());
            var status = $.trim($('#Status').val());
            var alamat = $.trim($('#Alamat').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

            // Check if empty of not
            if (id === '' || name === '' || nick === '' || status === '' || alamat === '' ) {
                
                alert('Mohon Lengkapi Form Isian');
                return false;
            }else{
                $.ajax({
                    url:'<?php echo route('masterlokasi.updateajax'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        refreshTable();
                        $.notify(data.message, "success");
                    },
                });
            }
        });

        // function add(){
        //     e.preventDefault();
        //     var name = $.trim($('#nama1').val());
        //     var nick = $.trim($('#nick1').val());
        //     var status = $.trim($('#status1').val());
        //     var alamat = $.trim($('#alamat1').val());
        //     var registerForm = $("#Register");
        //     var formData = registerForm.serialize();

        //     if (name === '' || nick === '' || status === '' || alamat === '' ) {
        //     alert('ada input yang kosong mohon di lengkapi');
        //     return false;
        //     }else{
        //         $.ajax({
        //         url:'<?php echo route('masterlokasi.store'); ?>',
        //         type:'POST',
        //         data:formData,
        //         success:function(data) {
        //             console.log(data);
        //             $('#addform').modal('hide');
        //             refreshTable();
        //             $.notify(data.message, "success");
        //         },
        //       });
        //     }
           
        // }

        function edit(id, url) {
            var result = confirm("Want to Edit?");
            if (result) {
                // console.log(id)
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        console.log(result);
                        $('#Id').val(result.id);
                        $('#Nama').val(result.nama_lokasi);
                        $('#Nick').val(result.nickname);
                        $('#Alamat').val(result.alamat);
                        $('#Status').val(result.status);
                        $('#editform').modal('show');
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
                        $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>