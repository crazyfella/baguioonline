<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentAccount extends Model
{
    protected $fillable= [
        'userId',
        'subscription',
        'payment',
        'method',
        'subscription_at',
        'expired_at',
    ];
}
