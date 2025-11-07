<?php
                $query0 = mysqli_query($con, "select * from user where roll = 2 ");
                while ($w = mysqli_fetch_array($query0)) {
                    $iduser = $w['id'];

                    $query1 = mysqli_query($con, "select * from agenciaarea where user_id = $iduser ");

                    while ($r = mysqli_fetch_array($query1)) {
                        $idagencia = $r['id'];

                        $query2 = mysqli_query($con, "select * from ticket where agenciaarea_id = $idagencia and status_id = 1 ");


                        // $query2 = mysqli_query($con, "select * from ticket where agenciaarea_id = $idagencia and status_id = 1 ");
                        while ($q = mysqli_fetch_array($query2)) {


                            //ESTAN MOSTRANDO CADA UNO DE LOS TICKETS Y HAY QUE ORGANIZAR EL WHILE PARA QUE SEA CADA UNA DE
                            //LAS COORDINADORES EL RECORRIDO

                ?>


                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-ticket"></i></div>
                                    <div class="count"><?php echo mysqli_num_rows($query2) ?></div>
                                    <h3>Pendientes asignadoooooooo <?php echo $w['2']; ?></h3>
                                </div>
                            </div>


                <?php  }
                    }
                } ?>