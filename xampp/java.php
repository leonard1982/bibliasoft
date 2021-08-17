<?php
    include 'langsettings.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta name="author" content="Kai Oswald Seidler, Kay Vogelgesang, Carsten Wiedmann">
        <link href="xampp.css" rel="stylesheet" type="text/css">
        <title>Apache Tomcat Servlet/JSP (+mod_jk) - XAMPP AddOn</title>
    </head>

    <body>
        <br><h1>Apache Tomcat Servlet/JSP (+mod_jk) - XAMPP AddOn</h1>

        <table border="0">
            <?php
            list($partwampp, $directorwampp) = preg_split('|\\\htdocs\\\xampp|', dirname(__FILE__));
    
            ini_set('default_socket_timeout', 1);
            if (!@fsockopen('127.0.0.1', 8080)) {
                echo "<tr><td width='*' colspan='3'><i><b>{$TEXT['info-tomcatwarn']}</b></i></td></tr>";
            }
            ?>
            <tr>
                <td width="300">&nbsp;</td>
                <td width="10">&nbsp;</td>
                <td width="*">&nbsp;</td>
            </tr>
            <tr>
                <td width="300">Some configuration files:</td>
                <td width="10">&nbsp;</td>
                <td width="*">
                    <?php echo $partwampp."\\apache\\conf\\extra\\mod_jk.conf"; ?><br>
                    <?php echo $partwampp."\\tomcat\\conf\\jk\\workers.properties"; ?><br>
                    <?php echo $partwampp."\\tomcat\\conf\\server.xml"; ?>
                </td>
            </tr>
            <tr>
                <td width="300">&nbsp;</td>
                <td width="10">&nbsp;</td>
                <td width="*">&nbsp;</td>
            </tr>
<!--
            <tr>
                <td width="300">Another JSP directory (with ajp13):</td>
                <td width="10">&nbsp;</td>
                <td width="*"><?php echo $partwampp."\\tomcat\\webapps\\jsp\\"; ?></td>
            </tr>
            <tr>
                <td width="300">Another Servlet directory (with ajp13):</td>
                <td width="10">&nbsp;</td>
                <td width="*"><?php echo $partwampp."\\tomcat\\webapps\\servlets\\"; ?></td>
            </tr>
            <tr>
                <td width="300">JSP Test:</td>
                <td width="10">&nbsp;</td>
                <td width="*"><a href="/jsp/index.jsp" onclick="window.open(this.href,'API','width=600,height=400,left=100,top=50,toolbar=yes,menubar=yes,location=yes,scrollbars=yes,status=no,resizable=yes');return false" target="_blank">http://localhost/jsp/index.jsp</a></td>
            </tr>
            <tr>
                <td width="300">Servlet Test:</td>
                <td width="10">&nbsp;</td>
                <td width="*"><a href="/servlets/index.go" onclick="window.open(this.href,'API','width=600,height=400,left=100,top=50,toolbar=yes,menubar=yes,location=yes,scrollbars=yes,status=no,resizable=yes');return false" target="_blank">http://localhost/servlets/index.go</a></td>
            </tr>
-->
            <tr>
                <td width="300">Tomcat examples dir (with ajp13):</td>
                <td width="10">&nbsp;</td>
                <td width="*"><?php echo $partwampp."\\tomcat\\webapps\\examples\\";?></td>
            </tr>
            <tr>
                <td width="300">Tomcat default examples:</td>
                <td width="10">&nbsp;</td>
                <td width="*"><a href="/examples/" target="_blank">http://localhost/examples/</a></td>
            </tr>
            <tr>
                <td width="300">&nbsp;</td>
                <td width="10">&nbsp;</td>
                <td width="*">&nbsp;</td>
            </tr>
            <tr>
                <td width="300">Tomcat standalone (without ajp13):</td>
                <td width="10">&nbsp;</td>
                <td width="*"><a href="http://127.0.0.1:8080/" target="_blank">http://127.0.0.1:8080/</a></td>
            </tr>
            <tr>
                <td width="300">Tomcat Manager (without ajp13):</td>
                <td width="10">&nbsp;</td>
                <td width="*"><a href="http://127.0.0.1:8080/manager/status" target="_blank">http://127.0.0.1:8080/manager/status</a></td>
            </tr>
            <tr>
                <td width="300">Tomcat Admin/Config User:</td>
                <td width="10">&nbsp;</td>
                <td width="*">User: xampp &amp; Password: xampp</td>
            </tr>
            <tr>
                <td width="300">&nbsp;</td>
                <td width="10">&nbsp;</td>
                <td width="*">&nbsp;</td>
            </tr>
            <tr>
                <td width="300">Homepage:</td>
                <td width="10">&nbsp;</td>
                <td width="*"><a href="http://tomcat.apache.org/" target="_blank">http://tomcat.apache.org/</a></td>
            </tr>
            <tr>
                <td width="300">Sun:</td>
                <td width="10">&nbsp;</td>
                <td width="*"><a href="http://java.sun.com/" target="_blank">http://java.sun.com/</a></td>
            </tr>
        </table>
    </body>
</html>
