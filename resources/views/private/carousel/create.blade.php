@extends('layouts.app')
@section('title') Nuevo Carousel @endsection
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
    <section class="carousel-admin col-lg-10">
        <h3> Crear Carousel</h3>
        <div class="row">
            <form action="/carousel" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="position">Posición del Carousel</label>
                    </div>
                    <select class="custom-select" id="position" name="position">
                        <option selected>Seleccionar...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>

                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="image-full">Archivo Full</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image-full" name="image-full" aria-describedby="image-full">
                        <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="image-full">Archivo Movil</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image-mobile" name="image-mobile" aria-describedby="image-full">
                        <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
                    </div>
                </div>
                <button class="btn-default" type="submit">Registrar Carousel</button>
            </form>
        </div>
    </section>
    </div>
@endsection

@section('script')

@endsection
