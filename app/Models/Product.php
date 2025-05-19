<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'Product_name	',
        'Price',
        'Product_Quantity',
        'Product_Description',
        'Product_Image',
        'Category_name',
    ];
}
