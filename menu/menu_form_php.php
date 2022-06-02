<?php
include_once('menu_session.php');
session_start();
   $_SESSION['scriptcase']['menu']['glo_nm_path_prod']      = "";
   $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] = "";
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
class menu_form_php
{
      var $nm_db_conn_facilweb;
      var $nm_con_conn_facilweb = array();
      var $sc_script_name;
      var $nm_location;
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include

   function init()
   {
      $Campos_Mens_erro = "";
      $_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
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
      if(!isset($_SESSION['scriptcase']['menu']['glo_nm_path_prod']) || empty($_SESSION['scriptcase']['menu']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      $str_path_web  = $_SERVER['PHP_SELF'];
      $str_path_web  = str_replace("\\", '/', $str_path_web);
      $str_path_web  = str_replace('//', '/', $str_path_web);
      $str_root      = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $path_link     = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $path_link     = substr($path_link, 0, strrpos($path_link, '/')) . '/';
      $this->nm_location  = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $this->nm_location  = substr($_SERVER['PHP_SELF'], 0, $this->nm_location + 1) ;  
      $this->nm_location .= "index.php"; 
      $this->menu_sc_init = 1;
      $path_imag_cab = $path_link . "_lib/img";
      $path_imag_apl = $str_root . $path_link . "_lib/img";
      $path_libs     = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/lib/php";
      $path_third    = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/third";
      $path_adodb    = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'];
      $this->path_css = $str_root . $path_link . "_lib/css/";
      $path_lib_php   = $str_root . $path_link . "_lib/lib/php";
      $this->str_lang      = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
      $this->str_conf_reg  = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "es_co";
      if (isset($_SESSION['scriptcase']['menu']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['menu']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['menu']['actual_lang']) || $_SESSION['scriptcase']['menu']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['menu']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_FACILWEBv2',$this->str_lang,'0','/');
      }
      $this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_BlueBerry/Sc9_BlueBerry";
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
      if (!function_exists("NM_is_utf8"))
      {
          include_once("../_lib/lib/php/nm_utf8.php");
      }
      if (!function_exists("SC_dir_app_ini"))
      {
          include_once("../_lib/lib/php/nm_ctrl_app_name.php");
      }
      SC_dir_app_ini('FACILWEBv2');
      if (!defined("SC_ERROR_HANDLER"))
      {
          define("SC_ERROR_HANDLER", 1);
          include_once(dirname(__FILE__) . "/menu_erro.php");
      }
      if (isset($_GET['sc_apl_menu']))
      {
          $_SESSION['scriptcase']['sc_usa_grupo']     = $_GET['sc_usa_grupo'];
          $_SESSION['scriptcase']['sc_item_menu']     = $_GET['sc_item_menu'];
          $_SESSION['scriptcase']['sc_apl_menu']      = $_GET['sc_apl_menu'];
          $_SESSION['scriptcase']['sc_apl_menu_link'] = $_SESSION['scriptcase']['menu']['sc_apl_link'];
          $_SESSION['scriptcase']['sc_ult_apl_menu']  = array();
      }
      $this->sc_menu_item   = $_SESSION['scriptcase']['sc_item_menu'];
      $this->sc_script_name = $_SESSION['scriptcase']['sc_apl_menu'];
      include("../_lib/lang/". $this->str_lang .".lang.php");
      include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
      include("../_lib/lang/config_region.php");
      include("../_lib/lang/lang_config_region.php");
      $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("es");
      asort($this->Nm_lang_conf_region);
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
      $this->regionalDefault();
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
      if (is_file($path_lib_php . "/nm_functions.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_api.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_data.class.php"))  
      {
          $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
          $this->nm_data = new nm_data("es");
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
    $this->nm_con_conn_facilweb['database_encoding']  = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
    db_conect_devel($_SESSION['scriptcase']['menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'], 'FACILWEBv2', 2); 
}
if (isset($_SESSION['scriptcase']['menu']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['menu']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['menu']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['menu']['glo_con_conn_facilweb'], $path_libs, "");
    $this->nm_con_conn_facilweb['servidor']    = $_SESSION['scriptcase']['glo_servidor'];
    $this->nm_con_conn_facilweb['usuario']     = $_SESSION['scriptcase']['glo_usuario'];
    $this->nm_con_conn_facilweb['banco']       = $_SESSION['scriptcase']['glo_banco'];
    $this->nm_con_conn_facilweb['senha']       = $_SESSION['scriptcase']['glo_senha'];
    $this->nm_con_conn_facilweb['tpbanco']     = $_SESSION['scriptcase']['glo_tpbanco'];
    $this->nm_con_conn_facilweb['decimal']     = $_SESSION['scriptcase']['glo_decimal_db'];
    $this->nm_con_conn_facilweb['SC_sep_date'] = $_SESSION['scriptcase']['glo_date_separator'];
    $this->nm_con_conn_facilweb['protect']     = $_SESSION['scriptcase']['glo_senha_protect'];
    $this->nm_con_conn_facilweb['database_encoding'] = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "");
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
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQNmH9BiD1veHQJeDMBOVcXKV5FGVEraHQXOH9BqHIBeHuX7DMzGZSJqDWFGZuXGHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoX7HQBsZkBiHAzGD5BOHgveHArCDuX/DoBqHQBiDuBqHArYHuraDMvOV9BUDWXKVEraHQJmZSBqZ1NOHuFUHgNKVkJ3DWF/VoBiDcJUZSX7Z1BYHuFaHuNOVcFKHEX7HIFUHQXOZkBiHAzGZMFaHgNODkXKDWFqVoFaD9XsDQFUHArYHuraDMvOVcFKDWBmVoFGHQJmZ1F7Z1vmD5rqDEBOHArCDWF/VoB/D9NwDQB/Z1rwV5X7HuzGVIBOV5X7DoJsD9XGZSB/HArYHQJwDEBODkFeH5FYVoFGHQJKDQBOZ1rwD5F7HgrKVcBOV5F/VEraDcNwH9B/HANOD5FaDErKVkXeV5FqDoFUD9NwDQJsHIrKV5JeDMrwVIFCDWXCDoX7D9XOZ1FGHArKV5FUDMrYZSXeV5FqHIJsD9NmDQBqHArYHurqHgvOVcrsDWJeHMraD9JmZ1BiHABYV5FUDEvsHEXeHEFaHIJsD9XsZ9JeD1BeD5F7DMvmVcFeV5X/VEBiHQNwZSBqHArYHuJsHgBeHEJqDuXKVoFGHQJeDQFUHArYHuBqDMvmVIBsH5XKDoXGDcFYVIJsHIBeHQX7HgrKVkJ3DWrGVoFGDcBiDQFUHANOHuraHgvOV9FeHEFGVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQJeDQBqHABYHuF7DMvmVIBsDurGDoXGHQXOZSBOD1rKHQFaDMveHArsDWB3VoFGHQJKH9BiDSrwHQBODMBODkB/DurGDoXGHQBqZ1X7HIveHuX7HgvsVkJqHEB7DoF7D9XsDQJsDSBYV5FGHgNKDkBsDuB7VEBiHQXOH9BqHIrwHQJsDMveVkJqH5BmVoFGHQNwH9BiHABYHQXGDMNOVIBsDurGDoXGHQXGVINUDSrYHQJsDMvCZSJ3DWrGVoFGHQXsZSBiZ1zGVWJeHgrwVcFeDWBmVoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQFYH9FaHANOD5NUDErKDkFeV5FaZuBqD9NmZSFGHINaV5JwHuvmVcrsH5XCDoXGD9BsZ1FUZ1BeD5JeDMBYZSJGDWr/VoXGD9NwDQJwD1veV5FGHgvsVcFCH5FqDoraHQFYVIJwD1rwV5FGDEBeHEXeH5X/DoF7D9NwZSX7D1BeV5raHuvmVcFKV5X7VoFGD9BiZ1X7Z1BeV5JeDErKHEFKV5B7DoBqHQXOZ9F7HAvmD5F7DMvOZSJqDWXKDoXGHQNwZ1BiHINKV5X7HgveHArsDWFGZuBqHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoX7HQNmZ1BiHAvCD5XGHgveHErsH5FGDoXGHQBiDuFaHAveD5NUHgNKDkBOV5FYHMBiHQNmZ1BOD1rwD5JwHgrKVkXeHEB7ZuBODcBiDQJwHABYHQJeDMvODkFCDWF/HMXGD9BiZ1BiHArYHQJwDEBODkFeH5FYVoFGHQJKDQFaHIBeHuraDMBYDkBsV5F/HMFUHQXGZSBqD1rKHuJeDMrYHErCDWX7HMBOHQXsH9BiZ1rwHQBODMBODkBsV5FGVoFaHQBiZSBqHABYHQBqHgBeHEJqDWr/HMX7HQNmZ9rqHAveHQrqDMBYDkBsHEF/HMFUHQXGH9BqHArKV5FUDMrYZSXeV5FqHIJsHQJeDuBOZ1vCV5Je";
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
      $this->tab_grupo[0] = "FACILWEBv2/";
      if ($_SESSION['scriptcase']['sc_usa_grupo'] != "S")
      {
          $this->tab_grupo[0] = "";
      }
      $_SESSION['scriptcase']['menu']['contr_erro'] = 'on';
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  if ($this->sc_menu_item=="item_2")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['terceros']['start'] = 'new';
	}
if ($this->sc_menu_item=="item_5")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_proveedores']['start'] = 'new';
	}
if ($this->sc_menu_item=="item_8")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_productos']['start'] = 'new';
	}
if ($this->sc_menu_item=="item_30")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_ajusteinv']['start'] = 'new';
	}
