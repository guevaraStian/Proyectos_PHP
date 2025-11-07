<?php

//importa la base de datos
include("db.php");

//si llega el pedido POST llamado save_task entonces
if (isset($_POST['save_task'])){
    //De la variable que viene del html titulo guardar en la variable $title
    $title = $_POST ['title'];
    //De la variable que viene del html description guardar en la variable $description
    $description = $_POST ['description'];

    // se guarda en la variable $query el insertar en la talba task las variables title y des. con los valores de las variables
    //que vienen desde el html
    $query ="INSERT INTO task(title, description) VALUES ('$title', '$description')";
    //en result se ingresan la conexion llamada $conn y la sentencia de base de datos $query
    $result = mysqli_query($conn, $query);

    //si result no esta veridico entonces muestra el mensaje query fail
    if(!$result){
        die("query fail");
    } 
    //si el resultado esta bueno aparece este mensaje guardado en session
    $_SESSION['message']= 'Task saved succesfully';
    $_SESSION['message_type']= 'success';


    //luego de que la accion se haga se direcciona a index.php
    header("Location: index.php");
}




?>