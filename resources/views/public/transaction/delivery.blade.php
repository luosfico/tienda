@extends('layouts.transaction')
@section('title') Paso 1 - Despacho @endsection
@section('header')
<style>

</style>
@endsection
@section('content')
<section style="min-height: 553px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <ul class="nav nav-pills nav-fill nav-transaction">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.index')}}"><i class="fas fa-shopping-bag"></i> Carrito de Compras</a>
                    </li>
                    <li class="nav-item separador"></li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-truck"></i> Despacho</a>
                    </li>
                    <li class="nav-item separador"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cash-register"></i> Pago</a>
                    </li>
                    <li class="nav-item separador"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-clipboard-check"></i> Confirmación</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-8 col-md-8 offser-lg-2 offset-md-2">
                <form method="POST" action="{{route('pay.transaction')}}" novalidate="novalidate">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="region" class="col-form-label">Región</label>
                                <select id="region" name="region" class="form-control">
                                    <option selected>Seleccionar Región</option>
                                    @foreach($region as $item)
                                        <option value="{{$item->id}}">{{$item->ordinal.' '.$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="region" class="col-form-label">Ciudad</label>
                                <select id="region" name="region" class="form-control">
                                    <option selected>Seleccionar Ciudad</option>
                                    @foreach($region[1]->communes as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address" class="col-form-label">Dirección</label>
                                <input value="" type="text" class="form-control" id="address" name="address" placeholder="EJ: Calle Sotomayor 102, Pobl. Las Amapolas">
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn-default btn-full">
                                Continuar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection
