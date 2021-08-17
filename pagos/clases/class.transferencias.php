<?php

include_once("class.bd.php");

class transferencias {

    var $ejercicio;
    var $numero;
    var $idpago;
    var $ejerciciopago;
    var $fecha;
    var $idproveedor;
    var $database;

    function transferencias() {
        $this->database = new MySQL();
    }

    function select($ejercicio, $numero) {
        $sql = "SELECT t1.ejercicio,t1.numero,t1.idpago,t1.ejerciciopago,t1.fecha,t1.idproveedor,t1.importe,t1.cuentacargo,
                t1.entidadorigen,t1.sucursalorigen,t1.entidadestino,t1.sucursaldestino,t1.cuentadestino,t1.numfacturas,
                t2.nomproveedor
                FROM tab_transferencias t1 
                INNER JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor 
                WHERE t1.idejercicio =" . $idejercicio . " AND t1.numero=" . $numero . " AND t1.borrado=0";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function delete($ejercicio, $numero) {
        $sql = "UPDATE tab_transferencias SET borrado='1' WHERE ejerciciopago =" . $ejercicio . " AND idpago=" . $numero;
        $result = mysql_query($sql);
    }

    function insert($idpago, $ejerciciopago, $fecha, $importe, $idformapago, $idproveedor, $cuentacargo, $entidadorigen, $sucursalorigen, $entidadestino, $sucursaldestino, $cuentadestino, $numfacturas) {
        $sql = "SELECT MAX(numero) as maximo FROM tab_transferencias WHERE ejercicio=" . $ejerciciopago;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        if (empty($row[0])) {
            $numero = 1;
        } else {
            $numero = $row[0] + 1;
        }
        $this->id = "";
        $sql = "INSERT INTO tab_transferencias (ejercicio,numero,idpago,ejerciciopago,fecha,idproveedor,importe,
                cuentacargo,entidadorigen,sucursalorigen,entidadestino,sucursaldestino,cuentadestino,numfacturas) VALUES 
                (" . $ejerciciopago . "," . $numero . "," . $idpago . "," . $ejerciciopago . ",'" . $fecha . "'," . $idproveedor . ",
                '" . $importe . "','" . $cuentacargo . "','" . $entidadorigen . "','" . $sucursalorigen . "','" . $entidadestino . "'
                ,'" . $sucursaldestino . "','" . $cuentadestino . "','" . $numfacturas . "')";
        $result = mysql_query($sql);
        return $numero;
    }

    function listar($idpago, $ejerciciopago) {
        $sql = "SELECT t1.ejercicio,t1.numero,t1.idpago,t1.ejerciciopago,t1.fecha,t1.idproveedor,t1.importe,t1.cuentacargo,
                t1.entidadorigen,t1.sucursalorigen,t1.entidadestino,t1.sucursaldestino,t1.cuentadestino,t1.numfacturas,
                t2.nomproveedor,t3.codigoentidad,t3.nombreentidad,t4.codsucursal,t4.nombre,t5.codigoentidad,t5.nombreentidad,
                t6.codsucursal,t6.nombre
                FROM tab_transferencias t1 
                INNER JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor
                INNER JOIN tab_entidades t3 ON t1.entidadorigen=t3.identidad
                INNER JOIN tab_sucursales t4 ON t1.sucursalorigen=t4.idsucursal
                INNER JOIN tab_entidades t5 ON t1.entidadestino=t5.identidad
                INNER JOIN tab_sucursales t6 ON t1.sucursaldestino=t6.idsucursal
                WHERE t1.idpago =" . $idpago . " AND t1.ejerciciopago=" . $ejerciciopago;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function imprimir_transferencias($idproveedor, $fechaini, $fechafin) {
        $cadena = "1=1";
        if ($idproveedor != "0") {
            $cadena.=" AND t1.idproveedor=" . $idproveedor;
        }
        $sql = "SELECT t1.importe,t1.cuentacargo,t2.nomproveedor,t3.nombreentidad,t6.numfacturap, t6.ffacturap,t1.cuentadestino 
                FROM tab_transferencias t1 
                LEFT JOIN tab_proveedores t2 ON t1.idproveedor=t2.idproveedor 
                LEFT JOIN tab_entidades t3 ON t1.entidadestino=t3.codigoentidad 
                LEFT JOIN tab_vencimientos t4 ON t1.idpago=t4.numero AND t1.ejerciciopago=t4.ejercicio
                LEFT JOIN tab_ordenpagos t5 ON t4.idpago=t5.idpago AND t4.ejerciciopago=t5.ejerciciopago
                LEFT JOIN tab_facturas t6 ON t5.idpago=t6.idordenpago AND t5.ejerciciopago=t6.ejerciciopago WHERE (t1.fecha BETWEEN '" . $fechaini . "' AND '" . $fechafin . "') AND $cadena";
        $result = mysql_query($sql);
        return $result;
    }

}

?>