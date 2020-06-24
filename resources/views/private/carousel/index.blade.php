@extends('layouts.app')
@section('title') Carousel @endsection
@section('header')
<style>

</style>
@endsection

@section('content')
    <div class="row-account">
    <div class="container-fluid col-lg-2 text-center">
        <h5>Administrar Pagina</h5>
        <hr />
        <nav class="navbar navbar-light bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Accesos Directos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clientes</a>
                </li>
            </ul>
        </nav>
    </div>

    <section class="carousel-admin col-lg-10">
        <h3> Administración de Carousel</h3>
        <br>
        <a href="{{route('carousel.create')}}" class="btn-default"><i class="fas fa-plus-circle"></i> Nuevo Carousel</a>
        <div class="row">
            <div class="col-lg-12 row">
                <div class="card  col-lg-8">
                    <img src="{{ asset('img/carousel/carousel1-full.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Imagen Full</h5>
                        <p class="card-text">Link: .</p>
                        <div class="row">
                            <button class="btn-primary"> Actualizar</button>
                            <button class="btn-success"> Habilitado</button>
                            <button class="btn-danger"> Eliminar</button>
                        </div>
                    </div>
                </div>
                <div class="card  col-lg-3">
                    <img src="{{ asset('img/carousel/carousel1-mobile.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Imagen Movil</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 row">
                <div class="card  col-lg-8">
                    <img src="{{ asset('img/carousel/carousel2-full.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Imagen Full</h5>
                        <p class="card-text">Link: .</p>
                        <div class="row">
                            <button class="btn-primary"> Actualizar</button>
                            <button class="btn-success"> Habilitado</button>
                            <button class="btn-danger"> Eliminar</button>
                        </div>
                    </div>
                </div>
                <div class="card  col-lg-3">
                    <img src="{{ asset('img/carousel/carousel2-mobile.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Imagen Movil</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 row">
                <div class="card  col-lg-8">
                    <img src="{{ asset('img/carousel/carousel3-full.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Imagen Full</h5>
                        <p class="card-text">Link: .</p>
                        <div class="row">
                            <button class="btn-primary"> Actualizar</button>
                            <button class="btn-success"> Habilitado</button>
                            <button class="btn-danger"> Eliminar</button>
                        </div>
                    </div>
                </div>
                <div class="card  col-lg-3">
                    <img src="{{ asset('img/carousel/carousel3-mobile.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Imagen Movil</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection

@section('script')

@endsection
