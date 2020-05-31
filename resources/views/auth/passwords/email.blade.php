@extends('layouts.app')
@section('title') Olvido Coontraseña @endsection
@section('header')
    <style>
        .invalid-feedback {
            color: #fff78c;
        }
    </style>
@endsection

@section('content')
    <section class="section-verificación">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                @if (session('status'))
                                    <img src="https://img.icons8.com/color/96/000000/mailbox-with-letter.png"/>
                                    <h2>Correo Enviado</h2>
                                    <div class="alert alert-success col-lg-4 offset-lg-4 " role="alert">
                                        {{ session('status') }}
                                    </div>
                                    <p>Si no has recibido nuestro mensaje, recuerda revisar la bandeja de Spam.</p>
                                    <p>De lo contrario envia un correo a <strong>soporte@cfacordeoneschile.cl</strong>
                                        para solucionar tu problema de registro</p>
                                    <br>
                                    <a href="{{route('index')}}" class="btn-default">Volver al Inicio</a>
                                @else
                                    <img src="https://img.icons8.com/color/96/000000/re-enter-pincode.png"/>
                                    <h2>Ingresa tu {{ __('E-Mail Address') }}!</h2>
                                    <form method="POST" action="{{ route('password.email') }}" novalidate="novalidate">
                                        @csrf
                                        <div class="col-lg-3 form-group input-reset">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                   id="email" name="email" required autocomplete="name" value="{{ old('email') }}"
                                                   autofocus placeholder="{{ __('E-Mail Address') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 offset-lg-4">
                                            <button type="submit" class="btn-default">{{ __('Send Password Reset Link') }}</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
