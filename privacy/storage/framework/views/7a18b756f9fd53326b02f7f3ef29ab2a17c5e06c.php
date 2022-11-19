<?php $__env->startSection('title', 'Barang'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Barang</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Manages Barang</h3>
        </div>
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($create_url); ?>" class="btn btn-info btn-sm">New Barang</a>
        <!--             <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-default btn-sm">Manages Role</a>
                    <a href="javascript:;" class="btn btn-default btn-sm" onclick="refreshTable()">Manages Permission</a> -->
                </div>
            </div>
             <table class="table table-bordered" id="customer-table">
                <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tipe Barang</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                 </tr>
                </thead>
    </table>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script>
        $(function() {
            $('#customer-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('barang.data'); ?>',
            columns: [
                { data: 'kode_barang', name: 'kode_barang' },
                { data: 'nama_barang', name: 'nama_barang' },
                { data: 'tipe_barang', name: 'tipe_barang' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function refreshTable() {
             $('#customer-table').DataTable().ajax.reload(null,false);;
        }
        function del(id, url) {
            var result = confirm("Want to delete?");
            if (result) {
                // console.log(id)
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(result) {
                        console.log(result);
                        $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            }

        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>