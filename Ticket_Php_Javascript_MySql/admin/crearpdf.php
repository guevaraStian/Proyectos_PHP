<?php
//============================================================+
// MIN 25 EN ADELANTE https://www.youtube.com/watch?v=YXXzFQFtHlw
// Codigo fuente del TCPDF https://github.com/tecnickcom/TCPDF

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_POST['vienedelform'] == 'si') {
		if ($_POST['nombre'] != '') {
			$idsolicitado = $_POST['nombre'];
			
		} else {
			header("Location: graficas.php");
			echo 'Has olvidado poner tu nombre';
		}
	}
} else {
	echo 'Ha ocurrido un error';
}

$sql = "SELECT *, count(*) FROM  ticket where id=$idsolicitado";
$query = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($query);
// $numrows = $row['count(*)'];

// $count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
// $row = mysqli_fetch_array($count_query);
// $numrows = $row['numrows'];

// if ($numrows > 0) {

	

while ($r = mysqli_fetch_array($query)) {
	$id = $r['id'];
	$description = $r['description'];
	$title = $r['title'];
	$created_at = $r['created_at'];
	$user = $r['user_id'];
	$agencia_id = $r['agenciaarea_id'];
	$status_id = $r['status_id'];
	$agenciadestino_id = $r['agenciadestino_id'];
	$trabajador_id = $r['trabajador_id'];

	$query2 = mysqli_query($con, "select * from user where id=$user");
	while ($re = mysqli_fetch_array($query2)) {
		$nameuser = $re['name'];
	}

	$query5 = mysqli_query($con, "select * from agenciaarea where id=$agencia_id ");
	while ($rrrr = mysqli_fetch_array($query5)) {
		$nameagencia = $rrrr['name'];
	}

	$query4 = mysqli_query($con, "select * from status where id=$status_id");
	while ($rrr = mysqli_fetch_array($query4)) {
		$namestatus = $rrr['name'];
	}


	$query3 = mysqli_query($con, "select * from user where cedula=$trabajador_id");
	while ($tt = mysqli_fetch_array($query3)) {
		$nametrabajador = $tt['name'];
	}

	$query6 = mysqli_query($con, "select * from agenciaarea where id=$agenciadestino_id");
	while ($dd = mysqli_fetch_array($query6)) {
		$nameagendestino = $dd['name'];
	}
	$query7 = mysqli_query($con, "select * from tituloticket where idtitu=$title");
	while ($titu = mysqli_fetch_array($query7)) {
		$nametitulo = $titu['nomtitu'];
	}
}

$fecha = date("Y-m-d");
$hora = date("H:i:s");

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

	//Page header
	public function Header()
	{
		// Logo
		$image_file = K_PATH_IMAGES . 'logo.jpg';
		$this->Image($image_file, 5, 10, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(100, 15, 'Ticket ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer()
	{
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SebastianGuevaraSanchez');
$pdf->SetTitle('Reporte ticket');
$pdf->SetSubject('Reporte detallado del ticket');
$pdf->SetKeywords('ticket, reporte');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
	require_once(dirname(__FILE__) . '/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

// set some text to print


$txt = <<<EOD


	La fecha actual : $fecha . Hora actual : $hora


	El ID del ticket : $id 
	La fecha de creacion : $created_at
	El titulo del ticket : $nametitulo
	Usuario creador : $nameuser
	La agencia solicitante es : $nameagencia
	La agencia destino es: $nameagendestino
	Estado actual : $namestatus
	La descripcion del ticket es:  $description


	Nombre del ultimo editor del ticket: $nametrabajador 
		

	EOD;

$txt2 = <<<EOD

	Las trazabilidades creadas en este ticket son:

	EOD;


// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'b', true, 0, false, false, 0);
$pdf->Write(0, $txt2, '', 0, 'C', true, 0, false, false, 0);

$query5 = mysqli_query($con, "select * from trazabilidad where ticket_id=$id");
while ($rrrr = mysqli_fetch_array($query5)) {
	$descriptraza = $rrrr['descriptraza'];
	$created_at = $rrrr['created_at'];
	$user_id = $rrrr['user_id'];


	$query7 = mysqli_query($con, "select * from user where cedula=$user_id");
	while ($sss = mysqli_fetch_array($query7)) {
		$nameuser = $sss['name'];
	}



	$txt3 = <<<EOD

		$created_at - Por el usuario -> $nameuser
		Descripcion: $descriptraza

		EOD;
	$pdf->Write(0, $txt3, '', 0, 'b', true, 0, false, false, 0);
}





// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('reporteticket.pdf', 'I');

	//============================================================+
	// END OF FILE
	//============================================================+
// } 
// else {
// 	header("Location: graficas.php");
// 	echo'<script>
//         alert("Has olvidado poner tu nombre");
//         </script>';
// 	echo '';
// }
