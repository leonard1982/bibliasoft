<?php

include_once("class.bd.php");

class provincias {

    var $idpais;
    var $idprovincia;
    var $denprovincia;
    var $database;

    function provincias() {
        $this->database = new MySQL();
    }

    function select($idprovincia) {
        $sql = "SELECT t1.idprovincia,t1.denprovincia,t1.idpais,t2.descpais FROM tab_provincias t1 INNER JOIN tab_pais t2 ON t1.idpais=t2.idpais WHERE t1.idprovincia = $idprovincia AND t1.borrado=0";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($idpais, $denprovincia) {
        $cadena = "1=1";
        if (($idpais <> "") && ($idpais <> "0")) {
            $cadena.=" AND t1.idpais=$idpais";
        }
        if ($denprovincia <> "") {
            $cadena.=" AND t1.denprovincia like '%$denprovincia%'";
        }
        $sql = "SELECT t1.idprovincia,t1.denprovincia,t1.idpais,t2.descpais FROM tab_provincias t1 INNER JOIN tab_pais t2 ON t1.idpais=t2.idpais WHERE $cadena AND t1.borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idprovincia) {
        $sql = "UPDATE tab_provincias SET borrado='1' WHERE idprovincia = $idprovincia";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_provincias ( idpais, denprovincia) VALUES ( $this->idpais,'$this->denprovincia'  )";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idprovincia) {
        $sql = " UPDATE tab_provincias SET  denprovincia = '$this->denprovincia', idpais = $this->idpais WHERE idprovincia = $idprovincia ";
        $result = mysql_query($sql);
    }

    function llenar_combo_provincias() {
        $sql = "SELECT idprovincia,denprovincia FROM tab_provincias WHERE borrado=0 ORDER BY denprovincia ASC";
        $result = mysql_query($sql);
        return $result;
    }
    
    function llenar_combo_provincias_por_pais($idpais) {
        $sql = "SELECT idprovincia,denprovincia FROM tab_provincias WHERE idpais=$idpais AND borrado=0 ORDER BY denprovincia ASC";
        $result = mysql_query($sql);
        return $result;
    }

}

?>