<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymethods extends Model
{
    protected $fillable = [
        'account_name',
        'phone_account_number',
        'payment_method',
        
    ];
}
