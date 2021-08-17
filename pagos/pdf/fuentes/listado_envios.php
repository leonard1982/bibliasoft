<?php
include ("../../clases/class.envios.php");
include ("../../funciones/fechas.php");

$envios = new envios;

$idproveedor = $_GET["idproveedor"];
$fechadesde = explota($_GET["fechadesde"]);
$fechahasta = explota($_GET["fechahasta"]);

$rsenvios=$envios->buscar($idproveedor, $fechadesde, $fechahasta);
?>
<page backtop="10mm" backbottom="10mm" backleft="2mm" backright="2mm" orientation="paysage">
    <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 33%">Desde <?=implota($fechadesde)?> hasta <?=implota($fechahasta)?></td>
                <td style="text-align: center;    width: 34%">ENVIO CARTAS CERTIFICADAS</td>
                <td style="text-align: right;    width: 33%">Pagina [[page_cu]]/[[page_nb]]</td>
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
    <br>
    <table style="width: 100%;border: solid 1px #5544DD; border-collapse: collapse" align="center">
        <thead>
            <tr>
                <th style="width: 22%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Nombre</th>
                <th style="width: 22%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Direccion</th>
                <th style="width: 5%; text-align: center; border: solid 1px #337722; background: #CCFFCC">C.P.</th>
                <th style="width: 18%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Poblacion</th>
                <th style="width: 18%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Provincia</th>
                <th style="width: 15%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Cod. Envío</th>
            </tr>
        </thead>
        <tbody>
<?php
    while ($row = mysql_fetch_row($rsenvios)) {
?>
            <tr>
                <td style="height: 30px; width: 22%; text-align: left; border: solid 1px #55DD44"><?=strtoupper($row[4])?></td>
                <td style="width: 22%; text-align: left; border: solid 1px #55DD44"><?=strtoupper($row[5])?></td>
                <td style="width: 5%; text-align: left; border: solid 1px #55DD44"><?=strtoupper($row[3])?></td>
                <td style="width: 18%; text-align: left; border: solid 1px #55DD44"><?=strtoupper($row[7])?></td>
                <td style="width: 18%; text-align: left; border: solid 1px #55DD44"><?=strtoupper($row[6])?></td>
                <td style="width: 15%; text-align: left; border: solid 1px #55DD44"><?=strtoupper($row[9])?></td>
            </tr>
<?php
    }
?>
        </tbody>
    </table>
    <br>
</page>