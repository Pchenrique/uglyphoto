<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Amigo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Style_perfil_amigo.css')}}">
</head>
<body>
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="col-lg-6 text-center">
                    <img src="{{asset('imagem-perfil/'. basename($perfil->imagem))}}" alt="perfil" class="rounded-circle" id="foto" width="170px" height="170px">
                </div> 
                <strong>UP</strong>
            </div>

            <div class="perfil"><strong>Perfil do(a)</strong>{{$perfil->nome}}</div>

            <ul class="list-unstyled components">
                <li class="text-center" id="biografia">
                    <i class="fas fa-user-edit"></i> <strong>Biografia:</strong> {{$perfil->biografia}}
                </li>
                <li class="phone">
                    <i class="fas fa-phone"></i> <strong>Numero:</strong> {{$perfil->numero}}
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-info">
                        <i class="fas fa-angle-double-left"></i>
                    </button>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <a href="{{route('perfil.show', auth()->user()->perfil->id)}}" class="text-primary">Perfil de {{auth()->user()->perfil->nome}}</a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" id="sair">Sair <i class="fas fa-sign-out-alt"></i>
                                </a> 
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <h3 class="display-5">Fotos de {{$perfil->nome}}</h3>
                        <hr>
                    </div>
                </div>
                <div class="row no-padding">
                    @foreach($perfil->postagens as $postagem)
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset('imagem-postagem/'. basename($postagem->caminho))}}" alt="Card image cap">
                            <div class="card-body">
                                <p>{{$postagem->legenda}}</p>
                            </div>
                            <div class="card-body">
                                <p>{{count($postagem->curtidas)}}</p>
                                <a href="{{route('curtir', $postagem->id)}}" class="btn text-info" id="botoes"><i class="fas fa-thumbs-up"></i> Curtir</a>
                                <a class="btn text-info" data-toggle="collapse" href="#{{$postagem->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-comment-alt"></i> Comentar</a>
                            </div>
                            <div class="collapse" id="{{$postagem->id}}">
                                <form action="{{route('comentar', $postagem->id)}}" method="post">
                                    @csrf
                                    <textarea class="form-control" id="textarea" rows="1" placeholder="Escreva um comentário" name="mensagem"></textarea>
                                    <button name="submit" class="btn btn-outline-default"><i class="fas fa-paper-plane"></i> Comentar</a></button>
                                </form>
                            </div>
                            <ul class="list-group list-group-flush">
                                <!---Aqui precisa fazer um foreach para mostrar todos os comentários--->
                                @foreach($postagem->comentarios as $comentario)
                                    <li class="list-group-item"><sapn class="text-primary">{{$comentario->perfil->nome}}:</sapn> {{$comentario->mensagem}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
   
</body>
</html>

