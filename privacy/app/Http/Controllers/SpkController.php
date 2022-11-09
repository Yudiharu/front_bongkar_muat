<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\JobrequestDetail;
use App\Models\Jobrequest;
use App\Models\Joborder;
use App\Models\tb_akhir_bulan;
use App\Models\tb_item_bulanan;
use App\Models\Sizecontainer;
use App\Models\Trucking;
use App\Models\TruckingDetail;
use App\Models\TarifAlat;
use App\Models\Spk;
use App\Models\Operator;
use App\Models\Helper;
use App\Models\MasterLokasi;
use App\Models\Company;
use App\Models\PemakaianAlatDetail;
use App\Models\Cashbankout;
use App\Models\CashbankoutDetail;
use DB;
use PDF;
use Carbon;

class SpkController extends Controller
{
    public function index()
    {
        $create_url = route('spk.create');
        return view('admin.spk.index',compact('create_url'));
    }

    public function getDatabyID(){
        return Datatables::of(Spk::with('alat','operator','helper1','helper2','mobil','sopir')->where('no_joborder',request()->id)->orderBy('no_spk','asc'))
           ->addColumn('action', function ($query){
                return '<a href="javascript:;" data-toggle="tooltip" title="Edit" onclick="edit(\''.$query->id.'\',\''.$query->edit_url.'\')" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>'.'&nbsp'.
                    '<a href="javascript:;" data-toggle="tooltip" title="Hapus" onclick="del(\''.$query->id.'\',\''.$query->destroy_url.'\')" id="hapus" class="btn btn-danger btn-xs"> <i class="fa fa-times-circle"></i></a>'.'&nbsp';
           })->make(true);
    }

    public function getDatajor(){
        $data = JobrequestDetail::with('alat')->where('no_jobrequest',request()->id)->orderBy('created_at','desc')->get();
        return response()->json($data);
    }

    public function exportPDF(){
        $request = $_GET['no_spk'];
        $spk = Spk::where('no_spk', $request)->first();

        $tgl = $spk->tgl_spk;
        $date=date_create($tgl);
        
        $total_qty = 0;
        
        $get_lokasi = auth()->user()->kode_lokasi;
        $get_company = auth()->user()->kode_company;

        $nama_lokasi = MasterLokasi::find($get_lokasi);
        $nama = $nama_lokasi->nama_lokasi;

        $nama_company = Company::find($get_company);
        $nama2 = $nama_company->nama_company;
        $dt = Carbon\Carbon::now();

        $company = auth()->user()->kode_company;
        
        $pdf = PDF::loadView('/admin/spk/pdf', compact('nama','nama2','dt','request','date','spk','tgl'));
        $pdf->setPaper([0, 0, 684, 792], 'potrait');
        return $pdf->stream('Laporan Job Request '.$request.'.pdf');
    }

    public function Showdetailjobreq()
    {
        $jobrequestdetail = JobrequestDetail::with('sizecontainer')->where('no_jobrequest',request()->id)->orderBy('created_at', 'desc')->get();

        $output = array();
        
            foreach($jobrequestdetail as $row)
            {

                $kode_container = $row->kode_container;
                $kode_size = $row->sizecontainer->nama_size;
                $status_muatan = $row->status_muatan;
                $dari = $row->dari;
                $tujuan = $row->tujuan;

                $output[] = array(
                    'kode_container'=>$kode_container,
                    'kode_size'=>$kode_size,
                    'status_muatan'=>$status_muatan,
                    'dari'=>$dari,
                    'tujuan'=>$tujuan,
                );
            }

        return response()->json($output);
    }

    public function tarif()
    {
        $kode_alat = request()->kode;
        $jr = Jobrequest::where('no_joborder', request()->no_joborder)->first();
        $tarif = TarifAlat::where('kode_alat', $kode_alat)->where('tgl_berlaku', '<=', $jr->tanggal_req)->first();
        if ($tarif != null) {
            $output = array(
                'harga'=>$tarif->tarif,
            );
            return response()->json($output);
        }else {
            $output = array(
                'harga'=>0,
            );
            return response()->json($output);
        }
        
    }

