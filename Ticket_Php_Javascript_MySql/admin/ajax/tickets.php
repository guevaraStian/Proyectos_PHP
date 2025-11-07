<?php

include "../../config/config.php"; //Contiene funcion que conecta a la base de datos

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if (isset($_GET['id'])) {
    $id_del = intval($_GET['id']);
    $query = mysqli_query($con, "SELECT * from ticket where id='" . $id_del . "'");
    $count = mysqli_num_rows($query);

    if ($delete1 = mysqli_query($con, "DELETE FROM ticket WHERE id='" . $id_del . "'")) {
?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Aviso!</strong> Datos eliminados exitosamente.
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
        </div>
<?php
    } //end else
} //end if
?>

<?php
if ($action == 'ajax') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    $aColumns = array('id'); //Columnas de busqueda
    $sTable = "ticket";
    $sWhere = "";
    if ($_GET['q'] != "") {
        $sWhere = "WHERE (";
        for ($i = 0; $i < count($aColumns); $i++) {
            $sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
        }
        $sWhere = substr_replace($sWhere, "", -3);
        $sWhere .= ')';
    }
    $sWhere .= " order by created_at desc";
    include 'pagination.php'; //include pagination file
    //pagination variables
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page = 10; //los registros que quiere mostrar por pagina
    $adjacents  = 4; //espacio entre paginas despues de adjacents
    $offset = ($page - 1) * $per_page;
    //Cuenta el numero total de filas en su tabla 
    $count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
    $row = mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload = './expences.php';
    //consulta principal para obtener datos
    $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
    $query = mysqli_query($con, $sql);
    //recorre los datos obtenidos
    if ($numrows > 0) {

?>
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">IdTicket </th>
                    <th class="column-title">Asunto </th>
                    <th class="column-title">Area de peticion  </th>
                    <th class="column-title">Area de destino </th>
                    <th class="column-title">Prioridad </th>
                    <th class="column-title">Estado </th>
                    <!-- <th class="column-title">Trabajador Asignado </th> -->
                    <th class="column-title">Nombre del creador </th>
                    <th class="column-title">Nombre del ultimo editor </th>
                    <th class="column-title">N° de trazabilidades </th>
                    
                    <th>Fecha de creacion </th>
                    <th class="column-title no-link last"><span class="nobr"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($r = mysqli_fetch_array($query)) {
                    $id = $r['id'];
                    $created_at = date('d/m/Y', strtotime($r['created_at']));
                    $description = $r['description'];
                    $title = $r['title'];
                    $agenciaarea_id = $r['agenciaarea_id'];
                    $agenciadestino_id = $r["agenciadestino_id"];
                    $priority_id = $r['priority_id'];
                    $status_id = $r['status_id'];
                    $trabajador_id = $r['trabajador_id'];
                    //Aqui se configura los colores de fondo de cada estado
                    if ($status_id == 1) {
                        $text_estado = "Pendiente";
                        $label_class = 'label-danger';
                    } else if ($status_id == 2) {
                        $text_estado = "En Desarrollo";
                        $label_class = 'label-warning';
                    } else if ($status_id == 3) {
                        $text_estado = "Terminado";
                        $label_class = 'label-info';
                    } else if ($status_id == 4) {
                        $text_estado = "Cancelado";
                        $label_class = 'label-warning';
                    }
                    // $trabajador_id = $r['trabajador_id'];
                    $pedido_id = $r['pedido_id'];
                    $user_id = $r['user_id'];


                    //Trae el "name" de cada una de las forenkey como por ejemplo "agenciaarea_id"

                    $sql = mysqli_query($con, "select * from tituloticket where idtitu=$title");
                    if ($c = mysqli_fetch_array($sql)) {
                        $name_titulo = $c['nomtitu'];
                    }

                    $sql = mysqli_query($con, "select * from agenciaarea where id=$agenciaarea_id");
                    if ($c = mysqli_fetch_array($sql)) {
                        $name_agenciaarea = $c['name'];
                    }

                    $sql = mysqli_query($con, "select * from agenciaarea where id=$agenciadestino_id");
                    if ($cd = mysqli_fetch_array($sql)) {
                        $name_areadestino = $cd['name'];
                    }

                    $sql = mysqli_query($con, "select * from priority where id=$priority_id");
                    if ($c = mysqli_fetch_array($sql)) {
                        $name_priority = $c['name'];
                    }

                    $sql = mysqli_query($con, "select * from status where id=$status_id");
                    if ($c = mysqli_fetch_array($sql)) {
                        $name_status = $c['name'];
                    }

                    if (isset($trabajador_id)) {
                        $sql = mysqli_query($con, "select * from user where cedula=$trabajador_id");
                        if ($c = mysqli_fetch_array($sql)) {
                            $name_trabajador = $c['name'];
                        }
                    } else {
                        $name_trabajador = 'Ninguno';
                    }

                    $cantra =  mysqli_num_rows(mysqli_query($con, "select * from trazabilidad where ticket_id=$id"));
                    $usuario =  mysqli_fetch_array(mysqli_query($con, "select * from user where id=$user_id"));
                    $name_user = $usuario['2'];


                ?>
                    <input type="hidden" value="<?php echo $id; ?>" id="id<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $title; ?>" id="title<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $description; ?>" id="description<?php echo $id; ?>">



                    <!-- me obtiene los datos -->
                    <input type="hidden" value="<?php echo $pedido_id; ?>" id="pedido_id<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $agenciaarea_id; ?>" id="agenciaarea_id<?php echo $id; ?>">

                    <input type="hidden" value="<?php echo $name_areadestino; ?>" id="name_areadestino<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $priority_id; ?>" id="priority_id<?php echo $id; ?>">
                    <input type="hidden" value="<?php echo $status_id; ?>" id="status_id<?php echo $id; ?>">
                    
                    <input type="hidden" value="<?php echo $name_user; ?>" id="user_id<?php echo $id; ?>"> 

                    <input type="hidden" value="<?php echo $trabajador_id; ?>" id="trabajador_id<?php echo $id; ?>"> 


                    <tr class="even pointer">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name_titulo; ?></td>
                        <td><?php echo $name_agenciaarea; ?></td>                       
                        <td><?php echo $name_areadestino; ?></td>
                        <td><?php echo $name_priority; ?></td>
                        <!-- este codigo muesta el estado con su color , las variables se declaran arriba -->
                        <td><span class="label <?php echo $label_class; ?>"><?php echo $text_estado; ?></span> </td>
                        <!-- <td><?php // echo $name_trabajador; ?></td> -->
                        
                        <td><?php echo $name_user; ?></td>
                        <td><?php echo $name_trabajador; ?></td>
                        <td><?php echo $cantra; ?></td>
                        
                        <td><?php echo $created_at; ?></td>



                        <td><span class="pull-right">
                                <!-- <a href="#" class='btn btn-default' title='Editar Ticket' onclick="obtener_datos('<?php echo $id; ?>');" data-toggle="modal" data-target=".bs-example-modal-lg-udp"><i class="glyphicon glyphicon-edit"></i></a>  -->

                                <a href="#" class='btn btn-default' title='Editar informacion del ticket' onclick="obtener_datos2('<?php echo $id; ?>');"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="#" class='btn btn-default' title='Borrar Ticket' onclick="eliminar('<?php echo $id; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
                                <a href="#" class='btn btn-default' title='Crear trazabilidad del Ticket' onclick="creartraza('<?php echo $id; ?>');" data-toggle="modal" data-target=".bs-example-modal-lg-addtraza"><i class="fa fa-calendar-check-o"></i></a>




                                <!-- <a href="#" class='btn btn-default' title='Ver trazabilidad del Ticket' onclick="vertraza('<?php echo $id; ?>');" data-toggle="modal" data-target=".bs-example-modal-lg-vertraza"><i class="fa fa-calendar"></i></a>  -->
                            </span></td>
                    </tr>
                <?php
                } //en while
                ?>
                <tr>
                    <td colspan=6><span class="pull-right">
                            <?php echo paginate($reload, $page, $total_pages, $adjacents); ?>
                        </span></td>
                </tr>
        </table>
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Aviso!</strong> No hay datos para mostrar!
        </div>
<?php
    }
}
?>