<?php $__env->startSection('title', $info['title'] ); ?>


<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="/gui_inventory_laravel/css/logo_gui.png" sizes="16x16" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="startTime()">
    <div class="box box-solid">
        <?php echo Form::open(['route' => ['permissions.store']]); ?>

        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($info['list_url']); ?>" class="btn btn-light btn-xs pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="row">
                <div class="col-md-4">
                   <div class="box">
                       <div class="box-header">
                           <h3 class="box-title">Permission Parameter</h3>
                       </div>
                       <div class="box-body">
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'read',null)); ?> Read
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'create',null)); ?> Create
                               </label>
                           </div>
                          <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'unpost',null)); ?> Unpost
                               </label>
                           </div>
                           <!-- <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'delete',null)); ?> Delete
                               </label>
                           </div> -->
                           <!-- <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'create',null)); ?> Create
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'update',null)); ?> Update
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'Post',null)); ?> Post
                               </label>
                           </div> -->
                       </div>
                   </div>
                </div>

                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Permission Entry</h3>
                        </div>
                        <div class="box-body">

                                <div class="form-group">
                                    <?php echo e(Form::label('name', 'Name:')); ?>

                                    <?php echo e(Form::text('name', null, ['class'=> 'form-control', 'placeholder'=> 'Please enter permission name'])); ?>

                                    <!-- <p class="help-block">Example: editor, operator</p> -->
                                </div>

                            <!-- <div class="callout callout-info">
                                <h4>Info!</h4>
                                <p>Jika anda memilih parameter <code>create</code> dengan permission name <code>operator</code>.
                                    ini akan menghasilkan permission name <code>create-operator</code> ketika disimpan. Begitu juga dengan perameter yang lain.</p>
                            </div> -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
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