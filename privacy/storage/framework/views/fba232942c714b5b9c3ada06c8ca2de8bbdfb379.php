<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>User Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit User : <?php echo e($user->email); ?></h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>


            <?php echo Form::model($user, ['route' => ['users.update', $user->id],'method' => 'put']); ?>


                <div class="form-group">
                    <?php echo e(Form::label('name', 'Full Name:')); ?>

                    <?php echo e(Form::text('name', null, ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('email', 'Email:')); ?>

                    <?php echo e(Form::text('email', null, ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('password', 'Password:')); ?>

                    <?php echo e(Form::password('password', ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('password_confirmation', 'Password:')); ?>

                    <?php echo e(Form::password('password_confirmation', ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('roles', 'Roles:')); ?>

                    <?php echo e(Form::select('roles[]', $roles , null, ['class'=> 'form-control','multiple'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('kode_company', 'Company:')); ?>

                    <?php echo e(Form::select('kode_company', $Company, null, ['class'=> 'form-control','required'=>'required'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                </div>

            <?php echo Form::close(); ?>


        </div>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>