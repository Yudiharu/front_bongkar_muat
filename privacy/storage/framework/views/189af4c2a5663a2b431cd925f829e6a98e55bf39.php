<?php $__env->startSection('title', 'Trucking Non Detail'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()"><i class="fa fa-refresh"></i> Refresh</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Detail Trucking <b><?php echo e($truckingnon->no_truckingnon); ?></b></font>
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
                                    <div class="form-group1">
                                        <?php echo e(Form::label('no_truckingnon', 'No Trucking Non:')); ?>

                                        <?php echo e(Form::text('no_truckingnon',$truckingnon->no_truckingnon, ['class'=> 'form-control','readonly','id'=>'notruckingnon'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group2">
                                        <button type="button" class="btn btn-primary btn-xs" title="Create SPB" onclick="createspbnon()" id='submit3'>Create SPB</button>
                                        <?php echo e(Form::label('no_spb', 'No SPB:')); ?>

                                        <?php echo e(Form::text('no_spb',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'spb','required','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group3">
                                        <?php echo e(Form::label('no_spb_manual', 'No SPB Manual:')); ?>

                                        <?php echo e(Form::text('no_spb_manual',null, ['class'=> 'form-control','id'=>'spbmanual','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group4">
                                        <?php echo e(Form::label('tanggal_spb', 'Tanggal SPB:')); ?>

                                        <?php echo e(Form::date('tanggal_spb', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'tanggal' ,'required'=>'required','onchange'=>"tgl();"])); ?>

                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="form-group13">
                                        <?php echo e(Form::label('tanggal_kembali', 'Tanggal Kembali SPB:')); ?>

                                        <?php echo e(Form::date('tanggal_kembali', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'kembali' ,'required'=>'required','onchange'=>"tgl();"])); ?>

                                    </div>
                                </div> -->
                                <div class="col-md-2">
                                    <div class="form-group5">
                                        <?php echo e(Form::label('total_berat', 'Total Berat:')); ?>

                                        <?php echo e(Form::text('total_berat',0, ['class'=> 'form-control','id'=>'berat','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group6">
                                        <?php echo e(Form::label('kode_mobil', 'Mobil:')); ?>

                                        <?php echo e(Form::select('kode_mobil',$Mobil->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'kode_mobil','required'=>'required','onchange'=>"pemilik();"])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group7">
                                        <?php echo e(Form::label('kode_sopir', 'Sopir:')); ?>

                                        <?php echo e(Form::select('kode_sopir',$Sopir->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'kode_sopir'])); ?>

                                    </div>
                                    <div class="form-group17">
                                        <?php echo e(Form::label('sopir', 'Sopir:')); ?>

                                        <?php echo e(Form::text('sopir',null, ['class'=> 'form-control','id'=>'Namasopir1','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group13">
                                        <?php echo e(Form::label('nama_pemilik', 'Pemilik:')); ?>

                                        <?php echo e(Form::text('nama_pemilik', null, ['class'=> 'form-control','id'=>'Pemilik1','readonly'])); ?>

                                        <?php echo e(Form::hidden('kode_pemilik', null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'Kodepemilik1'])); ?>

                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="form-group8">
                                        <?php echo e(Form::label('tarif_gajisopir', 'Tarif Gaji Sopir:')); ?>

                                        <?php echo e(Form::text('tarif_gajisopir',null, ['class'=> 'form-control','id'=>'gaji','onkeyup'=>"cektarif2();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Tarif gaji tidak boleh lebih kecil dari uang jalan dan BBM"])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group9">
                                        <?php echo e(Form::label('uang_jalan', 'Uang Jalan:')); ?>

                                        <?php echo e(Form::text('uang_jalan',null, ['class'=> 'form-control','id'=>'uang','onkeyup'=>"cekuang2();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Uang Jalan tidak boleh lebih besar dari tarif gaji dan tidak lebih kecil dari BBM"])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group10">
                                        <?php echo e(Form::label('bbm', 'BBM:')); ?>

                                        <?php echo e(Form::text('bbm',null, ['class'=> 'form-control','id'=>'bbm','onkeyup'=>"cekbbm2();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"BBM tidak boleh lebih besar dari tarif gaji dan uang jalan"])); ?>

                                    </div>
                                </div> -->
                                <div class="col-md-2">
                                    <div class="form-group11">
                                        <?php echo e(Form::label('dari', 'Dari:')); ?>

                                        <?php echo e(Form::text('dari',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'dari','required'=>'required','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group12">
                                        <?php echo e(Form::label('tujuan', 'Tujuan:')); ?>

                                        <?php echo e(Form::text('tujuan',null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'tujuan','required'=>'required','autocomplete'=>'off'])); ?>

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

                                        <?php echo e(Form::label('no_truckingnon', 'No Trucking Non:')); ?>

                                        <?php echo e(Form::text('no_truckingnon',$truckingnon->no_truckingnon, ['class'=> 'form-control','readonly','id'=>'notruckingnon2'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_spb', 'No SPB:')); ?>

                                        <?php echo e(Form::text('no_spb',null, ['class'=> 'form-control','id'=>'spb2','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_spb_manual', 'No SPB Manual:')); ?>

                                        <?php echo e(Form::text('no_spb_manual',null, ['class'=> 'form-control','id'=>'spbmanual2','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tanggal_spb', 'Tanggal SPB:')); ?>

                                        <?php echo e(Form::date('tanggal_spb', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'tanggal2' ,'required'=>'required','onchange'=>"tgl2();"])); ?>

                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tanggal_kembali', 'Tanggal Kembali SPB:')); ?>

                                        <?php echo e(Form::date('tanggal_kembali', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'kembali2' ,'required'=>'required','onchange'=>"tgl2();"])); ?>

                                    </div>
                                </div> -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('total_berat', 'Total Berat:')); ?>

                                        <?php echo e(Form::text('total_berat',null, ['class'=> 'form-control','id'=>'berat2','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('kode_mobil', 'Mobil:')); ?>

                                        <?php echo e(Form::select('kode_mobil',$Mobil->sort(),null,
                                         ['class'=> 'form-control','style'=>'width: 100%','required'=>'required','id'=>'kode_mobil2','onchange'=>"pemilik2();"])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group15">
                                        <?php echo e(Form::label('kode_sopir', 'Sopir:')); ?>

                                        <?php echo e(Form::select('kode_sopir',$Sopir->sort(),null,
                                         ['class'=> 'form-control select2','style'=>'width: 100%','id'=>'kode_sopir2'])); ?>

                                    </div>
                                    <div class="form-group16">
                                        <?php echo e(Form::label('sopir', 'Sopir:')); ?>

                                        <?php echo e(Form::text('sopir',null, ['class'=> 'form-control','id'=>'Namasopir2','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('nama_pemilik', 'Pemilik:')); ?>

                                        <?php echo e(Form::text('nama_pemilik', null, ['class'=> 'form-control','id'=>'Pemilik2','readonly'])); ?>

                                        <?php echo e(Form::hidden('kode_pemilik', null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'kode_pemilik2'])); ?>

                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tarif_gajisopir', 'Tarif Gaji Sopir:')); ?>

                                        <?php echo e(Form::text('tarif_gajisopir',null, ['class'=> 'form-control','id'=>'gaji2','onkeyup'=>"cektarif();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Tarif gaji tidak boleh lebih kecil dari uang jalan dan BBM"])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('uang_jalan', 'Uang Jalan:')); ?>

                                        <?php echo e(Form::text('uang_jalan',null, ['class'=> 'form-control','id'=>'uang2','onkeyup'=>"cekuang();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Uang Jalan tidak boleh lebih besar dari tarif gaji dan tidak lebih kecil dari BBM"])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('bbm', 'BBM:')); ?>

                                        <?php echo e(Form::text('bbm',null, ['class'=> 'form-control','id'=>'bbm2','onkeyup'=>"cekbbm();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"BBM tidak boleh lebih besar dari tarif gaji dan uang jalan"])); ?>

                                    </div>
                                </div> -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('dari', 'Dari:')); ?>

                                        <?php echo e(Form::text('dari',null,
                                         ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','required'=>'required','id'=>'dari2','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tujuan', 'Tujuan:')); ?>

                                        <?php echo e(Form::text('tujuan',null,
                                         ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','required'=>'required','id'=>'tujuan2','autocomplete'=>'off'])); ?>

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
                        <th>No Trucking</th>
                        <th>No SPB</th>
                        <th>No SPB Manual</th>
                        <th>Tanggal SPB</th>
                        <th>Tanggal Kembali SPB</th>
                        <th>Total Berat</th>
                        <th>Mobil</th>
                        <th>Sopir</th>
                        <th>Pemilik</th>
                        <th>Gaji Sopir</th>
                        <th>Uang Jalan</th>
                        <th>BBM</th>
                        <th>Dari</th>
                        <th>Tujuan</th>
                     </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-warning">
                            <th class="text-center" colspan="9">Total</th>
                            <th id="grandtotal">-</th>
                            <th id="grandtotal2">-</th>
                            <th id="grandtotal3">-</th>
                            <th colspan="2"></th>
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
              right: -30px;
              transition: 0.3s;
              padding: 4px 8px;
              width: 90px;
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
            <?php if (app('laratrust')->can('add-truckingnon')) : ?>
            <a href="#" id="addspbnc"><button type="button" class="btn btn-info btn-xs add-button" data-toggle="modal" data-target="">DETAIL SPB <i class="fa fa-plus"></i></button></a>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('update-truckingnon')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="edittruckingnon" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-truckingnon')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapustruckingnon" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('view-truckingnon')) : ?>
            <button type="button" class="btn btn-success btn-xs view-button" id="viewspbnc">VIEW SPB <i class="fa fa-eye"></i></button>
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
            $('.form-group3').hide();
            $('.form-group4').hide();
            $('.form-group5').hide();
            $('.form-group6').hide();
            $('.form-group7').hide();
            $('.form-group8').hide();
            $('.form-group9').hide();
            $('.form-group10').hide();
            $('.form-group11').hide();
            $('.form-group12').hide();
            $('.form-group13').hide();
            $('.form-group15').hide();
            $('.form-group16').hide();
            $('.form-group17').hide();
            submit.disabled = true;
            $('.add-button').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.view-button').hide();
        }

        function pemilik(){
            var mobil = $('#kode_mobil').val();
            $.ajax({
                    url: '<?php echo route('truckingnondetail.pemilik'); ?>',
                    type: 'POST',
                    data : {
                        'kode_mobil': mobil,
                    },
                    success: function(results) {
                        $('#Pemilik1').val(results.pemilik);
                        $('#Namasopir1').val(results.kode_sopir);
                        if(results.pemilik != 'PT. GEMILANG UTAMA INTERNASIONAL'){
                            $('.form-group7').hide();
                            $('.form-group17').show();
                        }else{
                            $('.form-group7').show();
                            $('.form-group17').hide();
                        }
                        $('#Kodepemilik1').val(results.kode_pemilik);
                        console.log($('#kodepemilik1').val());
                    }
                });
        }

        function pemilik2(){
            var mobil = $('#kode_mobil2').val();
            $.ajax({
                    url: '<?php echo route('truckingnondetail.pemilik2'); ?>',
                    type: 'POST',
                    data : {
                        'kode_mobil': mobil,
                    },
                    success: function(results) {
                        $('#Pemilik2').val(results.pemilik);
                        $('#Namasopir2').val(results.kode_sopir);
                        if(results.pemilik != 'PT. GEMILANG UTAMA INTERNASIONAL'){
                            $('.form-group15').hide();
                            $('.form-group16').show();
                        }else{
                            $('.form-group15').show();
                            $('.form-group16').hide();
                        }
                        $('#kode_pemilik2').val(results.kode_pemilik);
                        console.log($('#kode_pemilik2').val());
                    }
                });
        }

        function tgl(){
            var tgl = $('#tanggal').val();
            var balik = $('#kembali').val();
            if ( balik < tgl ){
                submit.disabled = true;
            }else {
                submit.disabled = false;
            }
        }

        function tgl2(){
            var tgl = $('#tanggal2').val();
            var balik = $('#kembali2').val();
            if ( balik < tgl ){
                submit2.disabled = true;
            }else {
                submit2.disabled = false;
            }
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

        var total_berat = 0;

        $.each( result, function( key, row ) {
            total_berat += row.total_berat;
        });

        var my_table = "";


        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.kode_item+"</td>";
                    my_table += "<td>"+row.qty+"</td>";
                    my_table += "<td>"+formatRupiah(row.berat_satuan)+"</td>";
                    my_table += "<td>"+formatRupiah(row.total_berat)+"</td>";
                    my_table += "<td>"+row.keterangan+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Item</th>'+
                                '<th>Qty</th>'+
                                '<th>Berat Satuan</th>'+
                                '<th>Total Berat</th>'+
                                '<th>Keterangan</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '<tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="3">Total</th>'+
                                '<th>'+formatRupiah(total_berat)+'</th>'+
                                '<th></th>'+
                            '</tr>'+
                        '</tfoot>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

        function createspbnon()
        {
            var no_truckingnon = $('#notruckingnon').val();
             
            $.ajax({
                url:'<?php echo route('truckingnondetail.createspbnon'); ?>',
                type:'POST',
                data : {
                        'no_truckingnon': no_truckingnon,
                    },
                success: function(result) {
                        console.log(result);
                        if (result.success === false){
                            swal("Gagal!", result.message, "error");
                        }else{
                            $('.form-group3').show();
                            $('.form-group4').show();
                            $('.form-group5').show();
                            $('.form-group6').show();
                            $('.form-group7').show();
                            $('.form-group8').show();
                            $('.form-group9').show();
                            $('.form-group10').show();
                            $('.form-group11').show();
                            $('.form-group12').show();
                            $('.form-group13').show();
                            $('#spb').val(result.hasil);
                            submit.disabled = false;
                        }
                    },
            });
        }
        
    $(function(){
        var no_truckingnon = $('#notruckingnon').val();
        
        $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'http://localhost/gui_front_emkl_laravel/admin/truckingnondetail/getDatabyID?id='+no_truckingnon,
            data:{'no_truckingnon':no_truckingnon},
            fnRowCallback: function (row, data, iDisplayIndex, iDisplayIndexFull) {
                if (data['total_berat'] == 0) {
                    $('td', row).css('background-color', '#ffdbd3');
                }
            },
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
                        .column( 9 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    grandTotal2 = api
                        .column( 10 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    grandTotal3 = api
                        .column( 11 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer
                    $( api.column( 9 ).footer() ).html(
                        ''+formatRupiah(grandTotal)
                    );

                    $( api.column( 10 ).footer() ).html(
                        ''+formatRupiah(grandTotal2)
                    );

                    $( api.column( 11 ).footer() ).html(
                        ''+formatRupiah(grandTotal3)
                    );
                },

            columns: [
                { data: 'no_truckingnon', name: 'no_truckingnon' },
                { data: 'no_spb', name: 'no_spb' },
                { data: 'no_spb_manual', name: 'no_spb_manual' },
                { data: 'tanggal_spb', name: 'tanggal_spb' },
                { data: 'tanggal_kembali', "defaultContent": "<i>Not set</i>" },
                { data: 'total_berat', "defaultContent": "<i>Not set</i>" },
                { data: 'mobil.nopol', "defaultContent": "<i>Not set</i>" },
                { data: 'sopir.nama_sopir',
                    render: function( data, type, full ) {
                    return formatSopir(data, full); }
                },
                { data: 'pemilik.nama_pemilik', "defaultContent": "<i>Not set</i>" },
                { data: 'tarif_gajisopir', "defaultContent": "<i>Not set</i>" },
                { data: 'uang_jalan', "defaultContent": "<i>Not set</i>" },
                { data: 'bbm', "defaultContent": "<i>Not set</i>" },
                { data: 'dari', "defaultContent": "<i>Not set</i>" },
                { data: 'tujuan', "defaultContent": "<i>Not set</i>" },
            ]
            
        });
        
    });

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

        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            $('[data-toggle="tooltip"]').tooltip();   

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

                    closeOpenedRows(table, select);

                    var no_truckingnon = select.find('td:eq(0)').text();
                    var no_spb = select.find('td:eq(1)').text();
                    var berat = select.find('td:eq(5)').text();
                    var add = $("#addspbnc").attr("href","http://localhost/gui_front_emkl_laravel/admin/truckingnon/"+no_spb+no_truckingnon+"/detail2");
                    if(berat == 0){
                        $('.add-button').show();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                        $('.view-button').hide();
                    }else{
                        $('.add-button').show();
                        $('.hapus-button').hide();
                        $('.edit-button').show();
                        $('.view-button').show();
                    }
                }
            } );

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

            $('#viewspbnc').click( function () {
                var select = $('.selected').closest('tr');
                var no_spbnon = select.find('td:eq(1)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('truckingnondetail.showdetailspbnc'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_spbnon
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

            $('#edittruckingnon').click( function () {
                var select = $('.selected').closest('tr');
                var no_truckingnon = select.find('td:eq(0)').text();
                var no_spbnon = select.find('td:eq(1)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('truckingnondetail.edit_truckingnon'); ?>',
                    type: 'POST',
                    data : {
                        'no_truckingnon': no_truckingnon,
                        'no_spbnon': no_spbnon
                    },
                    success: function(results) {
                        console.log(results);
                        $('#ID').val(results.id);
                        $('#notruckingnon2').val(results.no_truckingnon);
                        $('#spb2').val(results.no_spb);
                        $('#spbmanual2').val(results.no_spb_manual);
                        $('#tanggal2').val(results.tanggal_spb);
                        $('#berat2').val(results.total_berat);
                        $('#Pemilik2').val(results.nama_pemilik);
                        $('#kode_pemilik2').val(results.kode_pemilik);
                        $('#kode_mobil2').val(results.kode_mobil);
                        $('#kode_sopir2').val(results.kode_sopir);
                        $('#gaji2').val(results.tarif_gajisopir);
                        $('#uang2').val(results.uang_jalan);
                        $('#bbm2').val(results.bbm);
                        $('#dari2').val(results.dari);
                        $('#tujuan2').val(results.tujuan);
                        $('.editform').show();
                        $('.addform').hide();
                    }
                });
            });

            $('#hapustruckingnon').click( function () {
                var select = $('.selected').closest('tr');
                var no_truckingnon = select.find('td:eq(0)').text();
                var no_spbnon = select.find('td:eq(1)').text();
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
                            url: '<?php echo route('truckingnondetail.hapus_truckingnon'); ?>',
                            type: 'POST',
                            data : {
                                'no_truckingnon': no_truckingnon,
                                'no_spbnon': no_spbnon
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

        function formatNumber(n) {
            console.log(n);
            if(n == null){
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

        function cektarif(){
            var tarif_gajisopir = parseInt($('#gaji2').val());
            var uang_jalan = parseInt($('#uang2').val());
            var bbm = parseInt($('#bbm2').val());

            if(tarif_gajisopir <= uang_jalan || tarif_gajisopir <= bbm){
                submit2.disabled = true;
            }else{
                submit2.disabled = false;
            }
        }

        function cekuang(){
            var tarif_gajisopir = parseInt($('#gaji2').val());
            var uang_jalan = parseInt($('#uang2').val());
            var bbm = parseInt($('#bbm2').val());

            if(uang_jalan >= tarif_gajisopir || uang_jalan <= bbm){
                submit2.disabled = true;
            }else{
                submit2.disabled = false;
            }
        }

        function cekbbm(){
            var tarif_gajisopir = parseInt($('#gaji2').val());
            var uang_jalan = parseInt($('#uang2').val());
            var bbm = parseInt($('#bbm2').val());

            if(bbm >= tarif_gajisopir || bbm >= uang_jalan){
                submit2.disabled = true;
            }else{
                submit2.disabled = false;
            }
        }

        function cektarif2(){
            var tarif_gajisopir = parseInt($('#gaji').val());
            var uang_jalan = parseInt($('#uang').val());
            var bbm = parseInt($('#bbm').val());

            if(tarif_gajisopir <= uang_jalan || tarif_gajisopir <= bbm){
                submit.disabled = true;
            }else{
                submit.disabled = false;
            }
        }

        function cekuang2(){
            var tarif_gajisopir = parseInt($('#gaji').val());
            var uang_jalan = parseInt($('#uang').val());
            var bbm = parseInt($('#bbm').val());

            if(uang_jalan >= tarif_gajisopir || uang_jalan <= bbm){
                submit.disabled = true;
            }else{
                submit.disabled = false;
            }
        }

        function cekbbm2(){
            var tarif_gajisopir = parseInt($('#gaji').val());
            var uang_jalan = parseInt($('#uang').val());
            var bbm = parseInt($('#bbm').val());

            if(bbm >= tarif_gajisopir || bbm >= uang_jalan){
                submit.disabled = true;
            }else{
                submit.disabled = false;
            }
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
                    url:'<?php echo route('truckingnondetail.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#spb').val('');
                        $('#spbmanual').val('');
                        $('#tanggal').val('');
                        $('#berat').val(0);
                        $('#Pemilik1').val('');
                        $('#kode_pemilik').val('');
                        $('#kode_mobil').val('').trigger('change');
                        $('#kode_sopir').val('').trigger('change');
                        $('#gaji').val('');
                        $('#uang').val('');
                        $('#bbm').val('');
                        $('#dari').val('').trigger('change');
                        $('#tujuan').val('').trigger('change');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                            $('.form-group3').hide();
                            $('.form-group4').hide();
                            $('.form-group5').hide();
                            $('.form-group6').hide();
                            $('.form-group7').hide();
                            $('.form-group8').hide();
                            $('.form-group9').hide();
                            $('.form-group10').hide();
                            $('.form-group11').hide();
                            $('.form-group12').hide();
                            $('.form-group13').hide();
                            $('.form-group17').hide();
                            submit.disabled = true;
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
                    url:'<?php echo route('truckingnondetail.updateajax'); ?>',
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