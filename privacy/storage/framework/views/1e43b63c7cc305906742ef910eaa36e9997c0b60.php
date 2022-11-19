<?php $__env->startSection('title', 'Pembelian Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Pembelian</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Pembelian</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>
        </div>
    </div>
    <div class="box box-success">
        <div class="box-body">
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['route' => ['pembelian.store'],'method' => 'post','id'=>'form']); ?>

                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('No Pembelian', 'No Pembelian:')); ?>

                                <?php echo e(Form::text('no_pembelian', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('No Memo', 'No Memo:')); ?>

                                <?php echo e(Form::select('no_memo',$Memo,null, ['class'=> 'form-control','id'=>'no_memo'])); ?>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo e(Form::label('Kode Vendor', 'Vendor:')); ?>

                                <?php echo e(Form::select('kode_vendor',$Vendor,null, ['class'=> 'form-control','id'=>'kode_vendor'])); ?>

                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <?php echo e(Form::label('Tanggal Pembelian', 'Tanggal Pembelian:')); ?>

                                <?php echo e(Form::date('tanggal_pembelian', \Carbon\Carbon::now(),['class'=> 'form-control'])); ?>

                                
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <?php echo e(Form::label('status', 'Status:')); ?>

                                <?php echo e(Form::text('status', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                       
        </div>
        <div class=" box-footer">
                    <div class="pull-right">
                    <?php echo e(Form::submit('Create data', ['class' => 'btn btn-success'])); ?>

                    </div>
        </div>

        <?php echo Form::close(); ?>

        </div>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
//   $("[name='status']").bootstrapSwitch({
//   on: 'Aktif',
//   off: 'NonAktif',
//   onLabel: '&nbsp;&nbsp;&nbsp;',
//   offLabel: '&nbsp;&nbsp;&nbsp;',
// //   same: false,//same labels for on/off states
//   state: true,
//   size: 'md',
//   onClass: 'primary',
//   offClass: 'danger'
// });

// var s = $('#status').val();
// $("#status").change(function(){
//     if(this.checked == true)
//     {
//         s = '1';
//     }
//     else
//     {
//         s = '0';        
//     }
//     //alert(s);
//     let status = $('#status');
//     status.val(s);
//     console.log(status);
// });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>