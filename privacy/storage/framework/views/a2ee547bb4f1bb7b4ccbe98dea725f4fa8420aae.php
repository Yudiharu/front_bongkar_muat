<?php $__env->startSection('title', 'Company Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Company</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Company</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('company.store')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="box box-success">
                <div class="box-body">
                    <div class="form-group<?php echo e($errors->has('kode_company') ? ' has-error' : ''); ?>">
                            <label for="kode_company" class="col-md-4 control-label">Kode Company</label>

                            <div class="col-md-2">
                                <input id="kode_company" type="kode_company" class="form-control" name="kode_company" value="<?php echo e(old('kode_company')); ?>" required autofocus>

                                <?php if($errors->has('kode_company')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_company')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('nama_company') ? ' has-error' : ''); ?>">
                            <label for="nama_company" class="col-md-4 control-label">Nama Company</label>

                            <div class="col-md-4">
                                <input id="nama_company" type="text" class="form-control" name="nama_company" value="<?php echo e(old('nama_company')); ?>" required >

                                <?php if($errors->has('nama_company')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_company')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('alamat') ? ' has-error' : ''); ?>">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="<?php echo e(old('alamat')); ?>">

                                <?php if($errors->has('alamat')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('alamat')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('no_telepon') ? ' has-error' : ''); ?>">
                            <label for="no_telepon" class="col-md-4 control-label">No Telepon</label>

                            <div class="col-md-2">
                                <input id="no_telepon" type="text" class="form-control" name="no_telepon" value="<?php echo e(old('no_telepon')); ?>">

                                <?php if($errors->has('no_telepon')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('no_telepon')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
                <div class="box-footer">
                    <div class="row pull-right">
                        <div class="col-md-12 ">
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