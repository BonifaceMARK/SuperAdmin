<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreightPayment extends Model
{
    protected $fillable = [
        'freightService', 'freightAmount', 'freightDate', 'freightDescription', 'freightStatus'
    ];
}
