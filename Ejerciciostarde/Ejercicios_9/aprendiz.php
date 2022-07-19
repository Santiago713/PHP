<?php 
	include_once 'Conexion.php';
	session_start();
	if(!isset($_SESSION['rol'])){
		header('Location: Iniciar_sesion.php');
	}
	else{
		if($_SESSION['rol']!=3){
			header('Location: Iniciar_sesion.php');
		}
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Aprendiz</title>
</head>
<body>
	<center><h1>Aprendiz</h1>
	<form action="#" method="POST">
		<input type="submit" name="Imagen" value="Imagen"><br>
	</form>
	<?php 
	if(isset($_POST['Imagen'])){
	?>
	<body background="minion.jpg">
		<img src="descarga.jpg">
		<form action="aprendiz.php" method="POST"><br>
		<input type="submit" name="Borrar" value="Borrar imagen">
		
	</form>
	</body>
	<?php 
		}

	?>

	

	<form action="Iniciar_sesion.php" method="POST"><br>
		<input type="submit" name="cerrar_sesion" value="Cerrar Sesion">
	</form></center>

</body>
</html>

