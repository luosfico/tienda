@extends('layouts.public')
@section('title') Verificar Cuenta @endsection
@section('content')
    <section class="section-verificación">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="verify-item text-center">
                        <div class="login_part_text_iner">
                            @if (session('resent'))
                                <img src="https://img.icons8.com/color/96/000000/mailbox-with-letter.png"/>
                                <h2>Correo Enviado</h2>
                                <div class="alert alert-success col-lg-4 offset-lg-4 " role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                                <p>Si no has recibido nuestro mensaje, recuerda revisar la bandeja de Spam.</p>
                                <p>De lo contrario envia un correo a <strong>soporte@cfacordeoneschile.cl</strong>
                                    para solucionar tu problema de registro</p>
                                <br>
                                <a href="{{route('index')}}" class="btn-default">Volver al Inicio</a>
                            @else
                                <img src="https://img.icons8.com/color/96/000000/sad--v1.png"/>
                                <h2>Aun no has activado tu cuenta!</h2>
                                <p>Recuerda que para acceder a los detalles de tu cuenta</p>
                                <p>debes confirmar tu correo electrónico</p>
                                <br>
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn-default">{{ __('click here to request another') }}</button>.
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
