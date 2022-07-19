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
			filter: drop-shadow(10px 5px);
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
<br>

<div align="center">
	<form method="POST">
		<input type="text" name="nombre" placeholder="Nombre" required><br>
		<input type="text" name="clave" placeholder="Clave" required><br>
		<input type="number" name="idrol" placeholder="Rol" required><br>
		<input type="text" name="email" placeholder="Email" required><br>
		<input type="file" name="foto"><br><br>
		<input type="submit" name="insertar" value="Insertar" >
	</form>
</div>

<?php 
	if(isset($_POST['insertar'])){
		$usuario= $_POST['nombre'];
		$clave= $_POST['clave'];
		$idrol= $_POST['idrol'];
		$email= $_POST['email'];
		$foto = $_POST['foto'];

		$insertar="INSERT INTO usuarios(nomusuario, clave, idrol, email, foto) values('$usuario', '$clave', '$idrol', '$email', '$foto')";
		$ejecutar=mysqli_query($conexion,$insertar);
		if($ejecutar){
		}
		else{
			echo "<script>
			alert('No se puede insertar')
			</scrip>"	;
		}
	}
?>

<table border="3" align="center">
	<tr>	
			<th>ID</th>
			<th>NOMBRE</th>
			<th>PASSWORD</th>
			<th>IDROL</th>
			<th>EMAIL</th>
			<th>FOTO</th>

			<th>EDITAR</th>
			<th>BORRAR</th>
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
		$fotosesion=$filas['foto'];
		$contador++;
	?>
	<tr align="center">	
			<td><?php echo $id ?></td>
			<td><?php echo $usuario ?></td>
			<td><?php echo $password ?></td>
			<td><?php echo $idrol ?></td>
			<td><?php echo $email ?></td>
			<td><img src="imagenes/<?php echo $fotosesion ?>" width="50" height="40"></td>

			<td><button><a href="administrador.php? editar= <?php echo $id; ?>">Editar</a></td>
			<td><button><a href="administrador.php? borrar= <?php echo $id; ?>">Borrar</a></td>
	</tr>
	<?php
	}
	?>
</table>

<?php
	if(isset($_GET['editar'])){
		include_once 'editar.php';
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

<?php 
	if(isset($_GET['borrar'])){
		$borrar_id=$_GET['borrar'];
		$borrar="DELETE FROM usuarios WHERE id='$borrar_id'";
		$ejecutar=mysqli_query($conexion, $borrar);
		if ($ejecutar){
			echo "<script>
				windows.open(administrador.php);
				</script>";
		}
		else{
			echo "<script>
				alert('No se puede borrar');
				</script>";
		}
	}
	unset($_POST['borrar'])
?>






<div align="center">	
	<form action="login.php" method="POST">
		<input type="submit" name="cerrar_sesion" value="CERRAR SESION">
	</form>
</div>
</body>
</html>

