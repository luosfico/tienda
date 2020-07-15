@extends('layouts.public')
@section('title') Carro de compras @endsection
@section('header')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table>
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($cart as $row)

                        <tr>
                            <td>
                                <p><strong>{{$row->name}}</strong></p>
                            </td>
                            <td>{{$row->qty}}</td>
                            <td>{{$row->price}}</td>
                            <td>{{$row->total}}</td>
                        </tr>

                        @endforeach

                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Subtotal</td>
                            <td><?php echo Cart::subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Tax</td>
                            <td><?php echo Cart::tax(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Transaction cost</td>
                            <td><?php echo Cart::getCost(\Gloudemans\Shoppingcart\Cart::COST_TRANSACTION); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Transaction cost</td>
                            <td><?php echo Cart::getCost(\Gloudemans\Shoppingcart\Cart::COST_SHIPPING); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Transaction cost</td>
                            <td><?php echo Cart::getCost('somethingelse'); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Total</td>
                            <td><?php echo Cart::total(); ?></td>
                        </tr>
                        </tfoot>
                    </table>
                    <a class="button-default" href="{{route('cart.destroy')}}">Limpiar carro</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

@endsection
