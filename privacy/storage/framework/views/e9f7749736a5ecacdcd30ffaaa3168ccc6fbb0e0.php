<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Customer Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Customer : <?php echo e($customer->nama_customer); ?></h3>
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
            <?php echo Form::model($customer, ['route' => ['customer.update', $customer->kode_customer],'method' => 'patch']); ?>


            <div class="row">
                <div class="form-group col-md-2 col-md-offset-4">
                    <?php echo e(Form::label('name', 'Kode Customer:')); ?>

                    <?php echo e(Form::text('kode_customer', null, ['class'=> 'form-control','autofocus'=>'autofocus'])); ?>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3 col-md-offset-4">
                    <?php echo e(Form::label('name', 'Nama Customer:')); ?>

                    <?php echo e(Form::text('nama_customer', null, ['class'=> 'form-control'])); ?>

                </div>
            </div>
             <div class="row">
                <div class="form-group col-md-2 col-md-offset-4">
                    <?php echo e(Form::label('name', 'No Telepon:')); ?>

                    <?php echo e(Form::text('no_telepon', null, ['class'=> 'form-control'])); ?>

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

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>