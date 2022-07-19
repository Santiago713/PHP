<?php 
	include_once 'Conexion.php';
	session_start();
	if(!isset($_SESSION['rol'])){
		header('Location: Iniciar_sesion.php');
	}
	else{
		if($_SESSION['rol']!=2){
			header('Location: Iniciar_sesion.php');
		}
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Instructor</title>
	<script type="text/javascript">
		function resta(){
			var numero1=parseInt(document.getElementById('numero1').value);
			var numero2=parseInt(document.getElementById('numero2').value);
			var resultado=numero1-numero2;
			alert("El resultado de la resta es: "+ resultado);

		}
	</script>
</head>
<body>

	<center><h1>Instructor</h1>
	<p>Resta de dos valores</p>
	<input type="text" id="numero1" placeholder="Ingrese un valor">
	<input type="text" id="numero2" placeholder="Ingrese un valor">
	<input type="button" name="resta" value="Resta" onclick="resta()">
	<form action="Iniciar_sesion.php" method="POST"><br>
		<input type="submit" name="cerrar_sesion" value="Cerrar Sesion">
	</form></center>

</body>
</html>