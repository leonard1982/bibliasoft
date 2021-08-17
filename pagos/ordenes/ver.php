<?php
include ("../seguridad_usuario.inc");
include ("../funciones/fechas.php");
include_once ("../clases/class.ordenes.php");
include ("../clases/class.proveedores.php");
include ("../clases/class.formapago.php");
include ("../clases/class.monedas.php");
include ("../clases/class.ejercicios.php");
include ("../clases/class.facturas.php");
include ("../clases/class.vencimientos.php");

$codigo = $_GET["codigo"];
$ejercicio = $_GET["ejercicio"];

$ordenes = new ordenes();
$proveedores = new proveedores();
$formapago = new formapago();
$monedas = new monedas();
$ejercicios = new ejercicios();
$facturas = new facturas();
$vencimientos = new vencimientos();

$rsordenes = $ordenes->select($codigo, $ejercicio);
$rsfp = $formapago->llenar_combo_formapago();
$rsmonedas = $monedas->llenar_combo_monedas();
$rsejercicios = $ejercicios->ejercicio_activo();
$rsfacturas = $facturas->listar_facturas_procesadas_ordenpago($codigo, $ejercicio);
$rsvencimientos = $vencimientos->listar($codigo, $ejercicio);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <style>
            .mensaje {
                background-color: #666666;
                font-family: helvetica;
                font-size:8pt;
                color:#fff;
                text-align:center;
                font-weight:bold;
                height:20px;
                vertical-align:middle;
                text-transform:uppercase;
            }
        </style>
        <script language="javascript">

            function aceptar() {
                location.href = "index.php";
            }

            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor = 'hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor = 'pointer';
            }

        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">VER ORDEN DE PAGO</div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                <td width="20%">Num. Orden Pago</td>
                                <td width="28"><input type="text" id="nejercicio" name="nejercicio" class="cajaPequenaR" value="<?= $rsordenes[0] . '/' . $rsordenes[1] ?>" readonly></td>
                                <td width="4%"></td>
                                <td width="20%">Fecha Orden Pago (*)</td>
                                <td width="28%"><input id="afechaorden" type="text" class="cajaPequenaR" NAME="afechaorden" maxlength="10" readonly value="<?= implota($rsordenes[3]) ?>"></td>
                            </tr>
                            <tr>
                                <td width="20%">Importe</td>
                                <td width="28%"><input NAME="aimporte" type="text" class="cajaMedia" id="aimporte" maxlength="12" readonly value="<?= $rsordenes[4] ?>"></td>
                                <td width="4%"></td>
                                <td width="20%">Referencia</td>
                                <td width="28%"><input NAME="areferencia" type="text" class="cajaMedia" id="areferencia" maxlength="12" readonly value="<?= $rsordenes[5] ?>"></td>
                            </tr>
                            <tr>
                                <td width="20%">Importe pagado</td>
                                <td width="28%"><input NAME="importepagado" type="text" class="cajaMediaR" id="importepagado" maxlength="12" readonly value="<?= $rsordenes[26] ?>"></td>
                                <td width="4%"></td>
                                <td width="20%">Importe pendiente</td>
                                <td width="28%"><input NAME="importependiente" type="text" class="cajaMediaR" id="importependiente" maxlength="12" readonly value="<?= $rsordenes[27] ?>"></td>
                            </tr>
                            <tr>
                                <td width="20%">Proveedor</td>
                                <td colspan="2"><input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly value="<?= $rsordenes[13] ?>"></td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td>Observaciones</td>
                                <td colspan="4"><textarea class="area" name="aobservaciones" id="aobservaciones" readonly><?= $rsordenes[7] ?></textarea></td>
                            </tr>
                            <tr>
                                <td width="20%">Situacion carga de pago</td>
                                <td width="28%"><select id="asituacion" name="asituacion" class="comboMedio" disabled>
                                        <?php if ($rsordenes[12] == 0) { ?><option value="0" selected>Sin Imprimir</option><?php } else { ?><option value="0">Sin Pagar</option><?php } ?>
                                        <?php if ($rsordenes[12] == 1) { ?><option value="1" selected>Impresa</option><?php } else { ?><option value="1">Pagada</option><?php } ?>
                                    </select></td>
                                <td width="4%"></td>
                                <td width="20%">Situacion</td>
                                <td width="28%"><select name="situacion" id="situacion" class="comboMedio" disabled>
                                        <?php if ($rsordenes[28] == 0) { ?><option value="0" selected>Pendiente</option><?php } else { ?><option value="0">Pendiente</option><?php } ?>
                                        <?php if ($rsordenes[28] == 1) { ?><option value="1" selected>Facturada</option><?php } else { ?><option value="1">Facturada</option><?php } ?>
                                    </select>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="20%">Forma de pago</td>
                                <td width="28%"><input type="text" name="fp" id="fp" class="cajaPequena" value="<?=$rsordenes[29]?>"</td>
                                <td width="4%"></td>
                                <td width="20%">Moneda</td>
                                <td width="28%"><select id="nidmoneda" name="nidmoneda" class="comboMedio" disabled>
                                        <option value="">---</option>
                                        <?php while ($rowm = mysql_fetch_row($rsmonedas)) {
                                            if ($rowm[0] == $rsordenes[18]) { ?>
                                                <option value="<?= $rowm[0] ?>" selected><?= $rowm[1] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $rowm[0] ?>"><?= $rowm[1] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td width="20%">Numero Facturas</td>
                                <td width="28%"><input NAME="anumfacturas" type="text" class="cajaPequena" id="anumfacturas" maxlength="12" readonly value="<?= $rsordenes[10] ?>"></td>
                                <td width="4%"></td>
                                <td width="20%">Numero vencimientos</td>
                                <td width="28%"><input NAME="anumvencimientos" type="text" class="cajaPequena" id="anumvencimientos" maxlength="12" readonly value="<?= $rsordenes[11] ?>"></td>
                            </tr>
                        </table>
                        <fieldset><legend>Vencimientos</legend>
                            <div id="lineas_ven">
                                <table width="100%" border="0">
                                    <tr class="mensaje">
                                        <td width="10%">Codigo</td>
                                        <td width="10%">Fecha</td>
                                        <td width="10%">Importe</td>
                                        <td width="66%">Forma de pago</td>
                                        <td width="4%"></td>
                                    </tr>
                                    <?php
                                    while ($rowv = mysql_fetch_row($rsvencimientos)) {
                                        echo "<tr><td align='center'><input type='text' class='cajaPequenaR' value='" . $rowv[1] . "/" . $rowv[0] . "' readonly></td>";
                                        echo "<td align='center'><input type='text' class='cajaPequenaR' value='" . implota($rowv[4]) . "' readonly></td>";
                                        echo "<td align='center'><input type='text' class='cajaPequenaR' value='" . $rowv[6] . "' readonly></td>";
                                        echo "<td align='center'><input type='text' class='cajaExtraGrandeRFP' value='" . $rowv[12] . "' readonly></td>";
                                        if (($rowv[7] == 9) || ($rowv[7] == 10)) {
                                            echo "<td align='center'><img src='../img/ver.png' width='16px' heigh='16px' border=0 title='Ver transferencia' onclick='mostrar_transferencia(" . $rowv[1] . "," . $rowv[0] . ")'></td>";
                                        } else {
                                            echo "<td></td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </fieldset>
                        <fieldset><legend>Facturas</legend>
                            <div id="lineas_doc">
                                <form class="formulario" id="formulario" method="post" action="guardar_facturas.php">
                                    <table width="100%" border="0">
                                        <tr class="mensaje">
                                            <td width="20%">N. Registro</td>
                                            <td width="20%">N. Factura Prov.</td>
                                            <td width="15%">Fecha</td>
                                            <td width="20%">Total Fact.</td>
                                            <td width="20%">Importe a pagar</td>
                                            <td width="5%"></td>
                                        </tr>
                                        <?php while ($row = mysql_fetch_row($rsfacturas)) { ?>
                                            <tr>
                                                <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[0] . '/' . $row[1] ?>" readonly>
                                                <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[2] ?>" readonly></td>
                                                <td align='center'><input type="text" class="cajaPequenaR" value="<?= implota($row[3]) ?>" readonly></td>
                                                <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[4] ?>" readonly></td>
                                                <td align='center'><input type="text" class="cajaPequenaR" value="<?= $row[5] ?>" readonly></td>    
                                                <?php if (file_exists("../facturas/facpdf/" . $row[0] . '-' . $row[1] . ".pdf")) { ?>
                                                    <td><a href="../facturas/facpdf/<?= $row[0] . '-' . $row[1] ?>.pdf" target="_blank"><img src="../img/pdf.png" width="16" height="16" border="0"></a></td>
                                                <?php } else { ?>
                                                    <td></td>
                                                <?php } ?>
                                            <input type="hidden" name="idpago" id="idpago" value="<?= $idpago ?>">
                                            </tr>                                
                                        <?php } ?>
                                    </table>
                                </form>
                            </div>
                        </fieldset>
                        <?php
                        $rsordenes = $ordenes->listar_doc($codigo, $ejercicio);
                        ?>
                        <fieldset>
                            <legend>Documentos</legend>
                            <table width="100%" border="0">
                                <tr class="mensaje">
                                    <td width="70%">Denominacion</td>
                                    <td width="30%">Archivo</td>
                                </tr>
                                <?php
                                while ($rowdoc = mysql_fetch_row($rsordenes)) {
                                    echo "<tr><td><input type='text' class='cajaExtraGrandeR' value='" . $rowdoc[1] . "' readonly></td><td align='center'><a href='./ordenpdf/" . $rowdoc[0] . ".pdf' target='_blank'><img src='../img/pdf.png' border='0' width='16' height='16'></td></tr>";
                                }
                                ?>
                            </table>
                        </fieldset>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor = cursor">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