    public function Post()
    {
        $level = auth()->user()->level;
        $cek_bulan = tb_akhir_bulan::where('status_periode','Disable')->first();

        if($level == 'superadministrator' && $cek_bulan == null){
            $permintaan = Jobrequest::find(request()->id);

            $tgl = $permintaan->tanggal_req;
            $tahun = Carbon\Carbon::createFromFormat('Y-m-d',$tgl)->year;
            $bulan = Carbon\Carbon::createFromFormat('Y-m-d',$tgl)->month;

                $permintaan->status = "POSTED";
                $permintaan->save();

                $nama = auth()->user()->name;
                $tmp = ['nama' => $nama,'aksi' => 'Post Job Order: '.$permintaan->no_jobrequest.'.','created_by'=>$nama,'updated_by'=>$nama];
                user_history::create($tmp);

                $message = [
                    'success' => true,
                    'title' => 'Update',
                    'message' => 'Data berhasil di POST.'
                    ];
                return response()->json($message);
        }else{
            $message = [
                        'success' => false,
                        'title' => 'Simpan',
                        'message' => 'Anda tidak mempunyai akses posting data',
                        ];
            return response()->json($message);
        }
        
    }

    public function Unpost()
    {
        $level = auth()->user()->level;
        $cek_bulan = tb_akhir_bulan::where('status_periode','Disable')->first();

        if($level == 'superadministrator' && $cek_bulan == null){
            $permintaan = Jobrequest::find(request()->id);
            
            $tgl = $permintaan->tanggal_req;
            $tahun = Carbon\Carbon::createFromFormat('Y-m-d',$tgl)->year;
            $bulan = Carbon\Carbon::createFromFormat('Y-m-d',$tgl)->month;

                $permintaan->status = "OPEN";
                $permintaan->save();    

                $nama = auth()->user()->name;
                $tmp = ['nama' => $nama,'aksi' => 'Unpost No. Job Order: '.$permintaan->no_jobrequest.'.','created_by'=>$nama,'updated_by'=>$nama];

                user_history::create($tmp);

                $message = [
                    'success' => true,
                    'title' => 'Update',
                    'message' => 'Data berhasil di UNPOST.'
                    ];
                return response()->json($message);
        }else{
            $message = [
                        'success' => false,
                        'title' => 'Simpan',
                        'message' => 'Anda tidak mempunyai akses unposting data',
                        ];
            return response()->json($message);
        }
        
    }

