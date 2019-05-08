<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\User;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        return view('perfil.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfil = new Perfil;
        $perfil->nome = $request->input('nome');
        $perfil->biografia = $request->input('biografia');
        $perfil->numero = $request->input('numero');
        $perfil->imagem = $request->input('imagem');
        $perfil->user_id = auth()->user()->id;

        $perfil->save();

        return view('perfil.exibir', ['perfil'=>$perfil]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfil = Perfil::find($id);
        return view('perfil.exibir', ['perfil'=>$perfil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = Perfil::find($id);
        return view('perfil.editar', ['perfil'=>$perfil]);
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
        $perfil = Perfil::find($id);
        $perfil->nome = $request->input('nome');
        $perfil->biografia = $request->input('biografia');
        $perfil->numero = $request->input('numero');
        $perfil->imagem = $request->input('imagem');

        $perfil->save();
        return view('perfil.exibir', ['perfil'=>$perfil]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perfil = Perfil::find($id);
        $perfil->delete();

        $user = User::find(auth()->user()->id);
        $user->delete();

        return redirect('login');
    }
}
