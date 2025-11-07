<?php
$title = "Sobre Mi | ";

session_start();
//Si user_id esta vacio redirecciona a index.php el inicio de sesion
include "../config/config.php";
if (!isset($_SESSION['user_id']) && $_SESSION['user_id'] == null) {
    header("location: index.php");
}


?>
<HTML> 
<head>

<meta charset="utf-8"> 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<BODY>
<!-- Este div es el que imprime toda la logica de la grafica -->
<div id="container" style="min-width: 50%; height: 50%; margin: 0 auto"></div>


<?php
$server = "localhost";
$usuario = "root";
$pass = "";
$BD = "ticket";
//variable que guarda la conexión de la base de datos
$conexion = mysqli_connect($server, $usuario, $pass, $BD);

if(!$conexion){ 
    echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>'; 
 } 


$agen = mysqli_query($con, "SELECT *, count(*) FROM ticket where status_id = 3 GROUP BY agenciaarea_id ");
$final = " ";
foreach ($agen as $x) {

    $contador = $x['count(*)'];
    $agencia = $x['agenciaarea_id'];
    $nomagen =  mysqli_fetch_array(mysqli_query($con, "select * from agenciaarea where id=$agencia"));
    $nomagen2 = $nomagen['1'];

    $tickabr = mysqli_fetch_array(mysqli_query($con, "SELECT *, count(*) FROM ticket where (status_id = 3) and (agenciaarea_id = $agencia) and  (created_at Between 20210401 And 20210430) "));
    $cantabr = $tickabr['count(*)'];

    $tickmay = mysqli_fetch_array(mysqli_query($con, "SELECT *, count(*) FROM ticket where (status_id = 3) and (agenciaarea_id = $agencia) and  (created_at Between 20210501 And 20210531) "));
    $cantmay = $tickmay['count(*)'];

    $tickjun = mysqli_fetch_array(mysqli_query($con, "SELECT *, count(*) FROM ticket where (status_id = 3) and (agenciaarea_id = $agencia) and  (created_at Between 20210601 And 20210630) "));
    $cantjun = $tickjun['count(*)'];

    $tickjul = mysqli_fetch_array(mysqli_query($con, "SELECT *, count(*) FROM ticket where (status_id = 3) and (agenciaarea_id = $agencia) and  (created_at Between 20210701 And 20210731) "));
    $cantjul = $tickjul['count(*)'];

    $tickago = mysqli_fetch_array(mysqli_query($con, "SELECT *, count(*) FROM ticket where (status_id = 3) and (agenciaarea_id = $agencia) and  (created_at Between 20210801 And 20210831) "));
    $cantago = $tickago['count(*)'];

    $ticksep = mysqli_fetch_array(mysqli_query($con, "SELECT *, count(*) FROM ticket where (status_id = 3) and (agenciaarea_id = $agencia) and  (created_at Between 20210901 And 20210930) "));
    $cantsep = $ticksep['count(*)'];

    $tickoct = mysqli_fetch_array(mysqli_query($con, "SELECT *, count(*) FROM ticket where (status_id = 3) and (agenciaarea_id = $agencia) and  (created_at Between 20211001 And 20211031) "));
    $cantoct = $tickoct['count(*)'];

    $ticknov = mysqli_fetch_array(mysqli_query($con, "SELECT *, count(*) FROM ticket where (status_id = 3) and (agenciaarea_id = $agencia) and  (created_at Between 20211101 And 20211130) "));
    $cantnov = $ticknov['count(*)'];

    $tickdic = mysqli_fetch_array(mysqli_query($con, "SELECT *, count(*) FROM ticket where (status_id = 3) and (agenciaarea_id = $agencia) and  (created_at Between 20211201 And 20211231) "));
    $cantdic = $tickdic['count(*)'];
  

    $final .= "{
        name: '$nomagen2 ',
        data: [0, 0, 0, $cantabr, $cantmay, $cantjun,  $cantjul, $cantago, $cantsep,   $cantoct ,  $cantnov, $cantdic]
    },  ";
}

$final .= " {} ";

// echo $tick;
// echo $final;

?>

<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Tickets resueltos de cada Agencia',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        //en el eje X se ponen los meses del año
        xAxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic']
        },
        //en el eje Y se pone la cantidad de tickets resueltos
        yAxis: {
            title: {
                text: 'Tickets resueltos de cada Agencia'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Tickets resueltos'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        // aqui se llenan las variables de cada uno de los meses de cada uno de los trabajadores
        series: [
            <?php echo $final ?>
        ]
    });
});
</script>


<a class="btn btn-danger" href="graficas.php"><i class="fa fa-dashboard"></i> Volver al inicio</a>



</BODY>
</html>


