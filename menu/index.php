<?php
include_once('menu_session.php');
@ini_set('session.cookie_httponly', 1);
@ini_set('session.use_only_cookies', 1);
@ini_set('session.cookie_secure', 0);
session_start();
if (!function_exists("sc_check_mobile"))
{
    include_once("../_lib/lib/php/nm_check_mobile.php");
}
$_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
if (!isset($_SESSION['scriptcase']['display_mobile']))
{
    $_SESSION['scriptcase']['display_mobile'] = true;
}
if ($_SESSION['scriptcase']['device_mobile'])
{
    if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = false;
    }
    elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = true;
    }
}
    $_SESSION['scriptcase']['menu']['glo_nm_path_prod']      = "";
    $_SESSION['scriptcase']['menu']['glo_nm_perfil']         = "conn_mysql";
    $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] = "";
    $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo']      = "";
    $_SESSION['scriptcase']['menu']['glo_con_conn_facilweb'] = "conn_facilweb";
    //check publication with the prod
    $str_path_apl_url  = $_SERVER['PHP_SELF'];
    $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['menu']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //end check publication with the prod

ob_start();

class menu_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function menu_menu()
 {
    global $menu_menuData, $nm_data_fixa;
     if (isset($_POST["nmgp_idioma"]))  
     { 
         $Temp_lang = explode(";" , $_POST["nmgp_idioma"]);  
         if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
          { 
             $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
         } 
         if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
         { 
             $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
         } 
     } 
   
     if (isset($_POST["nmgp_schema"]))  
     { 
         $_SESSION['scriptcase']['str_schema_all'] = $_POST["nmgp_schema"] . "/" . $_POST["nmgp_schema"];
     } 
   
           $nm_versao_sc  = "" ; 
           $_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
           $Campos_Mens_erro = "";
           $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
           $NM_dir_atual = getcwd();
           if (empty($NM_dir_atual))
           {
               $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
               $str_path_sys          = str_replace("\\", '/', $str_path_sys);
           }
           else
           {
               $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
               $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
           }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['menu']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
$this->sc_charset['UTF-8'] = 'utf-8';
$this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
$this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
$this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
$this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
$this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
$this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
$this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
$this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
$this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
$this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
$this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
$this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
$this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
$this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
$this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
$this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
$this->sc_charset['WINDOWS-1250'] = 'windows-1250';
$this->sc_charset['WINDOWS-1251'] = 'windows-1251';
$this->sc_charset['WINDOWS-1252'] = 'windows-1252';
$this->sc_charset['TIS-620'] = 'tis-620';
$this->sc_charset['WINDOWS-1253'] = 'windows-1253';
$this->sc_charset['WINDOWS-1254'] = 'windows-1254';
$this->sc_charset['WINDOWS-1255'] = 'windows-1255';
$this->sc_charset['WINDOWS-1256'] = 'windows-1256';
$this->sc_charset['WINDOWS-1257'] = 'windows-1257';
$this->sc_charset['KOI8-R'] = 'koi8-r';
$this->sc_charset['BIG-5'] = 'big5';
$this->sc_charset['EUC-CN'] = 'EUC-CN';
$this->sc_charset['GB18030'] = 'GB18030';
$this->sc_charset['GB2312'] = 'gb2312';
$this->sc_charset['EUC-JP'] = 'euc-jp';
$this->sc_charset['SJIS'] = 'shift-jis';
$this->sc_charset['EUC-KR'] = 'euc-kr';
$_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
$_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
$_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
$_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
$_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_btn       = $str_root . $path_link . "_lib/buttons/";
$path_imag_cab  = $path_link . "_lib/img";
$this->force_mobile = false;
$this->path_botoes    = '../_lib/img';
$this->path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "menu/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'];
$this->url_css = "../_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";
$menu_mobile_hide          = 'S';
$menu_mobile_inicial_state = 'escondido';
$menu_mobile_hide_onclick  = 'S';
$menutree_mobile_float     = 'S';
$menu_mobile_hide_icon     = 'N';
$menu_mobile_hide_icon_menu_position     = 'right';
$mobile_menu_mobile_hide          = 'S';
$mobile_menu_mobile_inicial_state = 'aberto';
$mobile_menu_mobile_hide_onclick  = 'S';
$mobile_menutree_mobile_float     = 'N';
$mobile_menu_mobile_hide_icon     = 'N';
$mobile_menu_mobile_hide_icon_menu_position     = 'right';

$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu');
if (isset($_SESSION['scriptcase']['user_logout']))
{
    foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
    {
        if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
        {
            unset($_SESSION['scriptcase']['user_logout'][$ind]);
            $nm_apl_dest = $parms['R'];
            $dir = explode("/", $nm_apl_dest);
            if (count($dir) == 1)
            {
                $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
            }
?>
            <html>
            <body>
            <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
            </form>
            <script>
             document.FRedirect.submit();
            </script>
            </body>
            </html>
<?php
            exit;
        }
    }
}
if (!defined("SC_ERROR_HANDLER"))
{
    define("SC_ERROR_HANDLER", 1);
    include_once(dirname(__FILE__) . "/menu_erro.php");
}
include_once(dirname(__FILE__) . "/menu_erro.class.php"); 
$this->Erro = new menu_erro();
$str_path = substr($_SESSION['scriptcase']['menu']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['menu']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['menu']['glo_nm_conexao']);
}

/* Definiciones de las rutas */
$menu_menuData         = array();
$menu_menuData['path'] = array();
$menu_menuData['url']  = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $menu_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $menu_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $menu_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $menu_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$menu_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$menu_menuData['url']['web']   = str_replace("\\", '/', $menu_menuData['url']['web']);
$menu_menuData['path']['root'] = substr($menu_menuData['path']['sys'],  0, -1 * strlen($menu_menuData['url']['web']));
$menu_menuData['path']['app']  = substr($menu_menuData['path']['sys'],  0, strrpos($menu_menuData['path']['sys'],  '/'));
$menu_menuData['path']['link'] = substr($menu_menuData['path']['app'],  0, strrpos($menu_menuData['path']['app'],  '/'));
$menu_menuData['path']['link'] = substr($menu_menuData['path']['link'], 0, strrpos($menu_menuData['path']['link'], '/')) . '/';
$menu_menuData['path']['app'] .= '/';
$menu_menuData['url']['app']   = substr($menu_menuData['url']['web'],  0, strrpos($menu_menuData['url']['web'],  '/'));
$menu_menuData['url']['link']  = substr($menu_menuData['url']['app'],  0, strrpos($menu_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] == "S")
{
    $menu_menuData['url']['link']  = substr($menu_menuData['url']['link'], 0, strrpos($menu_menuData['url']['link'], '/'));
}
$menu_menuData['url']['link']  .= '/';
$menu_menuData['url']['app']   .= '/';


$_SESSION['scriptcase']['menu']['sc_apl_link'] = $menu_menuData['url']['link'];

