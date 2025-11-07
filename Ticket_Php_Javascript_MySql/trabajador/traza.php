<?php
$title = "Tickets | ";
include "headtrabajador.php";
include "menutrabajador.php";
?>

<div class="right_col" role="main">
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php
                include("modal/new_traza.php");
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
                            <label for="q" class="col-md-2 control-label">Buscar trazabilidad por IdTicket</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="q" placeholder="IdTicket" maxlength="10" onkeyup='load(1);'>
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

<?php include "footertrabajador.php" ?>

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

//Scrip para mostrar datos de ticket
    function obtener_datos(traza_id) {

        var descriptraza = $("#descriptraza" + traza_id).val();
        var ticket_id = $("#ticket_id" + traza_id).val();
        var user_id = $("#user_id" + traza_id).val();
        var create_at = $("#create_at" + traza_id).val();

        
        $("#mod_traza_id").val(traza_id);
        $("#mod_descriptraza").val(descriptraza);
        $("#mod_ticket_id").val(ticket_id);
        $("#mod_user_id").val(user_id);
        $("#mod_create_at").val(create_at);

    }
</script>