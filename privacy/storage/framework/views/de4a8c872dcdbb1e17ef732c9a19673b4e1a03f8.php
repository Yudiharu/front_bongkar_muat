<?php $__env->startSection('title', 'Pemakaian Detail'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Pemakaian <b><?php echo e($pemakaian->no_pemakaian); ?></b></font>
    </span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    
    
    <div class="box box-success">
        <div class="box-body"> 
                <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <!--  -->
                    <?php echo Form::open(['id'=>'ADD_DETAIL']); ?>

                    <center><kbd>ADD FORM</kbd></center><br>
                        <div class="row">   
                            <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Pemakaian', 'No Pemakaian:')); ?>

                                        <!--  -->
                                        <?php echo e(Form::text('no_pemakaian',$pemakaian->no_pemakaian, ['class'=> 'form-control','readonly','id'=>'nopakai'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" title="Add New Produk" data-target="#ADD_FORMPRODUK"><i class="fa fa-plus"></i></button> 
                                        <!--  -->
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        <!--  -->
                                        <?php echo e(Form::select('kode_produk',$Produk->sort(),null,
                                         ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','required'=>'required','onchange'=>'stock();',
                                         'id'=>'kode_produks'])); ?>

                                    </div>
                                </div>
                    
                                <!--  -->

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                        <?php echo e(Form::select('kode_satuan', ['-'],null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','required'=>'required','id'=>'Satuan'])); ?>

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

                                        <?php echo e(Form::number('qty', null, ['class'=>'form-control','required'=>'required','id'=>'QTY','onkeyup'=>'check();'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('harga', 'HPP:')); ?>

                                        <!--  -->
                                        <?php echo e(Form::number('harga',null, ['class'=> 'form-control','readonly','id'=>'Harga'])); ?>

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

                <!--  -->
                 <center><kbd>EDIT FORM</kbd></center><br>
                    <div class="row">   
                        <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('No Pemakaian', 'No Pemakaian:')); ?>

                                    <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'ID'])); ?>

                                    <?php echo e(Form::text('no_pemakaian',$pemakaian->no_pemakaian, ['class'=> 'form-control','readonly','id'=>'Pemakaian_e'])); ?>

                                </div>
                            </div>
                            <!--  -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Produk:')); ?>

                                        <?php echo e(Form::select('kode_produk',$Produk->sort(),null,
                                         ['class'=> 'form-control','style'=>'width: 100%','id'=>'Produk_e','disabled'])); ?>

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

                                    <?php echo e(Form::text('qty', null, ['class'=> 'form-control','id'=>'QTY_e','required'=>'required'])); ?>

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
                                            <?php echo e(Form::submit('Update', ['class' => 'btn btn-success btn-sm'])); ?>

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
                <!--  -->
                <?php echo Form::open(['id'=>'ADD_PRODUK']); ?>

                        <div class="modal-body">
                            <div class="row">
                                    <!--  -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('Nama Produk', 'Nama Produk:')); ?>

                                            <?php echo e(Form::text('nama_produk', null, ['class'=> 'form-control select2','id'=>'Nama_produk','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_kategori', 'Kategori:')); ?>

                                            <?php echo e(Form::select('kode_kategori',$Kategori,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Kategori_produk','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_merek', 'Merek:')); ?>

                                            <?php echo e(Form::select('kode_merek', $Merek,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Merek_produk','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                            <?php echo e(Form::select('kode_satuan', $Satuan,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Satuan_produk','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <!--  -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('partnumber', 'Part Number:')); ?>

                                            <?php echo e(Form::text('partnumber', null, ['class'=> 'form-control','id'=>'Part_produk'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('harga_beli', 'Harga Beli:')); ?>

                                            <?php echo e(Form::text('harga_beli', null, ['class'=> 'form-control','id'=>'Beli_produk'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('harga_jual', 'Harga Jual:')); ?>

                                            <?php echo e(Form::text('harga_jual', null, ['class'=> 'form-control','id'=>'Jual_produk'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('hpp', 'HPP:')); ?>

                                            <?php echo e(Form::text('hpp', 0, ['class'=> 'form-control','id'=>'HPP_produk'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('stok', 'Stok:')); ?>

                                            <?php echo e(Form::text('stok', 0, ['class'=> 'form-control','id'=>'Stok_produk'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('aktif', 'Status:')); ?>

                                            <?php echo e(Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Aktif_produk'])); ?>

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

 <div class="box box-success">
        <div class="box-body"> 
            
            <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-success">
                    <th>No Pemakaian</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <!-- 
                     -->
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
        var no_pemakaian = $('#nopakai').val();

            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            // ajax:'<?php echo route('pemakaiandetail.dataDetail'); ?>',
            ajax:'http://localhost/gui_inventory_gut_laravel/admin/pemakaiandetail/getDatabyID?id='+no_pemakaian,
            data:{'no_pemakaian':no_pemakaian},
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
                { data: 'no_pemakaian', name: 'no_pemakaian' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
                { data: 'qty', name: 'qty' },
                { data: 'harga', name: 'harga' },
                { data: 'subtotal', name: 'subtotal' },
                // { data: 'created_at', name: 'created_at' },
                // { data: 'updated_at', name: 'updated_at' },
                // { data: 'created_by', name: 'created_by' },
                // { data: 'updated_by', name: 'updated_by' },
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

        
        var table=$('#data-table').DataTable({
                scrollY: true,
                scrollX: true,
            
            });

        // $(function() {
        //     window.table = $('#data-table').DataTable({
        //         scrollY: 200,
        //         scrollX: true
            
        //     });
        // });

        function stock(){
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
                        $('#Stock').val(result.stok);
                        // $('#Satuan').val(result.satuan);
                        $('#Harga').val(result.hpp);
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
                            swal("Error!", "Stok Tidak Cukup");
                        }else{
                            submit.disabled = false;
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
            placeholder: "Klik Tombol",
            allowClear: true,
        });

        function tablefresh(){
                window.table.draw();
            } 

        function refreshTable() {
          $('#data2-table').DataTable().ajax.reload(null,false);
            // table.draw();
        }

        $('#ADD_PRODUK').submit(function (e) {
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
                        $('#Nama_produk').val('').trigger('change');
                        $('#Kategori_produk').val('');
                        $('#Merek_produk').val('');
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
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
        });

        $('#ADD_DETAIL').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            var name = $.trim($('#Nama_produk').val());
           
            var registerForm = $("#ADD_DETAIL");
            var formData = registerForm.serialize();

            // Check if empty of not
            $.ajax({
                    url:'<?php echo route('pemakaiandetail.check'); ?>',
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>