<?php

include_once("class.bd.php");

class tipoiva {

    var $codtipoiva;
    var $desctipo_iva;
    var $database;

    function tipoiva() {
        $this->database = new MySQL();
    }

    function select($codtipoiva) {
        $sql = "SELECT codtipoiva,idtipo_iva,desctipo_iva FROM tab_tipoiva WHERE codtipoiva = $codtipoiva AND borrado=0;";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

    function buscar($desctipo_iva) {
        $cadena = "1=1";
        if ($desctipo_iva <> "") {
            $cadena.=" AND desctipo_iva like '%$desctipo_iva%'";
        }
        $sql = "SELECT codtipoiva,idtipo_iva,desctipo_iva FROM tab_tipoiva WHERE $cadena AND borrado=0";
        $result = mysql_query($sql);
        return $result;
    }

    function delete($codtipoiva) {
        $sql = "UPDATE tab_tipoiva SET borrado=1 WHERE codtipoiva = $codtipoiva";
        $result = mysql_query($sql);
    }

    function insert() {
        $this->id = "";
        $sql = "INSERT INTO tab_tipoiva (idtipo_iva,desctipo_iva) VALUES ('$this->idtipo_iva','$this->desctipo_iva')";
        $result = mysql_query($sql);
        $ultimo = mysql_insert_id();
        return $ultimo;
    }

    function update($codtipoiva) {
        $sql = " UPDATE tab_tipoiva SET  idtipo_iva = '$this->idtipo_iva', desctipo_iva = '$this->desctipo_iva'  WHERE codtipoiva = $codtipoiva";
        $result = mysql_query($sql);
    }

    function llenar_combo_tiposiva() {
        $sql = "SELECT codtipoiva,desctipo_iva FROM tab_tipoiva WHERE borrado=0 ORDER BY desctipo_iva ASC";
        $result = mysql_query($sql);
        return $result;
    }

}

?>