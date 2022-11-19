

<?php $__env->startSection('title', 'Job Order'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>

                    <?php if (app('laratrust')->can('create-jo')) : ?>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Job Order</button>
                    <?php endif; // app('laratrust')->can ?>

                    <!--<button type="button" class="btn btn-primary btn-xs" onclick="getkode()">-->
                    <!--    <i class="fa fa-bullhorn"></i> Get New Kode</button>-->

                    <span class="pull-right">  
                        <font style="font-size: 16px;"><b>JOB ORDER</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-warning">
                        <th>No Job Order</th>
                        <th>Tanggal</th>
                        <th>Jenis JO</th>
                        <th>Tipe JO</th>
                        <th>Nama Customer</th>
                        <th>Kode Shipper</th>
                        <th>Nama Consignee</th>
                        <th>Agent</th>
                        <th>Order By</th>
                        <th>Deskripsi</th>
                        <th>Total Container</th>
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
                                    <?php echo e(Form::label('tanggal_jo', 'Tanggal Job Order:')); ?>

                                    <?php echo e(Form::date('tanggal_jo', null,['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('jenis_jo', 'Jenis JO:')); ?>

                                    <?php echo e(Form::select('jenis_jo', ['Container' => 'Container','Non-Container' => 'Non-Container'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Con1','required'=>'required','onchange'=>"get();"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('type', 'Tipe JO:')); ?>

                                    <?php echo e(Form::select('type', ['1' => 'Export','2' => 'Import','3' => 'Local','4' => 'Sewa','5' => 'Project','6' => 'Trucking Monthly','7' => 'Trucking Daily','8' => 'Lain-lain'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Jenis1','required'=>'required','onchange'=>"get2();"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group1">
                                    <?php echo e(Form::label('kode_customer', 'Nama Customer:')); ?>

                                    <?php echo e(Form::select('kode_customer',$Customer->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Customer1','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group2">
                                    <?php echo e(Form::label('kode_shipper', 'Nama Shipper:')); ?>

                                    <?php echo e(Form::select('kode_shipper',$Gudang->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Shipper1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group3">
                                    <?php echo e(Form::label('kode_consignee', 'Nama Consignee:')); ?>

                                    <?php echo e(Form::select('kode_consignee',$Customer->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Consignee1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group4">
                                    <br>
                                    <?php echo e(Form::label('agent', 'Agent:')); ?>

                                    <?php echo e(Form::text('agent',null, ['class'=> 'form-control','id'=>'Agent1','style'=>'width: 100%', 'placeholder'=>'Agent', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group5">
                                    <br>
                                    <?php echo e(Form::label('order_by', 'Order By:')); ?>

                                    <?php echo e(Form::text('order_by', null, ['class'=> 'form-control','id'=>'Order1', 'placeholder'=>'Order By', 'autocomplete'=>'off','required', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group6">
                                    <br>
                                    <?php echo e(Form::label('kode_kapal', 'Nama Kapal:')); ?>

                                    <?php echo e(Form::select('kode_kapal',$Kapal->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Kapal1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group7">
                                    <br>
                                    <?php echo e(Form::label('voyage', 'Voyage:')); ?>

                                    <?php echo e(Form::text('voyage', null, ['class'=> 'form-control','id'=>'Voyage1', 'placeholder'=>'Voyage', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group8">
                                    <br>
                                    <?php echo e(Form::label('port_loading', 'Port Of Loading:')); ?>

                                    <?php echo e(Form::select('port_loading',$Port->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Portloading1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group9">
                                    <br>
                                    <?php echo e(Form::label('etd', 'ETD:')); ?>

                                    <?php echo e(Form::date('etd', null,['class'=> 'form-control','id'=>'Etd1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group10">
                                    <br>
                                    <?php echo e(Form::label('port_transite', 'Port Of Transite:')); ?>

                                    <?php echo e(Form::select('port_transite',$Port->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Porttransite1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group11">
                                    <br>
                                    <?php echo e(Form::label('port_destination', 'Port Of Destination:')); ?>

                                    <?php echo e(Form::select('port_destination',$Port->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Portdestination1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group12">
                                    <br>
                                    <?php echo e(Form::label('eta', 'ETA:')); ?>

                                    <?php echo e(Form::date('eta', null,['class'=> 'form-control','id'=>'Eta1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group13">
                                    <br>
                                    <?php echo e(Form::label('shipping_line', 'Shipping Line:')); ?>

                                    <?php echo e(Form::select('shipping_line', $Customer->sort(), null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Shipping1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group14">
                                    <br>
                                    <?php echo e(Form::label('customs_clearance', 'Customs Clearance:')); ?>

                                    <?php echo e(Form::select('customs_clearance', ['1' => 'PIB','2' => 'PEB'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Customs1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group15">
                                    <br>
                                    <?php echo e(Form::label('no_bc', 'No BC.23:')); ?>

                                    <?php echo e(Form::text('no_bc', null, ['class'=> 'form-control','id'=>'Bc1', 'placeholder'=>'No BC.23', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group16">
                                    <br>
                                    <?php echo e(Form::label('house_bl', 'House B/L:')); ?>

                                    <?php echo e(Form::text('house_bl', null, ['class'=> 'form-control','id'=>'House1', 'placeholder'=>'House B/L', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group17">
                                    <br>
                                    <?php echo e(Form::label('no_do', 'No DO:')); ?>

                                    <?php echo e(Form::text('no_do', null, ['class'=> 'form-control','id'=>'Do1', 'placeholder'=>'No DO', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group18">
                                    <br>
                                    <?php echo e(Form::label('loading_type', 'Loading Type:')); ?>

                                    <?php echo e(Form::select('loading_type', ['1' => 'FCL','2' => 'LCL'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Loading1'])); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <br>
                                    <?php echo e(Form::label('deskripsi', 'Deskripsi:')); ?>

                                    <?php echo e(Form::textarea('deskripsi', null, ['class'=> 'form-control','rows'=>'2','id'=>'Deskripsi1', 'placeholder'=>'Deskripsi', 'autocomplete'=>'off'])); ?>

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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                    <?php echo e(Form::text('no_joborder', null, ['class'=> 'form-control','id'=>'Joborder','readonly'])); ?>

                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tanggal_jo', 'Tanggal Job Order:')); ?>

                                    <?php echo e(Form::date('tanggal_jo', null,['class'=> 'form-control','id'=>'Tanggal' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('jenis_jo', 'Jenis JO:')); ?>

                                    <?php echo e(Form::select('jenis_jo', ['Container' => 'Container','Non-Container' => 'Non-Container'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Con','required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group20">
                                    <?php echo e(Form::label('type', 'Tipe JO:')); ?>

                                    <?php echo e(Form::select('type', ['1' => 'Export','2' => 'Import','3' => 'Local','4' => 'Sewa','5' => 'Project','6' => 'Trucking Monthly','7' => 'Trucking Daily','8' => 'Lain-lain'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Jenis','required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group21">
                                    <?php echo e(Form::label('kode_customer', 'Nama Customer:')); ?>

                                    <?php echo e(Form::select('kode_customer',$Customer->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Customer'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group22">
                                    <?php echo e(Form::label('kode_shipper', 'Nama Shipper:')); ?>

                                    <?php echo e(Form::select('kode_shipper',$Gudang->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Shipper'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group23">
                                    <br>
                                    <?php echo e(Form::label('kode_consignee', 'Nama Consignee:')); ?>

                                    <?php echo e(Form::select('kode_consignee',$Customer->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Consignee'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group24">
                                    <br>
                                    <?php echo e(Form::label('agent', 'Agent:')); ?>

                                    <?php echo e(Form::text('agent',null, ['class'=> 'form-control','id'=>'Agent','style'=>'width: 100%', 'placeholder'=>'Agent', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group25">
                                    <br>
                                    <?php echo e(Form::label('order_by', 'Order By:')); ?>

                                    <?php echo e(Form::text('order_by', null, ['class'=> 'form-control','id'=>'Order', 'placeholder'=>'Order By', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group26">
                                    <br>
                                    <?php echo e(Form::label('kode_kapal', 'Nama Kapal:')); ?>

                                    <?php echo e(Form::select('kode_kapal',$Kapal->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Kapal'])); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group27">
                                    <br>
                                    <?php echo e(Form::label('voyage', 'Voyage:')); ?>

                                    <?php echo e(Form::text('voyage', null, ['class'=> 'form-control','id'=>'Voyage', 'placeholder'=>'Voyage', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group28">
                                    <br>
                                    <?php echo e(Form::label('port_loading', 'Port Of Loading:')); ?>

                                    <?php echo e(Form::select('port_loading',$Port->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Portloading'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group29">
                                    <br>
                                    <?php echo e(Form::label('etd', 'ETD:')); ?>

                                    <?php echo e(Form::date('etd', null,['class'=> 'form-control','id'=>'Etd' ])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group30">
                                    <br>
                                    <?php echo e(Form::label('port_transite', 'Port Of Transite:')); ?>

                                    <?php echo e(Form::select('port_transite',$Port->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Porttransite'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group31">
                                    <br>
                                    <?php echo e(Form::label('port_destination', 'Port Of Destination:')); ?>

                                    <?php echo e(Form::select('port_destination',$Port->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Portdestination'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group32">
                                    <br>
                                    <?php echo e(Form::label('eta', 'ETA:')); ?>

                                    <?php echo e(Form::date('eta', null,['class'=> 'form-control','id'=>'Eta' ])); ?>

                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group33">
                                    <br>
                                    <?php echo e(Form::label('shipping_line', 'Shipping Line:')); ?>

                                    <?php echo e(Form::select('shipping_line', $Customer->sort(), null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Shipping'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group34">
                                    <br>
                                    <?php echo e(Form::label('customs_clearance', 'Customs Clearance:')); ?>

                                    <?php echo e(Form::select('customs_clearance', ['1' => 'PIB','2' => 'PEB'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Customs'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group35">
                                    <br>
                                    <?php echo e(Form::label('no_bc', 'No BC.23:')); ?>

                                    <?php echo e(Form::text('no_bc', null, ['class'=> 'form-control','id'=>'Bc', 'placeholder'=>'Order By', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group36">
                                    <br>
                                    <?php echo e(Form::label('house_bl', 'House B/L:')); ?>

                                    <?php echo e(Form::text('house_bl', null, ['class'=> 'form-control','id'=>'House', 'placeholder'=>'Order By', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group37">
                                    <br>
                                    <?php echo e(Form::label('no_do', 'No DO:')); ?>

                                    <?php echo e(Form::text('no_do', null, ['class'=> 'form-control','id'=>'Do', 'placeholder'=>'Order By', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group38">
                                    <br>
                                    <?php echo e(Form::label('loading_type', 'Loading Type:')); ?>

                                    <?php echo e(Form::select('loading_type', ['1' => 'FCL','2' => 'LCL'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Loading'])); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('deskripsi', 'Deskripsi:')); ?>

                                    <?php echo e(Form::textarea('deskripsi', null, ['class'=> 'form-control','rows'=>'2','id'=>'Deskripsi', 'placeholder'=>'Deskripsi', 'autocomplete'=>'off'])); ?>

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

    <div class="modal fade" id="penyelesaianform" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="box-body"> 
                    <div class="addform">
                        <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::open(['id'=>'ADD_PENYELESAIAN']); ?>

                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                <?php echo e(Form::text('no_joborder',null, ['class'=> 'form-control','readonly','id'=>'nojoborder_penyelesaian1','required'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('no_cbo', 'No CBO:')); ?>

                                <?php echo e(Form::text('no_cbo',null, ['class'=> 'form-control','id'=>'nocbo1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('tgl_cbo', 'Tanggal CBO:')); ?>

                                <?php echo e(Form::date('tgl_cbo', \Carbon\Carbon::now(), ['class'=> 'form-control','id'=>'tglcbo1','required'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('nilai', 'Nilai:')); ?>

                                <?php echo e(Form::text('nilai',null, ['class'=> 'form-control','id'=>'nilai1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('deskripsi', 'Deskripsi:')); ?>

                                <?php echo e(Form::text('deskripsi',null, ['class'=> 'form-control','id'=>'deskripsi_penyelesaian1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>


                        <div class="col-md-6">
                            <br>
                            <span class="pull-right">  
                                <?php echo e(Form::submit('ADD PENYELESAIAN', ['class' => 'btn btn-success btn-xs','id'=>'submit'])); ?>

                                <button type="button" class="btn btn-warning btn-xs editbutton" id="editpenyelesaian" data-toggle="modal" data-target="">
                                    <i class="fa fa-edit"></i> EDIT
                                </button>
                                <button type="button" class="btn btn-danger btn-xs hapusbutton" id="hapuspenyelesaian">
                                    <i class="fa fa-times-circle"></i> HAPUS
                                </button>
                            </span>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>

                <div class="container-fluid">
                    <table class="table table-bordered table-striped table-hover" id="addpenyelesaian-table" width="100%" style="font-size: 12px;">
                        <thead>
                            <tr class="bg-warning">
                                <th>No Job Order</th>
                                <th>No CBO</th>
                                <th>Tanggal CBO</th>
                                <th>Nilai</th>
                                <th>Deskripsi</th>
                                <th>Id</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                
                <div class="modal-footer">
                        
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="ajuform" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="box-body"> 
                    <div class="addform">
                        <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::open(['id'=>'ADD_AJU']); ?>

                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                <?php echo e(Form::text('no_joborder',null, ['class'=> 'form-control','readonly','id'=>'nojoborder_aju1','required'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('no_pengajuan', 'No Pengajuan:')); ?>

                                <?php echo e(Form::text('no_pengajuan',null, ['class'=> 'form-control','id'=>'nopengajuan1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('no_pebpib', 'No PEB / PIB:')); ?>

                                <?php echo e(Form::text('no_pebpib',null, ['class'=> 'form-control','id'=>'nopebpib1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('no_bl', 'No BL:')); ?>

                                <?php echo e(Form::text('no_bl',null, ['class'=> 'form-control','id'=>'nobl1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>


                        <div class="col-md-12">
                            <br>
                            <span class="pull-right">  
                                <?php echo e(Form::submit('ADD AJU', ['class' => 'btn btn-success btn-xs','id'=>'submit'])); ?>

                                <button type="button" class="btn btn-warning btn-xs editbutton" id="editaju" data-toggle="modal" data-target="">
                                    <i class="fa fa-edit"></i> EDIT
                                </button>
                                <button type="button" class="btn btn-danger btn-xs hapusbutton" id="hapusaju">
                                    <i class="fa fa-times-circle"></i> HAPUS
                                </button>
                            </span>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>

                <div class="container-fluid">
                    <table class="table table-bordered table-striped table-hover" id="addaju-table" width="100%" style="font-size: 12px;">
                        <thead>
                            <tr class="bg-warning">
                                <th>No Job Order</th>
                                <th>No Pengajuan</th>
                                <th>No PEB / PIB</th>
                                <th>No BL</th>
                                <th>Id</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                
                <div class="modal-footer">
                        
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="kasbonform" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="box-body"> 
                    <div class="addform">
                        <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::open(['id'=>'ADD_KASBON']); ?>

                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                <?php echo e(Form::text('no_joborder',null, ['class'=> 'form-control','readonly','id'=>'nojoborder_kasbon1','required'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('no_cbocbi', 'No CBO / CBI:')); ?>

                                <?php echo e(Form::text('no_cbocbi',null, ['class'=> 'form-control','id'=>'nocbocbi1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('tgl_cbocbi', 'Tanggal CBO / CBI:')); ?>

                                <?php echo e(Form::date('tgl_cbocbi', \Carbon\Carbon::now(), ['class'=> 'form-control','id'=>'tglcbocbi1','required'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('total_cbo', 'Total CBO:')); ?>

                                <?php echo e(Form::text('total_cbo',null, ['class'=> 'form-control','id'=>'totalcbo1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('total_cbi', 'Total CBI:')); ?>

                                <?php echo e(Form::text('total_cbi',null, ['class'=> 'form-control','id'=>'totalcbi1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('total_nonkasbon', 'Total Non Kasbon:')); ?>

                                <?php echo e(Form::text('total_nonkasbon',null, ['class'=> 'form-control','id'=>'total1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('deskripsi', 'Deskripsi:')); ?>

                                <?php echo e(Form::text('deskripsi',null, ['class'=> 'form-control','id'=>'deskripsi_kasbon1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>


                        <div class="col-md-12">
                            <br>
                            <span class="pull-right">  
                                <?php echo e(Form::submit('ADD KASBON', ['class' => 'btn btn-success btn-xs','id'=>'submit'])); ?>

                                <button type="button" class="btn btn-warning btn-xs editbutton" id="editkasbon" data-toggle="modal" data-target="">
                                    <i class="fa fa-edit"></i> EDIT
                                </button>
                                <button type="button" class="btn btn-danger btn-xs hapusbutton" id="hapuskasbon">
                                    <i class="fa fa-times-circle"></i> HAPUS
                                </button>
                            </span>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>

                <div class="container-fluid">
                    <table class="table table-bordered table-striped table-hover" id="addkasbon-table" width="100%" style="font-size: 12px;">
                        <thead>
                            <tr class="bg-warning">
                                <th>No Job Order</th>
                                <th>No CBO / CBI</th>
                                <th>Tanggal CBO / CBI</th>
                                <th>Total CBO</th>
                                <th>Total CBI</th>
                                <th>Total Kasbon</th>
                                <th>Deskripsi</th>
                                <th>Id</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                
                <div class="modal-footer">
                        
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="biayaform" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="box-body"> 
                    <div class="addform">
                        <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::open(['id'=>'ADD_BIAYA']); ?>

                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('no_joborder', 'No Job Order:')); ?>

                                <?php echo e(Form::text('no_joborder',null, ['class'=> 'form-control','readonly','id'=>'nojoborder_biaya1','required'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('qty', 'Qty:')); ?>

                                <?php echo e(Form::text('qty',null, ['class'=> 'form-control','id'=>'qty1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('biaya_estimasi', 'Biaya Estimasi:')); ?>

                                <?php echo e(Form::text('biaya_estimasi',null, ['class'=> 'form-control','id'=>'biaya1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('deskripsi', 'Deskripsi:')); ?>

                                <?php echo e(Form::text('deskripsi',null, ['class'=> 'form-control','id'=>'deskripsi_biaya1','required','autocomplete'=>'off'])); ?>

                            </div>
                        </div>


                        <div class="col-md-12">
                            <br>
                            <span class="pull-right">  
                                <?php echo e(Form::submit('ADD BIAYA', ['class' => 'btn btn-success btn-xs','id'=>'submit'])); ?>

                                <button type="button" class="btn btn-warning btn-xs editbutton" id="editbiaya" data-toggle="modal" data-target="">
                                    <i class="fa fa-edit"></i> EDIT
                                </button>
                                <button type="button" class="btn btn-danger btn-xs hapusbutton" id="hapusbiaya">
                                    <i class="fa fa-times-circle"></i> HAPUS
                                </button>
                            </span>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>

                <div class="container-fluid">
                    <table class="table table-bordered table-striped table-hover" id="addbiaya-table" width="100%" style="font-size: 12px;">
                        <thead>
                            <tr class="bg-warning">
                                <th>No Job Order</th>
                                <th>QTY</th>
                                <th>Biaya Estimasi</th>
                                <th>Deskripsi</th>
                                <th>Id</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                
                <div class="modal-footer">
                        
                </div>
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
                background-color: #1674c7;
                bottom: 186px;
            }

            .viewjor-button {
                background-color: #00E0FF;
                bottom: 216px;
            }

            .tombol1 {
                background-color: #149933;
                bottom: 246px;
            }

            .tombol2 {
                background-color: #ff9900;
                bottom: 276px;
            }

            .viewbiaya-button {
                color: black;
                background-color: white;
                bottom: 336px;
                border: 2px solid #f44336; /* Green */
            }

            .viewkasbon-button {
                color: black;
                background-color: white;
                bottom: 366px;
                border: 2px solid #4CAF50; /* Green */
            }

            .viewaju-button {
                color: black;
                background-color: white;
                bottom: 396px;
                border: 2px solid #555555; /* Green */
            }

            .viewpenyelesaian-button {
                color: black;
                background-color: white;
                bottom: 426px;
                border: 2px solid #008CBA; /* Green */
            }

            .printjr-button {
                background-color: #f44336;
                bottom: 246px;
            }



            .biaya-button {
                color: black;
                background-color: white;
                bottom: 336px;
                border: 2px solid #f44336; /* Green */
            }

            .kasbon-button {
                color: black;
                background-color: white;
                bottom: 366px;
                border: 2px solid #4CAF50; /* Green */
            }

            .aju-button {
                color: black;
                background-color: white;
                bottom: 396px;
                border: 2px solid #555555; /* Green */
            }

            .penyelesaian-button {
                color: black;
                background-color: white;
                bottom: 426px;
                border: 2px solid #008CBA; /* Green */
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

            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
            }
        </style>

        <div id="mySidenav" class="sidenav">
            <?php if (app('laratrust')->can('update-jo')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editjoborder" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-jo')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusjoborder" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('add-jo')) : ?>
            <a href="#" id="addjo"><button type="button" class="btn btn-info btn-xs add-button" data-toggle="modal" data-target="">JOB REQUEST <i class="fa fa-plus"></i></button></a>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('post-jo')) : ?>
            <button type="button" class="btn btn-success btn-xs tombol1" id="button1">POST <i class="fa fa-bullhorn"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('unpost-jo')) : ?>
            <button type="button" class="btn btn-warning btn-xs tombol2" id="button2">UNPOST <i class="fa fa-undo"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('view-jo')) : ?>
            <button type="button" class="btn btn-primary btn-xs view-button" id="button5">VIEW DETAIL <i class="fa fa-eye"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('view-jo')) : ?>
            <button type="button" class="btn btn-info btn-xs viewjor-button" id="button6">VIEW CONTAINER <i class="fa fa-eye"></i></button>
            <?php endif; // app('laratrust')->can ?>



            <!--<?php if (app('laratrust')->can('view-jo')) : ?>-->
            <!--<button type="button" class="btn btn-xs biaya-button" id="addbiaya" style="color: black" data-toggle="modal" data-target="#biayaform">BIAYA ESTIMASI <i class="fa fa-calculator"></i></button>-->
            <!--<?php endif; // app('laratrust')->can ?>-->

            <!--<?php if (app('laratrust')->can('view-jo')) : ?>-->
            <!--<button type="button" class="btn btn-xs penyelesaian-button" id="addpenyelesaian" style="color: black" data-toggle="modal" data-target="#penyelesaianform">PENYELESAIAN <i class="fa fa-check-square"></i></button>-->
            <!--<?php endif; // app('laratrust')->can ?>-->

            <!--<?php if (app('laratrust')->can('view-jo')) : ?>-->
            <!--<button type="button" class="btn btn-xs kasbon-button" id="addkasbon" style="color: black" data-toggle="modal" data-target="#kasbonform">KASBON <i class="fa fa-eye"></i></button>-->
            <!--<?php endif; // app('laratrust')->can ?>-->

            <!--<?php if (app('laratrust')->can('view-jo')) : ?>-->
            <!--<button type="button" class="btn btn-xs aju-button" id="addaju" style="color: black" data-toggle="modal" data-target="#ajuform">NO AJU <i class="fa fa-list-ol"></i></button>-->
            <!--<?php endif; // app('laratrust')->can ?>-->



            <!--<?php if (app('laratrust')->can('view-jo')) : ?>-->
            <!--<button type="button" class="btn btn-xs viewbiaya-button" id="button7" style="color: black">VIEW BIAYA <i class="fa fa-eye"></i></button>-->
            <!--<?php endif; // app('laratrust')->can ?>-->

            <!--<?php if (app('laratrust')->can('view-jo')) : ?>-->
            <!--<button type="button" class="btn btn-xs viewpenyelesaian-button" id="button8" style="color: black">VIEW PENYELESAIAN <i class="fa fa-eye"></i></button>-->
            <!--<?php endif; // app('laratrust')->can ?>-->

            <!--<?php if (app('laratrust')->can('view-jo')) : ?>-->
            <!--<button type="button" class="btn btn-xs viewkasbon-button" id="button9" style="color: black">VIEW KASBON <i class="fa fa-eye"></i></button>-->
            <!--<?php endif; // app('laratrust')->can ?>-->

            <!--<?php if (app('laratrust')->can('view-jo')) : ?>-->
            <!--<button type="button" class="btn btn-xs viewaju-button" id="button10" style="color: black">VIEW AJU <i class="fa fa-eye"></i></button>-->
            <!--<?php endif; // app('laratrust')->can ?>-->



            <?php if (app('laratrust')->can('print-jo')) : ?>
            <a href="#" target="_blank" id="printjr"><button type="button" class="btn btn-danger btn-xs printjr-button" id="button11">PRINT JOB REQUEST <i class="fa fa-print"></i></button></a>
            <?php endif; // app('laratrust')->can ?>
        </div>
</body>
<div class="se-pre-con"></div>
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

        function get() {
            var pilih = $("#Con1").val();

            if (pilih == 'Container') {
                document.getElementById("Customer1").required = true; 
                document.getElementById("Shipper1").required = true; 
                // document.getElementById("Consignee1").required = true;
                // document.getElementById("Agent1").required = true;
                // document.getElementById("Order1").required = true;
                document.getElementById("Kapal1").required = true;
                document.getElementById("Voyage1").required = true;
                // document.getElementById("Portloading1").required = true;
                // document.getElementById("Etd1").required = true;
                // document.getElementById("Porttransite1").required = true;
                // document.getElementById("Portdestination1").required = true;
                // document.getElementById("Eta1").required = true;
                // document.getElementById("Shipping1").required = true;
                // document.getElementById("Customs1").required = true;
                // document.getElementById("Bc1").required = true;
                // document.getElementById("House1").required = true;
                // document.getElementById("Do1").required = true;
                // document.getElementById("Loading1").required = true;
            }else if(pilih == 'Non-Container'){
                document.getElementById("Customer1").required = true; 
                document.getElementById("Shipper1").required = false; 
                // document.getElementById("Consignee1").required = false;
                // document.getElementById("Agent1").required = true;
                // document.getElementById("Order1").required = true;
                document.getElementById("Kapal1").required = false;
                document.getElementById("Voyage1").required = false;
                // document.getElementById("Portloading1").required = false;
                // document.getElementById("Etd1").required = false;
                // document.getElementById("Porttransite1").required = false;
                // document.getElementById("Portdestination1").required = false;
                // document.getElementById("Eta1").required = false;
                // document.getElementById("Shipping1").required = false;
                // document.getElementById("Customs1").required = false;
                // document.getElementById("Bc1").required = false;
                // document.getElementById("House1").required = false;
                // document.getElementById("Do1").required = false;
                // document.getElementById("Loading1").required = false;
            }
        }

        function get2() {
            var pilih = $("#Jenis1").val();

            if (pilih == '1' || pilih == '2') {
                $('.form-group1').show();
                $('.form-group2').show();
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
                $('.form-group14').show();
                $('.form-group15').show();
                $('.form-group16').show();
                $('.form-group17').show();
                $('.form-group18').show();
            }else if(pilih == '3'){
                $('.form-group1').show();
                $('.form-group2').show();
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
                $('.form-group14').hide();
                $('.form-group15').hide();
                $('.form-group16').hide();
                $('.form-group17').show();
                $('.form-group18').show();
            }else{
                $('.form-group1').show();
                $('.form-group2').show();
                $('.form-group3').show();
                $('.form-group4').show();
                $('.form-group5').show();
                $('.form-group6').hide();
                $('.form-group7').hide();
                $('.form-group8').hide();
                $('.form-group9').hide();
                $('.form-group10').hide();
                $('.form-group11').hide();
                $('.form-group12').hide();
                $('.form-group13').hide();
                $('.form-group14').hide();
                $('.form-group15').hide();
                $('.form-group16').hide();
                $('.form-group17').hide();
                $('.form-group18').hide();
            }
        }

        function load(){
            startTime();
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.hapus-button').hide();
            $('.add-button').hide();
            $('.edit-button').hide();
            $('.view-button').hide();
            $('.viewpenyelesaian-button').hide();
            $('.viewaju-button').hide();
            $('.viewkasbon-button').hide();
            $('.viewbiaya-button').hide();
            $('.viewjor-button').hide();
            $('.printjr-button').hide();

            $('.penyelesaian-button').hide();
            $('.biaya-button').hide();
            $('.kasbon-button').hide();
            $('.aju-button').hide();
            $('.back2Top').show();
        }

        function getkode(){
            swal({
                title: "Get New Kode Customer?",
                text: "Customer",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, Update!",
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
                        url:'<?php echo route('joborder.getkode'); ?>',
                        type:'POST',
                        success: function(result) {
                            swal("Berhasil!", result.message, "success");
                            refreshTable();
                        },
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
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

            ajax: '<?php echo route('joborder.data'); ?>',
            fnRowCallback: function (row, data, iDisplayIndex, iDisplayIndexFull) {
                if (data['status'] == "1") {
                    $('td', row).css('background-color', '#ffdbd3');
                }
            },
            columns: [
                { data: 'no_joborder', name: 'no_joborder' },
                { data: 'tanggal_jo', name: 'tanggal_jo' },
                { data: 'jenis_jo', name: 'jenis_jo' },
                { data: 'type', 
                    render: function( data, type, full ) {
                    return format_type(data); }
                },
                { data: 'customer1.nama_customer', "defaultContent": "<i>Not set</i>" },
                { data: 'customer2.nama_customer', "defaultContent": "<i>Not set</i>" },
                { data: 'customer3.nama_customer', "defaultContent": "<i>Not set</i>" },
                { data: 'agent', "defaultContent": "<i>Not set</i>" },
                { data: 'order_by', name: 'order_by' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'total_item', name: 'total_item' },
                { data: 'status', 
                    render: function( data, type, full ) {
                    return formatStatus(data); }
                },
            ]
            });
        });

        Table2 = $("#addpenyelesaian-table").DataTable({
            data:[],

            columns: [
                { data: 'no_joborder', name: 'no_joborder' },
                { data: 'no_cbo', name: 'no_cbo' },
                { data: 'tgl_cbo', name: 'tgl_cbo' },
                { data: 'nilai', name: 'nilai' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'id', name: 'id' },
            ],      
        });

        Table3 = $("#addaju-table").DataTable({
            data:[],

            columns: [
                { data: 'no_joborder', name: 'no_joborder' },
                { data: 'no_pengajuan', name: 'no_pengajuan' },
                { data: 'no_pebpib', name: 'no_pebpib' },
                { data: 'no_bl', name: 'no_bl' },
                { data: 'id', name: 'id' },
            ],      
        });

        Table4 = $("#addkasbon-table").DataTable({
            data:[],

            columns: [
                { data: 'no_joborder', name: 'no_joborder' },
                { data: 'no_cbocbi', name: 'no_cbocbi' },
                { data: 'tgl_cbocbi', name: 'tgl_cbocbi' },
                { data: 'total_cbo', name: 'total_cbo' },
                { data: 'total_cbi', name: 'total_cbi' },
                { data: 'total_nonkasbon', name: 'total_nonkasbon' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'id', name: 'id' },
            ],      
        });

        Table5 = $("#addbiaya-table").DataTable({
            data:[],

            columns: [
                { data: 'no_joborder', name: 'no_joborder' },
                { data: 'qty', name: 'qty' },
                { data: 'biaya_estimasi', name: 'biaya_estimasi' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'id', name: 'id' },
            ],      
        });
        
        function format_type(n) {
            console.log(n);
            if(n == '1'){
                var stat = "<span style='color:#030100'><b>Export</b></span>";
            }else if(n == '2'){
                var stat = "<span style='color:#0eab25'><b>Import</b></span>";
            }else if(n == '3'){
                var stat = "<span style='color:#c91a1a'><b>Local</b></span>";
            }else if(n == '4'){
                var stat = "<span style='color:#1a80c9'><b>Sewa</b></span>";
            }else if(n == '5'){
                var stat = "<span style='color:#1a80c9'><b>Project</b></span>";
            }else if(n == '6'){
                var stat = "<span style='color:#1a80c9'><b>Trucking Monthly</b></span>";
            }else if(n == '7'){
                var stat = "<span style='color:#1a80c9'><b>Trucking Daily</b></span>";
            }else if(n == '8'){
                var stat = "<span style='color:#1a80c9'><b>Lain-lain</b></span>";
            }
            return stat;
        }

        function formatStatus(n) {
            console.log(n);
            if(n == '1'){
                var stat = "<span style='color:#030100'><b>OPEN</b></span>";
            }else if(n == '2'){
                var stat = "<span style='color:#0eab25'><b>POSTED</b></span>";
            }else if(n == '3'){
                var stat = "<span style='color:#c91a1a'><b>INVOICED</b></span>";
            }else if(n == '4'){
                var stat = "<span style='color:#1a80c9'><b>PAID</b></span>";
            }
            return stat;
        }

        function tablepenyelesaian(kode){
            $.ajax({
                url: '<?php echo route('joborder.getDatapenyelesaian'); ?>',
                type: 'GET',
                data : {
                    'id': kode
                },
                success: function(result) {
                    Table2.clear().draw();
                    Table2.rows.add(result).draw();
        
                    $('#penyelesaianform').modal('show');
                    $('.editbutton').hide();
                    $('.hapusbutton').hide();
                }
            });
        }

        function tableaju(kode){
            $.ajax({
                url: '<?php echo route('joborder.getDataaju'); ?>',
                type: 'GET',
                data : {
                    'id': kode
                },
                success: function(result) {
                    Table3.clear().draw();
                    Table3.rows.add(result).draw();
        
                    $('#ajuform').modal('show');
                    $('.editbutton').hide();
                    $('.hapusbutton').hide();
                }
            });
        }

        function tablekasbon(kode){
            $.ajax({
                url: '<?php echo route('joborder.getDatakasbon'); ?>',
                type: 'GET',
                data : {
                    'id': kode
                },
                success: function(result) {
                    Table4.clear().draw();
                    Table4.rows.add(result).draw();
        
                    $('#kasbonform').modal('show');
                    $('.editbutton').hide();
                    $('.hapusbutton').hide();
                }
            });
        }

        function tablebiaya(kode){
            $.ajax({
                url: '<?php echo route('joborder.getDatabiaya'); ?>',
                type: 'GET',
                data : {
                    'id': kode
                },
                success: function(result) {
                    Table5.clear().draw();
                    Table5.rows.add(result).draw();
        
                    $('#biayaform').modal('show');
                    $('.editbutton').hide();
                    $('.hapusbutton').hide();
                }
            });
        }

        function createTable(result){

        var my_table = "";

        $.each( result, function( key, row ) {
                    
                    my_table += "<td>"+row.kode_kapal+"</td>";
                    my_table += "<td>"+row.voyage+"</td>";
                    my_table += "<td>"+row.port_loading+"</td>";
                    my_table += "<td>"+row.etd+"</td>";
                    my_table += "<td>"+row.port_transite+"</td>";
                    my_table += "<td>"+row.port_destination+"</td>";
                    my_table += "<td>"+row.eta+"</td>";
                    my_table += "<td>"+row.shipping_line+"</td>";
                    my_table += "<td>"+row.customs_clearance+"</td>";
                    my_table += "<td>"+row.no_bc+"</td>";
                    my_table += "<td>"+row.house_bl+"</td>";
                    my_table += "<td>"+row.no_do+"</td>";
                    my_table += "<td>"+row.loading_type+"</td>";
                    
            });

            my_table = '<table id="table-fixed" class="table table-bordered" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Nama Kapal</th>'+
                                '<th>Voyage</th>'+
                                '<th>Port Of Loading</th>'+
                                '<th>ETD</th>'+
                                '<th>Port Of Transite</th>'+
                                '<th>Port Of Destination</th>'+
                                '<th>ETA</th>'+
                                '<th>Shipping Line</th>'+
                                '<th>Customs Clearance</th>'+
                                '<th>No BC.23</th>'+
                                '<th>House B/L</th>'+
                                '<th>No DO</th>'+
                                '<th>Loading Type</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

        function createTable2(result){

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.no_req_jo+"</td>";
                    my_table += "<td>"+row.kode_container+"</td>";
                    my_table += "<td>"+row.kode_size+"</td>";
                    my_table += "<td>"+row.status_muatan+"</td>";
                    my_table += "<td>"+row.dari+"</td>";
                    my_table += "<td>"+row.tujuan+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>No Job Request</th>'+
                                '<th>No Container</th>'+
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

        function createTablepenyelesaian(result){

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.no_cbo+"</td>";
                    my_table += "<td>"+row.tgl_cbo+"</td>";
                    my_table += "<td>"+row.deskripsi+"</td>";
                    my_table += "<td>"+formatRupiah(row.nilai)+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>No CBO</th>'+
                                '<th>Tgl CBO</th>'+
                                '<th>Deskripsi</th>'+
                                '<th>Total CBO</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

        function createTableaju(result){

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.no_pengajuan+"</td>";
                    my_table += "<td>"+row.no_pebpib+"</td>";
                    my_table += "<td>"+row.no_bl+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>No Pengajuan</th>'+
                                '<th>No PEB/PIB</th>'+
                                '<th>No BL</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

        function createTablekasbon(result){

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.no_cbocbi+"</td>";
                    my_table += "<td>"+row.tgl_cbocbi+"</td>";
                    my_table += "<td>"+row.deskripsi+"</td>";
                    my_table += "<td>"+formatRupiah(row.total_cbo)+"</td>";
                    my_table += "<td>"+formatRupiah(row.total_cbi)+"</td>";
                    my_table += "<td>"+formatRupiah(row.total_nonkasbon)+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>No CBO/CBI</th>'+
                                '<th>Tgl CBO/CBI</th>'+
                                '<th>Deskripsi</th>'+
                                '<th>Total CBO</th>'+
                                '<th>Total CBI</th>'+
                                '<th>Total Non Kasbon</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

        function createTablebiaya(result){

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.deskripsi+"</td>";
                    my_table += "<td>"+formatRupiah(row.qty)+"</td>";
                    my_table += "<td>"+formatRupiah(row.biaya_estimasi)+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Deskripsi</th>'+
                                '<th>QTY</th>'+
                                '<th>Biaya Estimasi</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
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

        $('#editform').on('show.bs.modal', function () {
            var optionVal = $("#Jenis").val();
            if (optionVal == '1' || optionVal == '2' || optionVal == '3') {
                $('.form-group20').show();
                $('.form-group21').show();
                $('.form-group22').show();
                $('.form-group23').show();
                $('.form-group24').show();
                $('.form-group25').show();
                $('.form-group26').show();
                $('.form-group27').show();
                $('.form-group28').show();
                $('.form-group29').show();
                $('.form-group30').show();
                $('.form-group31').show();
                $('.form-group32').show();
                $('.form-group33').show();
                $('.form-group34').show();
                $('.form-group35').show();
                $('.form-group36').show();
                $('.form-group37').show();
                $('.form-group38').show();
            }else{
                $('.form-group20').show();
                $('.form-group21').show();
                $('.form-group22').show();
                $('.form-group23').show();
                $('.form-group24').show();
                $('.form-group25').show();
                $('.form-group26').hide();
                $('.form-group27').hide();
                $('.form-group28').hide();
                $('.form-group29').hide();
                $('.form-group30').hide();
                $('.form-group31').hide();
                $('.form-group32').hide();
                $('.form-group33').hide();
                $('.form-group34').hide();
                $('.form-group35').hide();
                $('.form-group36').hide();
                $('.form-group37').hide();
                $('.form-group38').hide();
            }
        })

        $(document).ready(function(){   
            $(".se-pre-con").fadeOut("slow");
            
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
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();

                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();
                }
                else {
                    $('#nocbo1').val('');
                    $('#tglcbo1').val('');
                    $('#deskripsi_penyelesaian1').val('');
                    $('#nilai1').val('');

                    $('#nopengajuan1').val('');
                    $('#nopebpib1').val('');
                    $('#nobl1').val('');

                    $('#nocbocbi1').val('');
                    $('#tglcbocbi1').val('');
                    $('#deskripsi_kasbon1').val('');
                    $('#totalcbo1').val('');
                    $('#totalcbi1').val('');
                    $('#total1').val('');

                    $('#deskripsi_biaya1').val('');
                    $('#qty1').val('');
                    $('#biaya1').val('');

                    table2.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table3.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table4.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table5.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray text-bold');
                    var select = $('.selected').closest('tr');

                    closeOpenedRows(table, select);
                    
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();
                    
                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();
                    
                    var colom = select.find('td:eq(11)').text();
                    var total_item = select.find('td:eq(10)').text();
                    var no_joborder = select.find('td:eq(0)').text();
                    var jenis_jo = select.find('td:eq(2)').text();
                    var status = colom;
                    var add = $("#addjo").attr("href","https://aplikasi.gui-group.co.id/gui_front_emkl_laravel/admin/joborder/"+no_joborder+"/detail");
                    var print = $("#printjr").attr("href","https://aplikasi.gui-group.co.id/gui_front_emkl_laravel/admin/joborder/exportpdf?no_joborder="+no_joborder);
                    if(status == 'POSTED' && total_item > 0){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        $('.add-button').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.view-button').show();
                        $('.viewjor-button').show();
                        $('.printjr-button').show();

                        $('.viewpenyelesaian-button').show();
                        $('.viewbiaya-button').show();
                        $('.viewkasbon-button').show();
                        $('.viewaju-button').show();
                    
                        $('.penyelesaian-button').hide();
                        $('.biaya-button').hide();
                        $('.kasbon-button').hide();
                        $('.aju-button').hide();
                    }else if(status =='OPEN' && jenis_jo != 'Container'){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                        $('.add-button').hide();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                        $('.view-button').show();
                        $('.viewjor-button').hide();
                        $('.printjr-button').hide();

                        $('.viewpenyelesaian-button').hide();
                        $('.viewbiaya-button').hide();
                        $('.viewkasbon-button').hide();
                        $('.viewaju-button').hide();
                    
                        $('.penyelesaian-button').show();
                        $('.biaya-button').show();
                        $('.kasbon-button').show();
                        $('.aju-button').show();
                    }else if(status =='OPEN' && jenis_jo == 'Container' && total_item > 0){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                        $('.add-button').show();
                        $('.hapus-button').hide();
                        $('.edit-button').show();
                        $('.view-button').show();
                        $('.viewjor-button').show();
                        $('.printjr-button').hide();

                        $('.viewpenyelesaian-button').hide();
                        $('.viewbiaya-button').hide();
                        $('.viewkasbon-button').hide();
                        $('.viewaju-button').hide();
                    
                        $('.penyelesaian-button').show();
                        $('.biaya-button').show();
                        $('.kasbon-button').show();
                        $('.aju-button').show();
                    }else if(status =='OPEN' && jenis_jo == 'Container' && total_item == 0){
                        $('.tombol1').hide();
                        $('.tombol2').hide();
                        $('.add-button').show();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                        $('.view-button').show();
                        $('.viewjor-button').hide();
                        $('.printjr-button').hide();

                        $('.viewpenyelesaian-button').hide();
                        $('.viewbiaya-button').hide();
                        $('.viewkasbon-button').hide();
                        $('.viewaju-button').hide();
                    
                        $('.penyelesaian-button').show();
                        $('.biaya-button').show();
                        $('.kasbon-button').show();
                        $('.aju-button').show();
                    }else if(status == 'POSTED' && jenis_jo != 'Container'){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        $('.add-button').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.view-button').show();
                        $('.viewjor-button').hide();
                        $('.printjr-button').hide();

                        $('.viewpenyelesaian-button').show();
                        $('.viewbiaya-button').show();
                        $('.viewkasbon-button').show();
                        $('.viewaju-button').show();
                    
                        $('.penyelesaian-button').hide();
                        $('.biaya-button').hide();
                        $('.kasbon-button').hide();
                        $('.aju-button').hide();
                    }else if(status == 'POSTED' && jenis_jo == 'Container'){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                        $('.add-button').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.view-button').show();
                        $('.viewjor-button').show();
                        $('.printjr-button').hide();

                        $('.viewpenyelesaian-button').show();
                        $('.viewbiaya-button').show();
                        $('.viewkasbon-button').show();
                        $('.viewaju-button').show();
                    
                        $('.penyelesaian-button').hide();
                        $('.biaya-button').hide();
                        $('.kasbon-button').hide();
                        $('.aju-button').hide();
                    }else if(status == 'INVOICED' && jenis_jo != 'Container'){
                        $('.tombol1').hide();
                        $('.tombol2').hide();
                        $('.add-button').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.view-button').show();
                        $('.viewjor-button').hide();
                        $('.printjr-button').hide();

                        $('.viewpenyelesaian-button').show();
                        $('.viewbiaya-button').show();
                        $('.viewkasbon-button').show();
                        $('.viewaju-button').show();
                    
                        $('.penyelesaian-button').hide();
                        $('.biaya-button').hide();
                        $('.kasbon-button').hide();
                        $('.aju-button').hide();
                    }else if(status == 'INVOICED' && jenis_jo == 'Container'){
                        $('.tombol1').hide();
                        $('.tombol2').hide();
                        $('.add-button').hide();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.view-button').show();
                        $('.viewjor-button').show();
                        $('.printjr-button').hide();

                        $('.viewpenyelesaian-button').show();
                        $('.viewbiaya-button').show();
                        $('.viewkasbon-button').show();
                        $('.viewaju-button').show();
                    
                        $('.penyelesaian-button').hide();
                        $('.biaya-button').hide();
                        $('.kasbon-button').hide();
                        $('.aju-button').hide();
                    }
                }
            });

            $('#penyelesaianform').on('show.bs.modal', function () {
                $('.editbutton').hide();
                $('.hapusbutton').hide();
            })

            $('#editpenyelesaian').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_joborder = $.trim($('#nojoborder_penyelesaian1').val());
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(5)').text();

                var no_cbo = $('#nocbo1').val();
                var tgl_cbo = $('#tglcbo1').val();
                var nilai = $('#nilai1').val();
                var deskripsi = $('#deskripsi_penyelesaian1').val();
                var row = table2.row( select );
                
                $.ajax({
                    url: '<?php echo route('joborder.edit_penyelesaian'); ?>',
                    type: 'POST',
                    data : {
                        'id': id,
                        'no_cbo': no_cbo,
                        'tgl_cbo': tgl_cbo,
                        'nilai': nilai,
                        'deskripsi': deskripsi,
                    },

                    success: function (results) {
                        $('#nocbo1').val('');
                        $('#tglcbo1').val('');
                        $('#deskripsi_penyelesaian1').val('');
                        $('#nilai1').val('');
                        if (results.success === true) {
                            swal("Berhasil!", results.message, "success");
                        } else {
                            swal("Gagal!", results.message, "error");
                        }
                        refreshTable();
                        tablepenyelesaian(no_joborder);
                    }
                });
            });

            $('#hapuspenyelesaian').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_joborder = $.trim($('#nojoborder_penyelesaian1').val());
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(5)').text();
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
                            url: '<?php echo route('joborder.hapus_penyelesaian'); ?>',
                            type: 'POST',
                            data : {
                                'id': id,
                            },

                            success: function (results) {
                                $('#nocbo1').val('');
                                $('#tglcbo1').val('');
                                $('#deskripsi_penyelesaian1').val('');
                                $('#nilai1').val('');
                                if (results.success === true) {
                                    swal("Berhasil!", results.message, "success");
                                } else {
                                    swal("Gagal!", results.message, "error");
                                }
                                refreshTable();
                                tablepenyelesaian(no_joborder);
                            }
                        });
                    }
                });
            });

            $('#ajuform').on('show.bs.modal', function () {
                $('.editbutton').hide();
                $('.hapusbutton').hide();
            })

            $('#editaju').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_joborder = $.trim($('#nojoborder_aju1').val());
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(4)').text();

                var no_pengajuan = $('#nopengajuan1').val();
                var no_pebpib = $('#nopebpib1').val();
                var no_bl = $('#nobl1').val();
                var row = table3.row( select );
                
                $.ajax({
                    url: '<?php echo route('joborder.edit_aju'); ?>',
                    type: 'POST',
                    data : {
                        'id': id,
                        'no_pengajuan': no_pengajuan,
                        'no_pebpib': no_pebpib,
                        'no_bl': no_bl,
                    },

                    success: function (results) {
                        $('#nopengajuan1').val('');
                        $('#nopebpib1').val('');
                        $('#nobl1').val('');
                        if (results.success === true) {
                            swal("Berhasil!", results.message, "success");
                        } else {
                            swal("Gagal!", results.message, "error");
                        }
                        refreshTable();
                        tableaju(no_joborder);
                    }
                });
            });

            $('#hapusaju').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_joborder = $.trim($('#nojoborder_aju1').val());
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(4)').text();
                var row = table3.row( select );
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
                            url: '<?php echo route('joborder.hapus_aju'); ?>',
                            type: 'POST',
                            data : {
                                'id': id,
                            },

                            success: function (results) {
                                $('#nopengajuan1').val('');
                                $('#nopebpib1').val('');
                                $('#nobl1').val('');
                                if (results.success === true) {
                                    swal("Berhasil!", results.message, "success");
                                } else {
                                    swal("Gagal!", results.message, "error");
                                }
                                refreshTable();
                                tableaju(no_joborder);
                            }
                        });
                    }
                });
            });

            $('#kasbonform').on('show.bs.modal', function () {
                $('.editbutton').hide();
                $('.hapusbutton').hide();
            })

            $('#editkasbon').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_joborder = $.trim($('#nojoborder_kasbon1').val());
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(7)').text();

                var no_cbocbi = $('#nocbocbi1').val();
                var tgl_cbocbi = $('#tglcbocbi1').val();
                var total_cbo = $('#totalcbo1').val();
                var total_cbi = $('#totalcbi1').val();
                var total_nonkasbon = $('#total1').val();
                var deskripsi = $('#deskripsi_kasbon1').val();
                var row = table4.row( select );
                
                $.ajax({
                    url: '<?php echo route('joborder.edit_kasbon'); ?>',
                    type: 'POST',
                    data : {
                        'id': id,
                        'no_cbocbi': no_cbocbi,
                        'tgl_cbocbi': tgl_cbocbi,
                        'total_cbo': total_cbo,
                        'total_cbi': total_cbi,
                        'total_nonkasbon': total_nonkasbon,
                        'deskripsi': deskripsi,
                    },

                    success: function (results) {
                        $('#nocbocbi1').val('');
                        $('#tglcbocbi1').val('');
                        $('#deskripsi_kasbon1').val('');
                        $('#totalcbo1').val('');
                        $('#totalcbi1').val('');
                        $('#total1').val('');
                        if (results.success === true) {
                            swal("Berhasil!", results.message, "success");
                        } else {
                            swal("Gagal!", results.message, "error");
                        }
                        refreshTable();
                        tablekasbon(no_joborder);
                    }
                });
            });

            $('#hapuskasbon').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_joborder = $.trim($('#nojoborder_kasbon1').val());
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(7)').text();
                var row = table4.row( select );
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
                            url: '<?php echo route('joborder.hapus_kasbon'); ?>',
                            type: 'POST',
                            data : {
                                'id': id,
                            },

                            success: function (results) {
                                $('#nocbocbi1').val('');
                                $('#tglcbocbi1').val('');
                                $('#deskripsi_kasbon1').val('');
                                $('#totalcbo1').val('');
                                $('#totalcbi1').val('');
                                $('#total1').val('');
                                if (results.success === true) {
                                    swal("Berhasil!", results.message, "success");
                                } else {
                                    swal("Gagal!", results.message, "error");
                                }
                                refreshTable();
                                tablekasbon(no_joborder);
                            }
                        });
                    }
                });
            });

            $('#biayaform').on('show.bs.modal', function () {
                $('.editbutton').hide();
                $('.hapusbutton').hide();
            })

            $('#editbiaya').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_joborder = $.trim($('#nojoborder_biaya1').val());
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(4)').text();

                var deskripsi = $('#deskripsi_biaya1').val();
                var qty = $('#qty1').val();
                var biaya_estimasi = $('#biaya1').val();
                var row = table5.row( select );
                
                $.ajax({
                    url: '<?php echo route('joborder.edit_biaya'); ?>',
                    type: 'POST',
                    data : {
                        'id': id,
                        'deskripsi': deskripsi,
                        'qty': qty,
                        'biaya_estimasi': biaya_estimasi,
                    },

                    success: function (results) {
                        $('#deskripsi_biaya1').val('');
                        $('#qty1').val('');
                        $('#biaya1').val('');
                        if (results.success === true) {
                            swal("Berhasil!", results.message, "success");
                        } else {
                            swal("Gagal!", results.message, "error");
                        }
                        refreshTable();
                        tablebiaya(no_joborder);
                    }
                });
            });

            $('#hapusbiaya').click( function () {
                table.$('tr.selected').removeClass('selected bg-gray text-bold');
                $(this).addClass('selected bg-gray text-bold');
                var no_joborder = $.trim($('#nojoborder_biaya1').val());
                var select = $('.selected').closest('tr');
                var id = select.find('td:eq(4)').text();
                var row = table4.row( select );
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
                            url: '<?php echo route('joborder.hapus_biaya'); ?>',
                            type: 'POST',
                            data : {
                                'id': id,
                            },

                            success: function (results) {
                                $('#deskripsi_biaya1').val('');
                                $('#qty1').val('');
                                $('#biaya1').val('');
                                if (results.success === true) {
                                    swal("Berhasil!", results.message, "success");
                                } else {
                                    swal("Gagal!", results.message, "error");
                                }
                                refreshTable();
                                tablebiaya(no_joborder);
                            }
                        });
                    }
                });
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

            var table2 = $('#addpenyelesaian-table').DataTable();
            var table3 = $('#addaju-table').DataTable();
            var table4 = $('#addkasbon-table').DataTable();
            var table5 = $('#addbiaya-table').DataTable();

            $('#addpenyelesaian-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray text-bold') ) {
                    $(this).removeClass('selected bg-gray text-bold');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();

                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();

                    $('.editbutton').hide();
                    $('.hapusbutton').hide();

                    $('#nocbo1').val('');
                    $('#tglcbo1').val('');
                    $('#deskripsi_penyelesaian1').val('');
                    $('#nilai1').val('');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table2.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray text-bold');
                    var select = $('.selected').closest('tr');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();

                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();

                    var nocbo1 = select.find('td:eq(1)').text();
                    var tglcbo1 = select.find('td:eq(2)').text();
                    var nilai1 = select.find('td:eq(3)').text();
                    var deskripsi_penyelesaian1 = select.find('td:eq(4)').text();

                    $('#nocbo1').val(nocbo1);
                    $('#tglcbo1').val(tglcbo1);
                    $('#deskripsi_penyelesaian1').val(deskripsi_penyelesaian1);
                    $('#nilai1').val(nilai1);

                    $('.editbutton').show();
                    $('.hapusbutton').show();
                }
            });

            $('#addaju-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray text-bold') ) {
                    $(this).removeClass('selected bg-gray text-bold');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();

                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();

                    $('.editbutton').hide();
                    $('.hapusbutton').hide();

                    $('#nopengajuan1').val('');
                    $('#nopebpib1').val('');
                    $('#nobl1').val('');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table3.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray text-bold');
                    var select = $('.selected').closest('tr');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();

                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();

                    var nopengajuan1 = select.find('td:eq(1)').text();
                    var nopebpib1 = select.find('td:eq(2)').text();
                    var nobl1 = select.find('td:eq(3)').text();

                    $('#nopengajuan1').val(nopengajuan1);
                    $('#nopebpib1').val(nopebpib1);
                    $('#nobl1').val(nobl1);

                    $('.editbutton').show();
                    $('.hapusbutton').show();
                }
            });

            $('#addkasbon-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray text-bold') ) {
                    $(this).removeClass('selected bg-gray text-bold');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();

                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();

                    $('.editbutton').hide();
                    $('.hapusbutton').hide();

                    $('#nocbocbi1').val('');
                    $('#tglcbocbi1').val('');
                    $('#deskripsi_kasbon1').val('');
                    $('#totalcbo1').val('');
                    $('#totalcbi1').val('');
                    $('#total1').val('');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table4.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray text-bold');
                    var select = $('.selected').closest('tr');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();

                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();

                    var nocbocbi1 = select.find('td:eq(1)').text();
                    var tglcbocbi1 = select.find('td:eq(2)').text();
                    var totalcbo1 = select.find('td:eq(3)').text();
                    var totalcbi1 = select.find('td:eq(4)').text();
                    var total1 = select.find('td:eq(5)').text();
                    var deskripsi_kasbon1 = select.find('td:eq(6)').text();

                    $('#nocbocbi1').val(nocbocbi1);
                    $('#tglcbocbi1').val(tglcbocbi1);
                    $('#deskripsi_kasbon1').val(deskripsi_kasbon1);
                    $('#totalcbo1').val(totalcbo1);
                    $('#totalcbi1').val(totalcbi1);
                    $('#total1').val(total1);

                    $('.editbutton').show();
                    $('.hapusbutton').show();
                }
            });

            $('#addbiaya-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray text-bold') ) {
                    $(this).removeClass('selected bg-gray text-bold');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();

                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();

                    $('.editbutton').hide();
                    $('.hapusbutton').hide();

                    $('#deskripsi_biaya1').val('');
                    $('#qty1').val('');
                    $('#biaya1').val('');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray text-bold');
                    table5.$('tr.selected').removeClass('selected bg-gray text-bold');
                    $(this).addClass('selected bg-gray text-bold');
                    var select = $('.selected').closest('tr');
                    $('.tombol1').hide();
                    $('.tombol2').hide();
                    $('.hapus-button').hide();
                    $('.add-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                    $('.viewjor-button').hide();
                    $('.viewpenyelesaian-button').hide();
                    $('.viewbiaya-button').hide();
                    $('.viewkasbon-button').hide();
                    $('.viewaju-button').hide();
                    $('.printjr-button').hide();

                    $('.penyelesaian-button').hide();
                    $('.biaya-button').hide();
                    $('.kasbon-button').hide();
                    $('.aju-button').hide();

                    var qty1 = select.find('td:eq(1)').text();
                    var biaya1 = select.find('td:eq(2)').text();
                    var deskripsi_biaya1 = select.find('td:eq(3)').text();

                    $('#deskripsi_biaya1').val(deskripsi_biaya1);
                    $('#qty1').val(qty1);
                    $('#biaya1').val(biaya1);

                    $('.editbutton').show();
                    $('.hapusbutton').show();
                }
            });

            $('#addpenyelesaian').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                $.ajax({
                    url: '<?php echo route('joborder.getDatapenyelesaian'); ?>',
                    type: 'GET',
                    data : {
                        'id': no_joborder
                    },
                    success: function(result) {

                        Table2.clear().draw();
                        Table2.rows.add(result).draw();
                
                        $('#penyelesaianform').modal('show');
                        $('#nojoborder_penyelesaian1').val(no_joborder);                    
                    }
                });
            });

            $('#addaju').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                $.ajax({
                    url: '<?php echo route('joborder.getDataaju'); ?>',
                    type: 'GET',
                    data : {
                        'id': no_joborder
                    },
                    success: function(result) {

                        Table3.clear().draw();
                        Table3.rows.add(result).draw();
                
                        $('#ajuform').modal('show');
                        $('#nojoborder_aju1').val(no_joborder);                    
                    }
                });
            });

            $('#addkasbon').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                $.ajax({
                    url: '<?php echo route('joborder.getDatakasbon'); ?>',
                    type: 'GET',
                    data : {
                        'id': no_joborder
                    },
                    success: function(result) {

                        Table4.clear().draw();
                        Table4.rows.add(result).draw();
                
                        $('#kasbonform').modal('show');
                        $('#nojoborder_kasbon1').val(no_joborder);                    
                    }
                });
            });

            $('#addbiaya').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                $.ajax({
                    url: '<?php echo route('joborder.getDatabiaya'); ?>',
                    type: 'GET',
                    data : {
                        'id': no_joborder
                    },
                    success: function(result) {

                        Table5.clear().draw();
                        Table5.rows.add(result).draw();
                
                        $('#biayaform').modal('show');
                        $('#nojoborder_biaya1').val(no_joborder);                    
                    }
                });
            });

            $('#button1').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_joborder = colom;
                console.log(no_joborder);
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
                            showConfirmButton: false,
                            allowOutsideClick: false
                            })
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                        $.ajax({
                            url: '<?php echo route('joborder.post'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_joborder
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
                var no_joborder = colom;
                console.log(no_joborder);
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
                            showConfirmButton: false,
                            allowOutsideClick: false
                            })
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('joborder.unpost'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_joborder
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

            $('#button5').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborder.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_joborder
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
                var no_joborder = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborder.showdetailjor'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_joborder
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

            $('#button7').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborder.showdetailbiaya'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_joborder
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

                                row.child( createTablebiaya(result) ).show();
                                select.addClass('shown');

                                openRows.push(select);
                            }
                        }
                    }
                });
            });

            $('#button8').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborder.showdetailpenyelesaian'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_joborder
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

                                row.child( createTablepenyelesaian(result) ).show();
                                select.addClass('shown');

                                openRows.push(select);
                            }
                        }
                    }
                });
            });

            $('#button9').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborder.showdetailkasbon'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_joborder
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

                                row.child( createTablekasbon(result) ).show();
                                select.addClass('shown');

                                openRows.push(select);
                            }
                        }
                    }
                });
            });

            $('#button10').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborder.showdetailaju'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_joborder
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

                                row.child( createTableaju(result) ).show();
                                select.addClass('shown');

                                openRows.push(select);
                            }
                        }
                    }
                });
            });

            $('#editjoborder').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('joborder.edit_joborder'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_joborder
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Joborder').val(results.no_joborder);
                        $('#Tanggal').val(results.tanggal_jo);
                        $('#Con').val(results.jenis_jo).trigger('change');
                        $('#Jenis').val(results.type).trigger('change');
                        $('#Customer').val(results.kode_customer).trigger('change');
                        $('#Shipper').val(results.kode_shipper).trigger('change');
                        $('#Consignee').val(results.kode_consignee).trigger('change');
                        $('#Agent').val(results.agent);
                        $('#Order').val(results.order_by);
                        $('#Kapal').val(results.kode_kapal).trigger('change');
                        $('#Voyage').val(results.voyage);
                        $('#Portloading').val(results.port_loading).trigger('change');
                        $('#Etd').val(results.etd);
                        $('#Porttransite').val(results.port_transite).trigger('change');
                        $('#Portdestination').val(results.port_destination).trigger('change');
                        $('#Eta').val(results.eta);
                        $('#Shipping').val(results.shipping_line).trigger('change');
                        $('#Customs').val(results.customs_clearance).trigger('change');
                        $('#Bc').val(results.no_bc);
                        $('#House').val(results.house_bl);
                        $('#Do').val(results.no_do);
                        $('#Loading').val(results.loading_type).trigger('change');
                        $('#Deskripsi').val(results.deskripsi);
                        $('#editform').modal('show');
                    }
         
                });
            });

            $('#hapusjoborder').click( function () {
                var select = $('.selected').closest('tr');
                var no_joborder = select.find('td:eq(0)').text();
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
                            url: '<?php echo route('joborder.hapus_joborder'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_joborder
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
            $('.viewjor-button').hide();
            $('.viewpenyelesaian-button').hide();
            $('.viewbiaya-button').hide();
            $('.viewkasbon-button').hide();
            $('.viewaju-button').hide();
            $('.printjr-button').hide();
            $('.add-button').hide();

            $('.penyelesaian-button').hide();
            $('.biaya-button').hide();
            $('.kasbon-button').hide();
            $('.aju-button').hide();
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
                    url:'<?php echo route('joborder.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Tanggal1').val('');
                        $('#Con1').val('').trigger('change');
                        $('#Jenis1').val('').trigger('change');
                        $('#Customer1').val('').trigger('change');
                        $('#Shipper1').val('').trigger('change');
                        $('#Consignee1').val('').trigger('change');
                        $('#Agent1').val('').trigger('change');
                        $('#Order1').val('');
                        $('#Kapal1').val('').trigger('change');
                        $('#Voyage1').val('');
                        $('#Portloading1').val('').trigger('change');
                        $('#Etd1').val('');
                        $('#Porttransite1').val('').trigger('change');
                        $('#Portdestination1').val('').trigger('change');
                        $('#Eta1').val('');
                        $('#Shipping1').val('').trigger('change');
                        $('#Customs1').val('').trigger('change');
                        $('#Bc1').val('');
                        $('#House1').val('');
                        $('#Do1').val('');
                        $('#Loading1').val('').trigger('change');
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
                    url:'<?php echo route('joborder.updateajax'); ?>',
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

        $('#ADD_PENYELESAIAN').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var no_joborder = $.trim($('#nojoborder_penyelesaian1').val());
            var registerForm = $("#ADD_PENYELESAIAN");
            var formData = registerForm.serialize();

            $.ajax({
                    url:'<?php echo route('joborder.storepenyelesaian'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        $('#nocbo1').val('');
                        $('#tglcbo1').val('');
                        $('#deskripsi_penyelesaian1').val('');
                        $('#nilai1').val('');
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                        refreshTable();
                        tablepenyelesaian(no_joborder);
                    },
                });
            
        });

        $('#ADD_AJU').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var no_joborder = $.trim($('#nojoborder_aju1').val());
            var registerForm = $("#ADD_AJU");
            var formData = registerForm.serialize();

            $.ajax({
                    url:'<?php echo route('joborder.storeaju'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        $('#nopengajuan1').val('');
                        $('#nopebpib1').val('');
                        $('#nobl1').val('');
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                        refreshTable();
                        tableaju(no_joborder);
                    },
                });
            
        });

        $('#ADD_KASBON').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var no_joborder = $.trim($('#nojoborder_kasbon1').val());
            var registerForm = $("#ADD_KASBON");
            var formData = registerForm.serialize();

            $.ajax({
                    url:'<?php echo route('joborder.storekasbon'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        $('#nocbocbi1').val('');
                        $('#tglcbocbi1').val('');
                        $('#deskripsi_kasbon1').val('');
                        $('#totalcbo1').val('');
                        $('#totalcbi1').val('');
                        $('#total1').val('');
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                        refreshTable();
                        tablekasbon(no_joborder);
                    },
                });
            
        });

        $('#ADD_BIAYA').submit(function (e) {
            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
            })
            e.preventDefault();
            var no_joborder = $.trim($('#nojoborder_biaya1').val());
            var registerForm = $("#ADD_BIAYA");
            var formData = registerForm.serialize();

            $.ajax({
                    url:'<?php echo route('joborder.storebiaya'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        $('#deskripsi_biaya1').val('');
                        $('#qty1').val('');
                        $('#biaya1').val('');
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                        refreshTable();
                        tablebiaya(no_joborder);
                    },
                });
            
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>