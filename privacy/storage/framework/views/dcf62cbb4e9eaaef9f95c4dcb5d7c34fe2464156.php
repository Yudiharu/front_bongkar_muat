<?php $__env->startSection('adminlte_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/plugins/iCheck/square/blue.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/css/auth.css')); ?>">
    <link rel="icon" type="image/png" href="/gui_inventory_sub_laravel/css/logo_gui.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/gui_inventory_sub_laravel/css/logo_gui.png" sizes="32x32">
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_class', 'login-page'); ?>

<?php $__env->startSection('body'); ?>
<style>
.body_class, .login-page, .content {
    background: url("warehouse.jpg");
    background-size:cover;
    overflow: hidden;
}
</style>
<br><br>
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo e(url(config('adminlte.dashboard_url', 'home'))); ?>"><?php echo config('adminlte.logo', '<b>Admin</b>LTE'); ?></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"><?php echo e(trans('adminlte::adminlte.start_message')); ?></p>
            <form method="POST" action="<?php echo e(route('start.go_to')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <select style="width: 100%" name="company" class="form-control">
                        <?php
                          foreach($Company as $item){
                        ?>
                          <option value="<?php echo $item->kode_company; ?>">
                              <?php echo $item->nama_company; ?>
                          </option>
                        <?php
                          }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat"><?php echo e(trans('adminlte::adminlte.go_to')); ?>

                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>
    <script src="<?php echo e(asset('vendor/adminlte/plugins/iCheck/icheck.min.js')); ?>"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>