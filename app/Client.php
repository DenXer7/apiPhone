<?php

namespace App;

use App\Output;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{   
    use SoftDeletes;

    protected $dates = ['deletes_at'];

    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'phone1',
        'phone2',
        'birthdate',
        'city'
    ];


    public function output(){
        return $this->hasMany(Output::class);
    }
}
