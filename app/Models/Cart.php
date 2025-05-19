<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function product()
{
    return $this->hasOne('App\Models\Product', 'id', 'product_id');
}

public function user()
{
    return $this->hasOne('App\Models\User', 'id', 'user_id');
}

}
