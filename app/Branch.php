<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deletes_at'];

    protected $fillable = [
        'galery',
        'stand',
        'name',
        'city',
        'address',
        'ticket_series',
        'ticket_number'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
