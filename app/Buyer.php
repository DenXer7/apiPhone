<?php

namespace App;

use App\Product;
use App\Provider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends Model
{
    use SoftDeletes;

    protected $dates = ['deletes_at'];

    const FINALIZADO = 'finalizado';
    const CANCELADO = 'cancelado';
    const XPAGAR = 'xpagar';


    protected $fillable = [
        'date',
        'total',
        'state'
    ];
    

    public function product(){
        return $this->belongsToMany(Product::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

}