<?php 
	include_once 'conexion.php';
	session_start();
	if(!isset($_SESSION['rol'])){
		header('Location: login.php');
	}
	else{
		if($_SESSION['rol']!=1){
			header('Location: login.php');
		}
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
</head>
<body>
	<script type="text/javascript">
		function suma(){
			var numero1=parseInt(document.getElementById('numero1').value);
			var numero2=parseInt(document.getElementById('numero2').value);
			var resultado=numero1+numero2;
			alert("El resultado de la suma es: "+ resultado);

		}
	</script>
	<center><h1>Administrador</h1>
	<p>Suma de dos valores</p>
	<input type="text" id="numero1" placeholder="Ingrese un valor">
	<input type="text" id="numero2" placeholder="Ingrese un valor">
	<input type="button" name="Suma" value="Suma" onclick="suma()"><br>
	<form action="Iniciar_sesion.php" method="POST"><br>
	<input type="submit" name="cerrar_sesion" value="Cerrar Sesion">
	</form></center>

</body>
</html>