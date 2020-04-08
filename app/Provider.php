<?php

namespace App;

use App\Buyer\Buyer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    protected $dates = ['deletes_at'];

    protected $fillable = [
        'names',
        'phone1',
        'phone2'
    ];

    public function buyer(){
        return $this->hasMany(Buyer::class);
    }
}
