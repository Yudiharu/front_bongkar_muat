<?php $__env->startSection('title', 'Pemakaian'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Laporan Pemakaian</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><b>Charts</b></div>
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600">OK</canvas>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script>
        var url = "<?php echo e(url('admin/pemakaian/chart')); ?>";
        var Tanggal = new Array();
        var Tipe = new Array();
        var Total = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                Tanggal.push(data.tanggal_pemakaian);
                Tipe.push(data.Mobil);
                Total.push(data.total_pemakaian);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:Tanggal,
                      datasets: [{
                          label: 'Pemakaian Mobil',
                          data: Total,
                          backgroundColor:'rgb(176,224,230)',
                          hoverBorderColor:'rgb(255,0,0)',
                          borderWidth: 1
                      }]
                  },
                  options: {
                   
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Pemakaian Mobil Bulan 6'
                    },
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
    </script>
<?php $__env->stopPush(); ?>





<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>