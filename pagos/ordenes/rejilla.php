<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include_once ("../funciones/fechas.php");
include ("../clases/class.ordenes.php");

$_SESSION['mantordidp'] = $_POST["nidproveedor"];
$_SESSION['mantordeje'] = $_POST["ejercicio"];
$_SESSION['mantordnom'] = $_POST["anombreproveedor"];
$_SESSION['mantordsit'] = $_POST["situacion"];

$idproveedor = $_POST["nidproveedor"];
$ejercicio = $_POST["ejercicio"];
$situacion = $_POST["situacion"];

$ordenes = new ordenes();

$resultado = $ordenes->buscar($idproveedor, $ejercicio, $situacion);
?>
<html>
    <head>
        <title>Ordenes de Pago</title>
        <style type="text/css" title="currentStyle">
            @import "../ajax/css/demo_page.css";
            @import "../ajax/css/demo_table.css";
            .Estilo1 {
                color: #AEA962;
                font-weight: bold;
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 10pt;
            }
            body {
                margin-top: 0px;
            }
        </style>
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="../ajax/js/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').dataTable( {
                    "sPaginationType": "full_numbers",
<?php if ($operacion == "si") { ?>"bStateSave": false<?php } ?>
<?php if ($operacion == "no") { ?>"bStateSave": true<?php } ?>					
        } );
    } );
                                    
    function conmutacion() {
        document.getElementById("nueva").style.display="none";
        document.getElementById("container").style.display="block";
    }
		
    function ver(codigo,ejercicio) {
        parent.location.href="ver.php?codigo=" + codigo + "&ejercicio=" + ejercicio;
    }
    
//    function imprimir(codigo,ejercicio) {
//        window.open("../pdf/res/orden_de_pago.php?idpago="+codigo+"&ejercicio="+ejercicio);
//    }
    
    function documentos(codigo,ejercicio) {
        parent.location.href="documentos.php?codigo=" + codigo + "&ejercicio=" + ejercicio;
    }
    
    function cobrar_vencimientos(codigo,ejercicio) {
        parent.location.href="cobrar_vencimientos.php?codigo=" + codigo + "&ejercicio=" + ejercicio;
    }
    
    function vencimientos(codigo,ejercicio) {
        parent.location.href="vencimientos.php?codigo=" + codigo + "&ejercicio=" + ejercicio;
    }
		
    function modificar(codigo,ejercicio) {
        parent.location.href="modificar.php?codigo=" + codigo + "&ejercicio=" + ejercicio;
    }
    
    function eliminar(codigo,ejercicio) {
        if (confirm("Desea eliminar el elemento seleccionado")) parent.location.href="eliminar.php?codigo=" + codigo + "&ejercicio=" + ejercicio;
    }
        </script>
    </head>	
    <body id="dt_example" class="example_alt_pagination" onload="conmutacion()">
        <div id="nueva" style="display:block">
            <table width="100%"  border="0">
                <tr>
                    <td>&nbsp;</td>
                    <td><div align="center"><span class="Estilo1">Cargando resultados </span></div></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><div align="center"><img src="../img/cargando.gif" width="128" height="128"></div></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><div align="center"><span class="Estilo1">Espere un momento </span></div></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
        <div id="container" style="display:none">			
            <div id="demo">
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                    <thead>
                        <tr>
                            <th width="12%">N. ORDEN</th>
                            <th width="40%">PROVEEDOR</th>
                            <th width="9%">FECHA</th>
                            <th width="16%">IMPORTE</th>
                            <th width="5%">IMPRESA</th>
                            <th width="3%">&nbsp;</th>
                            <th width="3%">&nbsp;</th>
                            <th width="3%">&nbsp;</th>
                            <th width="3%">&nbsp;</th>
                            <th width="3%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        while ($row = mysql_fetch_row($resultado)) {
                            if ($contador % 2) {
                                $fondolinea = "gradeA";
                            } else {
                                $fondolinea = "gradeA";
                            }
                            ?>
                            <tr class="<?= $fondolinea ?>">
                                <td width="12%"><div align="center"><?= $row[0] . "/" . $row[1] ?></div></td>
                                <td width="40%"><div align="center"><?= $row[13] ?></div></td>
                                <td width="9%"><div align="center"><?= implota($row[3]) ?></div></td>
                                <td width="16%"><div align="center"><?= $row[4] . " " . $row[18] ?></div></td>
                                <?php
                                if ($row[12] == 0) {
                                    $cad = "NO";
                                } else {
                                    $cad = "SI";
                                }
                                ?>
                                <td widht="5%"><div align="center"><?= $cad ?></div></td>
                                <td width="3%"><div align="center"><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" onClick="ver('<?= $row[0] ?>','<?= $row[1] ?>')" title="Visualizar"></a></div></td>                               
                                <?php
                                if (($permisos == 'escritura') && ($row[21]==0)) { ?>
                                <td width="3%"><div align="center"><a href="#"><img src="../img/doc.png" width="16" height="16" border="0" onClick="documentos('<?= $row[0] ?>','<?= $row[1] ?>')" title="Documentos"></a></div></td><?php } else { ?><td width="4%"></td><?php } ?>                                
                                <?php
                                if (($permisos == 'escritura') && ($row[21]==0)) {
                                    ?><td width="3%"><div align="center"><a href="#"><img src="../img/dinero.jpg" width="16" height="16" border="0" onClick="vencimientos('<?= $row[0] ?>','<?= $row[1] ?>')" title="Vencimientos"></a></div></td><?php } else { ?><td width="4%"></td><?php } ?>                  
                                <?php
                                if (($permisos == 'escritura') && ($row[21]==0)) {
                                    ?><td width="3%"><div align="center"><a href="#"><img src="../img/pagando.png" width="16" height="16" border="0" onClick="cobrar_vencimientos('<?= $row[0] ?>','<?= $row[1] ?>')" title="Pagar vencimientos"></a></div></td><?php } else { ?><td width="4%"></td><?php } ?>                  
                                
                                    <?php
                                if (($permisos == 'escritura') && ($row[21]==0)) {
                                    ?><td width="3%"><div align="center"><a href="#"><img src="../img/eliminar.png" width="16" height="16" border="0" onClick="eliminar('<?= $row[0] ?>','<?= $row[1] ?>')" title="Eliminar"></a></div></td><?php } else { ?><td width="4%"></td><?php } ?>                  
                            </tr>
                            <?php
                            $contador++;
                        }
                        ?>			
                        </tr>
                    </tbody>
                </table>
                </body>
