<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;
use App\Models\Produk;

class Catatanpo extends Model
{
    //
    use AuditableTrait;

    protected $table = 'catatanpo';

    protected $primaryKey = 'nomor';

    public $incrementing = false;

    protected $fillable = [
        'nomor',
        'catatan',    
    ];

    public function getDestroyUrlAttribute()
    {
        return route('catatanpo.destroy', $this->nomor);
    }

    public function getEditUrlAttribute()
    {
        return route('catatanpo.edit',$this->nomor);
    }

    public function getUpdateUrlAttribute()
    {
        return route('catatanpo.update',$this->nomor);
    }

    public static function boot()
    {
        parent::boot();
       
        static::creating(function ($query){
            $query->kode_company = Auth()->user()->kode_company;
            $query->nomor = static::generateKode(Auth()->user()->nomor);
            $query->created_by = Auth()->user()->name;
            $query->updated_by = Auth()->user()->name;
        });

        static::updating(function ($query){
           $query->updated_by = Auth()->user()->name;
        });
    }

    public static function generateKode($sumber_text)
    {
        $primary_key = (new self)->getKeyName();
        $get_prefix_2 = strtoupper($sumber_text);
        $prefix_result = $get_prefix_2;
        $prefix_result_length = strlen($prefix_result);

        $lastRecort = Catatanpo::where($primary_key,'like',$prefix_result.'%')->orderBy('nomor', 'desc')->first();

        if ( ! $lastRecort )
            $number = 0;
        else {
            $get_record_prefix = strtoupper(substr($lastRecort->{$primary_key}, 0,$prefix_result_length));
            if ($get_record_prefix === $prefix_result){
                $number = substr($lastRecort->{$primary_key},$prefix_result_length);
            }else {
                $number = 0;
            }

        }

        $result_number = $prefix_result . sprintf('%03d', intval($number) + 1);

        return $result_number ;
    }

}
