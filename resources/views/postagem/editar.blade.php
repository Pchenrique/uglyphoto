@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Postagem</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('postagem.update', $postagem->id)}}" method="POST">
						@csrf
                        @method('PUT')
					       	<div class="form-group"> 
					       		<label>Legenda</label>  
					            <input class="form-control" name="legenda" type="text" value="{{$postagem->legenda}}">
					        </div>

					        <button type="submit">Postar</button>   
					    
					</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection