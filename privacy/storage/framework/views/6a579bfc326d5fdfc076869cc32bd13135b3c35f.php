<?php $__env->startSection('title', $info['title']); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($info['list_url']); ?>" class="btn btn-light btn-xs pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    <a href="<?php echo e($permission->edit_url); ?>" class="btn btn-warning btn-XS pull-right"><i class="fa fa-edit"></i> Edit Data</a>
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td><?php echo e($permission->name); ?></td>
                </tr>
                <tr>
                    <th>Display Name</th>
                    <td><?php echo e($permission->display_name); ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo e($permission->description); ?></td>
                </tr>
            </table>
        </div>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>