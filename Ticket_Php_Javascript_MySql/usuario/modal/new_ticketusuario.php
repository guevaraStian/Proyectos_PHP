<?php

$arreagen = mysqli_query($con, "select * from agenciaarea where id = $agenciauser");
while ($rowag = mysqli_fetch_array($arreagen)) {
    $nomagen = $rowag['name'];
}


$titulo = mysqli_query($con, "select * from tituloticket");
$agenciaarea = mysqli_query($con, "select * from agenciaarea");
$priorities = mysqli_query($con, "select * from priority");
$statuses = mysqli_query($con, "select * from status");
$pedido = mysqli_query($con, "select * from pedido");
$trabajador = mysqli_query($con, "select * from trabajador");
?>

<div>
    <!-- Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Ticket</button>
</div>
<div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Ticket</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left input_mask" method="post" id="add" name="add">
                    <div id="result"></div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Agencia del usuario<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="agenciauser" class="form-control" maxlength="40" value="<?php echo $nomagen; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="pedido_id" id="pedido_id">
                                <?php foreach ($pedido as $p) : ?>
                                    <option value="<?php echo $p['id']; ?>" class="opcion"><?php echo $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Seleccione area de destino
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="agenciadestino_id">
                                <option selected="" value="">-- Selecciona --</option>
                                <?php foreach ($agenciaarea as $aa) : ?>
                                    <option value="<?php echo $aa['id']; ?>"><?php echo $aa['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                        <select class="form-control" name="title" id="title">
                                <option selected="" value="">-- Selecciona --</option>
                                <?php foreach ($titulo as $ti) : ?>
                                    <option value="<?php echo $ti['idtitu']; ?>"><?php echo $ti['nomtitu']; ?></option>
                                <?php endforeach; ?>
                            </select>


                            <!-- <input type="text" name="title" class="form-control" maxlength="40" placeholder="Titulo"> -->



                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="description" class="form-control col-md-7 col-xs-12" maxlength="100" placeholder="Descripción"></textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Agencia - Area
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="agenciaarea_id">
                                <option selected="" value="">-- Selecciona --</option>
                                <?php //foreach ($agenciaarea as $p) : ?>
                                    <option value="<?php //echo $p['id']; ?>"><?php //echo $p['name']; ?></option>
                                <?php //endforeach; ?>
                            </select>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="status_id">
                                <option selected="" value="1">Pendiente</option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Recomendacion <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="recom" id="recom" class="form-control" placeholder="Aqui van las recomendaciones para el problema que usted plantea" readonly></textarea>
                        </div>

                    </div> -->
                    <!-- JAVASCRIP -->
                    <!-- JAVASCRIP -->
                    <script type="text/javascript">
                        // let opciones = document.getElementById("pedido_id")
                        // let textoArea = document.getElementById("recom")

                        // opciones.addEventListener("change", (event) => {

                        //     let opcion = event.target.value


                        //     if (opcion == 1) {
                        //         textoArea.innerText = "Esta opcion del TICKET sirve para solicitar una peticion de arreglo"
                        //     }
                        //     if (opcion == 2) {
                        //         textoArea.innerText = "La opcion de BUG sirve para informar sobre un daño en el sistema"
                        //     }
                        //     if (opcion == 3) {
                        //         textoArea.innerText = "La opcion de SUGERENCIA sirve para dar una recomendacion"
                        //     }
                        //     if (opcion == 4) {
                        //         textoArea.innerText = "La opcion CARACTERISTICA sirve para apoyar el conocimiento de las herramientas"
                        //     }
                        // })
                    </script>

                    <!-- JAVASCRIP -->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Anexar todos los archivos
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="file" name="file[]" id="file" multiple>
                        </div>
                    </div>



                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button id="save_data" type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div> <!-- /Modal -->