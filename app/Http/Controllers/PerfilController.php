<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Perfil;
use App\User;
use File;


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

       if(Input::file('imagem')){
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();

            if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg'){
                return back()->with('erro','Erro: Este arquivo não é imagem');
            }
        }

        $perfil = new Perfil;
        $perfil->nome = $request->input('nome');
        $perfil->biografia = $request->input('biografia');
        $perfil->numero = $request->input('numero');
        $perfil->imagem = "";
        $perfil->user_id = auth()->user()->id;

        $perfil->save();

        if(Input::file('imagem')){
            File::move($imagem,public_path().'\imagem-perfil\perfil-id_'.$perfil->id.'.'.$extensao);
            $perfil->imagem = public_path().'\imagem-perfil\perfil-id_'.$perfil->id.'.'.$extensao;
            $perfil->save();
        }

        return redirect('home');
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

        if(Input::file('imagem')){
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();

            if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg'){
                return back()->with('erro','Erro: Este arquivo não é imagem');
            }
        }

        $perfil = Perfil::find($id);
        $perfil->nome = $request->input('nome');
        $perfil->biografia = $request->input('biografia');
        $perfil->numero = $request->input('numero');
        $perfil->imagem;

        $perfil->save();

        if(Input::file('imagem')){
            File::move($imagem,public_path().'\imagem-perfil\perfil-id_'.$perfil->id.'.'.$extensao);
            $perfil->imagem = public_path().'\imagem-perfil\perfil-id_'.$perfil->id.'.'.$extensao;
            $perfil->save();
        }
        return redirect('home');
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
