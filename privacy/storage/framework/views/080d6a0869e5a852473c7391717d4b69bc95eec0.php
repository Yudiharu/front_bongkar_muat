<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Permintaan Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Produk : <?php echo e($permintaan->no_permintaan); ?></h3>
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
            <?php echo Form::model($permintaan, ['route' => ['permintaan.update', $permintaan->no_permintaan],'method' => 'patch']); ?>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo e(Form::label('No Permintaan', 'No Permintaan:')); ?>

                            <?php echo e(Form::text('no_permintaan', null, ['class'=> 'form-control'])); ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                            <?php echo e(Form::text('deskripsi', null, ['class'=> 'form-control'])); ?>

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Tanggal Permintaan', 'Tanggal Permintaan:')); ?>

                            <?php echo e(Form::date('tanggal_permintaan', null,['class'=> 'form-control'])); ?>

                            

                        </div>
                    </div>
                
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Type', 'Type:')); ?>

                            <?php echo e(Form::select('type', ['Umum' => 'Umum', 'Mobil' => 'Mobil','Alat' => 'Alat',
                        'Jasa' => 'Jasa','Stok' => 'Stok'], null, ['class'=> 'form-control'])); ?>

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('status', 'Status:')); ?>

                            <?php echo e(Form::text('status', null, ['class'=> 'form-control'])); ?>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo e(Form::label('kode_company', 'Company:')); ?>

                            <?php echo e(Form::select('kode_company', $Company, null, ['class'=> 'form-control'])); ?>

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