<?php
$title = "Tickets | ";
include "head.php";
include "menu.php";
?>

<div class="right_col" role="main">
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php
                include("modal/new_traza.php");
                include("modal/upd_traza.php");
                ?>
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <!-- form seach -->
                    <form class="form-horizontal" role="form" id="gastos">
                        <div class="form-group row">
                            <label for="q" class="col-md-2 control-label">Buscar trazabilidad por Id-Ticket</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="q" placeholder="Id-Ticket de la Traza" maxlength="10" onkeyup='load(1);'>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-default" onclick='load(1);'>
                                    <span class="glyphicon glyphicon-search"></span> Buscar</button>
                                <span id="loader"></span>
                            </div>
                        </div>
                    </form>
                    <!-- end form seach -->


                    <div class="x_content">
                        <div class="table-responsive">
                            <!-- ajax -->
                            <div id="resultados"></div><!-- Carga los datos ajax -->
                            <div class='outer_div'></div><!-- Carga los datos ajax -->
                            <!-- /ajax -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /page content -->

<?php include "footer.php" ?>

<script type="text/javascript" src="js/traza.js"></script> 
<script>
//Scrip para llamar al php de agregar ticket
    $("#add").submit(function(event) {
        $('#save_data').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/addtraza.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#result").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#result").html(datos);
                $('#save_data').attr("disabled", false);
                load(1);
            }
        });
        event.preventDefault();
    })

//Scrip para llamar al php de editar ticket
    $("#updtraza").submit(function(event) {
        $('#upd_datatraza').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/updtraza.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#result2").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#result2").html(datos);
                $('#upd_datatraza').attr("disabled", false);
                load(1);
            }
        });
        event.preventDefault();
    })
//Scrip para mostrar datos de ticket
    function obtener_datos_traza(traza_id) {

        var trazab_id = $("#traza_id" + traza_id).val();
        var tickete_id = $("#ticket_id" + traza_id).val();
        var descriptrazab = $("#descriptraza" + traza_id).val();
        
        $("#mod_trazab_id").val(trazab_id);
        $("#mod_tickete_id").val(tickete_id);
        $("#mod_descriptrazab").val(descriptrazab);

    }
</script>