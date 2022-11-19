<?php $__env->startSection('title', 'Size Tipe Master Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Size Tipe Master</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Size Tipe Master</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('sizetipemaster.store')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="box box-success">
                <div class="box-body">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="form-group<?php echo e($errors->has('size_type') ? ' has-error' : ''); ?>">
                            <label for="size_type" class="col-md-4 control-label">Size Tipe</label>

                            <div class="col-md-2">
                                <input id="size_type" type="size_type" class="form-control" name="size_type" value="<?php echo e(old('size_type')); ?>" required autofocus>

                                <?php if($errors->has('size_type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('size_type')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('no_container') ? ' has-error' : ''); ?>">
                            <label for="no_container" class="col-md-4 control-label">No Container</label>

                            <div class="col-md-3">
                                <input id="no_container" type="text" class="form-control" name="no_container" value="<?php echo e(old('no_container')); ?>" required>

                                <?php if($errors->has('no_container')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('no_container')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('deskripsi') ? ' has-error' : ''); ?>">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-4">
                                <?php echo e(Form::textArea('deskripsi', null, ['class'=> 'form-control'])); ?>

                                <?php if($errors->has('deskripsi')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('deskripsi')); ?></strong>
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