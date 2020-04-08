<?php

namespace App;

use App\ModelProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $dates = ['deletes_at'];
    
    protected $fillable = [
        'name',
        'description'
    ];

    public function modelProduct(){
        return $this->hasMany(ModelProduct::class);
    }
}
