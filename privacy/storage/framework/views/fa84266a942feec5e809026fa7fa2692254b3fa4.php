<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <br>
<?php 
use App\Models\Operator; 
use App\Models\MasterLokasi;
use App\Models\Alat;
use App\Models\Mobil;
use App\Models\Sopir;
?>
    <title>FORM SPK ~ <?php echo e($request); ?></title>
    <style>
        @page  {
            border: solid 1px #0b93d5;
            width: 24.13cm;
            height: 27.94cm;
            font-family: 'Courier';
            font-weight: bold;
            margin-right: 2cm;
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
            padding-top: 155px;
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
            padding-top:3mm;
            padding-bottom:3mm;
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
    <img src="<?php echo e(asset('css/logo_gui.png')); ?>" alt="" height="30px" width="30px" align="left">
    <p id="color" style="font-size: 10pt;" align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PT. GAJAH UNGGUL INTERNASIONAL</b></p>
</div>
<div class="right">
    <p id="color" style="font-size: 8pt;" align="left"><b>Waktu Cetak : </b><?php echo ($dt) ?></p>
</div>
<div class="title">
    <center>
    SURAT PERINTAH KERJA
    </center>
</div>
<?php $opera = Operator::find($spk->operator); ?>
<?php $lokasi = MasterLokasi::find($spk->lokasi_kerja); ?>
<?php $alat = Alat::find($spk->kode_alat); ?>
<?php $mobil = Mobil::find($spk->kode_mobil); ?>
<?php $sopir = Sopir::find($spk->kode_sopir); ?>
<div class="header">
    <div class="left">
        <table width="60%" style="border-spacing: 0 15px; font-size: 10pt" border="0">
            <tr >
                <td style="width: 240px">No. SPK</td>
                <td style="width: 10px">:</td>
                <td style="width: 240px"><?php echo e($request); ?></td>
            </tr>
            <tr>
                <td>Tgl SPK</td>
                <td>:</td>
                <td><?php echo e($tgl); ?></td>
            </tr>
            <tr>
                <td>No. Reff</td>
                <td>:</td>
                <td><?php echo e($spk->no_reff); ?></td>
            </tr>
        <?php if ($spk->tipe_kendaraan == 'Alat Berat') { ?>
            <tr>
                <td>Nama Operator</td>
                <td>:</td>
                <td><?php echo e($opera->nama_operator); ?></td>
            </tr>
            <tr>
                <td>Lokasi Kerja</td>
                <td>:</td>
                <td><?php echo e($lokasi->nama_lokasi); ?></td>
            </tr>
            <tr>
                <td>Kode Tagging</td>
                <td>:</td>
                <td><?php echo e($alat->no_asset_alat); ?></td>
            </tr>
        <?php }else { ?>
            <tr>
                <td>Nama Sopir</td>
                <td>:</td>
                <td><?php echo e($sopir->nama_sopir); ?></td>
            </tr>
            <tr>
                <td>Lokasi Kerja</td>
                <td>:</td>
                <td><?php echo e($lokasi->nama_lokasi); ?></td>
            </tr>
            <tr>
                <td>No Asset Mobil</td>
                <td>:</td>
                <td><?php echo e($mobil->no_asset_mobil); ?></td>
            </tr>
        <?php } ?>
            <tr>
                <td>Periode Kerja</td>
                <td>:</td>
                <td><?php echo e($spk->tgl_mulai); ?>&nbsp;s/d&nbsp;<?php echo e($spk->tgl_selesai); ?></td>
            </tr>
            <tr>
                <td>No. Job Order</td>
                <td>:</td>
                <td><?php echo e($spk->no_joborder); ?></td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
                <td>Palembang, <?php echo date_format($date,'d F Y');?></td>
            </tr>
            <tr style="padding:0px; margin:0px">
                <td>Diajukan Oleh,</td>
                <td colspan="3"></td>
                <td style="width: 120px">Disetujui Oleh,</td>
            </tr>
            <tr>
                <td><br><br><br></td>
                <td colspan="3"><br><br><br></td>
                <td><br><br><br></td>
            </tr>
            <tr>
            <?php if ($spk->tipe_kendaraan == 'Alat Berat') { ?>
                <td>&nbsp;<?php echo $opera->nama_operator; ?></td>
                <td colspan="3"></td>
                <td>Spv Operator</td>
            <?php }else { ?>
                <td>&nbsp;<?php echo $sopir->nama_sopir; ?></td>
                <td colspan="3"></td>
                <td>Spv Sopir</td>
            <?php } ?>
            </tr>
        </table>
    </div>
</div>
    
</body>
</html>