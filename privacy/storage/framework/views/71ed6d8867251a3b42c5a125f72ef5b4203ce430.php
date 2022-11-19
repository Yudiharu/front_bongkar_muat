<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>
    
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/table.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="/gui_inventory_gut_laravel/css/logo_gui.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/gui_inventory_gut_laravel/css/logo_gui.png" sizes="32x32">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <style>
    td.details-control {
    background: url('../css/detail_open2.png') no-repeat center center;
    cursor: pointer;
    }
    tr.shown td.details-control {
    background: url('../css/detail_minus2.png') no-repeat center center;
    }       
    </style>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()">
                        <i class="fa fa-refresh"></i> Refresh</button>
                    <span class="pull-right">
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#button3"><i class="fa fa-print"></i> DETAIL HISTORY</button>
                    <button type="button" class="btn btn-warning btn-xs" id="button6"><i class="fa fa-paperclip"></i> VIEW HISTORY</button>
                    <button type="button" class="tombol1 btn btn-info btn-xs" id="button4"><i class="fa fa-paperclip"></i> VIEW DETAIL</button> 
                        <button type="button" class="btn btn-primary btn-xs" id="button5"><i class="fa fa-paperclip"></i> VIEW MONTHLY</button>
                    </span>
            </div>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                        <tr class="bg-blue">
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Tipe Produk</th>
                            <th>Part Number</th>
                            <th>Kategori</th>
                            <th>Merek</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

