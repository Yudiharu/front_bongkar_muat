<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
        <title>LAPORAN REKAP TIME SHEET</title>
<?php 
use App\Models\Alat; 
use App\Models\Operator; 
use App\Models\Customer;
use App\Models\Joborder;
use App\Models\PemakaianAlat;
?>
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
    <table class="grid1" style="margin-bottom: 25px; width: 100%; font-size: 9px">
        <thead>
        <tr style="background-color: #e6f2ff">
            <th>Tgl</th>
                <th>Time Sheet</th>
                <th>Operator</th>
                <th>Pekerjaan</th>
                <th>Lokasi</th>
                <th colspan="2" align="center">Jam</th>
                <th style="text-align: center;">Istirahat</th>
                <th style="text-align: center;">Std By</th>
                <th style="text-align: center;">Total jam</th>
                <th colspan="2" align="center">HM</th>
                <th style="text-align: right;">Total HM</th>
                <th>Pemakai</th>
        </tr>
        </thead>
        
        <tbody>
            <?php foreach ($data as $key => $row) : ?>
                <tr class="border">
                    <td align="left"><?php echo $row->tgl_pakai ?></td>
                    <td align="left"><?php echo $row->no_timesheet ?></td>
                <?php $opera = Operator::find($row->operator); ?>
                    <td align="left"><?php echo $opera->nama_operator ?></td>
                    <td align="left"><?php echo $row->pekerjaan ?></td>
                <?php 
                    $header = PemakaianAlat::find($row->no_pemakaian);
                    $jo = Joborder::find($header->no_joborder);
                    $customer = Customer::find($header->kode_customer);
                ?>
                    <td align="left"><?php echo $jo->lokasi_kegiatan ?></td>
                    <td style="text-align: center;"><?php echo substr($row->jam_dr,0,5) ?></td>
                    <td style="text-align: center;"><?php echo substr($row->jam_sp,0,5) ?></td>
                    <td style="text-align: center;"><?php echo substr($row->istirahat,0,5) ?></td>
                    <td style="text-align: center;"><?php echo substr($row->stand_by,0,5) ?></td>
                    <td style="text-align: right;"><?php echo $row->total_jam ?></td>
                    <td style="text-align: right;"><?php echo number_format($row->hm_dr,'2') ?></td>
                    <td style="text-align: right;"><?php echo number_format($row->hm_sp,'2') ?></td>
                    <td style="text-align: right;"><?php echo $row->total_hm ?></td>
                    <td align="center"><?php echo $customer->nama_customer ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>