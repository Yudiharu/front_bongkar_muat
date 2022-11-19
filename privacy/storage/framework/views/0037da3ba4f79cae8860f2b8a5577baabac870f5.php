<?php $__env->startSection('title', 'Konversi'); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="startTime()">
    <div class="box box-solid">
        <!-- <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Konversi</b></font>
        </div> -->
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    <!--  -->
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Konversi</button>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-blue">
                    <th>Kode Konversi</th>
                    <th>Nama Produk</th>
                    <!-- <th>Kode Satuan Terbesar</th> -->
                    <th>Satuan Terbesar</th>
                    <th>Nilai Konversi</th>
                    <!-- <th>Kode Satuan Terkecil</th> -->
                    <th>Satuan Terkecil</th>
                    <!-- 
                    
                     -->
                    <th>Action</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>
    
<div class="modal fade" id="addform" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--  -->
            <?php echo Form::open(['id'=>'ADD']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('Kode Produk', 'Produk:')); ?>

                                    <?php echo e(Form::select('kode_produk',$produk,null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','onchange'=>'satuan();','id'=>'kode_produk','required'=>'required'])); ?>

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
            <!--  -->
            <?php echo Form::open(['id'=>'EDIT']); ?>

            <div class="modal-body">
                            <div class="row">
                                    <div class="form-group">
                                        <!--  -->
                                        <?php echo e(Form::hidden('kode_konversi', null, ['class'=> 'form-control','id'=>'Konversi2','readonly'])); ?>

                                    </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Kode Produk', 'Kode Produk:')); ?>

                                        <?php echo e(Form::select('kode_produk',$produk,null, ['class'=> 'form-control','id'=>'Produk2'])); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_satuan', 'Satuan Terbesar:')); ?>

                                        <?php echo e(Form::select('kode_satuan',$Satuan,null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'Kode_Terbesar2','onchange'=>'satuan3();','required'=>'required'])); ?>

                                    </div>
                                </div>

                               <!--  -->

                                <?php echo e(Form::hidden('satuan_terbesar',null, ['class'=> 'form-control','readonly','id'=>'Terbesar2'])); ?>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('nilai_konversi', 'Nilai Konversi:')); ?>

                                        <?php echo e(Form::text('nilai_konversi', null, ['class'=> 'form-control','id'=>'Nilai2','onkeyup'=>'satuan3();', 'autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    </div>
                                </div>

                              <!--   -->

                                <?php echo e(Form::hidden('kode_satuanterkecil', null, ['class'=> 'form-control','readonly','id'=>'Kode_Terkecil2'])); ?>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('satuan_terkecil', 'Satuan Terkecil:')); ?>

                                        <?php echo e(Form::text('satuan_terkecil', null, ['class'=> 'form-control','readonly','id'=>'Terkecil2'])); ?>

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
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script type="text/javascript">
        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('konversi.data'); ?>',
            columns: [
                { data: 'kode_konversi', name: 'kode_konversi' },
                { data: 'produk.nama_produk', name: 'produk.nama_produk' },
                // { data: 'kode_satuan', name: 'kode_satuan' },
                { data: 'satuan_terbesar', name: 'satuan_terbesar' },
                { data: 'nilai_konversi', name: 'nilai_konversi' },
                // { data: 'kode_satuanterkecil', name: 'kode_satuanterkecil' },
                { data: 'satuan_terkecil', name: 'satuan_terkecil' },
                //{ data: 'created_at', name: 'created_at' },
                // { data: 'updated_at', name: 'updated_at' },
                // { data: 'created_by', name: 'created_by' },
                // { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action' }
            ]
            });
        });

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

        function satuan3(){
            var kode2 = $('#Kode_Terkecil2').val();
            var kode = $('#Kode_Terbesar2').val();
            // console.log(kode);
            // var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('konversi.satuan_produk3'); ?>',
                type:'POST',
                data : {
                        'kode' : kode,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Terbesar2').val(result.kode_satuan);

                        if(kode == kode2){
                            $('#Nilai2').val('1');
                            swal("Nilai Konversi Harus 1");
                        }
                    },
            });
        }


        $('.select2').select2({
            placeholder: "Silahkan Pilih",
            allowClear: true,
        });

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
            var produk = $.trim($('#kode_produk').val());
            var terbesar = $.trim($('#Terbesar1').val());
            var nilai = $.trim($('#Nilai1').val());
            var terkecil = $.trim($('#Terkecil1').val());
            var registerForm = $("#ADD");
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
            var kode = $.trim($('#Konversi2').val());
            var produk = $.trim($('#Produk2').val());
            var kodeterbesar = $.trim($('#Kode_Terbesar2').val());
            var terbesar = $.trim($('#Terbesar2').val());
            var nilai = $.trim($('#Nilai2').val());
            var kodeterkecil = $.trim($('#Kode_Terkecil2').val());
            var terkecil = $.trim($('#Terkecil2').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

            // Check if empty of not           
                $.ajax({
                    url:'<?php echo route('konversi.ajaxupdate'); ?>',
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
                        $('#Konversi2').val(results.kode_konversi);
                        $('#Produk2').val(results.kode_produk);
                        $('#Terbesar2').val(results.kode_satuan);
                        $('#Kode_Terbesar2').val(results.satuan_terbesar);
                        $('#Nilai2').val(results.nilai_konversi);
                        $('#Kode_Terkecil2').val(results.kode_satuanterkecil);
                        $('#Terkecil2').val(results.satuan_terkecil);
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