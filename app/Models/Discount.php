<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable=[
        'orderId',
        'discounts',
        'totalDiscount',
        'discountedTotal',
    ];

    protected $casts=[
      'discount'=>'json'
    ];
}
