<?php
include_once 'conexion.php';
session_start();
if(!isset($_SESSION['rol']))
	{
		header('location: login.php');
	}
else
	{
		if($_SESSION['rol'] !=1)
			{
				header('location: login.php');
			}
	}
?>
<html><head></head>
<body>
	<style type="text/css">
		input[type="submit"]{
			color: white;
			background-color: black;
			border-radius: 10px;
			cursor: pointer;
			transition: 0.5s;

		}
		input[type="submit"]:hover{
			color: black;
			background-color: white;
			border-radius: 10px;
			transition: 0.5s;
			filter: drop-shadow(10px 5px)
			drop-shadow(20px 10px);
		}
	</style>
<?php
$conexion=mysqli_connect('localhost','root','','crud') or die ('problemas en la conexion');
?>
<div align="center">
	<?php
	$usuario = $_SESSION['nomusuario'];
	$fotosesion = $_SESSION['foto'];
	echo "<font face= impact size= 6> Bienvenid@ <br>Administrador(a)  <br>".$usuario."</font><br>";
	echo "<div align='center'><img src='imagenes/$fotosesion ?>' width='200' height='160' ></div>";	
	?>
</div>

<div align="center">	
	<form action="login.php" method="POST">
		<input type="submit" name="cerrar_sesion" value="CERRAR SESION">
	</form>
</div>
</body>
</html>