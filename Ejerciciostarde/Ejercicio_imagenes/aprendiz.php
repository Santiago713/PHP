<?php
include_once 'conexion.php';
session_start();
if(!isset($_SESSION['rol']))
	{
		header('location: loginphp.php');
	}
else
	{
		if($_SESSION['rol'] !=3)
			{
				header('location: loginphp.php');
			}
	}
?>
<html><head></head>
<body>
<div align="center">
	<?php

		$usuario = $_SESSION['nomusuario'];
		$fotosesion = $_SESSION['foto'];
		echo "<font face= impact size= 6> Bienvenid@ <br>Aprendiz  <br>".$usuario."</font><br>";
		echo "<div align='center'><img src='imagenes/$fotosesion ?>' width='200' height='160' ></div>";	
	?>
		
</div >
<table border="3" align="center">
	<tr>	
			<th>ID</th>
			<th>NOMBRE</th>
			<th>PASSWORD</th>
			<th>IDROL</th>
			<th>EMAIL</th>

			<th>EDITAR</th>
	</tr>
<?php
$conexion=mysqli_connect('localhost','root','','crud') or die ('problems en la conexion');
$observar = "SELECT * FROM usuarios";
$ejecutar=mysqli_query($conexion,$observar);
	$contador = 0;
	while ($filas=mysqli_fetch_array($ejecutar)) 
	{
		$id =       $filas['id'];
		$usuario =  $filas['nomusuario'];
		$password = $filas['clave'];
		$idrol =    $filas['idrol'];
		$email =    $filas['email'];
		$contador++;
	?>
	<tr align="center">	
			<td><?php echo $id ?></td>
			<td><?php echo $usuario ?></td>
			<td><?php echo $password ?></td>
			<td><?php echo $idrol ?></td>
			<td><?php echo $email ?></td>

			<!-- <td><button style="background-color: orange"><a href="aprendiz.php? editar= <?php //echo $id; ?>">Editar</a></td> -->
			<td><button><a href="aprendiz.php? editar= <?php echo $id; ?>">Editar</a></td>
	</tr>
	<?php
	}
	?>
</table>

<?php
if(isset($_GET['editar']))
	{include_once 'editar.php';
    }
?>

<?php
if(isset($_POST['actualizame']))
	{
	$actualizausuario = $_POST['usuario'];
	$actualizaclave   = $_POST['clave'];
	$actualizaemail   = $_POST['email'];
	$actualizafoto = $_POST['foto'];

	$update = "UPDATE usuarios SET nomusuario = '$actualizausuario',clave = ('$actualizaclave'),email = '$actualizaemail',foto = '$actualizafoto' WHERE id = '$editar_id'";
	$ejecutar=mysqli_query($conexion,$update);
	if ($ejecutar)
		{
			//header("Location: aprendiz.php");
			// echo "<script>
			// 		windows.open('administrador.php')
			// 	 </script> ";
		}
	else
		{
			echo "<script>
								alert ('no se pudo EDITAR')
							 </script> ";
		}
	}
	//unset($_POST['actualizame']);
?>
<div align="center">
	<form action="login.php" method="POST">
		<input type="submit" name="cerrar_sesion" value="CERRAR SESION">
	</form>
</div>
</body>
</html>