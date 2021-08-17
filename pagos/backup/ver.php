<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.envios.php");
include ("../funciones/fechas.php");

$envios = new envios();

$codigo = $_GET["codigo"];

$row = $envios->select($codigo);
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
                    <div id="tituloForm" class="header">VER ENVIO CERTIFICADO</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php" enctype="multipart/form-data">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td width="20%">Fecha Envio (*)</td>
                                    <td width="80%"><input id="fechaenvio" type="text" class="cajaPequenaR" NAME="fechaenvio" maxlength="10" readonly value="<?= implota($row[1]) ?>"></td>
                                </tr>
                                <tr>
                                    <td>Proveedor</td>
                                    <td><input NAME="proveedor" type="text" class="cajaExtraGrande" id="proveedor" maxlength="100" readonly value="<?=$row[4]?>"></td>
                                </tr>
                                <tr>
                                    <td>CIF</td>
                                    <td><input NAME="cif" type="text" class="cajaMedia" id="cif" maxlength="20" readonly value="<?=$row[8]?>"></td>
                                </tr>
                                <tr>
                                    <td>Direccion</td>
                                    <td><input NAME="direccion" type="text" class="cajaExtraGrande" id="direccion" maxlength="100" readonly value="<?=$row[5]?>"></td>
                                </tr>
                                <tr>
                                    <td>Codigo postal</td>
                                    <td><input NAME="cpproveedor" type="text" class="cajaPequena" id="cpproveedor" maxlength="5" readonly value="<?=$row[3]?>"></td>
                                </tr>
                                <tr>
                                    <td>Poblacion</td>
                                    <td><input NAME="poblacion" type="text" class="cajaExtraGrande" id="poblacion" maxlength="50" readonly value="<?=$row[6]?>"></td>
                                </tr>
                                <tr>
                                    <td>Provincia</td>
                                    <td><input NAME="provincia" type="text" class="cajaExtraGrande" id="provincia" maxlength="50" readonly value="<?=$row[7]?>"></td>
                                </tr>
                                <td>Cod. Envio (*)</td>
                                <td><input NAME="codigocer" type="text" class="cajaMedia" id="codigocer" maxlength="30" readonly value="<?=$row[9]?>"></td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
