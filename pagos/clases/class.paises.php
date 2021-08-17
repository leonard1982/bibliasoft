<?php

include_once("class.bd.php");

class paises {

    var $idpais;
    var $descpais;
    var $database;

    function paises() {
        $this->database = new MySQL();
    }

    function select($idpais) {
        $sql = "SELECT idpais,descpais FROM tab_pais WHERE idpais = $idpais AND borrado=0;";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($descpais) {
        $cadena = "1=1";
        if ($descpais <> "") {
            $cadena.=" AND descpais like '%$descpais%'";
        }
        $sql = "SELECT idpais,descpais FROM tab_pais WHERE $cadena AND borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idpais) {
        $sql = "UPDATE tab_pais SET borrado=1 WHERE idpais = $idpais";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_pais (descpais) VALUES ('$this->descpais')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idpais) {
        $sql = " UPDATE tab_pais SET  descpais = '$this->descpais'  WHERE idpais = $idpais ";
        $result = mysql_query($sql);
    }

    function llenar_combo_paises() {
        $sql = "SELECT idpais,descpais FROM tab_pais WHERE borrado=0 ORDER BY descpais ASC";
        $result = mysql_query($sql);
        return $result;
    }

}

?>