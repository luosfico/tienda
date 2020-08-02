@extends('layouts.transaction')
@section('title') Inicio Sesión @endsection
@section('header')
<style>

</style>
@endsection
@section('content')
<section style="min-height: 553px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="text-center login-transaction">
                    <img src="https://img.icons8.com/color/100/000000/client-management.png"/>
                    <h3>Comprar con tu cuenta</h3>
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
            <div class="col-lg-6 col-md-6">
                <div class="text-center login-transaction">
                    <img src="https://img.icons8.com/color/100/000000/login-as-user.png"/>
                    <h3>Comprar sin registro</h3>
                    <form method="POST" action="{{ route('delivery.transaction') }}" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="name" name="name" value="@if(Session::has('user')) {{ Session::get('user.name') }}@endif{{ old('name') }}" required autocomplete="name" autofocus
                                   placeholder="{{ __('Name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="@if(Session::has('user')) {{ Session::get('user.surname') }}@endif{{ old('surname') }}" required autocomplete="surname" autofocus
                                   placeholder="{{ __('Surname') }}">
                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control @error('rut') is-invalid @enderror" id="rut" name="rut" value="@if(Session::has('user')) {{ Session::get('user.rut') }}@endif{{ old('rut') }}" required autocomplete="rut"
                                   placeholder="{{ __('RUT') }}">
                            @error('rut')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="@if(Session::has('user')) {{ Session::get('user.email') }}@endif{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="{{ __('E-Mail Address') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn-default btn-full">
                                Continuar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection
