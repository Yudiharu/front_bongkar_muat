<?php $__env->startSection('title', 'Pemakaian Ban'); ?>

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
                            
                    <?php if (app('laratrust')->can('create-pemakaianban')) : ?>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#addform"><i class="fa fa-plus"></i> New Pemakaian Ban</button>
                    <?php endif; // app('laratrust')->can ?>

                    <span class="pull-right"> 
                        <font style="font-size: 16px;"><b>PEMAKAIAN BAN</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-primary">
                        <th>No Pemakaian Ban</th>
                        <th>Tanggal Pemakaian Ban</th>
                        <th>No Polisi</th>
                        <th>No Asset Mobil</th>
                        <th>Nama Alat</th>
                        <th>No Asset Alat</th>
                        <th>Total Item</th>
                        <th>Tipe Pemakaian</th>
                        <th>Kode Lokasi</th>
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
                                    <?php echo e(Form::label('Type', 'Tipe Pemakaian:',['class'=>'control-label'])); ?>

                                    <?php echo e(Form::select('type', ['Mobil'=>'Mobil','Alat'=>'Alat'],null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Type1','onchange'=>"pakai();",'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Tanggal Pemakaian Ban', 'Tanggal Pemakaian Ban:')); ?>

                                    <?php echo e(Form::date('tanggal_pemakaianban', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group2">
                                    <?php echo e(Form::label('Nopol', 'Nomor Polisi:')); ?>

                                    <?php echo e(Form::select('kode_mobil',$Mobil->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Nopol1','onchange'=>'getasetmobil();'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group2">
                                    <br>
                                    <?php echo e(Form::label('no_asset_mobil', 'No Asset Mobil:')); ?>

                                    <?php echo e(Form::text('no_asset_mobil',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'No Asset Mobil','id'=>'Asset1','readonly'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group3">
                                    <?php echo e(Form::label('kode_alat', 'Nama Alat:')); ?>

                                    <?php echo e(Form::select('kode_alat',$Alat->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Alat1','onchange'=>'getasetalat();'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group3">
                                    <br>
                                    <?php echo e(Form::label('no_asset_alat', 'No Asset Alat:')); ?>

                                    <?php echo e(Form::text('no_asset_alat',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'No Asset Alat','id'=>'Assetalat1','readonly'])); ?>

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
                                        <?php echo e(Form::label('Type', 'Tipe Pemakaian:')); ?>

                                        <?php echo e(Form::text('type', null, ['class'=> 'form-control','id'=>'Typeedit','readonly'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Pemakaian Ban', 'No Pemakaian Ban:')); ?>

                                        <?php echo e(Form::text('no_pemakaianban', null, ['class'=> 'form-control','id'=>'Pembelian','readonly'])); ?>

                                    </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Tanggal Pemakaian Ban', 'Tanggal Pemakaian Ban:')); ?>

                                        <?php echo e(Form::date('tanggal_pemakaianban', null,['class'=> 'form-control','id'=>'Tanggal'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div id="nopols1">
                                        <?php echo e(Form::label('Nopol', 'Nomor Polisi:')); ?>

                                        <?php echo e(Form::select('kode_mobil',$Mobil,null, ['class'=> 'form-control','id'=>'Nopol','onchange'=>'getasetmobil2();'])); ?>

                                        </div>

                                        <div id="alats1">
                                        <?php echo e(Form::label('kode_alat', 'Nama Alat:')); ?>

                                        <?php echo e(Form::select('kode_alat',$Alat,null, ['class'=> 'form-control','id'=>'Alat','onchange'=>'getasetalat2();'])); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div id="nopolsasset1">
                                        <?php echo e(Form::label('no_asset_mobil', 'No Asset Mobil:')); ?>

                                        <?php echo e(Form::text('no_asset_mobil',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'No Asset Mobil','id'=>'Asset','required'=>'required','readonly'])); ?>

                                        </div>

                                        <div id="alatsasset1">
                                        <?php echo e(Form::label('no_asset_alat', 'No Asset Alat:')); ?>

                                        <?php echo e(Form::text('no_asset_alat',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'No Asset Mobil','id'=>'Assetalat','required'=>'required','readonly'])); ?>

                                        </div>
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

    
    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-map-marker" style="color: #fff"></i> <i><?php echo e($nama_company); ?></i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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
            <?php if (app('laratrust')->can('update-pemakaianban')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editpemakaianban" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-pemakaianban')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuspemakaianban" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('add-pemakaianban')) : ?>
            <a href="#" id="addpemakaianban"><button type="button" class="btn btn-info btn-xs add-button" data-toggle="modal" data-target="">ADD <i class="fa fa-plus"></i></button></a>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('post-pemakaianban')) : ?>
            <button type="button" class="btn btn-success btn-xs tombol1" id="button1">POST <i class="fa fa-bullhorn"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('unpost-pemakaianban')) : ?>
            <button type="button" class="btn btn-warning btn-xs tombol2" id="button2">UNPOST <i class="fa fa-undo"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('view-pemakaianban')) : ?>
            <button type="button" class="btn btn-primary btn-xs view-button" id="button5">VIEW <i class="fa fa-eye"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('print-pemakaianban')) : ?>
            <a href="#" target="_blank" id="printpemakaianban"><button type="button" class="btn btn-danger btn-xs print-button" id="button6">PRINT <i class="fa fa-print"></i></button></a>
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
        
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        });


        $('#editform').on('show.bs.modal', function () {
            var optionVal = $("#Typeedit").val();
            console.log(optionVal)
            if(optionVal == 'Mobil')
            {
                document.getElementById("nopols1").style.display="block";
                document.getElementById("nopolsasset1").style.display="block";
                document.getElementById("alats1").style.display="none";
                document.getElementById("alatsasset1").style.display="none";
            }
            else{
                document.getElementById("nopols1").style.display="none";
                document.getElementById("nopolsasset1").style.display="none";
                document.getElementById("alats1").style.display="block";
                document.getElementById("alatsasset1").style.display="block";
            }
        })

        function pakai() {
            var type = $("#Type1").val();
            if(type == 'Mobil'){
                $('.form-group2').show();
                $('.form-group3').hide();       
                $('#Assetalat1').val('');
                $('#Alat1').val('').trigger('change');   
            }else{
                $('.form-group2').hide();
                $('.form-group3').show(); 
                $('#Asset1').val('');
                $('#Nopol1').val('').trigger('change');   
            }
        }

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
            $('.add-button').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.print-button').hide();
            $('.view-button').hide();
            $('.back2Top').show();
            $('.form-group3').hide();
            $('.form-group2').hide();
        }

        function formatRupiah(angka, prefix='Rp'){
           
            var rupiah = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return rupiah;
           
        }

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('pemakaianban.data'); ?>',

            columns: [
                { data: 'no_pemakaianban', name: 'no_pemakaianban' },
                { data: 'tanggal_pemakaianban', name: 'tanggal_pemakaianban' },
                { data: 'mobil.nopol', name: 'mobil.nopol',defaultContent:''},
                { data: 'no_asset_mobil', name: 'no_asset_mobil' },
                { data: 'alat.nama_alat', name: 'alat.nama_alat',defaultContent:''},
                { data: 'no_asset_alat', name: 'no_asset_alat' },
                { data: 'total_item', name: 'total_item' },
                { data: 'type', name: 'type' },
                { data: 'kode_lokasi', 
                    render: function( data, type, full ) {
                    return formatNomor(data); }
                },
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

        function createTable(result){

        var total_qty = 0;
        var total_pakai = 0;
        var total_harga = 0;
        var grand_total = 0;

        $.each( result, function( key, row ) {
            total_qty += row.qty;
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
                    my_table += "<td>"+row.partnumber+"</td>";
                    my_table += "<td>"+row.partnumberbaru+"</td>";
                    my_table += "<td>"+row.satuan+"</td>";
                    my_table += "<td>"+row.qty+"</td>";
                    my_table += "<td>Rp "+formatRupiah(row.harga)+"</td>";
                    my_table += "<td>Rp "+row.subtotal+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Produk</th>'+
                                '<th>Serial Number Lama</th>'+
                                '<th>Serial Number Baru</th>'+
                                '<th>Satuan</th>'+
                                '<th>Qty</th>'+
                                '<th>Harga</th>'+
                                '<th>Subtotal</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                       ' <tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="4">Total</th>'+
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
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.add-button').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.print-button').hide();
                    $('.view-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(9)').text();
                    var colom2 = select.find('td:eq(6)').text();
                    var no_pembelian = select.find('td:eq(0)').text();
                    var add = $("#addpemakaianban").attr("href","http://localhost/gui_inventory_laravel/admin/pemakaianban/"+no_pembelian+"/detail");
                    var print = $("#printpemakaianban").attr("href","http://localhost/gui_inventory_laravel/admin/pemakaianban/export2?no_pemakaianban="+no_pembelian);
                    var status = colom;
                    var item = colom2;
                    if(status == 'POSTED' && item > 0){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        $('.add-button').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.print-button').show();
                        $('.view-button').show();
                    }else if(status =='OPEN' && item > 0){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                        $('.add-button').show();
                        $('.hapus-button').hide();
                        $('.edit-button').show();
                        $('.print-button').hide();
                        $('.view-button').show();
                    }else if(status =='OPEN' && item == 0){
                        $('.tombol1').hide();
                        $('.tombol2').hide();
                        $('.add-button').show();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                        $('.print-button').hide();
                        $('.view-button').hide();
                    }
                }
            } );            
        
           $('#button1').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_pemakaianban = colom;
                console.log(no_pemakaianban);
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
                            url: '<?php echo route('pemakaianban.posting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pemakaianban
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
                                else if (result.success === false) {
                                  swal({
                                      title: 'Error',
                                      text: result.message,
                                      type: 'error',
                                  })
                                    refreshTable();
                                }
                                else{
                                  swal({
                                      title: 'Error',
                                      text: 'POSTING gagal! Stok tidak cukup.',
                                      type: 'error',
                                  })
                                    refreshTable();
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
                var no_pemakaianban = colom;
                console.log(no_pemakaianban);
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
                            url: '<?php echo route('pemakaianban.unposting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pemakaianban
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
                                    refreshTable();
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
                var no_pemakaianban = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('pemakaianban.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_pemakaianban
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
            
            $('#editpemakaianban').click( function () {
                var select = $('.selected').closest('tr');
                var no_pemakaianban = select.find('td:eq(0)').text();
                var row = table.row( select );
                console.log(no_pemakaianban);
                $.ajax({
                    url: '<?php echo route('pemakaianban.edit_pemakaianban'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_pemakaianban
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Pembelian').val(results.no_pemakaianban);
                        $('#Nopol').val(results.kode_mobil);
                        $('#Alat').val(results.kode_alat);
                        $('#Tanggal').val(results.tanggal_pemakaianban);
                        $('#Asset').val(results.no_asset_mobil);
                        $('#Assetalat').val(results.no_asset_alat);
                        $('#Status').val(results.status);
                        $('#Typeedit').val(results.type);
                        $('#editform').modal('show');
                        }
                });
            });
            
            $('#hapuspemakaianban').click( function () {
                var select = $('.selected').closest('tr');
                var no_pemakaianban = select.find('td:eq(0)').text();
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
                            url: '<?php echo route('pemakaianban.hapus_pemakaianban'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pemakaianban
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

        function getasetmobil(){
            var nopol= $('#Nopol1').val();

            $.ajax({
                url:'<?php echo route('pemakaianban.getmobil'); ?>',
                type:'POST',
                data : {
                        'id': nopol,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Asset1').val(result.no_asset_mobil).trigger('change');
                        $('#Asset1').val(result.no_asset_mobil);
                    },
            });
        }

        function getasetalat(){
            var alat= $('#Alat1').val();

            $.ajax({
                url:'<?php echo route('pemakaianban.getalat'); ?>',
                type:'POST',
                data : {
                        'id': alat,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Assetalat1').val(result.no_asset_alat).trigger('change');
                        $('#Assetalat1').val(result.no_asset_alat);
                    },
            });
        }

        function getasetmobil2(){
            var nopol= $('#Nopol').val();

            $.ajax({
                url:'<?php echo route('pemakaianban.getmobil2'); ?>',
                type:'POST',
                data : {
                        'id': nopol,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Asset').val(result.no_asset_mobil).trigger('change');
                        $('#Asset').val(result.no_asset_mobil);
                    },
            });
        }

        function getasetalat2(){
            var alat= $('#Alat').val();

            $.ajax({
                url:'<?php echo route('pemakaianban.getalat2'); ?>',
                type:'POST',
                data : {
                        'id': alat,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Assetalat').val(result.no_asset_alat).trigger('change');
                        $('#Assetalat').val(result.no_asset_alat);
                    },
            });
        }

        function refreshTable() {
            $('#data-table').DataTable().ajax.reload(null,false);
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.add-button').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.print-button').hide();
            $('.view-button').hide();
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
                    url:'<?php echo route('pemakaianban.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#addform').modal('show');
                        $('#Tanggal1').val('');
                        $('#Type1').val('').trigger('change');
                        $('#Nopol1').val('').trigger('change');
                        $('#Asset1').val('');
                        $('#Alat1').val('').trigger('change');
                        $('#Assetalat1').val('');
                        $('#addform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                            load();
                        } else {
                            swal("Gagal!", data.message, "error");
                            load();
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
                    url:'<?php echo route('pemakaianban.updateajax'); ?>',
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
    </script>
<?php $__env->stopPush(); ?>

                                
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>