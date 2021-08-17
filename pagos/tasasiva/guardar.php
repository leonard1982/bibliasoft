<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.tasasiva.php");
include ("../funciones/fechas.php");

$tasasiva = new tasasiva();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$idtipoiva = $_POST["Zidtipoiva"];
$porcentasa_iva = $_POST["qporcentajetasa"];
$porcentretasa_iva = $_POST["qporcentajeentre"];
$fechatasa_iva = explota($_POST["fechatasa"]);

if ($accion == "alta") {
    $tasasiva->idtipoiva = $idtipoiva;
    $tasasiva->porcentasa_iva = $porcentasa_iva;
    $tasasiva->porcentretasa_iva = $porcentretasa_iva;
    $tasasiva->fechatasa_iva = $fechatasa_iva;
    $insertado = $tasasiva->insert();
    if ($insertado > 0) {
        $mensaje = "El registro ha sido insertado correctamente";
    }
    $idtasaiva = $insertado;
    $cabecera2 = "NUEVA TASA DE IGIC";
}

if ($accion == "modificar") {
    $idtasaiva = $_POST["id"];
    $tasasiva->idtipoiva = $idtipoiva;
    $tasasiva->porcentasa_iva = $porcentasa_iva;
    $tasasiva->porcentretasa_iva = $porcentretasa_iva;
    $tasasiva->fechatasa_iva = $fechatasa_iva;
    $actualizado = $tasasiva->update($idtasaiva);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido actualizado correctamente";
    }
    $cabecera2 = "MODIFICAR TASA DE IGIC";
}
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
                    <div id="tituloForm" class="header"><?php echo $cabecera2 ?></div>
                    <div id="frmBusqueda">
                        <hr>
                        <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
                            <tr>
                                <td width="100%" colspan="2" class="mensaje"><?php echo $mensaje; ?></td>
                            </tr>				
                        </table>
                        <hr>
                    </div>
                    <div id="botonBusqueda">
                        <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
                    </div>
                </div>
            </div>
    </body>
</html>
