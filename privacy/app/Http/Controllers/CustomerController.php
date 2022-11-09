<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Customer;
use App\Models\MembershipCustomer;
use App\Models\MembershipDetail;
use App\Models\tb_akhir_bulan;
use App\Models\MasterLokasi;
use App\Models\Company;
use App\Models\Joborder;
use App\Models\JenisHarga;
use Carbon;
use DB;

class CustomerController extends Controller
{
    public function index()
    {
        $create_url = route('customer.create');

        $Jenis = JenisHarga::pluck('description','id');

        $tgl_jalan = tb_akhir_bulan::where('reopen_status','true')->orwhere('status_periode','Open')->first();
        $tgl_jalan2 = $tgl_jalan->periode;
        $period = Carbon\Carbon::parse($tgl_jalan2)->format('F Y');
        $get_lokasi = MasterLokasi::where('kode_lokasi',auth()->user()->kode_lokasi)->first();
        $nama_lokasi = $get_lokasi->nama_lokasi;
        
        $get_company = Company::where('kode_company',auth()->user()->kode_company)->first();
        $nama_company = $get_company->nama_company;

        $level = auth()->user()->level;
        return view('admin.customer.index',compact('create_url','period', 'nama_lokasi','nama_company','Jenis'));
    }

    public function anyData()
    {
        return Datatables::of(Customer::with('coa')->orderby('nama_customer','asc'))->make(true);
    }

    public function store(Request $request)
    {
            $nama_customer = $request->nama_customer;
            $cek_customer = Customer::where('nama_customer',$nama_customer)->first();
            if($cek_customer == null){
                Customer::create($request->all());

                if($request->telp == null || $request->telp == 0){
                    $telp = '(    )-';
                }else{
                    $telp = $request->telp;
                }

                if($request->hp == null || $request->hp == 0){
                    $hp = '(    )-';
                }else{
                    $hp = $request->hp;
                }

                if($request->fax == null || $request->fax == 0){
                    $fax = '(    )-';
                }else{
                    $fax = $request->fax;
                }

                if($request->contact_pic == null || $request->contact_pic == 0){
                    $contact_pic = '(    )-';
                }else{
                    $contact_pic = $request->contact_pic;
                }

                if($request->npwp == null || $request->npwp == 0){
                    $npwp = '.   .   . -   .';
                }else{
                    $npwp = $request->npwp;
                }

                $update_info = [
                    'telp'=>$telp,
                    'hp'=>$hp,
                    'fax'=>$fax,
                    'contact_pic'=>$contact_pic,
                    'npwp'=>$npwp,
                ];

                $update_customer = Customer::where('nama_customer', $nama_customer)->update($update_info);
                    
                $konversi_simbol = Customer::where('nama_customer', 'LIKE', '%&%')->update(['nama_customer' => DB::raw("REPLACE(nama_customer,  '&', 'DAN')")]);

                $konversi_simbol2 = Customer::where('nama_customer_po', 'LIKE', '%&%')->update(['nama_customer_po' => DB::raw("REPLACE(nama_customer_po,  '&', 'DAN')")]);
        
                $konversi_simbol3 = Customer::where('alamat', 'LIKE', '%&%')->update(['alamat' => DB::raw("REPLACE(alamat,  '&', 'DAN')")]);
        
                $konversi_simbol4 = Customer::where('alamat2', 'LIKE', '%&%')->update(['alamat2' => DB::raw("REPLACE(alamat2,  '&', 'DAN')")]);
        
                $konversi_simbol5 = Customer::where('alamat3', 'LIKE', '%&%')->update(['alamat3' => DB::raw("REPLACE(alamat3,  '&', 'DAN')")]);
        
                $konversi_simbol6 = Customer::where('alamat4', 'LIKE', '%&%')->update(['alamat4' => DB::raw("REPLACE(alamat4,  '&', 'DAN')")]);
        
                $konversi_simbol7 = Customer::where('nama_kontak', 'LIKE', '%&%')->update(['nama_kontak' => DB::raw("REPLACE(nama_kontak,  '&', 'DAN')")]);

                $message = [
                    'success' => true,
                    'title' => 'Simpan',
                    'message' => 'Data telah disimpan.'
                ];
                return response()->json($message);
            }
            else{
                $message = [
                    'success' => false,
                    'title' => 'Simpan',
                    'message' => 'Nama customer Sudah Ada',
                ];
                return response()->json($message);
            }  
    }

