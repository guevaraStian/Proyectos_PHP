<?php
$agenciaarea = mysqli_query($con, "select * from agenciaarea");
$priorities = mysqli_query($con, "select * from priority");
$statuses = mysqli_query($con, "select * from status");
$pedido = mysqli_query($con, "select * from pedido");
$trabajador = mysqli_query($con, "select * from trabajador");


// $idticket = "<script> document.writeln(q); </script>"; // igualar el valor de la variable JavaScript a PHP 


// $idticket = 33;

// $articulo = "SELECT * FROM trazabilidad where ticket_id = $idticket";
// $articulo = "SELECT * FROM trazabilidad INNER JOIN ticket ON trazabilidad.ticket_id = ticket.id";
// $resultado = $con->query($articulo);

                    

?>


<!-- Modal -->
<div class="modal fade bs-example-modal-lg-udp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Editar Ticket</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left input_mask" method="post" id="upd" name="upd">
                    <div id="result2"></div>

                    <input type="hidden" name="mod_id" id="mod_id">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="pedido_id" required id="mod_pedido_id">
                                <?php foreach ($pedido as $p) : ?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="title" class="form-control" maxlength="40" placeholder="Titulo" id="mod_title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="description" id="mod_description" maxlength="100" class="form-control col-md-7 col-xs-12" required placeholder="Ingrese descripcion"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Agencia - Area Solicitante
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="agenciaarea_id" required id="mod_agenciaarea_id">
                                <option selected="" value="">-- Selecciona --</option>
                                <?php foreach ($agenciaarea as $p) : ?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Trabajador Asignado
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="trabajador_id" required id="mod_trabajador_id">
                                <option selected="" value="">-- Selecciona --</option>
                                <?php foreach ($trabajador as $p) : ?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Prioridad
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="priority_id" required id="mod_priority_id">
                                <option selected="" value="">-- Selecciona --</option>
                                <?php foreach ($priorities as $p) : ?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="status_id" required id="mod_status_id">
                                <option selected="" value="">-- Selecciona --</option>
                                <?php foreach ($statuses as $p) : ?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                     <?php //echo $_GET["id"]; ?>  


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button id="upd_data" type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>

                </form>
                <div id="mis_soportes">
                  <!--Soportes del ticket-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div> <!-- /Modal -->