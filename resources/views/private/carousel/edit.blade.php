@extends('layouts.private')
@section('title') Nuevo Carousel @endsection
@section('header')
<style>

</style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Actulizar Carousel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('carousel.index') }}">Carousel</a></li>
                        <li class="breadcrumb-item active">Nuevo Carousel</li>
                    </ol>
                </div>
            </div>
            <a href="{{ URL::asset('img/carousel/Plantilla-Promo-Full.psd')}}" type="reset" class="btn btn-primary">Descargar Plantilla Full</a>
            <a href="{{ URL::asset('img/carousel/Plantilla-Promo-Mobile.psd')}}" type="reset" class="btn btn-primary">Descargar Plantilla Movil</a>
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
                            <h3 class="card-title">Datos del Carousel</h3>
                        </div>

                        <form action="{{ route('carousel.update', $carousel->id) }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" >
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ImageFull" class="col-form-label">Imagen Full</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ImageFull" name="ImageFull" accept="image/*" onchange="showImageFull()">
                                                <label class="custom-file-label" id="imageFullText" for="ImageFull">Seleccinar un archivo...</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ImageMobile" class="col-form-label">Imagen Movil</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ImageMobile" name="ImageMobile" accept="image/*" onchange="showImageMobile()">
                                                <label class="custom-file-label" id="imageMobileText" for="ImageMobile">Seleccinar un archivo...</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="url" class="col-form-label">URL</label>
                                            <select disabled id="url" name="url" class="form-control">
                                                <option>Seleccionar</option>
                                                <option value="1">Si</option>
                                                <option selected value="0">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="url" class="col-form-label">Tipo de URL</label>
                                            <select disabled id="url" name="url" class="form-control">
                                                <option selected>Seleccionar</option>
                                                <option value="0">Categoria</option>
                                                <option value="0">Marca</option>
                                                <option value="0">Producto</option>
                                                <option value="0">Personalizada</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="url" class="col-form-label">Seleccionar XXXXXX</label>
                                            <select disabled id="url" name="url" class="form-control">
                                                <option selected>Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <div class="position-relative">
                                            <img id="ImageFullPicture" src="{{URL::asset('/img/carousel/'.$carousel->imageFull)}}" alt="Imagen-Full" class="img-fluid">
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-info">
                                                    Imagen Full
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="position-relative">
                                            <img id="ImageMobilePicture" src="{{URL::asset('/img/carousel/'.$carousel->imageMobile)}}" alt="Imagen-Mobile" class="img-fluid">
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-info">
                                                    Imagen Movil
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Actualizar Carousel</button>
                                <button type="reset" class="btn btn-info">Limpiar</button>
                                <input type="button" class="btn btn-danger float-right" onclick="location.href='/carousel'" value="Cancelar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
        function showImageFull(){
            var archivo = document.getElementById("ImageFull").files[0];
            var reader = new FileReader();
            if (archivo) {
                reader.readAsDataURL(archivo );
                reader.onloadend = function () {
                    document.getElementById("ImageFullPicture").src = reader.result;
                }
            }
        }
        function showImageMobile(){
            var archivo = document.getElementById("ImageMobile").files[0];
            var reader = new FileReader();
            if (archivo) {
                reader.readAsDataURL(archivo );
                reader.onloadend = function () {
                    document.getElementById("ImageMobilePicture").src = reader.result;
                }
            }
        }
    </script>
@endsection
