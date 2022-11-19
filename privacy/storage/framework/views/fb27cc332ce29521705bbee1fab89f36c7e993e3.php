<?php $__env->startSection('title', 'Reopen'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onload="panggil()">

     <!-- <div class="box box-solid">
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
                            <?php echo e(Form::selectMonth('month', null, ['class'=> 'form-control select2','id'=>'namabulan','placeholder'=>'','style'=>'width: 100%'])); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <?php echo e(Form::selectYear('year', 2000, 2040, null, ['class'=> 'form-control select3','id'=>'namatahun','placeholder'=>'','style'=>'width: 100%'])); ?>

                        </div>
                    </div>

                    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success btn-sm','id'=>'submit'])); ?>

               
                     <?php echo Form::close(); ?>


        </div>
    </div>
</div>
</div>
<div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">Re-Open <b>Close</b></font>            
        </div>

        <div class="box">
            <div class="box-body"> 
                <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['route'=>'reopen.change2','method' => 'post']); ?>                 
                    <div class="form-group">
                        <div class="col-sm-2">
                            <?php echo e(Form::selectMonth('month2', null, ['class'=> 'form-control select2','id'=>'namabulan2','placeholder'=>'','style'=>'width: 100%'])); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <?php echo e(Form::selectYear('year2', 2000, 2040, null, ['class'=> 'form-control select3','id'=>'namatahun2','placeholder'=>'','style'=>'width: 100%'])); ?>

                        </div>
                    </div>

                    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success btn-sm','id'=>'submit'])); ?>

                    <?php echo Form::close(); ?>


            </div>
        </div>
    </div>
</div>
 -->
<!-- box permission tes -->
<div class="box-body">
        
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['route'=>'reopen.change','method' => 'post']); ?>


            <div class="row">
                <div class="col-md-6">
                   <div class="box">
                       <div class="box-header">
                           <h3 class="box-title">Re-<b>Open</b></h3>
                       </div>
                       <div class="box-body">
                           <div class="form-group">
                               <label class="col-sm-8">
                                   <?php echo e(Form::selectMonth('month', null, ['class'=> 'form-control select2','id'=>'namabulan','placeholder'=>'','style'=>'width: 100%'])); ?>

                               </label>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-8">
                                   <?php echo e(Form::selectYear('year', 2000, 2040, null, ['class'=> 'form-control select3','id'=>'namatahun','placeholder'=>'','style'=>'width: 100%'])); ?>

                               </label>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-4">
                                   <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success btn-sm','id'=>'submit','style'=>'width: 100%'])); ?>

               
                                    <?php echo Form::close(); ?>

                               </label>
                           </div>
                       </div>
                   </div>
                </div>
        
                <?php echo Form::open(['route'=>'reopen.change2','method' => 'post']); ?>

                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Re-Open <b>Close</b></h3>
                        </div>
                        <div class="box-body">
                                <div class="form-group">
                               <label class="col-sm-8">
                                   <?php echo e(Form::selectMonth('month2', $info_bulan, ['class'=> 'form-control select2','id'=>'namabulan2','placeholder'=>'','style'=>'width: 100%'])); ?>

                               </label>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-8">
                                   <?php echo e(Form::selectYear('year2', 2000, 2040, $info_tahun, ['class'=> 'form-control select3','id'=>'namatahun2','placeholder'=>'','style'=>'width: 100%'])); ?>

                               </label>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-4">
                                   <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success btn-sm','id'=>'submit','style'=>'width: 100%'])); ?>

               
                                    <?php echo Form::close(); ?>

                               </label>
                           </div>
                        </div>
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

        function panggil(){
          startTime();
        }

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