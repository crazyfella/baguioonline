<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [
        'messages',
        'userId',
        'subject',
        'contact',
        'name',
        'status',
        'product_id'
    ];
}
