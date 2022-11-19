<?php $__env->startSection('title', 'User Edit'); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onLoad="startTime()">
    <div class="box">
        <div class="box-header with-border">
            <a href="<?php echo e($list_url); ?>" class="btn btn-light btn-xs pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>

        <div class="box-body">

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

                <div class="box-footer">
                    <div class="row pull-right">
                        <div class="col-md-12 ">
                            <?php echo e(Form::submit('Update', ['class' => 'btn btn-success btn-sm'])); ?>

                        </div>
                    </div>
                </div>

            <?php echo Form::close(); ?>


        </div>

    </div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>