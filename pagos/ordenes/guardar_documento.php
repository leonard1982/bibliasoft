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
    function eliminar(iddoc,idarchivo,idpago,ejerciciopago) {
        if (confirm("Desea eliminar el elemento seleccionado")) 
            location.href="eliminar_documento.php?iddoc=" + iddoc + "&idarchivo=" + idarchivo + "&idpago=" + idpago + "&ejerciciopago=" + ejerciciopago;
}
</script>
<?php
include_once ("../clases/class.ordenes.php");

$ordenes = new ordenes();

$idpago = $_POST["idpago"];
$ejerciciopago = $_POST["ejerciciopago"];
$denominacion = $_POST["dendoc"];

if (!empty($denominacion)) {

    $idarchivo = $ordenes->insertar_doc($idpago, $ejerciciopago, $denominacion);

    if (isset($_FILES['pdforden'])) {
        $nombre_archivo = $idarchivo . ".pdf";
        unlink('./ordenpdf/' . $nombre_archivo);
        copy($_FILES['pdforden']['tmp_name'], './ordenpdf/' . $nombre_archivo);
    }
}
$rsordenes = $ordenes->listar_doc($idpago, $ejerciciopago);
?>
<fieldset>
    <legend>Documentos</legend>
    <table width="100%" border="0">
        <tr class="mensaje">
            <td width="70%">Denominacion</td>
            <td width="15%">Archivo</td>
            <td width="15%">Eliminar</td>
        </tr>
        <?php
        while ($rowdoc = mysql_fetch_row($rsordenes)) {
            echo "<tr><td><input type='text' class='cajaExtraGrandeR' value='" . $rowdoc[1] . "' readonly></td><td align='center'><a href='./ordenpdf/" . $rowdoc[0] . ".pdf' target='_blank'><img src='../img/pdf.png' border='0' width='16' height='16'></td>";
           echo "<td align='center'><img src='../img/eliminar.png' border='0' width='16' height='16' onclick=\"eliminar('".$rowdoc[0]."','".$rowdoc[0]."','".$idpago."','".$ejerciciopago."')\"></td></tr>";
        }
        ?>
    </table>
</fieldset>