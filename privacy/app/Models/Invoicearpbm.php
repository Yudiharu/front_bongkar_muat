<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;
use DB;
use Carbon;

class Invoicearpbm extends Model
{
    protected $connection = 'mysqlpbm';
    protected $table = 'invoice_arpbm';
    protected $primaryKey = 'no_invoice';
    public $incrementing = false;
    
}
