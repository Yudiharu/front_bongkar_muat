<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Size Tipe Master Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Size Tipe Master : <?php echo e($sizetipemaster->size_type); ?></h3>
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
                        <?php echo Form::model($sizetipemaster, ['route' => ['sizetipemaster.update',
                        $sizetipemaster->id_size],'method' => 'patch']); ?>

                        <div class="row ">
                            <div class="form-group col-md-2 col-md-offset-4">
                                <?php echo e(Form::label('Size Tipe', 'Size Tipe')); ?>

                                <?php echo e(Form::text('size_type', null, ['class'=> 'form-control','autofocus'=>'autofocus'])); ?>

                            </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-3 col-md-offset-4">
                               <?php echo e(Form::label('No Container', 'No Container')); ?>

                               <?php echo e(Form::text('no_container', null, ['class'=> 'form-control'])); ?>

                           </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-md-offset-4">
                                <?php echo e(Form::label('deskripsi', 'Deskripsi')); ?>

                                <?php echo e(Form::textArea('deskripsi', null, ['class'=> 'form-control'])); ?>

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