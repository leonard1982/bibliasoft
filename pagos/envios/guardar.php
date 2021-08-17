<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.envios.php");
include ("../funciones/fechas.php");

$envios = new envios();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$fechaenvio = explota($_POST["fechaenvio"]);
$idproveedor = $_POST["nidproveedor"];
$razonsocial = $_POST["anombreproveedor"];
$cif = $_POST["cif"];
$direccion = $_POST["direccion"];
$cpproveedor = $_POST["cpproveedor"];
$poblacion = $_POST["poblacion"];
$provincia = $_POST["provincia"];
$codigocer = $_POST["codigocer"];

if ($accion == "alta") {
    $envios->fechaenvio = $fechaenvio;
    $envios->idproveedor = $idproveedor;
    $envios->razonsocial = $razonsocial;
    $envios->cif = $cif;
    $envios->direccion = $direccion;
    $envios->cpproveedor = $cpproveedor;
    $envios->poblacion = $poblacion;
    $envios->provincia = $provincia;
    $envios->codigo = $codigocer;
    $insertado = $envios->insert();
    if ($insertado > 0) {
        $mensaje = "El registro ha sido insertado correctamente";
    }
    $idenvio = $insertado;
    $cabecera2 = "NUEVO ENVIO";
}

if ($accion == "modificar") {
    $idenvio = $_POST["id"];
    $envios->fechaenvio = $fechaenvio;
    $envios->idproveedor = $idproveedor;
    $envios->razonsocial = $razonsocial;
    $envios->cif = $cif;
    $envios->direccion = $direccion;
    $envios->cpproveedor = $cpproveedor;
    $envios->poblacion = $poblacion;
    $envios->provincia = $provincia;
    $envios->codigo = $codigocer;
    $actualizado = $envios->update($idenvio);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido actualizado correctamente";
    }
    $cabecera2 = "MODIFICAR ENVIO";
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
