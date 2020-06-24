@extends('layouts.public')
@section('title') Inicio @endsection
@section('header')
<!-- Custom styles for this template -->
<link href="css/carousel.css" rel="stylesheet">
@endsection

@section('content')
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $X=0;?>
            @foreach($carousels as $carousel)
            <li data-target="#myCarousel" data-slide-to="{{$X}}" {{ $X == 0 ? 'class=active' : '' }}></li>
            <?php  $X= $X+1 ?>
            @endforeach
        </ol>
        <div class="carousel-inner">
            <?php $X=0;?>
            @foreach($carousels as $carousel)
            <?php  $X= $X+1 ?>
            <div class="carousel-item {{ $X == 1 ? 'active' : '' }}">
                <img src="{{ asset('/img/carousel/'.$carousel->imageFull)}}" srcset="{{ asset('/img/carousel/'.$carousel->imageMobile)}} 1100w, {{ asset('/img/carousel/'.$carousel->imageFull)}} 2000w" alt="img-carousel">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="productos-nuevos">
        <div class="container">
            <div class="text-center titulo-seccion">
                <h3><i class="fas fa-bahai"></i> Productos Nuevos</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a class="producto-link" href="#">
                    <div class="card">
                        <div class="card-body">
                            <div class="cabecera-superior">
                                <div class="etiqueta-nuevo">Nuevo</div>
                            </div>
                            <div class="producto-img-item">
                                <img class="imagen-producto" src="{{ asset('/img/productos/skuproducto1/image1.jpg')}}" alt="img-product">
                            </div>
                            <p class="titulo-producto">Acordeon XXX</p>
                            <p class="precio-producto">$399.990</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a class="producto-link" href="#">
                        <div class="card">
                            <div class="card-body">
                                <div class="cabecera-superior">
                                    <div class="etiqueta-nuevo">Nuevo</div>
                                </div>
                                <div class="producto-img-item">
                                    <img class="imagen-producto" src="{{ asset('/img/productos/skuproducto1/image1.jpg')}}" alt="img-product">
                                </div>
                                <p class="titulo-producto">Acordeon XXX</p>
                                <p class="precio-producto">$399.990</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a class="producto-link" href="#">
                        <div class="card">
                            <div class="card-body">
                                <div class="cabecera-superior">
                                    <div class="etiqueta-nuevo">Nuevo</div>
                                </div>
                                <div class="producto-img-item">
                                    <img class="imagen-producto" src="{{ asset('/img/productos/skuproducto1/image1.jpg')}}" alt="img-product">
                                </div>
                                <p class="titulo-producto">Acordeon XXX</p>
                                <p class="precio-producto">$399.990</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a class="producto-link" href="#">
                        <div class="card">
                            <div class="card-body">
                                <div class="cabecera-superior">
                                    <div class="etiqueta-nuevo">Nuevo</div>
                                </div>
                                <div class="producto-img-item">
                                    <img class="imagen-producto" src="{{ asset('/img/productos/skuproducto1/image1.jpg')}}" alt="img-product">
                                </div>
                                <p class="titulo-producto">Acordeon XXX</p>
                                <p class="precio-producto">$399.990</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="productos-oferta section-two">
        <div class="container">
            <div class="text-center titulo-seccion">
                <h3><i class="fas fa-bullhorn"></i></i> Ofertas</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <a class="producto-link" href="#">
                        <div class="card">
                            <div class="card-body">
                                <div class="cabecera-superior">
                                    <div class="etiqueta-oferta">Oferta</div>
                                </div>
                                <div class="producto-img-item">
                                    <img class="imagen-producto" src="{{ asset('/img/productos/skuproducto1/image1.jpg')}}" alt="img-product">
                                </div>
                                <p class="titulo-producto">Acordeon XXX</p>
                                <p class="precio-producto normal-oferta">$399.990</p>
                                <p class="precio-producto oferta">$329.990</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a class="producto-link" href="#">
                        <div class="card">
                            <div class="card-body">
                                <div class="cabecera-superior">
                                    <div class="etiqueta-oferta">Oferta</div>
                                </div>
                                <div class="producto-img-item">
                                    <img class="imagen-producto" src="{{ asset('/img/productos/skuproducto1/image1.jpg')}}" alt="img-product">
                                </div>
                                <p class="titulo-producto">Acordeon XXX</p>
                                <p class="precio-producto normal-oferta">$399.990</p>
                                <p class="precio-producto oferta">$329.990</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a class="producto-link" href="#">
                        <div class="card">
                            <div class="card-body">
                                <div class="cabecera-superior">
                                    <div class="etiqueta-oferta">Oferta</div>
                                </div>
                                <div class="producto-img-item">
                                    <img class="imagen-producto" src="{{ asset('/img/productos/skuproducto1/image1.jpg')}}" alt="img-product">
                                </div>
                                <p class="titulo-producto">Acordeon XXX</p>
                                <p class="precio-producto normal-oferta">$399.990</p>
                                <p class="precio-producto oferta">$329.990</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a class="producto-link" href="#">
                        <div class="card">
                            <div class="card-body">
                                <div class="cabecera-superior">
                                    <div class="etiqueta-oferta">Oferta</div>
                                </div>
                                <div class="producto-img-item">
                                    <img class="imagen-producto" src="{{ asset('/img/productos/skuproducto1/image1.jpg')}}" alt="img-product">
                                </div>
                                <p class="titulo-producto">Acordeon XXX</p>
                                <p class="precio-producto normal-oferta">$399.990</p>
                                <p class="precio-producto oferta">$329.990</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="contacto">

    </section>

    <section id="servicios">
        <div class="container">
            <div class="row">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <img src="https://img.icons8.com/color/48/000000/get-cash.png"/>
                            <h4>Pago Seguro </h4>
                            <p>Realiza el pago on-line por medio de transferencia o por medio de la plataforma segura de Transbank.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-center">
                            <img src="https://img.icons8.com/color/48/000000/in-transit.png"/>
                            <h4>Envios a todo Chile</h4>
                            <p>Nos preocupamos por enviar tu producto en las condiciones necesarias para que llegue en excelentes condiciones a tus manos.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-center">
                            <img src="https://img.icons8.com/color/48/000000/why-us-male.png"/>
                            <h4>¿ Tienes dudas ?</h4>
                            <p>No dudes en contactarnos ante cualquier pregunta que tengas antes de realizar tu compra.</p>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
    $('#carousel').carousel({
        interval: 3500
    });
    </script>
@endsection
