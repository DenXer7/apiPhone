<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintenance extends Model
{
    use SoftDeletes;

    protected $date = ['deletes_at'];

    const REALIZADO = 'realizado';
    const CANCELADO = 'cancelado';
    const PROCESO = 'proceso';
    const DEVUELTO = 'devuelto';
    
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'date',
        'description',
        'technical',
        'state'
    ];


    public function product(){
        return $this->belongsTo(Product::class);
    }


}
