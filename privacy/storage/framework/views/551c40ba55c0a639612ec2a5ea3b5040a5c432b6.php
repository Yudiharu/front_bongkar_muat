<?php $__env->startSection('title', $info['title']); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-solid">
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($info['list_url']); ?>" class="btn btn-light btn-xs pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::model($permission, ['route' => ['permissions.update', $permission->id],'method' => 'put']); ?>


                <div class="form-group">
                    <?php echo e(Form::label('name', 'Name:')); ?>

                    <?php echo e(Form::text('name', null, ['class'=> 'form-control','readonly'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('display_name', 'Display Name:')); ?>

                    <?php echo e(Form::text('display_name', null, ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('description', 'Description:')); ?>

                    <?php echo e(Form::text('description', null, ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::submit('Update', ['class' => 'btn btn-success btn-sm'])); ?>

                </div>

            <?php echo Form::close(); ?>


        </div>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>