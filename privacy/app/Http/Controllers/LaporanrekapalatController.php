<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Vendor;
use App\Models\Joborder;
use App\Models\JobrequestDetail;
use App\Models\JoborderDetail;
use App\Models\MasterLokasi;
use App\Models\tb_akhir_bulan;
use App\Models\Signature;
use App\Models\Company;
use App\Models\Customer;
use App\Models\InsentifoperatorDetail;
use App\Models\Insentifoperator;
use App\Models\PemakaianAlatDetail;
use App\Models\PemakaianAlat;
use App\Exports\RekapPremiAlatExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use Carbon;
use Response;
use Storage;
use File;

class LaporanrekapalatController extends Controller
{
    public function index()
    {
        $create_url = route('laporanrekapalat.create');
        $tgl_jalan = tb_akhir_bulan::where('reopen_status','true')->orwhere('status_periode','Open')->first();
        $tgl_jalan2 = $tgl_jalan->periode;
        $period = Carbon\Carbon::parse($tgl_jalan2)->format('F Y');
        $get_lokasi = MasterLokasi::where('kode_lokasi',auth()->user()->kode_lokasi)->first();
        $nama_lokasi = $get_lokasi->nama_lokasi;

        return view('admin.laporanrekapalat.index',compact('create_url','period','nama_lokasi'));
    }

    public function exportPDF()
    {   
        $report = $_GET['jenis_report'];
        $bulan = $_GET['month'];
        $tahun = $_GET['year'];

        if(isset($_GET['ttd'])){
            $format_ttd = $_GET['ttd'];
        }else{
            $format_ttd = 0;
        }
        $ttd = auth()->user()->name;

        $get_lokasi = auth()->user()->kode_lokasi;
        $get_company = auth()->user()->kode_company;
        $date = date("Y-m-d h-m-i");

        $nama_lokasi = MasterLokasi::find($get_lokasi);
        $nama = $nama_lokasi->nama_lokasi;

        $nama_company = Company::find($get_company);
        $nama2 = $nama_company->nama_company;
        $dt = Carbon\Carbon::now();

        if ($report=='PDF'){
            $pakaialat = InsentifoperatorDetail::select('kode_alat')->join('insentif_operator','insentif_operator_detail.no_insentif','=','insentif_operator.no_insentif')->whereMonth('insentif_operator.tgl_insentif', $bulan)->whereYear('insentif_operator.tgl_insentif', $tahun)->groupBy('kode_alat')->get();
            $pdf = PDF::loadView('/admin/laporanrekapalat/pdf', compact('pakaialat','bulan','tahun','nama','nama2','dt','date','dt','ttd','format_ttd'));
            $pdf->setPaper('a4','portrait');

            return $pdf->stream('Rekap Premi Alat Periode '.$bulan.' ~ '.$tahun.'.pdf');
        }else if ($report == 'excel'){
            return Excel::download(new RekapPremiAlatExport($bulan, $tahun, $report), 'Laporan Rekap Alat '.$bulan.' sd '.$tahun.'.xlsx');
        }
    }
}
