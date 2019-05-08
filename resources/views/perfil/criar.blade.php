@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro do perfil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('perfil.store')}}" method="POST">
						@csrf

							<div class="form-group"> 
					       		<label>imagem</label>  
					            <input class="form-control" name="imagem" type="text">
					        </div>

					       	<div class="form-group"> 
					       		<label>Nome</label>  
					            <input class="form-control" name="nome" type="text" value="{{auth()->user()->name}}">
					        </div>

					        <div class="form-group"> 
					       		<label>biografia</label>  
					            <input class="form-control" name="biografia" type="text">
					        </div>

					         <div class="form-group"> 
					       		<label>Numero</label>  
					            <input class="form-control" name="numero" type="text">
					        </div>

					        <button type="submit">Enviar</button>   
					    
					</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection