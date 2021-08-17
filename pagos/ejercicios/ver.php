<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.ejercicios.php");

$ejercicios = new ejercicios();

$codigo = $_GET["codigo"];

$row = $ejercicios->select($codigo);
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
                    <div id="tituloForm" class="header">VER EJERCICIO</div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                <td width="34%">Ejercicio</td>
                                <td width="66%"><input type="text" readonly class="cajaPequena" value="<?= $row[1]; ?>"></td>
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
