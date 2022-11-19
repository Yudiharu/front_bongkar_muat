<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
        <title>REKAP JOB ORDER</title>

    <style>
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
            padding: 7px;
            text-align: center;

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
          padding: 4px;
        }

        table.grid1 tr:nth-child(even) {
          background-color: #dddddd;
        }

        body{        
            padding-top: 110px;
            font-family: sans-serif;
        }
        .fixed-header, .fixed-footer{
            width: 100%;
            position: fixed;       
            padding: 10px 0;
            text-align: center;
        }
        .fixed-header{
            top: 0;
        }
        .fixed-footer{
            bottom: 0;
        }

        #header .page:after {
          content: counter(page, decimal);
        }

        .page_break { page-break-after: always; }
    </style>
</head>
<body>

<div class="fixed-header">
        <div style="float: left">
            <img src="<?php echo e(asset('css/logo_gui.png')); ?>" alt="" height="25px" width="25px" align="left">
            <p id="color" style="font-size: 8pt;" align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($nama2) ?></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lokasi: <?php echo ($nama) ?></p>
        </div>

        <div id="header">
            <p class="page" style="float: right; font-size: 9pt;"><b>Date :</b> <?php echo date_format($dt,"d/m/Y") ?>&nbsp;&nbsp;&nbsp;
            <b>Time :</b> <?php echo date_format($dt,"H:i:s") ?>&nbsp;&nbsp;&nbsp;
            <b>Page :</b> </p>
        </div>

        <br><br>
            <?php
            if ($jenis != 'SEMUA') { ?>
                <h1>REKAP JOB ORDER (Jenis JO : <?php echo $jenis; ?>)</h1>
            <?php } 
                else{?>
                    <h1>REKAP JOB ORDER</h1>
            <?php } ?>

            <p>Periode: <?php echo ($tanggal_awal) ?> s.d <?php echo ($tanggal_akhir) ?></p>
        
    </div>


    <table class="grid1" style="margin-bottom: 25px; width: 100%; font-size: 9px">
        <thead>
        <tr style="background-color: #e6f2ff">
            <th>No</th>
            <th>No. Job Order</th>
            <?php if ($jenis == 'SEMUA') { ?>
                <th>Jenis JO</th>
            <?php } ?>
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
                    <?php if ($jenis == 'SEMUA') { ?>
                        <td class="border" align="left"><?php echo $row->jenis_jo ?></td>
                    <?php } ?>
                    <td class="border" align="left"><?php 
                        if ($row->type == '1') {
                                $tipe = 'Export';
                        }else if ($row->type == '2') {
                                $tipe = 'Import';
                        }else if ($row->type == '3') {
                                $tipe = 'Local';
                        }else if ($row->type == '4') {
                                $tipe = 'Sewa';
                        }
                        echo $tipe;
                    ?></td>
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
            <?php if ($jenis == 'SEMUA') { ?>
                <td colspan="6" style="font-weight: bold; text-align: center">Total</td>
            <?php } 
            else{?>
                <td colspan="5" style="font-weight: bold; text-align: center">Total</td>
            <?php } ?>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal1,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal2,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal3,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal4,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal6,'0',',','.');?></td>
        </tr>
        </tfoot>
    </table>

    <?php
        if ($format_ttd != 1) {?>
            <br><br>
            <table width="100%" style="font-size:10pt; text-align: center; bottom: 0">
                <tr>
                    <td width="30%">Dibuat,</td>
                </tr>
                <tr><td colspan="3"><br><br><br></td></tr>
                <tr>
                    <td><?php echo $ttd; ?></td>
                </tr>
            </table>
        <?php } 
        else{?>
            <div class="page_break"></div>
            <br><br>
            <table width="100%" style="font-size:10pt; text-align: center; bottom: 0">
                <tr>
                    <td width="30%">Dibuat,</td>
                </tr>
                <tr><td colspan="3"><br><br><br></td></tr>
                <tr>
                    <td><?php echo $ttd; ?></td>
                </tr>
            </table>
    <?php } ?>
</body>
</html>