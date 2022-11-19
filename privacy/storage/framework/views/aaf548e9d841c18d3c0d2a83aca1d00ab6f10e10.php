<?php $__env->startSection('title', 'Spb Container Detail'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <button type="button" class="btn btn-danger btn-xs" onclick="back()"><i class="fa fa-arrow-left"></i> Kembali</button>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Spb Container<b> <?php echo e($no_spb); ?></b></font>
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
                                        <?php echo e(Form::label('no_pembayaran', 'No Pembayaran:')); ?>

                                        <?php echo e(Form::text('no_pembayaran',$no_pembayaran, ['class'=> 'form-control','style'=>'width: 100%','id'=>'nopembayaran1','required','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_spb', 'No SPB Container:')); ?>

                                        <?php echo e(Form::text('no_spb',$no_spb, ['class'=> 'form-control','readonly','id'=>'spb1'])); ?>

                                    </div>
                                </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('tgl_spb', 'Tanggal SPB:')); ?>

                                            <?php echo e(Form::date('tgl_spb', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required'])); ?>

                                         </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('tgl_kembali', 'Tanggal Kembali SPB:')); ?>

                                            <?php echo e(Form::date('tgl_kembali', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Kembali1' ,'required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_mobil', 'Mobil:')); ?>

                                            <?php echo e(Form::select('kode_mobil',$Mobil->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Mobil1','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_sopir', 'Sopir:')); ?>

                                            <?php echo e(Form::select('kode_sopir',$Sopir->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Sopir1','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_pemilik', 'Pemilik:')); ?>

                                            <?php echo e(Form::select('kode_pemilik',$Pemilik->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Pemilik1','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('uang_jalan', 'Uang Jalan:')); ?>

                                            <?php echo e(Form::text('uang_jalan', null, ['class'=> 'form-control','id'=>'Uang1', 'placeholder'=>'Uang Jalan', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('bbm', 'BBM:')); ?>

                                            <?php echo e(Form::text('bbm', null, ['class'=> 'form-control','id'=>'Bbm1', 'placeholder'=>'BBM', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('bpa', 'B/P/A:')); ?>

                                            <?php echo e(Form::text('bpa', null, ['class'=> 'form-control','id'=>'Bpa1', 'placeholder'=>'BPA', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('honor', 'Honor:')); ?>

                                            <?php echo e(Form::text('honor', null, ['class'=> 'form-control','id'=>'Honor1', 'placeholder'=>'Honor', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('biaya_lain', 'Biaya Lain:')); ?>

                                            <?php echo e(Form::text('biaya_lain', null, ['class'=> 'form-control','id'=>'Biaya1', 'placeholder'=>'Honor', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('trucking', 'Trucking:')); ?>

                                            <?php echo e(Form::text('trucking', null, ['class'=> 'form-control','id'=>'Trucking1', 'placeholder'=>'Trucking', 'autocomplete'=>'off','required'])); ?>

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
                                
                                    <?php echo e(Form::hidden('no_pembayaran',$no_pembayaran, ['class'=> 'form-control','style'=>'width: 100%','id'=>'nopembayaran','required','readonly'])); ?>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('no_spb', 'No SPB Container:')); ?>

                                            <?php echo e(Form::text('no_spb',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'nospb','required','readonly'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('tgl_spb', 'Tanggal SPB:')); ?>

                                            <?php echo e(Form::date('tgl_spb', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal' ,'required'=>'required'])); ?>

                                         </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('tgl_kembali', 'Tanggal Kembali SPB:')); ?>

                                            <?php echo e(Form::date('tgl_kembali', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Kembali' ,'required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_mobil', 'Mobil:')); ?>

                                            <?php echo e(Form::select('kode_mobil',$Mobil->sort(),null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Mobil','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_sopir', 'Sopir:')); ?>

                                            <?php echo e(Form::select('kode_sopir',$Sopir->sort(),null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Sopir','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_pemilik', 'Pemilik:')); ?>

                                            <?php echo e(Form::select('kode_pemilik',$Pemilik->sort(),null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Pemilik','required'=>'required'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('uang_jalan', 'Uang Jalan:')); ?>

                                            <?php echo e(Form::text('uang_jalan', null, ['class'=> 'form-control','id'=>'Uang', 'placeholder'=>'Uang Jalan', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('bbm', 'BBM:')); ?>

                                            <?php echo e(Form::text('bbm', null, ['class'=> 'form-control','id'=>'Bbm', 'placeholder'=>'BBM', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('bpa', 'B/P/A:')); ?>

                                            <?php echo e(Form::text('bpa', null, ['class'=> 'form-control','id'=>'Bpa', 'placeholder'=>'BPA', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('honor', 'Honor:')); ?>

                                            <?php echo e(Form::text('honor', null, ['class'=> 'form-control','id'=>'Honor', 'placeholder'=>'Honor', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('biaya_lain', 'Biaya Lain:')); ?>

                                            <?php echo e(Form::text('biaya_lain', null, ['class'=> 'form-control','id'=>'Biaya', 'placeholder'=>'Honor', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('trucking', 'Trucking:')); ?>

                                            <?php echo e(Form::text('trucking', null, ['class'=> 'form-control','id'=>'Trucking', 'placeholder'=>'Trucking', 'autocomplete'=>'off','required'])); ?>

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
                        <th>No SPB Container</th>
                        <th>Tanggal SPB</th>
                        <th>Tanggal Kembali</th>
                        <th>Mobil</th>
                        <th>Sopir</th>
                        <th>Pemilik</th>
                        <th>Uang Jalan</th>
                        <th>BBM</th>
                        <th>B/P/A</th>
                        <th>Honor</th>
                        <th>Biaya Lain</th>
                        <th>Trucking</th>
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
                bottom: 66px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 96px;
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
            <?php if (app('laratrust')->can('update-customer')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editspb" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-customer')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusspb" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
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

        function gettotal(){
            var qty= $('#qty').val();
            var berat= $('#berat').val();

            var total = qty * berat;
            $('#total').val(total);
        }

        function gettotal2(){
            var qty2= $('#qty3').val();
            var berat2= $('#berat3').val();

            var total2 = qty2 * berat2;
            $('#total3').val(total2);
        }
        
    $(function(){
        var no_spb = $('#spb1').val();
        console.log(no_spb);
        $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'http://localhost/gui_front_emkl_laravel/admin/pembayarandetail/getDatabyID2?id='+no_spb,
            data:{'no_spb':no_spb},

            columns: [
                { data: 'no_spb', name: 'no_spb' },
                { data: 'tgl_spb', name: 'tgl_spb' },
                { data: 'tgl_kembali', name: 'tgl_kembali' },
                { data: 'mobil.nopol', name: 'mobil.nopol' },
                { data: 'sopir.nama_sopir', name: 'sopir.nama_sopir' },
                { data: 'pemilik.nama_pemilik', name: 'pemilik.nama_pemilik' },
                { data: 'uang_jalan', name: 'uang_jalan' },
                { data: 'bbm', name: 'bbm' },
                { data: 'bpa', name: 'bpa' },
                { data: 'honor', name: 'honor' },
                { data: 'biaya_lain', name: 'biaya_lain' },
                { data: 'trucking', name: 'trucking' },
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

            $('#editspb').click( function () {
                var select = $('.selected').closest('tr');
                var no_spb = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('pembayarandetail.edit_spb'); ?>',
                    type: 'POST',
                    data : {
                        'no_spb': no_spb,
                    },
                    success: function(results) {
                        console.log(results);
                        $('#nospb').val(results.no_spb);
                        $('#Tanggal').val(results.tgl_spb);
                        $('#Kembali').val(results.tgl_kembali);
                        $('#Mobil').val(results.kode_mobil);
                        $('#Sopir').val(results.kode_sopir);
                        $('#Pemilik').val(results.kode_pemilik);
                        $('#Uang').val(results.uang_jalan);
                        $('#Bbm').val(results.bbm);
                        $('#Bpa').val(results.bpa);
                        $('#Honor').val(results.honor);
                        $('#Biaya').val(results.biaya_lain);
                        $('#Trucking').val(results.trucking);
                        $('#editform2').modal('show');
                    }
                });
            });

            $('#hapusspb').click( function () {
                var select = $('.selected').closest('tr');
                var no_spb = select.find('td:eq(0)').text();
                var no_pembayaran= $('#nopembayaran1').val();

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
                            url: '<?php echo route('pembayarandetail.hapus_spb'); ?>',
                            type: 'POST',
                            data : {
                                'no_spb': no_spb,
                                'no_pembayaran': no_pembayaran,
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

        function tablefresh(){
            window.table.draw();
        } 

        function back(){
            // history.go(-1);
            var nopembayaran = $('#nopembayaran1').val();
            window.location.replace("http://localhost/gui_front_emkl_laravel/admin/pembayaran/"+nopembayaran+"/detail");
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
                url:'<?php echo route('pembayarandetail.store2'); ?>',
                type:'POST',
                data:formData,
                success:function(data) {
                    console.log(data);
                    $('#Tanggal1').val('');
                    $('#Kembali1').val('');
                    $('#Mobil1').val('').trigger('change');
                    $('#Sopir1').val('').trigger('change');
                    $('#Pemilik1').val('').trigger('change');
                    $('#Uang1').val('');
                    $('#Bbm1').val('');
                    $('#Bpa1').val('');
                    $('#Honor1').val('');
                    $('#Biaya1').val('');
                    $('#Trucking1').val('');
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
                    url:'<?php echo route('pembayarandetail.updateajax2'); ?>',
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
                        $('#nospb').val(results.no_spb);
                        $('#Tanggal').val(results.tgl_spb);
                        $('#Kembali').val(results.tgl_kembali);
                        $('#Mobil').val(results.kode_mobil);
                        $('#Sopir').val(results.kode_sopir);
                        $('#Pemilik').val(results.kode_pemilik);
                        $('#Uang').val(results.uang_jalan);
                        $('#Bbm').val(results.bbm);
                        $('#Bpa').val(results.bpa);
                        $('#Honor').val(results.honor);
                        $('#Biaya').val(results.biaya_lain);
                        $('#Trucking').val(results.trucking);
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
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>