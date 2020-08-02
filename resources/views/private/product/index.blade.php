@extends('layouts.private')
@section('title') Productos @endsection
@section('header')
    <?php
    function controlDigit($ean){
        $par=0;
        $impar=0;
        $first=1;
        // Empezamos por el final
        for ($i=strlen($ean)-1; $i>=0; $i--){
            if($first%2 == 0){
                $par += $ean[$i];
            }else{
                $impar += $ean[$i]*3;
            }
            $first++;
        }
        $control = ($par+$impar)%10;
        if($control > 0){$control = 10 - $control;}
        return $control;
    }
    ?>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administrar Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('account') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
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
                    <a href="{{ route('product.create') }}">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-basket"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-bold text-dark">Registrar Nuevo</span>
                                <span class="info-box-text text-bold text-dark">Producto</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Contenido -->
                <div class="col-lg-12 container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Productos Registradas</h3>
                            <div class="card-tools">
                                <form>
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control float-right" placeholder="Buscar">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>SKU</th>
                                    <th>Nombre</th>
                                    <th>Marca y Modelo</th>
                                    <th>Categoria</th>
                                    <th>Stock</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $X= 0 ?>
                                @foreach($products as $item)
                                    <?php  $X= $X+1 ?>
                                    <tr>
                                        <td>{{$X}}</td>
                                        <td>{{$item->SKU.controlDigit($item->SKU)}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->brand->name.' '.$item->model}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td>{{$item->stock}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <button type="button" class="btn btn-info btn-sm">Opciones</button>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="{{route('product.edit', $item->id)}}">Actualizar</a>
                                                        <form action="{{route('product.destroy', $item->id)}}" method="POST">
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
                        <div class="card-footer clearfix">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
