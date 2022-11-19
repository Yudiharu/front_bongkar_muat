<?php $__env->startSection('title', 'Penerimaan'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Penerimaan</b></font>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Penerimaan</button>
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
                <tr class="bg-warning">
                    <th>No Penerimaan</th>
                    <th>No Pembelian</th>
                    <th>Tanggal Penerimaan</th>
                    <th>Total Item</th>
                    <th>Status</th>
                    
                    <th>Created At</th>
                    
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
                                    <?php echo e(Form::label('No Pembelian', 'No Pembelian:')); ?>

                                    <?php echo e(Form::select('no_pembelian',$Pembelian,null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','id'=>'Pembelian','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="no_pembelian-error" id="no_pembelian-error"></strong>
                                    </span>
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Tanggal Penerimaan', 'Tanggal Penerimaan:')); ?>

                                    <?php echo e(Form::date('tanggal_penerimaan', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="tanggal_penerimaan-error" id="tanggal_penerimaan-error"></strong>
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
                    <?php echo Form::open(['id'=>'EDIT']); ?>

                
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Penerimaan', 'No Penerimaan:')); ?>

                                        <?php echo e(Form::text('no_penerimaan', null, ['class'=> 'form-control','id'=>'Penerimaan1','readonly'])); ?>

                                    </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Pembelian', 'No Pembelian:')); ?>

                                        
                                        <?php echo e(Form::select('no_pembelian',$Pembelian,null, ['class'=> 'form-control','id'=>'Pembelian1'])); ?>

                                        
                                    </div>
                                </div>
        
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Tanggal Penerimaan', 'Tanggal Penerimaan:')); ?>

                                        <?php echo e(Form::date('tanggal_penerimaan', null,['class'=> 'form-control','id'=>'Tanggal1'])); ?>

                                        
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
  
    <script type="text/javascript">
        function load(){
            $('.tombol1').hide();
            $('.tombol2').hide();
        }

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            // scrollY: true,
            // scrollX: true,  
            ajax: '<?php echo route('penerimaan.data'); ?>',
            
            columns: [
                { data: 'no_penerimaan', name: 'no_penerimaan' },
                { data: 'no_pembelian', name: 'no_pembelian' },
                { data: 'tanggal_penerimaan', name: 'tanggal_penerimaan' },
                { data: 'penerimaandetail_count', name: 'penerimaandetail_count' },
                { data: 'status', name: 'status' },
                // { data: 'company.nama_company', name: 'company.nama_company' },
                { data: 'created_at', name: 'created_at' },
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
                    var colom = select.find('td:eq(4)').text();
                    var colom2 = select.find('td:eq(3)').text();
                    var no_penerimaan = select.find('td:eq(0)').text();
                    var status = colom;
                    var item = colom2;
                    var print = $("#button3").attr("href","http://localhost/inventory_baru/admin/penerimaan/cetakPDF?id="+no_penerimaan);
                    // var print = $("#button3").attr("href","<?php echo e(route('permintaan.cetak', ['id' =>"+colom2"])); ?>");
                    if(status == 'POSTED' && item > 0){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                    }else if(status =='UNPOSTED' && item > 0){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                    }else if(item == 0){
                        $('.tombol1').hide();
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
                var no_penerimaan = colom;
                console.log(no_penerimaan);
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
                            url: '<?php echo route('penerimaan.posting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_penerimaan
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
                                  text: 'Gagal',
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
                var no_penerimaan = colom;
                console.log(no_penerimaan);
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
                    url: '<?php echo route('penerimaan.unposting'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_penerimaan
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
                                  text: 'Gagal Unpost!',
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
        });

        $('.select2').select2({
            placeholder: "Silahkan Pilih",
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
            var pembelian = $.trim($('#Pembelian').val());
            var tanggal = $.trim($('#Tanggal').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

            if (pembelian == '' || tanggal == '') {
                    if(pembelian == ''){
                        $( '.diskon-error' ).html('Mohon di Isi');
                    }
                    if(tanggal == ''){
                        $( '.diskonrp-error' ).html('Mohon di Isi');
                    }
            }else{
                $.ajax({
                    url:'<?php echo route('penerimaan.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Pembelian').val('');
                        $('#Tanggal').val('');
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
        });

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var penerimaan = $.trim($('#Penerimaan1').val());
            var tanggal = $.trim($('#Tanggal1').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('penerimaan.updateajax'); ?>',
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
                    success: function (results) {
                        $('#Penerimaan1').val(results.no_penerimaan);
                        $('#Pembelian1').val(results.no_pembelian);
                        $('#Tanggal1').val(results.tanggal_penerimaan);
                        // $('#Status').val(results.status);
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

            // var result = confirm("Want to Edit?");
            // if (result) {
            //     // console.log(id)
            //     $.ajax({
            //         url: url,
            //         type: 'GET',
            //         success: function(result) {
            //             console.log(result);
            //             $('#Penerimaan1').val(result.no_penerimaan);
            //             $('#Pembelian').val(result.no_pembelian);
            //             $('#Tanggal1').val(result.tanggal_penerimaan);
            //             $('#Status').val(result.status);
            //             $('#editform').modal('show');
            //         }
            //     });
            // }
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
                                swal("GAGAL!<br><b>Status POSTED/Periode CLOSED/Detail Belum Kosong</b>");
                            }
                              
                            // $.notify(result.message, "success");
                            refreshTable();
                        }
                    });
                }
            });
        }
        //     var result = confirm("Want to delete?");
        //     if (result) {
        //         // console.log(id)
        //         $.ajax({
        //             url: url,
        //             type: 'DELETE',
        //             success: function(result) {
        //                 console.log(result);
        //                 $.notify(result.message, "success");
        //                 refreshTable();
        //             }
        //         });
        //     }

        // }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>