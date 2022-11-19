<?php $__env->startSection('title', 'Penerimaan'); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="panggil()">
    <div class="box box-solid">
        <!-- <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Penerimaan</b></font>
            <span class="pull-right">
                <font style="font-size: 16px;">Periode Open: <font color="blue"><b><?php echo e($period); ?></b></font></font>
            </span>
        </div> -->
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    <!--  -->
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Penerimaan</button>
                    <span class="pull-right"> 
                        <button type="button" class="tombol1 btn btn-success btn-xs" id="button1"><i class="fa fa-bullhorn"></i> POST</button>
                        <?php if (app('laratrust')->can('unpost-penerimaan')) : ?>
                        <button type="button" class="tombol2 btn btn-warning btn-xs" id="button2"><i class="fa fa-undo"></i> UNPOST</button>
                        <?php endif; // app('laratrust')->can ?>
                        <!--  -->
                        <button type="button" class="btn btn-primary btn-xs" id="button4"><i class="fa fa-paperclip"></i> VIEW DETAIL</button>

                        <!-- <a href="#" target="_blank" class="btn btn-default btn-xs" id="button3">
                            <i class="fa fa-print"></i>PRINT
                        </a> -->
                    </span>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-primary">
                    <th>No Penerimaan</th>
                    <th>No Pembelian</th>
                    <th>Tanggal Penerimaan</th>
                    <th>Total Item</th>
                    <th>Status</th>
                   <!--  
                    <th>Created At</th>
                     -->
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
                                    <?php echo e(Form::label('No Pembelian', 'No Pembelian:')); ?>

                                    <?php echo e(Form::select('no_pembelian',$Pembelian,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Pembelian','required'=>'required'])); ?>

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
                                    <!--  -->
                                </div>
                            </div>
    
                           <!--   -->

                            <!--  -->
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

                <!--  -->
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

                                       <!--   -->
                                        <?php echo e(Form::text('no_pembelian',null, ['class'=> 'form-control','id'=>'Pembelian1','readonly'])); ?>

                                        
                                    </div>
                                </div>
        
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Tanggal Penerimaan', 'Tanggal Penerimaan:')); ?>

                                        <?php echo e(Form::date('tanggal_penerimaan', null,['class'=> 'form-control','id'=>'Tanggal1'])); ?>

                                        <!--  -->
                                    </div>
                                </div>
        
                                <!--  -->

                                <!--  -->
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

        function panggil(){
            load();
            startTime();
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
                { data: 'total_item', name: 'total_item' },
                { data: 'status', name: 'status' },
                // { data: 'company.nama_company', name: 'company.nama_company' },
                // { data: 'created_at', name: 'created_at' },
                // { data: 'updated_at', name: 'updated_at' },
                // { data: 'created_by', name: 'created_by' },
                // { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        function formatRupiah(angka, prefix='Rp'){
            var number_string = angka.toString(),
                sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                    
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return rupiah;
        }

        function createTable(result){

        var total_qty = 0;
        var total_pakai = 0;
        var total_harga = 0;
        var grand_total = 0;

        $.each( result, function( key, row ) {
            total_qty += row.qty;
            harga = row.harga;
            qty = row.qty;
            landedcost = row.landedcost;
            total_pakai = (harga * qty) + landedcost;
            total_harga += total_pakai;
            grand_total = formatRupiah(total_harga);

        });

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.produk+"</td>";
                    my_table += "<td>"+row.satuan+"</td>";
                    my_table += "<td>"+row.qty+"</td>";
                    my_table += "<td>Rp "+formatRupiah(row.harga)+"</td>";
                    my_table += "<td>Rp "+formatRupiah(row.landedcost)+"</td>";
                    my_table += "<td>Rp "+row.subtotal+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Produk</th>'+
                                '<th>Satuan</th>'+
                                '<th>Qty</th>'+
                                '<th>Harga</th>'+
                                '<th>Landed Cost</th>'+
                                '<th>Subtotal</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                       ' <tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="2">Total</th>'+
                                '<th>'+total_qty+'</th>'+
                                '<th></th>'+
                                '<th></th>'+
                                '<th>Rp '+grand_total+'</th>'+
                            '</tr>'+
                            '</tfoot>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

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
                            swal({
                            title: "<b>Proses Sedang Berlangsung</b>",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                            })
                            
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
                            swal({
                            title: "<b>Proses Sedang Berlangsung</b>",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                            })
                            
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

            $('#button4').click( function () {
                var select = $('.selected').closest('tr');
                var no_penerimaan = select.find('td:eq(0)').text();
                var row = table.row( select );
                // console.log(no_pemakaian);
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                $.ajax({
                    url: '<?php echo route('penerimaan.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_penerimaan
                    },
                    success: function(result) {
                        console.log(result);
                        if(result.title == 'Gagal'){
                            $.notify(result.message);
                        }else{
                            if ( row.child.isShown() ) {
                            row.child.hide();
                            tr.removeClass('shown');
                        }
                        else {
                        // Open this row
                        // $.each(result, function (index, value) {
                            
                        //         console.log(index + " :: " + value);
                            
                        // });
                            var len = result.length;
                            for (var i = 0; i < len; i++) {
                                console.log(result[i].produk,result[i].satuan,result[i].qty,result[i].harga);
                                // alert(result[i].produk);
                            }

                            row.child( createTable(result) ).show();
                            // row.child( format(result) ).show();
                            select.addClass('shown');
                        }
                     }
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

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
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
            // Get the Login Name value and trim it
            var pembelian = $.trim($('#Pembelian').val());
            var tanggal = $.trim($('#Tanggal').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('penerimaan.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Pembelian').val('').trigger('change');
                        $('#Tanggal').val('');
                        $( '.kode-error' ).html('');
                        $( '.name-error' ).html('');
                        $('#addform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                            // $('#myModal form :input').val("");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
            
        });

        $('#EDIT').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
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
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
            }
        );

        function edit(id, url) {
            
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
                    swal({
                            title: "<b>Proses Sedang Berlangsung</b>",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                    })

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