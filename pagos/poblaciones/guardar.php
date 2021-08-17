<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.poblaciones.php");

$poblaciones = new poblaciones();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$denpoblacion = $_POST["Adenominacion"];
$idpais = $_POST["Nidpais"];
$idprovincia = $_POST["Nidprovincia"];

if ($accion == "alta") {
    $poblaciones->denpoblacion = $denpoblacion;
    $poblaciones->idprovincia = $idprovincia;
    $poblaciones->idpais = $idpais;
    $insertado = $poblaciones->insert();
    if ($insertado > 0) {
        $mensaje = "El registro ha sido dado de alta correctamente";
    }
    $idpoblacion = $insertado;
    $cabecera2 = "INSERTAR POBLACION";
}

if ($accion == "modificar") {
    $codigo = $_POST["id"];
    $poblaciones->denpoblacion = $denpoblacion;
    $poblaciones->idprovincia = $idprovincia;
    $poblaciones->idpais = $idpais;
    $actualizado = $poblaciones->update($codigo);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido modificado correctamente";
    }
    $idpoblacion = $codigo;
    $cabecera2 = "MODIFICAR POBLACION";
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
                                <td width="100%" class="mensaje"><?php echo $mensaje; ?></td>
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
