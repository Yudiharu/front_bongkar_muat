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
                    <a href="<?php echo e($create_url); ?>" class="btn btn-info btn-sm">Create New Permission</a>
                </div>
            </div>
            <table class="table">

                <?php $__currentLoopData = $permissions->groupBy('tab'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <thead>
                    <tr>
                        <th colspan="3"><i class="fa fa-arrow-right"></i> <?php echo e($key); ?></th>
                    </tr>
                    <tr>
                        <th style="padding-left: 30px">Name (<i>System Only</i>)</th>
                        <th style="padding-left: 30px">Display Name (<i>User frendly</i>)</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="padding-left: 40px"><?php echo e($row->name); ?></td>
                            <td style="padding-left: 40px"><?php echo e($row->display_name); ?></td>
                            <td><?php echo e($row->description); ?></td>
                            <td>
                                <a href="<?php echo e($row->show_url); ?>" class="btn btn-primary btn-sm">Show</a>
                                <a href="<?php echo e($row->edit_url); ?>" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function refreshTable() {
             $('#dataTableBuilder').DataTable().ajax.reload();;
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