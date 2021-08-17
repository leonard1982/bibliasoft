<?php
include ("../seguridad_usuario.inc");
include_once ("../clases/class.empresa.php");

$empresa = new empresa();

$accion = $_POST["accion"];
if (!isset($accion)) {
    $accion = $_GET["accion"];
}

$nombre = $_POST["Anombre"];
$cif = $_POST["Acif"];
$direccion = $_POST["Adireccion"];
$idpais = $_POST["Nidpais"];
$idprovincia = $_POST["Nidprovincia"];
$idpoblacion = $_POST["Nidpoblacion"];
$telefono = $_POST["Atelefono"];
$movil = $_POST["Amovil"];
$fax = $_POST["Afax"];
$cp = $_POST["Acp"];
$web = $_POST["Aweb"];
$email = $_POST["Acorreo"];
$num_reg = $_POST["Nregistro"];
$num_pago = $_POST["Npago"];
$num_vencimiento = $_POST["Nvto"];
$num_transferencia = $_POST["Ntransferencia"];
$identidad = $_POST["nidentidad"];
$idsucursal = $_POST["nidsucursal"];
$iban = $_POST["aiban"];

if ($accion == "modificar") {
    $codigo = $_POST["id"];
    $empresa->nombre = $nombre;
    $empresa->cif = $cif;
    $empresa->direccion = $direccion;
    $empresa->idpais = $idpais;
    $empresa->idprovincia = $idprovincia;
    $empresa->idpoblacion = $idpoblacion;
    $empresa->telefono = $telefono;
    $empresa->movil = $movil;
    $empresa->fax = $fax;
    $empresa->cp = $cp;
    $empresa->web = $web;
    $empresa->email = $email;
    $empresa->num_reg = $num_reg;
    $empresa->num_pago = $num_pago;
    $empresa->num_vencimiento = $num_vencimiento;
    $empresa->num_transferencia = $num_transferencia;
    $empresa->identidad = $identidad;
    $empresa->idsucursal = $idsucursal;
    $empresa->iban = $iban;
    $actualizado = $empresa->update($codigo);
    if ($actualizado == 0) {
        $mensaje = "El registro ha sido modificado correctamente";
    }
    $idempresa = $codigo;
    if ($_FILES['logo']['tmp_name']!="") {
        unlink('./logo/'.$idempresa.'.jpg');
        copy($_FILES['logo']['tmp_name'],'./logo/'.$idempresa.'.jpg');
    }
    $cabecera2 = "MODIFICAR DATOS EMPRESA";
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
