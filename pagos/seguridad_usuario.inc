<?php
session_name("apli_ferro");
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:index.php");
}
?> 
<script language="javascript">
    <!--
    function cierraventana()
    {
        location.href="desconectar.php";
    }
    -->
</script> 

