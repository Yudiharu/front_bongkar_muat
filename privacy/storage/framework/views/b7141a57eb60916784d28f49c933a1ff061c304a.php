<?php $__env->startSection('title', 'Lokasi'); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="startTime()"> 
    <div class="box box-solid">
        <!-- <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Lokasi</b></font>
        </div> -->
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Lokasi</button>
                </div>
            </div>
             <table class="table table-bordered table-striped table-hover" id="data-table" style="font-size: 12px;">
                <thead>
                <tr class="bg-blue">
                    <th>ID Lokasi</th>
                    <th>Nama Lokasi</th>
                    <th>Nickname</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <!-- <th>Created At</th> -->
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
           <!--   -->
            <?php echo Form::open(['id'=>'ADD']); ?>

                <div class="modal-body">
                        <div class="row">
                            <!--  -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama lokasi', 'Nama Lokasi:')); ?>

                                    <?php echo e(Form::text('nama_lokasi', null, ['class'=> 'form-control','id'=>'nama1','required'=>'required', 'placeholder'=>'Nama Lokasi','onkeypress'=>"return pulsar(event,this)",'autocomplete'=>'off'])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nickname', 'Nickname:')); ?>

                                    <?php echo e(Form::text('nickname', null, ['class'=> 'form-control','id'=>'nick1','required'=>'required', 'placeholder'=>'Nickname','onkeypress'=>"return pulsar(event,this)",'autocomplete'=>'off'])); ?>

                                    <span class="text-danger">
                                        <strong class="nickname-error" id="nickname-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                    <?php echo e(Form::label('status', 'Status:')); ?>

                                    <?php echo e(Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'status1','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="status-error" id="status-error"></strong>
                                    </span>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('alamat', 'Alamat:')); ?>

                                    <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>4,'id'=>'alamat1','required'=>'required', 'placeholder'=>'Alamat','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

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
           <!--   -->
            <?php echo Form::open(['id'=>'EDIT']); ?>

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                                    
                                    <?php echo e(Form::hidden('id_lokasi', null, ['class'=> 'form-control','id'=>'Kode2','readonly'])); ?>

                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama lokasi', 'Nama Lokasi:')); ?>

                                    <?php echo e(Form::text('nama_lokasi', null, ['class'=> 'form-control','id'=>'Nama2','required'=>'required','autocomplete'=>'off'])); ?>

                                </div>
                            </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('nickname', 'Nickname:')); ?>

                                <?php echo e(Form::text('nickname', null, ['class'=> 'form-control','id'=>'Nick2','required'=>'required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('status', 'Status:')); ?>

                                <?php echo e(Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control','id'=>'Status2','required'=>'required'])); ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::label('Alamat', 'Alamat:')); ?>

                                    <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>4,'id'=>'Alamat2','required'=>'required'])); ?>

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
                // { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        $('.select2').select2({
            placeholder: "Pilih",
            allowClear: true,
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

                $.ajax({
                    url:'<?php echo route('masterlokasi.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#nama1').val('');
                        $('#nick1').val('');
                        $('#status1').val('').trigger('change');
                        $('#alamat1').val('');
                        $('.name-error').html('');
                        $('.nickname-error').html('');
                        $('.status-error').html('');
                        $('.alamat-error').html('');
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
            var id = $.trim($('#Kode2').val());
            var name = $.trim($('#Nama2').val());
            var nick = $.trim($('#Nick2').val());
            var status = $.trim($('#Status2').val());
            var alamat = $.trim($('#Alamat2').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('masterlokasi.updateajax'); ?>',
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
        function pulsar(e,obj) {
              tecla = (document.all) ? e.keyCode : e.which;
              //alert(tecla);
              if (tecla!="8" && tecla!="0"){
                obj.value += String.fromCharCode(tecla).toUpperCase();
                return false;
              }else{
                return true;
              }
        }

        function edit(id, url) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

               $.ajax({
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        // console.log(result);
                        $('#editform').modal('show');
                        $('#Kode2').val(results.id);
                        $('#Nama2').val(results.nama_lokasi);
                        $('#Nick2').val(results.nickname);
                        $('#Alamat2').val(results.alamat);
                        $('#Status2').val(results.status);
                       },
                        error : function() {
                        alert("Nothing Data");
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
                        refreshTable();
                    }
                });
            }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>