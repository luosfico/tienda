@extends('layouts.private')
@section('title') Mi Cuenta @endsection
@section('header')
<style>

</style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Accesos directos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Accesos directos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- Contenido -->
                <div class="col-lg-4 col-sm-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Carousel</h3>
                            <p>Administra las imagenes rotativas del inicio</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-images"></i>
                        </div>
                        <a href="{{ route('carousel.index') }}" class="small-box-footer">
                            Configurar <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Modal</h3>
                            <p>Administra mensaje flotante del sitio web</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Configurar <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Nota</h3>
                            <p>Administra mensaje flotante del sitio web</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Configurar <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Pedidos</h3>
                            <p>Revisa todos los pedidos registrados en el sistema</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Ver Pedidos <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Informe de ventas</h3>
                            <p>Revisa historial de ventas en la actualidad o en rango de fechas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Ver Informe <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Nuevo Newslatter</h3>
                            <p>Publica un nuevo articulo en la sección "Newslatter"</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Nuevo Newlatter <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Mensaje Masivo</h3>
                            <p>Enviar mensaje informativo a todos los clientes regitrados en el sistema</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Nuevo Mensaje <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
