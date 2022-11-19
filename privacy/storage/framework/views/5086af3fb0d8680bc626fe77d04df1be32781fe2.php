<?php $__env->startSection('title', 'Penerimaan Detail'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Penerimaan <b><?php echo e($penerimaan->no_penerimaan); ?></b></font>
    </span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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

                                        
                                        <?php echo e(Form::select('kode_produk',$Produk->sort(),null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','required'=>'required','onchange'=>'stock();','id'=>'kode_produk'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        <?php echo e(Form::select('kode_satuan', ['-'],null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','readonly','id'=>'Satuan'])); ?>

                                    </div>
                                </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','required'=>'required',
                                         'id'=>'Qty'])); ?>

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
                                         'id'=>'Landed'])); ?>

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

                                        <?php echo e(Form::label('No Penerimaan', 'No Penerimaan:')); ?>

                                        <?php echo e(Form::text('no_penerimaan',$penerimaan->no_penerimaan, ['class'=> 'form-control','readonly','id'=>'Penerimaan'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        
                                        <?php echo e(Form::select('kode_produk',$Produk,null, ['class'=> 'form-control','readonly','id'=>'Produk','disabled'])); ?>

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

                                        <?php echo e(Form::text('qty', null, ['class'=> 'form-control','id'=>'QTY','required'=>'required'])); ?>

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

                                        
                                        <?php echo e(Form::text('landedcost',null, ['class'=> 'form-control','id'=>'Landed2','required'=>'required'])); ?>

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

<div class="box box-warning">
        <div class="box-body"> 
            
            <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-warning">
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
                    <tr class="bg-gray">
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
        $(function(){
        var no_penerimaan = $('#noterima').val();

            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            // ajax:'<?php echo route('pemakaiandetail.dataDetail'); ?>',
            ajax:'http://localhost/gui_inventory_gut_laravel/admin/penerimaandetail/getDatabyID?id='+no_penerimaan,
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
                        'Rp. '+grandTotal 
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
                        $('#QTY').val('');
                        $('#Harga').val('');
                        
                        refreshTable();
                        // window.location.reload();
                        if (data.success === true) {
                            swal("Done!", data.message, "success");
                        } else {
                            swal("Error!", data.message, "error");
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
                    url:'<?php echo route('penerimaandetail.updateajax'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {

                        if(data.success === true) {
                            swal("Done!", data.message, "success");
                        }else{
                            swal("Error!", data.message, "error");
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
            swal({
            title: "Edit?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, edit it!",
            cancelButtonText: "No, cancel!",
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

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
            // var result = confirm("Want to Edit?");
            // if (result) {
            //     // console.log(id)
            //     $.ajax({
            //         url: url,
            //         type: 'GET',
            //         success: function(result) {
            //             console.log(result);
            //             $('#ID').val(result.id);
            //             $('#Penerimaan').val(result.no_penerimaan);
            //             $('#Produk').val(result.kode_produk);
            //             $('#QTY').val(result.qty);
            //             $('#Harga').val(result.harga);
            //             $(".addform").hide();
            //             $(".editform").show();
                       
            //         }
            //     });
            // }

        }

        function cancel_edit(){
            $(".addform").show();
            $(".editform").hide();
        }

        function del(id, url) {
            swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
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
                                swal("Done!", results.message, "success");
                                
                            } else {
                                swal("Error!", results.message, "error");
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