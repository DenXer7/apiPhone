<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'phone1',
        'phone2',
        'birthdate',
        'city'
    ];
}
