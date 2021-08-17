<?php
include ("../../clases/class.ordenes.php");
include ("../../clases/class.proveedores.php");
include ("../../funciones/fechas.php");

$ordenes = new ordenes;
$proveedores = new proveedores;

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
$situacion = $_GET["situacion"];

$rsproveedores = $proveedores->buscar('', '');
?>
<style>
    #datos_prov {
        margin-top: 50px;
    }
</style>
<?php
$indice = 0;
$totalimporte = 0;
while ($rowprov = mysql_fetch_row($rsproveedores)) {
    $codproveedor = $rowprov[37];
    $nomproveedor = $rowprov[1];
    $idproveedor = $rowprov[0];
    $rsordenes = $ordenes->imprimir_ordenes($idproveedor, $fechaini, $fechafin, $situacion);
    if (mysql_num_rows($rsordenes) > 0) {
        ?>
        <page backtop="10mm" backbottom="10mm" backleft="2mm" backright="2mm">
            <page_header>
                <table style="width: 100%; border: solid 0px black;">
                    <tr>
                        <td style="text-align: left;    width: 50%">IND. CONSTRUCCIÓN DE LANZAROTE S.A.</td>
                        <td style="text-align: right;    width: 50%"><?= date('d/m/Y H:m') ?> Pagina [[page_cu]]/[[page_nb]]</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;    width: 100%"><?= $cadena_fechas ?></td>
                    </tr>
                </table>
                <table style="width: 100%; border: solid 1px black;">
                    <tr>
                        <td style="text-align: center;    width: 100%"><h4>Listado de Ordenes de Pago</h4></td>
                    </tr>
                </table>
            </page_header>
            <div id="datos_prov">
                <p align="left">Cod. Proveedor: <?= $codproveedor ?><br>
                    Nombre: <?= strtoupper($nomproveedor) ?></p>
            </div>
            <?php
            $resumen[$indice][0] = $codproveedor;
            $resumen[$indice][1] = $nomproveedor;
            ?>
            <page_footer>
                <table style="width: 100%; border: solid 1px black;">
                    <tr>
                        <td style="text-align: center;    width: 100%">Industriales de Construccion de Lanzarote S.A.   CIF: A35063767</td>
                    </tr>
                </table>
            </page_footer>
            <table style="width: 100%;border: solid 1px #5544DD; border-collapse: collapse; margin-top: 10px" align="center">
                <thead>
                    <tr>
                        <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Nº Orden</th>
                        <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Fecha</th>
                        <th style="width: 40%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Proveedor</th>
                        <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Importe</th>
                        <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Nº. Vtos.</th>
                        <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Nº. Fact.</th>
                        <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">F. Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sumaimportes = 0;
                    while ($row = mysql_fetch_row($rsordenes)) {
                        ?>
                        <tr>
                            <td style="width: 10%; text-align: left; border: solid 1px #55DD44"><?= $row[0] . "/" . $row[1] ?></td>
                            <td style="width: 10%; text-align: center; border: solid 1px #55DD44"><?= implota($row[3]) ?></td>
                            <td style="width: 40%; text-align: right; border: solid 1px #55DD44"><?= strtoupper($nomproveedor) ?></td>
                            <?php
                            $sumaimportes = $sumaimportes + $row[4];
                            ?>
                            <td style="width: 10%; text-align: right; border: solid 1px #55DD44"><?= number_format($row[4], 2, ',', '.') ?></td>
                            <td style="width: 10%; text-align: right; border: solid 1px #55DD44"><?= $row[6] ?></td>
                            <td style="width: 10%; text-align: center; border: solid 1px #55DD44"><?= $row[5] ?></td>
                            <td style="width: 10%; text-align: center; border: solid 1px #55DD44"><?= strtoupper($row[9]) ?></td>
                        </tr>
                        <?php
                    }
                    $resumen[$indice][2] = $sumaimportes;
                    $totalimporte = $totalimporte + $sumaimportes;
                    ?>
                    <tr>
                        <th style="width: 10%; text-align: right"></th>
                        <th style="width: 10%; text-align: right"></th>
                        <th style="width: 40%; text-align: right">Total proveedor: </th>
                        <th style="width: 10%; text-align: right"><?= number_format($sumaimportes, 2, ',', '.') ?></th>
                        <th style="width: 10%; text-align: right"></th>
                        <th style="width: 10%; text-align: center"></th>
                        <th style="width: 10%; text-align: center"></th>
                    </tr>
                </tbody>
            </table>
            <br>
        </page>
        <?php
        $indice++;
    }
}
?>
<page backtop="20mm" backbottom="10mm" backleft="2mm" backright="2mm">
    <page_header>
        <table style="width: 100%; border: solid 0px black;">
            <tr>
                <td style="text-align: left;    width: 50%">IND. CONSTRUCCIÓN DE LANZAROTE S.A.</td>
                <td style="text-align: right;    width: 50%"><?= date('d/m/Y H:m') ?> Pagina [[page_cu]]/[[page_nb]]</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;    width: 100%"><?= $cadena_fechas ?></td>
            </tr>
        </table>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: center;    width: 100%"><h4>Resumen de Ordenes de Pago</h4></td>
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
    <table style="width: 100%;border: solid 1px #5544DD; border-collapse: collapse; margin-top: 10px" align="center">
        <thead>
            <tr>
                <th style="width: 20%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Codigo</th>
                <th style="width: 60%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Proveedor</th>
                <th style="width: 20%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Importe</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 0;
            while ($contador < $indice) {
                ?>
                <tr>
                    <td style="width: 20%; text-align: left; border: solid 1px #55DD44"><?= $resumen[$contador][0] ?></td>
                    <td style="width: 60%; text-align: left; border: solid 1px #55DD44"><?= strtoupper($resumen[$contador][1]) ?></td>
                    <td style="width: 20%; text-align: right; border: solid 1px #55DD44"><?= number_format($resumen[$contador][2], 2, ',', '.') ?></td>
                </tr>
                <?php
                $contador++;
            }
            ?>
            <tr>
                <th style="width: 20%; text-align: right"></th>
                <th style="width: 60%; text-align: right">Totales: </th>
                <th style="width: 20%; text-align: right"><?= number_format($totalimporte, 2, ',', '.') ?></th>
            </tr>
        </tbody>
    </table>
    <br>
</page>