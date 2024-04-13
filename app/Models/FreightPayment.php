<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreightPayment extends Model
{

    protected $table = 'fms_g5freight_payments';
    protected $fillable = [
        'freightService', 'freightAmount', 'freightDate', 'freightDescription', 'freightStatus'
    ];
}
