<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Penerimaan Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Produk : <?php echo e($penerimaan->no_penerimaan); ?></h3>
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
            <?php echo Form::model($penerimaan, ['route' => ['penerimaan.update', $penerimaan->no_penerimaan],'method' => 'patch']); ?>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('No Penerimaan', 'No Penerimaan:')); ?>

                                    <?php echo e(Form::text('no_penerimaan', null, ['class'=> 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('No Pembelian', 'No Pembelian:')); ?>

                                    <?php echo e(Form::text('no_pembelian', null, ['class'=> 'form-control'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Tanggal Penerimaan', 'Tanggal Penerimaan:')); ?>

                                    <?php echo e(Form::text('tanggal_penerimaan', null, ['class'=> 'form-control'])); ?>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('status', 'Status:')); ?>

                                    <?php echo e(Form::text('status', null, ['class'=> 'form-control'])); ?>

                                </div>
                            </div>
            
            </div>
             
                <div class="box-footer">
                        <div class="row pull-right">
                            <div class="col-md-12">
                                    <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                             </div>
                        </div>
                </div>
            <?php echo Form::close(); ?>

    </div>

    </div>
</div>
<!-- /.box -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<script>

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>