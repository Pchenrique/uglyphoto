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
    <link rel="stylesheet" href="{{asset('css/Style_login.css')}}">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{asset('img/logo.png')}}" class="img-fluid" alt="Responsive image">
        </a>
      </div>
  </nav>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-4">
              
          </div>
      </div>
      <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">{{ __('Login') }}</h5>
              <form class="form-signin" method="POST" action="{{ route('login') }}">
              @csrf
                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror auto-" name="email" placeholder="Endereço de Email" required autocomplete="email" autofocus>
                  <label for="inputEmail">Endereço de Email</label>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror    
                </div>
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                  <label for="inputPassword">Senha</label>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                          {{ __('Me Mantenha Conectado') }}
                      </label>
                </div>
                <button class="btn btn-outline-info btn-block text-uppercase" type="submit">LOGIN</button>
                <hr class="my-4">
                <a class="btn btn-lg btn-cadastro btn-block" href="{{ route('register') }} "type="submit"><i class="fab fa-google mr-2"></i> Cadastre-se</a>
                @if (Route::has('password.request'))
                  <a class="btn btn-lg btn-esqueceu-senha btn-block" href="{{ route('password.request') }}" type="submit"><i class="fab fa-facebook-f mr-2"></i> Esqueceu a Senha?</a>
                @endif
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>    
</body>
</html>

