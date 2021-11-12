<?php
include_once('form_empresas_mob_session.php');
@session_start() ;
class form_empresas_mob_help
{
    function __construct()
    {
        global $language, $nm_cod_campo;
        ini_set('default_charset', $_SESSION['scriptcase']['charset']);
        include($language . ".lang.php");
        if (!function_exists("NM_is_utf8"))
        {
             include_once("../_lib/lib/php/nm_utf8.php");
        }
        if (isset($_GET['help_css'])) {
            $cssHelp = $_GET['help_css'];
            $cssHelpDir = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $_GET['help_css']);
        } else {
            $cssHelp = $_SESSION['scriptcase']['css_form_help'];
            $cssHelpDir = $_SESSION['scriptcase']['css_form_help_dir'];
        }
        foreach ($this->Nm_lang as $ind => $dados)
        {
           if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
           {
               $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
               $this->Nm_lang[$ind] = $dados;
           }
           if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
           {
               $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
           }
        }
        if ($nm_cod_campo ==  "nombre_empresa")
        {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

    if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
    {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
    }

?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" href="<?php echo $cssHelp ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $cssHelpDir ?>" type="text/css" media="screen" />
</head>
<body class="scFormHelpPage">
<?php echo "<b>Nombre Empresa (BD)</b><br>" . nl2br("NO SE PERMITEN ACENTOS, NI NUMEROS, NI CARACTERES ESPECIALES. NOMBRE DE COMO SE VA A LLAMAR LA BASE DE DATOS."); ?>
</body>
</html>
<?php
        }
        if ($nm_cod_campo ==  "celular")
        {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

    if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
    {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
    }

?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" href="<?php echo $cssHelp ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $cssHelpDir ?>" type="text/css" media="screen" />
</head>
<body class="scFormHelpPage">
<?php echo "<b>Celular</b><br>" . nl2br(" Celular para dar notificaciones de la empresa."); ?>
</body>
</html>
<?php
        }
        if ($nm_cod_campo ==  "codempresa")
        {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

    if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
    {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
    }

?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" href="<?php echo $cssHelp ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $cssHelpDir ?>" type="text/css" media="screen" />
</head>
<body class="scFormHelpPage">
<?php echo "<b>Código Empresa Nómina</b><br>" . nl2br("Para estableces un codigo de empresa para el inicio de sesion en nomina."); ?>
</body>
</html>
<?php
        }
        if ($nm_cod_campo ==  "nomina")
        {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

    if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
    {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
    }

?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" href="<?php echo $cssHelp ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $cssHelpDir ?>" type="text/css" media="screen" />
</head>
<body class="scFormHelpPage">
<?php echo "<b>Activar Nómina</b><br>" . nl2br("Para activar la base de datos de nomina para la empresa."); ?>
</body>
</html>
<?php
        }
    }
}
if (!empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        $$nmgp_var = $nmgp_val;
    }
}
$exec_help = new form_empresas_mob_help();
?>
