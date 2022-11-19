<?php $__env->startSection('title', 'Tarif Kegiatan'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Tarif <b><?php echo e($kegiatan->description); ?></b></font>
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
                <?php echo e(Form::hidden('id_kegiatan',$kegiatan->id, ['class'=> 'form-control','readonly','id'=>'kodekegiatan'])); ?>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo e(Form::label('tipe', 'Jenis Harga:')); ?>

                        <?php echo e(Form::select('jenis_harga', $jenis, null, ['class'=> 'form-control select2', 'style'=>'width: 100%', 'placeholder' => '', 'id'=>'tipe1', 'required'])); ?>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <?php echo e(Form::label('Tanggal', 'Tanggal Berlaku:')); ?>

                        <?php echo e(Form::date('tgl_berlaku', null,['class'=> 'form-control','id'=>'Tgl1'])); ?>

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
                <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','readonly','id'=>'id'])); ?>

                <?php echo e(Form::hidden('id_kegiatan', null, ['class'=> 'form-control','readonly','id'=>'kodekegiatan2'])); ?>

                
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

<div class="col-md-5">
   <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                    <thead>
                        <tr class="bg-danger">
                            <th>id</th>
                            <th>Kegiatan</th>
                            <th>Jenis Harga</th>
                            <th>Tgl Berlaku</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i><?php echo e($nama_company); ?></i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>
</div>

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
                bottom: 66px;
            }

            .add-button {
                background-color: #00E0FF;
                bottom: 96px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 126px;
            }

            .view-button {
                background-color: #149933;
                bottom: 156px;
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
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusmember" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>

            <button type="button" class="btn btn-warning btn-xs edit-button" id="editmember" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
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
            $('.edit-button').hide();
            $('.hapus-button').hide();
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
        var id_kegiatan = $('#kodekegiatan').val();
        $('#data2-table').DataTable({
            processing: true,
            serverSide: true,
            ajax:'http://localhost/gui_front_depo_laravel/admin/tarifkegiatan/getDatabyID?id='+id_kegiatan,
            data:{'id_kegiatan':id_kegiatan},
            columns: [
                { data: 'id', name: 'id', visible: false},
                { data: 'id_kegiatan', name: 'id_kegiatan', visible: false },
                { data: 'jenis_harga',  
                    render: function( data, type, full ) {
                    return format_type(data); }, sortable: false
                },
                { data: 'tgl_berlaku', name: 'tgl_berlaku' },
            ]
        });
        
    });

    function format_type(n) {
        if(n == '1'){
                var stat = "<span style='color:#0eab25'><b>UMUM</b></span>";
        }else if (n == '2'){
                var stat = "<span style='color:#c91a1a'><b>ASOSIASI</b></span>";
        }
        return stat;
    }

    function formatSopir(n, m) {
        console.log(m);
        if(n == null){
            var stat = m["kode_sopir"];
            return stat;
        }else{
            var str = n;
            var result = str;
            return result;
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

        function tablefresh(){
                window.table.draw();
            } 

        function refreshTable() {
             $('#data2-table').DataTable().ajax.reload(null,false);;
        }

        $(document).ready(function() {
            var table = $('#data2-table').DataTable();
            $('#data2-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray text-bold') ) {
                    $(this).removeClass('selected bg-gray text-bold');
                    $('.add-button').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray text-bold');
                    var select = $('.selected').closest('tr');
                    var data = $('#data2-table').DataTable().row(select).data();
                    closeOpenedRows(table, select);
                    var id = data['id'];
                    $('.add-button').show();
                    $('.hapus-button').show();
                    $('.edit-button').show();
                }
            });


            var openRows = new Array();

            function closeOpenedRows(table, selectedRow) {
                $.each(openRows, function (index, openRow) {
                    // not the selected row!
                    if ($.data(selectedRow) !== $.data(openRow)) {
                        var rowToCollapse = table.row(openRow);
                        rowToCollapse.child.hide();
                        openRow.removeClass('shown');
                        var index = $.inArray(selectedRow, openRows);                        
                        openRows.splice(index, 1);
                    }
                });
            }

            $('#editmember').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#data2-table').DataTable().row(select).data();
                var id = data['id'];
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('membershipcustomer.edit_detail'); ?>',
                    type: 'POST',
                    data : {
                        'id': id
                    },
                    success: function(results) {
                        console.log(results);
                        $('#id').val(results.id);
                        $('#idheader2').val(results.id_header);
                        $('#kodecustomer2').val(results.kode_customer);
                        $('#Alfiedit1').val(results.tgl_aktif_alfi);
                        $('#Alfiedit2').val(results.tgl_akhir_alfi);
                        $('#Apbmiedit1').val(results.tgl_aktif_apbmi);
                        $('#Apbmiedit2').val(results.tgl_akhir_apbmi);
                        $('.editform').show();
                        $('.addform').hide();
                    }
                });
            });

            $('#hapusmember').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#data2-table').DataTable().row(select).data();
                var id = data['id'];
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
                            url: '<?php echo route('membershipcustomer.hapus_detail'); ?>',
                            type: 'POST',
                            data : {
                                'id': id,
                            },
                            success: function (results) {
                                if (results.success === true) {
                                    swal("Berhasil!", results.message, "success");
                                } else {
                                    swal("Gagal!", results.message, "error");
                                }
                                refreshTable();
                                $('.hapus-button').hide();
                                $('.edit-button').hide();
                            }
                        });
                    }
                });
            });

        });

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
                    url:'<?php echo route('tarifkegiatan.store_detail'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Tgl1').val('');
                        refreshTable();
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
                $.ajax({
                    url:'<?php echo route('membershipcustomer.ajaxupdate_detail'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        $('#QTY2').val('');
                        $('#QTY').val('');

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
               
        function edit(id, url) {
           
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

               $.ajax({
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        $(".editform").show();
                        $('#kodepemilik2').val(results.kode_pemilik);
                        $('#kode_mobil2').val(results.kode_mobil);
                        $('#jenis2').val(results.kode_jenis_mobil);
                        $('#kir2').val(results.kir);
                        $('#stnk2').val(results.masa_stnk);
                        $('#ID').val(results.id);
                        $(".addform").hide();
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
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>