<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'fms_g7vendors';

    protected $fillable = [
        'full_name',
        'company_name',
        'gender',
        'contact_no',
        'city',
        'zip_code',
        'region',
        'address',
        'contract_start',
        'contract_due',
        'payment_method',
        'payment_term',
        'signature',
        'bir_2302',
        'sec_dti_reg',
        'business_perm',
        'accred_docu',
        'other_docu',
    ];
}
