<?php $__env->startSection('title', 'Transaksi Setup'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="startTime()">
    <div class="box box-solid">
        <!-- <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Transaksi Setup</b></font>
        </div> -->
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Transaksi Setup</button>
                </div>
            </div>
             <table class="table table-bordered table-striped table-hover" id="merek-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-info">
                    <th>Kode Setup</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Transaksi</th>
                    
                    
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_transaksi', 'Kode Transaksi:')); ?>

                                    <?php echo e(Form::text('kode_transaksi', null, ['class'=> 'form-control','id'=>'Kode1', 'placeholder'=>'Kode Transaksi','required'=>'required','autocomplete'=>'off'])); ?>

                                    <span class="text-danger">
                                        <strong class="kode-error" id="kode-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_transaksi', 'Nama Transaksi:')); ?>

                                    <?php echo e(Form::text('nama_transaksi', null, ['class'=> 'form-control','id'=>'Nama1','required'=>'required', 'placeholder'=>'Nama Transaksi','autocomplete'=>'off'])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <?php echo e(Form::submit('Create data', ['class' => 'btn btn-success crud-submit'])); ?>

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
                    <div class="form-group">
                                    
                                    <?php echo e(Form::hidden('kode_setup', null, ['class'=> 'form-control','id'=>'Kode','readonly'])); ?>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('kode_transaksi', 'Kode Transaksi:')); ?>

                            <?php echo e(Form::text('kode_transaksi', null, ['class'=> 'form-control','id'=>'Kode_e','readonly','required'=>'required'])); ?>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php echo e(Form::label('nama_transaksi', 'Nama Transaksi:')); ?>

                            <?php echo e(Form::text('nama_transaksi', null, ['class'=> 'form-control','id'=>'Nama_e','required'=>'required','autocomplete'=>'off'])); ?>

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
   
    <script type="text/javascript">
        $(function() {
            $('#merek-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('transaksisetup.data'); ?>',
            columns: [
                { data: 'kode_setup', name: 'kode_setup' },
                { data: 'kode_transaksi', name: 'kode_transaksi' },
                { data: 'nama_transaksi', name: 'nama_transaksi' },
                // { data: 'created_at', name: 'created_at' },
                // { data: 'updated_at', name: 'updated_at' },
                // { data: 'created_by', name: 'created_by' },
                // { data: 'updated_by', name: 'updated_by' },
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
             $('#merek-table').DataTable().ajax.reload(null,false);;
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });

        $('#ADD').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var kode = $.trim($('#Kode1').val());
            var name = $.trim($('#Nama1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('transaksisetup.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Kode1').val('');
                        $('#Nama1').val('');
                        $( '.kode-error' ).html('');
                        $( '.name-error' ).html('');
                        $('#addform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }   
                    },
                });
        });

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var kode_setup = $.trim($('#Kode').val());
            var kode = $.trim($('#Kode_e').val());
            var name = $.trim($('#Nama_e').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();
                $.ajax({
                    url:'<?php echo route('transaksisetup.ajaxupdate'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
        });

        function edit(id, url) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: url,
                    type: 'GET',type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        // console.log(result);
                        $('#editform').modal('show');
                        $('#Kode').val(results.kode_setup);
                        $('#Kode_e').val(results.kode_transaksi);
                        $('#Nama_e').val(results.nama_transaksi);
                        // $('#Update').attr('action','satuan.ajaxupdate'+','+'result.kode_satuan')
                    },
                        error : function() {
                        alert("Nothing Data");
                    }
                });

        }
        

        function update() {
         e.preventDefault();
         var form_action = $("#editform").find("form").attr("action");
                $.ajax({
                    
                    url: form_action,
                    type: 'POST',
                    data:$('#Update').serialize(),
                    success: function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        $.notify(data.message, "success");
                        refreshTable();
                    }
                });
        }

        function del(id, url) {
            swal({
            title: "Hapus?",
            text: "Pastikan dahulu item yang akan di hapus",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                

                $.ajax({
                    type: 'DELETE',
                    url: url,
                    
                    success: function (results) {
                    // console.log(results);
                        if (results.success === true) {
                            swal("Berhasil!", results.message, "success");
                        } else {
                            swal("Gagal!", results.message, "error");
                        }
                          
                        // $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>