<?php 
	include("Conexion.php");
	$usuarios="SELECT * FROM nombres";
?>
<html><head></head>
<body>
	<table border="5">
		<tr>
			<th>Nombres</th>
			<th>Edad</th>
		</tr>
					<?php
						$resultado=mysqli_query($conexion, $usuarios);
						while ($filas=mysqli_fetch_assoc($resultado)){
					?>
		<tr>
			<td><?php echo $filas["nombre"] ?></td>
			<td><?php echo $filas["edad"] ?></td>
		</tr>
					<?php 
						}
					?>
		</table>

</body>
</html>



