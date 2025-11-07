$(document).ready(function() {
    load(1);
});
//funcion para mostrar el ajax llamado trabajador.php donde se muestra la tabla de trabajadores
function load(page) {
    var q = $("#q").val();
    $("#loader").fadeIn('slow');
    $.ajax({
        url: './ajax/trabajador.php?action=ajax&page=' + page + '&q=' + q,
        beforeSend: function(objeto) {
            $('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
        },
        success: function(data) {
            $(".outer_div").html(data).fadeIn('slow');
            $('#loader').html('');

        }
    })
}


//funcion para eliminar los trajadores creados
function eliminar(id) {
    var q = $("#q").val();
    if (confirm("Realmente deseas eliminar la trabajador?")) {
        $.ajax({
            type: "GET",
            url: "./ajax/trabajador.php",
            data: "id=" + id,
            "q": q,
            beforeSend: function(objeto) {
                $("#resultados").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#resultados").html(datos);
                load(1);
            }
        });
    }
}