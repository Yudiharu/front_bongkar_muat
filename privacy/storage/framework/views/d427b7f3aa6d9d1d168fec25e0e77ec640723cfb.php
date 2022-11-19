<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Kategori Produk Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Kategori Produk : <?php echo e($kategoriproduk->nama_kategori); ?></h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>  
        </div>
    </div>
        <div class="box box-success">
            <div class="box-body">
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::model($kategoriproduk, ['route' => ['kategoriproduk.update', $kategoriproduk->kode_kategori],'method' => 'patch']); ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode kategori', 'Kode Kategori:')); ?>

                                <?php echo e(Form::text('kode_kategori', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('nama kategori', 'Nama Kategori:')); ?>

                                <?php echo e(Form::text('nama_kategori', null, ['class'=> 'form-control',])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('status', 'Status:')); ?><br>
                                <?php echo e(Form::select('status', ['1' => 'Aktif', '0' => 'Non Aktif'], null, ['class'=> 'form-control'])); ?>

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
<?php $__env->startPush('js'); ?>

<script>

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>