<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include ("../clases/class.paises.php");

$paises = new paises();

$resultadop = $paises->llenar_combo_paises();
?>
<html>
    <head>
        <title>Provincias</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
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
                document.getElementById("idpais").value=0;
            }
        </script>
    </head>
    <body onLoad="inicio()">
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">Buscar PROVINCIAS</div>
                    <div id="frmBusqueda">
                        <form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
                                <tr>
                                    <td>Denominacion</td>
                                    <td><input id="denominacion" name="denominacion" type="text" class="cajaGrande" maxlength="40" value="<?= $_SESSION['mantdenprov'] ?>"></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Pais</td>
                                    <td><select id="idpais" name="idpais" class="comboMedio">
                                            <option value="0" selected>Todos</option>
                                            <?php while ($row = mysql_fetch_row($resultadop)) {
                                                if ($row[0] == $_SESSION['mantidpais']) { ?>					
                                                    <option value="<?= $row[0] ?>" selected><?= $row[1] ?></option>							
                                                <?php } else { ?>
                                                    <option value="<?= $row[0] ?>"><?= $row[1] ?></option>	
                                                <?php }
                                            } ?>
                                        </select>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
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
