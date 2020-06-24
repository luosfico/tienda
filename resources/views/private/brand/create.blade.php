@extends('layouts.app')
@section('title') Productos @endsection
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
                    <a class="nav-link" href="#">Accesos Directos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('brand.index') }}">Marcas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.index') }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clientes</a>
                </li>
            </ul>
        </nav>
    </div>
    <section class="account col-lg-10">
        <div class="container">
            <h5>Crear Nueva Marca</h5>
            <form action="/brand" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Registrar Marca</button>
            </form>
        </div>
    </section>
    </div>
@endsection

@section('script')

@endsection
