<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem;
use App\Curtida;

class CurtidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function like($postagem_id){
        
        $user_id = auth()->user()->perfil->id;
        $cont = Curtida::all()->where('perfil_id', '=', $user_id)->where('postagem_id', '=', $postagem_id)->count();

        if($cont==0){
            $curtida = new Curtida;
            $postagem = Postagem::find($postagem_id);
            $curtida->perfil_id = $user_id;
            $postagem->curtidas()->save($curtida);
        }
        if($cont==1){
            $curtida = new Curtida;
            $postagem = Postagem::find($postagem_id);
            $curtida->perfil_id = $user_id;
            $postagem->curtidas()->delete($curtida);
        }
        return redirect('home');
    }
}
