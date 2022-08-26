<?php
include_once('form_inventario_inicial_session.php');
@session_start() ;
class form_inventario_inicial_help
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
        if ($nm_cod_campo ==  "costo_")
        {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" href="<?php echo $cssHelp ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $cssHelpDir ?>" type="text/css" media="screen" />
</head>
<body class="scFormHelpPage">
<?php echo "<b>Costo</b><br>" . nl2br("El costo es el valor unitario del producto; cuando la empresa es responsable de IVA, éste no se debe incluir en el costo unitario.
Ej: Un producto tiene un valor de $119 incluido el IVA del 19%; el costo unitario será de solo $100"); ?>
</body>
</html>
<?php
        }
        if ($nm_cod_campo ==  "sabor_")
        {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" href="<?php echo $cssHelp ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $cssHelpDir ?>" type="text/css" media="screen" />
</head>
<body class="scFormHelpPage">
<?php echo "<b>Sabor</b><br>" . nl2br("El punto es separador de decimales.  Ej: 20.00 o 20.000 es lo mismo"); ?>
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
$exec_help = new form_inventario_inicial_help();
?>
