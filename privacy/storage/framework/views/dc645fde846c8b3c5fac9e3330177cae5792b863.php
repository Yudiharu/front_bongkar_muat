

<?php $__env->startSection('title', 'Edit Tarif'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <button type="button" class="btn btn-danger btn-xs" onclick="back()"><i class="fa fa-arrow-left"></i> Kembali</button>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Edit Tarif Gudang <b><?php echo e($kode_gudang); ?></b></font>
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
                                
                                        <?php echo e(Form::hidden('kode_gudang',$kode_gudang, ['class'=> 'form-control','readonly','id'=>'kodegudang'])); ?>

                                    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('nama_gudang', 'Nama Gudang:')); ?>

                                        <?php echo e(Form::text('nama_gudang',$gudangdetail->nama_gudang,
                                         ['class'=> 'form-control','style'=>'width: 100%','id'=>'namagudang', 'readonly'])); ?>

                                    </div>
                                </div>

                                        <?php echo e(Form::hidden('kode_shipper',$kode_shipper, ['class'=> 'form-control','readonly','id'=>'kodeshipper'])); ?>

                                    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('nama_shipper', 'Nama Shipper:')); ?>

                                        <?php echo e(Form::text('nama_shipper',$gudang->customer->nama_customer,
                                         ['class'=> 'form-control','style'=>'width: 100%','id'=>'namashipper', 'readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tanggal_berlaku', 'Tanggal Berlaku:')); ?>

                                        <?php echo e(Form::date('tanggal_berlaku',null,
                                         ['class'=> 'form-control','style'=>'width: 100%','id'=>'tanggal'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tarif_trucking', 'Tarif Trucking:')); ?>

                                        <?php echo e(Form::text('tarif_trucking',0,
                                         ['class'=> 'form-control','style'=>'width: 100%','required'=>'required','id'=>'tarif'])); ?>

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
                                
                                    <?php echo e(Form::hidden('kode_gudang',$kode_gudang, ['class'=> 'form-control','readonly','id'=>'kodegudang2'])); ?>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('nama_gudang', 'Nama Gudang:')); ?>

                                            <?php echo e(Form::text('nama_gudang',$gudangdetail->nama_gudang,
                                             ['class'=> 'form-control','style'=>'width: 100%','id'=>'namagudang2', 'readonly'])); ?>

                                        </div>
                                    </div>

                                            <?php echo e(Form::hidden('kode_shipper',$kode_shipper, ['class'=> 'form-control','readonly','id'=>'namacustomer2'])); ?>

                                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('nama_shipper', 'Nama Shipper:')); ?>

                                            <?php echo e(Form::text('nama_shipper',$gudang->customer->nama_customer,
                                             ['class'=> 'form-control','style'=>'width: 100%','id'=>'namashipper2', 'readonly'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('tanggal_berlaku', 'Tanggal Berlaku:')); ?>

                                            <?php echo e(Form::date('tanggal_berlaku',null,
                                             ['class'=> 'form-control','style'=>'width: 100%','id'=>'tanggal2', 'readonly'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('tarif_trucking', 'Tarif Trucking:')); ?>

                                            <?php echo e(Form::text('tarif_trucking',0,
                                             ['class'=> 'form-control','style'=>'width: 100%','required'=>'required','id'=>'tarif2'])); ?>

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

            <!-- <div class="editform">
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['id'=>'EDIT']); ?>

                    <center><kbd>EDIT FORM</kbd></center><br>
                            <div class="row">  

                                        <?php echo e(Form::hidden('kode_gudang',$kode_gudang, ['class'=> 'form-control','readonly','id'=>'kodegudang2'])); ?>

                                    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('nama_gudang', 'Nama Gudang:')); ?>

                                        <?php echo e(Form::text('nama_gudang',$gudangdetail->nama_gudang,
                                         ['class'=> 'form-control','style'=>'width: 100%','id'=>'namagudang', 'readonly'])); ?>

                                    </div>
                                </div>

                                        <?php echo e(Form::hidden('kode_shipper',$kode_shipper, ['class'=> 'form-control','readonly','id'=>'namacustomer2'])); ?>

                                    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('nama_shipper', 'Nama Shipper:')); ?>

                                        <?php echo e(Form::text('nama_shipper',$gudang->customer->nama_customer,
                                         ['class'=> 'form-control','style'=>'width: 100%','id'=>'namashipper', 'readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tanggal_berlaku', 'Tanggal Berlaku:')); ?>

                                        <?php echo e(Form::date('tanggal_berlaku',null,
                                         ['class'=> 'form-control','style'=>'width: 100%','id'=>'tanggal2', 'readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tarif_trucking', 'Tarif Trucking:')); ?>

                                        <?php echo e(Form::text('tarif_trucking',0,
                                         ['class'=> 'form-control','style'=>'width: 100%','required'=>'required','id'=>'tarif2'])); ?>

                                    </div>
                                </div>
                            </div> 
                            <div class="row-md-2">
                                <span class="pull-right"> 
                                        <?php echo e(Form::submit('Update', ['class' => 'btn btn-success btn-sm','id'=>'submit2'])); ?>

                                        <a href="#" id="canceltarif"><button type="button" class="btn btn-danger btn-sm" onclick="cancel_edit()">Cancel</button></a>&nbsp;
                                </span>
                            </div>
                <?php echo Form::close(); ?>  
            </div> -->
        </div>
    </div>


   <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-danger">
                        <th>Kode Gudang</th>
                        <th>Kode Shipper</th>
                        <th>Tarif Trucking</th>
                        <th>Tanggal Berlaku</th>
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
            <?php if (app('laratrust')->can('update-tarif')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="edittarifdetail" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-tarif')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapustarifdetail" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
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
            // $('.tarifform').hide();
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
        var kode_gudang = $('#kodegudang2').val();
        
        $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'https://aplikasi.gui-group.co.id/gui_front_emkl_laravel/admin/gudangdetail/getDatabyID2?id='+kode_gudang,
            data:{'kode_gudang':kode_gudang},

            columns: [
                { data: 'kode_gudang', name: 'kode_gudang' },
                { data: 'kode_shipper', name: 'kode_shipper' },
                { data: 'tarif_trucking', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'tanggal_berlaku', name: 'tanggal_berlaku' },
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
                    var no_spbnon = select.find('td:eq(0)').text();
                    var kode_item = select.find('td:eq(1)').text();
                }
            } );

            $('#edittarifdetail').click( function () {
                var select = $('.selected').closest('tr');
                var kode_gudang = select.find('td:eq(0)').text();
                var kode_shipper = select.find('td:eq(1)').text();
                var tarif_trucking = select.find('td:eq(2)').text();
                var tanggal_berlaku = select.find('td:eq(3)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('gudangdetail.edit_tarifdetail'); ?>',
                    type: 'POST',
                    data : {
                        'kode_gudang': kode_gudang,
                        'kode_shipper': kode_shipper,
                        'tarif_trucking': tarif_trucking,
                        'tanggal_berlaku': tanggal_berlaku,
                    },
                    success: function(results) {
                        console.log(results);
                            $('#kodegudang2').val(results.kode_gudang);
                            $('#kodeshipper2').val(results.kode_shipper);
                            $('#namagudang2').val(results.nama_gudang);
                            $('#tarif2').val(results.tarif_trucking);
                            $('#tanggal2').val(results.tanggal_berlaku);
                            $('#ID').val(results.id);
                            $('#editform2').modal('show');
                    }
                });
            });

            $('#hapustarifdetail').click( function () {
                var select = $('.selected').closest('tr');
                var kode_gudang = select.find('td:eq(0)').text();
                var kode_shipper = select.find('td:eq(1)').text();
                var tarif_trucking = select.find('td:eq(2)').text();
                var tanggal_berlaku = select.find('td:eq(3)').text();
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
                            url: '<?php echo route('gudangdetail.hapus_tarifdetail'); ?>',
                            type: 'POST',
                            data : {
                                'kode_gudang': kode_gudang,
                                'kode_shipper': kode_shipper,
                                'tarif_trucking': tarif_trucking,
                                'tanggal_berlaku': tanggal_berlaku
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
        } );

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

        function tablefresh(){
                window.table.draw();
            } 

        function back(){
            // history.go(-1);
            var kodeshipper = $('#kodeshipper').val();
            window.location.replace("https://aplikasi.gui-group.co.id/gui_front_emkl_laravel/admin/gudang/"+kodeshipper+"/detail");
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
                url:'<?php echo route('gudangdetail.store2'); ?>',
                type:'POST',
                data:formData,
                success:function(data) {
                    console.log(data);
                    $('#tarif').val('');
                    $('#tanggal').val('');
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
                    url:'<?php echo route('gudangdetail.updateajax2'); ?>',
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
               
        function edit(id, url) {
           
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        $(".editform").show();
                        $('#kodegudang2').val(results.kode_gudang);
                        $('#kodeshipper2').val(results.kode_shipper);
                        $('#namagudang2').val(results.nama_gudang);
                        $('#tarif2').val(results.tarif_trucking);
                        $('#ID').val(results.id);
                        $(".addform").hide();
                        $(".tarifform").hide();
                       },
                        error : function() {
                        alert("Nothing Data");
                    }
                });
                     
        }

        function cancel_edit(){
            var kode_shipper = $('#namacustomer2').val();
            var add = $("#canceltarif").attr("href","https://aplikasi.gui-group.co.id/gui_front_emkl_laravel/admin/gudang/"+kode_shipper+"/detail");
        }

        function del(id, url) {
            swal({
            title: "Hapus?",
            text: "Pastikan dulu data yang akan dihapus!",
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

        function del2(id, url) {
            var kode_gudang= $('#kodegudang2').val();
            var kode_shipper= $('#namacustomer2').val();
            var tarif_trucking= $('#tarif2').val();
            var tanggal_berlaku= $('#tanggal2').val();

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
                    url:'<?php echo route('gudangdetail.hapusitem'); ?>',
                    type:'POST',
                    data : {
                            'kode_gudang': kode_gudang,
                            'kode_shipper': kode_shipper,
                            'tarif_trucking': tarif_trucking,
                            'tanggal_berlaku': tanggal_berlaku,
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