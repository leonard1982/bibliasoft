<?php
session_name("apli_ferro");
session_start();
session_unset();
unset($_SESSION[login]);
session_destroy();
?>
<script language="javascript">
    <!--
    top.location.href="./index.php";
    -->
</script>