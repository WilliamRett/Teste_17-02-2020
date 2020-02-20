<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'zipcode',
        'address',
        'neighborhood',
        'state',
        'city',
        'complement',
        'number',
        'cadastro_id'
    ];
}
