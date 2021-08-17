<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include ("../clases/class.entidades.php");
include ("../clases/class.paises.php");
include ("../clases/class.provincias.php");
include ("../clases/class.poblaciones.php");

$entidades = new entidades();
$paises = new paises();
$provincias = new provincias();
$poblaciones = new poblaciones();

$rsentidades = $entidades->llenar_combo_entidades();
$resultadop = $paises->llenar_combo_paises();
$rsprovincias = $provincias->llenar_combo_provincias_por_pais($_SESSION['mantidpaissuc']);
$rspoblaciones = $poblaciones->llenar_combo_poblaciones_por_provincias($_SESSION['mantidprovsuc']);
?>
<html>
    <head>
        <title>Sucursales Bancarias</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script language="javascript">
		
            function inicio() {
                document.getElementById("form_busqueda").submit();
            }
            function nueva() {
                location.href="nueva.php";
            }
		
            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor='hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor='pointer';
            }
		
            function buscar() {
                var cadena;
                document.getElementById("form_busqueda").submit();
            }
			
            function limpiar() {
                document.getElementById("denominacion").value="";
                document.getElementById("identidad").selectedIndex=-1;
                document.getElementById("idpais").selectedIndex=-1;
                document.getElementById("idprovincia").selectedIndex=-1;
                document.getElementById("idpoblacion").selectedIndex=-1;
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
            });
        </script>
    </head>
    <body onLoad="inicio()">
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">Buscar SUCURSALES BANCARIAS</div>
                    <div id="frmBusqueda">
                        <form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
                                <tr>
                                    <td>Entidad</td>
                                    <td><select id="identidad" name="identidad" class="comboMedio">
                                            <option value="">---</option>
                                            <?php while ($rowe = mysql_fetch_row($rsentidades)) {
                                                if ($rowe[0] == $_SESSION['mantidentidadsuc']) { ?>					
                                                    <option value="<?php echo $rowe[0] ?>" selected><?= $rowe[1] ?> [<?= $rowe[2] ?>]</option>	
                                                <?php } else { ?>
                                                    <option value="<?php echo $rowe[0] ?>"><?= $rowe[1] ?> [<?= $rowe[2] ?>]</option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Nombre</td>
                                    <td><input id="denominacion" name="denominacion" type="text" class="cajaGrande" maxlength="40" value="<?= $_SESSION['mantdensuc'] ?>"></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Pais</td>
                                    <td><select id="idpais" name="idpais" class="comboMedio">
                                            <option value="">---</option>
                                            <?php while ($row = mysql_fetch_row($resultadop)) {
                                                if ($row[0] == $_SESSION['mantidpaissuc']) { ?>					
                                                    <option value="<?= $row[0] ?>" selected><?= $row[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Provincia</td>
                                    <td><select id="idprovincia" name="idprovincia" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowprov = mysql_fetch_row($rsprovincias)) {
                                                if ($rowprov[0] == $_SESSION['mantidprovsuc']) { ?>					
                                                    <option value="<?= $rowprov[0] ?>" selected><?= $rowprov[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?= $rowprov[0] ?>"><?= $rowprov[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Poblacion</td>
                                    <td><select id="idpoblacion" name="idpoblacion" class="comboMedio">
                                            <option value="0">---</option>
                                            <?php while ($rowpob = mysql_fetch_row($rspoblaciones)) {
                                                if ($rowpob[0] == $_SESSION['mantidpobsuc']) { ?>					
                                                    <option value="<?= $rowpob[0] ?>" selected><?= $rowpob[1] ?></option>	
                                                <?php } else { ?>
                                                    <option value="<?= $rowpob[0] ?>"><?= $rowpob[1] ?></option>
                                                <?php }
                                            } ?>
                                        </select></td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
                                <?php if ($permisos == 'escritura') { ?>
                                    <img src="../img/boton_nuevo.jpg" width="70" height="22" border="1" onClick="nueva()" onMouseOver="style.cursor=cursor">					
                                <?php } ?>
                            </div>
                            <div id="lineaResultado">
                                <iframe width="100%" height="350" id="frame_rejilla" name="frame_rejilla" frameborder="0" scrolling="no">
                                <ilayer width="100%" height="350" id="frame_rejilla" name="frame_rejilla"></ilayer>
                                </iframe>
                            </div>
                    </div>
                </div>			
            </div>
    </body>
</html>
