<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.proveedores.php");
include ("../clases/class.entidades.php");
include ("../clases/class.paises.php");
include ("../clases/class.monedas.php");
include ("../clases/class.formapago.php");
include ("../clases/class.sucursales.php");
include ("../clases/class.provincias.php");
include ("../clases/class.poblaciones.php");

$codigo = $_GET["codigo"];

$proveedores = new proveedores();
$entidades = new entidades();
$paises = new paises();
$monedas = new monedas();
$formapago = new formapago();
$sucursales = new sucursales();
$provincias = new provincias();
$poblaciones = new poblaciones();

$rsproveedores = $proveedores->select($codigo);
$rsentidades = $entidades->llenar_combo_entidades();
$rspaises = $paises->llenar_combo_paises();
$rsmonedas = $monedas->llenar_combo_monedas();
$rsfp = $formapago->llenar_combo_formapago();
$rssucursales = $sucursales->llenar_combo_entidades_por_sucursal($rsproveedores[5]);
$rsprovincias = $provincias->llenar_combo_provincias_por_pais($rsproveedores[17]);
$rspoblaciones = $poblaciones->llenar_combo_poblaciones_por_provincias($rsproveedores[18]);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script type="text/javascript" src="../funciones/validar.js"></script>
        <script language="javascript">

            function cancelar() {
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

            function limpiar() {
                document.getElementById("formulario").reset();
            }
            
            function formatear(valor) {
                var valor = valor.replace(",",".");
                document.getElementById("rirpfproveedor").value=valor;	
            }
            
             $(document).ready(function() {
                // Parametros para el combo
                $("#nidpais").change(function () {
                    $("#nidpais option:selected").each(function () {
                        elegido=$(this).val();
                        $.post("obtener_provincias.php", { elegido: elegido }, function(data){
                            $("#nidprovincia").html(data);
                        });     
                    });
                });        
                $("#nidprovincia").change(function () {
                    $("#nidprovincia option:selected").each(function () {
                        elegido2=$(this).val();
                        $.post("obtener_poblaciones.php", { elegido2: elegido2 }, function(data){
                            $("#nidpoblacion").html(data);
                        });     
                    });
                });
                $("#nidentidad").change(function () {
                    $("#nidentidad option:selected").each(function () {
                        elegido3=$(this).val();
                        $.post("obtener_sucursales.php", { elegido3: elegido3 }, function(data){
                            $("#nidsucursal").html(data);
                        });     
                    });
                });
            });

        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">MODIFICAR PROVEEDOR</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php" enctype="multipart/form-data">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="5"><ul id="lista-errores"></ul></td>
                                </tr>		
                                <tr>
                                    <td width="20%">Nombre</td>
                                    <td colspan="4"><input NAME="Anombre" type="text" class="cajaExtraGrandeR" id="nombre" maxlength="200" value="<?= $rsproveedores[1] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nombre Alternativo</td>
                                    <td colspan="4"><input NAME="anombrealt" type="text" class="cajaExtraGrande" id="anombrealt" maxlength="200"  value="<?= $rsproveedores[2] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">CIF</td>
                                    <td width="28%"><input NAME="Acif" type="text" class="cajaMediaR" id="acif" maxlength="15"  value="<?= $rsproveedores[3] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <td width="20%">Cod. Proveedor</td>
                                    <td width="28%"><input NAME="acodprov" type="text" class="cajaMedia" id="acodprov" maxlength="12" value="<?= $rsproveedores[37] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Codicli</td>
                                    <td colspan="4"><input NAME="acodicli" type="text" class="cajaGrande" id="acodicli" maxlength="30" value="<?= $rsproveedores[4] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Entidad Bancaria</td>
                                    <td width="28%"><select id="nidentidad" name="nidentidad" class="comboMedio">
                                            <option value="">---</option>
                                            <?php
                                            while ($rowe = mysql_fetch_row($rsentidades)) {
                                                if ($rowe[0] == $rsproveedores[5]) {
                                                    ?>
                                                    <option value="<?= $rowe[0] ?>" selected><?= $rowe[1] ?> [<?= $rowe[2] ?>]</option>
                                                <?php } else { ?>
                                                    <option value="<?= $rowe[0] ?>"><?= $rowe[1] ?> [<?= $rowe[2] ?>]</option>
                                                <?php }
                                            }
                                            ?>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Sucursal</td>
                                    <td width="28%"><select id="nidsucursal" name="nidsucursal" class="comboMedio">
                                            <?php
                                            while ($rowsuc = mysql_fetch_row($rssucursales)) {
                                                if ($rowsuc[0] == $rssucursales[6]) {
                                                    ?>
                                                    <option value="<?= $rowsuc[0] ?>" selected><?= $rowsuc[1] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $rowsuc[0] ?>"><?= $rowsuc[1] ?></option>
    <?php }
}
?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td width="20%">IBAN</td>
                                    <td width="28%"><input NAME="aiban" type="text" class="cajaGrande" id="aiban" maxlength="34" value="<?= $rsproveedores[11] ?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%">BIC</td>
                                    <td width="28%"><input NAME="abic" type="text" class="cajaMedia" id="abic" maxlength="12" value="<?= $rsproveedores[12] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Digito Control</td>
                                    <td width="28%"><input NAME="adc" type="text" class="cajaPequena" id="adc" maxlength="2" value="<?= $rsproveedores[13] ?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Num. Cuenta</td>
                                    <td width="28%"><input NAME="acuenta" type="text" class="cajaMedia" id="acuenta" maxlength="10" value="<?= $rsproveedores[14] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Observaciones</td>
                                    <td colspan="4"><textarea class="area" name="acommentproveedor" id="acommentproveedor"><?= $rsproveedores[15] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Direccion</td>
                                    <td colspan="4"><input NAME="adireccion" type="text" class="cajaExtraGrande" id="adireccion" maxlength="250" value="<?= $rsproveedores[16] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Pais</td>
                                    <td width="28%"><select id="nidpais" name="nidpais" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowpa = mysql_fetch_row($rspaises)) {
                                                if ($rowpa[0] == $rsproveedores[17]) {
                                                    ?>
                                                    <option value="<?php echo $rowpa[0] ?>" selected><?= $rowpa[1] ?></option>
    <?php } else { ?>
                                                    <option value="<?php echo $rowpa[0] ?>"><?= $rowpa[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Provincia</td>
                                    <td width="28%"><select id="nidprovincia" name="nidprovincia" class="comboMedio">
                                            <option value="0">---</option>
<?php while ($rowprov = mysql_fetch_row($rsprovincias)) {
    if ($rowprov[0] == $rsproveedores[18]) {
        ?>
                                                    <option value="<?php echo $rowprov[0] ?>" selected><?= $rowprov[1] ?></option>
    <?php } else { ?>
                                                    <option value="<?php echo $rowprov[0] ?>"><?= $rowprov[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td width="20%">Poblacion</td>
                                    <td width="28%"><select id="nidpoblacion" name="nidpoblacion" class="comboMedio">
                                            <option value="0">---</option>
<?php while ($rowpob = mysql_fetch_row($rspoblaciones)) {
    if ($rowpob[0] == $rsproveedores[19]) {
        ?>
                                                    <option value="<?php echo $rowpob[0] ?>" selected><?= $rowpob[1] ?></option>
    <?php } else { ?>
                                                    <option value="<?php echo $rowpob[0] ?>"><?= $rowpob[1] ?></option>
    <?php }
} ?>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Codigo Postal</td>
                                    <td width="28%"><input NAME="acpproveedor" type="text" class="cajaPequena" id="acpproveedor" maxlength="5" value="<?= $rsproveedores[23] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Telefono</td>
                                    <td width="28%"><input NAME="atelefono" type="text" class="cajaMedia" id="atelefono" maxlength="50" value="<?= $rsproveedores[24] ?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Fax</td>
                                    <td width="28%"><input NAME="afax" type="text" class="cajaMedia" id="afax" maxlength="50" value="<?= $rsproveedores[25] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Correo electronico</td>
                                    <td colspan="4"><input NAME="acorreo" type="text" class="cajaExtraGrande" id="acorreo" maxlength="100" value="<?= $rsproveedores[26] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Contacto</td>
                                    <td colspan="4"><input NAME="acontacto" type="text" class="cajaExtraGrande" id="acorpproveedor" maxlength="200" value="<?= $rsproveedores[27] ?>"></td>
                                </tr>
                                <tr>
                                    <td>URL</td>
                                    <td colspan="4"><input NAME="aurlproveedor" type="text" class="cajaExtraGrande" id="aurlproveedor" maxlength="100" value="<?= $rsproveedores[28] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Clave web</td>
                                    <td colspan="4"><input NAME="aclavewebproveedor" type="text" class="cajaExtraGrande" id="aclavewebproveedor" maxlength="100" value="<?= $rsproveedores[29] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Rec. Equivalencia</td>
                                    <td width="28%"><select name="arecargo" id="arecargo" class="comboPequeno" value="<?= $rsproveedores[30] ?>">
<?php if ($rsproveedores[30] == 0) { ?><option value="0" selected>No</option><?php } else { ?><option value="0">No</option><?php } ?>
                                            <?php if ($rsproveedores[30] == 1) { ?><option value="1" selected>Si</option><?php } else { ?><option value="1">Si</option><?php } ?>
                                        </select>
                                    </td>
                                    <td width="4%"></td>
                                    <td width="20%">IRPF</td>
                                    <td width="28%"><input NAME="rirpfproveedor" type="text" class="cajaPequena" id="rirpfproveedor" maxlength="10" value="<?= $rsproveedores[31] ?>" onblur="javascript:formatear(this.value)"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Forma de pago</td>
                                    <td width="28%"><select id="nidfp" name="nidfp" class="comboMedio">
                                            <option value="">---</option>
                                            <?php while ($rowf = mysql_fetch_row($rsfp)) { 
                                                if ($rowf[0]==$rsproveedores[32]) { ?>
                                                <option value="<?= $rowf[0] ?>" selected><?= $rowf[1] ?></option>
                                                <?php } else { ?>
                                                <option value="<?= $rowf[0] ?>"><?= $rowf[1] ?></option>
                                            <?php } } ?>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Moneda</td>
                                    <td width="28%"><select id="nidmoneda" name="nidmoneda" class="comboMedio">
                                            <option value="">---</option>
<?php while ($rowm = mysql_fetch_row($rsmonedas)) { 
        if ($rowm[0]==$rsproveedores[35]) {?>
                                                <option value="<?= $rowm[0] ?>" selected><?= $rowm[1] ?></option>
        <?php } else { ?>
                                                <option value="<?= $rowm[0] ?>"><?= $rowm[1] ?></option>
<?php } } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Regimen fiscal</td>
                                    <td colspan="4"><input NAME="aregfiscal" type="text" class="cajaGrande" id="aregfiscal" maxlength="50" value="<?= $rsproveedores[34] ?>"></td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario, true)" border="1" onMouseOver="style.cursor = cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor = cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor = cursor">
                                <input id="id" name="id" value="<?= $codigo ?>" type="hidden">
                                <input id="accion" name="accion" value="modificar" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
