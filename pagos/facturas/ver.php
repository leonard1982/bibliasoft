<?php
include ("../seguridad_usuario.inc");
include ("../funciones/fechas.php");
include_once ("../clases/class.facturas.php");
include ("../clases/class.proveedores.php");
include ("../clases/class.formapago.php");
include ("../clases/class.monedas.php");
include ("../clases/class.tipoiva.php");
include_once ("../clases/class.tasasiva.php");
include ("../clases/class.centroscoste.php");

$codigo = $_GET["codigo"];
$ejercicio = $_GET["ejercicio"];

$facturas = new facturas();
$proveedores = new proveedores();
$formapago = new formapago();
$monedas = new monedas();
$tipoiva = new tipoiva();
$tasasiva = new tasasiva();
$centroscoste = new centroscoste();

$rsfacturas = $facturas->select($codigo, $ejercicio);
$resultado = $proveedores->buscar('', '');
$rsfp = $formapago->llenar_combo_formapago();
$rsmonedas = $monedas->llenar_combo_monedas();
$rstipoiva = $tipoiva->llenar_combo_tiposiva();
$rscc = $centroscoste->llenar_combo_centroscoste();
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
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
                    <div id="tituloForm" class="header">VER FACTURA</div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td width="20%">Numero de factura</td>
                                    <td width="28"><input type="text" id="nfactura" name="nfactura" class="cajaMediaR" readonly value="<?php echo $rsfacturas[0] . '/' . $rsfacturas[1] ?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%"></td>
                                    <td width="28"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Ejercicio (*)</td>
                                    <td width="28"><input type="text" class="cajaPequenaR" id="nejercicio" name="nejercicio" value="<?= $rsfacturas[1] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <?php
                                    $hoy = date("d/m/Y");
                                    ?>
                                    <td width="20%">Fecha Factura Prov. (*)</td>
                                    <td width="28%"><input id="afechafactura" type="text" class="cajaPequenaR" NAME="afechafactura" maxlength="10" readonly value="<?= implota($rsfacturas[4]) ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Num. Factura Prov.</td>
                                    <td width="28%"><input NAME="anumfactura" type="text" class="cajaMedia" id="anumfactura" maxlength="10" value="<?= $rsfacturas[2] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <td width="20%">Ref. Factura Prov.</td>
                                    <td width="28%"><input NAME="areffactura" type="text" class="cajaMedia" id="areffactura" maxlength="10" value="<?= $rsfacturas[3] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Descripcion Factura</td>
                                    <td colspan="4"><input NAME="adescfactura" type="text" class="cajaExtraGrande" id="adescfactura" maxlength="150" value="<?= $rsfacturas[5] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td width="20%">Procesada</td>
                                    <td width="28%"><select id="aprocesada" name="aprocesada" class="comboPequeno" disabled>
                                            <?php if ($rsfacturas[8] == 0) { ?><option value="0" selected>No</option><?php } else { ?><option value="0">No</option><?php } ?>
                                            <?php if ($rsfacturas[8] == 1) { ?><option value="1" selected>Si</option><?php } else { ?><option value="1">Si</option><?php } ?>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Centro de Coste</td>
                                    <td width="28%"><select id="ncc" name="ncc" class="comboMedio" disabled>
                                            <option value="">---</option>
                                            <?php while ($rowcc = mysql_fetch_row($rscc)) {
                                                if ($rsfacturas[38] == $rowcc[0]) { ?>
                                                    <option value="<?= $rowcc[0] ?>" selected><?= $rowcc[1] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $rowcc[0] ?>"><?= $rowcc[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                            </table>
                            <fieldset>
                                <legend>Datos proveedor</legend>
                                <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                    <tr>
                                        <td width="20%">Proveedor</td>
                                        <td width="28%"><input type="text" name="anombreproveedor" id="anombreproveedor" class="cajaGrandeR" readonly value="<?= $rsfacturas[32] ?>"></td>
                                        <td width="4%"></td>
                                        <td width="20%"></td>
                                        <td width="28%"></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Contacto</td>
                                        <td width="28%"><input NAME="acontacto" type="text" class="cajaGrande" id="acontacto" maxlength="90" value="<?= $rsfacturas[6] ?>" readonly></td>
                                        <td width="4%"></td>
                                        <td width="20%">Telefono</td>
                                        <td width="28%"><input NAME="atelefono" type="text" class="cajaMedia" id="atelefono" maxlength="20" value="<?= $rsfacturas[7] ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Forma de pago</td>
                                        <td width="28%"><select id="nidfp" name="nidfp" class="comboMedio" disabled>
                                                <option value="">---</option>
                                                <?php
                                                while ($rowf = mysql_fetch_row($rsfp)) {
                                                    if ($rsfacturas[12] == $rowf[0]) {
                                                        ?>
                                                        <option value="<?= $rowf[0] ?>" selected><?= $rowf[1] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowf[0] ?>"><?= $rowf[1] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select></td>
                                        <td width="4%"></td>
                                        <td width="20%">Moneda</td>
                                        <td width="28%"><select id="nidmoneda" name="nidmoneda" class="comboMedio" disabled>
                                                <option value="">---</option>
                                                <?php
                                                while ($rowm = mysql_fetch_row($rsmonedas)) {
                                                    if ($rsfacturas[31] == $rowm[0]) {
                                                        ?>
                                                        <option value="<?= $rowm[0] ?>" selected><?= $rowm[1] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowm[0] ?>"><?= $rowm[1] ?></option> 
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select></td>
                                    </tr> 
                                </table>
                            </fieldset>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td width="20%">Importe Total</td>
                                    <td width="28%"><input NAME="qtotalfacs" type="text" class="cajaMedia" id="qtotalfacs" maxlength="15" value="<?= $rsfacturas[13] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <td>PDF Factura</td>
                                    <?php if (file_exists("./facpdf/" . $rsfacturas[0] . '-' . $rsfacturas[1] . ".pdf")) { ?>
                                        <td><a href="./facpdf/<?= $rsfacturas[0] . '-' . $rsfacturas[1] ?>.pdf" target="_blank"><img src="../img/pdf.png" width="16" height="16" border="0"></a></td>
                                    <?php } else { ?>
                                        <td>Sin factura adjunta</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Observaciones</td>
                                    <td colspan="4"><textarea class="area" name="aobservaciones" id="aobservaciones" readonly><?= $rsfacturas[9] ?></textarea></td>
                                </tr>
                            </table>
                            <fieldset><legend>Datos impuestos</legend>
                                <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                    <tr>
                                        <td width="25%">Base imponible</td>
                                        <td width="25%">Tipo de IGIC</td>
                                        <td width="25%">Tasa de IGIC</td>
                                        <td width="25%">Cuota IGIC</td>
                                    </tr>
                                    <?php $rstipoiva = $tipoiva->llenar_combo_tiposiva(); ?>
                                    <tr>
                                        <td><input NAME="qbimp1" type="text" class="cajaMedia" id="qbimp1" maxlength="12" value="<?= $rsfacturas[14] ?>" readonly></td>
                                        <td><select id="ntipoiva1" name="ntipoiva1" class="comboMedio" disabled>
                                                <option value="">---</option>
                                                <?php
                                                while ($rowtp = mysql_fetch_row($rstipoiva)) {
                                                    if ($rsfacturas[19] == $rowtp[0]) {
                                                        ?>
                                                        <option value="<?= $rowtp[0] ?>" selected><?= $rowtp[1] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowtp[0] ?>"><?= $rowtp[1] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select></td>
                                        <?php $rstasasiva = $tasasiva->llenar_combo_tasasiva($rsfacturas[19]); ?>
                                        <td><select name="tasaiva1" id="tasaiva1" class="combopequeno" disabled>
                                                <option value="">---</option>
                                                <?php
                                                $encontrado = 0;
                                                while ($rowti = mysql_fetch_row($rstasasiva)) {
                                                    if ($rsfacturas[39] == $rowti[2]) {
                                                        ?>
                                                        <option value="<?= $rowti[2] ?>" selected><?= $rowti[2] ?></option>
                                                        <?php
                                                        $encontrado = 1;
                                                    } else {
                                                        ?>
                                                        <option value="<?= $rowti[2] ?>"><?= $rowti[2] ?></option>
                                                        <?php
                                                    }
                                                }
                                                if ($encontrado == 0) {
                                                    ?>
                                                    <option value="<?= $rsfacturas[39] ?>" selected><?= $rsfacturas[39] ?></option>
                                                <?php } ?>
                                            </select></td>
                                        <td><input NAME="qcuotaiva1" type="text" class="cajaMediaR" id="qcuotaiva1" maxlength="12" reandoly value="<?= $rsfacturas[25] ?>"></td>
                                    </tr>
                                    <?php $rstipoiva = $tipoiva->llenar_combo_tiposiva(); ?>
                                    <tr>
                                        <td><input NAME="qbimp2" type="text" class="cajaMedia" id="qbimp2" maxlength="12" value="<?= $rsfacturas[15] ?>" readonly></td>
                                        <td><select id="ntipoiva2" name="ntipoiva2" class="comboMedio" disabled>
                                                <option value="">---</option>
                                                <?php
                                                while ($rowtp2 = mysql_fetch_row($rstipoiva)) {
                                                    if ($rsfacturas[20] == $rowtp2[0]) {
                                                        ?>
                                                        <option value="<?= $rowtp2[0] ?>" selected><?= $rowtp2[1] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowtp2[0] ?>"><?= $rowtp2[1] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select></td>
                                        <?php $rstasasiva2 = $tasasiva->llenar_combo_tasasiva($rsfacturas[20]); ?>
                                        <td><select name="tasaiva2" id="tasaiva2" class="combopequeno" disabled>
                                                <option value="">---</option>
                                                <?php
                                                $encontrado = 0;
                                                while ($rowti2 = mysql_fetch_row($rstasasiva2)) {
                                                    if ($rsfacturas[40] == $rowti2[2]) {
                                                        $encontrado = 1;
                                                        ?>
                                                        <option value="<?= $rowti2[2] ?>" selected><?= $rowti2[2] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowti2[2] ?>"><?= $rowti2[2] ?></option>
                                                        <?php
                                                    }
                                                }
                                                if ($encontrado == 0) {
                                                    ?>
                                                    <option value="<?= $rsfacturas[40] ?>" selected><?= $rsfacturas[40] ?></option>
                                                <?php } ?>
                                            </select></td>
                                        <td><input NAME="qcuotaiva2" type="text" class="cajaMediaR" id="qcuotaiva2" maxlength="12" readonly value="<?= $rsfacturas[26] ?>"></td>
                                    </tr>
                                    <?php $rstipoiva = $tipoiva->llenar_combo_tiposiva(); ?>
                                    <tr>
                                        <td><input NAME="qbimp3" type="text" class="cajaMedia" id="qbimp3" maxlength="12" value="<?= $rsfacturas[16] ?>" readonly></td>
                                        <td><select id="ntipoiva3" name="ntipoiva3" class="comboMedio" disabled>
                                                <option value="">---</option>
                                                <?php
                                                while ($rowtp3 = mysql_fetch_row($rstipoiva)) {
                                                    if ($rsfacturas[21] == $rowtp3[0]) {
                                                        ?>
                                                        <option value="<?= $rowtp3[0] ?>" selected><?= $rowtp3[1] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowtp3[0] ?>"><?= $rowtp3[1] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select></td>
                                        <?php $rstasasiva3 = $tasasiva->llenar_combo_tasasiva($rsfacturas[21]); ?>
                                        <td><select name="tasaiva3" id="tasaiva3" class="combopequeno" disabled>
                                                <option value="">---</option>
                                                <?php
                                                $encontrado = 0;
                                                while ($rowti3 = mysql_fetch_row($rstasasiva3)) {
                                                    if ($rsfacturas[41] == $rowti3[2]) {
                                                        $encontrado = 1;
                                                        ?>
                                                        <option value="<?= $rowti3[2] ?>" selected><?= $rowti3[2] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowti3[2] ?>"><?= $rowti3[2] ?></option>
                                                        <?php
                                                    }
                                                }
                                                if ($encontrado == 0) {
                                                    ?>
                                                    <option value="<?= $rsfacturas[41] ?>" selected><?= $rsfacturas[41] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select></td>
                                        <td><input NAME="qcuotaiva3" type="text" class="cajaMediaR" id="qcuotaiva3" maxlength="12" readonly value="<?= $rsfacturas[27] ?>"></td>
                                    </tr>
<?php $rstipoiva = $tipoiva->llenar_combo_tiposiva(); ?>
                                    <tr>
                                        <td><input NAME="qbimp4" type="text" class="cajaMedia" id="qbimp4" maxlength="12" value="<?= $rsfacturas[17] ?>" readonly></td>
                                        <td><select id="ntipoiva4" name="ntipoiva4" class="comboMedio" disabled>
                                                <option value="">---</option>
                                                <?php
                                                while ($rowtp4 = mysql_fetch_row($rstipoiva)) {
                                                    if ($rsfacturas[22] == $rowtp4[0]) {
                                                        ?>
                                                        <option value="<?= $rowtp4[0] ?>" selected><?= $rowtp4[1] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowtp4[0] ?>"><?= $rowtp4[1] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select></td>
<?php $rstasasiva4 = $tasasiva->llenar_combo_tasasiva($rsfacturas[22]); ?>
                                        <td><select name="tasaiva4" id="tasaiva4" class="combopequeno" disabled>
                                                <option value="">---</option>
                                                <?php
                                                $encontrado = 0;
                                                while ($rowti4 = mysql_fetch_row($rstasasiva4)) {
                                                    if ($rsfacturas[42] == $rowti4[2]) {
                                                        $encontrado = 1;
                                                        ?>
                                                        <option value="<?= $rowti4[2] ?>" selected><?= $rowti4[2] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $rowti4[2] ?>"><?= $rowti4[2] ?></option>
                                                        <?php
                                                    }
                                                }
                                                if ($encontrado == 0) {
                                                    ?>
                                                    <option value="<?= $rsfacturas[42] ?>" selected><?= $rsfacturas[42] ?></option>
<?php } ?>
                                            </select></td>
                                        <td><input NAME="qcuotaiva4" type="text" class="cajaMediaR" id="qcuotaiva4" maxlength="12" readonly value="<?= $rsfacturas[28] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Base Imp. Retencion</td>
                                        <td width="25%"></td>
                                        <td width="25%">% retencion</td>
                                        <td width="25%">Total retencion</td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><input NAME="qbiret" type="text" class="cajaMedia" id="qbiret" maxlength="10" value="<?= $rsfacturas[18] ?>" readonly></td>
                                        <td width="25%"></td>
                                        <td width="25%"><input NAME="qporcret" type="text" class="cajaPequena" id="qporcret" maxlength="10" value="<?= $rsfacturas[24] ?>" readonly></td>
                                        <td width="25%"><input NAME="qtotalret" type="text" class="cajaMediaR" id="qtotalret" maxlength="10" readonly value="<?= $rsfacturas[23] ?>"></td></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Pagado a cuenta</td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><input NAME="pcuenta" type="text" class="cajaMedia" id="pcuenta" maxlength="10" readonly value="<?= $rsfacturas[43] ?>"></td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                    </tr>
                                    <tr>
                                        <td width="25%"></td>
                                        <td width="25%"></td>
                                        <td width="25%">Importe a Pagar</td>
                                        <td width="25%"><input NAME="atotalcon" type="text" class="cajaMediaR" id="atotalcon" maxlength="10" readonly value="<?= $rsfacturas[37] ?>"></td></td>
                                    </tr>
                            </fieldset>				
                        </table>
                        <hr>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor = cursor">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
