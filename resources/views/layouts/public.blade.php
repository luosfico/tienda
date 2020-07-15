<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="webstyle.cl">
        <title>@yield('title') - {{ config('app.name') }}</title>
        <script>
            document.cookie = 'same-site-cookie=foo; SameSite=Lax';
            document.cookie = 'cross-site-cookie=bar; SameSite=None; Secure';
        </script>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- Final css -->
        <link href="{{ asset('css/app.css')}}?v=<?=time();?>" rel="stylesheet">
        <!-- Font Awesome-->
        <script src="https://kit.fontawesome.com/59fac228a5.js" crossorigin="anonymous"></script>
        @yield('header')
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/carousel.css')}}" rel="stylesheet">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
    </head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <a class="navbar-brand" href="{{route('index')}}"><img src="{{ asset('img/logo.png')}}" width="auto" height="50" class="d-inline-block align-top" alt="" loading="lazy"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : null }}">
                    <a class="nav-link" href="{{route('index')}}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ !Route::is('product*') ?: 'active' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" data-hover="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-basket"></i> Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- foreach($categories as $category) -->
                            <a class="dropdown-item" href="#">Acordeones</a>
                            <a class="dropdown-item" href="#">Accesorios</a>
                        <!-- endforeach -->
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-newspaper"></i> Newslatter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto"><i class="fas fa-at"></i> Contacto</a>
                </li>
                <!-- Menu Usuario -->
                @guest
                    <li class="nav-item user-item {{ !Route::is('login*') ?: 'active' }}">
                        <a class="nav-link nav-link-user" href="{{route('login')}}"><i class="far fa-user-circle"></i> {{ __('Login') }}</a>
                    </li>
                @else
                <li class="nav-item dropdown user-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-user-circle"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu" aria-labelledby="navbarDropdown">
                        @can('admin')
                        <a class="dropdown-item" href="{{ route('account') }}">
                            Administrar Sitio
                        </a>
                        @endcan
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-car">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#carro-compras"><i class="fas fa-shopping-cart"></i> Mi Carro
                        <span class="badge badge-danger navbar-badge">{{$cart->count('qty')}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main role="main">
    @yield('content')
    <footer class="text-center">
        <p class="credito-erp">&copy; 2020 CF Acordeones Chile.</p>
        <p class="credito-desarrollo">Construido y Diseñado por</p>
        <p class="credito-desarrollo"><a href="https:\\www.webstyle.cl">Webstyle.cl</a></p>
    </footer>
</main>
<div id="preloader">
    <img src="{{ URL::asset('img/logo-load.png')}}" class="img-preloader">
</div>
<!-- Modal Carro Compras -->
<div class="modal fade fadeInRight" id="carro-compras" tabindex="-1" role="dialog" aria-labelledby="carro-compras" aria-hidden="true">
    <div class="modal-dialog carro-compras">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mi Carro de compras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="contenido-carro">
                    @if($cart->count() == 0)
                        <div class="carro-vacio-contenido">
                            <!-- Carro Compras Vacio -->
                            <img src="https://img.icons8.com/color/48/000000/empty-box.png"/><img src="https://img.icons8.com/color/48/000000/sad.png"/>
                            <p>Tu carro de compras esta vacio</p>
                        </div>
                    @else
                        <!-- Carro Compras con productos -->
                        <div class="carro-item">
                            <table class="table table-borderless">
                                <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td><img class="img-car" src="{{ asset('/img/productos/'.$item->model->SKU.'/'.$item->model->principalImage)}}" alt="Product Image"></th>
                                    <td class="text-cart">{{$item->name}}<br>${{ number_format($item->price,0,'','.')}} <strong>x {{$item->qty}}<br><a>SKU: {{$item->model->SKU}}</strong></a> </td>
                                    <td><a class="button-cart" href="#"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer carro-vacio">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <!--<button type="button" class="btn btn-primary">Completar Compra</button>-->
            </div>
        </div>
    </div>
</div>
<!-- -->
@yield('modal')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    $(window).on("load", function (e) {
        $("#preloader").fadeOut(400);
    });
</script>
@yield('script')
</body>
</html>
