<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $perfil = $user->perfil;

        return view('perfil.exibir',['perfil'=>$perfil]);
    }


}
