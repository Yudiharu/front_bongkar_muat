<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Produk Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Produk : <?php echo e($produk->nama_produk); ?></h3>
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
            <?php echo Form::model($produk, ['route' => ['produk.update', $produk->kode_produk],'method' => 'patch']); ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode Produk', 'Kode Produk:')); ?>

                                <?php echo e(Form::text('kode_produk', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('Nama Produk', 'Nama Produk:')); ?>

                                <?php echo e(Form::text('nama_produk', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_kategori', 'Kode Kategori:')); ?>

                                <?php echo e(Form::select('kode_kategori',$Kategori,null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_merek', 'Kode Merek:')); ?>

                                <?php echo e(Form::select('kode_merek', $Merek,null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_ukuran', 'Kode Ukuran:')); ?>

                                <?php echo e(Form::select('kode_ukuran', $Ukuran,null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_satuan', 'Kode Satuan:')); ?>

                                <?php echo e(Form::select('kode_satuan', $Satuan,null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_company', 'Company:')); ?>

                                <?php echo e(Form::select('kode_company', $Company, null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('type', 'Type:')); ?>

                                <?php echo e(Form::text('type', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('harga_beli', 'Harga Beli:')); ?>

                                <?php echo e(Form::text('harga_beli', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('harga_jual', 'Harga Jual:')); ?>

                                <?php echo e(Form::text('harga_jual', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('hpp', 'HPP:')); ?>

                                <?php echo e(Form::text('hpp', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('stok', 'Stok:')); ?>

                                <?php echo e(Form::text('stok', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('aktif', 'Aktif:')); ?>

                                <?php echo e(Form::text('aktif', null, ['class'=> 'form-control'])); ?>

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