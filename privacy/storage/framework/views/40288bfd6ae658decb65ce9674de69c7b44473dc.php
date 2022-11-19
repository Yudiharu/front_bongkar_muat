<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Bagi Usaha Sopir - <?php echo e($request); ?></title>
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

    <h1>Hasil Bagi Usaha Sopir</h1>
    <p>Periode: <?php echo ($hasilbagi->spb_dari) ?> s.d <?php echo ($hasilbagi->spb_sampai) ?></p>
    <br>
</div>
    <div class="left">
        <table width="60%" style="  font-size: 9pt" border="0">
            <tr >
                <td style="width: 100px"><b>Sopir :</b> <?php echo e($sopir->nama_sopir); ?></td>
                <td><b>NIS :</b> <?php echo e($sopir->nis); ?></td>
            </tr>
        </table>
    </div>
    <div class="right">
        <table width="40%" style="font-size: 9pt" border="0">
            <tr>
                <td style="width: 240px"><b>No. Transaksi :</b> <?php echo e($request); ?></td>
                <td><b>Tanggal :</b> <?php echo e($hasilbagi->tanggal_hasilbagi); ?></td>
            </tr>
        </table>
    </div>
    <br><br>

    <table class="grid1" style="margin-bottom: 25px;width: 100%; font-size: 9px">
        <thead>
        <tr style="background-color: #e6f2ff">
            <th>No</th>
            <th>Tgl. SPB</th>
            <th>Tgl. Kembali SPB</th>
            <th>No. SPB</th>
            <th>No. SPB Manual</th>
            <th>Container</th>
            <th>No. Polisi</th>
            <th>Muatan</th>
            <th>Tujuan</th>
            <th>Tarif</th>
            <th>Uang Jalan</th>
            <th>Sisa</th>
            <th>BBM</th>
            <th>UJ-BBM</th>
        </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $hasilbagidetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $row->tanggal_spb?></td>
                <td><?php echo $row->tanggal_kembali?></td>
                <td><?php echo $row->no_spb?></td>
                <td><?php echo $row->no_spb_manual?></td>
                <td><?php echo $row->kode_container?></td>
                <td><?php echo $row->mobil->nopol?></td>
                <td><?php echo $row->muatan?></td>
                <td><?php echo $row->tujuan?></td>
                <td><?php echo number_format($row->tarif,'0',',','.')?></td>
                <td><?php echo number_format($row->uang_jalan,'0',',','.')?></td>
                <td><?php echo number_format($row->bbm,'0',',','.')?></td>
                <td><?php echo number_format($row->sisa,'0',',','.')?></td>
                <td><?php echo number_format($row->sisa_ujbbm,'0',',','.')?></td>
            </tr>

            <?php
                $grandtotaltarif = $hasilbagidetail->sum('tarif');
                $grandtotaluang_jalan = $hasilbagidetail->sum('uang_jalan');
                $grandtotalbbm = $hasilbagidetail->sum('bbm');
                $grandtotalsisa = $hasilbagidetail->sum('sisa');
                $grandtotalsisaujbbm = $hasilbagidetail->sum('sisa_ujbbm');
            ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

        <tfoot>
        <tr style="background-color: #F5D2D2">
            <td colspan="9" style="font-weight: bold; text-align: center">Total</td>
            <td style="text-align: left;">&nbsp;<?php echo number_format($grandtotaltarif,'0',',','.');?></td>
            <td style="text-align: left;">&nbsp;<?php echo number_format($grandtotaluang_jalan,'0',',','.');?></td>
            <td style="text-align: left;">&nbsp;<?php echo number_format($grandtotalbbm,'0',',','.');?></td>
            <td style="text-align: left;">&nbsp;<?php echo number_format($grandtotalsisa,'0',',','.');?></td>
            <td style="text-align: left;">&nbsp;<?php echo number_format($grandtotalsisaujbbm,'0',',','.');?></td>
        </tr>
        </tfoot>

    </table>

    <div class="footer" style="font-size: 10pt;">
        <table width="60%" style="  font-size: 9pt" border="0">
            <tr>
                <td style="width: 120px">Hasil Bersih (<?php echo e($hasilbagi->gaji); ?>%)</td>
                <td style="width: 10px">:</td>
                <td><?php echo e(number_format($hasilbagi->nilai_gaji,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td >Tabungan (<?php echo e($hasilbagi->tabungan); ?>%)</td>
                <td>:</td>
                <td><?php echo e(number_format($hasilbagi->nilai_tabungan,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td >Honor Kenek</td>
                <td>:</td>
                <td><?php echo e(number_format($hasilbagi->honor_kenek,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td >Total</td>
                <td>:</td>
                <td><?php echo e(number_format($hasilbagi->gt_hbu,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td >GT UJ-BBM</td>
                <td>:</td>
                <td><?php echo e(number_format($grandtotalsisaujbbm,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td >Objek PPH21</td>
                <td>:</td>
                <td><?php echo e(number_format($grandtotalsisaujbbm + $hasilbagi->gt_hbu,'0',',','.')); ?></td>
            </tr>
        </table>

        <br><br>
        <div class="tgl">
            &nbsp;Palembang, <?php echo date_format($date,'d F Y');?>
        </div>

        <table width="100%" style="font-size:10pt; text-align:center;padding:0px; margin:0px; border-collapse:collapse" border="0">
            <tr style="padding:0px; margin:0px">
                <td width="30%">Dibuat,</td>
                <td width="30%">Diperiksa,</td>
                <td width="30%">Disetujui,</td>
                <td width="40%">Diketahui,</td>
                <td width="40%">Diterima,</td>
            </tr>
            <tr style="padding:0px; margin:0px"><td colspan="3"><br><br><br></td></tr>
            <tr style="padding:0px; margin:0px">
                <td><?php echo $ttd; ?></td>
                <td><?php echo $diperiksa->mengetahui; ?></td>
                <td><?php echo $disetujui->mengetahui; ?></td>
                <td><?php echo $diketahui->mengetahui; ?></td>
                <td></td>
            </tr>
            <tr style="padding:0px; margin:0px">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</body>
</html>