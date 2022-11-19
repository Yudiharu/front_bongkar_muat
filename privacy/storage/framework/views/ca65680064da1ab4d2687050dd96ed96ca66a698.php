<?php $__env->startSection('title', 'Alat'); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Alat</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="alat-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-blue">
                        <th>Kode Alat</th>
                        <th>Nama Alat</th>
                        <th>Merk</th>
                        <th>Type</th>
                        <th>Kapasitas (TON)</th>
                        <th>Tahun</th>
                        <th>No Asset</th>
                        <th>Lokasi</th>
                        <th>Action</th>
                     </tr>
                    </thead>
                </table>
            </div>
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
            <?php echo Form::open(['id'=>'ADD']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_alat', 'Nama Alat:')); ?>

                                    <?php echo e(Form::text('nama_alat', null, ['class'=> 'form-control','id'=>'Nama1', 'placeholder'=>'Nama Alat','required'=>'required', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('merk', 'Merk:')); ?>

                                    <?php echo e(Form::text('merk', null, ['class'=> 'form-control','id'=>'Nama2','required'=>'required', 'placeholder'=>'Merk', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('type', 'Type:')); ?>

                                    <?php echo e(Form::text('type', null, ['class'=> 'form-control','id'=>'Nama3','required'=>'required', 'placeholder'=>'Type', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tahun', 'Tahun:')); ?>

                                    <?php echo e(Form::selectYear('tahun', 2000, 2020, null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Nama4','required'=>'required', 'autocomplete'=>''])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('kapasitas', 'Kapasitas:')); ?>

                                    <?php echo e(Form::text('kapasitas', null, ['class'=> 'form-control','id'=>'kapasitas1', 'placeholder'=>'Kapasitas (Ton)', 'autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_asset', 'No Asset:')); ?>

                                    <?php echo e(Form::text('no_asset_alat', null, ['class'=> 'form-control','id'=>'Asset1', 'placeholder'=>'No. Asset', 'autocomplete'=>'off','data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Maksimal 15 Karakter", 'maxlength'=>'15','required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_lokasi', 'Lokasi:')); ?>

                                    <?php echo e(Form::select('kode_lokasi', $lokasi,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Lokasi1',
                                    'required'=>'required'])); ?>

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
                    
                    <?php echo e(Form::hidden('kode_alat', null, ['class'=> 'form-control','id'=>'Kode','readonly'])); ?>

                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('nama_alat', 'Nama Alat:')); ?>

                            <?php echo e(Form::text('nama_alat', null, ['class'=> 'form-control','id'=>'Nama','required'=>'required', 'autocomplete'=>'off','readonly'])); ?>

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
                            <?php echo e(Form::label('kapasitas', 'Kapasitas:')); ?>

                            <?php echo e(Form::text('kapasitas', null, ['class'=> 'form-control','id'=>'kapasitas2', 'placeholder'=>'Kapasitas (Ton)', 'autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                            </div>
                        </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('tahun', 'Tahun:')); ?>

                            <?php echo e(Form::selectYear('tahun', 2000, 2019, null, ['class'=> 'form-control','id'=>'Tahun','required'=>'required', 'autocomplete'=>'off'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('no_asset', 'No Asset:')); ?>

                            <?php echo e(Form::text('no_asset_alat', null, ['class'=> 'form-control','id'=>'Asset', 'autocomplete'=>'off','readonly','data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Maksimal 15 Karakter", 'maxlength'=>'15'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('kode_lokasi', 'Lokasi:')); ?>

                            <?php echo e(Form::select('kode_lokasi', $lokasi,null, ['class'=> 'form-control','id'=>'Lokasi',
                                    'required'=>'required'])); ?>

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

      <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-map-marker" style="color: #fff"></i> <i>PT. SELARAS UNGGUL BERSAMA</i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

        <style type="text/css">
            #back2Top {
                width: 400px;
                line-height: 27px;
                overflow: hidden;
                z-index: 999;
                display: none;
                cursor: pointer;
                position: fixed;
                bottom: 0;
                text-align: left;
                font-size: 15px;
                color: #000000;
                text-decoration: none;
            }
            #back2Top:hover {
                color: #fff;
            }
        </style>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script type="text/javascript">
        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 1) {
                $('#back2Top').show();
            } else {
                $('#back2Top').show();
            }
        });
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        });

        function load(){
            startTime();
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.back2Top').show();
        }

        $(function() {
            $('#alat-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('alat.data'); ?>',
            columns: [
                { data: 'kode_alat', name: 'kode_alat' },
                { data: 'nama_alat', name: 'nama_alat' },
                { data: 'merk', name: 'merk' },
                { data: 'type', name: 'type' },
                { data: 'kapasitas', name: 'kapasitas' },
                { data: 'tahun', name: 'tahun' },
                { data: 'no_asset_alat', name: 'no_asset_alat' },
                { data: 'kode_lokasi', name: 'kode_lokasi' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
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
             $('#alat-table').DataTable().ajax.reload(null,false);;
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });

        $('#ADD').submit(function (e) {
            e.preventDefault();
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('alat.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Nama1').val('');
                        $('#Nama2').val('');
                        $('#Nama3').val('');
                        $('#Nama4').val('').trigger('change');
                        $('#Asset1').val('');
                        $('#Lokasi1').val('').trigger('change');
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
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('alat.ajaxupdate'); ?>',
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
                        $('#Kode').val(results.kode_alat);
                        $('#Nama').val(results.nama_alat);
                        $('#Merk').val(results.merk);
                        $('#Type').val(results.type);
                        $('#kapasitas2').val(results.kapasitas);
                        $('#Tahun').val(results.tahun);
                        $('#Asset').val(results.no_asset_alat);
                        $('#Lokasi').val(results.kode_lokasi);
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