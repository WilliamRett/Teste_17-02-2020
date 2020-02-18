<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'zipcode',
        'address',
        'district',
        'state',
        'city',
        'complement',
        'number_address',
        'cadastro_id'
    ];
}
