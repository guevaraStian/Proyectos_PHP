<?php
	session_start();

	if (isset($_POST['token']) && $_POST['token']!=='') {
			
	//Contiene las variables de configuracion para conectar a la base de datos
	include "../../config/config.php";

	$cedula=mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));
	$password=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)))));

    $query = mysqli_query($con,"SELECT * FROM user WHERE cedula =\"$cedula\" OR username=\"$cedula\" AND password = \"$password\";");

		if ($row = mysqli_fetch_array($query)) {
			//se guarda la variable id del row (la respuesta del query) en la variable user_id de _SESSION
				$_SESSION['rol'] = $row[9];
				// $id = $_SESSION['user_id'];
				// echo $_SESSION['rol'];
				//si user_id es == 1 es el administrador e ingresa a dashboard
				
					if ($_SESSION['rol'] == 1) {
						header("location: ../../inicioadmin.php");
					}
					if ($_SESSION['rol']==2 ) {
						// if ($_SESSION['user_id']>=2 && $_SESSION['user_id']<=9 ) { //mas seguro esta condicional
						header("location: ../../trabajador/iniciotrabajador.php");
					}
					if ($_SESSION['rol']==3 ) {
						header("location: ../../usuario/iniciousuario.php");
					}
					// if ($_SESSION['rol']>=4 ) {
					// 	header("location: ../../index.php");
					// }
				
		}else{
			$invalid=sha1(md5("contrasena y cedula invalido"));
			header("location: ../../index.php?invalid=$invalid");
		}
	}else{
		header("location: ../../");
	}

?>