<?php $__env->startSection('title', 'Users Create'); ?>


<?php $__env->startSection('content'); ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($info['title']); ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo Form::open(['route' => ['roles.store']]); ?>



            <div class="box-body">

                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="form-group">
                    <?php echo e(Form::label('name', 'Display Name: *')); ?>

                    <?php echo e(Form::text('display_name', null, ['class'=> 'form-control'])); ?>

                </div>  
                
                <div class="form-group">
                    <?php echo e(Form::label('name', 'name: *')); ?>

                    <?php echo e(Form::text('name', null, ['class'=> 'form-control'])); ?>

                </div>
                
                <div class="form-group">
                    <?php echo e(Form::label('description', 'Description:')); ?>

                    <?php echo e(Form::text('description', null, ['class'=> 'form-control'])); ?>

                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Permission</h3>
                    </div>
                    <table class="table table-bordered">
                        <?php $__currentLoopData = $permissions->groupBy('tab'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <thead>
                                <tr>
                                    <th colspan="3"><?php echo e($key); ?></th>
                                </tr>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th>Permission</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(Form::checkbox('permission[]', $row->id, null,['class' => 'selected'] )); ?></td>
                                    <td><?php echo e($row->display_name); ?></td>
                                    <td><?php echo e($row->description); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o"></i> Simpan</button>
                <a href="<?php echo e($info['list_url']); ?>" class="btn btn-light pull-right"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>


        var app = new Vue({
            el: '.box',
            data: {
                message: 'Hello Vue!'
            },

            mounted() {
                this.checkedAll()
            },

            methods: {
                update: function (event) {
                    var url = ''
                    var data = $('#form_roles_edit').serialize();

                    axios.put(url, data).then(function (response) {
                        console.log(response.data)
                        if (response.data.success){
                            $.notify(response.data.message, "success");
                        }
                    })
                },

                checkedAll: function (event) {
                    $('#checkAll').click(function () {
                        $('.selected').prop('checked', this.checked);
                    });
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>