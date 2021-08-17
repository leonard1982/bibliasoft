<?php
include ("../../clases/class.vencimientos.php");
include ("../../funciones/fechas.php");

$vencimientos = new vencimientos;

$fechaini = explota($_GET["fechaini"]);
$fechafin = explota($_GET["fechafin"]);
$estado = $_GET["estado"];

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

$rsvencimientos=$vencimientos->imprimir_vencimientos($fechaini, $fechafin, $estado);
?>
<page backtop="10mm" backbottom="10mm" backleft="2mm" backright="2mm">
    <page_header>
        <table style="width: 100%; border: solid 0px black;">
            <tr>
                <td style="text-align: left;    width: 33%">IND. CONSTRUCCIÓN DE LANZAROTE S.A.</td>
                <td style="text-align: center;    width: 33%"><?= $cadena_fechas ?></td>
                <td style="text-align: right;    width: 33%"><?= date('d/m/Y H:m') ?> Pagina [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: center;    width: 100%">Listado de Vencimientos</h5</td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: center;    width: 100%">Industriales de Construccion de Lanzarote S.A.   CIF: A35063767</td>
            </tr>
        </table>
    </page_footer>
    <table style="width: 100%;border: solid 1px #5544DD; border-collapse: collapse; margin-top: 30px" align="center">
        <thead>
            <tr>
                <th style="width: 7%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Fecha Vto.</th>
                <th style="width: 9%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Cod. Prov.</th>
                <th style="width: 27%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Nombre Proveedor</th>
                <th style="width: 9%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Imp. Pagarés</th>
                <th style="width: 9%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Imp. Transf.</th>
                <th style="width: 9%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Imp. Recibos</th>
                <th style="width: 9%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Imp. Efectivo</th>
                <th style="width: 3%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Tipo</th>
                <th style="width: 9%; text-align: center; border: solid 1px #337722; background: #CCFFCC">N. Orden</th>
                <th style="width: 9%; text-align: center; border: solid 1px #337722; background: #CCFFCC">N. Apunte</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sumapagares=0;
            $sumatransferencias=0;
            $sumarecibos=0;
            $sumaefectivo=0;
            while ($row = mysql_fetch_row($rsvencimientos)) {
                ?>
                <tr>
                    <td style="width: 7%; text-align: left; border: solid 1px #55DD44"><?=implota($row[15])?></td>
                    <td style="width: 9%; text-align: center; border: solid 1px #55DD44"><?=strtoupper($row[16])?></td>
                    <td style="width: 27%; text-align: left; border: solid 1px #55DD44"><?=strtoupper($row[10])?></td>
                    <?php
                    if ($row[13]=="P") {
                        $importep=$row[6];
                        $importet=0;
                        $importer=0;
                        $importee=0;
                        $sumapagares=$sumapagares+$row[6];
                    }
                    if ($row[13]=="T") {
                        $importep=0;
                        $importet=$row[6];
                        $importer=0;
                        $importee=0;
                        $sumatransferencias=$sumatransferencias+$row[6];
                    }
                    if ($row[13]=="R") {
                        $importep=0;
                        $importet=0;
                        $importer=$row[6];
                        $importee=0;
                        $sumarecibos=$sumarecibos+$row[6];
                    }
                    if ($row[13]=="E") {
                        $importep=0;
                        $importet=0;
                        $importer=0;
                        $importee=$row[6];
                        $sumaefectivo=$sumaefectivo+$row[6];
                    }
                    ?>
                    <td style="width: 9%; text-align: right; border: solid 1px #55DD44"><?= number_format($importep, 2, ',', '.')?></td>
                    <td style="width: 9%; text-align: right; border: solid 1px #55DD44"><?= number_format($importet, 2, ',', '.')?></td>
                    <td style="width: 9%; text-align: right; border: solid 1px #55DD44"><?= number_format($importer, 2, ',', '.')?></td>
                    <td style="width: 9%; text-align: right; border: solid 1px #55DD44"><?= number_format($importee, 2, ',', '.')?></td>
                    <td style="width: 3%; text-align: center; border: solid 1px #55DD44"><?=strtoupper($row[13])?></td>
                    <td style="width: 9%; text-align: center; border: solid 1px #55DD44"><?=$row[2]."/".$row[3]?></td>
                    <td style="width: 9%; text-align: center; border: solid 1px #55DD44"><?=$row[1]."/".$row[0]?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <th style="width: 7%; text-align: right"><?=date('d/m/Y')?></th>
                <th style="width: 9%; text-align: right"></th>
                <th style="width: 27%; text-align: left">TOTAL LISTADO: </th>
                <th style="width: 9%; text-align: right"><?= number_format($sumapagares, 2, ',', '.')?></th>
                <th style="width: 9%; text-align: right"><?= number_format($sumatransferencias, 2, ',', '.')?></th>
                <th style="width: 9%; text-align: right"><?= number_format($sumarecibos, 2, ',', '.')?></th>
                <th style="width: 9%; text-align: right"><?= number_format($sumaefectivo, 2, ',', '.')?></th>
                <th style="width: 3%; text-align: center"></th>
                <th style="width: 9%; text-align: center"></th>
                <th style="width: 9%; text-align: center"></th>
            </tr>
        </tbody>
    </table>
    <br>
</page>