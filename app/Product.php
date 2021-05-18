<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Product extends Model

{

    protected $fillable= [

        'userId',

        'productName',

        'productSlug',

        'productBrand',

        'productPrice',

        'productDescription',

        'productColor',

        'productSize',

        'photo',

        'productSlug',

        'view',

        'status'

        // 'productCategory'

    ];



    public function productImages()

    {

        return $this->hasMany('App\ImageUpload');

    }



    public function categories()

    {

        return $this->belongsToMany('App\Sub_categories');

    }

}

