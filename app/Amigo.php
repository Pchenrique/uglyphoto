<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amigo extends Model
{
    public function perfil()
    {
        return $this->hasMany('App\Perfil');
    }
}
