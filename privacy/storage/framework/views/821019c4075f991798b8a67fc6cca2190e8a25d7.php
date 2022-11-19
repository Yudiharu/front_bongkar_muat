<?php $__env->startSection('title', 'Penjualan Detail'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Penjualan <b><?php echo e($penjualan->no_penjualan); ?></b></font>
    </span>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="panggil()">
    
    
    <div class="box box-info">
        <div class="box-body"> 
                <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id'=>'ADD_DETAIL']); ?>

                    <center><kbd>ADD FORM</kbd></center><br>
                        <div class="row">   
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Penjualan', 'No Penjualan:')); ?>

                                        <?php echo e(Form::text('no_penjualan',$penjualan->no_penjualan, ['class'=> 'form-control','readonly','id'=>'nopenjualan'])); ?>

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

                                        <?php echo e(Form::select('partnumber',[], null, ['class'=> 'form-control select2','id'=>'Parts','required'=>'required','style'=>'width: 100%','placeholder' => '','disabled','onchange'=>'getharga();'])); ?>

                                    </div>
                                </div>
                              
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_mesin', 'No Mesin:')); ?>

                                        <?php echo e(Form::text('no_mesin', null, ['class'=> 'form-control','id'=>'mesin','style'=>'width: 100%','placeholder' => '','readonly'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
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
                                        <?php echo e(Form::label('harga_jual', 'Harga Jual:')); ?>

                                        <?php echo e(Form::number('harga_jual',null, ['class'=> 'form-control','id'=>'Harga'])); ?>

                                    </div>
                                </div>

                                <!-- <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Hpp:')); ?>

                                        <?php echo e(Form::text('harga',null, ['class'=> 'form-control','id'=>'Hpp','required'=>'required','readonly'])); ?>

                                    </div>
                                </div> -->
                                <?php echo e(Form::hidden('harga',null, ['class'=> 'form-control','readonly','id'=>'Hpp'])); ?>


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
                                    <?php echo e(Form::label('no_penjualan', 'No Penjualan:')); ?>

                                    <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'ID'])); ?>

                                    <?php echo e(Form::text('no_penjualan',$penjualan->no_penjualan, ['class'=> 'form-control','readonly','id'=>'Penjualan_e'])); ?>

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

                                    <?php echo e(Form::text('qty', null, ['class'=> 'form-control','id'=>'QTY_e','required'=>'required','onkeyup'=>"cek_qty2()",'autocomplete'=>'off','readonly'])); ?>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('harga_jual', 'Harga Jual:')); ?>

                                    <?php echo e(Form::text('harga_jual',null, ['class'=> 'form-control','id'=>'Harga_e','required'=>'required'])); ?>

                                </div>
                            </div>

                            <!-- <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('harga', 'Hpp:')); ?>

                                    <?php echo e(Form::text('harga',null, ['class'=> 'form-control','id'=>'Hpp_e','required'=>'required','readonly'])); ?>

                                </div>
                            </div> -->

                                <?php echo e(Form::hidden('harga',null, ['class'=> 'form-control','readonly','id'=>'Hpp_e'])); ?>


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
            <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-info">
                    <th>No Penjualan</th>
                    <th>Produk</th>
                    <th>Part Number</th>
                    <th>No Mesin</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                 </tr>
                </thead>
                <tfoot>
                    <tr class="bg-info">
                        <th class="text-center" colspan="5">Total</th>
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
        
        $(function(){
        var no_penjualan = $('#nopenjualan').val();

            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            // ajax:'<?php echo route('pemakaiandetail.dataDetail'); ?>',
            ajax:'http://localhost/gui_inventory_sub_laravel/admin/penjualandetail/getDatabyID?id='+no_penjualan,
            data:{'no_penjualan':no_penjualan},
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
                        .column( 5 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
        
                    // Total over this page
                    grandTotal = api
                        .column( 7 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer
                    $( api.column( 5 ).footer() ).html(
                         total
                    );
                    $( api.column( 7 ).footer() ).html(
                        'Rp. '+formatRupiah(grandTotal) 
                    );
                },
            columns: [
                { data: 'no_penjualan', name: 'no_penjualan' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                { data: 'partnumber', name: 'partnumber' },
                { data: 'no_mesin', name: 'no_mesin' },
                { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
                { data: 'qty', name: 'qty' },
                { data: 'harga_jual', name: 'harga_jual' },
                { data: 'subtotal', name: 'subtotal' },
                { data: 'action', name: 'action' }
            ]
            
            });
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
            $('.addform').show();
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
            editpart();
            var kode_produk= $('#kode_produks').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('penjualandetail.stockproduk'); ?>',
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
                        if (result.tipe == 'Serial' && result.tipe == 'UNIT'){
                            $('#QTY').val(1);
                            $('#Hpp').val('');
                            $('#Stock').val('');
                            document.getElementById('QTY').readOnly = true;
                        }else if(result.tipe == 'Serial' && result.tipe != 'UNIT'){
                            $('#QTY').val('');   
                            $('#Hpp').val(result.hpp);
                            $('#Stock').val(result.stok);
                        }
                        else{
                            document.getElementById('QTY').readOnly = false;
                            $('#QTY').val('');   
                            $('#Hpp').val(result.hpp);
                            $('#Stock').val(result.stok);
                        }
                        // $('#Satuan').val(result.satuan);
                    },
            });
        }

        function editpart(){
                    $('#Parts').prop("disabled", false);
                    var kode_produk = $("#kode_produks").val();
                    console.log(kode_produk);
                    
                    var token = $("input[name='_token']").val();
                    $.ajax({
                    url: "<?php echo route('penjualandetail.selectpart'); ?>",
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
                url:'<?php echo route('penjualandetail.getharga'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                        'part': partnumber,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Hpp').val(result.hpp);
                        $('#Stock').val(result.stok);
                        $('#mesin').val(result.no_mesin);
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
                url:'<?php echo route('penjualandetail.qtycheck'); ?>',
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


        function cek_qty2(){
            var kode_produk= $('#Produk_e').val();
            var qty = $('#QTY_e').val();

             $.ajax({
                url:'<?php echo route('penjualandetail.qtyproduk2'); ?>',
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
                    url: "<?php echo route('penjualandetail.selectAjax'); ?>",
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
                url: "<?php echo route('penjualandetail.selectAjax'); ?>",
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
                        $('#Terbesar1').val(result.kode_satuan);

                        if(kode == kode2){
                            $('#Nilai1').val('1');
                            swal("Nilai Konversi Harus 1");
                        }
                    },
            });
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
            var name = $.trim($('#Nama_produk').val());
           
            var registerForm = $("#ADD_DETAIL");
            var formData = registerForm.serialize();

            // Check if empty of not
            $.ajax({
                    url:'<?php echo route('penjualandetail.store'); ?>',
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
                        $('#kode_produks').val('').trigger('change');
                        $('#Satuan').val('').trigger('change');
                        $('#Parts').val('').trigger('change');
                        $('#mesin').val('').trigger('change');
                        $('#QTY').val('');
                        $('#Harga').val('');
                        $('#Hpp').val('');
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
                    url:'<?php echo route('penjualandetail.updateajax'); ?>',
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
                        $('#ID').val(results.id);
                        $('#Penjualan_e').val(results.no_penjualan);
                        $('#Produk_e').val(results.kode_produk);
                        $('#Satuan_e').val(results.kode_satuan);
                        $('#QTY_e').val(results.qty);
                        $('#Harga_e').val(results.harga);
                        $('#Hpp_e').val(results.hpp);
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