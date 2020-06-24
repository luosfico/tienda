@extends('layouts.public')
@section('title') Registro @endsection
@section('content')
    <section class="register">
        <div class="container">
            <div class="row align-items-center" style="margin-top: -62px;margin-bottom: -62px;">
                <div class="col-lg-6 col-md-6">
                    <div class="box-registro text-center register-item">
                        <img src="https://img.icons8.com/color/144/000000/music-band.png">
                        <h3>Disfruta los beneficios de estar registrado</h3>
                        <ul>
                            <li>Recibe notificaciones de ofertas y promociones.</li>
                            <li>Recibe nuestros nuevos Newslatter.</li>
                            <li>Revisar tu historial de compras.</li>
                            <li>Guardar y actualizar tus datos o direcciones.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="register-form">
                        <h3>Completa los datos para crear tu cuenta</h3>
                        <form method="POST" action="{{ route('register') }}" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" required autocomplete="name" value="{{ old('name') }}"
                                       autofocus placeholder="{{ __('Name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control @error('surname') is-invalid @enderror"
                                       id="surname" name="surname" required autocomplete="surname" value="{{ old('surname') }}"
                                       autofocus placeholder="{{ __('Surname') }}">
                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control @error('rut') is-invalid @enderror"
                                       id="rut" name="rut" required autocomplete="rut" value="{{ old('rut') }}"
                                       autofocus placeholder="{{ __('Rut') }}">
                                @error('rut')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" required autocomplete="email" value="{{ old('email') }}"
                                       autofocus placeholder="{{ __('E-Mail Address') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" value="" required autocomplete="new-password"
                                       autofocus placeholder="{{ __('Password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control @error('password-confirm') is-invalid @enderror"
                                       id="password-confirm" name="password_confirmation" value="" required autocomplete="new-password"
                                       autofocus placeholder="{{ __('Confirm Password') }}">
                                @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="col-md-10 offset-md-1">
                                    <button type="submit" class="btn-default btn-full">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
