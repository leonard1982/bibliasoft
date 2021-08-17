<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.trabajadores.php");

$trabajadores = new trabajadores();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$nomtrabajador = $_POST["Anombre"];
$apetrabajador = $_POST["Aapellidos"];
$dirtrabajador = $_POST["adireccion"];
$nsstrabajador = $_POST["anumsegsocial"];
$teltrabajador = $_POST["atelefono"];
$moviltrabajador = $_POST["amovil"];
$emailtrabajador = $_POST["acorreo"];

if ($accion == "alta") {
    $trabajadores->nomtrabajador = $nomtrabajador;
    $trabajadores->apellidostrabajador = $apetrabajador;
    $trabajadores->dirtrabajador = $dirtrabajador;
    $trabajadores->nsstrabajador = $nsstrabajador;
    $trabajadores->teltrabajador = $teltrabajador;
    $trabajadores->moviltrabajador = $moviltrabajador;
    $trabajadores->emailtrabajador = $emailtrabajador;
    $insertado = $trabajadores->insert();
    if ($insertado > 0) {
        $mensaje = "El registro ha sido insertado correctamente";
    }
    $idtrabajador = $insertado;
    @unlink('./fotos/'.$insertado.'.jpg');
    if (!empty($_FILES['foto']['tmp_name'])) {
        copy($_FILES['foto']['tmp_name'],'./fotos/'.$insertado.'.jpg');
    } else {
        copy('./fotos/nd.jpg','./fotos/'.$insertado.'.jpg');
    }
    $cabecera2 = "NUEVO TRABAJADOR";
}

if ($accion == "modificar") {
    $idtrabajador = $_POST["id"];
    $trabajadores->nomtrabajador = $nomtrabajador;
    $trabajadores->apellidostrabajador = $apetrabajador;
    $trabajadores->dirtrabajador = $dirtrabajador;
    $trabajadores->nsstrabajador = $nsstrabajador;
    $trabajadores->teltrabajador = $teltrabajador;
    $trabajadores->moviltrabajador = $moviltrabajador;
    $trabajadores->emailtrabajador = $emailtrabajador;
    $actualizado = $trabajadores->update($idtrabajador);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido actualizado correctamente";
    }
    if ($_FILES['foto']['tmp_name']!="") {
        unlink('./fotos/'.$idtrabajador.'.jpg');
        copy($_FILES['foto']['tmp_name'],'./fotos/'.$idtrabajador.'.jpg');
    }
    $cabecera2 = "MODIFICAR TRABAJADOR";
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
