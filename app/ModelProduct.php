<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    protected $fillable = [
        'name',
        'description',
        'stock'
    ];
}
