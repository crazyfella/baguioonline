<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{

    protected $fillable= [
        'product_id',
        'category_id'
    ];
    protected $table = 'product_category';
}
