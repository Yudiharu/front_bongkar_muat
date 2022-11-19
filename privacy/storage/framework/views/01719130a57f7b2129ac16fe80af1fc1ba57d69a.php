<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <title>LAPORAN DATA PENJUALAN BARANG</title>
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
        ul li {
            display:inline;
            list-style-type:none;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>LAPORAN DATA PENJUALAN BARANG</h1>
    <p>Periode: <?php echo ($tanggal_awal) ?> s.d <?php echo ($tanggal_akhir) ?></p>
<?php
$grandtotalqty = 0;
$grandtotaljumlah = 0;
?>
    <table class="table_content" style="margin-bottom: 25px;width: 100%;">
        <thead>
        <tr class="border" style="background-color: #e6f2ff">
            <th class="border" width="">NO</th>
            <th class="border" width="">No Penjualan</th>
            <th class="border" width="">Tanggal Transaksi</th>
            <th class="border" width="">Status</th>
            <th class="border" width="">Kode Produk</th>
            <th class="border" width="">Nama Produk</th>
            <th class="border" width="">Partnumber</th>
            <th class="border"  width="">Kode Satuan</th>
            <th class="border"  width="">Kode Kategori</th>
            <th class="border"  width="">Qty</th>
            <th class="border" width="">Harga</th>
            <th class="border" width="">Subtotal</th>
        </tr>
        </thead>

        <?php foreach ($penjualandetail as $key => $row) : ?>
        <tbody>

        ?>

            <tr class="border">
                <td class="border"><?php echo $key+1 ?></td>
                <td class="border" align="left"><?php echo $row->no_penjualan?></td>
                <td class="border" align="left"><?php echo $row->tanggal_penjualan?></td>
                <td class="border" align="left"><?php echo $row->status?></td>
                <td class="border" align="left"><?php echo $row->kode_produk?></td>
                <td class="border" align="left"><?php echo $row->nama_produk?></td>
                <td class="border" align="center"><?php echo $row->partnumber?></td>
                <td class="border" align="center"><?php echo $row->kode_satuan?></td>
                <td class="border" align="center"><?php echo $row->kode_kategori?></td>
                <td class="border" align="center"><?php echo $row->qty?></td>
                <td class="border" align="right"><?php echo number_format($row->harga,'0',',','.') ?></td>
                <td class="border" align="right"><?php echo number_format($total = $row->harga * $row->qty,'0',',','.') ?></td>
            </tr>

            <?php
            $subqty = 0;
            $subtotal = 0;
            $subqty += (float) $row->qty;
            $subtotal += $row->harga * $row->qty;

            $grandtotalqty += $subqty;
            $grandtotaljumlah += $subtotal;
            ?>

        </tbody>
        <?php endforeach; ?>

        <tfoot>
        <tr class="border">
            <td class="border" colspan="9" style="font-weight: bold">Total</td>
            <td class="border"><?php echo number_format((float)$grandtotalqty, 0, ',', '.');;?></td>
            <td class="border" ></td>
            <td class="border" align="right">&nbsp;<?php echo number_format($grandtotaljumlah,'0',',','.');?></td>
        </tr>
        </tfoot>

    </table>

<?php if (! empty($penjualandetail)){ ?>
    <table cellspacing="1" cellpadding="1">
        <thead>
        <tr>
            <td style="width: 160px; text-align: left">Grand Total Jumlah</td>
            <td style="width: 50px">:</td>
            <td style="text-align: right"><?php echo number_format($grandtotalqty,0,',','.')?></td>
        </tr>
        <tr>
            <td style="text-align: left">Grand Total Biaya</td>
            <td>:</td>
            <td style="width: 150px; text-align: right">Rp.&nbsp;<?php echo number_format($grandtotaljumlah, 2,',','.')?></td>
        </tr>
        </thead>
    </table>
<?php }else { ?>
    <div style="text-align: center">
        <p style="color: red;font-size: 10pt;">DATA TIDAK TERSEDIA</p>
    </div>
<?php } ?>

<div class="footer" style="font-size: 10pt;padding-top: 1.5cm">
    <div class="tgl" align="left">
        Palembang, <?php echo date_format($date,'d F Y');?>
    </div>

    <table width="100%" style="font-size:10pt; text-align:center;padding:0px; margin:0px; border-collapse:collapse" border="0">
        <tr style="padding:0px; margin:0px">
            <td width="20%">Dibuat oleh,</td>
            <td width="47%">Disetujui,</td>
        </tr>
        <tr style="padding:0px; margin:0px"><td colspan="3"><br><br><br></td></tr>
        <tr style="padding:0px; margin:0px">
            <td><b><u><?php echo $ttd; ?></u></b></td>
            <td>JULIUS LEONARD</td>
        </tr>
    </table>
</div>

</body>
</html>