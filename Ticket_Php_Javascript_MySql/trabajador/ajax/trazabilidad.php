<?php
    // session_start();
    include "../../config/config.php";//Contiene funcion que conecta a la base de datos

    // $user_id = $_SESSION["user_id"];
    
    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if (isset($_GET['traza_id'])){
        $id_del=intval($_GET['traza_id']);
        $query=mysqli_query($con, "SELECT * from trazabilidad where traza_id='".$id_del."'");
        $count=mysqli_num_rows($query);

            if ($delete1=mysqli_query($con,"DELETE FROM trazabilidad WHERE traza_id='".$id_del."'")){
?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Aviso!</strong> Datos eliminados exitosamente.
            </div>
        <?php 
            }else {
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
    
    if($action == 'ajax'){
        // escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
         $aColumns = array('ticket_id');//Columnas de busqueda
         $sTable = "trazabilidad";
         $sWhere = "";
        if ( $_GET['q'] != "" )
        {
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                $sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }
        $sWhere.=" order by traza_id desc";
        include 'pagination.php'; //include pagination file
        //pagination variables
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 10; //los registros que quiere mostrar por pagina
        $adjacents  = 4; //espacio entre paginas despues de adjacents
        $offset = ($page - 1) * $per_page;
        //Cuenta el numero total de filas en su tabla 
        $count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
        $row= mysqli_fetch_array($count_query);
        $numrows = $row['numrows'];
        $total_pages = ceil($numrows/$per_page);
        $reload = './expences.php';
        //consulta principal para obtener datos
        $sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
        $query = mysqli_query($con, $sql);
        //recorre los datos obtenidos
        if ($numrows>0){
            
            ?>
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Id-Traza </th>
                        <th class="column-title">Id-Ticket </th>
                        <th class="column-title">Descripcion </th>
                        <th class="column-title">Usuario creador </th>
                        <th class="column-title">Fecha de creacion </th>

                        <th class="column-title no-link last"><span class="nobr"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        while ($r=mysqli_fetch_array($query)) {
                            $traza_id=$r['traza_id'];
                            $descriptraza=$r['descriptraza'];
                            $ticket_id=$r['ticket_id'];
                            $cedula=$r['user_id'];
                            $created_at=$r['created_at'];

                            $sql = mysqli_query($con, "select * from user where id=$cedula");
                            if($c=mysqli_fetch_array($sql)) {
                                $name_user=$c['name'];
                            }

                ?>
                    <input type="hidden" value="<?php echo $traza_id;?>" id="traza_id<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $ticket_id;?>" id="ticket_id<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $descriptraza;?>" id="descriptraza<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $cedula;?>" id="user_id<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $created_at;?>" id="created_at<?php echo $id;?>">
                    


                    <tr class="even pointer">
                        <td><?php echo $traza_id;?></td>
                        <td><?php echo $ticket_id; ?></td>
                        <td><?php echo $descriptraza;?></td>
                        <td><?php echo $name_user;?></td>
                        <td><?php echo $created_at; ?></td>
                        <td ><span class="pull-right">
                        </tr>
                <?php
                    } //en while
                ?>
                <tr>
                    <td colspan=6><span class="pull-right">
                        <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                    </span></td>
                </tr>
              </table>
            </div>
            <?php
        }else{
           ?> 
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Aviso!</strong> No hay datos para mostrar!
            </div>
        <?php    
        }
    }
?>

