<?php $__env->startSection('title', 'Opname Detail'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()"><i class="fa fa-refresh"></i> Refresh</button>
    <button type="button" class="btn btn-success btn-xs" onclick="hapus()"><i class="fa fa-times-circle"></i> Delete All</button>
    <button type="button" class="btn btn-warning btn-xs" onclick="selisih()"><i class="fa fa-edit"></i> Hitung Selisih</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Opname <b><?php echo e($opname->no_opname); ?></b></font>
        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#import"><i class="fa fa-plus"></i> Import Excel</button>
        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Add Manual</button>
        <button type="button" class="btn btn-primary btn-xs" onclick="create_all()"><i class="fa fa-plus"></i> Add Otomatis</button>
    </span>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="startTime()">   
    <div class="box box-primary">
        <div class="box-body"> 
            

    <div class="modal fade" id="add" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['id'=>'ADD']); ?>

            
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Opname', 'No Opname:')); ?>

                                        <?php echo e(Form::text('no_opname',$opname->no_opname, ['class'=> 'form-control','readonly','id'=>'Opname1'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Kode Produk:')); ?>

                                        <?php echo e(Form::select('kode_produk',$Produk, null,
                                         ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Produk1','onchange'=>'satuan_produk();'])); ?>

                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('partnumber', 'Part Number:')); ?>

                                        <?php echo e(Form::text('partnumber', null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Part Number','id'=>'Part1','readonly'])); ?>

                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Kode Satuan:')); ?>

                                        <?php echo e(Form::text('kode_satuan', null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Satuan','id'=>'Satuan1','readonly'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('hpp', 'Hpp:')); ?>

                                        <?php echo e(Form::text('hpp', null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Harga','id'=>'HPP1','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('stok', 'Stock:')); ?>

                                        <?php echo e(Form::text('stok', null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Stock','id'=>'Stock1','readonly'])); ?>

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
    

    <div class="modal fade" id="import" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="<?php echo e(route('import')); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Import Excel</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['id'=>'IMPORT']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo csrf_field(); ?>
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <?php echo e(Form::submit('Import', ['class' => 'btn btn-success crud-submit'])); ?>

                            <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                        </div>
                    </div>
                <?php echo Form::close(); ?>

          </div>
        </div>
    </div>

   <!--  <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Laravel 5.7 Import Export Excel to database Example - ItSolutionStuff.com
            </div>
        
            <div class="card-body">
                <form action="<?php echo e(route('import')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import User Data</button>
                    <a class="btn btn-warning" href="<?php echo e(route('export')); ?>">Export User Data</a>
                </form>
            </div>
        </div>
    </div> -->


            <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id'=>'EDIT']); ?>

                    <center><kbd>EDIT FORM</kbd></center><br>
                        <div class="row">   
                                <?php echo e(Form::hidden('id',null, ['class'=> 'form-control','readonly','id'=>'id_opname'])); ?>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Opname', 'No Opname:')); ?>

                                        <?php echo e(Form::text('no_opname',$opname->no_opname, ['class'=> 'form-control','readonly','id'=>'Opname'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_produk', 'Kode Produk:')); ?>

                                        <?php echo e(Form::text('kode_produk',null,
                                         ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Produk',
                                         'id'=>'Produk','readonly'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Kode Satuan:')); ?>

                                        <?php echo e(Form::text('kode_satuan', null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Satuan','readonly','id'=>'Satuan'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('hpp', 'Hpp:')); ?>

                                        <?php echo e(Form::text('hpp', null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Harga','id'=>'Harga','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <?php echo e(Form::label('stok', 'Stock:')); ?>

                                        <?php echo e(Form::text('stok', null, ['class'=> 'form-control','style'=>'width: 100%','readonly','placeholder' => 'Stock','id'=>'Stock'])); ?>

                                    </div>
                                </div>
                    
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty_checker1', 'Q.C 1:')); ?>

                                        <?php echo e(Form::text('qty_checker1', null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'QTY1','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty_checker2', 'Q.C 2:')); ?>

                                        <?php echo e(Form::text('qty_checker2', null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'QTY2','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty_checker3', 'Q.C 3:')); ?>

                                        <?php echo e(Form::text('qty_checker3', null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'QTY3','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                            </div> 
                                <span class="pull-right">
                                        <?php echo e(Form::submit('Update', ['class' => 'btn btn-success btn-sm'])); ?>

                                </span>
                    <?php echo Form::close(); ?>

            </div>
    </div>
</div>
        
    <div class="box box-primary">
        <div class="box-body"> 
            

            <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-info">
                    <th>No Opname</th>
                    <th>Kode Produk</th>
                    <th>Part Number</th>
                    <!-- <th>Id</th> -->
                    <!-- <th>Nama Produk</th> -->
                   <!--  <th>Merek</th> -->
                    <th>Kode Satuan</th>
                    <th>Hpp</th>
                    <th>Stock</th>
                    <th>Checker 1</th>
                    <th>Checker 2</th>
                    <th>Checker Final</th>
                    <th>Selisih Stock</th>
                    <th>Selisih Nilai</th>
                    <th>Action</th>
                 </tr>
                </thead>
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
        var no_opname = $('#Opname').val();
        console.log(no_opname);
            $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            // ajax:'<?php echo route('opnamedetail.dataDetail'); ?>',
            ajax:'http://localhost/gui_inventory_depo_laravel_disabled/admin/opnamedetail/getDatabyID?id='+no_opname,
            data:{'no_opname':no_opname},
            columns: [
                { data: 'no_opname', name: 'no_opname' },
                { data: 'kode_produk', name: 'kode_produk' },
                { data: 'partnumber', name: 'partnumber' },
                { data: 'kode_satuan', name: 'kode_satuan' },
                // { data: 'id', name: 'id' },
                // { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                // { data: 'merek.nama_merek', name: 'merek.nama_merek' },
                // { data: 'satuan.nama_satuan', name: 'satuan.nama_satuan' },
                { data: 'hpp', name: 'hpp' },
                { data: 'stok', name: 'stok' },
                { data: 'qty_checker1', name: 'qty_checker1' },
                { data: 'qty_checker2', name: 'qty_checker2' },
                { data: 'qty_checker3', name: 'qty_checker3' },
                { data: 'stock_opname', name: 'stock_opname' },
                { data: 'amount_opname', name: 'amount_opname' },
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

        function refreshTable() {
          $('#data2-table').DataTable().ajax.reload(null,false);
            // table.draw();
        }

        $('#ADD').submit(function (e) {
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
           
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

            // Check if empty of not
            $.ajax({
                    url:'<?php echo route('opnamedetail.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Produk1').val('').trigger('change');
                        $('#Part1').val('');
                        $('#Satuan1').val('').trigger('change');
                        $('#HPP1').val('');
                        $('#Stock1').val('');
                        $('#add').modal('hide');
                        
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

        function satuan_produk(){
            var kode_produk= $('#Produk1').val();
            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('opnamedetail.satuanproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Stock1').val(result.stok);
                        $('#Part1').val(result.partnumber);
                        $('#Satuan1').val(result.satuan);
                        $('#HPP1').val(result.hpp);
                    },
            });
        }


        $(document).ready(function() {
            var table = $('#data2-table').DataTable();

            $('#data2-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var no_opname = select.find('td:eq(0)').text();
                    var kode_produk = select.find('td:eq(1)').text();
                    // var id = select.find('td:eq(2)').text();
                    // var kode_merek = select.find('td:eq(3)').text();
                    var kode_satuan = select.find('td:eq(2)').text();
                    var hpp = select.find('td:eq(3)').text();
                    var stok = select.find('td:eq(4)').text();
                    var qty_checker1 = select.find('td:eq(5)').text();
                    var qty_checker2 = select.find('td:eq(6)').text();
                    var qty_checker3 = select.find('td:eq(7)').text();
                    // console.log(no_opname);
                        $.ajax({
                        type: 'POST',
                        url: '<?php echo route('opnamedetail.getdata'); ?>',
                        data: {
                            'no_opname':no_opname,
                            'kode_produk':kode_produk,
                            // 'id':id,
                        },
                        // dataType: 'JSON',
                        success: function (results) {
                            console.log(results);
                            $('#Opname').val(results.no_opname);
                            $('#Produk').val(results.kode_produk);
                            // $('#Merek').val(results.kode_merek);
                            $('#Satuan').val(results.kode_satuan);
                            $('#Harga').val(results.hpp);
                            $('#Stock').val(results.stok);
                            $('#QTY1').val(results.qty_checker1);
                            $('#QTY2').val(results.qty_checker2);
                            $('#QTY3').val(results.qty_checker3);
                            },
                            error : function() {
                            alert("Nothing Data");
                        }
                    });
                }
            } );
        } );


        function selisih(){
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            var no_opname= $('#Opname').val();

            $.ajax({
                url:'<?php echo route('opnamedetail.hitungselisih'); ?>',
                type:'POST',
                data : {
                        'id': no_opname
                    },
                success: function(result) {
                        console.log(result);

                        if (result.success === true) {
                            swal("Berhasil!", result.message, "success");
                        } else {
                            swal("Gagal!", result.message, "error");
                        }
                        // window.location.reload();
                        refreshTable();
                    },
            });
        }

        function stock(){
            var kode_produk= $('#kode_produk').val();
            $.ajax({
                url:'<?php echo route('opnamedetail.stockproduk'); ?>',
                type:'POST',
                data : {
                        'id': kode_produk
                    },
                success: function(result) {
                        console.log(result);
                        $('#Stock').val(result.stock);
                        $('#HPP').val(result.harga_beli);
                    },
            });
        }


        function create_all() {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            var no_opname= $('#Opname').val();

            $.ajax({
                url:'<?php echo route('opnamedetail.createall'); ?>',
                type:'POST',
                data : {
                        'id': no_opname
                    },
                success: function(result) {
                        console.log(result);

                        if (result.success === true) {
                            swal("Berhasil!", result.message, "success");
                        } else {
                            swal("Gagal!", result.message, "error");
                        }
                        // window.location.reload();
                        refreshTable();
                    },
            });
        }

        function hapus() {
            var no_opname= $('#Opname').val();

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
                $.ajax({
                    url:'<?php echo route('opnamedetail.hapusdetail'); ?>',
                    type:'POST',
                    data : {
                            'id': no_opname
                        },
                    success: function(result) {
                            console.log(result);

                            if (result.success === true) {
                                swal("Berhasil!", result.message, "success");
                            } else {
                                swal("Gagal!", result.message, "error");
                            }
                            // window.location.reload();
                            refreshTable();
                         }
                });
            }
            });
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

        

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            // var id = $.trim($('#id_opname').val());
            var opname = $.trim($('#Opname').val());
            var produk = $.trim($('#Produk').val());
            var merek = $.trim($('#Merek').val());
            var ukuran = $.trim($('#Ukuran').val());
            var harga = $.trim($('#Harga').val());
            var stok = $.trim($('#Stock').val());
            var qty1 = $.trim($('#QTY1').val());
            var qty2 = $.trim($('#QTY2').val());
            var qty3 = $.trim($('#QTY3').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('opnamedetail.updateajax'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data){
                        console.log(data);
                        // $('#id_opname').val('');
                        $('#Produk').val('');
                        $('#Merek').val('');
                        $('#Ukuran').val('');
                        $('#Harga').val('');
                        $('#Stock').val('');
                        $('#QTY1').val('');
                        $('#QTY2').val('');
                        $('#QTY3').val('');
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                        // window.location.reload();
                        refreshTable();

                    },
                });
        });

        function edit(id, url) {
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        $('#Opname').val(results.no_opname);
                        $('#Produk').val(results.kode_produk);
                        $('#Satuan').val(results.kode_satuan);
                        $('#QTY').val(results.qty);
                        $('#Harga').val(results.harga);
                        $('#ID').val(results.id);
                        $(".addform").hide();
                        $(".editform").show();
                        },
                        error : function() {
                        alert("Nothing Data");
                    }
                });
            } 


        function del(id, url) {
            var no_opname= $('#Opname').val();
            var kode_produk= $('#Produk').val();

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
                    url:'<?php echo route('opnamedetail.hapusitem'); ?>',
                    type:'POST',
                    data : {
                            'id': no_opname,
                            'kode': kode_produk
                        },
                    success: function(result) {
                            console.log(result);

                            if (result.success === true) {
                                swal("Berhasil!", result.message, "success");
                            } else {
                                swal("Gagal!", result.message, "error");
                            }
                            // window.location.reload();
                            refreshTable();
                         }
                });
            }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>