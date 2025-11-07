<?php
    $title ="Tickets | ";
    include "headusuario.php";
    include "menuusuario.php";
?>

<div class="right_col" role="main">
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php
                        include("modal/new_ticketusuario.php");
                        include("modal/upd_ticketusuario.php");
                    ?>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>TICKETS</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <!-- form buscar ticket -->
                    <form class="form-horizontal" role="form" id="gastos">
                        <div class="form-group row">
                            <label for="q" class="col-md-2 control-label">ID del ticket</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="q" maxlength="10" placeholder="ID del ticket"
                                    onkeyup='load(1);'>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-default" onclick='load(1);'>
                                    <span class="glyphicon glyphicon-search"></span> Buscar</button>
                                <span id="loader"></span>
                            </div>
                        </div>
                    </form>
                    <!-- fin form buscar ticket -->


                    <div class="x_content">
                        <div class="table-responsive">
                            <!-- ajax mostrar tabla -->
                            <div id="resultados"></div><!-- Carga los datos ajax -->
                            <div class='outer_div'></div><!-- Carga los datos ajax -->
                            <!-- /ajax mostrar tabla-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /page content -->

<?php include "footerusuario.php" ?>

<script type="text/javascript" src="js/ticket.js"></script>
<script>
$("#add").on("submit", function(e) {
        $('#save_data').attr("disabled", true);
        /****/
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "action/addticket.php",
            type: "POST",
            cache: false,
            data: formData,
            contentType: false, // you can also use multipart/form-data replace of false
            processData: false,
            beforeSend: function(objeto) {
                $("#result").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#result").html(datos);
                $('#save_data').attr("disabled", false);
                load(1);
            }
        });
        /*****/
    })

// Script para llamar el .php de editar ticket
$("#upd").submit(function(event) {
    $('#upd_data').attr("disabled", true);

    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "action/updticket.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#result2").html("Mensaje: Cargando...");
        },
        success: function(datos) {
            $("#result2").html(datos);
            $('#upd_data').attr("disabled", false);
            load(1);
        }
    });
    event.preventDefault();
})

function obtener_datos(id) {
    var description = $("#description" + id).val();
    var title = $("#title" + id).val();
    var pedido_id = $("#pedido_id" + id).val();
    var agenciaarea_id = $("#agenciaarea_id" + id).val();
    // var trabajador_id = $("#trabajador_id" + id).val();
    var priority_id = $("#priority_id" + id).val();
    var status_id = $("#status_id" + id).val();
    $("#mod_id").val(id);
    $("#mod_title").val(title);
    $("#mod_description").val(description);
    $("#mod_pedido_id").val(pedido_id);
    $("#mod_agenciaarea_id").val(agenciaarea_id);
    // $("#mod_trabajador_id").val(trabajador_id);
    $("#mod_priority_id").val(priority_id);
    $("#mod_status_id").val(status_id);
}

function obtener_datos2(id) {

    var miUrl = "../archivos/usrindex.php?idti=" + id;
    window.open(miUrl);
}
</script>