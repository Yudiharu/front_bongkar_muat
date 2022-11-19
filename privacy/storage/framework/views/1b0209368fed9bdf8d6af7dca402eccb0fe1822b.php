<?php $__env->startSection('title', 'Adjustment'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Adjusment</b></font>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#addform"><i class="fa fa-plus">
                        </i> New Adjustment</button>
                    <span class="pull-right"> 
                            <button type="button" class="tombol1 btn btn-success btn-xs" id="button1"><i class="fa fa-bullhorn"></i> POST</button>
                            <button type="button" class="tombol2 btn btn-warning btn-xs" id="button2"><i class="fa fa-undo"></i> UNPOST</button>
                            
                            <a href="#" target="_blank" class="btn btn-default btn-xs" id="button3">
                                <i class="fa fa-print"></i>PRINT
                            </a>
                    </span>
                    
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-info">
                    <th>No Penyesuaian</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Harga</th></th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    
                    
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
            <?php echo Form::open(['id'=>'ADD']); ?>

            
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Tanggal', 'Tanggal:')); ?>

                                    <?php echo e(Form::date('tanggal', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal','required'=>'required'])); ?>

                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Kode Produk', 'Produk:')); ?>

                                    <?php echo e(Form::select('kode_produk',$produk,null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','id'=>'kode_produk','onchange'=>'stock();','required'=>'required'])); ?>

                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Harga', 'Harga:')); ?>

                                    <?php echo e(Form::text('harga', null, ['class'=> 'form-control','id'=>'Harga','required'=>'required', 'placeholder'=>'Harga'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('jumlah', 'Jumlah:')); ?>

                                    <?php echo e(Form::text('jumlah', null, ['class'=> 'form-control','id'=>'Jumlah','required'=>'required', 'placeholder'=>'Jumlah'])); ?>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('keterangan', 'Deskripsi:')); ?>

                                    <?php echo e(Form::textArea('keterangan', null, ['class'=> 'form-control','rows'=>'4','id'=>'Keterangan', 'placeholder'=>'Deskripsi'])); ?>

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
                                        <?php echo e(Form::label('Kode Produk', 'Kode Produk:')); ?>

                                        <?php echo e(Form::select('kode_produk',$produk,null, ['class'=> 'form-control','id'=>'KodeP'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Harga', 'Harga:')); ?>

                                        <?php echo e(Form::text('harga', null, ['class'=> 'form-control','id'=>'HargaP'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('jumlah', 'Jumlah:')); ?>

                                        <?php echo e(Form::text('jumlah', null, ['class'=> 'form-control','id'=>'JumlahP'])); ?>

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
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script>
        function load(){
            $('.tombol1').hide();
            $('.tombol2').hide();
        }

        function stock(){
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
                        // $('#Qty').val(result.qty);
                        // $('#Satuan').val(result.satuan);
                        $('#Harga').val(result.hpp);
                    },
            });
        }

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('adjustment.data'); ?>',
            // scrollX: true,
            // scrollY: true,
            columns: [
                { data: 'no_penyesuaian', name: 'no_penyesuaian' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                { data: 'harga', name: 'harga' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'status', name: 'status' },
                // { data: 'created_at', name: 'created_at' },
                // { data: 'updated_at', name: 'updated_at' },
                // { data: 'created_by', name: 'created_by' },
                // { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            var post = document.getElementById("button1");
            var unpost = document.getElementById("button2");

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(6)').text();
                    var no_pembelian = select.find('td:eq(0)').text();
                    var status = colom;
                    var print = $("#button3").attr("href","http://localhost/inventory_baru/admin/pembelian/cetakPDF?id="+no_pembelian);
                    // var print = $("#button3").attr("href","<?php echo e(route('permintaan.cetak', ['id' =>"+colom2"])); ?>");
                    if(status == 'POSTED'){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                    }else if(status =='UNPOSTED'){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                    }else{
                        $('.tombol1').show();
                        $('.tombol2').hide();
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
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // alert( table.rows('.selected').data().length +' row(s) selected' );
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
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // alert( table.rows('.selected').data().length +' row(s) selected' );
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
            var tanggal = $.trim($('#Tanggal').val());
            var produk = $.trim($('#Produk').val());
            var harga = $.trim($('#Harga').val());
            var jumlah = $.trim($('#Jumlah').val());
            var keterangan = $.trim($('#Keterangan').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('adjustment.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Tanggal').val('');
                        $('#Produk').val('');
                        $('#Harga').val('');
                        $('#Jumlah').val('');
                        $('#Keterangan').val('');
                        $( '.kode-error' ).html('');
                        $( '.name-error' ).html('');
                        $('#addform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Done!", data.message, "success");
                            // $('#myModal form :input').val("");
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    },
                });
            }
        );

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var penyesuaian = $.trim($('#PenyesuaianP').val());
            var tanggal = $.trim($('#TanggalP').val());
            var kode = $.trim($('#KodeP').val());
            var harga = $.trim($('#HargaP').val());
            var jumlah = $.trim($('#JumlahP').val());
            var keterangan = $.trim($('#KeteranganP').val());
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
                            swal("Done!", data.message, "success");
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    },
                });
            }
        );

        function edit(id, url) {
            swal({
            title: "Edit?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, edit it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function(results) {
                        // console.log(result);
                        $('#PenyesuaianP').val(results.no_penyesuaian);
                        $('#TanggalP').val(results.tanggal);
                        $('#KodeP').val(results.kode_produk);
                        $('#HargaP').val(results.harga);
                        $('#JumlahP').val(results.jumlah);
                        $('#KeteranganP').val(results.keterangan);
                        $('#editform').modal('show');
                    },
                        error : function() {
                        swal("GAGAL!<br><b>Status POSTED</b>");
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }

        function del(id, url) {
            swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    

                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        
                        success: function (results) {
                        // console.log(results);
                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                            } else {
                                swal("GAGAL!<br><b>Status POSTED/ Periode CLOSED</b>");
                            }
                              
                            // $.notify(result.message, "success");
                            refreshTable();
                        }
                    });
                }
            });
        }

        // var myselect = $('.select2').select2({
        //     placeholder: " Pilih No Permintaan",
        //     allowClear: true,
        // });

        // myselect.on('change', function(e){
        //         var selected_element = $(e.currentTarget);
        //         var select_val = selected_element.val();
        //         // var _token = $("input[name='_token']").val();
        //         console.log(select_val);
        //             $.ajax({        // Memulai ajax
        //                 method: "GET",      
        //                 url: "<?php echo route('pembelian.cari'); ?>",    // file PHP yang akan merespon ajax
        //                 data: { id: select_val}   // data POST yang akan dikirim
        //               })
        //             .done(function(hasilajax) {   // KETIKA PROSES Ajax Request Selesai
                    
        //                 $('.select2').val(hasilajax.no_permintaan);
        //             });
        //          })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>