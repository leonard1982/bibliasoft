<?php

include_once("class.bd.php");

class formapago {

    var $idformapago;
    var $descformapago;
    var $database;

    function formapago() {
        $this->database = new MySQL();
    }

    function select($idformapago) {
        $sql = "SELECT idformapago,descformapago,dias1tformapago,descuentoformapago,prefijo FROM tab_formapago WHERE idformapago = $idformapago AND borrado=0;";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($descformapago) {
        $cadena = "1=1";
        if ($descformapago <> "") {
            $cadena.=" AND descformapago like '%$descformapago%'";
        }
        $sql = "SELECT idformapago,descformapago,dias1tformapago,descuentoformapago,prefijo FROM tab_formapago WHERE $cadena AND borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idformapago) {
        $sql = "UPDATE tab_formapago SET borrado=1 WHERE idformapago = $idformapago";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_formapago (descformapago,dias1tformapago,descuentoformapago,prefijo) VALUES ('$this->descformapago','$this->dias1tformapago','$this->descuentoformapago','$this->prefijo')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idformapago) {
        $sql = " UPDATE tab_formapago SET dias1tformapago = '$this->dias1tformapago', descuentoformapago = '$this->descuentoformapago'  WHERE idformapago = $idformapago";
        $result = mysql_query($sql);
    }

    function llenar_combo_formapago() {
        $sql = "SELECT idformapago,descformapago,prefijo FROM tab_formapago WHERE borrado=0 ORDER BY descformapago ASC";
        $result = mysql_query($sql);
        return $result;
    }
    
    function llenar_combo_formapago_pre($prefijo) {
        $sql = "SELECT idformapago,descformapago,prefijo FROM tab_formapago WHERE borrado=0 AND prefijo='".$prefijo."' ORDER BY descformapago ASC";
        $result = mysql_query($sql);
        return $result;
    }

}

?>