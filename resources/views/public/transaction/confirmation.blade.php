@extends('layouts.transaction')
@section('title') Paso 4 - Confirmación @endsection
@section('header')
@endsection
@section('content')
<section style="min-height: 553px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <ul class="nav nav-pills nav-fill nav-transaction">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-bag"></i> Carrito de Compras</a>
                    </li>
                    <li class="nav-item separador"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-truck"></i> Despacho</a>
                    </li>
                    <li class="nav-item separador"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cash-register"></i> Pago</a>
                    </li>
                    <li class="nav-item separador"></li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-clipboard-check"></i> Confirmación</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-8 col-md-8 offser-lg-2 offset-md-2">
                <div class="row">
                    @if($transaction ?? '')
                        <div class="col-md-12">
                            <div class="text-center title-confirmation-icon">
                                <img src="https://img.icons8.com/color/72/000000/shopping-basket.png"/>
                                <img class="img2-carro" src="https://img.icons8.com/color/50/000000/sad--v1.png"/>
                            </div>
                            <table class="table table-sm text-center">
                                <thead>
                                <tr class="table-danger">
                                    <td id="titleError" class="title-confirmation" width="100%" class="table-success">{{ $titleError }}</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="padding: 10px 60px;" class="table-warning">
                                    <td id="messageError">{{$messageError}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="col-md-12">
                            <div class="text-center title-confirmation-icon">
                                <img src="https://img.icons8.com/color/72/000000/paid.png"/>
                                <img class="img2-carro" src="https://img.icons8.com/color/50/000000/smiling.png"/>
                            </div>
                            <table class="table table-sm text-center">
                                <thead>
                                <tr class="table-success">
                                    <td class="title-confirmation" width="50%" colspan="2" class="table-success">Tu Pago se ha realizado con exito</td>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="table-light">
                                    <th>NºPedido</th>
                                    <td id="buyorden"></td>
                                </tr>
                                <tr class="table-info">
                                    <th>Monto</th>
                                    <td id="amount"></td>
                                </tr>
                                <tr class="table-light">
                                    <th>Medio de Pago</th>
                                    <td id="paymentTypeCode"></td>
                                </tr>
                                <tr class="table-info">
                                    <th>NªTarjeta</th>
                                    <td id="cartNumber"></td>
                                </tr>
                                <tr class="table-light">
                                    <th>Código de Autorización</th>
                                    <td id="authorizationCode"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type ="text/javascript">
    const transactionStatus = parseInt(window.localStorage.getItem('responseCode'));
    const formatter = new Intl.NumberFormat('es-CL', {
        style: 'currency',
        currency: 'CLP',
        minimumFractionDigits: 0
    });

    if(transactionStatus === 0){
        document.getElementById('authorizationCode').innerHTML = window.localStorage.getItem('authorizationCode');
        document.getElementById('amount').innerHTML = formatter.format(window.localStorage.getItem('amount'));

        var sharesNumber = window.localStorage.getItem('sharesNumber');
        var paymentType = window.localStorage.getItem('paymentTypeCode');
        var paymentMessage = document.getElementById('paymentTypeCode');
        switch (paymentType) {
            case "VD":
                paymentMessage.innerHTML = "Tarjeta de Débito";
                break;
            case "VN":
                paymentMessage.innerHTML = "Tarjeta de Crédito Sin Cuotas";
                break;
            case "VC":
                paymentMessage.innerHTML = "Tarjeta de Crédito / "+sharesNumber+" Cuotas Normales";
                break;
            case "SI":
                paymentMessage.innerHTML = "Tarjeta de Crédito / 3 Cuotas sin Interés";
                break;
            case "S2":
                paymentMessage.innerHTML = "Tarjeta de Crédito / 2 Cuotas sin Interés";
                break;
            case "NC":
                paymentMessage.innerHTML = "Tarjeta de Crédito / "+sharesNumber+" Cuotas sin Interés";
                break;
            case "VP":
                paymentMessage.innerHTML = "Tarjeta Prepago";
        }
        document.getElementById('cartNumber').innerHTML = 'XXXX-XXXX-XXXX-'+ window.localStorage.getItem('cartNumber');
        document.getElementById('buyorden').innerHTML = window.localStorage.getItem('buyorden');
    }
</script>
@endsection
