<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'fms_g7clients';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'zip_code',
        'city',
        'region',
        'email',
        'admission_id',
        'phone_number',
        'upload',
        'signature',
    ];
}

