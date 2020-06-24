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
            <a href="{{ route('brand.create') }}" class="btn btn-success btn-lg" role="button" aria-pressed="true"><i class="fas fa-plus-circle"></i> Crear Marca</a>
        </div>
        <div class="container">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>X</td>
                    <td>buttons</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
    </div>
@endsection

@section('script')

@endsection
