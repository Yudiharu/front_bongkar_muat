<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
        <title>REKAP JOB ORDER</title>

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
        <h1>REKAP JOB ORDER</h1>
        <p>Periode: <?php echo ($tanggal_awal) ?> s.d <?php echo ($tanggal_akhir) ?></p>
    <br>
    <table class="grid1" style="margin-bottom: 25px; width: 100%; font-size: 9px">
        <thead>
        <tr style="background-color: #e6f2ff">
            <th>No</th>
            <th>No. Job Order</th>
            <th>Type JO</th>
            <th>Tanggal</th>
            <th>Customer</th>
            <th>Biaya Estimasi</th>
            <th>CBO</th>
            <th>CBI</th>
            <th>Non Kasbon</th>
            <th>Penyelesaian</th>
        </tr>
        </thead>
        
        <tbody>
            <?php foreach ($jo as $key => $row) : ?>
                <tr class="border">
                    <td class="border"><?php echo $key+1 ?></td>
                    <td class="border" align="left"><?php echo $row->no_joborder ?></td>
                    <td class="border" align="left"><?php echo $row->type ?></td>
                    <td class="border" align="left"><?php echo $row->tanggal_jo ?></td>
                    <td class="border" align="left"><?php echo $row->customer1->nama_customer ?></td>
                    <td class="border" align="left"><?php echo number_format($row->biaya_estimasi,'0',',','.') ?></td>
                    <td class="border" align="left"><?php echo number_format($row->total_kasbon_cbo,'0',',','.') ?></td>
                    <td class="border" align="left"><?php echo number_format($row->total_kasbon_cbi,'0',',','.') ?></td>
                    <td class="border" align="left"><?php echo number_format($row->total_non_kasbon,'0',',','.') ?></td>
                    <td class="border" align="left"><?php echo number_format($row->total_penyelesaian,'0',',','.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        
        <tfoot>
        <tr class="border" style="background-color: #F5D2D2">
            <td colspan="5" style="font-weight: bold; text-align: center">Total</td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal1,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal2,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal3,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal4,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal6,'0',',','.');?></td>
        </tr>
        </tfoot>
    </table>

</body>
</html>