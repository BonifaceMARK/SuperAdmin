<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = ['pendingdocu_id', 'comment'];


    public function document()
    {
        return $this->belongsTo(Pendingdocu::class, 'pendingdocu_id');
    }
}
