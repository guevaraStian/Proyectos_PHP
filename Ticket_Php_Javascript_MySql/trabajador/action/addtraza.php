<?php	
	session_start();
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['ticket_id'])) {
           $errors[] = "Id ticket vacio";
        } else if (empty($_POST['descriptraza'])){
			$errors[] = "Descripcion vacío";
		} else if (
			!empty($_POST['ticket_id']) &&
			!empty($_POST['descriptraza'])
		){


		include "../../config/config.php";//Contiene funcion que conecta a la base de datos

		$ticket_id = $_POST["ticket_id"];
		$descriptraza = $_POST["descriptraza"];
		$user_id = $_SESSION["user_id"];
		$created_at="NOW()";

		$sql="insert into trazabilidad (ticket_id,descriptraza,user_id,created_at) value (\"$ticket_id\",\"$descriptraza\",$user_id,$created_at)";

		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Tu trazabilidad ha sido ingresado satisfactoriamente.";
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