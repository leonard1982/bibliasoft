<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.tipoiva.php");

$tipoiva = new tipoiva();

$resultadop = $tipoiva->llenar_combo_tiposiva();
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
        <script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
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
            
            function formatear(valor) {
                var valor = valor.replace(",",".");
                document.getElementById("porcentajetasa").value=valor;	
            }
            
            function formatear2(valor) {
                var valor = valor.replace(",",".");
                document.getElementById("porcentajeentre").value=valor;	
            }
			
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">INSERTAR TASA DE IGIC</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="3"><ul id="lista-errores"></ul></td>
                                </tr>	
                                <tr>
                                    <td width="20%">Tipo de IGIC</td>
                                    <td width="80%"><select id="Zidtipoiva" name="Zidtipoiva" class="comboMedio">
                                            <?php while ($row = mysql_fetch_row($resultadop)) { ?>					
                                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>							
                                            <?php } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Porcentaje tasa</td>
                                    <td><input NAME="qporcentajetasa" type="text" class="cajaPequena" id="porcentajetasa" maxlength="10" onblur="javascript:formatear(this.value)"> %</td>
                                </tr>
                                <tr>
                                    <td>Porcentaje entre tasa</td>
                                    <td><input NAME="qporcentajeentre" type="text" class="cajaPequena" id="porcentajeentre" maxlength="10" onblur="javascript:formatear2(this.value)"> %</td>
                                </tr>
                                <tr>
                                    <td>Fecha tasa</td>
                                    <td><input NAME="fechatasa" type="text" class="cajaPequena" id="fechatasa" value="<?=date('d/m/Y')?>" readonly><img src="../img/calendario.png" name="Image1" id="Image1" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechatasa",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		</script></td>
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
