<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $fillable = [
         'name', 
         'last_name',
         'email',
         'date_birth'
        ];

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function phones()
    {
        return $this->belongsTo('App\Phone');
    }



}
