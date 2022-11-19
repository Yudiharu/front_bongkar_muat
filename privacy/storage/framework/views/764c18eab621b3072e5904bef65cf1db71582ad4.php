<?php $__env->startSection('title', 'Vendor Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Vendor</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Vendor</h3>
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
            <?php echo Form::open(['route' => ['vendor.store'],'method' => 'post','id'=>'form']); ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode Vendor', 'Kode Vendor:')); ?>

                                <?php echo e(Form::text('kode_vendor', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('Nama Vendor', 'Nama Vendor:')); ?>

                                <?php echo e(Form::text('nama_vendor', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('alamat', 'Alamat:')); ?>

                                <?php echo e(Form::text('alamat', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('telp', 'Telp:')); ?>

                                <?php echo e(Form::text('telp', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('Hp', 'Hp:')); ?>

                                <?php echo e(Form::text('hp', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('Npwp', 'Npwp:')); ?>

                                <?php echo e(Form::text('npwp', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('termin_pembayaran', 'Termin Pembayaran:')); ?>

                                <?php echo e(Form::text('termin_pembayaran', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('status', 'Status:')); ?><br>
                                <?php echo e(Form::select('status', ['1' => 'Aktif', '0' => 'Non Aktif'], '1', ['class'=> 'form-control'])); ?>

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