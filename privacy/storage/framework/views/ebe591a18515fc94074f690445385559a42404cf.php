<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <br>
    <title>JOB REQUEST ~ <?php echo e($nojr); ?></title>
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
            padding-top: 175px
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

<div class="title">
    <h1>JOB REQUEST</h1>
</div>
<div class="header">
    <div class="left">
        <table width="50%" style="  font-size: 10pt" border="0">
            <tr >
                <td style="width: 180px">No. Job Order</td>
                <td style="width: 10px">:</td>
                <td><?php echo e($request); ?></td>
            </tr>
            <tr>
                <td >No. Job Request</td>
                <td>:</td>
                <td><?php echo e($nojr); ?></td>
            </tr>
            <tr>
                <td>Tgl Job Req</td>
                <td>:</td>
                <td><?php echo e($tgl); ?></td>
            </tr>
            <tr>
                <td>Customer</td>
                <td>:</td>
                <td><?php echo e($joborder->customer1->nama_customer); ?></td>
            </tr>
            <tr>
                <td>Kapal</td>
                <td>:</td>
                <td><?php echo e($joborder->kapal->nama_kapal); ?></td>
            </tr>
            <tr>
                <td>Voyage</td>
                <td>:</td>
                <td><?php echo e($joborder->voyage); ?></td>
            </tr>
            <tr>
                <td>ETA</td>
                <td>:</td>
                <td><?php echo e($joborder->eta); ?></td>
            </tr>
        </table>
    </div>
    <div class="right">
        <table width="50%" style="font-size: 10pt" border="0">
            <tr>
                <td>Order By</td>
                <td>:</td>
                <td><?php echo e($joborder->order_by); ?></td>
            </tr>
            <tr>
                <td>Free Time</td>
                <td>:</td>
                <td><?php echo e($jobrequest->freetime); ?></td>
            </tr>
            <tr>
                <td>Total Container</td>
                <td>:</td>
                <td><?php echo e($jobrequest->total_item); ?></td>
            </tr>

        </table>
    </div>
</div>
<hr>
<div class="content">
<hr>
    <section class="list-item">
        <table class="grid" style="font-size: 10pt; width: 19cm;" border="0" >
            <thead>
            <tr >
                <th>No.</th>
                <th width="20%">No Container</th>
                <th width="10%" >Size</th>
                <th width="35%">Dari</th>
                <th width="35%">Tujuan</th>
            </tr>
            </thead>
            <tbody>
            <?php $subtotal = 0 ; $limit_row = 0?>
            <?php foreach ($jobrequestdetail as $key => $row): ?>
                <tr >
                    <td ><?php echo $key+1 ?></td>
                    <td align="center"><?php echo $row->kode_container; ?></td>
                    <td align="center"><?php echo $row->kode_size; ?></td>
                    <td align="center"><?php echo $row->dari; ?></td>
                    <td align="center"><?php echo $row->tujuan; ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
            <?php if ($leng >= 10) { ?>
                <br>
                <hr>
            <?php } ?>
        </table>
    </section>
</div>

<?php if ($leng < 10) { ?>
<br>
<hr>
<?php } ?>

<div class="footer" style="font-size: 10pt;padding-top: 1.5cm">
<?php if ($leng >= 10) { ?>
    <br><br><br><br><br><br><br><br><br><br><br><br>
<?php } ?>
    <div class="tgl">
        Palembang, <?php echo date_format($date,'d F Y');?>
    </div>
    <br><br><br><br>
    <table width="100%" style="font-size:10pt; text-align:center;padding:0px; margin:0px; border-collapse:collapse" border="0">
        <tr style="padding:0px; margin:0px">
            <td width="20%">Dibuat oleh,</td>
            <td width="20%">Diperiksa oleh,</td>
            <td width="20%">Disetujui,</td>
            <td width="40%">Diketahui,</td>
        </tr>
        <tr style="padding:0px; margin:0px"><td colspan="3"><br><br><br></td></tr>
        <tr style="padding:0px; margin:0px">
            
        </tr>
        <tr style="padding:0px; margin:0px">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <div class="catatan" style="float: left">
        
    </div>
</div>

</body>
</html>