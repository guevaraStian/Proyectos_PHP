<?php
$ticket = mysqli_query($con, "select * from ticket order by created_at desc");
?>

<div>
    <!-- Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Trazabilidad</button>
</div>
<div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar Trazabilidad</h4>
            </div>
            <div class="modal-body">
            
                <form class="form-horizontal form-label-left input_mask" method="post" id="add" name="add">
                    <div id="result"></div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id-Ticket
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="ticket_id" id="ticket_id"  class="form-control">
                            <option selected="" value="">-- Selecciona --</option>
                                <?php foreach ($ticket as $p) : ?>
                                    <option value="<?php echo $p['id']; ?>" class="opcion"><?php echo $p['id']; ?> - <?php echo $p['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="descriptraza" class="form-control" maxlength="100" placeholder="Descripción"></textarea>
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