<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style_criacao_perfil.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/logo.png')}}" alt="">
            </a> 
        </div>      
    </nav>
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
                                    <label>Número</label>  
                                    <input class="form-control" name="numero" type="text">
                                </div>

                                <button class="btn btn-outline-info" type="submit" id="criar">Enviar</button>   
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>