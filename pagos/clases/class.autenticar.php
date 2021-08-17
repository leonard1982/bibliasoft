<?php

include_once("class.bd.php");

class autenticar {

    var $usuario;
    var $clave;
    var $database;

    function autenticar() {
        $this->database = new MySQL();
    }

    function autenticacion($usuario, $clave) {
        $sql = "SELECT nombre,login,idusuario FROM tab_usuarios WHERE login = '$usuario' AND pswd='$clave' AND activo='1'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        return $row;
    }

}

?>