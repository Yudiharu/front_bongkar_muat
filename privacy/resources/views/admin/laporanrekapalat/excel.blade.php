<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
        <title>REKAP PREMI ALAT</title>
<?php
use App\Models\Alat;
use App\Models\PremiOperator;
use App\Models\PemakaianAlatDetail;
use App\Models\PemakaianAlat;
use App\Models\InsentifoperatorDetail;
use App\Models\Insentifoperator;
use App\Models\InsentifhelperDetail;
use App\Models\Insentifhelper;
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


<div class="header">
    <table class="grid1" style="margin-bottom: 25px; width: 100%; font-size: 9px">
        <thead>
        <tr style="background-color: #e6f2ff">
            <th>Kode Alat</th>
            <th>Nama Alat</th>
            <th>Premi</th>
            <th>Jam</th>
            <th>Menit</th>
            <th>HM</th>
        </tr>
        </thead>
        
        <tbody>
        <?php foreach ($data as $key => $row) : ?>
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
                    }else {
                        $tothm += substr($rows->total_hm,0,1);
                        $totmenithm += substr($rows->total_hm,2,2);
                    }
                    
                    $temp_grand += $rows->total_insentif;
                }
                
                $grandtotal += floor($temp_grand);

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
                
                $detail_helper = InsentifhelperDetail::select('insentif_helper_detail.*')->join('insentif_helper','insentif_helper_detail.no_insentif','=','insentif_helper.no_insentif')->whereMonth('insentif_helper.tgl_insentif', $bulan)->whereYear('insentif_helper.tgl_insentif', $tahun)->where('insentif_helper_detail.kode_alat', $row->kode_alat)->get();
                foreach ($detail_helper as $rows) {
                    $grandhelper += floor($rows->total_insentif);
                }
                
            ?>
            <tr>
                <?php $alat = Alat::find($row->kode_alat); ?>
                <td align="left"><?php echo $alat->no_asset_alat ?></td>
                <td align="left"><?php echo $alat->nama_alat ?></td>
                <td align="right"><?php echo ($grandtotal + $grandhelper) ?></td>
                <td align="right"><?php echo $grandjam ?></td>
                <td align="right"><?php echo $grandmin ?></td>
                <td align="right"><?php echo $totalqtyhm ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>