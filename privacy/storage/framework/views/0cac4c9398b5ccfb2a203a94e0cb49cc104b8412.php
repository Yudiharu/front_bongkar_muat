

<?php $__env->startSection('title', 'kapal'); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="startTime()">
    <div class="box box-solid">
        <!-- <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>kapal</b></font>
        </div> -->
        <div class="box-body">
             <table class="table table-bordered table-striped table-hover" id="kapal-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-blue">
                    <th>Kode kapal</th>
                    <th>Nama kapal</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Tahun</th>
                    <th>No Asset</th>
                    <th>Lokasi</th>
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
                                    <?php echo e(Form::label('nama_kapal', 'Nama kapal:')); ?>

                                    <?php echo e(Form::text('nama_kapal', null, ['class'=> 'form-control','id'=>'Nama1', 'placeholder'=>'Nama kapal','required'=>'required', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('merk', 'Merk:')); ?>

                                    <?php echo e(Form::text('merk', null, ['class'=> 'form-control','id'=>'Nama2','required'=>'required', 'placeholder'=>'Merk', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('type', 'Type:')); ?>

                                    <?php echo e(Form::text('type', null, ['class'=> 'form-control','id'=>'Nama3','required'=>'required', 'placeholder'=>'Type', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tahun', 'Tahun:')); ?>

                                    <?php echo e(Form::selectYear('tahun', 2000, 2020, null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => 'Pilih Tahun','id'=>'Nama4','required'=>'required', 'autocomplete'=>''])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_asset', 'No Asset:')); ?>

                                    <?php echo e(Form::text('no_asset_kapal', null, ['class'=> 'form-control','id'=>'Asset1', 'placeholder'=>'No. Asset', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

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
                                    <?php echo e(Form::hidden('kode_kapal', null, ['class'=> 'form-control','id'=>'Kode','readonly'])); ?>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('nama_kapal', 'Nama kapal:')); ?>

                            <?php echo e(Form::text('nama_kapal', null, ['class'=> 'form-control','id'=>'Nama','required'=>'required', 'autocomplete'=>'off','readonly'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('merk', 'Merk:')); ?>

                            <?php echo e(Form::text('merk', null, ['class'=> 'form-control','id'=>'Merk','required'=>'required', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('type', 'Type:')); ?>

                            <?php echo e(Form::text('type', null, ['class'=> 'form-control','id'=>'Type','required'=>'required', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('tahun', 'Tahun:')); ?>

                            <?php echo e(Form::selectYear('tahun', 1900, 2019, null, ['class'=> 'form-control','id'=>'Tahun','required'=>'required', 'autocomplete'=>'off'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_asset', 'No Asset:')); ?>

                                    <?php echo e(Form::text('no_asset_kapal', null, ['class'=> 'form-control','id'=>'Asset', 'autocomplete'=>'off','readonly'])); ?>

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

                    <!--  -->
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
            $('#kapal-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('kapal.data'); ?>',
            columns: [
                { data: 'kode_kapal', name: 'kode_kapal' },
                { data: 'nama_kapal', name: 'nama_kapal' },
                { data: 'merk', name: 'merk' },
                { data: 'type', name: 'type' },
                { data: 'tahun', name: 'tahun' },
                { data: 'no_asset_kapal', name: 'no_asset_kapal' },
                { data: 'id_lokasi', name: 'id_lokasi' },
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

        function hanyaAngka(e, decimal) {
            var key;
            var keychar;
             if (window.event) {
                 key = window.event.keyCode;
             } else
             if (e) {
                 key = e.which;
             } else return true;
          
            keychar = String.fromCharCode(key);
            if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
                return true;
            } else
            if ((("0123456789").indexOf(keychar) > -1)) {
                return true;
            } else
            if (decimal && (keychar == ".")) {
                return true;
            } else return false;
        } 

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
             $('#kapal-table').DataTable().ajax.reload(null,false);;
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
            var name = $.trim($('#Nama1').val());
            var merk = $.trim($('#Nama2').val());
            var type = $.trim($('#Nama3').val());
            var tahun = $.trim($('#Nama4').val());
            var asset = $.trim($('#Asset1').val());
            var lokasi = $.trim($('#Lokasi1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('kapal.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#Nama1').val('');
                        $('#Nama2').val('');
                        $('#Nama3').val('');
                        $('#Nama4').val('').trigger('change');
                        $('#Asset1').val('');
                        $('#Lokasi1').val('').trigger('change');
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
            var kode = $.trim($('#Kode').val());
            var name = $.trim($('#Nama').val());
            var merk = $.trim($('#Merk').val());
            var type = $.trim($('#Type').val());
            var tahun = $.trim($('#Tahun').val());
            var asset = $.trim($('#Asset').val());
            var lokasi = $.trim($('#Lokasi').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('kapal.ajaxupdate'); ?>',
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
                        $('#Kode').val(results.kode_kapal);
                        $('#Nama').val(results.nama_kapal);
                        $('#Merk').val(results.merk);
                        $('#Type').val(results.type);
                        $('#Tahun').val(results.tahun);
                        $('#Asset').val(results.no_asset_kapal);
                        $('#Lokasi').val(results.id_lokasi);
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
            text: "Pastikan dulu data yang akan dihapus!",
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