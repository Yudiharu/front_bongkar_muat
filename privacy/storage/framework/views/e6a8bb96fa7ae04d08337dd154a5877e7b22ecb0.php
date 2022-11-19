<?php $__env->startSection('title', 'INVENTORY SYSTEM SUB'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onLoad="load()">

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title" style="font-size: 25px"><marquee><b>PT. SELARAS UNGGUL BERSAMA</b></marquee></h3>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'hse'){ ?>
          <div class="col-md-2">
            <div class="box box-default box-solid">
              <div class="box-header">
                <i class="fa fa-briefcase fa-lg"></i>
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        <?php }else { ?>
          <div class="col-md-2">
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
        </div>
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'general' && $level != 'hse' && $level != 'ap'){ ?>
          <div class="col-md-2">
            <div class="box box-danger box-solid">
              <div class="box-header">
                <i class="fa fa-cart-arrow-down fa-lg"></i>
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        <?php }else { ?>
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
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'hse'){ ?>
          <div class="col-md-2">
            <div class="box box-warning box-solid">
              <div class="box-header">
                <i class="fa fa-sign-in fa-lg"></i>
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        <?php }else { ?>
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
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'hse'){ ?>
          <div class="col-md-2">
            <div class="box box-success box-solid">
              <div class="box-header">
                <i class="fa fa-sign-out fa-lg"></i>
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        <?php }else { ?>
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
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting'){ ?>
          <div class="col-md-2">
            <div class="box box-info box-solid">
              <div class="box-header">
                <i class="fa fa-check-square-o fa-lg"></i>
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        <?php }else { ?>
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
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting'){ ?>
          <div class="col-md-2">
            <div class="box box-primary box-solid">
              <div class="box-header">
                <i class="fa fa-check-square fa-lg"></i>
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        <?php }else { ?>
          <div class="col-md-2">
          <a href="admin/opname">
          <div class="box box-primary box-solid">
            <div class="box-header">
              <i class="fa fa-check-square fa-lg"></i>
              <span class="pull-right"> 
                <h3 class="box-title"><font style="font-size: 15px">Opname</font></h3>
              </span>
            </div>
          </div>
          </a>
        </div>
        <?php } ?> 

        <?php if ($level != 'superadministrator'){ ?>
          <div class="col-md-2">
            <div class="box box-primary box-solid">
              <div class="box-header">
                <i class="fa fa-money fa-lg"></i>
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        <?php }else { ?>
          <div class="col-md-2">
            <a href="admin/penjualan">
            <div class="box box-primary box-solid">
              <div class="box-header">
                <i class="fa fa-money fa-lg"></i>
                <span class="pull-right"> 
                  <h3 class="box-title"><font style="font-size: 15px">Penjualan</font></h3>
                </span>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>

        <?php if ($level != 'superadministrator'){ ?>
        <div class="col-md-2">
          <div class="box box-primary box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
        <?php }else { ?>
        <div class="col-md-2">
          <a href="admin/laporanpenjualan">
          <div class="box box-primary box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <span class="pull-right"> 
                <h4 class="box-title"><font style="font-size: 15px">Lap. Penjualan</font></h4>
              </span>
            </div>
          </div>
          </a>
        </div>
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting'){ ?>
        <div class="col-md-2">
            <div class="box box-info box-solid">
              <div class="box-header">
                <i class="fa fa-minus fa-lg"></i>
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        <?php }else { ?>
        <div class="col-md-2">
          <a href="admin/transfer">
          <div class="box box-info box-solid">
            <div class="box-header">
              <i class="fa fa-minus fa-lg"></i>
              <span class="pull-right"> 
                <h3 class="box-title"><font style="font-size: 15px">Trasnfer Out</font></h3>
              </span>
            </div>
          </div>
          </a>
        </div>
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting'){ ?>
        <div class="col-md-2">
          <div class="box box-info box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
        <?php }else { ?>
        <div class="col-md-2">
          <a href="admin/laporantransferout">
          <div class="box box-info box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <span class="pull-right"> 
                <h4 class="box-title"><font style="font-size: 15px">Lap. Trans. Out</font></h4>
              </span>
            </div>
          </div>
          </a>
        </div>
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting'){ ?>
        <div class="col-md-2">
            <div class="box box-info box-danger">
              <div class="box-header">
                <i class="fa fa-plus fa-lg"></i>
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
          </div>
        <?php }else { ?>
        <div class="col-md-2">
          <a href="admin/transferin">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <i class="fa fa-plus fa-lg"></i>
              <span class="pull-right"> 
                <h3 class="box-title"><font style="font-size: 15px">Trasnfer In</font></h3>
              </span>
            </div>
          </div>
          </a>
        </div>
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting'){ ?>
        <div class="col-md-2">
          <div class="box box-info box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
        <?php }else { ?>
        <div class="col-md-2">
          <a href="admin/laporantransferin">
          <div class="box box-danger box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <span class="pull-right"> 
                <h4 class="box-title"><font style="font-size: 15px">Lap. Trans. In</font></h4>
              </span>
            </div>
          </div>
          </a>
        </div>
        <?php } ?>

      </div>

      <div class="row">

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'hse'){ ?>
        <div class="col-md-2">
          <div class="box box-default box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
        <?php }else { ?>
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
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'hse'){ ?>
        <div class="col-md-2">
          <div class="box box-danger box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
        <?php }else { ?>
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
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'hse'){ ?>
        <div class="col-md-2">
          <div class="box box-warning box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
        <?php }else { ?>
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
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'hse'){ ?>
        <div class="col-md-2">
          <div class="box box-success box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
        <?php }else { ?>
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
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'hse'){ ?>
        <div class="col-md-2">
          <div class="box box-info box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
        <?php }else { ?>
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
        <?php } ?>

        <?php if ($level != 'superadministrator' && $level != 'user' && $level != 'accounting' && $level != 'hse'){ ?>
        <div class="col-md-2">
          <div class="box box-primary box-border">
            <div class="box-header">
              <i class="fa fa-bar-chart fa-lg"></i>
              <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>
        <?php }else { ?>
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
        <?php } ?>
        
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
              </div>
          </div>
        </div>
      </div> 	

      <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-map-marker" style="color: #fff"></i> <i>PT. SELARAS UNGGUL BERSAMA</i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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
      <script type="text/javascript">
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
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.back2Top').show();
        }
      </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>