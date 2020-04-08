<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'mac',
        'state',
        'defect',
        'price_buy',
        'price_sale',
        'price_sale_min',
        'price_sale_max',
        'cost',
        'description'
    ];


}
