<?php
$ticket = mysqli_query($con, "select * from ticket order by created_at desc");

?>


<!-- Modal -->
<div class="modal fade bs-example-modal-lg-udptraza" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Editar Trazabilidad</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left input_mask" method="post" id="updtraza" name="updtraza">
                    <div id="result2"></div>

                    <input type="hidden" name="mod_trazab_id" id="mod_trazab_id">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id-Ticket
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="mod_tickete_id" id="mod_tickete_id"  readonly class="form-control">
                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="mod_descriptrazab" id="mod_descriptrazab" class="form-control col-md-7 col-xs-12" maxlength="100" required placeholder="Ingrese descripcion"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button id="upd_datatraza" type="submit" class="btn btn-success">Guardar</button>
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