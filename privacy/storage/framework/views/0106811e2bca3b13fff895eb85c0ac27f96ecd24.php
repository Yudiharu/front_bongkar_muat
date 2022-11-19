<?php $__env->startSection('title', 'Laporan Transaksi  Per Periode'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Laporan Transaksi</h1>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
    

<div class="col-md-12">
    <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> Laporan Transaksi Per Periode</h3>
                <!-- /.box-tools -->
            </div>
           
    </div>
</div>
<div class="col-md-4"> 
    
</div>
<div class="col-md-12">
    <div class="box box-success">
        <div class="box-body">
            <?php echo Form::open(['route' => ['transaksis.cetakLaporan'],'method' => 'post','id'=>'form']); ?>

                    <div class="row">
                     <div class="col-md-2 col-md-offset-4">
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'Start Date')); ?>

                            <?php echo e(Form::text('start_date', null, ['class'=> 'form-control datepicker'])); ?><br>
                        </div>
                    </div>
                     </div>
                    <div class="row">
                     <div class="col-md-2 col-md-offset-4">
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'End Date')); ?>

                            <?php echo e(Form::text('end_date', null, ['class'=> 'form-control datepicker'])); ?><br>
                        </div>
                     </div>
                
        </div>
            <div class="box-footer">
                <div class="pull-right">
                        <?php echo e(Form::submit('Cetak Laporan', ['class' => 'btn btn-success'])); ?>

                </div>
            </div>

            <?php echo Form::close(); ?>

    </div>
</div>    
        

    
</body>
    <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

 
  
  <script>
  $(function() {
    $( ".datepicker" ).datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoClose: true,
        icon:{
          time:"fa fa-clock-o",
          date:"fa fa-calender",
          up:"fa fa-arrow-up",
          down:"fa fa-arrow-down"
          }
        });
  });
  </script>

 <script>
        
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>