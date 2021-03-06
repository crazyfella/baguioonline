<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable= [
        'category',
        'name',
        'phone',
        'email',
        'subject',
        'message'
    ];
}
