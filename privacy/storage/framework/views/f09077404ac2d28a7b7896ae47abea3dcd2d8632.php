<?php $__env->startSection('title', 'Users Data'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="/gui_inventory_laravel/css/logo_gui.png" sizes="16x16" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="startTime()">
    <div class="box box-solid">
        <!-- <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>User</b></font>
        </div> -->
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    <a href="<?php echo e($create_url); ?>" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> New user</a>
                    <span class="pull-right">
                        <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-warning btn-xs">Manages Role</a>
                        <a href="<?php echo e(route('permissions.index')); ?>" class="btn btn-primary btn-xs" onclick="refreshTable()">Manages Permission</a>
                    </span>
                </div>
            </div>
            <?php echo $dataTable->table(['class' => 'table table-bordered table-hover', 'style' => "font-size: 14px;"], true); ?>


        </div>
    </div>
</body>
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
            swal({
            title: "Hapus?",
            text: "Pastikan dahulu user yang akan di hapus",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
                })

                $.ajax({
                    type: 'DELETE',
                    url: url,
                    
                    success: function (results) {
                    console.log(results);
                        if (results.success === true) {
                            swal("Berhasil!", results.message, "success");
                        } else {
                            swal("User gagal di hapus.");
                        }
                          
                        // $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>