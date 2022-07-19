<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniciar sesion</title>
</head>
<body bgcolor=#EEE1FF>
	<center><h1>Inicio de sesion</h1>
		<form action="#" method="POST">
			Nombre Usuario<br><input type="text" name="nomusuario"><br><br>
			Contraseña<br><input type="password" name="clave"><br><br>
			<input type="submit" value="Iniciar Sesion">
			<input type="reset" value="Limpiar Campos">
		</form>
	</center>







<?php
	include_once 'Conexion.php';
	session_start();
	if (isset($_POST['cerrar_sesion'])) 
		{
			session_unset();
			unset($_SESSION["nomusuario"]);
			session_destroy();//header('Location:../login.php');
		}
	if (isset($_SESSION['rol'])) 
		{
		switch ($_SESSION['rol']) 
			{
			case 1:
				header('Location: Administrador.php');
				break;
			case 2:
				header('Location: instructor.php');
				break;
			case 3:
				header('Location: aprendiz.php');
				break;
			case 4:
				header('Location: invitado.php');
				break;
			default:
				echo "no estoy en nada";
				break;
			}
		}
	if (isset($_POST['nomusuario']) && isset($_POST['clave'])) 
		{
			$username = $_POST['nomusuario'];
			$password = $_POST['clave'];
			$db = new Database();
			$query = $db->connect()->prepare('SELECT *FROM usuarios WHERE usuarios = :nomusuario AND clave =:clave');
			$query->execute(['nomusuario' =>$username, 'clave'=>$password]);
			$arreglofila = $query->fetch(PDO::FETCH_NUM);
			if ($arreglofila == true) 
				{
					$rol = $arreglofila[3];
					$_SESSION['rol'] = $rol;
					switch($rol)
						{
						case 1: 
							header('Location: Administrador.php');
						break;
						case 2: 
							header('Location: instructor.php');
						break;
						case 3: 
							header('Location: aprendiz.php');
						break;
						case 4: 
							header('Location: invitado.php');
						break;

						default: "No estoy en nada";
						break;
						}
				}
			else
				{
					echo "Nombre de usuario o contraseña invalida!";
				}
		}
?>
</body>
</html>