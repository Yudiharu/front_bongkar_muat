<?php $__env->startSection('title', 'Lokasi Rak'); ?>

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
                    <?php if (app('laratrust')->can('create-lokasirak')) : ?>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Lokasi Rak</button>
                    <?php endif; // app('laratrust')->can ?>

                    <span class="pull-right"> 
                        <font style="font-size: 16px;"><b>LOKASI RAK</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-blue">
                        <th>Id</th>
                        <th>Kode Produk</th>
                        <th>Partnumber</th>
                        <th>Nomor Rak</th>     
                        <th>Kode Lokasi</th>
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
                        <div class="col-md-8">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_produk', 'Kode Produk:')); ?>

                                <?php echo e(Form::select('kode_produk', $Produk->sort(), null, ['class'=> 'form-control select2','id'=>'produks','required'=>'required','style'=>'width: 100%','placeholder' => '','onchange'=>'stock();'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('partnumber', 'Partnumber:')); ?>

                                <?php echo e(Form::select('partnumber', [], null, ['class'=> 'form-control select2','id'=>'partnumber', 'placeholder'=>'','autocomplete'=>'off','style'=>'width: 100%'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('rak', 'Nomor Rak:')); ?>

                                <?php echo e(Form::text('lokasi_rak', null, ['class'=> 'form-control','id'=>'raks','required'=>'required', 'placeholder'=>'No. Rak','autocomplete'=>'off','style'=>'width: 100%','onkeypress'=>"return hanyaAngka(event,this)"])); ?>


                                <?php echo e(Form::hidden('kode_lokasi',  auth()->user()->kode_lokasi, null, ['class'=> 'form-control','readonly','id'=>'Lokasi'])); ?>

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
                        <div class="form-group">
                            <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'Kode2','readonly'])); ?>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('KodeProduk', 'Kode Produk:')); ?>

                                <?php echo e(Form::text('kode_produk', null, ['class'=> 'form-control','id'=>'produk2','required'=>'required','autocomplete'=>'off','readonly'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('Partnumber', 'Partnumber:')); ?>

                                <?php echo e(Form::text('partnumber', null, ['class'=> 'form-control','id'=>'partnumber2','required'=>'required','readonly'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('rak', 'Nomor Rak:')); ?>

                                <?php echo e(Form::text('lokasi_rak', null, ['class'=> 'form-control','id'=>'rak2','required'=>'required', 'placeholder'=>'','autocomplete'=>'off','style'=>'width: 100%','onkeypress'=>"return hanyaAngka(event,this)"])); ?>


                                <?php echo e(Form::hidden('kode_lokasi',  auth()->user()->kode_lokasi, null, ['class'=> 'form-control','readonly','id'=>'Lokasi2'])); ?>

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
            <?php if (app('laratrust')->can('update-lokasirak')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editlokasirak" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-lokasirak')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuslokasirak" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
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
            $('.back2Top').show();
        }

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('lokasirak.data'); ?>',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                { data: 'partnumber', name: 'partnumber' },
                { data: 'lokasi_rak', name: 'lokasi_rak' },
                { data: 'kode_lokasi', 
                    render: function( data, type, full ) {
                    return formatNomor(data); }
                },
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

        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

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

            $('#editlokasirak').click( function () {
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('lokasirak.edit_lokasirak'); ?>',
                    type: 'POST',
                    data : {
                        'id': id
                    },
                    success: function(results) {
                        console.log(results);
                        $('#produk2').val(results.kode_produk);
                        $('#partnumber2').val(results.partnumber);
                        $('#rak2').val(results.rak);
                        $('#Kode2').val(results.id);
                        $('#nama1').val(results.nama);
                        $('#Nilai2').val(results.nilai_pajak);
                        $('#editform').modal('show');
                        }
         
                });
            });

            $('#hapuslokasirak').click( function () {
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(0)').text();
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
                            url: '<?php echo route('lokasirak.hapus_lokasirak'); ?>',
                            type: 'POST',
                            data : {
                                'id': id
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

        $('.select2').select2({
            placeholder: "Pilih",
            allowClear: true,
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
            if (("0123456789.-").indexOf(keychar) > -1 ) {
                return true;
            } else
            if (decimal && (keychar == ".")) {
                return true;
            } else return false;
        }

        function stock(){
            editpart();
            var kode_produk= $('#produks').val();
            $.ajax({
                url:'<?php echo route('lokasirak.stockproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                    },
                success: function(result) {
                        console.log(result);
                        $('#partnumber').val(result.partnumber);
                    },
            });
        }

        function editpart(){
                $('#partnumber').prop("disabled", false);
                var kode_produk = $("#produks").val();
                console.log(kode_produk);
                    
                var token = $("input[name='_token']").val();
                $.ajax({
                url: "<?php echo route('lokasirak.selectpart'); ?>",
                method: 'POST',
                data: {kode_produk:kode_produk, _token:token},
                success: function(data) {
                    $("#partnumber").html('');
                    // $("select[name='kode_satuan'").html(data.options);
                        $.each(data.options, function(key, value){
                            $('#partnumber').append('<option value="'+ key +'">' + value + '</option>');
                            });
                    }
                });
        }

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
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('lokasirak.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#produks').val('').trigger('change');
                        $('#partnumber').val('').trigger('change');
                        $('#raks').val('');
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
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();
                $.ajax({
                    url:'<?php echo route('lokasirak.updateajax'); ?>',
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
                        $('#editform').modal('show');
                        $('#produk2').val(results.kode_produk);
                        $('#partnumber2').val(results.partnumber);
                        $('#rak2').val(results.rak);
                        $('#Kode2').val(results.id);
                        $('#nama1').val(results.nama);
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
                    },
                    error : function() {
                        alert("Nothing Data");
                    }
                });
            }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>