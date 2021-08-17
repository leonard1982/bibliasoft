<?php
include ("../seguridad_usuario.inc");
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
                    <div id="tituloForm" class="header">INSERTAR TRABAJADOR</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php" enctype="multipart/form-data">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="2"><ul id="lista-errores"></ul></td>
                                </tr>		
                                <tr>
                                    <td width="14%">Nombre (*)</td>
                                    <td width="86%"><input NAME="Anombre" type="text" class="cajaGrande" id="nombre" maxlength="50"></td>
                                </tr>
                                <tr>
                                    <td>Apellidos (*)</td>
                                    <td><input NAME="Aapellidos" type="text" class="cajaGrande" id="apellidos" maxlength="50"></td>
                                </tr>
                                <tr>
                                    <td>Direccion</td>
                                    <td><input NAME="adireccion" type="text" class="cajaGrande" id="direccion" maxlength="50"></td>
                                </tr>
                                <tr>
                                    <td>N. Seg. Social</td>
                                    <td><input NAME="anumsegsocial" type="text" class="cajaMedia" id="numsegsocial" maxlength="15"></td>
                                </tr>
                                <tr>
                                    <td>Telefono</td>
                                    <td><input NAME="atelefono" type="text" class="cajaMedia" id="telefono" maxlength="20"></td>
                                </tr>
                                <tr>
                                    <td>Movil</td>
                                    <td><input NAME="amovil" type="text" class="cajaMedia" id="movil" maxlength="20"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input NAME="acorreo" type="text" class="cajaGrande" id="correo" maxlength="50"></td>
                                </tr>
                                <tr>
                                    <td>Fotografia</td>
                                    <td><input type="file" id="foto" name="foto" />(la imagen debe ser jpg y el tama&ntilde;o maximo de 150px de ancho)</td>
                                </tr>
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <input type="hidden" name="id" id="id" value="">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
                                <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
                                <input id="accion" name="accion" value="alta" type="hidden">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
