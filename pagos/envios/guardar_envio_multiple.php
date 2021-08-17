<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.envios.php");
include_once ("../clases/class.proveedores.php");
include ("../funciones/fechas.php");

$envios = new envios();
$proveedores = new proveedores();

$fechaenvio = explota($_POST["afechaenvio"]);

foreach ($_POST['proveedores'] as $idp) {
    $rsproveedor = $proveedores->select($idp);
    $idproveedor = $idp;
    $cpproveedor = $rsproveedor[23];
    $razonsocial = $rsproveedor[1];
    $direccion = $rsproveedor[16];
    $poblacion = $rsproveedor[22];
    $provincia = $rsproveedor[21];
    $cif = $rsproveedor[3];
    $codigo = "";

    $envios->fechaenvio = $fechaenvio;
    $envios->idproveedor = $idproveedor;
    $envios->razonsocial = $razonsocial;
    $envios->cif = $cif;
    $envios->direccion = $direccion;
    $envios->cpproveedor = $cpproveedor;
    $envios->poblacion = $poblacion;
    $envios->provincia = $provincia;
    $envios->codigo = $codigo;
    $insertado = $envios->insert();
}
if ($insertado > 0) {
    $mensaje = "El registro ha sido insertado correctamente";
} else {
    $mensaje = "No se ha insertado ningun elemento";
}
$idenvio = $insertado;
$cabecera2 = "NUEVO ENVIO";
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
