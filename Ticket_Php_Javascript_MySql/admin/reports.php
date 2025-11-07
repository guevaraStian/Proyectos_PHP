<?php
$title = "Reportes | ";
include "head.php";
include "menu.php";

$agenciaarea = mysqli_query($con, "select * from agenciaarea");
$priorities = mysqli_query($con,  "select * from priority");
$statuses = mysqli_query($con, "select * from status");
$pedido = mysqli_query($con, "select * from pedido");
// $trabajador = mysqli_query($con, "select * from trabajador");
$trabajador = mysqli_query($con, "select * from user where roll = 2");
?>


<div class="right_col" role="main">
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Reportes - Recomendacion : Si va a hacer la consulta por fecha por favor llenar inicio y fin </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <!-- form search -->
                    <form class="form-horizontal" role="form">
                        <input type="hidden" name="view" value="reports">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <select name="agenciaarea_id" class="form-control">
                                        <option value="">AGENCIA-AREA </option>
                                        <?php foreach ($agenciaarea as $p) : ?>
                                            <option value="<?php echo $p['id']; ?>" <?php if (isset($_GET["agenciaarea_id"]) && $_GET["agenciaarea_id"] == $p['id']) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $p['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-support"></i></span>
                                    <select name="priority_id" class="form-control">
                                        <option value="">PRIORIDAD</option>
                                        <?php foreach ($priorities as $p) : ?>
                                            <option value="<?php echo $p['id']; ?>" <?php if (isset($_GET["priority_id"]) && $_GET["priority_id"] == $p['id']) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $p['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">INICIO</span>
                                    <input type="date" name="start_at" value="<?php if (isset($_GET["start_at"]) && $_GET["start_at"] != "") {
                                                                                    echo $_GET["start_at"];
                                                                                } ?>" class="form-control" placeholder="Palabra clave">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">FIN</span>
                                    <input type="date" name="finish_at" value="<?php if (isset($_GET["finish_at"]) && $_GET["finish_at"] != "") {
                                                                                    echo $_GET["finish_at"];
                                                                                } ?>" class="form-control" placeholder="Palabra clave">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">ESTADO</span>
                                    <select name="status_id" class="form-control">
                                        <?php foreach ($statuses as $p) : ?>
                                            <option value="<?php echo $p['id']; ?>" <?php if (isset($_GET["status_id"]) && $_GET["status_id"] == $p['id']) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $p['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon">TIPO</span>
                                    <select name="pedido_id" class="form-control">
                                        <?php foreach ($pedido as $p) : ?>
                                            <option value="<?php echo $p['id']; ?>" <?php if (isset($_GET["pedido_id"]) && $_GET["pedido_id"] == $p['id']) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $p['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <select name="trabajador_id" class="form-control">
                                        <option value="">TRABAJADOR </option>
                                        <?php //foreach ($trabajador as $p) : ?>
                                            <option value="<?php //echo $p['id']; ?>" <?php //if (isset($_GET["trabajador_id"]) && $_GET["trabajador_id"] == $p['id']) {  echo "selected"; } ?>><?php //echo $p['name']; ?></option>
                                        <?php //endforeach; ?>
                                    </select>
                                </div>
                            </div> -->



                            <div class="col-lg-3">
                                <button class="btn btn-primary btn-block">Procesar</button>
                            </div>
                        </div>
                    </form>
                    <!-- end form search -->

                    <?php
                    // Este codigo hace que si se llama de a 1 o de a todos los campos muestre una consulta con el filtro
                    $reportes = array();
                    if ((isset($_GET["status_id"]) && isset($_GET["pedido_id"]) && isset($_GET["agenciaarea_id"]) && isset($_GET["priority_id"]) && isset($_GET["start_at"]) && isset($_GET["finish_at"])) && ($_GET["status_id"] != "" || $_GET["pedido_id"] != "" || $_GET["agenciaarea_id"] != "" || $_GET["priority_id"] != "" || ($_GET["start_at"] != "" && $_GET["finish_at"] != ""))) {
                        $sql = "select * from ticket where ";

                        if ($_GET["status_id"] != "") {
                            $sql .= " status_id = " . $_GET["status_id"];
                        }

                        if ($_GET["pedido_id"] != "") {
                            if ($_GET["status_id"] != "") {
                                $sql .= " and ";
                            }
                            $sql .= " pedido_id = " . $_GET["pedido_id"];
                        }


                        if ($_GET["agenciaarea_id"] != "") {
                            if ($_GET["status_id"] != "" || $_GET["pedido_id"] != "") {
                                $sql .= " and ";
                            }
                            $sql .= " agenciaarea_id = " . $_GET["agenciaarea_id"];
                        }

                        if ($_GET["priority_id"] != "") {
                            if ($_GET["status_id"] != "" || $_GET["agenciaarea_id"] != "" || $_GET["pedido_id"] != "") {
                                $sql .= " and ";
                            }

                            $sql .= " priority_id = " . $_GET["priority_id"];
                        }

                        // if ($_GET["trabajador_id"] != "") {
                        //     if ($_GET["status_id"] != "" || $_GET["agenciaarea_id"] != "" || $_GET["pedido_id"] != "" || $_GET["trabajador_id"] != "") {
                        //         $sql .= " and ";
                        //     }

                        //     $sql .= " trabajador_id = " . $_GET["trabajador_id"];
                        // }

                        if ($_GET["start_at"] != "" && $_GET["finish_at"] != "") {
                            if ($_GET["status_id"] != "" || $_GET["agenciaarea_id"] != "" || $_GET["priority_id"] != "" || $_GET["pedido_id"] != "" ) {
                                $sql .= " and ";
                            }

                            $sql .= " ( created_at >= \"" . $_GET["start_at"] . "\" and created_at <= \"" . $_GET["finish_at"] . "\" ) ";
                        }


                        $reportes = mysqli_query($con, $sql);
                    } else {
                        $reportes = mysqli_query($con, "select * from ticket order by created_at desc");
                    }

                    if (@mysqli_num_rows($reportes) > 0) {
                        // si hay reportes
                        $_SESSION["report_data"] = $reportes;
                    ?>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <th>IdTicket</th>
                                        <th>Asunto</th>
                                        <th>Agencia-Area </th>
                                        <th>Area Destino </th>
                                        <th>Tipo</th>
                                        <!-- <th>Trabajadores</th> -->
                                        <th>Prioridad</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Ultima Actualizacion</th>
                                    </thead>
                                    <?php
                                    $total = 0;
                                    //Pide el atributo "name" en cada una de las tablas referenciadas con FK
                                    foreach ($reportes as $repor) {
                                        $agenciaarea_id = $repor['agenciaarea_id'];
                                        $agenciadestino_id = $repor['agenciadestino_id'];
                                        $priority_id = $repor['priority_id'];
                                        $pedido_id = $repor['pedido_id'];
                                        $trabajador_id = $repor['trabajador_id'];
                                        $status_id = $repor['status_id'];

                                        $status = mysqli_query($con, "select * from status where id=$status_id");
                                        $trabajador = mysqli_query($con, "select * from trabajador where id=$trabajador_id");
                                        $pedido = mysqli_query($con, "select * from pedido where id=$pedido_id");
                                        $agenciaarea  = mysqli_query($con, "select * from agenciaarea where id=$agenciaarea_id");
                                        $medic = mysqli_query($con, "select * from priority where id=$priority_id");
                                        $trabajador  = mysqli_query($con, "select * from trabajador where id=$trabajador_id");
                                        $agenciadestino  = mysqli_query($con, "select * from agenciaarea where id=$agenciadestino_id");


                                    ?>
                                        <!-- Imprime los name de cada una de las FK de la tabla tickets -->
                                        <tr>
                                            <td><?php echo $repor['id'] ?></td>
                                            <td><?php echo $repor['title'] ?></td>
                                            <?php foreach ($agenciaarea as $pro) { ?>
                                                <td><?php echo $pro['name'] ?></td>
                                            <?php } ?>
                                            <?php foreach ($agenciadestino  as $des) { ?>
                                                <td><?php echo $des['name'] ?></td>
                                            <?php } ?>
                                            <?php foreach ($pedido as $pedido) { ?>
                                                <td><?php echo $pedido['name'] ?></td>
                                            <?php } ?>
                                            <?php //foreach($trabajador as $cat){
                                            ?>
                                            <!-- <td><?php //echo $cat['name']; ?></td> -->
                                            <?php //} 
                                            ?>
                                            <?php foreach ($medic as $medics) { ?>
                                                <td><?php echo $medics['name']; ?></td>
                                            <?php } ?>
                                            <?php foreach ($status as $stat) { ?>
                                                <td><?php echo $stat['name']; ?></td>
                                            <?php } ?>
                                            <td><?php echo $repor['created_at']; ?></td>
                                            <td><?php echo $repor['updated_at']; ?></td>
                                        </tr>
                                    <?php

                                    }

                                    ?>
                                <?php

                            } else {
                                echo "<p class='alert alert-danger'>No hay tickets</p>";
                            }


                                ?>
                                </table>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /page content -->

<?php include "footer.php" ?>