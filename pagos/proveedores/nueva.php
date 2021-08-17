<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.entidades.php");
include ("../clases/class.paises.php");
include ("../clases/class.monedas.php");
include ("../clases/class.formapago.php");

$entidades = new entidades();
$paises = new paises();
$monedas = new monedas();
$formapago = new formapago();

$rsentidades = $entidades->llenar_combo_entidades();
$rspaises = $paises->llenar_combo_paises();
$rsmonedas = $monedas->llenar_combo_monedas();
$rsfp = $formapago->llenar_combo_formapago();
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../funciones/validar.js"></script>
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script language="javascript">
		
            function cancelar() {
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
		
            function limpiar() {
                document.getElementById("formulario").reset();
            }
            
            function formatear(valor) {
                var valor = valor.replace(",",".");
                document.getElementById("rirpfproveedor").value=valor;	
            }
            
            function verificar() {
                $.post('comprobar_cif.php', $('#formulario').serialize(), function(msg) {
                    eval('var resp=' + msg);
                    if (resp.estado == 0) {
                        $("#error").html(resp.tx).fadeIn(1500);
                        document.getElementById("Acif").value="";
                        document.getElementById("Acif").focus();
                    } else {
                        $("#error").html('').fadeIn(1500);
                    }
                });
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
                    <div id="tituloForm" class="header">INSERTAR PROVEEDOR</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="5"><ul id="lista-errores"></ul></td>
                                </tr>		
                                <tr>
                                    <td width="20%">Nombre (*)</td>
                                    <td colspan="4"><input NAME="Anombre" type="text" class="cajaExtraGrande" id="nombre" maxlength="200"></td>
                                </tr>
                                <tr>
                                    <td>Nombre Alternativo</td>
                                    <td colspan="4"><input NAME="anombrealt" type="text" class="cajaExtraGrande" id="anombrealt" maxlength="200"></td>
                                </tr>
                                <tr>
                                    <td width="20%">CIF (*)</td>
                                    <td width="28%"><input NAME="Acif" type="text" class="cajaMedia" id="Acif" maxlength="15" onblur="javascript:verificar()"><div id="error"><p></p></div></td>
                                    <td width="4%"></td>
                                    <td width="20%">Cod. Proveedor</td>
                                    <td width="28%"><input NAME="acodprov" type="text" class="cajaMedia" id="acodprov" maxlength="12"></td>
                                </tr>
                                <tr>
                                    <td>Codicli</td>
                                    <td colspan="4"><input NAME="acodicli" type="text" class="cajaGrande" id="acodicli" maxlength="30"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Entidad Bancaria</td>
                                    <td width="28%"><select id="nidentidad" name="nidentidad" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowe = mysql_fetch_row($rsentidades)) { ?>
                                                    <option value="<?=$rowe[0] ?>"><?=$rowe[1]?> [<?=$rowe[2]?>]</option>
                                                <?php } ?>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Sucursal</td>
                                    <td width="28%"><select id="nidsucursal" name="nidsucursal" class="comboMedio">
                                            <option value="0">---</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td width="20%">IBAN</td>
                                    <td width="28%"><input NAME="aiban" type="text" class="cajaGrande" id="aiban" maxlength="34"></td>
                                    <td width="4%"></td>
                                    <td width="20%">BIC</td>
                                    <td width="28%"><input NAME="abic" type="text" class="cajaMedia" id="abic" maxlength="12"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Digito Control</td>
                                    <td width="28%"><input NAME="adc" type="text" class="cajaPequena" id="adc" maxlength="2"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Num. Cuenta</td>
                                    <td width="28%"><input NAME="acuenta" type="text" class="cajaMedia" id="acuenta" maxlength="10"></td>
                                </tr>
                                <tr>
                                    <td>Observaciones</td>
                                    <td colspan="4"><textarea class="area" name="acommentproveedor" id="acommentproveedor"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Direccion</td>
                                    <td colspan="4"><input NAME="adireccion" type="text" class="cajaExtraGrande" id="adireccion" maxlength="250"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Pais</td>
                                    <td width="28%"><select id="nidpais" name="nidpais" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($row = mysql_fetch_row($rspaises)) { ?>
                                                <option value="<?php echo $row[0] ?>"><?=$row[1] ?></option>
<?php } ?>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Provincia</td>
                                    <td width="28%"><select id="nidprovincia" name="nidprovincia" class="comboMedio">
                                            <option value="0">---</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td width="20%">Poblacion</td>
                                    <td width="28%"><select id="nidpoblacion" name="nidpoblacion" class="comboMedio">
                                            <option value="0">---</option>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Codigo Postal</td>
                                    <td width="28%"><input NAME="acpproveedor" type="text" class="cajaPequena" id="acpproveedor" maxlength="5"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Telefono</td>
                                    <td width="28%"><input NAME="atelefono" type="text" class="cajaMedia" id="atelefono" maxlength="50"></td>
                                    <td width="4%"></td>
                                    <td width="20%">Fax</td>
                                    <td width="28%"><input NAME="afax" type="text" class="cajaMedia" id="afax" maxlength="50"></td>
                                </tr>
                                <tr>
                                    <td>Correo electronico</td>
                                    <td colspan="4"><input NAME="acorreo" type="text" class="cajaExtraGrande" id="acorreo" maxlength="100"></td>
                                </tr>
                                <tr>
                                    <td>Contacto</td>
                                    <td colspan="4"><input NAME="acontacto" type="text" class="cajaExtraGrande" id="acorpproveedor" maxlength="200"></td>
                                </tr>
                                <tr>
                                    <td>URL</td>
                                    <td colspan="4"><input NAME="aurlproveedor" type="text" class="cajaExtraGrande" id="aurlproveedor" maxlength="100"></td>
                                </tr>
                                <tr>
                                    <td>Clave web</td>
                                    <td colspan="4"><input NAME="aclavewebproveedor" type="text" class="cajaExtraGrande" id="aclavewebproveedor" maxlength="100"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Rec. Equivalencia</td>
                                    <td width="28%"><select name="arecargo" id="arecargo" class="comboPequeno">
                                            <option value="0" selected>No</option>
                                            <option value="1">Si</option>
                                        </select>
                                    </td>
                                    <td width="4%"></td>
                                    <td width="20%">IRPF</td>
                                    <td width="28%"><input NAME="rirpfproveedor" type="text" class="cajaPequena" id="rirpfproveedor" maxlength="10" onblur="javascript:formatear(this.value)"></td>
                                </tr>
                                <tr>
                                    <td width="20%">Forma de pago</td>
                                    <td width="28%"><select id="nidfp" name="nidfp" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowf = mysql_fetch_row($rsfp)) { ?>
                                                    <option value="<?=$rowf[0] ?>"><?=$rowf[1]?></option>
                                                <?php } ?>
                                        </select></td>
                                    <td width="4%"></td>
                                    <td width="20%">Moneda</td>
                                    <td width="28%"><select id="nidmoneda" name="nidmoneda" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowm = mysql_fetch_row($rsmonedas)) { ?>
                                                    <option value="<?=$rowm[0] ?>"><?=$rowm[1]?></option>
                                                <?php } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Regimen fiscal</td>
                                    <td colspan="4"><input NAME="aregfiscal" type="text" class="cajaGrande" id="aregfiscal" maxlength="50"></td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <input type="hidden" name="id" id="id" value="">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
                                <input id="accion" name="accion" value="alta" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
