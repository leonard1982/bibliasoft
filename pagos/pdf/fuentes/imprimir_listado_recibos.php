<?php
include ("../../clases/class.vencimientos.php");
include ("../../funciones/fechas.php");
include ("../../funciones/lib_fecha_letras.php");
include ("../../funciones/aletras.php");

$vencimientos = new vencimientos;
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

$rsvencimientos = $vencimientos->imprimir_recibos($idproveedor, $fechaini, $fechafin);
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
        height: 100px;
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
while ($row = mysql_fetch_row($rsvencimientos)) { 
    $idpago=$row[3];
    $ejerciciopago=$row[4];
    $rsv = $vencimientos->facturas_x_orden($ejerciciopago,$idpago);
    ?>
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
    <?php
    if (mysql_num_rows($rsv) >0) {
        $literalf = "las siguientes facturas";
    } else {
        $literalf = "la siguiente factura";
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <table width="100%" align="center">
        <tr>
            <td><h2>RECIBO DE PAGO</h2></td>
        </tr>
    </table>
    <br>
    <div class="referencia">Lanzarote, Tias a <?php echo fechaALetras(date("d/m/Y")) ?></div>
    <br>
    <br>
    <div class="referencia">He recibido de INDELASA S.A. la cantidad de <?= strtoupper($V->ValorEnLetras($row[0], "euros")) ?> en concepto del pago de <?= $literal1 ?>:</div>
    <br>
    <?php while ($rowfact = mysql_fetch_row($rsv)) { ?>
        <div class="parrafo">Factura <?= $rowfact[0] ?> del día <?= fechaALetras(implota($rowfact[1])) ?> con un importe de <?= number_format($rowfact[2], 2, ',', '.') ?> euros</div>
        <?php
    }
    ?>
    <page_footer>
        <p align="center" class="pie1">INDUSTRIALES DE CONSTRUCCIÓN DE LANZAROTE S.A.<br>
            <br>Cruce Ctra. De Las Playas, Km 0,200. 35572-TIAS-LANZAROTE  Telf. 928 83 40 26  Fax: 928 83 35 75</p>
        <p align="center" class="pie2">Inscrita en el R.M. Puerto del Arrecife. Tomo 15. Folio 126. Hoja 562 - CIF A35063767</p>
    </page_footer>
</page>
<?php } ?>