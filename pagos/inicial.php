<?php
session_name("apli_ferro");
session_start();

include_once ("./clases/class.autenticar.php");
include_once ("./clases/class.accesos.php");
include_once ("./clases/class.usuarios.php");

$usuario = $_POST['usuario'];
$clave = md5($_POST['clave']);

$autenticar = new autenticar();
$accesos = new accesos();
$usuarios = new usuarios();

$usuario = $autenticar->autenticacion($usuario, $clave);

$nombre = $usuario[0];

if ($nombre == "") {
    ?>
    <script>
        alert ("No tiene permiso para acceder a esta aplicacion");
        location.href="index.php";
    </script>
    <?php
} else {
    $_SESSION['login'] = $usuario[1];
    $_SESSION['idusuario'] = $usuario[2];
    $insertar = $accesos->insert($usuario[2]);
    $rsfpadres = $usuarios->funciones_padres();
}
?>
<html>
    <head>
        <title>Programa .:FERRO:.</title>
        <script language="JavaScript" src="menu/JSCookMenu.js"></script>
        <link rel="stylesheet" href="menu/theme.css" type="text/css">
        <script language="JavaScript" src="menu/theme.js"></script>
        <script language="JavaScript">
            <!--
            var MenuPrincipal = [
                [null,'Inicio','central2.php','principal','Inicio'],
<?php
while ($rowpadres = mysql_fetch_row($rsfpadres)) {
    $hijos = $usuarios->tiene_hijos_autorizados($usuario[2], $rowpadres[0]);
    if ($hijos > 0) {
        echo "[null,'" . $rowpadres[1] . "',null,null,'" . $rowpadres[1] . "',";
        $rsfhijos = $usuarios->funciones_hijos($rowpadres[0]);
        while ($rowhijos = mysql_fetch_row($rsfhijos)) {
            $rspermisos = $usuarios->permisos_usuario_por_funcion($usuario[2], $rowhijos[0]);
            if ($rspermisos[0] != 'prohibido') {
                echo "[null,'" . $rowhijos[1] . "','" . $rowhijos[4] . "?idfuncion=" . $rowhijos[0] . "','principal','" . $rowhijos[1] . "'],";
            }
        }
        echo "],";
    }
}
?>
        [null,'Salir','desconectar.php','principal','Salir']
    ];

    --></script>
        <style type="text/css">
            body { background-color: rgb(255, 255,255);
                   background-image: url(images/superior.png);
                   background-repeat: no-repeat;
                   margin: 0px;
            }

            #MenuAplicacion { margin-left: 10px;
                              margin-top: 0px;
            }


            .Estilo1 {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 9px;
            }
        </style>
    </head>
    <body onLoad="autofitIframe('principal')">
        <div align="center">
            <img src="img/bannersuperior.jpg">
        </div>
        <div align="center" class="Estilo1">
            || Usuario: <?= $nombre ?> ||
        </div>
        <div id="MenuAplicacion" align="center"></div>
        <script language="JavaScript">
            <!--
            cmDraw ('MenuAplicacion', MenuPrincipal, 'hbr', cmThemeGray, 'ThemeGray');
            -->
        </script>
        <!--
        <iframe src="central2.php" name="principal" title="principal" width="100%" height="1300px" frameborder=0 scrolling="no" style="margin-left: 0px; margin-right: 0px; margin-top: 2px; margin-bottom: 0px;"></iframe></body>
        -->
        <iframe onload="window.scrollTo(0,0)" src="./central2.php" name="principal" title="principal" width="100%" height="1000px" frameborder=0 scrolling="auto" style="margin-left: 0px; margin-right: 0px; margin-top: 2px; margin-bottom: 0px;"></iframe></body></html>