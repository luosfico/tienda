@extends('layouts.private')
@section('title') Carousel @endsection
@section('header')
<style>

</style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administrar Carousel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('account') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Carousel</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Boton y alertas -->
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ route('carousel.create') }}">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-image"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-bold text-dark">Registrar Nuevo</span>
                                <span class="info-box-text text-bold text-dark">Carousel</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Contenido -->
                <div class="col-lg-12 container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Carousel Registrados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Imagen Full</th>
                                    <th>Imagen Movil</th>
                                    <th style="width: 40px">Estado</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $X= 0 ?>
                                @foreach($carousel as $item)
                                <?php  $X= $X+1 ?>
                                <tr>
                                    <td>{{$X}}.</td>
                                    <td @if(!$item->visible) style="filter: grayscale(100%);"@endif><img src="{{ asset('/img/carousel/'.$item->imageFull)}}" height="100px"></td>
                                    <td @if(!$item->visible) style="filter: grayscale(100%);"@endif><img src="{{ asset('/img/carousel/'.$item->imageMobile)}}" height="100px"></td>
                                    @if($item->visible)
                                        <td><span class="badge bg-success">Visible</span></td>
                                    @else
                                        <td><span class="badge bg-secondary">No Visible</span></td>
                                    @endif
                                    <!-- -->
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <button type="button" class="btn btn-info btn-sm">Opciones</button>
                                                <span class="sr-only">Toggle Dropdown</span>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{route('carousel.edit', $item->id)}}">Actualizar</a>
                                                    @if($item->visible)
                                                        <a class="dropdown-item" href="#">Deshabilitar</a>
                                                    @else
                                                        <a class="dropdown-item" href="#">Habilitar</a>
                                                    @endif
                                                    <form action="{{route('carousel.destroy', $item->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit">Eliminar</button>
                                                    </form>
                                                </div>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
