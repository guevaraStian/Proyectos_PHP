<?php
session_start();
$idti = $_GET['idti'];
// $idti = $_POST['id'];

//Database Connection
// $conn = mysqli_connect('localhost', 'root', '', 'upload');
$con = mysqli_connect('localhost', 'root', '', 'ticket');
//Check for connection error
if ($con->connect_error) {
	die("Error in DB connection: " . $con->connect_errno . " : " . $con->connect_error);
}

if (isset($_POST['submit'])) {
	// Count total uploaded files
	$totalfiles = count($_FILES['file']['name']);

	// Looping over all files
	for ($i = 0; $i < $totalfiles; $i++) {
		
		$filename2 = $_FILES['file']['name'][$i];
		date_default_timezone_set('America/Bogota');
		$fecha = date('Ymd_His_');
		$filename =$fecha.$filename2 ;

		// Upload files and store in database
		if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], 'upload/' . $filename)) {
			// Image db insert sql
			$insert = "INSERT into files(file_name,uploaded_on,idticket) values('$filename',now(),$idti)";
			if (mysqli_query($con, $insert)) {
				// echo 'Data inserted successfully';
			} else {
				echo 'Error: ' . mysqli_error($con);
			}
		} else {
			echo 'Error in uploading file - ' . $_FILES['file']['name'][$i] . '<br/>';
		}
	}
}

//CODIGO PARA CARGAR LA INFORMACION DEL TICKET ANTERIOR
$agenciaarea = mysqli_query($con, "select * from agenciaarea");
$priorities = mysqli_query($con, "select * from priority");
$statuses = mysqli_query($con, "select * from status");
$pedido = mysqli_query($con, "select * from pedido");
$trabajador = mysqli_query($con, "select * from trabajador");
$titulo = mysqli_query($con, "select * from tituloticket");

$ticketsel = mysqli_query($con, "select * from ticket where id = $idti");
$row = mysqli_fetch_array($ticketsel);

$idaatick = $row['8'];
$aatick = mysqli_query($con, "select * from agenciaarea where id = $idaatick");
$row2 = mysqli_fetch_array($aatick);

$idades = $row['9'];
$aredes = mysqli_query($con, "select * from agenciaarea where id = $idades");
$rowdes = mysqli_fetch_array($aredes);

// if (isset($row['10'])) {
// 	$idtrtick = $row['10'];
// 	$trtick = mysqli_query($con, "select * from trabajador where id = $idtrtick");
// 	$roww = mysqli_fetch_array($trtick);
// 	$row3  = $roww[1];
// 	$row31  = $roww[0];
// } else {
// 	$row3  = 'Ninguno';
// 	$row31  = 1;
// }




$idprtick = $row['11'];
$prtick = mysqli_query($con, "select * from priority where id = $idprtick");
$row4 = mysqli_fetch_array($prtick);

$idsttick = $row['12'];
$sttick = mysqli_query($con, "select * from status where id = $idsttick");
$row5 = mysqli_fetch_array($sttick);

$userid = $row['6'];
$sttick = mysqli_query($con, "select * from user where id = $userid ");
$row6 = mysqli_fetch_array($sttick);

$idtitu = $row['1']; 
$tttick = mysqli_query($con, "select * from tituloticket where idtitu = $idtitu ");
$row7 = mysqli_fetch_array($tttick);

// FIN CODIGO PARA CARGAR LA INFORMACION DEL TICKET ANTERIOR

?>

