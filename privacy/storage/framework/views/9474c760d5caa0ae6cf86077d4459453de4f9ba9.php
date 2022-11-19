<?php $__env->startSection('title', 'Pemakaian Detail'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-success btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Pemakaian <b><?php echo e($pemakaian->no_pemakaian); ?></b></font>
    </span>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-success">
        <div class="box-body"> 
                <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id'=>'ADD_DETAIL']); ?>

                    <center><kbd>ADD FORM</kbd></center><br>
                        <div class="row">   
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Pemakaian', 'No Pemakaian:')); ?>

                                        <?php echo e(Form::text('no_pemakaian',$pemakaian->no_pemakaian, ['class'=> 'form-control','readonly','id'=>'nopakai'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" title="Add New Produk" data-target="#ADD_FORMPRODUK"><i class="fa fa-plus"></i></button> 
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        <?php echo e(Form::select('kode_produk',$Produk->sort(),null,
                                         ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','required'=>'required','onchange'=>'stock();',
                                         'id'=>'kode_produks'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('partnumber', 'Part Number:')); ?>

                                        <?php echo e(Form::select('partnumber',[], null, ['class'=> 'form-control','id'=>'Parts','required'=>'required','style'=>'width: 100%','autocomplete'=>'off','onchange'=>'getharga();'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" title="Add Satuan Konversi" data-target="#ADD_SATUANKONVERSI"><i class="fa fa-plus"></i></button>
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        <?php echo e(Form::select('kode_satuan', ['-'],null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','required'=>'required','id'=>'Satuan'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('qty_stock', 'Stock Tersedia:')); ?>

                                            <?php echo e(Form::text('qty_stock', null, ['class'=> 'form-control','readonly','id'=>'Stock'])); ?>

                                        </div>
                                </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::number('qty', null, ['class'=>'form-control','required'=>'required','id'=>'QTY','onkeyup'=>'check();','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'HPP:')); ?>

                                        <?php echo e(Form::number('harga',null, ['class'=> 'form-control','id'=>'Harga','readonly'])); ?>

                                    </div>
                                </div>
                            </div> 
                                <span class="pull-right">
                                        <?php echo e(Form::submit('Add Item', ['class' => 'btn btn-success btn-sm','id'=>'submit'])); ?>

                                </span>
                    <?php echo Form::close(); ?>

            </div>

            <div class="editform">
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['id'=>'UPDATE_DETAIL']); ?>

                 <center><kbd>EDIT FORM</kbd></center><br>
                    <div class="row">   
                        <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('No Pemakaian', 'No Pemakaian:')); ?>

                                    <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'ID'])); ?>

                                    <?php echo e(Form::text('no_pemakaian',$pemakaian->no_pemakaian, ['class'=> 'form-control','readonly','id'=>'Pemakaian_e'])); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                    <?php echo e(Form::text('kode_produk',null, ['class'=> 'form-control','id'=>'Produk_e','required'=>'required','readonly'])); ?>

                                </div>
                            </div>
                
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                    <?php echo e(Form::text('kode_satuan',null, ['class'=> 'form-control','id'=>'Satuan_e','readonly'])); ?>

                                </div>
                            </div>
                
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('qty', 'QTY:')); ?>

                                    <?php echo e(Form::text('qty', null, ['class'=> 'form-control','id'=>'QTY_e','required'=>'required','onkeyup'=>"cek_qty2()",'autocomplete'=>'off'])); ?>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('harga', 'HPP:')); ?>

                                    <?php echo e(Form::text('harga',null, ['class'=> 'form-control','id'=>'Harga_e','required'=>'required','readonly'])); ?>

                                </div>
                            </div>
                        </div> 
                            <div class="row-md-2">
                                <span class="pull-right"> 
                                    <?php echo e(Form::submit('Update', ['class' => 'btn btn-success btn-sm','id'=>'submit2'])); ?>

                                    <button type="button" class="btn btn-danger btn-sm" onclick="cancel_edit()">Cancel</button>&nbsp;
                                </span>
                            </div>
                <?php echo Form::close(); ?>  
      </div>
      
    </div>
</div>

        <div class="modal fade" id="ADD_FORMPRODUK" role="dialog">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Create Data</h4>
                </div>
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['id'=>'ADD_PRODUK']); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Nama Produk', 'Nama Produk:')); ?>

                                        <?php echo e(Form::text('nama_produk', null, ['class'=> 'form-control','id'=>'Nama1','required'=>'required', 'placeholder'=>'Nama Produk','onkeypress'=>"return pulsar(event,this)",'autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tipe_produk', 'Tipe Produk:')); ?>

                                        <?php echo e(Form::select('tipe_produk', ['Serial' => 'Serial', 'NonSerial' => 'NonSerial'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'tipe1','required'=>'required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_kategori', 'Kategori:')); ?>

                                        <?php echo e(Form::select('kode_kategori',$Kategori,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Kategori1','required'=>'required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_merek', 'Merek:')); ?>

                                        <?php echo e(Form::select('kode_merek', $Merek,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Merek1','required'=>'required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        <?php echo e(Form::select('kode_satuan', $Satuan,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Satuan1','required'=>'required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('partnumber', 'Part Number:')); ?>

                                        <?php echo e(Form::text('partnumber', null, ['class'=> 'form-control','id'=>'Part1', 'placeholder'=>'Part Number','required'=>'required','autocomplete'=>'off'])); ?>

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

                                        <?php echo e(Form::select('stat', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'stat1','required'=>'required'])); ?>

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

                </div>
            </div>
        </div>

        <div class="modal fade" id="ADD_SATUANKONVERSI" role="dialog">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Create Data</h4>
                </div>
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['id'=>'ADD_KONVERSI']); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Kode Produk', 'Produk:')); ?>

                                        <?php echo e(Form::select('kode_produk',$Produk,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','onchange'=>'satuan();','id'=>'kode_produk','required'=>'required'])); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan Terbesar:')); ?>

                                        <?php echo e(Form::select('kode_satuan', $Satuan,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder'=>'','onchange'=>'satuan2();','id'=>'Kode_Terbesar1','required'=>'required'])); ?>

                                    </div>
                                </div>

                                        <?php echo e(Form::hidden('satuan_terbesar',null, ['class'=> 'form-control','readonly','id'=>'Terbesar1'])); ?>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('nilai_konversi', 'Nilai Konversi:')); ?>

                                        <?php echo e(Form::text('nilai_konversi', null, ['class'=> 'form-control','id'=>'Nilai1', 'placeholder'=>'Nilai Konversi','onkeyup'=>'satuan2();', 'autocomplete'=>'off','required'=>'required','onkeypress'=>"return hanyaAngka(event,this)"])); ?>

                                    </div>
                                </div>

                                        <?php echo e(Form::hidden('kode_satuanterkecil', null, ['class'=> 'form-control','readonly','id'=>'Kode_Terkecil1'])); ?>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('satuan_terkecil', 'Satuan Terkecil:')); ?>

                                        <?php echo e(Form::text('satuan_terkecil', null, ['class'=> 'form-control','readonly','id'=>'Terkecil1', 'placeholder'=>'Satuan Terkecil'])); ?>

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

                </div>
            </div>
        </div>

    <div class="box box-success">
        <div class="box-body"> 
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-info">
                        <th>No Pemakaian</th>
                        <th>Produk</th>
                        <th>Part Number</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                     </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-info">
                            <th class="text-center" colspan="4">Total</th>
                            <th id="totalqty">-</th>
                            <th>-</th>
                            <th id="grandtotal">-</th>
                            <th>-</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
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
            startTime();
            $('.editform').hide();
            $('.addform').show();
            $('.back2Top').show();
        }

        function formatRupiah(angka, prefix='Rp'){
           
            var rupiah = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return rupiah;
           
        }
        
        $(function(){
        var no_pemakaian = $('#nopakai').val();

            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'http://localhost/gui_inventory_sub_laravel_off/admin/pemakaiandetail/getDatabyID?id='+no_pemakaian,
            data:{'no_pemakaian':no_pemakaian},
            footerCallback: function ( row, data, start, end, display ) {
                    var api = this.api(), data;
        
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
        
                    // Total over all pages
                    total = api
                        .column( 4 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
        
                    // Total over this page
                    grandTotal = api
                        .column( 6 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer
                    $( api.column( 4 ).footer() ).html(
                         total
                    );
                    $( api.column( 6 ).footer() ).html(
                        'Rp. '+formatRupiah(grandTotal) 
                    );
                },
            columns: [
                { data: 'no_pemakaian', name: 'no_pemakaian' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                { data: 'partnumber', name: 'partnumber' },
                { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
                { data: 'qty', name: 'qty' },
                { data: 'harga', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'subtotal', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
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

  </script>
  <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table=$('#data-table').DataTable({
                scrollY: true,
                scrollX: true,
            
            });

        function stock(){
            editpart();
            var kode_produk= $('#kode_produks').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('pemakaiandetail.stockproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                    },
                success: function(result) {
                        console.log(result);
                        if(result.stok < 1){
                            submit.disabled = true;
                        }else{
                            submit.disabled = false;
                        }
                        if (result.tipe == 'Serial' && result.kategori == 'UNIT'){
                            $('#QTY').val(1);
                            $('#Harga').val('');
                            $('#Stock').val('');
                            $('#Parts').val('');
                            document.getElementById('QTY').readOnly = true;
                            document.getElementById('Parts').required = true;
                        }else {
                            document.getElementById('QTY').readOnly = false;
                            document.getElementById('Parts').required = false;
                            $('#QTY').val('');   
                            $('#Harga').val(result.hpp);
                            $('#Stock').val(result.stok);
                        }
                    },
            });
        }

        function editpart(){
                    $('#Parts').prop("disabled", false);
                    var kode_produk = $("#kode_produks").val();
                    console.log(kode_produk);
                    
                    var token = $("input[name='_token']").val();
                    $.ajax({
                    url: "<?php echo route('pemakaiandetail.selectpart'); ?>",
                    method: 'POST',
                    data: {kode_produk:kode_produk, _token:token},
                    success: function(data) {
                        $("#Parts").html('');
                        // $("select[name='kode_satuan'").html(data.options);
                            $.each(data.options, function(key, value){

                                $('#Parts').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        }
                    });
        }

        function getharga(){
            var partnumber= $('#Parts').val();
            var kode_produk= $('#kode_produks').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('pemakaiandetail.getharga'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                        'part': partnumber,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Harga').val(result.hpp);
                        $('#Stock').val(result.stok);
                        if(result.stok < 1){
                            submit.disabled = true;
                        }else{
                            submit.disabled = false;
                        }
                    },
            });
        }

        function check(){
            var kode_produk= $('#kode_produks').val();
            var satuan = $('#Satuan').val();
            var stok = $('#Stock').val();
            var qty = $('#QTY').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('pemakaiandetail.qtycheck'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                        'satuan': satuan,
                        'stok': stok,
                        'qty': qty
                    },
                success: function(result) {
                        console.log(result);
                        if(result > stok){
                            submit.disabled = true;
                            swal("Gagal!", "Stok Tidak Cukup");
                        }else{
                            submit.disabled = false;
                        }
                    },
            });
        }

        function editpart(){
                    $('#Parts').prop("disabled", false);
                    var kode_produk = $("#kode_produks").val();
                    console.log(kode_produk);
                    
                    var token = $("input[name='_token']").val();
                    $.ajax({
                    url: "<?php echo route('pemakaiandetail.selectpart'); ?>",
                    method: 'POST',
                    data: {kode_produk:kode_produk, _token:token},
                    success: function(data) {
                        $("#Parts").html('');
                        // $("select[name='kode_satuan'").html(data.options);
                            $.each(data.options, function(key, value){

                                $('#Parts').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        }
                    });
        }


        function cek_qty2(){
            var kode_produk= $('#Produk_e').val();
            var qty = $('#QTY_e').val();

             $.ajax({
                url:'<?php echo route('pemakaiandetail.qtyproduk2'); ?>',
                type:'POST',
                data : {
                        'kode_produk': kode_produk,
                    },

                success: function(result) {
                        console.log(result);
                        var qty = $('#QTY_e').val();
                        if(result < qty){
                            submit2.disabled = true;
                            swal("Gagal!", "Stok Tidak Cukup");
                        }else{
                            submit2.disabled = false;
                        }
                    },
            });
        }


        function editsatuan(){
                    var kode_produk = $("#Produk_e").val();
                    console.log(kode_produk);
                    
                    var token = $("input[name='_token']").val();
                $.ajax({
                    url: "<?php echo route('pemakaiandetail.selectAjax'); ?>",
                    method: 'POST',
                    data: {kode_produk:kode_produk, _token:token},
                    success: function(data) {
                        $("#Satuan_e").html('');
                        // $("select[name='kode_satuan'").html(data.options);
                            $.each(data.options, function(key, value){

                                $('#Satuan_e').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        }
                    });
        }
        

        $("select[name='kode_produk']").change(function(){
            var kode_produk = $(this).val();
            // console.log(kode_produk);
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('pemakaiandetail.selectAjax'); ?>",
                method: 'POST',
                data: {kode_produk:kode_produk, _token:token},
                success: function(data) {
                    $("#Satuan").html('');
                    // $("select[name='kode_satuan'").html(data.options);
                    $.each(data.options, function(key, value){

                        $("#Satuan").append('<option value="'+ key +'">' + value + '</option>');

                    });
                }
            });
        });

        $('.select2').select2({
            placeholder: "Pilih",
            allowClear: true,
        });

        function tablefresh(){
                window.table.draw();
            } 

        function refreshTable() {
          $('#data2-table').DataTable().ajax.reload(null,false);
            // table.draw();
        }

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

        function satuan(){
            var kode_produk = $('#kode_produk').val();
            var kode = $('#Kode_Terbesar1').val();
            var nilai = $('#Nilai1').val();
            // var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('konversi.satuan_produk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                        'kode' : kode,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Kode_Terkecil1').val(result.kode_satuan);
                        $('#Terkecil1').val(result.satuan);
                        $('#Terbesar1').val(result.satuan_terbesar);
                    },
            });
        }

        function satuan2(){
            var kode = $('#Kode_Terbesar1').val();
            var kode2 = $('#Kode_Terkecil1').val();
            console.log(kode);
            // var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('konversi.satuan_produk2'); ?>',
                type:'POST',
                data : {
                        'kode' : kode,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Terbesar1').val(result.satuan_terbesar);

                        if(kode == kode2){
                            $('#Nilai1').val('1');
                            swal("Nilai Konversi Harus 1");
                        }
                    },
            });
        }



        $('#ADD_PRODUK').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var registerForm = $("#ADD_PRODUK");
            var formData = registerForm.serialize();

            // Check if empty of not
            
                $.ajax({
                    url:'<?php echo route('produk.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Nama_produk').val('');
                        $('#tipe1').val('').trigger('change');
                        $('#Kategori_produk').val('').trigger('change');
                        $('#Merek_produk').val('').trigger('change');
                        $('#Satuan_produk').val('').trigger('change');
                        $('#Part_produk').val('');
                        $('#Beli_produk').val('');
                        $('#Jual_produk').val('');
                        $('#HPP_produk').val('');
                        $('#Stok_produk').val('');
                        $('#Aktif_produk').val('');
                        $('#ADD_FORMPRODUK').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                            location.reload();
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
        });


        $('#ADD_KONVERSI').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var registerForm = $("#ADD_KONVERSI");
            var formData = registerForm.serialize();

            // Check if empty of not
                $.ajax({
                    url:'<?php echo route('konversi.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#kode_produk').val('').trigger('change');
                        $('#Kode_Terbesar1').val('').trigger('change');
                        $('#Nilai1').val('');
                        $('#Terkecil1').val('');
                        $('#ADD_SATUANKONVERSI').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                            location.reload();
                        } else {
                            swal("Gagal!", data.message, "error");
                        }   
                    },
                });           
        });


        $('#ADD_DETAIL').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var registerForm = $("#ADD_DETAIL");
            var formData = registerForm.serialize();

            // Check if empty of not
            $.ajax({
                    url:'<?php echo route('pemakaiandetail.check'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#kode_produks').val('').trigger('change');
                        $('#Satuan').val('').trigger('change');
                        $('#QTY').val('');
                        $('#Harga').val('');
                        $('#Stock').val('');
                        $('#Satuan_produk').val('');
                        
                        refreshTable();
                        // window.location.reload();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                            
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
            
        });


        $('#UPDATE_DETAIL').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            
            var registerForm = $("#UPDATE_DETAIL");
            var formData = registerForm.serialize();
            var id = $('#id').val();
            // Check if empty of not
                $.ajax({
                    url:'<?php echo route('pemakaiandetail.updateajax'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {

                        if(data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        }else{
                            swal("Gagal!", data.message, "error");
                        }
                        refreshTable();
                        $(".addform").show();
                        $(".editform").hide();
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
                        $('#ID').val(results.id);
                        $('#Pemakaian_e').val(results.no_pemakaian);
                        $('#Produk_e').val(results.kode_produk);
                        $('#Satuan_e').val(results.kode_satuan);
                        $('#QTY_e').val(results.qty);
                        $('#Harga_e').val(results.harga);
                        $(".addform").hide();
                        $("#Satuan_e").html('');
                        $(".editform").show();
                        },
                        error : function() {
                        alert("Nothing Data");
                    }
                });
               
        }

        function cancel_edit(){
            $(".addform").show();
            $("#Satuan_e").html('');
            $(".editform").hide();
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
                        refreshTable();
                            if (results.success === true) {
                                swal("Berhasil!", results.message, "success");
                                
                            } else {
                                swal("Gagal!", results.message, "error");
                            }
                        }
                });
            }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>