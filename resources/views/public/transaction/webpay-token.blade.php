<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

</head>
<body>
	<form style="display: none" action="{{$formAction}}" id="auto" method="post">
	    <input type="hidden" name="token_ws" value="{{$tokenWs}}">
	    <input type="submit" value="enviar">
	</form>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<script type="text/javascript">
	$(function(){
		$('#auto').submit();
	});
	</script>
</body>
</html>
