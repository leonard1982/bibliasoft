<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.tipoiva.php");

$tipoiva = new tipoiva();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$desctipo_iva = $_POST["Adenominacion"];
$idtipo_iva = $_POST["Aidtipo_iva"];

if ($accion == "alta") {
    $tipoiva->desctipo_iva = $desctipo_iva;
    $tipoiva->idtipo_iva = $idtipo_iva;
    $insertado = $tipoiva->insert();
    if ($insertado > 0) {
        $mensaje = "El registro ha sido insertado correctamente";
    }
    $codtipoiva = $insertado;
    $cabecera2 = "NUEVO TIPO DE IGIC";
}

if ($accion == "modificar") {
    $codtipoiva = $_POST["id"];
    $tipoiva->desctipo_iva = $desctipo_iva;
    $tipoiva->idtipo_iva = $idtipo_iva;
    $actualizado = $tipoiva->update($codtipoiva);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido actualizado correctamente";
    }
    $cabecera2 = "MODIFICAR TIPO DE IGIC";
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
