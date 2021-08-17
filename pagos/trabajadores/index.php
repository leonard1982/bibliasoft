<?php
include ("../seguridad_usuario.inc");
?>
<html>
    <head>
        <title>Trabajadores</title>
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
                document.getElementById("form_busqueda").submit();
            }
			
            function limpiar() {
                document.getElementById("nombre").value="";
                document.getElementById("apellidos").value="";
                document.getElementById("numss").value="";
            }
        </script>
    </head>
    <body onLoad="inicio()">
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">Buscar TRABAJADORES</div>
                    <div id="frmBusqueda">
                        <form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
                                <tr>
                                    <td>Nombre</td>
                                    <td><input id="nombre" name="nombre" type="text" class="cajaGrande" maxlength="50" value="<?= $_SESSION['mantrabnom'] ?>"></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Apellidos</td>
                                    <td><input id="apellidos" name="apellidos" type="text" class="cajaGrande" maxlength="50" value="<?= $_SESSION['mantrabape'] ?>"></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>N. Seguridad Social</td>
                                    <td><input id="numss" name="numss" type="text" class="cajaMedia" maxlength="15" value="<?= $_SESSION['mantrabnss'] ?>"></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
                                <img src="../img/boton_nuevo.jpg" width="70" height="22" border="1" onClick="nueva()" onMouseOver="style.cursor=cursor">					
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