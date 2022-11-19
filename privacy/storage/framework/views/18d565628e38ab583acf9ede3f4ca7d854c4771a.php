<!DOCTYPE html>
<html lang="en">
<?php
use App\Models\PemakaianAlatDetail;
use App\Models\Alat;
use App\Models\Signature;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <br>
    <title>PREMI OPERATOR ~ <?php echo e($request); ?></title>
    <style>
        @page  {
            border: solid 1px #0b93d5;
            width: 24.13cm;
            height: 27.94cm;
            font-family: sans-serif;
            font-weight: normal;
            margin-right: 1cm;
            margin-left:  1cm;
        }

        .title {
            text-align: center;
            margin-top: 1.2cm;
        }
        .title h1 {
            text-align: center;
            font-size: 14pt;
        }

        .header {
            margin-left: 0px;
            margin-right: 0px;
            /*font-size: 10pt;*/
            padding-top: 5px;
            /*border: solid 1px #0b93d5;*/
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .clearfix {
            overflow: auto;
        }

        .content {
            padding-top: 20px;
        }
        .catatan {
            font-size: 10pt;
        }

        /* Table desain*/
        table.grid {
            width: 100%;
        }
        table.grid th{
            background: #FFF;
            text-align:center;
            /*padding-left:0.2cm;*/
            /*padding-right:0.2cm;*/
            /*border:1px solid #fff;*/
            padding-top:1px;
            padding-bottom:1px;
        }

        table.grid tr td{
            /*padding-top:0.5mm;*/
            /*padding-bottom:0.5mm;*/
            padding-left:2mm;
            padding-right:2mm;
            /*border:1px solid #fff;*/
        }
        .list-item {
            height: 2.1in;
            margin: 0px;
        }

    </style>

</head>
<body>

<div class="left">
    <p id="color" style="font-size: 10pt;" align="left"><b><?php echo ($nama2) ?></b></p>
</div>
<div class="right">
    <p id="color" style="font-size: 10pt;" align="left"><b>Waktu Cetak : </b><?php echo ($dt) ?></p>
</div>
<div class="title">
    <h1>Report Premi Operator</h1>
    <p style="font-size: 10pt;">Periode : <?php echo e($insoperator->tgl_pakai_dari); ?> s/d <?php echo e($insoperator->tgl_pakai_sampai); ?></p>
</div>
<div class="header">
    <div class="left">
        <table width="50%" style="  font-size: 10pt" border="0">
            <tr>
                <td style="width: 120px">Nama Operator</td>
                <td style="width: 10px">:</td>
                <td><?php echo e($insoperator->operator->nama_operator); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo e($insoperator->operator->nik); ?></td>
            </tr>
        </table>
    </div>
    <div class="right">
        <table width="30%" style="font-size: 10pt" border="0">
            <tr >
                <td style="width: 120px">No. Premi</td>
                <td style="width: 10px">:</td>
                <td><?php echo e($insoperator->no_insentif); ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="content">
<hr>
    <section class="list-item">
        <table class="grid" style="font-size: 9pt; width: 1000px; font-weight: normal;" border="0" >
            <thead>
            <tr >
                <th style="text-align: left; width: 70px;">Tanggal</th>
                <th style="text-align: left; width: 70px;">TimeSheet</th>
                <th style="text-align: left; width: 200px;">Pekerjaan</th>
                <th style="text-align: center; width: 45px;">Jam Dr</th>
                <th style="text-align: center; width: 45px;">Jam Sp</th>
                <th style="text-align: center; width: 45px;">Istirahat</th>
                <th style="text-align: center; width: 45px;">StandBy</th>
                <th style="text-align: center; width: 60px;">Total</th>
                <th style="text-align: center; width: 45px;">HM Dr</th>
                <th style="text-align: center; width: 45px;">HM Sp</th>
                <th style="text-align: center; width: 45px;">Tot.HM</th>
                <th style="text-align: center; width: 45px;">L.Kota</th>
                <th style="text-align: center; width: 45px;">H.Libur</th>
                <th style="text-align: right; width: 120px;">Type Alat</th>
            </tr>
            </thead>
        </table>
<hr>
<?php
    $tanggal1 = null;
    $tanggal2 = null;
    $lenghari = 0;
?>
        <table class="grid" style="font-size: 9pt; width: 1000px;" border="0" >
            <thead>
            <?php $subtotal = 0 ; $limit_row = 0?>
            <?php foreach ($insoperatordetail as $key => $row): ?>
                <tr >
                <?php $tanggal2 = $row->tgl_pakai; ?>
                <?php if ($tanggal1 == null) { ?>
                    <?php $lenghari += 1; ?>
                    <?php $tanggal1 = $row->tgl_pakai; ?>
                    <th style="text-align: left; width: 70px; font-weight: normal;"><?php echo $tanggal1; ?></th>
                <?php }else if ($tanggal1 == $tanggal2) { ?>
                    <th style="text-align: left; width: 70px; font-weight: normal;"></th>
                <?php }else { ?>
                    <?php $lenghari += 1; ?>
                    <?php $tanggal1 = $row->tgl_pakai; ?>
                    <th style="text-align: left; width: 70px; font-weight: normal;"><?php echo $tanggal2; ?></th>
                <?php } ?>
                    <th style="text-align: left; width: 70px; font-weight: normal;"><?php echo $row->no_timesheet; ?></th>
                <?php $alatdetail = PemakaianAlatDetail::where('no_timesheet', $row->no_timesheet)->first(); ?>
                    <th style="text-align: left; width: 200px; word-spacing: -2px; font-weight: normal;"><?php echo $alatdetail->pekerjaan; ?></th>

                <?php if ($row->jam_dr == null) { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;"><?php echo "00:00"; ?></th>
                <?php }else { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;"><?php echo substr($row->jam_dr, 0,5); ?></th>
                <?php } ?>

                <?php if ($row->jam_sp == null) { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;"><?php echo "00:00"; ?></th>
                <?php }else { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;"><?php echo substr($row->jam_sp, 0,5); ?></th>
                <?php } ?>

                <?php if ($row->istirahat == null) { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;"><?php echo "00:00"; ?></th>
                <?php }else { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;"><?php echo substr($row->istirahat, 0,5); ?></th>
                <?php } ?>

                <?php if ($row->stand_by == null) { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;"><?php echo "00:00"; ?></th>
                <?php }else { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;"><?php echo substr($row->stand_by, 0,5); ?></th>
                <?php } ?>

                <?php if ($row->total_jam == 0 || $row->total_jam == null) { ?>
                    <th style="text-align: center; width: 60px; font-weight: normal;"><?php echo "00:00" ?></th>
                <?php }else { ?>
                    <th style="text-align: center; width: 60px; font-weight: normal;"><?php echo $row->total_jam; ?></th>
                <?php } ?>
                    
                    <th style="text-align: right; width: 45px; font-weight: normal;"><?php echo number_format($row->hm_dr,'2'); ?></th>
                    <th style="text-align: right; width: 45px; font-weight: normal;"><?php echo number_format($row->hm_sp,'2'); ?></th>
                    <th style="text-align: right; width: 45px; font-weight: normal;"><?php echo number_format($row->total_hm,'2'); ?></th>
                <?php if ($row->luar_kota == '1') { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;">Y</th>
                <?php }else { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;">T</th>
                <?php } ?>
                <?php if ($row->hari_libur == '1') { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;">Y</th>
                <?php }else { ?>
                    <th style="text-align: center; width: 45px; font-weight: normal;">T</th>
                <?php } ?>
                <?php $alat = Alat::find($alatdetail->kode_alat); ?>
                    <th style="text-align: right; width: 120px; word-spacing: -2px; font-weight: normal;"><?php echo $alat->type; ?></th>
                </tr>
            <?php endforeach ?>
            </thead>
        </table>
<hr>
    <div class="header">
        <div class="left">
            <table width="50%" style="  font-size: 9pt" border="0">
                <tr>
                    <td style="width: 70px;">Total Premi (Jam)</td>
                    <td style="width: 5px;"></td>
                    <td style="width: 10px; text-align: right;"><?php echo e(number_format($insoperator->total_premi,'2')); ?></td>
                    <td style="width: 70px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="width: 70px;">Total Premi Hari Libur</td>
                    <td style="width: 5px;"></td>
                    <td style="width: 10px; text-align: right;"><?php echo e(number_format($insoperator->total_premi_libur,'2')); ?></td>
                    <td style="width: 70px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="width: 70px;">GT Insentif</td>
                    <td style="width: 5px;"></td>
                    <td style="width: 10px; text-align: right;"><?php echo e(number_format($insoperator->gt_insentif,'2')); ?></td>
                    <td style="width: 70px;">&nbsp;</td>
                </tr>
            </table>
        </div>
        <div class="right">
            <table width="30%" style="font-size: 9pt" border="0">
                <tr >
                    <td style="width: 160px">Total Jam Kerja</td>
                    <td style="width: 10px">:</td>
                    <td><?php echo e(substr($insoperator->total_jam,0,2)); ?> Jam <?php echo e(substr($insoperator->total_jam,3,2)); ?> Menit</td>
                </tr>
                <tr >
                    <td style="width: 160px">Total Hour Meter</td>
                    <td style="width: 10px">:</td>
                    <td><?php echo e(number_format($insoperator->total_hm,'2')); ?></td>
                </tr>
                <tr >
                    <td style="width: 160px">Total Hari Kerja</td>
                    <td style="width: 10px">:</td>
                    <td><?php echo e($lenghari); ?> Hari</td>
                </tr>
                <tr >
                    <td style="width: 160px">Total Kerja Hari Libur</td>
                    <td style="width: 10px">:</td>
                    <td><?php echo e($insoperator->total_libur); ?> Hari</td>
                </tr>
            </table>
        </div>
    </div>
    <br><br><br><br><br>
    <table width="100%" style="font-size:10pt; border-collapse:collapse" border="0">
        <tr>
            <td>Palembang, <?php echo date_format($date,'d F Y');?></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dibuat,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diperiksa,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diperiksa,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disetujui,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diterima,</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
<?php
    $ttd1 = Signature::find('006');
    $ttd2 = Signature::find('007');
    $ttd3 = Signature::find('008');
    $ttd4 = Signature::find('009');
    $ttd5 = Signature::find('001');
?>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ttd1->mengetahui; ?>/<?php echo $ttd2->mengetahui; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ttd4->mengetahui; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ttd5->mengetahui ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ttd3->mengetahui ?></td>
        </tr>
    </table>
    </section>
</div>

</body>
</html>