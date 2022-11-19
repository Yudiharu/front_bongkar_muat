<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran Pemilik Mobil - <?php echo e($request); ?></title>
    <style>
        body {
            font-family: sans-serif;
            /*font-family: courier;*/
            /*font-weight: bold;*/
        }
        .header {
            text-align: center;
        },
        .header, h1 {
            font-size: 11pt;
            margin-bottom: 0px;
        }

        .header, p {
            font-size: 10pt;
            margin-top: 0px;
        }
        .table_content {
            color: #232323;
            border-collapse: collapse;
            font-size: 8pt;
            margin-top: 15px;
        }

        .table_content, .border {
            border: 1px solid black;
            padding: 4px;
        }
        .table_content, thead, th {
            text-transform: uppercase;
            padding: 7px;
            text-align: center;

        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        ul li {
            display:inline;
            list-style-type:none;
        }

        table.grid1 {
          font-family: sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        table.grid1 td, table.grid1 th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 5px;
        }

        table.grid1 tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="left">
        <img src="<?php echo e(asset('css/logo_gui.png')); ?>" alt="" height="25px" width="25px" align="left">
        <p id="color" style="font-size: 8pt;" align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($nama2) ?></b><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lokasi: <?php echo ($nama) ?></p>
    </div>
    <div class="right">
        <p id="color" style="font-size: 8pt;" align="left"><b>Waktu Cetak : </b><?php echo ($dt) ?></p>
    </div>
    <br><br>

    <h1>Pembayaran Pemilik Mobil</h1>
    <p>Periode: <?php echo ($pembayaran->tanggalkembali_dari) ?> s.d <?php echo ($pembayaran->tanggalkembali_sampai) ?></p>
    <br>
</div>
    <div class="left">
        <table width="60%" style="  font-size: 9pt" border="0">
            <tr >
                <td style="width: 100px"><b>Pemilik Mobil :</b> <?php echo e($pemilik->nama_pemilik); ?></td>
            </tr>
        </table>
    </div>
    <div class="right">
        <table width="40%" style="font-size: 9pt" border="0">
            <tr>
                <td style="width: 240px"><b>No. Transaksi :</b> <?php echo e($request); ?></td>
                <td><b>Tanggal :</b> <?php echo e($pembayaran->tanggal_pembayaran); ?></td>
            </tr>
        </table>
    </div>
    <br><br>

    <table class="grid1" style="margin-bottom: 25px;width: 100%; font-size: 9px">
        <thead>
        <tr style="background-color: #e6f2ff">
            <th>No</th>
            <th>Mobil</th>
            <th>Sopir</th>
            <th>Tgl. SPB</th>
            <th>Tgl. Kembali SPB</th>
            <th>No. SPB</th>
            <th>Gudang</th>
            <th>Tujuan</th>
            <th>Container</th>
            <th>Tarif</th>
            <th>Uang Jalan</th>
            <th>Sisa</th>
            <th>No. JO</th>
        </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $pembayarandetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $row->mobil->nopol?></td>
                <td><?php echo $row->kode_sopir?></td>
                <td><?php echo $row->tgl_spb?></td>
                <td><?php echo $row->tgl_kembali?></td>
                <td><?php echo $row->no_spb?></td>
                <?php if ($row->kode_gudang != '-') { ?>
                    <td><?php echo $row->gudangdetail->nama_gudang?></td>
                <?php }else { ?>
                    <td><?php echo $row->kode_gudang?></td>
                <?php } ?>
                <td><?php echo $row->tujuan?></td>
                <td><?php echo $row->kode_container?></td>
                <td><?php echo number_format($row->tarif,'0',',','.')?></td>
                <td><?php echo number_format($row->uang_jalan,'0',',','.')?></td>
                <td><?php echo number_format($row->sisa,'0',',','.')?></td>
                <td><?php echo $row->no_joborder?></td>
            </tr>

            <?php
                $grandtotaltarif = $pembayarandetail->sum('tarif');
                $grandtotaluang_jalan = $pembayarandetail->sum('uang_jalan');
                $grandtotalsisa = $pembayarandetail->sum('sisa');
            ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

        <tfoot>
        <tr style="background-color: #F5D2D2">
            <td colspan="9" style="font-weight: bold; text-align: center">Total</td>
            <td style="text-align: left;">&nbsp;<?php echo number_format($grandtotaltarif,'0',',','.');?></td>
            <td style="text-align: left;">&nbsp;<?php echo number_format($grandtotaluang_jalan,'0',',','.');?></td>
            <td style="text-align: left;">&nbsp;<?php echo number_format($grandtotalsisa,'0',',','.');?></td>
            <td></td>
        </tr>
        </tfoot>

    </table>
</body>
</html>