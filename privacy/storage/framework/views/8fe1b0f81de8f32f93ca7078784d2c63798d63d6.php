<?php $__env->startSection('title', 'Pembelian Detail'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Pembelian <b><?php echo e($pembelian->no_pembelian); ?></b></font>
    </span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
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
                                <div class="col-md-2">
                                    <div class="form-group">
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

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','required'=>'required','id'=>'QTY'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Harga:')); ?>

                                        
                                        <?php echo e(Form::text('harga',null, ['class'=> 'form-control','required'=>'required','id'=>'HPP'])); ?>

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

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','id'=>'QTY2','required'=>'required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Harga:')); ?>

                                        
                                        <?php echo e(Form::text('harga',null, ['class'=> 'form-control','id'=>'Harga','required'=>'required'])); ?>

                                    </div>
                                </div>

                                
                            </div> 
                            <div class="row-md-2">
                                    <span class="pull-right"> 
                                            <?php echo e(Form::submit('Update', ['class' => 'btn btn-success btn-sm'])); ?>

                                            <button type="button" class="btn btn-danger btn-sm" onclick="cancel_edit()">Cancel</button>&nbsp;
                                    </span>
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
                <tr class="bg-danger">
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
                    <tr class="bg-gray">
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
        $(function(){
        var no_pembelian = $('#nobeli').val();
        var jenispo = $('#jenispo').val();  
        if(jenispo == 'Stock'){
            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            // ajax:'<?php echo route('pemakaiandetail.dataDetail'); ?>',
            ajax:'http://localhost/gui_inventory_gut_laravel/admin/pembeliandetail/getDatabyID?id='+no_pembelian,
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
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
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
            ajax:'http://localhost/gui_inventory_gut_laravel/admin/pembeliandetail/getDatabyID?id='+no_pembelian,
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

        // function stock(){
        //     var kode_produk= $('#kode_produk').val();
        //     $.ajax({
        //         url:'<?php echo route('pembeliandetail.satuankonversi'); ?>',
        //         type:'POST',
        //         data : {
        //                 'id': kode_produk
        //             },
        //         success: function(result) {
        //                 console.log(result);
        //                 $('#Stock').val(result.stock);
        //                 $('#HPP').val(result.harga_beli);
        //                 $('#Satuan2').val(result.konversi);
        //             },
        //     });
        // }

        function pilih1() {
             $('#Satuan2').val('');
        }

        function pilih2() {
             $('#Satuan1').val('');
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

        function tablefresh(){
                window.table.draw();
            } 

        function refreshTable() {
             $('#data2-table').DataTable().ajax.reload(null,false);;
        }

        $('#ADD_DETAIL').submit(function (e) {
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
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
            
        });

        $('#UPDATE_DETAIL').submit(function (e) {
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

                        if(data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        }else{
                            swal("Gagal!", data.message, "error");
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