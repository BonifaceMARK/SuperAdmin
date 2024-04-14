<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FmsG2Budget extends Model
{
    use HasFactory;

    protected $table = 'fms_g2budgets';

    protected $fillable = [
        'reference_no',
        'name',
        'description',
        'amount',
        'start_date',
        'end_date',
        'department',
        'purpose',
        'status',
        'created_by',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
