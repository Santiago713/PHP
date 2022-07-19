<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<title>Taller 2 PHP</title>
	</head>
	 <body>
		<center>
			<table>
				<form method="_POST">
					<tr>Ingresar el primer número:<input type="number" name="num1"></tr>
					<tr>Ingresar el segundo número:<input type="number" name="num2"></tr>
					<tr>Ingresar el tercer número:<input type="number" name="num3"></tr>
					<input type="submit" value="ORGANIZAR">
				</form>
			</table>
		</center>
 
		<?php
			$a=$_POST['num1'];
			$b=$_POST['num2'];
			$c=$_POST['num3'];

			if(($a<$b)&&($b<$c))
				{
					echo "El numero mayor es:".$c;
					echo "El numero intermedio es:".$b;
					echo "El numero menor es:".$a;
				}
				else 
					{
						if(($a<$b)&&($b>$c))
							{
								echo "El numero mayor es:".$b;
								echo "El numero intermedio es:".$a;
								echo "El numero menor es:".$c;
							}
							else
								{
									if(($a>$b)&&$($b>$c))
										{
											echo "El numero mayor es:".$a;
											echo "El numero intermedio es:".$b;
											echo "El numero menor es:".$c;
										}
								}
					}

		?>
	</body>
</html>