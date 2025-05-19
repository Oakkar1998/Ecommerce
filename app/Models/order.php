<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'status',
        'user_id',
        'product_id',
        'invoice_number',

    ];

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
