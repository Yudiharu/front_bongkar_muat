<?php $__env->startSection('title', 'Pembelian'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Pembelian</b></font>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#addform"><i class="fa fa-plus">
                        </i> New Pembelian</button>
                    <span class="pull-right"> 
                            <button type="button" class="tombol1 btn btn-success btn-xs" id="button1"><i class="fa fa-bullhorn"></i> POST</button>
                            <button type="button" class="tombol2 btn btn-warning btn-xs" id="button2"><i class="fa fa-undo"></i> UNPOST</button>
                            
                            <a href="#" target="_blank" class="btn btn-default btn-xs" id="button3">
                                <i class="fa fa-print"></i>PRINT
                            </a>
                    </span>
                    
                </div>
            </div>
             <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-danger">
                    <th>No Pembelian</th>
                    <th>Tanggal Pembelian</th>
                    <th>Vendor</th>
                    <th>Jenis PO</th>
                    <th>Total Item</th>
                    <th>Diskon(%)</th>
                    <th>Diskon(Rp)</th>
                    <th>PPN</th>
                    <th>Grand Total</th>
                    <th>Status</th>
                    
                    
                    
                    
                    <th>Created At</th>
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
            <?php echo Form::open(['id'=>'ADD']); ?>

            
                    <div class="modal-body">
                        <div class="row">
                            

                            

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Tanggal Pembelian', 'Tanggal Pembelian:')); ?>

                                    <?php echo e(Form::date('tanggal_pembelian', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required'])); ?>

                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('jenis_po', 'Jenis PO:')); ?>

                                    <?php echo e(Form::select('jenis_po', ['Stock' => 'Stock','Non Stock' => 'Non Stock',
                                'Jasa' => 'Jasa'], null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','id'=>'Jenis1','required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php echo e(Form::label('Kode Vendor', 'Vendor:')); ?>

                                    <?php echo e(Form::select('kode_vendor',$Vendor->sort(),null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','id'=>'Vendor1','required'=>'required'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('No Penawaran', 'No Ref. Penawaran:')); ?>

                                    <?php echo e(Form::text('no_penawaran', null, ['class'=> 'form-control','id'=>'Ref1','required'=>'required', 'placeholder'=>'No. Penawaran'])); ?>

                                 </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('TOP', 'TOP:')); ?>

                                    <?php echo e(Form::text('top', null, ['class'=> 'form-control','id'=>'TOP1','onchange'=>"hitung();",'required'=>'required', 'placeholder'=>'Term Of Payment'])); ?>

                                 </div>
                            </div> 

                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php echo e(Form::label('Due Date', 'Due Date:')); ?>

                                   
                                    <?php echo e(Form::text('due_date', null, ['class'=> 'form-control','id'=>'Due1','required'=>'required', 'placeholder'=>'Tanggal Tenggat'])); ?>

                                 </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('Diskon', 'Diskon(%):')); ?>

                                    <?php echo e(Form::text('diskon_persen', 0, ['class'=> 'form-control','id'=>'Diskon1','placeholder'=>'%'])); ?>

                                    <span class="text-danger">
                                        <strong class="diskon-error" id="diskon-error"></strong>
                                    </span>
                                 </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('Diskons', 'Diskon(Rp):')); ?>

                                    <?php echo e(Form::text('diskon_rp', 0, ['class'=> 'form-control','id'=>'Diskonrp1','placeholder'=>'Rp.'])); ?>

                                    <span class="text-danger">
                                        <strong class="diskonrp-error" id="diskonrp-error"></strong>
                                    </span>
                                 </div>
                            </div> 

                             <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('PPN', 'PPN(%):')); ?>

                                    <?php echo e(Form::text('ppn', 10, ['class'=> 'form-control','id'=>'PPN1','placeholder'=>'%'])); ?>

                                    <span class="text-danger">
                                        <strong class="ppn-error" id="ppn-error"></strong>
                                    </span>
                                 </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                    <?php echo e(Form::textarea('deskripsi', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi1', 'placeholder'=>'Deskripsi'])); ?>

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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Pembelian', 'No Pembelian:')); ?>

                                        <?php echo e(Form::text('no_pembelian', null, ['class'=> 'form-control','id'=>'Pembelian','readonly'])); ?>

                                    </div>
                                </div> 

                                

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Tanggal Pembelian', 'Tanggal Pembelian:')); ?>

                                        <?php echo e(Form::date('tanggal_pembelian', null,['class'=> 'form-control','id'=>'Tanggal'])); ?>

                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('jenis_po', 'Jenis PO:')); ?>

                                        <?php echo e(Form::select('jenis_po', ['Stock' => 'Stock','Non Stock' => 'Non Stock',
                                    'Jasa' => 'Jasa'], null, ['class'=> 'form-control','id'=>'Jenis'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Kode Vendor', 'Vendor:')); ?>

                                        <?php echo e(Form::select('kode_vendor',$Vendor,null, ['class'=> 'form-control','id'=>'Vendor'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('No Penawaran', 'No Ref. Penawaran:')); ?>

                                        <?php echo e(Form::text('no_penawaran', null, ['class'=> 'form-control','id'=>'Ref'])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('TOP', 'TOP:')); ?>

                                        <?php echo e(Form::text('top', null, ['class'=> 'form-control','id'=>'TOP','onchange'=>"hitung2();"])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Due Date', 'Due Date:')); ?>

                                        <?php echo e(Form::text('due_date', null, ['class'=> 'form-control','id'=>'Due'])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Diskon', 'Diskon(%):')); ?>

                                        <?php echo e(Form::text('diskon_persen', null, ['class'=> 'form-control','id'=>'Diskon'])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Diskons', 'Diskon(Rp):')); ?>

                                        <?php echo e(Form::text('diskon_rp', null, ['class'=> 'form-control','id'=>'Diskonrp'])); ?>

                                     </div>
                                </div> 

                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('PPN', 'PPN(%):')); ?>

                                        <?php echo e(Form::text('ppn', null, ['class'=> 'form-control','id'=>'PPN'])); ?>

                                     </div>
                                </div> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                        <?php echo e(Form::textarea('deskripsi', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi'])); ?>

                                     </div>
                                </div> 
        
                                

                                
    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success crud-submit'])); ?>

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
        function load(){
            $('.tombol1').hide();
            $('.tombol2').hide();
        }

        // $('.datepicker').datepicker({
        //     format: 'mm/dd/yyyy',
        //     startDate: '-3d'
        // });

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            // scrollY: true,
            // scrollX: true,
            ajax: '<?php echo route('pembelian.data'); ?>',
            columns: [
                { data: 'no_pembelian', name: 'no_pembelian' },
                { data: 'tanggal_pembelian', name: 'tanggal_pembelian' },
                { data: 'vendor.nama_vendor', name: 'vendor.nama_vendor' },
                { data: 'jenis_po', name: 'jenis_po' },
                { data: 'pembeliandetail_count', name: 'pembeliandetail_count' },
                { data: 'diskon_persen', name: 'diskon_persen' },
                { data: 'diskon_rp', name: 'diskon_rp' },
                { data: 'ppn', name: 'ppn' },
                { data: 'grand_total', name: 'grand_total' },
                { data: 'status', name: 'status' },
                // { data: 'no_penawaran', name: 'no_penawaran' },
                // { data: 'top', name: 'top' },
                // { data: 'due_date', name: 'due_date' },
                
                // { data: 'deskripsi', name: 'deskripsi' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            var post = document.getElementById("button1");
            var unpost = document.getElementById("button2");

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(9)').text();
                    var colom2 = select.find('td:eq(4)').text();
                    var no_pembelian = select.find('td:eq(0)').text();
                    var status = colom;
                    var item = colom2;
                    var print = $("#button3").attr("href","http://localhost/inventory_baru/admin/pembelian/cetakPDF?id="+no_pembelian);
                    // var print = $("#button3").attr("href","<?php echo e(route('permintaan.cetak', ['id' =>"+colom2"])); ?>");
                    if(status == 'POSTED' && item > 0){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        // document.getElementById("button1").style.display="none";
                        // document.getElementById("button2").style.display="block";
                    }else if(status =='UNPOSTED' && item > 0){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                        // document.getElementById("button1").style.display="block";
                        // document.getElementById("button2").style.display="none";
                    }else if(status =='CLOSED' || status =='RECEIVED'){
                        $('.tombol1').hide();
                        $('.tombol2').hide();
                    }else if(item == 0){
                        $('.tombol1').hide();
                        $('.tombol2').hide();
                    }else{
                        $('.tombol1').show();
                        $('.tombol2').hide();
                        // document.getElementById("button1").style.display="block";
                        // document.getElementById("button2").style.display="none";
                    }
                }
            } );
        
           $('#button1').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_pembelian = colom;
                console.log(no_pembelian);
                swal({
                    title: "Post?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, post it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                    }).then(function (e) {
                        
                        if (e.value === true) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                        $.ajax({
                            url: '<?php echo route('pembelian.post'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pembelian
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
                var no_pembelian = colom;
                console.log(no_pembelian);
                swal({
                    title: "Unpost?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, unpost it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                    }).then(function (e) {
                        if (e.value === true) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('pembelian.unpost'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pembelian
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Unposted!',
                                    'Your file has been unposted.',
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
        });

        $('.select2').select2({
            placeholder: "Pilih",
            allowClear: true,
        });

        // var myselect = $('.select2').select2({
        //     placeholder: " Pilih No Permintaan",
        //     allowClear: true,
        // });

        // myselect.on('change', function(e){
        //         var selected_element = $(e.currentTarget);
        //         var select_val = selected_element.val();
        //         // var _token = $("input[name='_token']").val();
        //         console.log(select_val);
        //             $.ajax({        // Memulai ajax
        //                 method: "GET",      
        //                 url: "<?php echo route('pembelian.cari'); ?>",    // file PHP yang akan merespon ajax
        //                 data: { id: select_val}   // data POST yang akan dikirim
        //               })
        //             .done(function(hasilajax) {   // KETIKA PROSES Ajax Request Selesai
                    
        //                 $('.select2').val(hasilajax.no_permintaan);
        //             });
        //          })

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


        function hitung() {
             var tgl_awal = $('#Tanggal1').val();
             var hari = $('#TOP1').val();

             var hasil = new Date(new Date().getTime()+(hari*24*60*60*1000)); 

             var newdate = new Date(hasil);
             var dd = newdate.getDate();
             var mm = newdate.getMonth() + 1;
             var y = newdate.getFullYear();

             var someFormattedDate = y + '-' + mm + '-' + dd;
             document.getElementById('Due1').value = someFormattedDate;
        }

        function hitung2() {
             var tgl_awal = $('#Tanggal').val();
             var hari = $('#TOP').val();

             var hasil = new Date(new Date().getTime()+(hari*24*60*60*1000)); 

             var newdate = new Date(hasil);
             var dd = newdate.getDate();
             var mm = newdate.getMonth() + 1;
             var y = newdate.getFullYear();

             var someFormattedDate = y + '-' + mm + '-' + dd;
             document.getElementById('Due').value = someFormattedDate;
        }
             

        $('#ADD').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            var tanggal = $.trim($('#Tanggal1').val());
            var jenis = $.trim($('#Jenis1').val());
            var vendor = $.trim($('#Vendor1').val());
            var noref = $.trim($('#Ref1').val());
            var top = $.trim($('#TOP1').val());
            var due = $.trim($('#Due1').val());
            var diskon = $.trim($('#Diskon1').val());
            var diskonrp = $.trim($('#Diskonrp1').val());
            var ppn = $.trim($('#PPN1').val());
            var deskripsi = $.trim($('#Deskripsi1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

            // Check if empty of not
            if (diskon == '' || diskonrp == '' || ppn == '') {
                    // if(kode === ''){
                    //     $( '.kode-error' ).html('Mohon di Isi');
                    // }
                    if(diskon == ''){
                        $( '.diskon-error' ).html('Mohon di Isi');
                    }
                    if(diskonrp == ''){
                        $( '.diskonrp-error' ).html('Mohon di Isi');
                    }
                    if(ppn == ''){
                        $( '.ppn-error' ).html('Mohon di Isi');
                    }
                // alert('Mohon Lengkapi Form Isian');
                // return false;
            }else{
                $.ajax({
                    url:'<?php echo route('pembelian.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        $('#addform').modal('show');
                        $('#Tanggal1').val('');
                        $('#Jenis1').val('Pilih');
                        $('#Vendor1').val('');
                        $('#Ref1').val('');
                        $('#TOP1').val('');
                        $('#Due1').val('');
                        $('#Diskon1').val('');
                        $('#Diskonrp1').val('');
                        $('#PPN1').val('');
                        $('#Deskripsi1').val('');
                        $( '.kode-error' ).html('');
                        $( '.name-error' ).html('');
                        $('#addform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Done!", data.message, "success");
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    },
                });
            }
        });

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var pembelian = $.trim($('#Pembelian').val());
            var tanggal = $.trim($('#Tanggal').val());
            var jenis = $.trim($('#Jenis').val());
            var vendor = $.trim($('#Vendor').val());
            var noref = $.trim($('#Ref').val());
            var top = $.trim($('#TOP').val());
            var due = $.trim($('#Due').val());
            var diskon = $.trim($('#Diskon').val());
            var diskonrp = $.trim($('#Diskonrp').val());
            var ppn = $.trim($('#PPN').val());
            var deskripsi = $.trim($('#Deskripsi').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

            // Check if empty of not
            if (pembelian === '' || tanggal === '' || jenis === '' || vendor === '' || noref == '' || top == '' || due == '' || ppn == '' || deskripsi == '') {
                alert('Mohon Lengkapi Form Isian');
                return false;
            }else{
                $.ajax({
                    url:'<?php echo route('pembelian.updateajax'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Done!", data.message, "success");
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    },
                });
            }
        });

        function edit(id, url) {
            swal({
            title: "Edit?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, edit it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        // console.log(result);
                        // $('#Memo').val(result.no_memo);
                        $('#editform').modal('show');
                        $('#Pembelian').val(results.no_pembelian);
                        $('#Vendor').val(results.kode_vendor);
                        $('#Tanggal').val(results.tanggal_pembelian);
                        $('#Ref').val(results.no_penawaran);
                        $('#TOP').val(results.top);
                        $('#Due').val(results.due_date);
                        $('#Diskon').val(results.diskon_persen);
                        $('#Diskonrp').val(results.diskon_rp);
                        $('#PPN').val(results.ppn);
                        $('#Deskripsi').val(results.deskripsi);
                        $('#Status').val(results.status);
                        $('#Jenis').val(results.jenis_po);
                        },
                        error : function() {
                        swal("GAGAL!<br><b>Status POSTED/RECEIVED/CLOSED</b>");
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })

        }

        function del(id, url) {
            swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                

                $.ajax({
                    type: 'DELETE',
                    url: url,
                    
                    success: function (results) {
                    console.log(results);
                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                        } else {
                            swal("GAGAL!<br><b>Status POSTED/Periode CLOSED/Detail Belum Kosong</b>");
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