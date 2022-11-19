

<?php $__env->startSection('title', 'Job Request'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Job Request <b><?php echo e($joborder->no_joborder); ?></b></font>
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

                                        <?php echo e(Form::text('no_joborder',$joborder->no_joborder, ['class'=> 'form-control','readonly','id'=>'nojoborder','required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tanggal_req', 'Tanggal Job Request:')); ?>

                                        <?php echo e(Form::date('tanggal_req', \Carbon\Carbon::now(), ['class'=> 'form-control','id'=>'tanggalreq','required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('freetime', 'Freetime:')); ?>

                                        <?php echo e(Form::text('freetime',null, ['class'=> 'form-control','id'=>'freetime','required','autocomplete'=>'off'])); ?>

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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::hidden('id',null, ['class'=> 'form-control','readonly','id'=>'ID'])); ?>

                                        <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                        <?php echo e(Form::text('no_joborder',$joborder->no_joborder, ['class'=> 'form-control','readonly','id'=>'nojoborder2'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_req_jo', 'No Request JO:')); ?>

                                        <?php echo e(Form::text('no_req_jo',null, ['class'=> 'form-control','readonly','id'=>'noreqjo2'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tanggal_req', 'Tanggal Request:')); ?>

                                        <?php echo e(Form::date('tanggal_req',null, ['class'=> 'form-control','id'=>'tanggalreq2','required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('freetime', 'Freetime:')); ?>

                                        <?php echo e(Form::text('freetime',null, ['class'=> 'form-control','id'=>'freetime2','required','autocomplete'=>'off'])); ?>

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

<div class="modal fade" id="addjoform" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="box-body"> 
            <div class="addform">
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['id'=>'ADD_TRUCKING']); ?>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                        <?php echo e(Form::text('no_joborder',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'nojoborder3','required','readonly'])); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo e(Form::label('no_req_jo', 'No Request JO:')); ?>

                        <?php echo e(Form::text('no_req_jo',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'noreqjo','required','readonly'])); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo e(Form::label('kode_container', 'No Container:')); ?>

                        <?php echo e(Form::text('kode_container',null, ['class'=> 'form-control','required','id'=>'nocontainer','autocomplete'=>'off'])); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo e(Form::label('kode_size', 'Size Container:')); ?>

                        <?php echo e(Form::select('kode_size',$Size->sort(),null,['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','required'=>'required','id'=>'kodesize'])); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo e(Form::label('status_muatan', 'Status Muatan:')); ?>

                        <?php echo e(Form::select('status_muatan', ['Empty' => 'Empty','Loaded' => 'Loaded'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'statusmuatan','required'=>'required'])); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo e(Form::label('dari', 'Dari:')); ?>

                        <?php echo e(Form::text('dari',null, ['class'=> 'form-control','id'=>'dari','autocomplete'=>'off','required', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo e(Form::label('tujuan', 'Tujuan:')); ?>

                        <?php echo e(Form::text('tujuan',null, ['class'=> 'form-control','id'=>'tujuan','autocomplete'=>'off','required', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <span class="pull-right"> 
                        <br>
                        <?php echo e(Form::submit('Add Item', ['class' => 'btn btn-success btn-xs','id'=>'submit'])); ?>  
                        <button type="button" class="btn btn-warning btn-xs editbutton" id="editjo" data-toggle="modal" data-target="">
                            <i class="fa fa-edit"></i> EDIT
                        </button>
                        <button type="button" class="btn btn-danger btn-xs hapusbutton" id="hapusjo">
                            <i class="fa fa-times-circle"></i> HAPUS
                        </button>
                    </span>    
                </div>                    
            <?php echo Form::close(); ?>

            </div>
        </div>

        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover" id="addjo-table" width="100%" style="font-size: 12px;">
                <thead>
                    <tr class="bg-warning">
                        <th>No JO</th>
                        <th>No JOR</th>
                        <th>Container</th>
                        <th>Size</th>
                        <th>Status Muatan</th>
                        <th>Dari</th>
                        <th>Tujuan</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
            
        <div class="modal-footer">
                
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

   <div class="box box-danger">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data2-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-warning">
                        <th>No Job Order</th>
                        <th>No Job Request</th>
                        <th>Tanggal Request</th>
                        <th>Freetime</th>
                        <th>Total Container</th>
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
            <?php if (app('laratrust')->can('add-jo')) : ?>
            <button type="button" class="btn btn-info btn-xs add-button" id="addjobutton" data-toggle="modal" data-target="#addjoform"><i class="fa fa-plus"></i> ADD CONTAINER</button>
            <?php endif; // app('laratrust')->can ?>

            <!-- <?php if (app('laratrust')->can('add-jo')) : ?>
            <a href="#" id="addjo"><button type="button" class="btn btn-info btn-xs add-button" data-toggle="modal" data-target="">ADD CONTAINER <i class="fa fa-plus"></i></button></a>
            <?php endif; // app('laratrust')->can ?> -->

            <?php if (app('laratrust')->can('update-jo')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editjoborderdetail" data-toggle="modal" data-target="">EDIT TGL JOR <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-jo')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusjoborderdetail" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <!-- <?php if (app('laratrust')->can('add-jo')) : ?>
            <button type="button" class="btn btn-success btn-xs view-button" id="viewjobreq">VIEW JOB REQUEST <i class="fa fa-eye"></i></button>
            <?php endif; // app('laratrust')->can ?> -->
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
            $('.add-button').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.view-button').hide();
        }
        
        function formatRupiah(angka, prefix='Rp'){
           
            var rupiah = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return rupiah;
           
        }

        function createTable2(result){

        var my_table = "";


        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.kode_container+"</td>";
                    my_table += "<td>"+row.kode_size+"</td>";
                    my_table += "<td>"+row.status_muatan+"</td>";
                    my_table += "<td>"+row.dari+"</td>";
                    my_table += "<td>"+row.tujuan+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Container</th>'+
                                '<th>Size Container</th>'+
                                '<th>Status Muatan</th>'+
                                '<th>Dari</th>'+
                                '<th>Tujuan</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }
        
    $(function(){
        var no_joborder = $('#nojoborder').val();
        
        $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'https://aplikasi.gui-group.co.id/gui_front_emkl_laravel/admin/joborderdetail/getDatabyID?id='+no_joborder,
            data:{'no_joborder':no_joborder},
            columns: [
                { data: 'no_joborder', name: 'no_joborder' },
                { data: 'no_req_jo', name: 'no_req_jo' },
                { data: 'tanggal_req', name: 'tanggal_req' },
                { data: 'freetime', name: 'freetime' },
                { data: 'total_item', name: 'total_item' },
            ]
            
        });
        
    });

    Table2 = $("#addjo-table").DataTable({
        data:[],
        columns: [
            { data: 'no_joborder', name: 'no_joborder' },
            { data: 'no_req_jo', name: 'no_req_jo' },
            { data: 'kode_container', name: 'kode_container' },
            { data: 'sizecontainer.nama_size', name: 'sizecontainer.nama_size' },
            { data: 'status_muatan', name: 'status_muatan' },
            { data: 'dari', name: 'dari' },                 
            { data: 'tujuan', name: 'tujuan' },                 
        ],
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
                    $('.add-button').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                }
                else {
                    document.getElementById("nocontainer").readOnly = false;

                    $('#nocontainer').val('');
                    $('#kodesize').val('').trigger('change');
                    $('#statusmuatan').val('').trigger('change');
                    $('#dari').val('');
                    $('#tujuan').val('');

                    table2.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');

                    closeOpenedRows(table, select);

                    var no_joborder = select.find('td:eq(0)').text();                    
                    var no_req_jo = select.find('td:eq(1)').text();
                    var total_item = select.find('td:eq(4)').text();
                    var add = $("#addjo").attr("href","https://aplikasi.gui-group.co.id/gui_front_emkl_laravel/admin/joborder/"+no_joborder+no_req_jo+"/detail2");
                    if(total_item > 0){
                        $('.add-button').show();
                        $('.hapus-button').hide();
                        $('.edit-button').show();
                        $('.view-button').show();
                    }
                    else{
                        $('.add-button').show();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                        $('.view-button').show();
                    }
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

            var table2 = $('#addjo-table').DataTable();

            $('#addjo-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray text-bold') ) {
                    $(this).removeClass('selected bg-gray text-bold');
                    $('.editbutton').hide();
                    $('.hapusbutton').hide();
                    $('.add-button').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();

                    $('#nocontainer').val('');
                    $('#kodesize').val('').trigger('change');
                    $('#statusmuatan').val('').trigger('change');
                    $('#dari').val('');
                    $('#tujuan').val('');

                    document.getElementById("nocontainer").readOnly = false;
                }
                else {
                    table2.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray text-bold');
                    var select = $('.selected').closest('tr');
                    $('.editbutton').show();
                    $('.hapusbutton').show();
                    $('.add-button').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();

                    var kode_container = select.find('td:eq(2)').text();
                    
                    var data = $('#addjo-table').DataTable().row(select).data();
                    var kode_size = data['kode_size'];
                    
                    var status_muatan = select.find('td:eq(4)').text();
                    var dari = select.find('td:eq(5)').text();
                    var tujuan = select.find('td:eq(6)').text();

                    document.getElementById("nocontainer").readOnly = true;

                    $('#nocontainer').val(kode_container);
                    $('#kodesize').val(kode_size).trigger('change');
                    $('#statusmuatan').val(status_muatan).trigger('change');
                    $('#dari').val(dari);
                    $('#tujuan').val(tujuan);
                }
            });

            $('#hapusjo').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_jo = $.trim($('#nojoborder3').val());
                var no_jor = $.trim($('#noreqjo').val());
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                var no_req_jo = select.find('td:eq(1)').text();
                var kode_container = select.find('td:eq(2)').text();
                var row = table2.row( select );
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
                                'kode_container': kode_container,
                            },

                            success: function (results) {
                                $('#nocontainer').val('');
                                $('#kodesize').val('').trigger('change');
                                $('#statusmuatan').val('').trigger('change');
                                $('#dari').val('');
                                $('#tujuan').val('');
                                if (results.success === true) {
                                    swal("Berhasil!", results.message, "success");
                                } else {
                                    swal("Gagal!", results.message, "error");
                                }
                                document.getElementById("nocontainer").readOnly = false;
                                refreshTable();
                                tablejor(no_jor);
                            }
                        });
                    }
                });
            });

            $('#editjo').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_jo = $.trim($('#nojoborder3').val());
                var no_jor = $.trim($('#noreqjo').val());
                var select = $('.selected').closest('tr');

                var no_jo = $('#nojoborder3').val();
                var no_req_jo = $('#noreqjo').val();
                var kode_container = $('#nocontainer').val();
                var size = $('#kodesize').val();
                var status = $('#statusmuatan').val();
                var dari = $('#dari').val();
                var tujuan = $('#tujuan').val();
                var row = table2.row( select );
                
                $.ajax({
                    url: '<?php echo route('joborderdetail.edit_noreqjo'); ?>',
                    type: 'POST',
                    data : {
                        'no_jo': no_jo,
                        'no_req_jo': no_req_jo,
                        'kode_container': kode_container,
                        'size': size,
                        'status': status,
                        'dari': dari,
                        'tujuan': tujuan,
                    },

                    success: function (results) {
                        $('#nocontainer').val('');
                        $('#kodesize').val('').trigger('change');
                        $('#statusmuatan').val('').trigger('change');
                        $('#dari').val('');
                        $('#tujuan').val('');
                        if (results.success === true) {
                            swal("Berhasil!", results.message, "success");
                        } else {
                            swal("Gagal!", results.message, "error");
                        }
                        refreshTable();
                        tablejor(no_jor);
                    }
                });
            });

            $('#addjobutton').click( function () {
                var select = $('.selected').closest('tr');
                var no_jo = $('#nojoborder').val();
                var no_jor = select.find('td:eq(1)').text();
                $.ajax({
                    url: '<?php echo route('joborderdetail.getDatajor'); ?>',
                    type: 'GET',
                    data : {
                        'no_jo': no_jo,
                        'id': no_jor,
                    },
                    success: function(result) {
                        console.log(result);

                        Table2.clear().draw();
                        Table2.rows.add(result).draw();
                
                        $('#addjoform').modal('show');
                        $('#nojoborder3').val(no_jo);  
                        $('#noreqjo').val(no_jor);                     
                    }
                });
            });

            $('#viewjobreq').click( function () {
                var select = $('.selected').closest('tr');
                var no_req_jo = select.find('td:eq(1)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborderdetail.showdetailjobreq'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_req_jo
                    },
                    success: function(result) {
                        console.log(result);
                        if(result.title == 'Gagal'){
                            $.notify(result.message);
                        }else{
                            if ( row.child.isShown() ) {
                                row.child.hide();
                                select.removeClass('shown');
                            }
                            else {
                                closeOpenedRows(table, select);

                                row.child( createTable2(result) ).show();
                                select.addClass('shown');

                                openRows.push(select);
                            }
                        }
                    }
                });
            });

            $('#editjoborderdetail').click( function () {
                var select = $('.selected').closest('tr');
                var no_req_jo = select.find('td:eq(1)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborderdetail.edit_joborderdetail'); ?>',
                    type: 'POST',
                    data : {
                        'no_req_jo': no_req_jo,
                    },
                    success: function(results) {
                        console.log(results);
                        $('#ID').val(results.id);
                        $('#nojoborder2').val(results.no_joborder);
                        $('#noreqjo2').val(results.no_req_jo);
                        $('#tanggalreq2').val(results.tanggal_req);
                        $('#freetime2').val(results.freetime);
                        $('.editform').show();
                        $('.addform').hide();
                    }
                });
            });

            $('#hapusjoborderdetail').click( function () {
                var select = $('.selected').closest('tr');
                var no_req_jo = select.find('td:eq(1)').text();
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
                            url: '<?php echo route('joborderdetail.hapus_joborderdetail'); ?>',
                            type: 'POST',
                            data : {
                                'no_req_jo': no_req_jo,
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

        function tablejor(kode){
        $.ajax({
            url: '<?php echo route('joborderdetail.getDatajor'); ?>',
            type: 'GET',
            data : {
                'id': kode
            },
            success: function(result) {
                Table2.clear().draw();
                Table2.rows.add(result).draw();
                
                document.getElementById("nocontainer").readOnly = false;
                $('#addjoform').modal('show');
                $('.editbutton').hide();
                $('.hapusbutton').hide();
            }
        });
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

        $('#ADD_TRUCKING').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var nojor = $.trim($('#noreqjo').val());
            var registerForm = $("#ADD_TRUCKING");
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
                    if (data.success === true) {
                        swal("Berhasil!", data.message, "success");
                    } else {
                        swal("Gagal!", data.message, "error");
                    }
                    refreshTable();
                    tablejor(nojor);
                },
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
                    url:'<?php echo route('joborderdetail.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#tanggalreq').val('');
                        $('#freetime').val('');
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
                    url:'<?php echo route('joborderdetail.updateajax'); ?>',
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