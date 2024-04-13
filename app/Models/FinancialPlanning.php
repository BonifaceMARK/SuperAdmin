<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialPlanning extends Model
{
    use HasFactory;

    protected $table = 'fms_g1financial_planning';

    protected $fillable = [
        'name',
        'description',
        'target_revenue',
        'target_expense',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'target_revenue' => 'decimal:2',
        'target_expense' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
