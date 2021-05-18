<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    //  protected $guarded = [];

    protected $fillable = [
        'image',
        'productId',
     

    ];

    protected $table = 'image_uploads';

    public function product()
    {
        return $this->belongsToMany('App\Product');
    }
}
