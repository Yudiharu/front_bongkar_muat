<?php $__env->startSection('title', 'Pembelian'); ?>

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
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#addform"><i class="fa fa-plus">
                        </i> New Pembelian</button>

                    <span class="pull-right"> 
                            <button type="button" class="tombol1 btn btn-success btn-xs" id="button1"><i class="fa fa-bullhorn"></i> POST</button>
                            <?php if (app('laratrust')->can('unpost-pembelian')) : ?>
                            <button type="button" class="tombol2 btn btn-warning btn-xs" id="button2"><i class="fa fa-undo"></i> UNPOST</button>
                            <?php endif; // app('laratrust')->can ?>
                            <button type="button" class="btn btn-primary btn-xs" id="button5"><i class="fa fa-paperclip"></i> VIEW DETAIL</button>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-primary">
                        <th>No Pembelian</th>
                        <th>Tanggal Pembelian</th>
                        <th>Vendor</th>
                        <th>Jenis PO</th>
                        <th>Total Item</th>
                        <th>Diskon(%)</th>
                        <th>Diskon(Rp)</th>
                        <th>PPN</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>No AP</th>
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
                                    <?php echo e(Form::label('Tanggal Pembelian', 'Tanggal Pembelian:')); ?>

                                    <?php echo e(Form::date('tanggal_pembelian', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('jenis_po', 'Jenis PO:')); ?>

                                    <?php echo e(Form::select('jenis_po', ['Stock' => 'Stock','Jasa' => 'Jasa','Non-Stock' => 'Non-Stock'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Jenis1','required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Kode Vendor', 'Vendor:')); ?>

                                    <?php echo e(Form::select('kode_vendor',$Vendor->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Vendor1','required'=>'required','onchange'=>'getnama();'])); ?>

                                </div>
                            </div>

                            <?php echo e(Form::hidden('nama_vendor',null, ['class'=> 'form-control','readonly','id'=>'Namavendor'])); ?>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('No Penawaran', 'No Ref. Penawaran:')); ?>

                                    <?php echo e(Form::text('no_penawaran', null, ['class'=> 'form-control','id'=>'Ref1', 'placeholder'=>'No. Penawaran', 'autocomplete'=>'off','required'])); ?>

                                 </div>
                            </div> 

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('TOP', 'TOP:')); ?>

                                    <?php echo e(Form::text('top', null, ['class'=> 'form-control','id'=>'TOP1','onchange'=>"hitung();",'required'=>'required', 'placeholder'=>'Term Of Payment', 'autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                 </div>
                            </div> 

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Due Date', 'Due Date:')); ?>

                                    <?php echo e(Form::text('due_date', null, ['class'=> 'form-control','id'=>'Due1','required'=>'required', 'placeholder'=>'Tanggal Tenggat','readonly'])); ?>

                                 </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('Diskon', 'Diskon(%):')); ?>

                                    <?php echo e(Form::text('diskon_persen', 0, ['class'=> 'form-control','id'=>'Diskon1','placeholder'=>'%', 'autocomplete'=>'off','required'])); ?>

                                 </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('Diskons', 'Diskon(Rp):')); ?>

                                    <?php echo e(Form::text('diskon_rp', 0, ['class'=> 'form-control','id'=>'Diskonrp1','placeholder'=>'Rp.', 'autocomplete'=>'off','required'])); ?>

                                 </div>
                            </div> 

                             <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('PPN', 'PPN(%):')); ?>

                                    <?php echo e(Form::text('ppn', 0, ['class'=> 'form-control','id'=>'PPN1','placeholder'=>'%', 'autocomplete'=>'off','required'])); ?>

                                 </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                    <?php echo e(Form::textarea('deskripsi', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi1', 'placeholder'=>'Deskripsi', 'autocomplete'=>'off'])); ?>

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
                                        <?php echo e(Form::label('No Pembelian', 'No Pembelian:')); ?>

                                        <?php echo e(Form::text('no_pembelian', null, ['class'=> 'form-control','id'=>'Pembelian','readonly'])); ?>

                                    </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Tanggal Pembelian', 'Tanggal Pembelian:')); ?>

                                        <?php echo e(Form::date('tanggal_pembelian', null,['class'=> 'form-control','id'=>'Tanggal'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('jenis_po', 'Jenis PO:')); ?>

                                        <?php echo e(Form::select('jenis_po', ['Stock' => 'Stock','Jasa' => 'Jasa','Non-Stock' => 'Non-Stock'], null, ['class'=> 'form-control','id'=>'Jenis'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Kode Vendor', 'Vendor:')); ?>

                                        <?php echo e(Form::select('kode_vendor',$Vendor,null, ['class'=> 'form-control','id'=>'Vendor'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Penawaran', 'No Ref. Penawaran:')); ?>

                                        <?php echo e(Form::text('no_penawaran', null, ['class'=> 'form-control','id'=>'Ref', 'autocomplete'=>'off','required'])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('TOP', 'TOP:')); ?>

                                        <?php echo e(Form::text('top', null, ['class'=> 'form-control','id'=>'TOP','onchange'=>"hitung2();", 'autocomplete'=>'off'])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Due Date', 'Due Date:')); ?>

                                        <?php echo e(Form::text('due_date', null, ['class'=> 'form-control','id'=>'Due','readonly'])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Diskon', 'Diskon(%):')); ?>

                                        <?php echo e(Form::text('diskon_persen', null, ['class'=> 'form-control','id'=>'Diskon', 'autocomplete'=>'off','required'])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Diskons', 'Diskon(Rp):')); ?>

                                        <?php echo e(Form::text('diskon_rp', null, ['class'=> 'form-control','id'=>'Diskonrp', 'autocomplete'=>'off','required'])); ?>

                                     </div>
                                </div> 

                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('PPN', 'PPN(%):')); ?>

                                        <?php echo e(Form::text('ppn', null, ['class'=> 'form-control','id'=>'PPN', 'autocomplete'=>'off','required'])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                        <?php echo e(Form::textarea('deskripsi', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi', 'autocomplete'=>'off'])); ?>

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

<div class="modal fade" id="showform" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h5 class="modal-title">Tampilkan Detail Data</h5>
            </div>
           
            <div class="modal-body">
                   <table class="table table-bordered table-striped" width="100%" style="font-size: 12px;">
                    <tr class="bg-primary">
                        <th>Nama Produk</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Qty Received</th>
                    </tr>
                    <tr>
                        <td><p id="nama"></p></td>
                        <td><p id="satuan"></p></td>
                        <td><p id="qty"></p></td>
                        <td><p id="harga"></p></td>
                        <td><p id="subtotal"></p></td>
                        <td><p id="qty_received"></p></td>
                    </tr>
                   </table>
            </div>
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
                <?php echo Form::open(['route' => ['pembelian.export'],'method' => 'get','id'=>'form', 'target'=>"_blank"]); ?>

                        <div class="modal-body">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_pembelian', 'No. Pembelian:')); ?>

                                    <?php echo e(Form::select('no_pembelian', $no_pembelian, null, ['class'=> 'form-control select2','id'=>'nomor','required'=>'required', 'placeholder'=>'','style'=>'width: 100%'])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
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

        function show(id, url) {
            
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result){
                        console.log(result);
                        $('#nama').html(result.nama_produk);
                        $('#satuan').html(result.satuan);
                        $('#qty').html(result.qty);
                        $('#harga').html(result.harga);
                        $('#subtotal').html(result.subtotal);
                        $('#qty_received').html(result.qty_received);                 
                        $('#url').html(result.url);
                        $('#showform').modal('show');
                    }
                });
        }

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
            ajax: '<?php echo route('pembelian.data'); ?>',

            columns: [
                { data: 'no_pembelian', name: 'no_pembelian' },
                { data: 'tanggal_pembelian', name: 'tanggal_pembelian' },
                { data: 'nama_vendor', name: 'nama_vendor' },
                { data: 'jenis_po', name: 'jenis_po' },
                { data: 'total_item', name: 'total_item' },
                { data: 'diskon_persen', name: 'diskon_persen' },
                { data: 'diskon_rp', name: 'diskon_rp' },
                { data: 'ppn', name: 'ppn' },
                { data: 'grand_total', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'status', name: 'status' },
                { data: 'no_ap', name: 'no_ap' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        function formatNumber(n) {
            if(n == 0){
                return 0;
            }else{
                return n.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            }
        }

        function formatRupiah(angka, prefix='Rp'){
           
            var rupiah = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return rupiah;
           
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

        function createTable(result){

        var total_qty = 0;
        var total_qty_received = 0;
        var total_pakai = 0;
        var total_harga = 0;
        var grand_total = 0;

        $.each( result, function( key, row ) {
            total_qty += row.qty;
            total_qty_received += row.qty_received;
            harga = row.harga;
            qty = row.qty;
            total_pakai = harga * qty;
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
                    my_table += "<td>Rp "+row.subtotal+"</td>";
                    my_table += "<td>"+row.qty_received+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Produk</th>'+
                                '<th>Satuan</th>'+
                                '<th>Qty</th>'+
                                '<th>Harga</th>'+
                                '<th>Subtotal</th>'+
                                '<th>Qty Received</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                       ' <tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="2">Total</th>'+
                                '<th></th>'+
                                '<th></th>'+
                                '<th>Rp '+grand_total+'</th>'+
                                '<th></th>'+
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
                    var colom = select.find('td:eq(9)').text();
                    var colom2 = select.find('td:eq(4)').text();
                    var no_pembelian = select.find('td:eq(0)').text();
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
                var no_pembelian = colom;
                console.log(no_pembelian);
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
                            url: '<?php echo route('pembelian.post'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pembelian
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
                var no_pembelian = colom;
                console.log(no_pembelian);
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
                            url: '<?php echo route('pembelian.unpost'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pembelian
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
                var no_pembelian = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('pembelian.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_pembelian
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

        function getnama(){
            var vendor= $('#Vendor1').val();
            $.ajax({
                url:'<?php echo route('pembelian.getnama'); ?>',
                type:'POST',
                data : {
                        'vendor': vendor,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Namavendor').val(result.nama_vendor);
                    },
            });
        }

        function hitung() {
             var tgl_awal = $('#Tanggal1').val();
             var hari = $('#TOP1').val();

             var hasil = new Date(new Date().getTime()+(hari*24*60*60*1000)); 

             var newdate = new Date(hasil);
             var dd = newdate.getDate();
             var mm = newdate.getMonth() + 1;
             var y = newdate.getFullYear();

             var someFormattedDate = y + '-' + mm + '-' + dd;
             document.getElementById('Due1').value = someFormattedDate;
        }

        function hitung2() {
             var tgl_awal = $('#Tanggal').val();
             var hari = $('#TOP').val();

             var hasil = new Date(new Date().getTime()+(hari*24*60*60*1000)); 

             var newdate = new Date(hasil);
             var dd = newdate.getDate();
             var mm = newdate.getMonth() + 1;
             var y = newdate.getFullYear();

             var someFormattedDate = y + '-' + mm + '-' + dd;
             document.getElementById('Due').value = someFormattedDate;
        }
             

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
                    url:'<?php echo route('pembelian.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#addform').modal('show');
                        $('#Tanggal1').val('');
                        $('#Jenis1').val('').trigger('change');
                        $('#Vendor1').val('').trigger('change');
                        $('#Ref1').val('');
                        $('#TOP1').val('');
                        $('#Due1').val('');
                        $('#Diskon1').val('0');
                        $('#Diskonrp1').val('0');
                        $('#PPN1').val('0');
                        $('#Deskripsi1').val('');
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
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('pembelian.updateajax'); ?>',
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
                        $('#editform').modal('show');
                        $('#Pembelian').val(results.no_pembelian);
                        $('#Vendor').val(results.kode_vendor);
                        $('#Tanggal').val(results.tanggal_pembelian);
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