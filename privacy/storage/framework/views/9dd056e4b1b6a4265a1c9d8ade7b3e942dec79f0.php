<?php $__env->startSection('title', 'Penerimaan Detail'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Penerimaan <b><?php echo e($penerimaan->no_penerimaan); ?></b></font>
    </span>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-warning">
        <div class="box-body"> 
                <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id'=>'ADD_DETAIL']); ?>

                    <center><kbd>ADD FORM</kbd></center><br>
                        <div class="row">   

                                        <?php echo e(Form::hidden('no_pembelian',$penerimaan->no_pembelian, ['class'=> 'form-control','readonly','id'=>'pembelian'])); ?>

                                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Penerimaan', 'No Penerimaan:')); ?>

                                        <?php echo e(Form::text('no_penerimaan',$penerimaan->no_penerimaan, ['class'=> 'form-control','readonly','id'=>'noterima'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        <?php echo e(Form::select('kode_produk',$Produk->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','required'=>'required','onchange'=>'stock();','id'=>'kode_produk'])); ?>


                                        <?php echo e(Form::hidden('tipe_produk', null, ['class'=> 'form-control','readonly','id'=>'tipe_produk'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        <?php echo e(Form::text('kode_satuan',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','readonly','id'=>'Satuan'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('partnumber', 'Part Number:')); ?>

                                        <?php echo e(Form::text('partnumber',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'Part','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_mesin', 'No Mesin:')); ?>

                                        <?php echo e(Form::text('no_mesin',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'Mesin','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','required'=>'required',
                                         'id'=>'Qty','onkeyup'=>'check();','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Harga:')); ?>

                                        
                                        <?php echo e(Form::text('harga',null, ['class'=> 'form-control','required'=>'required','readonly',
                                         'id'=>'Harga'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('landedcost', 'Landed Cost:')); ?>

                                        
                                        <?php echo e(Form::text('landedcost',0, ['class'=> 'form-control','required'=>'required',
                                         'id'=>'Landed','autocomplete'=>'off'])); ?>

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

                                <?php echo e(Form::hidden('no_pembelian',$penerimaan->no_pembelian, ['class'=> 'form-control','readonly','id'=>'pembelian1'])); ?>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::hidden('id',null, ['class'=> 'form-control','readonly','id'=>'ID'])); ?>

                                        <?php echo e(Form::label('No Penerimaan', 'No Penerimaan:')); ?>

                                        <?php echo e(Form::text('no_penerimaan',$penerimaan->no_penerimaan, ['class'=> 'form-control','readonly','id'=>'Penerimaan'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        <?php echo e(Form::text('kode_produk', null, ['class'=> 'form-control','readonly','id'=>'Produk'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        <?php echo e(Form::select('kode_satuan',$Satuan,null, ['class'=> 'form-control','id'=>'Satuan2','disabled','readonly'])); ?>

                                    </div>
                                </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','id'=>'QTY','required'=>'required','onkeyup'=>"cek_qty2()",'autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'Harga:')); ?>

                                        <?php echo e(Form::text('harga',null, ['class'=> 'form-control','id'=>'Harga2','required'=>'required','readonly'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('landedcost', 'Landed Cost:')); ?>

                                        <?php echo e(Form::text('landedcost',null, ['class'=> 'form-control','id'=>'Landed2','required'=>'required','autocomplete'=>'off'])); ?>

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

    <div class="box box-warning">
        <div class="box-body">
            <div class="table-responsive"> 
                <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-info">
                        <th>No Penerimaan</th>
                        <th>Kode Produk</th>
                        <th>Produk</th>
                        <th>Tipe</th>
                        <th>Satuan</th>
                        <th>Part Number</th>
                        <th>No Mesin</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Landed Cost</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                     </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-info">
                            <th class="text-center" colspan="6">Total</th>
                            <th id="totalqty">-</th>
                            <th>-</th>
                            <th>-</th>
                            <th id="grandtotal">-</th>
                            <th>-</th>
                            <th>-</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i>PT. SELARAS UNGGUL BERSAMA</i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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
        var no_penerimaan = $('#noterima').val();

            $('#data2-table').DataTable({
            processing: true,
            serverSide: true,
            ajax:'http://localhost/gui_inventory_sub_laravel_trial/admin/penerimaandetail/getDatabyID?id='+no_penerimaan,
            data:{'no_penerimaan':no_penerimaan},
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
                        .column( 7 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
        
                    // Total over this page
                    grandTotal = api
                        .column( 10 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer
                    $( api.column( 7 ).footer() ).html(
                         total
                    );
                    $( api.column( 10 ).footer() ).html(
                        'Rp. '+formatRupiah(grandTotal) 
                    );
                },
            columns: [
                { data: 'no_penerimaan', name: 'no_penerimaan' },
                { data: 'produk.kode_produk', name: 'produk.kode_produk' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                { data: 'produk.tipe_produk', name: 'produk.tipe_produk' },
                { data: 'kode_satuan', name: 'kode_satuan' },
                { data: 'partnumber', name: 'partnumber' },
                { data: 'no_mesin', name: 'no_mesin' },
                { data: 'qty', name: 'qty' },
                { data: 'harga', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'landedcost', 
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

        $(function() {
            $('#data-table').DataTable({
                scrollY: true,
                scrollX: true,
            });
        });

        function stock(){
            var pembelian= $('#pembelian').val();
            var kode_produk= $('#kode_produk').val();

            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('penerimaandetail.qtyproduk'); ?>',
                type:'POST',
                data : {
                        'id': pembelian,
                        'kode_produk': kode_produk,
                    },

                success: function(result) {
                        console.log(result);
                        if (result.tipe == "Serial" && result.kategori == "UNIT"){
                            document.getElementById('Qty').readOnly = true;
                            document.getElementById('Mesin').readOnly = false;
                            document.getElementById('Part').readOnly = false;
                            $('#Qty').val(1);
                            $('#Harga').val(result.harga);
                            $('#Satuan').val(result.satuan);
                            $('#Part').val('');
                        }else {
                            document.getElementById('Qty').readOnly = false;
                            document.getElementById('Mesin').readOnly = true;
                            document.getElementById('Part').readOnly = true;
                            $('#Qty').val(result.qty);
                            $('#Harga').val(result.harga);
                            $('#Satuan').val(result.satuan);
                            $('#Part').val(result.partnumber);  
                            $('#Mesin').val('-');  
                        }
                    },
            });
        }

        function cek_qty2(){
            var pembelian= $('#pembelian1').val();
            var kode_produk= $('#Produk').val();
            var qty2 = $('#QTY').val();

             $.ajax({
                url:'<?php echo route('penerimaandetail.qtyproduk2'); ?>',
                type:'POST',
                data : {
                        'id': pembelian,
                        'kode_produk': kode_produk,
                    },

                success: function(result) {
                        console.log(result);
                        var qty2 = $('#QTY').val();

                        if(result.qty < qty2){
                            submit2.disabled = true;
                            swal("Gagal!", "Qty Penerimaan Tidak Boleh Melebihi Qty Pembelian");
                        }else{
                            submit2.disabled = false;
                        }
                    },
            });
        }

        $("select[name='kode_produk']").change(function(){
            var kode_produk = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('penerimaandetail.selectAjax'); ?>",
                method: 'POST',
                data: {kode_produk:kode_produk, _token:token},
                success: function(data) {
                    $("#Satuan").html('');
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
            var registerForm = $("#ADD_DETAIL");
            var formData = registerForm.serialize();

            // Check if empty of not
            $.ajax({
                    url:'<?php echo route('penerimaandetail.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#kode_produk').val('').trigger('change');
                        $('#Satuan').val('').trigger('change');
                        $('#Part').val('');
                        $('#Mesin').val('');
                        $('#Qty').val('').trigger('change');
                        $('#Harga').val('');
                        $('#Landed').val(0);            
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

        $('#ADD_DETAIL2').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var registerForm = $("#ADD_DETAIL2");
            var formData = registerForm.serialize();

            // Check if empty of not
            $.ajax({
                    url:'<?php echo route('penerimaandetail.store2'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Produks').val('');
                        $('#Parts').val('');
                        $('#Qtys').val('');
                        $('#Hargas').val('');
                        
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
                $.ajax({
                    url:'<?php echo route('penerimaandetail.updateajax'); ?>',
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



        function check(){
            var no_pembelian= $('#pembelian').val();
            var kode_produk= $('#kode_produk').val();
            var satuan = $('#Satuan').val();
            var qty = $('#Qty').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('penerimaandetail.qtycheck'); ?>',
                type:'POST',
                data : {
                        'no': no_pembelian,
                        'id': kode_produk,
                        'satuan': satuan,
                        'qty': qty
                    },
                success: function(result) {
                        console.log(result);
                        if(result < qty){
                            submit.disabled = true;
                            swal("Gagal!", "Qty Penerimaan Tidak Boleh Melebihi Qty Pembelian");
                        }else{
                            submit.disabled = false;
                        }
                    },
            });
        }


               
        function edit(id, url) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

               $.ajax({
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        $('#ID').val(results.id);
                        $('#Penerimaan').val(results.no_penerimaan);
                        $('#Produk').val(results.kode_produk);
                        $('#Satuan2').val(results.kode_satuan);
                        $('#QTY').val(results.qty);
                        $('#Harga2').val(results.harga);
                        $('#Landed2').val(results.landedcost);
                        $(".addform").hide();
                        $(".editform").show();
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

        function cancel_detail(){
            $(".addform").show();
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