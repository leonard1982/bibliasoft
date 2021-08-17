<div align="right" style="background-color: C0C0C0">
    <a href="#" onclick="cerrar()">[X]</a>
    <a href="#" onclick="cerrar()">Cerrar</a>
</div>
<br>
<form name="fbuscar" id="fbuscar">
    Nombre de proveedor: <input type="text" id="nameprov" name="nameprov" class="cajaMedia">
    <input type="button" value="Buscar" id="btbuscar" name="btbuscar">
</form>
<table cellpadding="0" cellspacing="0" border="0" class="fuente8" width="95%">
    <thead>
        <tr>
            <th width="60%" id="tituloForm" class="header">NOMBRE</th>
            <th width="45%" id="tituloForm" class="header">CIF</th>
            <th width="5%" id="tituloForm" class="header">&nbsp;</th>
        </tr>
    </thead>
</table>
<div id="rejillaprov"  name="rejillaprov" style="border:1px solid black; height: 68%;overflow: scroll;overflow-y:scroll;overflow-x:hidden">			
        <table cellpadding="0" cellspacing="0" border="0" class="fuente8" width="95%">
            <tbody>
                <?php
                $contador = 0;
                while ($row = mysql_fetch_row($resultado)) {
                    $codproveedor = $row[37];
                    $codp = substr($codproveedor, 0, 4);
                    $codf = substr($codproveedor, 4, 4);
                    if ($codp == "4000") {
                        $referencia = "0" . $codf;
                    } else {
                        $referencia = "9" . $codf;
                    }
                    if ($contador % 2) {
                        $fondolinea = "gradeA";
                    } else {
                        $fondolinea = "gradeA";
                    }
                    ?>
                    <tr class="<?= $fondolinea ?>">
                        <td width="80%"><div align="center"><?= $row[1] ?></div></td>
                        <td width="15%"><div align="center"><?= $row[3] ?></div></td>
                        <td width="5%"><div align="center"><a href="#"><img src="../img/observaciones.png" width="16" height="16" border="0" onClick="sel_proveedor('<?= $row[0] ?>','<?= $row[1] ?>','<?= $row[38] ?>','<?= $row[35] ?>','<?= $row[31] ?>','<?= $referencia ?>')" title="Visualizar"></a></div></td>
                    </tr>
    <?php
    $contador++;
}
?>			
                </tr>
            </tbody>
        </table>
    </div>
