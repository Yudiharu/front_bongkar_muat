<?php $__env->startSection('title', 'Barang Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Barang</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Barang</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('barangs.store')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="box box-success">
                <div class="box-body">
                    
                    <div class="form-group<?php echo e($errors->has('kode_barang') ? ' has-error' : ''); ?>">
                            <label for="kode_customer" class="col-md-4 control-label">Kode Barang</label>

                            <div class="col-md-2">
                                <input id="kode_barang" type="kode_barang" class="form-control" name="kode_barang" value="<?php echo e(old('kode_barang')); ?>" required >

                                <?php if($errors->has('kode_barang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_barang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('nama_barang') ? ' has-error' : ''); ?>">
                            <label for="nama_barang" class="col-md-4 control-label">Nama Barang</label>

                            <div class="col-md-3">
                                <input id="nama_barang" type="text" class="form-control" name="nama_barang" value="<?php echo e(old('nama_barang')); ?>" required>

                                <?php if($errors->has('nama_barang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_barang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('tipe_barang') ? ' has-error' : ''); ?>">
                            <label for="no_telepon" class="col-md-4 control-label">Tipe Barang</label>
                            <div class="col-md-2">
                                <?php echo e(Form::select('tipe_barang',['RAW MATERIAL'=>'RAW MATERIAL','FINISH GOOD'=>'FINISH GOOD'],null,['class' => 'form-control'])); ?>

                                <?php if($errors->has('tipe_barang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tipe_barang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row pull-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>