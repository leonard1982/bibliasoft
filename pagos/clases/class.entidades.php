<?php

include_once("class.bd.php");

class entidades {

    var $identidad;
    var $codigoentidad;
    var $nombreentidad;
    var $database;

    function entidades() {
        $this->database = new MySQL();
    }

    function select($identidad) {
        $sql = "SELECT identidad,codigoentidad,nombreentidad FROM tab_entidades WHERE identidad = $identidad AND borrado=0;";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($codigoentidad, $nombreentidad) {
        $cadena = "1=1";
        if ($codigoentidad <> "") {
            $cadena.=" AND codigoentidad like '%$codigoentidad%'";
        }
        if ($nombreentidad <> "") {
            $cadena.=" AND nombreentidad like '%$nombreentidad%'";
        }
        $sql = "SELECT identidad,codigoentidad,nombreentidad FROM tab_entidades WHERE $cadena AND borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($identidad) {
        $sql = "UPDATE tab_entidades SET borrado=1 WHERE identidad = $identidad";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_entidades (codigoentidad,nombreentidad) VALUES ('$this->codigoentidad','$this->nombreentidad')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($identidad) {
        $sql = " UPDATE tab_entidades SET codigoentidad = '$this->codigoentidad', nombreentidad = '$this->nombreentidad'  WHERE identidad = $identidad ";
        $result = mysql_query($sql);
    }

    function llenar_combo_entidades() {
        $sql = "SELECT identidad,nombreentidad,codigoentidad FROM tab_entidades WHERE borrado=0 ORDER BY nombreentidad ASC";
        $result = mysql_query($sql);
        return $result;
    }

}

?>