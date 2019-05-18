<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    
    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }

    public function postagem()
    {
        return $this->belongsTo('App\Postagem');
    }
}
