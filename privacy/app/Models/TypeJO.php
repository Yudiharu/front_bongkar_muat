<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;


class TypeJO extends Model
{
    //

    use AuditableTrait;

    protected $table = 'type_jo';

	protected $primaryKey = 'id';

	public $incrementing = false;

	protected $fillable = [
    	'description',
    ];
    
     public function getDestroyUrlAttribute()
    {
        return route('typejo.destroy', $this->id);
    }

    public function getEditUrlAttribute()
    {
        return route('typejo.edit',$this->id);
    }

    public function getUpdateUrlAttribute()
    {
        return route('typejo.update',$this->id);
    }
    
    public static function boot()
    {
        parent::boot();
       
        static::creating(function ($query){
           $query->kode_company = Auth()->user()->kode_company;
           $query->created_by = Auth()->user()->name;
           $query->updated_by = Auth()->user()->name;
        });

        static::updating(function ($query){
           $query->updated_by = Auth()->user()->name;
        });
    }
}
