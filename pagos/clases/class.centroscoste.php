<?php

include_once("class.bd.php");

class centroscoste {

    var $idcentroscoste;
    var $codigo_interno;
    var $descripcion;
    var $database;

    function centroscoste() {
        $this->database = new MySQL();
    }

    function select($idcentroscoste) {
        $sql = "SELECT idcentroscoste,codigo_interno,descripcion FROM tab_centroscoste 
                WHERE idcentroscoste = ".$idcentroscoste." AND borrado=0;";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($descripcion) {
        $cadena = "1=1";
        if ($descripcion <> "") {
            $cadena.=" AND descripcion like '%$descripcion%'";
        }
        $sql = "SELECT idcentroscoste,codigo_interno,descripcion FROM tab_centroscoste WHERE $cadena AND borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($idcentroscoste) {
        $sql = "UPDATE tab_centroscoste SET borrado=1 WHERE idcentroscoste =".$idcentroscoste;
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_centroscoste (descripcion,codigo_interno) VALUES ('$this->descripcion','$this->codigo_interno')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idcentroscoste) {
        $sql = " UPDATE tab_centroscoste SET descripcion = '$this->descripcion', codigo_interno = '$this->codigo_interno'  WHERE idcentroscoste =".$idcentroscoste;
        $result = mysql_query($sql);
    }

    function llenar_combo_centroscoste() {
        $sql = "SELECT idcentroscoste,descripcion FROM tab_centroscoste WHERE borrado=0 ORDER BY descripcion ASC";
        $result = mysql_query($sql);
        return $result;
    }

}

?>