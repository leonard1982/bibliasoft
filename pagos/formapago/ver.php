<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.formapago.php");

$formapago = new formapago();

$codigo = $_GET["codigo"];

$row = $formapago->select($codigo);
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
                    <div id="tituloForm" class="header">VER FORMA DE PAGO</div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                <td width="15%">Denominacion</td>
                                <td width="85%" colspan="2"><input type="text" readonly class="cajaGrande" value="<?= $row[1]; ?>"></td>
                            </tr>
                            <tr>
                                <td width="15%">Prefijo</td>
                                <td width="85%" colspan="2"><input type="text" readonly class="cajaPequena" value="<?= $row[4]; ?>"></td>
                            </tr>
                            <tr>
                                <td width="15%">Dias</td>
                                <td width="85%" colspan="2"><input type="text" readonly class="cajaPequena" value="<?= $row[2]; ?>"></td>
                            </tr>
                            <tr>
                                <td width="15%">Descuento</td>
                                <td width="85%" colspan="2"><input type="text" readonly class="cajaPequena" value="<?= $row[3]; ?>"></td>
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
