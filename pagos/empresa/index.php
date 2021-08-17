<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include ("../clases/class.paises.php");
include ("../clases/class.provincias.php");
include ("../clases/class.poblaciones.php");
include ("../clases/class.empresa.php");
include ("../clases/class.entidades.php");
include ("../clases/class.sucursales.php");

$paises = new paises();
$provincias = new provincias();
$poblaciones = new poblaciones();
$empresa = new empresa();
$entidades = new entidades();
$sucursales = new sucursales();

$rsempresa = $empresa->select(1);

$resultadop = $paises->llenar_combo_paises();
$rsprovincias = $provincias->llenar_combo_provincias_por_pais($rsempresa[6]);
$rspoblaciones = $poblaciones->llenar_combo_poblaciones_por_provincias($rsempresa[5]);
$rsentidades = $entidades->llenar_combo_entidades();
$rsucursales = $sucursales->llenar_combo_entidades_por_sucursal($rsempresa[17]);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script type="text/javascript" src="../funciones/validar.js"></script>
        <script language="javascript">

            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor='hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor='pointer';
            }
            
            $(document).ready(function() {
                // Parametros para el combo
                $("#idpais").change(function () {
                    $("#idpais option:selected").each(function () {
                        elegido=$(this).val();
                        $.post("obtener_provincias.php", { elegido: elegido }, function(data){
                            $("#idprovincia").html(data);
                        });     
                    });
                });
                $("#idprovincia").change(function () {
                    $("#idprovincia option:selected").each(function () {
                        elegido2=$(this).val();
                        $.post("obtener_poblaciones.php", { elegido2: elegido2 }, function(data){
                            $("#idpoblacion").html(data);
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
                    <div id="tituloForm" class="header">DATOS EMPRESA</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php" enctype="multipart/form-data">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="3"><ul id="lista-errores"></ul></td>
                                </tr>	
                                <tr>
                                    <td width="20%">Nombre (*)</td>
                                    <td width="50%"><input type="text" name="Anombre" id="Anombre" class="cajaGrande" maxlength="50" value="<?= $rsempresa[1] ?>"></input></td>
                                    <td width="30%" rowspan="15"><img src="./logo/<?= $rsempresa[0] ?>.jpg" width="416" height="109" border="1"></td>
                                </tr>
                                <tr>
                                    <td>CIF (*)</td>
                                    <td><input type="text" name="Acif" id="Acif" class="cajaPequena" maxlength="15" value="<?= $rsempresa[2] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Direccion (*)</td>
                                    <td><input type="text" name="Adireccion" id="Adireccion" class="cajaGrande" maxlength="60" value="<?= $rsempresa[3] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Pais (*)</td>
                                    <td><select id="idpais" name="Nidpais" class="comboMedio">
                                            <?php while ($row = mysql_fetch_row($resultadop)) {
                                                if ($row[0] == $rsempresa[6]) { ?>					
                                                    <option value="<?php echo $row[0] ?>" selected><?php echo $row[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Provincia (*)</td>
                                    <td><select id="idprovincia" name="Nidprovincia" class="comboMedio">
                                            <?php while ($rowp = mysql_fetch_row($rsprovincias)) {
                                                if ($rowp[0] == $rsempresa[5]) { ?>					
                                                    <option value="<?php echo $rowp[0] ?>" selected><?php echo $rowp[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?php echo $rowp[0] ?>"><?php echo $rowp[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Poblacion (*)</td>
                                    <td><select id="idpoblacion" name="Nidpoblacion" class="comboMedio">
                                            <?php while ($rowpob = mysql_fetch_row($rspoblaciones)) {
                                                if ($rowpob[0] == $rsempresa[4]) { ?>					
                                                    <option value="<?php echo $rowpob[0] ?>" selected><?php echo $rowpob[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?php echo $rowpob[0] ?>"><?php echo $rowpob[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Telefono (*)</td>
                                    <td><input type="text" name="Atelefono" id="Atelefono" class="cajaPequena" maxlength="15" value="<?= $rsempresa[7] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Movil (*)</td>
                                    <td><input type="text" name="Amovil" id="Amovil" class="cajaPequena" maxlength="15" value="<?= $rsempresa[8] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Fax (*)</td>
                                    <td><input type="text" name="Afax" id="Afax" class="cajaPequena" maxlength="15" value="<?= $rsempresa[9] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Cod. Postal (*)</td>
                                    <td><input type="text" name="Acp" id="Acp" class="cajaPequena" maxlength="5" value="<?= $rsempresa[10] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Web (*)</td>
                                    <td><input type="text" name="Aweb" id="Aweb" class="cajaGrande" maxlength="30" value="<?= $rsempresa[11] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Email (*)</td>
                                    <td><input type="text" name="Acorreo" id="Acorreo" class="cajaGrande" maxlength="50" value="<?= $rsempresa[12] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Num. Registro (*)</td>
                                    <td><input type="text" name="Nregistro" id="Nregistro" class="cajaPequena" maxlength="10" value="<?= $rsempresa[13] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Num. Pago (*)</td>
                                    <td><input type="text" name="Npago" id="Npago" class="cajaPequena" maxlength="10" value="<?= $rsempresa[14] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Num. Vencimiento (*)</td>
                                    <td><input type="text" name="Nvto" id="Nvto" class="cajaPequena" maxlength="10" value="<?= $rsempresa[15] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Num. Transferencia (*)</td>
                                    <td><input type="text" name="Ntransferencia" id="Ntransferencia" class="cajaPequena" maxlength="10" value="<?= $rsempresa[16] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Entidad Bancaria</td>
                                    <td><select id="nidentidad" name="nidentidad" class="comboGrande">
                                            <option value="0">---</option>
                                            <?php while ($rowe = mysql_fetch_row($rsentidades)) {
                                                if ($rowe[0] == $rsempresa[17]) { ?>
                                                    <option value="<?= $rowe[0] ?>" selected><?= $rowe[1] ?> [<?= $rowe[2] ?>]</option>
                                                <?php } else { ?>
                                                    <option value="<?= $rowe[0] ?>"><?= $rowe[1] ?> [<?= $rowe[2] ?>]</option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Sucursal bancaria</td>
                                    <td><select id="nidsucursal" name="nidsucursal" class="comboGrande">
                                            <option value="0">---</option>
                                            <?php while ($rowsd = mysql_fetch_row($rsucursales)) {
                                                if ($rowsd[0] == $rsempresa[18]) { ?>
                                                    <option value="<?= $rowsd[0] ?>" selected><?= $rowsd[1] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $rowsd[0] ?>"><?= $rowsd[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>IBAN</td>
                                    <td><input type="text" name="aiban" id="aiban" class="cajaGrande" maxlength="24" value="<?= $rsempresa[19] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Logo</td>
                                    <td><input type="file" name="logo" id="logo">(la imagen debe ser jpg)</td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <input type="hidden" name="id" id="id" value="<?= $rsempresa[0] ?>">
                                <?php if ($permisos == 'escritura') { ?>
                                    <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
<?php } ?>
                                <input id="accion" name="accion" value="modificar" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>