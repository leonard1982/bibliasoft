<?php
include ("../seguridad_usuario.inc");
include ("../clases/class.paises.php");

$paises = new paises();

$resultadop = $paises->llenar_combo_paises();
?>
<html>
    <head>
        <title>Principal</title>
        <link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
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
            
            $(document).ready(function() {
                // Parametros para el combo
                $("#idpais").change(function () {
                    $("#idpais option:selected").each(function () {
                        elegido=$(this).val();
                        $.post("obtener_provincias.php", { elegido: elegido }, function(data){
                            $("#idprovincia").html(data);
                        });     
                    });
                });    
            });
			
        </script>
    </head>
    <body>
        <div id="pagina">
            <div id="zonaContenido">
                <div align="center">
                    <div id="tituloForm" class="header">INSERTAR POBLACION</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="3"><ul id="lista-errores"></ul></td>
                                </tr>	
                                <tr>
                                    <td width="14%">Pais (*)</td>
                                    <td width="36%"><select id="idpais" name="Nidpais" class="comboMedio">
                                            <option value="0">Seleccione un pais</option>
                                            <?php while ($row = mysql_fetch_row($resultadop)) { ?>					
                                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>							
                                            <?php } ?>
                                        </select></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Provincia (*)</td>
                                    <td width="36%"><select id="idprovincia" name="Nidprovincia" class="comboMedio">
                                            <option value="0">---</option>
                                        </select></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td width="14%">Poblacion (*)</td>
                                    <td width="36%"><input type="text" name="Adenominacion" id="Adenominacion" class="cajaGrande"></input></td>
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
