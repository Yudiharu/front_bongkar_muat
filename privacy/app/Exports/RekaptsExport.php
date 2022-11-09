<?php
 
namespace App\Exports;
 
use App\Models\tb_item_bulanan;
use App\Models\Joborder;
use App\Models\JoborderDetail;
use App\Models\JobrequestDetail;
use App\Models\PemakaianAlatDetail;
use App\Models\tb_akhir_bulan;
use App\Models\Customer;
use App\Models\Alat;
use App\Models\Company;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekaptsExport implements FromView
{
    
    /**
    * @return \Illuminate\Support\Collection
    */

   	public function __construct(string $tanggal_awal, string $tanggal_akhir, string $report, string $kode_alat, string $customer)
    {
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
        $this->report = $report;
        $this->kode_alat = $kode_alat;
        $this->customer = $customer;
    }

    public function view(): View
    {   
        if ($this->customer == 'KOSONG' || $this->customer == null){
            return view('/admin/laporanrekapts/excel', [
                'data' => PemakaianAlatDetail::Join('pemakaian_alat','pemakaian_alat_detail.no_pemakaian','=','pemakaian_alat.no_pemakaian')->where('pemakaian_alat_detail.kode_alat',$this->kode_alat)->whereBetween('pemakaian_alat_detail.tgl_pakai', array($this->tanggal_awal, $this->tanggal_akhir))->where('pemakaian_alat_detail.status','POSTED')->orderBy('pemakaian_alat_detail.no_timesheet')->get()
            ]);
        }else {
            return view('/admin/laporanrekapts/excel', [
                'data' => PemakaianAlatDetail::Join('pemakaian_alat','pemakaian_alat_detail.no_pemakaian','=','pemakaian_alat.no_pemakaian')->where('pemakaian_alat.kode_customer', $this->customer)->where('pemakaian_alat_detail.kode_alat',$this->kode_alat)->whereBetween('pemakaian_alat_detail.tgl_pakai', array($this->tanggal_awal, $this->tanggal_akhir))->where('pemakaian_alat_detail.status','POSTED')->orderBy('pemakaian_alat_detail.no_timesheet')->get()
            ]);
        }
    }
}