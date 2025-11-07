<?php
    session_start();

    include "config/config.php";

    // ESTE CODIGO ME DIRECCIONA A LA INTERFACE DE USUARIO ASIGNADA
    if (isset($_SESSION['user_id']) && $_SESSION!==null) {
        $id = $_SESSION['user_id'];
        // echo $id;
        
        $query = mysqli_query($con, "SELECT * from user where id =$id");
        $row = mysqli_fetch_array($query);
        if ($row[9] == 1) {
            header("location: admin/inicioadmin.php");
            
            
        }
        if ($row[9] == 2 ) {
            header("location: trabajador/iniciotrabajador.php");
        }
        if ($row[9] == 3 ) {
            header("location: usuario/iniciousuario.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Iniciar Sesión </title>

        <!-- Bootstrap -->
        <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="css/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="css/animate.css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="css/custom.min.css" rel="stylesheet">

    </head>
    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <?php 
                        $invalid=sha1(md5("contrasena y cedula invalido"));
                        if (isset($_GET['invalid']) && $_GET['invalid']==$invalid) {
                            echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> Contraseña o usuario invalido
                                </div>";
                        }
                    ?>
                    <section class="login_content">
                        <form action="admin/action/login.php" method="post">
                            <h1>Iniciar Sesión</h1>
                            <h1>Ticket </h1>
                            
                            <div>
                                <input type="text" name="cedula" class="form-control" placeholder="Numero de cedula" required />
                            </div>
                            <div>
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required/>
                            </div>
                            <div>
                                <button type="submit" name="token" value="Login" class="btn btn-default">Iniciar Sesion</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
