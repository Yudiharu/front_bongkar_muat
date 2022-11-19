<?php $__env->startSection('title', 'INVENTORY SYSTEM GUT'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onLoad="startTime()">
      <div class="row">

        <div class="col-md-2">
          <?php if (app('laratrust')->can('read-produk')) : ?>
          <div class="box box-default box-solid">
          <a href="admin/produk">
            <div class="box-header">
              <i class="fa fa-briefcase fa-lg"></i>
              <span class="pull-right">
                <h3 class="box-title"><font style="font-size: 15px">Produk</font></h3>
              </span>
            </div>
          </a>
          </div>
          <?php endif; // app('laratrust')->can ?>
        </div>

        <div class="col-md-2">
          <a href="admin/pembelian">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <i class="fa fa-cart-arrow-down fa-lg"></i>
              <span class="pull-right"> 
                <h3 class="box-title"><font style="font-size: 15px">Pembelian</font></h3>
              </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="admin/penerimaan">
          <div class="box box-warning box-solid">
            <div class="box-header">
              <i class="fa fa-sign-in  fa-lg"></i>
              <span class="pull-right"> 
                <h3 class="box-title"><font style="font-size: 15px">Penerimaan</font></h3>
              </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="admin/pemakaian">
          <div class="box box-success box-solid">
            <div class="box-header">
              <i class="fa fa-sign-out fa-lg"></i>
              <span class="pull-right"> 
                <h3 class="box-title"><font style="font-size: 15px">Pemakaian</font></h3>
              </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="admin/adjustment">
          <div class="box box-info box-solid">
            <div class="box-header">
              <i class="fa fa-check-square-o fa-lg"></i>
              <span class="pull-right"> 
                <h3 class="box-title"><font style="font-size: 15px">Adjustment</font></h3>
              </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="admin/opname">
          <div class="box box-primary box-solid">
            <div class="box-header">
              <i class="fa fa-cart-plus fa-lg"></i>
              <span class="pull-right"> 
                <h3 class="box-title"><font style="font-size: 15px">Opname</font></h3>
              </span>
            </div>
          </div>
          </a>
        </div>

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="admin/pembelian">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
      
            <div class="info-box-content">
              <span class="info-box-number">Pembelian<small></span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div> -->
      </div>

      <div class="row">

        <div class="col-md-2">
          <a href="admin/laporanproduk">
          <div class="box box-default box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <span class="pull-right"> 
                <h3 class="box-title"><font style="font-size: 15px">Lap. Produk</font></h3>
              </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="admin/laporanpembelian">
          <div class="box box-danger box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <span class="pull-right"> 
                <h4 class="box-title"><font style="font-size: 15px">Lap. Pembelian</font></h4>
              </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="admin/laporanpenerimaan">
          <div class="box box-warning box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <span class="pull-right"> 
                <h4 class="box-title"><font style="font-size: 15px">Lap. Penerimaan</font></h4>
              </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="admin/laporanpemakaian">
          <div class="box box-success box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <span class="pull-right"> 
                <h4 class="box-title"><font style="font-size: 15px">Lap. Pemakaian</font></h4>
              </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="admin/adjustment">
          <div class="box box-info box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <span class="pull-right"> 
                <h4 class="box-title"><font style="font-size: 15px">Lap. Adjustment</font></h4>
              </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-2">
          <a href="admin/laporanprodukbulanan">
          <div class="box box-primary box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <span class="pull-right"> 
                <h4 class="box-title"><font style="font-size: 15px">Lap. Monthly</font></h4>
              </span>
            </div>
          </div>
          </a>
        </div>
      </div>



      <div class="row">
        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><font style="font-size: 15px">Users Login </font><span class="badge bg-blue"><?php echo e($leng4); ?></span></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
              <div class="box-body">
                <?php $__currentLoopData = $user_login; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->name); ?><br></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><font style="font-size: 15px">Pembelian Open </font><span class="badge bg-red"><?php echo e($leng); ?></span></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
              <div class="box-body">
                <?php $__currentLoopData = $pembelian_open; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->no_pembelian); ?><br></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Superadministrator -->
              </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><font style="font-size: 15px">Penerimaan Open </font><span class="badge bg-orange"><?php echo e($leng2); ?></span></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
              <div class="box-body">
                <?php $__currentLoopData = $penerimaan_open; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->no_penerimaan); ?><br></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Superadministrator -->
              </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><font style="font-size: 15px">Pemakaian Open </font><span class="badge bg-green"><?php echo e($leng3); ?></span></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
              <div class="box-body">
                <?php $__currentLoopData = $pemakaian_open; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->no_pemakaian); ?><br></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Superadministrator -->
              </div>
          </div>
        </div>
      </div>

      <br><br><br><br><br><br><br><br><br>
        <div class="col-md-12">
              <span class="pull-right"> 
                <img src="https://media.giphy.com/media/iNWQQN1RSRP1u/giphy.gif" class="css-class" alt="alt text">
              </span>
        </div>
      

 	<!-- <div class="row">
 		<div class="col-md-6">
 			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Panel title</h3>
			  </div>
			  <div class="panel-body">
			    <h1>INVENTORY SISTEM GUT</h1>
          
        
        
			  </div>
			</div>
 		</div>
 	</div> -->


</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>