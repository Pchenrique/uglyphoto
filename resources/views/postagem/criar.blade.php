@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nova Postagem</div>

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

                    <form action="{{route('postagem.store')}}" method="POST" enctype="multipart/form-data">
						@csrf

							<div class="form-group"> 
					       		<label>Foto da Postagem</label><br>
					            <input class="" name="caminho" type="file">
					        </div>

					       	<div class="form-group"> 
					       		<label>Legenda</label>  
					            <input class="form-control" name="legenda" type="text">
					        </div>

					        <button type="submit">Postar</button>   
					    
					</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection