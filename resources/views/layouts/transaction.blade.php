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
        <!-- Codigo Verificador SKU -->
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
                    <a class="nav-link" href="{{route('index')}}"><i class="fas fa-home"></i>Volver al Inicio</a>
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
