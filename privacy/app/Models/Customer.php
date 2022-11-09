<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;

class customer extends Model
{
    //
    use AuditableTrait;
  
    protected $table = 'customer';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_customer',
        'nama_customer_po',     
        'jenis_harga',     
        'tipe',
        'email',
        'alamat',
        'alamat2',
        'alamat3',
        'alamat4',
        'kota',
        'kode_pos',
        'telp',
        'fax',
        'hp',
        'npwp',
        'nama_kontak',
        'contact_pic',
        'type_company',
        'jenis_cust',
        'cost_center',
        'status_aging',
        'no_kode_pajak',
        'kode_coa',
        'status',
    ];

    public function Coa()
    {
        return $this->belongsTo(Coa::class,'kode_coa');
    }

     public function getDestroyUrlAttribute()
    {
        return route('customer.destroy', $this->id);
    }

    public function getEditUrlAttribute()
    {
        return route('customer.edit',$this->id);
    }

    public function getUpdateUrlAttribute()
    {
        return route('customer.update',$this->id);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($query){
            $query->status_aging = '0';

            //Coa Piutang Usaha
            $get_setup = Systemsetup::find('19');
            $get_coa = $get_setup->kode_setup;

            $query->kode_coa = $get_coa;
            $query->no_kode_pajak = '010';
            $query->jenis_cust = 'PBM';
            $query->created_by = Auth()->user()->name;
            $query->updated_by = Auth()->user()->name;
        });

        static::updating(function ($query){
           $query->updated_by = Auth()->user()->name;
        });
    }
}
