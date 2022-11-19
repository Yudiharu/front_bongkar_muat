<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Barang Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Barang : <?php echo e($barang->nama_barang); ?></h3>
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
                        <?php echo Form::model($barang, ['route' => ['barangs.update', $barang->kode_barang],'method' => 'patch']); ?>

                        <div class="row ">
                            <div class="form-group col-md-2 col-md-offset-4">
                                <?php echo e(Form::label('name', 'Kode Barang')); ?>

                                <?php echo e(Form::text('kode_barang', null, ['class'=> 'form-control','autofocus'=>'autofocus'])); ?>

                            </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-3 col-md-offset-4">
                               <?php echo e(Form::label('nama', 'Nama')); ?>

                               <?php echo e(Form::text('nama_barang', null, ['class'=> 'form-control'])); ?>

                           </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2 col-md-offset-4">
                                    <?php echo e(Form::label('name', 'Tipe Barang')); ?>

                                    <?php echo e(Form::select('tipe_barang',
                                    array('RAW MATERIAL'=>'RAW MATERIAL','FINISH GOOD'=>'FINISH GOOD'),null,['class'=>'form-control'])); ?>

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