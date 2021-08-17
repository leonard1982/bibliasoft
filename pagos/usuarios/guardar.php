<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.usuarios.php");

$usuarios = new usuarios();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$nombre = $_POST["Anombre"];
$login = $_POST["Alogin"];
$correo = $_POST["acorreo"];

if ($accion == "alta") {
    $clave = md5($_POST["Aclave"]);
    $usuarios->nombre = $nombre;
    $usuarios->login = $login;
    $usuarios->email = $correo;
    $usuarios->pswd = $clave;
    $insertado = $usuarios->insert();
    if ($insertado > 0) {
        $mensaje = "El registro ha sido insertado correctamente";
    }
    $idusuario = $insertado;
    $cabecera2 = "NUEVO USUARIO";
}

if ($accion == "modificar") {
    $idusuario = $_POST["id"];   
    $usuarios->email = $correo;    
    if ((empty($_POST["aclave"]))) {
        $actualizado = $usuarios->update_parcial($idusuario);
    } else {
        $clave = md5($_POST["aclave"]);
        $usuarios->pswd = $clave;
        $actualizado = $usuarios->update($idusuario);
    }
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido actualizado correctamente";
    }
    $cabecera2 = "MODIFICAR USUARIO";
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
