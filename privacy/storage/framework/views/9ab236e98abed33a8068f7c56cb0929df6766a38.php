<?php $__env->startSection('title', 'Pemakaian'); ?>

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
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                        <i class="fa fa-refresh"></i> Refresh</button>

                    <?php if (app('laratrust')->can('create-pemakaian')) : ?>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> Pemakaian Baru</button>
                    <?php endif; // app('laratrust')->can ?>

                    <span class="pull-right"> 
                        <font style="font-size: 16px;"><b>PEMAKAIAN</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-primary" style="font-size: 11px;">
                        <th>No Pemakaian</th>
                        <th>Tanggal Pemakaian</th>
                        <th>No Polisi</th>
                        <th>No Aset Mobil</th>
                        <th>Nama Alat</th>
                        <th>No Aset Alat</th>           
                        <th>Nama Kapal</th>
                        <th>No Aset Kapal</th>
                        <th>Deskripsi</th>
                        <th>Pemakai</th>
                        <th>Total Item</th>
                        <th>Status</th>
                        <th>Tipe Pemakaian</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

<div class="modal fade" id="addform"  role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="row">
                    <div class="col-md-3">
                        <h4>Create Data</h4>   
                    </div>
                  </div>
                </div>
                
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['id'=>'ADD']); ?>

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Type', 'Tipe Pemakaian:',['class'=>'control-label'])); ?>

                                        <?php echo e(Form::select('type', ['Mobil'=>'Mobil','Alat'=>'Alat','Kapal'=>'Kapal','Other'=>'Other'],null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'type','onchange'=>"pakai();",'required'])); ?>

                                    </div>
                                </div>
        
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Tanggal Pemakaian', 'Tanggal Pemakaian:')); ?>

                                        <?php echo e(Form::date('tanggal_pemakaian', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1','required'=>'required'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('pemakai', 'Pemakai:')); ?>

                                        <?php echo e(Form::text('pemakai', null, ['class'=> 'form-control','id'=>'Pemakai1','required'=>'required', 'placeholder'=>'Pemakai', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                    </div>
                                </div>
                                
                                    <div class="form-group1 col-md-6">
                                        <div id="nopols">
                                            <?php echo e(Form::label('nopol', 'Nomor Polisi:')); ?>

                                            <?php echo e(Form::select('kode_mobil',$Mobil,null, ['class'=>'form-control select2','id'=>'Nopol1','style'=>'width: 100%','placeholder' => '','disabled','onchange'=>'getasetmobil();'])); ?>

                                        </div>             
                                    </div>

                                    <div class="form-group13 col-md-6">                     
                                        <div id="alats">
                                            <?php echo e(Form::label('kode_alat', 'Kode Alat:')); ?>

                                            <?php echo e(Form::select('kode_alat',$Alat,null, ['class'=>'form-control select2','id'=>'Alat1','style'=>'width: 100%','placeholder' => '','disabled','onchange'=>'getasetalat();'])); ?>

                                        </div>
                                    </div>

                                    <div class="form-group5 col-md-6">
                                        <div id="kapals">
                                            <?php echo e(Form::label('kode_kapal', 'Kode Kapal:')); ?>

                                            <?php echo e(Form::select('kode_kapal',$Kapal,null, ['class'=>'form-control select2','id'=>'Kapal1','style'=>'width: 100%','placeholder' => '','disabled','onchange'=>'getasetkapal();'])); ?>

                                        </div>
                                    </div>   

                                    <div class="form-group4 col-md-6">
                                        <div id="noasetx1">
                                            <?php echo e(Form::label('Aset', 'No Aset Mobil:')); ?>

                                            <?php echo e(Form::select('aset',$Asmobil, null, ['class'=> 'form-control select2','id'=>'noaset1','style'=>'width: 100%','placeholder' => ''])); ?>

                                        </div>
                                    </div>

                                    <div class="form-group8 col-md-6">
                                        <div id="noasetx2">
                                            <?php echo e(Form::label('Aset', 'No Aset Alat:')); ?>

                                            <?php echo e(Form::select('aset',$Asalat, null, ['class'=> 'form-control select2','id'=>'noaset2','style'=>'width: 100%','placeholder' => ''])); ?>

                                        </div>
                                    </div>

                                    <div class="form-group9 col-md-6">
                                        <div id="noasetx3">
                                            <?php echo e(Form::label('Aset', 'No Aset Kapal:')); ?>

                                            <?php echo e(Form::select('aset',$Askapal, null, ['class'=> 'form-control select2','id'=>'noaset3','style'=>'width: 100%','placeholder' => ''])); ?>

                                        </div>
                                    </div>

                                    <div class="form-group6 cold-md-8">
                                        <div id="other">
                                            <?php echo e(Form::label('other', 'Deskripsi Other:')); ?>

                                            <?php echo e(Form::text('other', null, ['class'=> 'form-control','id'=>'other1'])); ?>

                                        </div>
                                    </div>
                                                                 
                                    <div class="form-group3 col-md-6">
                                        <div id="nopols_as">
                                            <?php echo e(Form::label('nopol', 'Nomor Asset Mobil:')); ?>

                                            <?php echo e(Form::select('no_asset_mobil',$Asmobil,null, ['class'=>'form-control','id'=>'Aset1','style'=>'width: 100%','placeholder' => '','disabled','onchange'=>'getnopol();'])); ?>

                                        </div>
                                    
                                    
                                        <div id="alats_as">
                                            <?php echo e(Form::label('kode_alat', 'Nomor Asset Alat:')); ?>

                                            <?php echo e(Form::select('no_asset_alat',$Asalat,null, ['class'=>'form-control','id'=>'Aset2','style'=>'width: 100%','placeholder' => '','disabled'])); ?>

                                        </div>
                                    
                                    
                                        <div id="kapals_as">
                                            <?php echo e(Form::label('kode_kapal', 'Nomor Asset Kapal:')); ?>

                                            <?php echo e(Form::select('no_asset_kapal',$Askapal,null, ['class'=>'form-control','id'=>'Aset3','style'=>'width: 100%','placeholder' => '','disabled'])); ?>

                                        </div>                                   
                                    </div>


                                <div class="col-md-12">
                                    <div class="form-group7">
                                        <br>
                                        <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                        <?php echo e(Form::textArea('deskripsi', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi1', 'placeholder'=>'Deskripsi', 'autocomplete'=>'off'])); ?>

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
                                            <?php echo e(Form::hidden('no_pemakaian', null, ['class'=> 'form-control','id'=>'Pemakaian','readonly'])); ?>

                                                                                                                                  
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('Type', 'Tipe Pemakaian:')); ?>

                                            <?php echo e(Form::text('type', null, ['class'=> 'form-control','id'=>'typeedit','readonly'])); ?>

                                        </div>
                                    </div>
            
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('Tanggal Pemakaian', 'Tanggal Pemakaian:')); ?>

                                            <?php echo e(Form::date('tanggal_pemakaian', null,['class'=> 'form-control','id'=>'Tanggal'])); ?>                                        
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('pemakai', 'Pemakai:')); ?>

                                            <?php echo e(Form::text('pemakai', null, ['class'=> 'form-control','id'=>'Pemakai', 'autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)"])); ?>

                                        </div>
                                    </div>    

                                    <div class="col-md-6">
                                        <div class="form-group2">
                                            <div id="nopols1">
                                                <?php echo e(Form::label('nopol', 'Nomor Polisi:')); ?>

                                                <?php echo e(Form::select('kode_mobil',$Mobil,null, ['class'=>'form-control','id'=>'Nopol','style'=>'width: 100%','onchange'=>'getasetmobil2();'])); ?>

                                            </div>
                                      
                                            <div id="alats1">
                                                <?php echo e(Form::label('kode_alat', 'Nama Alat:')); ?>

                                                <?php echo e(Form::select('kode_alat',$Alat,null, ['class'=>'form-control','id'=>'Alat','style'=>'width: 100%','onchange'=>'getasetalat2();'])); ?>                                      
                                            </div>

                                            <div id="kapals1">
                                                <?php echo e(Form::label('kode_kapal', 'Nama Kapal:')); ?>

                                                <?php echo e(Form::select('kode_kapal',$Kapal,null, ['class'=>'form-control','id'=>'Kapal','style'=>'width: 100%','onchange'=>'getasetkapal2();'])); ?>                                      
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group11">
                                            <div id="asetnopols1">
                                                <?php echo e(Form::label('no_asset_mobil', 'Nomor Aset:')); ?>

                                                <?php echo e(Form::select('no_asset_mobil',$Asmobil,null, ['class'=>'form-control','id'=>'Asetmobil','style'=>'width: 100%'])); ?>

                                            </div>

                                            <div id="asetalats1">
                                                <?php echo e(Form::label('no_asset_alat', 'Nomor Aset:')); ?>

                                                <?php echo e(Form::select('no_asset_alat',$Asalat,null, ['class'=>'form-control','id'=>'Asetalat','style'=>'width: 100%'])); ?>

                                            </div>

                                            <div id="asetkapals1">
                                                <?php echo e(Form::label('no_asset_kapal', 'Nomor Aset:')); ?>

                                                <?php echo e(Form::select('no_asset_kapal',$Askapal,null, ['class'=>'form-control','id'=>'Asetkapal','style'=>'width: 100%'])); ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                            <?php echo e(Form::textArea('deskripsi', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi', 'autocomplete'=>'off'])); ?>

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

                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->


        <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i>PT. SELARAS UNGGUL BERSAMA</i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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
            <?php if (app('laratrust')->can('update-pemakaian')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editpemakaian" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-pemakaian')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuspemakaian" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('add-pemakaian')) : ?>
            <a href="#" id="addpemakaian"><button type="button" class="btn btn-info btn-xs add-button" data-toggle="modal" data-target="">ADD <i class="fa fa-plus"></i></button></a>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('post-pemakaian')) : ?>
            <button type="button" class="btn btn-success btn-xs tombol1" id="button1">POST <i class="fa fa-bullhorn"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('unpost-pemakaian')) : ?>
            <button type="button" class="btn btn-warning btn-xs tombol2" id="button2">UNPOST <i class="fa fa-undo"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('view-pemakaian')) : ?>
            <button type="button" class="btn btn-primary btn-xs view-button" id="button3">VIEW <i class="fa fa-eye"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('print-pemakaian')) : ?>
            <a href="#" target="_blank" id="printpemakaian"><button type="button" class="btn btn-danger btn-xs print-button" id="button6">PRINT <i class="fa fa-print"></i></button></a>
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
            $('.form-group1').hide();
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.add-button').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.print-button').hide();
            $('.view-button').hide();
            $('.form-group2').hide();
            $('.form-group3').hide();
            $('.form-group4').hide();
            $('.form-group5').hide();
            $('.form-group6').hide();
            $('.form-group8').hide();
            $('.form-group9').hide();
            $('.form-group13').hide();
            $('.back2Top').show();
        }

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('pemakaian.data'); ?>',
           
            columns: [
                { data: 'no_pemakaian', name: 'no_pemakaian' },
                { data: 'tanggal_pemakaian', name: 'tanggal_pemakaian' },
                { data: 'mobil.nopol', name: 'mobil.nopol',defaultContent:''},
                { data: 'no_asset_mobil', name: 'no_asset_mobil' },
                { data: 'alat.nama_alat', name: 'alat.nama_alat',defaultContent:''},
                { data: 'no_asset_alat', name: 'no_asset_alat' },
                { data: 'kapal.nama_kapal', name: 'kapal.nama_kapal',defaultContent:''},
                { data: 'no_asset_kapal', name: 'no_asset_kapal' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'pemakai', name: 'pemakai' },
                { data: 'total_item', name: 'total_item'},
                { data: 'status', 
                    render: function( data, type, full ) {
                    return formatStatus(data); }
                },
                { data: 'type', name: 'type' },
            ]
            });
        });

        function formatStatus(n) {
            console.log(n);
            if(n != 'POSTED'){
                return n;
            }else{
                var stat = "<span style='color:#0eab25'><b>POSTED</b></span>";
                return n.replace(/POSTED/, stat);
            }
        }


        function pakai() {
            var type = $("#type").val();
            // console.log(type)
            if (type == 0) {
            }else if(type == 'Mobil'){
                $('.form-group3').hide();
                $('.form-group1').show();
                $('.form-group4').show();
                $('.form-group5').hide();
                $('.form-group13').hide();
                $('.form-group6').hide();
                $('.form-group7').show();
                $('.form-group8').hide();
                $('.form-group9').hide();
                $('#ADD :input').attr('disabled', false);             
                document.getElementById("Pemakai1").disabled = false;
                document.getElementById("Deskripsi1").disabled = false;
                document.getElementById("Deskripsi1").readonly = false;
            }else if(type == 'Alat'){
                $('.form-group3').hide();
                $('.form-group13').show();
                $('.form-group4').hide();
                $('.form-group5').hide();
                $('.form-group1').hide();
                $('.form-group6').hide();
                $('.form-group7').show();
                $('.form-group8').show();
                $('.form-group9').hide();
                $('#ADD :input').attr('disabled', false);               
                document.getElementById("Pemakai1").disabled = false;
                document.getElementById("Deskripsi1").disabled = false;
                document.getElementById("Deskripsi1").readonly = false;
            }
            else if(type == 'Kapal'){
                $('.form-group3').hide();
                $('.form-group5').show();
                $('.form-group4').hide();
                $('.form-group1').hide();
                $('.form-group13').hide();
                $('.form-group6').hide();
                $('.form-group7').show();
                $('.form-group8').hide();
                $('.form-group9').show();
                $('#ADD :input').attr('disabled', false);
                document.getElementById("Tanggal1").disabled = false;                                    
                document.getElementById("Pemakai1").disabled = false;
                document.getElementById("Deskripsi1").disabled = false;
                document.getElementById("Deskripsi1").readonly = false;
            }
            else if(type == 'Other'){
                $('.form-group3').hide();
                $('.form-group5').hide();
                $('.form-group4').hide();
                $('.form-group1').hide();
                $('.form-group13').hide();
                $('.form-group6').hide();
                $('.form-group7').show();
                $('.form-group8').hide();
                $('.form-group9').hide();
                $('#ADD :input').attr('disabled', false);
                document.getElementById("Tanggal1").disabled = false;              
                document.getElementById("Pemakai1").disabled = false;                 
            }
        }

        function cek_tipe($tipe) {
            console.log($tipe)
            if ($tipe == 'Mobil') {
                $('.form-group_e4').show();
                $('.form-group_e1').show();
                $('.form-group_e2').hide();
                $('.form-group_e8').hide();
                $('.form-group_e5').hide();
                $('.form-group_e9').hide();
            }
            else if ($tipe == 'Alat') {
                $('.form-group_e2').show();
                $('.form-group_e8').show();
                $('.form-group_e4').hide();
                $('.form-group_e1').hide();
                $('.form-group_e5').hide();
                $('.form-group_e9').hide();
            }
            else if ($tipe == 'Kapal') {
                $('.form-group_e5').show();
                $('.form-group_e9').show();
                $('.form-group_e2').hide();
                $('.form-group_e8').hide();
                $('.form-group_e4').hide();
                $('.form-group_e1').hide();
            }
        }

        function pakai2() {
            var typejasa = $("#typejasa").val();

            if (typejasa == 'Mobil') {
                $('.form-group3').show();
                        document.getElementById("nopols_as").style.display="block";
                        document.getElementById("alats_as").style.display="none";
                    }
            else if (typejasa == 'Alat') {
                $('.form-group3').show();
                        document.getElementById("nopols_as").style.display="none";
                        document.getElementById("alats_as").style.display="block";
                    }
            else if (typejasa == 'Jasa') {
                $('.form-group3').show();
                        document.getElementById("nopols_as").style.display="none";
                        document.getElementById("alats_as").style.display="none";
                    }
        }


        $(function() {
            $('#child-table').DataTable({
                scrollY: 200,
                scrollX: true
            
            });
        });


        function formatRupiah(angka, prefix='Rp'){
           
            var rupiah = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return rupiah;
           
        }

        function createTable(result){

        var total_qty = 0;
        var total_pakai = 0;
        var total_harga = 0;
        var grand_total = 0;

        $.each( result, function( key, row ) {
            total_qty += row.qty;
            harga = row.harga;
            qty = row.qty;
            total_pakai = harga * qty;
            total_harga += total_pakai;
            grand_total = formatRupiah(total_harga);

        });

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.produk+"</td>";
                    my_table += "<td>"+row.partnumber+"</td>";
                    my_table += "<td>"+row.satuan+"</td>";
                    my_table += "<td>"+row.qty+"</td>";
                    my_table += "<td>Rp "+formatRupiah(row.harga)+"</td>";
                    my_table += "<td>Rp "+row.subtotal+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Produk</th>'+
                                '<th>Partnumber</th>'+
                                '<th>Satuan</th>'+
                                '<th>Qty</th>'+
                                '<th>Harga</th>'+
                                '<th>Subtotal</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                       ' <tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="3">Total</th>'+
                                '<th>'+total_qty+'</th>'+
                                '<th></th>'+
                                '<th>Rp '+grand_total+'</th>'+
                            '</tr>'+
                            '</tfoot>'+
                        '</table>';
            
            console.log(my_table);
            return my_table;          
        
        }

 //FUNGSI BREAKDOWN
        $(document).ready(function() {
                    var table = $('#data-table').DataTable();
                
                    $('#data-table tbody').on( 'click', 'td.details-control', function () {
                        var tr = $(this).closest('tr');
                        var kode = tr.find('td:eq(1)').text();
                        var row = table.row( tr );
                        if ( $(this).hasClass('selected bg-gray') ) {
                            $(this).removeClass('selected bg-gray');
                        } else {
                            table.$('tr.selected').removeClass('selected bg-gray');
                            $(this).addClass('selected');
                        }
                        $.ajax({
                            url: '<?php echo route('pemakaian.showdetail'); ?>',
                            type: 'POST',
                            data : {
                                'id': kode
                            },
                            success: function(result) {
                                console.log(result);
                                if(result.title == 'Gagal'){
                                    $.notify(result.message);
                                }else{
                                    if ( row.child.isShown() ) {
                                    row.child.hide();
                                    tr.removeClass('shown');
                                }
                                else {
                                    var len = result.length;
                                    for (var i = 0; i < len; i++) {
                                        console.log(result[i].produk,result[i].satuan,result[i].qty,result[i].harga);
                                        // alert(result[i].produk);
                                    }

                                    row.child( createTable(result) ).show();
                                    // row.child( format(result) ).show();
                                    tr.addClass('shown');
                                }
                            }
                            }
                        });

                        
                    } );
        } );


        $('#editform').on('show.bs.modal', function () {
              var optionVal = $("#typeedit").val();
              var optionValmobil = $("#Nopol").val();
              var optionValalat = $("#Alat").val();
               // console.log(typeedit)
               if(optionVal == 'Mobil')
               {
                  $('.form-group2').show();
                  document.getElementById("Tanggal").disabled = false;
                  document.getElementById("nopols1").style.display="block";
                  document.getElementById("asetnopols1").style.display="block";
                  document.getElementById("alats1").style.display="none";
                  document.getElementById("asetalats1").style.display="none";
                  document.getElementById("kapals1").style.display="none";
                  document.getElementById("asetkapals1").style.display="none";
                  document.getElementById("Pemakai").disabled = false;
                  document.getElementById("Deskripsi").disabled = false;
               } 
               else if(optionVal == 'Alat') 
               {
                  $('.form-group2').show();
                  document.getElementById("Tanggal").disabled = false;
                  document.getElementById("nopols1").style.display="none";
                  document.getElementById("asetnopols1").style.display="none";
                  document.getElementById("alats1").style.display="block";
                  document.getElementById("asetalats1").style.display="block";
                  document.getElementById("kapals1").style.display="none";
                  document.getElementById("asetkapals1").style.display="none";
                  document.getElementById("Pemakai").disabled = false;
                  document.getElementById("Deskripsi").disabled = false;
               }
               else if(optionVal == 'Kapal') 
               {
                    $('.form-group2').show();
                  document.getElementById("Tanggal").disabled = false;
                  document.getElementById("nopols1").style.display="none";
                  document.getElementById("asetnopols1").style.display="none";
                  document.getElementById("alats1").style.display="none";
                  document.getElementById("asetalats1").style.display="none";
                  document.getElementById("kapals1").style.display="block";
                  document.getElementById("asetkapals1").style.display="block";
                  document.getElementById("Pemakai").disabled = false;
                  document.getElementById("Deskripsi").disabled = false;
               }
               else
               {
                  $('.form-group2').show();
                  document.getElementById("Tanggal").disabled = false;
                  document.getElementById("Tanggal").disabled = false;
                  document.getElementById("nopols1").style.display="none";
                  document.getElementById("asetnopols1").style.display="none";
                  document.getElementById("alats1").style.display="none";
                  document.getElementById("asetalats1").style.display="none";
                  document.getElementById("kapals1").style.display="none";
                  document.getElementById("asetkapals1").style.display="none";
                  document.getElementById("Pemakai").disabled = false;
                  document.getElementById("Deskripsi").disabled = false;
               }    
            })

        // Fungsi POST-UNPOST,VIEW DETAIL,DAN PRINT
        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            var post = document.getElementById("button1");
            var unpost = document.getElementById("button2");

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.add-button').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.print-button').hide();
                    $('.view-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(11)').text();
                    var colom2 = select.find('td:eq(10)').text();
                    // var colom3 = select.find('td:eq(1)').text();
                    var no_pemakaian = select.find('td:eq(0)').text();
                    var add = $("#addpemakaian").attr("href","http://localhost/gui_inventory_sub_laravel/admin/pemakaian/"+no_pemakaian+"/detail");
                    var print = $("#printpemakaian").attr("href","http://localhost/gui_inventory_sub_laravel/admin/pemakaian/export2?no_pemakaian="+no_pemakaian);
                    var status = colom;
                    var item = colom2;
                    if(status == 'POSTED' && item > 0){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        $('.add-button').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.print-button').show();
                        $('.view-button').show();
                    }else if(status =='OPEN' && item > 0){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                        $('.add-button').show();
                        $('.hapus-button').hide();
                        $('.edit-button').show();
                        $('.print-button').hide();
                        $('.view-button').show();
                    }else if(status =='OPEN' && item == 0){
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
                var no_pemakaian = colom;
                console.log(no_pemakaian);
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
                            swal({
                            title: "<b>Proses Sedang Berlangsung</b>",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                            })
                            
                    // alert( table.rows('.selected').data().length +' row(s) selected' );
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('pemakaian.posting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pemakaian
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
                                  text: 'Post Gagal!',
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
                var no_pemakaian = colom;
                console.log(no_pemakaian);
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
                            swal({
                            title: "<b>Proses Sedang Berlangsung</b>",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                            })
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('pemakaian.unposting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pemakaian
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
                                  text: 'Unpost Gagal!',
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
                var no_pemakaian = select.find('td:eq(0)').text();
                var row = table.row( select );
                // console.log(no_pemakaian);
                $.ajax({
                    url: '<?php echo route('pemakaian.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_pemakaian
                    },
                    success: function(result) {
                        console.log(result);
                        if(result.title == 'Gagal'){
                            $.notify(result.message);
                        }else{
                            if ( row.child.isShown() ) {
                            row.child.hide();
                            tr.removeClass('shown');
                        }
                        else {
                            var len = result.length;
                            for (var i = 0; i < len; i++) {
                                console.log(result[i].produk,result[i].satuan,result[i].qty,result[i].harga);
                            }

                            row.child( createTable(result) ).show();
                            // row.child( format(result) ).show();
                            select.addClass('shown');
                        }
                     }
                    }
                });
            } );
            
            $('#editpemakaian').click( function () {
                var select = $('.selected').closest('tr');
                var no_pemakaian = select.find('td:eq(0)').text();
                var row = table.row( select );
                console.log(no_pemakaian);
                $.ajax({
                    url: '<?php echo route('pemakaian.edit_pemakaian'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_pemakaian
                    },
                    success: function(results) {
                        console.log(results);
                        $('#editform').modal('show');
                        $('#Pemakaian').val(results.no_pemakaian);
                        $('#Pemakai').val(results.pemakai);
                        $('#typeedit').val(results.type);
                        $('#Tanggal').val(results.tanggal_pemakaian);
                        $('#Alat').val(results.kode_alat);
                        $('#Asetalat').val(results.no_asset_alat);
                        $('#Nopol').val(results.kode_mobil);
                        $('#Asetmobil').val(results.no_asset_mobil);
                        $('#Kapal').val(results.kode_kapal);
                        $('#Asetkapal').val(results.no_asset_kapal);
                        $('#Status').val(results.status);
                        $('#Type').val(results.type);
                        $('#Deskripsi').val(results.deskripsi);
                        }
         
                });
            });

            $('#hapuspemakaian').click( function () {
                var select = $('.selected').closest('tr');
                var no_pemakaian = select.find('td:eq(0)').text();
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
                            url: '<?php echo route('pemakaian.hapus_pemakaian'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pemakaian
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

        $('.select2').select2({
            placeholder: "Pilih",
            allowClear: true,
        });

        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function refreshForm() {
             $('addform').reset();
        }

        function refreshTable() {
            $('#data-table').DataTable().ajax.reload(null,false);
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.add-button').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.print-button').hide();
            $('.view-button').hide();
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });

        function getasetmobil(){
            var nopol= $('#Nopol1').val();

            $.ajax({
                url:'<?php echo route('pemakaian.getmobil'); ?>',
                type:'POST',
                data : {
                        'id': nopol,
                    },
                success: function(result) {
                        console.log(result);
                        $('#noaset1').val(result.no_asset_mobil).trigger('change');
                        $('#Aset1').val(result.no_asset_mobil);
                    },
            });
        }

        function getasetalat(){
            var noalat= $('#Alat1').val();

            $.ajax({
                url:'<?php echo route('pemakaian.getalat'); ?>',
                type:'POST',
                data : {
                        'id': noalat,
                    },
                success: function(result) {
                        console.log(result);
                        $('#noaset2').val(result.no_asset_alat).trigger('change');
                        $('#Aset2').val(result.no_asset_alat);
                    },
            });
        }

        function getasetkapal(){
            var nokapal= $('#Kapal1').val();

            $.ajax({
                url:'<?php echo route('pemakaian.getkapal'); ?>',
                type:'POST',
                data : {
                        'id': nokapal,
                    },
                success: function(result) {
                        console.log(result);
                        $('#noaset3').val(result.no_asset_kapal).trigger('change');
                        $('#Aset3').val(result.no_asset_kapal);
                    },
            });
        }

        function getasetmobil2(){
            var nopol= $('#Nopol').val();

            $.ajax({
                url:'<?php echo route('pemakaian.getmobil2'); ?>',
                type:'POST',
                data : {
                        'id': nopol,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Asetmobil').val(result.no_asset_mobil).trigger('change');
                    },
            });
        }

        function getasetalat2(){
            var noalat= $('#Alat').val();

            $.ajax({
                url:'<?php echo route('pemakaian.getalat2'); ?>',
                type:'POST',
                data : {
                        'id': noalat,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Asetalat').val(result.no_asset_alat).trigger('change');
                    },
            });
        }

        function getasetkapal2(){
            var nokapal= $('#Kapal').val();

            $.ajax({
                url:'<?php echo route('pemakaian.getkapal2'); ?>',
                type:'POST',
                data : {
                        'id': nokapal,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Asetkapal').val(result.no_asset_kapal).trigger('change');
                    },
            });
        }

        function getnopol(){
            var asetmobil= $('#Aset1').val();

            $.ajax({
                url:'<?php echo route('pemakaian.getnopol'); ?>',
                type:'POST',
                data : {
                        'id': asetmobil,
                    },
                success: function(result) {
                        console.log(result);
                        $('#Nopol1').val(result.nopol);
                    },
            });
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

        $('#ADD').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();                    
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('pemakaian.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Tanggal1').val('');
                        $('#Pemakai1').val('');
                        $('#Nopol1').val('').trigger('change');
                        $('#Alat1').val('').trigger('change');
                        $('#Aset1').val('');
                        $('#Aset2').val('');
                        $('#Aset3').val('');
                        $('#noaset1').val('').trigger('change');
                        $('#noaset2').val('').trigger('change');
                        $('#noaset3').val('').trigger('change');
                        $('#Kapal1').val('').trigger('change');
                        $('#type').val('').trigger('change');
                        $('#Deskripsi1').val('');
                        $('#other1').val('');
                        $( '.kode-error' ).html('');
                        $( '.name-error' ).html('');
                        $('#addform').modal('hide');
                        $('.form-group1').hide();
                        $('.form-group2').hide();
                        $('.form-group3').hide();
                        $('.form-group4').hide();
                        $('.form-group5').hide();
                        $('.form-group6').hide();
                        $('.form-group8').hide();
                        $('.form-group9').hide();
                        $('.form-group13').hide();
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
                    url:'<?php echo route('pemakaian.updateajax'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('.form-group1').hide();
                        $('.form-group2').hide();
                        $('.form-group3').hide();
                        $('.form-group4').hide();
                        $('.form-group5').hide();
                        $('.form-group6').hide();
                        $('.form-group8').hide();
                        $('.form-group9').hide();
                        $('#editform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
            }
        );

        // function edit(id, url) {
            
        //         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        //         $.ajax({
        //             type: 'GET',
        //             url: url,
        //             data: {_token: CSRF_TOKEN},
        //             dataType: 'JSON',
        //             success: function (results) {

        //                 console.log(results);
        //                 $('#Pemakaian').val(results.no_pemakaian);
        //                 $('#Pemakai').val(results.pemakai);
        //                 $('#typeedit').val(results.type);
        //                 $('#Tanggal').val(results.tanggal_pemakaian);
        //                 $('#Alat').val(results.kode_alat);
        //                 $('#Asetalat').val(results.no_asset_alat);
        //                 $('#Nopol').val(results.kode_mobil);
        //                 $('#Asetmobil').val(results.no_asset_mobil);
        //                 $('#Kapal').val(results.kode_kapal);
        //                 $('#Asetkapal').val(results.no_asset_kapal);
        //                 $('#Status').val(results.status);
        //                 $('#Type').val(results.type);
        //                 $('#Deskripsi').val(results.deskripsi);
        //                 $('#editform').modal('show');
        //                 },
        //                 error : function() {
        //                 swal("GAGAL!<br><b>Status POSTED</b>");
        //             }
        //         });
        // }

        // function del(id, url) {
        //     swal({
        //     title: "Hapus?",
        //     text: "Pastikan dahulu item yang akan di hapus",
        //     type: "warning",
        //     showCancelButton: !0,
        //     confirmButtonText: "Ya, Hapus!",
        //     cancelButtonText: "Batal",
        //     reverseButtons: !0
        //     }).then(function (e) {
        //     if (e.value === true) {
        //         swal({
        //             title: "<b>Proses Sedang Berlangsung</b>",
        //             type: "warning",
        //             showCancelButton: false,
        //             showConfirmButton: false
        //         })

        //         $.ajax({
        //             type: 'DELETE',
        //             url: url,
                    
        //             success: function (results) {
        //             console.log(results);
        //                 if (results.success === true) {
        //                     swal("Berhasil!", results.message, "success");
        //                 } else {
        //                     swal("Gagal!", results.message, "error");
        //                 }
        //                 refreshTable();
        //             }
        //         });
        //     }
        //     });
        // }

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>