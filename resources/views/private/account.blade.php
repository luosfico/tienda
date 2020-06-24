@extends('layouts.app')
@section('title') Mi Cuenta @endsection
@section('header')
<style>

</style>
@endsection

@section('content')
    <div class="row row-account">
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
    <section class="account col-lg-10">
        <div class="row">
            <div class="col-lg-4">
                <div class="text-center box-acceso">
                    <img src="https://img.icons8.com/plasticine/48/000000/stack-of-photos.png"/>
                    <h4>Carousel</h4>
                    <p>Administra las imagenes rotativas del inico.</p>
                    <a href="{{route('carousel.index')}}" class="btn-default"><i class="fas fa-tools"></i> Configurar </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="text-center box-acceso">
                    <img src="https://img.icons8.com/color/48/000000/leave.png"/>
                    <h4>Modal</h4>
                    <p>Administra mensaje flotante del sitio web.</p>
                    <a href="#" class="btn-default"><i class="fas fa-tools"></i> Configurar </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="text-center box-acceso">
                    <img src="https://img.icons8.com/color/48/000000/box-important.png"/>
                    <h4>Nota</h4>
                    <p>Administra mensaje importante que aparecen en todo el sitio web.</p>
                    <a href="#" class="btn-default"><i class="fas fa-tools"></i> Configurar </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="text-center box-acceso">
                    <img src="https://img.icons8.com/color/48/000000/shopping-cart-loaded.png"/>
                    <h4>Revisar Pedidos</h4>
                    <p>Revisa todos los pedidos registrados en el sistema.</p>
                    <a href="#" class="btn-default"><i class="fas fa-eye"></i> Ver pedidos</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="text-center box-acceso">
                    <img src="https://img.icons8.com/color/48/000000/graph.png"/>
                    <h4>Informe de ventas</h4>
                    <p>Revisa historial de ventas en la actualidad o en rango de fechas.</p>
                    <a href="#" class="btn-default"><i class="fas fa-eye"></i> Ver Informe</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="text-center box-acceso">
                    <img src="https://img.icons8.com/color/48/000000/news.png"/>
                    <h4>Nuevo Newslatter</h4>
                    <p>Publica un nuevo articulo en la sección "Newslatter".</p>
                    <a href="#" class="btn-default"><i class="fas fa-plus-circle"></i> Crear Newslatter</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="text-center box-acceso">
                    <img src="https://img.icons8.com/color/48/000000/send-mass-email.png"/>
                    <h4>Mensaje Masivo</h4>
                    <p>Enviar mensaje informativo a todos los clientes regitrados en el sistema.</p>
                    <a href="#" class="btn-default"><i class="fas fa-plus-circle"></i> Crear Mensaje</a>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection

@section('script')

@endsection