<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>


	<div class="container">

		<h1>Edicion de ticket</h1>
		<h5>En esta opcion puede modificar los datos del ticket y luego dar click en el boton "Editar informacion" para que se guarden los cambios.</h5>

		<form method="post" id="updti" name="updti" enctype='multipart/form-data'>

			<div id="result2"></div>

			<div class="col-md-9 col-sm-9 col-xs-12" hidden>
				<input type="text" name="pedido_id" id="mod_pedido_id" class="form-control" value="<?php echo $row['5']; ?>"></option>
			</div>

			<div class="form-group row">
				<label class="control-label col-md-2 col-sm-1 col-xs-1">ID ticket <span class="required"></span></label>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<input type="text" name="mod_id" class="form-control" value="<?php echo $row['0']; ?>" readonly></option>
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-2 col-sm-1 col-xs-1">Creador del ticket <span class="required"></span></label>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<input type="text" name="mod_id" class="form-control" value="<?php echo $row6['name']; ?>" disabled></option>
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-2 col-sm-1 col-xs-12" for="first-name">Area Solicitante
				</label>
				<div class="col-md-6  col-sm-6  col-xs-6 ">
					<select class="form-control" name="agenciaarea_id" required id="mod_agenciaarea_id2" readonly>
						<option selected value="<?php echo $row2['0'];   ?>"><?php echo $row2['1']; ?></option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="control-label col-md-2 col-sm-1 col-xs-1" for="first-name">Area de destino
				</label>
				<div class="col-md-6  col-sm-6  col-xs-6 ">
					<select class="form-control" name="agenciadestino_id" required id="mod_agenciadestino_id">
						<option selected value="<?php echo $rowdes['0']; ?>"><?php echo $rowdes['1']; ?></option>
						<?php foreach ($agenciaarea as $p) : ?>
							<option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="control-label col-md-2 col-sm-1 col-xs-1">Titulo<span class="required">*</span></label>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<select class="form-control" name="title" required  id="mod_title2">
						<option selected value="<?php echo $row['1']; ?>"><?php echo $row7['1']; ?></option>
						<?php foreach ($titulo as $t) : ?>
							<option value="<?php echo $t['idtitu']; ?>"><?php echo $t['nomtitu']; ?></option>
						<?php endforeach; ?>
					</select>


					<!-- <input type="text" name="title" class="form-control" maxlength="40" placeholder="Titulo" id="mod_title2" value="<?php echo $row['1']; ?>"></option> -->
				
				
				
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-2 col-sm-1 col-xs-12">Descripción <span class="required">*</span>
				</label>
				<div class="col-md-6  col-sm-6  col-xs-6 ">
					<textarea name="description" id="mod_description2" maxlength="100" class="form-control col-md-7 col-xs-12" required><?php echo $row['2']; ?></textarea>
				</div>
			</div>
			<!-- <div class="form-group row">
				<label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Agencia - Area Solicitante
				</label>
				<div class="col-md-6  col-sm-6  col-xs-6 ">
					<select class="form-control" name="agenciaarea_id" required id="mod_agenciaarea_id2">
						<option selected value="<?php //echo $row2['0']; 
												?>"><?php //echo $row2['1']; 
													?></option>
						<?php //foreach ($agenciaarea as $p) : 
						?>
							<option value="<?php //echo $p['id']; 
											?>"><?php //echo $p['name']; 
												?></option>
						<?php //endforeach; 
						?>
					</select>
				</div>
			</div> -->
			<!-- <div class="form-group row">
				<label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Trabajador Asignado
				</label>
				<div class="col-md-6  col-sm-6  col-xs-6 ">
					<select class="form-control" name="trabajador_id" required id="mod_trabajador_id2">
						<option selected value="<?php //echo $row31; ?>"><?php //echo $row3; ?></option>
						<?php //foreach ($trabajador as $p) : ?>
							<option value="<?php //echo $p['id']; ?>"><?php //echo $p['name']; ?></option>
						<?php //endforeach; ?>
					</select>
				</div>
			</div> -->
			<div class="form-group row">
				<label class="control-label col-md-2 col-sm-1 col-xs-1" for="first-name">Prioridad
				</label>
				<div class="col-md-6  col-sm-6  col-xs-6 ">
					<select class="form-control" name="priority_id" required id="mod_priority_id2">
						<option selected value="<?php echo $row4['0']; ?>"><?php echo $row4['1']; ?></option>
						<?php foreach ($priorities as $p) : ?>
							<option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-2 col-sm-1 col-xs-12" for="first-name">Estado
				</label>
				<div class="col-md-6  col-sm-6 col-xs-6 ">
					<select class="form-control" name="status_id" required id="mod_status_id2">
						<option selected value="<?php echo $row5['0']; ?>"><?php echo $row5['1']; ?></option>
						<?php foreach ($statuses as $p) : ?>
							<option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<input type='submit' name='submit2' id="upd_tick" value='Editar informacion' class="btn btn-success">
			</div>
		</form>
	</div>




	<!-- SUBIR ARCHIVO Y EDITAR ARCHIVOS -->

	<div class="container">
		<h2>Selecciones los archivos que va a subir</h2>
		<h5>En esta opcion puede eliminar y subir archivos relacionados al del ticket y luego dar click en el boton "Subir archivos" para que se guarden los cambios.</h5>
		<form method='post' action='' enctype='multipart/form-data'>
			<div class="form-group">
				<input type="file" name="file[]" id="file" multiple>
			</div>
			<div class="form-group">
				<input type='submit' name='submit' value='Subir archivos' class="btn btn-success">
			</div>
		</form>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table id="tablalibros" class="table-striped table-bordered" style="width:100%">
					<thead class="text-center">

						<th>Codigo</th>
						<th>Titulo</th>
						<th>Fecha</th>
						<th>N° de Ticket</th>
						<th>Opciones </th>


					</thead>
					<tbody>

						<?php





						$sql4 = "SELECT * from files where idticket = '$idti'";
						$info4   = mysqli_query($con, $sql4);
						// $row4 = mysqli_fetch_array($info4);

						if ($info4) {

							/* obtener el array asociativo */
							while ($fila = mysqli_fetch_row($info4)) {

						?>

								<tr>
									<td><?php echo $fila[0] ?></td>
									<td><?php echo $fila[1] ?></td>
									<td><?php echo $fila[2] ?></td>
									<td><?php echo $fila[3] ?></td>

									<td><a target="_blank" title='Ver documento' href="upload/<?php echo $fila[1]; ?>" class="btn btn-secondary"><i class="fa fa-download"></i>Ver documento</a>
										<a class="btn btn-danger" title='Borrar Documento' href="../archivos/borrar.php?id=<?php echo  $fila[0]; ?>&idti=<?php echo  $idti; ?> "><i class="glyphicon glyphicon-trash"></i> Borrar </a>
										<!--  -->
									</td>

							<?php




							}

							/* liberar el conjunto de resultados */
							mysqli_free_result($info4);
						}

						/* cerrar la conexión */
						// mysqli_close($con);


							?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php
	//CODIGO PARA CARGAR LAS TRAZABILIDADES
	$sqltra = "SELECT * from trazabilidad where ticket_id = '$idti'";
	$infotra   = mysqli_query($con, $sqltra);
	// $rowtra = mysqli_fetch_array($infotra);


	// 	// FIN CODIGO PARA CARGAR LAS TRAZABILIDADES

	?>
	<div class="container">
		<br>
		<h2>Las trazabilidades de este Ticket son:</h2>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<table id="tablalibros" class="table-striped table-bordered" style="width:100%">
					<thead class="text-center">

						<th>Codigo Trazabilidad</th>
						<th>Descripcion trazabilidad</th>
						<th>Pertenece al Ticket</th>
						<th>Usuario Creador</th>
						<th>Fecha de creacion</th>
						<th>Opciones </th>


					</thead>
					<tbody>

						<?php

						if ($infotra) {

							/* obtener el array asociativo */
							while ($filatra = mysqli_fetch_row($infotra)) {

								$idusr = $filatra['3'];
								$infusr = mysqli_query($con, "select * from user where id = $idusr");
								$rowusr = mysqli_fetch_array($infusr);

						?>

								<tr>
									<td><?php echo $filatra[0] ?></td>
									<td><?php echo $filatra[1] ?></td>
									<td><?php echo $filatra[2] ?></td>
									<td><?php echo $rowusr[2] ?></td>
									<td><?php echo $filatra[4] ?></td>

									<td><a class="btn btn-danger" title='Borrar Documento' href="../archivos/borrartraza.php?id=<?php echo  $filatra[0]; ?>&idti=<?php echo  $idti; ?> "><i class="glyphicon glyphicon-trash"></i> Borrar </a>
										<!--  -->
									</td>

							<?php




							}

							/* liberar el conjunto de resultados */
							mysqli_free_result($infotra);
						}

						/* cerrar la conexión */
						mysqli_close($con);


							?>

					</tbody>
				</table>
				<br>
				<br>
			</div>
		</div>
	</div>