<div class="modal fade" id="button3"  role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">History Detail</h4>
                </div>
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route' => ['produk.export'],'method' => 'get','id'=>'form', 'target'=>"_blank"]); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        <?php echo e(Form::select('kode_produk',$Produk->sort(),null,
                                         ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','required',
                                         'id'=>'kodeproduk'])); ?>

                                    </div>
                                </div>
                                    <div class="col-sm-4">
                                        <?php echo e(Form::label('tanggal_awal', 'Dari Tanggal:')); ?>

                                        <?php echo e(Form::date('tanggal_awal',\Carbon\Carbon::now(), ['class'=> 'form-control','id'=>'tanggal1'])); ?>

                                    </div>
                                    <div class="col-sm-4">
                                        <?php echo e(Form::label('tanggal_akhir', 'Sampai Tanggal:')); ?>

                                        <?php echo e(Form::date('tanggal_akhir',\Carbon\Carbon::now(), ['class'=> 'form-control','id'=>'tanggal2','placeholder'=>'Periode Baru'])); ?>                                    
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('show', 'History:')); ?>

                                        <?php echo e(Form::select('show', ['Monthly' => 'Monthly', 'Transaksi' => 'Transaksi'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'history','required'=>'required'])); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <?php echo e(Form::submit('Cetak PDF', ['class' => 'btn btn-success crud-submit'])); ?>

                                <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
            $('.back2Top').show();
        }

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('produk.data'); ?>',
            
            columns: [
                { data: 'kode_produk', name: 'kode_produk' },
                { data: 'nama_produk', name: 'nama_produk' },
                { data: 'tipe_produk', name: 'tipe_produk' },
                { data: 'partnumber', name: 'partnumber' },
                { data: 'kode_kategori', name: 'kode_kategori' },
                { data: 'merek.nama_merek', name: 'merek.nama_merek' },
                { data: 'kode_satuan', name: 'kode_satuan' },
            ]
            });
        });

        function formatRupiah(angka, prefix='Rp'){
           
            var rupiah = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return rupiah;
           
        }


        function createTable(result){

            var my_table = "";


        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.periode+"</td>";
                    my_table += "<td>"+row.partnumber+"</td>";
                    my_table += "<td>"+row.begin_stock+"</td>";
                    my_table += "<td>"+formatRupiah(row.begin_amount)+"</td>";
                    my_table += "<td>"+row.in_stock+"</td>";
                    my_table += "<td>"+formatRupiah(row.in_amount)+"</td>";
                    my_table += "<td>"+row.out_stock+"</td>";
                    my_table += "<td>"+formatRupiah(row.out_amount)+"</td>";
                    my_table += "<td>"+row.sale_stock+"</td>";
                    my_table += "<td>"+formatRupiah(row.sale_amount)+"</td>";
                    my_table += "<td>"+row.adjustment_stock+"</td>";
                    my_table += "<td>"+formatRupiah(row.adjustment_amount)+"</td>";
                    my_table += "<td>"+row.stock_opname+"</td>";
                    my_table += "<td>"+formatRupiah(+row.amount_opname)+"</td>";
                    my_table += "<td>"+row.ending_stock+"</td>";
                    my_table += "<td>"+formatRupiah(+row.ending_amount)+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" style="padding-left:50px; font-size:12px">'+ 
                        '<thead style="font-size:10px">'+
                           ' <tr class="bg-info">'+
                                '<th>Periode</th>'+
                                '<th>Partnumber</th>'+
                                '<th>Begin Qty</th>'+
                                '<th>Begin Amount</th>'+
                                '<th>In Qty</th>'+
                                '<th>In Amount</th>'+
                                '<th>Out Qty</th>'+
                                '<th>Out Amount</th>'+
                                '<th>Sale Qty</th>'+
                                '<th>Sale Amount</th>'+
                                '<th>Adjustment Qty</th>'+
                                '<th>Adjustment Amount</th>'+
                                '<th>Opname Qty </th>'+
                                '<th>Opname Amount</th>'+
                                '<th>Ending Qty</th>'+
                                '<th>Ending Amount</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

        function createTable2(result){

            var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.kode_produk+"</td>";
                    my_table += "<td>"+row.partnumber+"</td>";
                    my_table += "<td>"+row.qty+"</td>";
                    my_table += "<td>"+formatRupiah(row.hpp)+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-primary">'+
                                '<th>Kode Produk</th>'+
                                '<th>Part Number</th>'+
                                '<th>QTY</th>'+
                                '<th>HPP</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

        function createTable3(result){

            var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.tanggal_transaksi+"</td>";
                    my_table += "<td>"+row.no_transaksi+"</td>";
                    my_table += "<td>"+row.qty_transaksi+"</td>";
                    my_table += "<td>"+formatRupiah(row.total_transaksi)+"</td>";
                    my_table += "<td>"+row.created_by+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-primary">'+
                                '<th>Tanggal Transaksi</th>'+
                                '<th>No Transaksi</th>'+
                                '<th>Qty Transaksi</th>'+
                                '<th>Total</th>'+
                                '<th>Dibuat Oleh</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

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
                    var tipe = select.find('td:eq(2)').text();
                    var kategori = select.find('td:eq(4)').text();
                    if(tipe == 'Serial' && kategori == 'UNIT'){
                        $('.tombol1').show();
                    }else{
                        $('.tombol1').hide();
                    }
                }
            } );

            $('#button4').click( function () {
                var select = $('.selected').closest('tr');
                var kode_produk = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('produk.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_produk
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
                                    console.log(result[i].kode_produk,result[i].partnumber,result[i].qty,result[i].hpp);
                                }

                                row.child( createTable2(result) ).show();
                                select.addClass('shown');
                            }
                        }
                    }
                });
            });

            $('#button5').click( function () {
                var select = $('.selected').closest('tr');
                var kode_produk = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('produk.showmonthly'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_produk
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

            $('#button6').click( function () {
                var select = $('.selected').closest('tr');
                var kode_produk = select.find('td:eq(0)').text();
                var row = table.row( select );
                // console.log(no_pemakaian);
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                $.ajax({
                    url: '<?php echo route('produk.showhistory'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_produk
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
                                    console.log(result[i].tanggal_transaksi,result[i].no_transaksi,result[i].qty_transaksi,result[i].total_transaksi);
                                }

                                row.child( createTable3(result) ).show();
                                select.addClass('shown');
                            }
                        }
                    }
                });
            });

        } );

        
        function format ( d ) {
            // `d` is the original data object for the row
            return '<div class="col-md-12">'+
                           ' <!-- Custom Tabs -->'+
                            '<div class="nav-tabs-custom">'+
                              '<ul class="nav nav-tabs">'+
                                '<li class="active"><a href="#tab_1" data-toggle="tab">View Monthly</a></li>'+
                               ' <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>'+
                                '<li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>'+
                              '</ul>'+
                              '<div class="tab-content">'+
                                '<div class="tab-pane active" id="tab_1">'+
                                    '<table class="table  table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px;">'+
                                    '<thead>'+
                                    '<tr class="bg-purple">'+
                                        '<th>Periode:</th>'+
                                        '<th>Kode Produk:</th>'+
                                        '<th>Satuan:</th>'+
                                        '<th>Begin Stock:</th>'+
                                        '<th>Begin Amount:</th>'+
                                        '<th>In Stock:</th>'+
                                        '<th>In Amount:</th>'+
                                    '</tr>'+
                                    '</thead>'+
                                    '<tbody>'+
                                    '<tr>'+
                                        '<td>'+d.periode+'</td>'+
                                        '<td>'+d.kode_produk+'</td>'+
                                        '<td>'+d.satuan+'</td>'+
                                        '<td>'+d.begin_stock+'</td>'+
                                        '<td>'+d.begin_amount+'</td>'+
                                        '<td>'+d.in_stock+'</td>'+
                                        '<td>'+d.in_amount+'</td>'+
                                    '</tr>'+
                                    '</tbody>'+
                                '</table>'+
                                '</div>'+
                                '<!-- /.tab-pane -->'+
                                '<div class="tab-pane" id="tab_2">'+
                                'ok2'+
                                '</div>'+
                               ' <!-- /.tab-pane -->'+
                                '<div class="tab-pane" id="tab_3">'+
                                'ok3'+
                               ' </div>'+
                                '<!-- /.tab-pane -->'+
                              '</div>'+
                            '  <!-- /.tab-content -->'
                            '</div>'+
                            '<!-- nav-tabs-custom -->'+
                         ' <!-- /.col -->'+
                    ' </div>'
            ;
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

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>