<?php

namespace App;

use App\Product;
use App\Provider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    // const FINALIZADO = 'pagado';
    // const XPAGAR = 'xpagar';



    protected $fillable = [
        'model',
        'price_buyer',
        'detail',
    ];


    public function products(){
        return $this->hasMany(Product::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    // public function scopeBuyer($query, $model){
    //     $query->where('model', $model);
    // }

}
