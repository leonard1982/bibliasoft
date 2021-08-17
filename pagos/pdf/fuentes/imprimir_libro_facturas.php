<?php
include ("../../clases/class.facturas.php");
include ("../../funciones/fechas.php");

$facturas = new facturas;

$fechadesde = explota($_GET["fechaini"]);
$fechahasta = explota($_GET["fechafin"]);

$rsfacturas = $facturas->imprimir_libro_facturas($fechadesde, $fechahasta);
?>
<page backtop="10mm" backbottom="10mm" backleft="2mm" backright="2mm" orientation="paysage">
    <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 33%">Desde <?= implota($fechadesde) ?> hasta <?= implota($fechahasta) ?></td>
                <td style="text-align: center;    width: 34%">LIBRO DE REGISTRO DE FACTURAS</td>
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
                <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">N. Reg.</th>
                <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Cod. Prov.</th>
                <th style="width: 30%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Nom. Prov.</th>
                <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Fecha Fact.</th>
                <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">N. Fact.</th>
                <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Total Fac.</th>
                <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Pag. Cta.</th>
                <th style="width: 10%; text-align: center; border: solid 1px #337722; background: #CCFFCC">Tot. Pagar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalfac = 0;
            $totalpag = 0;
            $totalcta = 0;
            while ($row = mysql_fetch_row($rsfacturas)) {
                ?>
                <tr>
                    <td style="width: 10%; text-align: center; border: solid 1px #55DD44"><?= $row[0] . "/" . $row[1] ?></td>
                    <td style="width: 10%; text-align: center; border: solid 1px #55DD44"><?= strtoupper($row[11]) ?></td>
                    <td style="width: 30%; text-align: left; border: solid 1px #55DD44"><?= strtoupper($row[7]) ?></td>
                    <td style="width: 10%; text-align: center; border: solid 1px #55DD44"><?= implota($row[3]) ?></td>
                    <td style="width: 10%; text-align: left; border: solid 1px #55DD44"><?= strtoupper($row[2]) ?></td>
                    <td style="width: 10%; text-align: right; border: solid 1px #55DD44"><?= number_format($row[6], 2, ',', '.') ?></td>
                    <td style="width: 10%; text-align: right; border: solid 1px #55DD44"><?= number_format($row[10], 2, ',', '.') ?></td>
                    <td style="width: 10%; text-align: right; border: solid 1px #55DD44"><?= number_format($row[9], 2, ',', '.') ?></td>
                </tr>
                <?php
                $totalfac = $totalfac + $row[6];
                $totalpag = $totalpag + $row[9];
                $totalcta = $totalcta + $row[10];
            }
            ?>
            <tr>
                <td style="width: 10%; text-align: center; border: solid 1px #55DD44"></td>
                <td style="width: 10%; text-align: center; border: solid 1px #55DD44"></td>
                <td style="width: 30%; text-align: left; border: solid 1px #55DD44"></td>
                <td style="width: 10%; text-align: center; border: solid 1px #55DD44"></td>
                <td style="width: 10%; text-align: left; border: solid 1px #55DD44">TOTALES</td>
                <td style="width: 10%; text-align: right; border: solid 1px #55DD44"><?= number_format($totalfac, 2, ',', '.') ?></td>
                <td style="width: 10%; text-align: right; border: solid 1px #55DD44"><?= number_format($totalcta, 2, ',', '.') ?></td>
                <td style="width: 10%; text-align: right; border: solid 1px #55DD44"><?= number_format($totalpag, 2, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>
    <br>
</page>