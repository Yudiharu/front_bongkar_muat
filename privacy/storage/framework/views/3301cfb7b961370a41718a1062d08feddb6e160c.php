<?php $__env->startSection('title', 'Pembelian'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-solid box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Manages Pembelian</h3>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    
                    <button type="button" class="btn btn-default btn-sm" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addform"><i class="fa fa-plus">
                        </i> New Pembelian</button>
                    <span class="pull-right"> 
                            <button type="button" class="btn btn-success btn-sm" id="button1"><i class="fa fa-bullhorn"></i> POST</button>
                            <button type="button" class="btn btn-warning btn-sm" id="button2"><i class="fa fa-undo"></i> UNPOST</button>
                            
                            <a href="#" target="_blank" class="btn btn-default btn-sm" id="button3">
                                <i class="fa fa-print"></i>PRINT
                            </a>
                    </span>
                    
                </div>
            </div>
             <table class="table table-bordered table-hover" id="data-table" width="100%">
                <thead>
                <tr class="bg-danger">
                    <th>No Pembelian</th>
                    
                    <th>Vendor</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
                    <th>Jenis PO</th>
                    <th>Total Item</th>
                    
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
            <?php echo Form::open(['route' => ['pembelian.store'],'method' => 'post','id'=>'form1']); ?>

                    <div class="modal-body">
                        <div class="row">
                            

                            

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Tanggal Pembelian', 'Tanggal Pembelian:')); ?>

                                    <?php echo e(Form::date('tanggal_pembelian', \Carbon\Carbon::now(),['class'=> 'form-control'])); ?>

                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('jenis_po', 'Jenis PO:')); ?>

                                    <?php echo e(Form::select('jenis_po', ['Stock' => 'Stock','Non Stock' => 'Non Stock',
                                'Jasa' => 'Jasa'], null, ['class'=> 'form-control'])); ?>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('Kode Vendor', 'Vendor:')); ?>

                                    <?php echo e(Form::select('kode_vendor',$Vendor,null, ['class'=> 'form-control'])); ?>

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
                <?php echo Form::open(['route' => ['pembelian.updateajax'],'method' => 'post','id'=>'form']); ?>

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

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('jenis_po', 'Jenis PO:')); ?>

                                        <?php echo e(Form::select('jenis_po', ['Stock' => 'Stock','Non Stock' => 'Non Stock',
                                    'Jasa' => 'Jasa'], null, ['class'=> 'form-control','id'=>'Jenis'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Kode Vendor', 'Vendor:')); ?>

                                        <?php echo e(Form::select('kode_vendor',$Vendor,null, ['class'=> 'form-control','id'=>'Vendor'])); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script>
        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('pembelian.data'); ?>',
            scrollY: true,
            columns: [
                { data: 'no_pembelian', name: 'no_pembelian' },
                // { data: 'no_memo', name: 'no_memo' },
                { data: 'vendor.nama_vendor', name: 'vendor.nama_vendor' },
                { data: 'tanggal_pembelian', name: 'tanggal_pembelian' },
                { data: 'status', name: 'status' },
                { data: 'jenis_po', name: 'jenis_po' },
                { data: 'pembeliandetail_count', name: 'pembeliandetail_count' },
                // { data: 'company.nama_company', name: 'company.nama_company' },
                { data: 'created_at', name: 'created_at' },
                // { data: 'updated_at', name: 'updated_at' },
                // { data: 'created_by', name: 'created_by' },
                // { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            var post = document.getElementById("button1");
            var unpost = document.getElementById("button2");

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(3)').text();
                    var no_pembelian = select.find('td:eq(0)').text();
                    var status = colom;
                    var print = $("#button3").attr("href","http://localhost/inventory_baru/admin/pembelian/cetakPDF?id="+no_pembelian);
                    // var print = $("#button3").attr("href","<?php echo e(route('permintaan.cetak', ['id' =>"+colom2"])); ?>");
                    if(status == 'POSTED'){
                        post.disabled = true;
                        unpost.disabled = false;
                    }else if(status =='UNPOSTED'){
                        unpost.disabled = true;
                        post.disabled = false;
                    }else{
                        unpost.disabled = true;
                        post.disabled = false;
                    }
                }
            } );
        
           $('#button1').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_pembelian = colom;
                console.log(no_pembelian);
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                $.ajax({
                    url: '<?php echo route('pembelian.post'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_pembelian
                    },
                    success: function(result) {
                        console.log(result);
                        $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            } );

            $('#button2').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_pembelian = colom;
                console.log(no_pembelian);
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                $.ajax({
                    url: '<?php echo route('pembelian.unpost'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_pembelian
                    },
                    success: function(result) {
                        console.log(result);
                        $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            } );
        } );

        $('.select2').select2({
            placeholder: " Pilih No Permintaan",
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

        function edit(id, url) {
            var result = confirm("Want to Edit?");
            if (result) {
                // console.log(id)
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        console.log(result);
                        // $('#Memo').val(result.no_memo);
                        $('#Pembelian').val(result.no_pembelian);
                        $('#Vendor').val(result.kode_vendor);
                        $('#Tanggal').val(result.tanggal_pembelian);
                        $('#Status').val(result.status);
                        $('#Jenis').val(result.jenis_po);
                        $('#editform').modal('show');
                    }
                });
            }
        }

        function del(id, url) {
            var result = confirm("Want to delete?");
            if (result) {
                // console.log(id)
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(result) {
                        console.log(result);
                        $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            }

        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>