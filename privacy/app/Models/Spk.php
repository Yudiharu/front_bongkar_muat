<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;
use Carbon;

class Spk extends Model
{
    //
    use AuditableTrait;

    protected $table = 'spk';

	public $incrementing = true;

	protected $fillable = [
        'no_joborder',
    	'no_spk',
    	'tipe_kendaraan',
    	'kode_mobil',
    	'kode_sopir',
        'tgl_spk',
        'no_reff',
        'kode_alat',
        'operator',
        'helper1',
        'helper2',
        'lokasi_kerja',
        'status',
        'uang_makan',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function Alat()
    {
        return $this->belongsTo(Alat::class,'kode_alat');
    }

    public function Operator()
    {
        return $this->belongsTo(Operator::class,'operator');
    }

    public function Helper1()
    {
        return $this->belongsTo(Helper::class,'helper1');
    }

    public function Helper2()
    {
        return $this->belongsTo(Helper::class,'helper2');
    }
    
    public function Mobil()
    {
        return $this->belongsTo(Mobil::class,'kode_mobil');
    }
    
    public function Sopir()
    {
        return $this->belongsTo(Sopir::class,'kode_sopir');
    }

    protected $appends = ['destroy_url','edit_url'];

    public function getDestroyUrlAttribute()
    {
        return route('spk.destroy', $this->no_spk);
    }

    public function getEditUrlAttribute()
    {
        return route('spk.edit',$this->no_spk);
    }

    public function getUpdateUrlAttribute()
    {
        return route('spk.update',$this->no_spk);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($query){
            $query->status = '';
            $query->no_spk = static::generateKode(request()->tgl_spk);
            $query->created_by = Auth()->user()->name;
            $query->updated_by = Auth()->user()->name;
        });

        static::updating(function ($query){
           $query->updated_by = Auth()->user()->name;
        });
    }

    public static function generateKode($data)
    {
        $user = Auth()->user()->level;
        // $getkode = TransaksiSetup::where('kode_setup','017')->first();
        // $kode = $getkode->kode_transaksi;
        $kode = 'SPK';
        $primary_key = (new self)->getKeyName();
        $get_prefix_1 = Auth()->user()->kode_company;

        $period = Carbon\Carbon::parse($data)->format('ym');

        $get_prefix_3 = $period;
        $prefix_result = $get_prefix_1.$kode.$get_prefix_3;
        $prefix_result_length = strlen($get_prefix_1.$kode.$get_prefix_3);

        $lastRecort = self::where('no_spk','like',$prefix_result.'%')->orderBy('no_spk', 'desc')->first();

        if ( ! $lastRecort )
            $number = 0;
        else {
            $get_record_prefix = strtoupper(substr($lastRecort->{'no_spk'}, 0,$prefix_result_length));
            if ($get_record_prefix == $prefix_result){
                $number = substr($lastRecort->{'no_spk'},$prefix_result_length);
            }else {
                $number = 0;
            }
        }

        $result_number = $prefix_result . sprintf('%05d', intval($number) + 1);
        return $result_number ;
    }
}
