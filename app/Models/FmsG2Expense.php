<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FmsG2Expense extends Model
{
    use HasFactory;

    protected $table = 'fms_g2expenses';

    protected $fillable = [
        'reference_no',
        'expense_type',
        'title',
        'description',
        'amount',
        'date',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'date',
    ];
}
