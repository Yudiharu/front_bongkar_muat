<?php $__env->startSection('title', 'Kapal'); ?>

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
                    <?php if (app('laratrust')->can('create-kapal')) : ?>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New kapal</button>
                    <?php endif; // app('laratrust')->can ?>

                    <span class="pull-right">  
                        <font style="font-size: 16px;"><b>KAPAL</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="kapal-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-danger">
                        <th>Kode kapal</th>
                        <th>Nama kapal</th>
                        <th>Merk</th>
                        <th>Type</th>
                        <th>Tahun</th>
                        <th>No Asset</th>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_kapal', 'Nama kapal:')); ?>

                                    <?php echo e(Form::text('nama_kapal', null, ['class'=> 'form-control','id'=>'Nama1', 'placeholder'=>'Nama kapal','required', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('merk', 'Merk:')); ?>

                                    <?php echo e(Form::text('merk', null, ['class'=> 'form-control','id'=>'Nama2','required'=>'required', 'placeholder'=>'Merk', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Type', 'Tipe Kapal:',['class'=>'control-label'])); ?>

                                    <?php echo e(Form::select('type', ['MV'=>'MV','KM'=>'KM','LCT'=>'LCT','MT'=>'MT','Tug Boat'=>'Tug Boat','Tongkang'=>'Tongkang'],null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Nama3'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tahun', 'Tahun:')); ?>

                                    <?php echo e(Form::selectYear('tahun', 2000, 2040, null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => 'Pilih Tahun','id'=>'Nama4','required'=>'required', 'autocomplete'=>''])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Nomoor', 'No Aset Kapal:')); ?>

                                    <?php echo e(Form::text('no_asset_kapal', null, ['class'=> 'form-control','id'=>'Aset1', 'placeholder'=>'No.Aset','required', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

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
                    
                    <?php echo e(Form::hidden('kode_kapal', null, ['class'=> 'form-control','id'=>'Kode','readonly'])); ?>


                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('nama_kapal', 'Nama kapal:')); ?>

                            <?php echo e(Form::text('nama_kapal', null, ['class'=> 'form-control','id'=>'Nama','required'=>'required', 'autocomplete'=>'off'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('merk', 'Merk:')); ?>

                            <?php echo e(Form::text('merk', null, ['class'=> 'form-control','id'=>'Merk','required'=>'required', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('Type', 'Tipe Kapal:',['class'=>'control-label'])); ?>

                            <?php echo e(Form::select('type', ['MV'=>'MV','KM'=>'KM','LCT'=>'LCT','MT'=>'MT','Tug Boat'=>'Tug Boat','Tongkang'=>'Tongkang'],null, ['class'=> 'form-control select2','style'=>'width: 100%','id'=>'Tipe2'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('tahun', 'Tahun:')); ?>

                            <?php echo e(Form::selectYear('tahun', 2000, 2040, null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => 'Pilih Tahun','id'=>'Tahun','required'=>'required', 'autocomplete'=>'off'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('Nomoor', 'No Aset Kapal:')); ?>

                            <?php echo e(Form::text('no_asset_kapal', null, ['class'=> 'form-control','id'=>'Aset2', 'placeholder'=>'No.Aset','required', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

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

      <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i><?php echo e($nama_company); ?></i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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

            /* Button used to open the contact form - fixed at the bottom of the page */
            .hapus-button {
                background-color: #F63F3F;
                bottom: 186px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 216px;
            }

            #mySidenav button {
              position: fixed;
              right: -30px;
              transition: 0.3s;
              padding: 4px 8px;
              width: 70px;
              text-decoration: none;
              font-size: 12px;
              color: white;
              border-radius: 5px 0 0 5px ;
              opacity: 0.8;
              cursor: pointer;
              text-align: left;
            }

            #mySidenav button:hover {
              right: 0;
            }

            #about {
              top: 70px;
              background-color: #4CAF50;
            }

            #blog {
              top: 130px;
              background-color: #2196F3;
            }

            #projects {
              top: 190px;
              background-color: #f44336;
            }

            #contact {
              top: 250px;
              background-color: #555
            }
        </style>

        <div id="mySidenav" class="sidenav">
            <?php if (app('laratrust')->can('update-kapal')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editkapal" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-kapal')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuskapal" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>
        </div>
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

        function load(){
            startTime();
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.back2Top').show();
        }
        
        $(function() {
            $('#kapal-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('kapal.data'); ?>',
            columns: [
                { data: 'kode_kapal', name: 'kode_kapal', visible: false },
                { data: 'nama_kapal', name: 'nama_kapal' },
                { data: 'merk', name: 'merk' },
                { data: 'type', name: 'type' },
                { data: 'tahun', name: 'tahun' },
                { data: 'no_asset_kapal', name: 'no_asset_kapal' },
            ]
            });
        });

        function formatNomor(n) {
            if(n == 'HO'){
                var stat = "<span style='color:#0275d8'><b>HO</b></span>";
                return n.replace(/HO/, stat);
            }else{
                var str = n;
                var result = str.fontcolor( "#eb4034" );
                return result;
            }
        }

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

        $(document).ready(function(){
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
            
            $('[data-toggle="tooltip"]').tooltip();   

            var table = $('#kapal-table').DataTable();

            $('#kapal-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var kode_kapal = select.find('td:eq(0)').text();
                    $('.hapus-button').show();
                    $('.edit-button').show();
                    
                }
            });

            $('#editkapal').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#kapal-table').DataTable().row(select).data();
                var kode_kapal = data['kode_kapal'];
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('kapal.edit_kapal'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_kapal
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Kode').val(results.kode_kapal);
                        $('#Nama').val(results.nama_kapal);
                        $('#Merk').val(results.merk);
                        $('#Tipe2').val(results.type).trigger('change');
                        $('#Tahun').val(results.tahun).trigger('change');
                        $('#Asset').val(results.no_asset_kapal).trigger('change');
                        $('#Lokasi').val(results.kode_lokasi);
                        $('#editform').modal('show');
                    }
                });
            });

            $('#hapuskapal').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#kapal-table').DataTable().row(select).data();
                var kode_kapal = data['kode_kapal'];
                var row = table.row( select );
                swal({
                    title: "Hapus?",
                    text: "Pastikan dahulu item yang akan di hapus",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal!",
                    reverseButtons: !0
                }).then(function (e) {
                    if (e.value === true) {
                        $.ajax({
                            url: '<?php echo route('kapal.hapus_kapal'); ?>',
                            type: 'POST',
                            data : {
                                'id': kode_kapal
                            },

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
            });
        });

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
            if ((("0123456789.-").indexOf(keychar) > -1)) {
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
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('kapal.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Nama1').val('');
                        $('#Nama3').val('').trigger('change');
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
        
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>