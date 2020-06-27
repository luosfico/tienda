@extends('layouts.private')
@section('title') Actualizar Marca @endsection
@section('header')
<style>

</style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Actualizar Marca</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Marcas</a></li>
                        <li class="breadcrumb-item active">Actualizar Marca</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Contenido -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Se han detectado errores!</h5>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos de la Marca</h3>
                        </div>

                        <form action="{{ route('brand.update', $brand->id) }}" method="POST" class="form-horizontal" role="form">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ImageFull" class="col-form-label">Nombre de la Marca</label>
                                            <input value="{{ $brand->name }}" type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Actualizar Marca</button>
                                <button type="reset" class="btn btn-info" onclick="resetImages()">Limpiar</button>
                                <input type="button" class="btn btn-danger float-right" onclick="location.href='/brand'" value="Cancelar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
