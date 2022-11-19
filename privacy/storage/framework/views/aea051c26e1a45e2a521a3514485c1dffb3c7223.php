<?php $__env->startSection('title', 'INVENTORY SYSTEM GUI'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onLoad="load()">

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title" style="font-size: 25px"><marquee><b><?php echo e($nama_company); ?></b></marquee></h3>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <?php if (app('laratrust')->can('read-produk')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-pembelian')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-penerimaan')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-pemakaian')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-adjustment')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-opname')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-penjualan')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-laporanpenjualan')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-transferout')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-laporantransferout')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-transferin')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-laporantransferin')) : ?>
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
        <?php endif; // app('laratrust')->can ?>
    
        <?php if (app('laratrust')->can('read-laporanproduk')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-laporanpembelian')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-laporanpenerimaan')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-laporanpemakaian')) : ?>
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-laporanadjustment')) : ?>
        <div class="col-md-2">
          <a href="admin/laporanadjustment">
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
        <?php endif; // app('laratrust')->can ?>

        <?php if (app('laratrust')->can('read-laporanprodukbulanan')) : ?>
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
        <?php endif; // app('laratrust')->can ?>
        
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

  /* Button used to open the contact form - fixed at the bottom of the page */
  .open-button {
  background-color: #0275d8;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 70px;
  right: 28px;
  width: 54px;
  border-radius: 50%;
  }

  /* The popup chat - hidden by default */
  .chat-popup {
    display: none;
    position: fixed;
    bottom: 25px;
    right: 15px;
    z-index: 9;
  }

  /* Add styles to the form container */
  .form-container {
    max-width: 200px;
    max-height: 350px;
    padding: 10px;
    background-color: white;
  }

  /* Full-width textarea */
  .form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    resize: none;
    min-height: 100px;
  }

  /* When the textarea gets focus, do something */
  .form-container textarea:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Set a style for the submit/send button */
  .form-container .btn {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    margin-bottom:10px;
    opacity: 0.8;
  }

  /* Add a red background color to the cancel button */
  .form-container .cancel {
    background-color: red;
  }

  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }

  .close {
    position: fixed;
    bottom: 362px;
    right: 23px;
    color: red;
    font-size: 15px;
  }


  /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button2 {
    background-color: #CD853F;
    color: black;
    padding: 4px 8px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 36px;
    right: 28px;
    width: 110px;
  }

  /* The popup form - hidden by default */
  .form-popup2 {
    display: none;
    position: fixed;
    bottom: 26px;
    right: 15px;
    z-index: 9;
  }

  .close2 {
    position: fixed;
    bottom: 44px;
    right: 28px;
    color: red;
    font-size: 15px;
  }

  /* Add styles to the form container */
  .form-container2 {
    max-width: 300px;
    padding: 10px;
    background-color: white;
  }

  /* Full-width input fields */
  .form-container2 input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }

  /* When the inputs get focus, do something */
  .form-container2 input[type=text]:focus, .form-container input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Set a style for the submit/login button */
  .form-container2 .btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }

  /* Add a red background color to the cancel button */
  .form-container2 .cancel {
    background-color: red;
  }

  /* Add some hover effects to buttons */
  .form-container2 .btn:hover, .open-button:hover {
    opacity: 1;
  }

  .news-button {
    background-color: #F63F3F;
    bottom: 40px;
  }

  .chat-button {
    background-color: #FDA900;
    bottom: 70px;
  }

  #mySidenav button {
    position: fixed;
    right: -30px;
    transition: 0.3s;
    padding: 4px 8px;
    width: 70px;
    text-decoration: none;
    font-size: 12px;
    color: white;
    border-radius: 5px 0 0 5px ;
    opacity: 0.8;
    cursor: pointer;
    text-align: left;
  }

  #mySidenav button:hover {
    right: 0;
  }
</style>

<div id="mySidenav" class="sidenav">
  <button type="button" class="btn btn-warning btn-xs chat-button" id="chat" data-toggle="modal" data-target="" onclick="openForm()"><span class="badge bg-blue"><?php echo e($leng_chat); ?></span> CHAT <i class="fa fa-weixin"></i></button>

  <button type="button" class="btn btn-danger btn-xs news-button" id="news" data-toggle="modal" data-target="" onclick="openForm2()">NEWS <i class="fa fa-info-circle"></i></button>
</div>


<div class="form-popup2" id="myForm2">
  <form action="/action_page.php" class="form-container2">

    <p><b>- User</b> dapat menggunakan <b>tombol chat</b> untuk <b>fitur "Chatting"</b></p>
    <p><b>- Log-Out</b> dapat dilakukan dengan <b>click</b> ( <b>login_user <span class="caret"></span></b> ) disudut kanan atas layar</b></p>
    <p><b>- User</b> dapat mengakses sistem inventory melalui <b>handphone</b></p>
    <p><b>- User</b> dapat menggunakan <b>tombol warna kuning</b> (bertuliskan nama PT) di bagian bawah untuk <b>auto scroll ke atas</b></p>
    <div class="close2">
      <span class="pull-right">
        <i class="fa fa-close" onclick="closeForm2()"> Close</i></button>
      </span>
    </div>
  </form>
</div>


<div class="chat-popup" id="myForm">
  <form class="form-container table-responsive" role="form" method="POST" action="<?php echo e(route('home.savechat')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="close">
      <span class="pull-right">
        <i class="fa fa-close" onclick="closeForm()"></i></button>
      </span>
    </div>

    <div class="table-responsive">
        <?php foreach ($chat as $key => $value): ?>
          <tr >
              <td><b><?php echo $value->created_by ?> : </b><br>
              <?php echo $value->chat ?> <i style="color:#c91a1a">( to : <?php echo $value->name ?> )</i></td>
          </tr>
        <?php endforeach ?>
    </div>
    
    <br>
    <textarea placeholder="Ketik pesan.." id="msg" required name="pesan"></textarea>

    <b>Send To :</b> <select id="tujuan" name="tujuan">
        <?php
          foreach($user_login2 as $item){
        ?>
          <option value="<?php echo $item->name; ?>">
              <?php echo $item->name; ?>
          </option>
        <?php
          }
        ?>
    </select>
    <br><br>
    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function openForm2() {
  document.getElementById("myForm2").style.display = "block";
}

function closeForm2() {
  document.getElementById("myForm2").style.display = "none";
}
</script>

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