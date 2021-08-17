<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.proveedores.php");

$proveedores = new proveedores();

$codigo = $_GET["codigo"];

$rsproveedores = $proveedores->select($codigo);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script language="javascript">
		
            function aceptar() {
                location.href="index.php";
            }
		
            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor='hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor='pointer';
            }
		
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">VER PROVEEDOR</div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                    <td width="20%">Nombre (*)</td>
                                    <td colspan="4"><input NAME="Anombre" type="text" class="cajaExtraGrande" id="nombre" maxlength="200" value="<?= $rsproveedores[1] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nombre Alternativo</td>
                                    <td colspan="4"><input NAME="anombrealt" type="text" class="cajaExtraGrande" id="anombrealt" maxlength="200"  value="<?= $rsproveedores[2] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td width="20%">CIF (*)</td>
                                    <td width="28%"><input NAME="Acif" type="text" class="cajaMedia" id="acif" maxlength="15"  value="<?= $rsproveedores[3] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <td width="20%">Cod. Proveedor</td>
                                    <td width="28%"><input NAME="acodprov" type="text" class="cajaMedia" id="acodprov" maxlength="12" value="<?= $rsproveedores[37] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Codicli</td>
                                    <td colspan="4"><input NAME="acodicli" type="text" class="cajaGrande" id="acodicli" maxlength="30" value="<?= $rsproveedores[4] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td width="20%">Entidad Bancaria</td>
                                    <td width="28%"><input name="entidad" id="entidad" class="cajaGrande" readonly value="<?= $rsproveedores[8]?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Sucursal</td>
                                    <td width="28%"><input name="sucursal" id="sucursal" class="cajaGrande" readonly value="<?= $rsproveedores[10]?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">IBAN</td>
                                    <td width="28%"><input NAME="aiban" type="text" class="cajaMedia" id="aiban" maxlength="24" value="<?= $rsproveedores[11] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <td width="20%">BIC</td>
                                    <td width="28%"><input NAME="abic" type="text" class="cajaMedia" id="abic" maxlength="12" value="<?= $rsproveedores[12] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td width="20%">Digito Control</td>
                                    <td width="28%"><input NAME="adc" type="text" class="cajaPequena" id="adc" maxlength="2" value="<?= $rsproveedores[13] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <td width="20%">Num. Cuenta</td>
                                    <td width="28%"><input NAME="acuenta" type="text" class="cajaMedia" id="acuenta" maxlength="10" value="<?= $rsproveedores[14] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Observaciones</td>
                                    <td colspan="4"><textarea class="area" name="acommentproveedor" id="acommentproveedor" readonly><?= $rsproveedores[15] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Direccion</td>
                                    <td colspan="4"><input NAME="adireccion" type="text" class="cajaExtraGrande" id="adireccion" maxlength="250" value="<?= $rsproveedores[16] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td width="20%">Pais</td>
                                    <td width="28%"><input name="idpais" id="idpais" readonly class="cajaMedia" value="<?= $rsproveedores[20] ?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Provincia</td>
                                    <td width="28%"><input name="idprovincia" id="idprovincia" readonly class="cajaMedia" value="<?= $rsproveedores[21] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Poblacion</td>
                                    <td width="28%"><input name="idpoblacion" id="idpoblacion" readonly class="cajaMedia" value="<?= $rsproveedores[22] ?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Codigo Postal</td>
                                    <td width="28%"><input NAME="acpproveedor" type="text" class="cajaPequena" id="acpproveedor" maxlength="5" value="<?= $rsproveedores[23] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td width="20%">Telefono</td>
                                    <td width="28%"><input NAME="atelefono" type="text" class="cajaMedia" id="atelefono" maxlength="50" value="<?= $rsproveedores[24] ?>" readonly></td>
                                    <td width="4%"></td>
                                    <td width="20%">Fax</td>
                                    <td width="28%"><input NAME="afax" type="text" class="cajaMedia" id="afax" maxlength="50" value="<?= $rsproveedores[25] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Correo electronico</td>
                                    <td colspan="4"><input NAME="acorreo" type="text" class="cajaExtraGrande" id="acorreo" maxlength="100" value="<?= $rsproveedores[26] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Contacto</td>
                                    <td colspan="4"><input NAME="acontacto" type="text" class="cajaExtraGrande" id="acorpproveedor" maxlength="200" value="<?= $rsproveedores[27] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>URL</td>
                                    <td colspan="4"><input NAME="aurlproveedor" type="text" class="cajaExtraGrande" id="aurlproveedor" maxlength="100" value="<?= $rsproveedores[28] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Clave web</td>
                                    <td colspan="4"><input NAME="aclavewebproveedor" type="text" class="cajaExtraGrande" id="aclavewebproveedor" maxlength="100" value="<?= $rsproveedores[29] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td width="20%">Rec. Equivalencia</td>
                                    <td width="28%"><select name="arecargo" id="arecargo" class="comboPequeno" value="<?= $rsproveedores[30] ?>" disabled>
<?php if ($rsproveedores[30] == 0) { ?><option value="0" selected>No</option><?php } else { ?><option value="0">No</option><?php } ?>
                                            <?php if ($rsproveedores[30] == 1) { ?><option value="1" selected>Si</option><?php } else { ?><option value="1">Si</option><?php } ?>
                                        </select>
                                    </td>
                                    <td width="4%"></td>
                                    <td width="20%">IRPF</td>
                                    <td width="28%"><input NAME="nirpfproveedor" type="text" class="cajaPequena" id="nirpfproveedor" maxlength="10" value="<?= $rsproveedores[31] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td width="20%">Forma de pago</td>
                                    <td width="28%"><input id="idfp" name="idfp" class="cajaMedia" readonly value="<?=$rsproveedores[33]?>"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Moneda</td>
                                    <td width="28%"><input id="idmoneda" name="idmoneda" class="cajaMedia" readonly value="<?=$rsproveedores[36]?>"></td>
                                </tr>
                                <tr>
                                    <td>Regimen fiscal</td>
                                    <td colspan="4"><input NAME="aregfiscal" type="text" class="cajaGrande" id="aregfiscal" maxlength="50" value="<?= $rsproveedores[34] ?>" readonly></td>
                                </tr>					
                        </table>
                        <hr>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
