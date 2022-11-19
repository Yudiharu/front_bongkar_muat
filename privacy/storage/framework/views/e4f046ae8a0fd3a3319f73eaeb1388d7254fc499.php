<?php $__env->startSection('title', 'Katalog'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Katalog</b></font>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Katalog</button>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-gray">
                    <th>Kode Item</th>
                    <th>Partnumber</th>
                    <th>Nama Item</th>
                    <th>Item Name</th>
                    <th>Tipe</th>
                    <th>IC</th>
                    <!-- <th>Created At</th> -->
                    <th>Action</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>
    
<div class="modal fade" id="addform" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Data Baru </h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['id'=>'ADD']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('partnumber', 'Partnumber:')); ?>

                                    <?php echo e(Form::text('partnumber',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'part1','required', 'placeholder'=>'Part Number','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_item', 'Barang:')); ?>

                                    <?php echo e(Form::text('nama_item',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'nama1','required', 'placeholder'=>'Barang','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_item_en', 'Item:')); ?>

                                    <?php echo e(Form::text('nama_item_en',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'item1','required', 'placeholder'=>'Item','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>                              
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tipe', 'Tipe:')); ?>

                                    <?php echo e(Form::text('tipe',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'tipe1','required', 'placeholder'=>'Tipe','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('ic', 'IC:')); ?>

                                    <?php echo e(Form::text('ic',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'ic1','required', 'placeholder'=>'IC','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

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


<div class="modal fade" id="editform" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['id'=>'EDIT']); ?>

            <div class="modal-body">
                    <div class="row">
                                    <div class="form-group">
                                        <!--  -->
                                        <?php echo e(Form::hidden('kode_item', null, ['class'=> 'form-control','id'=>'Katalog2','readonly'])); ?>

                                    </div>

                               <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('partnumber', 'Partnumber:')); ?>

                                        <?php echo e(Form::text('partnumber',null, ['class'=> 'form-control','id'=>'Part2','required'])); ?>

                                    </div>
                                </div>     

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('nama_item', 'Nama Item:')); ?>

                                        <?php echo e(Form::text('nama_item',null, ['class'=> 'form-control','id'=>'Nama2','required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('nama_item_en', 'Nama Item:')); ?>

                                        <?php echo e(Form::text('nama_item_en',null, ['class'=> 'form-control','id'=>'Item2','required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tipe', 'Tipe:')); ?>

                                        <?php echo e(Form::text('tipe',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'Tipe2','required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('ic', 'IC:')); ?>

                                        <?php echo e(Form::text('ic',null, ['class'=> 'form-control','id'=>'IC2','required'])); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <div class="row">
                            <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                            <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                        </div>
            </div>
            <?php echo Form::close(); ?>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script type="text/javascript">
        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('katalog.data'); ?>',
            columns: [
                { data: 'kode_item', name: 'kode_item' },
                { data: 'partnumber', name: 'partnumber' },
                { data: 'nama_item', name: 'nama_item' },
                { data: 'nama_item_en', name: 'nama_item_en' },
                { data: 'tipe', name: 'tipe' },
                { data: 'ic', name: 'ic' },
                //{ data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action' },
            ]
            });
        });

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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });

        $('#ADD').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            var part = $.trim($('#part1').val());
            var nama = $.trim($('#nama1').val());
            var nama_en = $.trim($('#item1').val());
            var tipe = $.trim($('#tipe1').val());
            var ic   = $.trim($('#ic1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('katalog.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#part1').val('');
                        $('#nama1').val('');
                        $('#item1').val('');
                        $('#tipe1').val('');
                        $('#ic1').val('');
                        $('#addform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }   
                    },
                });
        });

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var kode = $.trim($('#Katalog2').val());
            var nama = $.trim($('#Nama2').val());
            var item = $.trim($('#Item2').val());
            var tipe = $.trim($('#Tipe2').val());
            var ic = $.trim($('#IC2').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('katalog.ajaxupdate'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }   
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
                        console.log(results);
                        $('#editform').modal('show');
                        $('#Katalog2').val(results.kode_item);
                        $('#Part2').val(results.partnumber);
                        $('#Nama2').val(results.nama_item);
                        $('#Item2').val(results.nama_item_en);
                        $('#Tipe2').val(results.tipe);
                        $('#IC2').val(results.ic);
                        },
                        error : function() {
                        alert("Nothing Data");
                    }
                });
        }

        function update() {
         e.preventDefault();
         alert('test update');
         var form_action = $("#editform").find("form").attr("action");
                $.ajax({
                    
                    url: form_action,
                    type: 'POST',
                    data:$('#Update').serialize(),
                    success: function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        $.notify(data.message, "success");
                        refreshTable();
                    }
                });
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
                

                $.ajax({
                    type: 'DELETE',
                    url: url,
                    
                    success: function (results) {
                    // console.log(results);
                        if (results.success === true) {
                            swal("Berhasil!", results.message, "success");
                        } else {
                            swal("Gagal!", results.message, "error");
                        }
                          
                        // $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>