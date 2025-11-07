<?php
$title = "Ticket - ";
include "head.php";
include "menu.php";


// Son de laravel Dompdf HTML2PDF TCPDF
// R&OS

// PLANTILLA DE TCPDF es con laravel https://tcpdf.org/examples/example_003/
// TCPDF como manejarlo https://www.youtube.com/watch?v=FWgo07bYOLU
// CON FPDF https://lacodigoteca.com/php/crear-ticket-en-pdf-con-php/
// CON DOM laravel https://oscargascon.es/uso-de-dompdf-para-generar-pdf-con-php-html-y-css/
// hcon laravel ttps://codigofacilito.com/articulos/generar-pdfs
// con codigo fuente con laravel https://kumbiaphp.com/blog/2018/08/06/crear-pdf-usando-html/
// con laravel https://eldesvandejose.com/2016/07/01/generar-documentos-pdf-con-php/
?>





<div class="right_col" role="main">
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="row top_tiles">
                <a href="graficaagencia.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"> Grafica de las Agencias que mas Tickets Piden</a>
            </div>
            <div class="row top_tiles">
                <a href="graficatitulos.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Grafica de los Titulos de Tickets mas frecuentes</a>
            </div>
            <div class="row top_tiles">
                <a href="graficatrabajadores.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Grafica de los Trabajadores que mas Tickets Solucionan</a>
            </div>

            <form action="crearpdf.php" method="post" class="form-inline">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="" class="">Crear PDF de un ticket - Ingrese el Id-Ticket : </label>
                    <input type="hidden" name="vienedelform" value="si" />
                    <input type="text" placeholder="Id-Ticket" name="nombre" value="" class="form-control" maxlength="10"/>
                </div>
                <input type="submit" value="Enviar" class='btn btn-primary btn-lg active' />
            </form>


            <!-- content -->


        </div>

    </div>




</div><!-- /page content -->



<?php include "footer.php";




// if(array_key_exists('test',$_POST)){
//     accion();
//  }

// if($_GET['click']){
//     accion();
// }

?>