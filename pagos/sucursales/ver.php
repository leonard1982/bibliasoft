<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.sucursales.php");

$sucursales = new sucursales();

$codigo = $_GET["codigo"];

$row = $sucursales->select($codigo);
?>

<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script language="javascript">
		
            function aceptar() {
                location.href="index.php?cadena_busqueda=<? echo $cadena_busqueda ?>";
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
                    <div id="tituloForm" class="header">VER SUCURSAL BANCARIA</div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                <td width="20%">Nombre Sucursal</td>
                                <td width="80%"><input id="Adenominacion" name="Adenominacion" type="text" class="cajaGrande" maxlength="50" readonly value="<?=$row[4]?>"></td>
                            </tr>
                            <tr>
                                <td>Codigo Sucursal</td>
                                <td><input id="Acodsucursal" name="Acodsucursal" type="text" class="cajaPequena" maxlength="4" readonly value="<?=$row[2]?>"></td>
                            </tr>
                            <tr>
                                <td>Entidad Bancaria</td>
                                <td><input id="Aentidad" name="Aentidad" type="text" class="cajaGrande" maxlength="50" readonly value="<?=$row[16]?>"></td>
                            </tr>
                            <tr>
                                <td>Codigo Entidad</td>
                                <td><input id="Acodentidad" name="Acodentidad" type="text" class="cajaPequena" maxlength="4" readonly value="<?=$row[3]?>"></td>
                            </tr>
                            <tr>
                                <td>Pais</td>
                                <td><input id="Apais" name="Apais" type="text" class="cajaGrande" maxlength="50" readonly value="<?=$row[13]?>"></td>
                            </tr>
                            <tr>
                                <td>Provincia</td>
                                <td><input id="Aprovincia" name="Aprovincia" type="text" class="cajaGrande" maxlength="50" readonly value="<?=$row[14]?>"></td>
                            </tr>
                            <tr>
                                <td>Poblacion</td>
                                <td><input id="Apoblacion" name="Apoblacion" type="text" class="cajaGrande" maxlength="50" readonly value="<?=$row[15]?>"></td>
                            </tr>
                            <tr>
                                <td>Telefono</td>
                                <td><input id="atelefono" name="atelefono" type="text" class="cajaMedia" maxlength="15" readonly value="<?=$row[5]?>"></td>
                            </tr>
                            <tr>
                                <td>Direccion</td>
                                <td><input id="adireccion" name="adireccion" type="text" class="cajaGrande" maxlength="50" readonly value="<?=$row[6]?>"></td>
                            </tr>
                            <tr>
                                <td>Codigo Postal</td>
                                <td><input id="acodpostal" name="acodpostal" type="text" class="cajaPequena" maxlength="5" readonly value="<?=$row[7]?>"></td>
                            </tr>
                            <tr>
                                <td>Contacto</td>
                                <td><input id="acontacto" name="acontacto" type="text" class="cajaGrande" maxlength="50" readonly value="<?=$row[11]?>"></td>
                            </tr>
                            <tr>
                                <td>Correo</td>
                                <td><input id="acorreo" name="acorreo" type="text" class="cajaGrande" maxlength="50" readonly value="<?=$row[12]?>"></td>
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
