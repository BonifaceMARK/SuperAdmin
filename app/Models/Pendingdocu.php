<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\user;
class Pendingdocu extends Model
{
    use HasFactory;

    protected $table ="pendingdocus";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'budget',
        'description',
        'status',
        'submitted_by',
        'reference',
        'created_at'

    ];

    public function comment()
    {
        return $this->hasOne(Comment::class, 'pendingdocu_id');
    }
}

