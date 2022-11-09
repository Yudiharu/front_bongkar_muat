<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
        <title>REKAP PREMI ALAT</title>
<?php
use App\Models\Alat;
use App\Models\PremiOperator;
use App\Models\InsentifoperatorDetail;
use App\Models\Insentifoperator;
use App\Models\InsentifhelperDetail;
use App\Models\Insentifhelper;
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
    <h1>RANGKUMAN PREMI OPERATOR</h1>
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
        <?php
        $granderjam = 0;
        $grandermin = 0;
        $grandolmin = 0;
        $grandios = 0;
        $granderjamhm = 0;
        $granderminhm = 0;
        $grandtotalhm = 0;
        ?>
        <?php foreach ($pakaialat as $key => $row) : ?>
            <?php 
                $gt_insentif_jam = 0;
                $gt_insentif_hm = 0;
                $grandjam = 0;
                $grandmin = 0;
                $totalqtyhm = 0;
                $premi_libur = 0;
                $totjam = 0;
                $totmin = 0;
                $tothm = 0;
                $totmenithm = 0;
                $grandtotal = 0;
                $grandhelper = 0;
                $temp_grand = 0;

                $tarif = PremiOperator::where('kode_alat', $row->kode_alat)->whereMonth('tgl_berlaku','<=',$bulan)->whereYear('tgl_berlaku','<=',$tahun)->orderBy('created_at','desc')->first();

                $detail = InsentifoperatorDetail::select('insentif_operator_detail.*')->join('insentif_operator','insentif_operator_detail.no_insentif','=','insentif_operator.no_insentif')->whereMonth('insentif_operator.tgl_insentif', $bulan)->whereYear('insentif_operator.tgl_insentif', $tahun)->where('insentif_operator_detail.kode_alat', $row->kode_alat)->get();
                foreach ($detail as $rows) {
                    //TOTAL JAM
                    $totjam += substr($rows->total_jam,0,2);
                    $totmin += substr($rows->total_jam,3,2);
                    
                    //TOTAL HM
                    if ($rows->total_hm >= 10){
                        $tothm += substr($rows->total_hm,0,2);
                        $totmenithm += substr($rows->total_hm,3,2);
                        $granderminhm += substr($rows->total_hm,3,2);
                    }else {
                        $tothm += substr($rows->total_hm,0,1);
                        $totmenithm += substr($rows->total_hm,2,2);
                        $granderminhm += substr($rows->total_hm,2,2);
                    }
                    
                    $temp_grand += $rows->total_insentif;
                }
                
                $grandtotal += floor($temp_grand);

                if ((float)$tothm >= 100) {
                    $totsjam = substr($tothm, 0,3);
                    $granderjamhm += substr($tothm, 0,3);
                }else if ((float)$tothm >= 10) {
                    $totsjam = substr($tothm, 0,2);
                    $granderjamhm += substr($tothm, 0,2);
                }else {
                    $totsjam = substr($tothm, 0,1);
                    $granderjamhm += substr($tothm, 0,1);
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
                $grandjam = $totjam;
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
                
                $granderjam += $grandjam;
                $grandermin += $totmin;
                
                $detail_helper = InsentifhelperDetail::select('insentif_helper_detail.*')->join('insentif_helper','insentif_helper_detail.no_insentif','=','insentif_helper.no_insentif')->whereMonth('insentif_helper.tgl_insentif', $bulan)->whereYear('insentif_helper.tgl_insentif', $tahun)->where('insentif_helper_detail.kode_alat', $row->kode_alat)->get();
                foreach ($detail_helper as $rows) {
                    $grandhelper += $rows->total_insentif;
                }
                
                $grandios += $grandtotal + $grandhelper;
            ?>
            <tr>
                <?php $alat = Alat::find($row->kode_alat); ?>
                <td align="left"><?php echo $alat->no_asset_alat ?></td>
                <td align="left"><?php echo $alat->nama_alat ?></td>
                <td align="right"><?php echo number_format($grandtotal + $grandhelper,'2') ?></td>
                <td align="right"><?php echo $grandjam ?></td>
                <td align="right"><?php echo $grandmin ?></td>
                <td align="right"><?php echo $totalqtyhm ?></td>
            </tr>
        <?php endforeach; ?>
            <tr><td colspan="6"><hr></td></tr>
            <?php
                if ($grandermin < 60){
                    if ($grandermin < 10){
                        $grandermin = '0'.$grandermin;
                    }
                }else {
                    $i = 1;
                    $j = 0;
                    $grandolmin = $grandermin;
                    for($i = 1; $i <= $grandermin; $i++){
                        $j += 1;
                        if ($j == 60){
                            $granderjam += 1;
                            $grandolmin -= 60;
                            $j = 0;
                        }
                    }
                    
                    if ($grandolmin < 10){
                        $grandolmin = '0'.$grandolmin;
                    }
                }
                
                $konto = 0;
                $konto1= 0;
                $konto2 = 0;
                $konto3 = 0;
                
                if ($granderminhm >= 60){
                    $konto1 = $granderminhm / 60;
                    $konto2 = $konto1 - floor($konto1);
                    $konto3 = $konto2 * 60;
                    
                    $granderjamhm += floor($konto1);
                    $konto = $konto3;
                }else {
                    if ($granderminhm == 0){
                        $granderminhm = '00';
                    }
                    $konto = $granderminhm;
                }
                $grandtotalhm = $granderjamhm.'.'.$konto;
            ?>
            <tr>
                <td align="left" colspan="2">Grand Total</td>
                <td align="right"><?php echo number_format($grandios,'2') ?></td>
                <td align="right"><?php echo $granderjam ?></td>
                <td align="right"><?php echo $grandolmin ?></td>
                <td align="right"><?php echo $grandtotalhm ?></td>
            </tr>
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