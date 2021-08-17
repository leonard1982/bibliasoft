<?php
include ("../../clases/class.facturas.php");
include ("../../clases/class.proveedores.php");
include ("../../funciones/fechas.php");

$facturas = new facturas;
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
$pagadas = $_GET["pagadas"];

$rsproveedores = $proveedores->buscar('', '');
?>
<style>
    #datos_prov {
        margin-top: 50px;
    }
</style>
<?php
$indice = 0;
$totalapagar = 0;
$totalimporte = 0;
$totalpendiente = 0;
$totalpagado = 0;
while ($rowprov = mysql_fetch_row($rsproveedores)) {
    $codproveedor = $rowprov[37];
    $nomproveedor = $rowprov[1];
    $idproveedor = $rowprov[0];
    $rsfacturas = $facturas->imprimir_facturas($idproveedor, $fechaini, $fechafin, $pagadas);
    if (mysql_num_rows($rsfacturas) > 0) {
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
                        <td style="text-align: center;    width: 100%"><h4>Listado de Facturas de Proveedores</h4></td>
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
                        <th style="width: 11%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Fecha</th>
                        <th style="width: 11%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Factura</th>
                        <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Total Fac.</th>
                        <th style="width: 12%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Pag. a Cta.</th>
                        <th style="width: 11%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Total Pagar</th>
                        <th style="width: 11%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Imp. Pdte</th>
                        <th style="width: 11%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Imp. Pagado</th>
                        <th style="width: 12%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Situación</th>
                        <th style="width: 11%; text-align: center; border: solid 1px #337722; background: #CCFFCC">N. Reg.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sumaimportes = 0;
                    $sumapendiente = 0;
                    $sumapagado = 0;
                    $sumaapagar = 0;
                    while ($row = mysql_fetch_row($rsfacturas)) {
                        ?>
                        <tr>
                            <td style="width: 11%; text-align: center; border: solid 1px #55DD44"><?= implota($row[4]) ?></td>
                            <td style="width: 11%; text-align: center; border: solid 1px #55DD44"><?= $row[2] ?></td>
                            <td style="width: 10%; text-align: right; border: solid 1px #55DD44"><?= number_format($row[13], 2, ',', '.') ?></td>
                            <td style="width: 12%; text-align: right; border: solid 1px #55DD44"><?= number_format($row[44], 2, ',', '.') ?></td>                    
                            <td style="width: 11%; text-align: right; border: solid 1px #55DD44"><?= number_format($row[37], 2, ',', '.') ?></td>
                            <?php
                            $sumaimportes = $sumaimportes + $row[13];
                            $sumaapagar = $sumaapagar + $row[37];
                            if ($row[29] > 0) {
                                $pte = 0;
                                $pagado = $row[37];
                                $sumapagado = $sumapagado + $row[37];
                                $situacion = "F" . $row[29] . "/" . $row[1];
                            } else {
                                $pte = $row[37];
                                $sumapendiente = $sumapendiente + $row[37];
                                $pagado = 0;
                                $situacion = "P";
                            }
                            ?>
                            <td style="width: 11%; text-align: right; border: solid 1px #55DD44"><?= number_format($pte, 2, ',', '.') ?></td>
                            <td style="width: 11%; text-align: right; border: solid 1px #55DD44"><?= number_format($pagado, 2, ',', '.') ?></td>
                            <td style="width: 12%; text-align: center; border: solid 1px #55DD44"><?= $situacion ?></td>
                            <td style="width: 11%; text-align: center; border: solid 1px #55DD44"><?= $row[0] . "/" . $row[1] ?></td>
                        </tr>
                        <?php
                    }
                    $resumen[$indice][2] = $sumaimportes;
                    $resumen[$indice][3] = $sumapendiente;
                    $resumen[$indice][4] = $sumapagado;
                    $resumen[$indice][5] = $sumaapagar;
                    $totalimporte = $totalimporte + $sumaimportes;
                    $totalpendiente = $totalpendiente + $sumapendiente;
                    $totalpagado = $totalpagado + $sumapagado;
                    $totalapagar = $totalapagar + $sumaapagar;
                    ?>
                    <tr>
                        <th style="width: 11%; text-align: right"></th>
                        <th style="width: 11%; text-align: right">Total Prov: </th>
                        <th style="width: 10%; text-align: right"><?= number_format($sumaimportes, 2, ',', '.') ?></th>
                        <th style="width: 12%; text-align: right"></th>
                        <th style="width: 11%; text-align: right"><?= number_format($sumaapagar, 2, ',', '.') ?></th>
                        <th style="width: 11%; text-align: right"><?= number_format($sumapendiente, 2, ',', '.') ?></th>
                        <th style="width: 11%; text-align: right"><?= number_format($sumapagado, 2, ',', '.') ?></th>
                        <th style="width: 12%; text-align: center"></th>
                        <th style="width: 11%; text-align: center"></th>
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
                <td style="text-align: center;    width: 100%"><h4>Resumen de Facturas de Proveedores</h4></td>
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
                <th style="width: 12%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Codigo</th>
                <th style="width: 40%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Proveedor</th>
                <th style="width: 12%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Total Fac.</th>
                <th style="width: 12%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Total Pagar</th>
                <th style="width: 12%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Imp. Pdte</th>
                <th style="width: 12%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Imp. Pagado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 0;
            while ($contador < $indice) {
                ?>
                <tr>
                    <td style="width: 12%; text-align: left; border: solid 1px #55DD44"><?= $resumen[$contador][0] ?></td>
                    <td style="width: 40%; text-align: left; border: solid 1px #55DD44"><?= strtoupper($resumen[$contador][1]) ?></td>
                    <td style="width: 12%; text-align: right; border: solid 1px #55DD44"><?= number_format($resumen[$contador][2], 2, ',', '.') ?></td>
                    <td style="width: 12%; text-align: right; border: solid 1px #55DD44"><?= number_format($resumen[$contador][5], 2, ',', '.') ?></td>                
                    <td style="width: 12%; text-align: right; border: solid 1px #55DD44"><?= number_format($resumen[$contador][3], 2, ',', '.') ?></td>
                    <td style="width: 12%; text-align: right; border: solid 1px #55DD44"><?= number_format($resumen[$contador][4], 2, ',', '.') ?></td>
                </tr>
                <?php
                $contador++;
            }
            ?>
            <tr>
                <th style="width: 12%; text-align: right"></th>
                <th style="width: 40%; text-align: right">Totales: </th>
                <th style="width: 12%; text-align: right"><?= number_format($totalimporte, 2, ',', '.') ?></th>
                <th style="width: 12%; text-align: right"><?= number_format($totalapagar, 2, ',', '.') ?></th>
                <th style="width: 12%; text-align: right"><?= number_format($totalpendiente, 2, ',', '.') ?></th>
                <th style="width: 12%; text-align: right"><?= number_format($totalpagado, 2, ',', '.') ?></th>
            </tr>
        </tbody>
    </table>
    <br>
</page>