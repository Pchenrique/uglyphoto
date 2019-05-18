<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
	protected $table = 'postagens';
    //

    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }

    public function curtidas()
    {
        return $this->hasMany('App\Curtida');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }
}
