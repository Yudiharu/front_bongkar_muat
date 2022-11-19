<?php $__env->startSection('title', $info['title']); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="/gui_inventory_laravel/css/logo_gui.png" sizes="16x16" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box">
        <div class="box-header with-border">
            <a href="<?php echo e($info['list_url']); ?>" class="btn btn-light btn-xs pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>
        <?php echo Form::model($role, ['route' => ['roles.update', $role->id],'method' => 'put', '@submit.prevent' => 'update', 'id' => 'form_roles_edit']); ?>



        <div class="box-body">

            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="form-group">
                <?php echo e(Form::label('name', 'Display Name: *')); ?>

                <?php echo e(Form::text('display_name', null, ['class'=> 'form-control', 'required', 'autocomplete'=>'off'])); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('name', 'name: *')); ?>

                <?php echo e(Form::text('name', null, ['class'=> 'form-control', 'required', 'autocomplete'=>'off'])); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('description', 'Description:')); ?>

                <?php echo e(Form::text('description', null, ['class'=> 'form-control', 'required', 'autocomplete'=>'off'])); ?>

            </div>

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Permission</h3>
                    <label class="pull-right">
                        <input type="checkbox" id="checkAll" @click="checkedAll()" ></input>
                        Pilih Semua
                    </label>
                </div>
                <table class="table" style="font-size: 14px">
                    <?php $__currentLoopData = $permissions->groupBy('tab'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <thead>
                        <tr>
                            <th colspan="3"><?php echo e($key); ?></th>
                        </tr>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Permission</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e(Form::checkbox('permission[]', $row->id, array_has($get_permission, $row->name),['class' => 'selected'] )); ?></td>
                                <td><?php echo e($row->display_name); ?></td>
                                <td><?php echo e($row->description); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>

             <div class="box-footer">
                <div class="row pull-right">
                    <div class="col-md-12 ">
                        <a href="<?php echo e($info['list_url']); ?>" class="btn btn-light btn-sm pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-success btn-sm" v-if="!loading"></i> Update</button>
                    </div>
                </div>
            </div>
        <?php echo Form::close(); ?>

    </div>
    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i><?php echo e($nama_company); ?></i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

        <style type="text/css">
            #back2Top {
                width: 400px;
                line-height: 27px;
                overflow: hidden;
                z-index: 999;
                display: none;
                cursor: pointer;
                position: fixed;
                bottom: 0;
                text-align: left;
                font-size: 15px;
                color: #000000;
                text-decoration: none;
            }
            #back2Top:hover {
                color: #fff;
            }
        </style>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 1) {
                $('#back2Top').show();
            } else {
                $('#back2Top').show();
            }
        });
        
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        });

        function load(){
            startTime();
            $('.back2Top').show();
        }

        var app = new Vue({
            el: '.box',
            data: {
                loading: false,
            },

            mounted() {
                // this.checkedAll()
            },

            methods: {
                update: function (event) {
                    var url = '<?php echo e($role->update_url); ?>'
                    var data = $('#form_roles_edit').serialize();
                    // this.loading = true;

                    axios.put(url, data).then(function (response) {
                        console.log(response.data)
                        if (response.data.success){
                            swal({
                                title: "<b>Proses Sedang Berlangsung</b>",
                                type: "warning",
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                            swal("Berhasil!", response.data.message, "success");
                        }
                    }.bind(this))
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