

<?php $__env->startSection('title', 'Tanggal Setup'); ?>

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
                        <i class="fa fa-plus"></i> New Setup</button>

                    <span class="pull-right">
                        <font style="font-size: 16px;"><b>TANGGAL SETUP</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="tanggalsetup-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-info">
                        <th>id</th>
                        <th>Nama Setup</th>
                        <th>Hari</th>
                     </tr>
                    </thead>
                </table>
            </div>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('catatan', 'Kode Setup:')); ?>

                            <?php echo e(Form::text('kode_setup', null, ['class'=> 'form-control','id'=>'Nama1','required'=>'required', 'placeholder'=>'Nama Setup','onkeypress'=>"return pulsar(event,this)"])); ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo e(Form::label('catatan', 'Jumlah Hari:')); ?>

                            <?php echo e(Form::text('hari', 0, ['class'=> 'form-control','id'=>'Hari1','required'=>'required', 'placeholder'=>'Jumlah selisih hari'])); ?>

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
                <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'Nomor','readonly'])); ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('catatan', 'Kode Setup:')); ?>

                            <?php echo e(Form::text('kode_setup', null, ['class'=> 'form-control','id'=>'Nama2','required'=>'required', 'placeholder'=>'Nama Setup','onkeypress'=>"return pulsar(event,this)"])); ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo e(Form::label('catatan', 'Jumlah Hari:')); ?>

                            <?php echo e(Form::text('hari', 0, ['class'=> 'form-control','id'=>'Hari2','required'=>'required', 'placeholder'=>'Jumlah selisih hari'])); ?>

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
            
            <button type="button" class="btn btn-warning btn-xs edit-button" id="edittanggalsetup" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapustanggalsetup" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            
        </div>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script>
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
            $('.edit-button').hide();
            $('.hapus-button').hide();
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

        $(function() {
            $('#tanggalsetup-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('tanggalsetup.data'); ?>',
            columns: [
                { data: 'id', name: 'id', visible: false },
                { data: 'kode_setup', name: 'kode_setup' },
                { data: 'hari', name: 'hari' },
            ]
            });
        });

        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            var table = $('#tanggalsetup-table').DataTable();
            
            $('#tanggalsetup-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                    $('.edit-button').hide();
                    $('.hapus-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    $('.edit-button').show();
                    $('.hapus-button').show();
                }
            });

            $('#edittanggalsetup').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#tanggalsetup-table').DataTable().row(select).data();
                var nomor = data['id'];
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('tanggalsetup.edit_tanggalsetup'); ?>',
                    type: 'POST',
                    data : {
                        'id': nomor
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Nomor').val(results.id);
                        $('#Nama2').val(results.kode_setup);
                        $('#Hari2').val(results.hari);
                        $('#editform').modal('show');
                    }
                });
            });

            $('#hapustanggalsetup').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#tanggalsetup-table').DataTable().row(select).data();
                var nomor = data['id'];
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
                            url: '<?php echo route('tanggalsetup.hapus_tanggalsetup'); ?>',
                            type: 'POST',
                            data : {
                                'id': nomor
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function refreshTable() {
             $('#tanggalsetup-table').DataTable().ajax.reload(null,false);;
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
                    url:'<?php echo route('tanggalsetup.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Nama1').val('');
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
                    url:'<?php echo route('tanggalsetup.ajaxupdate'); ?>',
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
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>