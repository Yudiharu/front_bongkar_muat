<?php $__env->startSection('title', 'Produk Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Produk</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Produk</h3>
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
            <?php echo Form::open(['route' => ['produk.store'],'method' => 'post','id'=>'form']); ?>

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
                                <?php echo e(Form::label('kode_kategori', 'Kategori:')); ?>

                                <?php echo e(Form::select('kode_kategori',$Kategori,null, ['class'=> 'form-control'])); ?>

                                    
                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_merek', 'Merek:')); ?>

                                <?php echo e(Form::select('kode_merek', $Merek, null, ['class'=> 'form-control'])); ?>

                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_ukuran', 'Ukuran:')); ?>

                                <?php echo e(Form::select('kode_ukuran', $Ukuran, null, ['class'=> 'form-control'])); ?>

                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('kode_satuan', 'Satuan:')); ?>

                                <?php echo e(Form::select('kode_satuan', $Satuan, null, ['class'=> 'form-control'])); ?>

                                
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
        <div class=" box-footer">
                    <div class="pull-right">
                    <?php echo e(Form::submit('Create data', ['class' => 'btn btn-success'])); ?>

                    </div>
        </div>

        <?php echo Form::close(); ?>

        </div>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>

$(document).ready(function () {
            $('#form').validate({ // initialize the plugin
                rules: {
                            nama_produk: {
                                required: true
                            },
                            kode_kategori: {
                                required: true,
                            },
                            kode_merek: {
                                required: true,
                            },
                            kode_ukuran: {
                                required: true,
                            },
                            kode_satuan: {
                                required: true,
                            },
                            type: {
                                required: true,
                                max: 20
                            },
                            harga_beli: {
                                required: true,
                                max: 100
                                
                            },
                            harga_jual: {
                                required: true,
                                max: 100
                            },
                            hpp: {
                                required: true,
                                max: 100
                            },
                            stok: {
                                required: true,
                                max: 100
                            },
                            aktif: {
                                required: true,
                                max: 7
                            },
                        }
                });
            });
//   $("[name='status']").bootstrapSwitch({
//   on: 'Aktif',
//   off: 'NonAktif',
//   onLabel: '&nbsp;&nbsp;&nbsp;',
//   offLabel: '&nbsp;&nbsp;&nbsp;',
// //   same: false,//same labels for on/off states
//   state: true,
//   size: 'md',
//   onClass: 'primary',
//   offClass: 'danger'
// });

// var s = $('#status').val();
// $("#status").change(function(){
//     if(this.checked == true)
//     {
//         s = '1';
//     }
//     else
//     {
//         s = '0';        
//     }
//     //alert(s);
//     let status = $('#status');
//     status.val(s);
//     console.log(status);
// });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>