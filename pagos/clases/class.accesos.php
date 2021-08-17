<?php

include_once("class.bd.php");

class accesos {

    var $idusuario;
    var $database;

    function accesos() {
        $this->database = new MySQL();
    }

    function buscar($idusuario) {
        $cadena = "1=1";
        if (($idusuario <> "") && ($idusuario <> "0")) {
            $cadena.=" AND t1.idusuario=$idusuario";
        }
        $sql = "SELECT t1.idusuario,t1.fecha,t2.nombre,t2.login FROM tab_accesos t1
                INNER JOIN tab_usuarios t2 ON t1.idusuario=t2.idusuario
                 WHERE $cadena AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idusuario,$fecha) {
        $sql = "UPDATE tab_accesos SET borrado=1 WHERE idusuario = ".$idusuario." AND fecha='".$fecha."'";
        $result = mysql_query($sql);
    }

    function insert($idusuario) {
        $this->id = "";
        $sql = "INSERT INTO tab_accesos (idusuario) VALUES (".$idusuario.")";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }
}

?>