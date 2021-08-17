<?php
include ("../../clases/class.transferencias.php");
include ("../../funciones/fechas.php");
include ("../../funciones/aletras.php");
include ("../../funciones/lib_fecha_letras.php");

$transferencias = new transferencias;
$V = new EnLetras();

$cadena_fechas = "";
if ((($_GET["fechaini"]) == "01/01/1970") && ($_GET["fechafin"] == "31/12/2050")) {
    $cadena_fechas = "Todas las fechas";
}
if ((($_GET["fechaini"]) == "01/01/1970") && ($_GET["fechafin"] != "31/12/2050")) {
    $cadena_fechas = "Hasta " . $_GET["fechafin"];
}
if ((($_GET["fechaini"]) != "01/01/1970") && ($_GET["fechafin"] == "31/12/2050")) {
    $cadena_fechas = "Desde " . $_GET["fechaini"];
}
if ((($_GET["fechaini"]) != "01/01/1970") && ($_GET["fechafin"] != "31/12/2050")) {
    $cadena_fechas = "Desde " . $_GET["fechaini"] . " hasta " . $_GET["fechafin"];
}


$fechaini = explota($_GET["fechaini"]);
$fechafin = explota($_GET["fechafin"]);
$idproveedor = $_GET["idproveedor"];

$rstransferencias = $transferencias->imprimir_transferencias($idproveedor, $fechaini, $fechafin);
?>
<style type="text/css">
    <!--
    table { vertical-align: top; }
    tr    { vertical-align: top; }
    td    { vertical-align: top; }
    }
    #membrete {
        margin-left: 420px;
        text-align: left;
        border-radius: 10px; 
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border: 1px solid #333;
        width: 270px;
        padding: 5px;
        font-size: 12px;
        height: 70px;
    }
    .referencia {
        margin-left: 70px;
        text-align: left;
        font-size: 14px;
    }
    .parrafo {
        margin-left: 70px;
        text-align: left;
        width: 640px;
        font-size: 14px;
    }
    .pie1 {
        font-size: 8px;
        margin: 1px;
    }
    .pie2 {
        font-size: 6px;
    }
    -->