$nm_img_fun_menu = ""; 
if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
{
    $_SESSION['scriptcase']['str_lang'] = "es";
}
if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
{
    $_SESSION['scriptcase']['str_conf_reg'] = "es_co";
}
$this->str_lang        = $_SESSION['scriptcase']['str_lang'];
$this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
if (isset($_SESSION['scriptcase']['menu']['session_timeout']['lang'])) {
    $this->str_lang = $_SESSION['scriptcase']['menu']['session_timeout']['lang'];
}
elseif (!isset($_SESSION['scriptcase']['menu']['actual_lang']) || $_SESSION['scriptcase']['menu']['actual_lang'] != $this->str_lang) {
    $_SESSION['scriptcase']['menu']['actual_lang'] = $this->str_lang;
    setcookie('sc_actual_lang_FACILWEBv2',$this->str_lang,'0','/');
}
if (!function_exists("NM_is_utf8"))
{
   include_once("../_lib/lib/php/nm_utf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('FACILWEBv2');
if ($_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_BlueBerry/Sc9_BlueBerry";
$this->nm_db_conn_facilweb    = "";
$this->nm_con_conn_facilweb   = array();
include("../_lib/lang/". $this->str_lang .".lang.php");
include("../_lib/css/" . $this->str_schema_all . "_menutab.php");
include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
if(isset($pagina_schemamenu) && !empty($pagina_schemamenu) && is_file("../_lib/menuicons/". $pagina_schemamenu .".php"))
{
    include("../_lib/menuicons/". $pagina_schemamenu .".php");
}
$this->img_sep_toolbar = trim($str_toolbar_separator);
include("../_lib/lang/config_region.php");
include("../_lib/lang/lang_config_region.php");
$this->regionalDefault();
$Str_btn_menu = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
$Str_btn_css  = trim($str_button) . "/" . trim($str_button) . ".css";
$this->css_menutab_active_close_icon    = trim($css_menutab_active_close_icon);
$this->css_menutab_inactive_close_icon  = trim($css_menutab_inactive_close_icon);
$this->breadcrumbline_separator  = trim($breadcrumbline_separator);
include($path_btn . $Str_btn_menu);
if (!function_exists("nmButtonOutput"))
{
   include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
asort($this->Nm_lang_conf_region);
$this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
$this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
$this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
$this->nm_data = new nm_data("es");
include_once("menu_toolbar.php");

$this->tab_grupo[0] = "FACILWEBv2/";
if ($_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

     $_SESSION['scriptcase']['menu_atual'] = "menu";
     $_SESSION['scriptcase']['menu_apls']['menu'] = array();
     if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
     {
         foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
         {
             if (isset($_SESSION['scriptcase']['menu']['glo_nm_conexao']) && $_SESSION['scriptcase']['menu']['glo_nm_conexao'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu']['glo_nm_conexao'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu']['glo_nm_perfil']) && $_SESSION['scriptcase']['menu']['glo_nm_perfil'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu']['glo_nm_perfil'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu']['glo_con_' . $NM_con_orig]))
             {
                 $_SESSION['scriptcase']['menu']['glo_con_' . $NM_con_orig] = $NM_con_dest;
             }
         }
     }
$_SESSION['scriptcase']['charset'] = "UTF-8";
ini_set('default_charset', $_SESSION['scriptcase']['charset']);
$_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
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
if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
{
    $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
}
if (isset($_SESSION['scriptcase']['menu']['session_timeout']['redir'])) {
    $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
';
    $SS_cod_html .= "<HTML>\r\n";
    $SS_cod_html .= " <HEAD>\r\n";
    $SS_cod_html .= "  <TITLE></TITLE>\r\n";
    $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
    if ($_SESSION['scriptcase']['proc_mobile']) {
        $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
    }
    $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
    $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
    if ($_SESSION['scriptcase']['menu']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body>\r\n";
    }
    else {
        $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH.css\"/>\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body class=\"scMenuHPage\">\r\n";
        $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
        $SS_cod_html .= "    <table class=\"scMenuHTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scMenuHHeader\"><td class=\"scMenuHHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
        $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
        $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
        $SS_cod_html .= "           target=\"_self\">\r\n";
        $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['menu']['session_timeout']['redir'] . "');\">\r\n";
        $SS_cod_html .= "     </form>\r\n";
        $SS_cod_html .= "    </td></tr></table>\r\n";
        $SS_cod_html .= "    </div></td></tr></table>\r\n";
    }
    $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
    if ($_SESSION['scriptcase']['menu']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['menu']['session_timeout']['redir'] . "');\r\n";
    }
    $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
    $SS_cod_html .= "      {\r\n";
    $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "         else\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.close();\r\n";
    $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "             else\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.location = url_redir;\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "      }\r\n";
    $SS_cod_html .= "    </script>\r\n";
    $SS_cod_html .= " </body>\r\n";
    $SS_cod_html .= "</HTML>\r\n";
    unset($_SESSION['scriptcase']['menu']['session_timeout']);
    unset($_SESSION['sc_session']);
}
if (isset($SS_cod_html))
{
    echo $SS_cod_html;
    exit;
}
$_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
$_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
$_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (isset($_GET) && !empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($_POST) && !empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['menu']['init'] = $script_case_init;
}
else
if (!isset($_SESSION['sc_session'][1]['menu']['init']))
{
    $_SESSION['sc_session'][1]['menu']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['menu']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = NM_decode_input($nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
    $todo  = explode("?@?", $todox);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
       {
           $cadapar[0] = substr($cadapar[0], 11);
           $cadapar[1] = $_SESSION[$cadapar[1]];
       }
        if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
       $Tmp_par   = $cadapar[0];;
       $$Tmp_par = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
if (!isset($gPermisosUsuario) && isset($gpermisosusuario)) 
{
    $_SESSION["gPermisosUsuario"] = $gpermisosusuario;
}
if (!isset($gOS) && isset($gos)) 
{
    $_SESSION["gOS"] = $gos;
}
if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['menu']['session_timeout']['redir']))
{
    unset($_SESSION['sc_session']['SC_parm_violation']);
    echo "<html>";
    echo "<body>";
    echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
    echo "<tr>";
    echo "   <td align=\"center\">";
    echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
    echo "   </b></td>";
    echo " </tr>";
    echo "</table>";
    echo "</body>";
    echo "</html>";
    exit;
}
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . NM_encode_input($script_case_init);
    }
}
if (isset($_POST["nmgp_idioma"]) || isset($_POST["nmgp_schema"]))  
{ 
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_menu'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_menu'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_menu'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu'); 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['menu']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu']['glo_nm_conexao']))
{
    db_conect_devel('conn_facilweb', $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'], 'FACILWEBv2', 2); 
    $this->nm_con_conn_facilweb['servidor']    = $_SESSION['scriptcase']['glo_servidor'];
    $this->nm_con_conn_facilweb['usuario']     = $_SESSION['scriptcase']['glo_usuario'];
    $this->nm_con_conn_facilweb['banco']       = $_SESSION['scriptcase']['glo_banco'];
    $this->nm_con_conn_facilweb['senha']       = $_SESSION['scriptcase']['glo_senha'];
    $this->nm_con_conn_facilweb['tpbanco']     = $_SESSION['scriptcase']['glo_tpbanco'];
    $this->nm_con_conn_facilweb['decimal']     = $_SESSION['scriptcase']['glo_decimal_db'];
    $this->nm_con_conn_facilweb['SC_sep_date'] = $_SESSION['scriptcase']['glo_date_separator'];
    $this->nm_con_conn_facilweb['protect']     = "S";
    $this->nm_con_conn_facilweb['database_encoding'] = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
    db_conect_devel($_SESSION['scriptcase']['menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'], 'FACILWEBv2', 2); 
}
if (isset($_SESSION['scriptcase']['menu']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['menu']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['menu']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['menu']['glo_con_conn_facilweb'], $path_libs, "S");
    $this->nm_con_conn_facilweb['servidor']    = $_SESSION['scriptcase']['glo_servidor'];
    $this->nm_con_conn_facilweb['usuario']     = $_SESSION['scriptcase']['glo_usuario'];
    $this->nm_con_conn_facilweb['banco']       = $_SESSION['scriptcase']['glo_banco'];
    $this->nm_con_conn_facilweb['senha']       = $_SESSION['scriptcase']['glo_senha'];
    $this->nm_con_conn_facilweb['tpbanco']     = $_SESSION['scriptcase']['glo_tpbanco'];
    $this->nm_con_conn_facilweb['decimal']     = $_SESSION['scriptcase']['glo_decimal_db'];
    $this->nm_con_conn_facilweb['protect']     = $_SESSION['scriptcase']['glo_senha_protect'];
    $this->nm_con_conn_facilweb['SC_sep_date'] = $_SESSION['scriptcase']['glo_date_separator'];
    $this->nm_con_conn_facilweb['database_encoding'] = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "S");
    if (empty($_SESSION['scriptcase']['glo_senha_protect']))
    {
        $nm_falta_var .= "Perfil=" . $_SESSION['scriptcase']['glo_perfil'] . "; ";
    }
}
if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
{
    $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
    if (strlen($SC_temp) == 2)
    {
       $_SESSION['scriptcase']['menu']['SC_sep_date']  = substr($SC_temp, 0, 1); 
       $_SESSION['scriptcase']['menu']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
   }
   else
    {
       $_SESSION['scriptcase']['menu']['SC_sep_date']  = $SC_temp; 
       $_SESSION['scriptcase']['menu']['SC_sep_date1'] = $SC_temp; 
   }
}
if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
{
    $nm_falta_var_db .= "glo_tpbanco; ";
}
else
{
    $nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
}
if (!isset($_SESSION['scriptcase']['glo_servidor']))
{
    $nm_falta_var_db .= "glo_servidor; ";
}
else
{
    $nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
}
if (!isset($_SESSION['scriptcase']['glo_banco']))
{
    $nm_falta_var_db .= "glo_banco; ";
}
else
{
    $nm_banco = $_SESSION['scriptcase']['glo_banco']; 
}
if (!isset($_SESSION['scriptcase']['glo_usuario']))
{
    $nm_falta_var_db .= "glo_usuario; ";
}
else
{
    $nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
}
if (!isset($_SESSION['scriptcase']['glo_senha']))
{
    $nm_falta_var_db .= "glo_senha; ";
}
else
{
    $nm_senha = $_SESSION['scriptcase']['glo_senha']; 
}
$nm_con_db2 = array();
$nm_database_encoding = "";
if (isset($_SESSION['scriptcase']['glo_database_encoding']))
{
    $nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
}
$nm_arr_db_extra_args = array();
if (isset($_SESSION['scriptcase']['glo_use_ssl']))
{
    $nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
{
    $nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
{
    $nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
{
    $nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
{
    $nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
{
    $nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
{
    $nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
{
    $nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
{
    $nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
{
    $nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
{
    $nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
}
if (isset($_SESSION['scriptcase']['oracle_type']))
{
    $nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
}
$nm_con_persistente = "";
$nm_con_use_schema  = "";
if (isset($_SESSION['scriptcase']['glo_use_persistent']))
{
    $nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
}
if (isset($_SESSION['scriptcase']['glo_use_schema']))
{
    $nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
}
if (!empty($nm_falta_var) || !empty($nm_falta_var_db))
{
    if (empty($nm_falta_var_db))
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
        echo "  " . $nm_falta_var;
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    else
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font>";
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    if (isset($_SESSION['scriptcase']['nm_ret_exec']) && '' != $_SESSION['scriptcase']['nm_ret_exec'])
    { 
        if (isset($_SESSION['sc_session'][1]['menu']['sc_outra_jan']) && $_SESSION['sc_session'][1]['menu']['sc_outra_jan'])
        {
            echo "<a href='javascript:window.close()'><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
        else 
        { 
            echo "<a href='" . $_SESSION['scriptcase']['nm_ret_exec'] . "><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
    } 
    exit ;
} 
if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
{
    $nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
{
    $nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
}
$sc_tem_trans_banco = false;
$this->nm_bases_access    = array("access", "ado_access", "ace_access");
$this->nm_bases_db2       = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
$this->nm_bases_ibase     = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
$this->nm_bases_informix  = array("informix", "informix72", "pdo_informix");
$this->nm_bases_mssql     = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
$this->nm_bases_mysql     = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
$this->nm_bases_postgres  = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
$this->nm_bases_oracle    = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
$this->nm_bases_sqlite    = array("sqlite", "sqlite3", "pdosqlite");
$this->nm_bases_sybase    = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
$this->nm_bases_vfp       = array("vfp");
$this->nm_bases_odbc      = array("odbc");
$this->nm_bases_progress  = array("pdo_progress_odbc", "progress");
$_SESSION['scriptcase']['sc_num_page'] = 1;
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9NmDQFaHINaV5JeDMBYVcXKDWF/VoBqHQBiVINUHANOV5B/HgBeVkJ3DWF/VoBiDcJUZSX7Z1BYHuFaDMvOV9FeV5X/VEBiHQNwZSBqHArYHuJsHgBeHEJqDuXKVoFGHQJeDQFUHArYHuBqDMvmVIBsH5XKDoXGDcFYVIJsHIBeHQX7HgrKVkJ3DWrGVoFGDcBiDQFUHANOHuraHgvOV9FeHEFGVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQJeDQBqHABYHuF7DMvmVIBsDurGDoXGHQXOZSBOD1rKHQFaDMveHArsDWB3VoFGHQJKH9BiDSrwHQBODMBODkB/DurGDoXGHQBqZ1X7HIveHuX7HgvsVkJqHEB7DoF7D9XsDQJsDSBYV5FGHgNKDkBsDuB7VEBiHQXOH9BqHIrwHQJsDMveVkJqH5BmVoFGHQNwH9BiHABYHQXGDMNOVIBsDurGDoXGHQXGVINUDSrYHQJsDMvCZSJ3DWrGVoFGHQXsZSBiZ1zGVWJeHgrwVcFeDWBmVoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQFYH9FaHANOD5NUDErKDkFeV5FaZuBqD9NmZSFGHINaV5JwHuvmVcrsH5XCDoXGD9BsZ1FUZ1BeD5JeDMBYZSJGDWr/VoXGD9NwDQJwD1veV5FGHgvsVcFCH5FqDoraHQFYVIJwD1rwV5FGDEBeHEXeH5X/DoF7D9NwZSX7D1BeV5raHuvmVcFKV5X7VoFGD9BiZ1X7Z1BeV5JeDErKHEFKV5B7DoBqHQXOZ9F7HAvmD5F7DMvOZSJqDWXKDoXGHQNwZ1BiHINKV5X7HgveHArsDWFGZuBqHQJKDQJsZ1vCV5FGHuNOV9FeDWXCDoX7D9BsVINUDSrYV5FGHgNOZSXeHEB3DoXGHQXODQJsDSrwD5BODMvmVcFKV5BmVoBqD9BsZkFGHAvsD5FaDEBOHEXeDWFqVoBiD9NmDuBOZ1N7V5JeHuvmVcrsDWXCHMBiD9BsVIraD1rwV5X7HgBeHErCH5FGDoBqHQBiDuBqHArYHQJeDMvOV9BUDWXKVoF7HQBsZkBiHAzGD5BOHgNKHArCDWr/HMJeDcXGDQBqHAN7HuFaHuNOZSrCH5FqDoXGHQJmZ1F7HABYD5BqHgBOHEFiHEFqHMB/D9XsDQJwHAveV5FUDMBOVcBUDur/DoBiHQXOZ1FGHArKV5FUDMrYZSXeV5FqHIJsDcBwDQFGHAveV5raHgvsVIFCDWJeVoraD9BsZSFaDSNOV5FaHgBeHEFiV5B3DoF7D9XsDuFaHANKV5BODMvOVcBUDWrmVoF7HQNmZkBiHAvsD5BqHgBYHErCDWF/VoBiDcJUZSX7Z1BYHuFaDMvmVIFCDWXCDoF7DcJUH9BOHIveV5X7HgBeHArCV5FaVoJeD9NmDQFaHAveD5NUHgNKDkBOV5FYHMBiHQBiZ1FGHArYHuJeHgvsVkJ3DWX7HMX7HQXsDQFaZ1NaV5BiDMvmV9FeDuFqHMFaHQBiH9BqZ1NOHuX7HgvsDkBsDWF/HMJeHQJKDQFUHAN7HuB/DMBOVIB/DWJeHIFGDcBwZ1X7HAN7HuJeHgrKVkJ3DWX7HMFGHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VEFGHQFYVINUHAvsZMNU";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'], 'FACILWEBv2'); 
} 
else 
{ 
   $this->Db = db_conect($nm_tpbanco, $nm_servidor, $nm_usuario, $nm_senha, $nm_banco, $glo_senha_protect, "S", $nm_con_persistente, $nm_con_db2, $nm_database_encoding, $nm_arr_db_extra_args); 
} 
$this->nm_tpbanco = $nm_tpbanco; 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_ibase) && function_exists('ibase_timefmt'))
{
    ibase_timefmt('%Y-%m-%d %H:%M:%S');
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_sybase))
{
   $this->Db->fetchMode = ADODB_FETCH_BOTH;
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_db2))
{
   $this->Db->fetchMode = ADODB_FETCH_NUM;
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_mssql))
{
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_oracle))
{
   $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
   $_SESSION['sc_session'][$this->Ini->sc_page]['menu']['decimal_db'] = ".";
} 
$this->nm_db_conn_facilweb = db_conect($this->nm_con_conn_facilweb['tpbanco'], $this->nm_con_conn_facilweb['servidor'], $this->nm_con_conn_facilweb['usuario'], $this->nm_con_conn_facilweb['senha'], $this->nm_con_conn_facilweb['banco'], $this->nm_con_conn_facilweb['protect'], 'S', 'N', '', $this->nm_con_conn_facilweb['database_encoding']); 
if (in_array(strtolower($this->nm_con_conn_facilweb['tpbanco']), $this->nm_bases_ibase))
{
    if (function_exists('ibase_timefmt'))
    {
        ibase_timefmt('%Y-%m-%d %H:%M:%S');
    } 
    $GLOBALS["NM_ERRO_IBASE"] = 1;  
} 
if (in_array(strtolower($this->nm_con_conn_facilweb['tpbanco']), $this->nm_bases_sybase))
{
    $this->nm_db_conn_facilweb->fetchMode = ADODB_FETCH_BOTH;
    $this->nm_db_conn_facilweb->Execute("set dateformat ymd");
} 
if (in_array(strtolower($this->nm_con_conn_facilweb['tpbanco']), $this->nm_bases_mssql))
{
   $this->nm_db_conn_facilweb->Execute("set dateformat ymd");
} 
if (in_array(strtolower($this->nm_con_conn_facilweb['tpbanco']), $this->nm_bases_oracle))
{
   $this->nm_db_conn_facilweb->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
   $this->nm_db_conn_facilweb->Execute("alter session set nls_numeric_characters = '.,'");
   $this->nm_con_conn_facilweb['decimal']  = ".";
} 
//
      $_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
if (!isset($_SESSION['gbd_seleccionada'])) {$_SESSION['gbd_seleccionada'] = "";}
if (!isset($this->sc_temp_gbd_seleccionada)) {$this->sc_temp_gbd_seleccionada = (isset($_SESSION['gbd_seleccionada'])) ? $_SESSION['gbd_seleccionada'] : "";}
if (!isset($_SESSION['gsiaperturacaja'])) {$_SESSION['gsiaperturacaja'] = "";}
if (!isset($this->sc_temp_gsiaperturacaja)) {$this->sc_temp_gsiaperturacaja = (isset($_SESSION['gsiaperturacaja'])) ? $_SESSION['gsiaperturacaja'] : "";}
if (!isset($_SESSION['gdescripciongrupo'])) {$_SESSION['gdescripciongrupo'] = "";}
if (!isset($this->sc_temp_gdescripciongrupo)) {$this->sc_temp_gdescripciongrupo = (isset($_SESSION['gdescripciongrupo'])) ? $_SESSION['gdescripciongrupo'] : "";}
if (!isset($_SESSION['gusuariologueado'])) {$_SESSION['gusuariologueado'] = "";}
if (!isset($this->sc_temp_gusuariologueado)) {$this->sc_temp_gusuariologueado = (isset($_SESSION['gusuariologueado'])) ? $_SESSION['gusuariologueado'] : "";}
  ?>
<script src="<?php echo sc_url_library('prj', 'js', 'js.cookie.min.js'); ?>"></script>

<?php

unset($_SESSION['scriptcase']['sc_menu_disable']['menu']);if(empty($this->sc_temp_gusuariologueado))
{
	
	 if (isset($this->sc_temp_gusuariologueado)) {$_SESSION['gusuariologueado'] = $this->sc_temp_gusuariologueado;}
 if (isset($this->sc_temp_gdescripciongrupo)) {$_SESSION['gdescripciongrupo'] = $this->sc_temp_gdescripciongrupo;}
 if (isset($this->sc_temp_gsiaperturacaja)) {$_SESSION['gsiaperturacaja'] = $this->sc_temp_gsiaperturacaja;}
 if (isset($this->sc_temp_gbd_seleccionada)) {$_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
 if (!isset($Campos_Mens_erro) || empty($Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($menu_menuData['url']['link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('blank_iniciar_sesion') . "/", "menu.php", "","_self", 440, 630);
 };
}
else
{
	 
      $nm_select = "select habilitar_comprobantes from configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiContable = array();
      $this->vsicontable = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiContable[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsicontable[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiContable = false;
          $this->vSiContable_erro = $this->Db->ErrorMsg();
          $this->vsicontable = false;
          $this->vsicontable_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vsicontable[0][0]))
	{
		if($this->vsicontable[0][0]=="NO")
		{
		}
	}
	
	 
      $nm_select = "select nube_codigo,token,password from configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosNube = array();
      $this->vdatosnube = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatosNube[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatosnube[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosNube = false;
          $this->vDatosNube_erro = $this->Db->ErrorMsg();
          $this->vdatosnube = false;
          $this->vdatosnube_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vdatosnube[0][0]))
	{
		$vnube_codigo = $this->vdatosnube[0][0];
		$vtoken       = $this->vdatosnube[0][1];
		$vpassword    = $this->vdatosnube[0][2];

		if(empty($vnube_codigo) or empty($vtoken) or empty($vpassword))
		{
			$NM_tmp_dis = 'item_163';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

		}
	}
	else
	{
		$NM_tmp_dis = 'item_163';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

	}
	
	if($this->sc_temp_gdescripciongrupo=='ADMINISTRADORES')
	{
		$NM_tmp_dis = 'item_38';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

	}
	else
	{
		$NM_tmp_dis = 'item_132';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

		
		$this->fPermisos();
	}
		
	if($this->sc_temp_gsiaperturacaja == "NO")
	{
		$NM_tmp_dis = 'item_60';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

	}
}

$NM_tmp_dis = 'item_131';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

$NM_tmp_del = 'item_67';
if (!is_array($NM_tmp_del))
{
    $NM_tmp_del = explode(",", $NM_tmp_del);
}
foreach ($NM_tmp_del as $Cada_del)
{
    $_SESSION['scriptcase']['sc_menu_del']['menu'][] = trim($Cada_del);
}

$NM_tmp_dis = 'item_176';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

$NM_tmp_dis = 'item_206';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

$NM_tmp_del = 'item_62';
if (!is_array($NM_tmp_del))
{
    $NM_tmp_del = explode(",", $NM_tmp_del);
}
foreach ($NM_tmp_del as $Cada_del)
{
    $_SESSION['scriptcase']['sc_menu_del']['menu'][] = trim($Cada_del);
}


$NM_tmp_del = 'item_37';
if (!is_array($NM_tmp_del))
{
    $NM_tmp_del = explode(",", $NM_tmp_del);
}
foreach ($NM_tmp_del as $Cada_del)
{
    $_SESSION['scriptcase']['sc_menu_del']['menu'][] = trim($Cada_del);
}


$NM_tmp_del = 'item_63';
if (!is_array($NM_tmp_del))
{
    $NM_tmp_del = explode(",", $NM_tmp_del);
}
foreach ($NM_tmp_del as $Cada_del)
{
    $_SESSION['scriptcase']['sc_menu_del']['menu'][] = trim($Cada_del);
}


$NM_tmp_del = 'item_229';
if (!is_array($NM_tmp_del))
{
    $NM_tmp_del = explode(",", $NM_tmp_del);
}
foreach ($NM_tmp_del as $Cada_del)
{
    $_SESSION['scriptcase']['sc_menu_del']['menu'][] = trim($Cada_del);
}

$NM_tmp_del = 'item_228';
if (!is_array($NM_tmp_del))
{
    $NM_tmp_del = explode(",", $NM_tmp_del);
}
foreach ($NM_tmp_del as $Cada_del)
{
    $_SESSION['scriptcase']['sc_menu_del']['menu'][] = trim($Cada_del);
}

$NM_tmp_del = 'item_162';
if (!is_array($NM_tmp_del))
{
    $NM_tmp_del = explode(",", $NM_tmp_del);
}
foreach ($NM_tmp_del as $Cada_del)
{
    $_SESSION['scriptcase']['sc_menu_del']['menu'][] = trim($Cada_del);
}



$vsql = "select tipo_negocio from empresas where nombre='".$this->sc_temp_gbd_seleccionada."' and tipo_negocio='INTERNET'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vTipoN = array();
      $this->vtipon = array();
      if ($SCrx = $this->nm_db_conn_facilweb->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vTipoN[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vtipon[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vTipoN = false;
          $this->vTipoN_erro = $this->nm_db_conn_facilweb->ErrorMsg();
          $this->vtipon = false;
          $this->vtipon_erro = $this->nm_db_conn_facilweb->ErrorMsg();
      } 
;
if(isset($this->vtipon[0][0]))
{
	$NM_tmp_dis = 'item_11';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

	$NM_tmp_dis = 'item_45';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

	$NM_tmp_dis = 'item_160';
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

}

$vcsesion = 0;
 
      $nm_select = "select desactivar_control_sesion from configuraciones where desactivar_control_sesion='SI' order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vControlSesion = array();
      $this->vcontrolsesion = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vControlSesion[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vcontrolsesion[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vControlSesion = false;
          $this->vControlSesion_erro = $this->Db->ErrorMsg();
          $this->vcontrolsesion = false;
          $this->vcontrolsesion_erro = $this->Db->ErrorMsg();
      } 
;
	
if(isset($this->vcontrolsesion[0][0]))
{
	$vcsesion = 1;
}

?>
<script>
	var csesion = "<?php echo $vcsesion; ?>";
	var tiemponotificaciones = 1;
	window.onload = function(){
	
	if(csesion==0){
	
		setInterval(function(){

			$.post('../blank_mantener_viva_la_sesion/index.php',{activar:''},function(r){

			var obj = JSON.parse(r);
			console.log(obj);

			if(obj.salir=='SI')
			{
			if(obj.cajacerrada='SI')
			{
			if(confirm('La caja ha sido cerrada desde el administrador.'))
			{
			window.location.href = '../blank_fin_sesion/?noborrarsesionenbd';
			}
			else
			{
			window.location.href = '../blank_fin_sesion/?noborrarsesionenbd';
			}
			}
			else
			{
			window.location.href = '../blank_fin_sesion/?noborrarsesionenbd';
			}
			}

			if(obj.activarconsolelog=='NO')
			{
			console.clear();
			}
			});

			if(tiemponotificaciones==60)
			{
			getDatabaseMessage();
			tiemponotificaciones=0;
			}
			else
			{
			tiemponotificaciones++;	
			}

			},3000);
		}
	
		 if (+Cookies.get('tabs') > 0) 
		{
			if(confirm("Ya tiene abierto el programa en otra pestaña."))
			{
				location.href = "https://www.google.com";
			}
			else
			{
				location.href = "https://www.google.com";
			}
		}
		else 
		{
			Cookies.set('tabs', 0); 
			Cookies.set('tabs', +Cookies.get('tabs') + 1); 
			window.onunload = function () { 
				Cookies.set('tabs', +Cookies.get('tabs') - 1); 
			}; 
		}
	};
</script>
<?php
if (isset($this->sc_temp_gusuariologueado)) {$_SESSION['gusuariologueado'] = $this->sc_temp_gusuariologueado;}
if (isset($this->sc_temp_gdescripciongrupo)) {$_SESSION['gdescripciongrupo'] = $this->sc_temp_gdescripciongrupo;}
if (isset($this->sc_temp_gsiaperturacaja)) {$_SESSION['gsiaperturacaja'] = $this->sc_temp_gsiaperturacaja;}
if (isset($this->sc_temp_gbd_seleccionada)) {$_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
/* Dados do menu em sessao */
$_SESSION['nm_menu'] = array('prod' => $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . '/third/COOLjsMenu/',
                              'url' => $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . '/third/COOLjsMenu/');

if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'menu'))
{
    $_SESSION['sc_session'][1]['menu']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_menu'] = "javascript:window.close()";
}
/* Menú de configuración de las variables */
$menu_menuData['iframe'] = TRUE;

if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_menu") . "/control_menu_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_menu']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['control_menu'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['control_menu'] = "on";
} 
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("terceros") . "/terceros_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("terceros") . "/terceros_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['terceros']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['terceros'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['terceros'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_todos") . "/grid_terceros_todos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_todos") . "/grid_terceros_todos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_todos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_todos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_todos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_clientes") . "/grid_clientes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_clientes") . "/grid_clientes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_clientes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_clientes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_clientes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros") . "/grid_terceros_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros") . "/grid_terceros_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_vendedores") . "/grid_vendedores_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_vendedores") . "/grid_vendedores_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_vendedores']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_vendedores'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_vendedores'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_clasificacion_clientes") . "/form_clasificacion_clientes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_clasificacion_clientes") . "/form_clasificacion_clientes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_zona_clientes") . "/form_zona_clientes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_zona_clientes") . "/form_zona_clientes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_zona_clientes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_zona_clientes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_zona_clientes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("terceros_mesas") . "/terceros_mesas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("terceros_mesas") . "/terceros_mesas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['terceros_mesas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['terceros_mesas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['terceros_mesas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_cargar_terceros_desde_excel") . "/blank_cargar_terceros_desde_excel_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_cargar_terceros_desde_excel") . "/blank_cargar_terceros_desde_excel_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_terceros_desde_excel']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_terceros_desde_excel'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_terceros_desde_excel'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ruteros") . "/grid_ruteros_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ruteros") . "/grid_ruteros_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ruteros']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_ruteros'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ruteros'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_cargar_ruteros_desde_excel") . "/blank_cargar_ruteros_desde_excel_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_cargar_ruteros_desde_excel") . "/blank_cargar_ruteros_desde_excel_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_ruteros_desde_excel']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_ruteros_desde_excel'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_ruteros_desde_excel'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos") . "/form_productos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos") . "/form_productos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_productos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_productos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_simple") . "/form_productos_simple_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_simple") . "/form_productos_simple_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_simple']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_productos_simple'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_productos_simple'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productos") . "/grid_productos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productos") . "/grid_productos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_productos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_productos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_marca") . "/form_marca_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_marca") . "/form_marca_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_marca']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_marca'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_marca'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_linea") . "/form_linea_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_linea") . "/form_linea_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_linea']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_linea'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_linea'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_grupo") . "/grid_grupo_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_grupo") . "/grid_grupo_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_grupo']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_grupo'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_grupo'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_grupo") . "/form_grupo_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_grupo") . "/form_grupo_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_grupo']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_grupo'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_grupo'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_editarprecios") . "/form_productos_editarprecios_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_editarprecios") . "/form_productos_editarprecios_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarprecios']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarprecios'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarprecios'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_actualizar_precios_excel") . "/blank_actualizar_precios_excel_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_actualizar_precios_excel") . "/blank_actualizar_precios_excel_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_actualizar_precios_excel']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_actualizar_precios_excel'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_actualizar_precios_excel'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_cargarproductos_excel") . "/control_cargarproductos_excel_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_cargarproductos_excel") . "/control_cargarproductos_excel_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_cargarproductos_excel']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['control_cargarproductos_excel'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['control_cargarproductos_excel'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_editarproveedor") . "/form_productos_editarproveedor_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_editarproveedor") . "/form_productos_editarproveedor_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarproveedor']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarproveedor'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarproveedor'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("consultar_productos") . "/consultar_productos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("consultar_productos") . "/consultar_productos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['consultar_productos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['consultar_productos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['consultar_productos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_fast_gcontable") . "/form_productos_fast_gcontable_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_fast_gcontable") . "/form_productos_fast_gcontable_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_fast_gcontable']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_productos_fast_gcontable'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_productos_fast_gcontable'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("fac_compras") . "/fac_compras_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("fac_compras") . "/fac_compras_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['fac_compras']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['fac_compras'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['fac_compras'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_compras") . "/grid_compras_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_compras") . "/grid_compras_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_compras']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_compras'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_compras'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_pedido_compra") . "/form_pedido_compra_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_pedido_compra") . "/form_pedido_compra_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_pedido_compra']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_pedido_compra'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_pedido_compra'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos_compras") . "/grid_pedidos_compras_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos_compras") . "/grid_pedidos_compras_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_compras']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_compras'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_compras'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_compras_dev") . "/grid_compras_dev_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_compras_dev") . "/grid_compras_dev_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_compras_dev']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_compras_dev'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_compras_dev'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_codbarras_filtro") . "/control_codbarras_filtro_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_codbarras_filtro") . "/control_codbarras_filtro_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_codbarras_filtro']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['control_codbarras_filtro'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['control_codbarras_filtro'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario") . "/grid_inventario_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario") . "/grid_inventario_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_produccion") . "/form_produccion_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_produccion") . "/form_produccion_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_produccion']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_produccion'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_produccion'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_produccion") . "/grid_produccion_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_produccion") . "/grid_produccion_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_produccion']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_produccion'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_produccion'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productosxtraslado") . "/grid_productosxtraslado_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productosxtraslado") . "/grid_productosxtraslado_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productosxtraslado']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_productosxtraslado'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_productosxtraslado'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_mov_trasladodeproduccion") . "/form_mov_trasladodeproduccion_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_mov_trasladodeproduccion") . "/form_mov_trasladodeproduccion_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_mov_trasladodeproduccion']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_mov_trasladodeproduccion'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_mov_trasladodeproduccion'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_mov_trasladoprod_almacen") . "/grid_mov_trasladoprod_almacen_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_mov_trasladoprod_almacen") . "/grid_mov_trasladoprod_almacen_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_trasladoprod_almacen']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_mov_trasladoprod_almacen'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_mov_trasladoprod_almacen'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detallenotamov_productos") . "/grid_detallenotamov_productos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_detallenotamov_productos") . "/grid_detallenotamov_productos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detallenotamov_productos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_detallenotamov_productos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_detallenotamov_productos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_movimiento") . "/grid_movimiento_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_movimiento") . "/grid_movimiento_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_movimiento']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_movimiento'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_movimiento'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_mov_ajusteinv") . "/grid_mov_ajusteinv_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_mov_ajusteinv") . "/grid_mov_ajusteinv_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_ajusteinv']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_mov_ajusteinv'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_mov_ajusteinv'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Grid_ajuste_Inv_fisico") . "/Grid_ajuste_Inv_fisico_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Grid_ajuste_Inv_fisico") . "/Grid_ajuste_Inv_fisico_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Grid_ajuste_Inv_fisico']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Grid_ajuste_Inv_fisico'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Grid_ajuste_Inv_fisico'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_inical") . "/grid_inventario_inical_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_inical") . "/grid_inventario_inical_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_inical']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_inical'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_inical'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_inventario_inicial") . "/form_inventario_inicial_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_inventario_inicial") . "/form_inventario_inicial_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_inventario_inicial']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_inventario_inicial'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_inventario_inicial'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_final") . "/grid_inventario_final_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_final") . "/grid_inventario_final_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_final']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_final'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_final'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ajuste_notapos") . "/grid_ajuste_notapos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ajuste_notapos") . "/grid_ajuste_notapos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ajuste_notapos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_ajuste_notapos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ajuste_notapos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_notainv_ajuste") . "/form_notainv_ajuste_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_notainv_ajuste") . "/form_notainv_ajuste_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ajuste']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ajuste'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ajuste'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tipotransfe") . "/form_tipotransfe_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tipotransfe") . "/form_tipotransfe_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipotransfe']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_tipotransfe'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_tipotransfe'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_facturaven") . "/form_facturaven_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_facturaven") . "/form_facturaven_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_facturaven']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_facturaven'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_facturaven'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_grid_pos_usuario") . "/blank_grid_pos_usuario_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_grid_pos_usuario") . "/blank_grid_pos_usuario_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_grid_pos_usuario']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_grid_pos_usuario'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_grid_pos_usuario'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_pos") . "/grid_facturaven_pos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_pos") . "/grid_facturaven_pos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_pos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_pos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_pos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("lectordeprecios") . "/lectordeprecios_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("lectordeprecios") . "/lectordeprecios_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['lectordeprecios']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['lectordeprecios'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['lectordeprecios'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_remisiones") . "/form_remisiones_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_remisiones") . "/form_remisiones_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_remisiones']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_remisiones'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_remisiones'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven") . "/grid_facturaven_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven") . "/grid_facturaven_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas") . "/grid_ventas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas") . "/grid_ventas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_remi") . "/grid_remi_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_remi") . "/grid_remi_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_remi']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_remi'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_remi'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_programar_descuentos_generales") . "/grid_programar_descuentos_generales_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_programar_descuentos_generales") . "/grid_programar_descuentos_generales_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_programar_descuentos_generales']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_programar_descuentos_generales'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_programar_descuentos_generales'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_automatica") . "/grid_facturaven_automatica_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_automatica") . "/grid_facturaven_automatica_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_automatica']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_automatica'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_automatica'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_enviar_fe_periodo_propio") . "/blank_enviar_fe_periodo_propio_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_enviar_fe_periodo_propio") . "/blank_enviar_fe_periodo_propio_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_enviar_fe_periodo_propio']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_enviar_fe_periodo_propio'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_enviar_fe_periodo_propio'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_notas") . "/form_notas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_notas") . "/form_notas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_notas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_notas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_notas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_NC_ND") . "/grid_NC_ND_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_NC_ND") . "/grid_NC_ND_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_NC_ND']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_NC_ND'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_NC_ND'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_pedido") . "/form_pedido_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_pedido") . "/form_pedido_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_pedido']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_pedido'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_pedido'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_iframe_pedidos") . "/blank_iframe_pedidos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_iframe_pedidos") . "/blank_iframe_pedidos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_pedidos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_pedidos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_pedidos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_ventas") . "/blank_recalcular_ventas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_ventas") . "/blank_recalcular_ventas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_ventas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_ventas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_ventas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos_restaurante") . "/grid_pedidos_restaurante_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos_restaurante") . "/grid_pedidos_restaurante_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_restaurante']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_restaurante'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_restaurante'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_cartera") . "/grid_cartera_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_cartera") . "/grid_cartera_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cartera']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_cartera'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_cartera'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_reciboingreso") . "/form_reciboingreso_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_reciboingreso") . "/form_reciboingreso_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_cuentas_porcobrar") . "/grid_terceros_cuentas_porcobrar_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_cuentas_porcobrar") . "/grid_terceros_cuentas_porcobrar_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porcobrar']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porcobrar'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porcobrar'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_reciboingreso_remis") . "/form_reciboingreso_remis_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_reciboingreso_remis") . "/form_reciboingreso_remis_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso_remis']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso_remis'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso_remis'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_recibos") . "/grid_recibos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_recibos") . "/grid_recibos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_recibos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_recibos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reciboingreso") . "/grid_reciboingreso_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reciboingreso") . "/grid_reciboingreso_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reciboingreso']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_reciboingreso'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_reciboingreso'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_cuentas_principal") . "/blank_recalcular_cuentas_principal_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_cuentas_principal") . "/blank_recalcular_cuentas_principal_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_cuentas_principal']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_cuentas_principal'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_cuentas_principal'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_cuentaspagar") . "/grid_cuentaspagar_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_cuentaspagar") . "/grid_cuentaspagar_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cuentaspagar']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_cuentaspagar'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_cuentaspagar'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tesoreria") . "/grid_tesoreria_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tesoreria") . "/grid_tesoreria_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tesoreria']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_tesoreria'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tesoreria'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_cuentas_porpagar") . "/grid_terceros_cuentas_porpagar_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_cuentas_porpagar") . "/grid_terceros_cuentas_porpagar_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porpagar']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porpagar'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porpagar'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_caja_lista") . "/grid_caja_lista_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_caja_lista") . "/grid_caja_lista_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_lista']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_caja_lista'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_caja_lista'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_hacerpagos") . "/form_hacerpagos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_hacerpagos") . "/form_hacerpagos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_hacerpagos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_hacerpagos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_hacerpagos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pagos") . "/grid_pagos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pagos") . "/grid_pagos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_pagos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_pagos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pagos_master") . "/grid_pagos_master_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pagos_master") . "/grid_pagos_master_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos_master']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_pagos_master'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_pagos_master'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_caja") . "/grid_caja_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_caja") . "/grid_caja_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_caja']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_caja'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_caja'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_bancos") . "/grid_bancos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_bancos") . "/grid_bancos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_bancos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_bancos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_bancos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_pagos_conceptos") . "/form_pagos_conceptos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_pagos_conceptos") . "/form_pagos_conceptos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_pagos_conceptos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_pagos_conceptos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_pagos_conceptos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_plancuentas") . "/grid_plancuentas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_plancuentas") . "/grid_plancuentas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_plancuentas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_plancuentas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_plancuentas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_grupos_contables") . "/grid_grupos_contables_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_grupos_contables") . "/grid_grupos_contables_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_grupos_contables']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_grupos_contables'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_grupos_contables'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_contable") . "/form_productos_contable_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos_contable") . "/form_productos_contable_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_contable']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_productos_contable'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_productos_contable'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contable") . "/form_terceros_contable_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contable") . "/form_terceros_contable_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contable']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contable'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contable'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_exportar") . "/grid_terceros_exportar_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_exportar") . "/grid_terceros_exportar_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_exportar']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_exportar'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_exportar'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("asientos") . "/asientos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("asientos") . "/asientos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['asientos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['asientos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['asientos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturacom_genera_comprobantes") . "/grid_facturacom_genera_comprobantes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturacom_genera_comprobantes") . "/grid_facturacom_genera_comprobantes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturacom_genera_comprobantes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_facturacom_genera_comprobantes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_facturacom_genera_comprobantes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_genera_comprobantes") . "/grid_facturaven_genera_comprobantes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_genera_comprobantes") . "/grid_facturaven_genera_comprobantes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_genera_comprobantes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_genera_comprobantes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_genera_comprobantes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_comprobantes") . "/grid_comprobantes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_comprobantes") . "/grid_comprobantes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_comprobantes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_comprobantes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_comprobantes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_presupuestos") . "/grid_presupuestos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_presupuestos") . "/grid_presupuestos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_presupuestos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_presupuestos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_presupuestos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_impuestos") . "/grid_reporte_impuestos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_impuestos") . "/grid_reporte_impuestos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_total_ingreso_egresos") . "/grid_total_ingreso_egresos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_total_ingreso_egresos") . "/grid_total_ingreso_egresos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_total_ingreso_egresos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_total_ingreso_egresos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_total_ingreso_egresos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_abc_clientes") . "/grid_abc_clientes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_abc_clientes") . "/grid_abc_clientes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_clientes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_abc_clientes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_abc_clientes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_abc_productos") . "/grid_abc_productos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_abc_productos") . "/grid_abc_productos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_productos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_abc_productos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_abc_productos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_costo_inventario") . "/grid_costo_inventario_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_costo_inventario") . "/grid_costo_inventario_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_costo_inventario']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_costo_inventario'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_costo_inventario'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_rotacion_inventario") . "/grid_rotacion_inventario_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_rotacion_inventario") . "/grid_rotacion_inventario_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_rotacion_inventario']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_rotacion_inventario'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_rotacion_inventario'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_fisico_porproducto") . "/grid_inventario_fisico_porproducto_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_fisico_porproducto") . "/grid_inventario_fisico_porproducto_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_fisico_porproducto']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_fisico_porproducto'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_fisico_porproducto'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productos_por_bodega") . "/grid_productos_por_bodega_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productos_por_bodega") . "/grid_productos_por_bodega_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_por_bodega']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_productos_por_bodega'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_productos_por_bodega'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_semanas_venta") . "/grid_semanas_venta_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_semanas_venta") . "/grid_semanas_venta_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_semanas_venta']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_semanas_venta'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_semanas_venta'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_productos_pedido") . "/grid_reporte_productos_pedido_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_productos_pedido") . "/grid_reporte_productos_pedido_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_pedido']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_pedido'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_pedido'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_productos_fechavencimiento") . "/grid_reporte_productos_fechavencimiento_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_productos_fechavencimiento") . "/grid_reporte_productos_fechavencimiento_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_fechavencimiento']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_fechavencimiento'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_fechavencimiento'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_saldos") . "/grid_saldos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_saldos") . "/grid_saldos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_saldos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_saldos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_vencimiento_lote") . "/grid_vencimiento_lote_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_vencimiento_lote") . "/grid_vencimiento_lote_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_vencimiento_lote']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_vencimiento_lote'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_vencimiento_lote'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_rp_productos_vendedor") . "/grid_rp_productos_vendedor_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_rp_productos_vendedor") . "/grid_rp_productos_vendedor_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_rp_productos_vendedor']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_rp_productos_vendedor'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_rp_productos_vendedor'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_reporte_caja_filtro") . "/blank_reporte_caja_filtro_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_reporte_caja_filtro") . "/blank_reporte_caja_filtro_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_reporte_caja_filtro']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_reporte_caja_filtro'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_reporte_caja_filtro'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_caja_informe") . "/grid_caja_informe_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_caja_informe") . "/grid_caja_informe_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_informe']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_caja_informe'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_caja_informe'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_caja") . "/grid_reporte_caja_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_caja") . "/grid_reporte_caja_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_caja']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_caja'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_caja'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_report_refventacostogarancia") . "/grid_report_refventacostogarancia_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_report_refventacostogarancia") . "/grid_report_refventacostogarancia_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_report_refventacostogarancia']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_report_refventacostogarancia'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_report_refventacostogarancia'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_ubicacion") . "/grid_ventas_ubicacion_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_ubicacion") . "/grid_ventas_ubicacion_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_ubicacion']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_ubicacion'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_ubicacion'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_articulo") . "/grid_ventas_por_articulo_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_articulo") . "/grid_ventas_por_articulo_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_articulo']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_articulo'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_articulo'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_familia") . "/grid_ventas_por_familia_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_familia") . "/grid_ventas_por_familia_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_familia']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_familia'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_familia'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_cliente") . "/grid_ventas_por_cliente_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_cliente") . "/grid_ventas_por_cliente_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_cliente']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_cliente'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_cliente'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_vendedor") . "/grid_ventas_por_vendedor_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_vendedor") . "/grid_ventas_por_vendedor_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_vendedor']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_vendedor'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_vendedor'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_flujo_caja_principal") . "/blank_recalcular_flujo_caja_principal_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_flujo_caja_principal") . "/blank_recalcular_flujo_caja_principal_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_flujo_caja_principal']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_flujo_caja_principal'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_flujo_caja_principal'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productos_x_pedido_dia") . "/grid_productos_x_pedido_dia_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productos_x_pedido_dia") . "/grid_productos_x_pedido_dia_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_x_pedido_dia']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_productos_x_pedido_dia'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_productos_x_pedido_dia'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_venta_x_producto_dia") . "/grid_venta_x_producto_dia_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_venta_x_producto_dia") . "/grid_venta_x_producto_dia_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_venta_x_producto_dia']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_venta_x_producto_dia'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_venta_x_producto_dia'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_saldo_terceros") . "/grid_saldo_terceros_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_saldo_terceros") . "/grid_saldo_terceros_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_saldo_terceros']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_saldo_terceros'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_saldo_terceros'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_cartera_por_edades") . "/grid_terceros_cartera_por_edades_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_cartera_por_edades") . "/grid_terceros_cartera_por_edades_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cartera_por_edades']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cartera_por_edades'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cartera_por_edades'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_impuestos_ing_terceros") . "/grid_reporte_impuestos_ing_terceros_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_impuestos_ing_terceros") . "/grid_reporte_impuestos_ing_terceros_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos_ing_terceros']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos_ing_terceros'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos_ing_terceros'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tareas") . "/grid_tareas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_tareas") . "/grid_tareas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tareas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_tareas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_tareas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_contactos") . "/grid_contactos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_contactos") . "/grid_contactos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_contactos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_contactos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_contactos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos") . "/grid_pedidos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos") . "/grid_pedidos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_contratos") . "/grid_terceros_contratos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_contratos") . "/grid_terceros_contratos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_contratos_generar_fv") . "/grid_terceros_contratos_generar_fv_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_contratos_generar_fv") . "/grid_terceros_contratos_generar_fv_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos_generar_fv']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos_generar_fv'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos_generar_fv'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_contratos") . "/grid_facturaven_contratos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_contratos") . "/grid_facturaven_contratos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_contratos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_contratos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_contratos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_descarga_pdfs_principal") . "/blank_descarga_pdfs_principal_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_descarga_pdfs_principal") . "/blank_descarga_pdfs_principal_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_descarga_pdfs_principal']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_descarga_pdfs_principal'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_descarga_pdfs_principal'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_recibos_ing_caja") . "/grid_recibos_ing_caja_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_recibos_ing_caja") . "/grid_recibos_ing_caja_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos_ing_caja']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_recibos_ing_caja'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_recibos_ing_caja'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_dispositivos") . "/form_terceros_dispositivos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_dispositivos") . "/form_terceros_dispositivos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_dispositivos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_dispositivos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_dispositivos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contrato_dispositivo") . "/form_terceros_contrato_dispositivo_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contrato_dispositivo") . "/form_terceros_contrato_dispositivo_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contrato_dispositivo']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contrato_dispositivo'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contrato_dispositivo'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contratos_estado") . "/form_terceros_contratos_estado_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contratos_estado") . "/form_terceros_contratos_estado_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_estado']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_estado'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_estado'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contratos_motivoscorte") . "/form_terceros_contratos_motivoscorte_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contratos_motivoscorte") . "/form_terceros_contratos_motivoscorte_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_motivoscorte']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_motivoscorte'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_motivoscorte'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_historiales_crm") . "/grid_historiales_crm_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_historiales_crm") . "/grid_historiales_crm_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_historiales_crm']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_historiales_crm'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_historiales_crm'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_casos") . "/grid_casos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_casos") . "/grid_casos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_casos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_casos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_casos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_clasificacion_clientes") . "/form_clasificacion_clientes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_clasificacion_clientes") . "/form_clasificacion_clientes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_casos_estado") . "/form_casos_estado_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_casos_estado") . "/form_casos_estado_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_casos_estado']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_casos_estado'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_casos_estado'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_casos_prioridad") . "/form_casos_prioridad_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_casos_prioridad") . "/form_casos_prioridad_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_casos_prioridad']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_casos_prioridad'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_casos_prioridad'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("calendar_calendar") . "/calendar_calendar_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("calendar_calendar") . "/calendar_calendar_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['calendar_calendar']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['calendar_calendar'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['calendar_calendar'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_gestor_archivos") . "/grid_gestor_archivos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_gestor_archivos") . "/grid_gestor_archivos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_gestor_archivos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_gestor_archivos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_gestor_archivos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_datosemp") . "/form_datosemp_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_datosemp") . "/form_datosemp_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_datosemp']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_datosemp'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_datosemp'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_sucursales_todas") . "/grid_sucursales_todas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_sucursales_todas") . "/grid_sucursales_todas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sucursales_todas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_sucursales_todas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_sucursales_todas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_consecutivos") . "/form_consecutivos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_consecutivos") . "/form_consecutivos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_consecutivos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_consecutivos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_consecutivos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_configuraciones_print_pos") . "/grid_configuraciones_print_pos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_configuraciones_print_pos") . "/grid_configuraciones_print_pos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_configuraciones_print_pos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_configuraciones_print_pos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_configuraciones_print_pos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_configuraciones") . "/form_configuraciones_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_configuraciones") . "/form_configuraciones_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_configuraciones']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_configuraciones'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_configuraciones'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_webservicefe") . "/form_webservicefe_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_webservicefe") . "/form_webservicefe_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_webservicefe']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_webservicefe'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_webservicefe'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_resdian") . "/grid_resdian_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_resdian") . "/grid_resdian_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_resdian']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_resdian'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_resdian'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_plantillas_correo_propio") . "/grid_plantillas_correo_propio_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_plantillas_correo_propio") . "/grid_plantillas_correo_propio_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_plantillas_correo_propio']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_plantillas_correo_propio'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_plantillas_correo_propio'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_iva") . "/grid_iva_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_iva") . "/grid_iva_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_iva']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_iva'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_iva'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tiporetefuente") . "/form_tiporetefuente_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tiporetefuente") . "/form_tiporetefuente_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tiporetefuente']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_tiporetefuente'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_tiporetefuente'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tipoica") . "/form_tipoica_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tipoica") . "/form_tipoica_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipoica']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_tipoica'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_tipoica'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tipoautoretencion") . "/form_tipoautoretencion_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tipoautoretencion") . "/form_tipoautoretencion_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipoautoretencion']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_tipoautoretencion'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_tipoautoretencion'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_c_costos") . "/form_c_costos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_c_costos") . "/form_c_costos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_c_costos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_c_costos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_c_costos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_prefijos_documentos") . "/form_prefijos_documentos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_prefijos_documentos") . "/form_prefijos_documentos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_prefijos_documentos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_prefijos_documentos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_prefijos_documentos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_bodegas") . "/form_bodegas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_bodegas") . "/form_bodegas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_bodegas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_bodegas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_bodegas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_SN_BALANZA") . "/form_SN_BALANZA_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_SN_BALANZA") . "/form_SN_BALANZA_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_SN_BALANZA']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_SN_BALANZA'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_SN_BALANZA'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_usuarios") . "/grid_usuarios_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_usuarios") . "/grid_usuarios_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_usuarios") . "/form_usuarios_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_usuarios") . "/form_usuarios_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_usuarios'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_usuarios'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_usuarios_grupos") . "/form_usuarios_grupos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_usuarios_grupos") . "/form_usuarios_grupos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios_grupos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_usuarios_grupos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_usuarios_grupos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_aplicaciones_menu_asignarpermisos") . "/grid_aplicaciones_menu_asignarpermisos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_aplicaciones_menu_asignarpermisos") . "/grid_aplicaciones_menu_asignarpermisos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_aplicaciones_menu_asignarpermisos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_aplicaciones_menu_asignarpermisos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_aplicaciones_menu_asignarpermisos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_copiar_permisos") . "/control_copiar_permisos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("control_copiar_permisos") . "/control_copiar_permisos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_copiar_permisos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['control_copiar_permisos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['control_copiar_permisos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_permisos_menu_movil") . "/form_permisos_menu_movil_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_permisos_menu_movil") . "/form_permisos_menu_movil_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_menu_movil']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_permisos_menu_movil'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_permisos_menu_movil'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_aplicaciones_menu") . "/form_aplicaciones_menu_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_aplicaciones_menu") . "/form_aplicaciones_menu_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_aplicaciones_menu']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_aplicaciones_menu'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_aplicaciones_menu'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_permisos_aplicaciones_menu") . "/form_permisos_aplicaciones_menu_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_permisos_aplicaciones_menu") . "/form_permisos_aplicaciones_menu_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_aplicaciones_menu']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_permisos_aplicaciones_menu'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_permisos_aplicaciones_menu'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_empresas") . "/grid_empresas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_empresas") . "/grid_empresas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_empresas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_empresas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_empresas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_lfs_principal") . "/blank_recalcular_lfs_principal_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_lfs_principal") . "/blank_recalcular_lfs_principal_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_lfs_principal") . "/blank_recalcular_lfs_principal_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_lfs_principal") . "/blank_recalcular_lfs_principal_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_hacer_backup") . "/blank_hacer_backup_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_hacer_backup") . "/blank_hacer_backup_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_hacer_backup']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_hacer_backup'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_hacer_backup'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_restaurar_backup") . "/blank_restaurar_backup_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_restaurar_backup") . "/blank_restaurar_backup_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_restaurar_backup']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_restaurar_backup'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_restaurar_backup'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_optimizar_bd") . "/blank_optimizar_bd_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_optimizar_bd") . "/blank_optimizar_bd_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_optimizar_bd']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_optimizar_bd'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_optimizar_bd'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_limpiar_bd") . "/blank_limpiar_bd_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_limpiar_bd") . "/blank_limpiar_bd_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_limpiar_bd']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_limpiar_bd'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_limpiar_bd'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_notainv_ceros") . "/form_notainv_ceros_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_notainv_ceros") . "/form_notainv_ceros_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ceros']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ceros'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ceros'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_conceptos_documentos") . "/grid_conceptos_documentos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_conceptos_documentos") . "/grid_conceptos_documentos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_conceptos_documentos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_conceptos_documentos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_conceptos_documentos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_iframe_phpmyadmin") . "/blank_iframe_phpmyadmin_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_iframe_phpmyadmin") . "/blank_iframe_phpmyadmin_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_phpmyadmin']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_phpmyadmin'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_phpmyadmin'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_copias_nube_clientes") . "/blank_copias_nube_clientes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_copias_nube_clientes") . "/blank_copias_nube_clientes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_copias_nube_clientes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_copias_nube_clientes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_copias_nube_clientes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_municipio") . "/form_municipio_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_municipio") . "/form_municipio_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_municipio']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_municipio'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_municipio'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_unidades_medida") . "/form_unidades_medida_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_unidades_medida") . "/form_unidades_medida_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_unidades_medida']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_unidades_medida'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_unidades_medida'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tipo_producto") . "/form_tipo_producto_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_tipo_producto") . "/form_tipo_producto_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipo_producto']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_tipo_producto'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_tipo_producto'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_grupos_TNS") . "/grid_importar_grupos_TNS_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_grupos_TNS") . "/grid_importar_grupos_TNS_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_TNS']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_TNS'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_TNS'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_tipoiva_TNS") . "/grid_importar_tipoiva_TNS_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_tipoiva_TNS") . "/grid_importar_tipoiva_TNS_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_tipoiva_TNS']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_tipoiva_TNS'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_tipoiva_TNS'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_plan_cuentas_TNS") . "/grid_importar_plan_cuentas_TNS_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_plan_cuentas_TNS") . "/grid_importar_plan_cuentas_TNS_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_plan_cuentas_TNS']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_plan_cuentas_TNS'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_plan_cuentas_TNS'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_grupos_contables_TNS") . "/grid_importar_grupos_contables_TNS_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_grupos_contables_TNS") . "/grid_importar_grupos_contables_TNS_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_contables_TNS']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_contables_TNS'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_contables_TNS'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_articulos_TNS") . "/grid_importar_articulos_TNS_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_articulos_TNS") . "/grid_importar_articulos_TNS_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_articulos_TNS']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_articulos_TNS'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_articulos_TNS'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_terceros_TNS") . "/grid_importar_terceros_TNS_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_terceros_TNS") . "/grid_importar_terceros_TNS_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_terceros_TNS']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_terceros_TNS'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_importar_terceros_TNS'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productos_facilweb_importinvtns") . "/grid_productos_facilweb_importinvtns_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productos_facilweb_importinvtns") . "/grid_productos_facilweb_importinvtns_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_facilweb_importinvtns']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_productos_facilweb_importinvtns'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_productos_facilweb_importinvtns'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_log") . "/grid_log_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_log") . "/grid_log_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_log']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_log'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_log'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_log_pedidos_borrados") . "/grid_log_pedidos_borrados_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_log_pedidos_borrados") . "/grid_log_pedidos_borrados_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_log_pedidos_borrados']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_log_pedidos_borrados'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_log_pedidos_borrados'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_soporte") . "/blank_soporte_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_soporte") . "/blank_soporte_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_soporte']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_soporte'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_soporte'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_buscar_actualizaciones") . "/blank_buscar_actualizaciones_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_buscar_actualizaciones") . "/blank_buscar_actualizaciones_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_buscar_actualizaciones']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_buscar_actualizaciones'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_buscar_actualizaciones'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_anydesk") . "/blank_anydesk_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_anydesk") . "/blank_anydesk_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_anydesk']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_anydesk'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_anydesk'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank") . "/blank_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank") . "/blank_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_ayuda") . "/blank_ayuda_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_ayuda") . "/blank_ayuda_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_ayuda']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_ayuda'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_ayuda'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_slider") . "/blank_slider_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_slider") . "/blank_slider_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_slider']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_slider'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_slider'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_fin_sesion") . "/blank_fin_sesion_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("blank_fin_sesion") . "/blank_fin_sesion_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_fin_sesion']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['blank_fin_sesion'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['blank_fin_sesion'] = "on";
    } 
}
/* Elementos de menú */
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
if (!isset($_SESSION['gOS'])) {$_SESSION['gOS'] = "";}
if (!isset($this->sc_temp_gOS)) {$this->sc_temp_gOS = (isset($_SESSION['gOS'])) ? $_SESSION['gOS'] : "";}
if (!isset($_SESSION['gtipo_empresa'])) {$_SESSION['gtipo_empresa'] = "";}
if (!isset($this->sc_temp_gtipo_empresa)) {$this->sc_temp_gtipo_empresa = (isset($_SESSION['gtipo_empresa'])) ? $_SESSION['gtipo_empresa'] : "";}
  $FILTRO = "WHERE CURDATE() BETWEEN start_date AND end_date ORDER BY id DESC";
$sql = "SELECT title as message,start_date, end_date,start_time FROM calendar ". $FILTRO;
$vmensaje = "";

 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
if(!empty($this->ds )){
	foreach($this->ds  as $key => $value)
	{
		$vf1 = date_create($value[1]);
		$vf1 = date_format($vf1,"d/m/Y");
		
		$vf2 = date_create($value[2]);
		$vf2 = date_format($vf2,"d/m/Y");
			
		$vmensaje .= "<div>".$value[0]."<br>".$vf1." ".$value[3]."</div><hr>";
	}
	
	$params = array(
		'title' => '',
		'type' => '',
		'timer' => '10000',
		'showConfirmButton' => true,
		'position' => 'top-end',
		'toast' => false
		);
	$this->nm_mens_alert[] = $vmensaje;$this->nm_params_alert[] = $params;}

if($this->sc_temp_gtipo_empresa=="NUBE")
{
	$vsql = "select tokenempresa,tokenpassword from webservicefe where tokenempresa is not null and tokenempresa <> '' and proveedor='FACILWEB'";
	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vTokenEmp = array();
      $this->vtokenemp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vTokenEmp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vtokenemp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vTokenEmp = false;
          $this->vTokenEmp_erro = $this->Db->ErrorMsg();
          $this->vtokenemp = false;
          $this->vtokenemp_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vtokenemp[0][0]))
	{
		if($this->sc_temp_gOS=="WIN")
		{

		}
		else
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'http://www.facilwebnube.com/apidian2021/public/api/ubl2.1/certificate-end-date',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'PUT',
			  CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'cache-control: no-cache',
				'Connection: keep-alive',
				'Accept-Encoding: gzip, deflate',
				'Host: localhost',
				'accept: application/json',
				'X-CSRF-TOKEN: ',
				'Authorization: Bearer '.$this->vtokenemp[0][0]
			  ),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			
			$vabuscar = "/";
			$vpos = strpos($response, $vabuscar);
			if ($vpos === false)
			{
				
			}
			else
			{
				$vpartes = explode($vabuscar,$response);
				$vdia    = "";
				$vmes    = "";
				$vanio   = "";
				
				if(isset($vpartes[0]))
				{
					$vdia = $vpartes[0];
				}
				
				if(isset($vpartes[1]))
				{
					$vmes = $vpartes[1];
				}
				
				if(isset($vpartes[2]))
				{
					$vanio = $vpartes[2];
				}
				
				if(!empty($vdia) and !empty($vmes) and !empty($vanio))
				{
					if(checkdate($vdia,$vmes,$vanio))
					{
						$vfecha_actual = date("Y-m-d");
						$vfecha_certificado = $vanio."-".$vmes."-".$vdia;
						
						$fecha1= new DateTime($vfecha_actual);
						$fecha2= new DateTime($vfecha_certificado);
						$diff = $fecha1->diff($fecha2);
						
						$vdias_faltantes = $diff->days;

						if(intval($vdias_faltantes)<=15)
						{
							$this->nm_mens_alert[] = 'Faltan '.$diff->days .' días para el vencimiento de su certificado digital, comuníquese con el area comercial para renovar su plan.';$this->nm_params_alert[] = array();}
					}
				}
			}
		}
	}
}
if (isset($this->sc_temp_gtipo_empresa)) {$_SESSION['gtipo_empresa'] = $this->sc_temp_gtipo_empresa;}
if (isset($this->sc_temp_gOS)) {$_SESSION['gOS'] = $this->sc_temp_gOS;}
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
if ($this->Db)
{
    $this->Db->Close(); 
}
if ($this->nm_db_conn_facilweb)
{
    $this->nm_db_conn_facilweb->Close(); 
}