if ($this->sc_menu_item=="item_19")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['start'] = 'new';
	}
if ($this->sc_menu_item=="item_24")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_grupo']['start'] = 'new';
	}

if ($this->sc_menu_item=="item_36")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_facturaven']['start'] = 'new';
	}

if ($this->sc_menu_item=="item_38")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_facventa_pruebapos']['start'] = 'new';
	}

if ($this->sc_menu_item=="item_44")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_reciboingreso']['start'] = 'new';
	}

if ($this->sc_menu_item=="item_62")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_remisiones']['start'] = 'new';
	}

if ($this->sc_menu_item=="item_67")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_reciboingreso_remis']['start'] = 'new';
	}

if ($this->sc_menu_item=="item_65")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['start'] = 'new';
	}
if ($this->sc_menu_item=="item_112")
	{
		$_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['start'] = 'new';
	}

 
      $nm_select = "select descripcion from aplicaciones_menu where item_menu='".$this->sc_menu_item."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDescripcionMenu = array();
      $this->vdescripcionmenu = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDescripcionMenu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdescripcionmenu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDescripcionMenu = false;
          $this->vDescripcionMenu_erro = $this->Db->ErrorMsg();
          $this->vdescripcionmenu = false;
          $this->vdescripcionmenu_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vdescripcionmenu[0][0]))
{
	
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='ABRIR', observaciones='SE ABRIÓ EL ITEM: ".$this->vdescripcionmenu[0][0] .", MENU_ITEM: ".$this->sc_menu_item.", APLICACIÓN: ".$this->sc_script_name."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;	
}
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['menu']['contr_erro'] = 'off';
      $_SESSION['scriptcase']['sc_ult_apl_menu'] = array();
      unset($_SESSION['scriptcase']['sc_usa_grupo']);
