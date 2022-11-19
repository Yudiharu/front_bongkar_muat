<?php $__env->startSection('title', 'Adjustment Detail'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Adjustment <b><?php echo e($adjustment->no_penyesuaian); ?></b></font>
    </span>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-info">
        <div class="box-body"> 
                <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id'=>'ADD_DETAIL']); ?>

                    <center><kbd>ADD FORM</kbd></center><br>
                        <div class="row">   
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_penyesuaian', 'No Adjustment:')); ?>

                                        <?php echo e(Form::text('no_penyesuaian',$adjustment->no_penyesuaian, ['class'=> 'form-control','readonly','id'=>'noadj'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
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
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        <?php echo e(Form::select('kode_satuan', [],null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','required'=>'required','id'=>'Satuan'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('qty_stock', 'Ending Stock:')); ?>

                                            <?php echo e(Form::text('qty_stock', null, ['class'=> 'form-control','readonly','id'=>'Stock'])); ?>

                                        </div>
                                </div>

                                <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('amount', 'Ending Amount:')); ?>

                                            <?php echo e(Form::text('amount', null, ['class'=> 'form-control','readonly','id'=>'Amount'])); ?>

                                        </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('hpp', 'HPP:')); ?>

                                        <?php echo e(Form::number('hpp',null, ['class'=> 'form-control','id'=>'Harga','readonly'])); ?>

                                    </div>
                                </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'Qty Adjustment:')); ?>

                                        <?php echo e(Form::number('qty', null, ['class'=>'form-control','required'=>'required','id'=>'QTY','autocomplete'=>'off','onkeyup'=>"check()"])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Harga Adjustment:')); ?>

                                        <?php echo e(Form::number('harga', null, ['class'=>'form-control','required'=>'required','id'=>'hpp','autocomplete'=>'off'])); ?>

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
                                    <?php echo e(Form::label('no_penyesuaian', 'No Adjustment:')); ?>

                                    <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'ID'])); ?>

                                    <?php echo e(Form::text('no_penyesuaian',$adjustment->no_penyesuaian, ['class'=> 'form-control','readonly','id'=>'Adjustment_e'])); ?>

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
                                    <?php echo e(Form::label('qty', 'Qty Adjustment:')); ?>

                                    <?php echo e(Form::text('qty', null, ['class'=> 'form-control','id'=>'QTY_e','required'=>'required','onkeyup'=>"cek_qty2()",'autocomplete'=>'off'])); ?>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('harga', 'Harga Adjustment:')); ?>

                                    <?php echo e(Form::text('harga',null, ['class'=> 'form-control','id'=>'Harga_e','required'=>'required'])); ?>

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

    <div class="box box-info">
        <div class="box-body"> 
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-info">
                        <th>No Adjustment</th>
                        <th>Produk</th>
                        <th>Part Number</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                     </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr class="bg-info">
                            <th class="text-center" colspan="4">Total</th>
                            <th id="totalqty">-</th>
                            <th>-</th>
                            <th>-</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>

    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i><?php echo e($nama_company); ?></i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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
        var no_penyesuaian = $('#noadj').val();

            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'http://localhost/gui_inventory_laravel/admin/adjustmentdetail/getDatabyID?id='+no_penyesuaian,
            data:{'no_penyesuaian':no_penyesuaian},
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
                    // $( api.column( 3 ).footer() ).html(
                    //      total
                    // );
                    $( api.column( 5 ).footer() ).html(
                        'Rp. '+formatRupiah(grandTotal) 
                    );
                },
            columns: [
                { data: 'no_penyesuaian', name: 'no_penyesuaian' },
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
                url:'<?php echo route('adjustmentdetail.stockproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                    },
                success: function(result) {
                        console.log(result);
                        if (result.tipe == 'Serial'){
                            if(result.kategori == 'UNIT' || result.kategori == 'BAN'){
                                $('#QTY').val('');
                                $('#Harga').val('');
                                $('#hpp').val('');
                                $('#Stock').val('');
                                $('#Amount').val('');
                                $('#Parts').val('');
                                document.getElementById('QTY').readOnly = false;
                                document.getElementById('Parts').required = true;
                            }
                            else{
                                document.getElementById('QTY').readOnly = false;
                                document.getElementById('Parts').required = true;
                                $('#QTY').val('');   
                                $('#hpp').val('');
                                $('#Harga').val(result.hpp);
                                $('#Stock').val(result.stok);
                                $('#Amount').val(result.amount);
                            }
                        }else {
                            document.getElementById('QTY').readOnly = false;
                            document.getElementById('Parts').required = true;
                            $('#QTY').val('');   
                            $('#hpp').val('');
                            $('#Harga').val(result.hpp);
                            $('#Stock').val(result.stok);
                            $('#Amount').val(result.amount);
                        }
                    },
            });
        }

        function check(){
            var qty = $('#QTY').val();
            if(qty > 1){
                submit.disabled = true;
                swal("Gagal!", "QTY Produk Serial UNIT / BAN tidak boleh lebih dari 1");
            }else{
                submit.disabled = false;
            }
        }

        function check(){
            var kode_produk= $('#kode_produks').val();
            var qty = $('#QTY').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('adjustmentdetail.qtycheck'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                    },
                success: function(result) {
                        console.log(result);
                        if(result.tipe == 'Serial'){
                            if(result.kategori == 'BAN' || result.kategori == 'UNIT'){
                                if(qty > 1){
                                    submit.disabled = true;
                                    swal("Gagal!", "QTY Produk Serial UNIT / BAN tidak boleh lebih dari 1");
                                }else{
                                    submit.disabled = false;
                                }
                            }else{
                                submit.disabled = false;
                            }
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
                    url: "<?php echo route('adjustmentdetail.selectpart'); ?>",
                    method: 'POST',
                    data: {kode_produk:kode_produk, _token:token},
                    success: function(data) {
                        $("#Parts").html('');
                        // $("select[name='kode_satuan'").html(data.options);
                            $.each(data.options, function(key, value){

                                $('#Parts').val('');
                                $('#Parts').append('<option value="'+ key +'">' + value + '</option>');
                                $('#Parts').val('');

                            });
                        }
                    });
        }

        function getharga(){
            var partnumber= $('#Parts').val();
            var kode_produk= $('#kode_produks').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('adjustmentdetail.getharga'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                        'part': partnumber,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Harga').val(result.hpp);
                        $('#Amount').val(result.ending_amount);
                        $('#Stock').val(result.stok);
                    },
            });
        }

        function editpart(){
                    $('#Parts').prop("disabled", false);
                    var kode_produk = $("#kode_produks").val();
                    console.log(kode_produk);
                    
                    var token = $("input[name='_token']").val();
                    $.ajax({
                    url: "<?php echo route('adjustmentdetail.selectpart'); ?>",
                    method: 'POST',
                    data: {kode_produk:kode_produk, _token:token},
                    success: function(data) {
                        $("#Parts").html('');
                        // $("select[name='kode_satuan'").html(data.options);
                            $.each(data.options, function(key, value){
                                
                                $('#Parts').val('');
                                $('#Parts').append('<option value="'+ key +'">' + value + '</option>');
                                $('#Parts').val('');

                            });
                        }
                    });
        }

        function editsatuan(){
                    var kode_produk = $("#Produk_e").val();
                    console.log(kode_produk);
                    
                    var token = $("input[name='_token']").val();
                $.ajax({
                    url: "<?php echo route('adjustmentdetail.selectAjax'); ?>",
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
                url: "<?php echo route('adjustmentdetail.selectAjax'); ?>",
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
                    url:'<?php echo route('adjustmentdetail.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#kode_produks').val('').trigger('change');
                        $('#Satuan').val('').trigger('change');
                        $('#QTY').val('');
                        $('#Harga').val('');
                        $('#Stock').val('');
                        $('#hpp').val('');
                        $('#Amount').val('');
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
                    url:'<?php echo route('adjustmentdetail.updateajax'); ?>',
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
                        $('#Adjustment_e').val(results.no_penyesuaian);
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