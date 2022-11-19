<?php $__env->startSection('title', 'Cash Bank'); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    <?php if (app('laratrust')->can('create-cashbank')) : ?>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Cash Bank</button>
                    <?php endif; // app('laratrust')->can ?>

                    <span class="pull-right"> 
                        <font style="font-size: 16px;"><b>CASH BANK</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-blue">
                        <th>Kode Cash Bank</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Bank</th>
                        <th>No Rekening</th>
                        <th>No COA</th>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_cashbank', 'Kode Cash Bank:')); ?>

                                    <?php echo e(Form::text('kode_cashbank',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'kode1','required', 'placeholder'=>'Kode Cash Bank','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_cashbank', 'Nama Cash Bank:')); ?>

                                    <?php echo e(Form::text('nama_cashbank',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'nama1','required', 'placeholder'=>'Nama Cash Bank','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('jenis_cashbank', 'Jenis:')); ?>

                                    <?php echo e(Form::select('jenis_cashbank',['Kas' => 'Kas', 'Bank' => 'Bank', 'Uang Muka' => 'Uang Muka', 'PPN' => 'PPN', 'PPH/PPH Final' => 'PPH/PPH Final', 'ADM Bank' => 'ADM Bank'],null, ['class'=> 'form-control select2','style'=>'width: 100%' ,'id'=>'jenis1','required', 'placeholder'=>''])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_bank', 'Bank:')); ?>

                                    <?php echo e(Form::select('kode_bank',$Bank,null, ['class'=> 'form-control select2','style'=>'width: 100%' ,'id'=>'bank1','required', 'placeholder'=>'','autocomplete'=>'off','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_rekening', 'No Rekening:')); ?>

                                    <?php echo e(Form::text('no_rekening',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'rek1','required', 'placeholder'=>'No Rekening','autocomplete'=>'off','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_coa', 'No COA:')); ?>

                                    <?php echo e(Form::select('no_coa',$Coa,null, ['class'=> 'form-control select2','style'=>'width: 100%' ,'id'=>'coa1','required', 'placeholder'=>'','autocomplete'=>'off','required'])); ?>

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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_cashbank', 'Kode Cash Bank:')); ?>

                                    <?php echo e(Form::text('kode_cashbank',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'Kode2','required','readonly', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_cashbank', 'Nama Cash Bank:')); ?>

                                    <?php echo e(Form::text('nama_cashbank',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'Nama2','required', 'placeholder'=>'Nama Cash Bank','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('jenis_cashbank', 'Jenis:')); ?>

                                    <?php echo e(Form::select('jenis_cashbank',['Kas' => 'Kas', 'Bank' => 'Bank', 'Uang Muka' => 'Uang Muka', 'PPN' => 'PPN', 'PPH/PPH Final' => 'PPH/PPH Final', 'ADM Bank' => 'ADM Bank'],null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'Jenis2','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_bank', 'Bank:')); ?>

                                    <?php echo e(Form::select('kode_bank',$Bank,null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'Bank2','required','autocomplete'=>'off','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_rekening', 'No Rekening:')); ?>

                                    <?php echo e(Form::text('no_rekening',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'Rek2','required', 'placeholder'=>'No Rekening','autocomplete'=>'off','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_coa', 'No COA:')); ?>

                                    <?php echo e(Form::select('no_coa',$Coa,null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'Coa2','required','autocomplete'=>'off','required'])); ?>

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
            <?php if (app('laratrust')->can('update-cashbank')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editcashbank" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-cashbank')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuscashbank" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
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
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('cashbank.data'); ?>',
            columns: [
                { data: 'kode_cashbank', name: 'kode_cashbank' },
                { data: 'nama_cashbank', name: 'nama_cashbank' },
                { data: 'jenis_cashbank', name: 'jenis_cashbank' },
                { data: 'bank.nama_bank', name: 'bank.nama_bank' },
                { data: 'no_rekening', name: 'no_rekening' },
                { data: 'coa.account', name: 'coa.account' },
            ]
            });
        });

        $(document).ready(function() {
            var table = $('#data-table').DataTable();

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                }
            });

            $('#editcashbank').click( function () {
                var select = $('.selected').closest('tr');
                var kode_cashbank = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('cashbank.edit_cashbank'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_cashbank
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Kode2').val(results.kode_cashbank);
                        $('#Nama2').val(results.nama_cashbank);
                        $('#Jenis2').val(results.jenis_cashbank);
                        $('#Bank2').val(results.kode_bank);
                        $('#Rek2').val(results.no_rekening);
                        $('#Coa2').val(results.no_coa);
                        $('#editform').modal('show');
                        }
         
                });
            });

            $('#hapuscashbank').click( function () {
                var select = $('.selected').closest('tr');
                var kode_cashbank = select.find('td:eq(0)').text();
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
                            url: '<?php echo route('cashbank.hapus_cashbank'); ?>',
                            type: 'POST',
                            data : {
                                'id': kode_cashbank
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
            var kode = $.trim($('#kode1').val());
            var nama = $.trim($('#nama1').val());
            var jenis = $.trim($('#jenis1').val());
            var bank = $.trim($('#bank1').val());
            var rek = $.trim($('#rek1').val());
            var coa = $.trim($('#coa1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('cashbank.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#kode1').val('');
                        $('#nama1').val('');
                        $('#jenis1').val('').trigger('change');
                        $('#bank1').val('').trigger('change');
                        $('#rek1').val('');
                        $('#coa1').val('').trigger('change');
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
            var kode = $.trim($('#Kode2').val());
            var nama = $.trim($('#Nama2').val());
            var jenis = $.trim($('#Jenis2').val());
            var bank = $.trim($('#Bank2').val());
            var rek = $.trim($('#Rek2').val());
            var coa = $.trim($('#Coa2').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('cashbank.ajaxupdate'); ?>',
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
         alert('test update');
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