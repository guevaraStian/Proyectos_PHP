<?php 

function db_query($query) {
    $con = mysqli_connect('localhost', 'root', '', 'ticket');
    $result = mysqli_query($con,$query);
    return $result;
}

function delete($id){ //Funcion para borrar registros

	$sql = "DELETE from files where id =".$id."";
	
	return db_query($sql);
}

$id = $_GET['id'];
$idti = $_GET['idti'];
delete($id);
// header("location:index.php");
header("location:coorindex.php?idti=$idti");
?>