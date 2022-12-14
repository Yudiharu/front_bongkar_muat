<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <br>
    <title>JOB ORDER ~ <?php echo e($request); ?></title>
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
            padding-top: 155px
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
<?php
    if ($joborder->type_jo == '1') {
        $type = 'Bongkar Muat Curah';
    }else if ($joborder->type_jo == '2') {
        $type = 'Bongkar Muat Non Curah';
    }else if ($joborder->type_jo == '3') {
        $type = 'Rental Alat';
    }else if ($joborder->type_jo == '4') {
        $type = 'Trucking';
    }else if ($joborder->type_jo == '5') {
        $type = 'Lain-lain';
    }

    if ($joborder->type_cargo == '1') {
        $cargo = 'Batu Bara';
    }else if ($joborder->type_cargo == '2') {
        $cargo = 'Batu Splite';
    }else if ($joborder->type_cargo == '3') {
        $cargo = 'Kayu';
    }else if ($joborder->type_cargo == '4') {
        $cargo = 'Bongkar Muat';
    }else if ($joborder->type_cargo == '5') {
        $cargo = 'Crane dan Alat';
    }else if ($joborder->type_cargo == '6') {
        $cargo = 'Lain-lain';
    }else if ($joborder->type_cargo == '7') {
        $cargo = 'Trucking';
    }
?>

<div class="left">
    <p id="color" style="font-size: 8pt;" align="left"><b><?php echo ($nama2) ?></b></p>
</div>
<div class="right">
    <p id="color" style="font-size: 8pt;" align="left"><b>Waktu Cetak : </b><?php echo ($dt) ?></p>
</div>
<div class="title">
    <h1>JOB ORDER</h1>
</div>
<div class="header">
    <div class="left">
        <table width="50%" style="  font-size: 10pt" border="0">
            <tr >
                <td style="width: 180px">No. Job Order</td>
                <td style="width: 10px">:</td>
                <td><?php echo e($request); ?>&nbsp;&nbsp;&nbsp;<?php echo e($type); ?></td>
            </tr>
            <tr>
                <td>Tgl Job Order</td>
                <td>:</td>
                <td><?php echo e($tgl); ?></td>
            </tr>
            <tr>
                <td>Customer</td>
                <td>:</td>
                <td><?php echo e($joborder->customer1->nama_customer); ?></td>
            </tr>
            <tr>
                <td>Consignee</td>
                <td>:</td>
                <td><?php echo e($joborder->customer2->nama_customer); ?></td>
            </tr>
            <?php if ($joborder->kode_kapal != null) { ?>
                <tr>
                    <td>Kapal</td>
                    <td>:</td>
                    <td><?php echo e($joborder->kapal->nama_kapal); ?></td>
                </tr>
            <?php }else { ?>
                <tr>
                    <td>Kapal</td>
                    <td>:</td>
                    <td>-</td>
                </tr>
            <?php } ?>
            <?php if ($joborder->tongkang != null) { ?>
                <tr>
                    <td>Tongkang</td>
                    <td>:</td>
                    <td><?php echo e($joborder->tongkangs->nama_kapal); ?></td>
                </tr>
            <?php }else { ?>
                <tr>
                    <td>Tongkang</td>
                    <td>:</td>
                    <td>-</td>
                </tr>
            <?php } ?>
            <tr>
                <td>Periode</td>
                <td>:</td>
                <td><?php echo e($joborder->periode); ?></td>
            </tr>
        </table>
    </div>
    <div class="right">
        <table width="30%" style="font-size: 10pt" border="0">
            <tr >
                <td style="width: 120px">No. Reff</td>
                <td style="width: 10px">:</td>
                <td><?php echo e($joborder->no_reff); ?></td>
            </tr>
            <tr>
                <td>Tgl Reff</td>
                <td>:</td>
                <td><?php echo e($joborder->tgl_reff); ?></td>
            </tr>
            <tr>
                <td>Order By</td>
                <td>:</td>
                <td><?php echo e($joborder->order_by); ?></td>
            </tr>
            <tr>
                <td>Type Cargo</td>
                <td>:</td>
                <td style="font-size: 8pt"><?php echo e($cargo); ?></td>
            </tr>
            <tr>
                <td>Type Kegiatan</td>
                <td>:</td>
                <td><?php echo e($joborder->type_kegiatan); ?></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td><?php echo e($joborder->lokasi); ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="content">
<hr>
    <section class="list-item">
        <table class="grid" style="font-size: 10pt; width: 21cm;" border="0" >
            <thead>
            <tr >
                <th width="40%" style="text-align: left;">Keterangan</th>
                <th width="10%">Qty</th>
                <th width="17.5%">Satuan</th>
                <th width="17.5%">Unit Rate</th>
                <th width="17.5%">Mob Demob</th>
                <th width="17.5%" style="text-align: right;">Total Harga</th>
            </tr>
            </thead>
        </table>
<hr>
        <table class="grid" style="font-size: 9pt; width: 21cm;" border="0" >
            <tbody>
            <?php $subtotal = 0 ; $limit_row = 0?>
            <?php foreach ($jobrequest as $key => $row): ?>
                <tr >
                    <td width="40%" style="text-align: left;"><?php echo $row->deskripsi; ?></td>
                    <td width="10%" style="text-align: center;"><?php echo number_format($row->qty,'3'); ?></td>
                    <td width="17.5%" style="text-align: center;"><?php echo $row->satuan; ?></td>
                    <td width="17.5%"><?php echo number_format($row->harga,'2'); ?></td>
                    <td width="17.5%" style="text-align: center;"><?php echo number_format($row->mob_demob,'2'); ?></td>
                    <td width="17.5%" style="text-align: right;"><?php echo number_format($row->total_harga,'2'); ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
            <br>
        </table>
<hr>
    <table width="100%" style="font-size:10pt; border-collapse:collapse" border="0">
        <tr>
            <td>Palembang, <?php echo date_format($date,'d F Y');?></td>
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
            <td>&nbsp;<?php echo $user; ?></td>
        </tr>
    </table>
    </section>
</div>

</body>
</html>