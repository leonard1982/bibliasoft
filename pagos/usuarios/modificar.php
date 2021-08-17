<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.usuarios.php");

$codigo = $_GET["codigo"];

$usuarios = new usuarios();

$row = $usuarios->select($codigo);
?>
<html>
    <head>        
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../funciones/validar.js"></script>
        <script language="javascript">

            function cancelar() {
                location.href = "index.php";
            }

            var cursor;
            if (document.all) {
                // Está utilizando EXPLORER
                cursor = 'hand';
            } else {
                // Está utilizando MOZILLA/NETSCAPE
                cursor = 'pointer';
            }

            function limpiar() {
                document.getElementById("formulario").reset();
            }

            

        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">MODIFICAR USUARIO</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="3"><ul id="lista-errores"></ul></td>
                                </tr>		
                                <tr>
                                    <td width="14%">Login</td>
                                    <td width="50%"><input NAME="Alogin" type="text" class="cajaGrandeR" id="Alogin" maxlength="20" readonly value="<?= $row[0] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Clave (*)</td>
                                    <td><input NAME="aclave" type="password" class="cajaMedia" id="aclave" maxlength="10"></td>
                                </tr>   
                                <tr>
                                    <td width="14%">Nombre</td>
                                    <td width="86%"><input NAME="Anombre" type="text" class="cajaGrandeR" id="Anombre" maxlength="50" value="<?= $row[2] ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Correo electronico</td>
                                    <td><input NAME="acorreo" type="text" class="cajaGrande" id="acorreo" maxlength="64" value="<?= $row[3] ?>"></td>
                                </tr> 
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario, true)" border="1" onMouseOver="style.cursor = cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor = cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor = cursor">
                                <input id="id" name="id" value="<?= $codigo ?>" type="hidden">
                                <input id="accion" name="accion" value="modificar" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
