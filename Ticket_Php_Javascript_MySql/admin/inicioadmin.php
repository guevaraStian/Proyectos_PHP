<?php
$title = "Ticket - ";
include "head.php";
include "menu.php";



//Consultas para mostrar los recuadros en el inicio
$TicketData = mysqli_query($con, "select * from ticket where status_id=1");
$agenciaareaData = mysqli_query($con, "select * from agenciaarea");
$trabajadorData = mysqli_query($con, "select * from trabajador");
$UserData = mysqli_query($con, "select * from user order by created_at desc");
$ticketDesa = mysqli_query($con, "select * from ticket where status_id=2");



?>


<div class="right_col" role="main">
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 bg-danger">
                    <div class="tile-stats bg-danger">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php echo mysqli_num_rows($TicketData) ?></div>
                        <h3>Total Tickets Pendientes</h3>
                    </div>
                </div>
                
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12  bg-warning">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count"><?php echo mysqli_num_rows($ticketDesa) ?></div>
                        <h3>Total Tickets en Desarrollo</h3>
                    </div>
                </div>

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="glyphicon glyphicon-home"></i></div>
                        <div class="count"><?php echo mysqli_num_rows($agenciaareaData) ?></div>
                        <h3 class="text-warning">Agencia - Area</h3>
                    </div>
                </div>
                <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-th-list"></i></div>
                        <div class="count"><?php //echo mysqli_num_rows($trabajadorData) 
                                            ?></div>
                        <h3>Trabajadores</h3>
                    </div>
                </div> -->
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="count"><?php echo mysqli_num_rows($UserData) ?></div>
                        <h3>Usuarios</h3>
                    </div>
                </div>
                
                <br>
                <br>


                <?php
                $query = mysqli_query($con, "SELECT *, count(*) FROM ticket where status_id = 1 GROUP BY agenciaarea_id ");

                foreach ($query as $x) {
                    $contador = $x['count(*)'];
                    $agencia = $x['agenciaarea_id'];
                    $nomagen =  mysqli_fetch_array(mysqli_query($con, "select * from agenciaarea where id=$agencia"));
                    $nomagen2 = $nomagen['1'];


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

                ?>
                <div class="count">AQUI EMPIEZAN LOS TICKETS NUEVO </div>

                <?php

                $q = mysqli_query($con, "SELECT ticket.title, ticket.agenciaarea_id, agenciaarea.name, agenciaarea.id, agenciaarea.coor_id, count(*)  FROM ticket inner join agenciaarea on agenciaarea.id =  ticket.agenciaarea_id where status_id = 1 GROUP BY agenciaarea.coor_id ");

                foreach ($q as $xx) {
                    $coor_id = $xx['coor_id'];
                    $contador2 = $xx['count(*)'];
                    $coor =  mysqli_fetch_array(mysqli_query($con, "SELECT * from user where id= $coor_id  "));
                    $nombrecoor = $coor['name'];
                ?>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-ticket"></i></div>
                            <div class="count"><?php echo $contador2 ?></div>
                            <h3>Pendientes De <?php echo $nombrecoor ?></h3>
                        </div>
                    </div>


                <?php

                    //     echo "<pre>";
                    // print_r($x);
                    //  echo "</pre>";

                }



                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////



                // $query0 = mysqli_query($con, "select * from user where roll = 2 ");
                // while ($w = mysqli_fetch_array($query0)) {
                //     $iduser = $w['id'];

                //     $query1 = mysqli_query($con, "select * from agenciaarea where user_id = $iduser ");

                //     while ($r = mysqli_fetch_array($query1)) {
                //         $idagencia = $r['id'];

                //         $query2 = mysqli_query($con, "select * from ticket where agenciaarea_id = $idagencia and status_id = 1 ");


                //         // $query2 = mysqli_query($con, "select * from ticket where agenciaarea_id = $idagencia and status_id = 1 ");
                //         while ($q = mysqli_fetch_array($query2)) {


                //ESTAN MOSTRANDO CADA UNO DE LOS TICKETS Y HAY QUE ORGANIZAR EL WHILE PARA QUE SEA CADA UNA DE
                //LAS COORDINADORES EL RECORRIDO

                ?>


                <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-ticket"></i></div>
                                    <div class="count"><?php //echo mysqli_num_rows($query2) 
                                                        ?></div>
                                    <h3>Pendientes asignadoooooooo <?php //echo $w['name']; 
                                                                    ?></h3>
                                </div>
                            </div> -->


                <?php // }
                // }
                // }





                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                // $query = mysqli_query($con, "select * FROM ticket where status_id = 1 ORDER BY id ASC");


                // foreach ($query as $x) {
                //$agencia = $x['agenciaarea_id'];

                //$query2 = mysqli_query($con, "SELECT * FROM agenciaarea where id = $agencia");

                //foreach ($query2 as $y) {
                // $user = $y['user_id'];
                // $query3 = mysqli_query($con, "SELECT * FROM user where id = $user");

                // foreach ($query3 as $z) {

                ?>


                <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-ticket"></i></div>
                                    <div class="count"><?php //echo mysqli_num_rows($query)
                                                        ?></div>
                                    <h3>Nombre coordiiiiiii <?php //echo $y['name'];
                                                            ?></h3>
                                </div>
                            </div> -->

                <?php
                // }
                //}
                //}

                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////


                // select * FROM (ticket, agenciaarea, user) where ( ticket.status_id = 1 and agenciaarea.user_id = ticket.agenciaarea_id and user.id = agenciaarea.id  )
                // $query = mysqli_query($con, "select * FROM ticket where status_id = 1 ORDER BY `ticket`.`id` ASC");
                // $query2 = mysqli_query($con, "SELECT * FROM agenciaarea");
                // $query3 = mysqli_query($con, "SELECT * FROM user ");



                // foreach ($query as $x) {

                //     foreach ($query2 as $y) {

                //         foreach ($query3 as $z) {
                //             if ($z['id'] == $y['user_id']) {
                //                 if ($y['id'] == $x['agenciaarea_id']) {

                ?>
                <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-ticket"></i></div>
                                            <div class="count"><?php //echo mysqli_num_rows($query)  
                                                                ?></div>
                                            <h3>Nombre coordiiiiiii <?php //echo $z['name'];  
                                                                    ?></h3>
                                        </div>
                                    </div> -->
                <?php

                //                 }
                //             }
                //         }
                //     }
                // }

                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////

                // $query2 = mysqli_query($con, "select * from ticket where status_id = 1  ");

                // while ($q1 = mysqli_fetch_array($query2)) {
                //     $idagencia = $q1['agenciaarea_id'];
                //     $query1 = mysqli_query($con, "select * from agenciaarea where id = $idagencia ");



                //     while ($r1 = mysqli_fetch_array($query1)) {
                //         $iduser = $r1['user_id'];
                //         $query0 = mysqli_query($con, "select * from user where id =  $iduser ");
                // $row = mysqli_fetch_array($query0);




                // echo "<pre>";
                // print_r($r1);
                // echo "</pre>";

                ?>


                <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-ticket"></i></div>
                                    <div class="count"><?php //echo mysqli_num_rows($query0)  
                                                        ?></div>
                                    <h3>123456789 <?php //echo $r1['2']; 
                                                    ?></h3>
                                </div>
                            </div>   -->


                <?php
                //}
                //}
                ?>






                <?php

                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////
                ////////////////////////////////////////OTRA PRUEBA //////////////////////

                //  $query3 = mysqli_query($con, "SELECT * FROM user ");
                // $arreglo[]=0;
                //  $arreglo = array("0");

                // foreach ($query3 as $z) {
                //  $z1 = $z['id'];



                // $z1 = 9;
                // $query = mysqli_query($con, "select * FROM agenciaarea where user_id = $z1 ");                    
                //  $agencia = mysqli_fetch_array($query);

                //  echo $agencia;

                // while ($z ==$agencia ) {

                // echo $z;
                // if ($agencia['user_id'] == 2){

                //     // $arreglo .= $agencia['id'];
                //     array_push ( $arreglo , $agencia['id'] );
                //     // $arreglo.push($agencia['id']);

                // }
                //}
                //}


                // while ($g =$arreglo) {



                ?>

                <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-ticket"></i></div>
                                <div class="count"><?php //echo mysqli_num_rows($query2) 
                                                    ?></div>
                                <h3>Pendientes asignadoooooooo <?php //echo $arreglo[2];
                                                                ?></h3>
                            </div>
                        </div> -->











            </div>
            <!-- content -->


        </div>

    </div>




</div><!-- /page content -->



<?php include "footer.php";

?>








<script>
    $(function() {
        $("input[name='file']").on("change", function() {
            var formData = new FormData($("#formulario")[0]);
            var ruta = "action/upload-profile.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos) {
                    $("#respuesta").html(datos);
                }
            });
        });
    });
</script>