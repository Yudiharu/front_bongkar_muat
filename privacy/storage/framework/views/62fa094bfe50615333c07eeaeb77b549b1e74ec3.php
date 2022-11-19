<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Memo Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Produk : <?php echo e($memo->no_memo); ?></h3>
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
            <?php echo Form::model($memo, ['route' => ['memo.update', $memo->no_memo],'method' => 'patch']); ?>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo e(Form::label('No memo', 'No Memo:')); ?>

                            <?php echo e(Form::text('no_memo', null, ['class'=> 'form-control'])); ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo e(Form::label('no_permintaan', 'No Permintaan:')); ?>

                            
                            <?php echo e(Form::select('no_permintaan', $Permintaan, null, ['class'=> 'form-control'])); ?>

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('Tanggal memo', 'Tanggal memo:')); ?>

                            <?php echo e(Form::date('tanggal_memo', null,['class'=> 'form-control'])); ?>

                            
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo e(Form::label('status', 'Status:')); ?>

                            <?php echo e(Form::text('status', null, ['class'=> 'form-control'])); ?>

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