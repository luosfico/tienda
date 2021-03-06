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
        <!-- Font Awesome-->
        <script src="https://kit.fontawesome.com/59fac228a5.js" crossorigin="anonymous"></script>
        <!-- IonIcons -->
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <style>
            #preloader:before {
                content: "";
                position: fixed;
                top: calc(50% - 50px);
                left: calc(50% - 50px);
                border: 8px solid #cc1a1a;
                border-top-color: #f9d2d2;
                border-radius: 50%;
                width: 100px;
                height: 100px;
                -webkit-animation: animate-preloader 0.6s linear infinite;
                animation: animate-preloader 0.6s linear infinite;
            }
            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 9999;
                overflow: hidden;
                background: #fff;
            }
            .img-preloader{
                top: 50%;
                width: 62px;
                height: 62px;
                position: absolute;
                left: 50%;
                margin-top: -31px;
                margin-left: -31px;
            }
            @-webkit-keyframes animate-preloader {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }
            @keyframes animate-preloader {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }
        </style>
        @yield('header')
    </head>
<body class="hold-transition sidebar-mini skin-red-light">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('index') }}" class="nav-link">Volver al sitio</a>
            </li>
        </ul>
        <!-- Notificaciones -->
        <!--
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">

                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">

                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">

                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                        class="fas fa-th-large"></i></a>
            </li>
        </ul> -->
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo -->
        <a href="{{ route('index') }}" class="brand-link">
            <img src="{{ asset('img/logo-load.png')}}" alt="CF Acordeones Chile Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Acordeones Chile</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://img.icons8.com/color/160/000000/administrator-male--v1.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name.' '.Auth::user()->surname }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('account') }}" class="nav-link {{ !Route::is('account*') ?: 'active' }}">
                            <i class="nav-icon fas fa-external-link-square-alt"></i>
                            <p>
                                Accesos Directos
                                <!-- <span class="badge badge-info right">2</span>-->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ !Route::is('user*') ?: 'active' }}">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Usuarios de Sistema
                                <!-- <span class="badge badge-info right">2</span>-->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ !Route::is('client*') ?: 'active' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Clientes
                                <!-- <span class="badge badge-info right">2</span>-->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link {{ !Route::is('category*') ?: 'active' }}">
                            <i class="nav-icon fas fa-sort"></i>
                            <p>
                                Categorias
                                <!-- <span class="badge badge-info right">2</span>-->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('brand.index') }}" class="nav-link {{ !Route::is('brand*') ?: 'active' }}">
                            <i class="nav-icon fas fa-copyright"></i>
                            <p>
                                Marcas
                                <!-- <span class="badge badge-info right">2</span>-->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link {{ !Route::is('product*') ?: 'active' }}">
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                                Productos
                                <!-- <span class="badge badge-info right">2</span>-->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('carousel.index') }}" class="nav-link {{ !Route::is('carousel*') ?: 'active' }}">
                            <i class="nav-icon fas fa-images"></i>
                            <p>
                                Carousel
                                <!-- <span class="badge badge-info right">2</span>-->
                            </p>
                        </a>
                    </li>
                    <!--
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Mailbox
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/mailbox/mailbox.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inbox</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/compose.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Compose</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/read-mail.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Read</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    -->
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
    @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="https://www.webstyle.cl">Webstyle.cl</a>.</strong>
        Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.5
        </div>
    </footer>
</div>

<div id="preloader">
    <img src="{{ URL::asset('img/logo-load.png')}}" class="img-preloader">
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('js/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{ asset('js/adminlte.js')}}"></script>
<script>
    $(window).on("load", function (e) {
        $("#preloader").fadeOut(400);
    });
</script>
@yield('script')
</body>
</html>
