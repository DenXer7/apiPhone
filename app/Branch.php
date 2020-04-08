<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'code_brand',
        'galery',
        'stand',
        'name',
        'city',
        'address',
        'ballot_series',
        'ballot_number'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
