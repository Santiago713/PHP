<?php 
	include_once 'Conexion.php';
	session_start();
	if(!isset($_SESSION['rol'])){
		header('Location: Iniciar_sesion.php');
	}
	else{
		if($_SESSION['rol']!=4){
			header('Location: Iniciar_sesion.php');
		}
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Invitado</title>
</head>
<body>
	<center><h1>Invitado</h1>
		<form action="#" method="POST">
		<input type="submit" name="Imagen" value="Ver a CJ"><br>
	</form>
	<?php 
	if(isset($_POST['Imagen'])){
	?>
		<img src="cj.jpg">
		<form action="aprendiz.php" method="POST"><br>
			<p>¿Quieres ver por que CJ esta preocupado?</p>
		<form>
		<input type="submit" name="No" value="No">
	</form>
	<form method="POST" action="#">
		<input type="submit" name="Si" value="Si">
	</form>
	</body>
	<?php 
		}

	?>
	<?php 
		if(isset($_POST['Si'])){
	?>
		<img src="mike.jpg">
	<?php 		
		}
	?>
		
	<form action="Iniciar_sesion.php" method="POST"><br>
		<input type="submit" name="cerrar_sesion" value="Cerrar Sesion">
	</form>

</body>
</html>