<?php

namespace App;

use App\Branch;
use App\Output;
use App\Buyer;
use App\Maintenance;
use App\ModelProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deletes_at'];

    // ESTADO EQUIPO
    const VERIFICANDO = 'verificando';
    const MANTENIMIENTO = 'mantenimiento';
    const DISPONIBLE = 'disponible';
    const GARANTIA = 'garantia';
    const CANCELADO = 'cancelado';
    const ESPERA = 'espera';
    const REPUESTO = 'repuesto';
    const VENDIDO = 'VENDIDO';

    // DEFECTO EQUIPO
    const DETALLE = 'true';
    const SINDETALLE = 'false';



    protected $fillable = [
        'mac',
        'state',
        'detail',
        'price_buyer',
        'price_sale',
        'price_sale_min',
        'price_sale_max',
        'cost',
        'description'
    ];


    // ========= RELACIONES ============

    public function buyers(){
        return $this->belongsTo(Buyer::class);
    }

    public function modelProduct(){
        return $this->belongsTo(ModelProduct::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function maintenance(){
        return $this->hasMany(Maintenance::class);
    }

    public function output(){
        return $this->belongsToMany(Output::class);
    }
}
