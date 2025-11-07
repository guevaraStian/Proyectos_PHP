<?php
session_start();
/*Inicia validacion del lado del servidor*/
if (empty($_POST['name'])) {
	$errors[] = "Nombre vacío";
} else if (empty($_POST['description'])) {
	$errors[] = "Description vacío";
} else if (
	!empty($_POST['name']) &&
	!empty($_POST['description'])
) {

	include "../../config/config.php"; //Contiene funcion que conecta a la base de datos

	$name = $_POST["name"];
	$description = $_POST["description"];
	$coor_id = $_POST["coor_id"];

	$sqlcon = "SELECT * FROM agenciaarea WHERE name = '" . $name . "';";
	$query_check_user_name = mysqli_query($con, $sqlcon);
	$query_check_user = mysqli_num_rows($query_check_user_name);
	if ($query_check_user >= 1) {
		$errors[] = "Lo sentimos , el nombre de agencia ya está en uso.";
	} else {


		$sql = "insert into agenciaarea (name, description, coor_id) value (\"$name\",\"$description\",\"$coor_id\")";
		$query_new_insert = mysqli_query($con, $sql);
		if ($query_new_insert) {
			$messages[] = "Tu proyecto ha sido ingresado satisfactoriamente.";
		} else {
			$errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($con);
		}
	}
} else {
	$errors[] = "Error desconocido.";
}

if (isset($errors)) {

?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error!</strong>
		<?php
		foreach ($errors as $error) {
			echo $error;
		}
		?>
	</div>
<?php
}
if (isset($messages)) {

?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡Bien hecho!</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}

?>