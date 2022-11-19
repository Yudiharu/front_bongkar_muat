

<?php $__env->startSection('title', 'Transfer In'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="/gui_inventory_laravel/css/logo_gui.png" sizes="16x16" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">                      
   
    <div class="box box-solid">
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                 
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#addform"><i class="fa fa-plus">
                        </i> New Transfer-In</button>

                    <span class="pull-right"> 
                            <button type="button" class="tombol1 btn btn-success btn-xs" id="button1"><i class="fa fa-bullhorn"></i> POST</button>
                            
                            <button type="button" class="tombol2 btn btn-warning btn-xs" id="button2"><i class="fa fa-undo"></i> UNPOST</button>
                            
                            <button type="button" class="btn btn-primary btn-xs" id="button5"><i class="fa fa-paperclip"></i> VIEW DETAIL</button>
                    </span>
                    
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-primary">
                        <th>No Trf In</th>
                        <th>No Transfer</th>
                        <th>Tanggal transfer</th>
                        <th>Total Item</th>
                        <th>Kode Lokasi</th>
                        <th>Transfer Dari</th>
                        <th>Status</th>
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
                                    <?php echo e(Form::label('Tanggal transfer', 'Tanggal transfer:')); ?>

                                    <?php echo e(Form::date('tanggal_transfer', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('No Transfer', 'No Transfer:')); ?>

                                    <?php echo e(Form::select('no_transfer',$Transfer, null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Transfer','required'=>'required','onchange'=>'stock();'])); ?>

                                    <span class="text-danger">
                                        <strong class="no_pembelian-error" id="no_pembelian-error"></strong>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">                         
                                    </div>
                            </div>
                            
                            <?php echo e(Form::hidden('kode_lokasi', null, ['class'=> 'form-control','readonly','id'=>'Tujuan1'])); ?>


                            <?php echo e(Form::hidden('kode_dari', null, ['class'=> 'form-control','readonly','id'=>'Dari1'])); ?>


                            <?php echo e(Form::hidden('transfer_dari', null, ['class'=> 'form-control','readonly','id'=>'Dari2'])); ?>


                            <?php echo e(Form::hidden('status', null, ['class'=> 'form-control','readonly','id'=>'stat'])); ?>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                    <?php echo e(Form::textarea('keterangan', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi1', 'placeholder'=>'Deskripsi', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

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
                                        <?php echo e(Form::label('No transfer', 'No transfer:')); ?>

                                        <?php echo e(Form::text('no_transfer', null, ['class'=> 'form-control','id'=>'transfer','readonly'])); ?>

                                    </div>
                                </div>                            

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Tanggal transfer', 'Tanggal transfer:')); ?>

                                        <?php echo e(Form::date('tanggal_transfer', null,['class'=> 'form-control','id'=>'Tanggal'])); ?>                                 
                                    </div>
                                </div>                                                                                           
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                        <?php echo e(Form::textarea('keterangan', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi', 'autocomplete'=>'off'])); ?>

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

<div class="modal fade" id="button4"  role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Pilih Bulan</h4>
                </div>
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route' => ['transfer.export'],'method' => 'get','id'=>'form', 'target'=>"_blank"]); ?>

                        <div class="modal-body">
                            <div class="row">
                            
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <?php echo e(Form::submit('Cetak', ['class' => 'btn btn-success crud-submit'])); ?>

                                <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    
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
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('transferin.data'); ?>',
            columns: [
                { data: 'no_trf_in', name: 'no_trf_in' },
                { data: 'no_transfer', name: 'no_transfer' },
                { data: 'tanggal_transfer', name: 'tanggal_transfer' },
                { data: 'total_item', name: 'total_item' },
                { data: 'kode_lokasi', name: 'kode_lokasi' },
                { data: 'transfer_dari', name: 'transfer_dari' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
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

        function formatRupiah(angka, prefix='Rp'){
           
                var number_string = angka.toString(),
                sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                    
                if(number_string % 1 != 0){
                    var sisa    = number_string.length % 4,
                    rupiah  = number_string.substr(0, sisa),
                    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                }

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                // console.log(number_string);
                }
                
                return rupiah;
           
        }

        function rupiah(angka, prefix='Rp'){
            var value = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return value;
        }

        function stock(){
            var no_transfer= $('#Transfer').val();
            //var kode_produk= $('#kode_produk').val();

            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('transferin.qtyproduk'); ?>',
                type:'POST',
                data : {
                        'id': no_transfer,
                    },
                success: function(result) {
                        console.log(result);
                            //$('#Tanggal1').val(result.tgl_transfer);
                            $('#Tujuan1').val(result.kode_lokasi);
                            $('#Dari1').val(result.kode_dari);
                            $('#Dari2').val(result.transfer_dari);
                            // $('#total').val(result.total_item);
                            $('#stat').val(result.status);
                    },
            });
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
            if ((("0123456789.-").indexOf(keychar) > -1)) {
                return true;
            } else
            if (decimal && (keychar == ".")) {
                return true;
            } else return false;
        }

        function createTable(result){

        var total_qty = 0;
        var total_qty_received = 0;
        var total_pakai = 0;
        var total_harga = 0;
        var grand_total = 0;

        $.each( result, function( key, row ) {
            total_qty += row.qty;
            total_qty_received += row.qty_received;
            harga = row.hpp;
            qty = row.qty;
            total_pakai = harga * qty;
            total_harga += total_pakai;
            grand_total = rupiah(total_harga);

        });

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.produk+"</td>";                
                    my_table += "<td>"+row.qty+"</td>";
                    my_table += "<td>Rp "+rupiah(row.hpp)+"</td>";
                    my_table += "<td>Rp "+row.subtotal+"</td>";                  
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Produk</th>'+                            
                                '<th>Qty</th>'+
                                '<th>HPP</th>'+
                                '<th>Subtotal</th>'+                              
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                       ' <tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="1">Total</th>'+
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

            // table.DataTable(
            // {
            //     "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            //             if ( aData[6] == "OPEN" )
            //               {
            //                 $('td', nRow).css('background-color', '#f2dede' );
            //               }
            //               else if ( aData[6] == "POSTED" )
            //               {
            //                 $('td', nRow).css('background-color', '#dff0d8');
            //               }  
            //     }
            // }
            // )
                                
            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(6)').text();
                    var colom2 = select.find('td:eq(3)').text();
                    var no_transfer = select.find('td:eq(0)').text();
                    var status = colom;
                    var item = colom2;
                    if(status == 'POSTED' && item > 0){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                    }else if(status =='UNPOSTED' && item > 0){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                    }else if(status =='CLOSED' || status =='RECEIVED'){
                        $('.tombol1').hide();
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
                var no_trf_in = colom;
                console.log(no_trf_in);
                swal({
                    title: "Post?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Posting!",
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
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                        $.ajax({
                            url: '<?php echo route('transferin.posting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_trf_in
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Transfer!',
                                    'Berhasil di Posting.',
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
                var no_trf_in = colom;
                console.log(no_trf_in);
                swal({
                    title: "Unpost?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Unpost!",
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
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('transferin.unposting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_trf_in
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Unposted!',
                                    'Data berhasil di Unpost.',
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

            $('#button5').click( function () {
                var select = $('.selected').closest('tr');
                var no_trf_in = select.find('td:eq(0)').text();
                var row = table.row( select );
                // console.log(no_pemakaian);
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                $.ajax({
                    url: '<?php echo route('transferin.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_trf_in
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
                                console.log(result[i].produk,result[i].qty,result[i].hpp);
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

        function getnama(){
            var lokasi= $('#Tujuan1').val();
            $.ajax({
                url:'<?php echo route('transfer.getnama'); ?>',
                type:'POST',
                data : {
                        'lokasi': lokasi,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Tujuan2').val(result.nama_lokasi);
                    },
            });
        }           

        $('#ADD').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
           
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('transferin.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#addform').modal('show');
                        
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
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            // Get the Login Name value and trim it
            
            //var ppn = $.trim($('#PPN').val());
            var deskripsi = $.trim($('#Deskripsi').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('transfer.updateajax'); ?>',
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
                        // $('#Memo').val(result.no_memo);
                        $('#editform').modal('show');
                        $('#transfer').val(results.no_transfer);
                        $('#Vendor').val(results.kode_vendor);
                        $('#Tanggal').val(results.tanggal_transfer);
                        $('#Ref').val(results.no_penawaran);
                        $('#TOP').val(results.top);
                        $('#Due').val(results.due_date);
                        $('#Diskon').val(results.diskon_persen);
                        $('#Diskonrp').val(results.diskon_rp);
                        $('#PPN').val(results.ppn);
                        $('#Deskripsi').val(results.deskripsi);
                        $('#Status').val(results.status);
                        $('#Jenis').val(results.jenis_po);
                        },
                        error : function() {
                        swal("GAGAL!<br><b>Status POSTED/RECEIVED/CLOSED</b>");
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
                    console.log(results);
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