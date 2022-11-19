<?php $__env->startSection('title', 'Reopen'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">Re-<b>Open</b></font>
        </div>

        <div class="box">
            <div class="box-body"> 
                <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['route'=>'reopen.change','method' => 'post']); ?>

                    
                    <div class="form-group">
                        <div class="col-sm-2">
                            <?php echo e(Form::selectMonth('month', null, ['class'=> 'form-control select2','id'=>'namabulan','required'=>'required','placeholder'=>'','style'=>'width: 100%'])); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <?php echo e(Form::selectYear('year', 2000, 2040, null, ['class'=> 'form-control select3','id'=>'namatahun','required'=>'required','placeholder'=>'','style'=>'width: 100%'])); ?>

                        </div>
                    </div>

                    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success btn-sm','id'=>'submit'])); ?>

                       
                    
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.select2').select2({
            placeholder: "Pilih Bulan",
            allowClear: true,
        });

        $('.select3').select2({
            placeholder: "Pilih Tahun",
            allowClear: true,
        });

        // function tanggal_re(){
        //     var tanggal = $('#tanggal').val();
        //     console.log(tanggal);
        //     // var submit = document.getElementById("submit");
        //     $.ajax({
        //         url:'<?php echo route('reopen.change'); ?>',
        //         type:'POST',
        //         data : {
        //                 'id': tanggal,
        //             },
        //         success: function(result) {
        //                 console.log(result);
        //                 if (result.success === true) {
        //                             swal(
        //                             'Re-Opened!',
        //                             text: result.message,
        //                             'success'
        //                             )
        //                             refreshTable();
        //                         }
        //                         else{
        //                           swal({
        //                               title: 'Error',
        //                               'Gagal Re-Open.',
        //                               type: 'error',
        //                           })
        //                         }
        //             },
        //     });
        // }

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>