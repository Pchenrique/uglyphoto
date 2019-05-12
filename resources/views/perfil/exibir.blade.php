@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil do {{$perfil->nome}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="C:\xampp\htdocs\uglyphoto\public\imagem-perfil\perfil-id_6.jpg" width="200" height="200">
                    {{$perfil->imagem}}
                    <p><strong>Nome:</strong> {{$perfil->nome}}</p>
                    <p><strong>Biografia:</strong> {{$perfil->biografia}}</p>
                    <p><strong>numero:</strong> {{$perfil->numero}}</p>
                    <p><a href="{{route('perfil.edit', $perfil->id)}}">Editar Perfil</p>
                    <p>
                        <form method="post" action="{{route('perfil.destroy',   $perfil->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="excluir perfil">
                        </form>
                    </p>
                
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection