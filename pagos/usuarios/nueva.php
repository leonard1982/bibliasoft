<?php
include ("../seguridad_usuario.inc");
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../funciones/validar.js"></script>
        <script src="../ajax/js/jquery-1.7.1.min.js"></script>
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
                $("#Alogin").val();
            }
            
            function verificar() {
                $.post('comprobar_login.php', $('#formulario').serialize(), function(msg) {
                    eval('var resp=' + msg);
                    if (resp.estado == 0) {
                        $("#error").html(resp.tx).fadeIn(1500);
                        $("#Alogin").val("");
                    } else {
                        $("#error").html(resp.tx).fadeIn(1500);
                        validar(formulario,true);
                    }
                });
            }
        </script>
    </head>
    <body>
        <div id="pagina" onload="javascript:limpiar()">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">INSERTAR USUARIO</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="2"><ul id="lista-errores"></ul></td>
                                </tr>
                                <tr>
                                    <td width="14%">Login (*)</td>
                                    <td width="50%"><input NAME="Alogin" type="text" class="cajaGrande" id="Alogin" maxlength="20" onblur="javascript:verificar()"></td>
                                    <td width="36%"><div id="error"><p></p></div></td>
                                </tr>
                                <tr>
                                    <td>Clave (*)</td>
                                    <td><input NAME="Aclave" type="password" class="cajaMedia" id="Aclave" maxlength="10"></td>
                                    <td></td>
                                </tr>   
                                <tr>
                                    <td>Nombre (*)</td>
                                    <td><input NAME="Anombre" type="text" class="cajaGrande" id="Anombre" maxlength="50"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Correo electronico</td>
                                    <td><input NAME="acorreo" type="text" class="cajaGrande" id="acorreo" maxlength="64"></td>
                                    <td></td>
                                </tr>                                                            
                            </table>
                            <hr>
                            </div>
                            <div id="botonBusqueda">
                                <input type="hidden" name="id" id="id" value="">
                                <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="javascript:verificar()" border="1" onMouseOver="style.cursor=cursor">
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
