<?php
//importa la base de datos
include("db.php");

//si llega el pedido GET con la variable $id entonces
if (isset($_GET['id'])){
    //De la variable que viene del html id guardar en la variable $od
    $id=$_GET['id'];
    // se guarda en la variable $query el  borrar en la talba task las variables cuando id sea igual a la variable
    //que vienen desde el html
    $query = "DELETE FROM task WHERE id=$id";
    //en result se ingresan la conexion llamada $conn y la sentencia de base de datos $query
    $result = mysqli_query($conn, $query);

    //si result no esta veridico entonces muestra el mensaje query fail
    if(!$result){
        die("Query failed");
    } 
    //si el resultado esta bueno aparece este mensaje guardado en session
    $_SESSION['message'] = 'task removed successfully';
    $_SESSION['message_type'] = 'danger';
    
    //luego de que la accion se haga se direcciona a index.php
    header("Location: index.php");
}




?>