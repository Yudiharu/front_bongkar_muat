<?php $__env->startSection('title', 'Customer'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="panggil()">
    <div class="box box-solid">
        <!-- <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>customer</b></font>
        </div> -->
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    <!--  -->
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Customer</button>
                </div>
            </div>
             <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-blue">
                    <th>Kode customer</th>
                    <th>Nama customer</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Hp</th>
                    <th>Nama Kontak</th>
                    <th>Npwp</th>
                    <th>Status</th>
                    <!-- <th>Created At</th> -->
                    <!-- 
                    
                     -->
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
              <h4 class="modal-title">Create Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--  -->
            <?php echo Form::open(['id'=>'ADD']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <!--  -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Nama customer', 'Nama Customer:')); ?>

                                    <?php echo e(Form::text('nama_customer', null, ['class'=> 'form-control','id'=>'Nama1','required'=>'required', 'placeholder'=>'Contoh: NAMA CUSTOMER, CV','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Contoh: NAMA CUSTOMER, CV"])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Nama Customer', 'Nama Customer PO:')); ?>

                                    <?php echo e(Form::text('nama_customer_po', null, ['class'=> 'form-control','id'=>'Namapo1','required'=>'required', 'placeholder'=>'Contoh: CV. NAMA CUSTOMER','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Contoh: CV. NAMA CUSTOMER"])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('alamat', 'Alamat:')); ?>

                                    <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>'2','id'=>'Alamat1','required'=>'required', 'placeholder'=>'Alamat','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                    <span class="text-danger">
                                        <strong class="alamat-error" id="alamat-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('telp', 'Telp:')); ?>

                                    <?php echo e(Form::text('telp', null, ['class'=> 'form-control','id'=>'Telp1','required'=>'required', 'placeholder'=>'No. Telepon','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    <span class="text-danger">
                                        <strong class="telp-error" id="telp-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php echo e(Form::label('kota', 'Kota:')); ?>

                                    <?php echo e(Form::text('kota', null, ['class'=> 'form-control','id'=>'Kota1','required'=>'required', 'placeholder'=>'Kota tinggal','autocomplete'=>'off'])); ?>

                                    <span class="text-danger">
                                        <strong class="telp-error" id="telp-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kodepos', 'Kode Pos:')); ?>

                                    <?php echo e(Form::text('kodepos', null, ['class'=> 'form-control','id'=>'Kodepos1','required'=>'required', 'placeholder'=>'Kode Pos','autocomplete'=>'off'])); ?>

                                    <span class="text-danger">
                                        <strong class="telp-error" id="telp-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Fax', 'Fax:')); ?>

                                    <?php echo e(Form::text('fax', null, ['class'=> 'form-control','id'=>'Fax1','required'=>'required', 'placeholder'=>'No. FAX','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    <span class="text-danger">
                                        <strong class="hp-error" id="hp-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Hp', 'Hp:')); ?>

                                    <?php echo e(Form::text('hp', null, ['class'=> 'form-control','id'=>'Hp1','required'=>'required', 'placeholder'=>'No. HP','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    <span class="text-danger">
                                        <strong class="hp-error" id="hp-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Npwp', 'Npwp:')); ?>

                                    <?php echo e(Form::text('npwp', null, ['class'=> 'form-control','id'=>'Npwp1', 'placeholder'=>'NPWP','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    <span class="text-danger">
                                        <strong class="npwp-error" id="npwp-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_kontak', 'Nama Kontak:')); ?>

                                    <?php echo e(Form::text('nama_kontak', null, ['class'=> 'form-control','id'=>'Kontak1', 'placeholder'=>'Nama Kontak','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                    <span class="text-danger">
                                        <strong class="kontak-error" id="kontak-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('status', 'Status:')); ?><br>
                                    <?php echo e(Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Status1','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="status-error" id="status-error"></strong>
                                    </span>
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

    <div class="modal fade" id="editform" role="dialog">
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
                        
                                    <?php echo e(Form::hidden('kode_customer', null, ['class'=> 'form-control','id'=>'Kode','readonly'])); ?>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Nama customer', 'Nama Customer:')); ?>

                                    <?php echo e(Form::text('nama_customer', null, ['class'=> 'form-control','id'=>'Nama','required'=>'required', 'placeholder'=>'Contoh: NAMA CUSTOMER, CV','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Contoh: NAMA CUSTOMER, CV"])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Nama Customer', 'Nama Customer PO:')); ?>

                                    <?php echo e(Form::text('nama_customer_po', null, ['class'=> 'form-control','id'=>'Namapo','required'=>'required', 'placeholder'=>'Contoh: CV. NAMA CUSTOMER','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Contoh: CV. NAMA CUSTOMER"])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::label('alamat', 'Alamat:')); ?>

                                <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>'2','id'=>'Alamat','onkeypress'=>"return pulsar(event,this)"])); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('telp', 'Telp:')); ?>

                                    <?php echo e(Form::text('telp', null, ['class'=> 'form-control','id'=>'Telp','required'=>'required', 'placeholder'=>'No. Telepon','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    <span class="text-danger">
                                        <strong class="telp-error" id="telp-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php echo e(Form::label('kota', 'Kota:')); ?>

                                    <?php echo e(Form::text('kota', null, ['class'=> 'form-control','id'=>'Kota','required'=>'required', 'placeholder'=>'Kota tinggal','autocomplete'=>'off'])); ?>

                                    <span class="text-danger">
                                        <strong class="telp-error" id="telp-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_pos', 'Kode Pos:')); ?>

                                    <?php echo e(Form::text('kode_pos', null, ['class'=> 'form-control','id'=>'Kodepos','required'=>'required', 'placeholder'=>'Kode Pos','autocomplete'=>'off'])); ?>

                                    <span class="text-danger">
                                        <strong class="telp-error" id="telp-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Fax', 'Fax:')); ?>

                                    <?php echo e(Form::text('fax', null, ['class'=> 'form-control','id'=>'Fax','required'=>'required', 'placeholder'=>'No. FAX','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                    <span class="text-danger">
                                        <strong class="hp-error" id="hp-error"></strong>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Hp', 'Hp:')); ?>

                                    <?php echo e(Form::text('hp', null, ['class'=> 'form-control','id'=>'Hp','required'=>'required','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Npwp', 'Npwp:')); ?>

                                    <?php echo e(Form::text('npwp', null, ['class'=> 'form-control','id'=>'Npwp','autocomplete'=>'off'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_kontak', 'Nama Kontak:')); ?>

                                    <?php echo e(Form::text('nama_kontak', null, ['class'=> 'form-control','id'=>'Kontak', 'placeholder'=>'Nama Kontak','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                    <span class="text-danger">
                                        <strong class="kontak-error" id="kontak-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('status', 'Status:')); ?><br>
                                    <?php echo e(Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'Status','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="status-error" id="status-error"></strong>
                                    </span>
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

    function hanyaAngka(e, decimal) {
        var key;
        var keychar;
        // $('#Npwp1').mask({ data:'00.000.000.0-000.000' });
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
        if ((("0123456789").indexOf(keychar) > -1 || ("-").indexOf(keychar) > -1 || (".").indexOf(keychar) > -1 )) {
            return true;
        } else
        if (decimal && (keychar == ".")) {
            return true;
        } else return false;
    }   

    $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
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

    function panggil(){
        startTime();
    }

        $(function() {          
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('customer.data'); ?>',
            columns: [
                { data: 'kode_customer', name: 'kode_customer' },
                { data: 'nama_customer', name: 'nama_customer' },
                { data: 'alamat', name: 'alamat' },
                { data: 'telp', name: 'telp' },
                { data: 'hp', name: 'hp' },
                { data: 'nama_kontak', name: 'nama_kontak' },
                { data: 'npwp', name: 'npwp' },
                { data: 'status', name: 'status' },
                // { data: 'created_at', name: 'created_at' },
                // { data: 'updated_at', name: 'updated_at' },
                // { data: 'created_by', name: 'created_by' },
                // { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        

        $('.select2').select2({
            placeholder: "Pilih",
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
            var name = $.trim($('#Nama1').val());
            var namepo = $.trim($('#Namapo1').val());
            var alamat = $.trim($('#Alamat1').val());
            var telp = $.trim($('#Telp1').val());
            var kota = $.trim($('#Kota1').val());
            var kodepos = $.trim($('#Kodepos1').val());
            var fax = $.trim($('#Fax1').val());
            var hp = $.trim($('#Hp1').val());
            var npwp = $.trim($('#Npwp1').val());
            //$('input[name="npwp"]').mask('00.000.000.0-000.000');           
            var kontak = $.trim($('#Kontak1').val());
            var status = $.trim($('#Status1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

            // Check if empty of not
            
                // alert('Mohon Lengkapi Form Isian');
                // return false;
                $.ajax({
                    url:'<?php echo route('customer.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#Nama1').val('');
                        $('#Alamat1').val('');
                        $('#Telp1').val('');
                        $('#Kota1').val('');
                        $('#Kodepos1').val('');
                        $('#Fax1').val('');
                        $('#Hp1').val('');
                        $('#Npwp1').val('');
                        $('#Kontak1').val('');
                        $('#Status1').val('').trigger('change');
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
            var name = $.trim($('#Nama').val());
            var namepo = $.trim($('#Namapo').val());
            var alamat = $.trim($('#Alamat').val());
            var telp = $.trim($('#Telp').val());
            var kota = $.trim($('#Kota').val());
            var kodepos = $.trim($('#Kodepos').val());
            var fax = $.trim($('#Fax').val());
            var hp = $.trim($('#Hp').val());
            var npwp = $.trim($('#Npwp').val());
            //$('input[name="npwp"]').mask('00.000.000.0-000.000');           
            var kontak = $.trim($('#Kontak').val());
            var status = $.trim($('#Status').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

            // Check if empty of not
         
                $.ajax({
                    url:'<?php echo route('customer.ajaxupdate'); ?>',
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
                        // console.log(result);
                        $('#editform').modal('show');
                        $('#Kode').val(results.kode_customer);
                        $('#Nama').val(results.nama_customer);
                        $('#Namapo').val(results.nama_customer_po);
                        $('#Alamat').val(results.alamat);
                        $('#Telp').val(results.telp);
                        $('#Kota').val(results.kota);
                        $('#Kodepos').val(results.kode_pos);
                        $('#Fax').val(results.fax);
                        $('#Hp').val(results.hp);
                        $('#Npwp').val(results.npwp);
                        $('#Kontak').val(results.nama_kontak);
                        $('#Status').val(results.status);
                        },
                        error : function() {
                        alert("Tak ada Data");
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
            cancelButtonText: "Batal!",
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