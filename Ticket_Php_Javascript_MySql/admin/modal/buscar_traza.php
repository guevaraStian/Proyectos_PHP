<!-- Modal -->
<div class="modal fade bs-example-modal-lg-vertraza" tabindex="-1" role="dialog" aria-hidden="true">



    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Ver las trazabilidades de el ticket </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left input_mask" method="post" id="vertraza" name="vertraza">
                    <!-- <div id="result3"></div> -->

                    <!-- <input type="hidden" name="mod_id" id="mod_id"> -->

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Ticket
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="mod_idti" id="mod_idti" class="form-control" maxlength="40" readonly>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción Trazabilidad <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea name="descriptraza" id="descriptraza" maxlength="100" class="form-control col-md-7 col-xs-12" required placeholder="Ingrese descripcion"> </textarea>
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
