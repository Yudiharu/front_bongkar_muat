<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content_header'); ?>
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
<?php $__env->stopSection(); ?>
<body>
    
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Produk</b></font>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                   <!--   -->
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()">
                        <i class="fa fa-refresh"></i> Refresh</button>
                    <?php if (app('laratrust')->can('create-produk')) : ?>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> Produk Baru</button>
                    <?php endif; // app('laratrust')->can ?>
                    <!--  -->
               
            </div>
        </div>
             <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                <thead>
                    <tr class="bg-gray">
                        <!--<th></th>-->
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Part Number</th>
                        <th>Kategori</th>
                        <th>Merek</th>
                       <!--   -->
                        <th>Satuan</th>
                       <!--  
                         -->
                        <th>Stok</th>
                        <!-- 
                        
                         -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>

<div class="modal fade" id="addform" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Buat Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--  -->
            <?php echo Form::open(['id'=>'ADD']); ?>

                    <div class="modal-body">
                        <div class="row">
                                <!--  -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Nama Produk', 'Nama Produk:')); ?>

                                        <?php echo e(Form::text('nama_produk', null, ['class'=> 'form-control','id'=>'Nama1','required'=>'required', 'placeholder'=>'Nama Produk','onkeypress'=>"return pulsar(event,this)",'autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                               <!--   -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_kategori', 'Kategori:')); ?>

                                        <?php echo e(Form::select('kode_kategori',$Kategori,null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','id'=>'Kategori1','required'=>'required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_merek', 'Merek:')); ?>

                                        <?php echo e(Form::select('kode_merek', $Merek,null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','id'=>'Merek1','required'=>'required'])); ?>

                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        <?php echo e(Form::select('kode_satuan', $Satuan,null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','id'=>'Satuan1','required'=>'required'])); ?>

                                    </div>
                                </div>
                               <!--   -->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('partnumber', 'Part Number:')); ?>

                                        <?php echo e(Form::text('partnumber', null, ['class'=> 'form-control','id'=>'Part1', 'placeholder'=>'Part Number','required'=>'required','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga_beli', 'Harga Beli:')); ?>

                                        <?php echo e(Form::text('harga_beli', 0, ['class'=> 'form-control','id'=>'Beli1', 'placeholder'=>'Harga Beli','required'=>'required','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga_jual', 'Harga Jual:')); ?>

                                        <?php echo e(Form::text('harga_jual', 0, ['class'=> 'form-control','id'=>'Jual1', 'placeholder'=>'Harga Jual','required'=>'required','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('hpp', 'HPP:')); ?>

                                        <?php echo e(Form::text('hpp', 0, ['class'=> 'form-control','id'=>'HPP1', 'placeholder'=>'HPP','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('stok', 'Stok:')); ?>

                                        <?php echo e(Form::text('stok', 0, ['class'=> 'form-control','id'=>'Stok1', 'placeholder'=>'Stock','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('aktif', 'Status:')); ?>

                                        <?php echo e(Form::select('stat', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','id'=>'stat1','required'=>'required'])); ?>

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
              <h4 class="modal-title">Ubah Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--  -->
            <?php echo Form::open(['id'=>'EDIT']); ?>

            <div class="modal-body">
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <!--  -->
                                    <?php echo e(Form::hidden('kode_produk', null, ['class'=> 'form-control','id'=>'Kode2','readonly'])); ?>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Nama Produk', 'Nama Produk:')); ?>

                                    <?php echo e(Form::text('nama_produk', null, ['class'=> 'form-control','id'=>'Nama2','autofocus'=>'autofocus','required'=>'required','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <!--  -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_kategori', 'Kategori:')); ?>

                                    <?php echo e(Form::select('kode_kategori',$Kategori,null, ['class'=> 'form-control','id'=>'Kategori2','required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_merek', 'Merek:')); ?>

                                    <?php echo e(Form::select('kode_merek', $Merek,null, ['class'=> 'form-control','id'=>'Merek2','required'=>'required'])); ?>

                                </div>
                            </div>

                           <!--  -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                    <?php echo e(Form::select('kode_satuan', $Satuan,null, ['class'=> 'form-control','id'=>'Satuan2','required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('partnumber', 'Part Number:')); ?>

                                    <?php echo e(Form::text('partnumber',null, ['class'=> 'form-control','id'=>'Part2','required'=>'required','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('harga_beli', 'Harga Beli:')); ?>

                                    <?php echo e(Form::text('harga_beli', null, ['class'=> 'form-control','id'=>'Beli2','required'=>'required','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>

                            <!--  -->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('harga_jual', 'Harga Jual:')); ?>

                                    <?php echo e(Form::text('harga_jual', null, ['class'=> 'form-control','id'=>'Jual2','required'=>'required','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('hpp', 'HPP:')); ?>

                                    <?php echo e(Form::text('hpp', null, ['class'=> 'form-control','id'=>'HPP2','readonly'])); ?>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('stok', 'Stok:')); ?>

                                    <?php echo e(Form::text('stok', null, ['class'=> 'form-control','id'=>'Stok2','readonly'])); ?>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                        <?php echo e(Form::label('stat', 'Status:')); ?>

                                        <?php echo e(Form::select('stat', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'stat2','required'=>'required'])); ?>

                                    </div>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                    <!--  -->
                    <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                </div>
            </div>
            <?php echo Form::close(); ?>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="konversiform" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Konversi Satuan</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--  -->
            <?php echo Form::open(['id'=>'KONVERSI']); ?>

            <div class="modal-body">
                    <div class="row">
                        <span class="col-md-12">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <!--  -->
                                    <?php echo e(Form::hidden('kode_produk', null, ['class'=> 'form-control','id'=>'Kode3','readonly'])); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Nama Produk', 'Nama Produk:')); ?>

                                    <?php echo e(Form::text('nama_produk', null, ['class'=> 'form-control','id'=>'Nama3','autofocus'=>'autofocus'])); ?>

                                </div>
                            </div>
                            <!--  -->
                        </span>
                        <span class="col-md-12">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_kategori', 'Kategori:')); ?>

                                    <?php echo e(Form::select('kode_kategori',$Kategori,null, ['class'=> 'form-control','id'=>'Kategori3'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_merek', 'Merek:')); ?>

                                    <?php echo e(Form::select('kode_merek', $Merek,null, ['class'=> 'form-control','id'=>'Merek3'])); ?>

                                </div>
                            </div>
                            <!--  -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                    <?php echo e(Form::select('kode_satuan', $Satuan,null, ['class'=> 'form-control','id'=>'Satuan3'])); ?>

                                </div>
                            </div>
                            
                            <!--  -->
                        </span>
                        <span class="col-md-12">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('harga_beli', 'Harga Beli:')); ?>

                                    <?php echo e(Form::text('harga_beli', null, ['class'=> 'form-control','id'=>'Beli3'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('harga_jual', 'Harga Jual:')); ?>

                                    <?php echo e(Form::text('harga_jual', null, ['class'=> 'form-control','id'=>'Jual3'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('hpp', 'HPP:')); ?>

                                    <?php echo e(Form::text('hpp', null, ['class'=> 'form-control','id'=>'HPP3'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('stok', 'Stok:')); ?>

                                    <?php echo e(Form::text('stok', null, ['class'=> 'form-control','id'=>'Stok3'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('stat', 'Aktif:')); ?>

                                    <?php echo e(Form::text('stat', null, ['class'=> 'form-control','id'=>'Aktif3'])); ?>

                                </div>
                            </div>
                        </span>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                    <!--  -->
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
                    <tr>
                        <th width="40%">Kode Produk</th>
                        <td><p id="kode"></p></td>
                    </tr>
                    <tr>
                        <th>Nama Produk</th>
                        <td><p id="nama"></p></td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td><p id="kategori"></p></td>
                    </tr>
                    <tr>
                        <th>Merek</th>
                        <td><p id="merek"></p></td>
                    </tr>
                    <!--  -->
                    <tr>
                        <th>Satuan</th>
                        <td><p id="satuan"></p></td>
                    </tr>
                    <tr>
                        <th>Part Number</th>
                        <td><p id="partnumber"></p></td>
                    </tr>
                   <!--   -->
                    <tr>
                        <th>Stok</th>
                        <td><p id="stock"></p></td>
                    </tr>
                    <tr>
                        <th>Harga Beli</th>
                        <td><p id="beli"></p></td>
                    </tr>
                    <tr>
                        <th>Harga Jual</th>
                        <td><p id="jual"></p></td>
                    </tr>
                    <tr>
                        <th>Hpp</th>
                        <td><p id="hpps"></p></td>
                    </tr>
                    <tr>
                        <th>stat</th>
                        <td><p id="stats"></p></td>
                    </tr>
                    <tr>
                        <th>Company</th>
                        <td><p id="company"></p></td>
                    </tr>
                   </table>
            </div>
            <!-- <div class="modal-footer">
                <p id="url"></p>
            </div> -->

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
<script type="text/javascript">
        
        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('produk.data'); ?>',
            
            columns: [
                // {
                //     "className":'details-control',
                //     "orderable":false,
                //     "data":null,
                //     "defaultContent":''
                // },
                { data: 'kode_produk', name: 'kode_produk' },
                { data: 'nama_produk', name: 'nama_produk' },
                { data: 'partnumber', name: 'partnumber' },
                { data: 'kategoriproduk.nama_kategori', name: 'kategoriproduk.nama_kategori' },
                // { data: 'kode_kategori', name: 'kode_kategori' },
                { data: 'merek.nama_merek', name: 'merek.nama_merek' },
                // { data: 'kode_merek', name: 'kode_merek' },
                // { data: 'ukuran.nama_ukuran', name: 'ukuran.nama_ukuran' },
                //{ data: 'kode_ukuran', name: 'kode_ukuran' },
                { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
                // { data: 'partnumber', name: 'partnumber' },
                //{ data: 'kode_satuan', name: 'kode_satuan' },
                // { data: 'type', name: 'type' },
                // { data: 'harga_beli', name: 'harga_beli' },
                // { data: 'harga_jual', name: 'harga_jual' },
                // { data: 'hpp', name: 'hpp' },
                { data: 'stok', name: 'stok' },
                // { data: 'aktif', name: 'aktif' },
                // { data: 'company.nama_company', name: 'nama_company' },
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

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    // var colom = select.find('td:eq(2)').text();
                    // var colom2 = select.find('td:eq(3)').text();
                    // var no_pembelian = select.find('td:eq(0)').text();
                }
            } );
        } );

        // $(document).ready(function() {
        //     var table = $('#data-table').DataTable();
        
        //     $('#data-table tbody').on( 'click', 'td.details-control', function () {
        //         var tr = $(this).closest('tr');
        //         var kode = tr.find('td:eq(1)').text();
        //         var row = table.row( tr );
        //         $.ajax({
        //             url: '<?php echo route('itembulanan.show'); ?>',
        //             type: 'POST',
        //             data : {
        //                 'id': kode
        //             },
        //             success: function(result) {
        //                 console.log(result);
        //                 if(result.title == 'Gagal'){
        //                     $.notify(result.message);
                            
        //                 }else{

        //                 if ( row.child.isShown() ) {
        //                 row.child.hide();
        //                 tr.removeClass('shown');
        //                 }
        //                 else {
        //                 // Open this row
        //                 row.child( format(result) ).show();
        //                 tr.addClass('shown');
        //                 }
        //              }
        //             }
        //         });

                
        //     } );
        
        // } );

        // function format ( d ) {
        //     // `d` is the original data object for the row
        //     return '<table class="table  table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px;">'+
        //         '<thead>'+
        //         '<tr class="bg-purple">'+
        //             '<th>Kode Produk:</th>'+
        //             '<th>In Stock:</th>'+
        //             '<th>In Amount:</th>'+
        //         '</tr>'+
        //         '</thead>'+
        //         '<tbody>'+
        //         '<tr>'+
        //             '<td>'+d.kode_produk+'</td>'+
        //             '<td>'+d.in_stock+'</td>'+
        //             '<td>'+d.in_stock+'</td>'+
        //         '</tr>'+
        //         '</tbody>'+
        //     '</table>';

        // }

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

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });

        $('#ADD').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            var name = $.trim($('#Nama1').val());
            var kategori = $.trim($('#Kategori1').val());
            var merek = $.trim($('#Merek1').val());
            // var ukuran = $.trim($('#Ukuran1').val());
            var satuan = $.trim($('#Satuan1').val());
            var part = $.trim($('#Part1').val());
            // var company = $.trim($('#Company1').val());
            // var type = $.trim($('#Type1').val());
            var beli = $.trim($('#Beli1').val());
            var jual = $.trim($('#Jual1').val());
            var hpp = $.trim($('#HPP1').val());
            var stok = $.trim($('#Stok1').val());
            var stat = $.trim($('#stat1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

            // Check if empty of not           
                $.ajax({
                    url:'<?php echo route('produk.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#Nama1').val('');
                        $('#Kategori1').val('');
                        $('#Merek1').val('');
                        // $('#Ukuran1').val('');
                        $('#Satuan1').val('');
                        $('#Part1').val('');
                        // $('#Company1').val('');
                        // $('#Type1').val('');
                        $('#Beli1').val('0');
                        $('#Jual1').val('0');
                        $('#HPP1').val('0');
                        $('#Stok1').val('0');
                        $('#stat1').val('');
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
            var kode = $.trim($('#Kode2').val());
            var name = $.trim($('#Nama2').val());
            var kategori = $.trim($('#Kategori2').val());
            var merek = $.trim($('#Merek2').val());
            // var ukuran = $.trim($('#Ukuran2').val());
            var satuan = $.trim($('#Satuan2').val());
            var part = $.trim($('#Part2').val());
            // var company = $.trim($('#Company').val());
            // var type = $.trim($('#Tipe2').val());
            var beli = $.trim($('#Beli2').val());
            var jual = $.trim($('#Jual2').val());
            var hpp = $.trim($('#HPP2').val());
            var stok = $.trim($('#Stok2').val());
            var stat = $.trim($('#stat2').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

            // Check if empty of not
            
                $.ajax({
                    url:'<?php echo route('produk.ajaxupdate'); ?>',
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




        $('#KONVERSI').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var kode = $.trim($('#Kode3').val());
            var name = $.trim($('#Nama3').val());
            var kategori = $.trim($('#Kategori3').val());
            var merek = $.trim($('#Merek3').val());
            // var ukuran = $.trim($('#Ukuran3').val());
            var satuan = $.trim($('#Satuan3').val());
            // var company = $.trim($('#Company').val());
            // var type = $.trim($('#Tipe3').val());
            var beli = $.trim($('#Beli3').val());
            var jual = $.trim($('#Jual3').val());
            var hpp = $.trim($('#HPP3').val());
            var stok = $.trim($('#Stok3').val());
            var stat = $.trim($('#Aktif3').val());
            var registerForm = $("#KONVERSI");
            var formData = registerForm.serialize();

            // Check if empty of not
            
                $.ajax({
                    url:'<?php echo route('produk.ajaxupdate'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#konversiform').modal('hide');
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
                        $('#editform').modal('show');
                        $('#Kode2').val(results.kode_produk);
                        $('#Nama2').val(results.nama_produk);
                        $('#Kategori2').val(results.kode_kategori);
                        $('#Merek2').val(results.kode_merek);
                        // $('#Ukuran2').val(results.kode_ukuran);
                        $('#Satuan2').val(results.kode_satuan);
                        $('#Company2').val(results.kode_company);
                        // $('#Tipe2').val(results.type);
                        $('#Part2').val(results.partnumber);
                        $('#Beli2').val(results.harga_beli);
                        $('#Jual2').val(results.harga_jual);
                        $('#HPP2').val(results.hpp);
                        $('#Stok2').val(results.stok);
                        $('#stat2').val(results.stat);
                        $('#showform').modal('hide');
                        
                    },
                        error : function() {
                        alert("Nothing Data");
                    }
                });

        }



        function Konversi(id, url) {
            swal({
            title: "Konversi Satuan?",
            text: "Pastikan dulu datanya!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Ubah!",
            cancelButtonText: "Batal",
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
                        // console.log(result);
                        $('#konversiform').modal('show');
                        $('#Kode3').val(results.kode_produk);
                        $('#Nama3').val(results.nama_produk);
                        $('#Kategori3').val(results.kode_kategori);
                        $('#Merek3').val(results.kode_merek);
                        // $('#Ukuran3').val(results.kode_ukuran);
                        $('#Satuan3').val(results.kode_satuan);
                        $('#Company3').val(results.kode_company);
                        // $('#Tipe3').val(results.type);
                        $('#Beli3').val(results.harga_beli);
                        $('#Jual3').val(results.harga_jual);
                        $('#HPP3').val(results.hpp);
                        $('#Stok3').val(results.stok);
                        $('#Aktif3').val(results.stat);
                        $('#showform').modal('hide');
                        $('#editform').modal('hide');
                    },
                        error : function() {
                        alert("Nothing Data");
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })

        }



        function show(id, url) {
            
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result){
                        console.log(result);
                        $('#kode').html(result.kode_produk);
                        $('#nama').html(result.nama_produk);
                        $('#kategori').html(result.kode_kategori);
                        $('#merek').html(result.kode_merek);
                        // $('#ukuran').html(result.kode_ukuran);
                        $('#satuan').html(result.kode_satuan);
                        $('#company').html(result.kode_company);
                        $('#partnumber').html(result.partnumber);
                        // $('#tipe').html(result.type);
                        $('#beli').html(result.harga_beli);
                        $('#jual').html(result.harga_jual);
                        $('#hpps').html(result.hpp);
                        $('#stock').html(result.stok);
                        $('#stats').html(result.stat);
                        $('#url').html(result.url);
                        $('#showform').modal('show');
                    }
                });
            
        }

        function del(id, url) {
            swal({
            title: "Hapus?",
            text: "Pastikan dulu data yang akan dihapus!",
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