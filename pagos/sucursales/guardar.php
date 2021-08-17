<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.sucursales.php");

$sucursales = new sucursales();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$nombre = $_POST["Adenominacion"];
$codsucursal = $_POST["Acodsucursal"];
$identidad = $_POST["Nidentidad"];
$idpais = $_POST["Nidpais"];
$idprovincia = $_POST["Nidprovincia"];
$idpoblacion = $_POST["Nidpoblacion"];
$direccion = $_POST["adireccion"];
$telefono = $_POST["atelefono"];
$cp = $_POST["acodpostal"];
$contacto = $_POST["acontacto"];
$correo = $_POST["acorreo"];

if ($accion == "alta") {
    $sucursales->nombre = $nombre;
    $sucursales->codsucursal = $codsucursal;
    $sucursales->identidad = $identidad;
    $sucursales->idpais = $idpais;
    $sucursales->idprovincia = $idprovincia;
    $sucursales->idpoblacion = $idpoblacion;
    $sucursales->direccion = $direccion;
    $sucursales->telefono = $telefono;
    $sucursales->cp = $cp;
    $sucursales->contacto = $contacto;
    $sucursales->correo = $correo;
    $insertado = $sucursales->insert();
    if ($insertado > 0) {
        $mensaje = "El registro ha sido dado de alta correctamente";
    }
    $idsucursal = $insertado;
    $cabecera2 = "INSERTAR SUCURSAL BANCARIA";
}

if ($accion == "modificar") {
    $codigo = $_POST["id"];
    $sucursales->idpais = $idpais;
    $sucursales->idprovincia = $idprovincia;
    $sucursales->idpoblacion = $idpoblacion;
    $sucursales->direccion = $direccion;
    $sucursales->telefono = $telefono;
    $sucursales->cp = $cp;
    $sucursales->contacto = $contacto;
    $sucursales->correo = $correo;
    $actualizado = $sucursales->update($codigo);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido modificado correctamente";
    }
    $idsucursal = $codigo;
    $cabecera2 = "MODIFICAR SUCURSAL BANCARIA";
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
