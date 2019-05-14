<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curtida extends Model
{
    //

    public function postagem()
    {
        return $this->belongsTo('App\Postagem');
    }

    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }
}
