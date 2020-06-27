@extends('layouts.private')
@section('title') Nuevo Producto @endsection
@section('header')
<style>
    input[type="file"] {
        opacity: 0;
        overflow: hidden;
        position: absolute;
    }
    label[for="file"] {
        font-size: 14px;
        font-weight: 600;
        color: #fff;
        background-color: #106BA0;
        display: inline-block;
        transition: all .5s;
        padding: 5px 22px !important;
        text-transform: uppercase;
        width: fit-content;
        text-align: center;
        border-radius: 20px;
    }
</style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Nuevo Producto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Productos</a></li>
                        <li class="breadcrumb-item active">Nuevo Producto</li>
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
                    <form action="/product" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
                        <!-- Datos del producto -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Datos de la Producto</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Nombre del Producto</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="brand_id" class="col-form-label">Marca</label>
                                            <select id="brand_id" name="brand_id" class="form-control">
                                                <option selected>Seleccionar</option>
                                                @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="model" class="col-form-label">Modelo</label>
                                            <input type="text" class="form-control" id="model" name="model">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="category_id" class="col-form-label">Categoria</label>
                                            <select id="category_id" name="category_id" class="form-control">
                                                <option selected>Seleccionar</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">Descripción del producto</label>
                                            <textarea rows="3" type="text" class="form-control" id="description" name="description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Stock y Valores -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Valores y Stock</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="stock" class="col-form-label">Stock Inicial</label>
                                            <input value="{{ old('stock') }}" type="number" class="form-control" id="stock" name="stock" placeholder="0">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="standardPrice" class="col-form-label">Precio Estandar</label>
                                            <input value="{{ old('standardPrice') }}" type="text" class="form-control" id="standardPrice" name="standardPrice" placeholder="$0" onkeyup="changeCurrency()">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="currentPrice" class="col-form-label">Precio Actual</label>
                                            <input value="{{ old('currentPrice') }}" type="text" class="form-control" id="currentPrice" name="currentPrice" placeholder="$0" onkeyup="changeCurrency()">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="switch">
                                        <label class="custom-control-label" for="switch">Desea registrar un precio oferta?</label>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="offerPrice" class="col-form-label">Precio Oferta</label>
                                            <input value="{{ old('offerPrice') }}" type="number" class="form-control" id="offerPrice" name="offerPrice" placeholder="$0" disabled onkeyup="changeCurrency()">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="expirationOfferPrice" class="col-form-label">Fecha de Expiración</label>
                                            <input value="{{ old('expirationOfferPrice') }}" type="datetime-local" class="form-control" id="expirationOfferPrice" name="expirationOfferPrice" disabled>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Imagenes del producto -->
                        <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Imagenes del Producto</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <div class="text-center">
                                                <input type="file" id="File1" name="File1" accept="image/*" onchange="showImage(this.files[0],this.id)">
                                                <label for="file">Cargar Imagen</label>
                                            </div>
                                            <div class="position-relative">
                                                <img id="Image-File1" src="{{URL::asset('/img/productos/default.png')}}" alt="Imagen-Mobile" class="img-fluid">
                                                <div class="ribbon-wrapper ribbon-lg">
                                                    <div class="ribbon bg-success">
                                                        Imagen Principal
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="text-center">
                                                <input type="file" id="File2" name="File2" accept="image/*" onchange="showImage(this.files[0],this.id)">
                                                <label for="file">Cargar Imagen</label>
                                            </div>
                                            <div class="position-relative">
                                                <img id="Image-File2" src="{{URL::asset('/img/productos/default.png')}}" alt="Imagen-Mobile" class="img-fluid">
                                                <div class="ribbon-wrapper ribbon-lg">
                                                    <div class="ribbon bg-info">
                                                        2da Imagen
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="text-center">
                                                <input type="file" id="File3" name="File3" accept="image/*" onchange="showImage(this.files[0],this.id)">
                                                <label for="file">Cargar Imagen</label>
                                            </div>
                                            <div class="position-relative">
                                                <img id="Image-File3" src="{{URL::asset('/img/productos/default.png')}}" alt="Imagen-Mobile" class="img-fluid">
                                                <div class="ribbon-wrapper ribbon-lg">
                                                    <div class="ribbon bg-info">
                                                        3ra Imagen
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="text-center">
                                                <input type="file" id="File4" name="File4" accept="image/*" onchange="showImage(this.files[0],this.id)">
                                                <label for="file">Cargar Imagen</label>
                                            </div>
                                            <div class="position-relative">
                                                <img id="Image-File4" src="{{URL::asset('/img/productos/default.png')}}" alt="Imagen-Mobile" class="img-fluid">
                                                <div class="ribbon-wrapper ribbon-lg">
                                                    <div class="ribbon bg-info">
                                                        4ta Imagen
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="text-center">
                                                <input type="file" id="File5" name="File5" accept="image/*" onchange="showImage(this.files[0],this.id)">
                                                <label for="file">Cargar Imagen</label>
                                            </div>
                                            <div class="position-relative">
                                                <img id="Image-File5" src="{{URL::asset('/img/productos/default.png')}}" alt="Imagen-Mobile" class="img-fluid">
                                                <div class="ribbon-wrapper ribbon-lg">
                                                    <div class="ribbon bg-info">
                                                        5ta Imagen
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="text-center">
                                                <input type="file" id="File6" name="File6" accept="image/*" onchange="showImage(this.files[0],this.id)">
                                                <label for="file">Cargar Imagen</label>
                                            </div>
                                            <div class="position-relative">
                                                <img id="Image-File6" src="{{URL::asset('/img/productos/default.png')}}" alt="Imagen-Mobile" class="img-fluid">
                                                <div class="ribbon-wrapper ribbon-lg">
                                                    <div class="ribbon bg-info">
                                                        5ta Imagen
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Crear Producto</button>
                                    <button type="reset" class="btn btn-info" onclick="resetImages()">Limpiar</button>
                                    <input type="button" class="btn btn-danger float-right" onclick="location.href='/product'" value="Cancelar">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const formatterPeso = new Intl.NumberFormat('es-CL', {
            style: 'currency',
            currency: 'CLP',
            minimumFractionDigits: 0
        });
        var offerPriceInput = document.getElementById('offerPrice');
        var offerPriceDateInput = document.getElementById('expirationOfferPrice');
        document.getElementById('switch').addEventListener('click', function (e) {
            if (offerPriceInput.disabled !== true) {
                offerPriceInput.disabled = true;
                offerPriceDateInput.disabled = true;
            } else {
                offerPriceInput.disabled = false;
                offerPriceDateInput.disabled = false;
            }
        });
        //Cambiar a moneda
        function changeCurrency() {
            var valor   = document.activeElement.value;
            var idfoco  = document.activeElement.id;
            valor = valor.replace(/[$.\s]/g, '');
            document.getElementById(idfoco).value = formatterPeso.format(valor);
        }
        function showImage(archivo,id){
            var reader = new FileReader();
            if (archivo) {
                reader.readAsDataURL(archivo );
                reader.onloadend = function () {
                    document.getElementById('Image-'+id).src = reader.result;
                }
            }else{
                document.getElementById(id).src = "{{URL::asset('/img/product/default.png')}}";
            }
        }

    </script>
@endsection
