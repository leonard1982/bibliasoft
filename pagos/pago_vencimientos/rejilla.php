<?php
include ("../seguridad_usuario.inc");
include ("../opcion_menu.inc");
include ("../clases/class.vencimientos.php");
include ("../funciones/fechas.php");

$_SESSION['mantimporte'] = $_POST["importe"];

$importe = $_POST["importe"];

$vencimientos = new vencimientos();

$resultado = $vencimientos->buscar_importe($importe);
?>
<html>
    <head>
        <title>Vencimientos</title>
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
		
    function pagar(ejercicio,numero) {
        parent.location.href="pagar.php?ejercicio=" + ejercicio + "&numero="+numero;
    }
		
  </script>
    </head>	
    <body id="dt_example" class="example_alt_pagination" onload="conmutacion()">
        <div id="nueva" style="display:block; background-color: #FFF; text-align: center">
            <img src="../img/cargando.gif" width="128" height="128">
        </div>
        <div id="container" style="display:none">			
            <div id="demo">
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                    <thead>
                        <tr>
                            <th width="8%">N. REG.</th>
                            <th width="10%">FECHA</th>
                            <th width="10%">IMPORTE</th>
                            <th width="39%">PROVEEDOR</th>
                            <th width="10%">F.P.</th>
                            <th width="10%">DIAS VTO.</th>
                            <th width="10%">FECHA VTO.</th>
                            <th width="3%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        while ($row = mysql_fetch_row($resultado)) {
                            if ($contador % 2) {
                                $fondolinea = "itemParTabla";
                            } else {
                                $fondolinea = "itemImparTabla";
                            }
                            ?>
                            <tr class="<?= $fondolinea ?>">
                                <td width="8%"><div align="center"><?= $row[1]."/".$row[0] ?></div></td>
                                <td width="10%"><div align="center"><?= implota($row[4]) ?></div></td>
                                <td width="10%"><div align="center"><?= number_format($row[6],2,",",".") ?></div></td>
                                <td width="39%"><div align="center"><?= $row[10] ?></div></td>
                                <td width="10%"><div align="center"><?= $row[13] ?></div></td>
                                <td width="10%"><div align="center"><?= $row[14] ?></div></td>
                                <td width="10%"><div align="center"><?= implota($row[15]) ?></div></td>
                                <?php if ($permisos == 'escritura') { ?><td width="3%"><div align="center"><a href="#"><img src="../img/dinero.jpg" width="16" height="16" border="0" onClick="pagar('<?= $row[0] ?>','<?= $row[1] ?>')" title="Pagar Vencimiento"></a></div></td><?php } else { ?><td width="3%"></td><?php } ?>
                            </tr>
                            <?php
                            $contador++;
                        }
                        ?>			
                        </tr>
                    </tbody>
                </table>
                </body>
                </html>
