<?php 
	include("Conexion.php");
	$usuarios="SELECT * FROM apellidos";
?>
<html><head></head>
<body>
	<table border="5">
		<tr>
			<th>Apellidos</th>
			<th>Identificacion</th>
		</tr>
					<?php
						$resultado=mysqli_query($conexion, $usuarios);
						while ($filas=mysqli_fetch_assoc($resultado)){
					?>
		<tr>
			<td><?php echo $filas["apellidos"] ?></td>
			<td><?php echo $filas["identificacion"] ?></td>
		</tr>
					<?php 
						}
					?>
		</table>

</body>
</html>
