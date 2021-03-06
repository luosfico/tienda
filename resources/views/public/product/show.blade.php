@extends('layouts.public')
@section('title') Productos @endsection
@section('content')
    <section>
        <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $product->name }}</h3>
                <div class="col-12">
                    <img src="{{ asset('/img/productos/'.$product->SKU.'/'.$product->principalImage)}}" class="producto-imagen-show" alt="Product Image">
                </div>
                <div class="col-12 producto-imagen-seccion">
                    @foreach($images as $image)
                    <div class="producto-imagen-miniatura"><img src="{{ asset('/img/productos/'.$product->SKU.'/'.$image->name)}}" alt="Product Image"></div>
                    @endforeach
                </div>
            </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $product->name }}</h3>
                        <h4>{{ $product->brand->name }}</h4>
                        {{ $product->description }}
                        <hr>


                        <h4 class="mt-3">Modelo: <small>{{ $product->model }}</small></h4>

                        <div class="bg-gray py-2 px-3 mt-4">
                            @if($product->offerPrice)
                                <h6 class="mb-0" style="color:red">Antes:</h6>
                                <h5 style="color:red">${{ number_format($product->standardPrice,0,',','.')}}</h5>
                                <h6 class="mb-0" style="color:#3f00ff">Ahora:</h6>
                                <h2 class="mb-0" style="color:#3f00ff">${{ number_format($product->offerPrice,0,',','.')}}</h2>
                                <h4 class="mt-0"><small>IVA Incluido</small></h4>
                            @else
                                <h6 class="mb-0" style="color:#3f00ff">Valor:</h6>
                                <h2 class="mb-0" style="color:#3f00ff">${{ number_format($product->currentPrice,0,',','.')}}</h2>
                                <h4 class="mt-0"><small>IVA Incluido</small></h4>
                            @endif
                        </div>

                        <div class="text-center btn-productos">
                            <div class="btn btn-default btn-lg btn-flat button-car">
                                <a href="{{route('cart.add', $product->id)}}"><i class="fas fa-cart-plus fa-lg mr-2"></i> Agregar al Carro</a>
                            </div>
                            <div class="btn btn-default btn-lg btn-flat">
                                <i class="fas fa-heart fa-lg mr-2"></i>
                                Agregar a mi lista
                            </div>
                        </div>

                        <div class="mt-4 product-share">
                            <a href="#" class="text-gray">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-rss-square fa-2x"></i>
                            </a>
                        </div>

                    </div>
                </div>

        <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Description</a>
                            <a class="nav-item nav-link active" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="true">Comments</a>
                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
                        <div class="tab-pane fade active show" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                    </div>
                </div>
        </div>
    </section>
@endsection

@section('modal')
    <div class="modal fade" id="cart-notification">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Producto Agregado</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4>Su producto ha sigo agregado<br>al carro de compras</h4>
                    <img src="https://img.icons8.com/color/48/000000/add-shopping-cart.png"/>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a type="button" class="btn btn-default button-car" href="{{route('cart.index')}}">Mi Carro</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    @if(Session::has('message'))
    $('#cart-notification').modal('toggle')
    @endif
    $('.producto-imagen-miniatura').on('click', function() {
        const image_element = $(this).find('img');
        $('.producto-imagen-show').prop('src', $(image_element).attr('src'))
        $('.producto-imagen-miniatura.active').removeClass('active');
        $(this).addClass('active');
    });
</script>
@endsection
