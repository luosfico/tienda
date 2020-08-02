@extends('layouts.public')
@section('title') Carro de compras @endsection
@section('content')
    <section style="min-height: 553px">
        <div class="container">
            <div class="row">
                @if($cart->count() == 0)
                    <div class="col-sm-4 offset-sm-4">
                        <h3><img src="https://img.icons8.com/color/48/000000/shopping-cart-loaded.png"/> Carrito de Compras </h3>
                    </div>
                    <div class="col-sm-4 offset-sm-4" align="center">
                        <br><br><br><br>
                        <img src="https://img.icons8.com/color/64/000000/empty-box.png"/><img src="https://img.icons8.com/color/64/000000/sad.png"/>
                        <p>Tu carro de compras esta vacio</p>
                        <div class="btn btn-default btn-lg btn-flat button-limpiar">
                            <a href="{{route('index')}}"><i class="fas fa-home fa-lg mr-2" aria-hidden="true"></i> Volver al Inicio</a>
                        </div>
                    </div>
                @else
                    <div class="col-sm-4 offset-sm-4">
                        <h3> <img src="https://img.icons8.com/color/48/000000/shopping-cart-loaded.png"/> Carrito de Compras </h3>
                    </div>
                    <div class="col-sm-8 offset-sm-2">
                        <table>
                            <thead>
                            <tr>
                                <th style="width: 10%"></th>
                                <th style="width: 50%">Producto</th>
                                <th style="width: 20%">Precio</th>
                                <th style="width: 20%">Subtotal</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($cart as $item)

                                <tr>
                                    <td><img class="img-car" src="{{ asset('/img/productos/'.$item->model->SKU.'/'.$item->model->principalImage)}}" alt="Product Image"></td>
                                    <td class="text-cart">{{$item->name}}<br><a>SKU: {{$item->model->SKU}} x {{$item->qty}}</a></p>
                                    </td>
                                    <td class="text-cart">${{ number_format($item->price,0,'','.')}}</td>
                                    <td>${{ number_format($item->total,0,'','.')}}</td>
                                </tr>

                            @endforeach

                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td><strong>Total a Pagar:</strong></td>
                                <td>$<?php echo Cart::total(); ?></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div >
                    <div class="botones-carro col-sm-6 offset-sm-3">
                        <div class="btn btn-default btn-lg btn-flat button-limpiar">
                            <a href="{{route('cart.destroy')}}"><i class="fas fa-broom fa-lg mr-2" aria-hidden="true"></i> Vaciar Carro</a>
                        </div>
                        <div class="btn btn-default btn-lg btn-flat button-car">
                            <a href="@if (Auth::check()) {{route('delivery.transaction')}} @else {{route('login.transaction')}} @endif"><i class="fas fa-cash-register fa-lg mr-2" aria-hidden="true"></i> Realizar Pedido</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('script')

@endsection
