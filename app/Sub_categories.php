<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    protected $guarded = [];

    protected $table = 'sub_categories';

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
