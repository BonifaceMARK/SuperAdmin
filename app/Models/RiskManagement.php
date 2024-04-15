<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskManagement extends Model
{
    use HasFactory;

    protected $table = 'fms_g5risk_managements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'status',
        'probability',
        'impact',
        'severity',
    ];
}
