<?php $__env->startSection('title', 'Manages Permissions'); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-solid">
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($create_url); ?>" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> New Permission</a>
                    <span class="pull-right">
                        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-success btn-xs">Manages User</a>
                        <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-warning btn-xs">Manages Role</a>
                    </span>
                </div>
            </div>
            <table class="table">
                <?php $__currentLoopData = $permissions->groupBy('tab'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <thead style="font-size: 14px">
                    <tr style="font-size: 14px">
                        <th colspan="3"><i class="fa fa-arrow-right"></i> <?php echo e($key); ?></th>
                    </tr>
                    <tr style="font-size: 14px">
                        <th style="padding-left: 30px">Name (<i>System Only</i>)</th>
                        <th style="padding-left: 30px">Display Name (<i>User frendly</i>)</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody style="font-size: 14px; color: green">
                    <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="padding-left: 40px"><?php echo e($row->name); ?></td>
                            <td style="padding-left: 40px"><?php echo e($row->display_name); ?></td>
                            <td><?php echo e($row->description); ?></td>
                            <!-- <td>
                                <a href="<?php echo e($row->edit_url); ?>" class="btn btn-warning btn-xs">Edit</a>
                                <a href="<?php echo e($row->show_url); ?>" class="btn btn-primary btn-xs">Show</a>
                            </td> -->
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