    public function detail($customer)
    {
        $member = Customer::where('id',$customer)->first();
                    
        $memberdetail = MembershipDetail::where('kode_customer', $member->id)->orderBy('created_at','desc')->get();

        $list_url= route('customer.index');
        
        $tgl_jalan = tb_akhir_bulan::where('reopen_status','true')->orwhere('status_periode','Open')->first();
        $tgl_jalan2 = $tgl_jalan->periode;
        $period = Carbon\Carbon::parse($tgl_jalan2)->format('F Y');
        $get_lokasi = MasterLokasi::where('kode_lokasi',auth()->user()->kode_lokasi)->first();
        $nama_lokasi = $get_lokasi->nama_lokasi;
        
        $get_company = Company::where('kode_company',auth()->user()->kode_company)->first();
        $nama_company = $get_company->nama_company;

        return view('admin.membershipdetail.index', compact('member','memberdetail','list_url','Mobil','period','nama_lokasi','nama_company','vendor'));
    }

    public function edit_customer()
    {
        $kode_customer = request()->id;
        $data = Customer::find($kode_customer);
        $output = array(
            'kode_customer'=>$data->id,
            'nama_customer'=>$data->nama_customer,
            'nama_customer_po'=>$data->nama_customer_po,
            'email'=>$data->email,
            'alamat'=>$data->alamat,
            'alamat2'=>$data->alamat2,
            'alamat3'=>$data->alamat3,
            'alamat4'=>$data->alamat4,
            'tipe'=>$data->jenis_harga,
            'kota'=>$data->kota,
            'kode_pos'=>$data->kode_pos,
            'telp'=>$data->telp,
            'fax'=>$data->fax,
            'hp'=>$data->hp,
            'nama_kontak'=>$data->nama_kontak,
            'contact_pic'=>$data->contact_pic,
            'npwp'=>$data->npwp,
            'type_company'=>$data->type_company,
            'no_kode_pajak'=>$data->no_kode_pajak,
            'status'=>$data->status,
        );
        return response()->json($output);
    }

    public function updateAjax(Request $request)
    {
        $kode_customer = $request->kode_customer;
        $cek_transaksi = Joborder::where('kode_customer',$kode_customer)->first();

        // if ($cek_transaksi == null){
                $datas= $request->all();
                if($request->numbertelp == 0){
                    $datas['telp'] = '(    )-';
                }else{
                    $datas['telp'] = $request->telp;
                }
                if($request->number1 == 0){
                    $datas['hp'] = '(    )-';
                }else{
                    $datas['hp'] = $request->hp;
                }
                if($request->numberfax == 0){
                    $datas['fax'] = '(    )-';
                }else{
                    $datas['fax'] = $request->fax;
                }
                if($request->numberpic == 0){
                    $datas['contact_pic'] = '(    )-';
                }else{
                    $datas['contact_pic'] = $request->contact_pic;
                }
                if($request->number == 0){
                    $datas['npwp'] = '.   .   . -   .';
                }else{
                    $datas['npwp'] = $request->npwp;
                }
                   
                $update = Customer::find($request->kode_customer)->update($datas);
       
                $message = [
                    'success' => true,
                    'title' => 'Update',
                    'message' => 'Data telah di Update.'
                ];
                return response()->json($message);
        // }else{
        //     $message = [
        //         'success' => false,
        //         'title' => 'Update',
        //         'message' => 'Data ['.$request->nama_customer.'] dipakai dalam transaksi.'
        //     ];
        //     return response()->json($message);
        // }
    }

    public function hapus_customer()
    {   
        $kode_customer = request()->id;
        $customer = Customer::find(request()->id);
        $cek_transaksi = Joborder::where('kode_customer',$kode_customer)->first();

        if ($cek_transaksi == null){
            $customer->delete();

            $message = [
                'success' => true,
                'title' => 'Update',
                'message' => 'Data ['.$customer->nama_customer.'] telah dihapus.'
            ];
            return response()->json($message);
        }else{
            $message = [
                'success' => false,
                'title' => 'Update',
                'message' => 'Data ['.$customer->nama_customer.'] dipakai dalam transaksi.'
            ];
            return response()->json($message);
        }
    }

}
