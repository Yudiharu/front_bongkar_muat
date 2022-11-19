<?php $__env->startSection('title', 'Endofmonth'); ?>

<?php $__env->startSection('content_header'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">End of <b>Month</b></font>
        </div>

        <div class="box">
            <div class="box-body"> 
                <div class="addform">
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['route'=>'endofmonth.change','method' => 'post']); ?>

                    
                    <div class="form-group">
                        
                        <div class="col-sm-2">
                            <?php echo e(Form::label('tanggal_awal', 'Tutup Periode:')); ?>

                            <?php echo e(Form::select('tanggal_awal',$tanggal,null, ['class'=> 'form-control','id'=>'tanggal1','onchange'=>'load();'])); ?>

                        </div>
                            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success btn-xs','id'=>'submit'])); ?>

                        <div class="col-sm-2">
                            <?php echo e(Form::label('tanggal_akhir', 'Buka Periode:')); ?>


                            <?php echo e(Form::text('tanggal_akhir',null, ['class'=> 'form-control','id'=>'tanggal2','placeholder'=>'Periode Baru'])); ?>

                        </div>
                    </div>   
                           
                                                     
                            

                    
                       
                    
        </div>
    </div>
</div>
</div>
</body>
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
            placeholder: "Periode Baru",
            allowClear: true,
        });

        function load(){
             var open = $("#tanggal1").val();

             var newdate = new Date(open);
             var dd = newdate.getDate();
             var mm = newdate.getMonth() + 1;
             var y = newdate.getFullYear();

             var dd_new = '01';

             if(mm<12){
                 var mm_new = mm+1;

                 var someFormattedDate = y + '-' + mm_new + '-' + dd_new;
                 console.log(someFormattedDate)
                 document.getElementById('tanggal2').value = someFormattedDate;
             }
             else if(mm==12){
                 var mm_new = '01';
                 var y_new = y+1;

                 var someFormattedDate = y_new + '-' + mm_new + '-' + dd_new;
                 console.log(someFormattedDate)
                 document.getElementById('tanggal2').value = someFormattedDate;
             }
             
        }

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