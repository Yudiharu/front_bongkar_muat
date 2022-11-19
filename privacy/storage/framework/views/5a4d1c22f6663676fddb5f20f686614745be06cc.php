<?php $__env->startSection('title', 'Spb Non-Container Detail'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <button type="button" class="btn btn-danger btn-xs" onclick="back()"><i class="fa fa-arrow-left"></i> Kembali</button>
    <button type="button" class="btn btn-default btn-xs" onclick="tablefresh()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Spb Non-Container<b> <?php echo e($no_spbnon); ?></b></font>
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
                                        <?php echo e(Form::label('no_hasilbagi', 'No Hasil Bagi:')); ?>

                                        <?php echo e(Form::text('no_hasilbagi',$no_hasilbagi, ['class'=> 'form-control','style'=>'width: 100%','id'=>'nohasilbagi','required','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_spbnon', 'No SPB Non Container:')); ?>

                                        <?php echo e(Form::text('no_spbnon',$no_spbnon, ['class'=> 'form-control','readonly','id'=>'spbnon'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_item', 'Item:')); ?>

                                        <?php echo e(Form::text('kode_item',null, ['class'=> 'form-control','required','id'=>'item'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <?php echo e(Form::label('qty', 'QTY:')); ?>

                                        <?php echo e(Form::text('qty',null, ['class'=> 'form-control','required','id'=>'qty','onkeyup'=>'gettotal()'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('berat_satuan', 'Berat Satuan:')); ?>

                                        <?php echo e(Form::text('berat_satuan',null, ['class'=> 'form-control','required','id'=>'berat','onkeyup'=>'gettotal()'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('total_berat', 'Total Berat:')); ?>

                                        <?php echo e(Form::text('total_berat',null, ['class'=> 'form-control','required','id'=>'total', 'readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('keterangan', 'Keterangan:')); ?>

                                        <?php echo e(Form::textarea('keterangan', null, ['class'=> 'form-control','rows'=>'2','id'=>'keterangan', 'placeholder'=>'Keterangan', 'autocomplete'=>'off','required'])); ?>

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
                                            <?php echo e(Form::label('no_spbnon', 'No SPB Non Container:')); ?>

                                            <?php echo e(Form::text('no_spbnon',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'nospbnon3','required','readonly'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('kode_item', 'Item:')); ?>

                                            <?php echo e(Form::text('kode_item',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'item3','required'=>'required'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('qty', 'Qty:')); ?>

                                            <?php echo e(Form::text('qty',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'qty3','required'=>'required','onkeyup'=>'gettotal2()'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('berat_satuan', 'Berat Satuan:')); ?>

                                            <?php echo e(Form::text('berat_satuan',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'berat3','required'=>'required','onkeyup'=>'gettotal2()'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('total_berat', 'Total Berat:')); ?>

                                            <?php echo e(Form::text('total_berat',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'total3','required','readonly'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('keterangan', 'Keterangan:')); ?>

                                            <?php echo e(Form::textarea('keterangan', null, ['class'=> 'form-control','rows'=>'2','id'=>'keterangan3', 'placeholder'=>'Keterangan', 'autocomplete'=>'off','required'])); ?>

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
                        <th>No SPB Non Container</th>
                        <th>Item</th>
                        <th>QTY</th>
                        <th>Berat Satuan</th>
                        <th>Total Berat</th>
                        <th>Keterangan</th>
                     </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-warning">
                            <th class="text-center" colspan="4">Total</th>
                            <th id="grandtotal">-</th>
                            <th></th>
                        </tr>
                    </tfoot>
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
            <?php if (app('laratrust')->can('update-customer')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editspbnon" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-customer')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusspbnon" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
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
        var no_spbnon = $('#spbnon').val();
        // console.log(no_spbnon);
        $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'http://localhost/gui_front_emkl_laravel/admin/hasilbagidetail/getDatabyID2?id='+no_spbnon,
            data:{'no_spbnon':no_spbnon},
            footerCallback: function ( row, data, start, end, display ) {
                var api = this.api(), data;
        
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                    i : 0;
                };
            
                // Total over this page
                grandTotal = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                            
                // Update footer
                $( api.column( 4 ).footer() ).html(
                    formatRupiah(grandTotal)
                );
            },

            columns: [
                { data: 'no_spbnon', name: 'no_spbnon' },
                { data: 'kode_item', name: 'kode_item' },
                { data: 'qty', name: 'qty' },
                { data: 'berat_satuan',
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'total_berat',
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'keterangan', name: 'keterangan' },
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

            $('#editspbnon').click( function () {
                var select = $('.selected').closest('tr');
                var no_spbnon = select.find('td:eq(0)').text();
                var kode_item = select.find('td:eq(1)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('hasilbagidetail.edit_spbnon'); ?>',
                    type: 'POST',
                    data : {
                        'no_spbnon': no_spbnon,
                        'kode_item': kode_item
                    },
                    success: function(results) {
                        console.log(results);
                        $('#nospbnon3').val(results.no_spbnon);
                        $('#Kode').val(results.id);
                        $('#item3').val(results.kode_item);
                        $('#qty3').val(results.qty);
                        $('#berat3').val(results.berat_satuan);
                        $('#total3').val(results.total_berat);
                        $('#keterangan3').val(results.keterangan);
                        $('#editform2').modal('show');
                    }
                });
            });

            $('#hapusspbnon').click( function () {
                var select = $('.selected').closest('tr');
                var no_spbnon = select.find('td:eq(0)').text();
                var kode_item = select.find('td:eq(1)').text();
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
                            url: '<?php echo route('hasilbagidetail.hapus_spbnon'); ?>',
                            type: 'POST',
                            data : {
                                'no_spbnon': no_spbnon,
                                'kode_item': kode_item
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
            var nohasilbagi = $('#nohasilbagi').val();
            window.location.replace("http://localhost/gui_front_emkl_laravel/admin/hasilbagi/"+nohasilbagi+"/detail");
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
                url:'<?php echo route('hasilbagidetail.store2'); ?>',
                type:'POST',
                data:formData,
                success:function(data) {
                    console.log(data);
                    $('#item').val('');
                    $('#qty').val('');
                    $('#berat').val('');
                    $('#total').val('');
                    $('#keterangan').val('');
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
                    url:'<?php echo route('hasilbagidetail.updateajax2'); ?>',
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
                        $('#spbnon2').val(results.no_spbnon);
                        $('#item2').val(results.kode_item);
                        $('#qty2').val(results.qty);
                        $('#berat2').val(results.berat_satuan);
                        $('#total2').val(results.total_berat);
                        $('#keterangan2').val(results.keterangan);
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