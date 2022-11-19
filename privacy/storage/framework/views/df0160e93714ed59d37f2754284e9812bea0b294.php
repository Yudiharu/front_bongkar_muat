<?php $__env->startSection('title', 'Users Create'); ?>

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
        <?php echo Form::open(['route' => ['roles.store']]); ?>



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

                <div class="box">
                    <table class="table table-bordered" style="font-size: 14px">
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

            <div class="box-footer">
                <div class="row pull-right">
                    <div class="col-md-12 ">
                        <a href="<?php echo e($info['list_url']); ?>" class="btn btn-light btn-sm pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-floppy-o"></i> Simpan</button>
                    </div>
                </div>
            </div>
        <?php echo Form::close(); ?>

    </div>

    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i>PT. SELARAS UNGGUL BERSAMA</i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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
                            swal({
                                title: "<b>Proses Sedang Berlangsung</b>",
                                type: "warning",
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                        swal("Berhasil!", response.data.message, "success");
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