</body>


<script>
	//Scrip para llamar al php de editar ticket
	$("#updti").submit(function(event) {
		$('#upd_tick').attr("disabled", true);

		var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "../admin/action/updticket.php",
			data: parametros,
			beforeSend: function(objeto) {
				$("#result2").html("Mensaje: Cargando...");
			},
			success: function(datos) {
				$("#result2").html(datos);
				$('#upd_data').attr("disabled", false);
				load(1);
			}
		});
		event.preventDefault();
	})
</script>



</html>


<!-- BIBLIOGRAFIA https://www.etutorialspoint.com/index.php/203-how-to-upload-multiple-files-and-store-in-mysql-database-using-php -->


<!-- CONTINUAR CON LA BUSQUEDA https://www.google.com/search?q=php+mysql++multiple+files&rlz=1C1HLDY_esCO949CO949&biw=1600&bih=700&ei=pxLmYLP1Lf6oqtsP7q6VwAk&oq=php+mysql++multiple+files&gs_lcp=Cgdnd3Mtd2l6EAMyBggAEBYQHjIGCAAQFhAeOgcIABBHELADSgQIQRgAUMiwGljIsBpg7LkaaARwAngAgAFliAHAAZIBAzEuMZgBAKABAqABAaoBB2d3cy13aXrIAQjAAQE&sclient=gws-wiz&ved=0ahUKEwjz5KCR6tHxAhV-lGoFHW5XBZg4FBDh1QMIDg&uact=5 -->