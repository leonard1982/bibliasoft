<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.provincias.php");
include_once ("../clases/class.paises.php");
include_once ("../clases/class.poblaciones.php");

$codigo = $_GET["codigo"];

$provincias = new provincias();
$paises = new paises();
$poblaciones = new poblaciones();

$row = $poblaciones->select($codigo);
$resultadop = $paises->llenar_combo_paises();
$resultadoprov = $provincias->llenar_combo_provincias_por_pais($row[2]);
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
                    <div id="tituloForm" class="header">MODIFICAR POBLACION</div>
                    <div id="frmBusqueda">
                        <form id="formulario" name="formulario" method="post" action="guardar.php">
                            <hr>
                            <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                <tr>
                                    <td colspan="3"><ul id="lista-errores"></ul></td>
                                </tr>	
                                <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                                    <tr>
                                        <td width="15%">Pais (*)</td>
                                        <td width="85%" colspan="2"><select id="idpais" name="Nidpais" class="comboMedio">
                                                <?php while ($rowp = mysql_fetch_row($resultadop)) {
                                                    if ($rowp[0] == $row[2]) { ?>					
                                                        <option value="<?php echo $rowp[0] ?>" selected><?= $rowp[1] ?></option>							
                                                    <?php } else { ?>
                                                        <option value="<?php echo $rowp[0] ?>"><?= $rowp[1] ?></option>							
                                                    <?php } ?>
                                                <?php } ?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Provincia (*)</td>
                                        <td width="85%" colspan="2"><select id="idprovincia" name="Nidprovincia" class="comboMedio">
                                                <?php while ($rowprov = mysql_fetch_row($resultadoprov)) {
                                                    if ($rowprov[0] == $row[4]) { ?>					
                                                        <option value="<?php echo $rowprov[0] ?>" selected><?= $rowprov[1] ?></option>							
                                                    <?php } else { ?>
                                                        <option value="<?php echo $rowprov[0] ?>"><?= $rowprov[1] ?></option>							
                                                    <?php } ?>
                                                <?php } ?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Poblacion (*)</td>
                                        <td width="85%" colspan="2"><input NAME="Adenominacion" type="text" class="cajaGrande" id="denominacion" maxlength="40" value="<?= $row[1] ?>"></td>
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
