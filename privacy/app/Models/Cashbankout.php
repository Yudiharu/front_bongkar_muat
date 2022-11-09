<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;
use DB;
use Carbon;

class Cashbankout extends Model
{
    protected $connection = 'mysqlpbm';
    protected $table = 'cashbankout';
    protected $primaryKey = 'no_cashbank_out';
    public $incrementing = false;
    
}
