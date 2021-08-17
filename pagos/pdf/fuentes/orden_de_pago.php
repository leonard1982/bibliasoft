<?php
include_once ("../../clases/class.ordenes.php");
include_once ("../../clases/class.facturas.php");
include_once ("../../clases/class.vencimientos.php");
include ("../../funciones/fechas.php");
include ("../../funciones/lib_fecha_letras.php");

$ordenes = new ordenes();
$facturas = new facturas();
$vencimientos = new vencimientos();

$idpago = $_GET["idpago"];
$ejercicio = $_GET["ejercicio"];

$rsordenes = $ordenes->select($idpago, $ejercicio);
$rsfacturas = $facturas->listar_facturas_procesadas_ordenpago($idpago, $ejercicio);
$numero = $facturas->numero_listar_facturas_procesadas_ordenpago($idpago, $ejercicio);
$rsvencimientos = $vencimientos->vencimientos_x_orden($idpago, $ejercicio);
$numero2 = $vencimientos->numero_vencimientos_x_orden($idpago, $ejercicio);

$prefijo = $rsordenes[29];
if ($prefijo == "T") {
    if ($numero2 > 1) {
        $literal1 = "las transferencias";
        $articulo = "las cuales liquidan";
    } else {
        $literal1 = "la transferencia";
        $articulo = "la cual liquida";
    }
    $literal2 = "Transferencia realizada el día";
}
if ($prefijo == "P") {
    if ($numero2 > 1) {
        $literal1 = "los pagarés";
        $articulo = "los cuales liquidan";
    } else {
        $literal1 = "el pagaré";
        $articulo = "el cual liquida";
    }
    $literal2 = "Pagaré vencimiento el día";
}
if ($prefijo == "E") {
    if ($numero2 > 1) {
        $literal1 = "los pagos efectivos";
        $articulo = "los cuales liquidan";
    } else {
        $literal1 = "el pago efectivo";
        $articulo = "el cual liquida";
    }
    $literal2 = "Contado realizado el día";
}
if ($prefijo == "R") {
    if ($numero2 > 1) {
        $literal1 = "los recibos bancarios";
        $articulo = "los cuales liquidan";
    } else {
        $literal1 = "el recibo bancario";
        $articulo = "el cual liquida";
    }
    $literal2 = "Recibo bancario realizado el día";
}
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
        <?= strtoupper($rsordenes[13]) ?><br>
        <?= strtoupper($rsordenes[19]) ?><br>
        <?= strtoupper($rsordenes[20]) ?><br>
        <?= strtoupper($rsordenes[21]) ?> (<?= strtoupper($rsordenes[22]) ?>)
    </div>
    <?php
    if ($numero > 1) {
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
            <td><h2>CARTA DE PAGO</h2></td>
        </tr>
    </table>
    <br>
    <div class="referencia">N/Ref: <?php echo $rsordenes[0] . "/" . $rsordenes[1] ?></div>
    <br>
    <br>
    <div class="referencia">Lanzarote, Tias a <?php echo fechaALetras(date("d/m/Y")) ?></div>
    <br>
    <div class="referencia">Muy Sres. Nuestros:</div>
    <br>
    <div class="parrafo">Adjuntamos a la presente <?= $literal1 ?> que se relaciona a continuación, <?= $articulo ?> <?= $literalf ?>:</div>
    <br>
<!--    totalfac sería el 4-->
    <?php while ($rowfact = mysql_fetch_row($rsfacturas)) { ?>
        <div class="parrafo">Factura <?= $rowfact[2] . "/" . $rowfact[1] ?> del día <?= implota($rowfact[3]) ?> con un importe de <?= number_format($rowfact[5], 2, ',', '.') ?></div>
        <?php
    }
    ?>
    <br>
    <?php while ($rowv = mysql_fetch_row($rsvencimientos)) { ?>
        <div class="parrafo"><?= $literal2 ?> <?= implota($rowv[0]) ?> por un importe de <?= number_format($rowv[1], 2, ',', '.') ?></div>  
    <?php } ?>
    <br>
    <div class="parrafo">Sin otro particular, les saludamos atentamente</div>
    <page_footer>
        <p align="center" class="pie1">INDUSTRIALES DE CONSTRUCCIÓN DE LANZAROTE S.A.<br>
            <br>Cruce Ctra. De Las Playas, Km 0,200. 35572-TIAS-LANZAROTE  Telf. 928 83 40 26  Fax: 928 83 35 75</p>
        <p align="center" class="pie2">Inscrita en el R.M. Puerto del Arrecife. Tomo 15. Folio 126. Hoja 562 - CIF A35063767</p>
        <br>
        <br>    
    </page_footer>
</page>
