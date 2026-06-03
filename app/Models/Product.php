<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'prod_tab';

    protected $fillable = [
        'name',
        'type',
        'brand',
        'mrp',
        'buy_price',
        'sell_price',
        'quantity'
    ];
}
