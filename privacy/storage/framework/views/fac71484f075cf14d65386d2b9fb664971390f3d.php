<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
        <title>REKAP TIMESHEET</title>
<?php 
use App\Models\Alat; 
use App\Models\Operator; 
use App\Models\Customer;
use App\Models\Joborder;
use App\Models\PemakaianAlat;
?>

    <style>
        @page  {
            margin-right: 0.25cm;
            margin-left: 0.25cm;
        }

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
          text-align: left;
          padding: 2px;
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        body{        
            padding-top: 120px;
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
        <p id="color" style="font-size: 8pt;" align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($nama2) ?></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </div>

    <div id="header">
        <p class="page" style="float: right; font-size: 9pt;"><b>Waktu Cetak :</b> <?php echo date_format($dt,"d/m/Y") ?>&nbsp;&nbsp;&nbsp;
            <b>Jam :</b> <?php echo date_format($dt,"H:i:s") ?>&nbsp;&nbsp;&nbsp;
            <b>Hal :</b> </p>
    </div>

    <br><br>
    <h1>LAPORAN REKAP TIMESHEET</h1>
    <p>Periode: <?php echo ($tanggal_awal) ?> s.d <?php echo ($tanggal_akhir) ?></p>
    
    <?php $alat = Alat::find($kode_alat); ?>
    <div class="left">
        <table width="50%" style="font-size: 10pt" border="0">
            <tr>
                <td style="width: 180px">Alat</td>
                <td style="width: 10px">:</td>
                <td><?php echo $alat->no_asset_alat ?></td>
                <td><?php echo $alat->merk ?></td>
            </tr>
        </table>
    </div>
</div>

    <table class="grid1" style="margin-bottom: 25px; width: 100%; font-size: 9px" border="0">
        <thead style="font-size: 10px;">
            <tr><td colspan="14"><hr></td></tr>
            <tr >
                <th>Tgl</th>
                <th>Time Sheet</th>
                <th>Operator</th>
                <th>Pekerjaan</th>
                <th>Lokasi</th>
                <th colspan="2" style="text-align: center;">Jam</th>
                <th style="text-align: center;">Istirahat</th>
                <th style="text-align: center;">Std By</th>
                <th style="text-align: center;">Total jam</th>
                <th colspan="2" style="text-align: center; padding-left: 35px;">HM</th>
                <th style="text-align: right;">Total HM</th>
                <th>Pemakai</th>
            </tr>
            <tr><td colspan="14"><hr></td></tr>
        </thead>
    <?php
        $totaljam = 0;
        $jam_total = 0;
        $menit_total = 0;
        $menit2 = 0;
        $menit3 = 0;
        $menit_akhir = 0;
        $grand_hour = 0;
        $grand_hm = 0;
        $jam_hm = 0;
        $menit_hm = 0;
    ?>
        <tbody>
            <?php foreach ($pemakaian_alat as $row) : ?>
                <?php
                    if ($row->hitungan_pemakaian == '1'){
                        $hourtotal = substr($row->total_jam,0,2);
                        $mintotal = substr($row->total_jam,3,2);
                        
                        $jam_total += (int)$hourtotal;
                        $menit_total += (int)$mintotal;
                    }else {
                        if ($row->total_hm >= 10){
                            $jam_hm += substr($row->total_hm,0,2);
                            $menit_hm += substr($row->total_hm,3,2);
                        }else {
                            $jam_hm += substr($row->total_hm,0,1);
                            $menit_hm += substr($row->total_hm,2,2);
                        }
                    }
                ?>
                <tr>
                    <td align="left"><?php echo $row->tgl_pakai ?></td>
                    <td align="left"><?php echo $row->no_timesheet ?></td>
                <?php $opera = Operator::find($row->operator); ?>
                    <td align="left"><?php echo $opera->nama_operator ?></td>
                    <td align="left"><?php echo $row->pekerjaan ?></td>
                <?php 
                    $header = PemakaianAlat::find($row->no_pemakaian);
                    $jo = Joborder::find($header->no_joborder);
                    $cust = Customer::find($header->kode_customer);
                ?>
                    <td align="left"><?php echo $jo->lokasi ?></td>
                    
                    <?php if ($row->jam_dr == null){ ?>
                        <td style="text-align: center;"><?php echo "00:00" ?></td>
                    <?php } else { ?>
                        <td style="text-align: center;"><?php echo substr($row->jam_dr,0,5) ?></td>
                    <?php } ?>
                    
                    <?php if ($row->jam_sp == null){ ?>
                        <td style="text-align: center;"><?php echo "00:00" ?></td>
                    <?php } else { ?>
                        <td style="text-align: center;"><?php echo substr($row->jam_sp,0,5) ?></td>
                    <?php } ?>
                    
                    <?php if ($row->istirahat == null){ ?>
                        <td style="text-align: center;"><?php echo "00:00" ?></td>
                    <?php } else { ?>
                        <td style="text-align: center;"><?php echo substr($row->istirahat,0,5) ?></td>
                    <?php } ?>
                    
                    <?php if ($row->stand_by == null){ ?>
                        <td style="text-align: center;"><?php echo "00:00" ?></td>
                    <?php } else { ?>
                        <td style="text-align: center;"><?php echo substr($row->stand_by,0,5) ?></td>
                    <?php } ?>
                    
                    <td style="text-align: right; padding-right:17px;"><?php echo $row->total_jam ?></td>
                    
                    <?php if ($row->hm_dr == null){ ?>
                        <td style="text-align: right; "><?php echo "0.00" ?></td>
                    <?php } else { ?>
                        <td style="text-align: right; "><?php echo number_format($row->hm_dr,'2') ?></td>
                    <?php } ?>
                    
                    <?php if ($row->hm_sp == null){ ?>
                        <td style="text-align: right; "><?php echo "0.00" ?></td>
                    <?php } else { ?>
                        <td style="text-align: right; "><?php echo number_format($row->hm_sp,'2') ?></td>
                    <?php } ?>
                    
                    <td style="text-align: right;"><?php echo $row->total_hm ?></td>
                    <td align="center"><?php echo $cust->nama_customer ?></td>
                </tr>
            <?php endforeach; ?>
            <?php
                //GRAND JAM
                $menit2 = $menit_total / 60;
                $jam_total = $jam_total + floor($menit2);
                $menit3 = $menit2 - floor($menit2);
                $menit_akhir = $menit3 * 60;
                $grand_hour = '&nbsp;&nbsp;'.$jam_total.' Jam &nbsp;&nbsp;'.$menit_akhir.' Menit';
                
                //GRAND HM
                $totsmin = 0;
                $totsmin1 = 0;
                $totsmin2 = 0;
                $totsmin3 = 0;
                if ($menit_hm >= 60){
                    $totsmin1 = $menit_hm / 60;
                    $totsmin2 = $totsmin1 - floor($totsmin1);
                    $totsmin3 = $totsmin2 * 60;
                    
                    $jam_hm += floor($totsmin1);
                    $totsmin = $totsmin3;
                }else {
                    if ($menit_hm == 0){
                        $menit_hm = '00';
                    }
                    $totsmin = $menit_hm;
                }
                $grand_hm = $jam_hm.'.'.$totsmin;
            ?>
                <tr><td colspan="14">
                    <table width="100%" style="font-size:10pt; text-align: center; bottom: 0">
                        <tr><td colspan="14"><hr></td></tr>
                        <?php 
                            if ($customer != 'KOSONG' && $customer != null){
                                $nama = Customer::find($customer);
                            }
                        ?>
                        <tr>
                            <td>Palembang, &nbsp;&nbsp;&nbsp;&nbsp;<?php echo Carbon\Carbon::parse($dt)->format('d-M-Y'); ?></td>
                            <td colspan="3"></td>
                            <td colspan="5">Grand Total: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $grand_hour ?></td>
                            <td colspan="2">HM: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $grand_hm ?></td>
                        </tr>
                        <tr>
                            <?php if ($customer == 'KOSONG' || $customer == null) { ?>
                                <td width="30%">Dibuat,</td>
                                <td></td>
                                <td>Diperiksa Oleh,</td>
                                <td colspan="2">Diketahui Oleh,</td>
                            <?php }else { ?>
                                <td width="30%">Dibuat,</td>
                                <td colspan="3">Diketahui Oleh,</td>
                            <?php } ?>
                        </tr>
                        <tr><td colspan="3"><br><br><br></td></tr>
                        <tr>
                            <?php if ($customer == 'KOSONG' || $customer == null) { ?>
                                <td width="30%"><?php echo $ttd; ?></td>
                                <td></td>
                                <td>Juvita</td>
                                <td colspan="2">MARCHENDRO</td>
                            <?php }else { ?>
                                <td><?php echo $ttd; ?></td>
                                <td colspan="4"><?php echo $nama->nama_customer; ?></td>
                            <?php } ?>
                        </tr>   
                    </table>
                </td></tr>
        </tbody>
    </table>

</body>
</html>