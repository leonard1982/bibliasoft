<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.entidades.php");
include_once ("../clases/class.paises.php");
include_once ("../clases/class.sucursales.php");
include_once ("../clases/class.provincias.php");
include_once ("../clases/class.poblaciones.php");

$codigo = $_GET["codigo"];

$paises = new paises();
$entidades = new entidades();
$sucursales = new sucursales();
$provincias = new provincias();
$poblaciones = new poblaciones();

$resultadop = $paises->llenar_combo_paises();
$rsentidades = $entidades->llenar_combo_entidades();
$row = $sucursales->select($codigo);
$rsprovincias = $provincias->llenar_combo_provincias_por_pais($row[10]);
$rspoblaciones = $poblaciones->llenar_combo_poblaciones_por_provincias($row[9]);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script type="text/javascript" src="../funciones/validar.js"></script>
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
            
            $(document).ready(function() {
                // Parametros para el combo
                $("#Nidpais").change(function () {
                    $("#Nidpais option:selected").each(function () {
                        elegido=$(this).val();
                        $.post("obtener_provincias.php", { elegido: elegido }, function(data){
                            $("#Nidprovincia").html(data);
                        });     
                    });
                });
                $("#Nidprovincia").change(function () {
                    $("#Nidprovincia option:selected").each(function () {
                        elegido2=$(this).val();
                        $.post("obtener_poblaciones.php", { elegido2: elegido2 }, function(data){
                            $("#Nidpoblacion").html(data);
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
                    <div id="tituloForm" class="header">MODIFICAR SUCURSAL BANCARIA</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="2"><ul id="lista-errores"></ul></td>
                                </tr>
                                <tr>
                                    <td width="20%">Nombre Sucursal</td>
                                    <td width="80%"><input id="Adenominacion" name="Adenominacion" type="text" class="cajaGrandeR" maxlength="50" value="<?= $row[4] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Codigo Sucursal</td>
                                    <td><input id="Acodsucursal" name="Acodsucursal" type="text" class="cajaPequenaR" maxlength="4" value="<?= $row[2] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Entidad</td>
                                    <td><select id="Nidentidad" name="Nidentidad" class="comboMedioR" disabled>
                                            <option value="">---</option>
                                            <?php while ($rowe = mysql_fetch_row($rsentidades)) {
                                                if ($rowe[0] == $row[1]) { ?>					
                                                    <option value="<?= $rowe[0] ?>" selected><?= $rowe[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?= $rowe[0] ?>"><?= $rowe[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Pais (*)</td>
                                    <td><select id="Nidpais" name="Nidpais" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowpa = mysql_fetch_row($resultadop)) {
                                                if ($rowpa[0] == $row[10]) { ?>					
                                                    <option value="<?= $rowpa[0] ?>" selected><?= $rowpa[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?= $rowpa[0] ?>"><?= $rowpa[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Provincia (*)</td>
                                    <td><select id="Nidprovincia" name="Nidprovincia" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowprov = mysql_fetch_row($rsprovincias)) {
                                                if ($rowprov[0] == $row[9]) { ?>					
                                                    <option value="<?= $rowprov[0] ?>" selected><?= $rowprov[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?= $rowprov[0] ?>"><?= $rowprov[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Poblacion (*)</td>
                                    <td><select id="Nidpoblacion" name="Nidpoblacion" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowpob = mysql_fetch_row($rspoblaciones)) {
                                                if ($rowpob[0] == $row[8]) { ?>					
                                                    <option value="<?= $rowpob[0] ?>" selected><?= $rowpob[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?= $rowpob[0] ?>"><?= $rowpob[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Telefono</td>
                                    <td><input id="atelefono" name="atelefono" type="text" class="cajaMedia" maxlength="15" value="<?= $row[5] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Direccion</td>
                                    <td><input id="adireccion" name="adireccion" type="text" class="cajaGrande" maxlength="50" value="<?= $row[6] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Codigo Postal</td>
                                    <td><input id="acodpostal" name="acodpostal" type="text" class="cajaPequena" maxlength="5" value="<?= $row[7] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Contacto</td>
                                    <td><input id="acontacto" name="acontacto" type="text" class="cajaGrande" maxlength="50" value="<?= $row[11] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Correo</td>
                                    <td><input id="acorreo" name="acorreo" type="text" class="cajaGrande" maxlength="50" value="<?= $row[12] ?>"></td>
                                </tr>						
                            </table>					
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
                                <input id="id" name="id" value="<?= $codigo ?>" type="hidden">
                                <input id="accion" name="accion" value="modificar" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
