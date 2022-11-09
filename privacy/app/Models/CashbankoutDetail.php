<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;
use DB;
use Carbon;

class CashbankoutDetail extends Model
{
    protected $connection = 'mysqlpbm';
    protected $table = 'cashbankout_detail';
    protected $primaryKey = 'id';
    public $incrementing = false;
    
}
