<?php
	include("Conexion.php");
	$nombre=$_POST["nombre"];
	$insertar="INSERT INTO registrar(nombre) values('$nombre')";
	$resultado=mysqli_query($conexion,$insertar);
	if($resultado)
	{
		echo "<script>alert('Registro exitoso');
		window.location.href='biblioteca.php'</script>";
	}
	else{
		echo "<script>alert('No se puede registrar');
		window.history.go(-1);</script>";

	}
?>