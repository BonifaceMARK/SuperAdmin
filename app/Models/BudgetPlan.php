<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetPlan extends Model
{
    protected $table = 'fms_g1budget_plan';

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
