<?php
	session_start();
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        } else if (empty($_POST['title'])){
			$errors[] = "Titulo vacío";
		} else if (empty($_POST['description'])){
			$errors[] = "Description vacío";
		}  else if (
			!empty($_POST['title']) &&
			!empty($_POST['description'])
		){

		include "../../config/config.php";//Contiene funcion que conecta a la base de datos



		$title = $_POST["title"];
		$description = $_POST["description"];
		// $trabajador_id = $_POST["trabajador_id"];
		$agenciaarea_id = $_POST["agenciaarea_id"];

		$agenciadestino_id = $_POST["agenciadestino_id"];

		$priority_id = $_POST["priority_id"];
		$user_id = $_SESSION["user_id"];
		$status_id = $_POST["status_id"];
		$pedido_id = $_POST["pedido_id"];
		$id=$_POST['mod_id'];

		$iduser = $_SESSION['cedula'];
	
		// echo $title;

		$sql = "update ticket set title=\"$title\",agenciaarea_id=\"$agenciaarea_id\",   agenciadestino_id=\"$agenciadestino_id\"    ,trabajador_id=\"$iduser\" ,   priority_id=\"$priority_id\",	description=\"$description\",status_id=\"$status_id\",pedido_id=\"$pedido_id\",	 updated_at=NOW() where id=$id ";


		
		



		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "El ticket ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
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
			if (isset($messages)){
				
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