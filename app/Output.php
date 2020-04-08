<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    const VENTA_MENOR = 'Venta menor';
    const VENTA_MAYOR = 'Venta mayor';
    const CONSUMO_PROPIO = 'Consumo Propio';

    protected $fillable = [
        'id_client',
        'total',
        'date',
        'description',
        'output_type',
        'status'
    ];

}
