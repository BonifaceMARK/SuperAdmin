<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investments extends Model
{
    protected $fillable = ['user_id', 'amount','tax_amount', 'investment_date'];

    protected $table = 'fms10_investments';


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
