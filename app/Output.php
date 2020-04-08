<?php

namespace App;

use App\Client;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Output extends Model
{
    use SoftDeletes;

    protected $date = ['deletes_at'];

    const VENTA_MENOR = 'venta_menor';
    const VENTA_MAYOR = 'venta_mayor';
    const CONSUMO_PROPIO = 'consumo_propio';

    protected $fillable = [
        'id_client',
        'total',
        'date',
        'description',
        'output_type',
        'status'
    ];

    public function product(){
        return $this->belongsToMany(Product::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }


}
