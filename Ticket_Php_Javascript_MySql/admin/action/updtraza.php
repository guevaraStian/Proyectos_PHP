<?php
	session_start();
	if (empty($_POST['mod_trazab_id'])) {
		$errors[] = "ID vacío";
	 } else if (empty($_POST['mod_tickete_id'])){
		 $errors[] = "ticket_id vacío";
	 } else if (empty($_POST['mod_descriptrazab'])){
		 $errors[] = "descriptraza vacío";
	 }  else if (
		 !empty($_POST['mod_tickete_id']) &&
		 !empty($_POST['mod_descriptrazab'])
	 ){

		include "../../config/config.php";//Contiene funcion que conecta a la base de datos


		$traza_id=$_POST['mod_trazab_id'];
		$ticket_id = $_POST["mod_tickete_id"];
		$descriptraza = $_POST["mod_descriptrazab"];
		


		$sql = "update trazabilidad set ticket_id=\"$ticket_id\",descriptraza=\"$descriptraza\" where traza_id=$traza_id";

		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "La trazabilidad ha sido actualizado satisfactoriamente.";
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