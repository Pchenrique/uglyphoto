<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Postagem;
use App\User;
use File;

class PostagemController extends Controller
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
        return view('postagem.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Input::file('caminho')){
            $imagem = Input::file('caminho');
            $extensao = $imagem->getClientOriginalExtension();

            if($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg'){
                return back()->with('erro','Erro: Este arquivo não é imagem');
            }
        }

        $user = User::find(auth()->user()->id);
        $id = $user->perfil->id;

        $postagem = new Postagem;
        $postagem->legenda = $request->input('legenda');
        $postagem->caminho = "";
        $postagem->curtidas = 0;
        $postagem->perfil_id = $id;

        $postagem->save();

        if(Input::file('caminho')){
            File::move($imagem,public_path().'\imagem-postagem\postagem-id_'.$postagem->id.'.'.$extensao);
            $postagem->caminho = public_path().'\imagem-postagem\postagem-id_'.$postagem->id.'.'.$extensao;
            $postagem->save();
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
        $postagem = Postagem::find($id);
        return view('postagem.editar', ['postagem'=>$postagem]);
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
        $postagem = Postagem::find($id);
        $postagem->legenda = $request->input('legenda');
        $postagem->imagem;
        $postagem->save();
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
}
