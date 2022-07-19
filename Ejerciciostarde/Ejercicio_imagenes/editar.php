<?php
	$editar_id = $_GET['editar'];
	$consulta = "SELECT * FROM usuarios WHERE id = '$editar_id'";
	$ejecutar=mysqli_query($conexion,$consulta);
	$filas=mysqli_fetch_array($ejecutar);
		$id =       $filas['id'];
		$usuario =  $filas['nomusuario'];
		$password = $filas['clave'];
		$email =    $filas['email'];
		$foto = $filas['foto'];
?>
<div align="center">
	<form method="POST" action="#">
		NOMBRE <input type="text"     name="usuario" value="<?php echo $usuario?>"> <br>
		CLAVE  <input type="text" name="clave"   value="<?php echo $password?>"><br>
		EMAIL  <input type="email"    name="email"   value="<?php echo $email?>"><br>
		FOTO <input type="file" name="foto" value="<?php echo $foto?>"><br>
		ENVIAR <input type="submit"   name="actualizame" value="Actualizar Datos">
	</form>
</div>