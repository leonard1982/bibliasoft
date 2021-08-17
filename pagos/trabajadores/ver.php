<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.trabajadores.php");

$trabajadores = new trabajadores();

$codigo = $_GET["codigo"];

$row = $trabajadores->select($codigo);
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
                    <div id="tituloForm" class="header">VER TRABAJADOR</div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                    <td width="14%">Nombre (*)</td>
                                    <td width="36%"><input NAME="Anombre" type="text" class="cajaGrande" id="nombre" maxlength="50" readonly value="<?=$row[1]?>"></td>
                                    <td width="50%" rowspan="7" align="center"><img src="./fotos/<?=$row[0]?>.jpg" height="150px" width="150px" border="1"></img></td>
                                </tr>
                                <tr>
                                    <td width="14%">Apellidos (*)</td>
                                    <td width="36%"><input NAME="Aapellidos" type="text" class="cajaGrande" id="apellidos" maxlength="50" readonly value="<?=$row[2]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Direccion</td>
                                    <td width="36%"><input NAME="adireccion" type="text" class="cajaGrande" id="direccion" maxlength="50" readonly value="<?=$row[3]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">N. Seg. Social</td>
                                    <td width="36%"><input NAME="anumsegsocial" type="text" class="cajaMedia" id="numsegsocial" maxlength="15" readonly value="<?=$row[4]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Telefono</td>
                                    <td width="36%"><input NAME="atelefono" type="text" class="cajaMedia" id="telefono" maxlength="20" readonly value="<?=$row[5]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Movil</td>
                                    <td width="36%"><input NAME="amovil" type="text" class="cajaMedia" id="movil" maxlength="20" readonly value="<?=$row[6]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Email</td>
                                    <td width="36%"><input NAME="acorreo" type="text" class="cajaGrande" id="correo" maxlength="50" readonly value="<?=$row[7]?>"></td>
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
