<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Models\tb_akhir_bulan;
use App\Models\Joborder;
use App\Models\Trucking;
use App\Models\Truckingnon;
use App\Models\Spb;
use App\Models\Spbnon;
use App\Models\sessions;
use App\Models\MasterLokasi;
use App\Models\Company;
use App\Models\Chat;
use App\User;
use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $lokasi = auth()->user()->kode_lokasi;
        $company = auth()->user()->kode_company;

        $joborder_open = Joborder::where('status','1')->get();
        $leng = $joborder_open->count();

        $truck_open = Trucking::where('status','OPEN')->get();
        $leng2 = $truck_open->count();

        $trucknon_open = Truckingnon::where('status','OPEN')->get();
        $leng3 = $trucknon_open->count();

        $tgl_jalan = tb_akhir_bulan::where('reopen_status','true')->orwhere('status_periode','Open')->first();
        $tgl_jalan2 = $tgl_jalan->periode;
        $period = Carbon\Carbon::parse($tgl_jalan2)->format('F Y');

        $get_lokasi = MasterLokasi::where('kode_lokasi',auth()->user()->kode_lokasi)->first();
        $nama_lokasi = $get_lokasi->nama_lokasi;
        
        $get_company = Company::where('kode_company',auth()->user()->kode_company)->first();
        $nama_company = $get_company->nama_company;

        $level = auth()->user()->level;
        $nama_user = auth()->user()->username;
        
        $files = glob('/home/u5611458/public_html/aplikasi/gui_front_02/privacy/storage/debugbar/*'); // get all file names
        foreach($files as $file){ // iterate files
          if(is_file($file)) {
            unlink($file); // delete file
          }
        }
        
        $files2 = glob('/home/u5611458/public_html/aplikasi/gui_front_02/privacy/storage/logs/laravel.log'); // get all file names
        foreach($files2 as $file2){ // iterate files
          if(is_file($file2)) {
            unlink($file2); // delete file
          }
        }

        $user_login = User::join('sessions', 'users.id', '=', 'sessions.user_id')
                ->get();
        $leng4 = $user_login->count();

        $user_login2 = User::select('users.name')
                ->where('users.kode_company',auth()->user()->kode_company)
                ->get();

        $chat = Chat::join('users', 'users_chat.to_id', '=', 'users.id')
                ->get();  
        $leng_chat = $chat->count();

        return view('home',compact('period','leng','joborder_open', 'truck_open', 'trucknon_open', 'user_login', 'leng2', 'leng3', 'leng4', 'nama_lokasi', 'level','nama_company','nama_user', 'user_login2', 'chat', 'leng_chat','company'));
    }


    public function savechat(Request $request)
    {
        $from_id = auth()->user()->id;
        $pesan = $request->pesan;
        $tujuan = $request->tujuan;

        $gettujuan_id = User::where('name',$tujuan)->first();
        $to_id = $gettujuan_id->id;

        $chat = [
            'from_id'=>$from_id,
            'to_id'=>$to_id,
            'chat'=>$pesan,
        ];

        $savechat = Chat::create($chat);
        return redirect()->back();
    }

}
