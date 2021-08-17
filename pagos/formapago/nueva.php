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
		
            function formatear(valor) {
                var valor = valor.replace(",",".");
                document.getElementById("descuento").value=valor;	
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
                    <div id="tituloForm" class="header">INSERTAR FORMA DE PAGO</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="3"><ul id="lista-errores"></ul></td>
                                </tr>		
                                <tr>
                                    <td width="14%">Denominacion (*)</td>
                                    <td width="36%"><input NAME="Adenominacion" type="text" class="cajaGrande" id="denominacion" maxlength="50"></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Prefijo (*)</td>
                                    <td width="36%"><select name="Aprefijo" id="Aidprefijo" class="comboPequeno">
                                            <option value="T" selected>T</option>
                                            <option value="P">P</option>
                                            <option value="E">E</option>
                                            <option value="R">R</option>
                                        </select></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Dias</td>
                                    <td width="36%"><input NAME="ndias" type="text" class="cajaPequena" id="dias" maxlength="5"></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Descuento</td>
                                    <td width="36%"><input NAME="qdcto" type="text" class="cajaPequena" id="descuento" maxlength="5" onBlur="javascript:formatear(this.value)"></td>
                                    <td width="50%"></td>
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
