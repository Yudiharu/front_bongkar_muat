<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Vendor;
use App\Models\Joborder;
use App\Models\JobrequestDetail;
use App\Models\JoborderDetail;
use App\Models\PemakaianAlatDetail;
use App\Models\MasterLokasi;
use App\Models\tb_akhir_bulan;
use App\Models\Signature;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Alat;
use App\Exports\RekaptsExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use Carbon;
use Response;
use Storage;
use File;

class LaporanrekaptsController extends Controller
{
    public function index()
    {
        $create_url = route('laporanrekapts.create');
        $tgl_jalan = tb_akhir_bulan::where('reopen_status','true')->orwhere('status_periode','Open')->first();
        $tgl_jalan2 = $tgl_jalan->periode;
        $period = Carbon\Carbon::parse($tgl_jalan2)->format('F Y');
        $get_lokasi = MasterLokasi::where('kode_lokasi',auth()->user()->kode_lokasi)->first();
        $nama_lokasi = $get_lokasi->nama_lokasi;

        // $Alat = Alat::where('status','Aktif')->pluck('nama_alat','kode_alat');
        $Alat = Alat::select('kode_alat', DB::raw("concat(nama_alat,' ~ ',no_asset_alat,' ~ ',merk) as alats"))->where('status', 'Aktif')->pluck('alats','kode_alat');

        $Customer = Customer::pluck('nama_customer','id');

        return view('admin.laporanrekapts.index',compact('Customer','Alat','create_url','period','nama_lokasi'));
    }

    public function exportPDF()
    {
        $tanggal_awal = $_GET['tanggal_awal'];
        $tanggal_akhir = $_GET['tanggal_akhir'];
        $report = $_GET['jenis_report'];
        $kode_alat = $_GET['kode_alat'];
        $customer = $_GET['customer'];

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
            if ($customer == 'KOSONG' || $customer == null){
                $pemakaian_alat = PemakaianAlatDetail::Join('pemakaian_alat','pemakaian_alat_detail.no_pemakaian','=','pemakaian_alat.no_pemakaian')->where('pemakaian_alat_detail.kode_alat',$kode_alat)->whereBetween('pemakaian_alat_detail.tgl_pakai', array($tanggal_awal, $tanggal_akhir))->where('pemakaian_alat_detail.status','POSTED')->orderBy('pemakaian_alat_detail.tgl_pakai')->orderBy('pemakaian_alat_detail.no_timesheet')->get();
            }else {
                $pemakaian_alat = PemakaianAlatDetail::Join('pemakaian_alat','pemakaian_alat_detail.no_pemakaian','=','pemakaian_alat.no_pemakaian')->where('pemakaian_alat.kode_customer', $customer)->where('pemakaian_alat_detail.kode_alat',$kode_alat)->whereBetween('pemakaian_alat_detail.tgl_pakai', array($tanggal_awal, $tanggal_akhir))->where('pemakaian_alat_detail.status','POSTED')->orderBy('pemakaian_alat_detail.tgl_pakai')->orderBy('pemakaian_alat_detail.no_timesheet')->get();
            }
            
            $pdf = PDF::loadView('/admin/laporanrekapts/pdf', compact('customer','pemakaian_alat','kode_alat','tanggal_awal','tanggal_akhir','nama','nama2','dt','date','ttd'));
            $pdf->setPaper('a4','landscape');

            return $pdf->stream('Laporan Rekap Time Sheet Alat: '.$kode_alat.' Periode '.$tanggal_awal.' s/d '.$tanggal_akhir.'.pdf');
        }else if ($report == 'excel'){
            return Excel::download(new RekaptsExport($tanggal_awal, $tanggal_akhir, $report, $kode_alat, $customer), 'Laporan Rekap Time Sheet Alat '.$kode_alat.' periode '.$tanggal_awal.' sd '.$tanggal_akhir.'.xlsx');
        }
    }
}
