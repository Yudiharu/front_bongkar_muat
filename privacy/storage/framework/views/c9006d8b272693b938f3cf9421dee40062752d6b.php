<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <?php if ($type == 'Container') { ?>
        <title>REKAP SPB CONTAINER /TANGGAL KEMBALI SPB</title>
    <?php }else { ?>
        <title>REKAP SPB NON-CONTAINER /TANGGAL KEMBALI SPB</title>
    <?php } ?>
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
    <?php if ($type == 'Container') { ?>
        <h1>REKAP SPB CONTAINER /TANGGAL KEMBALI SPB</h1>
    <?php }else { ?>
        <h1>REKAP SPB NON-CONTAINER /TANGGAL KEMBALI SPB</h1>
    <?php } ?>
<br><br>
    <table class="grid1" style="margin-bottom: 25px; width: 100%; font-size: 9px">
        <thead>
        <tr style="background-color: #e6f2ff">
        <?php if ($type == 'Container') { ?>
            <th>No</th>
            <th>Tgl. Kembali SPB</th>
            <th>No. SPB</th>
            <th>No. JO</th>
            <th>Shipper</th>
            <th>Container</th>
            <th>Gudang</th>
            <th>Mobil</th>
            <th>Sopir</th>
            <th>Uang Jalan</th>
            <th>B/P/A</th>
            <th>Honor</th>
            <th>Biaya Lain</th>
            <th>Trucking</th>
            <th>Pemilik Mobil</th>
        <?php }else { ?>
            <th>No</th>
            <th>Tgl. Kembali SPB</th>
            <th>No. SPB</th>
            <th>No. JO</th>
            <th>Shipper</th>
            <th>Mobil</th>
            <th>Sopir</th>
            <th>HBU Sopir</th>
            <th>Uang Jalan</th>
            <th>Pemilik Mobil</th>
        <?php } ?>
        </tr>
        </thead>
        
        <tbody>
            <?php if ($type == 'Container') { ?>
                <?php foreach ($cetakspb as $key => $row) : ?>
                <tr class="border">
                    <td class="border"><?php echo $key+1 ?></td>
                    <td class="border" align="left"><?php echo $row->tgl_kembali ?></td>
                    <td class="border" align="left"><?php echo $row->no_spb ?></td>
                    <td class="border" align="left"><?php echo $row->no_joborder ?></td>
                    <td class="border" align="left"><?php echo $row->customer->nama_customer ?></td>
                    <td class="border" align="left"><?php echo $row->kode_container ?></td>
                    <td class="border" align="center"><?php echo $row->gudangdetail->nama_gudang ?></td>
                    <td class="border" align="center"><?php echo $row->mobil->nopol ?></td>
                    <?php if (substr($row->kode_sopir, 2) == 0) { ?>
                        <td class="border" align="left"><?php echo $row->kode_sopir?></td>
                    <?php }else { ?>
                        <td class="border" align="left"><?php echo $row->sopir->nama_sopir?></td>
                    <?php } ?>
                    <td class="border" align="center"><?php echo number_format($row->uang_jalan) ?></td>
                    <td class="border" align="center"><?php echo number_format($row->bpa) ?></td>
                    <td class="border" align="center"><?php echo number_format($row->honor) ?></td>
                    <td class="border" align="center"><?php echo number_format($row->biaya_lain) ?></td>
                    <td class="border" align="center"><?php echo number_format($row->trucking) ?></td>
                    <td class="border" align="center"><?php echo $row->pemilik->nama_pemilik ?></td>
                </tr>
                <?php endforeach; ?>
            <?php } else { ?>
                <?php foreach ($cetakspbnon as $key => $row) : ?>
                <tr class="border">
                    <td class="border"><?php echo $key+1 ?></td>
                    <td class="border" align="left"><?php echo $row->tanggal_kembali ?></td>
                    <td class="border" align="left"><?php echo $row->no_spb ?></td>
                    <td class="border" align="left"><?php echo $row->no_joborder ?></td>
                    <td class="border" align="left"><?php echo $row->customer->nama_customer ?></td>
                    <td class="border" align="center"><?php echo $row->mobil->nopol ?></td>
                    <?php if (substr($row->kode_sopir, 2) == 0) { ?>
                        <td class="border" align="left"><?php echo $row->kode_sopir?></td>
                    <?php }else { ?>
                        <td class="border" align="left"><?php echo $row->sopir->nama_sopir?></td>
                    <?php } ?>
                    <td class="border" align="center"><?php echo number_format($row->tarif_gajisopir) ?></td>
                    <td class="border" align="center"><?php echo number_format($row->uang_jalan) ?></td>
                    <td class="border" align="center"><?php echo $row->pemilik->nama_pemilik ?></td>
                </tr>
                <?php endforeach; ?>
            <?php } ?>
        </tbody>

        <tfoot>
        <tr class="border" style="background-color: #F5D2D2">
        <?php if ($type == 'Container') { ?>
            <td colspan="9" style="font-weight: bold; text-align: center">Total</td>
            <td class="border" style="font-weight: bold" align="right">&nbsp;<?php echo number_format($grandtotal1,'0',',','.');?></td>
            <td class="border" style="font-weight: bold" align="right">&nbsp;<?php echo number_format($grandtotal2,'0',',','.');?></td>
            <td class="border" style="font-weight: bold" align="right">&nbsp;<?php echo number_format($grandtotal3,'0',',','.');?></td>
            <td class="border" style="font-weight: bold" align="right">&nbsp;<?php echo number_format($grandtotal4,'0',',','.');?></td>
            <td class="border" style="font-weight: bold" align="right">&nbsp;<?php echo number_format($grandtotal5,'0',',','.');?></td>
            <td class="border"></td>
        <?php }else { ?>
            <td colspan="7" style="font-weight: bold; text-align: center">Total</td>
            <td class="border" style="font-weight: bold" align="right">&nbsp;<?php echo number_format($grandtotal5,'0',',','.');?></td>
            <td class="border" style="font-weight: bold" align="right">&nbsp;<?php echo number_format($grandtotal1,'0',',','.');?></td>
            <td class="border"></td>
        <?php } ?>
        </tr>
        </tfoot>
    </table>

    <?php if ($type == 'Container') { ?>
        <table width="100%" style="font-size: 9pt" border="0">
            <!-- <tr>
                <td width= "90%" align="right">GT Uang Jalan</td>
                <td align="right">:</td>
                <td align="right"><?php echo e(number_format($grandtotal1,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td width= "90%" align="right">GT B/P/A</td>
                <td align="right">:</td>
                <td align="right"><?php echo e(number_format($grandtotal2,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td width= "90%" align="right">GT Honor</td>
                <td align="right">:</td>
                <td align="right"><?php echo e(number_format($grandtotal3,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td width= "90%" align="right">GT Lain2</td>
                <td align="right">:</td>
                <td align="right"><?php echo e(number_format($grandtotal4,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td width= "90%" align="right">GT Trucking</td>
                <td align="right">:</td>
                <td align="right"><?php echo e(number_format($grandtotal5,'0',',','.')); ?></td>
            </tr> -->
            <tr>
                <td width= "90%" align="right">GT Tanpa UJ</td>
                <td align="right">:</td>
                <td align="right"><?php echo e(number_format($grandtotal2 + $grandtotal3 + $grandtotal4 + $grandtotal5,'0',',','.')); ?></td>
            </tr>
        </table>
    <?php }else { ?>
        <table width="100%" style="font-size: 9pt" border="0">
            <!-- <tr>
                <td width= "90%" align="right">GT Uang Jalan</td>
                <td align="right">:</td>
                <td align="right"><?php echo e(number_format($grandtotal1,'0',',','.')); ?></td>
            </tr>
            <tr>
                <td width= "90%" align="right">HBU Sopir</td>
                <td align="right">:</td>
                <td align="right"><?php echo e(number_format($grandtotal5,'0',',','.')); ?></td>
            </tr> -->
            <tr>
                <td width= "90%" align="right">GT Tanpa UJ</td>
                <td align="right">:</td>
                <td align="right"><?php echo e(number_format($grandtotal5,'0',',','.')); ?></td>
            </tr>
        </table>
    <?php } ?>
        
</body>
</html>