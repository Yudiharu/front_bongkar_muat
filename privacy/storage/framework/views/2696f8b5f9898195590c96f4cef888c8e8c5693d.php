<?php $__env->startSection('title', 'Pembelian Detail'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Pembelian <b><?php echo e($pembelian->no_pembelian); ?></b></font>
    </span>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="panggil()">
    <div class="box box-danger">
        <div class="box-body"> 
            <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id'=>'ADD_DETAIL']); ?>

                    <!--  -->
                      <center><kbd>ADD FORM</kbd></center><br>
                        <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Penerimaan', 'No Pembelian:')); ?>

                                        <?php echo e(Form::text('no_pembelian',$pembelian->no_pembelian, ['class'=> 'form-control','readonly','id'=>'nobeli'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Penerimaan', 'Jenis:')); ?>

                                        <?php echo e(Form::text('jenis_po',$pembelian->jenis_po, ['class'=> 'form-control','readonly','id'=>'jenispo'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" title="Add New Produk" data-target="#ADD_FORMPRODUK" id="button_add2"><i class="fa fa-plus"></i></button> 

                                        <!-- <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" title="Add New Jasa / Non-Stock" data-target="#ADD_FORMJASA" id="button_add3"><i class="fa fa-plus"></i></button>  -->
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        <!--  -->
                                        <?php echo e(Form::select('kode_produk',$Produk->sort(),null,
                                         ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','required'=>'required','onchange'=>'stock();',
                                         'id'=>'kode_produk'])); ?>

                                    </div>
                                </div>

                              <!--    -->

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" title="Add Satuan Konversi" data-target="#ADD_SATUANKONVERSI", id="button_add"><i class="fa fa-plus"></i></button>
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        <?php echo e(Form::select('kode_satuan',['-'],null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','required'=>'required','id'=>'Satuan'])); ?>

                                    </div>
                                </div>  

                               <!--  -->

                                <!--  -->

                                <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('qty', 'Stock:')); ?>

                                            <?php echo e(Form::text('qty_stock', null, ['class'=> 'form-control','readonly','id'=>'Stock'])); ?>

                                        </div>
                                    </div>
                    
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','required'=>'required','id'=>'QTY','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Harga:')); ?>

                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" title="Edit Harga" onclick="editharga()" id='submit3'><i class="fa fa-edit"></i></button>
                                        
                                        <?php echo e(Form::text('harga',null, ['class'=> 'form-control','required'=>'required','id'=>'HPP','autocomplete'=>'off','readonly'])); ?>

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
                                        <?php echo e(Form::hidden('id',null, ['class'=> 'form-control','readonly','id'=>'ID'])); ?>

                                        <?php echo e(Form::label('No  Pembelian', 'No Pembelian:')); ?>

                                        <?php echo e(Form::text('no_pembelian',$pembelian->no_pembelian, ['class'=> 'form-control','readonly','id'=>'Penerimaan'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        
                                        <?php echo e(Form::text('kode_produk',null, ['class'=> 'form-control','readonly','id'=>'Produk'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                       <!--   -->
                                        <?php echo e(Form::text('kode_satuan',null, ['class'=> 'form-control','id'=>'Satuan2','readonly'])); ?>

                                    </div>
                                </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','id'=>'QTY2','required'=>'required','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Harga:')); ?>

                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" title="Edit Harga" onclick="editharga2()" id='submit4'><i class="fa fa-edit"></i></button>
                                        
                                        <?php echo e(Form::text('harga',null, ['class'=> 'form-control','id'=>'Harga','required'=>'required','readonly','autocomplete'=>'off'])); ?>

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

                                        <?php echo e(Form::select('kode_produk',$Produk,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','onchange'=>'satuan();','id'=>'kode_produk1','required'=>'required'])); ?>

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


   <div class="box box-danger">
        <div class="box-body">
            <!--  -->
            <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-info">
                    <th>No Pembelian</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total Transaksi</th>
                    <th>Action</th>
                 </tr>
                </thead>
                <tfoot>
                    <tr class="bg-info">
                        <th class="text-center" colspan="3">Total</th>
                        <th id="totalqty">-</th>
                        <th>-</th>
                        <th id="grandtotal">-</th>
                        <th>-</th>
                    </tr>
                </tfoot>
            </table>
            
        
    </div>
</div>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <script>
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
        
        $(function(){
        var no_pembelian = $('#nobeli').val();
        var jenispo = $('#jenispo').val();  
        if(jenispo == 'Stock'){
            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            // ajax:'<?php echo route('pemakaiandetail.dataDetail'); ?>',
            ajax:'http://localhost/gui_inventory_depo_laravel/admin/pembeliandetail/getDatabyID?id='+no_pembelian,
            data:{'no_pembelian':no_pembelian},
            footerCallback: function ( row, data, start, end, display ) {
                    var api = this.api(), data;
        
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
        
                    // Total over all pages
                    total = api
                        .column( 3 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
        
                    // Total over this page
                    grandTotal = api
                        .column( 5 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer
                    $( api.column( 3 ).footer() ).html(
                         total
                    );
                    $( api.column( 5 ).footer() ).html(
                        'Rp. '+formatRupiah(grandTotal)
                    );
                },

            columns: [
                { data: 'no_pembelian', name: 'no_pembelian' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
                { data: 'qty', name: 'qty' },
                { data: 'harga', name: 'harga' },
                { data: 'total_transaksi', name: 'total_transaksi' },
                { data: 'action', name: 'action' },
            ]
            
            });
        }
        else if(jenispo == 'Jasa'){
            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            // ajax:'<?php echo route('pemakaiandetail.dataDetail'); ?>',
            ajax:'http://localhost/gui_inventory_depo_laravel/admin/pembeliandetail/getDatabyID?id='+no_pembelian,
            data:{'no_pembelian':no_pembelian},
            footerCallback: function ( row, data, start, end, display ) {
                    var api = this.api(), data;
        
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
        
                    // Total over all pages
                    total = api
                        .column( 3 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
        
                    // Total over this page
                    grandTotal = api
                        .column( 5 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer
                    $( api.column( 3 ).footer() ).html(
                         total
                    );
                    $( api.column( 5 ).footer() ).html(
                        'Rp. '+grandTotal 
                    );
                },

            columns: [
                { data: 'no_pembelian', name: 'no_pembelian' },
                { data: 'jasa.nama_item', name: 'jasa.nama_item' },
                { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
                { data: 'qty', name: 'qty' },
                { data: 'harga', name: 'harga' },
                { data: 'total_transaksi', name: 'total_transaksi' },
                { data: 'action', name: 'action' },
            ]
            
            });
        }
        else{
            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            // ajax:'<?php echo route('pemakaiandetail.dataDetail'); ?>',
            ajax:'http://localhost/gui_inventory_depo_laravel/admin/pembeliandetail/getDatabyID?id='+no_pembelian,
            data:{'no_pembelian':no_pembelian},
            footerCallback: function ( row, data, start, end, display ) {
                    var api = this.api(), data;
        
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
        
                    // Total over all pages
                    total = api
                        .column( 3 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
        
                    // Total over this page
                    grandTotal = api
                        .column( 5 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer
                    $( api.column( 3 ).footer() ).html(
                         total
                    );
                    $( api.column( 5 ).footer() ).html(
                        'Rp. '+grandTotal 
                    );
                },

            columns: [
                { data: 'no_pembelian', name: 'no_pembelian' },
                { data: 'nonstock.nama_item', name: 'nonstock.nama_item' },
                { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
                { data: 'qty', name: 'qty' },
                { data: 'harga', name: 'harga' },
                { data: 'total_transaksi', name: 'total_transaksi' },
                { data: 'action', name: 'action' },
            ]
            
            });
        }
    });
        
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load(){
            $('.editform').hide();

            var jenispo = $('#jenispo').val();  
            if(jenispo != 'Stock'){
                $("#button_add").hide();
                $("#button_add3").show();
                $("#button_add2").hide();
            }else{
                $("#button_add3").hide();
            }
        }
        
        function panggil(){
            load();
            startTime();
        }


        var table=$('#data-table').DataTable({
                scrollY: true,
                scrollX: true,
            
            });
        
        
        function stock(){
            var kode_produk= $('#kode_produk').val();
            var no_pembelian= $('#nobeli').val();
            $.ajax({
                url:'<?php echo route('pembeliandetail.stockproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                        'no': no_pembelian
                    },
                success: function(result) {
                        console.log(result);
                        $('#Stock').val(result.stock);
                        $('#HPP').val(result.harga_beli);
                        $('#Satuan').val(result.satuan);
                    },
            });
        }

        function editharga(){
            swal("Perhatian!", "Jika Anda ingin merubah harga beli, pastikan harga baru yang Anda input adalah benar.");
            $("#HPP").prop('readonly', false);
        }

        function editharga2(){
            swal("Perhatian!", "Jika Anda ingin merubah harga beli, pastikan harga baru yang Anda input adalah benar.");
            $("#Harga").prop('readonly', false);
        }

        $("select[name='kode_produk']").change(function(){
            var kode_produk = $(this).val();
            var no_pembelian= $('#nobeli').val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('pembeliandetail.selectAjax'); ?>",
                method: 'POST',
                data: {
                        kode_produk:kode_produk, _token:token,
                        'no': no_pembelian
                    },
                success: function(data) {
                    $("#Satuan").html('');
                    // $("select[name='kode_satuan'").html(data.options);
                    $.each(data.options, function(key, value){

                        $("#Satuan").append('<option value="'+ key +'">' + value + '</option>');

                    });
                }
            });
        });

        function pilih1() {
             $('#Satuan2').val('');
        }

        function pilih2() {
             $('#Satuan1').val('');
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
            var kode_produk = $('#kode_produk1').val();
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
                        $('#Terbesar1').val(result.kode_satuan);

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
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            var name = $.trim($('#Nama_produk').val());
            var kategori = $.trim($('#Kategori_produk').val());
            var merek = $.trim($('#Merek_produk').val());
            // var ukuran = $.trim($('#Ukuran1').val());
            var satuan = $.trim($('#Satuan_produk').val());
            var part = $.trim($('#Part_produk').val());
            // var company = $.trim($('#Company1').val());
            // var type = $.trim($('#Type1').val());
            var beli = $.trim($('#Beli_produk').val());
            var jual = $.trim($('#Jual_produk').val());
            var hpp = $.trim($('#HPP_produk').val());
            var stok = $.trim($('#Stok_produk').val());
            var status = $.trim($('#Aktif_produk').val());
            var registerForm = $("#ADD_PRODUK");
            var formData = registerForm.serialize();

            // Check if empty of not
            
                $.ajax({
                    url:'<?php echo route('produk.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#Nama_produk').val('');
                        $('#Kategori_produk').val('').trigger('change');
                        $('#Merek_produk').val('').trigger('change');
                        // $('#Ukuran1').val('');
                        $('#Satuan_produk').val('').trigger('change');
                        $('#Part_produk').val('');
                        // $('#Company1').val('');
                        // $('#Type1').val('');
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

        $('#ADD_JASA').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            var name = $.trim($('#Jenis1').val());
            var name = $.trim($('#Nama1').val());
            var ket = $.trim($('#Nama2').val());
            var registerForm = $("#ADD_JASA");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('jasa.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#Jenis1').val('').trigger('change');
                        $('#Nama1').val('');
                        $('#Nama2').val('');
                        $('#Satuan1').val('').trigger('change');
                        $( '.kode-error' ).html('');
                        $( '.name-error' ).html('');
                        $('#ADD_FORMJASA').modal('hide');
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
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            var produk = $.trim($('#kode_produk').val());
            var terbesar = $.trim($('#Terbesar1').val());
            var nilai = $.trim($('#Nilai1').val());
            var terkecil = $.trim($('#Terkecil1').val());
            var registerForm = $("#ADD_KONVERSI");
            var formData = registerForm.serialize();

            // Check if empty of not
                $.ajax({
                    url:'<?php echo route('konversi.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#kode_produk').val('').trigger('change');
                        $('#Kode_Terbesar1').val('').trigger('change');
                        $('#Nilai1').val('');
                        $('#Terkecil1').val('');
                        $('#ADD_SATUANKONVERSI').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }   
                    },
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

        function tablefresh(){
                window.table.draw();
            } 

        function refreshTable() {
             $('#data2-table').DataTable().ajax.reload(null,false);;
        }

        $('#ADD_DETAIL').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            // var name = $.trim($('#Nama_produk').val());
            var registerForm = $("#ADD_DETAIL");
            var formData = registerForm.serialize();

            // Check if empty of not
            $.ajax({
                    url:'<?php echo route('pembeliandetail.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#kode_produks')
                        //     .find('option selected')
                        //     .end()
                        //     .append('')
                        //     .val(null)
                        // ;
                        $('#kode_produk').val('').trigger('change');
                        $('#Satuan').val('').trigger('change');
                        $('#Stock').val('');
                        $('#QTY').val('');
                        $('#HPP').val('');
                        
                        refreshTable();
                        // window.location.reload();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                            $("#HPP").prop('readonly', true);
                        } else {
                            swal("Gagal!", data.message, "error");
                            $("#HPP").prop('readonly', true);
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
            // var id = $('#id').val();
            // Check if empty of not
                $.ajax({
                    url:'<?php echo route('pembeliandetail.updateajax'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        $('#QTY2').val('');
                        $('#QTY').val('');

                        if(data.success === true) {
                            swal("Berhasil!", data.message, "success");
                            $("#Harga").prop('readonly', true);
                        }else{
                            swal("Gagal!", data.message, "error");
                            $("#Harga").prop('readonly', true);
                        }
                        refreshTable();
                        $(".addform").show();
                        $(".editform").hide();
                        
                        // window.location.reload();
                        
                        // tablefresh()
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
                        $(".editform").show();
                        $('#Pembelian').val(results.no_pembelian);
                        $('#Produk').val(results.kode_produk);
                        $('#Satuan2').val(results.kode_satuan);
                        $('#QTY2').val(results.qty);
                        $('#Harga').val(results.harga);
                        $('#ID').val(results.id);
                        $(".addform").hide();
                        
                        // $('#form2').attr('action', "admin/penerimaandetail/dataBaru");
                       },
                        error : function() {
                        alert("Nothing Data");
                    }
                });
                     
        }

        function cancel_edit(){
            $(".addform").show();
            $(".editform").hide();
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

    <script>
        function update(){
            var result = confirm("Want to Update?");
            if (result) {
                // console.log(id)
                $.ajax({
                    type: 'GET',
                    url: <?php echo route('penerimaandetail.baru'); ?>,
                    data: $('form2').serialize(),
                    success: function(result) {
                        console.log(result);
                        alert('Data Berhasil Di Update');
                        location.reload(true);
                    }
                });
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>