$sOutputBuffer = ob_get_contents();
ob_end_clean();

 $nm_var_lab[0] = "Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[0]))
{
    $nm_var_lab[0] = sc_convert_encoding($nm_var_lab[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[1] = "Nuevo tercero";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[1]))
{
    $nm_var_lab[1] = sc_convert_encoding($nm_var_lab[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[2] = "Lista terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[2]))
{
    $nm_var_lab[2] = sc_convert_encoding($nm_var_lab[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[3] = "Lista de Clientes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[3]))
{
    $nm_var_lab[3] = sc_convert_encoding($nm_var_lab[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[4] = "Lista de proveedores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[4]))
{
    $nm_var_lab[4] = sc_convert_encoding($nm_var_lab[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[5] = "Lista vendedores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[5]))
{
    $nm_var_lab[5] = sc_convert_encoding($nm_var_lab[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[6] = "Clasificación de Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[6]))
{
    $nm_var_lab[6] = sc_convert_encoding($nm_var_lab[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[7] = "Zona Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[7]))
{
    $nm_var_lab[7] = sc_convert_encoding($nm_var_lab[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[8] = "Crear Ubicaciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[8]))
{
    $nm_var_lab[8] = sc_convert_encoding($nm_var_lab[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[9] = "Importar Terceros desde Excel";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[9]))
{
    $nm_var_lab[9] = sc_convert_encoding($nm_var_lab[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[10] = "Ruteros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[10]))
{
    $nm_var_lab[10] = sc_convert_encoding($nm_var_lab[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[11] = "Importar Ruteros desde Excel";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[11]))
{
    $nm_var_lab[11] = sc_convert_encoding($nm_var_lab[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[12] = "Proveedores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[12]))
{
    $nm_var_lab[12] = sc_convert_encoding($nm_var_lab[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[13] = "Nuevo proveedor";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[13]))
{
    $nm_var_lab[13] = sc_convert_encoding($nm_var_lab[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[14] = "Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[14]))
{
    $nm_var_lab[14] = sc_convert_encoding($nm_var_lab[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[15] = "Crear producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[15]))
{
    $nm_var_lab[15] = sc_convert_encoding($nm_var_lab[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[16] = "Creación rápida producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[16]))
{
    $nm_var_lab[16] = sc_convert_encoding($nm_var_lab[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[17] = "Lista de Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[17]))
{
    $nm_var_lab[17] = sc_convert_encoding($nm_var_lab[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[18] = "Marcas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[18]))
{
    $nm_var_lab[18] = sc_convert_encoding($nm_var_lab[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[19] = "Lineas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[19]))
{
    $nm_var_lab[19] = sc_convert_encoding($nm_var_lab[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[20] = "Familia o grupo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[20]))
{
    $nm_var_lab[20] = sc_convert_encoding($nm_var_lab[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[21] = "Lista Familias/Grupos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[21]))
{
    $nm_var_lab[21] = sc_convert_encoding($nm_var_lab[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[22] = "Nuevo Familia/Grupo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[22]))
{
    $nm_var_lab[22] = sc_convert_encoding($nm_var_lab[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[23] = "Actualizar Precios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[23]))
{
    $nm_var_lab[23] = sc_convert_encoding($nm_var_lab[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[24] = "Actualizar Precios Excel";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[24]))
{
    $nm_var_lab[24] = sc_convert_encoding($nm_var_lab[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[25] = "Importar Productos Excel";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[25]))
{
    $nm_var_lab[25] = sc_convert_encoding($nm_var_lab[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[26] = "Actualizar El proveedor en los Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[26]))
{
    $nm_var_lab[26] = sc_convert_encoding($nm_var_lab[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[27] = "Consultar Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[27]))
{
    $nm_var_lab[27] = sc_convert_encoding($nm_var_lab[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[28] = "Edición Rápido Grupo Contable";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[28]))
{
    $nm_var_lab[28] = sc_convert_encoding($nm_var_lab[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[29] = "Inventarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[29]))
{
    $nm_var_lab[29] = sc_convert_encoding($nm_var_lab[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[30] = "Compras";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[30]))
{
    $nm_var_lab[30] = sc_convert_encoding($nm_var_lab[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[31] = "Nueva Compra";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[31]))
{
    $nm_var_lab[31] = sc_convert_encoding($nm_var_lab[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[32] = "Lista de compras";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[32]))
{
    $nm_var_lab[32] = sc_convert_encoding($nm_var_lab[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[33] = "Ordenes de Compra";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[33]))
{
    $nm_var_lab[33] = sc_convert_encoding($nm_var_lab[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[34] = "Lista de Ordenes de Compra";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[34]))
{
    $nm_var_lab[34] = sc_convert_encoding($nm_var_lab[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[35] = "Devolución en compras";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[35]))
{
    $nm_var_lab[35] = sc_convert_encoding($nm_var_lab[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[36] = "Diseño de Etiquetas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[36]))
{
    $nm_var_lab[36] = sc_convert_encoding($nm_var_lab[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[37] = "Rotación de Inventarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[37]))
{
    $nm_var_lab[37] = sc_convert_encoding($nm_var_lab[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[38] = "Movimientos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[38]))
{
    $nm_var_lab[38] = sc_convert_encoding($nm_var_lab[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[39] = "Producción";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[39]))
{
    $nm_var_lab[39] = sc_convert_encoding($nm_var_lab[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[40] = "Traslado a Producción";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[40]))
{
    $nm_var_lab[40] = sc_convert_encoding($nm_var_lab[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[41] = "Lista Traslado materia Prima";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[41]))
{
    $nm_var_lab[41] = sc_convert_encoding($nm_var_lab[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[42] = "Movimiento materia Prima";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[42]))
{
    $nm_var_lab[42] = sc_convert_encoding($nm_var_lab[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[43] = "Traslado Producción a Almacen";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[43]))
{
    $nm_var_lab[43] = sc_convert_encoding($nm_var_lab[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[44] = "Lista de traslado de productos terminados";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[44]))
{
    $nm_var_lab[44] = sc_convert_encoding($nm_var_lab[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[45] = "Movimiento productos terminados";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[45]))
{
    $nm_var_lab[45] = sc_convert_encoding($nm_var_lab[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[46] = "Traslado mercancía";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[46]))
{
    $nm_var_lab[46] = sc_convert_encoding($nm_var_lab[46], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[47] = "Ajustes Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[47]))
{
    $nm_var_lab[47] = sc_convert_encoding($nm_var_lab[47], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[48] = "Ajustar el Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[48]))
{
    $nm_var_lab[48] = sc_convert_encoding($nm_var_lab[48], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[49] = "Nota por Inv. Físico";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[49]))
{
    $nm_var_lab[49] = sc_convert_encoding($nm_var_lab[49], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[50] = "Ver Inv. Inicial";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[50]))
{
    $nm_var_lab[50] = sc_convert_encoding($nm_var_lab[50], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[51] = "Inventario Inicial";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[51]))
{
    $nm_var_lab[51] = sc_convert_encoding($nm_var_lab[51], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[52] = "Inventario final";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[52]))
{
    $nm_var_lab[52] = sc_convert_encoding($nm_var_lab[52], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[53] = "Notas Inv. Negativo POS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[53]))
{
    $nm_var_lab[53] = sc_convert_encoding($nm_var_lab[53], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[54] = "Crear Nota Inv. Negativo POS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[54]))
{
    $nm_var_lab[54] = sc_convert_encoding($nm_var_lab[54], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[55] = "Tipo mov. Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[55]))
{
    $nm_var_lab[55] = sc_convert_encoding($nm_var_lab[55], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[56] = "Ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[56]))
{
    $nm_var_lab[56] = sc_convert_encoding($nm_var_lab[56], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[57] = "Facturar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[57]))
{
    $nm_var_lab[57] = sc_convert_encoding($nm_var_lab[57], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[58] = "Facturación";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[58]))
{
    $nm_var_lab[58] = sc_convert_encoding($nm_var_lab[58], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[59] = "Venta Rápida";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[59]))
{
    $nm_var_lab[59] = sc_convert_encoding($nm_var_lab[59], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[60] = "Venta Rápida - Admin";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[60]))
{
    $nm_var_lab[60] = sc_convert_encoding($nm_var_lab[60], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[61] = "Lector de Precios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[61]))
{
    $nm_var_lab[61] = sc_convert_encoding($nm_var_lab[61], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[62] = "Remisionar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[62]))
{
    $nm_var_lab[62] = sc_convert_encoding($nm_var_lab[62], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[63] = "Lista Facturas de Ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[63]))
{
    $nm_var_lab[63] = sc_convert_encoding($nm_var_lab[63], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[64] = "Listar ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[64]))
{
    $nm_var_lab[64] = sc_convert_encoding($nm_var_lab[64], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[65] = "Listar Remisiones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[65]))
{
    $nm_var_lab[65] = sc_convert_encoding($nm_var_lab[65], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[66] = "Ventas entre fechas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[66]))
{
    $nm_var_lab[66] = sc_convert_encoding($nm_var_lab[66], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[67] = "Programar Descuentos Generales";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[67]))
{
    $nm_var_lab[67] = sc_convert_encoding($nm_var_lab[67], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[68] = "Parametrizar facturas automáticas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[68]))
{
    $nm_var_lab[68] = sc_convert_encoding($nm_var_lab[68], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[69] = "Enviar Facturas Electrónicas entre Fechas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[69]))
{
    $nm_var_lab[69] = sc_convert_encoding($nm_var_lab[69], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[70] = "Notas C/D";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[70]))
{
    $nm_var_lab[70] = sc_convert_encoding($nm_var_lab[70], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[71] = "Hacer Notas C/D";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[71]))
{
    $nm_var_lab[71] = sc_convert_encoding($nm_var_lab[71], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[72] = "Lista Notas C/D";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[72]))
{
    $nm_var_lab[72] = sc_convert_encoding($nm_var_lab[72], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[73] = "Documentos varios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[73]))
{
    $nm_var_lab[73] = sc_convert_encoding($nm_var_lab[73], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[74] = "Nuevo Documento";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[74]))
{
    $nm_var_lab[74] = sc_convert_encoding($nm_var_lab[74], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[75] = "Lista Documentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[75]))
{
    $nm_var_lab[75] = sc_convert_encoding($nm_var_lab[75], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[76] = "Recalcular Ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[76]))
{
    $nm_var_lab[76] = sc_convert_encoding($nm_var_lab[76], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[77] = "Restaurante";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[77]))
{
    $nm_var_lab[77] = sc_convert_encoding($nm_var_lab[77], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[78] = "Pedidos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[78]))
{
    $nm_var_lab[78] = sc_convert_encoding($nm_var_lab[78], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[79] = "Cartera";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[79]))
{
    $nm_var_lab[79] = sc_convert_encoding($nm_var_lab[79], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[80] = "Lista Facturas Por Cobrar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[80]))
{
    $nm_var_lab[80] = sc_convert_encoding($nm_var_lab[80], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[81] = "Recibo de Ingreso a Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[81]))
{
    $nm_var_lab[81] = sc_convert_encoding($nm_var_lab[81], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[82] = "Documentos Cartera";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[82]))
{
    $nm_var_lab[82] = sc_convert_encoding($nm_var_lab[82], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[83] = "Recibo de Ingreso a Caja (Remisiones)";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[83]))
{
    $nm_var_lab[83] = sc_convert_encoding($nm_var_lab[83], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[84] = "Recibos de Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[84]))
{
    $nm_var_lab[84] = sc_convert_encoding($nm_var_lab[84], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[85] = "Recibos de caja simple";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[85]))
{
    $nm_var_lab[85] = sc_convert_encoding($nm_var_lab[85], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[86] = "Recalcular Documentos (Cartera/Tesorería)";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[86]))
{
    $nm_var_lab[86] = sc_convert_encoding($nm_var_lab[86], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[87] = "Caja/Tesorería";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[87]))
{
    $nm_var_lab[87] = sc_convert_encoding($nm_var_lab[87], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[88] = "Lista de Facturas Por Pagar";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[88]))
{
    $nm_var_lab[88] = sc_convert_encoding($nm_var_lab[88], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[89] = "Obligaciones por proveedor";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[89]))
{
    $nm_var_lab[89] = sc_convert_encoding($nm_var_lab[89], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[90] = "Documentos Tesorería";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[90]))
{
    $nm_var_lab[90] = sc_convert_encoding($nm_var_lab[90], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[91] = "Base y cuadre de Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[91]))
{
    $nm_var_lab[91] = sc_convert_encoding($nm_var_lab[91], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[92] = "Comprobante de Egreso";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[92]))
{
    $nm_var_lab[92] = sc_convert_encoding($nm_var_lab[92], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[93] = "Lista comprobantes de Egreso";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[93]))
{
    $nm_var_lab[93] = sc_convert_encoding($nm_var_lab[93], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[94] = "Lista comprobantes de Egreso - Beta";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[94]))
{
    $nm_var_lab[94] = sc_convert_encoding($nm_var_lab[94], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[95] = "Lista Movimientos de caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[95]))
{
    $nm_var_lab[95] = sc_convert_encoding($nm_var_lab[95], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[96] = "Bancos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[96]))
{
    $nm_var_lab[96] = sc_convert_encoding($nm_var_lab[96], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[97] = "Conceptos RC y CE";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[97]))
{
    $nm_var_lab[97] = sc_convert_encoding($nm_var_lab[97], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[98] = "Contable (Beta)";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[98]))
{
    $nm_var_lab[98] = sc_convert_encoding($nm_var_lab[98], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[99] = "Plan de Cuentas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[99]))
{
    $nm_var_lab[99] = sc_convert_encoding($nm_var_lab[99], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[100] = "Grupos Contables";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[100]))
{
    $nm_var_lab[100] = sc_convert_encoding($nm_var_lab[100], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[101] = "Editar Contable Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[101]))
{
    $nm_var_lab[101] = sc_convert_encoding($nm_var_lab[101], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[102] = "Editar Contable Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[102]))
{
    $nm_var_lab[102] = sc_convert_encoding($nm_var_lab[102], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[103] = "Exportar Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[103]))
{
    $nm_var_lab[103] = sc_convert_encoding($nm_var_lab[103], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[104] = "Exportar Asientos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[104]))
{
    $nm_var_lab[104] = sc_convert_encoding($nm_var_lab[104], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[105] = "P1 - Generar CC de Compras";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[105]))
{
    $nm_var_lab[105] = sc_convert_encoding($nm_var_lab[105], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[106] = "P2 - Generar CC de Ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[106]))
{
    $nm_var_lab[106] = sc_convert_encoding($nm_var_lab[106], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[107] = "P3 - Generar Comprobantes a TNS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[107]))
{
    $nm_var_lab[107] = sc_convert_encoding($nm_var_lab[107], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[108] = "Presupuestos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[108]))
{
    $nm_var_lab[108] = sc_convert_encoding($nm_var_lab[108], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[109] = "Reportes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[109]))
{
    $nm_var_lab[109] = sc_convert_encoding($nm_var_lab[109], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[110] = "Impuestos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[110]))
{
    $nm_var_lab[110] = sc_convert_encoding($nm_var_lab[110], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[111] = "Impuestos en Ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[111]))
{
    $nm_var_lab[111] = sc_convert_encoding($nm_var_lab[111], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[112] = "Financieros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[112]))
{
    $nm_var_lab[112] = sc_convert_encoding($nm_var_lab[112], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[113] = "Total Ingresos/Egresos/Periodo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[113]))
{
    $nm_var_lab[113] = sc_convert_encoding($nm_var_lab[113], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[114] = "ABC de Clientes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[114]))
{
    $nm_var_lab[114] = sc_convert_encoding($nm_var_lab[114], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[115] = "ABC de Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[115]))
{
    $nm_var_lab[115] = sc_convert_encoding($nm_var_lab[115], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[116] = "Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[116]))
{
    $nm_var_lab[116] = sc_convert_encoding($nm_var_lab[116], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[117] = "Costo Total del Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[117]))
{
    $nm_var_lab[117] = sc_convert_encoding($nm_var_lab[117], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[118] = "Rotación de Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[118]))
{
    $nm_var_lab[118] = sc_convert_encoding($nm_var_lab[118], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[119] = "Inventario Físico por Producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[119]))
{
    $nm_var_lab[119] = sc_convert_encoding($nm_var_lab[119], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[120] = "Existencias por bodega";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[120]))
{
    $nm_var_lab[120] = sc_convert_encoding($nm_var_lab[120], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[121] = "Semanas Venta";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[121]))
{
    $nm_var_lab[121] = sc_convert_encoding($nm_var_lab[121], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[122] = "Productos/Pedido";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[122]))
{
    $nm_var_lab[122] = sc_convert_encoding($nm_var_lab[122], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[123] = "Vencimiento de Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[123]))
{
    $nm_var_lab[123] = sc_convert_encoding($nm_var_lab[123], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[124] = "Saldos por  Periodo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[124]))
{
    $nm_var_lab[124] = sc_convert_encoding($nm_var_lab[124], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[125] = "Existencia por Lote/Vencimiento/Serial";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[125]))
{
    $nm_var_lab[125] = sc_convert_encoding($nm_var_lab[125], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[126] = "Ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[126]))
{
    $nm_var_lab[126] = sc_convert_encoding($nm_var_lab[126], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[127] = "Venta por Vendedor/Producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[127]))
{
    $nm_var_lab[127] = sc_convert_encoding($nm_var_lab[127], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[128] = "Ventas Totales por Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[128]))
{
    $nm_var_lab[128] = sc_convert_encoding($nm_var_lab[128], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[129] = "Flujo de Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[129]))
{
    $nm_var_lab[129] = sc_convert_encoding($nm_var_lab[129], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[130] = "Informe Caja POS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[130]))
{
    $nm_var_lab[130] = sc_convert_encoding($nm_var_lab[130], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[131] = "Venta/Costo/Ganancia";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[131]))
{
    $nm_var_lab[131] = sc_convert_encoding($nm_var_lab[131], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[132] = "Grid/Ventas/Ubicación";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[132]))
{
    $nm_var_lab[132] = sc_convert_encoding($nm_var_lab[132], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[133] = "Ventas por Producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[133]))
{
    $nm_var_lab[133] = sc_convert_encoding($nm_var_lab[133], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[134] = "Ventas por Grupo/Familia";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[134]))
{
    $nm_var_lab[134] = sc_convert_encoding($nm_var_lab[134], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[135] = "Ventas por Cliente";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[135]))
{
    $nm_var_lab[135] = sc_convert_encoding($nm_var_lab[135], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[136] = "Ventas por Vendedor";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[136]))
{
    $nm_var_lab[136] = sc_convert_encoding($nm_var_lab[136], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[137] = "Recarcular Reporte Flujo/Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[137]))
{
    $nm_var_lab[137] = sc_convert_encoding($nm_var_lab[137], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[138] = "Productos Pedidos por día";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[138]))
{
    $nm_var_lab[138] = sc_convert_encoding($nm_var_lab[138], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[139] = "Ventas por productos por día";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[139]))
{
    $nm_var_lab[139] = sc_convert_encoding($nm_var_lab[139], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[140] = "Cartera";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[140]))
{
    $nm_var_lab[140] = sc_convert_encoding($nm_var_lab[140], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[141] = "Saldo Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[141]))
{
    $nm_var_lab[141] = sc_convert_encoding($nm_var_lab[141], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[142] = "Cartera por Edades";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[142]))
{
    $nm_var_lab[142] = sc_convert_encoding($nm_var_lab[142], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[143] = "Reportes Contratos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[143]))
{
    $nm_var_lab[143] = sc_convert_encoding($nm_var_lab[143], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[144] = "Impuestos/Periodo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[144]))
{
    $nm_var_lab[144] = sc_convert_encoding($nm_var_lab[144], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[145] = "CRM";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[145]))
{
    $nm_var_lab[145] = sc_convert_encoding($nm_var_lab[145], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[146] = "Tareas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[146]))
{
    $nm_var_lab[146] = sc_convert_encoding($nm_var_lab[146], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[147] = "Contactos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[147]))
{
    $nm_var_lab[147] = sc_convert_encoding($nm_var_lab[147], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[148] = "Cotizaciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[148]))
{
    $nm_var_lab[148] = sc_convert_encoding($nm_var_lab[148], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[149] = "Contratos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[149]))
{
    $nm_var_lab[149] = sc_convert_encoding($nm_var_lab[149], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[150] = "Listar contratos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[150]))
{
    $nm_var_lab[150] = sc_convert_encoding($nm_var_lab[150], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[151] = "Generar facturas del periodo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[151]))
{
    $nm_var_lab[151] = sc_convert_encoding($nm_var_lab[151], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[152] = "Lista de facturas contratos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[152]))
{
    $nm_var_lab[152] = sc_convert_encoding($nm_var_lab[152], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[153] = "Descargar PDFs";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[153]))
{
    $nm_var_lab[153] = sc_convert_encoding($nm_var_lab[153], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[154] = "Recibos de Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[154]))
{
    $nm_var_lab[154] = sc_convert_encoding($nm_var_lab[154], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[155] = "Dispositivos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[155]))
{
    $nm_var_lab[155] = sc_convert_encoding($nm_var_lab[155], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[156] = "Asignar Dispositivo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[156]))
{
    $nm_var_lab[156] = sc_convert_encoding($nm_var_lab[156], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[157] = "Estado";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[157]))
{
    $nm_var_lab[157] = sc_convert_encoding($nm_var_lab[157], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[158] = "Motivos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[158]))
{
    $nm_var_lab[158] = sc_convert_encoding($nm_var_lab[158], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[159] = "Casos CRM";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[159]))
{
    $nm_var_lab[159] = sc_convert_encoding($nm_var_lab[159], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[160] = "Casos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[160]))
{
    $nm_var_lab[160] = sc_convert_encoding($nm_var_lab[160], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[161] = "Clasificaciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[161]))
{
    $nm_var_lab[161] = sc_convert_encoding($nm_var_lab[161], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[162] = "Campañas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[162]))
{
    $nm_var_lab[162] = sc_convert_encoding($nm_var_lab[162], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[163] = "Estados";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[163]))
{
    $nm_var_lab[163] = sc_convert_encoding($nm_var_lab[163], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[164] = "Prioridades";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[164]))
{
    $nm_var_lab[164] = sc_convert_encoding($nm_var_lab[164], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[165] = "Empresa";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[165]))
{
    $nm_var_lab[165] = sc_convert_encoding($nm_var_lab[165], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[166] = "Agenda";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[166]))
{
    $nm_var_lab[166] = sc_convert_encoding($nm_var_lab[166], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[167] = "Correo Electrónico";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[167]))
{
    $nm_var_lab[167] = sc_convert_encoding($nm_var_lab[167], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[168] = "Gestión de Archivos/Documentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[168]))
{
    $nm_var_lab[168] = sc_convert_encoding($nm_var_lab[168], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[169] = "Configuraciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[169]))
{
    $nm_var_lab[169] = sc_convert_encoding($nm_var_lab[169], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[170] = "Configurar Empresa";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[170]))
{
    $nm_var_lab[170] = sc_convert_encoding($nm_var_lab[170], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[171] = "Sucursales";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[171]))
{
    $nm_var_lab[171] = sc_convert_encoding($nm_var_lab[171], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[172] = "Consecutivos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[172]))
{
    $nm_var_lab[172] = sc_convert_encoding($nm_var_lab[172], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[173] = "Configuración Impresión POS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[173]))
{
    $nm_var_lab[173] = sc_convert_encoding($nm_var_lab[173], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[174] = "General";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[174]))
{
    $nm_var_lab[174] = sc_convert_encoding($nm_var_lab[174], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[175] = "WebService FE";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[175]))
{
    $nm_var_lab[175] = sc_convert_encoding($nm_var_lab[175], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[176] = "Resolución Dian";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[176]))
{
    $nm_var_lab[176] = sc_convert_encoding($nm_var_lab[176], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[177] = "Plantillas Correo FE";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[177]))
{
    $nm_var_lab[177] = sc_convert_encoding($nm_var_lab[177], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[178] = "Tablas de retenciones e Impuestos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[178]))
{
    $nm_var_lab[178] = sc_convert_encoding($nm_var_lab[178], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[179] = "Tabla IVA";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[179]))
{
    $nm_var_lab[179] = sc_convert_encoding($nm_var_lab[179], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[180] = "Tabla Retefuente";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[180]))
{
    $nm_var_lab[180] = sc_convert_encoding($nm_var_lab[180], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[181] = "Tabla Rete ICA";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[181]))
{
    $nm_var_lab[181] = sc_convert_encoding($nm_var_lab[181], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[182] = "Tabla de Auto Retenciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[182]))
{
    $nm_var_lab[182] = sc_convert_encoding($nm_var_lab[182], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[183] = "Centro de Costos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[183]))
{
    $nm_var_lab[183] = sc_convert_encoding($nm_var_lab[183], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[184] = "Prefijos Documentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[184]))
{
    $nm_var_lab[184] = sc_convert_encoding($nm_var_lab[184], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[185] = "Bodegas o Almacén";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[185]))
{
    $nm_var_lab[185] = sc_convert_encoding($nm_var_lab[185], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[186] = "Balanza";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[186]))
{
    $nm_var_lab[186] = sc_convert_encoding($nm_var_lab[186], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[187] = "Usuarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[187]))
{
    $nm_var_lab[187] = sc_convert_encoding($nm_var_lab[187], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[188] = "Lista Usuarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[188]))
{
    $nm_var_lab[188] = sc_convert_encoding($nm_var_lab[188], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[189] = "Nuevo Usuario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[189]))
{
    $nm_var_lab[189] = sc_convert_encoding($nm_var_lab[189], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[190] = "Grupos de Usuarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[190]))
{
    $nm_var_lab[190] = sc_convert_encoding($nm_var_lab[190], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[191] = "Permisos de Usuario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[191]))
{
    $nm_var_lab[191] = sc_convert_encoding($nm_var_lab[191], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[192] = "Copiar Permisos Usuario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[192]))
{
    $nm_var_lab[192] = sc_convert_encoding($nm_var_lab[192], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[193] = "Permisos/Menú/Móvil";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[193]))
{
    $nm_var_lab[193] = sc_convert_encoding($nm_var_lab[193], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[194] = "Lista Aplicaciones Menú";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[194]))
{
    $nm_var_lab[194] = sc_convert_encoding($nm_var_lab[194], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[195] = "Aplicaciones/Menú/Móvil";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[195]))
{
    $nm_var_lab[195] = sc_convert_encoding($nm_var_lab[195], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[196] = "Lista Empresas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[196]))
{
    $nm_var_lab[196] = sc_convert_encoding($nm_var_lab[196], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[197] = "Mantenimiento";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[197]))
{
    $nm_var_lab[197] = sc_convert_encoding($nm_var_lab[197], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[198] = "Recalcular Existencias";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[198]))
{
    $nm_var_lab[198] = sc_convert_encoding($nm_var_lab[198], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[199] = "Recalcular Existencias (Lote/Vencimiento/Serial)";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[199]))
{
    $nm_var_lab[199] = sc_convert_encoding($nm_var_lab[199], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[200] = "Hacer Copia de Seguridad";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[200]))
{
    $nm_var_lab[200] = sc_convert_encoding($nm_var_lab[200], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[201] = "Restaurar Copia de Seguridad";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[201]))
{
    $nm_var_lab[201] = sc_convert_encoding($nm_var_lab[201], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[202] = "Optimizar Base de Datos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[202]))
{
    $nm_var_lab[202] = sc_convert_encoding($nm_var_lab[202], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[203] = "Ajustes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[203]))
{
    $nm_var_lab[203] = sc_convert_encoding($nm_var_lab[203], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[204] = "Reiniciar Base de Datos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[204]))
{
    $nm_var_lab[204] = sc_convert_encoding($nm_var_lab[204], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[205] = "Resetear Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[205]))
{
    $nm_var_lab[205] = sc_convert_encoding($nm_var_lab[205], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[206] = "Tipo de Documentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[206]))
{
    $nm_var_lab[206] = sc_convert_encoding($nm_var_lab[206], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[207] = "Manejador de BD";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[207]))
{
    $nm_var_lab[207] = sc_convert_encoding($nm_var_lab[207], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[208] = "Nube";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[208]))
{
    $nm_var_lab[208] = sc_convert_encoding($nm_var_lab[208], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[209] = "Editar Municipios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[209]))
{
    $nm_var_lab[209] = sc_convert_encoding($nm_var_lab[209], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[210] = "Unidades de Medida";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[210]))
{
    $nm_var_lab[210] = sc_convert_encoding($nm_var_lab[210], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[211] = "Tipo de Producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[211]))
{
    $nm_var_lab[211] = sc_convert_encoding($nm_var_lab[211], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[212] = "Importar de TNS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[212]))
{
    $nm_var_lab[212] = sc_convert_encoding($nm_var_lab[212], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[213] = "1. Importar grupo de articulos de TNS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[213]))
{
    $nm_var_lab[213] = sc_convert_encoding($nm_var_lab[213], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[214] = "2. Importar tipos de IVA";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[214]))
{
    $nm_var_lab[214] = sc_convert_encoding($nm_var_lab[214], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[215] = "3. Importar plan de cuentas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[215]))
{
    $nm_var_lab[215] = sc_convert_encoding($nm_var_lab[215], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[216] = "4. Importar grupos contables";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[216]))
{
    $nm_var_lab[216] = sc_convert_encoding($nm_var_lab[216], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[217] = "5. Importar articulos de TNS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[217]))
{
    $nm_var_lab[217] = sc_convert_encoding($nm_var_lab[217], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[218] = "6. Importar terceros de TNS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[218]))
{
    $nm_var_lab[218] = sc_convert_encoding($nm_var_lab[218], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[219] = "7. Importar inventario de TNS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[219]))
{
    $nm_var_lab[219] = sc_convert_encoding($nm_var_lab[219], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[220] = "Log Auditoría de Usuarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[220]))
{
    $nm_var_lab[220] = sc_convert_encoding($nm_var_lab[220], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[221] = "Pedidos Borrados";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[221]))
{
    $nm_var_lab[221] = sc_convert_encoding($nm_var_lab[221], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[222] = "Ayuda";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[222]))
{
    $nm_var_lab[222] = sc_convert_encoding($nm_var_lab[222], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[223] = "Soporte";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[223]))
{
    $nm_var_lab[223] = sc_convert_encoding($nm_var_lab[223], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[224] = "Buscar Actualizaciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[224]))
{
    $nm_var_lab[224] = sc_convert_encoding($nm_var_lab[224], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[225] = "Descargar Anydesk";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[225]))
{
    $nm_var_lab[225] = sc_convert_encoding($nm_var_lab[225], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[226] = "Acerca de";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[226]))
{
    $nm_var_lab[226] = sc_convert_encoding($nm_var_lab[226], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[227] = "Manual";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[227]))
{
    $nm_var_lab[227] = sc_convert_encoding($nm_var_lab[227], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[228] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[228]))
{
    $nm_var_lab[228] = sc_convert_encoding($nm_var_lab[228], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[229] = "Salir";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[229]))
{
    $nm_var_lab[229] = sc_convert_encoding($nm_var_lab[229], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[0] = "Clientes, proveedores, empleados...";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[0]))
{
    $nm_var_hint[0] = sc_convert_encoding($nm_var_hint[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[1] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[1]))
{
    $nm_var_hint[1] = sc_convert_encoding($nm_var_hint[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[2] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[2]))
{
    $nm_var_hint[2] = sc_convert_encoding($nm_var_hint[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[3] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[3]))
{
    $nm_var_hint[3] = sc_convert_encoding($nm_var_hint[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[4] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[4]))
{
    $nm_var_hint[4] = sc_convert_encoding($nm_var_hint[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[5] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[5]))
{
    $nm_var_hint[5] = sc_convert_encoding($nm_var_hint[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[6] = "Clasificación de Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[6]))
{
    $nm_var_hint[6] = sc_convert_encoding($nm_var_hint[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[7] = "Zona Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[7]))
{
    $nm_var_hint[7] = sc_convert_encoding($nm_var_hint[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[8] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[8]))
{
    $nm_var_hint[8] = sc_convert_encoding($nm_var_hint[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[9] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[9]))
{
    $nm_var_hint[9] = sc_convert_encoding($nm_var_hint[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[10] = "Ruteros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[10]))
{
    $nm_var_hint[10] = sc_convert_encoding($nm_var_hint[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[11] = "Importar Ruteros desde Excel";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[11]))
{
    $nm_var_hint[11] = sc_convert_encoding($nm_var_hint[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[12] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[12]))
{
    $nm_var_hint[12] = sc_convert_encoding($nm_var_hint[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[13] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[13]))
{
    $nm_var_hint[13] = sc_convert_encoding($nm_var_hint[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[14] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[14]))
{
    $nm_var_hint[14] = sc_convert_encoding($nm_var_hint[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[15] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[15]))
{
    $nm_var_hint[15] = sc_convert_encoding($nm_var_hint[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[16] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[16]))
{
    $nm_var_hint[16] = sc_convert_encoding($nm_var_hint[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[17] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[17]))
{
    $nm_var_hint[17] = sc_convert_encoding($nm_var_hint[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[18] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[18]))
{
    $nm_var_hint[18] = sc_convert_encoding($nm_var_hint[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[19] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[19]))
{
    $nm_var_hint[19] = sc_convert_encoding($nm_var_hint[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[20] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[20]))
{
    $nm_var_hint[20] = sc_convert_encoding($nm_var_hint[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[21] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[21]))
{
    $nm_var_hint[21] = sc_convert_encoding($nm_var_hint[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[22] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[22]))
{
    $nm_var_hint[22] = sc_convert_encoding($nm_var_hint[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[23] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[23]))
{
    $nm_var_hint[23] = sc_convert_encoding($nm_var_hint[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[24] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[24]))
{
    $nm_var_hint[24] = sc_convert_encoding($nm_var_hint[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[25] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[25]))
{
    $nm_var_hint[25] = sc_convert_encoding($nm_var_hint[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[26] = "Actualizar El proveedor en los Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[26]))
{
    $nm_var_hint[26] = sc_convert_encoding($nm_var_hint[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[27] = "Consultar Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[27]))
{
    $nm_var_hint[27] = sc_convert_encoding($nm_var_hint[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[28] = "Edición Rápido Grupo Contable";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[28]))
{
    $nm_var_hint[28] = sc_convert_encoding($nm_var_hint[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[29] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[29]))
{
    $nm_var_hint[29] = sc_convert_encoding($nm_var_hint[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[30] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[30]))
{
    $nm_var_hint[30] = sc_convert_encoding($nm_var_hint[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[31] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[31]))
{
    $nm_var_hint[31] = sc_convert_encoding($nm_var_hint[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[32] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[32]))
{
    $nm_var_hint[32] = sc_convert_encoding($nm_var_hint[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[33] = "Nuevo Pedido de compra";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[33]))
{
    $nm_var_hint[33] = sc_convert_encoding($nm_var_hint[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[34] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[34]))
{
    $nm_var_hint[34] = sc_convert_encoding($nm_var_hint[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[35] = "Devolución en compras";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[35]))
{
    $nm_var_hint[35] = sc_convert_encoding($nm_var_hint[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[36] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[36]))
{
    $nm_var_hint[36] = sc_convert_encoding($nm_var_hint[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[37] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[37]))
{
    $nm_var_hint[37] = sc_convert_encoding($nm_var_hint[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[38] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[38]))
{
    $nm_var_hint[38] = sc_convert_encoding($nm_var_hint[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[39] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[39]))
{
    $nm_var_hint[39] = sc_convert_encoding($nm_var_hint[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[40] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[40]))
{
    $nm_var_hint[40] = sc_convert_encoding($nm_var_hint[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[41] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[41]))
{
    $nm_var_hint[41] = sc_convert_encoding($nm_var_hint[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[42] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[42]))
{
    $nm_var_hint[42] = sc_convert_encoding($nm_var_hint[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[43] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[43]))
{
    $nm_var_hint[43] = sc_convert_encoding($nm_var_hint[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[44] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[44]))
{
    $nm_var_hint[44] = sc_convert_encoding($nm_var_hint[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[45] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[45]))
{
    $nm_var_hint[45] = sc_convert_encoding($nm_var_hint[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[46] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[46]))
{
    $nm_var_hint[46] = sc_convert_encoding($nm_var_hint[46], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[47] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[47]))
{
    $nm_var_hint[47] = sc_convert_encoding($nm_var_hint[47], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[48] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[48]))
{
    $nm_var_hint[48] = sc_convert_encoding($nm_var_hint[48], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[49] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[49]))
{
    $nm_var_hint[49] = sc_convert_encoding($nm_var_hint[49], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[50] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[50]))
{
    $nm_var_hint[50] = sc_convert_encoding($nm_var_hint[50], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[51] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[51]))
{
    $nm_var_hint[51] = sc_convert_encoding($nm_var_hint[51], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[52] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[52]))
{
    $nm_var_hint[52] = sc_convert_encoding($nm_var_hint[52], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[53] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[53]))
{
    $nm_var_hint[53] = sc_convert_encoding($nm_var_hint[53], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[54] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[54]))
{
    $nm_var_hint[54] = sc_convert_encoding($nm_var_hint[54], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[55] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[55]))
{
    $nm_var_hint[55] = sc_convert_encoding($nm_var_hint[55], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[56] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[56]))
{
    $nm_var_hint[56] = sc_convert_encoding($nm_var_hint[56], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[57] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[57]))
{
    $nm_var_hint[57] = sc_convert_encoding($nm_var_hint[57], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[58] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[58]))
{
    $nm_var_hint[58] = sc_convert_encoding($nm_var_hint[58], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[59] = "Venta Rápida";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[59]))
{
    $nm_var_hint[59] = sc_convert_encoding($nm_var_hint[59], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[60] = "Venta Rápida - Admin";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[60]))
{
    $nm_var_hint[60] = sc_convert_encoding($nm_var_hint[60], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[61] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[61]))
{
    $nm_var_hint[61] = sc_convert_encoding($nm_var_hint[61], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[62] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[62]))
{
    $nm_var_hint[62] = sc_convert_encoding($nm_var_hint[62], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[63] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[63]))
{
    $nm_var_hint[63] = sc_convert_encoding($nm_var_hint[63], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[64] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[64]))
{
    $nm_var_hint[64] = sc_convert_encoding($nm_var_hint[64], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[65] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[65]))
{
    $nm_var_hint[65] = sc_convert_encoding($nm_var_hint[65], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[66] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[66]))
{
    $nm_var_hint[66] = sc_convert_encoding($nm_var_hint[66], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[67] = "Programar Descuentos Generales";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[67]))
{
    $nm_var_hint[67] = sc_convert_encoding($nm_var_hint[67], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[68] = "Parametrizar facturas automáticas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[68]))
{
    $nm_var_hint[68] = sc_convert_encoding($nm_var_hint[68], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[69] = "Enviar Facturas Electrónicas entre Fechas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[69]))
{
    $nm_var_hint[69] = sc_convert_encoding($nm_var_hint[69], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[70] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[70]))
{
    $nm_var_hint[70] = sc_convert_encoding($nm_var_hint[70], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[71] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[71]))
{
    $nm_var_hint[71] = sc_convert_encoding($nm_var_hint[71], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[72] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[72]))
{
    $nm_var_hint[72] = sc_convert_encoding($nm_var_hint[72], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[73] = "Pedido, cotizaciones, Proformas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[73]))
{
    $nm_var_hint[73] = sc_convert_encoding($nm_var_hint[73], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[74] = "Pedido, cotizaciones, Proformas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[74]))
{
    $nm_var_hint[74] = sc_convert_encoding($nm_var_hint[74], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[75] = "Pedido, cotizaciones, Proformas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[75]))
{
    $nm_var_hint[75] = sc_convert_encoding($nm_var_hint[75], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[76] = "Recalcular Ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[76]))
{
    $nm_var_hint[76] = sc_convert_encoding($nm_var_hint[76], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[77] = "Restaurante";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[77]))
{
    $nm_var_hint[77] = sc_convert_encoding($nm_var_hint[77], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[78] = "Pedidos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[78]))
{
    $nm_var_hint[78] = sc_convert_encoding($nm_var_hint[78], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[79] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[79]))
{
    $nm_var_hint[79] = sc_convert_encoding($nm_var_hint[79], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[80] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[80]))
{
    $nm_var_hint[80] = sc_convert_encoding($nm_var_hint[80], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[81] = "Cobro facturas de venta...";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[81]))
{
    $nm_var_hint[81] = sc_convert_encoding($nm_var_hint[81], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[82] = "Cuenta Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[82]))
{
    $nm_var_hint[82] = sc_convert_encoding($nm_var_hint[82], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[83] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[83]))
{
    $nm_var_hint[83] = sc_convert_encoding($nm_var_hint[83], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[84] = "Recibos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[84]))
{
    $nm_var_hint[84] = sc_convert_encoding($nm_var_hint[84], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[85] = "Recibos de caja simple";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[85]))
{
    $nm_var_hint[85] = sc_convert_encoding($nm_var_hint[85], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[86] = "Recalcular Documentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[86]))
{
    $nm_var_hint[86] = sc_convert_encoding($nm_var_hint[86], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[87] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[87]))
{
    $nm_var_hint[87] = sc_convert_encoding($nm_var_hint[87], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[88] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[88]))
{
    $nm_var_hint[88] = sc_convert_encoding($nm_var_hint[88], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[89] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[89]))
{
    $nm_var_hint[89] = sc_convert_encoding($nm_var_hint[89], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[90] = "Documentos Tesorería";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[90]))
{
    $nm_var_hint[90] = sc_convert_encoding($nm_var_hint[90], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[91] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[91]))
{
    $nm_var_hint[91] = sc_convert_encoding($nm_var_hint[91], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[92] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[92]))
{
    $nm_var_hint[92] = sc_convert_encoding($nm_var_hint[92], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[93] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[93]))
{
    $nm_var_hint[93] = sc_convert_encoding($nm_var_hint[93], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[94] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[94]))
{
    $nm_var_hint[94] = sc_convert_encoding($nm_var_hint[94], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[95] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[95]))
{
    $nm_var_hint[95] = sc_convert_encoding($nm_var_hint[95], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[96] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[96]))
{
    $nm_var_hint[96] = sc_convert_encoding($nm_var_hint[96], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[97] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[97]))
{
    $nm_var_hint[97] = sc_convert_encoding($nm_var_hint[97], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[98] = "Contable";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[98]))
{
    $nm_var_hint[98] = sc_convert_encoding($nm_var_hint[98], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[99] = "Plan de Cuentas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[99]))
{
    $nm_var_hint[99] = sc_convert_encoding($nm_var_hint[99], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[100] = "Grupos Contables";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[100]))
{
    $nm_var_hint[100] = sc_convert_encoding($nm_var_hint[100], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[101] = "Editar Contable Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[101]))
{
    $nm_var_hint[101] = sc_convert_encoding($nm_var_hint[101], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[102] = "Editar Contable Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[102]))
{
    $nm_var_hint[102] = sc_convert_encoding($nm_var_hint[102], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[103] = "Exportar Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[103]))
{
    $nm_var_hint[103] = sc_convert_encoding($nm_var_hint[103], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[104] = "Exportar Asientos Contables";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[104]))
{
    $nm_var_hint[104] = sc_convert_encoding($nm_var_hint[104], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[105] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[105]))
{
    $nm_var_hint[105] = sc_convert_encoding($nm_var_hint[105], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[106] = "Generar Comprobantes Contables de Ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[106]))
{
    $nm_var_hint[106] = sc_convert_encoding($nm_var_hint[106], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[107] = "Comprobantes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[107]))
{
    $nm_var_hint[107] = sc_convert_encoding($nm_var_hint[107], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[108] = "Presupuestos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[108]))
{
    $nm_var_hint[108] = sc_convert_encoding($nm_var_hint[108], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[109] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[109]))
{
    $nm_var_hint[109] = sc_convert_encoding($nm_var_hint[109], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[110] = "Impuestos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[110]))
{
    $nm_var_hint[110] = sc_convert_encoding($nm_var_hint[110], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[111] = "Impuestos en  Ventas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[111]))
{
    $nm_var_hint[111] = sc_convert_encoding($nm_var_hint[111], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[112] = "Financieros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[112]))
{
    $nm_var_hint[112] = sc_convert_encoding($nm_var_hint[112], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[113] = "Total Ingresos/Egresos/Periodo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[113]))
{
    $nm_var_hint[113] = sc_convert_encoding($nm_var_hint[113], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[114] = "ABC de Clientes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[114]))
{
    $nm_var_hint[114] = sc_convert_encoding($nm_var_hint[114], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[115] = "ABC de Productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[115]))
{
    $nm_var_hint[115] = sc_convert_encoding($nm_var_hint[115], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[116] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[116]))
{
    $nm_var_hint[116] = sc_convert_encoding($nm_var_hint[116], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[117] = "Costo Total del Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[117]))
{
    $nm_var_hint[117] = sc_convert_encoding($nm_var_hint[117], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[118] = "Rotación de Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[118]))
{
    $nm_var_hint[118] = sc_convert_encoding($nm_var_hint[118], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[119] = "Inventario Físico por Producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[119]))
{
    $nm_var_hint[119] = sc_convert_encoding($nm_var_hint[119], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[120] = "Existencias por bodega";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[120]))
{
    $nm_var_hint[120] = sc_convert_encoding($nm_var_hint[120], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[121] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[121]))
{
    $nm_var_hint[121] = sc_convert_encoding($nm_var_hint[121], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[122] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[122]))
{
    $nm_var_hint[122] = sc_convert_encoding($nm_var_hint[122], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[123] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[123]))
{
    $nm_var_hint[123] = sc_convert_encoding($nm_var_hint[123], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[124] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[124]))
{
    $nm_var_hint[124] = sc_convert_encoding($nm_var_hint[124], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[125] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[125]))
{
    $nm_var_hint[125] = sc_convert_encoding($nm_var_hint[125], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[126] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[126]))
{
    $nm_var_hint[126] = sc_convert_encoding($nm_var_hint[126], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[127] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[127]))
{
    $nm_var_hint[127] = sc_convert_encoding($nm_var_hint[127], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[128] = "Ventas Totales por Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[128]))
{
    $nm_var_hint[128] = sc_convert_encoding($nm_var_hint[128], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[129] = "Flujo de Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[129]))
{
    $nm_var_hint[129] = sc_convert_encoding($nm_var_hint[129], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[130] = "Informe Caja POS";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[130]))
{
    $nm_var_hint[130] = sc_convert_encoding($nm_var_hint[130], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[131] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[131]))
{
    $nm_var_hint[131] = sc_convert_encoding($nm_var_hint[131], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[132] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[132]))
{
    $nm_var_hint[132] = sc_convert_encoding($nm_var_hint[132], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[133] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[133]))
{
    $nm_var_hint[133] = sc_convert_encoding($nm_var_hint[133], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[134] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[134]))
{
    $nm_var_hint[134] = sc_convert_encoding($nm_var_hint[134], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[135] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[135]))
{
    $nm_var_hint[135] = sc_convert_encoding($nm_var_hint[135], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[136] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[136]))
{
    $nm_var_hint[136] = sc_convert_encoding($nm_var_hint[136], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[137] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[137]))
{
    $nm_var_hint[137] = sc_convert_encoding($nm_var_hint[137], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[138] = "Productos Pedidos por día";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[138]))
{
    $nm_var_hint[138] = sc_convert_encoding($nm_var_hint[138], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[139] = "Ventas por productos por día";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[139]))
{
    $nm_var_hint[139] = sc_convert_encoding($nm_var_hint[139], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[140] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[140]))
{
    $nm_var_hint[140] = sc_convert_encoding($nm_var_hint[140], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[141] = "Saldo Terceros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[141]))
{
    $nm_var_hint[141] = sc_convert_encoding($nm_var_hint[141], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[142] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[142]))
{
    $nm_var_hint[142] = sc_convert_encoding($nm_var_hint[142], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[143] = "Reportes Contratos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[143]))
{
    $nm_var_hint[143] = sc_convert_encoding($nm_var_hint[143], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[144] = "Impuestos/Periodo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[144]))
{
    $nm_var_hint[144] = sc_convert_encoding($nm_var_hint[144], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[145] = "Gestión Relación Clientes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[145]))
{
    $nm_var_hint[145] = sc_convert_encoding($nm_var_hint[145], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[146] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[146]))
{
    $nm_var_hint[146] = sc_convert_encoding($nm_var_hint[146], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[147] = "Contactos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[147]))
{
    $nm_var_hint[147] = sc_convert_encoding($nm_var_hint[147], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[148] = "Cotizaciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[148]))
{
    $nm_var_hint[148] = sc_convert_encoding($nm_var_hint[148], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[149] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[149]))
{
    $nm_var_hint[149] = sc_convert_encoding($nm_var_hint[149], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[150] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[150]))
{
    $nm_var_hint[150] = sc_convert_encoding($nm_var_hint[150], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[151] = "Generar facturas del periodo";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[151]))
{
    $nm_var_hint[151] = sc_convert_encoding($nm_var_hint[151], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[152] = "Lista de Facturas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[152]))
{
    $nm_var_hint[152] = sc_convert_encoding($nm_var_hint[152], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[153] = "Descargar PDFs de factura electrónica";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[153]))
{
    $nm_var_hint[153] = sc_convert_encoding($nm_var_hint[153], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[154] = "Recibos de Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[154]))
{
    $nm_var_hint[154] = sc_convert_encoding($nm_var_hint[154], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[155] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[155]))
{
    $nm_var_hint[155] = sc_convert_encoding($nm_var_hint[155], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[156] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[156]))
{
    $nm_var_hint[156] = sc_convert_encoding($nm_var_hint[156], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[157] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[157]))
{
    $nm_var_hint[157] = sc_convert_encoding($nm_var_hint[157], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[158] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[158]))
{
    $nm_var_hint[158] = sc_convert_encoding($nm_var_hint[158], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[159] = "Seguimiento/Historial";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[159]))
{
    $nm_var_hint[159] = sc_convert_encoding($nm_var_hint[159], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[160] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[160]))
{
    $nm_var_hint[160] = sc_convert_encoding($nm_var_hint[160], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[161] = "Clasificaciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[161]))
{
    $nm_var_hint[161] = sc_convert_encoding($nm_var_hint[161], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[162] = "Campañas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[162]))
{
    $nm_var_hint[162] = sc_convert_encoding($nm_var_hint[162], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[163] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[163]))
{
    $nm_var_hint[163] = sc_convert_encoding($nm_var_hint[163], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[164] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[164]))
{
    $nm_var_hint[164] = sc_convert_encoding($nm_var_hint[164], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[165] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[165]))
{
    $nm_var_hint[165] = sc_convert_encoding($nm_var_hint[165], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[166] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[166]))
{
    $nm_var_hint[166] = sc_convert_encoding($nm_var_hint[166], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[167] = "Correo Electrónico";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[167]))
{
    $nm_var_hint[167] = sc_convert_encoding($nm_var_hint[167], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[168] = "Gestión de Archivos/Documentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[168]))
{
    $nm_var_hint[168] = sc_convert_encoding($nm_var_hint[168], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[169] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[169]))
{
    $nm_var_hint[169] = sc_convert_encoding($nm_var_hint[169], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[170] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[170]))
{
    $nm_var_hint[170] = sc_convert_encoding($nm_var_hint[170], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[171] = "Sucursales";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[171]))
{
    $nm_var_hint[171] = sc_convert_encoding($nm_var_hint[171], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[172] = "Consecutivos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[172]))
{
    $nm_var_hint[172] = sc_convert_encoding($nm_var_hint[172], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[173] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[173]))
{
    $nm_var_hint[173] = sc_convert_encoding($nm_var_hint[173], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[174] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[174]))
{
    $nm_var_hint[174] = sc_convert_encoding($nm_var_hint[174], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[175] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[175]))
{
    $nm_var_hint[175] = sc_convert_encoding($nm_var_hint[175], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[176] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[176]))
{
    $nm_var_hint[176] = sc_convert_encoding($nm_var_hint[176], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[177] = "Plantillas Correo FE";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[177]))
{
    $nm_var_hint[177] = sc_convert_encoding($nm_var_hint[177], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[178] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[178]))
{
    $nm_var_hint[178] = sc_convert_encoding($nm_var_hint[178], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[179] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[179]))
{
    $nm_var_hint[179] = sc_convert_encoding($nm_var_hint[179], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[180] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[180]))
{
    $nm_var_hint[180] = sc_convert_encoding($nm_var_hint[180], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[181] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[181]))
{
    $nm_var_hint[181] = sc_convert_encoding($nm_var_hint[181], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[182] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[182]))
{
    $nm_var_hint[182] = sc_convert_encoding($nm_var_hint[182], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[183] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[183]))
{
    $nm_var_hint[183] = sc_convert_encoding($nm_var_hint[183], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[184] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[184]))
{
    $nm_var_hint[184] = sc_convert_encoding($nm_var_hint[184], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[185] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[185]))
{
    $nm_var_hint[185] = sc_convert_encoding($nm_var_hint[185], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[186] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[186]))
{
    $nm_var_hint[186] = sc_convert_encoding($nm_var_hint[186], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[187] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[187]))
{
    $nm_var_hint[187] = sc_convert_encoding($nm_var_hint[187], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[188] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[188]))
{
    $nm_var_hint[188] = sc_convert_encoding($nm_var_hint[188], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[189] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[189]))
{
    $nm_var_hint[189] = sc_convert_encoding($nm_var_hint[189], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[190] = "Grupos de Usuarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[190]))
{
    $nm_var_hint[190] = sc_convert_encoding($nm_var_hint[190], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[191] = "Permisos de Usuario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[191]))
{
    $nm_var_hint[191] = sc_convert_encoding($nm_var_hint[191], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[192] = "Copiar Permisos Usuario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[192]))
{
    $nm_var_hint[192] = sc_convert_encoding($nm_var_hint[192], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[193] = "Permisos/Menú/Móvil";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[193]))
{
    $nm_var_hint[193] = sc_convert_encoding($nm_var_hint[193], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[194] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[194]))
{
    $nm_var_hint[194] = sc_convert_encoding($nm_var_hint[194], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[195] = "Aplicaciones/Menú/Móvil";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[195]))
{
    $nm_var_hint[195] = sc_convert_encoding($nm_var_hint[195], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[196] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[196]))
{
    $nm_var_hint[196] = sc_convert_encoding($nm_var_hint[196], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[197] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[197]))
{
    $nm_var_hint[197] = sc_convert_encoding($nm_var_hint[197], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[198] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[198]))
{
    $nm_var_hint[198] = sc_convert_encoding($nm_var_hint[198], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[199] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[199]))
{
    $nm_var_hint[199] = sc_convert_encoding($nm_var_hint[199], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[200] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[200]))
{
    $nm_var_hint[200] = sc_convert_encoding($nm_var_hint[200], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[201] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[201]))
{
    $nm_var_hint[201] = sc_convert_encoding($nm_var_hint[201], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[202] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[202]))
{
    $nm_var_hint[202] = sc_convert_encoding($nm_var_hint[202], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[203] = "Ajustes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[203]))
{
    $nm_var_hint[203] = sc_convert_encoding($nm_var_hint[203], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[204] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[204]))
{
    $nm_var_hint[204] = sc_convert_encoding($nm_var_hint[204], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[205] = "Resetear Inventario";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[205]))
{
    $nm_var_hint[205] = sc_convert_encoding($nm_var_hint[205], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[206] = "Tipo de Documentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[206]))
{
    $nm_var_hint[206] = sc_convert_encoding($nm_var_hint[206], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[207] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[207]))
{
    $nm_var_hint[207] = sc_convert_encoding($nm_var_hint[207], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[208] = "Nube";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[208]))
{
    $nm_var_hint[208] = sc_convert_encoding($nm_var_hint[208], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[209] = "Editar Municipios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[209]))
{
    $nm_var_hint[209] = sc_convert_encoding($nm_var_hint[209], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[210] = "Unidades de Medida";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[210]))
{
    $nm_var_hint[210] = sc_convert_encoding($nm_var_hint[210], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[211] = "Tipo de Producto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[211]))
{
    $nm_var_hint[211] = sc_convert_encoding($nm_var_hint[211], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[212] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[212]))
{
    $nm_var_hint[212] = sc_convert_encoding($nm_var_hint[212], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[213] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[213]))
{
    $nm_var_hint[213] = sc_convert_encoding($nm_var_hint[213], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[214] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[214]))
{
    $nm_var_hint[214] = sc_convert_encoding($nm_var_hint[214], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[215] = "3. Importar Plan de Cuentas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[215]))
{
    $nm_var_hint[215] = sc_convert_encoding($nm_var_hint[215], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[216] = "4. Importar Grupos Contables";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[216]))
{
    $nm_var_hint[216] = sc_convert_encoding($nm_var_hint[216], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[217] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[217]))
{
    $nm_var_hint[217] = sc_convert_encoding($nm_var_hint[217], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[218] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[218]))
{
    $nm_var_hint[218] = sc_convert_encoding($nm_var_hint[218], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[219] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[219]))
{
    $nm_var_hint[219] = sc_convert_encoding($nm_var_hint[219], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[220] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[220]))
{
    $nm_var_hint[220] = sc_convert_encoding($nm_var_hint[220], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[221] = "Pedidos Borrados";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[221]))
{
    $nm_var_hint[221] = sc_convert_encoding($nm_var_hint[221], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[222] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[222]))
{
    $nm_var_hint[222] = sc_convert_encoding($nm_var_hint[222], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[223] = "Soporte";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[223]))
{
    $nm_var_hint[223] = sc_convert_encoding($nm_var_hint[223], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[224] = "Buscar Actualizaciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[224]))
{
    $nm_var_hint[224] = sc_convert_encoding($nm_var_hint[224], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[225] = "Descargar Anydesk";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[225]))
{
    $nm_var_hint[225] = sc_convert_encoding($nm_var_hint[225], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[226] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[226]))
{
    $nm_var_hint[226] = sc_convert_encoding($nm_var_hint[226], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[227] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[227]))
{
    $nm_var_hint[227] = sc_convert_encoding($nm_var_hint[227], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[228] = "Nosotros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[228]))
{
    $nm_var_hint[228] = sc_convert_encoding($nm_var_hint[228], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[229] = "SALIR";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[229]))
{
    $nm_var_hint[229] = sc_convert_encoding($nm_var_hint[229], $_SESSION['scriptcase']['charset'], "UTF-8");
}
$saida_apl = $_SESSION['scriptcase']['sc_saida_menu'];
$menu_menuData['data'] .= "item_1|.|" . $nm_var_lab[0] . "||" . $nm_var_hint[0] . "|usr__NM__bg__NM__community_users_12977.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['terceros']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['terceros']) == "on")
{
    $menu_menuData['data'] .= "item_2|..|" . $nm_var_lab[1] . "|menu_form_php.php?sc_item_menu=item_2&sc_apl_menu=terceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[1] . "|grp__NM__ico__NM__user_add_12818.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_todos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_todos']) == "on")
{
    $menu_menuData['data'] .= "item_80|..|" . $nm_var_lab[2] . "|menu_form_php.php?sc_item_menu=item_80&sc_apl_menu=grid_terceros_todos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[2] . "|usr__NM__bg__NM__groups_people_people_1715.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_clientes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_clientes']) == "on")
{
    $menu_menuData['data'] .= "item_3|..|" . $nm_var_lab[3] . "|menu_form_php.php?sc_item_menu=item_3&sc_apl_menu=grid_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[3] . "|usr__NM__ico__NM__user_program_group_15361.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros']) == "on")
{
    $menu_menuData['data'] .= "item_6|..|" . $nm_var_lab[4] . "|menu_form_php.php?sc_item_menu=item_6&sc_apl_menu=grid_terceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[4] . "|usr__NM__bg__NM__checklist_25365.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_vendedores']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_vendedores']) == "on")
{
    $menu_menuData['data'] .= "item_58|..|" . $nm_var_lab[5] . "|menu_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_vendedores&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[5] . "|usr__NM__bg__NM__technicalsupport_support_representative_person_people_woman_1643.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']) == "on")
{
    $menu_menuData['data'] .= "item_151|..|" . $nm_var_lab[6] . "|menu_form_php.php?sc_item_menu=item_151&sc_apl_menu=form_clasificacion_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[6] . "|scriptcase__NM__ico__NM__id_cards_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_zona_clientes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_zona_clientes']) == "on")
{
    $menu_menuData['data'] .= "item_152|..|" . $nm_var_lab[7] . "|menu_form_php.php?sc_item_menu=item_152&sc_apl_menu=form_zona_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[7] . "|scriptcase__NM__ico__NM__earth_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['terceros_mesas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['terceros_mesas']) == "on")
{
    $menu_menuData['data'] .= "item_100|..|" . $nm_var_lab[8] . "|menu_form_php.php?sc_item_menu=item_100&sc_apl_menu=terceros_mesas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[8] . "|grp__NM__ico__NM__icon-mesa-de-restaurante-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_terceros_desde_excel']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_terceros_desde_excel']) == "on")
{
    $menu_menuData['data'] .= "item_126|..|" . $nm_var_lab[9] . "|menu_form_php.php?sc_item_menu=item_126&sc_apl_menu=blank_cargar_terceros_desde_excel&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[9] . "|grp__NM__ico__NM__icons8-ms-excel-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ruteros']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ruteros']) == "on")
{
    $menu_menuData['data'] .= "item_183|..|" . $nm_var_lab[10] . "|menu_form_php.php?sc_item_menu=item_183&sc_apl_menu=grid_ruteros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[10] . "|scriptcase__NM__ico__NM__id_cards_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_ruteros_desde_excel']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_ruteros_desde_excel']) == "on")
{
    $menu_menuData['data'] .= "item_230|..|" . $nm_var_lab[11] . "|menu_form_php.php?sc_item_menu=item_230&sc_apl_menu=blank_cargar_ruteros_desde_excel&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[11] . "|scriptcase__NM__ico__NM__import_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_4|.|" . $nm_var_lab[12] . "||" . $nm_var_hint[12] . "|usr__NM__bg__NM__vendedor_epartidordepizzas_person_1645.png|_self|\n";
$menu_menuData['data'] .= "item_5|..|" . $nm_var_lab[13] . "||" . $nm_var_hint[13] . "|usr__NM__bg__NM__addusergroup_1251.png|_self|\n";
$menu_menuData['data'] .= "item_7|.|" . $nm_var_lab[14] . "||" . $nm_var_hint[14] . "|scriptcase__NM__ico__NM__product_green_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos']) == "on")
{
    $menu_menuData['data'] .= "item_8|..|" . $nm_var_lab[15] . "|menu_form_php.php?sc_item_menu=item_8&sc_apl_menu=form_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[15] . "|usr__NM__bg__NM__shipping_products_22121.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_simple']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_simple']) == "on")
{
    $menu_menuData['data'] .= "item_84|..|" . $nm_var_lab[16] . "|menu_form_php.php?sc_item_menu=item_84&sc_apl_menu=form_productos_simple&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[16] . "|usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300 (1).png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']) == "on")
{
    $menu_menuData['data'] .= "item_9|..|" . $nm_var_lab[17] . "|menu_form_php.php?sc_item_menu=item_9&sc_apl_menu=grid_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[17] . "|scriptcase__NM__ico__NM__clipboard_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_marca']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_marca']) == "on")
{
    $menu_menuData['data'] .= "item_146|..|" . $nm_var_lab[18] . "|menu_form_php.php?sc_item_menu=item_146&sc_apl_menu=form_marca&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[18] . "|scriptcase__NM__ico__NM__ticket_blue_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_linea']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_linea']) == "on")
{
    $menu_menuData['data'] .= "item_147|..|" . $nm_var_lab[19] . "|menu_form_php.php?sc_item_menu=item_147&sc_apl_menu=form_linea&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[19] . "|scriptcase__NM__ico__NM__bookmarks_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_10|..|" . $nm_var_lab[20] . "||" . $nm_var_hint[20] . "|usr__NM__bg__NM__warehause_products_safety_5996.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_grupo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_grupo']) == "on")
{
    $menu_menuData['data'] .= "item_23|...|" . $nm_var_lab[21] . "|menu_form_php.php?sc_item_menu=item_23&sc_apl_menu=grid_grupo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[21] . "|usr__NM__bg__NM__Icon_Business_Set_00004_A_icon-icons.com_59844.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_grupo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_grupo']) == "on")
{
    $menu_menuData['data'] .= "item_24|...|" . $nm_var_lab[22] . "|menu_form_php.php?sc_item_menu=item_24&sc_apl_menu=form_grupo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[22] . "|usr__NM__bg__NM__warehause_products_safety_5996.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarprecios']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarprecios']) == "on")
{
    $menu_menuData['data'] .= "item_74|..|" . $nm_var_lab[23] . "|menu_form_php.php?sc_item_menu=item_74&sc_apl_menu=form_productos_editarprecios&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[23] . "|scriptcase__NM__ico__NM__address_book_edit_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_actualizar_precios_excel']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_actualizar_precios_excel']) == "on")
{
    $menu_menuData['data'] .= "item_77|..|" . $nm_var_lab[24] . "|menu_form_php.php?sc_item_menu=item_77&sc_apl_menu=blank_actualizar_precios_excel&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[24] . "|scriptcase__NM__ico__NM__clipboard_next_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_cargarproductos_excel']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_cargarproductos_excel']) == "on")
{
    $menu_menuData['data'] .= "item_108|..|" . $nm_var_lab[25] . "|menu_form_php.php?sc_item_menu=item_108&sc_apl_menu=control_cargarproductos_excel&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[25] . "|grp__NM__ico__NM__icons8-ms-excel-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarproveedor']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarproveedor']) == "on")
{
    $menu_menuData['data'] .= "item_210|..|" . $nm_var_lab[26] . "|menu_form_php.php?sc_item_menu=item_210&sc_apl_menu=form_productos_editarproveedor&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[26] . "|scriptcase__NM__ico__NM__registry_edit_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['consultar_productos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['consultar_productos']) == "on")
{
    $menu_menuData['data'] .= "item_215|..|" . $nm_var_lab[27] . "|menu_form_php.php?sc_item_menu=item_215&sc_apl_menu=consultar_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[27] . "|scriptcase__NM__ico__NM__find_text_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_fast_gcontable']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_fast_gcontable']) == "on")
{
    $menu_menuData['data'] .= "item_231|..|" . $nm_var_lab[28] . "|menu_form_php.php?sc_item_menu=item_231&sc_apl_menu=form_productos_fast_gcontable&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[28] . "|scriptcase__NM__ico__NM__cubes_blue_edit_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_11|.|" . $nm_var_lab[29] . "||" . $nm_var_hint[29] . "|usr__NM__bg__NM__blue_stock_folder_12352.png|_self|\n";
$menu_menuData['data'] .= "item_17|..|" . $nm_var_lab[30] . "||" . $nm_var_hint[30] . "|usr__NM__bg__NM__shopping_cart_full_22024.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['fac_compras']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['fac_compras']) == "on")
{
    $menu_menuData['data'] .= "item_19|...|" . $nm_var_lab[31] . "|menu_form_php.php?sc_item_menu=item_19&sc_apl_menu=fac_compras&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[31] . "|usr__NM__ico__NM__shoppingcart_below_compra_12831.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_compras']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_compras']) == "on")
{
    $menu_menuData['data'] .= "item_32|...|" . $nm_var_lab[32] . "|menu_form_php.php?sc_item_menu=item_32&sc_apl_menu=grid_compras&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[32] . "|usr__NM__ico__NM__table_1061.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_pedido_compra']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_pedido_compra']) == "on")
{
    $menu_menuData['data'] .= "item_85|...|" . $nm_var_lab[33] . "|menu_form_php.php?sc_item_menu=item_85&sc_apl_menu=form_pedido_compra&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[33] . "|grp__NM__ico__NM__list_992.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_compras']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_compras']) == "on")
{
    $menu_menuData['data'] .= "item_86|...|" . $nm_var_lab[34] . "|menu_form_php.php?sc_item_menu=item_86&sc_apl_menu=grid_pedidos_compras&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[34] . "|grp__NM__ico__NM__filter_list_21446.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_compras_dev']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_compras_dev']) == "on")
{
    $menu_menuData['data'] .= "item_43|...|" . $nm_var_lab[35] . "|menu_form_php.php?sc_item_menu=item_43&sc_apl_menu=grid_compras_dev&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[35] . "|usr__NM__ico__NM__go-back256_24856.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_codbarras_filtro']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_codbarras_filtro']) == "on")
{
    $menu_menuData['data'] .= "item_142|..|" . $nm_var_lab[36] . "|menu_form_php.php?sc_item_menu=item_142&sc_apl_menu=control_codbarras_filtro&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[36] . "|scriptcase__NM__ico__NM__barcode_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario']) == "on")
{
    $menu_menuData['data'] .= "item_41|..|" . $nm_var_lab[37] . "|menu_form_php.php?sc_item_menu=item_41&sc_apl_menu=grid_inventario&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[37] . "|usr__NM__bg__NM__mimetypes_office_spreadsheet_table_xls_381.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_13|..|" . $nm_var_lab[38] . "||" . $nm_var_hint[38] . "|usr__NM__bg__NM__Inventory-maintenance_25374.png|_self|\n";
$menu_menuData['data'] .= "item_55|...|" . $nm_var_lab[39] . "||" . $nm_var_hint[39] . "|usr__NM__ico__NM__Childish-Gears_24975.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_produccion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_produccion']) == "on")
{
    $menu_menuData['data'] .= "item_51|....|" . $nm_var_lab[40] . "|menu_form_php.php?sc_item_menu=item_51&sc_apl_menu=form_produccion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[40] . "|usr__NM__ico__NM__Factory_icon-icons.com_52104.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_produccion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_produccion']) == "on")
{
    $menu_menuData['data'] .= "item_52|....|" . $nm_var_lab[41] . "|menu_form_php.php?sc_item_menu=item_52&sc_apl_menu=grid_produccion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[41] . "|usr__NM__ico__NM__list_notes_930.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productosxtraslado']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productosxtraslado']) == "on")
{
    $menu_menuData['data'] .= "item_53|....|" . $nm_var_lab[42] . "|menu_form_php.php?sc_item_menu=item_53&sc_apl_menu=grid_productosxtraslado&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[42] . "|usr__NM__ico__NM__icons8-trigo-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_mov_trasladodeproduccion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_mov_trasladodeproduccion']) == "on")
{
    $menu_menuData['data'] .= "item_54|....|" . $nm_var_lab[43] . "|menu_form_php.php?sc_item_menu=item_54&sc_apl_menu=form_mov_trasladodeproduccion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[43] . "|usr__NM__ico__NM__if-food-c216-2427860_85697.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_trasladoprod_almacen']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_trasladoprod_almacen']) == "on")
{
    $menu_menuData['data'] .= "item_56|....|" . $nm_var_lab[44] . "|menu_form_php.php?sc_item_menu=item_56&sc_apl_menu=grid_mov_trasladoprod_almacen&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[44] . "|usr__NM__ico__NM__medical-36_icon-icons.com_73889.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detallenotamov_productos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detallenotamov_productos']) == "on")
{
    $menu_menuData['data'] .= "item_57|....|" . $nm_var_lab[45] . "|menu_form_php.php?sc_item_menu=item_57&sc_apl_menu=grid_detallenotamov_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[45] . "|usr__NM__ico__NM__FastFood_FrenchFries_26372.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_movimiento']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_movimiento']) == "on")
{
    $menu_menuData['data'] .= "item_33|...|" . $nm_var_lab[46] . "|menu_form_php.php?sc_item_menu=item_33&sc_apl_menu=grid_movimiento&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[46] . "|usr__NM__ico__NM__move_23058.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_30|...|" . $nm_var_lab[47] . "||" . $nm_var_hint[47] . "|usr__NM__bg__NM__1491254081-19document-list_82931.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_ajusteinv']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_ajusteinv']) == "on")
{
    $menu_menuData['data'] .= "item_35|....|" . $nm_var_lab[48] . "|menu_form_php.php?sc_item_menu=item_35&sc_apl_menu=grid_mov_ajusteinv&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[48] . "|usr__NM__ico__NM__korganizer_task_tasks_list_9501.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['Grid_ajuste_Inv_fisico']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Grid_ajuste_Inv_fisico']) == "on")
{
    $menu_menuData['data'] .= "item_82|....|" . $nm_var_lab[49] . "|menu_form_php.php?sc_item_menu=item_82&sc_apl_menu=Grid_ajuste_Inv_fisico&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[49] . "|grp__NM__bg__NM__inventario_fisico.jpeg|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_inical']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_inical']) == "on")
{
    $menu_menuData['data'] .= "item_12|....|" . $nm_var_lab[50] . "|menu_form_php.php?sc_item_menu=item_12&sc_apl_menu=grid_inventario_inical&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[50] . "|scriptcase__NM__ico__NM__form_yellow_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_inventario_inicial']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_inventario_inicial']) == "on")
{
    $menu_menuData['data'] .= "item_15|....|" . $nm_var_lab[51] . "|menu_form_php.php?sc_item_menu=item_15&sc_apl_menu=form_inventario_inicial&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[51] . "|scriptcase__NM__ico__NM__form_yellow_edit_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_final']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_final']) == "on")
{
    $menu_menuData['data'] .= "item_34|....|" . $nm_var_lab[52] . "|menu_form_php.php?sc_item_menu=item_34&sc_apl_menu=grid_inventario_final&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[52] . "|usr__NM__bg__NM__1491254081-19document-list_82931.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ajuste_notapos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ajuste_notapos']) == "on")
{
    $menu_menuData['data'] .= "item_98|....|" . $nm_var_lab[53] . "|menu_form_php.php?sc_item_menu=item_98&sc_apl_menu=grid_ajuste_notapos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[53] . "|grp__NM__ico__NM__icon_nota-icons.com_55995.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ajuste']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ajuste']) == "on")
{
    $menu_menuData['data'] .= "item_99|....|" . $nm_var_lab[54] . "|menu_form_php.php?sc_item_menu=item_99&sc_apl_menu=form_notainv_ajuste&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[54] . "|grp__NM__ico__NM__icon_notepad_78436.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipotransfe']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipotransfe']) == "on")
{
    $menu_menuData['data'] .= "item_31|...|" . $nm_var_lab[55] . "|menu_form_php.php?sc_item_menu=item_31&sc_apl_menu=form_tipotransfe&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[55] . "|scriptcase__NM__ico__NM__form_blue_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_14|.|" . $nm_var_lab[56] . "||" . $nm_var_hint[56] . "|usr__NM__bg__NM__business_salesreport_salesreport_negocio_2353.png|_self|\n";
$menu_menuData['data'] .= "item_16|..|" . $nm_var_lab[57] . "||" . $nm_var_hint[57] . "|usr__NM__ico__NM__cashier_icon-icons.com_53629.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_facturaven']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_facturaven']) == "on")
{
    $menu_menuData['data'] .= "item_36|...|" . $nm_var_lab[58] . "|menu_form_php.php?sc_item_menu=item_36&sc_apl_menu=form_facturaven&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[58] . "|usr__NM__bg__NM__invoice_22150 (1).png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_grid_pos_usuario']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_grid_pos_usuario']) == "on")
{
    $menu_menuData['data'] .= "item_38|...|" . $nm_var_lab[59] . "|menu_form_php.php?sc_item_menu=item_38&sc_apl_menu=blank_grid_pos_usuario&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[59] . "|scriptcase__NM__ico__NM__cashier_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_pos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_pos']) == "on")
{
    $menu_menuData['data'] .= "item_132|...|" . $nm_var_lab[60] . "|menu_form_php.php?sc_item_menu=item_132&sc_apl_menu=grid_facturaven_pos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[60] . "|scriptcase__NM__ico__NM__cashier_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['lectordeprecios']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['lectordeprecios']) == "on")
{
    $menu_menuData['data'] .= "item_134|...|" . $nm_var_lab[61] . "|menu_form_php.php?sc_item_menu=item_134&sc_apl_menu=lectordeprecios&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[61] . "|scriptcase__NM__ico__NM__handheld_device_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_remisiones']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_remisiones']) == "on")
{
    $menu_menuData['data'] .= "item_62|...|" . $nm_var_lab[62] . "|menu_form_php.php?sc_item_menu=item_62&sc_apl_menu=form_remisiones&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[62] . "|usr__NM__ico__NM__ic-payreceipt_97584.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven']) == "on")
{
    $menu_menuData['data'] .= "item_42|...|" . $nm_var_lab[63] . "|menu_form_php.php?sc_item_menu=item_42&sc_apl_menu=grid_facturaven&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[63] . "|usr__NM__bg__NM__Sales-by-payment-method_25410.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas']) == "on")
{
    $menu_menuData['data'] .= "item_37|...|" . $nm_var_lab[64] . "|menu_form_php.php?sc_item_menu=item_37&sc_apl_menu=grid_ventas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[64] . "|usr__NM__bg__NM__invoice_78456.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_remi']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_remi']) == "on")
{
    $menu_menuData['data'] .= "item_63|...|" . $nm_var_lab[65] . "|menu_form_php.php?sc_item_menu=item_63&sc_apl_menu=grid_remi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[65] . "|usr__NM__ico__NM__ic-ad_97607.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_40|...|" . $nm_var_lab[66] . "||" . $nm_var_hint[66] . "|usr__NM__ico__NM__shoppingcart_to_compra_12829.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_programar_descuentos_generales']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_programar_descuentos_generales']) == "on")
{
    $menu_menuData['data'] .= "item_184|...|" . $nm_var_lab[67] . "|menu_form_php.php?sc_item_menu=item_184&sc_apl_menu=grid_programar_descuentos_generales&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[67] . "|scriptcase__NM__ico__NM__calendar_down_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_automatica']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_automatica']) == "on")
{
    $menu_menuData['data'] .= "item_236|...|" . $nm_var_lab[68] . "|menu_form_php.php?sc_item_menu=item_236&sc_apl_menu=grid_facturaven_automatica&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[68] . "|scriptcase__NM__ico__NM__calendar_up_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_enviar_fe_periodo_propio']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_enviar_fe_periodo_propio']) == "on")
{
    $menu_menuData['data'] .= "item_254|...|" . $nm_var_lab[69] . "|menu_form_php.php?sc_item_menu=item_254&sc_apl_menu=blank_enviar_fe_periodo_propio&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[69] . "|scriptcase__NM__ico__NM__mailbox_full_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_48|..|" . $nm_var_lab[70] . "||" . $nm_var_hint[70] . "|grp__NM__ico__NM__note_102351.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_notas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_notas']) == "on")
{
    $menu_menuData['data'] .= "item_177|...|" . $nm_var_lab[71] . "|menu_form_php.php?sc_item_menu=item_177&sc_apl_menu=form_notas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[71] . "|scriptcase__NM__ico__NM__document_attachment_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_NC_ND']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_NC_ND']) == "on")
{
    $menu_menuData['data'] .= "item_178|...|" . $nm_var_lab[72] . "|menu_form_php.php?sc_item_menu=item_178&sc_apl_menu=grid_NC_ND&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[72] . "|scriptcase__NM__ico__NM__document_find_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_64|..|" . $nm_var_lab[73] . "||" . $nm_var_hint[73] . "|usr__NM__ico__NM__ilustracoes_04-12_icon-icons.com_75471.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_pedido']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_pedido']) == "on")
{
    $menu_menuData['data'] .= "item_65|...|" . $nm_var_lab[74] . "|menu_form_php.php?sc_item_menu=item_65&sc_apl_menu=form_pedido&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[74] . "|usr__NM__ico__NM__list_992.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_pedidos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_pedidos']) == "on")
{
    $menu_menuData['data'] .= "item_66|...|" . $nm_var_lab[75] . "|menu_form_php.php?sc_item_menu=item_66&sc_apl_menu=blank_iframe_pedidos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[75] . "|usr__NM__ico__NM__ilustracoes_04-14_icon-icons.com_75468.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_ventas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_ventas']) == "on")
{
    $menu_menuData['data'] .= "item_153|..|" . $nm_var_lab[76] . "|menu_form_php.php?sc_item_menu=item_153&sc_apl_menu=blank_recalcular_ventas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[76] . "|scriptcase__NM__ico__NM__calculator_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_250|..|" . $nm_var_lab[77] . "||" . $nm_var_hint[77] . "|scriptcase__NM__ico__NM__mug_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_restaurante']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_restaurante']) == "on")
{
    $menu_menuData['data'] .= "item_251|...|" . $nm_var_lab[78] . "|menu_form_php.php?sc_item_menu=item_251&sc_apl_menu=grid_pedidos_restaurante&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[78] . "|scriptcase__NM__ico__NM__pda2_write_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_45|.|" . $nm_var_lab[79] . "||" . $nm_var_hint[79] . "|grp__NM__ico__NM__icons8-comprar-por-dinero-32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cartera']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cartera']) == "on")
{
    $menu_menuData['data'] .= "item_50|..|" . $nm_var_lab[80] . "|menu_form_php.php?sc_item_menu=item_50&sc_apl_menu=grid_cartera&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[80] . "|grp__NM__ico__NM__icons8-cuenta-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso']) == "on")
{
    $menu_menuData['data'] .= "item_44|..|" . $nm_var_lab[81] . "|menu_form_php.php?sc_item_menu=item_44&sc_apl_menu=form_reciboingreso&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[81] . "|usr__NM__ico__NM__Banking_00011_A_icon-icons.com_59831.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porcobrar']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porcobrar']) == "on")
{
    $menu_menuData['data'] .= "item_154|..|" . $nm_var_lab[82] . "|menu_form_php.php?sc_item_menu=item_154&sc_apl_menu=grid_terceros_cuentas_porcobrar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[82] . "|scriptcase__NM__ico__NM__briefcase_document_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso_remis']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso_remis']) == "on")
{
    $menu_menuData['data'] .= "item_67|..|" . $nm_var_lab[83] . "|menu_form_php.php?sc_item_menu=item_67&sc_apl_menu=form_reciboingreso_remis&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[83] . "|usr__NM__ico__NM__Banking_00011_A_icon-icons.com_59831.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos']) == "on")
{
    $menu_menuData['data'] .= "item_246|..|" . $nm_var_lab[84] . "|menu_form_php.php?sc_item_menu=item_246&sc_apl_menu=grid_recibos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[84] . "|grp__NM__ico__NM__icons8-cuenta-32-2.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reciboingreso']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reciboingreso']) == "on")
{
    $menu_menuData['data'] .= "item_247|..|" . $nm_var_lab[85] . "|menu_form_php.php?sc_item_menu=item_247&sc_apl_menu=grid_reciboingreso&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[85] . "|grp__NM__ico__NM__icons8-cuenta-32-2.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_cuentas_principal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_cuentas_principal']) == "on")
{
    $menu_menuData['data'] .= "item_174|..|" . $nm_var_lab[86] . "|menu_form_php.php?sc_item_menu=item_174&sc_apl_menu=blank_recalcular_cuentas_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[86] . "|scriptcase__NM__ico__NM__calculator_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_59|.|" . $nm_var_lab[87] . "||" . $nm_var_hint[87] . "|grp__NM__ico__NM__icons8-caja-registradora-32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cuentaspagar']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cuentaspagar']) == "on")
{
    $menu_menuData['data'] .= "item_109|..|" . $nm_var_lab[88] . "|menu_form_php.php?sc_item_menu=item_109&sc_apl_menu=grid_cuentaspagar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[88] . "|grp__NM__ico__NM__icons8-reembolso-32-.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tesoreria']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tesoreria']) == "on")
{
    $menu_menuData['data'] .= "item_111|..|" . $nm_var_lab[89] . "|menu_form_php.php?sc_item_menu=item_111&sc_apl_menu=grid_tesoreria&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[89] . "|grp__NM__ico__NM__icons8-obligaciones-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porpagar']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porpagar']) == "on")
{
    $menu_menuData['data'] .= "item_192|..|" . $nm_var_lab[90] . "|menu_form_php.php?sc_item_menu=item_192&sc_apl_menu=grid_terceros_cuentas_porpagar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[90] . "|scriptcase__NM__ico__NM__briefcase2_document_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_lista']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_lista']) == "on")
{
    $menu_menuData['data'] .= "item_60|..|" . $nm_var_lab[91] . "|menu_form_php.php?sc_item_menu=item_60&sc_apl_menu=grid_caja_lista&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[91] . "|grp__NM__ico__NM__icons8-caja-registradora-40.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_hacerpagos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_hacerpagos']) == "on")
{
    $menu_menuData['data'] .= "item_112|..|" . $nm_var_lab[92] . "|menu_form_php.php?sc_item_menu=item_112&sc_apl_menu=form_hacerpagos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[92] . "|grp__NM__ico__NM__1486564168-finance-bank-check_81495.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos']) == "on")
{
    $menu_menuData['data'] .= "item_113|..|" . $nm_var_lab[93] . "|menu_form_php.php?sc_item_menu=item_113&sc_apl_menu=grid_pagos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[93] . "|grp__NM__ico__NM__icons8-factura-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos_master']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos_master']) == "on")
{
    $menu_menuData['data'] .= "item_176|..|" . $nm_var_lab[94] . "|menu_form_php.php?sc_item_menu=item_176&sc_apl_menu=grid_pagos_master&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[94] . "|grp__NM__ico__NM__icons8-factura-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_caja']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_caja']) == "on")
{
    $menu_menuData['data'] .= "item_61|..|" . $nm_var_lab[95] . "|menu_form_php.php?sc_item_menu=item_61&sc_apl_menu=grid_caja&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[95] . "|grp__NM__ico__NM__icons8-flujo-de-fondos-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_bancos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_bancos']) == "on")
{
    $menu_menuData['data'] .= "item_127|..|" . $nm_var_lab[96] . "|menu_form_php.php?sc_item_menu=item_127&sc_apl_menu=grid_bancos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[96] . "|grp__NM__ico__NM__Bank_icon-icons.com_74914.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_pagos_conceptos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_pagos_conceptos']) == "on")
{
    $menu_menuData['data'] .= "item_128|..|" . $nm_var_lab[97] . "|menu_form_php.php?sc_item_menu=item_128&sc_apl_menu=form_pagos_conceptos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[97] . "|grp__NM__ico__NM__head-brains_icon-icons.com_53022.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_160|.|" . $nm_var_lab[98] . "||" . $nm_var_hint[98] . "|scriptcase__NM__ico__NM__book_green_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_plancuentas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_plancuentas']) == "on")
{
    $menu_menuData['data'] .= "item_159|..|" . $nm_var_lab[99] . "|menu_form_php.php?sc_item_menu=item_159&sc_apl_menu=grid_plancuentas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[99] . "|scriptcase__NM__ico__NM__address_book3_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_grupos_contables']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_grupos_contables']) == "on")
{
    $menu_menuData['data'] .= "item_161|..|" . $nm_var_lab[100] . "|menu_form_php.php?sc_item_menu=item_161&sc_apl_menu=grid_grupos_contables&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[100] . "|scriptcase__NM__ico__NM__books_blue_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_contable']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_contable']) == "on")
{
    $menu_menuData['data'] .= "item_252|..|" . $nm_var_lab[101] . "|menu_form_php.php?sc_item_menu=item_252&sc_apl_menu=form_productos_contable&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[101] . "|scriptcase__NM__ico__NM__clipboard_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contable']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contable']) == "on")
{
    $menu_menuData['data'] .= "item_253|..|" . $nm_var_lab[102] . "|menu_form_php.php?sc_item_menu=item_253&sc_apl_menu=form_terceros_contable&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[102] . "|usr__NM__bg__NM__groups_people_people_1715.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_exportar']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_exportar']) == "on")
{
    $menu_menuData['data'] .= "item_237|..|" . $nm_var_lab[103] . "|menu_form_php.php?sc_item_menu=item_237&sc_apl_menu=grid_terceros_exportar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[103] . "|scriptcase__NM__ico__NM__users_back_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['asientos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['asientos']) == "on")
{
    $menu_menuData['data'] .= "item_238|..|" . $nm_var_lab[104] . "|menu_form_php.php?sc_item_menu=item_238&sc_apl_menu=asientos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[104] . "|scriptcase__NM__ico__NM__book_blue_open_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturacom_genera_comprobantes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturacom_genera_comprobantes']) == "on")
{
    $menu_menuData['data'] .= "item_229|..|" . $nm_var_lab[105] . "|menu_form_php.php?sc_item_menu=item_229&sc_apl_menu=grid_facturacom_genera_comprobantes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[105] . "|scriptcase__NM__ico__NM__book_green_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_genera_comprobantes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_genera_comprobantes']) == "on")
{
    $menu_menuData['data'] .= "item_228|..|" . $nm_var_lab[106] . "|menu_form_php.php?sc_item_menu=item_228&sc_apl_menu=grid_facturaven_genera_comprobantes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[106] . "|scriptcase__NM__ico__NM__book_yellow_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_comprobantes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_comprobantes']) == "on")
{
    $menu_menuData['data'] .= "item_162|..|" . $nm_var_lab[107] . "|menu_form_php.php?sc_item_menu=item_162&sc_apl_menu=grid_comprobantes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[107] . "|scriptcase__NM__ico__NM__book_red_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_presupuestos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_presupuestos']) == "on")
{
    $menu_menuData['data'] .= "item_248|..|" . $nm_var_lab[108] . "|menu_form_php.php?sc_item_menu=item_248&sc_apl_menu=grid_presupuestos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[108] . "|scriptcase__NM__ico__NM__document_preferences_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_75|.|" . $nm_var_lab[109] . "||" . $nm_var_hint[109] . "|usr__NM__ico__NM__ilustracoes_04-14_icon-icons.com_75468.png|_self|\n";
$menu_menuData['data'] .= "item_255|..|" . $nm_var_lab[110] . "||" . $nm_var_hint[110] . "|scriptcase__NM__ico__NM__document_preferences_24.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos']) == "on")
{
    $menu_menuData['data'] .= "item_256|...|" . $nm_var_lab[111] . "|menu_form_php.php?sc_item_menu=item_256&sc_apl_menu=grid_reporte_impuestos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[111] . "|scriptcase__NM__ico__NM__document_preferences_24.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_200|..|" . $nm_var_lab[112] . "||" . $nm_var_hint[112] . "|scriptcase__NM__ico__NM__invoice_dollar_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_total_ingreso_egresos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_total_ingreso_egresos']) == "on")
{
    $menu_menuData['data'] .= "item_194|...|" . $nm_var_lab[113] . "|menu_form_php.php?sc_item_menu=item_194&sc_apl_menu=grid_total_ingreso_egresos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[113] . "|scriptcase__NM__ico__NM__document_pulse_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_clientes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_clientes']) == "on")
{
    $menu_menuData['data'] .= "item_199|...|" . $nm_var_lab[114] . "|menu_form_php.php?sc_item_menu=item_199&sc_apl_menu=grid_abc_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[114] . "|scriptcase__NM__ico__NM__users_family_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_productos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_productos']) == "on")
{
    $menu_menuData['data'] .= "item_198|...|" . $nm_var_lab[115] . "|menu_form_php.php?sc_item_menu=item_198&sc_apl_menu=grid_abc_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[115] . "|scriptcase__NM__ico__NM__components_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_143|..|" . $nm_var_lab[116] . "||" . $nm_var_hint[116] . "|scriptcase__NM__ico__NM__cubes_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_costo_inventario']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_costo_inventario']) == "on")
{
    $menu_menuData['data'] .= "item_188|...|" . $nm_var_lab[117] . "|menu_form_php.php?sc_item_menu=item_188&sc_apl_menu=grid_costo_inventario&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[117] . "|scriptcase__NM__ico__NM__currency_dollar_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_rotacion_inventario']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_rotacion_inventario']) == "on")
{
    $menu_menuData['data'] .= "item_187|...|" . $nm_var_lab[118] . "|menu_form_php.php?sc_item_menu=item_187&sc_apl_menu=grid_rotacion_inventario&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[118] . "|scriptcase__NM__ico__NM__box_next_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_fisico_porproducto']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_fisico_porproducto']) == "on")
{
    $menu_menuData['data'] .= "item_144|...|" . $nm_var_lab[119] . "|menu_form_php.php?sc_item_menu=item_144&sc_apl_menu=grid_inventario_fisico_porproducto&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[119] . "|usr__NM__ico__NM__Abacus_35794.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_por_bodega']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_por_bodega']) == "on")
{
    $menu_menuData['data'] .= "item_189|...|" . $nm_var_lab[120] . "|menu_form_php.php?sc_item_menu=item_189&sc_apl_menu=grid_productos_por_bodega&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[120] . "|scriptcase__NM__ico__NM__box_view_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_semanas_venta']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_semanas_venta']) == "on")
{
    $menu_menuData['data'] .= "item_141|...|" . $nm_var_lab[121] . "|menu_form_php.php?sc_item_menu=item_141&sc_apl_menu=grid_semanas_venta&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[121] . "|scriptcase__NM__ico__NM__calendar_5_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_pedido']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_pedido']) == "on")
{
    $menu_menuData['data'] .= "item_107|...|" . $nm_var_lab[122] . "|menu_form_php.php?sc_item_menu=item_107&sc_apl_menu=grid_reporte_productos_pedido&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[122] . "|scriptcase__NM__ico__NM__chart_column_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_fechavencimiento']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_fechavencimiento']) == "on")
{
    $menu_menuData['data'] .= "item_118|...|" . $nm_var_lab[123] . "|menu_form_php.php?sc_item_menu=item_118&sc_apl_menu=grid_reporte_productos_fechavencimiento&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[123] . "|scriptcase__NM__ico__NM__date_time_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos']) == "on")
{
    $menu_menuData['data'] .= "item_129|...|" . $nm_var_lab[124] . "|menu_form_php.php?sc_item_menu=item_129&sc_apl_menu=grid_saldos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[124] . "|scriptcase__NM__ico__NM__money2_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_vencimiento_lote']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_vencimiento_lote']) == "on")
{
    $menu_menuData['data'] .= "item_133|...|" . $nm_var_lab[125] . "|menu_form_php.php?sc_item_menu=item_133&sc_apl_menu=grid_vencimiento_lote&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[125] . "|scriptcase__NM__ico__NM__barcode_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_136|..|" . $nm_var_lab[126] . "||" . $nm_var_hint[126] . "|scriptcase__NM__ico__NM__invoice_dollar_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_rp_productos_vendedor']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_rp_productos_vendedor']) == "on")
{
    $menu_menuData['data'] .= "item_219|...|" . $nm_var_lab[127] . "|menu_form_php.php?sc_item_menu=item_219&sc_apl_menu=grid_rp_productos_vendedor&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[127] . "|scriptcase__NM__ico__NM__presentation_chart_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_reporte_caja_filtro']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_reporte_caja_filtro']) == "on")
{
    $menu_menuData['data'] .= "item_181|...|" . $nm_var_lab[128] . "|menu_form_php.php?sc_item_menu=item_181&sc_apl_menu=blank_reporte_caja_filtro&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[128] . "|scriptcase__NM__ico__NM__cashier_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_informe']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_informe']) == "on")
{
    $menu_menuData['data'] .= "item_148|...|" . $nm_var_lab[129] . "|menu_form_php.php?sc_item_menu=item_148&sc_apl_menu=grid_caja_informe&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[129] . "|scriptcase__NM__ico__NM__invoice_dollar_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_caja']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_caja']) == "on")
{
    $menu_menuData['data'] .= "item_149|...|" . $nm_var_lab[130] . "|menu_form_php.php?sc_item_menu=item_149&sc_apl_menu=grid_reporte_caja&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[130] . "|scriptcase__NM__ico__NM__money_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_report_refventacostogarancia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_report_refventacostogarancia']) == "on")
{
    $menu_menuData['data'] .= "item_76|...|" . $nm_var_lab[131] . "|menu_form_php.php?sc_item_menu=item_76&sc_apl_menu=grid_report_refventacostogarancia&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[131] . "|usr__NM__ico__NM__construction_project_plan_building_architect_design_develop-64_icon-icons.com_60255.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_ubicacion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_ubicacion']) == "on")
{
    $menu_menuData['data'] .= "item_115|...|" . $nm_var_lab[132] . "|menu_form_php.php?sc_item_menu=item_115&sc_apl_menu=grid_ventas_ubicacion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[132] . "|scriptcase__NM__ico__NM__chart_donut_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_articulo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_articulo']) == "on")
{
    $menu_menuData['data'] .= "item_137|...|" . $nm_var_lab[133] . "|menu_form_php.php?sc_item_menu=item_137&sc_apl_menu=grid_ventas_por_articulo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[133] . "|scriptcase__NM__ico__NM__box_next_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_familia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_familia']) == "on")
{
    $menu_menuData['data'] .= "item_138|...|" . $nm_var_lab[134] . "|menu_form_php.php?sc_item_menu=item_138&sc_apl_menu=grid_ventas_por_familia&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[134] . "|scriptcase__NM__ico__NM__cubes_green_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_cliente']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_cliente']) == "on")
{
    $menu_menuData['data'] .= "item_139|...|" . $nm_var_lab[135] . "|menu_form_php.php?sc_item_menu=item_139&sc_apl_menu=grid_ventas_por_cliente&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[135] . "|scriptcase__NM__ico__NM__businesspeople2_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_vendedor']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_vendedor']) == "on")
{
    $menu_menuData['data'] .= "item_140|...|" . $nm_var_lab[136] . "|menu_form_php.php?sc_item_menu=item_140&sc_apl_menu=grid_ventas_por_vendedor&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[136] . "|scriptcase__NM__ico__NM__user_find_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_flujo_caja_principal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_flujo_caja_principal']) == "on")
{
    $menu_menuData['data'] .= "item_182|...|" . $nm_var_lab[137] . "|menu_form_php.php?sc_item_menu=item_182&sc_apl_menu=blank_recalcular_flujo_caja_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[137] . "|scriptcase__NM__ico__NM__server_to_client_critical_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_x_pedido_dia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_x_pedido_dia']) == "on")
{
    $menu_menuData['data'] .= "item_242|...|" . $nm_var_lab[138] . "|menu_form_php.php?sc_item_menu=item_242&sc_apl_menu=grid_productos_x_pedido_dia&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[138] . "|scriptcase__NM__ico__NM__shopping_cart_edit_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_venta_x_producto_dia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_venta_x_producto_dia']) == "on")
{
    $menu_menuData['data'] .= "item_243|...|" . $nm_var_lab[139] . "|menu_form_php.php?sc_item_menu=item_243&sc_apl_menu=grid_venta_x_producto_dia&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[139] . "|scriptcase__NM__ico__NM__purchase_order_cart_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_179|..|" . $nm_var_lab[140] . "||" . $nm_var_hint[140] . "|scriptcase__NM__ico__NM__notebook3_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_saldo_terceros']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_saldo_terceros']) == "on")
{
    $menu_menuData['data'] .= "item_195|...|" . $nm_var_lab[141] . "|menu_form_php.php?sc_item_menu=item_195&sc_apl_menu=grid_saldo_terceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[141] . "|scriptcase__NM__ico__NM__users2_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cartera_por_edades']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cartera_por_edades']) == "on")
{
    $menu_menuData['data'] .= "item_180|...|" . $nm_var_lab[142] . "|menu_form_php.php?sc_item_menu=item_180&sc_apl_menu=grid_terceros_cartera_por_edades&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[142] . "|scriptcase__NM__ico__NM__calendar_52_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_244|..|" . $nm_var_lab[143] . "||" . $nm_var_hint[143] . "|scriptcase__NM__ico__NM__chart_bar_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos_ing_terceros']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos_ing_terceros']) == "on")
{
    $menu_menuData['data'] .= "item_245|...|" . $nm_var_lab[144] . "|menu_form_php.php?sc_item_menu=item_245&sc_apl_menu=grid_reporte_impuestos_ing_terceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[144] . "|scriptcase__NM__ico__NM__document_preferences_24.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_203|.|" . $nm_var_lab[145] . "||" . $nm_var_hint[145] . "|scriptcase__NM__ico__NM__user_headset_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tareas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tareas']) == "on")
{
    $menu_menuData['data'] .= "item_209|..|" . $nm_var_lab[146] . "|menu_form_php.php?sc_item_menu=item_209&sc_apl_menu=grid_tareas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[146] . "|scriptcase__NM__ico__NM__checkbox_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_contactos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_contactos']) == "on")
{
    $menu_menuData['data'] .= "item_204|..|" . $nm_var_lab[147] . "|menu_form_php.php?sc_item_menu=item_204&sc_apl_menu=grid_contactos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[147] . "|scriptcase__NM__ico__NM__contacts.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos']) == "on")
{
    $menu_menuData['data'] .= "item_205|..|" . $nm_var_lab[148] . "|menu_form_php.php?sc_item_menu=item_205&sc_apl_menu=grid_pedidos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[148] . "|scriptcase__NM__ico__NM__document_edit_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_220|..|" . $nm_var_lab[149] . "||" . $nm_var_hint[149] . "|scriptcase__NM__ico__NM__clipboard2_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos']) == "on")
{
    $menu_menuData['data'] .= "item_221|...|" . $nm_var_lab[150] . "|menu_form_php.php?sc_item_menu=item_221&sc_apl_menu=grid_terceros_contratos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[150] . "|scriptcase__NM__ico__NM__clipboard_24.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos_generar_fv']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos_generar_fv']) == "on")
{
    $menu_menuData['data'] .= "item_233|...|" . $nm_var_lab[151] . "|menu_form_php.php?sc_item_menu=item_233&sc_apl_menu=grid_terceros_contratos_generar_fv&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[151] . "|scriptcase__NM__ico__NM__printer_ok_24.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_contratos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_contratos']) == "on")
{
    $menu_menuData['data'] .= "item_234|...|" . $nm_var_lab[152] . "|menu_form_php.php?sc_item_menu=item_234&sc_apl_menu=grid_facturaven_contratos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[152] . "|scriptcase__NM__ico__NM__document_preferences_24.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_descarga_pdfs_principal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_descarga_pdfs_principal']) == "on")
{
    $menu_menuData['data'] .= "item_239|...|" . $nm_var_lab[153] . "|menu_form_php.php?sc_item_menu=item_239&sc_apl_menu=blank_descarga_pdfs_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[153] . "|scriptcase__NM__ico__NM__index_down_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos_ing_caja']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos_ing_caja']) == "on")
{
    $menu_menuData['data'] .= "item_235|...|" . $nm_var_lab[154] . "|menu_form_php.php?sc_item_menu=item_235&sc_apl_menu=grid_recibos_ing_caja&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[154] . "|scriptcase__NM__ico__NM__receipt_book_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_dispositivos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_dispositivos']) == "on")
{
    $menu_menuData['data'] .= "item_224|...|" . $nm_var_lab[155] . "|menu_form_php.php?sc_item_menu=item_224&sc_apl_menu=form_terceros_dispositivos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[155] . "|scriptcase__NM__ico__NM__hard_drive_24.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contrato_dispositivo']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contrato_dispositivo']) == "on")
{
    $menu_menuData['data'] .= "item_225|...|" . $nm_var_lab[156] . "|menu_form_php.php?sc_item_menu=item_225&sc_apl_menu=form_terceros_contrato_dispositivo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[156] . "|scriptcase__NM__ico__NM__hard_drive_edit_24.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_estado']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_estado']) == "on")
{
    $menu_menuData['data'] .= "item_226|...|" . $nm_var_lab[157] . "|menu_form_php.php?sc_item_menu=item_226&sc_apl_menu=form_terceros_contratos_estado&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[157] . "|scriptcase__NM__ico__NM__code_24.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_motivoscorte']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_motivoscorte']) == "on")
{
    $menu_menuData['data'] .= "item_227|...|" . $nm_var_lab[158] . "|menu_form_php.php?sc_item_menu=item_227&sc_apl_menu=form_terceros_contratos_motivoscorte&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[158] . "|scriptcase__NM__ico__NM__bookmark_blue_delete_24.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_historiales_crm']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_historiales_crm']) == "on")
{
    $menu_menuData['data'] .= "item_206|..|" . $nm_var_lab[159] . "|menu_form_php.php?sc_item_menu=item_206&sc_apl_menu=grid_historiales_crm&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[159] . "|scriptcase__NM__ico__NM__history2_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_casos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_casos']) == "on")
{
    $menu_menuData['data'] .= "item_216|..|" . $nm_var_lab[160] . "|menu_form_php.php?sc_item_menu=item_216&sc_apl_menu=grid_casos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[160] . "|scriptcase__NM__ico__NM__ticket_blue_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']) == "on")
{
    $menu_menuData['data'] .= "item_207|..|" . $nm_var_lab[161] . "|menu_form_php.php?sc_item_menu=item_207&sc_apl_menu=form_clasificacion_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[161] . "|scriptcase__NM__ico__NM__id_cards_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_208|..|" . $nm_var_lab[162] . "||" . $nm_var_hint[162] . "|scriptcase__NM__ico__NM__bookmarks_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_casos_estado']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_casos_estado']) == "on")
{
    $menu_menuData['data'] .= "item_217|..|" . $nm_var_lab[163] . "|menu_form_php.php?sc_item_menu=item_217&sc_apl_menu=form_casos_estado&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[163] . "|scriptcase__NM__ico__NM__trafficlight_red_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_casos_prioridad']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_casos_prioridad']) == "on")
{
    $menu_menuData['data'] .= "item_218|..|" . $nm_var_lab[164] . "|menu_form_php.php?sc_item_menu=item_218&sc_apl_menu=form_casos_prioridad&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[164] . "|scriptcase__NM__ico__NM__stopwatch_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_26|.|" . $nm_var_lab[165] . "||" . $nm_var_hint[165] . "|usr__NM__bg__NM__company_22169.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['calendar_calendar']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['calendar_calendar']) == "on")
{
    $menu_menuData['data'] .= "item_117|..|" . $nm_var_lab[166] . "|menu_form_php.php?sc_item_menu=item_117&sc_apl_menu=calendar_calendar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[166] . "|grp__NM__ico__NM__icons8-directorio-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_201|..|" . $nm_var_lab[167] . "|menu_form_php.php?sc_item_menu=item_201&sc_apl_menu=../_lib/libraries/grp/correo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[167] . "|scriptcase__NM__ico__NM__airmail_closed_32.png|" . $this->menu_target('_blank') . "|" . "\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_gestor_archivos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_gestor_archivos']) == "on")
{
    $menu_menuData['data'] .= "item_202|..|" . $nm_var_lab[168] . "|menu_form_php.php?sc_item_menu=item_202&sc_apl_menu=grid_gestor_archivos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[168] . "|scriptcase__NM__ico__NM__document_refresh_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_79|..|" . $nm_var_lab[169] . "||" . $nm_var_hint[169] . "|scriptcase__NM__ico__NM__documents_gear_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_datosemp']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_datosemp']) == "on")
{
    $menu_menuData['data'] .= "item_28|...|" . $nm_var_lab[170] . "|menu_form_php.php?sc_item_menu=item_28&sc_apl_menu=form_datosemp&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[170] . "|usr__NM__bg__NM__Folder_Gear_icon-icons.com_75794.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sucursales_todas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sucursales_todas']) == "on")
{
    $menu_menuData['data'] .= "item_190|...|" . $nm_var_lab[171] . "|menu_form_php.php?sc_item_menu=item_190&sc_apl_menu=grid_sucursales_todas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[171] . "|scriptcase__NM__ico__NM__sc_menu_home3_e.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_consecutivos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_consecutivos']) == "on")
{
    $menu_menuData['data'] .= "item_193|...|" . $nm_var_lab[172] . "|menu_form_php.php?sc_item_menu=item_193&sc_apl_menu=form_consecutivos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[172] . "|scriptcase__NM__ico__NM__document_refresh_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_configuraciones_print_pos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_configuraciones_print_pos']) == "on")
{
    $menu_menuData['data'] .= "item_130|...|" . $nm_var_lab[173] . "|menu_form_php.php?sc_item_menu=item_130&sc_apl_menu=grid_configuraciones_print_pos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[173] . "|scriptcase__NM__ico__NM__printer3_edit_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_configuraciones']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_configuraciones']) == "on")
{
    $menu_menuData['data'] .= "item_101|...|" . $nm_var_lab[174] . "|menu_form_php.php?sc_item_menu=item_101&sc_apl_menu=form_configuraciones&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[174] . "|scriptcase__NM__ico__NM__documents_gear_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_webservicefe']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_webservicefe']) == "on")
{
    $menu_menuData['data'] .= "item_102|...|" . $nm_var_lab[175] . "|menu_form_php.php?sc_item_menu=item_102&sc_apl_menu=form_webservicefe&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[175] . "|scriptcase__NM__ico__NM__server_mail_download_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_resdian']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_resdian']) == "on")
{
    $menu_menuData['data'] .= "item_29|...|" . $nm_var_lab[176] . "|menu_form_php.php?sc_item_menu=item_29&sc_apl_menu=grid_resdian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[176] . "|usr__NM__bg__NM__Dian (1).png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_plantillas_correo_propio']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_plantillas_correo_propio']) == "on")
{
    $menu_menuData['data'] .= "item_259|...|" . $nm_var_lab[177] . "|menu_form_php.php?sc_item_menu=item_259&sc_apl_menu=grid_plantillas_correo_propio&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[177] . "|scriptcase__NM__ico__NM__document_plain_blue_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_121|...|" . $nm_var_lab[178] . "||" . $nm_var_hint[178] . "|grp__NM__ico__NM__icons8-impuesto-32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_iva']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_iva']) == "on")
{
    $menu_menuData['data'] .= "item_73|....|" . $nm_var_lab[179] . "|menu_form_php.php?sc_item_menu=item_73&sc_apl_menu=grid_iva&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[179] . "|usr__NM__bg__NM__1486394955-13-tax_80558.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_tiporetefuente']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tiporetefuente']) == "on")
{
    $menu_menuData['data'] .= "item_122|....|" . $nm_var_lab[180] . "|menu_form_php.php?sc_item_menu=item_122&sc_apl_menu=form_tiporetefuente&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[180] . "|grp__NM__ico__NM__Cost-per-Click-(CPC)_icon-icons.com_53723.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipoica']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipoica']) == "on")
{
    $menu_menuData['data'] .= "item_123|....|" . $nm_var_lab[181] . "|menu_form_php.php?sc_item_menu=item_123&sc_apl_menu=form_tipoica&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[181] . "|grp__NM__ico__NM__1486564172-finance-loan-money_81492.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipoautoretencion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipoautoretencion']) == "on")
{
    $menu_menuData['data'] .= "item_124|....|" . $nm_var_lab[182] . "|menu_form_php.php?sc_item_menu=item_124&sc_apl_menu=form_tipoautoretencion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[182] . "|grp__NM__ico__NM__business-color_money-coins_icon-icons.com_53446.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_c_costos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_c_costos']) == "on")
{
    $menu_menuData['data'] .= "item_125|....|" . $nm_var_lab[183] . "|menu_form_php.php?sc_item_menu=item_125&sc_apl_menu=form_c_costos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[183] . "|grp__NM__ico__NM__icons8-costoso-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_prefijos_documentos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_prefijos_documentos']) == "on")
{
    $menu_menuData['data'] .= "item_83|...|" . $nm_var_lab[184] . "|menu_form_php.php?sc_item_menu=item_83&sc_apl_menu=form_prefijos_documentos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[184] . "|grp__NM__bg__NM__prefijos.jpeg|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_bodegas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_bodegas']) == "on")
{
    $menu_menuData['data'] .= "item_27|...|" . $nm_var_lab[185] . "|menu_form_php.php?sc_item_menu=item_27&sc_apl_menu=form_bodegas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[185] . "|usr__NM__bg__NM__1486504365-building-business-store.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_SN_BALANZA']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_SN_BALANZA']) == "on")
{
    $menu_menuData['data'] .= "item_232|...|" . $nm_var_lab[186] . "|menu_form_php.php?sc_item_menu=item_232&sc_apl_menu=form_SN_BALANZA&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[186] . "|scriptcase__NM__ico__NM__card_terminal_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_71|..|" . $nm_var_lab[187] . "||" . $nm_var_hint[187] . "|scriptcase__NM__ico__NM__users3_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios']) == "on")
{
    $menu_menuData['data'] .= "item_68|...|" . $nm_var_lab[188] . "|menu_form_php.php?sc_item_menu=item_68&sc_apl_menu=grid_usuarios&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[188] . "|scriptcase__NM__ico__NM__users3_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios']) == "on")
{
    $menu_menuData['data'] .= "item_69|...|" . $nm_var_lab[189] . "|menu_form_php.php?sc_item_menu=item_69&sc_apl_menu=form_usuarios&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[189] . "|scriptcase__NM__ico__NM__users4_add_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios_grupos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios_grupos']) == "on")
{
    $menu_menuData['data'] .= "item_70|...|" . $nm_var_lab[190] . "|menu_form_php.php?sc_item_menu=item_70&sc_apl_menu=form_usuarios_grupos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[190] . "|scriptcase__NM__ico__NM__users_family_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_aplicaciones_menu_asignarpermisos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_aplicaciones_menu_asignarpermisos']) == "on")
{
    $menu_menuData['data'] .= "item_72|...|" . $nm_var_lab[191] . "|menu_form_php.php?sc_item_menu=item_72&sc_apl_menu=grid_aplicaciones_menu_asignarpermisos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[191] . "|scriptcase__NM__ico__NM__lock_preferences_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_copiar_permisos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_copiar_permisos']) == "on")
{
    $menu_menuData['data'] .= "item_249|...|" . $nm_var_lab[192] . "|menu_form_php.php?sc_item_menu=item_249&sc_apl_menu=control_copiar_permisos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[192] . "|scriptcase__NM__ico__NM__copy_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_menu_movil']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_menu_movil']) == "on")
{
    $menu_menuData['data'] .= "item_185|...|" . $nm_var_lab[193] . "|menu_form_php.php?sc_item_menu=item_185&sc_apl_menu=form_permisos_menu_movil&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[193] . "|scriptcase__NM__ico__NM__user_mobilephone_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_aplicaciones_menu']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_aplicaciones_menu']) == "on")
{
    $menu_menuData['data'] .= "item_120|...|" . $nm_var_lab[194] . "|menu_form_php.php?sc_item_menu=item_120&sc_apl_menu=form_aplicaciones_menu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[194] . "|scriptcase__NM__ico__NM__code_php_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_aplicaciones_menu']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_aplicaciones_menu']) == "on")
{
    $menu_menuData['data'] .= "item_186|...|" . $nm_var_lab[195] . "|menu_form_php.php?sc_item_menu=item_186&sc_apl_menu=form_permisos_aplicaciones_menu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[195] . "|scriptcase__NM__ico__NM__code_colored_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_empresas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_empresas']) == "on")
{
    $menu_menuData['data'] .= "item_91|..|" . $nm_var_lab[196] . "|menu_form_php.php?sc_item_menu=item_91&sc_apl_menu=grid_empresas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[196] . "|scriptcase__NM__ico__NM__companies.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_21|.|" . $nm_var_lab[197] . "||" . $nm_var_hint[197] . "|usr__NM__bg__NM__systempackages_config_configuration_9436.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']) == "on")
{
    $menu_menuData['data'] .= "item_22|..|" . $nm_var_lab[198] . "|menu_form_php.php?sc_item_menu=item_22&sc_apl_menu=blank_recalcular_lfs_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[198] . "|usr__NM__ico__NM__Abacus_35794.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']) == "on")
{
    $menu_menuData['data'] .= "item_131|..|" . $nm_var_lab[199] . "|menu_form_php.php?sc_item_menu=item_131&sc_apl_menu=blank_recalcular_lfs_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[199] . "|scriptcase__NM__ico__NM__barcode_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_hacer_backup']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_hacer_backup']) == "on")
{
    $menu_menuData['data'] .= "item_78|..|" . $nm_var_lab[200] . "|menu_form_php.php?sc_item_menu=item_78&sc_apl_menu=blank_hacer_backup&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[200] . "|scriptcase__NM__ico__NM__floppy_disk2_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_restaurar_backup']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_restaurar_backup']) == "on")
{
    $menu_menuData['data'] .= "item_87|..|" . $nm_var_lab[201] . "|menu_form_php.php?sc_item_menu=item_87&sc_apl_menu=blank_restaurar_backup&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[201] . "|scriptcase__NM__ico__NM__data_into_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_optimizar_bd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_optimizar_bd']) == "on")
{
    $menu_menuData['data'] .= "item_145|..|" . $nm_var_lab[202] . "|menu_form_php.php?sc_item_menu=item_145&sc_apl_menu=blank_optimizar_bd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[202] . "|scriptcase__NM__ico__NM__data_refresh_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_196|..|" . $nm_var_lab[203] . "||" . $nm_var_hint[203] . "|scriptcase__NM__ico__NM__bolt_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_limpiar_bd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_limpiar_bd']) == "on")
{
    $menu_menuData['data'] .= "item_81|..|" . $nm_var_lab[204] . "|menu_form_php.php?sc_item_menu=item_81&sc_apl_menu=blank_limpiar_bd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[204] . "|scriptcase__NM__ico__NM__data_replace_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ceros']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ceros']) == "on")
{
    $menu_menuData['data'] .= "item_175|...|" . $nm_var_lab[205] . "|menu_form_php.php?sc_item_menu=item_175&sc_apl_menu=form_notainv_ceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[205] . "|grp__NM__ico__NM__systemreboot_94645.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_conceptos_documentos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_conceptos_documentos']) == "on")
{
    $menu_menuData['data'] .= "item_191|...|" . $nm_var_lab[206] . "|menu_form_php.php?sc_item_menu=item_191&sc_apl_menu=grid_conceptos_documentos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[206] . "|scriptcase__NM__ico__NM__document_into_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_phpmyadmin']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_phpmyadmin']) == "on")
{
    $menu_menuData['data'] .= "item_114|...|" . $nm_var_lab[207] . "|menu_form_php.php?sc_item_menu=item_114&sc_apl_menu=blank_iframe_phpmyadmin&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[207] . "|scriptcase__NM__ico__NM__data_table_32.png|" . $this->menu_target('_blank') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_copias_nube_clientes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_copias_nube_clientes']) == "on")
{
    $menu_menuData['data'] .= "item_197|...|" . $nm_var_lab[208] . "|menu_form_php.php?sc_item_menu=item_197&sc_apl_menu=blank_copias_nube_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[208] . "|grp__NM__ico__NM__fw_ico_nube.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_municipio']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_municipio']) == "on")
{
    $menu_menuData['data'] .= "item_211|...|" . $nm_var_lab[209] . "|menu_form_php.php?sc_item_menu=item_211&sc_apl_menu=form_municipio&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[209] . "|scriptcase__NM__ico__NM__environment_information_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_unidades_medida']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_unidades_medida']) == "on")
{
    $menu_menuData['data'] .= "item_213|...|" . $nm_var_lab[210] . "|menu_form_php.php?sc_item_menu=item_213&sc_apl_menu=form_unidades_medida&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[210] . "|scriptcase__NM__ico__NM__drawing_utensils_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipo_producto']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipo_producto']) == "on")
{
    $menu_menuData['data'] .= "item_214|...|" . $nm_var_lab[211] . "|menu_form_php.php?sc_item_menu=item_214&sc_apl_menu=form_tipo_producto&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[211] . "|scriptcase__NM__ico__NM__components_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_93|..|" . $nm_var_lab[212] . "||" . $nm_var_hint[212] . "|grp__NM__ico__NM__icon-contabilidad-32-3.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_TNS']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_TNS']) == "on")
{
    $menu_menuData['data'] .= "item_94|..|" . $nm_var_lab[213] . "|menu_form_php.php?sc_item_menu=item_94&sc_apl_menu=grid_importar_grupos_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[213] . "|grp__NM__ico__NM__icon-contabilidad-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_tipoiva_TNS']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_tipoiva_TNS']) == "on")
{
    $menu_menuData['data'] .= "item_97|...|" . $nm_var_lab[214] . "|menu_form_php.php?sc_item_menu=item_97&sc_apl_menu=grid_importar_tipoiva_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[214] . "|grp__NM__ico__NM__icon-contabilidad-32-2.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_plan_cuentas_TNS']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_plan_cuentas_TNS']) == "on")
{
    $menu_menuData['data'] .= "item_157|...|" . $nm_var_lab[215] . "|menu_form_php.php?sc_item_menu=item_157&sc_apl_menu=grid_importar_plan_cuentas_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[215] . "|scriptcase__NM__ico__NM__book_blue_open_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_contables_TNS']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_contables_TNS']) == "on")
{
    $menu_menuData['data'] .= "item_158|...|" . $nm_var_lab[216] . "|menu_form_php.php?sc_item_menu=item_158&sc_apl_menu=grid_importar_grupos_contables_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[216] . "|scriptcase__NM__ico__NM__books_blue_edit_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_articulos_TNS']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_articulos_TNS']) == "on")
{
    $menu_menuData['data'] .= "item_95|...|" . $nm_var_lab[217] . "|menu_form_php.php?sc_item_menu=item_95&sc_apl_menu=grid_importar_articulos_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[217] . "|grp__NM__ico__NM__icon-recibo-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_terceros_TNS']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_terceros_TNS']) == "on")
{
    $menu_menuData['data'] .= "item_96|...|" . $nm_var_lab[218] . "|menu_form_php.php?sc_item_menu=item_96&sc_apl_menu=grid_importar_terceros_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[218] . "|grp__NM__ico__NM__icons8-contabilidad-32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_facilweb_importinvtns']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_facilweb_importinvtns']) == "on")
{
    $menu_menuData['data'] .= "item_103|...|" . $nm_var_lab[219] . "|menu_form_php.php?sc_item_menu=item_103&sc_apl_menu=grid_productos_facilweb_importinvtns&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[219] . "|scriptcase__NM__ico__NM__import_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_log']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_log']) == "on")
{
    $menu_menuData['data'] .= "item_135|..|" . $nm_var_lab[220] . "|menu_form_php.php?sc_item_menu=item_135&sc_apl_menu=grid_log&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[220] . "|scriptcase__NM__ico__NM__user_find_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_log_pedidos_borrados']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_log_pedidos_borrados']) == "on")
{
    $menu_menuData['data'] .= "item_257|..|" . $nm_var_lab[221] . "|menu_form_php.php?sc_item_menu=item_257&sc_apl_menu=grid_log_pedidos_borrados&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[221] . "|scriptcase__NM__ico__NM__user_find_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

$menu_menuData['data'] .= "item_104|..|" . $nm_var_lab[222] . "||" . $nm_var_hint[222] . "|scriptcase__NM__ico__NM__help2_32.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_soporte']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_soporte']) == "on")
{
    $menu_menuData['data'] .= "item_155|...|" . $nm_var_lab[223] . "|menu_form_php.php?sc_item_menu=item_155&sc_apl_menu=blank_soporte&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[223] . "|scriptcase__NM__ico__NM__user_headset_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_buscar_actualizaciones']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_buscar_actualizaciones']) == "on")
{
    $menu_menuData['data'] .= "item_212|...|" . $nm_var_lab[224] . "|menu_form_php.php?sc_item_menu=item_212&sc_apl_menu=blank_buscar_actualizaciones&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[224] . "|scriptcase__NM__ico__NM__download_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_anydesk']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_anydesk']) == "on")
{
    $menu_menuData['data'] .= "item_156|...|" . $nm_var_lab[225] . "|menu_form_php.php?sc_item_menu=item_156&sc_apl_menu=blank_anydesk&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[225] . "|grp__NM__ico__NM__fw_ico_anydesk.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank']) == "on")
{
    $menu_menuData['data'] .= "item_46|...|" . $nm_var_lab[226] . "|menu_form_php.php?sc_item_menu=item_46&sc_apl_menu=blank&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[226] . "|usr__NM__ico__NM__copyright_icon-icons.com_76791.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_ayuda']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_ayuda']) == "on")
{
    $menu_menuData['data'] .= "item_105|...|" . $nm_var_lab[227] . "|menu_form_php.php?sc_item_menu=item_105&sc_apl_menu=blank_ayuda&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[227] . "|scriptcase__NM__ico__NM__book_blue_find_32.png|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_slider']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_slider']) == "on")
{
    $menu_menuData['data'] .= "item_150|...|" . $nm_var_lab[228] . "|menu_form_php.php?sc_item_menu=item_150&sc_apl_menu=blank_slider&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[228] . "|grp__NM__ico__NM__favicon.ico|" . $this->menu_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['blank_fin_sesion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_fin_sesion']) == "on")
{
    $menu_menuData['data'] .= "item_20|.|" . $nm_var_lab[229] . "|menu_form_php.php?sc_item_menu=item_20&sc_apl_menu=blank_fin_sesion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[229] . "|scriptcase__NM__ico__NM__exit_32.png|" . $this->menu_target('_parent') . "|" . "\n";
}


$menu_menuData['data'] = array();
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__community_users_12977.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[0] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[0] . "",
    'id'       => "item_1",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_1",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_2&sc_apl_menu=terceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['terceros']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['terceros']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__user_add_12818.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[1] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[1] . "",
        'id'       => "item_2",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_2",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_80&sc_apl_menu=grid_terceros_todos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_todos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_todos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__groups_people_people_1715.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[2] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[2] . "",
        'id'       => "item_80",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_80",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_3&sc_apl_menu=grid_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_clientes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_clientes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__user_program_group_15361.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[3] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[3] . "",
        'id'       => "item_3",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_3",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_6&sc_apl_menu=grid_terceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__checklist_25365.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[4] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[4] . "",
        'id'       => "item_6",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_6",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_vendedores&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_vendedores']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_vendedores']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__technicalsupport_support_representative_person_people_woman_1643.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[5] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[5] . "",
        'id'       => "item_58",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_58",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_151&sc_apl_menu=form_clasificacion_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__id_cards_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[6] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[6] . "",
        'id'       => "item_151",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_151",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_152&sc_apl_menu=form_zona_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_zona_clientes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_zona_clientes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__earth_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[7] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[7] . "",
        'id'       => "item_152",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_152",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_100&sc_apl_menu=terceros_mesas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['terceros_mesas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['terceros_mesas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icon-mesa-de-restaurante-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[8] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[8] . "",
        'id'       => "item_100",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_100",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_126&sc_apl_menu=blank_cargar_terceros_desde_excel&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_terceros_desde_excel']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_terceros_desde_excel']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-ms-excel-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[9] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[9] . "",
        'id'       => "item_126",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_126",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_183&sc_apl_menu=grid_ruteros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ruteros']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ruteros']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__id_cards_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[10] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[10] . "",
        'id'       => "item_183",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_183",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_230&sc_apl_menu=blank_cargar_ruteros_desde_excel&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_ruteros_desde_excel']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_cargar_ruteros_desde_excel']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__import_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[11] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[11] . "",
        'id'       => "item_230",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_230",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__vendedor_epartidordepizzas_person_1645.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[12] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[12] . "",
    'id'       => "item_4",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_4",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__addusergroup_1251.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[13] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[13] . "",
    'id'       => "item_5",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_5",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__product_green_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[14] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[14] . "",
    'id'       => "item_7",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_7",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_8&sc_apl_menu=form_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__shipping_products_22121.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[15] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[15] . "",
        'id'       => "item_8",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_8",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_84&sc_apl_menu=form_productos_simple&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_simple']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_simple']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300 (1).png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[16] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[16] . "",
        'id'       => "item_84",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_84",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_9&sc_apl_menu=grid_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__clipboard_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[17] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[17] . "",
        'id'       => "item_9",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_9",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_146&sc_apl_menu=form_marca&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_marca']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_marca']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__ticket_blue_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[18] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[18] . "",
        'id'       => "item_146",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_146",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_147&sc_apl_menu=form_linea&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_linea']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_linea']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__bookmarks_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[19] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[19] . "",
        'id'       => "item_147",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_147",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__warehause_products_safety_5996.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[20] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[20] . "",
    'id'       => "item_10",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_10",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_23&sc_apl_menu=grid_grupo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_grupo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_grupo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__Icon_Business_Set_00004_A_icon-icons.com_59844.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[21] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[21] . "",
        'id'       => "item_23",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_23",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_24&sc_apl_menu=form_grupo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_grupo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_grupo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__warehause_products_safety_5996.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[22] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[22] . "",
        'id'       => "item_24",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_24",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_74&sc_apl_menu=form_productos_editarprecios&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarprecios']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarprecios']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__address_book_edit_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[23] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[23] . "",
        'id'       => "item_74",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_74",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_77&sc_apl_menu=blank_actualizar_precios_excel&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_actualizar_precios_excel']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_actualizar_precios_excel']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__clipboard_next_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[24] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[24] . "",
        'id'       => "item_77",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_77",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_108&sc_apl_menu=control_cargarproductos_excel&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_cargarproductos_excel']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_cargarproductos_excel']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-ms-excel-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[25] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[25] . "",
        'id'       => "item_108",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_108",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_210&sc_apl_menu=form_productos_editarproveedor&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarproveedor']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_editarproveedor']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__registry_edit_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[26] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[26] . "",
        'id'       => "item_210",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_210",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_215&sc_apl_menu=consultar_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['consultar_productos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['consultar_productos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__find_text_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[27] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[27] . "",
        'id'       => "item_215",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_215",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_231&sc_apl_menu=form_productos_fast_gcontable&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_fast_gcontable']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_fast_gcontable']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__cubes_blue_edit_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__cubes_blue_edit_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__cubes_blue_edit_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[28] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[28] . "",
        'id'       => "item_231",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_231",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__blue_stock_folder_12352.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[29] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[29] . "",
    'id'       => "item_11",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_11",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__shopping_cart_full_22024.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[30] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[30] . "",
    'id'       => "item_17",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_17",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_19&sc_apl_menu=fac_compras&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['fac_compras']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['fac_compras']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__shoppingcart_below_compra_12831.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[31] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[31] . "",
        'id'       => "item_19",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_19",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_32&sc_apl_menu=grid_compras&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_compras']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_compras']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__table_1061.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[32] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[32] . "",
        'id'       => "item_32",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_32",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_85&sc_apl_menu=form_pedido_compra&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_pedido_compra']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_pedido_compra']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__list_992.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[33] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[33] . "",
        'id'       => "item_85",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_85",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_86&sc_apl_menu=grid_pedidos_compras&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_compras']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_compras']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__filter_list_21446.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[34] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[34] . "",
        'id'       => "item_86",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_86",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_43&sc_apl_menu=grid_compras_dev&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_compras_dev']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_compras_dev']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__go-back256_24856.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[35] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[35] . "",
        'id'       => "item_43",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_43",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_142&sc_apl_menu=control_codbarras_filtro&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_codbarras_filtro']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_codbarras_filtro']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__barcode_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[36] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[36] . "",
        'id'       => "item_142",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_142",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_41&sc_apl_menu=grid_inventario&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__mimetypes_office_spreadsheet_table_xls_381.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[37] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[37] . "",
        'id'       => "item_41",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_41",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__Inventory-maintenance_25374.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[38] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[38] . "",
    'id'       => "item_13",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_13",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__ico__NM__Childish-Gears_24975.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[39] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[39] . "",
    'id'       => "item_55",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_55",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_51&sc_apl_menu=form_produccion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_produccion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_produccion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__Factory_icon-icons.com_52104.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[40] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[40] . "",
        'id'       => "item_51",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_51",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_52&sc_apl_menu=grid_produccion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_produccion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_produccion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__list_notes_930.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[41] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[41] . "",
        'id'       => "item_52",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_52",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_53&sc_apl_menu=grid_productosxtraslado&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productosxtraslado']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productosxtraslado']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__icons8-trigo-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[42] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[42] . "",
        'id'       => "item_53",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_53",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_54&sc_apl_menu=form_mov_trasladodeproduccion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_mov_trasladodeproduccion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_mov_trasladodeproduccion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__if-food-c216-2427860_85697.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[43] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[43] . "",
        'id'       => "item_54",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_54",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_56&sc_apl_menu=grid_mov_trasladoprod_almacen&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_trasladoprod_almacen']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_trasladoprod_almacen']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__medical-36_icon-icons.com_73889.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[44] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[44] . "",
        'id'       => "item_56",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_56",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_57&sc_apl_menu=grid_detallenotamov_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_detallenotamov_productos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_detallenotamov_productos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__FastFood_FrenchFries_26372.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[45] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[45] . "",
        'id'       => "item_57",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_57",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_33&sc_apl_menu=grid_movimiento&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_movimiento']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_movimiento']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__move_23058.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[46] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[46] . "",
        'id'       => "item_33",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_33",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__1491254081-19document-list_82931.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[47] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[47] . "",
    'id'       => "item_30",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_30",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_35&sc_apl_menu=grid_mov_ajusteinv&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_ajusteinv']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_mov_ajusteinv']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__korganizer_task_tasks_list_9501.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[48] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[48] . "",
        'id'       => "item_35",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_35",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_82&sc_apl_menu=Grid_ajuste_Inv_fisico&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Grid_ajuste_Inv_fisico']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['Grid_ajuste_Inv_fisico']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__bg__NM__inventario_fisico.jpeg";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[49] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[49] . "",
        'id'       => "item_82",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_82",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_12&sc_apl_menu=grid_inventario_inical&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_inical']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_inical']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__form_yellow_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[50] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[50] . "",
        'id'       => "item_12",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_12",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_15&sc_apl_menu=form_inventario_inicial&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_inventario_inicial']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_inventario_inicial']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__form_yellow_edit_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[51] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[51] . "",
        'id'       => "item_15",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_15",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_34&sc_apl_menu=grid_inventario_final&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_final']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_final']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__1491254081-19document-list_82931.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[52] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[52] . "",
        'id'       => "item_34",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_34",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_98&sc_apl_menu=grid_ajuste_notapos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ajuste_notapos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ajuste_notapos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icon_nota-icons.com_55995.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[53] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[53] . "",
        'id'       => "item_98",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_98",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_99&sc_apl_menu=form_notainv_ajuste&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ajuste']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ajuste']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icon_notepad_78436.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[54] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[54] . "",
        'id'       => "item_99",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_99",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_31&sc_apl_menu=form_tipotransfe&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipotransfe']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipotransfe']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__form_blue_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[55] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[55] . "",
        'id'       => "item_31",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_31",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__business_salesreport_salesreport_negocio_2353.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[56] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[56] . "",
    'id'       => "item_14",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_14",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__ico__NM__cashier_icon-icons.com_53629.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[57] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[57] . "",
    'id'       => "item_16",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_16",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_36&sc_apl_menu=form_facturaven&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_facturaven']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_facturaven']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__invoice_22150 (1).png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[58] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[58] . "",
        'id'       => "item_36",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_36",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_38&sc_apl_menu=blank_grid_pos_usuario&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_grid_pos_usuario']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_grid_pos_usuario']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__cashier_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__cashier_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__cashier_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[59] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[59] . "",
        'id'       => "item_38",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_38",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_132&sc_apl_menu=grid_facturaven_pos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_pos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_pos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__cashier_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__cashier_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__cashier_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[60] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[60] . "",
        'id'       => "item_132",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_132",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_134&sc_apl_menu=lectordeprecios&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['lectordeprecios']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['lectordeprecios']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__handheld_device_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__handheld_device_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__handheld_device_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[61] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[61] . "",
        'id'       => "item_134",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_134",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_62&sc_apl_menu=form_remisiones&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_remisiones']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_remisiones']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__ic-payreceipt_97584.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[62] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[62] . "",
        'id'       => "item_62",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_62",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_42&sc_apl_menu=grid_facturaven&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__Sales-by-payment-method_25410.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[63] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[63] . "",
        'id'       => "item_42",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_42",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_37&sc_apl_menu=grid_ventas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__invoice_78456.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[64] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[64] . "",
        'id'       => "item_37",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_37",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_63&sc_apl_menu=grid_remi&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_remi']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_remi']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__ic-ad_97607.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[65] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[65] . "",
        'id'       => "item_63",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_63",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__ico__NM__shoppingcart_to_compra_12829.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[66] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[66] . "",
    'id'       => "item_40",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_40",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_184&sc_apl_menu=grid_programar_descuentos_generales&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_programar_descuentos_generales']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_programar_descuentos_generales']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__calendar_down_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[67] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[67] . "",
        'id'       => "item_184",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_184",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_236&sc_apl_menu=grid_facturaven_automatica&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_automatica']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_automatica']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__calendar_up_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__calendar_up_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__calendar_up_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[68] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[68] . "",
        'id'       => "item_236",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_236",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_254&sc_apl_menu=blank_enviar_fe_periodo_propio&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_enviar_fe_periodo_propio']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_enviar_fe_periodo_propio']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__mailbox_full_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__mailbox_full_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__mailbox_full_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[69] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[69] . "",
        'id'       => "item_254",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_254",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "grp__NM__ico__NM__note_102351.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[70] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[70] . "",
    'id'       => "item_48",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_48",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_177&sc_apl_menu=form_notas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_notas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_notas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_attachment_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[71] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[71] . "",
        'id'       => "item_177",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_177",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_178&sc_apl_menu=grid_NC_ND&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_NC_ND']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_NC_ND']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_find_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[72] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[72] . "",
        'id'       => "item_178",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_178",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__ico__NM__ilustracoes_04-12_icon-icons.com_75471.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[73] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[73] . "",
    'id'       => "item_64",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_64",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_65&sc_apl_menu=form_pedido&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_pedido']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_pedido']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__list_992.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[74] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[74] . "",
        'id'       => "item_65",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_65",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_66&sc_apl_menu=blank_iframe_pedidos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_pedidos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_pedidos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__ilustracoes_04-14_icon-icons.com_75468.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[75] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[75] . "",
        'id'       => "item_66",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_66",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_153&sc_apl_menu=blank_recalcular_ventas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_ventas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_ventas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__calculator_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[76] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[76] . "",
        'id'       => "item_153",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_153",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__mug_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[77] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[77] . "",
    'id'       => "item_250",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_250",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-utensils",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_251&sc_apl_menu=grid_pedidos_restaurante&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_restaurante']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_restaurante']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__pda2_write_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__pda2_write_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__pda2_write_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[78] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[78] . "",
        'id'       => "item_251",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_251",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-utensils",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "grp__NM__ico__NM__icons8-comprar-por-dinero-32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[79] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[79] . "",
    'id'       => "item_45",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_45",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_50&sc_apl_menu=grid_cartera&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cartera']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cartera']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-cuenta-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[80] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[80] . "",
        'id'       => "item_50",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_50",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_44&sc_apl_menu=form_reciboingreso&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__Banking_00011_A_icon-icons.com_59831.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[81] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[81] . "",
        'id'       => "item_44",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_44",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_154&sc_apl_menu=grid_terceros_cuentas_porcobrar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porcobrar']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porcobrar']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__briefcase_document_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[82] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[82] . "",
        'id'       => "item_154",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_154",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_67&sc_apl_menu=form_reciboingreso_remis&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso_remis']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_reciboingreso_remis']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__Banking_00011_A_icon-icons.com_59831.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[83] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[83] . "",
        'id'       => "item_67",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_67",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_246&sc_apl_menu=grid_recibos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-cuenta-32-2.png";
    $icon_aba = "grp__NM__ico__NM__icons8-cuenta-32-2.png";
    $icon_aba_inactive = "grp__NM__ico__NM__icons8-cuenta-32-2.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[84] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[84] . "",
        'id'       => "item_246",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_246",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_247&sc_apl_menu=grid_reciboingreso&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reciboingreso']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reciboingreso']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-cuenta-32-2.png";
    $icon_aba = "grp__NM__ico__NM__icons8-cuenta-32-2.png";
    $icon_aba_inactive = "grp__NM__ico__NM__icons8-cuenta-32-2.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[85] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[85] . "",
        'id'       => "item_247",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_247",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_174&sc_apl_menu=blank_recalcular_cuentas_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_cuentas_principal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_cuentas_principal']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__calculator_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__calculator_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__calculator_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[86] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[86] . "",
        'id'       => "item_174",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_174",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "grp__NM__ico__NM__icons8-caja-registradora-32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[87] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[87] . "",
    'id'       => "item_59",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_59",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_109&sc_apl_menu=grid_cuentaspagar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cuentaspagar']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cuentaspagar']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-reembolso-32-.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[88] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[88] . "",
        'id'       => "item_109",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_109",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_111&sc_apl_menu=grid_tesoreria&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tesoreria']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tesoreria']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-obligaciones-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[89] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[89] . "",
        'id'       => "item_111",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_111",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_192&sc_apl_menu=grid_terceros_cuentas_porpagar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porpagar']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cuentas_porpagar']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__briefcase2_document_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[90] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[90] . "",
        'id'       => "item_192",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_192",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_60&sc_apl_menu=grid_caja_lista&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_lista']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_lista']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-caja-registradora-40.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[91] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[91] . "",
        'id'       => "item_60",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_60",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_112&sc_apl_menu=form_hacerpagos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_hacerpagos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_hacerpagos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__1486564168-finance-bank-check_81495.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[92] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[92] . "",
        'id'       => "item_112",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_112",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_113&sc_apl_menu=grid_pagos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-factura-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[93] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[93] . "",
        'id'       => "item_113",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_113",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_176&sc_apl_menu=grid_pagos_master&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos_master']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pagos_master']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-factura-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[94] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[94] . "",
        'id'       => "item_176",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_176",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_61&sc_apl_menu=grid_caja&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_caja']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_caja']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-flujo-de-fondos-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[95] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[95] . "",
        'id'       => "item_61",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_61",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_127&sc_apl_menu=grid_bancos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_bancos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_bancos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__Bank_icon-icons.com_74914.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[96] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[96] . "",
        'id'       => "item_127",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_127",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_128&sc_apl_menu=form_pagos_conceptos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_pagos_conceptos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_pagos_conceptos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__head-brains_icon-icons.com_53022.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[97] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[97] . "",
        'id'       => "item_128",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_128",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__book_green_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[98] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[98] . "",
    'id'       => "item_160",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_160",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_159&sc_apl_menu=grid_plancuentas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_plancuentas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_plancuentas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__address_book3_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[99] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[99] . "",
        'id'       => "item_159",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_159",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_161&sc_apl_menu=grid_grupos_contables&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_grupos_contables']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_grupos_contables']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__books_blue_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[100] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[100] . "",
        'id'       => "item_161",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_161",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_252&sc_apl_menu=form_productos_contable&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos_contable']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos_contable']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__clipboard_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__clipboard_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__clipboard_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[101] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[101] . "",
        'id'       => "item_252",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_252",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_253&sc_apl_menu=form_terceros_contable&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contable']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contable']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__groups_people_people_1715.png";
    $icon_aba = "usr__NM__bg__NM__groups_people_people_1715.png";
    $icon_aba_inactive = "usr__NM__bg__NM__groups_people_people_1715.png";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[102] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[102] . "",
        'id'       => "item_253",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_253",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_237&sc_apl_menu=grid_terceros_exportar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_exportar']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_exportar']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__users_back_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__users_back_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__users_back_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[103] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[103] . "",
        'id'       => "item_237",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_237",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_238&sc_apl_menu=asientos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['asientos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['asientos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__book_blue_open_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__book_blue_open_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__book_blue_open_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[104] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[104] . "",
        'id'       => "item_238",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_238",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_229&sc_apl_menu=grid_facturacom_genera_comprobantes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturacom_genera_comprobantes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturacom_genera_comprobantes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__book_green_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[105] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[105] . "",
        'id'       => "item_229",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_229",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_228&sc_apl_menu=grid_facturaven_genera_comprobantes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_genera_comprobantes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_genera_comprobantes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__book_yellow_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[106] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[106] . "",
        'id'       => "item_228",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_228",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_162&sc_apl_menu=grid_comprobantes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_comprobantes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_comprobantes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__book_red_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[107] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[107] . "",
        'id'       => "item_162",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_162",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_248&sc_apl_menu=grid_presupuestos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_presupuestos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_presupuestos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_preferences_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__document_preferences_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__document_preferences_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[108] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[108] . "",
        'id'       => "item_248",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_248",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__ico__NM__ilustracoes_04-14_icon-icons.com_75468.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[109] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[109] . "",
    'id'       => "item_75",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_75",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__document_preferences_24.png";
$icon_aba = "scriptcase__NM__ico__NM__document_preferences_24.png";
$icon_aba_inactive = "scriptcase__NM__ico__NM__document_preferences_24.png";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[110] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[110] . "",
    'id'       => "item_255",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_255",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_256&sc_apl_menu=grid_reporte_impuestos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_preferences_24.png";
    $icon_aba = "scriptcase__NM__ico__NM__document_preferences_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__document_preferences_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[111] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[111] . "",
        'id'       => "item_256",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_256",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__invoice_dollar_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[112] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[112] . "",
    'id'       => "item_200",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_200",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_194&sc_apl_menu=grid_total_ingreso_egresos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_total_ingreso_egresos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_total_ingreso_egresos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_pulse_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[113] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[113] . "",
        'id'       => "item_194",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_194",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_199&sc_apl_menu=grid_abc_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_clientes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_clientes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__users_family_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[114] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[114] . "",
        'id'       => "item_199",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_199",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_198&sc_apl_menu=grid_abc_productos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_productos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_abc_productos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__components_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[115] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[115] . "",
        'id'       => "item_198",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_198",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__cubes_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[116] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[116] . "",
    'id'       => "item_143",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_143",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_188&sc_apl_menu=grid_costo_inventario&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_costo_inventario']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_costo_inventario']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__currency_dollar_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[117] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[117] . "",
        'id'       => "item_188",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_188",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_187&sc_apl_menu=grid_rotacion_inventario&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_rotacion_inventario']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_rotacion_inventario']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__box_next_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[118] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[118] . "",
        'id'       => "item_187",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_187",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_144&sc_apl_menu=grid_inventario_fisico_porproducto&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_fisico_porproducto']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inventario_fisico_porproducto']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__Abacus_35794.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[119] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[119] . "",
        'id'       => "item_144",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_144",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_189&sc_apl_menu=grid_productos_por_bodega&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_por_bodega']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_por_bodega']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__box_view_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[120] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[120] . "",
        'id'       => "item_189",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_189",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_141&sc_apl_menu=grid_semanas_venta&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_semanas_venta']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_semanas_venta']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__calendar_5_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[121] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[121] . "",
        'id'       => "item_141",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_141",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_107&sc_apl_menu=grid_reporte_productos_pedido&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_pedido']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_pedido']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__chart_column_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[122] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[122] . "",
        'id'       => "item_107",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_107",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_118&sc_apl_menu=grid_reporte_productos_fechavencimiento&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_fechavencimiento']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_productos_fechavencimiento']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__date_time_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[123] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[123] . "",
        'id'       => "item_118",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_118",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_129&sc_apl_menu=grid_saldos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_saldos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__money2_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[124] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[124] . "",
        'id'       => "item_129",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_129",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_133&sc_apl_menu=grid_vencimiento_lote&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_vencimiento_lote']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_vencimiento_lote']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__barcode_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[125] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[125] . "",
        'id'       => "item_133",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_133",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__invoice_dollar_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[126] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[126] . "",
    'id'       => "item_136",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_136",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_219&sc_apl_menu=grid_rp_productos_vendedor&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_rp_productos_vendedor']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_rp_productos_vendedor']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__presentation_chart_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[127] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[127] . "",
        'id'       => "item_219",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_219",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_181&sc_apl_menu=blank_reporte_caja_filtro&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_reporte_caja_filtro']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_reporte_caja_filtro']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__cashier_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[128] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[128] . "",
        'id'       => "item_181",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_181",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_148&sc_apl_menu=grid_caja_informe&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_informe']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_caja_informe']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__invoice_dollar_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[129] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[129] . "",
        'id'       => "item_148",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_148",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_149&sc_apl_menu=grid_reporte_caja&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_caja']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_caja']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__money_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[130] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[130] . "",
        'id'       => "item_149",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_149",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_76&sc_apl_menu=grid_report_refventacostogarancia&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_report_refventacostogarancia']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_report_refventacostogarancia']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__construction_project_plan_building_architect_design_develop-64_icon-icons.com_60255.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[131] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[131] . "",
        'id'       => "item_76",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_76",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_115&sc_apl_menu=grid_ventas_ubicacion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_ubicacion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_ubicacion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__chart_donut_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[132] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[132] . "",
        'id'       => "item_115",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_115",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_137&sc_apl_menu=grid_ventas_por_articulo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_articulo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_articulo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__box_next_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[133] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[133] . "",
        'id'       => "item_137",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_137",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_138&sc_apl_menu=grid_ventas_por_familia&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_familia']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_familia']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__cubes_green_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[134] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[134] . "",
        'id'       => "item_138",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_138",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_139&sc_apl_menu=grid_ventas_por_cliente&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_cliente']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_cliente']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__businesspeople2_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[135] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[135] . "",
        'id'       => "item_139",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_139",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_140&sc_apl_menu=grid_ventas_por_vendedor&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_vendedor']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_ventas_por_vendedor']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__user_find_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[136] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[136] . "",
        'id'       => "item_140",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_140",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_182&sc_apl_menu=blank_recalcular_flujo_caja_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_flujo_caja_principal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_flujo_caja_principal']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__server_to_client_critical_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[137] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[137] . "",
        'id'       => "item_182",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_182",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_242&sc_apl_menu=grid_productos_x_pedido_dia&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_x_pedido_dia']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_x_pedido_dia']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__shopping_cart_edit_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__shopping_cart_edit_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__shopping_cart_edit_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[138] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[138] . "",
        'id'       => "item_242",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_242",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_243&sc_apl_menu=grid_venta_x_producto_dia&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_venta_x_producto_dia']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_venta_x_producto_dia']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__purchase_order_cart_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__purchase_order_cart_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__purchase_order_cart_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[139] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[139] . "",
        'id'       => "item_243",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_243",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__notebook3_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[140] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[140] . "",
    'id'       => "item_179",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_179",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_195&sc_apl_menu=grid_saldo_terceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_saldo_terceros']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_saldo_terceros']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__users2_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[141] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[141] . "",
        'id'       => "item_195",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_195",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_180&sc_apl_menu=grid_terceros_cartera_por_edades&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cartera_por_edades']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_cartera_por_edades']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__calendar_52_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[142] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[142] . "",
        'id'       => "item_180",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_180",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__chart_bar_32.png";
$icon_aba = "scriptcase__NM__ico__NM__chart_bar_32.png";
$icon_aba_inactive = "scriptcase__NM__ico__NM__chart_bar_32.png";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[143] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[143] . "",
    'id'       => "item_244",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_244",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-chart-bar",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_245&sc_apl_menu=grid_reporte_impuestos_ing_terceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos_ing_terceros']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reporte_impuestos_ing_terceros']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_preferences_24.png";
    $icon_aba = "scriptcase__NM__ico__NM__document_preferences_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__document_preferences_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[144] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[144] . "",
        'id'       => "item_245",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_245",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__user_headset_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[145] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[145] . "",
    'id'       => "item_203",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_203",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_209&sc_apl_menu=grid_tareas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_tareas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_tareas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__checkbox_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[146] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[146] . "",
        'id'       => "item_209",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_209",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_204&sc_apl_menu=grid_contactos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_contactos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_contactos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__contacts.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[147] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[147] . "",
        'id'       => "item_204",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_204",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_205&sc_apl_menu=grid_pedidos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_edit_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[148] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[148] . "",
        'id'       => "item_205",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_205",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__clipboard2_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[149] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[149] . "",
    'id'       => "item_220",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_220",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_221&sc_apl_menu=grid_terceros_contratos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__clipboard_24.png";
    $icon_aba = "scriptcase__NM__ico__NM__clipboard_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__clipboard_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[150] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[150] . "",
        'id'       => "item_221",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_221",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_233&sc_apl_menu=grid_terceros_contratos_generar_fv&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos_generar_fv']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_terceros_contratos_generar_fv']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__printer_ok_24.png";
    $icon_aba = "scriptcase__NM__ico__NM__printer_ok_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__printer_ok_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[151] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[151] . "",
        'id'       => "item_233",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_233",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_234&sc_apl_menu=grid_facturaven_contratos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_contratos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facturaven_contratos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_preferences_24.png";
    $icon_aba = "scriptcase__NM__ico__NM__document_preferences_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__document_preferences_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[152] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[152] . "",
        'id'       => "item_234",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_234",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_239&sc_apl_menu=blank_descarga_pdfs_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_descarga_pdfs_principal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_descarga_pdfs_principal']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__index_down_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__index_down_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__index_down_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[153] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[153] . "",
        'id'       => "item_239",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_239",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_235&sc_apl_menu=grid_recibos_ing_caja&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos_ing_caja']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_recibos_ing_caja']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__receipt_book_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__receipt_book_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__receipt_book_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[154] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[154] . "",
        'id'       => "item_235",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_235",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_224&sc_apl_menu=form_terceros_dispositivos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_dispositivos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_dispositivos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__hard_drive_24.png";
    $icon_aba = "scriptcase__NM__ico__NM__hard_drive_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__hard_drive_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[155] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[155] . "",
        'id'       => "item_224",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_224",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_225&sc_apl_menu=form_terceros_contrato_dispositivo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contrato_dispositivo']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contrato_dispositivo']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__hard_drive_edit_24.png";
    $icon_aba = "case__NM__ico__NM__hard_drive_edit_24.pn";
    $icon_aba_inactive = "case__NM__ico__NM__hard_drive_edit_24.pn";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[156] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[156] . "",
        'id'       => "item_225",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_225",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_226&sc_apl_menu=form_terceros_contratos_estado&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_estado']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_estado']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__code_24.png";
    $icon_aba = "scriptcase__NM__ico__NM__code_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__code_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[157] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[157] . "",
        'id'       => "item_226",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_226",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_227&sc_apl_menu=form_terceros_contratos_motivoscorte&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_motivoscorte']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_terceros_contratos_motivoscorte']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__bookmark_blue_delete_24.png";
    $icon_aba = "scriptcase__NM__ico__NM__bookmark_blue_delete_24.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__bookmark_blue_delete_24.png";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[158] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[158] . "",
        'id'       => "item_227",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_227",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_206&sc_apl_menu=grid_historiales_crm&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_historiales_crm']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_historiales_crm']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__history2_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[159] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[159] . "",
        'id'       => "item_206",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_206",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_216&sc_apl_menu=grid_casos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_casos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_casos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__ticket_blue_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[160] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[160] . "",
        'id'       => "item_216",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_216",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_207&sc_apl_menu=form_clasificacion_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_clasificacion_clientes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__id_cards_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[161] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[161] . "",
        'id'       => "item_207",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_207",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__bookmarks_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[162] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[162] . "",
    'id'       => "item_208",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_208",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_217&sc_apl_menu=form_casos_estado&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_casos_estado']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_casos_estado']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__trafficlight_red_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[163] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[163] . "",
        'id'       => "item_217",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_217",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_218&sc_apl_menu=form_casos_prioridad&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_casos_prioridad']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_casos_prioridad']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__stopwatch_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[164] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[164] . "",
        'id'       => "item_218",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_218",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__company_22169.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[165] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[165] . "",
    'id'       => "item_26",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_26",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_117&sc_apl_menu=calendar_calendar&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['calendar_calendar']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['calendar_calendar']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-directorio-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['calendar']['active']))
    {
        $icon_aba = $arr_menuicons['calendar']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['calendar']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['calendar']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[166] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[166] . "",
        'id'       => "item_117",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_117",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_201&sc_apl_menu=../_lib/libraries/grp/correo&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
$str_icon = "scriptcase__NM__ico__NM__airmail_closed_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[167] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[167] . "",
    'id'       => "item_201",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => " item-target=\"" . $this->menu_target('_blank') . "\"",
    'sc_id'    => "item_201",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_202&sc_apl_menu=grid_gestor_archivos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_gestor_archivos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_gestor_archivos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_refresh_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[168] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[168] . "",
        'id'       => "item_202",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_202",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__documents_gear_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[169] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[169] . "",
    'id'       => "item_79",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_79",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_28&sc_apl_menu=form_datosemp&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_datosemp']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_datosemp']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__Folder_Gear_icon-icons.com_75794.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[170] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[170] . "",
        'id'       => "item_28",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_28",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_190&sc_apl_menu=grid_sucursales_todas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_sucursales_todas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_sucursales_todas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__sc_menu_home3_e.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[171] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[171] . "",
        'id'       => "item_190",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_190",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_193&sc_apl_menu=form_consecutivos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_consecutivos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_consecutivos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_refresh_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[172] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[172] . "",
        'id'       => "item_193",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_193",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_130&sc_apl_menu=grid_configuraciones_print_pos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_configuraciones_print_pos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_configuraciones_print_pos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__printer3_edit_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[173] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[173] . "",
        'id'       => "item_130",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_130",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_101&sc_apl_menu=form_configuraciones&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_configuraciones']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_configuraciones']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__documents_gear_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[174] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[174] . "",
        'id'       => "item_101",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_101",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_102&sc_apl_menu=form_webservicefe&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_webservicefe']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_webservicefe']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__server_mail_download_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[175] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[175] . "",
        'id'       => "item_102",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_102",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_29&sc_apl_menu=grid_resdian&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_resdian']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_resdian']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__Dian (1).png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[176] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[176] . "",
        'id'       => "item_29",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_29",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_259&sc_apl_menu=grid_plantillas_correo_propio&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_plantillas_correo_propio']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_plantillas_correo_propio']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_plain_blue_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__document_plain_blue_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__document_plain_blue_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[177] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[177] . "",
        'id'       => "item_259",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_259",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "grp__NM__ico__NM__icons8-impuesto-32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[178] . "",
    'level'    => "2",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[178] . "",
    'id'       => "item_121",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_121",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_73&sc_apl_menu=grid_iva&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_iva']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_iva']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__1486394955-13-tax_80558.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[179] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[179] . "",
        'id'       => "item_73",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_73",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_122&sc_apl_menu=form_tiporetefuente&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tiporetefuente']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tiporetefuente']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__Cost-per-Click-(CPC)_icon-icons.com_53723.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[180] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[180] . "",
        'id'       => "item_122",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_122",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_123&sc_apl_menu=form_tipoica&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipoica']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipoica']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__1486564172-finance-loan-money_81492.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[181] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[181] . "",
        'id'       => "item_123",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_123",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_124&sc_apl_menu=form_tipoautoretencion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipoautoretencion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipoautoretencion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__business-color_money-coins_icon-icons.com_53446.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[182] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[182] . "",
        'id'       => "item_124",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_124",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_125&sc_apl_menu=form_c_costos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_c_costos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_c_costos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-costoso-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[183] . "",
        'level'    => "3",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[183] . "",
        'id'       => "item_125",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_125",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_83&sc_apl_menu=form_prefijos_documentos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_prefijos_documentos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_prefijos_documentos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__bg__NM__prefijos.jpeg";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[184] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[184] . "",
        'id'       => "item_83",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_83",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_27&sc_apl_menu=form_bodegas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_bodegas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_bodegas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__bg__NM__1486504365-building-business-store.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[185] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[185] . "",
        'id'       => "item_27",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_27",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_232&sc_apl_menu=form_SN_BALANZA&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_SN_BALANZA']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_SN_BALANZA']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__card_terminal_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[186] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[186] . "",
        'id'       => "item_232",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_232",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__users3_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[187] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[187] . "",
    'id'       => "item_71",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_71",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_68&sc_apl_menu=grid_usuarios&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__users3_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[188] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[188] . "",
        'id'       => "item_68",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_68",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_69&sc_apl_menu=form_usuarios&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__users4_add_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[189] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[189] . "",
        'id'       => "item_69",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_69",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_70&sc_apl_menu=form_usuarios_grupos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios_grupos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_usuarios_grupos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__users_family_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[190] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[190] . "",
        'id'       => "item_70",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_70",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_72&sc_apl_menu=grid_aplicaciones_menu_asignarpermisos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_aplicaciones_menu_asignarpermisos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_aplicaciones_menu_asignarpermisos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__lock_preferences_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[191] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[191] . "",
        'id'       => "item_72",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_72",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_249&sc_apl_menu=control_copiar_permisos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['control_copiar_permisos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['control_copiar_permisos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__copy_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__copy_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__copy_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[192] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[192] . "",
        'id'       => "item_249",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_249",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_185&sc_apl_menu=form_permisos_menu_movil&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_menu_movil']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_menu_movil']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__user_mobilephone_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[193] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[193] . "",
        'id'       => "item_185",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_185",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_120&sc_apl_menu=form_aplicaciones_menu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_aplicaciones_menu']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_aplicaciones_menu']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__code_php_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[194] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[194] . "",
        'id'       => "item_120",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_120",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_186&sc_apl_menu=form_permisos_aplicaciones_menu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_aplicaciones_menu']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_permisos_aplicaciones_menu']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__code_colored_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[195] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[195] . "",
        'id'       => "item_186",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_186",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_91&sc_apl_menu=grid_empresas&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_empresas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_empresas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__companies.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[196] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[196] . "",
        'id'       => "item_91",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_91",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "usr__NM__bg__NM__systempackages_config_configuration_9436.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[197] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[197] . "",
    'id'       => "item_21",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_21",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_22&sc_apl_menu=blank_recalcular_lfs_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__Abacus_35794.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[198] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[198] . "",
        'id'       => "item_22",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_22",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_131&sc_apl_menu=blank_recalcular_lfs_principal&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_recalcular_lfs_principal']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__barcode_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[199] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[199] . "",
        'id'       => "item_131",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_131",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_78&sc_apl_menu=blank_hacer_backup&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_hacer_backup']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_hacer_backup']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__floppy_disk2_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[200] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[200] . "",
        'id'       => "item_78",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_78",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_87&sc_apl_menu=blank_restaurar_backup&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_restaurar_backup']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_restaurar_backup']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__data_into_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[201] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[201] . "",
        'id'       => "item_87",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_87",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_145&sc_apl_menu=blank_optimizar_bd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_optimizar_bd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_optimizar_bd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__data_refresh_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[202] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[202] . "",
        'id'       => "item_145",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_145",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__bolt_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[203] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[203] . "",
    'id'       => "item_196",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_196",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_81&sc_apl_menu=blank_limpiar_bd&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_limpiar_bd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_limpiar_bd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__data_replace_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[204] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[204] . "",
        'id'       => "item_81",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_81",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_175&sc_apl_menu=form_notainv_ceros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ceros']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_notainv_ceros']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__systemreboot_94645.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[205] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[205] . "",
        'id'       => "item_175",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_175",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_191&sc_apl_menu=grid_conceptos_documentos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_conceptos_documentos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_conceptos_documentos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__document_into_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[206] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[206] . "",
        'id'       => "item_191",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_191",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_114&sc_apl_menu=blank_iframe_phpmyadmin&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_phpmyadmin']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_iframe_phpmyadmin']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__data_table_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[207] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[207] . "",
        'id'       => "item_114",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_blank') . "\"",
        'sc_id'    => "item_114",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_197&sc_apl_menu=blank_copias_nube_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_copias_nube_clientes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_copias_nube_clientes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__fw_ico_nube.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[208] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[208] . "",
        'id'       => "item_197",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_197",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_211&sc_apl_menu=form_municipio&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_municipio']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_municipio']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__environment_information_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[209] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[209] . "",
        'id'       => "item_211",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_211",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_213&sc_apl_menu=form_unidades_medida&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_unidades_medida']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_unidades_medida']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__drawing_utensils_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[210] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[210] . "",
        'id'       => "item_213",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_213",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_214&sc_apl_menu=form_tipo_producto&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_tipo_producto']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_tipo_producto']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__components_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[211] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[211] . "",
        'id'       => "item_214",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_214",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "grp__NM__ico__NM__icon-contabilidad-32-3.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[212] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[212] . "",
    'id'       => "item_93",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_93",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_94&sc_apl_menu=grid_importar_grupos_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_TNS']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_TNS']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icon-contabilidad-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $str_link = "#";
}
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[213] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[213] . "",
        'id'       => "item_94",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_94",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_97&sc_apl_menu=grid_importar_tipoiva_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_tipoiva_TNS']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_tipoiva_TNS']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icon-contabilidad-32-2.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[214] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[214] . "",
        'id'       => "item_97",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_97",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_157&sc_apl_menu=grid_importar_plan_cuentas_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_plan_cuentas_TNS']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_plan_cuentas_TNS']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__book_blue_open_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[215] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[215] . "",
        'id'       => "item_157",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_157",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_158&sc_apl_menu=grid_importar_grupos_contables_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_contables_TNS']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_grupos_contables_TNS']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__books_blue_edit_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[216] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[216] . "",
        'id'       => "item_158",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_158",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_95&sc_apl_menu=grid_importar_articulos_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_articulos_TNS']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_articulos_TNS']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icon-recibo-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[217] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[217] . "",
        'id'       => "item_95",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_95",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_96&sc_apl_menu=grid_importar_terceros_TNS&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_terceros_TNS']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_importar_terceros_TNS']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__icons8-contabilidad-32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[218] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[218] . "",
        'id'       => "item_96",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_96",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_103&sc_apl_menu=grid_productos_facilweb_importinvtns&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_facilweb_importinvtns']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos_facilweb_importinvtns']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__import_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
    {
        $icon_aba = $arr_menuicons['others']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['others']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[219] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[219] . "",
        'id'       => "item_103",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_103",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_135&sc_apl_menu=grid_log&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_log']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_log']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__user_find_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__user_find_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__user_find_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[220] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[220] . "",
        'id'       => "item_135",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_135",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_257&sc_apl_menu=grid_log_pedidos_borrados&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_log_pedidos_borrados']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_log_pedidos_borrados']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__user_find_32.png";
    $icon_aba = "scriptcase__NM__ico__NM__user_find_32.png";
    $icon_aba_inactive = "scriptcase__NM__ico__NM__user_find_32.png";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[221] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[221] . "",
        'id'       => "item_257",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_257",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__ico__NM__help2_32.png";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['']['active']))
{
    $icon_aba = $arr_menuicons['']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[222] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[222] . "",
    'id'       => "item_104",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_104",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_155&sc_apl_menu=blank_soporte&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_soporte']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_soporte']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__user_headset_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[223] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[223] . "",
        'id'       => "item_155",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_155",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_212&sc_apl_menu=blank_buscar_actualizaciones&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_buscar_actualizaciones']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_buscar_actualizaciones']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__download_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[224] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[224] . "",
        'id'       => "item_212",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_212",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_156&sc_apl_menu=blank_anydesk&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_anydesk']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_anydesk']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__fw_ico_anydesk.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[225] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[225] . "",
        'id'       => "item_156",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_156",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_46&sc_apl_menu=blank&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "usr__NM__ico__NM__copyright_icon-icons.com_76791.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[226] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[226] . "",
        'id'       => "item_46",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_46",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_105&sc_apl_menu=blank_ayuda&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_ayuda']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_ayuda']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__book_blue_find_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[227] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[227] . "",
        'id'       => "item_105",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_105",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_150&sc_apl_menu=blank_slider&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_slider']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_slider']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "grp__NM__ico__NM__favicon.ico";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[228] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[228] . "",
        'id'       => "item_150",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_self') . "\"",
        'sc_id'    => "item_150",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_form_php.php?sc_item_menu=item_20&sc_apl_menu=blank_fin_sesion&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['blank_fin_sesion']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['blank_fin_sesion']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "scriptcase__NM__ico__NM__exit_32.png";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['blank']['active']))
    {
        $icon_aba = $arr_menuicons['blank']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['blank']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['blank']['inactive'];
    }
    $menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[229] . "",
        'level'    => "0",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[229] . "",
        'id'       => "item_20",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_target('_parent') . "\"",
        'sc_id'    => "item_20",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );

if (isset($_SESSION['scriptcase']['sc_def_menu']['menu']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['menu']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'menu');
    $menu_menuData['data'] = $str_menu_usu;
}
if (is_file("menu_help.txt"))
{
    $Arq_WebHelp = file("menu_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
                $str_disabled = "N";
                $str_link = "" . $path_help . $Tmp1[1] . "";
                $str_icon = "";
                $icon_aba = "";
                $icon_aba_inactive = "";
                if(empty($icon_aba) && isset($arr_menuicons['']['active']))
                {
                    $icon_aba = $arr_menuicons['']['active'];
                }
                if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
                {
                    $icon_aba_inactive = $arr_menuicons['']['inactive'];
                }
                $menu_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => $str_link,
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => $str_icon,
                    'icon_aba' => $icon_aba,
                    'icon_aba_inactive' => $icon_aba_inactive,
                    'target'   => "" . $this->menu_target('_blank') . "",
                    'sc_id'    => "item_Help",
                    'disabled' => $str_disabled,
                    'display'     => "text",
                    'display_position'=> "",
                    'icon_fa'     => "",
                    'icon_color'     => "",
                    'icon_color_hover'     => "",
                    'icon_color_disabled'     => "",
                );
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['menu']) && !empty($_SESSION['scriptcase']['sc_menu_del']['menu']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($menu_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['menu']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($menu_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($menu_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($menu_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $menu_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['menu']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['menu']))
{
    $disable_menu = false;
    foreach ($menu_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['menu']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $menu_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $menu_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

$level_to_delete = false;
foreach ($menu_menuData['data'] as $chave => $cada_menu)
{
        if($level_to_delete !== false && $menu_menuData['data'][$chave]['level'] > $level_to_delete)
        {
                unset($menu_menuData['data'][$chave]);
        }
        else
        {
                $level_to_delete = false;
                
                if ($menu_menuData['data'][$chave]['disabled'] == 'Y')
                {
                        $level_to_delete = $menu_menuData['data'][$chave]['level'];
                        unset($menu_menuData['data'][$chave]);
                }
        }
}
$menu_menuData['data'] = array_values($menu_menuData['data']);
$flag = 1;
while ($flag == 1)
{
    $flag = 0;
    foreach ($menu_menuData['data'] as $chave => $cada_menu)
    {
        if (!empty($cada_menu))
        {
            if (isset($menu_menuData['data'][$chave + 1]) && !empty($menu_menuData['data'][$chave + 1]))
            {
                if ($menu_menuData['data'][$chave]['link'] == "#")
                {
                    if ($menu_menuData['data'][$chave]['level'] >= $menu_menuData['data'][$chave + 1]['level'] )
                    {
                        unset($menu_menuData['data'][$chave]);
                        $flag = 1;
                    }
                }
            }
            elseif ($menu_menuData['data'][$chave]['link'] == "#")
            {
                unset($menu_menuData['data'][$chave]);
            }
        }
    }
    $menu_menuData['data'] = array_values($menu_menuData['data']);
}

/* Cabecera HTML */
if ($menu_menuData['iframe'])
{
    $menu_menuData['height'] = '100%';
    header("X-XSS-Protection: 1; mode=block");
    header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title>Facturación y manejo de Inventarios - <?php echo $_SESSION['empresa'] ?></title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <?php
 if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
 {
  ?>
   <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <?php
 }
 ?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <?php 
 if(isset($str_google_fonts) && !empty($str_google_fonts)) 
 { 
     ?> 
     <link rel="stylesheet" type="text/css" href="<?php echo $str_google_fonts ?>" /> 
     <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_btngrp.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_btngrp.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_btngrp.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_menuH.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_menuH.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $Str_btn_css ?>" /> 
 <link rel="stylesheet" href="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../_lib/css/_menuTheme/usr_Scriptcase_Menupaypalprata_vert_<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir']; ?>.css<?php if (@is_file($this->path_css . '_menuTheme/' . "usr_Scriptcase_Menupaypalprata" . '_' . vert . '.css')) { echo '?scp=' . md5($this->path_css . '_menuTheme/' . "usr_Scriptcase_Menupaypalprata" . '_' . vert . '.css'); } ?>" />
<style>
   .scTabText {
   }    <?php
        if(isset($_SESSION['scriptcase']['sc_def_menu']) && !empty($_SESSION['scriptcase']['sc_def_menu']))
        {
            foreach($_SESSION['scriptcase']['sc_def_menu'] as $arr_menus)
            {
              foreach($arr_menus as $id => $arr_item)
              {
                  if(isset($arr_item['icon_color']) && !empty($arr_item['icon_color']))
                  {
                      echo "   #" . $id . " .icon_fa{ color: ". $arr_item['icon_color'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . " i{ color:". $arr_item['icon_color'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_hover']) && !empty($arr_item['icon_color_hover']))
                  {
                      echo "   #" . $id . ":hover .icon_fa{ color: ". $arr_item['icon_color_hover'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ":hover i{ color:". $arr_item['icon_color_hover'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_disabled']) && !empty($arr_item['icon_color_disabled']))
                  {
                      echo "   #" . $id . ".scdisabledmain .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      echo "   #" . $id . ".scdisabledsub .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ".scTabInactive i{ color:". $arr_item['icon_color_disabled'] ."  !important}
";
                      }
                  }
              }
            }
        }
    ?>
</style>
<script type="text/javascript">
 var is_menu_vertical = false;
is_menu_vertical = true;
 function sc_session_redir(url_redir)
 {
     if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
     {
         window.parent.sc_session_redir(url_redir);
     }
     else
     {
         if (window.opener && typeof window.opener.sc_session_redir === 'function')
         {
             window.close();
             window.opener.sc_session_redir(url_redir);
         }
         else
         {
             window.location = url_redir;
         }
     }
 }
</script>
</head>
<body style="height: 100%" scroll="no" class='scMenuHPage'>
<?php

if ('' != $sOutputBuffer)
{
    echo $sOutputBuffer;
}

    $NM_scr_iframe = (isset($_POST['hid_scr_iframe'])) ? $_POST['hid_scr_iframe'] : "";   
}
else
{
    $menu_menuData['height'] = '30px';
}

/* Archivos JS */
?>
<script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
<script  type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/jquery.contextmenu.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_contextmenu.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_contextmenu.css'); } ?>" /> 
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_sweetalert.css" />
<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonText  = $this->Nm_lang['lang_btns_cfrm'];
$cancelButtonText   = $this->Nm_lang['lang_btns_cncl'];
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
    $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
    $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
    $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
    $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
    $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
    $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
    $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
    $cancelButtonFAPos = 'text_right';
}
?>
<script type="text/javascript">
  var scSweetAlertConfirmButton = "<?php echo $confirmButtonClass ?>";
  var scSweetAlertCancelButton = "<?php echo $cancelButtonClass ?>";
  var scSweetAlertConfirmButtonText = "<?php echo $confirmButtonText ?>";
  var scSweetAlertCancelButtonText = "<?php echo $cancelButtonText ?>";
  var scSweetAlertConfirmButtonFA = "<?php echo $confirmButtonFA ?>";
  var scSweetAlertCancelButtonFA = "<?php echo $cancelButtonFA ?>";
  var scSweetAlertConfirmButtonFAPos = "<?php echo $confirmButtonFAPos ?>";
  var scSweetAlertCancelButtonFAPos = "<?php echo $cancelButtonFAPos ?>";
</script>
<script type="text/javascript" src="menu_message.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
$(function() {
<?php
if (count($this->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
       }
   }
}
?>
});
</script>
<?php
$_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Nm_lang['lang_mnth_janu'],
                                  $this->Nm_lang['lang_mnth_febr'],
                                  $this->Nm_lang['lang_mnth_marc'],
                                  $this->Nm_lang['lang_mnth_apri'],
                                  $this->Nm_lang['lang_mnth_mayy'],
                                  $this->Nm_lang['lang_mnth_june'],
                                  $this->Nm_lang['lang_mnth_july'],
                                  $this->Nm_lang['lang_mnth_augu'],
                                  $this->Nm_lang['lang_mnth_sept'],
                                  $this->Nm_lang['lang_mnth_octo'],
                                  $this->Nm_lang['lang_mnth_nove'],
                                  $this->Nm_lang['lang_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Nm_lang['lang_shrt_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Nm_lang['lang_days_sund'],
                                  $this->Nm_lang['lang_days_mond'],
                                  $this->Nm_lang['lang_days_tued'],
                                  $this->Nm_lang['lang_days_wend'],
                                  $this->Nm_lang['lang_days_thud'],
                                  $this->Nm_lang['lang_days_frid'],
                                  $this->Nm_lang['lang_days_satd']);
$_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_days_sund'],
                                  $this->Nm_lang['lang_shrt_days_mond'],
                                  $this->Nm_lang['lang_shrt_days_tued'],
                                  $this->Nm_lang['lang_shrt_days_wend'],
                                  $this->Nm_lang['lang_shrt_days_thud'],
                                  $this->Nm_lang['lang_shrt_days_frid'],
                                  $this->Nm_lang['lang_shrt_days_satd']);
$Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
$Lim   = strlen($Str_date);
$Ult   = "";
$Arr_D = array();
for ($I = 0; $I < $Lim; $I++)
{
    $Char = substr($Str_date, $I, 1);
    if ($Char != $Ult)
    {
        $Arr_D[] = $Char;
    }
    $Ult = $Char;
}
$Prim = true;
$Str  = "";
foreach ($Arr_D as $Cada_d)
{
    $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
    $Str .= $Cada_d;
    $Prim = false;
}
$Str = str_replace("a", "Y", $Str);
$Str = str_replace("y", "Y", $Str);
$nm_data_fixa = date($Str); 
?>
<?php
$qtd_col = 2;
if(is_array($bg_line_degrade) && count($bg_line_degrade)>0)
{
    $qtd_col = $qtd_col + count($bg_line_degrade);
}
$larg_table = "100%";
$col_span   = ' colspan="'. $qtd_col .'"';
$strAlign = 'align=\'left\'';
?>
<?php
$str_bmenu = nmButtonOutput($this->arr_buttons, "bmenu", "showMenu();", "showMenu();", "bmenu", "", "" . $this->Nm_lang['lang_btns_menu'] . "", "position:absolute; top:0px; left:0px; z-index:9999;", "absmiddle", "", "0px", $this->path_botoes, "", "" . $this->Nm_lang['lang_btns_menu_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $menu_mobile_hide          = $mobile_menu_mobile_hide;
    $menu_mobile_inicial_state = $mobile_menu_mobile_inicial_state;
    $menu_mobile_hide_onclick  = $mobile_menu_mobile_hide_onclick;
    $menutree_mobile_float     = $mobile_menutree_mobile_float;
    $menu_mobile_hide_icon     = $mobile_menu_mobile_hide_icon;
    $menu_mobile_hide_icon_menu_position     = $mobile_menu_mobile_hide_icon_menu_position;
}
if($menu_mobile_hide == 'S')
{
    if($menu_mobile_inicial_state =='escondido')
    {
            $str_menu_display="hide";
            $str_btn_display="show";
    }
    else
    {
        $str_menu_display="show";
        $str_btn_display="hide";
    }
    if($menu_mobile_hide_icon != 'S')
    {
        $str_btn_display="show";
    }
?>
<script>
    $( document ).ready(function() {
        $('#bmenu').<?php echo $str_btn_display; ?>();
        $('#idMenuCell').<?php echo $str_menu_display; ?>();
        $('#id_toolbar').<?php echo $str_menu_display; ?>();
        if($('#bmenu').length)
        {
            if($('.scMenuHHeader').length)
            {
                  $(".scMenuHHeader").css("padding-left", $('#bmenu').outerWidth());
            }
            else if($('.scMenuToolbar').length)
            {
                  $(".scMenuToolbar").css("padding-left", $('#bmenu').outerWidth());
            }
        }
        <?php
                if($menutree_mobile_float == 'S')
                {
                ?>
                    str_html_menu    = $('#idMenuCell').html();
                    str_html_toolbar = '';
                    if($('#idMenuToolbar').length)
                    {
                      str_html_toolbar = $('#idMenuToolbar').html();
                    }
                    $('#idMenuCell').remove()
                    $('#id_toolbar').remove()
                    $( 'body' ).prepend( "<div id='idMenuCell' style='position:absolute; top:0px; left:0px;z-index:9999;display:<?php echo (($menu_mobile_inicial_state =='escondido')?'none':''); ?>'>"+ str_html_menu + "<div>" + str_html_toolbar +"</div></div>" );
                    <?php
                    if($menu_mobile_hide_icon != 'S')
                    {
                        if($menu_mobile_hide_icon_menu_position == 'right')
                        {
                        ?>
                          $('#idMenuCell').css('left', $('#bmenu').outerWidth());
                        <?php
                        }
                        else
                        {
                          ?>
                          $('#idMenuCell').css('top', $('#bmenu').outerHeight());
                          <?php
                        }
                    }
                }
                elseif($menu_mobile_hide_icon == 'S')
                {
                ?>
                  $("#idDivMenu").css("padding-left", $('#bmenu').outerWidth());
                <?php
                }
                ?>
    });
    function showMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').hide();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
    function HideMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').show();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
</script>
<?php
echo $str_bmenu;
}
?>
<script>
        $( document ).ready(function() {
            $.contextMenu({
                selector:'#contrl_abas > li',
                leftButton: true,
                callback: function(key, options)
                {
                        switch(key)
                        {
                            case 'close':
                                contextMenuCloseTab($(this).attr('id'));
                            break;

                            case 'closeall':
                                contextMenuCloseAllTabs();
                            break;

                            case 'closeothers':
                                contextMenuCloseOthersTabs($(this).attr('id'));
                            break;

                            case 'closeright':
                                contextMenuCloseRight($(this).attr('id'));
                            break;

                            case 'closeleft':
                                contextMenuCloseLeft($(this).attr('id'));
                            break;
                        }
                    },
                items: {
                        "close": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_close']); ?>'},
                        "closeall": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeall']); ?>'},
                        "closeothers" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeothers']); ?>'},
                        "closeright" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeright']); ?>'},
                        "closeleft" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeleft']); ?>'},
                    }
            });
        });

        function contextMenuCloseAllTabs()
        {
            $( "#contrl_abas li" ).each(function( index ) {
                contextMenuCloseTab($( this ).attr('id'));
            });
        }

        function contextMenuCloseTab(str_id)
        {
            if(str_id.indexOf('aba_td_') >= 0)
            {
                str_id = str_id.substr(7);
            }
            del_aba_td( str_id );
        }

        function contextMenuCloseRight(str_id)
        {
            bol_start_del = false;
            $( "#contrl_abas li" ).each(function( index ) {

                if(bol_start_del)
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }

                if(str_id == $( this ).attr('id'))
                {
                    bol_start_del = true;
                }
            });
        }


        function contextMenuCloseLeft(str_id)
        {
            $( "#contrl_abas li" ).each(function( index ) {

                if(str_id == $( this ).attr('id'))
                {
                     return false;
                }
                else
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }
            });
        }

        function contextMenuCloseOthersTabs(str_id)
        {
            $( "#contrl_abas li" ).each(function( index ) {
                if(str_id != $( this ).attr('id'))
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }
            });
        }

function expandMenu()
{
    $('#idMenuHeader').hide();
    $('#idMenuCell').hide();
    $('#id_toolbar').hide();
    $('#id_expand').hide();
    $('#id_collapse').show();
}

function collapseMenu()
{
    $('#idMenuHeader').show();
    $('#idMenuCell').show();
    $('#id_toolbar').show();
    $('#id_expand').show();
    $('#id_collapse').hide();
}
Iframe_atual = "menu_iframe";
function writeFastMenu(arr_link)
{
  return false;
}
function clearFastMenu(arr_link)
{
  return false;
}
Tab_iframes         = new Array();
Tab_labels          = new Array();
Tab_hints           = new Array();
Tab_icons           = new Array();
Tab_icons_inactive  = new Array();
Tab_abas            = new Array();
Tab_refresh         = new Array();
Tab_icon_fa         = new Array();
Tab_icon_fa_inactive= new Array();
Tab_display         = new Array();
Tab_display_position= new Array();
Tab_links          = new Array();
var scScrollInterval = divOverflow = false;
Tab_ico_def        = new Array();
Tab_ico_ina_def    = new Array();
<?php
 foreach ($arr_menuicons as $tp => $icon)
 {
    echo "Tab_ico_def['$tp']     = '" . $icon['active'] . "';\r\n";
    echo "Tab_ico_ina_def['$tp'] = '" . $icon['inactive'] . "';\r\n";
 }
?>
Aba_atual    = "";
<?php
 $seq = 0;
echo "Tab_iframes[" . $seq . "] = \"menu\";\r\n";
echo "Tab_labels['menu'] = \"Inicio\";\r\n";
echo "Tab_hints['menu'] = \"Inicio\";\r\n";
echo "Tab_abas['menu']   = \"none\";\r\n";
echo "Tab_refresh['menu']   = \"\";\r\n";
echo "Tab_icons['menu'] = \"scriptcase__NM__ico__NM__sc_menu_home_e.png\";\r\n";
echo "Tab_icons_inactive['menu'] = \"scriptcase__NM__ico__NM__sc_menu_home_d.png\";\r\n";
echo "Tab_icon_fa['menu']   = \"\";\r\n";
echo "Tab_icon_fa_inactive['menu']   = \"\";\r\n";
echo "Tab_display['menu']   = \"\";\r\n";
echo "Tab_display_position['menu']   = \"\";\r\n";
echo "Tab_links['menu']   = \"\";\r\n";
         $seq++;
 if(isset($menu_menuData['data']) && !empty($menu_menuData['data']))
 {
   foreach ($menu_menuData['data'] as $ind => $dados_menu)
   {
     if ($dados_menu['link'] != "#")
     {
         if(empty($dados_menu['hint']))
         {
             $dados_menu['hint'] = $dados_menu['label'];
         }
         echo "Tab_iframes[" . $seq . "] = \"" . $dados_menu['id'] . "\";\r\n";
         echo "Tab_labels['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['label']) . "\";\r\n";
         echo "Tab_hints['" . $dados_menu['id'] . "'] = \"" . strip_tags(str_replace('"', '\"', $dados_menu['hint'])) . "\";\r\n";
         echo "Tab_abas['" . $dados_menu['id'] . "']   = \"none\";\r\n";
         echo "Tab_refresh['" . $dados_menu['id'] . "']   = \"\";\r\n";
         echo "Tab_icons['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba'] . "\";\r\n";
         echo "Tab_icons_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba_inactive'] . "\";\r\n";
         echo "Tab_icon_fa['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_icon_fa_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_display['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display'] . "\";\r\n";
         echo "Tab_display_position['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display_position'] . "\";\r\n";
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
         $seq++;
     }
   }
 }
 if(isset($menu_menuData['data_vertical']) && !empty($menu_menuData['data_vertical']))
 {
   foreach ($menu_menuData['data_vertical'] as $ind => $dados_menu)
   {
     if ($dados_menu['link'] != "#")
     {
         if(empty($dados_menu['hint']))
         {
             $dados_menu['hint'] = $dados_menu['label'];
         }
         echo "Tab_iframes[" . $seq . "] = \"" . $dados_menu['id'] . "\";\r\n";
         echo "Tab_labels['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['label']) . "\";\r\n";
         echo "Tab_hints['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['hint']) . "\";\r\n";
         echo "Tab_abas['" . $dados_menu['id'] . "']   = \"none\";\r\n";
         echo "Tab_refresh['" . $dados_menu['id'] . "']   = \"\";\r\n";
         echo "Tab_icons['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba'] . "\";\r\n";
         echo "Tab_icons_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba_inactive'] . "\";\r\n";
         echo "Tab_icon_fa['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_icon_fa_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_display['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display'] . "\";\r\n";
         echo "Tab_display_position['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display_position'] . "\";\r\n";
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
         $seq++;
     }
   }
 }
?>
Qtd_apls = <?php echo $seq ?>;
function createIframe(str_id, str_label, str_hint, str_img_on, str_img_off, str_link, tp_apl)
{
    apl_exist = false;
    Tab_icons[str_id] = str_img_on;
    Tab_icons_inactive[str_id] = str_img_off;
    Tab_refresh[str_id] = "";
    if (tp_apl == null || tp_apl == '')
    {
        tp_apl = 'others';
    }
    if (Tab_icons[str_id] == '')
    {
        Tab_icons[str_id] = Tab_ico_def[tp_apl];
    }
    if (Tab_icons_inactive[str_id] == '')
    {
        Tab_icons_inactive[str_id] = Tab_ico_ina_def[tp_apl];
    }
    for (i = 0; i < Qtd_apls; i++)
    {
        if (Tab_iframes[i] == str_id) {
            apl_exist = true;
        }
    }
    if (apl_exist)
    {
        if (Tab_abas[str_id] != 'show') {
            createAba(str_id);
        }
        var iframe = document.getElementById('iframe_' + str_id);
        iframe.src = str_link;
        mudaIframe(str_id);
        return;
    }
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    iframe.id = 'iframe_' + str_id;
    iframe.name = 'menu_' + str_id + '_iframe';
    iframe.src = str_link;
    $('#Iframe_control').append(iframe);
    $('#iframe_' + str_id).addClass( 'scMenuIframe');
    Tab_iframes[Qtd_apls] = str_id;
    Tab_labels[str_id] = str_label;
    Tab_hints[str_id] = str_hint;
    Tab_abas[str_id]   = 'none';
    Tab_links[str_id]   = '';
    Qtd_apls++;
    createAba(str_id);
    mudaIframe(str_id);
}
function createAba(str_id)
{
    var tmp = "";
    var html_icon = "";
        html_icon = "<div style='display:inline-block;'>";
        str_icon = Tab_icons[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_e.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_active' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon'>";
        }
        str_icon = Tab_icons_inactive[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_d.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_inactive' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon' style='display:none;'>";
        }
        html_icon += "</div>";
    if(Tab_display[ str_id ] == 'text_fontawesomeicon' || Tab_display[ str_id ] == 'only_fontawesomeicon')
    {
        html_icon = "<i id='aba_td_" + str_id + "_icon_active' class='"+ Tab_icon_fa[str_id] +"' style='vertical-align:middle;padding: 0px 4px; display:none;'></i>";
        html_icon += "<i id='aba_td_" + str_id + "_icon_inactive' class='"+ Tab_icon_fa_inactive[str_id] +"' style='vertical-align:middle;padding: 0px 4px;'></i>";
    }
    tmp  = "<li onclick=\"mudaIframe('" + str_id + "');\" id='aba_td_" + str_id + "' style='cursor:pointer' class='lslide scTabActive' title=\"" + Tab_hints[str_id] + "\">";
    if(Tab_display_position[ str_id ] != 'img_right')
    {
        tmp += html_icon;
    }
    var home_style="";
    if(str_id === 'menu'){ home_style=";padding-left:4px;min-height:14px;"; }
    tmp += "<div id='aba_td_txt_" + str_id + "' style='display:inline-block;cursor:pointer"+home_style+"' class='scTabText' >";
    tmp += Tab_labels[str_id];
    if(Tab_display_position[ str_id ] == 'img_right')
    {
        tmp += html_icon;
    }
    tmp += "</div>";
    tmp += "<div id='aba_td_3_" + str_id + "' style='display:none;'>...</div>";
if(str_id !== 'menu'){
    tmp += "<div style='display:inline-block;'>";
    tmp += "    <img id='aba_td_img_" + str_id + "' src='<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' onclick=\"event.stopPropagation(); del_aba_td('" + str_id + "'); \" align='absmiddle' class='scTabCloseIcon' style='cursor:pointer; z-index:9999;'>";
    tmp += "</div>";
}
    tmp += "</li>";
    $('#contrl_abas').append(tmp);
    Tab_abas[str_id] = 'show';
}
function mudaIframe(str_id)
{
    $('#iframe_menu').hide();
    if (str_id == "")
    {
        $('#iframe_menu').show();
        $('#iframe_' + Aba_atual).prop('src', '');
        $('#links_abas').hide();
        $('#id_links_abas').hide();
    }
    else
    {
        $('#aba_td_' + Aba_atual).removeClass( 'scTabActive' );
        $('#aba_td_' + Aba_atual).addClass( 'scTabInactive' );
        $('#aba_td_' + Aba_atual+'_icon_active').hide();
        $('#aba_td_' + Aba_atual+'_icon_inactive').show();
        $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_inactive_close_icon; ?>' );
    }
    for (i = 0; i < Tab_iframes.length; i++) 
    {
        if (Tab_iframes[i] == str_id) 
        {
            if($('#iframe_' + Tab_iframes[i]).length < 1)
            {
                $('#Iframe_control').append('<iframe id="iframe_'+ Tab_iframes[i] +'" name="menu_'+ Tab_iframes[i] +'_iframe" frameborder="0" class="scMenuIframe" style="display: none; width: 100%; height: 100%;" src=""></iframe>');
            }
            $('#iframe_' + Tab_iframes[i]).show();
            Aba_atual    = str_id;
            $('#aba_td_' + Aba_atual).removeClass( 'scTabInactive' );
            $('#aba_td_' + Aba_atual).addClass( 'scTabActive' );
            $('#aba_td_' + Aba_atual+'_icon_active').show();
            $('#aba_td_' + Aba_atual+'_icon_inactive').hide();
            $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' );
            if (Tab_iframes[i] != 'menu') 
            {
                Iframe_atual = "menu_" + Tab_iframes[i] + '_iframe';
            }
            $('#iframe_' + Tab_iframes[i]).contents().find('body').css('width', '');
            $('#iframe_' + Tab_iframes[i])[0].contentWindow.focus();
        } else {
            $('#iframe_' + Tab_iframes[i]).hide();
        }
    }
    if (Tab_refresh[str_id] == 'S' && typeof document.getElementById('iframe_' + str_id).contentWindow.nm_move === 'function')
    {
        Tab_refresh[str_id] = '';
        document.getElementById('iframe_' + str_id).contentWindow.nm_move('igual');
    }
}
function del_aba_td(str_id)
{
    if(str_id === 'menu') { return false; }
    $('#aba_td_' + str_id).remove();
    Tab_abas[str_id] = 'none';
    $('#iframe_' + str_id).prop('src', '');
    if (Aba_atual == str_id)
    {
        str_id = "";
        for (i = 0; i < Tab_iframes.length; i++) 
        {
            if (Tab_abas[Tab_iframes[i]] == 'show' && Tab_refresh[Tab_iframes[i]] == 'S')
            {
                str_id = Tab_iframes[i];
            }
        }
        if (str_id == "")
        {
            for (i = 0; i < Tab_iframes.length; i++) 
            {
                if (Tab_abas[Tab_iframes[i]] == 'show')
                {
                    str_id = Tab_iframes[i];
                }
            }
        }
        if (str_id == "" && Aba_atual != "menu")
        {
            document.getElementById('iframe_menu').click();
        }
        else
        {
            mudaIframe(str_id);
        }
    }
  scToggleOverflow();
}
$( document ).ready(function() { scToggleOverflow() });
function scToggleOverflow() {
  var width_offset = 0;
  if (is_menu_vertical === true) { width_offset = 2; } 
  if(width_offset == 0 && $('.scMenuTTable').length)
  {
      if($('.scMenuTTable').length > 2)
      {
          width_offset = $('.scMenuTTable').eq(1).parent()[0].offsetWidth + 2;
      }
      else
      {
          width_offset = $('.scMenuTTable').parent()[0].offsetWidth + 2;
      }
  }
  if( ($( window ).width() - width_offset) < 1)
  {
      width_offset = 0;
  }
  var hasOverflow, scrollElement;
  scrollElement = $('#div_contrl_abas')[0];
  if (scrollElement.offsetHeight < scrollElement.scrollHeight || scrollElement.offsetWidth < scrollElement.scrollWidth) {
      hasOverflow = true;
  } else {
      hasOverflow = false;
  }
  if (divOverflow === hasOverflow){ return false; }
  if (hasOverflow === true) {
      $('.scTabScroll').show();
      $('#div_contrl_abas').toggleClass('div-overflow');
  } else {
      $('.scTabScroll').hide();
      $('#div_contrl_abas').toggleClass('div-overflow');
  }
  divOverflow = hasOverflow;
}
function scTabScroll(axis) {
  if (axis == 'stop') {
      clearInterval(scScrollInterval);
      return;
  }
  if (axis == 'left') {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() - 3)", 2);
  } else {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() + 3)", 2);
  }
}
        function checkSubMenuPosition(str_id)
        {
            submenu = $('#' + str_id + '.menu__link').next('ul');
            if(submenu.length)
            {
                if(submenu.offset().left + submenu.outerWidth() > $('#main_menu_table').width())
                {
                    submenu.css('margin-left', ( $('#main_menu_table').width() - submenu.offset().left - submenu.outerWidth() - 10 ));
                }
           }
        }function openMenuItem(str_id)
{
  str_target_sv = "";
  if (str_id != "iframe_menu")
  {
      str_target_sv = str_id + "_iframe";
      str_id        = str_id.replace("menu_","");
  }
    if($('#Iframe_control').length && $('#' + str_id).parent().length < 0)
    {
        $('#Iframe_control').append('<iframe id="iframe_btn_1" name="menu_btn_1_iframe" frameborder="0" class="scMenuIframe" style="display: none;" src=""></iframe>');
    }
  if($('#' + str_id).parent().length)
  {
      if(!$('#' + str_id).parent().hasClass('menu__item--active'))
      {
        $('#' + str_id).closest('ul').find('li').removeClass('menu__item--active');
      }
       $('#' + str_id).parent().toggleClass('menu__item--active');
  }
  str_link   = $('#' + str_id).attr('item-href');
  str_target = $('#' + str_id).attr('item-target');
  if (typeof str_link !== typeof undefined && str_link !== false) {
    str_id = str_id.replace('iframe_menu', 'menu');
    if (str_target == "menu_iframe" && str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        str_target = (str_target_sv != "") ? str_target_sv : str_target;
        mudaIframe(str_id);
        $('#links_abas').css('display','');
        $('#id_links_abas').css('display','');
        if (Tab_abas[str_id] != 'show')
        {
            createAba(str_id);
      scToggleOverflow();
        }
    }
    //test link type
    if (str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        if (str_link.substring(0, 11) == 'javascript:')
        {
            eval(str_link.substring(11));
        }
        else if (str_link != '#' && str_target != '_parent')
        {
            window.open(str_link, str_target);
        }
        else if (str_link != '#' && str_target == '_parent')
        {
            document.location = str_link;
        }
        <?php
        if ($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick == 'S')
        {
        ?>
            HideMenu();
        <?php
        }
        ?>
    }
    if(str_target != '_blank' && $('#iframe_menu').length)
        $('#iframe_menu')[0].contentWindow.focus();
  }
}
</script>
<?php
$fixMainMenuPosition = ($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])) ? '' : '; position: absolute';
?>
<table id="main_menu_table" <?php echo $strAlign; ?> style="border-collapse: collapse; border-width: 0px; height:100%; width: <?php echo $larg_table; ?><?php echo $fixMainMenuPosition; ?>" cellpadding=0 cellspacing=0>
  <tr id='idMenuHeader'>
    <td style="padding: 0px" valign="top" <?php echo $col_span; ?>>
<style>
#lin1_col1 { font-size:22px; width:500px; color: #FFFFFF; }
#lin1_col2 { font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:right; color: #FFFFFF;  }
#lin2_col1 { font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:15px; }
#lin2_col2 { font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:right; color: #FFFFFF;  }

</style>

<table width="100%" height="67px" class="scMenuHHeader">
        <tr>
                <td width="5px"></td>
        <td width="67px" class="scMenuHHeaderFont">   <IMG SRC="<?php echo $path_imag_cab ?>/usr__NM__img__NM__Facil web icono2 24x24.png" BORDER="0"/></td>
               <td class="scMenuHHeaderFont"><span id="lin1_col1"><?php echo "Facturación y manejo de Inventarios - " . $_SESSION['empresa'] . "" ?></span><br /><span id="lin2_col1"><?php echo "Usuario: " . $_SESSION['gnombreusuario'] . "" ?></span></td>
               <td align="right" class="scMenuHHeaderFont"><span  id="lin1_col2"><?php echo "" ?></span><br /><span id="lin2_col2"><?php echo "<span id='idnotificaciones'></span>¡Cristo te ama!" ?></span></td>
        <td width="5px"></td>
    </tr>
</table>
    </td>
  </tr>
<?php echo $this->nm_show_toolbarmenu($col_span, $saida_apl, $menu_menuData, $path_imag_cab); ?>  <tr class="scMenuHTableCss" id='idMenuLine'>
      <td <?php echo $strAlign; ?> valign="top" class="scMenuLine" style="vertical-align:top;" id='idMenuCell'>
<div id="scScrollFix" style="height: 1px"></div>
<script type="text/javascript">
function fnScrollFix() {
 if($('#css3menu1 li').length > 0)
 {
     var txt = document.getElementById("scScrollFix").innerHTML;
     if ("&nbsp;" == txt) { txt = "&nbsp;&nbsp;"; } else { txt = "&nbsp;"; }
     document.getElementById("scScrollFix").innerHTML = txt;
 }
 setTimeout("fnScrollFix()", 1000);
}
setTimeout("fnScrollFix()", 1000);
</script>
<div id="idDivMenu">
<table style='<?php $menutree_mobile_float == 'S'?'':'width:100%'; ?>'><tr><?php
echo $this->menu_escreveMenu($menu_menuData['data'], $path_imag_cab, $strAlign);
?></tr></table>
</div>
<?php
/* Control de iframe */
if ($menu_menuData['iframe'])
{
?>
    </td>
<?php echo $this->nm_gera_degrade(2, $bg_line_degrade, $path_imag_cab); ?>    <td style="border-width: 1px; width: 100%; height: 100%; padding: 0px">
      <table cellspacing=0 cellpadding=0 width='100%' height='100%'>
        <tr>
        <td id="links_abas" style="display: none;">
          <div id="id_links_abas" style="display: none;" class='scTabLine'>
            <div class='scTabScroll left' style='float:left;display:none;' onmousedown='scTabScroll("left");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div class='scTabScroll right' style='float:right;display:none;'onmousedown='scTabScroll("right");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div id='div_contrl_abas' class='scTabCtrl' style='overflow:hidden;white-space: nowrap;'>
              <ul id='contrl_abas' style='margin:0px; padding:0px;'></ul>
            </div>
          </div>
        </td>
        </tr><tr>
        <td width='100%' height='100%' style='vertical-align:top;text-align:center;'>
    <div id="Iframe_control" style='width:100%; height:100%; margin:0px; padding:0px;'>
<?php
$link_default = "";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['control_menu']) && $_SESSION['scriptcase']['sc_apl_seg']['control_menu'] == "on") 
{ 
    $SCR  = "";
    $link_default = " onclick=\"openMenuItem('iframe_menu');\" item-href=\"menu_form_php.php?sc_item_menu=menu&sc_apl_menu=control_menu&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . "\"  item-target=\"menu_iframe\"";
} 
else
{ 
    $SCR  = ($NM_scr_iframe != "" ? $NM_scr_iframe : "menu_pag_ini.php");
} 
?>
      <iframe id="iframe_menu" name="menu_iframe" frameborder="0" class="scMenuIframe" style="width: 100%; height: 100%;"  src="<?php echo $SCR; ?>" <?php echo $link_default ?>></iframe>
<?php
}
?></div></td>
  </tr>
</table>
</td>
</tr>
  <tr>
    <td style="padding: 0px" <?php echo $col_span ?>>
<style>
#rod_col1 { margin:0px; padding: 3px 0px 0px 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0px 0px; float:right; overflow:hidden; text-align:right;}

</style>

<div style="width: 100%; height:20px;" class="scMenuHFooter">
        <span class="scMenuHFooterFont" id="rod_col1"><?php echo "Facilweb:  easeing@outlook.com - Dic 2017 (c)" ?></span>
        <span class="scMenuHFooterFont" id="rod_col2"><?php echo "Cristo murió por tí, ¿que harás por él?" ?></span>
</div>    </td>
  </tr>
</table>
</body>
</html>
<?php

if (isset($link_default) && !empty($link_default))
{
    echo "<script>";
    echo "   document.getElementById('iframe_menu').click()";
    echo "</script>";
}

}

/* Control de Target */
function menu_escreveMenu($arr_menu, $path_imag_cab = '', $strAlign = '')
{
    global $nm_data_fixa;
    $last      = '';
    $itemClass = ' topfirst';
    $subSize   = 2;
    $subCount  = array();
    $tabSpace  = 1;
    $intMult   = 2;
    $aMenuItemList = array();
    foreach ($arr_menu as $ind => $resto)
    {
        $aMenuItemList[] = $resto;
    }
?>
<td <?php echo $strAlign; ?>>
  <div class='mainmenu menu--horizontal'>
      <div class='menu__toggle'>
          <span></span>
          <span></span>
          <span></span>
      </div>
      <div class='menu__container'>
        <ul id="css3menu1" class="topmenu menu__list" style="width:100%;">
        <?php
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if (0 == $aMenuItemList[$i]['level']) {
                    $last = $aMenuItemList[$i]['id'];
                }
            }
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if ($last == $aMenuItemList[$i]['id']) {
                    $itemClass = ' toplast';
                }
                $htmlClass = '';
                $hasChildrens = false;
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
                    $hasChildrens = true;
                }
                if (0 == $aMenuItemList[$i]['level']) {
                    $htmlClass = 'topmenu' . $itemClass;
                    if ($hasChildrens) {
                        $htmlClass .= ' toproot';
                    }
                }
                else
                {
                    $htmlClass .= ' menu__item--withsubmenu';
                }
                ?>
                <li class='menu__item <?php echo $htmlClass; ?>'>
                <?php
                if ('' != $aMenuItemList[$i]['icon'] && file_exists($this->path_imag_apl . "/" . $aMenuItemList[$i]['icon'])) {
                    $iconHtml = '../_lib/img/' . $aMenuItemList[$i]['icon'];
                }
                else {
                    $iconHtml = '';
                }
                $sDisabledClass = '';
                if ('Y' == $aMenuItemList[$i]['disabled']) {
                    $aMenuItemList[$i]['link']   = '#';
                    $aMenuItemList[$i]['target'] = '';
                    $sDisabledClass               = 0 == $aMenuItemList[$i]['level'] ? ' scdisabledmain' : ' scdisabledsub';
                }
                if (empty($aMenuItemList[$i]['link'])) {
                    $aMenuItemList[$i]['link']   = '#';
                }
                $str_item = "<i class='menu__icon fas'></i>";
                if ($hasChildrens) {
                    $str_item .= "<span>";
                }
                if($aMenuItemList[$i]['display'] == 'only_img' && $iconHtml != '')
                {
                    $str_item .= '<img src=' . $iconHtml . ' border="0" />';
                }
                elseif($aMenuItemList[$i]['display'] == 'text_img' || empty($aMenuItemList[$i]['display']))
                {
                    $str_image = '';
                    $str_image_right = '';
                    if($iconHtml != '')
                    {
                        $str_image = '<img src="' . $iconHtml . '" border="0" />';
                        $str_image_right = '<img src="' . $iconHtml . '" border="0" style="margin-left: 10px; margin-right: 0px;" />';
                    }
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= $str_image . $aMenuItemList[$i]['label'];
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] . $str_image_right;
                    }
                }
                elseif($aMenuItemList[$i]['display'] == 'only_fontawesomeicon')
                {
                    $str_item .= "<i class='icon_fa menu__icon ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                }
                elseif($aMenuItemList[$i]['display'] == 'text_fontawesomeicon')
                {
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= "<i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i> ". $aMenuItemList[$i]['label'] ."";
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] ." <i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                    }
                }
                else
                {
                    $str_item .= $aMenuItemList[$i]['label'];
                }
                if ($hasChildrens) {
                    $str_item .= "</span>";
                }
                ?>
                    <a href="javascript:" <?php if ($hasChildrens){ ?>onmouseover="checkSubMenuPosition('<?php echo $aMenuItemList[$i]['id']; ?>');" <?php } ?> onclick="openMenuItem('menu_<?php echo $aMenuItemList[$i]['id']; ?>');" item-href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>" <?php echo $aMenuItemList[$i]['target']; ?> class='menu__link <?php echo $sDisabledClass; ?>'><?php echo $str_item; ?></a>
                <?php
                if ($hasChildrens) {
                ?>
                    <ul class='menu__submenu' style=''>
                    <?php
                }
                else {
                ?>
                <?php
                }
                if (($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) || 
                    ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == 0)) {
                    ?>
                    <?php echo str_repeat(' ', $tabSpace * $intMult); ?></li>
                    <?php
                    if (0 != $subSize && 0 < $aMenuItemList[$i]['level']) {
                        if (!isset($subCount[ $aMenuItemList[$i]['level'] ])) {
                            $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                        }
                        $subCount[ $aMenuItemList[$i]['level'] ]++;
                    }
                    if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    if ($subSize == $subCount[ $aMenuItemList[$i]['level'] ]) {
                        $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                    }
                }
                $itemClass = '';
            }
        ?>
        </ul>
      </div>
  </div>
</td>
<?php
}
function menu_target($str_target)
{
    global $menu_menuData;
    if ('_blank' == $str_target)
    {
        return '_blank';
    }
    elseif ('_parent' == $str_target)
    {
        return '_parent';
    }
    elseif ($menu_menuData['iframe'])
    {
        return 'menu_iframe';
    }
    else
    {
        return $str_target;
    }
}

function nm_show_toolbarmenu($col_span, $saida_apl, $menu_menuData, $path_imag_cab)
{
}

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $menu_menuData; 
       foreach ($arr_menu_usu as $arr_item)
       {
           $str_line   = array();
           $str_line['label']    = $this->nm_prot_aspas($arr_item['label']);
           $str_line['level']    = $int_level - 1;
           $str_line['link']     = "";
           $nome_apl = $arr_item['link'];
           $pos = strrpos($nome_apl, "/");
           if ($pos !== false)
           {
               $nome_apl = substr($nome_apl, $pos + 1);
           }
           if ('' != $arr_item['link'])
           {
               if ($arr_item['target'] == '_parent')
               {
                    $str_line['link'] = "menu_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""; 
               }
               else
               {
                    $str_line['link'] = "menu_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""; 
               }
           }
           elseif ($arr_item['target'] == '_parent')
           {
           }
           $str_line['hint']     = ('' != $arr_item['hint']) ? $this->nm_prot_aspas($arr_item['hint']) : '';
           $str_line['id']       = $arr_item['id'];
           $str_line['icon']     = ('' != $arr_item['icon_on']) ? $arr_item['icon_on'] : '';
           $str_line['icon_aba'] = (isset($arr_item['icon_aba']) && '' != $arr_item['icon_aba']) ? $arr_item['icon_aba'] : '';
           $str_line['icon_aba_inactive'] = (isset($arr_item['icon_aba_inactive']) && '' != $arr_item['icon_aba_inactive']) ? $arr_item['icon_aba_inactive'] : '';
           $str_line['display'] = (isset($arr_item['display'])) ? $arr_item['display'] : 'text_img';
           $str_line['display_position'] = (isset($arr_item['display_position'])) ? $arr_item['display_position'] : 'text_right';
           $str_line['icon_fa'] = (isset($arr_item['icon_fa'])) ? $arr_item['icon_fa'] : '';
           $str_line['icon_color'] = (isset($arr_item['icon_color'])) ? $arr_item['icon_color'] : '';
           $str_line['icon_color_hover'] = (isset($arr_item['icon_color_hover'])) ? $arr_item['icon_color_hover'] : '';
           $str_line['icon_color_disabled'] = (isset($arr_item['icon_color_disabled'])) ? $arr_item['icon_color_disabled'] : '';
           if ('' == $arr_item['link'] && $arr_item['target'] == '_parent')
           {
               $str_line['target'] = '_parent';
           }
           else
           {
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->menu_target( $arr_item['target']) : "_self"; 
           }
           $str_line['target']   = ' item-target="' . $str_line['target']  . '" ';
           $str_line['sc_id']    = $arr_item['id'];
           $str_line['disabled'] = "N";
           $str_line_ret[] = $str_line;
           if (!empty($arr_item['menu_itens']))
           {
               $this->nm_gera_menus($str_line_ret, $arr_item['menu_itens'], $int_level + 1, $nome_aplicacao);
           }
       }
   }

   function nm_arr_menu_recursiv($arr, $id_pai = '')
   {
         $arr_return = array();
         foreach ($arr as $id_menu => $arr_menu)
         {
             if ($id_pai == $arr_menu['pai']) 
             {
                 $arr_return[] = array('label'      => $arr_menu['label'],
                                        'link'       => $arr_menu['link'],
                                        'target'     => $arr_menu['target'],
                                        'icon_on'    => $arr_menu['icon'],
                                        'icon_aba'   => $arr_menu['icon_aba'],
                                        'icon_aba_inactive'   => $arr_menu['icon_aba_inactive'],
                                        'hint'       => $arr_menu['hint'],
                                        'id'         => $id_menu,
                                        'menu_itens' => $this->nm_arr_menu_recursiv($arr, $id_menu),
                                        'display'      => $arr_menu['display'],
                                        'display_position' => $arr_menu['display_position'],
                                        'icon_fa'      => $arr_menu['icon_fa'],
                                        'icon_color'      => $arr_menu['icon_color'],
                                        'icon_color_hover'      => $arr_menu['icon_color_hover'],
                                        'icon_color_disabled'      => $arr_menu['icon_color_disabled'],
                                        );
             }
         }
         return $arr_return;
   }
   //1 horizontal
   //2 vertical
   function nm_gera_degrade($menu_opc, $bg_line_degrade, $path_imag_cab)
   {
       $str_retorno = "";
       //have bg color degrade
       if(!empty($bg_line_degrade) && count($bg_line_degrade)>0)
       {
           if($menu_opc == 1)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<tr style=\"height:1px; padding: 0px;\">\r\n";
                       $str_retorno .= "  <td style=\"height:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\"><img src='". $path_imag_cab ."/transparent.png' border=\"0\" style=\"height:1px;\"></td>\r\n";
                       $str_retorno .= "</tr>\r\n";
                   }
               }
           }
           elseif($menu_opc == 2)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<td style=\"width:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\">\r\n";
                       $str_retorno .= "<img src='" . $path_imag_cab . "/transparent.png' border=\"0\" style=\"width:1px;\">\r\n";
                       $str_retorno .= "</td>\r\n";
                   }
               }
           }
       }
       return $str_retorno;
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['menu']['sc_init'][$apl_menu] = rand(2, 10000);
        $_SESSION['sc_session'][$_SESSION['scriptcase']['menu']['sc_init'][$apl_menu]] = array();
        return  $_SESSION['scriptcase']['menu']['sc_init'][$apl_menu];
   }
function fPermisos()
{
$_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
if (!isset($_SESSION['gaplicaciones_menu'])) {$_SESSION['gaplicaciones_menu'] = "";}
if (!isset($this->sc_temp_gaplicaciones_menu)) {$this->sc_temp_gaplicaciones_menu = (isset($_SESSION['gaplicaciones_menu'])) ? $_SESSION['gaplicaciones_menu'] : "";}
if (!isset($_SESSION['gPermisosUsuario'])) {$_SESSION['gPermisosUsuario'] = "";}
if (!isset($this->sc_temp_gPermisosUsuario)) {$this->sc_temp_gPermisosUsuario = (isset($_SESSION['gPermisosUsuario'])) ? $_SESSION['gPermisosUsuario'] : "";}
  
	if(!empty($this->sc_temp_gPermisosUsuario))
	{
		
		if(isset($this->sc_temp_gaplicaciones_menu[0][0]))
		{
			$limite = count($this->sc_temp_gaplicaciones_menu);
			for($i=0;$i<$limite;$i++)
			{	
				$vanaliza = true;
				$vobjeto  = $this->sc_temp_gaplicaciones_menu[$i][0];
				foreach($this->sc_temp_gPermisosUsuario as $id => $valor)
				{
					if($valor[2]==$vobjeto)
					{
						$vanaliza = false;
					}
				}
				
				if($vanaliza)
				{
					$NM_tmp_dis = $vobjeto;
if (!is_array($NM_tmp_dis))
{
    $NM_tmp_dis = explode(",", $NM_tmp_dis);
}
foreach ($NM_tmp_dis as $Cada_dis)
{
    if (!isset($_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'] = array();
    }
    if (!in_array($Cada_dis, $_SESSION['scriptcase']['sc_menu_disable']['menu']))
    {
        $_SESSION['scriptcase']['sc_menu_disable']['menu'][] = trim($Cada_dis);
    }
}

				}
			}
		}
	}
if (isset($this->sc_temp_gPermisosUsuario)) {$_SESSION['gPermisosUsuario'] = $this->sc_temp_gPermisosUsuario;}
if (isset($this->sc_temp_gaplicaciones_menu)) {$_SESSION['gaplicaciones_menu'] = $this->sc_temp_gaplicaciones_menu;}
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
}
   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0)
   {
      global  $menu_menuData;
      if (is_array($nm_apl_parms))
      {
          $tmp_parms = "";
          foreach ($nm_apl_parms as $par => $val)
          {
              $par = trim($par);
              $val = trim($val);
              $tmp_parms .= str_replace(".", "_", $par) . "?#?";
              if (substr($val, 0, 1) == "$")
              {
                  $tmp_parms .= $$val;
              }
              elseif (substr($val, 0, 1) == "{")
              {
                  $val        = substr($val, 1, -1);
                  $tmp_parms .= $this->$val;
              }
              elseif (substr($val, 0, 1) == "[")
              {
                  $tmp_parms .= $_SESSION['sc_session'][1]['menu'][substr($val, 1, -1)];
              }
              else
              {
                  $tmp_parms .= $val;
              }
              $tmp_parms .= "?@?";
          }
          $nm_apl_parms = $tmp_parms;
      }
      $nm_apl_retorno = $_SERVER['PHP_SELF'];
      $nm_apl_retorno = str_replace("\\", '/', $nm_apl_retorno);
      $nm_apl_retorno = str_replace('//', '/', $nm_apl_retorno);
      $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../" || strtolower(substr($nm_apl_dest, 0, 1)) == "/")
      {
          echo "<SCRIPT type=\"text/javascript\">";
          if (strtolower($nm_target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
          }
          echo "</SCRIPT>";
          exit;
      }
      $dir = explode("/", $nm_apl_dest);
      if (count($dir) == 1)
      {
          $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
          $nm_apl_dest = $menu_menuData['url']['link'] . $this->tab_grupo[0] .$nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <HTML>
      <HEAD>
       <META http-equiv="Content-Type" content="text/html; charset=UTF-8" />
       <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
       <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
       <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
       <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
       <META http-equiv="Pragma" content="no-cache"/>
      </HEAD>
      <BODY>
      <form name="Fredir" method="post" 
                            target="_self"> 
        <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($nm_apl_parms) ?>"/>
<?php
   if ($nm_target == "_blank")
   {
?>
         <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
        <input type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($nm_apl_retorno) ?>">
        <input type="hidden" name="script_case_init" value="1"/> 
<?php
   }
?>
      </form> 
      <SCRIPT type="text/javascript">
          window.onload = function(){
             submit_Fredir();
          };
          function submit_Fredir()
          {
              document.Fredir.target = "<?php echo $nm_target_form ?>"; 
              document.Fredir.action = "<?php echo $nm_apl_dest ?>";
              document.Fredir.submit();
          }
      </SCRIPT>
      </BODY>
      </HTML>
<?php
     if ($nm_target != "_blank")
     {
         exit;
     }
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }

}
if (isset($_POST['nmgp_start'])) {$nmgp_start = $_POST['nmgp_start'];} 
if (isset($_GET['nmgp_start']))  {$nmgp_start = $_GET['nmgp_start'];} 
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start) ))
{
    $Sem_Session = false;
}
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual)) {
    $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys  = str_replace("\\", '/', $str_path_sys);
}
else {
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_web    = $_SERVER['PHP_SELF'];
$str_path_web    = str_replace("\\", '/', $str_path_web);
$str_path_web    = str_replace('//', '/', $str_path_web);
$path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
$root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
    if (isset($_COOKIE['sc_apl_default_FACILWEBv2'])) {
        $apl_def = explode(",", $_COOKIE['sc_apl_default_FACILWEBv2']);
    }
    elseif (is_file($root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "menu") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['menu']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['menu']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['menu']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_FACILWEBv2'])) {
            $_SESSION['scriptcase']['menu']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_FACILWEBv2'];
        }
    }
}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang")
    {
        $nmgp_opcao  = $_POST['nmgp_opcao'];
        $nmgp_idioma = $_POST['nmgp_idioma'];
    }
    else
    {
        $nmgp_opcao  = $_GET['nmgp_opcao'];
        $nmgp_idioma = $_GET['nmgp_idioma'];
    }
    $Temp_lang = explode(";" , $nmgp_idioma);
    if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))
    {
        $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
    }
    if (isset($Temp_lang[1]) && !empty($Temp_lang[1]))
    {
        $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
    }
}
$contr_menu = new menu_class;
$contr_menu->menu_menu();

?>
