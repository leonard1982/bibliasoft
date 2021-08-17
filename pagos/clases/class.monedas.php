<?php

include_once("class.bd.php");

class monedas {

    var $idmoneda;
    var $descmoneda;
    var $database;

    function monedas() {
        $this->database = new MySQL();
    }

    function select($idmoneda) {
        $sql = "SELECT idmoneda,codmoneda,descmoneda FROM tab_monedas WHERE idmoneda = $idmoneda AND borrado=0;";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($descmoneda) {
        $cadena = "1=1";
        if ($descmoneda <> "") {
            $cadena.=" AND descmoneda like '%$descmoneda%'";
        }
        $sql = "SELECT idmoneda,codmoneda,descmoneda FROM tab_monedas WHERE $cadena AND borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idmoneda) {
        $sql = "UPDATE tab_monedas SET borrado=1 WHERE idmoneda = $idmoneda";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_monedas (descmoneda,codmoneda) VALUES ('$this->descmoneda','$this->codmoneda')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idmoneda) {
        $sql = " UPDATE tab_monedas SET descmoneda = '$this->descmoneda', codmoneda = '$this->codmoneda'  WHERE idmoneda = $idmoneda";
        $result = mysql_query($sql);
    }

    function llenar_combo_monedas() {
        $sql = "SELECT idmoneda,descmoneda FROM tab_monedas WHERE borrado=0 ORDER BY descmoneda ASC";
        $result = mysql_query($sql);
        return $result;
    }

}

?>