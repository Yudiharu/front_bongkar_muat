<?php $__env->startSection('title', 'Trucking Container'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>

                    <?php if (app('laratrust')->can('create-trucking')) : ?>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Trucking</button>
                    <?php endif; // app('laratrust')->can ?>

                    <span class="pull-right">  
                        <font style="font-size: 16px;"><b>TRUCKING</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-warning">
                        <th>No Trucking</th>
                        <th>No Job Order</th>
                        <th>No Job Request</th>
                        <th>Tanggal Trucking</th>
                        <th>Nama Customer</th>
                        <th>Kode Shipper</th>
                        <th>Nama Kapal</th>
                        <th>Voyage</th>
                        <th>No DO</th>
                        <th>GT. Container</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addform" tabindex="-1" role="dialog">
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
                                    <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                    <?php echo e(Form::select('no_joborder',$Joborder->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Job1','required'=>'required','onchange'=>"getdata();"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_req_jo', 'No Job Request:')); ?>

                                    <?php echo e(Form::text('no_req_jo',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Req1','required'=>'required','readonly'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tanggal_trucking', 'Tanggal Trucking:')); ?>

                                    <?php echo e(Form::date('tanggal_trucking', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            
                            <?php echo e(Form::hidden('kode_customer',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Customer1','required'=>'required','readonly'])); ?>

                            
                            <?php echo e(Form::hidden('kode_shipper',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Shipper1','required'=>'required','readonly'])); ?>


                            <?php echo e(Form::hidden('kode_kapal',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Kapal1','required'=>'required','readonly'])); ?>


                            <?php echo e(Form::hidden('voyage', null, ['class'=> 'form-control','id'=>'Voyage1', 'placeholder'=>'Voyage', 'autocomplete'=>'off','required', 'onkeypress'=>"return pulsar(event,this)",'readonly'])); ?>


                            <?php echo e(Form::hidden('no_do', null, ['class'=> 'form-control','id'=>'Do1', 'placeholder'=>'Order By', 'autocomplete'=>'off','required', 'onkeypress'=>"return pulsar(event,this)",'readonly'])); ?>

                            
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_trucking', 'No Trucking:')); ?>

                                    <?php echo e(Form::text('no_trucking', null, ['class'=> 'form-control','id'=>'Trucking','readonly'])); ?>

                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                    <?php echo e(Form::select('no_joborder',$Joborder->sort(),null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Job','required'=>'required','onchange'=>"getdata2();"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_req_jo', 'No Job Request:')); ?>

                                    <?php echo e(Form::text('no_req_jo',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Req','required'=>'required','readonly'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tanggal_trucking', 'Tanggal Trucking:')); ?>

                                    <?php echo e(Form::date('tanggal_trucking', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            
                            <?php echo e(Form::hidden('kode_customer',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Customer','required'=>'required','readonly'])); ?>


                            <?php echo e(Form::hidden('kode_shipper',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Shipper','required'=>'required','readonly'])); ?>


                            <?php echo e(Form::hidden('kode_kapal',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Kapal','required'=>'required','readonly'])); ?>

                            
                            <?php echo e(Form::hidden('voyage', null, ['class'=> 'form-control','id'=>'Voyage', 'placeholder'=>'Voyage', 'autocomplete'=>'off','required', 'onkeypress'=>"return pulsar(event,this)",'readonly'])); ?>


                            <?php echo e(Form::hidden('no_do', null, ['class'=> 'form-control','id'=>'Do', 'placeholder'=>'Order By', 'autocomplete'=>'off','required', 'onkeypress'=>"return pulsar(event,this)",'readonly'])); ?>

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
            .add-button2 {
                background-color: #00E0FF;
                bottom: 156px;
            }

            .add-button {
                background-color: #00E0FF;
                bottom: 156px;
            }

            .hapus-button {
                background-color: #F63F3F;
                bottom: 186px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 216px;
            }

            .view-button {
                background-color: #1674c7;
                bottom: 246px;
            }

            .viewspb-button {
                background-color: #00E0FF;
                bottom: 276px;
            }

            .tombol1 {
                background-color: #149933;
                bottom: 306px;
            }

            .tombol2 {
                background-color: #ff9900;
                bottom: 336px;
            }

            .print-button {
                background-color: #F63F3F;
                bottom: 366px;
            }

            .tombol3 {
                background-color: #149933;
                bottom: 396px;
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
            <?php if (app('laratrust')->can('update-trucking')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="edittrucking" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-trucking')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapustrucking" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('add-trucking')) : ?>
            <a href="#" id="addtrucking"><button type="button" class="btn btn-info btn-xs add-button" data-toggle="modal" data-target="">ADD <i class="fa fa-plus"></i></button></a>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('add-trucking')) : ?>
            <a href="#" id="addtrucking2"><button type="button" class="btn btn-info btn-xs add-button2" data-toggle="modal" data-target="">ADD SPB KEMBALI <i class="fa fa-plus"></i></button></a>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('post-trucking')) : ?>
            <button type="button" class="btn btn-success btn-xs tombol1" id="button1">POST <i class="fa fa-bullhorn"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('unpost-trucking')) : ?>
            <button type="button" class="btn btn-warning btn-xs tombol2" id="button2">UNPOST <i class="fa fa-undo"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('view-trucking')) : ?>
            <button type="button" class="btn btn-primary btn-xs view-button" id="button5">VIEW CONTAINER <i class="fa fa-eye"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('view-trucking')) : ?>
            <button type="button" class="btn btn-info btn-xs viewspb-button" id="button6">VIEW SPB <i class="fa fa-eye"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('print-trucking')) : ?>
            <a href="#" target="_blank" id="printtrucking"><button type="button" class="btn btn-danger btn-xs print-button" id="button6">PRINT <i class="fa fa-print"></i></button></a>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('post-trucking')) : ?>
            <button type="button" class="btn btn-success btn-xs tombol3" id="button3">CLOSED <i class="fa fa-bullhorn"></i></button>
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

        function load(){
            startTime();
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.tombol3').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.add-button').hide();
            $('.add-button2').hide();
            $('.view-button').hide();
            $('.viewspb-button').hide();
            $('.print-button').hide();
            $('.back2Top').show();
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
        if ((("0123456789").indexOf(keychar) > -1 || ("-").indexOf(keychar) > -1 || (".").indexOf(keychar) > -1 )) {
            return true;
        } else
        if (decimal && (keychar == ".")) {
            return true;
        } else return false;
    }   


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

        $(function() {          
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('trucking.data'); ?>',
            fnRowCallback: function (row, data, iDisplayIndex, iDisplayIndexFull) {
                if (data['status'] == "OPEN") {
                    $('td', row).css('background-color', '#ffdbd3');
                }
            },
            columns: [
                { data: 'no_trucking', name: 'no_trucking' },
                { data: 'no_joborder', name: 'no_joborder' },
                { data: 'no_req_jo', name: 'no_req_jo' },
                { data: 'tanggal_trucking', name: 'tanggal_trucking' },
                { data: 'customer1.nama_customer', name: 'customer1.nama_customer' },
                { data: 'customer2.nama_customer', name: 'customer2.nama_customer' },
                { data: 'kapal.nama_kapal', name: 'kapal.nama_kapal' },
                { data: 'voyage', name: 'voyage' },
                { data: 'no_do', name: 'no_do' },
                { data: 'total_item', name: 'total_item' },
                // { data: 'gt_uang_jalan',
                //     render: function( data, type, full ) {
                //     return formatNumber(data); }
                // },
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
            if(n == 'OPEN'){
                return n;
            }else if(n == 'POSTED'){
                var stat = "<span style='color:#0eab25'><b>POSTED</b></span>";
                return n.replace(/POSTED/, stat);
            }else if(n == 'CLOSED'){
                var stat = "<span style='color:#c91a1a'><b>CLOSED</b></span>";
                return n.replace(/CLOSED/, stat);
            }else{
                var stat = "<span style='color:#1a80c9'><b>RECEIVED</b></span>";
                return n.replace(/RECEIVED/, stat);
            }
        }

        function getdata(){
            var no_joborder= $('#Job1').val();

            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('trucking.getdata'); ?>',
                type:'POST',
                data : {
                        'id': no_joborder,
                    },
                success: function(result) {
                        $('#Req1').val(result.no_req_jo);
                        $('#Customer1').val(result.kode_customer);
                        $('#Shipper1').val(result.kode_shipper);
                        $('#Kapal1').val(result.kode_kapal);
                        $('#Voyage1').val(result.voyage);
                        $('#Do1').val(result.no_do);
                    },
            });
        }

        function getdata2(){
            var no_joborder= $('#Job').val();

            var submit = document.getElementById("submit");
            $.ajax({
                url:'<?php echo route('trucking.getdata2'); ?>',
                type:'POST',
                data : {
                        'id': no_joborder,
                    },
                success: function(result) {
                        $('#Req').val(result.no_req_jo);
                        $('#Customer').val(result.kode_customer);
                        $('#Shipper').val(result.kode_shipper);
                        $('#Kapal').val(result.kode_kapal);
                        $('#Voyage').val(result.voyage);
                        $('#Do').val(result.no_do);
                    },
            });
        }

        function createTable(result){

        var total_harga = 0;
        var grand_total = 0;

        $.each( result, function( key, row ) {
            total_harga += row.tarif_trucking;
            grand_total = formatRupiah(total_harga);
        });

        var my_table = "";


        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.kode_gudang+"</td>";
                    my_table += "<td>"+row.kode_container+"</td>";
                    my_table += "<td>"+row.kode_size+"</td>";
                    my_table += "<td>"+row.no_seal+"</td>";
                    my_table += "<td>"+row.no_spb+"</td>";
                    my_table += "<td>"+row.muatan+"</td>";
                    my_table += "<td>"+row.colie+"</td>";
                    my_table += "<td>"+formatRupiah(row.tarif_trucking)+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered" border="1" style="font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Gudang</th>'+
                                '<th>Container</th>'+
                                '<th>Size</th>'+
                                '<th>No Seal</th>'+
                                '<th>No SPB</th>'+
                                '<th>Muatan</th>'+
                                '<th>Colie</th>'+
                                '<th>Tarif</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '<tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="7">Total</th>'+
                                '<th>Rp '+grand_total+'</th>'+
                            '</tr>'+
                        '</tfoot>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }


        function createTable2(result){

        var total_uang = 0;
        var total_bbm = 0;
        var total_bpa = 0;
        var total_honor = 0;
        var total_biaya = 0;
        var total_trucking = 0;
        var grand_total = 0;
        var grand_total2 = 0;
        var grand_total3 = 0;
        var grand_total4 = 0;
        var grand_total5 = 0;
        var grand_total6 = 0;

        $.each( result, function( key, row ) {
            total_uang += row.uang_jalan;
            total_bbm += row.bbm;
            total_bpa += row.bpa;
            total_honor += row.honor;
            total_biaya += row.biaya_lain;
            total_trucking += row.trucking;
            grand_total = formatRupiah(total_uang);
            grand_total6 = formatRupiah(total_bbm);
            grand_total2 = formatRupiah(total_bpa);
            grand_total3 = formatRupiah(total_honor);
            grand_total4 = formatRupiah(total_biaya);
            grand_total5 = formatRupiah(total_trucking);
        });

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.no_spb+"</td>";
                    my_table += "<td>"+row.no_spb_manual+"</td>";
                    my_table += "<td>"+row.tgl_spb+"</td>";
                    my_table += "<td>"+row.tgl_kembali+"</td>";
                    my_table += "<td>"+row.kode_pemilik+"</td>";
                    my_table += "<td>"+row.kode_mobil+"</td>";
                    my_table += "<td>"+row.kode_sopir+"</td>";
                    my_table += "<td>"+formatRupiah(row.trucking)+"</td>";
                    my_table += "<td>"+formatRupiah(row.uang_jalan)+"</td>";
                    my_table += "<td>"+formatRupiah(row.bbm)+"</td>";
                    my_table += "<td>"+formatRupiah(row.bpa)+"</td>";
                    my_table += "<td>"+formatRupiah(row.honor)+"</td>";
                    my_table += "<td>"+formatRupiah(row.biaya_lain)+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>No SPB</th>'+
                                '<th>No SPB Manual</th>'+
                                '<th>Tgl SPB</th>'+
                                '<th>Tgl Kembali</th>'+
                                '<th>Pemilik</th>'+
                                '<th>Mobil</th>'+
                                '<th>Sopir</th>'+
                                '<th>Trucking</th>'+
                                '<th>Uang Jalan</th>'+
                                '<th>BBM</th>'+
                                '<th>B/P/A</th>'+
                                '<th>Honor</th>'+
                                '<th>Biaya Lain</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '<tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="7">Total</th>'+
                                '<th>Rp '+grand_total5+'</th>'+
                                '<th>Rp '+grand_total+'</th>'+
                                '<th>Rp '+grand_total6+'</th>'+
                                '<th>Rp '+grand_total2+'</th>'+
                                '<th>Rp '+grand_total3+'</th>'+
                                '<th>Rp '+grand_total4+'</th>'+
                            '</tr>'+
                        '</tfoot>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }


        function formatRupiah(angka, prefix='Rp'){
           
            var rupiah = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return rupiah;
           
        }

        $(document).ready(function(){
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            var table = $('#data-table').DataTable();

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray text-bold') ) {
                    $(this).removeClass('selected bg-gray text-bold');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.tombol3').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.add-button').hide();
                    $('.add-button2').hide();
                    $('.view-button').hide();
                    $('.print-button').hide();
                    $('.viewspb-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray text-bold');
                    var select = $('.selected').closest('tr');

                    closeOpenedRows(table, select);

                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.tombol3').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.add-button').hide();
                    $('.add-button2').hide();
                    $('.view-button').hide();
                    $('.print-button').hide();
                    $('.viewspb-button').hide();
                    
                    var colom = select.find('td:eq(10)').text();
                    var colom2 = select.find('td:eq(9)').text();
                    var no_trucking = select.find('td:eq(0)').text();
                    var status = colom;
                    var item = colom2;
                    var add = $("#addtrucking").attr("href","http://localhost/gui_front_emkl_laravel/admin/trucking/"+no_trucking+"/detail");
                    var add = $("#addtrucking2").attr("href","http://localhost/gui_front_emkl_laravel/admin/trucking/"+no_trucking+"/detail3");
                    var print = $("#printtrucking").attr("href","http://localhost/gui_front_emkl_laravel/admin/trucking/export2?no_trucking="+no_trucking);
                    if(status == 'POSTED' && item > 0){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        $('.tombol3').show();
                        $('.add-button').hide();
                        $('.add-button2').show();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.print-button').show();
                        $('.view-button').show();
                        $('.viewspb-button').hide();
                    }else if(status =='OPEN' && item > 0){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                        $('.tombol3').hide();
                        $('.add-button').show();
                        $('.add-button2').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').show();
                        $('.print-button').hide();
                        $('.view-button').show();
                        $('.viewspb-button').hide();
                    }else if(status =='OPEN' && item == 0){
                        $('.tombol1').hide();
                        $('.tombol2').hide();
                        $('.tombol3').hide();
                        $('.add-button').show();
                        $('.add-button2').hide();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                        $('.print-button').hide();
                        $('.view-button').hide();
                        $('.viewspb-button').hide();
                    }else{
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        $('.tombol3').hide();
                        $('.add-button').hide();
                        $('.add-button2').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.print-button').show();
                        $('.view-button').show();
                        $('.viewspb-button').show();
                    }
                }
            });

            $('#button1').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_trucking = colom;
                console.log(no_trucking);
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
                            url: '<?php echo route('trucking.post'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_trucking
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
                var no_trucking = colom;
                console.log(no_trucking);
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
                            url: '<?php echo route('trucking.unpost'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_trucking
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

            $('#button3').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_trucking = colom;
                console.log(no_trucking);
                swal({
                    title: "Close?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Closing!",
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
                            url: '<?php echo route('trucking.close'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_trucking
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Closed!',
                                    'Your file has been closed.',
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

            $('#button5').click( function () {
                var select = $('.selected').closest('tr');
                var no_trucking = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('trucking.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_trucking
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

                                row.child( createTable(result) ).show();
                                select.addClass('shown');

                                openRows.push(select);
                            }
                        }
                    }
                });
            });

            $('#button6').click( function () {
                var select = $('.selected').closest('tr');
                var no_trucking = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('trucking.showdetailspb'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_trucking
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

            $('#edittrucking').click( function () {
                var select = $('.selected').closest('tr');
                var no_trucking = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('trucking.edit_trucking'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_trucking
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Trucking').val(results.no_trucking);
                        $('#Job').val(results.no_joborder);
                        $('#Req').val(results.no_req_jo);
                        $('#Tanggal').val(results.tanggal_trucking);
                        $('#Customer').val(results.kode_customer);
                        $('#Shipper').val(results.kode_shipper);
                        $('#Kapal').val(results.kode_kapal);
                        $('#Voyage').val(results.voyage);
                        $('#Do').val(results.no_do);
                        $('#Deskripsi').val(results.deskripsi);
                        $('#editform').modal('show');
                        }
         
                });
            });

            $('#hapustrucking').click( function () {
                var select = $('.selected').closest('tr');
                var no_trucking = select.find('td:eq(0)').text();
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
                            url: '<?php echo route('trucking.hapus_trucking'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_trucking
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
            $('#data-table').DataTable().ajax.reload(null,false);
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.view-button').hide();
            $('.viewspb-button').hide();
            $('.print-button').hide();
            $('.add-button').hide();
            $('.add-button2').hide();
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
                    url:'<?php echo route('trucking.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Job1').val('').trigger('change');
                        $('#Tanggal1').val('');
                        $('#Customer1').val('').trigger('change');
                        $('#Shipper1').val('').trigger('change');
                        $('#Kapal1').val('').trigger('change');
                        $('#Voyage1').val('');
                        $('#Do1').val('');
                        $('#Deskripsi1').val('');
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
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();
         
                $.ajax({
                    url:'<?php echo route('trucking.updateajax'); ?>',
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