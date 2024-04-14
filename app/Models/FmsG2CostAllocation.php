<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FmsG2CostAllocation extends Model
{
    use HasFactory;

    protected $table = 'fms_g2cost_allocations';

    protected $fillable = [
        'reference_no',
        'cost',
        'cost_type',
        'description',
        'budget',
        'start_date',
        'end_date',
        'created_by',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
