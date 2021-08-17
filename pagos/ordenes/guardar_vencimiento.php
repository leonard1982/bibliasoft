<style>
    .mensaje {
        background-color: #666666;
        font-family: helvetica;
        font-size:8pt;
        color:#fff;
        text-align:center;
        font-weight:bold;
        height:20px;
        vertical-align:middle;
        text-transform:uppercase;
    }
</style>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<script>
    function eliminar_transferencia(numero,ejercicio,idpago,ejerciciopago,importe) {
        if (confirm("Desea eliminar el elemento seleccionado")) { 
            var venci= parent.document.getElementById("vencimiento").value;
            var valorv=parseInt(venci);
            var valor2v=parseInt(valorv-1);
            parent.document.getElementById("vencimiento").value=valor2v;
            location.href="eliminar_transferencia.php?numero=" + numero + "&ejercicio=" + ejercicio + "&idpago=" + idpago + "&ejerciciopago=" + ejerciciopago + "&importe=" + importe;
        }   
    }
    
    function mostrar_transferencia(numero,ejercicio) {
        var ancho=600;
        var alto=400;
        var posicion_x; 
        var posicion_y; 
        posicion_x=(screen.width/2)-(ancho/2); 
        posicion_y=(screen.height/2)-(alto/2); 
        window.open("datos_transferencia.php?numero="+numero+"&ejercicio="+ejercicio, "Datos Transferencia", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
    } 
</script>
<?php
include_once ("../clases/class.vencimientos.php");
include_once ("../clases/class.transferencias.php");
include_once ("../clases/class.ordenes.php");
include ("../funciones/fechas.php");

$vencimientos = new vencimientos();
$transferencias = new transferencias();
$ordenes = new ordenes();

$idpago = $_POST["idpago"];
$ejerciciopago = $_POST["ejerciciopago"];
$fecha = explota($_POST["fecha"]);
$fechavto = explota($_POST["fechavto"]);
$diasvto = $_POST["diasvto"];
$importe = $_POST["importe"];
$idformapago = $_POST["nidfp"];
$idproveedor = $_POST["idproveedor"];
$cuentacargo = $_POST["ctaorigen"];
$cuentadestino = $_POST["ctadestino"];
$entidadorigen = $_POST["nidentidad"];
$sucursalorigen = $_POST["nidsucursal"];
$entidadestino = $_POST["nidentidadd"];
$sucursaldestino = $_POST["nidsucursald"];
$numfacturas = $_POST["numfacturas"];
$prefijo = $_POST["prefijo"];

if ($importe != "") {
    $numvencimiento = $vencimientos->insert($idpago, $ejerciciopago, $fecha, $importe, $idformapago, $idproveedor,$diasvto,$fechavto);
    $actualizar_importes = $ordenes->actualizar_importes($idpago, $ejerciciopago, $importe, 1);
}

if ($prefijo=="T") {
    $numtransferencia = $transferencias->insert($numvencimiento, $ejerciciopago, $fecha, $importe, $idformapago, $idproveedor, $cuentacargo, $entidadorigen, $sucursalorigen, $entidadestino, $sucursaldestino, $cuentadestino, $numfacturas);
}

$rsvencimientos = $vencimientos->listar($idpago, $ejerciciopago);
?>
<table width="100%" border="0">
    <tr class="mensaje">
        <td width="10%">Codigo</td>
        <td width="10%">Fecha</td>
        <td width="10%">Importe</td>
        <td width="40%">Forma de pago</td>
        <td width="10%">Dias Vto.</td>
        <td width="10%">Fecha Vto.</td>
        <td width="5%"></td>
        <td width="5%"></td>
    </tr>
    <?php
    while ($rowv = mysql_fetch_row($rsvencimientos)) {
        echo "<tr><td align='center'><input type='text' class='cajaPequenaR' value='" . $rowv[1] . "/" . $rowv[0] . "' readonly></td>";
        echo "<td align='center'><input type='text' class='cajaPequenaR' value='" . implota($rowv[4]) . "' readonly></td>";
        echo "<td align='center'><input type='text' class='cajaPequenaR' value='" . $rowv[6] . "' readonly></td>";
        echo "<td align='center'><input type='text' class='cajaGrandeR' value='" . $rowv[12] . "' readonly></td>";
        echo "<td align='center'><input type='text' class='cajaPequenaR' value='" . $rowv[14] . "' readonly></td>";
        echo "<td align='center'><input type='text' class='cajaPequenaR' value='" . implota($rowv[15]) . "' readonly></td>";
        if ($rowv[13] == "T") {
            echo "<td align='center'><img src='../img/ver.png' width='16px' heigh='16px' border=0 title='Ver transferencia' onclick='mostrar_transferencia(" . $rowv[1] . "," . $rowv[0] . ")'></td>";
        } else {
            echo "<td></td>";
        }
        echo "<td align='center'><img src='../img/eliminar.png' width='16px' heigh='16px' border=0 title='Eliminar vencimiento' onclick='eliminar_transferencia(" . $rowv[1] . "," . $rowv[0] . "," . $rowv[2] . "," . $rowv[3] . "," . $rowv[6] . ")'></td>";
        echo "</tr>";
    }
    ?>
</table>