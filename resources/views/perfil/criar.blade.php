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
                    @if (session('erro'))
                        <div class="alert alert-danger">
                            {{ session('erro') }}
                        </div>
                    @endif

                    <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data">
						@csrf

							<div class="form-group"> 
					       		<label>Foto do Perfil</label><br>
					            <input class="" name="imagem" type="file">
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