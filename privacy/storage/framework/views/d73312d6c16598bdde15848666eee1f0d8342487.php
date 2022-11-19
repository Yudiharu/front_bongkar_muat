<?php $__env->startSection('title', 'Add Aju'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Pengajuan No. JO <b><?php echo e($joborder->no_joborder); ?></b></font>
    </span>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-danger">
        <div class="box-body"> 
            <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id'=>'ADD_AJU']); ?>

                      <center><kbd>ADD FORM</kbd></center><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                        <?php echo e(Form::text('no_joborder',$joborder->no_joborder, ['class'=> 'form-control','readonly','id'=>'nojoborder1','required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_pengajuan', 'No Pengajuan:')); ?>

                                        <?php echo e(Form::text('no_pengajuan',null, ['class'=> 'form-control','id'=>'nopengajuan1','required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_pebpib', 'No PEB / PIB:')); ?>

                                        <?php echo e(Form::text('no_pebpib',null, ['class'=> 'form-control','id'=>'nopebpib1','required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_bl', 'No BL:')); ?>

                                        <?php echo e(Form::text('no_bl',null, ['class'=> 'form-control','id'=>'nobl1','required'])); ?>

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
                <?php echo Form::open(['id'=>'UPDATE_AJU']); ?>

                    <center><kbd>EDIT FORM</kbd></center><br>
                            <div class="row">   
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::hidden('id',null, ['class'=> 'form-control','readonly','id'=>'ID'])); ?>

                                        <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                        <?php echo e(Form::text('no_joborder',$joborder->no_joborder, ['class'=> 'form-control','readonly','id'=>'nojoborder2'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_pengajuan', 'No Pengajuan:')); ?>

                                        <?php echo e(Form::text('no_pengajuan',null, ['class'=> 'form-control','id'=>'nopengajuan2','required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_pebpib', 'No PEB / PIB:')); ?>

                                        <?php echo e(Form::text('no_pebpib',null, ['class'=> 'form-control','id'=>'nopebpib2','required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_bl', 'No BL:')); ?>

                                        <?php echo e(Form::text('no_bl',null, ['class'=> 'form-control','id'=>'nobl2','required'])); ?>

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


   <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-warning">
                        <th>No Job Order</th>
                        <th>No Pengajuan</th>
                        <th>No PEB / PIB</th>
                        <th>No BL</th>
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
            .add-button {
                background-color: #00E0FF;
                bottom: 96px;
            }

            .hapus-button {
                background-color: #F63F3F;
                bottom: 126px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 156px;
            }

            .view-button {
                background-color: #149933;
                bottom: 186px;
            }

            #mySidenav button {
              position: fixed;
              right: -60px;
              transition: 0.3s;
              padding: 4px 8px;
              width: 120px;
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
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editaju" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-jo')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusaju" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
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
            $('.back2Top').show();
            $('.hapus-button').hide();
            $('.edit-button').hide();
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
        var no_joborder = $('#nojoborder1').val();
        
        $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'http://localhost/gui_front_emkl_laravel/admin/joborderdetail/getDatabyIDaju?id='+no_joborder,
            data:{'no_joborder':no_joborder},
            columns: [
                { data: 'no_joborder', name: 'no_joborder' },
                { data: 'no_pengajuan', name: 'no_pengajuan' },
                { data: 'no_pebpib', name: 'no_pebpib' },
                { data: 'no_bl', name: 'no_bl' },
            ]
            
        });
        
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
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var no_joborder = select.find('td:eq(0)').text();                    
                    var no_pengajuan = select.find('td:eq(1)').text();
                    
                    $('.hapus-button').show();
                    $('.edit-button').show();
                }
            });

            $('#editaju').click( function () {
                var select = $('.selected').closest('tr');
                var no_pengajuan = select.find('td:eq(1)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborderdetail.edit_aju'); ?>',
                    type: 'POST',
                    data : {
                        'no_pengajuan': no_pengajuan,
                    },
                    success: function(results) {
                        console.log(results);
                        $('#ID').val(results.id);
                        $('#nojoborder2').val(results.no_joborder);
                        $('#nopengajuan2').val(results.no_pengajuan);
                        $('#nopebpib2').val(results.no_pebpib);
                        $('#nobl2').val(results.no_bl);
                        $('.editform').show();
                        $('.addform').hide();
                    }
                });
            });

            $('#hapusaju').click( function () {
                var select = $('.selected').closest('tr');
                var no_pengajuan = select.find('td:eq(1)').text();
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
                            url: '<?php echo route('joborderdetail.hapus_aju'); ?>',
                            type: 'POST',
                            data : {
                                'no_pengajuan': no_pengajuan,
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

        function refreshTable() {
             $('#data2-table').DataTable().ajax.reload(null,false);;
        }
            
        $('#ADD_AJU').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var registerForm = $("#ADD_AJU");
            var formData = registerForm.serialize();

            // Check if empty of not
            $.ajax({
                    url:'<?php echo route('joborderdetail.storeaju'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#nopengajuan1').val('');
                        $('#nopebpib1').val('');
                        $('#nobl1').val('');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
            
        });

        $('#UPDATE_AJU').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            
            var registerForm = $("#UPDATE_AJU");
            var formData = registerForm.serialize();
                $.ajax({
                    url:'<?php echo route('joborderdetail.updateajaxaju'); ?>',
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

        function cancel_edit(){
            $(".addform").show();
            $(".editform").hide();
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>