<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <br>
    <title>VOUCHER KAS KELUAR</title>
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
        }

        .header {
            margin-left: 0px;
            margin-right: 0px;
            /*font-size: 10pt;*/
            padding-top: 30px;
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
            padding-top: 75px
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
            text-align:left;
            /*padding-left:0.2cm;*/
            /*padding-right:0.2cm;*/
            /*border:1px solid #fff;*/
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
    <table style="padding-left:1mm; font-size:10pt">
        <tr>
            <td><?=$nama_company?></td>
        </tr>
    </table>
</div>

<div class="right">
    <table style="padding-right:1mm; font-size:10pt">
        <tr>
            <td>Tanggal Cetak</td>
            <td width="15%">:</td>
            <td><?=$date_now?></td>
        </tr>
    </table>
</div>

<div class="title">
    <h1>VOUCHER KAS KELUAR</h1>
</div>

<div class="header">
    <div class="left">
        <table width="50%" style="  font-size: 10pt" border="0">
            <tr >
                <td style="width: 115px">No. Voucher</td>
                <td style="width: 10px">:</td>
                <td><?php echo e($cashbankout->no_cashbank_out); ?></td>
            </tr>
            <tr>
                <td >Payment Ke</td>
                <td>:</td>
                <td><?php echo e($cashbankout->payment_to); ?></td>
            </tr>
            <tr>
                <td >No. Reff</td>
                <td>:</td>
                <td><?php echo e($cashbankout->no_reff); ?></td>
            </tr>
        </table>
    </div>
    <div class="right">
        <table width="50%" style="padding-left:8em; font-size: 10pt" border="0">
            <tr>
                <td style="width: 130px">Tanggal Voucher</td>
                <td style="width: 10px">:</td>
                <td><?php echo e($tgl); ?></td>
            </tr>
            <tr>
                <td>Cash Bank</td>
                <td>:</td>
                <td><?php echo e($cashbank->nama_cashbank); ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="content">
    <hr>
    <div class="left">
        <table width="50%" style="  font-size: 10pt" border="0">
            <tr >
                <td style="width: 33px">COA</td>
                <td style="width: 115px">Keterangan</td>
            </tr>
        </table>
    </div>
    <div class="right">
        <table style="padding-right:0mm; font-size:10pt">
            <tr>
                <td>Total</td>
            </tr>
        </table>
    </div>
    <br>
    <hr>
</div>

    <div class="left">
        <table style="padding-left:0mm; font-size:10pt">
            <?php $subtotal = 0 ; $limit_row = 0?>
            <?php foreach ($cashbankoutdetail as $key => $value): ?>
                <tr >
                    <td ><?php echo $value->coa->account ?></td>
                    <td ><?php echo $value->keterangan ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="right">
        <table style="padding-right:0mm; font-size:10pt">
            <?php $subtotal = 0 ; $limit_row = 0?>
            <?php foreach ($cashbankoutdetail as $key => $value): ?>
                <tr>
                    <td><?php echo number_format($value->sub_total,'0','.',',') ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

<?php
$grand_total = $cashbankout->grand_total;
?>

<br><br><br><br><br>
            <div class="left">
                <table style="padding-left:1mm; font-size:10pt; width: 58%">
                    <tr>
                        <td>Terbilang :</td>
                    </tr>
                    <tr>
                        <td><strong><?php echo Terbilang::make($grand_total, ' rupiah'); ?></strong></td>
                    </tr>
                </table>
            </div>
            <div class="right">
                <table style="padding-right:1mm; font-size:10pt">
                    <tr>
                        <td>Grand Total</td>
                        <td width="15%">:</td>
                        <td>Rp. <?php echo number_format($grand_total,'0','.',',') ;?></td>
                    </tr>
                </table>
            </div>

<br><br><br>
<div class="footer" style="font-size: 10pt;padding-top: 1.5cm">
    <div class="tgl">

        Palembang, <?php echo date_format($date,'d F Y');?>
    </div>

    <table width="100%" style="font-size:10pt; text-align:center;padding:0px; margin:0px; border-collapse:collapse" border="0">
        <tr style="padding:0px; margin:0px">
            <td width="30%">Dibuat oleh,</td>
            <td width="30%">Diperiksa oleh,</td>
            <td width="30%">Disetujui,</td>
            <td width="40%">Diketahui,</td>
        </tr>
        <tr style="padding:0px; margin:0px"><td colspan="3"><br><br><br></td></tr>
        <tr style="padding:0px; margin:0px">
            <td><b><u><?php echo $ttd; ?></u></b></td>
            <td><?php echo $limit4->mengetahui; ?></td>
            <td><?php echo $limit->mengetahui; ?></td>
            <td><b><u><?php echo $limiter; ?></u></b></td>
        </tr>
        <tr style="padding:0px; margin:0px">
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $jabatan; ?></td>
        </tr>
    </table>
</div>

</body>
</html>