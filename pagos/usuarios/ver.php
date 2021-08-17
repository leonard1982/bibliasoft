<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.usuarios.php");

$usuarios = new usuarios();

$codigo = $_GET["codigo"];

$row = $usuarios->select($codigo);
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
                    <div id="tituloForm" class="header">VER USUARIO</div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                    <td width="14%">Login</td>
                                    <td width="86%"><input NAME="Alogin" type="text" class="cajaGrande" id="Alogin" maxlength="20" readonly value="<?=$row[0]?>"></td>
                                </tr>
                                <tr>
                                    <td>Clave</td>
                                    <td><input NAME="Aclave" type="password" class="cajaMedia" id="Aclave" maxlength="10" value="********" readonly></td>
                                </tr>   
                                <tr>
                                    <td width="14%">Nombre</td>
                                    <td width="86%"><input NAME="Anombre" type="text" class="cajaGrande" id="Anombre" maxlength="50" value="<?=$row[2]?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Correo electronico</td>
                                    <td><input NAME="acorreo" type="text" class="cajaGrande" id="acorreo" maxlength="64" value="<?=$row[3]?>" readonly></td>
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
