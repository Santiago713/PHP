<?php
include_once 'conexion.php';
session_start();
if(!isset($_SESSION['rol']))
	{
		header('location: login.php');
	}
else
	{
		if($_SESSION['rol'] !=4)
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
			filter: drop-shadow(10px 5px )
			;
		}
	</style>
<?php
$conexion=mysqli_connect('localhost','root','','crud') or die ('problemas en la conexion');
?>
<div align="center">
	<?php
	$usuario = $_SESSION['nomusuario'];
	$fotosesion = $_SESSION['foto'];
	echo "<font face= impact size= 6> Bienvenid@ <br>Invitad@  <br>".$usuario."</font><br>";
	echo "<div align='center'><img src='imagenes/$fotosesion ?>' width='200' height='160' ></div>";	
	?>
</div><br>
<form action="#" method="POST">
<center>
<input type="submit" name="consulta" value="Consultar datos">
</center>
</form>

<?php 
	if(isset($_POST['consulta'])){
?>
<body style="background-image: url(imagenes/otaku2.jfif);">
		<h1 align="center">Consulta de Usuarios</h1>
		<table border="3" align="center" style="background-image: url(imagenes/otaku.jfif); ">
			<tr>
				<th>Usuarios</th>
				<th>E-mail</th>
				<th>Clave</th>
			</tr>
			<?php
				$consulta="select * from usuarios";
				$ejecutar=mysqli_query($conexion, $consulta);
				$i=0;
				while ($fila=mysqli_fetch_array($ejecutar)){
					$usuario=$fila['nomusuario'];
					$email=$fila['email'];
					$clave=$fila['clave'];
					$i++;
			?>
			<tr>
				<th><?php echo$usuario ?></th>
				<th><?php echo$email ?></th>
				<th><?php echo$clave ?></th>
			</tr>
			<?php 
				}
			?>
		</table><br>

		<center>
		<form action="invitado1.php" method="POST">
			<input type="submit" name="cerrar" value="Cerrar Consulta">
		</form>
	</center>
<?php 
	}
?>


<div align="center">	
	<form action="login.php" method="POST">
		<input type="submit" name="cerrar_sesion" value="CERRAR SESION">
	</form>
</div>
</body>
</html>