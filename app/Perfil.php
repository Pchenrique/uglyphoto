<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function postagens()
    {
        return $this->hasMany('App\Postagem');
    }

    public function curtidas()
    {
        return $this->hasMany('App\Curtida');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentarios');
    }
}