</style>
<?php
while($row=mysql_fetch_row($rstransferencias)) {
?>
<page backcolor="#FFFFFF" backimgx="center" backimgy="bottom" backimgw="100%" backtop="-10px" backbottom="30mm" style="font-size: 12pt">
    <bookmark title="Lettre" level="0" ></bookmark>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 100%; color: #444444;">
                <img style="width: 30%;" src="../img/logolistado.jpg" alt="Logo">
            </td>
        </tr>
    </table>
    <br>
    <br>
    <div id="membrete">
        BANCO DE SANTANDER, S.A.<br>
        C/ LEON Y CASTILLO, 22<br>
        ARRECIFE<br>
        LAS PALMAS
    </div>
    <br>
    <br>
    <div class="referencia">Lanzarote, Tias a <?php echo fechaALetras(date("d/m/Y")) ?></div>
    <br>
    <br>
    <table width="100%" align="center">
        <tr>
            <td><h2>ORDEN DE TRANSFERENCIA</h2></td>
        </tr>
    </table>
    <br>
    <div class="referencia">Muy Sres. Nuestros:</div>
    <br>
    <div class="parrafo">Rogamos efectuen transferencia por un importe de:</div>
    <div class="parrafo"><?=number_format($row[0], 2, ',', '.')."    ".strtoupper($V->ValorEnLetras($row[0], "euros"))?></div>
    <br>
    <br>
    <div class="parrafo">Con cargo a nuestra cuenta corriente ES71 0049 1880 18 2410010741.</div> 
    <div class="parrafo">Beneficiario:</div>
    <div class="parrafo"><?=strtoupper($row[2])?></div>
    <div class="parrafo">C/C: <?=strtoupper($row[3])?></div>
    <div class="parrafo"><?=strtoupper($row[6])?></div>
    <div class="parrafo">En concepto de:</div>
    <div class="parrafo">PAGO FRA: <?=$row[4]?> del dia <?=implota($row[5])?></div>
    <br>
    <br>
    <div class="parrafo">Muy atentamente</div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 50%;">Fdo.: Sr. Juan Perez Tejera</td>
            <td style="width: 50%;">Fdo.: Sr. Juan M. Quesada Mateos</td>
        </tr>
        <tr>
            <td style="width: 50%;">CONSEJERO-DELEGADO</td>
            <td style="width: 50%;">PRESIDENTE</td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 100%;">Fdo.: Felix M. Umpierrez Rguez.</td>
        </tr>
        <tr>
            <td style="width: 100%;">CONSEJERO</td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: right; font-size: 14px">
        <tr>
            <td style="width: 100%;">EJEMPLAR PARA EL BANCO</td>
        </tr>
    </table>
    <page_footer>
        <p align="center" class="pie1">INDUSTRIALES DE CONSTRUCCIÓN DE LANZAROTE S.A.<br>
            <br>Cruce Ctra. De Las Playas, Km 0,200. 35572-TIAS-LANZAROTE  Telf. 928 83 40 26  Fax: 928 83 35 75</p>
            <p align="center" class="pie2">Inscrita en el R.M. Puerto del Arrecife. Tomo 15. Folio 126. Hoja 562 - CIF A35063767</p>
    </page_footer>
</page>
<page backcolor="#FEFEFE" backimgx="center" backimgy="bottom" backimgw="100%" backtop="-10px" backbottom="30mm" style="font-size: 12pt">
    <bookmark title="Lettre" level="0" ></bookmark>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 100%; color: #444444;">
                <img style="width: 30%;" src="../img/logolistado.jpg" alt="Logo">
            </td>
        </tr>
    </table>
    <br>
    <br>
    <div id="membrete">
        BANCO DE SANTANDER, S.A.<br>
        C/ LEON Y CASTILLO, 22<br>
        ARRECIFE<br>
        LAS PALMAS
    </div>
    <br>
    <br>
    <div class="referencia">Lanzarote, Tias a <?php echo fechaALetras(date("d/m/Y")) ?></div>
    <br>
    <br>
    <table width="100%" align="center">
        <tr>
            <td><h2>ORDEN DE TRANSFERENCIA</h2></td>
        </tr>
    </table>
    <br>
    <div class="referencia">Muy Sres. Nuestros:</div>
    <br>
    <div class="parrafo">Rogamos efectuen transferencia por un importe de:</div>
    <div class="parrafo"><?=number_format($row[0], 2, ',', '.')."    ".strtoupper($V->ValorEnLetras($row[0], "euros"))?></div>
    <br>
    <br>
    <div class="parrafo">Con cargo a nuestra cuenta corriente 0049 1880 18 2410010741.</div> 
    <div class="parrafo">Beneficiario:</div>
    <div class="parrafo"><?=strtoupper($row[2])?></div>
    <div class="parrafo">C/C: <?=strtoupper($row[3])?></div>
    <div class="parrafo"><?=strtoupper($row[6])?></div>
    <div class="parrafo">En concepto de:</div>
    <div class="parrafo">PAGO FRA: <?=$row[4]?> del dia <?=implota($row[5])?></div>
    <br>
    <br>
    <div class="parrafo">Muy atentamente</div>
    <br>
    <br>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 50%;">Fdo.: Sr. Juan Perez Tejera</td>
            <td style="width: 50%;">Fdo.: Sr. Juan M. Quesada Mateos</td>
        </tr>
        <tr>
            <td style="width: 50%;">CONSEJERO-DELEGADO</td>
            <td style="width: 50%;">PRESIDENTE</td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 100%;">Fdo.: Felix M. Umpierrez Rguez.</td>
        </tr>
        <tr>
            <td style="width: 100%;">CONSEJERO</td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: right; font-size: 14px">
        <tr>
            <td style="width: 100%;">EJEMPLAR PARA INDELASA</td>
        </tr>
    </table>
    <page_footer>
        <p align="center" class="pie1">INDUSTRIALES DE CONSTRUCCIÓN DE LANZAROTE S.A.<br>
            <br>Cruce Ctra. De Las Playas, Km 0,200. 35572-TIAS-LANZAROTE  Telf. 928 83 40 26  Fax: 928 83 35 75</p>
            <p align="center" class="pie2">Inscrita en el R.M. Puerto del Arrecife. Tomo 15. Folio 126. Hoja 562 - CIF A35063767</p>
    </page_footer>
</page>
<?php
}
?>