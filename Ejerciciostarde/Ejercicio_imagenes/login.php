<html><head></head>
<body bgcolor="#CCFFED">
	<style type="text/css">
		input[type="text"]{
			border-radius: 10px;
			text-align: center;
		}
		input[type="password"]{
			border-radius: 10px;
			text-align: center;
		}

		input[type="submit"]{
			color: white;
			background-color: black;
			border-radius: 10px;
			cursor: pointer;
		}
		input[type="submit"]:hover{
			color: black;
			background-color: white;
			border-radius: 10px;
			transition: 0.5s;
		}

		input[type="reset"]{
			color: white;
			background-color: black;
			border-radius: 10px;
			cursor: pointer;
		}
		input[type="reset"]:hover{
			color: black;
			background-color: white;
			border-radius: 10px;
			transition: 0.5s;
		}
	</style>
	<center><h1>Inicio de Sesion</h1>
		<form action="#" method="POST">
			Nombre Usuario<br><input type="text" name="nomusuario"><br>
			Contraseña    <br><input type="password" name="clave"><br><br>
			<input type="submit" value="Iniciar Sesion"><br><br>
			<input type="reset" value="Limpiar Campos"><br>
		</form>
	</center>

<?php
	include_once 'conexion.php';
	session_start();
	if (isset($_POST['cerrar_sesion'])) 
		{
			session_unset();
			unset($_SESSION['nomusuario']);
			session_destroy();//header('Location:../login.php');
		}
	if (isset($_SESSION['rol'])) 
		{
		switch ($_SESSION['rol']) 
			{
			case 1:
				header('Location: administrador.php');
				break;
			case 2:
				header('Location: instructor.php');
				break;
			case 3:
				header('Location: aprendiz.php');
				break;
			case 4:
				header('Location: invitado1.php');
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
			$query = $db->connect()->prepare('SELECT *FROM usuarios WHERE nomusuario = :nomusuario AND clave =:clave');
			$query->execute(['nomusuario' =>$username, 'clave'=>$password]);
			$arreglofila = $query->fetch(PDO::FETCH_NUM);
			if ($arreglofila == true) 
				{
					$rol = $arreglofila[3];
					$_SESSION['rol'] = $rol;
					switch($rol)
						{
						case 1: 
							header('Location: administrador.php');
						break;
						case 2: 
							header('Location: instructor.php');
						break;
						case 3: 
							header('Location: aprendiz.php');
						break;
						case 4: 
							header('Location: invitado1.php');
						break;

						default: "No estoy en nada";
						break;
						}
						$usuario=$arreglofila[1];
						$_SESSION['nomusuario']=$usuario;

						$fotosesion=$arreglofila[5];
						$_SESSION['foto']=$fotosesion;

						$correo=$arreglofila[4];
						$_SESSION['correo']=$correo;

				}
			else
				{
					echo "<script>alert('El usuario o contraseña es incorrecto');</script>";

				}
		}
?>
</body>
</html>