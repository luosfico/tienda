@extends('layouts.app')
@section('title') Ingresar @endsection
@section('content')
    <section class="login">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="box-registro text-center login-item">
                            <img src="https://img.icons8.com/color/144/000000/membership-card.png"/>
                            <h2>Aun no estas registrado?</h2>
                            <p>Registrate para acceder a tus pedidos y otros beneficios</p>
                            <a href="{{route('register')}}" class="btn-default">Crear nueva cuenta</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login-form">
                        <h3>Bienvenido ! <br>
                            Ingresa tus datos para iniciar sesión</h3>
                        <form method="POST" action="{{ route('login') }}" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                       placeholder="{{ __('E-Mail Address') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="" required autocomplete="current-password"
                                       placeholder="{{ __('Password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Recordarme</label>
                                </div>
                                <button type="submit" value="submit" class="btn-default btn-full">
                                    Ingresar
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Olvidaste tu contraseña?
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
