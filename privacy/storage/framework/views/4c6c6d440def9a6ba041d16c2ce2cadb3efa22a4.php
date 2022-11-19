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
<body onLoad="panggil()">
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

                                        <!-- <?php echo e(Form::select('kode_produk',$Produk,null, ['class'=> 'form-control','readonly','id'=>'Produk','disabled'])); ?> -->
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
            
            <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-info">
                    <th>No Penerimaan</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Landed Cost</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                 </tr>
                </thead>
                <tfoot>
                    <tr class="bg-info">
                        <th class="text-center" colspan="3">Total</th>
                        <th id="totalqty">-</th>
                        <th>-</th>
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
        var no_penerimaan = $('#noterima').val();

            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            // ajax:'<?php echo route('pemakaiandetail.dataDetail'); ?>',
            ajax:'http://localhost/gui_inventory_depo_laravel/admin/penerimaandetail/getDatabyID?id='+no_penerimaan,
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
                        .column( 3 )
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
                    $( api.column( 3 ).footer() ).html(
                         total
                    );
                    $( api.column( 6 ).footer() ).html(
                        'Rp. '+formatRupiah(grandTotal) 
                    );
                },
            columns: [
                { data: 'no_penerimaan', name: 'no_penerimaan' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
                { data: 'qty', name: 'qty' },
                { data: 'harga', name: 'harga' },
                { data: 'landedcost', name: 'landedcost' },
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
                        $('#Qty').val(result.qty);
                        $('#Harga').val(result.harga);
                        $('#Satuan').val(result.satuan);
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
                    // $("select[name='kode_satuan'").html(data.options);
                    $.each(data.options, function(key, value){

                        $("#Satuan").append('<option value="'+ key +'">' + value + '</option>');

                    });
                }
            });
        });

        // function stock(){
        //     var kode_produk= $('#kode_produk').val();

        //     var submit = document.getElementById("submit");
        //     $.ajax({
        //         url:'<?php echo route('penerimaandetail.qtyproduk'); ?>',
        //         type:'POST',
        //         data : {
        //                 'id': kode_produk
        //             },
                    
        //         success: function(result) {
        //                 console.log(result);
        //                 $('#Qty').val(result.qty);
        //                 $('#Harga').val(result.harga);
        //             },
        //     });
        // }

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
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            // var name = $.trim($('#Nama_produk').val());
            var registerForm = $("#ADD_DETAIL");
            var formData = registerForm.serialize();

            // Check if empty of not
            $.ajax({
                    url:'<?php echo route('penerimaandetail.store'); ?>',
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
                        $('#Qty').val('').trigger('change');
                        $('#Harga').val('');
                        
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
            // var id = $('#id').val();
            // Check if empty of not
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
                        
                        // window.location.reload();
                        
                        // tablefresh()
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