

<?php $__env->startSection('title', 'Job Request Detail'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <button type="button" class="btn btn-danger btn-xs" onclick="back()"><i class="fa fa-arrow-left"></i> Kembali</button>
    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Job Request<b> <?php echo e($no_req_jo); ?></b></font>
    </span>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-danger">
        <div class="box-body"> 
            <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id'=>'ADD_DETAIL']); ?>

                      <center><kbd>ADD FORM</kbd></center><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                        <?php echo e(Form::text('no_joborder',$no_joborder, ['class'=> 'form-control','style'=>'width: 100%','id'=>'nojoborder','required','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_req_jo', 'No Request JO:')); ?>

                                        <?php echo e(Form::text('no_req_jo',$no_req_jo, ['class'=> 'form-control','style'=>'width: 100%','id'=>'noreqjo','required','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_container', 'No Container:')); ?>

                                        <?php echo e(Form::text('kode_container',null, ['class'=> 'form-control','required','id'=>'nocontainer','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_size', 'Size Container:')); ?>

                                        <?php echo e(Form::select('kode_size',$Size->sort(),null,
                                         ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','required'=>'required','id'=>'kodesize'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('status_muatan', 'Status Muatan:')); ?>

                                        <?php echo e(Form::select('status_muatan', ['Empty' => 'Empty','Loaded' => 'Loaded'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'statusmuatan','required'=>'required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('dari', 'Dari:')); ?>

                                        <?php echo e(Form::text('dari',null, ['class'=> 'form-control','required','id'=>'dari','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tujuan', 'Tujuan:')); ?>

                                        <?php echo e(Form::text('tujuan',null, ['class'=> 'form-control','required','id'=>'tujuan','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                            </div> 
                            <span class="pull-right"> 
                                <?php echo e(Form::submit('Add Item', ['class' => 'btn btn-success btn-sm','id'=>'submit'])); ?>  
                            </span>                       
                    <?php echo Form::close(); ?>    
            </div>

            <div class="modal fade" id="editform2" role="dialog">
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
                                
                                    <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'Kode','readonly'])); ?>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('no_req_jo', 'No Request JO:')); ?>

                                            <?php echo e(Form::text('no_req_jo',$no_req_jo, ['class'=> 'form-control','style'=>'width: 100%','id'=>'noreqjo2','required','readonly'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_container', 'No Container:')); ?>

                                            <?php echo e(Form::text('kode_container',null, ['class'=> 'form-control','required','id'=>'nocontainer2','autocomplete'=>'off'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_size', 'Size Container:')); ?>

                                            <?php echo e(Form::select('kode_size',$Size->sort(),null,
                                             ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','required'=>'required','id'=>'kodesize2'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('status_muatan', 'Status Muatan:')); ?>

                                            <?php echo e(Form::select('status_muatan', ['Empty' => 'Empty','Loaded' => 'Loaded'], null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'statusmuatan2','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('dari', 'Dari:')); ?>

                                            <?php echo e(Form::text('dari',null, ['class'=> 'form-control','required','id'=>'dari2','autocomplete'=>'off'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('tujuan', 'Tujuan:')); ?>

                                            <?php echo e(Form::text('tujuan',null, ['class'=> 'form-control','required','id'=>'tujuan2','autocomplete'=>'off'])); ?>

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
    </div>
</div>


   <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-warning">
                        <th>No Job Order</th>
                        <th>No Job Request</th>
                        <th>No Container</th>
                        <th>Container Size</th>
                        <th>Status Muatan</th>
                        <th>Dari</th>
                        <th>Tujuan</th>
                     </tr>
                    </thead>
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

            /* Button used to open the contact form - fixed at the bottom of the page */
            .hapus-button {
                background-color: #F63F3F;
                bottom: 126px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 156px;
            }

            #mySidenav button {
              position: fixed;
              right: -30px;
              transition: 0.3s;
              padding: 4px 8px;
              width: 70px;
              text-decoration: none;
              font-size: 12px;
              color: white;
              border-radius: 5px 0 0 5px ;
              opacity: 0.8;
              cursor: pointer;
              text-align: left;
            }

            #mySidenav button:hover {
              right: 0;
            }

            #about {
              top: 70px;
              background-color: #4CAF50;
            }

            #blog {
              top: 130px;
              background-color: #2196F3;
            }

            #projects {
              top: 190px;
              background-color: #f44336;
            }

            #contact {
              top: 250px;
              background-color: #555
            }
        </style>

        <div id="mySidenav" class="sidenav">
            <?php if (app('laratrust')->can('update-jo')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editjobrequest" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-jo')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusjobrequest" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>
        </div>
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

        function load(){
            startTime();
            $('.editform').hide();
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
        var no_req_jo = $('#noreqjo').val();
        // console.log(no_spbnon);
        $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'https://aplikasi.gui-group.co.id/gui_front_emkl_laravel/admin/joborderdetail/getDatabyID2?id='+no_req_jo,
            data:{'no_req_jo':no_req_jo},
            columns: [
                { data: 'no_joborder', name: 'no_joborder' },
                { data: 'no_req_jo', name: 'no_req_jo' },
                { data: 'kode_container', name: 'kode_container' },
                { data: 'sizecontainer.nama_size', name: 'sizecontainer.nama_size' },
                { data: 'status_muatan', name: 'status_muatan' },
                { data: 'dari', name: 'dari' },
                { data: 'tujuan', name: 'tujuan' },
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

        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            var table = $('#data2-table').DataTable();

            $('#data2-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var no_spbnon = select.find('td:eq(0)').text();
                    var kode_item = select.find('td:eq(1)').text();
                }
            } );

            $('#editjobrequest').click( function () {
                var select = $('.selected').closest('tr');
                var no_req_jo = select.find('td:eq(1)').text();
                var kode_container = select.find('td:eq(2)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborderdetail.edit_noreqjo'); ?>',
                    type: 'POST',
                    data : {
                        'no_req_jo': no_req_jo,
                        'kode_container': kode_container
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Kode').val(results.id);
                        $('#noreqjo2').val(results.no_req_jo);
                        $('#nocontainer2').val(results.kode_container);
                        $('#kodesize2').val(results.kode_size);
                        $('#statusmuatan2').val(results.status_muatan);
                        $('#dari2').val(results.dari);
                        $('#tujuan2').val(results.tujuan);
                        $('#editform2').modal('show');
                    }
                });
            });

            $('#hapusjobrequest').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                var no_req_jo = select.find('td:eq(1)').text();
                var kode_container = select.find('td:eq(2)').text();
                var row = table.row( select );
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
                            url: '<?php echo route('joborderdetail.hapus_noreqjo'); ?>',
                            type: 'POST',
                            data : {
                                'no_joborder': no_joborder,
                                'no_req_jo': no_req_jo,
                                'kode_container': kode_container
                            },

                            success: function (results) {
                                if (results.success === true) {
                                    swal("Berhasil!", results.message, "success");
                                } else {
                                    swal("Gagal!", results.message, "error");
                                }
                                refreshTable();
                            }
                        });
                    }
                });
            });
        });

        var table=$('#data-table').DataTable({
                scrollY: true,
                scrollX: true,
            
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

        $('.select2').select2({
            placeholder: "Pilih",
            allowClear: true,
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function back(){
            // history.go(-1);
            var nojoborder = $('#nojoborder').val();
            window.location.replace("https://aplikasi.gui-group.co.id/gui_front_emkl_laravel/admin/joborder/"+nojoborder+"/detail");
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
                url:'<?php echo route('joborderdetail.store2'); ?>',
                type:'POST',
                data:formData,
                success:function(data) {
                    console.log(data);
                    $('#nocontainer').val('');
                    $('#kodesize').val('').trigger('change');
                    $('#statusmuatan').val('').trigger('change');
                    $('#dari').val('');
                    $('#tujuan').val('');
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
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();
                $.ajax({
                    url:'<?php echo route('joborderdetail.updateajax2'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        $('#editform2').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }   
                    },
                });
            
        });

        function cancel_edit(){
            $(".addform").show();
            $(".editform").hide();
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>