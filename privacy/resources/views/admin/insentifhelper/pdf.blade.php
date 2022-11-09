<!DOCTYPE html>
<html lang="en">
<?php
use App\Models\PemakaianAlat;
use App\Models\PemakaianAlatDetail;
use App\Models\Alat;
use App\Models\Signature;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <br>
    <title>Report Premi Helper ~ {{ $request }}</title>
    <style>
        @page {
            border: solid 1px #0b93d5;
            width: 24.13cm;
            height: 27.94cm;
            font-family: 'sans-serif';
            margin-right: 0.5cm;
            margin-left: 0.5cm;
            margin-top: 90px;
            
        }

        .title {
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
        
        body {
            padding-top: 75px;
        }
        
        .fixed-header, .fixed-footer{
            width: 100%;
            position: fixed;
            padding-top:-50px;
            text-align: center;
        }
        .fixed-header{
            top: 0;
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
            padding-bottom:2px;
        }

        table.grid tr td{
            /*padding-top:0.5mm;*/
            /*padding-bottom:0.5mm;*/
            padding-left:2mm;
            padding-right:2mm;
            /*border:1px solid #fff;*/
        }

    </style>
</head>

<body>
    

<div class="fixed-header">
    <div class="left">
        <p id="color" style="font-size: 8pt;" align="left"><b><?php echo ($nama2) ?></b></p>
    </div>
    <div class="right">
        <p id="color" style="font-size: 8pt;" align="left"><b>Waktu Cetak : </b><?php echo ($dt) ?></p>
    </div>
    <div class="title">
        <h1>REPORT PREMI HELPER</h1>
        <p style="font-size: 10pt;text-align: center">Periode :{{ $header->tgl_pakai_dari }} s/d {{ $header->tgl_pakai_sampai }}</p>
    </div>
        <div class="left">
            <table width="50%" style="  font-size: 10pt; padding-left:15px;" border="0">
                <tr>
                    <td style="width: 100px">Nama Helper</td>
                    <td style="width: 10px">:</td>
                    <td>{{ $header->helper->nama_helper }}&nbsp;&nbsp;&nbsp;</td>
                    <td>NIK :{{ $header->helper->nik }}&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>
        </div>
        <div class="right">
            <table width="10%" style="  font-size: 10pt; margin-right:35px;" border="0">
                <tr>
                    <td style="width: 120px">No. Premi</td>
                    <td style="width: 10px">:</td>
                    <td>{{ $header->no_insentif }}&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>
        </div>
</div>
        
        <table class="grid" width="100%" border="0" style="padding-top:27px; font-size: 9pt">
            <thead>
                <tr><td colspan="7"><hr></td></tr>
                <tr>
                    <th style="width: 65px; text-align: left; padding-left:15px;">Tanggal</th>
                    <th style="width: 120px; text-align: left; padding-left:27px;">Kode Tagging</th>
                    <th style="width: 100px; text-align: left; padding-left:10px;">No. Time Sheet</th>
                    <th style="width: 320px; text-align: left; padding-left:34px;">Pekerjaan</th>
                    <th style="width: 65px; text-align: right;">L. Kota</th>
                    <th style="width: 65px; text-align: right;">H. Libur</th>
                </tr>
                <tr><td colspan="7";><hr></td></tr>
            </thead>
            
<?php

$tanggal1 = null;
$tanggal2 = null; 

?>
            <tbody>
            <?php foreach ($detailexport as $key => $row): ?>
                <tr>
                    <?php 
                    $detailalat = PemakaianAlatDetail::where('no_timesheet',$row->no_timesheet)->first();
                    $detailpemakaian = PemakaianAlatDetail::where('no_timesheet',$row->no_timesheet)->first();
                    $alat = Alat::where('kode_alat',$detailpemakaian->kode_alat)->first();

                    if($row->luar_kota == '0')
                    {
                        $luarkota = 'T';
                    }
                    else
                    {
                        $luarkota = 'Y';
                    }
                    if($row->hari_libur == '0')
                    {
                        $harilibur = 'T';
                    }
                    else
                    {
                        $harilibur = 'Y';
                    }

                    ?>

                    <?php $tanggal2 = $row->tgl_pakai; ?>
                    <?php if ($tanggal1 == null) { ?>
                        <?php $tanggal1 = $row->tgl_pakai; ?>
                        <th style="text-align: left; width: 11%; font-weight: normal; word-spacing: -7px;padding-left:15px;"><?php echo $tanggal1; ?></th>
                    <?php }else if ($tanggal1 == $tanggal2) { ?>
                        <th style="text-align: left; width: 11%; font-weight: normal; word-spacing: -7px;padding-left:15px;"></th>
                    <?php }else { ?>
                        <?php $tanggal1 = $row->tgl_pakai; ?>
                        <th style="text-align: left; width: 11%; font-weight: normal; word-spacing: -7px;padding-left:15px;"><?php echo $tanggal2; ?></th>
                    <?php } ?>
                    <th style="text-align: left; width:17%; font-weight: normal; word-spacing: -2px; padding-left: 28px"><?php echo $alat->no_asset_alat; ?></th>
                    <th style="text-align: left; width:17%; font-weight: normal; padding-left:26px"><?php echo $row->no_timesheet; ?></th>
                    <th style="text-align: left; width:35%; font-weight: normal; word-spacing: -1px; padding-left:35px"><?php echo $detailalat->pekerjaan; ?></th>
                    <th style="text-align: center; width:10%; font-weight: normal; padding-left:5px"><?php echo $luarkota; ?></th>
                    <th style="text-align: center; width:10%; font-weight: normal; padding-left:20px"><?php echo $harilibur; ?></th>
                </tr>
            <?php endforeach ?>
            <tr><td colspan="14"><hr></td></tr>
            <tr><td colspan="14">
                <div class="left">
                    <table width="50%" style="  font-size: 9pt" border="0">
                        <tr>
                            <td style="width: 50px">Total Hari Kerja Dlm Kota</td>
                            <td style="width: 10px"></td>
                            <td style="text-align:right; padding-right:50px;">{{ $header->total_dalamkota }} Hari&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width: 250px">Total Hari Kerja Luar Kota</td>
                            <td style="width: 10px"></td>
                            <td style="text-align:right; padding-right:50px;">{{ $header->total_luarkota }} Hari&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width: 250px">Total Kerja Hari Libur</td>
                            <td style="width: 10px"></td>
                            <td style="text-align:right; padding-right:50px;">{{ $header->total_libur }} Hari&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div class="right">
                    <table width="50%" style="font-size: 9pt; margin-right: -5px;" border="0">
                        <tr>
                            <td style="width: 270px;">Total Premi Dlm Kota &nbsp;(Harian)</td>
                            <td style="width: 5px; padding-right: 50px;"></td>
                            <td style="text-align: right; padding-left: 30px;">{{ number_format($header->total_premi_dalamkota,'2') }}&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width: 270px">Total Premi Luar Kota (Harian)</td>
                            <td style="width: 10px"></td>
                            <td style="text-align: right">{{ number_format($header->total_premi_luarkota,'2') }}&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width: 150px"> Total Premi Hari Libur &nbsp;</td>
                            <td style="width: 40px"></td>
                            <td style="text-align: right">{{ number_format($header->total_premi_libur,'2') }}&nbsp;&nbsp;</td>
                        </tr>
                    </table>
                </div>

<br><br><br>

<?php
    $ttd1 = Signature::find('006'); //dhanu
    $ttd2 = Signature::find('009'); //marchendro
    $ttd3 = Signature::find('010'); //vita
    $ttd4 = Signature::find('001'); //susanto wijaya
?>
    <div class="footer" style="font-size: 10pt;padding-top: 2cm; padding-left: 12px">
        <div class="tgl" style="padding-top:20px;">
            Palembang, <?php echo date_format($date,'d F Y');?>
        </div>
        <br>
        <table width="100%" style="font-size:10pt; text-align:center; padding-bottom:-20px; padding-left:15px; margin:0px; border-collapse:collapse" border="0">
            <tr style="padding:0px; margin:0px">
                <td width="20%">Dibuat oleh,</td>
                <td width="20%">Diperiksa oleh,</td>
                <td width="20%">Diketahui Oleh,</td>
                <td width="20%">Disetujui Oleh,</td>
                <td width="40%">Diterima,</td>
            </tr>
            <tr style="padding:0px; margin:0px"><td colspan="4"><br><br><br></td></tr>
            <tr style="padding:0px; margin:0px">
                <td><?php echo $user; ?></td>
                <td><?php echo $ttd3->mengetahui; ?></td>
                <td><?php echo $ttd1->mengetahui; ?></td>
                <td><?php echo $ttd2->mengetahui; ?></td>
                <td>{{ $header->helper->nama_helper}}</td>
            </tr>
            <tr style="padding:0px; margin:0px">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
                </div>
            </td></tr>
        </tbody>
    </table>
</body>
</html>