<?php 
    $title ="Ticket - Usuario "; 
    include "headusuario.php";
    include "menuusuario.php";

//Trae el nombre, y otros atibutos para mostrarlos en el encabezado
    $id=$_SESSION['user_id'];
    $query1=mysqli_query($con,"select * from ticket where (user_id =$id) AND (status_id=2)");
    $ticketusudesa = mysqli_num_rows($query1);
    $query2=mysqli_query($con,"select * from ticket where (user_id =$id) AND (status_id=1) ");
    $ticketusupen = mysqli_num_rows($query2);
    
    
    
?>
    <div class="right_col" role="main"> <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="row top_tiles">



                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php echo $ticketusupen ?></div>
                        <h3>Tickets Pendiente</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php echo $ticketusudesa ?></div>
                        <h3>Tickets en Desarrollo</h3>
                    </div>
                </div>



                
                </div>
                <!-- content -->
                <br><br>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12">
                        <?php include "../lib/alerts.php";
                            profile(); //llamada a la funcion de alertas
                        ?>    
                        <div>BIENVENID@ a la plataforma de asignacion de ticket, usted acaba de ingresar como usuario</div>
                        <div>En este software usted podra crear un tickete para que los trabajandores del area de sistemas puedan resolverlo en el menor tiempo posible.</div>
                        <br>
                        <div>SI NECESITA CREAR UN TICKET:</div>
                        <div>PASO 1: En la parte izquierda de la pantalla esta el menu, por favor de click la 2da opcion que se llama "TICKET" </div>
                        <div>PASO 2: En la pagina que se abre, la opcion de "CREAR TICKET" que se encuentra en la parte de arriba de la pantalla de color azul. </div>
                        <br>
                        <div>EL ESTADO del ticket esta en la pagina de TICKET y puede ser:</div>
                        <div>PENDIENTE : que todavia no ha sido tomado por un trabajador del area de sistemas</div>
                        <div>EN DESARROLLO : que esta en proceso de solucion</div>
                        <div>TERMINADO : que ya se acabo el proceso de solucion del problema</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footerusuario.php" ?>
