<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.trabajadores.php");

$codigo = $_GET["codigo"];

$trabajadores = new trabajadores();

$row = $trabajadores->select($codigo);
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../funciones/validar.js"></script>
        <script language="javascript">
		
            function cancelar() {
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
		
            function limpiar() {
                document.getElementById("formulario").reset();
            }
		
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">MODIFICAR TRABAJADOR</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php" enctype="multipart/form-data">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="3"><ul id="lista-errores"></ul></td>
                                </tr>		
                                <tr>
                                    <td width="14%">Nombre (*)</td>
                                    <td width="36%"><input NAME="Anombre" type="text" class="cajaGrande" id="nombre" maxlength="50" value="<?=$row[1]?>"></td>
                                    <td width="50%" rowspan="7" align="center"><img src="./fotos/<?=$row[0]?>.jpg" height="150px" width="150px" border="1"></img></td>
                                </tr>
                                <tr>
                                    <td width="14%">Apellidos (*)</td>
                                    <td width="36%"><input NAME="Aapellidos" type="text" class="cajaGrande" id="apellidos" maxlength="50" value="<?=$row[2]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Direccion</td>
                                    <td width="36%"><input NAME="adireccion" type="text" class="cajaGrande" id="direccion" maxlength="50" value="<?=$row[3]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">N. Seg. Social</td>
                                    <td width="36%"><input NAME="anumsegsocial" type="text" class="cajaMedia" id="numsegsocial" maxlength="15" value="<?=$row[4]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Telefono</td>
                                    <td width="36%"><input NAME="atelefono" type="text" class="cajaMedia" id="telefono" maxlength="20" value="<?=$row[5]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Movil</td>
                                    <td width="36%"><input NAME="amovil" type="text" class="cajaMedia" id="movil" maxlength="20" value="<?=$row[6]?>"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Email</td>
                                    <td width="36%"><input NAME="acorreo" type="text" class="cajaGrande" id="correo" maxlength="50" value="<?=$row[7]?>"></td>
                                </tr>
                                <tr>
                                    <td>Fotografia</td>
                                    <td><input type="file" name="foto" id="foto">(la imagen debe ser jpg y el tama&ntilde;o maximo de 150px de ancho)</td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
                                <input id="id" name="id" value="<?= $codigo ?>" type="hidden">
                                <input id="accion" name="accion" value="modificar" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
