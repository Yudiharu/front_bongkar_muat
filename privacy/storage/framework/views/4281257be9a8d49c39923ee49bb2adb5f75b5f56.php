<?php $__env->startSection('title', 'Cash Bank Transfer'); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    <button type="button" class="btn btn-default btn-xs" id="button10">
                        <i class="fa fa-refresh"></i> Refresh</button>

                    <?php if (app('laratrust')->can('create-cashbanktransfer')) : ?>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Cash Bank Transfer</button>
                    <?php endif; // app('laratrust')->can ?>

                    <span class="pull-right">  
                        <font style="font-size: 16px;"><b>CASH BANK TRANSFER</b></font>
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-blue">
                        <th>No CBT</th>
                        <th>Tgl CBT</th>
                        <th>Jenis CBT</th>
                        <th>No.Jurnal</th>
                        <th>CB Dari</th>
                        <th>Ket.Dari</th>
                        <th>CB Tujuan</th>
                        <th>Ket.Tujuan</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                </table>
            </div>
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
            <?php echo Form::open(['id'=>'ADD']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Tanggal Transfer', 'Tanggal CBT:')); ?>

                                    <?php echo e(Form::date('tgl_cbt', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'tgltrf1','required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_jurnal', 'Kode Journal:')); ?>

                                    <?php echo e(Form::select('kode_jurnal', $Jurnal, null, ['class'=>'form-control select2','id'=>'Jurnal1','style'=>'width: 100%','placeholder'=>'','onchange'=>'isijurnal();'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_jurnal', 'No.Journal:')); ?>

                                    <?php echo e(Form::text('no_jurnal', null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'nojurnal','required','readonly'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('cb_dari', 'CB Dari:')); ?>

                                    <?php echo e(Form::select('cb_dari', $Cashbank, null, ['class'=>'form-control select2','id'=>'cbdari','style'=>'width: 100%','placeholder' => ''])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('ket_dari', 'Ket.Dari:')); ?>

                                    <?php echo e(Form::text('ket_dari',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'ketdari','required','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('cb_tujuan', 'CB Tujuan:')); ?>

                                    <?php echo e(Form::select('cb_tujuan', $Cashbank, null, ['class'=>'form-control select2','id'=>'cbtujuan','style'=>'width: 100%','placeholder' => ''])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('ket_tujuan', 'Ket.Tujuan:')); ?>

                                    <?php echo e(Form::text('ket_tujuan',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'kettujuan','required','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('jenis_cbt', 'Jenis CBT:',['class'=>'control-label'])); ?>

                                    <?php echo e(Form::select('jenis_cbt', ['Uang Muka'=>'Uang Muka','Kas Bon'=>'Kas Bon','Lainnya'=>'Lainnya','Penyelesaian Kas Bon'=>'Penyelesaian Kas Bon'],null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'jnscbt','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_jo', 'No.JO:')); ?>

                                    <?php echo e(Form::text('no_jo',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'nojo','required','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('grand_total', 'Grand Total:')); ?>

                                    <?php echo e(Form::text('grand_total',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'grandtotal','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

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
            <?php echo Form::open(['id'=>'EDIT']); ?>

                <div class="modal-body">
                    <div class="row">
                        <?php echo e(Form::hidden('no_cbt',null, ['class'=> 'form-control','readonly','id'=>'nocbt'])); ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('Tanggal Transfer', 'Tanggal CBT:')); ?>

                                <?php echo e(Form::date('tgl_cbt', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'tgltrf2','required'=>'required'])); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_jurnal', 'Kode Journal:')); ?>

                                <?php echo e(Form::text('kode_jurnal', null, ['class'=>'form-control','id'=>'Jurnal2','style'=>'width: 100%','placeholder'=>'','disabled'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_jurnal', 'No.Journal:')); ?>

                                    <?php echo e(Form::text('no_jurnal', null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'nojurnal2','required','readonly'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('cb_dari', 'CB Dari:')); ?>

                                    <?php echo e(Form::select('cb_dari', $Cashbank, null, ['class'=>'form-control select','id'=>'cbdari2','style'=>'width: 100%','placeholder' => ''])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('ket_dari', 'Ket.Dari:')); ?>

                                    <?php echo e(Form::text('ket_dari',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'ketdari2','required','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('cb_tujuan', 'CB Tujuan:')); ?>

                                    <?php echo e(Form::select('cb_tujuan', $Cashbank, null, ['class'=>'form-control select','id'=>'cbtujuan2','style'=>'width: 100%','placeholder' => ''])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('ket_tujuan', 'Ket.Tujuan:')); ?>

                                    <?php echo e(Form::text('ket_tujuan',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'kettujuan2','required','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('jenis_cbt', 'Jenis CBT:',['class'=>'control-label'])); ?>

                                    <?php echo e(Form::select('jenis_cbt', ['Uang Muka'=>'Uang Muka','Kas Bon'=>'Kas Bon','Lainnya'=>'Lainnya','Penyelesaian Kas Bon'=>'Penyelesaian Kas Bon'],null, ['class'=> 'form-control select','style'=>'width: 100%','placeholder' => '','id'=>'jnscbt2','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_jo', 'No.JO:')); ?>

                                    <?php echo e(Form::text('no_jo',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'nojo2','required','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('grand_total', 'Grand Total:')); ?>

                                    <?php echo e(Form::text('grand_total',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'grandtotal2','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

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

    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-map-marker" style="color: #fff"></i> <i><?php echo e($nama_company); ?></i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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
                bottom: 56px;
            }

            .hapus-button {
                background-color: #F63F3F;
                bottom: 86px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 116px;
            }

            .tombol1 {
                background-color: #149933;
                bottom: 156px;
            }

            .tombol2 {
                background-color: #ff9900;
                bottom: 156px;
            }

            .view-button {
                background-color: #1674c7;
                bottom: 186px;
            }

            .print-button {
                background-color: #F63F3F;
                bottom: 216px;
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
            <?php if (app('laratrust')->can('update-cashbanktransfer')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editcbt" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-cashbanktransfer')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuscbt" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>
            
            <?php if (app('laratrust')->can('post-cashbanktransfer')) : ?>
            <button type="button" class="btn btn-success btn-xs tombol1" id="button1">POST <i class="fa fa-bullhorn"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('unpost-cashbanktransfer')) : ?>
            <button type="button" class="btn btn-warning btn-xs tombol2" id="button2">UNPOST <i class="fa fa-undo"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('print-cashbanktransfer')) : ?>
            <a href="#" target="_blank" id="printcashbanktransfer"><button type="button" class="btn btn-danger btn-xs print-button" id="button6">PRINT <i class="fa fa-print"></i></button></a>
            <?php endif; // app('laratrust')->can ?>
        </div>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script type="text/javascript">
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
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.add-button').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.print-button').hide();
            $('.back2Top').show();
        }

        
        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('cashbanktransfer.data'); ?>',
            columns: [
                { data: 'no_cbt', name: 'no_cbt' },
                { data: 'tgl_cbt', name: 'tgl_cbt' },
                { data: 'jenis_cbt', name: 'jenis_cbt' },
                { data: 'no_jurnal', name: 'no_jurnal' },
                { data: 'cb_dari', name: 'cb_dari' },
                { data: 'ket_dari', name: 'ket_dari' },
                { data: 'cb_tujuan', name: 'cb_tujuan' },
                { data: 'ket_tujuan', name: 'ket_tujuan' },
                { data: 'grand_total', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'status', 
                    render: function( data, type, full ) {
                    return formatStatus(data); }
                },
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

        function formatStatus(n) {
            console.log(n);
            if(n != 'POSTED'){
                return n;
            }else{
                var stat = "<span style='color:#0eab25'><b>POSTED</b></span>";
                return n.replace(/POSTED/, stat);
            }
        }

        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            var post = document.getElementById("button1");
            var unpost = document.getElementById("button2");

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.print-button').hide();
                    $('.view-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(9)').text();
                    var no_cbt = select.find('td:eq(0)').text();
                    var print = $("#printcashbanktransfer").attr("href","http://localhost/gui_inventory_laravel/admin/cashbanktransfer/exportpdf?no_cbt="+no_cbt);
                    var status = colom;
                    if(status == 'POSTED'){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        $('.add-button').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.print-button').show();
                        $('.view-button').show();
                    }else if(status =='OPEN'){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                        $('.add-button').show();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                        $('.print-button').hide();
                        $('.view-button').show();
                    }else{
                        $('.tombol1').hide();
                        $('.tombol2').hide();
                        $('.add-button').show();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                        $('.print-button').hide();
                        $('.view-button').hide();
                    }
                }
            } );

            $('#button1').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_cbt = colom;
                console.log(no_cbt);
                swal({
                    title: "Post?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Posting!",
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
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                        $.ajax({
                            url: '<?php echo route('cashbanktransfer.post'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_cbt
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Posted!',
                                    'Your file has been posted.',
                                    'success'
                                    )
                                    refreshTable();
                                }
                                else{
                                  swal({
                                      title: 'Error',
                                      text: result.message,
                                      type: 'error',
                                  })
                                }
                            },
                            error : function () {
                              swal({
                                  title: 'Oops...',
                                  text: 'Gagal',
                                  type: 'error',
                                  timer: '1500'
                              })
                            }
                        });
                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                })
            });

            $('#button2').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_cbt = colom;
                console.log(no_cbt);
                swal({
                    title: "Unpost?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Unpost!",
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
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('cashbanktransfer.unpost'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_cbt
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Unposted!',
                                    'Data berhasil di Unpost.',
                                    'success'
                                    )
                                    refreshTable();
                                }
                                else{
                                  swal({
                                      title: 'Error',
                                      text: result.message,
                                      type: 'error',
                                  })
                                }
                            },
                            error : function () {
                              swal({
                                  title: 'Oops...',
                                  text: data.message,
                                  type: 'error',
                                  timer: '1500'
                              })
                            }
                        });
                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                })
            });

            $('#button10').click( function () {
                location.reload();
            });

            $('#editcbt').click( function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var select = $('.selected').closest('tr');
                var no_cbt = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    type: 'POST',
                    url: '<?php echo route('cashbanktransfer.edit_cashbanktransfer'); ?>',
                    data: {'id': no_cbt },
                    dataType: 'JSON',
                    success: function (results) {
                        $('#nocbt').val(results.no_cbt);
                        $('#tgltrf2').val(results.tgl_cbt);
                        $('#Jurnal2').val(results.kode_jurnal);
                        $('#nojurnal2').val(results.nojurnal);
                        $('#cbdari2').val(results.cb_dari);
                        $('#ketdari2').val(results.ket_dari);
                        $('#cbtujuan2').val(results.cb_tujuan);
                        $('#kettujuan2').val(results.ket_tujuan);
                        $('#nojo2').val(results.no_jo);
                        $('#jnscbt2').val(results.jenis_cbt);
                        $('#grandtotal2').val(results.grand_total);
                        $('#editform').modal('show');
                        },
                        error : function() {
                        swal("GAGAL!<br><b>Status POSTED/RECEIVED/CLOSED</b>");
                    }
                });
            });

            $('#hapuscbt').click( function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var select = $('.selected').closest('tr');
                var no_cbt = select.find('td:eq(0)').text();
                var row = table.row( select );
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
                        type: 'POST',
                        url: '<?php echo route('cashbanktransfer.hapus_cashbanktransfer'); ?>',
                        data: {'id': no_cbt },
                        dataType: 'JSON',
                        success: function (results) {
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
            if ((("0123456789.-").indexOf(keychar) > -1)) {
                return true;
            } else
            if (decimal && (keychar == ".")) {
                return true;
            } else return false;
        }

        function isijurnal(){
            var kodejurnal= $('#Jurnal1').val();
            var tgl = $('#tgltrf1').val();

             $.ajax({
                url:'<?php echo route('cashbanktransfer.isijurnal'); ?>',
                type:'POST',
                data : {
                        'id': kodejurnal,
                        'tglcbt': tgl,
                    },
                success: function(result) {
                        console.log(result);
                            $('#nojurnal').val(result.hasil);
                            submit.disabled = false;
                    },
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
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('cashbanktransfer.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#addform').modal('show');
                        $('#tgltrf1').val('');
                        $('#Jurnal1').val('').trigger('change');
                        $('#nojurnal').val('');
                        $('#cbdari').val('').trigger('change');
                        $('#ketdari').val('');
                        $('#cbtujuan').val('').trigger('change');
                        $('#kettujuan').val('');
                        $('#jnscbt').val('').trigger('change');
                        $('#nojo').val('');
                        $('#grandtotal').val('');
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
            //var nama = $.trim($('#Nama2').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('cashbanktransfer.ajaxupdate'); ?>',
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
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>