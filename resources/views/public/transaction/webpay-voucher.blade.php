<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form style="display: none" action="{{$result->urlRedirection}}" id="auto" method="post">
    <input type="hidden" name="token_ws" value="{{$tokenWs}}">
    <input type="submit" value="enviar">
</form>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script type="text/javascript">
    $(function(){
        window.localStorage.clear();
        window.localStorage.setItem("authorizationCode",{{$details->authorizationCode}});
        window.localStorage.setItem("amount",{{$details->amount}});
        window.localStorage.setItem("responseCode",{{$details->responseCode}});
        window.localStorage.setItem("paymentTypeCode",'{{$details->paymentTypeCode}}');
        window.localStorage.setItem("cartNumber",{{$cartNumber}});
        window.localStorage.setItem("buyorden",{{$details->buyOrder}});
        window.localStorage.setItem("sharesNumber",{{$details->sharesNumber}});
        $('#auto').submit();
    });
</script>

</body>
</html>
