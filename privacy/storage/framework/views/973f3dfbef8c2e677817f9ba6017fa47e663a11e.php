<?php $__env->startSection('title', 'Spb Container Detail'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <button type="button" class="btn btn-danger btn-xs" onclick="back()"><i class="fa fa-arrow-left"></i> Kembali</button>
    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()"><i class="fa fa-refresh"></i> Refresh</button>
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
                                    <div class="form-group9">
                                        <?php echo e(Form::label('no_trucking', 'No Truck. Container:')); ?>

                                        <?php echo e(Form::text('no_trucking',$no_trucking, ['class'=> 'form-control','style'=>'width: 100%','id'=>'notrucking1','required','readonly'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group8">
                                        <?php echo e(Form::label('no_spb', 'No SPB Container:')); ?>

                                        <?php echo e(Form::text('no_spb',$no_spb, ['class'=> 'form-control','readonly','id'=>'spb1'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group7">
                                        <?php echo e(Form::label('no_spb_manual', 'No SPB Manual:')); ?>

                                        <?php echo e(Form::text('no_spb_manual',null, ['class'=> 'form-control','required','id'=>'manual1','autocomplete'=>'off'])); ?>

                                    </div>
                                </div>
                                    <div class="col-md-2">
                                        <div class="form-group6">
                                            <?php echo e(Form::label('tgl_spb', 'Tanggal SPB:')); ?>

                                            <?php echo e(Form::date('tgl_spb', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required','onchange'=>"tgl();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Tanggal SPB tidak boleh lebih dari tanggal kembali."])); ?>

                                         </div>
                                    </div>
                                    <!-- <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('tgl_kembali', 'Tanggal Kembali SPB:')); ?>

                                            <?php echo e(Form::date('tgl_kembali', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Kembali1' ,'required'=>'required','onchange'=>"tgl();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Tanggal SPB tidak boleh lebih dari tanggal kembali."])); ?>

                                        </div>
                                    </div> -->
                                    <div class="col-md-2">
                                        <div class="form-group3">
                                            <?php echo e(Form::label('kode_mobil', 'Mobil:')); ?>

                                            <?php echo e(Form::select('kode_mobil',$Mobil->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Mobil1','required'=>'required','onchange'=>"pemilik();"])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group1">
                                            <?php echo e(Form::label('kode_sopir', 'Sopir:')); ?>

                                            <?php echo e(Form::select('kode_sopir',$Sopir->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Sopir1'])); ?>

                                        </div>
                                        <div class="form-group2">
                                            <?php echo e(Form::label('sopir', 'Sopir:')); ?>

                                            <?php echo e(Form::text('sopir',null, ['class'=> 'form-control','id'=>'Namasopir1','autocomplete'=>'off'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group4">
                                            <?php echo e(Form::label('nama_pemilik', 'Pemilik:')); ?>

                                            <?php echo e(Form::text('nama_pemilik', null, ['class'=> 'form-control','readonly','id'=>'Pemilik1'])); ?>

                                            <?php echo e(Form::hidden('kode_pemilik', null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'kode_pemilik1'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group5">
                                            <?php echo e(Form::label('trucking', 'Tarif Trucking:')); ?>

                                            <?php echo e(Form::text('trucking', $get_tarif, ['class'=> 'form-control','id'=>'Trucking1', 'placeholder'=>'Trucking', 'autocomplete'=>'off','required','readonly'])); ?>

                                         </div>
                                    </div>
                                    <!-- <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('uang_jalan', 'Uang Jalan:')); ?>

                                            <?php echo e(Form::text('uang_jalan', null, ['class'=> 'form-control','id'=>'Uang1', 'placeholder'=>'Uang Jalan', 'autocomplete'=>'off','required','onkeyup'=>"cekuang();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Uang Jalan tidak boleh lebih besar dari tarif trucking dan tidak lebih kecil dari BBM"])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('bbm', 'BBM:')); ?>

                                            <?php echo e(Form::text('bbm', null, ['class'=> 'form-control','id'=>'Bbm1', 'placeholder'=>'BBM', 'autocomplete'=>'off','required','onkeyup'=>"cekbbm();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"BBM tidak boleh lebih besar dari tarif trucking dan uang jalan"])); ?>

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

                                            <?php echo e(Form::text('biaya_lain', null, ['class'=> 'form-control','id'=>'Biaya1', 'placeholder'=>'Biaya Lain', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div>  -->
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
                                
                                    <?php echo e(Form::hidden('no_trucking',$no_trucking, ['class'=> 'form-control','style'=>'width: 100%','id'=>'notruck','required','readonly'])); ?>


                                    <div class="col-md-4">
                                        <div class="form-group12">
                                            <?php echo e(Form::label('no_spb', 'No SPB Container:')); ?>

                                            <?php echo e(Form::text('no_spb',null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'nospb','required','readonly'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group13">
                                            <?php echo e(Form::label('no_spb_manual', 'No SPB Manual:')); ?>

                                            <?php echo e(Form::text('no_spb_manual',null, ['class'=> 'form-control','required','id'=>'Manual'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group14">
                                            <?php echo e(Form::label('tgl_spb', 'Tanggal SPB:')); ?>

                                            <?php echo e(Form::date('tgl_spb', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal' ,'required'=>'required','onchange'=>"tgl2();"])); ?>

                                         </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group15">
                                            <?php echo e(Form::label('tgl_kembali', 'Tanggal Kembali SPB:')); ?>

                                            <?php echo e(Form::date('tgl_kembali', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Kembali' ,'required'=>'required','onchange'=>"tgl2();"])); ?>

                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group16">
                                            <br>
                                            <?php echo e(Form::label('kode_mobil', 'Mobil:')); ?>

                                            <?php echo e(Form::select('kode_mobil',$Mobil->sort(),null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Mobil','required'=>'required','onchange'=>"pemilik2();"])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group3">
                                            <br>
                                            <?php echo e(Form::label('kode_sopir', 'Sopir:')); ?>

                                            <?php echo e(Form::select('kode_sopir',$Sopir->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','id'=>'Sopir'])); ?>

                                        </div>
                                        <div class="form-group4">
                                            <br>
                                            <?php echo e(Form::label('sopir', 'Sopir:')); ?>

                                            <?php echo e(Form::text('sopir',null, ['class'=> 'form-control','id'=>'Sopirnama','autocomplete'=>'off'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group5">
                                            <br>
                                            <?php echo e(Form::label('nama_pemilik', 'Pemilik:')); ?>

                                            <?php echo e(Form::text('nama_pemilik', null, ['class'=> 'form-control','readonly','id'=>'Pemilik2'])); ?>

                                            <?php echo e(Form::hidden('kode_pemilik', null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'kode_pemilik2'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group6">
                                            <br>
                                            <?php echo e(Form::label('trucking', 'Trucking:')); ?>

                                            <?php echo e(Form::text('trucking', null, ['class'=> 'form-control','id'=>'Trucking', 'placeholder'=>'Trucking', 'autocomplete'=>'off','required','readonly'])); ?>

                                         </div>
                                    </div> 
                                   <!--  <div class="col-md-4">
                                        <div class="form-group7">
                                            <?php echo e(Form::label('uang_jalan', 'Uang Jalan:')); ?>

                                            <?php echo e(Form::text('uang_jalan', null, ['class'=> 'form-control','id'=>'Uang', 'placeholder'=>'Uang Jalan', 'autocomplete'=>'off','required','onkeyup'=>"cekuang2();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"Uang Jalan tidak boleh lebih besar dari tarif trucking dan tidak lebih kecil dari BBM"])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group8">
                                            <?php echo e(Form::label('bbm', 'BBM:')); ?>

                                            <?php echo e(Form::text('bbm', null, ['class'=> 'form-control','id'=>'Bbm', 'placeholder'=>'BBM', 'autocomplete'=>'off','required','onkeyup'=>"cekbbm2();",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'title'=>"BBM tidak boleh lebih besar dari tarif trucking dan uang jalan"])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group9">
                                            <?php echo e(Form::label('bpa', 'B/P/A:')); ?>

                                            <?php echo e(Form::text('bpa', null, ['class'=> 'form-control','id'=>'Bpa', 'placeholder'=>'BPA', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group10">
                                            <?php echo e(Form::label('honor', 'Honor:')); ?>

                                            <?php echo e(Form::text('honor', null, ['class'=> 'form-control','id'=>'Honor', 'placeholder'=>'Honor', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group11">
                                            <?php echo e(Form::label('biaya_lain', 'Biaya Lain:')); ?>

                                            <?php echo e(Form::text('biaya_lain', null, ['class'=> 'form-control','id'=>'Biaya', 'placeholder'=>'Honor', 'autocomplete'=>'off','required'])); ?>

                                         </div>
                                    </div>  -->
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="row">
                                <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success','id'=>'submit2'])); ?>

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
                        <th>No SPB Manual</th>
                        <th>Tanggal SPB</th>
                        <th>Tanggal Kembali</th>
                        <th>Mobil</th>
                        <th>Sopir</th>
                        <th>Pemilik</th>
                        <th>Trucking</th>
                        <th>Uang Jalan</th>
                        <th>BBM</th>
                        <th>B/P/A</th>
                        <th>Honor</th>
                        <th>Biaya Lain</th>
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
            $('.edit-button').hide();
            $('.form-group1').hide();
            $('.form-group2').hide();
        }

        function tgl(){
            var tgl_pergi = $('#Tanggal1').val();
            var tgl_kembali = $('#Kembali1').val();
            if (tgl_kembali < tgl_pergi){
                submit.disabled = true;
            }else{
                submit.disabled = false;
            }
        }

        function tgl2(){
            var tgl_pergi = $('#Tanggal').val();
            var tgl_kembali = $('#Kembali').val();
            if (tgl_kembali < tgl_pergi){
                submit2.disabled = true;
            }else{
                submit2.disabled = false;
            }
        }

        function pemilik(){
            var mobil = $('#Mobil1').val();
            $.ajax({
                    url: '<?php echo route('truckingdetail.pemilik'); ?>',
                    type: 'POST',
                    data : {
                        'kode_mobil': mobil,
                    },
                    success: function(results) {
                        $('#Pemilik1').val(results.pemilik);
                        $('#Namasopir1').val(results.kode_sopir);
                        if(results.pemilik != 'PT. GEMILANG UTAMA INTERNASIONAL'){
                            $('.form-group1').hide();
                            $('.form-group2').show();
                        }else{
                            $('.form-group1').show();
                            $('.form-group2').hide();
                        }
                        $('#kode_pemilik1').val(results.kode_pemilik);
                        console.log($('#kode_pemilik1').val());
                    }
                });
        }
        
        function pemilik2(){
            var mobil = $('#Mobil').val();
            $.ajax({
                    url: '<?php echo route('truckingdetail.pemilik2'); ?>',
                    type: 'POST',
                    data : {
                        'kode_mobil': mobil,
                    },
                    success: function(results) {
                        $('#Pemilik2').val(results.pemilik);
                        $('#Sopirnama').val(results.kode_sopir);
                        if(results.pemilik != 'PT. GEMILANG UTAMA INTERNASIONAL'){
                            $('.form-group3').hide();
                            $('.form-group4').show();
                        }else{
                            $('.form-group3').show();
                            $('.form-group4').hide();
                        }
                        $('#kode_pemilik2').val(results.kode_pemilik);
                        console.log($('#kode_pemilik2').val());
                    }
                });
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
        var no_spb = $('#spb1').val();
        console.log(no_spb);
        $('#data2-table').DataTable({
                
            processing: true,
            serverSide: true,
            ajax:'http://localhost/gui_front_emkl_laravel/admin/truckingdetail/getDatabyID2?id='+no_spb,
            data:{'no_spb':no_spb},

            columns: [
                { data: 'no_spb', name: 'no_spb' },
                { data: 'no_spb_manual', name: 'no_spb_manual' },
                { data: 'tgl_spb', "defaultContent": "<i>Not set</i>" },
                { data: 'tgl_kembali', "defaultContent": "<i>Not set</i>" },
                { data: 'mobil.nopol', "defaultContent": "<i>Not set</i>" },
                { data: 'sopir.nama_sopir',
                    render: function( data, type, full ) {
                    return formatSopir(data, full); }
                },
                { data: 'pemilik.nama_pemilik', 
                    render: function( data, type, full ) {
                    return formatNomor(data); }
                },
                { data: 'trucking', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'uang_jalan', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'bbm', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'bpa', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'honor', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'biaya_lain', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
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

    function formatNomor(n) {
        // console.log(n);
        if(n == null){
            var stat = "PT. GEMILANG UTAMA INTERNASIONAL";
            return stat;
        }else{
            var str = n;
            var result = str;
            return result;
        }
    }

    function formatNumber(n) {
        if(n == 0){
            return 0;
        }else if(n == null){
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

        $('#editform2').on('show.bs.modal', function () {
            var optionVal = $("#Pemilik2").val();
            console.log(optionVal);
            if(optionVal == 'PT. GEMILANG UTAMA INTERNASIONAL')
            {
                $('.form-group3').show();
                $('.form-group4').hide();
            } 
            else 
            {
                $('.form-group3').hide();
                $('.form-group4').show();
            }
        })

        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            $('[data-toggle="tooltip"]').tooltip();   

            var table = $('#data2-table').DataTable();

            $('#data2-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var tgl = select.find('td:eq(1)').text();
                    if(tgl == 'Not set'){
                        $('.edit-button').hide();
                    }else{
                        $('.edit-button').show();
                    }
                }
            } );

            $('#editspb').click( function () {
                var select = $('.selected').closest('tr');
                var no_spb = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('truckingdetail.edit_spb'); ?>',
                    type: 'POST',
                    data : {
                        'no_spb': no_spb,
                    },
                    success: function(results) {
                        console.log(results);
                        $('#nospb').val(results.no_spb);
                        $('#Manual').val(results.no_spb_manual);
                        $('#Tanggal').val(results.tgl_spb);
                        $('#Kembali').val(results.tgl_kembali);
                        $('#Mobil').val(results.kode_mobil);
                        $('#Sopir').val(results.kode_sopir);
                        $('#Sopirnama').val(results.kode_sopir);
                        $('#Pemilik2').val(results.nama_pemilik);
                        $('#kode_pemilik2').val(results.kode_pemilik);
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
        });

        var table=$('#data-table').DataTable({
                scrollY: true,
                scrollX: true,
            
            });

        function cekuang(){
            var tarif_trucking = parseInt($('#Trucking1').val());
            var uang_jalan = parseInt($('#Uang1').val());
            var bbm = parseInt($('#Bbm1').val());

            if(uang_jalan >= tarif_trucking || uang_jalan <= bbm){
                submit.disabled = true;
            }else{
                submit.disabled = false;
            }
        }

        function cekbbm(){
            var tarif_trucking = parseInt($('#Trucking1').val());
            var uang_jalan = parseInt($('#Uang1').val());
            var bbm = parseInt($('#Bbm1').val());

            if(bbm >= tarif_trucking || bbm >= uang_jalan){
                submit.disabled = true;
            }else{
                submit.disabled = false;
            }
        }

        function cekuang2(){
            var tarif_trucking = parseInt($('#Trucking').val());
            var uang_jalan = parseInt($('#Uang').val());
            var bbm = parseInt($('#Bbm').val());

            if(uang_jalan >= tarif_trucking || uang_jalan <= bbm){
                submit2.disabled = true;
            }else{
                submit2.disabled = false;
            }
        }

        function cekbbm2(){
            var tarif_trucking = parseInt($('#Trucking').val());
            var uang_jalan = parseInt($('#Uang').val());
            var bbm = parseInt($('#Bbm').val());

            if(bbm >= tarif_trucking || bbm >= uang_jalan){
                submit2.disabled = true;
            }else{
                submit2.disabled = false;
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

        function back(){
            // history.go(-1);
            var notrucking = $('#notrucking1').val();
            window.location.replace("http://localhost/gui_front_emkl_laravel/admin/trucking/"+notrucking+"/detail");
        }

        function refreshTable() {
            $('#data2-table').DataTable().ajax.reload(null,false);
            $('.edit-button').hide();
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
                url:'<?php echo route('truckingdetail.store2'); ?>',
                type:'POST',
                data:formData,
                success:function(data) {
                    console.log(data);
                    $('#Tanggal1').val('');
                    $('#Kembali1').val('');
                    $('#Mobil1').val('').trigger('change');
                    $('#Sopir1').val('').trigger('change');
                    $('#Pemilik1').val('');
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
                    url:'<?php echo route('truckingdetail.updateajax2'); ?>',
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

        function cancel_edit(){
            $(".addform").show();
            $(".editform").hide();
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>