if ($this->Db)
{
    $this->Db->Close(); 
}
if ($this->nm_db_conn_facilweb)
{
    $this->nm_db_conn_facilweb->Close(); 
}
      $link_url = false;
      $parms_session = "";

      if ($_SESSION['scriptcase']['sc_item_menu'] == "menu")
      {
              $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("control_menu") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=1";
      }
      elseif (isset($_SESSION['scriptcase']['sc_def_menu']['menu']))
      {
         foreach($_SESSION['scriptcase']['sc_def_menu']['menu'] as $id_item => $arr_item)
         {
             if ($_SESSION['scriptcase']['sc_item_menu'] == $id_item)
             { 
                 if ($arr_item['lnk_url'])
                 { 
                    $apl_run = $arr_item['url'];
                    $link_url = true;
                 } 
                 else 
                 { 
                    $this->menu_sc_init = (isset($arr_item['sc_init'])) ? $arr_item['sc_init'] : 1;
                    $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . $arr_item['url']; 
                    $parms_session = $arr_item['parm']; 
                 } 
                break; 
             } 
         }
      }
      {
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_2")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("terceros") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_80")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_todos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_3")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_clientes") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_6")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_58")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_vendedores") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_151")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_clasificacion_clientes") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_152")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_zona_clientes") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_100")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("terceros_mesas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_126")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_cargar_terceros_desde_excel") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_183")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ruteros") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_266")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_historial") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_230")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_cargar_ruteros_desde_excel") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_8")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_productos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_84")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_productos_simple") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_9")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_productos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_146")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_marca") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_147")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_linea") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_23")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_grupo") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_24")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_grupo") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_74")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_productos_editarprecios") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_77")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_actualizar_precios_excel") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_108")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("control_cargarproductos_excel") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_210")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_productos_editarproveedor") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_215")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("consultar_productos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_231")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_productos_fast_gcontable") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_19")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("fac_compras_new") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_32")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_compras_new") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_85")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_pedido_compra") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_86")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos_compras") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_43")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_compras_dev") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_142")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("control_codbarras_filtro") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_41")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_51")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_produccion") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_52")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_produccion") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_53")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_productosxtraslado") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_54")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_mov_trasladodeproduccion") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_56")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_mov_trasladoprod_almacen") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_57")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_detallenotamov_productos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_33")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_movimiento") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_35")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_mov_ajusteinv") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_82")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("Grid_ajuste_Inv_fisico") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_12")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_inical") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_15")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_inventario_inicial") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_34")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_final") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_98")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ajuste_notapos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_99")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_notainv_ajuste") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_31")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_tipotransfe") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_36")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_facturaven") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_38")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_grid_pos_usuario") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_132")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_pos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_134")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("lectordeprecios") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_62")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_remisiones") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_42")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_37")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_63")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_remi") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_184")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_programar_descuentos_generales") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_236")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_automatica") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_260")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_facturaven_clasificacion") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_254")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_enviar_fe_periodo_propio") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_261")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_notificar_cobro_suscripcion_sms") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_177")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_notas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_178")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_NC_ND") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_65")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_pedido") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_66")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_iframe_pedidos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_153")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_ventas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_251")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos_restaurante") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_50")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_cartera") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_44")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_reciboingreso") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_154")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_cuentas_porcobrar") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_67")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_reciboingreso_remis") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_246")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_recibos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_247")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_reciboingreso") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_174")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_cuentas_principal") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_109")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_cuentaspagar") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_111")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tesoreria") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_192")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_cuentas_porpagar") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_60")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_caja_lista") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_112")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_hacerpagos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_113")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_pagos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_176")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_pagos_master") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_61")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_caja") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_127")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_bancos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_128")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_pagos_conceptos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_272")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_contabilidad") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_269")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_puc") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_271")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_puc_auxiliares") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_273")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_conceptos_dian") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_248")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_presupuestos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_159")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_plancuentas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_161")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_grupos_contables") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_252")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_productos_contable") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_253")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contable") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_237")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_exportar") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_238")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("asientos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_229")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_facturacom_genera_comprobantes") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_228")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_genera_comprobantes") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_162")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_comprobantes") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_256")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_impuestos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_194")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_total_ingreso_egresos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_199")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_abc_clientes") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_198")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_abc_productos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_188")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_costo_inventario") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_187")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_rotacion_inventario") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_144")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_inventario_fisico_porproducto") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_189")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_productos_por_bodega") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_141")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_semanas_venta") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_107")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_productos_pedido") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_118")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_productos_fechavencimiento") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_129")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_saldos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_133")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_vencimiento_lote") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_219")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_rp_productos_vendedor") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_181")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_reporte_caja_filtro") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_148")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_caja_informe") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_149")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_caja") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_76")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_report_refventacostogarancia") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_115")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_ubicacion") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_137")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_articulo") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_138")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_familia") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_139")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_cliente") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_140")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_ventas_por_vendedor") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_182")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_flujo_caja_principal") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_242")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_productos_x_pedido_dia") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_243")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_venta_x_producto_dia") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_195")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_saldo_terceros") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_180")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_cartera_por_edades") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_245")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_reporte_impuestos_ing_terceros") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_209")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_tareas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_204")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_contactos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_205")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_221")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_contratos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_233")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_terceros_contratos_generar_fv") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_234")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_facturaven_contratos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_239")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_descarga_pdfs_principal") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_235")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_recibos_ing_caja") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_224")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_dispositivos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_225")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contrato_dispositivo") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_226")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contratos_estado") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_227")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_terceros_contratos_motivoscorte") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_206")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_historiales_crm") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_216")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_casos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_207")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_clasificacion_clientes") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_217")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_casos_estado") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_218")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_casos_prioridad") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_263")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_mensajes_masivos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_264")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_mensajes_masivos_envios") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_117")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("calendar_calendar") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_201")
      {
          $apl_run  = "../_lib/libraries/grp/correo";
          $link_url = true;
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_202")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_gestor_archivos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_28")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_datosemp") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_190")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_sucursales_todas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_193")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_consecutivos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_130")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_configuraciones_print_pos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_101")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_configuraciones") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_102")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_webservicefe") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_29")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_resdian") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_265")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_servidor_smtp") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_259")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_plantillas_correo_propio") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_73")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_iva") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_122")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_tiporetefuente") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_123")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_tipoica") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_124")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_tipoautoretencion") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_125")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_c_costos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_267")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_prefijos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_83")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_prefijos_documentos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_27")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_bodegas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_232")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_SN_BALANZA") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_68")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_usuarios") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_69")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_usuarios") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_70")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_usuarios_grupos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_72")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_aplicaciones_menu_asignarpermisos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_249")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("control_copiar_permisos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_185")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_permisos_menu_movil") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_120")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_aplicaciones_menu") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_186")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_permisos_aplicaciones_menu") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_91")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_empresas") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_22")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_lfs_principal") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_131")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_recalcular_lfs_principal") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_78")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_hacer_backup") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_87")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_restaurar_backup") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_145")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_optimizar_bd") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_81")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_limpiar_bd") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_175")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_notainv_ceros") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_191")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_conceptos_documentos") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_114")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_iframe_phpmyadmin") . "/?nmgp_outra_jan=true&nm_apl_menu=menu";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_197")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_copias_nube_clientes") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_211")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_municipio") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_213")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_unidades_medida") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_214")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_tipo_producto") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_94")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_grupos_TNS") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_97")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_tipoiva_TNS") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_157")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_plan_cuentas_TNS") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_158")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_grupos_contables_TNS") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_95")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_articulos_TNS") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_96")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_importar_terceros_TNS") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_103")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_productos_facilweb_importinvtns") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_135")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_log") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_257")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_log_pedidos_borrados") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_155")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_soporte") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_212")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_buscar_actualizaciones") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_156")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_anydesk") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_46")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_105")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_ayuda") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_150")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_slider") . "/?nm_run_menu=1&nm_apl_menu=menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_20")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("blank_fin_sesion") . "/?script_case_init=" . $_SESSION['sc_session'][1]['menu']['init'] . "";
      }
      }
      if (!$link_url)
      {
          $pos = strpos($apl_run, "?");
          if ($pos !== false)
          {
              $parms = "";
              $temp = explode("&", substr($apl_run, $pos + 1));
              foreach ($temp as $cada_parm)
              {
                  $parte_parm = explode("=", $cada_parm);
                  $parms .= (!empty($parms)) ? "?@?" . $parte_parm[0] . "?#?" : $parte_parm[0] . "?#?";
                  $parms .= (isset($parte_parm[1])) ? $parte_parm[1] : "";
              }
              $apl_run =  substr($apl_run, 0, $pos);
          }
      }
      if ($parms_session != "")
      {
          $parms  = isset($parms) ? $parms : '';
          $parms  = $parms_session . (substr($parms_session, -3, 3) != '?@?' ? '?@?' : '') . $parms;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <html><body>
        <form name="fmenu" method="post" action="<?php echo NM_encode_input($apl_run); ?>">
          <input type=hidden name="nmgp_parms" value="<?php  echo NM_encode_input($parms); ?>"> 
          <input type=hidden name="script_case_init" value="<?php echo $this->menu_sc_init ?>"> 
          <input type=hidden name="nm_apl_menu" value="menu"> 
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "menu")
      {
?>
          <input type=hidden name="nmgp_url_saida" value="<?php echo $this->nm_location ?>"> 
<?php
      }
?>
        </form>
      <script type="text/javascript">
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
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "menu")
      {
?>
          window.history.pushState('Object', 'menu', '<?php echo $this->nm_location ?>');
<?php
      }
      if ($link_url)
      {
?>
          window.location='<?php echo $apl_run; ?>'; 
<?php
      }
      else
      {
?>
          (function() { document.fmenu.submit(); })();
<?php
      }
?>
      </script>
      </body></html>
<?php
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['menu']['sc_init'][$apl_menu] = rand(2, 10000);
        $_SESSION['sc_session'][$_SESSION['scriptcase']['menu']['sc_init'][$apl_menu]] = array();
        $this->menu_sc_init = $_SESSION['scriptcase']['menu']['sc_init'][$apl_menu];
        return  $this->menu_sc_init;
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
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('FACILWEBv2');
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
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
$controle = new menu_form_php();
$controle->init();
?>
