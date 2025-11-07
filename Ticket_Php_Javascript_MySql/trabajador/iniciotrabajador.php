<?php
$title = "Ticket - Trabajador";
include "headtrabajador.php";
include "menutrabajador.php";

//Consultas para mostrar en el inicio del trabajador y contiene datos importantes
$TicketData = mysqli_query($con, "select * from ticket where status_id=1");
$ticketDesa = mysqli_query($con, "select * from ticket where status_id=2");
$TicketTrabajador1 = mysqli_query($con, "select * from ticket where (trabajador_id=1) AND (status_id=1)  ");
$TicketTrabajador2 = mysqli_query($con, "select * from ticket where (trabajador_id=2) AND (status_id=1)  ");
$TicketTrabajador3 = mysqli_query($con, "select * from ticket where (trabajador_id=3) AND (status_id=1)  ");
$TicketTrabajador4 = mysqli_query($con, "select * from ticket where (trabajador_id=4) AND (status_id=1)  ");
$TicketTrabajador5 = mysqli_query($con, "select * from ticket where (trabajador_id=5) AND (status_id=1)  ");
?>
<div class="right_col" role="main">
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="row top_tiles">
                <!-- Se muestran las consultas realizadas arriba -->
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 bg-warning">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php echo mysqli_num_rows($ticketDesa) ?></div>
                        <h3>Total Tickets en Desarrollo</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 bg-danger">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php echo mysqli_num_rows($TicketData) ?></div>
                        <h3>Total Tickets Pendientes</h3>
                    </div>
                </div>



                <?php
                $query = mysqli_query($con, "SELECT *, count(*) FROM ticket where status_id = 1 GROUP BY agenciaarea_id ");

                foreach ($query as $x) {
                    $contador = $x['count(*)'];
                    $agencia = $x['agenciaarea_id'];
                    $nomagen =  mysqli_fetch_array(mysqli_query($con, "select * from agenciaarea where id=$agencia and coor_id = $id"));
                    $nomagen2 = $nomagen['1'];

                    if($nomagen){


                ?>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-ticket"></i></div>
                            <div class="count"><?php echo $contador; ?> </div>
                            <h3> Pendientes De <?php echo $nomagen2; ?> </h3>
                        </div>
                    </div>
                <?php
                }
                }
                ?>










                <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php //echo mysqli_num_rows($TicketTrabajador1) 
                                            ?></div>
                        <h3>Pendientes de "Ninguno"</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php //echo mysqli_num_rows($TicketTrabajador2) 
                                            ?></div>
                        <h3>Pendientes de "Jhonny"</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php //echo mysqli_num_rows($TicketTrabajador3) 
                                            ?></div>
                        <h3>Pendientes de "Mauricio"</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php //echo mysqli_num_rows($TicketTrabajador4) 
                                            ?></div>
                        <h3>Pendientes de "Alex"</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php // echo mysqli_num_rows($TicketTrabajador5) 
                                            ?></div>
                        <h3>Pendientes de "Joshimar"</h3>
                    </div>
                </div> -->

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
                    <div>BIENVENID@ a la plataforma de asignacion de ticket, usted acaba de ingresar como trabajador</div>
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

<?php include "footertrabajador.php" ?>