    public function store(Request $request)
    {
        Spk::create($request->all());
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data telah disimpan'
        ];
        return response()->json($message);
    }

    public function store2(Request $request)
    {
        $jobrequestdetail = JobrequestDetail::where('no_jobrequest', $request->no_jobrequest)->where('kode_alat', $request->kode_alat)->get();
        $leng = count($jobrequestdetail);

        if($leng > 0){
            $message = [
                'success' => false,
                'title' => 'Gagal',
                'message' => 'Alat Sudah Ada'
            ];
            return response()->json($message);
        }
        else{
            $jr = Jobrequest::where('no_joborder', $request->no_joborder)->first();
            $simpan = [
                'no_joborder'=>$request->no_joborder,
                'no_jobrequest'=>$request->no_jobrequest,
                'tgl_request'=>$jr->tanggal_req,
                'kode_alat'=>$request->kode_alat,
                'qty'=>$request->qty,
                'harga'=>$request->harga,
                'subtotal'=>$request->subtotal,
            ];
            $jobrequestdetail = JobrequestDetail::create($simpan);
                    
            $hitung = JobrequestDetail::where('no_jobrequest', $request->no_jobrequest)->get();

            $total_item = count($hitung);

            $update_item = [
                'total_item'=>$total_item,
            ];

            $item_update = Jobrequest::where('no_jobrequest', $request->no_jobrequest)->update($update_item);
            $job_update = Joborder::where('no_joborder', $request->no_joborder)->update($update_item);
            // $cektruk = Trucking::where('no_joborder',$request->no_joborder)->first();
            // $cekjob = Jobrequest::where('no_joborder', $request->no_joborder)->first();
            // if ($cektruk != null) {
            //     if ($cektruk->total_item != $cekjob->total_item) {
            //         $cektruk->status_kembali = "FALSE";
            //         $cektruk->save();
            //     }
            // }

            $message = [
                'success' => true,
                'title' => 'Update',
                'message' => 'Data telah disimpan'
            ];
            return response()->json($message);
        }
    }

    public function edit_jobrequest()
    {
        $no_jobrequest = request()->no_spk;
        $data = Spk::where('no_spk',$no_jobrequest)->first();
        $output = array(
            'no_joborder'=>$data->no_joborder,
            'no_spk'=>$data->no_spk,
            'tgl_spk'=>$data->tgl_spk,
            'no_reff'=>$data->no_reff,
            'tipe_kendaraan'=>$data->tipe_kendaraan,
            'uang_makan'=>$data->uang_makan,
            'kode_alat'=>$data->kode_alat,
            'operator'=>$data->operator,
            'helper1'=>$data->helper1,
            'helper2'=>$data->helper2,
            'kode_mobil'=>$data->kode_mobil,
            'kode_sopir'=>$data->kode_sopir,
            'lokasi_kerja'=>$data->lokasi_kerja,
            'tgl_mulai'=>$data->tgl_mulai,
            'tgl_selesai'=>$data->tgl_selesai,
        );
        return response()->json($output);
    }

    public function edit_noreqjo()
    {
        $no_joborder = request()->no_jo;
        $no_jobrequest = request()->no_jobrequest;
        $kode_lama = request()->kode_lama;
        $qty = request()->qty;
        $harga = request()->harga;
        $subtotal = request()->subtotal;

        $jor = JobrequestDetail::where('no_jobrequest',$no_jobrequest)->where('no_joborder',$no_joborder)->where('kode_alat',$kode_lama)->first();

        $jor->kode_alat = request()->kode_alat;
        $jor->qty = $qty;
        $jor->harga = $harga;
        $jor->subtotal = $subtotal;
        $jor->save();
        
        $hitung = JobrequestDetail::where('no_jobrequest',$no_jobrequest)->get();

        $total_item = count($hitung);

        $update_total = [
            'total_item'=>$total_item,
        ];

        $total_update = Jobrequest::where('no_joborder',$no_joborder)->update($update_total);
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data telah disimpan'
        ];
        return response()->json($message);
    }

    // public function edit_noreqjo()
    // {
    //     $no_jobrequest = request()->no_jobrequest;
    //     $kode_container = request()->kode_container;
    //     $data = JobrequestDetail::where('no_jobrequest',$no_jobrequest)->where('kode_container',$kode_container)->first();
    //     $output = array(
    //         'id'=>$data->id,
    //         'no_joborder'=>$data->no_joborder,
    //         'no_jobrequest'=>$data->no_jobrequest,
    //         'kode_container'=>$data->kode_container,
    //         'kode_size'=>$data->kode_size,
    //         'status_muatan'=>$data->status_muatan,
    //         'dari'=>$data->dari,
    //         'tujuan'=>$data->tujuan,
    //     );
    //     return response()->json($output);
    // }

    public function updateAjax(Request $request)
    {
        $save = Spk::where('no_spk', $request->no_spk)->update($request->except(['_token']));

        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data telah disimpan'
        ];
        return response()->json($message);
    }

    public function hapus_jobrequest()
    {   
        $no_jobrequest = request()->no_spk;

        $cekpakai = PemakaianAlatDetail::where('no_spk', request()->no_spk)->first();
        if ($cekpakai != null){
            $message = [
                'success' => false,
                'title' => 'Update',
                'message' => 'Nomor SPK ['.$no_jobrequest.'] sudah ditarik di Pemakaian Alat.'
            ];
            return response()->json($message);
        }
        
        $cbo = CashbankoutDetail::on('mysqlpbm')->where('no_spk', request()->no_spk)->first();
        if ($cbo != null){
            $message = [
                'success' => false,
                'title' => 'Update',
                'message' => 'Nomor SPK ['.$no_jobrequest.'] sudah ditarik di CBO No ['.$cbo->no_cashbank_out.']'
            ];
            return response()->json($message);
        }

        Spk::where('no_spk',$no_jobrequest)->delete();

        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data ['.$no_jobrequest.'] telah dihapus.'
        ];
        return response()->json($message);
    }

    public function hapus_noreqjo()
    {   
        $no_joborder = request()->no_joborder;
        $no_jobrequest = request()->no_jobrequest;
        $kode_container = request()->kode_alat;
        
        $data = JobrequestDetail::where('no_jobrequest',$no_jobrequest)->where('kode_alat',$kode_container)->first();

        $data->delete();

        $hitung = JobrequestDetail::where('no_jobrequest', $no_jobrequest)->get();

        $total_item = count($hitung);

        $update_item = [
            'total_item'=>$total_item,
        ];

        $item_update = Jobrequest::where('no_jobrequest', $no_jobrequest)->update($update_item);
        $job_update = Joborder::where('no_joborder', $no_joborder)->update($update_item);

        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data ['.$data->kode_alat.'] telah dihapus.'
        ];
        return response()->json($message);
    }
}
