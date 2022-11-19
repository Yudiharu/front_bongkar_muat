<?php $__env->startSection('title', 'Mobil'); ?>

<?php $__env->startSection('content_header'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Mobil</b></font>
        </div>
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    <!--  -->
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Mobil</button>
                </div>
            </div>
             <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-gray">
                    <th>Kode Mobil</th>
                    <th>Nopol</th>
                    <th>Jenis Mobil</th>
                    <th>No Asset</th>
                    <th>Lokasi</th>
                    <!--  -->
                    <th>Action</th>
                 </tr>
                </thead>
            </table>

        </div>
    </div>

    <div class="modal fade" id="addform" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--  -->
            <?php echo Form::open(['id'=>'ADD']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <!--  -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nopol', 'Nopol:')); ?>

                                    <?php echo e(Form::text('nopol', null, ['class'=> 'form-control','id'=>'Nopol1', 'placeholder'=>'No. Polisi','required'=>'required','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                    <span class="text-danger">
                                        <strong class="nopol-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_jenis_mobil', 'Jenis Mobil:')); ?>

                                    <?php echo e(Form::select('kode_jenis_mobil', $JenisMobil, null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Jenis1','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="kode-jenis-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_asset', 'No Asset:')); ?>

                                    <?php echo e(Form::text('no_asset_mobil', null, ['class'=> 'form-control','id'=>'Asset1', 'placeholder'=>'No. Asset','required'=>'required','autocomplete'=>'off'])); ?>

                                    <span class="text-danger">
                                        <strong class="noasset-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('id_lokasi', 'Lokasi:')); ?>

                                    <?php echo e(Form::select('id_lokasi', $lokasi,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Lokasi1',
                                    'required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="lokasi-error" id="name-error"></strong>
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
            <!--  -->
            <?php echo Form::open(['id'=>'EDIT']); ?>

            <div class="modal-body">
                <div class="row">
                                <div class="form-group">
                                    <!--  -->
                                    <?php echo e(Form::hidden('kode_mobil', null, ['class'=> 'form-control','id'=>'Kode','readonly'])); ?>

                                </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nopol', 'Nopol:')); ?>

                                    <?php echo e(Form::text('nopol', null, ['class'=> 'form-control','id'=>'Nopol','required'=>'required','readonly'])); ?>

                                    <span class="text-danger">
                                        <strong class="nopol-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_jenis_mobil', 'Jenis Mobil:')); ?>

                                    <?php echo e(Form::select('kode_jenis_mobil',$JenisMobil,null, ['class'=> 'form-control','id'=>'Jenis','required'=>'required','style'=>'width: 100%'])); ?>

                                    <span class="text-danger">
                                        <strong class="kode-jenis-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_asset', 'No Asset:')); ?>

                                    <?php echo e(Form::text('no_asset_mobil', null, ['class'=> 'form-control','id'=>'Asset','required'=>'required','readonly'])); ?>

                                    <span class="text-danger">
                                        <strong class="noasset-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('id_lokasi', 'Lokasi:')); ?>

                                    <?php echo e(Form::select('id_lokasi', $lokasi,null, ['class'=> 'form-control','id'=>'Lokasi',
                                    'required'=>'required'])); ?>

                                   
                                    <span class="text-danger">
                                        <strong class="lokasi-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                   <!--   -->
                    <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                </div>
            </div>
            <?php echo Form::close(); ?>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script type="text/javascript">
        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('mobil.data'); ?>',
            columns: [
                { data: 'kode_mobil', name: 'kode_mobil' },
                { data: 'nopol', name: 'nopol' },
                { data: 'jenismobil.nama_jenis_mobil', name: 'jenismobil.nama_jenis_mobil' },
                { data: 'no_asset_mobil', name: 'no_asset_mobil' },
                { data: 'masterlokasi.nama_lokasi', name: 'masterlokasi.nama_lokasi' },
                { data: 'action', name: 'action' }
            ]
            });
        });


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

        $('.select2').select2({
            placeholder: "Silahkan Pilih",
            allowClear: true,
        });

    //     $('.select2').on('change', function() {
    //   var data = $(".select2 option:selected").text();
    //   $("#Jenis").val(data);
    // })

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
            // var kode = $.trim($('#Kode1').val());
            var nopol = $.trim($('#Nopol1').val());
            var jenis = $.trim($('#Jenis1').val());
            var asset = $.trim($('#Asset1').val());
            var lokasi = $.trim($('#Lokasi1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('mobil.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#Nopol1').val('');
                        $('#Jenis1').val('').trigger('change');
                        $('#Asset1').val('');
                        $('#Lokasi1').val('').trigger('change');
                        $( '.kode-error' ).html('');
                        $( '.nopol-error' ).html('');
                        $( '.kode-jenis-error' ).html('');
                        $( '.noasset-error' ).html('');
                        $( '.lokasi-error' ).html('');
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
            var kode = $.trim($('#Kode').val());
            var nopol = $.trim($('#Nopol').val());
            var jenis = $.trim($('#Jenis').val());
            var asset = $.trim($('#Asset').val());
            var lokasi = $.trim($('#Lokasi').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

            // Check if empty of not            
                $.ajax({
                    url:'<?php echo route('mobil.ajaxupdate'); ?>',
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
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        // console.log(result);
                        $('#editform').modal('show');
                        $('#Kode').val(results.kode_mobil);
                        $('#Nopol').val(results.nopol);
                        $('#Jenis').val(results.kode_jenis_mobil);
                        $('#Asset').val(results.no_asset_mobil);
                        $('#Lokasi').val(results.id_lokasi);
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
            text: "Pastikan dulu data yang akan dihapus.",
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