<?php $__env->startSection('title', 'Supplier Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Supplier</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Supplier</h3>
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
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('supplier.store')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="box box-success">
                <div class="box-body">
                    
                    <div class="form-group<?php echo e($errors->has('kode_supplier') ? ' has-error' : ''); ?>">
                            <label for="kode_customer" class="col-md-4 control-label">Kode Supplier</label>

                            <div class="col-md-2">
                                <input id="kode_supplier" type="kode_supplier" class="form-control" name="kode_supplier" value="<?php echo e(old('kode_barang')); ?>" required >

                                <?php if($errors->has('kode_supplier')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_supplier')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('nama_supplier') ? ' has-error' : ''); ?>">
                            <label for="nama_supplier" class="col-md-4 control-label">Nama Supplier</label>

                            <div class="col-md-3">
                                <input id="nama_supplier" type="text" class="form-control" name="nama_supplier" value="<?php echo e(old('nama_barang')); ?>" required>

                                <?php if($errors->has('nama_supplier')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_supplier')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('alamat') ? ' has-error' : ''); ?>">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-4">
                               <?php echo e(Form::text('alamat', null, ['class'=> 'form-control'])); ?>

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