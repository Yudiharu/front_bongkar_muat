<?php
 
namespace App\Exports;

use App\Models\Vendor;
use App\Models\Joborder;
use App\Models\JobrequestDetail;
use App\Models\JoborderDetail;
use App\Models\MasterLokasi;
use App\Models\tb_akhir_bulan;
use App\Models\Signature;
use App\Models\Company;
use App\Models\Customer;
use App\Models\PemakaianAlatDetail;
use App\Models\PemakaianAlat;
use App\Models\InsentifoperatorDetail;
use App\Models\Insentifoperator;
use App\Exports\RekapPremiAlatExport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapPremiAlatExport implements FromView
{
    
    /**
    * @return \Illuminate\Support\Collection
    */

   	public function __construct(string $bulan, string $tahun, string $report)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->report = $report;
        // $this->jenis = $jenis;
    }

    public function view(): View
    {   
        return view('/admin/laporanrekapalat/excel', [
            'data' => InsentifoperatorDetail::select('kode_alat')->join('insentif_operator','insentif_operator_detail.no_insentif','=','insentif_operator.no_insentif')->whereMonth('insentif_operator.tgl_insentif', $this->bulan)->whereYear('insentif_operator.tgl_insentif', $this->tahun)->groupBy('kode_alat')->get(),
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
        ]);
    }
}