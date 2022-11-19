<?php $__env->startSection('title', 'Adjustment'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="panggil()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>
                    
                    <?php if (app('laratrust')->can('create-adjustment')) : ?>
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#addform"><i class="fa fa-plus"></i> New Adjustment</button>
                    <?php endif; // app('laratrust')->can ?>

                    <span class="pull-right">  
                        <font style="font-size: 16px;"><b>ADJUSTMENT</b></font>
                    </span>
                    
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-primary">
                        <th>No Penyesuaian</th>
                        <th>Tanggal</th>
                        <th>Nama Produk</th>
                        <th>Partnumber</th>
                        <th>Harga</th></th>
                        <th>Qty Adjustment</th>
                        <th>Keterangan</th>
                        <th>Status</th>
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
                                    <?php echo e(Form::label('Tanggal', 'Tanggal:')); ?>

                                    <?php echo e(Form::date('tanggal', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal','required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('Kode Produk', 'Produk:')); ?>

                                    <?php echo e(Form::select('kode_produk',$produk,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'kode_produk','onchange'=>'stock();','required'=>'required'])); ?>

                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('partnumber', 'Part Number:')); ?>

                                    <?php echo e(Form::select('partnumber',[], null, ['class'=> 'form-control select2','id'=>'Parts','style'=>'width: 100%','placeholder' => '','onchange'=>'getharga();'])); ?>

                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Harga', 'Harga:')); ?>

                                    <?php echo e(Form::text('harga', null, ['class'=> 'form-control','id'=>'Harga','required'=>'required', 'placeholder'=>'Harga','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)",'readonly'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('jumlah', 'Qty Adjustment:')); ?>

                                    <?php echo e(Form::text('jumlah', null, ['class'=> 'form-control','id'=>'Jumlah','required'=>'required', 'placeholder'=>'Qty Adjustment','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('keterangan', 'Deskripsi:')); ?>

                                    <?php echo e(Form::textArea('keterangan', null, ['class'=> 'form-control','rows'=>'4','id'=>'Keterangan', 'placeholder'=>'Deskripsi','required'=>'required'])); ?>

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

<div class="modal fade" id="editform" role="dialog">
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
                                        <?php echo e(Form::label('No Penyesuaian', 'No Penyesuaian:')); ?>

                                        <?php echo e(Form::text('no_penyesuaian', null, ['class'=> 'form-control','id'=>'PenyesuaianP','readonly'])); ?>

                                    </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Tanggal', 'Tanggal Penyesuaian:')); ?>

                                        <?php echo e(Form::date('tanggal', null,['class'=> 'form-control','id'=>'TanggalP'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Kode Produk', 'Produk:')); ?>

                                        <?php echo e(Form::text('kode_produk',null, ['class'=> 'form-control select','style'=>'width: 100%','placeholder' => '','id'=>'KodeP','readonly'])); ?>

                                    </div>
                                </div>                         
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('partnumber', 'Part Number:')); ?>

                                        <?php echo e(Form::text('partnumber', null, ['class'=> 'form-control select','id'=>'Parts2','style'=>'width: 100%','placeholder' => '','onchange'=>'getharga2();','readonly'])); ?>

                                    </div>
                                </div>
                           
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Harga', 'Harga:')); ?>

                                        <?php echo e(Form::text('harga', null, ['class'=> 'form-control','id'=>'HargaP','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)",'readonly'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('jumlah', 'Qty Adjustment:')); ?>

                                        <?php echo e(Form::text('jumlah', null, ['class'=> 'form-control','id'=>'JumlahP','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('keterangan', 'Keterangan:')); ?>

                                        <?php echo e(Form::textArea('keterangan', null, ['class'=> 'form-control','rows'=>'4','id'=>'KeteranganP'])); ?>

                                    </div>
                                </div>
    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success crud-submit'])); ?>

                                <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i>PT. SELARAS UNGGUL BERSAMA</i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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
            .add-button {
                background-color: #00E0FF;
                bottom: 56px;
            }

            .hapus-button {
                background-color: #F63F3F;
                bottom: 86px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 116px;
            }

            .tombol1 {
                background-color: #149933;
                bottom: 156px;
            }

            .tombol2 {
                background-color: #ff9900;
                bottom: 156px;
            }

            .view-button {
                background-color: #1674c7;
                bottom: 186px;
            }

            .print-button {
                background-color: #F63F3F;
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
            <?php if (app('laratrust')->can('update-adjustment')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editadjustment" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-adjustment')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusadjustment" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('post-adjustment')) : ?>
            <button type="button" class="btn btn-success btn-xs tombol1" id="button1">POST <i class="fa fa-bullhorn"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('unpost-adjustment')) : ?>
            <button type="button" class="btn btn-warning btn-xs tombol2" id="button2">UNPOST <i class="fa fa-undo"></i></button>
            <?php endif; // app('laratrust')->can ?>
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
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        });

        function load(){
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.back2Top').show();
        }

        function panggil(){
            load();
            startTime();
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
        if ((("0123456789-.").indexOf(keychar) > -1)) {
            return true;
        } else
        if (decimal && (keychar == ".")) {
            return true;
        } else return false;
    }

        function stock(){
            editpart();
            var kode_produk= $('#kode_produk').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('adjustment.stockproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk
                    },
                success: function(result) {
                        console.log(result);
                        $('#Harga').val(result.hpp);
                        $('#Stok').val(result.stok);
                    },
            });
        }

        function stock2(){
            editpart2();
            var kode_produk= $('#KodeP').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('adjustment.stockproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk
                    },
                success: function(result) {
                        console.log(result);
                        $('#HargaP').val(result.hpp);
                        $('#StokP').val(result.stok);
                    },
            });
        }

        function editpart(){
                    $('#Parts').prop("disabled", false);
                    var kode_produk = $("#kode_produk").val();
                    console.log(kode_produk);
                    
                    var token = $("input[name='_token']").val();
                    $.ajax({
                    url: "<?php echo route('adjustment.selectpart'); ?>",
                    method: 'POST',
                    data: {kode_produk:kode_produk, _token:token},
                    success: function(data) {
                        $("#Parts").html('');
                            $.each(data.options, function(key, value){

                                $('#Parts').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        }
                    });
        }

        function editpart2(){
                    $('#Parts2').prop("disabled", false);
                    var kode_produk = $("#KodeP").val();
                    console.log(kode_produk);
                    
                    var token = $("input[name='_token']").val();
                    $.ajax({
                    url: "<?php echo route('adjustment.selectpart'); ?>",
                    method: 'POST',
                    data: {kode_produk:kode_produk, _token:token},
                    success: function(data) {
                        $("#Parts2").html('');
                            $.each(data.options, function(key, value){

                                $('#Parts2').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        }
                    });
        }

        function getharga(){
            var partnumber= $('#Parts').val();
            var kode_produk= $('#kode_produk').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('adjustment.getharga'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                        'part': partnumber,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Harga').val(result.hpp);                                    
                    },
            });
        }

        function getharga2(){
            var partnumber= $('#Parts2').val();
            var kode_produk= $('#KodeP').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('adjustment.getharga'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                        'part': partnumber,
                    },
                success: function(result) {
                        console.log(result);
                        $('#HargaP').val(result.hpp);                                    
                    },
            });
        }

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('adjustment.data'); ?>',
            columns: [
                { data: 'no_penyesuaian', name: 'no_penyesuaian' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                { data: 'partnumber', name: 'partnumber' },
                { data: 'harga', name: 'harga' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'status', 
                    render: function( data, type, full ) {
                    return formatStatus(data); }
                },
            ]
            });
        });

        function formatStatus(n) {
            console.log(n);
            if(n != 'POSTED'){
                return n;
            }else{
                var stat = "<span style='color:#0eab25'><b>POSTED</b></span>";
                return n.replace(/POSTED/, stat);
            }
        }

        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            var post = document.getElementById("button1");
            var unpost = document.getElementById("button2");

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');

                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(7)').text();
                    var no_penyesuaian = select.find('td:eq(0)').text();
                    var status = colom;
                    if(status == 'POSTED'){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                    }else if(status =='OPEN'){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                    }
                }
            } );
        
           $('#button1').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_penyesuaian = colom;
                console.log(no_penyesuaian);
                swal({
                    title: "Post?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, post it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                    }).then(function (e) {
                        if (e.value === true) {
                            swal({
                            title: "<b>Proses Sedang Berlangsung</b>",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                            })
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('adjustment.posting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_penyesuaian
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Posted!',
                                    'Your file has been posted.',
                                    'success'
                                    )
                                    refreshTable();
                                }
                                else{
                                  swal({
                                      title: 'Error',
                                      text: result.message,
                                      type: 'error',
                                  })
                                }
                            },
                            error : function () {
                              swal({
                                  title: 'Oops...',
                                  text: data.message,
                                  type: 'error',
                                  timer: '1500'
                              })
                            }
                        });
                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                })
            });

            $('#button2').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_penyesuaian = colom;
                console.log(no_penyesuaian);
                swal({
                    title: "Unpost?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, unpost it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                    }).then(function (e) {
                        if (e.value === true) {
                            swal({
                            title: "<b>Proses Sedang Berlangsung</b>",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                            })
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('adjustment.unposting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_penyesuaian
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Unposted!',
                                    'Your file has been unposted.',
                                    'success'
                                    )
                                    refreshTable();
                                }
                                else{
                                  swal({
                                      title: 'Error',
                                      text: result.message,
                                      type: 'error',
                                  })
                                }
                            },
                            error : function () {
                              swal({
                                  title: 'Oops...',
                                  text: data.message,
                                  type: 'error',
                                  timer: '1500'
                              })
                            }
                        });
                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                })
            });

            $('#editadjustment').click( function () {
                var select = $('.selected').closest('tr');
                var no_penyesuaian = select.find('td:eq(0)').text();
                var row = table.row( select );
                console.log(no_penyesuaian);
                $.ajax({
                    url: '<?php echo route('adjustment.edit_adjustment'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_penyesuaian
                    },
                    success: function(results) {
                        console.log(results);
                        $('#editform').modal('show');
                        $('#PenyesuaianP').val(results.no_penyesuaian);
                        $('#TanggalP').val(results.tanggal);
                        $('#KodeP').val(results.kode_produk);
                        $('#Parts2').val(results.partnumber);
                        $('#HargaP').val(results.harga);
                        $('#JumlahP').val(results.jumlah);
                        $('#KeteranganP').val(results.keterangan);
                        }
         
                });
            });

            $('#hapusadjustment').click( function () {
                var select = $('.selected').closest('tr');
                var no_penyesuaian = select.find('td:eq(0)').text();
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
                            url: '<?php echo route('adjustment.hapus_adjustment'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_penyesuaian
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
        } );

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
            $('#data-table').DataTable().ajax.reload(null,false);
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });

        $('#ADD').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('adjustment.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Tanggal').val('');
                        $('#kode_produk').val('').trigger('change');
                        $('#Parts').val('').trigger('change');
                        $('#Harga').val('');
                        $('#Jumlah').val('');
                        $('#Keterangan').val('');
                        $('#addform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
            }
        );

        $('#EDIT').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('adjustment.updateAdjusment'); ?>',
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
            }
        );

        // function edit(id, url) {
        //         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        //         $.ajax({
        //             type: 'GET',
        //             url: url,
        //             data: {_token: CSRF_TOKEN},
        //             dataType: 'JSON',
        //             success: function(results) {
        //                 $('#PenyesuaianP').val(results.no_penyesuaian);
        //                 $('#TanggalP').val(results.tanggal);
        //                 $('#KodeP').val(results.kode_produk);
        //                 $('#Parts2').val(results.partnumber);
        //                 $('#HargaP').val(results.harga);
        //                 $('#JumlahP').val(results.jumlah);
        //                 $('#KeteranganP').val(results.keterangan);
        //                 $('#editform').modal('show');
        //             },
        //                 error : function() {
        //                 swal("GAGAL!<br><b>Status POSTED</b>");
        //             }
        //         });
        // }

        // function del(id, url) {
        //     swal({
        //     title: "Hapus?",
        //     text: "Pastikan dahulu item yang akan di hapus",
        //     type: "warning",
        //     showCancelButton: !0,
        //     confirmButtonText: "Ya, Hapus!",
        //     cancelButtonText: "Batal",
        //     reverseButtons: !0
        //     }).then(function (e) {
        //         if (e.value === true) {
        //             swal({
        //                     title: "<b>Proses Sedang Berlangsung</b>",
        //                     type: "warning",
        //                     showCancelButton: false,
        //                     showConfirmButton: false
        //             })

        //             $.ajax({
        //                 type: 'DELETE',
        //                 url: url,
                        
        //                 success: function (results) {
        //                 // console.log(results);
        //                     if (results.success === true) {
        //                         swal("Berhasil!", results.message, "success");
        //                     } else {
        //                         swal("Gagal!", results.message, "error");
        //                     }
                              
        //                     refreshTable();
        //                 }
        //             });
        //         }
        //     });
        // }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>