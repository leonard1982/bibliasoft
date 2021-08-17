<?php

include_once("class.bd.php");

class ejercicios {

    var $idejercicio;
    var $ejercicio;
    var $database;

    function ejercicios() {
        $this->database = new MySQL();
    }

    function select($idejercicio) {
        $sql = "SELECT idejercicio,ejercicio,estado FROM tab_ejercicios WHERE idejercicio = ".$idejercicio;
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($ejercicio) {
        $cadena = "1=1";
        if ($ejercicio <> "") {
            $cadena.=" AND ejercicio like '%$ejercicio%'";
        }
        $sql = "SELECT idejercicio,ejercicio,estado FROM tab_ejercicios WHERE ".$cadena;
        $result = mysql_query($sql);
        return $result;
    }

    function activar($idejercicio) {
        $sql = "UPDATE tab_ejercicios SET estado=0";
        $result = mysql_query($sql);
        $sql = "UPDATE tab_ejercicios SET estado=1 WHERE idejercicio =".$idejercicio;
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_ejercicios (ejercicio) VALUES ('$this->ejercicio')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($idejercicio) {
        $sql = " UPDATE tab_ejercicios SET  ejercicio = '$this->ejercicio'  WHERE idejercicio =". $idejercicio;
        $result = mysql_query($sql);
    }

    function llenar_combo_ejercicios() {
        $sql = "SELECT idejercicio,ejercicio FROM tab_ejercicios ORDER BY ejercicio ASC";
        $result = mysql_query($sql);
        return $result;
    }
    
    function ejercicio_activo() {
        $sql = "SELECT idejercicio,ejercicio FROM tab_ejercicios WHERE estado=1";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

}

?>