<?php
include("db.php");

//Si existe el id
if (isset($_GET['id'])) {
    //De la variable que viene del html id guardar en la variable $id
    $id = $_GET['id'];
    // se guarda en la variable $query la seleccion en la talba task donde id sea =  a "id
    //que vienen desde el html
    $query = "SELECT * FROM task WHERE id=$id";
    //en result se ingresan la conexion llamada $conn y la sentencia de base de datos $query
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
     
    }
}
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // se guarda en la variable $query la edicion en la talba task la variable titulo por la que viene de html donde id sea =  a "id
    //que vienen desde el html
    $query = "UPDATE task set title= '$title', description = '$description' WHERE id=$id";
    mysqli_query($conn, $query);
    //si el resultado esta bueno aparece este mensaje guardado en session
    $_SESSION['message'] = 'task update successfully';
    $_SESSION['message_type'] = 'warning';
    //luego de que la accion se haga se direcciona a index.php
    header("location: index.php");

}



?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="cold-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update title">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="description" row="2" class="form-control" placeholder="Update description"><?php echo $description;  ?> </textarea>
                    </div>
            </div>
            <button class="btn btn-success" name="update">update
            </button>

            </form>
        </div>
    </div>
</div>
</div>


<?php include("includes/footer.php") ?>