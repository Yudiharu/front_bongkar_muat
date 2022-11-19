<?php $__env->startSection('title', 'Satuan Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Satuan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Satuan</h3>
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
            <?php echo Form::open(['route' => ['satuan.store'],'method' => 'post','id'=>'form']); ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode satuan', 'Kode Satuan:')); ?>

                                <?php echo e(Form::text('kode_satuan', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('nama_satuan', 'Nama Satuan:')); ?>

                                <?php echo e(Form::text('nama_satuan', null, ['class'=> 'form-control',])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('status', 'Status:')); ?> <br>
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
  
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>