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

                    <p><strong>Nome:</strong> {{$perfil->nome}}</p>
                    <p><strong>Biografia:</strong> {{$perfil->biografia}}</p>
                    <p><strong>numero:</strong> {{$perfil->numero}}</p>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection