<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>User Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Company : <?php echo e($Company->nama_company); ?></h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>

<div class="box box-success">
        <div class="box-body">
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::model($Company, ['route' => ['company.update', $Company->kode_company],'method' => 'put']); ?>


                <div class="form-group col-md-2 col-md-offset-4">
                    <?php echo e(Form::label('name', 'Kode Company:')); ?>

                    <?php echo e(Form::text('kode_company', null, ['class'=> 'form-control','autofocus'=>'autofocus'])); ?>

                </div>

                <div class="form-group col-md-4 col-md-offset-4">
                    <?php echo e(Form::label('name', 'Nama Company:')); ?>

                    <?php echo e(Form::text('nama_company', null, ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group col-md-6 col-md-offset-4">
                    <?php echo e(Form::label('name', 'Alamat:')); ?>

                    <?php echo e(Form::text('alamat','null', ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group col-md-2 col-md-offset-4">
                    <?php echo e(Form::label('name', 'No Telepon:')); ?>

                    <?php echo e(Form::text('no_telepon', null, ['class'=> 'form-control'])); ?>

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

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>