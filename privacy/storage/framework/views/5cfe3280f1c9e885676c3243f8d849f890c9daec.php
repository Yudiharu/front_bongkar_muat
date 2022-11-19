<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <?php if ($cekdetail != null) { ?>
        <title>REKAP SPB CONTAINER /JO</title>
    <?php }else { ?>
        <title>REKAP SPB NON-CONTAINER /JO</title>
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
    <?php if ($cekdetail != null) { ?>
        <h1>REKAP SPB CONTAINER /JO</h1>
        <p>Shipper: <?php echo $cek_shipper->nama_customer ?> / No. JO: <?php echo ($nojo) ?></p>
    <?php }else { ?>
        <h1>REKAP SPB NON-CONTAINER /JO</h1>
        <p>No. JO: <?php echo ($nojo) ?></p>
    <?php } ?>
    <br>
    <table class="grid1" style="margin-bottom: 25px; width: 100%; font-size: 9px">
        <thead>
        <tr style="background-color: #e6f2ff">
        <?php if ($cekdetail != null) { ?>
            <th>No</th>
            <th>Tgl. Kembali SPB</th>
            <th>No. SPB</th>
            <th>Container</th>
            <th>Gudang</th>
            <th>Mobil</th>
            <th>Sopir</th>
            <th>Uang Jalan</th>
            <th>B/P/A</th>
            <th>Honor</th>
            <th>Biaya Lain</th>
            <th>Trucking</th>
        <?php }else { ?>
            <th>No</th>
            <th>Tgl. Kembali SPB</th>
            <th>No. SPB</th>
            <th>Mobil</th>
            <th>Sopir</th>
            <th>HBU Sopir</th>
            <th>Uang Jalan</th>
            <th>BBM</th>
            <th>Dari</th>
            <th>Tujuan</th>
        <?php } ?>
        </tr>
        </thead>
        
        <tbody>
            <?php if ($cekdetail != null) { ?>
                <?php foreach ($cetak_job as $key => $row) : ?>
                <tr class="border">
                    <td class="border"><?php echo $key+1 ?></td>
                    <td class="border" align="left"><?php echo $row->tgl_kembali ?></td>
                    <td class="border" align="left"><?php echo $row->no_spb ?></td>
                    <td class="border" align="left"><?php echo $row->kode_container ?></td>
                    <td class="border" align="left"><?php echo $row->gudangdetail->nama_gudang ?></td>
                    <td class="border" align="left"><?php echo $row->mobil->nopol ?></td>
                    <?php if (substr($row->kode_sopir, 2) == 0) { ?>
                        <td class="border" align="left"><?php echo $row->kode_sopir?></td>
                    <?php }else { ?>
                        <td class="border" align="left"><?php echo $row->sopir->nama_sopir?></td>
                    <?php } ?>
                    <td class="border" align="center"><?php echo number_format($row->uang_jalan,'0',',','.') ?></td>
                    <td class="border" align="center"><?php echo number_format($row->bpa,'0',',','.') ?></td>
                    <td class="border" align="right"><?php echo number_format($row->honor,'0',',','.') ?></td>
                    <td class="border" align="right"><?php echo number_format($row->biaya_lain,'0',',','.') ?></td>
                    <td class="border" align="right"><?php echo number_format($row->trucking,'0',',','.') ?></td>
                </tr>
                <?php endforeach; ?>
            <?php } else { ?>
                <?php foreach ($cetak_job as $key => $row) : ?>
                <tr class="border">
                    <td class="border"><?php echo $key+1 ?></td>
                    <td class="border" align="left"><?php echo $row->tanggal_kembali ?></td>
                    <td class="border" align="left"><?php echo $row->no_spb ?></td>
                    <td class="border" align="left"><?php echo $row->mobil->nopol ?></td>
                    <?php if (substr($row->kode_sopir, 2) == 0) { ?>
                        <td class="border" align="left"><?php echo $row->kode_sopir?></td>
                    <?php }else { ?>
                        <td class="border" align="left"><?php echo $row->sopir->nama_sopir?></td>
                    <?php } ?>
                    <td class="border" align="center"><?php echo number_format($row->tarif_gajisopir,'0',',','.') ?></td>
                    <td class="border" align="center"><?php echo number_format($row->uang_jalan,'0',',','.') ?></td>
                    <td class="border" align="right"><?php echo number_format($row->bbm,'0',',','.') ?></td>
                    <td class="border" align="left"><?php echo $row->dari ?></td>
                    <td class="border" align="left"><?php echo $row->tujuan ?></td>
                </tr>
                <?php endforeach; ?>
            <?php } ?>
        </tbody>
        
        <tfoot>
        <tr class="border" style="background-color: #F5D2D2">
        <?php if ($cekdetail != null) { ?>
            <td colspan="7" style="font-weight: bold; text-align: center">Total</td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal1,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal2,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal3,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal4,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal5,'0',',','.');?></td>
        <?php }else { ?>
            <td colspan="5" style="font-weight: bold; text-align: center">Total</td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal1,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal2,'0',',','.');?></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotal3,'0',',','.');?></td>
            <td class="border"></td>
            <td class="border"></td>
        <?php } ?>
        </tr>
        </tfoot>
    </table>

</body>
</html>