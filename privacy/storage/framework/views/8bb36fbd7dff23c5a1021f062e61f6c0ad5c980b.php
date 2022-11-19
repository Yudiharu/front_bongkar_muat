<?php $__env->startSection('title', 'Show Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Show Transaksi</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Show Data Transaksi : <?php echo e($transaksi->no_transaksi); ?></h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a class="btn btn-default" href="<?php echo e($info['list_url']); ?>">Lihat Data</a>
                    <a class="btn btn-primary" href="<?php echo e($info['edit_url']); ?>">Edit Data</a>
                    <a class="btn btn-danger pull-right" href="<?php echo e(route('transaksis.pdf', $transaksi->no_transaksi)); ?>">Cetak</a>
                </div>
            </div>

            <table class="table table-bordered" id="customer-table">
                <thead>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td><?php echo e($transaksi->tanggal_masuk); ?></td>
                    </tr>
                    <tr>
                        <th>No Transaksi</th>
                        <td><?php echo e($transaksi->no_transaksi); ?></td>
                    </tr>
                    <tr>
                        <th>No PO/DO</th>
                        <td><?php echo e($transaksi->no_po); ?></td>
                    </tr>
                    <tr>
                        <th>No Polisi</th>
                        <td><?php echo e($transaksi->no_polisi); ?></td>
                    </tr>
                    <tr>
                        <th>No Seal</th>
                        <td><?php echo e($transaksi->no_seal); ?></td>
                    </tr>
                    <tr>
                        <th>No Container</th>
                        <td><?php echo e($transaksi->no_container); ?></td>
                    </tr>
                    <tr>
                        <th>Tipe Container</th>
                        <td><?php echo e($transaksi->sizetipemaster->size_type); ?></td>
                    </tr>
                    <tr>
                        <th>Muatan</th>
                        <td><?php echo e($transaksi->muatan); ?></td>
                    </tr>
                    <tr>
                        <th>Nama Supir</th>
                        <td><?php echo e($transaksi->nama_supir); ?></td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td><?php echo e($transaksi->barang->nama_barang); ?></td>
                    </tr>
                    <tr>
                        <th>Nama Supplier</th>
                        <td><?php echo e($transaksi->supplier->nama_supplier); ?></td>
                    </tr>
                    <tr>
                        <th>Nama Customer</th>
                        <td><?php echo e($transaksi->customer->nama_customer); ?></td>
                    </tr>
                    <tr>
                        <th>Nama Company</th>
                        <td><?php echo e($transaksi->company->nama_company); ?></td>
                    </tr>
                    <tr>
                        <th>Berat 1</th>
                        <td><?php echo e($transaksi->berat1); ?></td>
                    </tr>
                    <tr>
                        <th>Berat 2</th>
                        <td><?php echo e($transaksi->berat2); ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td><?php echo e($transaksi->keterangan); ?></td>
                    </tr>
                <thead>
            </table>

        </div>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>