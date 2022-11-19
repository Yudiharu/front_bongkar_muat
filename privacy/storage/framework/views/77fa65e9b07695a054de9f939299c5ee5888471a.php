<?php $__env->startSection('title', 'Users Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>User Data</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Manages User</h3>
        </div>
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($create_url); ?>" class="btn btn-info btn-sm">New user</a>
                    <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-default btn-sm">Manages Role</a>
                    <a href="javascript:;" class="btn btn-default btn-sm" onclick="refreshTable()">Manages Permission</a>
                </div>
            </div>
            <?php echo $dataTable->table(['class' => 'table table-bordered table-hover'], true); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    
    
    
        <?php echo $dataTable->scripts(); ?>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function refreshTable() {
             $('#dataTableBuilder').DataTable().ajax.reload(null,false);;
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