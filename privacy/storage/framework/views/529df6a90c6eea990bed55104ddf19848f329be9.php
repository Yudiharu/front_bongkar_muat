

<?php $__env->startSection('title', 'Pemakaian Alat Berat Detail'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <a href="<?php echo e($list_url); ?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()"><i class="fa fa-refresh"></i> Refresh</button>
    <button type="button" class="btn bg-purple btn-xs" onclick="cekts()"><i class="fa fa-anchor"></i> Check Timesheet</button>
    <span class="pull-right">
        <font style="font-size: 16px;"> Pemakaian Alat <b><?php echo e($pemakaian->no_pemakaian); ?></b></font>
    </span>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo e(Form::hidden('Link',request()->getSchemeAndHttpHost(), ['class'=> 'form-control','readonly','id'=>'Link1'])); ?>

<body onLoad="load()">
    <div class="box box-danger">
        <div class="box-body">
            <div class="addform">
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['id'=>'ADD_DETAIL']); ?>

            <center><kbd>ADD FORM</kbd></center><br>
                <div class="row">
                    <?php echo e(Form::hidden('no_pemakaian', $pemakaian->no_pemakaian, ['class'=> 'form-control','id'=>'NoPakai1','readonly'])); ?>

                    <!--<div class="col-md-5">-->
                    <!--    <div class="form-group">-->
                    <!--        <?php echo e(Form::label('Sats', 'Kode Aset Alat:')); ?>-->
                    <!--        <?php echo e(Form::select('kode_alat', $Alat->sort(), null, ['class'=> 'form-control select2','id'=>'Alat1','required','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>''])); ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'No SPK:')); ?>

                            <?php echo e(Form::select('no_spk', $Spk->sort(), null, ['class'=> 'form-control select2','id'=>'NoSpk1','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>'','onchange'=>'cekspk()'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'Kode Aset Alat:')); ?>

                             <?php echo e(Form::select('kode_alat', $Alat->sort(), null, ['class'=> 'form-control select2','id'=>'Alat1','required','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>''])); ?> 
                            <!--<?php echo e(Form::hidden('kode_alat', null, ['class'=> 'form-control','id'=>'Alat1','readonly'])); ?>-->
                            <!--<?php echo e(Form::text('nama_alat',null, ['class'=> 'form-control','id'=>'NamaAlat1','autocomplete'=>'off','readonly'])); ?>-->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Hargs', 'Hitungan Pemakaian:')); ?>

                            <?php echo e(Form::select('hitungan_pemakaian', ['1'=>'Jam','2'=>'Hour Meter'], null, ['class'=> 'form-control select2','id'=>'Hitungan1','required','placeholder'=>'','style'=>'width: 100%','onchange'=>"hitungan()"])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Mobs', 'No TimeSheet:')); ?>

                            <?php echo e(Form::text('no_timesheet',null, ['class'=> 'form-control','id'=>'NoTS1','autocomplete'=>'off','maxlength'=>'8'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Tanggals', 'Tgl Pakai:')); ?>

                            <?php echo e(Form::date('tgl_pakai', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required'])); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                    </div>
                    <!--form add baru-->
                    <!--<div class="col-md-2">-->
                    <!--    <div class="form-group">-->
                    <!--        <?php echo e(Form::label('Sats', 'Operator:')); ?>-->
                    <!--        <?php echo e(Form::hidden('operator', null, ['class'=> 'form-control','id'=>'Operator1','readonly'])); ?>-->
                    <!--        <?php echo e(Form::text('nama_operator',null, ['class'=> 'form-control','id'=>'NamaOperator1','autocomplete'=>'off','readonly'])); ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-md-2">-->
                    <!--    <div class="form-group">-->
                    <!--        <?php echo e(Form::label('Sats', 'Helper 1:')); ?>-->
                    <!--        <?php echo e(Form::hidden('helper1', null, ['class'=> 'form-control','id'=>'Helper1a','readonly'])); ?>-->
                    <!--        <?php echo e(Form::text('nama_helper1',null, ['class'=> 'form-control','id'=>'NamaHelper1','autocomplete'=>'off','readonly'])); ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-md-2">-->
                    <!--    <div class="form-group">-->
                    <!--        <?php echo e(Form::label('Sats', 'Helper 2:')); ?>-->
                    <!--        <?php echo e(Form::hidden('helper2', null, ['class'=> 'form-control','id'=>'Helper1b','readonly'])); ?>-->
                    <!--        <?php echo e(Form::text('nama_helper2',null, ['class'=> 'form-control','id'=>'NamaHelper2','autocomplete'=>'off','readonly'])); ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--form add lama-->
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'Operator:')); ?>

                            <?php echo e(Form::select('operator', $Operator->sort(), null, ['class'=> 'form-control select2','id'=>'Operator1','required','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>''])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'Helper 1:')); ?>

                            <?php echo e(Form::select('helper1', $Helper->sort(), null, ['class'=> 'form-control select2','id'=>'Helper1a','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>''])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'Helper 2:')); ?>

                            <?php echo e(Form::select('helper2', $Helper->sort(), null, ['class'=> 'form-control select2','id'=>'Helper1b','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>''])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('Mobs', 'Pekerjaan:')); ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                            <b>
                            <input type="hidden" name="hari_libur" value="0" />
                            <input type="checkbox" name="hari_libur" id="Libur1" value="1"/>&nbsp;Hari Libur?</b>
                            <?php echo e(Form::textarea('pekerjaan',null, ['class'=> 'form-control','id'=>'Pekerjaan1','autocomplete'=>'off','rows'=>'2','onkeypress'=>"return pulsar(event,this)",'maxlength'=>'100'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Jam Breakdown:')); ?>

                            <?php echo e(Form::time('jam_breakdown', null,['class'=> 'form-control','id'=>'JamBr1'])); ?>

                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Jam Dari:')); ?>

                            <?php echo e(Form::time('jam_dr', null,['class'=> 'form-control','id'=>'JamDr1' ,'required'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Jam Sampai:')); ?>

                            <?php echo e(Form::time('jam_sp', null,['class'=> 'form-control','id'=>'JamSp1' ,'required'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Istirahat:')); ?>

                            <?php echo e(Form::time('istirahat', null,['class'=> 'form-control','id'=>'Istirahat1'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Stand By:')); ?>

                            <?php echo e(Form::time('stand_by', null,['class'=> 'form-control','id'=>'StandBy1'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('hmdari', 'HM Dari:')); ?>

                            <?php echo e(Form::text('hm_dr',null, ['class'=> 'form-control','id'=>'HmDr1', 'onkeypress'=>"return hanyaAngka(event)"])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('hmsampai', 'HM Sampai:')); ?>

                            <?php echo e(Form::text('hm_sp',null, ['class'=> 'form-control','id'=>'HmSp1', 'onkeypress'=>"return hanyaAngka(event)"])); ?>

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
                    <?php echo e(Form::hidden('id', null, ['class'=> 'form-control','id'=>'ID','readonly'])); ?>

                    <?php echo e(Form::hidden('no_pemakaian', null, ['class'=> 'form-control','id'=>'NoPakai2','readonly'])); ?>

                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'No SPK:')); ?>

                            <?php echo e(Form::select('no_spk', $Spk->sort(), null, ['class'=> 'form-control select2','id'=>'NoSpk2','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>'','onchange'=>'cekspk2()'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'Kode Aset Alat:')); ?>

                            <?php echo e(Form::select('kode_alat', $Alat->sort(), null, ['class'=> 'form-control select2','id'=>'Alat2','required','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>''])); ?>

                        </div>
                    </div>
                    <!--<div class="col-md-4">-->
                    <!--    <div class="form-group">-->
                    <!--        <?php echo e(Form::label('Sats', 'Kode Aset Alat:')); ?>-->
                    <!--        <?php echo e(Form::hidden('kode_alat', null, ['class'=> 'form-control','id'=>'Alat2','readonly'])); ?>-->
                    <!--        <?php echo e(Form::text('nama_alat',null, ['class'=> 'form-control','id'=>'NamaAlat2','autocomplete'=>'off','readonly'])); ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Hargs', 'Hitungan Pemakaian:')); ?>

                            <?php echo e(Form::select('hitungan_pemakaian', ['1'=>'Jam','2'=>'Hour Meter'], null, ['class'=> 'form-control select2','id'=>'Hitungan2','required','placeholder'=>'','style'=>'width: 100%','onchange'=>"hitungan2()"])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Mobs', 'No TimeSheet:')); ?>

                            <?php echo e(Form::text('no_timesheet',null, ['class'=> 'form-control','id'=>'NoTS2','autocomplete'=>'off','maxlength'=>'8'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Tanggals', 'Tgl Pakai:')); ?>

                            <?php echo e(Form::date('tgl_pakai', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal2' ,'required'=>'required'])); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                    </div>
                    <!--form edit baru-->
                    <!--<div class="col-md-2">-->
                    <!--    <div class="form-group">-->
                    <!--        <?php echo e(Form::label('Sats', 'Operator:')); ?>-->
                    <!--        <?php echo e(Form::hidden('operator', null, ['class'=> 'form-control','id'=>'Operator2','readonly'])); ?>-->
                    <!--        <?php echo e(Form::text('nama_operator',null, ['class'=> 'form-control','id'=>'NamaOperator2','autocomplete'=>'off','readonly'])); ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-md-2">-->
                    <!--    <div class="form-group">-->
                    <!--        <?php echo e(Form::label('Sats', 'Helper 1:')); ?>-->
                    <!--        <?php echo e(Form::hidden('helper1', null, ['class'=> 'form-control','id'=>'Helper2a','readonly'])); ?>-->
                    <!--        <?php echo e(Form::text('nama_helper1',null, ['class'=> 'form-control','id'=>'NamaHelper1e','autocomplete'=>'off','readonly'])); ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-md-2">-->
                    <!--    <div class="form-group">-->
                    <!--        <?php echo e(Form::label('Sats', 'Helper 2:')); ?>-->
                    <!--        <?php echo e(Form::hidden('helper2', null, ['class'=> 'form-control','id'=>'Helper2b','readonly'])); ?>-->
                    <!--        <?php echo e(Form::text('nama_helper1',null, ['class'=> 'form-control','id'=>'NamaHelper2e','autocomplete'=>'off','readonly'])); ?>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--form edit lama-->
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'Operator:')); ?>

                            <?php echo e(Form::select('operator', $Operator->sort(), null, ['class'=> 'form-control select2','id'=>'Operator2','required','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>''])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'Helper 1:')); ?>

                            <?php echo e(Form::select('helper1', $Helper->sort(), null, ['class'=> 'form-control select2','id'=>'Helper2a','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>''])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Sats', 'Helper 2:')); ?>

                            <?php echo e(Form::select('helper2', $Helper->sort(), null, ['class'=> 'form-control select2','id'=>'Helper2b','autocomplete'=>'off','style'=>'width: 100%','placeholder'=>''])); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo e(Form::label('Mobs', 'Pekerjaan:')); ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                            <b>
                            <input type="hidden" name="hari_libur" value="0" />
                            <input type="checkbox" name="hari_libur" id="Libur2" value="1"/>&nbsp;Hari Libur?</b>
                            <?php echo e(Form::textarea('pekerjaan',null, ['class'=> 'form-control','id'=>'Pekerjaan2','autocomplete'=>'off','rows'=>'2','onkeypress'=>"return pulsar(event,this)"])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Jam Breakdown:')); ?>

                            <?php echo e(Form::time('jam_breakdown', null,['class'=> 'form-control','id'=>'JamBr2'])); ?>

                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Jam Dari:')); ?>

                            <?php echo e(Form::time('jam_dr', null,['class'=> 'form-control','id'=>'JamDr2' ,'required'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Jam Sampai:')); ?>

                            <?php echo e(Form::time('jam_sp', null,['class'=> 'form-control','id'=>'JamSp2' ,'required'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Istirahat:')); ?>

                            <?php echo e(Form::time('istirahat', null,['class'=> 'form-control','id'=>'Istirahat2'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Jams', 'Stand By:')); ?>

                            <?php echo e(Form::time('stand_by', null,['class'=> 'form-control','id'=>'StandBy2'])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('hmdari', 'HM Dari:')); ?>

                            <?php echo e(Form::text('hm_dr',null, ['class'=> 'form-control','id'=>'HmDr2', 'onkeypress'=>"return hanyaAngka(event)"])); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('hmsampai', 'HM Sampai:')); ?>

                            <?php echo e(Form::text('hm_sp',null, ['class'=> 'form-control','id'=>'HmSp2', 'onkeypress'=>"return hanyaAngka(event)"])); ?>

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
                <table class="table table-bordered table-striped table-hover" id="data2-table" style="font-size: 12px; width: 1200px;">
                    <thead>
                    <tr class="bg-warning">
                        <th>id</th>
                        <th>No Pemakaian</th>
                        <th style="width: 60px;">Kode Alat</th>
                        <th>Hitungan Pemakaian</th>
                        <th>No TimeSheet</th>
                        <th>Operator</th>
                        <th style="width: 50px;">Helper 1</th>
                        <th style="width: 50px;">Helper 2</th>
                        <th style="width: 150px;">Pekerjaan</th>
                        <th style="width: 60px;">Tgl Pakai</th>
                        <th>Hari Libur</th>
                        <th>Jam Dr</th>
                        <th>Jam Sp</th>
                        <th>Istirahat</th>
                        <th>Stand By</th>
                        <th>HM Dr</th>
                        <th>HM Sp</th>
                        <th>Total Jam</th>
                        <th>Total HM</th>
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
            
            .toolbar {
                float: left;
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
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editjoborderdetail" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusjoborderdetail" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>

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
            document.getElementById("HmDr1").readOnly = true;
            document.getElementById("HmSp1").readOnly = true;
            document.getElementById("JamDr1").readOnly = true;
            document.getElementById("JamSp1").readOnly = true;
            document.getElementById("Istirahat1").readOnly = true;
            document.getElementById("StandBy1").readOnly = true;
        }
        
        function cekspk(){
            var no_spk = $('#NoSpk1').val();
            $.ajax({
                url: '<?php echo route('pemakaianalatdetail.cekspk'); ?>',
                type: 'POST',
                data : {
                    'no_spk': no_spk,
                },
                success: function (results) {
                    $('#Alat1').val(results.kode_alat).trigger('change');
                    // $('#NamaAlat1').val(results.nama_alat);
                    $('#Operator1').val(results.operator).trigger('change');
                    // $('#NamaOperator1').val(results.nama_operator);
                    $('#Helper1a').val(results.helper1).trigger('change');
                    // $('#NamaHelper1').val(results.nama_helper1);
                    $('#Helper1b').val(results.helper2).trigger('change');
                    // $('#NamaHelper2').val(results.nama_helper2);
                }
            });
        }

        function cekspk2(){
            var no_spk = $('#NoSpk2').val();
            var id = $('#ID').val();
            $.ajax({
                url: '<?php echo route('pemakaianalatdetail.cekspk2'); ?>',
                type: 'POST',
                data : {
                    'no_spk': no_spk,
                    'id': id,
                },
                success: function (results) {
                    if (results.success === false) {
                        swal("Rejected!!", results.message, "error");
                        $('#NoSpk2').val(results.no_spk).trigger('change');
                    }else {
                        $('#Alat2').val(results.kode_alat).trigger('change');
                        // $('#NamaAlat2').val(results.nama_alat);
                        $('#Operator2').val(results.operator).trigger('change');
                        // $('#NamaOperator2').val(results.nama_operator);
                        $('#Helper2a').val(results.helper1).trigger('change');
                        // $('#NamaHelper1e').val(results.nama_helper1);
                        $('#Helper2b').val(results.helper2).trigger('change');
                        // $('#NamaHelper2e').val(results.nama_helper2);
                    }
                }
            });
        }
        
        function cekts(){
            var no_pemakaian = $('#NoPakai1').val();
            $.ajax({
                url: '<?php echo route('pemakaianalatdetail.cekts'); ?>',
                type: 'POST',
                data : {
                    'no_pemakaian': no_pemakaian,
                },
                success: function (results) {
                    if (results.success === true) {
                        
                    } else {
                        swal("Gagal!", results.message, "error");
                    }
                    refreshTable();
                }
            });
        }

        function hitungan(){
            var hitung = $('#Hitungan1').val();
            if (hitung == '1') {
                $('#HmDr1').val('');
                $('#HmSp1').val('');
                document.getElementById("HmDr1").readOnly = true;
                document.getElementById("HmSp1").readOnly = true;
                document.getElementById("JamDr1").readOnly = false;
                document.getElementById("JamSp1").readOnly = false;
                document.getElementById("Istirahat1").readOnly = false;
                document.getElementById("StandBy1").readOnly = false;
            }else if (hitung == '2') {
                $('#JamDr1').val('');
                $('#JamSp1').val('');
                $('#Istirahat1').val('');
                $('#StandBy1').val('');
                document.getElementById("HmDr1").readOnly = false;
                document.getElementById("HmSp1").readOnly = false;
                document.getElementById("JamDr1").readOnly = true;
                document.getElementById("JamSp1").readOnly = true;
                document.getElementById("Istirahat1").readOnly = true;
                document.getElementById("StandBy1").readOnly = true;
            }else {
                $('#JamDr1').val('');
                $('#JamSp1').val('');
                $('#Istirahat1').val('');
                $('#StandBy1').val('');
                document.getElementById("HmDr1").readOnly = true;
                document.getElementById("HmSp1").readOnly = true;
                document.getElementById("JamDr1").readOnly = true;
                document.getElementById("JamSp1").readOnly = true;
                document.getElementById("Istirahat1").readOnly = true;
                document.getElementById("StandBy1").readOnly = true;
            }
        }

        function hitungan2(){
            var hitung = $('#Hitungan2').val();
            if (hitung == '1') {
                $('#HmDr2').val('');
                $('#HmSp2').val('');
                document.getElementById("HmDr2").readOnly = true;
                document.getElementById("HmSp2").readOnly = true;
                document.getElementById("JamDr2").readOnly = false;
                document.getElementById("JamSp2").readOnly = false;
                document.getElementById("Istirahat2").readOnly = false;
                document.getElementById("StandBy2").readOnly = false;
            }else if (hitung == '2') {
                $('#JamDr2').val('');
                $('#JamSp2').val('');
                $('#Istirahat2').val('');
                $('#StandBy2').val('');
                document.getElementById("HmDr2").readOnly = false;
                document.getElementById("HmSp2").readOnly = false;
                document.getElementById("JamDr2").readOnly = true;
                document.getElementById("JamSp2").readOnly = true;
                document.getElementById("Istirahat2").readOnly = true;
                document.getElementById("StandBy2").readOnly = true;
            }else {
                $('#JamDr2').val('');
                $('#JamSp2').val('');
                $('#Istirahat2').val('');
                $('#StandBy2').val('');
                document.getElementById("HmDr2").readOnly = true;
                document.getElementById("HmSp2").readOnly = true;
                document.getElementById("JamDr2").readOnly = true;
                document.getElementById("JamSp2").readOnly = true;
                document.getElementById("Istirahat2").readOnly = true;
                document.getElementById("StandBy2").readOnly = true;
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
        var no_pemakaian = $('#NoPakai1').val();
        var link = $('#Link1').val();
        $('#data2-table').DataTable({
            "bPaginate": true,
            "bFilter": true,
            "scrollY": 220,
            "scrollX": 200,
            "dom": '<"toolbar">frtip',
            processing: true,   
            serverSide: true,
            ajax:link+'/gui_front_02/admin/pemakaianalatdetail/getDatabyID?id='+no_pemakaian,
            data:{'no_pemakaian':no_pemakaian},
            fnRowCallback: function (row, data, iDisplayIndex, iDisplayIndexFull) {
                if (data['marks'] == "MARKED") {
                    $('td', row).css('background-color', '#ffbab5');
                }
            },
            columns: [
                { data: 'id', name: 'id', visible: false },
                { data: 'no_pemakaian', name: 'no_pemakaian', visible: false },
                { data: 'alat.no_asset_alat', name: 'alat.no_asset_alat' },
                { data: 'hitungan_pemakaian',  
                    render: function( data, type, full ) {
                    return hitungan_pemakaian(data); }
                },
                { data: 'no_timesheet', name: 'no_timesheet' },
                { data: 'operator.nama_operator', name: 'operator.nama_operator' },
                { data: 'helper1.nama_helper', "defaultContent": "<i>-</i>" },
                { data: 'helper2.nama_helper', "defaultContent": "<i>-</i>" },
                { data: 'pekerjaan', name: 'pekerjaan' },
                { data: 'tgl_pakai', name: 'tgl_pakai' },
                { data: 'hari_libur',  
                    render: function( data, type, full ) {
                    return liburan(data); }
                },
                { data: 'jam_dr', "defaultContent": "<i>00:00:00</i>" },
                { data: 'jam_sp', "defaultContent": "<i>00:00:00</i>" },
                { data: 'istirahat', "defaultContent": "<i>00:00:00</i>" },
                { data: 'stand_by', "defaultContent": "<i>00:00:00</i>" },
                { data: 'hm_dr', "defaultContent": "<i>0</i>" },
                { data: 'hm_sp', "defaultContent": "<i>0</i>" },
                { data: 'total_jam', "defaultContent": "<i>00:00:00</i>" },
                { data: 'total_hm', "defaultContent": "<i>0</i>" },
            ]
            
        });
        
        $("div.toolbar").html('<b>Keterangan Warna:&nbsp;&nbsp;&nbsp;&nbsp;</b><font style="background-color:#ffbab5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>&nbsp;:&nbsp;Ada Nomor Timesheet yang terlompat.');
        
    });

    function hitungan_pemakaian(n) {
        if(n == '1'){
            var stat = "<span style='color:#030100'><b>Jam</b></span>";
        }else if(n == '2'){
            var stat = "<span style='color:#0eab25'><b>Hour Meter</b></span>";
        }
        return stat;
    }

    function liburan(n) {
        if(n == '0'){
            var stat = "<span style='color:#030100'><b>Tidak</b></span>";
        }else if(n == '1'){
            var stat = "<span style='color:#0eab25'><b>Ya</b></span>";
        }
        return stat;
    }

        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            var table = $('#data2-table').DataTable();

            $('#data2-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray text-bold');
                    $('.add-button').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                }else{
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray text-bold');
                    var select = $('.selected').closest('tr');
                    var data = $('#data2-table').DataTable().row(select).data();

                    closeOpenedRows(table, select);

                    var no_joborder = data['no_joborder'];
                    var id = data['id'];
                    
                    $('.hapus-button').show();
                    $('.edit-button').show();
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

            $('#editjoborderdetail').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#data2-table').DataTable().row(select).data();
                var id = data['id'];
                $.ajax({
                    url: '<?php echo route('pemakaianalatdetail.edit_detail'); ?>',
                    type: 'POST',
                    data : {
                        'id': id,
                    },
                    success: function(results) {
                        console.log(results);
                        $('#ID').val(results.id);
                        $('#NoPakai2').val(results.no_pemakaian);
                        if (results.no_spk != null){
                            $('#NoSpk2').val(results.no_spk).trigger('change');
                        }
                        $('#Alat2').val(results.kode_alat).trigger('change');
                        $('#Hitungan2').val(results.hitungan_pemakaian).trigger('change');
                        $('#NoTS2').val(results.no_timesheet);
                        $('#Tanggal2').val(results.tgl_pakai);
                        $('#Operator2').val(results.operator).trigger('change');
                        $('#Helper2a').val(results.helper1).trigger('change');
                        $('#Helper2b').val(results.helper2).trigger('change');
                        $('#Pekerjaan2').val(results.pekerjaan);
                        if (results.hari_libur == 1) {
                            document.getElementById("Libur2").checked = true;
                        }else {
                            document.getElementById("Libur2").checked = false;
                        }
                        $('#JamBr2').val(results.jam_breakdown);
                        $('#JamDr2').val(results.jam_dr);
                        $('#JamSp2').val(results.jam_sp);
                        $('#Istirahat2').val(results.istirahat);
                        $('#StandBy2').val(results.stand_by);
                        $('#HmDr2').val(results.hm_dr);
                        $('#HmSp2').val(results.hm_sp);

                        hitungan2();
                        $('.editform').show();
                        $('.addform').hide();
                    }
                });
            });

            $('#hapusjoborderdetail').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#data2-table').DataTable().row(select).data();
                var id = data['id'];
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
                            url: '<?php echo route('pemakaianalatdetail.hapus_detail'); ?>',
                            type: 'POST',
                            data : {
                                'id': id,
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
            if (decimal || (keychar == ".")) {
                return true;
            } else 
            if (keychar == ","){
                return false;
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
            
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
            
            // Check if empty of not
            $.ajax({
                url:'<?php echo route('pemakaianalatdetail.store'); ?>',
                type:'POST',
                data:formData,
                success:function(data) {
                    // $('#Alat1').val('').trigger('change');
                    $('#NoSpk1').val('').trigger('change');
                    $('#Alat1').val('');
                    $('#Hitungan1').val('').trigger('change');
                    $('#NoTS1').val('');
                    $('#Tanggal1').val(today);
                    // $('#Operator1').val('').trigger('change');
                    $('#Operator1').val('');
                    // $('#Helper1a').val('').trigger('change');
                    $('#Helper1a').val('');
                    // $('#Helper1b').val('').trigger('change');
                    $('#Helper1b').val('');
                    $('#Pekerjaan1').val('').trigger('change');
                    $('#JamDr1').val('');
                    $('#JamSp1').val('');
                    $('#HmDr1').val('');
                    $('#HmSp1').val('');
                    cekts();
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
                    url:'<?php echo route('pemakaianalatdetail.updateajax'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        cekts();
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