<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
        <title>REKAP PREMI ALAT</title>
<?php
use App\Models\Alat;
use App\Models\PremiHelper;
use App\Models\PemakaianAlatDetail;
use App\Models\PemakaianAlat;
use App\Models\Joborder;
?>
    <style>
        .header, h1 {
            font-size: 11pt;
            margin-bottom: 0px;
        }

        .header, p {
            font-size: 10pt;
            margin-top: 0px;
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
        <img src="{{ asset('css/logo_gui.png') }}" alt="" height="25px" width="25px" align="left">
        <p id="color" style="font-size: 8pt;" align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($nama2) ?></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OFFICE</p>
    </div>

    <div id="header">
        <p class="page" style="float: right; font-size: 9pt;"><b>Date :</b> <?php echo date_format($dt,"d/m/Y") ?>&nbsp;&nbsp;&nbsp;
        <b>Time :</b> <?php echo date_format($dt,"H:i:s") ?>&nbsp;&nbsp;&nbsp;
        <b>Page :</b> </p>
    </div>

    <br><br>
    <h1>RANGKUMAN PREMI HELPER</h1>
    <p>Premi Bulan <?php echo ($bulan) ?> ~ Tahun <?php echo ($tahun) ?></p>
</div>

    <table style="margin-bottom: 25px; width: 100%; font-size: 10pt">
        <thead>
            <tr>
                <th>Kode Alat</th>
                <th>Nama Alat</th>
                <th align="right">Premi</th>
                <th align="right">Jam</th>
                <th align="right">Menit</th>
                <th align="right">HM</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($pakaialat as $key => $row) : ?>
            <?php 
                $gt_insentif_jam = 0;
                $gt_insentif_hm = 0;
                $grandjam = 0;
                $grandmin = 0;
                $totalqtyhm = 0;
                $totjam = 0;
                $totmin = 0;
                $tothm = 0;
                $totmenithm = 0;

                $tarif = PremiOperator::where('kode_alat', $row->kode_alat)->whereMonth('tgl_berlaku','<=',$bulan)->whereYear('tgl_berlaku','<=',$tahun)->orderBy('created_at','desc')->first();

                $detail = PemakaianAlatDetail::whereMonth('tgl_pakai', $bulan)->whereYear('tgl_pakai', $tahun)->where('kode_alat', $row->kode_alat)->whereNotNull('no_insentif')->get();
                foreach ($detail as $rows) {
                    $pakaihd = PemakaianAlat::find($rows->no_pemakaian);
                    $cek_jobor = Joborder::find($pakaihd->no_joborder);
                    if ($cek_jobor->type_kegiatan == '1') {
                        $premi = $tarif->premi_jam_nontranshipment;
                    }else {
                        $premi = $tarif->premi_jam_transhipment;
                    }

                    if ($rows->hitungan_pemakaian == '1'){
                        //hitung jam
                        $hitjam = substr($rows->total_jam, 0,2);
                        $hitmin = substr($rows->total_jam, 3,2);
                        $totaljam = $hitjam * $premi;
                        $totalmin = ($hitmin / 60) * $premi;

                        $total_insentif = floor($totaljam + $totalmin);

                        $totjam += ($hitjam * 60);
                        $totmin += $hitmin;

                        // $totalpremilibur += $premi_libur;
                        $gt_insentif_jam += $total_insentif;
                    }else {
                        //hitung hm
                        if ((float)$rows->total_hm >= 100) {
                            //ratusan
                            $jamhm = substr($rows->total_hm, 0,3);
                            $minhm = substr($rows->total_hm, 4,2);
                        }else if ((float)$rows->total_hm >= 10) {
                            //puluhan
                            $jamhm = substr($rows->total_hm, 0,2);
                            $minhm = substr($rows->total_hm, 3,2);
                        }else {
                            //satuan
                            $jamhm = substr($rows->total_hm, 0,1);
                            $minhm = substr($rows->total_hm, 2,2);
                        }

                        $totaljamhm = $jamhm * $premi;
                        $premi_menit = ($premi / 60);
                        $totalminhm = $minhm * $premi_menit;

                        $total_insentif = floor($totaljamhm + $totalminhm);

                        $tothm += floor($rows->total_hm);
                        $hitungmenit = substr($rows->total_hm,-2);
                        $totmenithm += $hitungmenit;

                        // $totalpremilibur += $premi_libur;
                        $gt_insentif_hm += $total_insentif;
                    }
                }

                if ((float)$tothm >= 100) {
                    $totsjam = substr($tothm, 0,3);
                }else if ((float)$tothm >= 10) {
                    $totsjam = substr($tothm, 0,2);
                }else {
                    $totsjam = substr($tothm, 0,1);
                }

                //RUMUS TOTAL HM
                if ($totmenithm >= 60){
                    $totsmin1 = $totmenithm / 60;
                    $totsmin2 = $totsmin1 - floor($totsmin1);
                    $totsmin3 = $totsmin2 * 60;
                    
                    $totsjam += floor($totsmin1);
                    $totsmin = $totsmin3;
                }else {
                    if ($totmenithm == 0){
                        $totmenithm = '00';
                    }
                    $totsmin = $totmenithm;
                }
                $totalqtyhm = $totsjam.'.'.$totsmin;

                //RUMUS TOTAL JAM BARU
                $grandjam = $totjam / 60;
                if ($totmin < 60){
                    if ($totmin < 10){
                        $grandmin = '0'.$totmin;
                    }else {
                        $grandmin = $totmin;
                    }
                }else {
                    $i = 1;
                    $j = 0;
                    $grandmin = $totmin;
                    for($i = 1; $i <= $totmin; $i++){
                        $j += 1;
                        if ($j == 60){
                            $grandjam += 1;
                            $grandmin -= 60;
                            $j = 0;
                        }
                    }
                    
                    if ($grandmin < 10){
                        $grandmin = '0'.$grandmin;
                    }
                }
            ?>
            <tr>
                <?php $alat = Alat::find($row->kode_alat); ?>
                <td align="left"><?php echo $alat->no_asset_alat ?></td>
                <td align="left"><?php echo $alat->nama_alat ?></td>
                <td align="right"><?php echo number_format($gt_insentif_jam + $gt_insentif_hm,'2') ?></td>
                <td align="right"><?php echo $grandjam ?></td>
                <td align="right"><?php echo $grandmin ?></td>
                <td align="right"><?php echo $totalqtyhm ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
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