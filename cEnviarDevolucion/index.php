<?php
   include_once('cEnviarDevolucion_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_perfil']          = "conn_firebird";
   $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_cache']      = "";
   $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_doc']        = "";
   $_SESSION['scriptcase']['cEnviarDevolucion']['glo_con_conn_mysql']         = "conn_mysql";
    //check publication with the prod
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
    $str_path_apl_url = $_SERVER['PHP_SELF'];
    $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
    $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class cEnviarDevolucion_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_google_fonts;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_arr_db_extra_args = array();
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_ger_css_emb;
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_ibase;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $nm_bases_progress;
   var $nm_db_conn_mysql;
   var $nm_con_conn_mysql = array();
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
   var $sc_export_ajax = false;
   var $sc_export_ajax_img = false;
   var $force_db_utf8 = false;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
          include_once("../_lib/lib/php/fix.php");
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
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
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "cEnviarDevolucion"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "FACILWEB_FE_73"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "pe_bronze"; 
      $this->nm_dt_criacao   = "20200127"; 
      $this->nm_hr_criacao   = "145046"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20210820"; 
      $this->nm_hr_ult_alt   = "170646"; 
      $this->Apl_paginacao   = "PARCIAL"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
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
      $this->sc_site_ssl     = $this->appIsSsl();
      $this->sc_protocolo    = $this->sc_site_ssl ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_doc'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "es";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "es_es";
      }
      $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
      if (!isset($_SESSION['scriptcase']['cEnviarDevolucion']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['cEnviarDevolucion']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['cEnviarDevolucion']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_SweetBlue/Sc9_SweetBlue";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->java_protocol . $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/cEnviarDevolucion';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $pos_path = strrpos($this->path_prod, "/");
      $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      $this->Cmp_Sql_Time     = array();
      if (isset($_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['cEnviarDevolucion']['actual_lang']) || $_SESSION['scriptcase']['cEnviarDevolucion']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['cEnviarDevolucion']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_FACILWEB_FE_73',$this->str_lang,'0','/');
      }
      if (!isset($_SESSION['scriptcase']['fusioncharts_new']))
      {
          $_SESSION['scriptcase']['fusioncharts_new'] = @is_dir($this->path_third . '/oem_fs');
      }
      if (!isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("cEnviarDevolucion_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
    copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
    echo $orig_img . '_@@NM@@_';
    if(file_exists($out1_img_cache)){
        echo $out1_img_cache;
        exit;
    }

         include_once("../_lib/lib/php/nm_trata_img.php");
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['ancor_save'] = $_POST['ancor_save'];
          $oJson = new Services_JSON();
          if ($_SESSION['scriptcase']['sem_session']) {
              unset($_SESSION['sc_session']);
          }
          exit;
      }
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
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['script_case_init']    = $this->sc_page;
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
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
      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["cEnviarDevolucion"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["cEnviarDevolucion"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
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
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['redir']))
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
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_cancel { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=44); opacity:0.44; padding:3px 13px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_cancel_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_cancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_check_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=42); opacity:0.42; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_danger_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_default_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_facebook { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#304d8a; border-style:solid; border-radius:4px; background-color:#304d8a; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2d4373; border-style:solid; border-radius:4px; background-color:#2d4373; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_facebook_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:#3b5998; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_facebook_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e0321c; border-style:solid; border-radius:4px; background-color:#e0321c; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c23321; border-style:solid; border-radius:4px; background-color:#c23321; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_google_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:hover { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:active { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_disabled { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_icons_selected { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_ok_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1678c2; border-style:solid; border-radius:4px; background-color:#1678c2; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1a69a4; border-style:solid; border-radius:4px; background-color:#1a69a4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_paypal_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#35a2f4; border-style:solid; border-radius:4px; background-color:#35a2f4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2795e9; border-style:solid; border-radius:4px; background-color:#2795e9; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_twitter_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e60000; border-style:solid; border-radius:4px; background-color:#e60000; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c00; border-style:solid; border-radius:4px; background-color:#c00; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_youtube_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->nm_ger_css_emb = true;
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

// 
      include_once($this->path_aplicacao . "cEnviarDevolucion_erro.class.php"); 
      $this->Erro = new cEnviarDevolucion_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('cEnviarDevolucion'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_fix.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("es");
      include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      $_SESSION['scriptcase']['nmamd'] = array();
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->str_google_fonts= isset($str_google_fonts)?$str_google_fonts:'';
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      if (isset($_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['redir'])) {
          $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
          $SS_cod_html .= "<HTML>\r\n";
          $SS_cod_html .= " <HEAD>\r\n";
          $SS_cod_html .= "  <TITLE></TITLE>\r\n";
          $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
          if ($_SESSION['scriptcase']['proc_mobile']) {
              $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
          }
          $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
          $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
          if ($_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scGridPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scGridBorder\">\r\n";
              $SS_cod_html .= "    <table class=\"scGridTabela\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scGridFieldOdd\"><td class=\"scGridFieldOddFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && ((isset($_POST['nmgp_opcao']) && substr($_POST['nmgp_opcao'], 0, 5) == "ajax_") || (isset($_GET['nmgp_opcao']) && substr($_GET['nmgp_opcao'], 0, 5) == "ajax_")))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      $this->nm_bases_access     = array("access", "ado_access", "ace_access");
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
      $this->sqlite_version      = "old";
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress     = array("pdo_progress_odbc", "progress");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_ibase, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9NwDQBqHIrKVWBqDMBOVIB/DWXCVErqD9BsZ1rqHAN7HQXGDEBeZSJ3V5FaHINUDcBwDQFaZ1BYHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHAN7HQJwDEBODkFeH5FYVoFGHQJKDQFaDSzGVWBqHuNODkB/HEF/HMXGD9BsZ1B/HIBOD5XGHgBOHENiDWrGZuBqDcXGDQJwHANKVWBqDMvOVIFCDWFaHMBiD9BsVIraD1rwV5X7HgBeHEBUDWF/VoB/DcXOZSX7HANOV5BOHuNODkBOV5F/VEBiDcJUZkFGHArKV5FUDMrYZSXeV5FqHIJsHQXGZSX7D1BeHuraHuNOVIFCDWF/DoFGDcBqZ1FaHAN7HQFUDMzGHEJGDWXCDoB/D9XsDQJwHABYV5FGHuvmVcBOV5X7DoJsHQFYZSFaHArKV5XGDErKHErCDWF/VoBiDcJUZSX7Z1BYHuFaDMBYV9FeDWF/VoX7HQJmZSB/HArYD5F7HgBYHEXeV5FqZuFaD9FYDQJsZ1N7HuFaHuNOZSrCH5FqDoXGHQJmZ1FGZ1vOZMJwHgrKHErCV5FqHIFUHQFYH9BiHAvCD5F7DMBYV9BUDuX7HMraHQXOH9BOHAvCV5X7DMvCHErCDWr/HMB/DcXGDQFaHIBOD5F7DMBOVIBsV5F/HMFUHQBqZkBiHINKD5rqDEBOHEFiHEFqDoF7DcJUZSBiHIvsVWFaDMBYVcXKH5B7VENUHQNwVIJsD1NaV5X7HgBeVkJqDWFGZuBqDcXGZSBiD1BOD5F7DMrYZSNiDuX7HMFUDcNmZ1BOHAvmV5X7HgNKHErsH5F/HMFaHQNmDQFaHINaV5FGHuNOVcFKHEFYVoBqDcBwH9BqDSvOZMJwDMveHErsH5FYHIB/HQBiH9BiHIvsD5F7DMzGZSJqHEFYHIXGHQBiZkFGZ1vmV5X7HgBeVkJ3DWXCHIraHQXsZSBiHAvCD5F7DMBYVcB/DWF/HMJeDcFYZ1FGDSBOD5rqDEBOHEFiHEFqDoF7DcJUZSFGD1BeV5FGHgrYDkFCDWXCVoB/D9BiZ1F7HIveD5BiHgBeDkB/HEB3DoB/HQFYDQJwHANOV5JwHgrKDkFCDWJeVoB/D9BsZkFUHArKHQraDEBeHEXeDuFYVoB/D9NwZ9rqZ1rwHQBOHgrKVcFCH5XCHIF7DcBqZ1B/DSBeV5FaHgvCZSJGDWB3ZuXGHQXGDQFGHAveD5BOHuzGVcBUDuFGVoFGHQFYH9FaHIBeZMBODEvsZSJGDWr/DoB/D9XsZSFGD1NKV5JwHuzGDkBOH5FqVoX7D9JmZ1FaHArKZMB/DMBYZSXeDWX7DoXGDcBwDuBOZ1NaV5FGHuNOVcFKHEFYVoBqDcBwH9FaD1rwD5rqDMNKZSXeDuJeDoB/D9NwZSFGD1veV5raDMBODkBsV5X7HIrqDcFYZkFGD1rwHQrqHgvsZSJ3V5XCHIFUHQFYZSBiZ1N7HuFaHuNOZSrCH5FqDoXGHQJmZ1BiHAvCD5BqHgveDkXKDWFGDoBOHQJeDQBqHAvmV5JeDMvmVcFKV5BmVoBqD9BsZkFGHArKV5JsDMzGVkJqDuXKDoXGHQJKH9X7DSrwD5XGHuzGZSJqDWXCVoBqHQJmZ1F7Z1vmD5rqDEBOHArCDWF/HMBOHQXsDuFaZ1rwHQBODMvmVcB/DWJeHMJsHQBiVIJwHArKHQJsHgvsHErCDWXCHMXGHQNmH9FUD1BeHQBqHgNKVcFeV5F/HMFUDcFYZSBqHABYHuFGHgNOVkJ3V5XKDoNUHQFYH9BiZ1rwHQJsDMvmVcB/H5FqHMBiD9BsVIraD1rwV5X7HgBeHErsHEB7VoBiHQBiDQNUZ1rKVWFU";
      $this->prep_conect();
      $this->conectDB();
      $this->conectExtra();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_SweetBlue_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_SweetBlue_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = ""; 
      }
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao']) && $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_perfil']) && $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['cEnviarDevolucion']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['cEnviarDevolucion']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao']))
      {
          if (!isset($_GET['nmgp_opcao']) || ('pdf' != $_GET['nmgp_opcao'] && 'pdf_res' != $_GET['nmgp_opcao'])) {
              ob_start();
          } else {
              @ini_set('zlib.output_compression',0);
              $bufferSize = @ini_get('output_buffering');
              if ('' != $bufferSize) {
                  $bufferSize = min($bufferSize * 10, 65536);
                  echo str_repeat('&nbsp;', $bufferSize);
              }
              
          }
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'FACILWEB_FE_73', 2, $this->force_db_utf8); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
          $NM_SV_Parms = array();
          $NM_SV_Parms['servidor']    = $_SESSION['scriptcase']['glo_servidor'];
          $NM_SV_Parms['usuario']     = $_SESSION['scriptcase']['glo_usuario'];
          $NM_SV_Parms['banco']       = $_SESSION['scriptcase']['glo_banco'];
          $NM_SV_Parms['senha']       = $_SESSION['scriptcase']['glo_senha'];
          $NM_SV_Parms['tpbanco']     = $_SESSION['scriptcase']['glo_tpbanco'];
          $NM_SV_Parms['decimal']     = $_SESSION['scriptcase']['glo_decimal_db'];
          $NM_SV_Parms['SC_sep_date'] = $_SESSION['scriptcase']['glo_date_separator'];
          $NM_SV_Parms['protect']     = $_SESSION['scriptcase']['glo_senha_protect'];
          $NM_SV_Parms['glo_database_encoding'] = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
          db_conect_devel('conn_mysql', $this->root . $this->path_prod, 'FACILWEB_FE_73', 2, $this->force_db_utf8); 
          $this->nm_con_conn_mysql['servidor']    = $_SESSION['scriptcase']['glo_servidor'];
          $this->nm_con_conn_mysql['usuario']     = $_SESSION['scriptcase']['glo_usuario'];
          $this->nm_con_conn_mysql['banco']       = $_SESSION['scriptcase']['glo_banco'];
          $this->nm_con_conn_mysql['senha']       = $_SESSION['scriptcase']['glo_senha'];
          $this->nm_con_conn_mysql['tpbanco']     = $_SESSION['scriptcase']['glo_tpbanco'];
          $this->nm_con_conn_mysql['decimal']     = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_mysql['SC_sep_date'] = $_SESSION['scriptcase']['glo_date_separator'];
          $this->nm_con_conn_mysql['protect']     = $_SESSION['scriptcase']['glo_senha_protect'];
          $this->nm_con_conn_mysql['glo_database_encoding'] = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
          $_SESSION['scriptcase']['glo_servidor']          = $NM_SV_Parms['servidor'];
          $_SESSION['scriptcase']['glo_usuario']           = $NM_SV_Parms['usuario'];
          $_SESSION['scriptcase']['glo_banco']             = $NM_SV_Parms['banco'];
          $_SESSION['scriptcase']['glo_senha']             = $NM_SV_Parms['senha'];
          $_SESSION['scriptcase']['glo_tpbanco']           = $NM_SV_Parms['tpbanco'];
          $_SESSION['scriptcase']['glo_decimal_db']        = $NM_SV_Parms['decimal'];
          $_SESSION['scriptcase']['glo_date_separator']    = $NM_SV_Parms['SC_sep_date'];
          $_SESSION['scriptcase']['glo_senha_protect']     = $NM_SV_Parms['protect'];
          $_SESSION['scriptcase']['glo_database_encoding'] = $NM_SV_Parms['glo_database_encoding'];
      }
      if (isset($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($_SESSION['scriptcase']['cEnviarDevolucion']['glo_con_conn_mysql'], $this->path_libs, "S", $this->path_conf);
          $this->nm_con_conn_mysql['servidor']               = $_SESSION['scriptcase']['glo_servidor'];
          $this->nm_con_conn_mysql['usuario']                = $_SESSION['scriptcase']['glo_usuario'];
          $this->nm_con_conn_mysql['banco']                  = $_SESSION['scriptcase']['glo_banco'];
          $this->nm_con_conn_mysql['senha']                  = $_SESSION['scriptcase']['glo_senha'];
          $this->nm_con_conn_mysql['tpbanco']                = $_SESSION['scriptcase']['glo_tpbanco'];
          $this->nm_con_conn_mysql['decimal']                = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_mysql['decimal']                = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_mysql['protect']                = $_SESSION['scriptcase']['glo_senha_protect'];
          $this->nm_con_conn_mysql['glo_database_encoding']  = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['embutida_init']) 
      {
          if (!isset($_SESSION['gidempresa'])) 
          {
              $this->nm_falta_var .= "gidempresa; ";
          }
          if (!isset($_SESSION['g_kardexid'])) 
          {
              $this->nm_falta_var .= "g_kardexid; ";
          }
          if (!isset($_SESSION['gpost'])) 
          {
              $this->nm_falta_var .= "gpost; ";
          }
          if (!isset($_SESSION['gvalidatns'])) 
          {
              $this->nm_falta_var .= "gvalidatns; ";
          }
      }
// 
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      $this->nm_arr_db_extra_args = array(); 
      if (isset($_SESSION['scriptcase']['glo_use_ssl']))
      {
          $this->nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->date_delim  = "";
          $this->date_delim1 = "";
      }
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
          $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_cancel { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=44); opacity:0.44; padding:3px 13px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_cancel_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_cancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_check_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=42); opacity:0.42; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_danger_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_default_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_facebook { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#304d8a; border-style:solid; border-radius:4px; background-color:#304d8a; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2d4373; border-style:solid; border-radius:4px; background-color:#2d4373; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_facebook_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:#3b5998; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_facebook_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e0321c; border-style:solid; border-radius:4px; background-color:#e0321c; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c23321; border-style:solid; border-radius:4px; background-color:#c23321; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_google_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:hover { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:active { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_disabled { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_icons_selected { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_ok_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1678c2; border-style:solid; border-radius:4px; background-color:#1678c2; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1a69a4; border-style:solid; border-radius:4px; background-color:#1a69a4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_paypal_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#35a2f4; border-style:solid; border-radius:4px; background-color:#35a2f4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2795e9; border-style:solid; border-radius:4px; background-color:#2795e9; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_twitter_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e60000; border-style:solid; border-radius:4px; background-color:#e60000; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c00; border-style:solid; border-radius:4px; background-color:#c00; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_youtube_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
   }
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEB_FE_73', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
          $this->Ibase_version = "old";
          if ($ibase_version = $this->Db->Execute("SELECT RDB\$GET_CONTEXT('SYSTEM','ENGINE_VERSION') AS \"Version\" FROM RDB\$DATABASE"))
          {
              if (isset($ibase_version->fields[0]) && substr($ibase_version->fields[0], 0, 1) > 2) {$this->Ibase_version = "new";}
          }
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
          $this->Db->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_end_clean();
          } 
      } 
   }
   function conectExtra()
   {
      if (!$_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_con_conn_mysql['glo_database_encoding'];
      $this->nm_db_conn_mysql = db_conect($this->nm_con_conn_mysql['tpbanco'], $this->nm_con_conn_mysql['servidor'], $this->nm_con_conn_mysql['usuario'], $this->nm_con_conn_mysql['senha'], $this->nm_con_conn_mysql['banco'], $this->nm_con_conn_mysql['protect'], 'S', 'N', '', $databaseEncoding); 
      if (in_array(strtolower($this->nm_con_conn_mysql['tpbanco']), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if (in_array(strtolower($this->nm_con_conn_mysql['tpbanco']), $this->nm_bases_sybase))
      {
          $this->nm_db_conn_mysql->fetchMode = ADODB_FETCH_BOTH;
          $this->nm_db_conn_mysql->Execute("set dateformat ymd");
          $this->nm_db_conn_mysql->Execute("set quoted_identifier ON");
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_end_clean();
          } 
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
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_firebird")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
   function sc_Date_Protect($val_dt)
   {
       $dd = substr($val_dt, 8, 2);
       $mm = substr($val_dt, 5, 2);
       $yy = substr($val_dt, 0, 4);
       $hh = (strlen($val_dt) > 10) ? substr($val_dt, 10) : "";
       if ($mm > 12) {
           $mm = 12;
       }
       $dd_max = 31;
       if ($mm == '04' || $mm == '06' || $mm == '09' || $mm == 11) {
           $dd_max = 30;
       }
       if ($mm == '02') {
           $dd_max = ($yy % 4 == 0) ? 29 : 28;
       }
       if ($dd > $dd_max) {
           $dd = $dd_max;
       }
       return $yy . "-" . $mm . "-" . $dd . $hh;
   }
	function appIsSsl() {
		if (isset($_SERVER['HTTPS'])) {
			if ('on' == strtolower($_SERVER['HTTPS'])) {
				return true;
			}
			if ('1' == $_SERVER['HTTPS']) {
				return true;
			}
		}

		if (isset($_SERVER['REQUEST_SCHEME'])) {
			if ('https' == $_SERVER['REQUEST_SCHEME']) {
				return true;
			}
		}

		if (isset($_SERVER['SERVER_PORT'])) {
			if ('443' == $_SERVER['SERVER_PORT']) {
				return true;
			}
		}

		return false;
	}
   function Get_Gb_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['cEnviarDevolucion']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
   }

   function GB_date_format($val, $format, $prefix, $conf_region="S", $mask="")
   {
           return $val;
   }
   function Get_arg_groupby($val, $format)
   {
       return $val; 
   }
   function Get_format_dimension($ind_ini, $ind_qb, $campo, $rs, $conf_region="S", $mask="")
   {
       $retorno    = array();
       $format     = $this->Get_Gb_date_format($ind_qb, $campo);
       $Prefix_dat = $this->Get_Gb_prefix_date_format($ind_qb, $campo);
       if (empty($format) || $rs->fields[$ind_ini] == "")
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHIISS')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3,4");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3] . ":" . $rs->fields[$ind_ini + 4];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDD2')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMM')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'BIMONTHLY' || $format == 'QUARTER' || $format == 'FOURMONTHS' || $format == 'SEMIANNUAL' || $format == 'WEEK')
       {
           $temp            = (substr($rs->fields[$ind_ini], 0, 1) == 0) ? substr($rs->fields[$ind_ini], 1) : $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $Prefix_dat . $temp;
           return $retorno;
       }
       if ($format == 'DAYNAME'|| $format == 'YYYYDAYNAME')
       {
           if ($format == 'DAYNAME')
           {
               $retorno['orig'] = $rs->fields[$ind_ini];
               $ano             = "";
               $daynum          = $rs->fields[$ind_ini];
           }
           else
           {
               $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
               $ano             = " " . $rs->fields[$ind_ini];
               $daynum          = $rs->fields[$ind_ini + 1];
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
           {
               $daynum--;
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               $daynum = ($daynum == 6) ? 0 : $daynum + 1;
           }
           if ($daynum == 0) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_sund'] . $ano;
           }
           if ($daynum == 1) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_mond'] . $ano;
           }
           if ($daynum == 2) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_tued'] . $ano;
           }
           if ($daynum == 3) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_wend'] . $ano;
           }
           if ($daynum == 4) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_thud'] . $ano;
           }
           if ($daynum == 5) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_frid'] . $ano;
           }
           if ($daynum == 6) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_satd'] . $ano;
           }
           return $retorno;
       }
       if ($format == 'HH')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-00 " . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'DD')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'MM')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $temp            = $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-00 " . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'YYYYWEEK' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYQUARTER' || $format == 'YYYYFOURMONTHS' || $format == 'YYYYSEMIANNUAL')
       {
           $temp            = (substr($rs->fields[$ind_ini + 1], 0, 1) == 0) ? substr($rs->fields[$ind_ini + 1], 1) : $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $Prefix_dat . $temp . " " . $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYHH' || $format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $rs->fields[$ind_ini] . $_SESSION['scriptcase']['reg_conf']['date_sep'] . $rs->fields[$ind_ini + 1];
           return $retorno;
       }
       elseif ($format == 'HHIISS')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1,2");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1] . ":" . $rs->fields[$ind_ini + 2];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'HHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       else
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
   }
   function Ajust_fields($ind_ini, &$rs, $parts)
   {
       $prep = explode(",", $parts);
       foreach ($prep as $ind)
       {
           $ind_ok = $ind_ini + $ind;
           $rs->fields[$ind_ok] = (int) $rs->fields[$ind_ok];
           if (strlen($rs->fields[$ind_ok]) == 1)
           {
               $rs->fields[$ind_ok] = "0" . $rs->fields[$ind_ok];
           }
       }
   }
   function Get_date_order_groupby($sql_def, $order, $format="", $order_old="")
   {
       $order      = " " . trim($order);
       $order_old .= (!empty($order_old)) ? ", " : "";
       return $order_old . $sql_def . $order;
   }
}
//===============================================================================
//
class cEnviarDevolucion_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
   }
//
//----- 
   function controle()
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $glo_senha_protect;

      $this->Ini = new cEnviarDevolucion_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cEnviarDevolucion']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['cEnviarDevolucion']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['cEnviarDevolucion']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['cEnviarDevolucion'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['cEnviarDevolucion']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['cEnviarDevolucion']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('cEnviarDevolucion') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['cEnviarDevolucion']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "cEnviarDevolucion")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['cEnviarDevolucion']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['cEnviarDevolucion']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['cEnviarDevolucion']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      include_once($this->Ini->path_aplicacao . 'digito_verificacion.php');
      include_once($this->Ini->path_aplicacao . 'webservice_receptor.php');
      $this->nm_data = new nm_data("es");
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      $this->Db = $this->Ini->Db; 
      include_once($this->Ini->path_aplicacao . "cEnviarDevolucion_erro.class.php"); 
      $this->Erro      = new cEnviarDevolucion_erro();
      $this->Erro->Ini = $this->Ini;
//
      header("X-XSS-Protection: 1; mode=block");
      header("X-Frame-Options: SAMEORIGIN");
      $_SESSION['scriptcase']['cEnviarDevolucion']['contr_erro'] = 'on';
if (!isset($_SESSION['gvalidatns'])) {$_SESSION['gvalidatns'] = "";}
if (!isset($this->sc_temp_gvalidatns)) {$this->sc_temp_gvalidatns = (isset($_SESSION['gvalidatns'])) ? $_SESSION['gvalidatns'] : "";}
if (!isset($_SESSION['gpost'])) {$_SESSION['gpost'] = "";}
if (!isset($this->sc_temp_gpost)) {$this->sc_temp_gpost = (isset($_SESSION['gpost'])) ? $_SESSION['gpost'] : "";}
if (!isset($_SESSION['g_kardexid'])) {$_SESSION['g_kardexid'] = "";}
if (!isset($this->sc_temp_g_kardexid)) {$this->sc_temp_g_kardexid = (isset($_SESSION['g_kardexid'])) ? $_SESSION['g_kardexid'] : "";}
if (!isset($_SESSION['gidempresa'])) {$_SESSION['gidempresa'] = "";}
if (!isset($this->sc_temp_gidempresa)) {$this->sc_temp_gidempresa = (isset($_SESSION['gidempresa'])) ? $_SESSION['gidempresa'] : "";}
  $vkardexid   = 0;
$vpost       = "NO";
$idempresa   = 1;
$vndocumento = "";
$vvalidatns  = "NO";
$vprint_r    = "NO";





if(isset($this->sc_temp_gidempresa))
{
	$idempresa = $this->sc_temp_gidempresa;
}

if(isset($this->sc_temp_g_kardexid))
{
	if($this->sc_temp_g_kardexid>0)
	{
		$vkardexid = $this->sc_temp_g_kardexid;
	}
}

if(isset($_POST["kardexid"]))
{
	$vkardexid = $_POST["kardexid"];
	$vpost = "SI";
}

if(isset($_GET["kardexid"]))
{
	$vkardexid = $_GET["kardexid"];
}

if(isset($_GET["idempresa"]))
{
	$idempresa = $_GET["idempresa"];
}

if(isset($_GET["documento"]))
{
	$vndocumento = $_GET["documento"];
	$vsql = "select kardexid from kardex where codcomp='DV' and sn_pjfe||numero ='".trim($vndocumento)."'";
	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vKid = array();
      $this->vkid = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vKid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vkid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vKid = false;
          $this->vKid_erro = $this->Db->ErrorMsg();
          $this->vkid = false;
          $this->vkid_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->vkid[0][0]))
	{
		$vkardexid = $this->vkid[0][0];
	}
}

if(isset($this->sc_temp_gpost))
{
	if(!empty($this->sc_temp_gpost))
	{
		$vpost = $this->sc_temp_gpost;
	}
}

if(isset($this->sc_temp_gvalidatns))
{
	if(!empty($this->sc_temp_gvalidatns))
	{
		$vvalidatns = $this->sc_temp_gvalidatns;
	}
}

if(isset($_GET["post"]))
{
	$vpost = $_GET["post"];
}

if(isset($_GET["validatns"]))
{
	$vvalidatns = $_GET["validatns"];
}

if(isset($_GET["print"]))
{
	$vprint_r = $_GET["print"];
}
	


$this->fEnviarFE($vkardexid,$vpost,$idempresa,$vvalidatns,$vprint_r);
if (isset($this->sc_temp_gidempresa)) {$_SESSION['gidempresa'] = $this->sc_temp_gidempresa;}
if (isset($this->sc_temp_g_kardexid)) {$_SESSION['g_kardexid'] = $this->sc_temp_g_kardexid;}
if (isset($this->sc_temp_gpost)) {$_SESSION['gpost'] = $this->sc_temp_gpost;}
if (isset($this->sc_temp_gvalidatns)) {$_SESSION['gvalidatns'] = $this->sc_temp_gvalidatns;}
$_SESSION['scriptcase']['cEnviarDevolucion']['contr_erro'] = 'off'; 
//--- 
       $this->Db->Close(); 
       $this->Ini->nm_db_conn_mysql->Close(); 
       if ($this->Change_Menu)
       {
           $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
           $Arr_rastro = array();
           if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
           {
               foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
               {
                  $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
               }
               $ult_apl = count($Arr_rastro) - 1;
               unset($Arr_rastro[$ult_apl]);
               $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
           }
           else
           {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
           }
       }
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
?>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
        </script>
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
                <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
                <script type="text/javascript"><?php echo $this->redir_modal ?></script>
<?php
       } 
       exit;
   } 
function fCrearQR($vnombrearchivo,$vcontenido='Prueba qr',$vdirectorio='',$vmargin=0,$vtamanio=2,$vcalidad=20)
{
$_SESSION['scriptcase']['cEnviarDevolucion']['contr_erro'] = 'on';
  
	sc_include_library("prj", "qr", "qrlib.php", true, true);
	
	$tempDir       = $vdirectorio;
	$fileName      = $vnombrearchivo;
	$outerFrame    = $vmargin;
	$pixelPerPoint = $vtamanio;
	$jpegQuality   = $vcalidad;
	$codeContents  = $vcontenido;

	$frame = QRcode::text($codeContents, false, QR_ECLEVEL_M);

	$h = count($frame);
	$w = strlen($frame[0]);

	$imgW = $w + 2*$outerFrame;
	$imgH = $h + 2*$outerFrame;

	$base_image = imagecreate($imgW, $imgH);

	$col[0] = imagecolorallocate($base_image,255,255,255); 
	$col[1] = imagecolorallocate($base_image,0,0,0);     

	imagefill($base_image, 0, 0, $col[0]);

	for($y=0; $y<$h; $y++) {
		for($x=0; $x<$w; $x++) {
			if ($frame[$y][$x] == '1') {
				imagesetpixel($base_image,$x+$outerFrame,$y+$outerFrame,$col[1]); 
			}
		}
	}

	$target_image = imagecreate($imgW * $pixelPerPoint, $imgH * $pixelPerPoint);
	imagecopyresized(
		$target_image, 
		$base_image, 
		0, 0, 0, 0, 
		$imgW * $pixelPerPoint, $imgH * $pixelPerPoint, $imgW, $imgH
	);
	imagedestroy($base_image);
	imagejpeg($target_image, $tempDir.$fileName, $jpegQuality);
	imagedestroy($target_image);

$_SESSION['scriptcase']['cEnviarDevolucion']['contr_erro'] = 'off';
}
function fDigito($vdoc)
{
$_SESSION['scriptcase']['cEnviarDevolucion']['contr_erro'] = 'on';
  
	$long=strlen($vdoc);
	$str=$vdoc;
	$arr = str_split($str);
	switch ($long)
	{
	case 4:
	$valor=$arr[3]*3+$arr[2]*7+$arr[1]*13+$arr[0]*17;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 5:
	$valor=$arr[0]*19+$arr[1]*17+$arr[2]*13+$arr[3]*7+$arr[4]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 6:
	$valor=$arr[0]*23+$arr[1]*19+$arr[2]*17+$arr[3]*13+$arr[4]*7+$arr[5]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 7:
	$valor=$arr[0]*29+$arr[1]*23+$arr[2]*19+$arr[3]*17+$arr[4]*13+$arr[5]*7+$arr[6]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 8:
	$valor=$arr[0]*37+$arr[1]*29+$arr[2]*23+$arr[3]*19+$arr[4]*17+$arr[5]*13+$arr[6]*7+$arr[7]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 9:
	$valor=$arr[0]*41+$arr[1]*37+$arr[2]*29+$arr[3]*23+$arr[4]*19+$arr[5]*17+$arr[6]*13+$arr[7]*7+$arr[8]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;

	case 10:
	$valor=$arr[0]*43+$arr[1]*41+$arr[2]*37+$arr[3]*29+$arr[4]*23+$arr[5]*19+$arr[6]*17+$arr[7]*13+$arr[8]*7+$arr[9]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		return $dig;
		}
	else
		{
		return 11-$dig;
		}
	break;
	}

$_SESSION['scriptcase']['cEnviarDevolucion']['contr_erro'] = 'off';
}
function fEnviarFE($vkardexid,$vpost,$idempresa,$vvalidatns,$vprint_r)
{
$_SESSION['scriptcase']['cEnviarDevolucion']['contr_erro'] = 'on';
if (!isset($_SESSION['gidempresa'])) {$_SESSION['gidempresa'] = "";}
if (!isset($this->sc_temp_gidempresa)) {$this->sc_temp_gidempresa = (isset($_SESSION['gidempresa'])) ? $_SESSION['gidempresa'] : "";}
  
	ob_start();
	
	$vMotNota = 6;
	$vTipoDoc = 91; 
	$vrango   = "NC-1";
	$vcodcomp = "NC";
	
	$v_modo = "DESARROLLO";
	$vsql = "select modo from cloud_webservicefe where id_empresa='".$idempresa."'";	
	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vModo = array();
      $vmodo = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vModo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vmodo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vModo = false;
          $vModo_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vmodo = false;
          $vmodo_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
	if(isset($vmodo[0][0]))
	{
		$v_modo = $vmodo[0][0];
	}

	sc_include_library("prj", "qr", "qrlib.php", true, true);
	sc_include_library("prj", "php-image-magician", "php_image_magician.php", true, true);

	$vcodprefijo       = '00';
	$vnumero           = 0;
	$vtotal            = 0;
	$TokenEnterprise   = '';
	$TokenAutorizacion = '';
	$vServidor         = '';
	$vpjfe             = "";
	$vnit              = "";
	$vnit2             = "";
	$vfecha            = "";
	$vfecvence         = "";
	$vmunicipio   = 'CUCUTA';
	$vcodmunicipio= "";
	$vcod_departamento = "";
	$vdepartamento= "";
	$vcodmu_codep = "";
	$vcodepart    = '54';
	$vcod_departamentoymunicipio = '54001'; 
	$vconsecutivo = "";
	$vtotal       = 0;
	$vemail  = "servicio@solucionesnavarro.com";
	$vaccion = "Enviar";
	$vtelef1 = "";
	$vcodImp = "";
	$vdirecc1= "";
	$vpostal = "";
	$vnomregtri = "";
	$vnombre = "";
	$vtipodociden = "";
	$vobligaciones= array();
	$vnatjuridica = "";
	$vregimen     = "";
	$vdv = "";
	$vbasetotal  = 0;
	$vtotalitems = 0;

	$cant	="";
	$codbp	="";
	$desc	="";
	$codest	="";
	$base	="";
	$codImp	="";
	$Timp	="";
	$Timp	="";
	$eliva	="";
	$tot	="";
	$tot	="";
	$valun	="";
	$valun	="";
	$sec	="";


	$max    = "";

	$decoded = '';
	$vcufe	 = '';	
	$vestado = '';
	$vavisos = '';
	$eldesc	 = 0;
	$t		 = 0;
	$elmonto = 0;
	$bas_br	 = 0;

	$t_reg	 ='';
	$vEsfac	 ='NO';
	$lafechadevencimiento = '';
	$vvalida = false;
	$vmensaje= "";
	$vcoderror  = "";
	$vmensajes  = "";
	$vformapago = "";
	$file       = "";
	$vcodcli    = "";
	$factura    = "";
	$vpasos     = "";
	$cont       = 0;
	$vmen       = "";
	$vobserv    = "";
	$vhoracrea  = date("H:i:s");
	$codsucursal= "00001";
	$vexclusiones = "''";
	$vrbase     = 0;
	$vriva      = 0;
	$vtotal     = 0;
	$vcantidadDecimales = 2;
	$vvalorTributoUnidad= "0.00";
	$vnovalidaremail    = "NO";
	$vcorreoalternativo = "";
	$vinicial = 1;
	
	$vnitemisor   = "";
	$vcelemisor   = "";
	$vemailemisor = "";
	$vcorreodesvio  = "";
	$vfacturaonline = "";
	$vhoracreacion  = "";
	$vnombre_pc_red = "";
	
	$vinformacionAdicional   = "";
	$vsumarImpuestosDelDetalle = "NO";
	
	$vivatotal = 0;
	$vbasetotalizado = 0;
	$vivatotalizado  = 0;
	$viconsumototal  = 0;
	$vproveedor = "HKA";
	$venvio_dian    = 0;
	$venvio_cliente = 0;
	$vconsecutivo_pruebas = "";
	$vresolucion = "";
	$vfecha2    = "";
	$vretencion = 0;
	$vretica    = 0;
	$vretiva    = 0;
	$vmodo      = 1;
	$vServidor2 = "";
	$vbasetotalizado_delcero = 0;
	
	$vdescuentoexclusion   = "''";
	$vsqldescuentoexclusion = "d.preciobase";
	$vsqldescuentoexclusionneto = "d.precioneto";
	
	$vobservacion_dataico = "";
	$vbasetotalizado_delcero = 0;
	$vTestSetId = "";
	$vdiascredito = 0;
	$vtexto_encabezado = "";
	$vtexto_pie_pagina = "";
	$vtelefonosuc   = "";
	$vdireccionsuc  = "";
	$vnombreestablecimiento = "";
	$vcorreo_copia = "";
	$vcorreo_suc = "";
	$vlogo_suc   = "";
	$vterid      = "";
	$vmunicipio_tns = "NO";
	$vvalidar_codcliente_tns = "NO";
	$vbug_xml = "NO";
	$vseguimiento  = "";
	
	$factura = new FacturaGeneral();
	$factura->cliente = new Cliente();

	$vsql1 = "select k.codprefijo,k.numero,k.total,t.nittri,k.fecha,k.fecvence,k.formapago,t.nit,k.observ,k.horacrea,k.vrbase,t.terid,k.vrrfte,k.retfte,k.retiva, k.retica,k.vrrica,k.vrriva from kardex k inner join terceros t on k.cliente=t.terid where k.kardexid='".$vkardexid."'";

	 
      $nm_select = $vsql1; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatosKardex = array();
      $vdatoskardex = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatosKardex[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatoskardex[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatosKardex = false;
          $vDatosKardex_erro = $this->Db->ErrorMsg();
          $vdatoskardex = false;
          $vdatoskardex_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($vdatoskardex[0][0]))
	{
		$vcodprefijo  = $vdatoskardex[0][0];
		$vnumero      = $vdatoskardex[0][1];
		$vnit         = $vdatoskardex[0][3];
		$vfecha       = $vdatoskardex[0][4];
		$vfecvence    = $vdatoskardex[0][5];
		$vformapago   = $vdatoskardex[0][6];
		$vcodcli      = $vdatoskardex[0][7];
		$vobserv      = utf8_encode($vdatoskardex[0][8]);
		$vhoracreacion= $vdatoskardex[0][9];
		
		$vterid        = $vdatoskardex[0][11];
		$vretencion    = $vdatoskardex[0][12];
		$vporretencion = $vdatoskardex[0][13];
		$vretiva       = $vdatoskardex[0][14];
		$vretica       = $vdatoskardex[0][15];
		$vvrrica       = $vdatoskardex[0][16];
		$vvrriva       = $vdatoskardex[0][17];
		
		$vconsecutivo = $vnumero;
		$vtotal       = $vtotal;
		$vpasos      .= "1. Consulta kardex tns, ";
	}


	$vsql = "select if((select w.modo from cloud_webservicefe w where w.id_empresa='".$idempresa."')='DESARROLLO',prefijo_prueba,prefijo) as prefijo,inicial,final,resolucion,consecutivo_pruebas from cloud_prefijos where tipo='".$vcodcomp."' and cod_prefijo='".$vcodprefijo."' and  id_empresa='".$idempresa."'";
	
	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vPJFE2 = array();
      $vpjfe2 = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vPJFE2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vpjfe2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vPJFE2 = false;
          $vPJFE2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vpjfe2 = false;
          $vpjfe2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

	if(isset($vpjfe2[0][0]))
	{
		$vpjfe       = $vpjfe2[0][0];
		$vinicial    = $vpjfe2[0][1]; 
		$vrango      = $vpjfe."-".$vinicial;
		$vresolucion = $vpjfe2[0][3]; 
		$vconsecutivo_pruebas = $vpjfe2[0][4];

		$vpasos      .= "2. Consulta prefijo en cloud, ";
	}


	$vsql = "select if(modo='DESARROLLO',servidor1_pruebas,servidor1) as servidor1,if(modo='DESARROLLO',servidor2_pruebas,servidor2) as servidor2,if(modo='DESARROLLO',token_pruebas,tokenempresa) as  tokenempresa,if(modo='DESARROLLO',password_pruebas,tokenpassword) as tokenpassword, if(modo='DESARROLLO',1,0) as modos,testsetId from cloud_webservicefe where id_empresa='".$idempresa."'";
	
	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fv = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fv = false;
          $ds_fv_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

	if(isset($ds_fv[0][0]) and (isset($ds_fv[0][1])) and (isset($ds_fv[0][2])) and (isset($ds_fv[0][3])))
	{
		if(!empty(($ds_fv[0][0])) and (!empty($ds_fv[0][1])) and (!empty($ds_fv[0][2])) and (!empty($ds_fv[0][3])))
		{
			error_reporting(E_ERROR);
			$WebService     = new WebService();
			$factura        = new FacturaGeneral();
			$cliente        = new Cliente();
			$destinatario   = new Destinatario();
			$direccion      = new Direccion();
			$det_tributario = new Tributos();
			$emaildest      = new Strings();
			$vServidor      = $ds_fv[0][0];
			$vServidor2     = $ds_fv[0][1];

			$options = array('exceptions' => true, 'trace' => true);

			$params;
			$TokenEnterprise   = $ds_fv[0][2];
			$TokenAutorizacion = $ds_fv[0][3];
			$vmodo             = $ds_fv[0][4];
			$vTestSetId        = $ds_fv[0][5];
			$enviarAdjunto     = false;
			$vvalida           = true;

			$vpasos      .= "3. Consulta datos del webservice, ";
		}
		else
		{
			$vmensaje .= "No se encuentra la información del WebService";
		}
	}
	else
	{
		$vmensaje .= "No se encuentra la información del WebService";
	}
	
	$vsql = "select ccnit,celular,correo,codsucursal,cantidadDecimales,valorTributoUnidad,no_validar_mail,email_alternativo,desviar_correo_a,enviar_documento_online,correo_copia,nombre_pc_red,proveedor,enviar_dian,enviar_cliente,pie_pagina,head_note,celular,direccion,razon_social,correo_copia,correo,logo,validar_codcliente_tns, desactivar_xml_enlista from cloud_empresas where id_empresa='".$idempresa."'";

	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDataEmisor = array();
      $vdataemisor = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDataEmisor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdataemisor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDataEmisor = false;
          $vDataEmisor_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vdataemisor = false;
          $vdataemisor_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

	if(isset($vdataemisor[0][0]))
	{
		$vnitemisor                           = $vdataemisor[0][0];
		$vcelemisor                           = $vdataemisor[0][1];
		$vemailemisor                         = $vdataemisor[0][10];

		$codsucursal                          = $vdataemisor[0][3];
		$vcantidadDecimales                   = $vdataemisor[0][4];
		$vvalorTributoUnidad                  = $vdataemisor[0][5];
		$vnovalidaremail    				  = $vdataemisor[0][6];
		$vcorreoalternativo 				  = $vdataemisor[0][7];
		$vcorreodesvio                        = $vdataemisor[0][8];
		$vfacturaonline                       = $vdataemisor[0][9]; 
		$vnombre_pc_red                       = $vdataemisor[0][11]; 
		$vproveedor                           = $vdataemisor[0][12];
		$venvio_dian                          = $vdataemisor[0][13];
		$venvio_cliente                       = $vdataemisor[0][14];
		$vtexto_pie_pagina = $vdataemisor[0][15];
		$vtexto_encabezado = $vdataemisor[0][16];
		$vtelefonosuc      = $vdataemisor[0][17];
		$vdireccionsuc     = $vdataemisor[0][18];
		$vnombreestablecimiento = $vdataemisor[0][19];
		$vcorreo_copia     = $vdataemisor[0][20];
		$vcorreo_suc       = $vdataemisor[0][21];
		$vlogo_suc         = $vdataemisor[0][22];
		$vvalidar_codcliente_tns = $vdataemisor[0][23];
		$vbug_xml = $vdataemisor[0][24];
		
		if($vvalidatns=="NO")
		{
			$vvalidatns = $vvalidar_codcliente_tns;
		}

		if($vnovalidaremail=="SI")
		{
			if(empty($vcorreoalternativo))
			{
				$vvalida = false;
				$vmensaje .= "Si su configuración es: 'Correo alternativo', debe especificar un correo alternativo.<br>";
			}
		}

		if($vfacturaonline=="SI")
		{
			if(empty($vcorreodesvio))
			{
				$vvalida = false;
				$vmensaje .= "Si su configuración es: 'Enviar Documento Online', debe especificar un correo para desvío.<br>";
			}
		}

		$vpasos      .= "5. Datos del emisor, ";
	}

	if($vvalida)
	{
		if($vvalidatns=="NO")
		{
			
			$vsql_cliente = "select nittri,trim(iif(tipodociden='C','13','31')) as tipoiden,nombre,nomregtri,direcc1,telef1,email,trim(iif(natjuridica='N',2,1)) as naturaleza from terceros where terid='".$vterid."'";
			 
      $nm_select = $vsql_cliente; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fe = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fe[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fe = false;
          $ds_fe_erro = $this->Db->ErrorMsg();
      } 
;	

			if(isset($ds_fe[0][0]) and !empty($ds_fe[0][0]))
			{
				$vnit  = $ds_fe[0][0];
				$vnit2 = $ds_fe[0][0];

				$vv0 = strpos($vnit,"-");
				if($vv0 === false)
				{
					$vdv = fObtenerDigitoV($vnit);
				}
				else
				{
					$vv0  = explode("-",$vnit);
					$vv2 = $vv0[0];
					$vnit= $vv2;
					$vdv = fObtenerDigitoV($vv2);
				}


				$vtipodociden = $ds_fe[0][1];
				$vnombre      = utf8_encode($ds_fe[0][2]);
				if(empty($vnombre))
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene nombre en TNS: ".$vnit.".<br>";
				}
				$vnomregtri   = utf8_encode($ds_fe[0][3]);
				if(empty($vnomregtri))
				{
					$vnomregtri = $vnombre;
				}
				$vdirecc1     = utf8_encode($ds_fe[0][4]);
				$direccion    = $vdirecc1;
				if(empty($vdirecc1))
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene dirección en TNS: ".$vnit.".<br>";
				}
				$vtelef1      = utf8_encode($ds_fe[0][5]);
				if(empty($vtelef1))
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene telefono en TNS: ".$vnit.".<br>";
				}
				$vemail       = $ds_fe[0][6];

				

				if($vnovalidaremail=="NO")
				{
					if(empty($vemail))
					{
						$vvalida   = false;
						$vmensaje .= "-El tercero no tiene correo electrónico en TNS: ".$vnit.".<br>";
					}
				}
				else
				{
					if(empty($vemail))
					{
						$vemail = $vcorreoalternativo;
					}
				}

				$vnatjuridica = $ds_fe[0][7];


				 
      $nm_select = "select m.municipio,m.codigo_mu,t.detalle_tributario,t.cod_postal,t.responsabilidades_fiscales,t.cod_regimen,t.cod_departamento,dp.departamento,concat(t.cod_departamento,t.cod_municipio) as codmu_codep from cloud_terceros t inner join cloud_municipio m on t.cod_municipio=m.codigo_mu and t.cod_departamento=m.codigo_dep inner join cloud_departamento dp on t.cod_departamento=dp.codigo where  (t.documento='".$vnit2."' or t.documento='".$vcodcli."') and t.id_empresa='".$idempresa."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vInfo2 = array();
      $vinfo2 = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vInfo2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vinfo2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vInfo2 = false;
          $vInfo2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vinfo2 = false;
          $vinfo2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

				if(isset($vinfo2[0][0]))
				{
					$vmunicipio    = $vinfo2[0][0];
					if(empty($vmunicipio))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene municipio en FACILWEB: ".$vnit.".<br>";
					}
					$vcodmunicipio = $vinfo2[0][1];
					if(empty($vcodmunicipio))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene codmunicipio en FACILWEB: ".$vnit.".<br>";
					}
					$codImp		   = $vinfo2[0][2];
					if(empty($codImp))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene responsabilidades rut en FACILWEB: ".$vnit.".<br>";
					}
					$vpostal       = $vinfo2[0][3];
					if(empty($vpostal))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene codigo postal en FACILWEB: ".$vnit.".<br>";
					}
					$vobligaciones = $vinfo2[0][4];
					if(empty($vobligaciones))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene especificado el detalle tributario en FACILWEB: ".$vnit.".<br>";
					}
					$vregimen      = $vinfo2[0][5];
					if(empty($vregimen))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene especificado el régimen en FACILWEB: ".$vnit.".<br>";
					}

					$vcod_departamento = $vinfo2[0][6];
					if(empty($vcod_departamento))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene el codigo del departamento en FACILWEB: ".$vnit.".<br>";
					}

					$vdepartamento = $vinfo2[0][7];
					if(empty($vdepartamento))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene el departamento en FACILWEB: ".$vnit.".<br>";
					}

					$vcodmu_codep  = trim($vinfo2[0][8]);
					$vcod_departamentoymunicipio = $vcodmu_codep;
					if(empty($vcodmu_codep))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene codigo departamento + codigo municipio en FACILWEB: ".$vnit.".<br>";
					}
				}
				else
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no existe en FACILWEB: ".$vnit.".<br>";
				}

				$vpasos      .= "4. Datos del cliente en cloud, ";

			}
			else
			{
				$vvalida   = false;
				$vmensaje .= "El tercero no existe en TNS: ".$vnit.".<br>";
			}
		}
		else
		{
			
			$vsql_cliente = "select t.nittri,iif(t.tipodociden='C','13','31') as tipoiden,t.nombre,t.nomregtri,t.direcc1,t.telef1,t.email,iif(t.natjuridica='N',2,1) as naturaleza,c.nombre as ciudad,c.departamento,c.codigo as cod_departamento,coalesce(iif(f.regsimplif='S','49','48'),'48') as regimen from terceros t left join ciudane c on t.ciudaneid=c.ciudaneid left join tercerosself f on t.terid=f.terid where t.terid='".$vterid."'";

			if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

			 
      $nm_select = $vsql_cliente; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fe = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fe[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fe = false;
          $ds_fe_erro = $this->Db->ErrorMsg();
      } 
;	

			if(isset($ds_fe[0][0]) and !empty($ds_fe[0][0]))
			{
				$vnit  = $ds_fe[0][0];
				$vnit2 = $ds_fe[0][0];

				$vv0 = strpos($vnit,"-");
				if($vv0 === false)
				{
					$vdv = fObtenerDigitoV($vnit);
				}
				else
				{
					$vv0  = explode("-",$vnit);
					$vv2 = $vv0[0];
					$vnit= $vv2;
					$vdv = fObtenerDigitoV($vv2);
				}

				$vtipodociden = trim($ds_fe[0][1]);
				$vnombre      = utf8_encode($ds_fe[0][2]);
				if(empty($vnombre))
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene nombre en TNS: ".$vnit.". <br>";
				}
				$vnomregtri   = utf8_encode($ds_fe[0][3]);
				if(empty($vnomregtri))
				{
					$vnomregtri = $vnombre;
				}
				$vdirecc1     = utf8_encode($ds_fe[0][4]);
				$direccion    = $vdirecc1;
				if(empty($vdirecc1))
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene dirección en TNS: ".$vnit.". <br>";
				}
				$vtelef1      = utf8_encode($ds_fe[0][5]);
				if(empty($vtelef1))
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene telefono en TNS: ".$vnit.". <br>";
				}
				$vemail       = $ds_fe[0][6];

				if($vnovalidaremail=="NO")
				{
					if(empty($vemail))
					{
						$vvalida   = false;
						$vmensaje .= "El tercero no tiene correo electrónico en TNS: ".$vnit.". <br>";
					}
				}
				else
				{
					if(empty($vemail))
					{
						$vemail = $vcorreoalternativo;
					}
				}

				if(!empty($vemail))
				{
					if (filter_var($vemail, FILTER_VALIDATE_EMAIL))
					{

					}
					else
					{
						$vvalida   = false;
						$vmensaje .= "El correo electrónico no tiene un formato adecuado: ".$vemail." <br>";
					}
				}

				$vreceptor = $vemail;

				$vnatjuridica = trim($ds_fe[0][7]);

				$vmunicipio    = trim($ds_fe[0][8]);
				if(empty($vmunicipio) or $vmunicipio=="SIN CIUDAD")
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene municipio en TNS: ".$vnit.". <br>";
				}

				$vdepartamento = trim($ds_fe[0][9]);
				if(empty($vdepartamento))
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene el departamento en TNS: ".$vnit.". <br>";
				}

				$vcodmu_codep  = trim($ds_fe[0][10]);
				$vcod_departamentoymunicipio = $vcodmu_codep; 
				if(empty($vcodmu_codep))
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene codigo departamento + codigo municipio en TNS: ".$vnit.". <br>";
				}

				$vcod_departamento = substr($vcodmu_codep,0,2);
				$vcodmunicipio     = substr($vcodmu_codep,2,5);

				$vpostal       = $vcodmu_codep;

				$vregimen      = trim($ds_fe[0][11]);
				if(empty($vregimen))
				{
					$vvalida   = false;
					$vmensaje .= "El tercero no tiene especificado el régimen en TNS: ".$vnit.". <br>";
				}

				$codImp		   = "01";
				if($vregimen=="49")
				{
					$codImp	   = "ZY";
				}

				$vobligaciones = "O-99";	

				$vpasos      .= "4. Datos del cliente en TNS, ";
			}
			else
			{
				$vvalida   = false;
				$vmensaje .= "El tercero no existe en TNS: ".$vnit.". <br>";
			}
			if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

		
		}
	}

	if($vvalida)
	{
		
		$factura->cantidadDecimales    = $vcantidadDecimales;
		$factura->informacionAdicional = $vobserv;

		$destinatarios1 = new Destinatario();	
		$destinatarios1->canalDeEntrega = "0";

		$correodestinatario1 = new strings();	 
		$correodestinatario1->string[0] = trim($vemail);
		
		$vsql = "select ccnit,celular,correo,codsucursal,cantidadDecimales,valorTributoUnidad,no_validar_mail,email_alternativo,desviar_correo_a,enviar_documento_online,correo_copia,informacion_adicional,sumarImpuestosDelDetalle from cloud_empresas where id_empresa='".$idempresa."'";
		 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDataEmisor = array();
      $vdataemisor = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDataEmisor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdataemisor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDataEmisor = false;
          $vDataEmisor_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vdataemisor = false;
          $vdataemisor_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

		if(isset($vdataemisor[0][0]))
		{
			$vnitemisor   = $vdataemisor[0][0];
			$vcelemisor   = $vdataemisor[0][1];
			$vemailemisor = $vdataemisor[0][2];
			$codsucursal                          = $vdataemisor[0][3];
			$vcantidadDecimales                   = $vdataemisor[0][4];
			$vvalorTributoUnidad                  = $vdataemisor[0][5];
			$vnovalidaremail    				  = $vdataemisor[0][6];
			$vcorreoalternativo 				  = $vdataemisor[0][7];
			$vcorreodesvio                        = $vdataemisor[0][8];
			$vfacturaonline                       = $vdataemisor[0][9]; 
			$vinformacionAdicional                = $vdataemisor[0][11];
			$vsumarImpuestosDelDetalle            = $vdataemisor[0][12];
	 
			$correodestinatario1->string[1] = trim($vemailemisor);
		}
		
		if($vfacturaonline=="NO")
		{
			if(!empty($vemailemisor))
			{ 
				$correodestinatario1->string[1] = trim($vemailemisor);
			}
		}
		
		$destinatarios1->email = $correodestinatario1;
		$destinatarios1->nitProveedorReceptor = $vnit;
		
		$vtelef1 = str_replace(' ','',$vtelef1);
		$vtelef1 = str_replace('-','',$vtelef1);
		$vtelef1 = str_replace(' ','',$vtelef1);
		$vtelef1 = preg_replace('/[^0-9]/', '',$vtelef1);
		$vtelef1 = substr($vtelef1, 0, 10);
		$destinatarios1->telefono = $vtelef1;	
		
		$factura->cliente->destinatario[0] = $destinatarios1;

		$factura->cliente->telefono = $vtelef1;

		$tributos1 = new Tributos();	
		$tributos1->codigoImpuesto = $codImp;
		$factura->cliente->detallesTributarios[0] = $tributos1;

		$extensible1 = new Extensibles();
		$extensible1->controlInterno1 = "";
		$extensible1->controlInterno2 = "";
		$extensible1->nombre = "";
		$extensible1->valor = "";
		
		$vid_ciudad = 780;
		if(!empty($vcod_departamentoymunicipio))
		{
			$vsql = "select id from municipalities where code='".$vcod_departamentoymunicipio."'";
			 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vCiu = array();
      $vciu = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vCiu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vciu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vCiu = false;
          $vCiu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vciu = false;
          $vciu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
			if(isset($vciu[0][0]))
			{
				$vid_ciudad = $vciu[0][0];
			}
		}
		else
		{
			$vsql = "select id from municipalities where code='".$vcod_departamento.$vcodmunicipio."'";
			 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vCiu = array();
      $vciu = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vCiu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vciu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vCiu = false;
          $vCiu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vciu = false;
          $vciu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
			if(isset($vciu[0][0]))
			{
				$vid_ciudad = $vciu[0][0];
			}
		}

		$tributos1->extras[0] = $extensible1;

		$DireccionFiscal[0] = new Direccion();	
		$DireccionFiscal[0]->aCuidadoDe = "";
		$DireccionFiscal[0]->aLaAtencionDe = "";
		$DireccionFiscal[0]->bloque = "";
		$DireccionFiscal[0]->buzon = "";
		$DireccionFiscal[0]->calle = "";
		$DireccionFiscal[0]->calleAdicional = "";
		$DireccionFiscal[0]->ciudad = $vmunicipio;
		$DireccionFiscal[0]->codigoDepartamento = $vcod_departamento;
		$DireccionFiscal[0]->correccionHusoHorario = "";
		$DireccionFiscal[0]->departamento = $vdepartamento;
		$DireccionFiscal[0]->departamentoOrg = "";
		$DireccionFiscal[0]->habitacion = "";
		$DireccionFiscal[0]->distrito = "";
		$DireccionFiscal[0]->lenguaje = "es";
		$DireccionFiscal[0]->municipio = $vcodmu_codep;
		$DireccionFiscal[0]->nombreEdificio = "";
		$DireccionFiscal[0]->numeroParcela = "";
		$DireccionFiscal[0]->pais = "CO";
		$DireccionFiscal[0]->piso = "";
		$DireccionFiscal[0]->region = "";
		$DireccionFiscal[0]->subDivision = $vid_ciudad;
		$DireccionFiscal[0]->ubicacion = $vcod_departamentoymunicipio;
		$DireccionFiscal[0]->zonaPostal = $vpostal;	
		$DireccionFiscal[0]->direccion  = $direccion;

		$DireccionFiscal[1] = new Direccion();	
		$DireccionFiscal[1]->aCuidadoDe = "";
		$DireccionFiscal[1]->aLaAtencionDe = "";
		$DireccionFiscal[1]->bloque = "";
		$DireccionFiscal[1]->buzon = "";
		$DireccionFiscal[1]->calle = "";
		$DireccionFiscal[1]->calleAdicional = "";
		$DireccionFiscal[1]->ciudad = $vmunicipio;
		$DireccionFiscal[1]->codigoDepartamento = $vcod_departamento;
		$DireccionFiscal[1]->correccionHusoHorario = "";
		$DireccionFiscal[1]->departamento = $vdepartamento;
		$DireccionFiscal[1]->departamentoOrg = "";
		$DireccionFiscal[1]->habitacion = "";
		$DireccionFiscal[1]->distrito = ""; 
		$DireccionFiscal[1]->lenguaje = "es";
		$DireccionFiscal[1]->municipio = $vcodmu_codep;
		$DireccionFiscal[1]->nombreEdificio = "";
		$DireccionFiscal[1]->numeroParcela = "";
		$DireccionFiscal[1]->pais = "CO";
		$DireccionFiscal[1]->piso = "";
		$DireccionFiscal[1]->region = "";
		$DireccionFiscal[1]->subDivision = $vid_ciudad;
		$DireccionFiscal[1]->ubicacion = $vcod_departamentoymunicipio;
		$DireccionFiscal[1]->zonaPostal = $vpostal;	
		$DireccionFiscal[1]->direccion  = $direccion;

		$factura->cliente->direccionFiscal = $DireccionFiscal[0];
		$factura->cliente->direccionCliente= $DireccionFiscal[1];

		$factura->cliente->email = $vemail;


		$InfoLegalCliente = new InformacionLegalCliente();
		$InfoLegalCliente->codigoEstablecimiento = "00001";
		$InfoLegalCliente->nombreRegistroRUT = $vnombre;
		$InfoLegalCliente->numeroIdentificacion = $vnit;
		$InfoLegalCliente->numeroIdentificacionDV = $vdv;
		$InfoLegalCliente->tipoIdentificacion = $vtipodociden;	

		$factura->cliente->informacionLegalCliente = $InfoLegalCliente;


		$factura->cliente->nombreRazonSocial  = $vnombre;
		$factura->cliente->notificar = "SI";
		$factura->cliente->numeroDocumento = $vnit;
		$factura->cliente->numeroIdentificacionDV = $vdv;

		$sicoma = strpos($vobligaciones,",");
		if($sicoma === false)
		{
			$obligacionesCliente[0] = new Obligaciones();
			$obligacionesCliente[0]->obligaciones = $vobligaciones;
			$obligacionesCliente[0]->regimen = $vregimen;
			$factura->cliente->responsabilidadesRut[0] = $obligacionesCliente[0];
		}
		else
		{
			$vobliga = explode(",",$vobligaciones);
			$cont    = count($vobliga);

			for($i=0;$i<$cont;$i++)
			{
				$obligacionesCliente[$i] = new Obligaciones();
				$obligacionesCliente[$i]->obligaciones = $vobliga[$i];
				$obligacionesCliente[$i]->regimen = $vregimen;
				$factura->cliente->responsabilidadesRut[$i] = $obligacionesCliente[$i];
			}
		}

		$factura->cliente->tipoIdentificacion = $vtipodociden;
		$factura->cliente->tipoPersona = $vnatjuridica;

		$vfechaemision     = substr($vfecha, 0, -9);
		$vfechaemision     = trim($vfechaemision);
		$vcontfecha        = strlen($vfechaemision);
		if($vcontfecha==9)
		{
			$vfechaemision = $vfechaemision."0";
		}
		$vfechaemision     = $vfechaemision.date(' H:i:s');
		$vfechaemision     = date_create($vfechaemision);
		$vfechaemision     = date_format($vfechaemision,'Y-m-d H:i:s');	

		$factura->fechaEmision = $vfechaemision;

		if($vformapago=='CR')
		{
			$lafechadevencimiento	 = $vfecvence;
			$lafechadevencimiento	 = date_create($lafechadevencimiento);
			$lafechadevencimiento	 = date_format($lafechadevencimiento, 'Y-m-d');

			$factura->fechaVencimiento = $lafechadevencimiento;

			$pagos = new MediosDePago();
			$pagos->medioPago = "ZZZ";
			$pagos->metodoDePago = "2";
			$pagos->numeroDeReferencia = "01";
			$pagos->fechaDeVencimiento = $lafechadevencimiento;
		}
		else
		{
			$pagos = new MediosDePago();
			$pagos->medioPago = "10";
			$pagos->metodoDePago = "1";
			$pagos->numeroDeReferencia = "01";	
		}

		$factura->mediosDePago[0] = $pagos;
		$factura->moneda = "COP";
		$factura->redondeoAplicado = "0.00"	;
		$factura->rangoNumeracion = $vrango;
		$factura->tipoOperacion = "10";


		$factura->tipoDocumento="01";

		$factura->consecutivoDocumento = $vconsecutivo;
		
		$vsql0 = "select codproducto from cloud_exclusiones where id_empresa='".$idempresa."' and tipo in('OCULTO','EXTENSIBLE')";
		 
      $nm_select = $vsql0; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vExclu = array();
      $vexclu = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vExclu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vexclu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vExclu = false;
          $vExclu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vexclu = false;
          $vexclu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

		if(isset($vexclu[0][0]))
		{
			$vcont = count($vexclu );
			$vexclusiones = "";
			for($i=0;$i<$vcont;$i++)
			{
				$vex = $vexclu[$i][0];
				if($i==($vcont-1))
				{
					$vexclusiones .= " '".$vex."' ";
				}
				else
				{
					$vexclusiones .= " '".$vex."', ";
				}
			}
		}
		
		$vsql = "select codproducto from cloud_exclusiones where id_empresa='".$idempresa."' and tipo in('DESCUENTO')";
		 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDescuentoExclu = array();
      $vdescuentoexclu = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDescuentoExclu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdescuentoexclu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDescuentoExclu = false;
          $vDescuentoExclu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vdescuentoexclu = false;
          $vdescuentoexclu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

		if(isset($vdescuentoexclu[0][0]))
		{
			$vcont = count($vdescuentoexclu );
			$vdescuentoexclusion = "";
			for($i=0;$i<$vcont;$i++)
			{
				$vdesex = $vdescuentoexclu[$i][0];
				if($i==($vcont-1))
				{
					$vdescuentoexclusion .= " '".$vdesex."' ";
				}
				else
				{
					$vdescuentoexclusion .= " '".$vdesex."', ";
				}
			}

			$vsqldescuentoexclusion = "coalesce((IIF(p.codigo not in('01.001','01.002','01.003'),d.preciobase+(select sum(x.preciobase) from dekardex x inner join material y on x.matid=y.matid where x.kardexid='".$vkardexid."' and y.codigo in (".$vdescuentoexclusion.")),d.preciobase)),d.preciobase)";

			$vsqldescuentoexclusionneto = "coalesce((IIF(p.codigo not in('01.001','01.002','01.003'),d.precioneto+(select sum(x.precioneto) from dekardex x inner join material y on x.matid=y.matid where x.kardexid='".$vkardexid."' and y.codigo in (".$vdescuentoexclusion.")),d.precioneto)),d.precioneto)";
		}

		$vsql_detalle = "select d.canlista, p.codigo, p.descrip, p.codigo as codigo2, ROUND((".$vsqldescuentoexclusion."*d.canlista)) as preciobase, trim(iif(d.porciva='08','02','01')) as codigoimpuesto, d.porciva, ROUND(((".$vsqldescuentoexclusion."*d.canlista)*(d.porciva/100))) as precioiva, d.descuento, ROUND((".$vsqldescuentoexclusion."*d.canlista),$vcantidadDecimales) as bas_br,dekardexid,coalesce(mc.descrip,'SIN MARCA') as marca,p.unidad,p.unimay,p.factor,p.factorglb,d.tipund,ROUND(".$vsqldescuentoexclusion.",$vcantidadDecimales) as preciobase,(".$vsqldescuentoexclusionneto."*d.canlista) as precioneto FROM dekardex d left join material p on d.matid=p.matid left join marcaart mc on p.marcaartid=mc.marcaartid where d.kardexid='".$vkardexid."' and p.codigo not in(".$vexclusiones.") and p.codigo not in(".$vdescuentoexclusion.")";


		 
      $nm_select = $vsql_detalle; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDetalle = array();
      $vdetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDetalle = false;
          $vDetalle_erro = $this->Db->ErrorMsg();
          $vdetalle = false;
          $vdetalle_erro = $this->Db->ErrorMsg();
      } 
;

		if(isset($vdetalle[0][0]))
		{

			$vpasos      .= "6. Detalle del documento tns, ";

			for($i=0;$i<count($vdetalle );$i++)
			{
				$cant	=$vdetalle[$i][0];
				$codbp	=utf8_encode($vdetalle[$i][1]);
				$desc	=utf8_encode($vdetalle[$i][2]);
				$codest	=utf8_encode($vdetalle[$i][3]);
				$base	=$vdetalle[$i][4];
				$codImp	=$vdetalle[$i][5];
				$Timp	=$vdetalle[$i][6];
				$Timp	=$Timp;
				$eliva	=$vdetalle[$i][7];
				$eldesc	=$vdetalle[$i][8];
				$bas_br	=$vdetalle[$i][9];
				$tot	=$base+$eliva;
				$valun  = floatval($vdetalle[$i][17]);
				$vprecioneto = floatval($vdetalle[$i][18]);
				$sec=$i+1;
				$sec=strval($sec);
				$vdekardexid = $vdetalle[$i][10];
				$vmarca      = $vdetalle[$i][11];
				$vunidad     = trim($vdetalle[$i][12]);
				
				if(intval($Timp)==0)
				{
					$vbasetotalizado_delcero += $vprecioneto;
				}
				
				if($vproveedor=="FACILWEB")
				{
					if(!empty(trim($vunidad)))
					{
						$vsql = "select id from unit_measures where UPPER(name)='".strtoupper(trim($vunidad))."' limit 1";
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vUnid = array();
      $vunid = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vUnid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vunid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vUnid = false;
          $vUnid_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vunid = false;
          $vunid_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
						if(isset($vunid[0][0]))
						{
							$vunidad = $vunid[0][0];
						}
						else
						{
							$vunidad = "70";
						}
					}
				}
				else
				{
					 
      $nm_select = "select codigo_um from cloud_unidades_medida where codigo_um='".$vunidad."' or descripcion_um='".$vunidad."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vUnd = array();
      $vund = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vUnd[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vund[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vUnd = false;
          $vUnd_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vund = false;
          $vund_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

					if(isset($vund[0][0]))
					{
						$vunidad = $vund[0][0];
					}
					else
					{
						$vunidad = "WSD";
					}
				}

				$vtotal      += $tot;
				$vbasetotal  += $base;
				$vtotalitems++;
				$vserial = "";
				$vseriales = "";
				$vsql_serial = "select seriales from dekardexself where dekardexid='".$vdekardexid."'";
				 
      $nm_select = $vsql_serial; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vseriale = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vseriale[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vseriale = false;
          $vseriale_erro = $this->Db->ErrorMsg();
      } 
;

				if(isset($vseriale[0][0]))
				{
					$vserial = $vseriale[0][0];
					if(!empty($vserial))
					{
						$vseriales = $vserial; 
					}
				}

				$factDetalle[$i] = new FacturaDetalle();
				$factDetalle[$i]->cantidadPorEmpaque = "1";
				$factDetalle[$i]->cantidadReal = $cant;
				$factDetalle[$i]->cantidadRealUnidadMedida = $vunidad; 
				$factDetalle[$i]->cantidadUnidades = $cant;
				$factDetalle[$i]->codigoProducto = $codbp;
				$factDetalle[$i]->descripcion = $desc;
				$factDetalle[$i]->descripcionTecnica = $desc;
				$factDetalle[$i]->estandarCodigo = "999";
				$factDetalle[$i]->estandarCodigoProducto = $codest;
				
				 
      $nm_select = "select id_mandatorio,dv_mandatorio,tipo_id from cloud_exclusiones where codproducto='".$codbp."' and  id_empresa='".$idempresa."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vCodMan = array();
      $vcodman = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vCodMan[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vcodman[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vCodMan = false;
          $vCodMan_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vcodman = false;
          $vcodman_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

				if(isset($vcodman[0][0]))
				{
					$vid_mandatorio = $vcodman[0][0];
					$vdv_mandatorio = $vcodman[0][1];
					$vid_tipo       = $vcodman[0][2];

					$factDetalle[$i]->mandatorioNumeroIdentificacion   = $vid_mandatorio;
					$factDetalle[$i]->mandatorioNumeroIdentificacionDV = $vdv_mandatorio;
					$factDetalle[$i]->mandatorioTipoIdentificacion     = $vid_tipo;
				}

				if($eldesc>0)
				{
					$elmonto	= round($bas_br*(round(($eldesc/100), 2)), 2);
					$eldesc		= round($eldesc+0, 2);

					$descuentos[$t] = new cargosDescuentos();
							$descuentos[$t]->descripcion = "DESCUENTO COMERCIAL";
							$descuentos[$t]->indicador = 0;
							$descuentos[$t]->monto = $elmonto;
							$descuentos[$t]->montoBase = round($bas_br, 2);
							$descuentos[$t]->porcentaje = $eldesc;
							$descuentos[$t]->secuencia = $t+1;

					$factDetalle[$i]->cargosDescuentos[0] = $descuentos[$t];
					$t=$t+1;
				}
				
				if($vsumarImpuestosDelDetalle=="SI")
				{
					

					$base = round($tot/((intval($Timp)/100)+1),$vcantidadDecimales);
					$vivatotal += $base;
					$eliva = $tot-$base;
					$valun = round($base/$cant,$vcantidadDecimales);

					if(intval($Timp)>0)
					{
						$vbasetotalizado += $base;
						$vivatotalizado  += $eliva;
					}

					$impdet[$i] = new FacturaImpuestos;
					$impdet[$i]->baseImponibleTOTALImp = $base;
					$impdet[$i]->codigoTOTALImp = $codImp;
					$impdet[$i]->controlInterno = "";
					$impdet[$i]->porcentajeTOTALImp = $Timp;
					$impdet[$i]->unidadMedida = "";
					$impdet[$i]->unidadMedidaTributo = "";
					$impdet[$i]->valorTOTALImp = $eliva;
					$impdet[$i]->valorTributoUnidad = "";
					$factDetalle[$i]->impuestosDetalles[0] = $impdet[$i];
				}
				else
				{
					$impdet[$i] = new FacturaImpuestos;
					$impdet[$i]->baseImponibleTOTALImp = $base;
					$impdet[$i]->codigoTOTALImp = $codImp;
					$impdet[$i]->controlInterno = "";
					$impdet[$i]->porcentajeTOTALImp = $Timp;
					$impdet[$i]->unidadMedida = "";
					$impdet[$i]->unidadMedidaTributo = "";
					$impdet[$i]->valorTOTALImp = $eliva;
					$impdet[$i]->valorTributoUnidad = "";
					$factDetalle[$i]->impuestosDetalles[0] = $impdet[$i];
				}
				
				if($vsumarImpuestosDelDetalle=="SI")
				{

					$impTot[$i] = new ImpuestosTotales;
					$impTot[$i]->codigoTOTALImp = $codImp;
					$impTot[$i]->montoTotal = $eliva;
					$factDetalle[$i]->impuestosTotales[0] = $impTot[$i];
				}
				else
				{
					$impTot[$i] = new ImpuestosTotales;
					$impTot[$i]->codigoTOTALImp = $codImp;
					$impTot[$i]->montoTotal = $eliva;
					$factDetalle[$i]->impuestosTotales[0] = $impTot[$i];
				}

				$factDetalle[$i]->marca = "HKA";
				$factDetalle[$i]->muestraGratis = "0";
				$factDetalle[$i]->precioTotal = $tot;
				$factDetalle[$i]->precioTotalSinImpuestos = $base;
				$factDetalle[$i]->precioVentaUnitario = $valun;
				$factDetalle[$i]->secuencia = $sec;
				$factDetalle[$i]->unidadMedida = "WSD";		

				$factura->detalleDeFactura [$i] = $factDetalle[$i]; 

			}
		}


		$vsql_tipo_impuesto = "select ROUND(sum(d.preciobase*d.canmat),$vcantidadDecimales) as base, trim(iif(d.porciva='08','02','01')) as codigoimpuesto, porciva as porcentaje, ROUND(sum(d.precioiva*d.canlista),$vcantidadDecimales) as iva from dekardex d inner join material p on d.matid=p.matid where d.kardexid='".$vkardexid."' and p.codigo not in(".$vexclusiones.") group by d.porciva";
		
		
		 
      $nm_select = $vsql_tipo_impuesto; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $dt_impfac = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $dt_impfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $dt_impfac = false;
          $dt_impfac_erro = $this->Db->ErrorMsg();
      } 
;

		if(isset($dt_impfac[0][0]))
		{								
			for($t=0;$t<count($dt_impfac );$t++)
			{		
				$base		=$dt_impfac[$t][0];
				$base		=strval($base);
				$codImp		=$dt_impfac[$t][1];
				$codImp		=strval($codImp);
				$Timp		=$dt_impfac[$t][2];
				$Timp		=$Timp;
				$eliva		=$dt_impfac[$t][3];

				$objImpGen[$t] = new FacturaImpuestos;
				
				if($vsumarImpuestosDelDetalle=="SI")
				{
					if(intval($Timp)>0)
					{
						$objImpGen[$t]->baseImponibleTOTALImp = $vbasetotalizado;
					}
					else
					{
						$objImpGen[$t]->baseImponibleTOTALImp = $vbasetotalizado_delcero;
					}
				}
				else
				{
					$objImpGen[$t]->baseImponibleTOTALImp = $base;
				}

				$objImpGen[$t]->codigoTOTALImp = $codImp;
				$objImpGen[$t]->controlInterno = "";
				$objImpGen[$t]->porcentajeTOTALImp = $Timp;
				$objImpGen[$t]->unidadMedida = "";
				$objImpGen[$t]->unidadMedidaTributo = "";
				$objImpGen[$t]->valorTributoUnidad = "0.00";
				
				if($vsumarImpuestosDelDetalle=="SI")
				{
					if(intval($Timp)>0)
					{
						$objImpGen[$t]->valorTOTALImp = $vivatotalizado;
					}
					else
					{
						$objImpGen[$t]->valorTOTALImp = 0;
					}
				}
				else
				{
					if(intval($Timp)>0)
					{
						$objImpGen[$t]->valorTOTALImp = $eliva;
					}
					else
					{
						$objImpGen[$t]->valorTOTALImp = 0;
					}
				}

				$factura->impuestosGenerales[$t] = $objImpGen[$t];
			}

			$vpasos      .= "7. Impuestos generales, ";
		}

		
		$vsql_iva = "select trim(iif(d.porciva='08','02','01')) as codigoimpuesto, ROUND((sum(d.preciobase*d.canlista)*(d.porciva/100)),$vcantidadDecimales) as iva, ROUND(sum(d.preciobase*d.canlista),$vcantidadDecimales) as base from dekardex d inner join material p on d.matid=p.matid where d.kardexid='".$vkardexid."' and p.codigo not in(".$vexclusiones.") group by iif(d.porciva='08','02','01'),d.porciva";

		 
      $nm_select = $vsql_iva; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $dt_impTfac = array();
      $dt_imptfac = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $dt_impTfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dt_imptfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $dt_impTfac = false;
          $dt_impTfac_erro = $this->Db->ErrorMsg();
          $dt_imptfac = false;
          $dt_imptfac_erro = $this->Db->ErrorMsg();
      } 
;
		
		
		$codImp	 = "";
		$eliva	 = 0;
		$base	 = 0;
		$tot	 = 0;

		if(isset($dt_imptfac[0][0]))
		{
			$vcont = count($dt_imptfac );
			for($i=0;$i<$vcont;$i++)
			{
				$codImp	 = $dt_imptfac[$i][0];
				$codImp	 = strval($codImp);
				$eliva	+= floatval($dt_imptfac[$i][1]);
				$base	+= floatval($dt_imptfac[$i][2]);
				$tot	+= $base+$eliva;
			}
		}
		
		$impTot[0] = new ImpuestosTotales;
		$impTot[0]->codigoTOTALImp = $codImp;
		
		if($vsumarImpuestosDelDetalle=="SI")
		{
			if($viconsumototal>0)
			{
				$vivatotalizado = $vivatotalizado - $viconsumototal;
			}
			$impTot[0]->montoTotal = $vivatotalizado;
		}
		else
		{
			if($viconsumototal>0)
			{
				$eliva = $eliva - $viconsumototal;
			}
			$impTot[0]->montoTotal = $eliva;
		}
		
		$factura->impuestosTotales[0] = $impTot[0];

		$vpasos      .= "8. Suma por tipos de IVA, ";
		
		if($vsumarImpuestosDelDetalle=="SI")
		{
			$factura->totalBaseImponible = ($vbasetotalizado+$vbasetotalizado_delcero);
			$factura->totalSinImpuestos  = ($vbasetotalizado+$vbasetotalizado_delcero);
		}
		else
		{
			$factura->totalBaseImponible = floatval($vbasetotal);
			$factura->totalSinImpuestos  = floatval($vbasetotal);
		}

		$factura->totalBrutoConImpuesto = $vtotal;
		$factura->totalMonto =$vtotal;
		$factura->totalProductos=$vtotalitems;
		
		$factura->tipoDocumento = $vTipoDoc;

		$vsql_motivo = "select m.codigo from kardex k inner join motivodev m on k.motivodevid=m.motivodevid where k.kardexid='".$vkardexid."' and m.motivodevid<>1";
		 
      $nm_select = $vsql_motivo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vMotivo = array();
      $vmotivo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vMotivo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vmotivo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vMotivo = false;
          $vMotivo_erro = $this->Db->ErrorMsg();
          $vmotivo = false;
          $vmotivo_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($vmotivo[0][0]))
		{
			$vMotNota = trim($vmotivo[0][0]);
		}
		
		$vprovee_anterior  = "";
		$vservidor_anterior= "";
		$vtoken_anterior   = "";
		$vpasswor_anterior = "";
		
		$vsql = "select if(modo='DESARROLLO',token_pruebas,tokenempresa) as  tokenempresa,if(modo='DESARROLLO',password_pruebas,tokenpassword) as tokenpassword,if(modo='DESARROLLO',servidor1_pruebas,servidor1) as servidor1,modo,(select pa.proveedor from cloud_webservice_proveedores pa where pa.id_proveedores=wfe.proveedor_anterior) as provee_anterior, (select pa.servidor1 from cloud_webservice_proveedores pa where pa.id_proveedores=wfe.proveedor_anterior) as servidor_anterior, wfe.token_anterior, wfe.passwor_anterior from cloud_webservicefe wfe where wfe.id_empresa='".$this->sc_temp_gidempresa."'";

		 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fv2 = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fv2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fv2 = false;
          $ds_fv2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
		if(isset($ds_fv2[0][0]) and (isset($ds_fv2[0][1])) and (isset($ds_fv2[0][2])))
		{
			$vprovee_anterior  = $ds_fv2[0][4];
			$vservidor_anterior= $ds_fv2[0][5];
			$vtoken_anterior   = $ds_fv2[0][6];
			$vpasswor_anterior = $ds_fv2[0][7];
		}

		$vcufe = "";
		$vFafectada = "";
		$vfechaemisionfac = "";
		$vnumfac = "";
	
		
		$vsql = "select factid from kardexself where kardexid='".$vkardexid."'";
		 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vKardexidDocRef = array();
      $vkardexiddocref = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vKardexidDocRef[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vkardexiddocref[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vKardexidDocRef = false;
          $vKardexidDocRef_erro = $this->Db->ErrorMsg();
          $vkardexiddocref = false;
          $vkardexiddocref_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($vkardexiddocref[0][0]))
		{
			$vkid = $vkardexiddocref[0][0];
			if(!empty($vkid))
			{
				$vsql = "select sn_cufe,sn_pjfe,numero,fecha from kardex where kardexid='".$vkid."'";
				 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDataDocRef = array();
      $vdatadocref = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDataDocRef[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatadocref[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDataDocRef = false;
          $vDataDocRef_erro = $this->Db->ErrorMsg();
          $vdatadocref = false;
          $vdatadocref_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($vdatadocref[0][0]))
				{
					$vseguimiento  .= "1. Buscando en el factid, ";
					$vcufe            = $vdatadocref[0][0];
					$vFafectada       = $vdatadocref[0][1].$vdatadocref[0][2];
					$vfechaemisionfac = $vdatadocref[0][3];
					$vfechaemisionfac = substr($vfechaemisionfac, 0, -9);
					$vfechaemisionfac = date_create($vfechaemisionfac);
					$vfechaemisionfac = date_format($vfechaemisionfac,'Y-m-d');
				}
			}
		}
		
		
		if(empty($vcufe))
		{
			$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'NROFACTVEN'";

			 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiExisteNro = array();
      $vsiexistenro = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiExisteNro[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsiexistenro[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiExisteNro = false;
          $vSiExisteNro_erro = $this->Db->ErrorMsg();
          $vsiexistenro = false;
          $vsiexistenro_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($vsiexistenro[0][0]))
			{
				$vsql = "select nrofactven from kardex where kardexid='".$vkardexid."'";
				 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDocuid = array();
      $vdocuid = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDocuid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdocuid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDocuid = false;
          $vDocuid_erro = $this->Db->ErrorMsg();
          $vdocuid = false;
          $vdocuid_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($vdocuid[0][0]))
				{
					$vnrofv = $vdocuid[0][0];
					if(!empty($vnrofv))
					{
						$vsql = "select (codprefijo||numero) as num,fecha,sn_cufe from kardex where codcomp='FV' and codprefijo||numero='".$vnrofv."'";
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vData2 = array();
      $vdata2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vData2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdata2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vData2 = false;
          $vData2_erro = $this->Db->ErrorMsg();
          $vdata2 = false;
          $vdata2_erro = $this->Db->ErrorMsg();
      } 
;
						if(isset($vdata2[0][0]))
						{
							$vseguimiento  .= "2. Buscando en el NROFACTVEN, ";
							
							$vFafectada       = $vdata2[0][0];
							$vfechaemisionfac = $vdata2[0][1];
							$vfechaemisionfac = substr($vfechaemisionfac, 0, -9);
							$vfechaemisionfac = date_create($vfechaemisionfac);
							$vfechaemisionfac = date_format($vfechaemisionfac,'Y-m-d');
							$vcufe            = $vdata2[0][2];
						}
					}
				}
			}
		}
		
		
		if(empty($vcufe))
		{
			$vsql = "select docuid from kardex where kardexid='".$vkardexid."'";
			 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDocuid = array();
      $vdocuid = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDocuid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdocuid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDocuid = false;
          $vDocuid_erro = $this->Db->ErrorMsg();
          $vdocuid = false;
          $vdocuid_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($vdocuid[0][0]))
			{
				$vkid2 = $vdocuid[0][0];
				if(!empty($vkid2))
				{
					$vsql = "select (codprefijo||numero) as num,fecha from documento where docuid='".$vkid2."'";
					 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vData2 = array();
      $vdata2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vData2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdata2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vData2 = false;
          $vData2_erro = $this->Db->ErrorMsg();
          $vdata2 = false;
          $vdata2_erro = $this->Db->ErrorMsg();
      } 
;
					if(isset($vdata2[0][0]))
					{
						$vFafectada       = $vdata2[0][0];
						$vfechaemisionfac = $vdata2[0][1];
						$vfechaemisionfac = substr($vfechaemisionfac, 0, -9);
						$vfechaemisionfac = date_create($vfechaemisionfac);
						$vfechaemisionfac = date_format($vfechaemisionfac,'Y-m-d');
						
						$vsql = "select if(modo='DESARROLLO',token_pruebas,tokenempresa) as  tokenempresa,if(modo='DESARROLLO',password_pruebas,tokenpassword) as tokenpassword,if(modo='DESARROLLO',servidor1_pruebas,servidor1) as servidor1,modo from cloud_webservicefe where id_empresa='".$this->sc_temp_gidempresa."'";
	
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fv = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fv = false;
          $ds_fv_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
						if(isset($ds_fv[0][0]) and (isset($ds_fv[0][1])) and (isset($ds_fv[0][2])))
						{
							if(!empty(($ds_fv[0][0])) and (!empty($ds_fv[0][1])) and (!empty($ds_fv[0][2])))
							{
								$vseguimiento  .= "3. Buscando en el webservice, ";
								
								
								
							}
						}
					}
				}
			}
		}
		
		if(empty($vcufe))
		{
			$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'NROFACTVEN'";

			 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiExisteNro = array();
      $vsiexistenro = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiExisteNro[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsiexistenro[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiExisteNro = false;
          $vSiExisteNro_erro = $this->Db->ErrorMsg();
          $vsiexistenro = false;
          $vsiexistenro_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($vsiexistenro[0][0]))
			{
				$vsql = "select coalesce(nrofactven,'') as nro from kardex where kardexid='".$vkardexid."'";
				 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDocuid = array();
      $vdocuid = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDocuid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdocuid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDocuid = false;
          $vDocuid_erro = $this->Db->ErrorMsg();
          $vdocuid = false;
          $vdocuid_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($vdocuid[0][0]))
				{
					$vnrofv = $vdocuid[0][0];
					if(!empty($vnrofv))
					{
						
						$vsql = "select (codprefijo||numero) as num,fecha,sn_cufe from kardex where codcomp='FV' and codprefijo||numero='".$vnrofv."'";
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vData2 = array();
      $vdata2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vData2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdata2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vData2 = false;
          $vData2_erro = $this->Db->ErrorMsg();
          $vdata2 = false;
          $vdata2_erro = $this->Db->ErrorMsg();
      } 
;
						if(isset($vdata2[0][0]))
						{
							$vFafectada       = $vdata2[0][0];
							$vfechaemisionfac = $vdata2[0][1];
							$vfechaemisionfac = substr($vfechaemisionfac, 0, -9);
							$vfechaemisionfac = date_create($vfechaemisionfac);
							$vfechaemisionfac = date_format($vfechaemisionfac,'Y-m-d');
							$vcufe            = $vdata2[0][2];
						}
						else
						{
							$vsql = "select (codprefijo||numero) as num,fecha from documento where codcomp='FV' and codprefijo||numero='".$vnrofv."'";
							 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vData2 = array();
      $vdata2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vData2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdata2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vData2 = false;
          $vData2_erro = $this->Db->ErrorMsg();
          $vdata2 = false;
          $vdata2_erro = $this->Db->ErrorMsg();
      } 
;
							if(isset($vdata2[0][0]))
							{
								$vFafectada       = $vdata2[0][0];
								$vfechaemisionfac = $vdata2[0][1];
								$vfechaemisionfac = substr($vfechaemisionfac, 0, -9);
								$vfechaemisionfac = date_create($vfechaemisionfac);
								$vanio_fv         = date_format($vfechaemisionfac,'Y'); 
								$vfechaemisionfac = date_format($vfechaemisionfac,'Y-m-d');
								
								
								if(empty($vcufe))
								{
															
									$vsql = "select if(modo='DESARROLLO',token_pruebas,tokenempresa) as  tokenempresa,if(modo='DESARROLLO',password_pruebas,tokenpassword) as tokenpassword,if(modo='DESARROLLO',servidor1_pruebas,servidor1) as servidor1,modo,token_anterior,passwor_anterior,(select wp.servidor1 from cloud_webservice_proveedores wp where wp.id_proveedores=w.proveedor_anterior limit 1) as servidor1_ante, (select wp.proveedor from cloud_webservice_proveedores wp where wp.id_proveedores=w.proveedor_anterior limit 1) as proveedor_ant from cloud_webservicefe w where id_empresa='".$this->sc_temp_gidempresa."'";

									 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fv4 = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fv4[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fv4 = false;
          $ds_fv4_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
									if(isset($ds_fv4[0][0]) and (isset($ds_fv4[0][1])) and (isset($ds_fv4[0][2])))
									{
										if(!empty(($ds_fv4[0][0])) and (!empty($ds_fv4[0][1])) and (!empty($ds_fv4[0][2])))
										{
											$vservidor           = $ds_fv4[0][2];
											$TokenEnterprise     = $ds_fv4[0][0];
											$TokenAutorizacion   = $ds_fv4[0][1];
											$vmodo               = $ds_fv4[0][3];
											$vtoken_anterior     = $ds_fv4[0][4]; 
											$vpasswor_anterior   = $ds_fv4[0][5];
											$vservidor1_anteri   = $ds_fv4[0][6]; 
											$vproveedor_ant      = $ds_fv4[0][7]; 

											if($vanio_fv==date("Y"))
											{
												$vseguimiento  .= "4. Buscando en el webservice 2, ";

												error_reporting(E_ERROR);
												$WebService = new WebService();
												$options = array('exceptions' => true, 'trace' => true);

												$params;
												$params = array (
															'tokenEmpresa'	=>$TokenEnterprise,
															'tokenPassword'	=>$TokenAutorizacion,
															'documento'		=>$vFafectada);

												$resultado = $WebService->getEstadoDocumento($vservidor,$options,$params);


												if($resultado["codigo"]==200)
												{

													$vcufe    = $resultado["cufe"];
												}
											}
											else
											{
												switch($vproveedor_ant)
												{
													case 'HKA':
														$vseguimiento  .= "* Buscando en el webservice anterior, ";

														error_reporting(E_ERROR);
														$WebService = new WebService();
														$options = array('exceptions' => true, 'trace' => true);

														$params;
														$params = array (
																	'tokenEmpresa'	=>$vtoken_anterior,
																	'tokenPassword'	=>$vpasswor_anterior,
																	'documento'		=>$vFafectada);

														$resultado = $WebService->getEstadoDocumento($vservidor1_anteri,$options,$params);


														if($resultado["codigo"]==200)
														{

															$vcufe    = $resultado["cufe"];
														}
													break;

													case 'DATAICO':

													break;

													case 'FACILWEB':

													break;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		
		if(empty($vcufe))
		{
	
			$vsql = "select observ from kardex where kardexid='".$vkardexid."'";
			 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDocuid = array();
      $vdocuid = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDocuid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdocuid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDocuid = false;
          $vDocuid_erro = $this->Db->ErrorMsg();
          $vdocuid = false;
          $vdocuid_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($vdocuid[0][0]))
			{
				$vnrofv = $vdocuid[0][0];
				if(!empty($vnrofv))
				{
					$vsql = "select (codprefijo||numero) as num,fecha from documento where codcomp='FV' and codprefijo||numero='".$vnrofv."'";
					 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vData2 = array();
      $vdata2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vData2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdata2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vData2 = false;
          $vData2_erro = $this->Db->ErrorMsg();
          $vdata2 = false;
          $vdata2_erro = $this->Db->ErrorMsg();
      } 
;
					if(isset($vdata2[0][0]))
					{
						$vFafectada       = $vdata2[0][0];
						$vfechaemisionfac = $vdata2[0][1];
						$vfechaemisionfac = substr($vfechaemisionfac, 0, -9);
						$vfechaemisionfac = date_create($vfechaemisionfac);
						$vanio_fv         = date_format($vfechaemisionfac,'Y'); 
						$vfechaemisionfac = date_format($vfechaemisionfac,'Y-m-d');
						
						$vsql = "select if(modo='DESARROLLO',token_pruebas,tokenempresa) as  tokenempresa,if(modo='DESARROLLO',password_pruebas,tokenpassword) as tokenpassword,if(modo='DESARROLLO',servidor1_pruebas,servidor1) as servidor1,modo,token_anterior,passwor_anterior,(select wp.servidor1 from cloud_webservice_proveedores wp where wp.id_proveedores=w.proveedor_anterior limit 1) as servidor1_anterior, (select wp.proveedor from cloud_webservice_proveedores wp where wp.id_proveedores=w.proveedor_anterior limit 1) as proveedor_ant from cloud_webservicefe w where id_empresa='".$this->sc_temp_gidempresa."'";

						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fv = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fv = false;
          $ds_fv_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
						if(isset($ds_fv[0][0]) and (isset($ds_fv[0][1])) and (isset($ds_fv[0][2])))
						{
							if(!empty(($ds_fv[0][0])) and (!empty($ds_fv[0][1])) and (!empty($ds_fv[0][2])))
							{
								$vservidor           = $ds_fv[0][2];
								$TokenEnterprise     = $ds_fv[0][0];
								$TokenAutorizacion   = $ds_fv[0][1];
								$vmodo               = $ds_fv[0][3];
								$vtoken_anterior     = $ds_fv[0][4]; 
								$vpasswor_anterior   = $ds_fv[0][5];
								$vservidor1_anteri   = $ds_fv[0][6]; 
								$vproveedor_ant      = $ds_fv[0][7]; 
								
								if($vanio_fv==date("Y"))
								{
									$vseguimiento  .= "5. Buscando en el webservice 3, ";

									error_reporting(E_ERROR);
									$WebService = new WebService();
									$options = array('exceptions' => true, 'trace' => true);

									$params;
									$params = array (
												'tokenEmpresa'	=>$TokenEnterprise,
												'tokenPassword'	=>$TokenAutorizacion,
												'documento'		=>$vFafectada);

									$resultado = $WebService->getEstadoDocumento($vservidor,$options,$params);


									if($resultado["codigo"]==200)
									{

										$vcufe    = $resultado["cufe"];
									}
								}
								else
								{
									switch($vproveedor_ant)
									{
										case 'HKA':
											$vseguimiento  .= "** Buscando en el webservice anterior, ";

											error_reporting(E_ERROR);
											$WebService = new WebService();
											$options = array('exceptions' => true, 'trace' => true);

											$params;
											$params = array (
														'tokenEmpresa'	=>$vtoken_anterior,
														'tokenPassword'	=>$vpasswor_anterior,
														'documento'		=>$vFafectada);

											$resultado = $WebService->getEstadoDocumento($vservidor1_anteri,$options,$params);


											if($resultado["codigo"]==200)
											{

												$vcufe    = $resultado["cufe"];
											}
										break;
											
										case 'DATAICO':
											
										break;
											
										case 'FACILWEB':
											
										break;
									}
								}
							}
						}

					}
					else
					{
						$vsql = "select numero_fe,fecha_factura from cloud_kardex where tipo='FV' and concat(prefijo,numero)='".$vnrofv."'";
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vData2 = array();
      $vdata2 = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vData2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdata2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vData2 = false;
          $vData2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vdata2 = false;
          $vdata2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
						if(isset($vdata2[0][0]))
						{
							$vFafectada       = $vdata2[0][0];
							$vfechaemisionfac = $vdata2[0][1];
							$vfechaemisionfac = date_create($vfechaemisionfac);
							$vanio_fv         = date_format($vfechaemisionfac,'Y');
							$vfechaemisionfac = date_format($vfechaemisionfac,'Y-m-d');

							$vsql = "select if(modo='DESARROLLO',token_pruebas,tokenempresa) as  tokenempresa,if(modo='DESARROLLO',password_pruebas,tokenpassword) as tokenpassword,if(modo='DESARROLLO',servidor1_pruebas,servidor1) as servidor1,modo,token_anterior,passwor_anterior,(select wp.servidor1 from cloud_webservice_proveedores wp where wp.id_proveedores=w.proveedor_anterior limit 1) as servidor1_anterior, (select wp.proveedor from cloud_webservice_proveedores wp where wp.id_proveedores=w.proveedor_anterior limit 1) as proveedor_ant from cloud_webservicefe w where id_empresa='".$this->sc_temp_gidempresa."'";

							 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fv = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fv = false;
          $ds_fv_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
							if(isset($ds_fv[0][0]) and (isset($ds_fv[0][1])) and (isset($ds_fv[0][2])))
							{
								if(!empty(($ds_fv[0][0])) and (!empty($ds_fv[0][1])) and (!empty($ds_fv[0][2])))
								{
									$vseguimiento  .= "6. Buscando en el webservice 4, ";
									
									error_reporting(E_ERROR);
									$WebService = new WebService();
									$options = array('exceptions' => true, 'trace' => true);

									$params;
									$vservidor = $ds_fv[0][2];
									$TokenEnterprise = $ds_fv[0][0];
									$TokenAutorizacion = $ds_fv[0][1];
									$vmodo = $ds_fv[0][3];
									$vtoken_anterior     = $ds_fv[0][4]; 
									$vpasswor_anterior   = $ds_fv[0][5];
									$vservidor1_anteri   = $ds_fv[0][6]; 
									$vproveedor_ant      = $ds_fv[0][7]; 

									if($vanio_fv==date("Y"))
									{
										$vseguimiento  .= "5. Buscando en el webservice 3, ";

										error_reporting(E_ERROR);
										$WebService = new WebService();
										$options = array('exceptions' => true, 'trace' => true);

										$params;
										$params = array (
													'tokenEmpresa'	=>$TokenEnterprise,
													'tokenPassword'	=>$TokenAutorizacion,
													'documento'		=>$vFafectada);

										$resultado = $WebService->getEstadoDocumento($vservidor,$options,$params);


										if($resultado["codigo"]==200)
										{

											$vcufe    = $resultado["cufe"];
										}
									}
									else
									{
										switch($vproveedor_ant)
										{
											case 'HKA':
												$vseguimiento  .= "** Buscando en el webservice anterior, ";

												error_reporting(E_ERROR);
												$WebService = new WebService();
												$options = array('exceptions' => true, 'trace' => true);

												$params;
												$params = array (
															'tokenEmpresa'	=>$vtoken_anterior,
															'tokenPassword'	=>$vpasswor_anterior,
															'documento'		=>$vFafectada);

												$resultado = $WebService->getEstadoDocumento($vservidor1_anteri,$options,$params);


												if($resultado["codigo"]==200)
												{

													$vcufe    = $resultado["cufe"];
												}
											break;

											case 'DATAICO':

											break;

											case 'FACILWEB':

											break;
										}
									}
								}
							}
						}
					}
				}
			}
		}
		
		
		if(!empty($vcufe))
		{
			$DocRef = new DocumentoReferenciado();
			$DocRef->codigoEstatusDocumento = $vMotNota;
			$DocRef->codigoInterno = '4';
			$DocRef->cufeDocReferenciado = $vcufe;
			$DocRef->numeroDocumento=$vFafectada;
			$factura->documentosReferenciados[0] =$DocRef;

			$DocRef1 = new DocumentoReferenciado();
			$DocRef1->codigoInterno = '5';
			$DocRef1->cufeDocReferenciado = $vcufe;
			$DocRef1->fecha = $vfechaemisionfac;
			$DocRef1->numeroDocumento= $vFafectada;
			$factura->documentosReferenciados[1] =$DocRef1;
			
		}
			
		}


		$adjuntos="0";
		$params = array(
			 'tokenEmpresa' =>  $TokenEnterprise,
			 'tokenPassword' =>$TokenAutorizacion,
			 'factura' => $factura,
			 'adjuntos' => $adjuntos
		);

		if(empty($vmensaje))
		{
			if($vpost=="SI")
			{
				
				switch($vproveedor)
				{
					case 'HKA':
						$resultado = $WebService->enviar($vServidor,$options,$params);

						switch($resultado["codigo"])
						{
							case 200:
								$vmen =  "<center style='margin-bottom:10px;'>Documento ".$vpjfe."/".$vconsecutivo." Se ha aceptado y procesado con éxito!"."</center><br>";

								$vcufe    = $resultado["cufe"];
								$vfecha   = $vfechaemision;
								$vfecha   = substr($vfecha, 0, -9);
								$vfecha   = date_create($vfecha);
								$vfecha   = date_format($vfecha,'Y-m-d');
								$vestado  = $resultado["codigo"];
								$vavisos  = json_encode($resultado);
								$vnumero  = $vpjfe.$vconsecutivo;
								$vtercero = $vnit2;
								$vqr      = $resultado["qr"];
								$vxml     = $resultado["xml"];

								if($vprint_r=="SI")
								{
									print_r($resultado);
								}

								if(isset($resultado["fechaAceptacionDIAN"]))
								{
									$vfechavalidacion = $resultado["fechaAceptacionDIAN"];
								}
								if(isset($resultado["fechaRespuesta"]))
								{
									$vfechavalidacion = $resultado["fechaRespuesta"];
								}

								$vfechavalidacion = substr($vfechavalidacion, 0, 18);

								$vsql_update = "update kardex set sn_cufe='".$vcufe."',sn_pjfe='".$vpjfe."',sn_fe_validacion='".$vfechavalidacion."' where kardexid='".$vkardexid."'";
								
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

								$vruta = $_SERVER["DOCUMENT_ROOT"];

								if (!file_exists($vruta.'/qr'))
								{
									mkdir($vruta.'/qr', 0777, true);
								}

								sc_include_library("prj", "qr", "qrlib.php", true, true);
								sc_include_library("prj", "php-image-magician", "php_image_magician.php", true, true);

								$vrutaqr  = $vruta.'/qr/'.$vpjfe.$vconsecutivo.'.png';
								$vrutaqr2 = $vruta.'/qr/'.$vpjfe.$vconsecutivo.'.bmp';
								if(!empty($vnombre_pc_red))
								{
									$vrutaqr3 = '\\\\'.$vnombre_pc_red.'\\qr\\'.$vcodprefijo.$vnumero.'.bmp';
								}

								if(!empty($vcufe))
								{
									QRcode::png($vqr,$vrutaqr,QR_ECLEVEL_H,12,5);

									$magicianObj = new imageLib($vrutaqr);
									$magicianObj -> saveImage($vrutaqr2);  

									$path = $vrutaqr;

									$type = pathinfo($path, PATHINFO_EXTENSION);

									$data = file_get_contents($path);

									$base64 = 'data:image/' .$type.';base64,'.base64_encode($data);

									$vsql_update = "update kardex set sn_rutaqr='".$vrutaqr2."',sn_qr_base64='".$base64."',sn_proveedor='".$vproveedor."',sn_token_emp='".$TokenEnterprise."',sn_token_pass='".$TokenAutorizacion."',sn_servidor='".$vServidor."' where kardexid='".$vkardexid."'";

									if(!empty($vnombre_pc_red))
									{
										$vsql_update = "update kardex set sn_rutaqr='".$vrutaqr3."',sn_qr_base64='".$base64."' where kardexid='".$vkardexid."'";
									}
									
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

									$sql="insert into cloud_kardex SET cufe = '".$vcufe."',numero_fe='".$vnumero."', estado='".$vestado."', avisos='".$vavisos."', id_empresa='".$idempresa."',tipo='DV',prefijo='".$vcodprefijo."',numero='".$vconsecutivo."',tercero='".$vtercero."',fecha_factura='".$vfecha."',horacrea='".$vhoracreacion."',fecha_validacion='".$vfechavalidacion."',fac_devuelta='".$vFafectada."',xml='".$vxml."',qr_base64='".$base64."'";

									 
      if (in_array(strtolower($this->Ini->nm_con_conn_mysql['tpbanco']), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vconsecutivo."'"; 
      }
      else
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vconsecutivo."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSi = array();
      $vsi = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[9] = (strpos(strtolower($SCrx->fields[9]), "e")) ? (float)$SCrx->fields[9] : $SCrx->fields[9];
                 $SCrx->fields[9] = (string)$SCrx->fields[9];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSi = false;
          $vSi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vsi = false;
          $vsi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

									if(isset($vsi[0][0]))
									{
										$sql="update cloud_kardex SET cufe = '".$vcufe."', numero_fe='".$vnumero."', estado='".$vestado."', avisos='".$vavisos."',qr_base64='".$base64."',horacrea='".$vhoracreacion."',fecha_validacion='".$vfechavalidacion."',fecha_factura='".$vfecha."',fac_devuelta='".$vFafectada."',xml='".$vxml."' where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vconsecutivo."'";
									}

									
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;

									$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'CUFE'";

									 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiCUFETNS = array();
      $vsicufetns = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiCUFETNS[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsicufetns[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiCUFETNS = false;
          $vSiCUFETNS_erro = $this->Db->ErrorMsg();
          $vsicufetns = false;
          $vsicufetns_erro = $this->Db->ErrorMsg();
      } 
;
									if(isset($vsicufetns[0][0]))
									{
										$vsql_update = "update kardex set cufe='".$vcufe."' where kardexid='".$vkardexid."'";
										
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									}

									$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'ESTADODIAN'";

									 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiCUFETNS2 = array();
      $vsicufetns2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiCUFETNS2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsicufetns2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiCUFETNS2 = false;
          $vSiCUFETNS2_erro = $this->Db->ErrorMsg();
          $vsicufetns2 = false;
          $vsicufetns2_erro = $this->Db->ErrorMsg();
      } 
;
									if(isset($vsicufetns2[0][0]))
									{
										$vsql_update = "update kardex set estadodian='EXITOSA' where kardexid='".$vkardexid."'";
										
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									}
								}
								echo $vmen;

							break;
							case 201:

								$vmen =  "<center style='margin-bottom:10px;'>Documento ".$vpjfe."/".$vconsecutivo." Se ha aceptado y procesado con éxito!"."</center><br>";

								$vcufe    = $resultado["cufe"];
								$vfecha   = $vfechaemision;
								$vfecha   = substr($vfecha, 0, -9);
								$vfecha   = date_create($vfecha);
								$vfecha   = date_format($vfecha,'Y-m-d');
								$vestado  = $resultado["codigo"];
								$vavisos  = json_encode($resultado);
								$vnumero  = $vpjfe.$vconsecutivo;
								$vtercero = $vnit2;
								$vqr      = $resultado["qr"];
								$vxml     = $resultado["xml"];

								if($vprint_r=="SI")
								{
									print_r($resultado);
								}

								if(isset($resultado["fechaAceptacionDIAN"]))
								{
									$vfechavalidacion = $resultado["fechaAceptacionDIAN"];
								}
								if(isset($resultado["fechaRespuesta"]))
								{
									$vfechavalidacion = $resultado["fechaRespuesta"];
								}

								$vfechavalidacion = substr($vfechavalidacion, 0, 18);

								$vsql_update = "update kardex set sn_cufe='".$vcufe."',sn_pjfe='".$vpjfe."',sn_fe_validacion='".$vfechavalidacion."' where kardexid='".$vkardexid."'";
								
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

								$vruta = $_SERVER["DOCUMENT_ROOT"];

								if (!file_exists($vruta.'/qr'))
								{
									mkdir($vruta.'/qr', 0777, true);
								}

								sc_include_library("prj", "qr", "qrlib.php", true, true);
								sc_include_library("prj", "php-image-magician", "php_image_magician.php", true, true);

								$vrutaqr  = $vruta.'/qr/'.$vpjfe.$vconsecutivo.'.png';
								$vrutaqr2 = $vruta.'/qr/'.$vpjfe.$vconsecutivo.'.bmp';
								if(!empty($vnombre_pc_red))
								{
									$vrutaqr3 = '\\\\'.$vnombre_pc_red.'\\qr\\'.$vcodprefijo.$vnumero.'.bmp';
								}

								if(!empty($vcufe))
								{
									QRcode::png($vqr,$vrutaqr,QR_ECLEVEL_H,12,5);

									$magicianObj = new imageLib($vrutaqr);
									$magicianObj -> saveImage($vrutaqr2);  

									$path = $vrutaqr;

									$type = pathinfo($path, PATHINFO_EXTENSION);

									$data = file_get_contents($path);

									$base64 = 'data:image/' .$type.';base64,'.base64_encode($data);

									$vsql_update = "update kardex set sn_rutaqr='".$vrutaqr2."',sn_qr_base64='".$base64."' where kardexid='".$vkardexid."'";
									if(!empty($vnombre_pc_red))
									{
										$vsql_update = "update kardex set sn_rutaqr='".$vrutaqr3."',sn_qr_base64='".$base64."' where kardexid='".$vkardexid."'";
									}
									
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

									$sql="insert into cloud_kardex SET cufe = '".$vcufe."',numero_fe='".$vnumero."', estado='".$vestado."', avisos='".$vavisos."', id_empresa='".$idempresa."',tipo='DV',prefijo='".$vcodprefijo."',numero='".$vconsecutivo."',tercero='".$vtercero."',fecha_factura='".$vfecha."',horacrea='".$vhoracreacion."',fecha_validacion='".$vfechavalidacion."',fac_devuelta='".$vFafectada."',xml='".$vxml."',qr_base64='".$base64."'";

									 
      if (in_array(strtolower($this->Ini->nm_con_conn_mysql['tpbanco']), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vconsecutivo."'"; 
      }
      else
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vconsecutivo."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSi = array();
      $vsi = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[9] = (strpos(strtolower($SCrx->fields[9]), "e")) ? (float)$SCrx->fields[9] : $SCrx->fields[9];
                 $SCrx->fields[9] = (string)$SCrx->fields[9];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSi = false;
          $vSi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vsi = false;
          $vsi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

									if(isset($vsi[0][0]))
									{
										$sql="update cloud_kardex SET cufe = '".$vcufe."', numero_fe='".$vnumero."', estado='".$vestado."', avisos='".$vavisos."',qr_base64='".$base64."',horacrea='".$vhoracreacion."',fecha_validacion='".$vfechavalidacion."',fecha_factura='".$vfecha."',fac_devuelta='".$vFafectada."',xml='".$vxml."' where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vconsecutivo."'";
									}

									
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;

									$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'CUFE'";

									 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiCUFETNS = array();
      $vsicufetns = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiCUFETNS[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsicufetns[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiCUFETNS = false;
          $vSiCUFETNS_erro = $this->Db->ErrorMsg();
          $vsicufetns = false;
          $vsicufetns_erro = $this->Db->ErrorMsg();
      } 
;
									if(isset($vsicufetns[0][0]))
									{
										$vsql_update = "update kardex set cufe='".$vcufe."' where kardexid='".$vkardexid."'";
										
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									}

									$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'ESTADODIAN'";

									 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiCUFETNS2 = array();
      $vsicufetns2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiCUFETNS2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsicufetns2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiCUFETNS2 = false;
          $vSiCUFETNS2_erro = $this->Db->ErrorMsg();
          $vsicufetns2 = false;
          $vsicufetns2_erro = $this->Db->ErrorMsg();
      } 
;
									if(isset($vsicufetns2[0][0]))
									{
										$vsql_update = "update kardex set estadodian='EXITOSA' where kardexid='".$vkardexid."'";
										
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									}
								}
								echo $vmen;
								
							break;
							case 114:
								$vmen = 'Documento emitido previamente.';
								echo $vmen;
							break;
							default:
								$vmen = 'Hubo un problema al enviar el documento: <br>';
								echo $vmen;
								print_r($resultado);
							break;
						}
					break;
						
					case 'DATAICO':
						$vparametros = array();
						$vcliente    = array();
						$vencabezado = array();
						$vdetalle    = array();
						$vparametros["uuid"] = "";
						
						$vsql = "select nombre_archivos from cloud_kardex where cufe='".$vcufe."'";
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vUUID2 = array();
      $vuuid2 = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vUUID2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vuuid2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vUUID2 = false;
          $vUUID2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vuuid2 = false;
          $vuuid2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
						if(isset($vuuid2[0][0]))
						{
							$vparametros["uuid"] = $vuuid2[0][0];
						}
						
						
						$vparametros["url"] = $vServidor2;
						$vparametros["dataico_auth"] = $TokenEnterprise;
						$vparametros["modo"] = $vmodo;
						$vparametros["dataico_account_id"] = $TokenAutorizacion;
						$vparametros["send_dian"] = false;
						$vparametros["send_email"] = false;
						if($venvio_dian==1)
						{
							$vparametros["send_dian"] = true;
						}

						if($venvio_cliente==1)
						{
							$vparametros["send_email"] = true;
						}

						$vcliente['email'] = $vemail;
						$vcliente['phone'] = $vtelef1;
						if($vnatjuridica==2)
						{
							$vcliente['party_type'] = 'PERSONA_NATURAL' ; 
						}
						else
						{
							$vcliente['party_type'] = 'PERSONA_JURIDICA' ; 
						}
						$vcliente['party_identification'] = $vnit;
						switch($vtipodociden)
						{
							case 13:
								$vcliente['party_identification_type'] = 'CC'; 
							break;
							
							case 31:
								$vcliente['party_identification_type'] = 'NIT'; 
							break;
						}
						$vcliente['regimen'] = 'ORDINARIO';  
						$vcliente['address_line'] = $direccion;
						$vcliente['country_code'] = 'CO';
						if($vnatjuridica==2)
						{
							$vpartesnombre = explode(" ",$vnombre);
							switch(count($vpartesnombre))
							{
								case 2:
									$vcliente['first_name'] = $vpartesnombre[0];
									$vcliente['family_name'] = $vpartesnombre[1];
								break;
									
								case 3:
									$vcliente['first_name'] = $vpartesnombre[0];
									$vcliente['family_name'] = $vpartesnombre[1]." ".$vpartesnombre[2];
								break;
									
								case 4:
									$vcliente['first_name'] = $vpartesnombre[0]." ".$vpartesnombre[1];
									$vcliente['family_name'] = $vpartesnombre[2]." ".$vpartesnombre[3];
								break;
									
								case 5:
									$vcliente['first_name'] = $vpartesnombre[0]." ".$vpartesnombre[1];
									$vcliente['family_name'] = $vpartesnombre[2]." ".$vpartesnombre[3]." ".$vpartesnombre[4];
								break;
									
								case 6:
									$vcliente['first_name'] = $vpartesnombre[0]." ".$vpartesnombre[1]." ".$vpartesnombre[2];
									$vcliente['family_name'] = $vpartesnombre[3]." ".$vpartesnombre[4]." ".$vpartesnombre[5];
								break;
							}
							
						}
						else
						{
							$vcliente['company_name'] = $vnombre;
						}
						 
						if($vregimen==48)
						{
							$vcliente['tax_level_code'] = 'COMUN';
						}
						else
						{
							$vcliente['tax_level_code'] = 'SIMPLIFICADO';
						}
						$vcliente['city']  = $vcodmunicipio;
						$vcliente['department'] = $vcod_departamento;

						$vfecha2                   = date_create($vfechaemision);
						$vencabezado["fecha"]      = date_format($vfecha2,'d/m/Y');
						$vencabezado["fecha_pago"] = date_format($vfecha2,'d/m/Y H:i:s');
						if($vmodo==1)
						{
							$vencabezado["numero"] = $vconsecutivo_pruebas;
						}
						else
						{
							$vencabezado["numero"] = $vnumero;
						}
						if($vformapago=="CR")
						{
							$vencabezado["forma_pago"] = 'CREDITO';
						}
						else
						{
							$vencabezado["forma_pago"] = 'DEBITO';
						}
						$vencabezado["medio_pago"] = 'CASH'; 
						$vencabezado["observacion"]= '';
						$vencabezado["resolucion"] = $vresolucion;
						$vencabezado["prefijo"]    = $vpjfe;

						if(count($factura->detalleDeFactura)>0)
						{
							for($i=0;$i<count($factura->detalleDeFactura);$i++)
							{
								$vdetalle[$i]["codigo"]       = $factura->detalleDeFactura[$i]->codigoProducto;
								$vdetalle[$i]["cantidad"]     = $factura->detalleDeFactura[$i]->cantidadReal;
								$vdetalle[$i]["descripcion"]  = $factura->detalleDeFactura[$i]->descripcion;
								$vdetalle[$i]["precio"]       = round($factura->detalleDeFactura[$i]->precioTotal/$factura->detalleDeFactura[$i]->cantidadReal,$vcantidadDecimales) / ((intval($factura->detalleDeFactura[$i]->impuestosDetalles[0]->porcentajeTOTALImp)/100)+1);
								$vdetalle[$i]["tax_rate"]     = intval($factura->detalleDeFactura[$i]->impuestosDetalles[0]->porcentajeTOTALImp);
								
								$vdetalle[$i]["tax_category"] = 'IVA';
							}
						}
						
						
						$vrete    = array();
						if($vretencion>0 and $vporretencion>0)
						{
							$vrete[] = array(
								'tax_category' =>  'RET_FUENTE',
								'tax_rate' => floatval($vporretencion)
								 );
						}
						
						if($vretica>0 and $vvrrica>0)
						{
							$vrete[] = array(
								'tax_category' =>  'RET_ICA',
								'tax_rate' => floatval($vretica/10)
								 );
						}
						
						if($vretiva>0 and $vvrriva>0)
						{
							$vrete[] = array(
								'tax_category' =>  'RET_IVA',
								'tax_rate' => floatval($vretiva)
								 );
						}
						

						function fEnviarDataico($vparametros, $vcliente, $vencabezado, $vdetalle,$vretenciones)
						{
							$documento = array();
							$items = array();
							$numbering = array();
							$notes = array();
							$retentions = array();

							$documento['actions']['send_dian']  = $vparametros["send_dian"];
							$documento['actions']['send_email'] = $vparametros["send_email"];
							$documento['credit_note']['reason'] = 'ANULACION';

							if($vparametros["modo"] == 1)
							{	
							  $documento['credit_note']['env'] = 'PRUEBAS';
							}
							else
							{
							  $documento['credit_note']['env'] = 'PRODUCCION';
							}	

							$documento['credit_note']['dataico_account_id'] = $vparametros["dataico_account_id"];
							$documento['credit_note']['invoice_id'] = $vparametros["uuid"];


							$documento['credit_note']['issue_date']    = $vencabezado["fecha_pago"];   

							$documento['credit_note']['payment_means_type'] = $vencabezado["forma_pago"];

							$documento['credit_note']['payment_means'] = $vencabezado["medio_pago"];

							if(!empty($vencabezado["observacion"]))
							{
								$documento['credit_note']['notes'] = array($vencabezado["observacion"]);
							}
							

							$numbering['resolution_number'] = $vencabezado["resolucion"];  
							$numbering['prefix']   = $vencabezado["prefijo"];	
							$numbering['flexible'] = true;

							for($i=0;$i<count($vdetalle);$i++)
							{
								$impuestos = array( 
									"tax_rate" =>  $vdetalle[$i]["tax_rate"],
									"tax_category" =>  $vdetalle[$i]["tax_category"],
								);

								$item = array(
									'sku' =>  $vdetalle[$i]["codigo"],
									'quantity' => $vdetalle[$i]["cantidad"] ,
									'description' => $vdetalle[$i]["descripcion"],
									'price' => $vdetalle[$i]["precio"],
									'original_price' => $vdetalle[$i]["precio"],
									'taxes' => array($impuestos)
									);
								$items[$i] = $item;
							}
							

							if(count($vretenciones)>0)
							{
								$documento['credit_note']['retentions'] = $vretenciones; 
							}

							$documento['credit_note']['number']    = $vencabezado["numero"];
							$documento['credit_note']['numbering'] = $numbering;
							$documento['credit_note']['customer']  = $vcliente;
							$documento['credit_note']['items']     = $items;

							$documento = json_encode($documento, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


							$varchivo4 = fopen("dataico_nota_credito_json.json","w+");
							fwrite($varchivo4,$documento);


							$parms = array('data'  => $documento);
							$parms = http_build_query($parms);
							

							$response = sc_webservice("curl", $vparametros["url"] , 80, "POST", $documento, array(CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER=>false, CURLOPT_HTTPHEADER => array(
									'Content-Type: application/json', 'auth-token: ' . $vparametros["dataico_auth"]  ),), 30);

							$vrespuesta = json_decode($response);
							$varchivo3 = fopen("dataico_nota_credito_respuesta.json","w+");
							fwrite($varchivo3,$response);
							
							$vcufe = "";
							$venlace_pdf = "";
							$venlace_xml = "";
							$vqr_code = "";
							$vfechavalidacion = date("Y-m-d H:i:s");
							$vuuid = "";
							
							
							if(isset($vrespuesta->uuid))
							{
								if(!empty($vrespuesta->uuid))
								{
									$vuuid = $vrespuesta->uuid;
								}
							
								if(isset($vrespuesta->cufe))
								{
									if(!empty($vrespuesta->cufe))
									{
										$vcufe = $vrespuesta->cufe;
									}
								}

								if(!empty($vcufe))
								{
									if(isset($vrespuesta->dian_status))
									{
										echo "<div style='margin-bottom:10px;border-radius:8px;color:white;background:#5877b9;padding:8px;'>ESTADO DIAN: ".$vrespuesta->dian_status."</div>";
									}

									if(isset($vrespuesta->qrcode))
									{
										if(!empty($vrespuesta->qrcode))
										{
											$vqr_code = "data:image/png;base64,".base64_encode($vrespuesta->qrcode);
										}
									}

									if(isset($vrespuesta->xml_url))
									{
										if(!empty($vrespuesta->xml_url))
										{
											echo "<div style='margin-bottom:10px;border-radius:8px;color:white;background:#5877b9;padding:8px;'><a href='".stripslashes($vrespuesta->xml_url)."' target='_blank' style='color:white;'>Ver XML</a></div>";

											$venlace_xml = $vrespuesta->xml_url;
										}
									}

									if(isset($vrespuesta->pdf_url))
									{
										if(!empty($vrespuesta->pdf_url))
										{
											echo "<div style='margin-bottom:10px;border-radius:8px;color:white;background:#5877b9;padding:8px;'><a href='".stripslashes($vrespuesta->pdf_url)."' target='_blank' style='color:white;'>Ver PDF</a></div>";

											$venlace_pdf = $vrespuesta->pdf_url;
										}
									}
									
									return json_encode(array(
								
										"cufe"=>$vcufe,
										"enlace_xml"=>$venlace_xml,
										"enlace_pdf"=>$venlace_pdf,
										"qr"=>$vqr_code,
										"fecha_validacion"=>$vfechavalidacion,
										"uuid" => $vuuid
									));

								}
							}
							else
							{
								if(isset($vrespuesta->errors))
								{
									return $vrespuesta;
								}
							}
						}

						$vretorno  = fEnviarDataico($vparametros, $vcliente, $vencabezado, $vdetalle, $vrete);
						
						if(isset($vretorno->errors))
						{
							print_r($vretorno);
						}
						else
						{
							$vretorno2 = json_decode($vretorno);
						}
						
						if(isset($vretorno2->cufe))
						{
							
							if(!empty($vretorno2->cufe))
							{
								$vcufe = $vretorno2->cufe;
								$venlace_pdf = $vretorno2->enlace_pdf;
								$venlace_xml = $vretorno2->enlace_xml;
								$vqr_code = $vretorno2->qr;
								$vfechavalidacion = $vretorno2->fecha_validacion;
								$vuuid = $vretorno2->uuid;

								$sql="insert into cloud_kardex SET cufe = '".$vcufe."',numero_fe='".$vpjfe.$vnumero."',estado='200',id_empresa='".$idempresa."',tipo='DV',prefijo='".$vcodprefijo."',numero='".$vnumero."',tercero='".$vnit2."',fecha_factura='".$vfecha."',horacrea='".$vhoracrea."',fecha_validacion='".$vfechavalidacion."',qr_base64='".$vqr_code."',enlace_pdf='".$venlace_pdf."',xml='".$venlace_xml."',nombre_archivos='".$vuuid."'";
								

								 
      if (in_array(strtolower($this->Ini->nm_con_conn_mysql['tpbanco']), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vnumero."'"; 
      }
      else
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vnumero."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSi = array();
      $vsi = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[9] = (strpos(strtolower($SCrx->fields[9]), "e")) ? (float)$SCrx->fields[9] : $SCrx->fields[9];
                 $SCrx->fields[9] = (string)$SCrx->fields[9];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSi = false;
          $vSi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vsi = false;
          $vsi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

								if(isset($vsi[0][0]))
								{
									$sql="update cloud_kardex SET cufe = '".$vcufe."',numero_fe='".$vpjfe.$vnumero."',estado='200',tercero='".$vnit2."',fecha_factura='".$vfecha."',horacrea='".$vhoracrea."',fecha_validacion='".$vfechavalidacion."',qr_base64='".$vqr_code."',enlace_pdf='".$venlace_pdf."',xml='".$venlace_xml."'',nombre_archivos='".$vuuid."'  where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vnumero."'";
								}

								
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;

								$vsql_update = "update kardex set sn_cufe='".$vcufe."',sn_pjfe='".$vpjfe."',sn_fe_validacion='".$vfechavalidacion."',sn_proveedor='".$vproveedor."',sn_token_emp='".$TokenEnterprise."',sn_token_pass='".$TokenAutorizacion."',sn_servidor='".$vServidor."' where kardexid='".$vkardexid."'";

								if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

								
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
								if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

							}
						}
						
					break;
						
					case 'TECH':
						
					break;
						
					case 'FACILWEB':
						$vfecha  = $vfechaemision;
						$vfecha  = date_create($vfecha);
						$vfecha  = date_format($vfecha,'Y-m-d');	
						$vhora   = date("H:i:s");
						$vprefijo= $vpjfe;
						$vccnit  = $vnit;
						$vdv     = $this->fDigito($vnit);
						$vnombre = $vnombre;
						$vcelular= $vtelef1;
						$vdireccion= $direccion;
						
						$vsql = "select if(modo='DESARROLLO',servidor1_pruebas,servidor1) as servidor1,if(modo='DESARROLLO',servidor2_pruebas,servidor2) as servidor2,if(modo='DESARROLLO',token_pruebas,tokenempresa) as  tokenempresa,if(modo='DESARROLLO',password_pruebas,tokenpassword) as tokenpassword, if(modo='DESARROLLO',1,0) as modos,testsetId from cloud_webservicefe where id_empresa='".$idempresa."'";
	
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fv2 = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fv2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fv2 = false;
          $ds_fv2_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
						if(isset($ds_fv2[0][2]))
						{
							$TokenEnterprise   = $ds_fv2[0][2];
							$TokenAutorizacion = $ds_fv2[0][3];
						}
						$vtoken = $TokenEnterprise;

						$vcorreo = $vemail;
						
						$vciudad = 780;
						if(!empty($vcod_departamentoymunicipio))
						{
							$vsql = "select id from municipalities where code='".$vcod_departamentoymunicipio."'";
							 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vCiu = array();
      $vciu = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vCiu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vciu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vCiu = false;
          $vCiu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vciu = false;
          $vciu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
							if(isset($vciu[0][0]))
							{
								$vciudad = $vciu[0][0];
							}
						}
						else
						{
							$vsql = "select id from municipalities where code='".$vcod_departamento.$vcodmunicipio."'";
							 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vCiu = array();
      $vciu = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vCiu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vciu[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vCiu = false;
          $vCiu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vciu = false;
          $vciu_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
							if(isset($vciu[0][0]))
							{
								$vciudad = $vciu[0][0];
							}
						}
	
						$vobservaciones = $vobserv;

						$curl = curl_init();
						$vurl   = $vServidor2;
						if($vmodo=="DESARROLLO")
						{
							$vurl .= "/".$vTestSetId; 
						}
				
						
						$vdatos["billing_reference"]["number"]       =  $vFafectada;
						$vdatos["billing_reference"]["uuid"]         =  $vcufe;
						$vdatos["billing_reference"]["issue_date"]   =  $vfechaemisionfac;
						
						$vmotivo = "";
						$vsql    = "select descripcion from motivodev where codigo='".$vMotNota."'";
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vMot = array();
      $vmot = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vMot[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vmot[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vMot = false;
          $vMot_erro = $this->Db->ErrorMsg();
          $vmot = false;
          $vmot_erro = $this->Db->ErrorMsg();
      } 
;
						if(isset($vmot[0][0]))
						{
							$vmotivo = $vmot[0][0];
						}

						$vdatos["discrepancyresponsecode"]        =  intval($vMotNota);
						$vdatos["discrepancyresponsedescription"] =  $vmotivo;
						
						$vhora = date("H:i:s");
						$vdatos["number"] =  intval($vnumero);
						$vdatos["resolution_number"] = $vresolucion;
						$vdatos["prefix"] =  $vpjfe;
						$vdatos["type_document_id"] =  4;
						$vdatos["date"] =  $vfecha;
						$vdatos["time"] =  $vhora;
						$vdatos["notes"] =  $vobservaciones;
						$vdatos["sendmail"] =  true;
						
						$vdatos["establishment_phone"]       =  $vtelefonosuc;
						$vdatos["establishment_address"]     =  $vdireccionsuc;
						$vdatos["establishment_name"]        =  $vnombreestablecimiento;
						$vdatos["establishment_email"]       =  $vcorreo_suc;
						$vdatos["disable_confirmation_text"] =  true;
						if(!empty($vlogo_suc))
						{
							$vruta_logo_suc = "../_lib/file/img/logos/$idempresa/".$vlogo_suc;
							if(file_exists($vruta_logo_suc))
							{
								$contenidoBinario = file_get_contents($vruta_logo_suc);
								$imagenComoBase64 = base64_encode($contenidoBinario);
								
								$vdatos["establishment_logo"] =  $imagenComoBase64;
							}
						}


						if(!empty($vtexto_encabezado))
						{
							$vdatos["head_note"] =  $vtexto_encabezado;
						}

						if(!empty($vtexto_pie_pagina))
						{
							$vdatos["foot_note"] =  $vtexto_pie_pagina;
						}
						
						$vccnit  = $vnit;
						$vdv     = $this->fDigito($vnit);

						$vdatos["customer"]["identification_number"] =  intval($vnit);
						$vdatos["customer"]["dv"] =  $vdv;
						$vdatos["customer"]["name"] =  $vnombre;
						$vdatos["customer"]["phone"] =  trim($vtelef1);
						$vdatos["customer"]["address"] =  $direccion;
						$vdatos["customer"]["email"] =  trim($vemail);
						$vdatos["customer"]["merchant_registration"] =  "0000000-00";
						
						if($vregimen==48)
						{
							$vregimen = "1";
						}
						else
						{
							$vregimen = "2";
						}
						$vtipodoc = 3;
						switch($vtipodociden)
						{
							case 13:
								$vtipodoc = "3";
							break;
							
							case 31:
								$vtipodoc = "6";
							break;
						}
						$vtipopersona = 2;
						if($vnatjuridica == 2)
						{
							$vtipopersona = "2";
						}
						else
						{
							$vtipopersona = "1"; 
						}
						
						$vdatos["customer"]["type_document_identification_id"] =  intval($vtipodoc);
						$vdatos["customer"]["type_organization_id"] =  intval($vtipopersona);
						$vdatos["customer"]["municipality_id"] =  intval($vciudad);
						$vdatos["customer"]["type_regime_id"] =  intval($vregimen);

						$vdescripcion = '';
						$vporciva = '';
						$vcanlista= '0';
						$vpreciou = '0';
						$vprecioiva = '0';
						$vparcvta = '0';
						$vnota = '';
						$vbodega = '';
						$vcodigo = '';
						$vbasetotal = 0;
						$contador   = 0;
						$vivatotal  = 0;
						$vbasetotal = 0;
						
						$vivatotales      = Array();
						$vbasetotales     = Array();
						$vporcentajesivas = Array();
						

						if(count($factura->detalleDeFactura)>0)
						{
							for($i=0;$i<count($factura->detalleDeFactura);$i++)
							{
								
								$vdescripcion = $factura->detalleDeFactura[$i]->descripcion;
								$vporciva     = intval($factura->detalleDeFactura[$i]->impuestosDetalles[0]->porcentajeTOTALImp);
								$vcanlista    = $factura->detalleDeFactura[$i]->cantidadReal;
								$vparcvta     = $factura->detalleDeFactura[$i]->precioTotal;
								if(!empty(strtoupper(trim($factura->detalleDeFactura[$i]->cantidadRealUnidadMedida))))
								{
									$vunidad  = strtoupper(trim($factura->detalleDeFactura[$i]->cantidadRealUnidadMedida));
								}
								
								
								$vprecioiva   = 0;
								$vbaselinea   = 0;
								
								if($vporciva>0)
								{
									$vbaselinea   = $vparcvta/(($vporciva/100)+1);
									$vprecioiva   = $vparcvta - $vbaselinea;
									$vpreciou     = $vbaselinea/$vcanlista;
									$vbasetotal  += $vbaselinea;
									$vivatotal   += $vprecioiva;
									$vporcentajesiva = $vporciva;
								}
								else
								{
									$vpreciou     = $vparcvta/$vcanlista;
								}
								
								
								if(count($vporcentajesivas)>0)
								{
									$v_vali = true;
									for($e=0;$e<count($vporcentajesivas);$e++)
									{
										if($vporcentajesivas[$e]==$vporciva)
										{
											$vivatotales[$e]   += $vprecioiva;
											$vbasetotales[$e]  += $vbaselinea;
											$v_vali = false;
										}
									}
									
									if($v_vali)
									{
										$vivatotales [count($vporcentajesivas)]  = $vprecioiva;
										$vbasetotales[count($vporcentajesivas)]  = $vbaselinea;
										$vporcentajesivas[count($vporcentajesivas)] = $vporciva;
									}
								}
								else
								{
									$vivatotales [0]  = $vprecioiva;
									$vbasetotales[0]  = $vbaselinea;
									$vporcentajesivas[0] = $vporciva;
								}
								
								$vnota        = '';
								$vbodega      = 0;
								$vcodigo      = $factura->detalleDeFactura[$i]->codigoProducto;

								$vdatos["credit_note_lines"][$contador]["unit_measure_id"] = $vunidad;
								$vdatos["credit_note_lines"][$contador]["invoiced_quantity"] = $vcanlista;
								
								if($vporciva>0)
								{
									$vdatos["credit_note_lines"][$contador]["line_extension_amount"] = $vbaselinea;
								}
								else
								{
									$vdatos["credit_note_lines"][$contador]["line_extension_amount"] = $vparcvta;
								}
								
								$vdatos["credit_note_lines"][$contador]["free_of_charge_indicator"] = false;

								$vdatos["credit_note_lines"][$contador]["allowance_charges"][0]["charge_indicator"] =  false;
								$vdatos["credit_note_lines"][$contador]["allowance_charges"][0]["allowance_charge_reason"] =  "DESCUENTO GENERAL";
								$vdatos["credit_note_lines"][$contador]["allowance_charges"][0]["amount"] =  "0.00";
								$vdatos["credit_note_lines"][$contador]["allowance_charges"][0]["base_amount"] =  $vparcvta;
								
								if($vporciva>0)
								{
									$vdatos["credit_note_lines"][$contador]["tax_totals"][0]["tax_id"] = 1;
									$vdatos["credit_note_lines"][$contador]["tax_totals"][0]["tax_amount"] = $vprecioiva;
									$vdatos["credit_note_lines"][$contador]["tax_totals"][0]["taxable_amount"] = $vbaselinea;
									$vdatos["credit_note_lines"][$contador]["tax_totals"][0]["percent"] = $vporciva.".00";
								}

								if(isset($factura->detalleDeFactura[$i]->mandatorioNumeroIdentificacion))
								{
									if(!empty($factura->detalleDeFactura[$i]->mandatorioNumeroIdentificacion))
									{
										$vdatos["credit_note_lines"][$contador]["agentparty"] = $factura->detalleDeFactura[$i]->mandatorioNumeroIdentificacion;
										$vdatos["credit_note_lines"][$contador]["agentparty_dv"] = $this->fDigito($factura->detalleDeFactura[$i]->mandatorioNumeroIdentificacion);
									}
								}


								$vdatos["credit_note_lines"][$contador]["description"] = $vdescripcion;
								$vdatos["credit_note_lines"][$contador]["code"] = $vcodigo;
								$vdatos["credit_note_lines"][$contador]["type_item_identification_id"] = 4;
								$vdatos["credit_note_lines"][$contador]["price_amount"] = $vpreciou;
								$vdatos["credit_note_lines"][$contador]["base_quantity"] = $vcanlista;	
								
								if(!empty($factura->detalleDeFactura[$i]->nota))
								{
									$vdatos["credit_note_lines"][$contador]["notes"]  = $factura->detalleDeFactura[$i]->nota;
								}

								$contador++;
							}

						}
						
						$vdatos["allowance_charges"][0]["discount_id"] =  1;
						$vdatos["allowance_charges"][0]["charge_indicator"] =  false;
						$vdatos["allowance_charges"][0]["allowance_charge_reason"] =  "DESCUENTO GENERAL";
						$vdatos["allowance_charges"][0]["amount"] =  "0.00";
						
						if(count($vporcentajesivas)>0)
						{
							for($i=0;$i<count($vporcentajesivas);$i++)
							{
								$vdatos["tax_totals"][$i]["tax_id"] = 1;
								$vdatos["tax_totals"][$i]["tax_amount"] = $vivatotales[$i];
								$vdatos["tax_totals"][$i]["percent"] = $vporcentajesivas[$i];
								$vdatos["tax_totals"][$i]["taxable_amount"] = $vbasetotales[$i];
							}
						}
						
						if($vivatotal>0)
						{
							$vdatos["allowance_charges"][0]["base_amount"] =  $vbasetotal;
							$vdatos["legal_monetary_totals"]["line_extension_amount"] =  $vbasetotal;
							$vdatos["legal_monetary_totals"]["tax_exclusive_amount"] =  $vbasetotal;
						}
						else
						{
							$vdatos["allowance_charges"][0]["base_amount"] =  $vtotal;
							$vdatos["legal_monetary_totals"]["line_extension_amount"] =  $vtotal;
							$vdatos["legal_monetary_totals"]["tax_exclusive_amount"] =  "0.00";
						}
						
						$vdatos["legal_monetary_totals"]["tax_inclusive_amount"] =  $vtotal;
						$vdatos["legal_monetary_totals"]["allowance_total_amount"] =  "0.00";
						$vdatos["legal_monetary_totals"]["charge_total_amount"] =  "0.00";
						$vdatos["legal_monetary_totals"]["payable_amount"] =  $vtotal;
						

						$vdatos = json_encode($vdatos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);	

						$varchivo = fopen("nota_credito.json","w+");
						fwrite($varchivo,$vdatos);
						
						$varchivo2 = fopen("nota_credito_trazabilidad.txt","w+");
						fwrite($varchivo2,$vseguimiento);
						

						$vdconexion = array(
						  CURLOPT_URL => $vurl,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => '',
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => 'POST',
						  CURLOPT_POSTFIELDS =>$vdatos,
						  CURLOPT_HTTPHEADER => array(
							'Content-Type: application/json',
							'Accept: application/json',
							'Authorization: Bearer '.$vtoken
						  ),
						);

						curl_setopt_array($curl, $vdconexion);

						$response = curl_exec($curl);
						$vinvoicexml = "";
						$vzipinvoicexml = "";
						$vunsignedinvoicexml = "";
						$vreqfe = "";
						$vrptafe = "";
						$vurlinvoicexml = "";
						$vurlinvoicepdf = "";
						$vurlinvoiceattached = "";
						$vcufe = "";
						$vQRStr  = "";

						curl_close($curl);
						$json = json_decode($response);


						$varchivo2 = fopen("nota_credito_respuesta.json","w+");
						fwrite($varchivo2,$response);

						if(isset($json->errors))
						{	
							$vmensaje = "";
							foreach($json->errors as $clave=>$valor){
								$vmensaje .= strtoupper($clave).": <br>";
								$vinfo = "";
								foreach($valor as $ids=>$valores)
								{
									$vinfo .= "*. ".$valores."<br>";
								}
								$vmensaje .= $vinfo;		
							}

							echo $vmensaje;
						}
						else
						{
							if(isset($json->message))
							{
							}

							if(isset($json->invoicexml))
							{
								$vinvoicexml = (string)$json->invoicexml;
							}

							if(isset($json->zipinvoicexml))
							{
								$vzipinvoicexml = (string)$json->zipinvoicexml;
							}

							if(isset($json->urlinvoicexml))
							{
								$vurlinvoicexml = (string)$json->urlinvoicexml;
							}

							if(isset($json->urlinvoicepdf))
							{
								$vurlinvoicepdf = (string)$json->urlinvoicepdf;
							}

							if(isset($json->cude))
							{
								$vcufe = (string)$json->cude;
							}

							if(isset($json->QRStr))
							{
								$vQRStr = (string)$json->QRStr;
							}

							$vsql = "select nit from cloud_empresas where id_empresa='".$idempresa."'";
							 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $r5 = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $r5[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $r5 = false;
          $r5_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
							if(isset($r5[0][0]))
							{
								$vurlinvoicepdf = "https://www.facilwebnube.com/apidian2020/public/index.php/api/download/".$r5[0][0]."/".$vurlinvoicepdf;
								$vurlinvoicexml = "https://www.facilwebnube.com/apidian2020/public/index.php/api/download/".$r5[0][0]."/".$vurlinvoicexml; 
							}
							
							$vfechavalidacion = date("Y-m-d H:i:s");
							$vqr_code    = $vQRStr;
							$venlace_pdf = $vurlinvoicepdf;
							$venlace_xml = $vurlinvoicexml;
							$vuuid       = $vcufe;

							if(isset($json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->IsValid))
							{
								if($json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->IsValid=="true")
								{
									$vruta = $_SERVER["DOCUMENT_ROOT"];

									if (!file_exists($vruta.'/qr'))
									{
										mkdir($vruta.'/qr', 0777, true);
									}
									
									$vrutaqr1        = $vruta.'/qr/';
									$vnombrearchivo  = $vpjfe.$vconsecutivo.'.jpg';
									$vrutaqr3        = '';
									
									if(!empty($vnombre_pc_red))
									{
										$vrutaqr3 = '\\\\'.$vnombre_pc_red.'\\qr\\'.$vpjfe.$vnumero.'.jpg';
									}
									
									try
									{
										$this->fCrearQR($vnombrearchivo,$vQRStr,$vrutaqr1);
									}
									catch (Exception $e)
									{
									}

									$sql="insert into cloud_kardex SET cufe = '".$vcufe."',numero_fe='".$vpjfe.$vnumero."',estado='200',id_empresa='".$idempresa."',tipo='DV',prefijo='".$vcodprefijo."',numero='".$vnumero."',tercero='".$vnit2."',fecha_factura='".$vfecha."',horacrea='".$vhoracrea."',fecha_validacion='".$vfechavalidacion."',qr_base64='".$vqr_code."',enlace_pdf='".$venlace_pdf."',xml='".$venlace_xml."',nombre_archivos='".$vuuid."'";

									 
      if (in_array(strtolower($this->Ini->nm_con_conn_mysql['tpbanco']), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vnumero."'"; 
      }
      else
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vnumero."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSi = array();
      $vsi = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[9] = (strpos(strtolower($SCrx->fields[9]), "e")) ? (float)$SCrx->fields[9] : $SCrx->fields[9];
                 $SCrx->fields[9] = (string)$SCrx->fields[9];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSi = false;
          $vSi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vsi = false;
          $vsi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

									if(isset($vsi[0][0]))
									{
										$sql="update cloud_kardex SET cufe = '".$vcufe."',numero_fe='".$vpjfe.$vnumero."',estado='200',tercero='".$vnit2."',fecha_factura='".$vfecha."',horacrea='".$vhoracrea."',fecha_validacion='".$vfechavalidacion."',qr_base64='".$vqr_code."',enlace_pdf='".$venlace_pdf."',xml='".$venlace_xml."',nombre_archivos='".$vuuid."'  where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vnumero."'";
									}


									
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;

									$vsql_update = "update kardex set sn_cufe='".$vcufe."',sn_pjfe='".$vpjfe."',sn_fe_validacion='".$vfechavalidacion."',sn_enlacepdf='".$venlace_pdf."',sn_enlacexml='".$venlace_xml."',sn_proveedor='".$vproveedor."',sn_token_emp='".$TokenEnterprise."',sn_token_pass='".$TokenAutorizacion."',sn_servidor='".$vServidor."',sn_rutaqr='".$vrutaqr3."' where kardexid='".$vkardexid."'";

									if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

									
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

									
									$sihay = false;

									$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'CUFE'";

									if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

									 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiCUFETNS = array();
      $vsicufetns = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiCUFETNS[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsicufetns[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiCUFETNS = false;
          $vSiCUFETNS_erro = $this->Db->ErrorMsg();
          $vsicufetns = false;
          $vsicufetns_erro = $this->Db->ErrorMsg();
      } 
;
									if(isset($vsicufetns[0][0]))
									{
										$sihay = true;
									}
									else
									{
										$sihay = false;
									}
									if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


									$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'ESTADODIAN'";

									if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

									 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiCUFETNS2 = array();
      $vsicufetns2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiCUFETNS2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsicufetns2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiCUFETNS2 = false;
          $vSiCUFETNS2_erro = $this->Db->ErrorMsg();
          $vsicufetns2 = false;
          $vsicufetns2_erro = $this->Db->ErrorMsg();
      } 
;
									if(isset($vsicufetns2[0][0]))
									{
										$sihay = true;
									}
									else
									{
										$sihay = false;
									}
									if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


									if($sihay)
									{
										$vsql_update = "update kardex set cufe='".$vcufe."',estadodian='EXITOSA' where kardexid='".$vkardexid."'";
										if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

										
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
										if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

									}

									echo "<div style='margin-bottom:10px;border-radius:8px;color:white;background:#5877b9;padding:8px;' >".$json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->StatusMessage."</div>";
									
									if(!empty($vcorreo_copia))
									{
										$vemail = $vcorreo_copia;
										
										$curl = curl_init();
										curl_setopt_array($curl, array(
										  CURLOPT_URL => 'https://www.facilwebnube.com/apidian2020/public/api/ubl2.1/send-email',
										  CURLOPT_RETURNTRANSFER => true,
										  CURLOPT_ENCODING => '',
										  CURLOPT_MAXREDIRS => 10,
										  CURLOPT_TIMEOUT => 0,
										  CURLOPT_FOLLOWLOCATION => true,
										  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										  CURLOPT_CUSTOMREQUEST => 'POST',
										  CURLOPT_POSTFIELDS =>'{
											"prefix": "'.$vpjfe.'",
											"number": "'.$vnumero.'",
											"alternate_email": "'.$vemail.'"
										}
										',
										  CURLOPT_HTTPHEADER => array(
											'Content-Type: application/json',
											'accept: application/json',
											'Authorization: Bearer '.$vtoken
										  ),
										));

										$response = curl_exec($curl);
										curl_close($curl);
									}
	
								}
								else
								{
									if(isset($json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->ErrorMessage))
									{
										if(isset($json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->ErrorMessage->string))
										{
											if(!empty($json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->ErrorMessage->string))
											{
												$vjson_error = json_decode($json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->ErrorMessage->string);
												
												if(is_array($vjson_error))
												{
													foreach($vjson_error as $vkey=>$vdata)
													{
														echo $vdata."<br>";
													}
												}
												else
												{
													$veltexto = $json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->ErrorMessage->string;
													$vvalidando = false;
													
													$pos = strpos($veltexto, "Documento con CUFE");
													if ($pos === false)
													{
													}
													else
													{
														$vvalidando = true;
													}
													
													$pos2 = strpos($veltexto, "Documento procesado anteriormente");
													if ($pos2 === false)
													{
													}
													else
													{
														$vvalidando = true;
													}
													
													
													if($vvalidando)
													{
														$sql="insert into cloud_kardex SET cufe = '".$vcufe."',numero_fe='".$vpjfe.$vnumero."',estado='200',id_empresa='".$idempresa."',tipo='DV',prefijo='".$vcodprefijo."',numero='".$vnumero."',tercero='".$vnit2."',fecha_factura='".$vfecha."',horacrea='".$vhoracrea."',fecha_validacion='".$vfechavalidacion."',qr_base64='".$vqr_code."',enlace_pdf='".$venlace_pdf."',xml='".$venlace_xml."',nombre_archivos='".$vuuid."'";

														 
      if (in_array(strtolower($this->Ini->nm_con_conn_mysql['tpbanco']), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vnumero."'"; 
      }
      else
      { 
          $nm_select = "select * from cloud_kardex where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vnumero."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSi = array();
      $vsi = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[9] = (strpos(strtolower($SCrx->fields[9]), "e")) ? (float)$SCrx->fields[9] : $SCrx->fields[9];
                 $SCrx->fields[9] = (string)$SCrx->fields[9];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSi = false;
          $vSi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $vsi = false;
          $vsi_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

														if(isset($vsi[0][0]))
														{
															$sql="update cloud_kardex SET cufe = '".$vcufe."',numero_fe='".$vpjfe.$vnumero."',estado='200',tercero='".$vnit2."',fecha_factura='".$vfecha."',horacrea='".$vhoracrea."',fecha_validacion='".$vfechavalidacion."',qr_base64='".$vqr_code."',enlace_pdf='".$venlace_pdf."',xml='".$venlace_xml."',nombre_archivos='".$vuuid."'  where id_empresa='".$idempresa."' and tipo='DV' and prefijo='".$vcodprefijo."' and numero='".$vnumero."'";
														}


														
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;

														$vsql_update = "update kardex set sn_cufe='".$vcufe."',sn_pjfe='".$vpjfe."',sn_fe_validacion='".$vfechavalidacion."',sn_enlacepdf='".$venlace_pdf."',sn_enlacexml='".$venlace_xml."' where kardexid='".$vkardexid."'";

														if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

														
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
														if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

														
														$sihay = false;

														$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'CUFE'";

														if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

														 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiCUFETNS = array();
      $vsicufetns = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiCUFETNS[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsicufetns[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiCUFETNS = false;
          $vSiCUFETNS_erro = $this->Db->ErrorMsg();
          $vsicufetns = false;
          $vsicufetns_erro = $this->Db->ErrorMsg();
      } 
;
														if(isset($vsicufetns[0][0]))
														{
															$sihay = true;
														}
														else
														{
															$sihay = false;
														}
														if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


														$vsql = "SELECT RDB\$FIELD_NAME AS CAMPO FROM RDB\$RELATION_FIELDS WHERE RDB\$RELATION_NAME = 'KARDEX' AND RDB\$FIELD_NAME = 'ESTADODIAN'";

														if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

														 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiCUFETNS2 = array();
      $vsicufetns2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiCUFETNS2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsicufetns2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiCUFETNS2 = false;
          $vSiCUFETNS2_erro = $this->Db->ErrorMsg();
          $vsicufetns2 = false;
          $vsicufetns2_erro = $this->Db->ErrorMsg();
      } 
;
														if(isset($vsicufetns2[0][0]))
														{
															$sihay = true;
														}
														else
														{
															$sihay = false;
														}
														if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


														if($sihay)
														{
															$vsql_update = "update kardex set cufe='".$vcufe."',estadodian='EXITOSA' where kardexid='".$vkardexid."'";
															if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

															
     $nm_select = $vsql_update; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
															if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

														}
														
														echo "<div style='margin-bottom:10px;border-radius:8px;color:white;background:#5877b9;padding:8px;' >DOCUMENTO ACEPTADO CON ÉXITO!!!</div>";
													}
													else
													{
														echo $json->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->ErrorMessage->string;
													}
												}
											}
											else
											{
												echo "Un error en el envío.";
											}
										}
									}
								}
							}
						}
					break;
				}
			}
			else
			{
				$varchivo2 = fopen("nota_credito_trazabilidad.txt","w+");
				fwrite($varchivo2,$vseguimiento);
				
				$json = json_encode(array("factura"=>$factura),JSON_UNESCAPED_UNICODE);

				$vnomjson = "json_".date("Y_m_d_H_i_s").".json";
				$fh = fopen($vnomjson, 'w');
				fwrite($fh, $json);
				fclose($fh);
				
				if($vbug_xml=="NO")
				{
				   $json = file_get_contents($vnomjson);

				   $php_array = json_decode($json, true);

				   header("Content-type: text/xml");

				   $xml = Array2XML::createXML('xml', $php_array);

				   echo $xml->saveXML();
				}
			   
			}

	}
	else
	{
		echo $vmensaje;
	}
if (isset($this->sc_temp_gidempresa)) {$_SESSION['gidempresa'] = $this->sc_temp_gidempresa;}
$_SESSION['scriptcase']['cEnviarDevolucion']['contr_erro'] = 'off';
}
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('FACILWEB_FE_73');
   $_SESSION['scriptcase']['cEnviarDevolucion']['contr_erro'] = 'off';
   $Sc_lig_md5 = false;
   $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
   $_SESSION['scriptcase']['sem_session'] = false;
   if (!empty($_POST))
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
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
            }
            nm_limpa_str_cEnviarDevolucion($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
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
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
            }
            nm_limpa_str_cEnviarDevolucion($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
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
       if (isset($_COOKIE['sc_apl_default_FACILWEB_FE_73'])) {
           $apl_def = explode(",", $_COOKIE['sc_apl_default_FACILWEB_FE_73']);
       }
       elseif (is_file($root . $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEB_FE_73.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['cEnviarDevolucion']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEB_FE_73.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "cEnviarDevolucion") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_FACILWEB_FE_73'])) {
               $_SESSION['scriptcase']['cEnviarDevolucion']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_FACILWEB_FE_73'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["gidempresa"])) 
   {
       $_SESSION["gidempresa"] = $_POST["gidempresa"];
       nm_limpa_str_cEnviarDevolucion($_SESSION["gidempresa"]);
   }
   if (isset($_GET["gidempresa"])) 
   {
       $_SESSION["gidempresa"] = $_GET["gidempresa"];
       nm_limpa_str_cEnviarDevolucion($_SESSION["gidempresa"]);
   }
   if (!isset($_SESSION["gidempresa"])) 
   {
       $_SESSION["gidempresa"] = "";
   }
   if (isset($_POST["g_kardexid"])) 
   {
       $_SESSION["g_kardexid"] = $_POST["g_kardexid"];
       nm_limpa_str_cEnviarDevolucion($_SESSION["g_kardexid"]);
   }
   if (isset($_GET["g_kardexid"])) 
   {
       $_SESSION["g_kardexid"] = $_GET["g_kardexid"];
       nm_limpa_str_cEnviarDevolucion($_SESSION["g_kardexid"]);
   }
   if (!isset($_SESSION["g_kardexid"])) 
   {
       $_SESSION["g_kardexid"] = "";
   }
   if (isset($_POST["gpost"])) 
   {
       $_SESSION["gpost"] = $_POST["gpost"];
       nm_limpa_str_cEnviarDevolucion($_SESSION["gpost"]);
   }
   if (isset($_GET["gpost"])) 
   {
       $_SESSION["gpost"] = $_GET["gpost"];
       nm_limpa_str_cEnviarDevolucion($_SESSION["gpost"]);
   }
   if (!isset($_SESSION["gpost"])) 
   {
       $_SESSION["gpost"] = "";
   }
   if (isset($_POST["gvalidatns"])) 
   {
       $_SESSION["gvalidatns"] = $_POST["gvalidatns"];
       nm_limpa_str_cEnviarDevolucion($_SESSION["gvalidatns"]);
   }
   if (isset($_GET["gvalidatns"])) 
   {
       $_SESSION["gvalidatns"] = $_GET["gvalidatns"];
       nm_limpa_str_cEnviarDevolucion($_SESSION["gvalidatns"]);
   }
   if (!isset($_SESSION["gvalidatns"])) 
   {
       $_SESSION["gvalidatns"] = "";
   }
   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['iframe_menu']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "cEnviarDevolucion";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'cEnviarDevolucion' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('cEnviarDevolucion' == $sReferer || 'cEnviarDevolucion_' == substr($sReferer, 0, 18))
       {
           $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'cEnviarDevolucion')
   {
       $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['cEnviarDevolucion']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/cEnviarDevolucion_erro.php");
   }
   if (!empty($nmgp_parms)) 
   { 
       $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
       $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
       $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
       $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
       $todo  = explode("?@?", $todox);
       $ix = 0;
       while (!empty($todo[$ix]))
       {
            $cadapar = explode("?#?", $todo[$ix]);
            if (1 < sizeof($cadapar))
            {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                nm_limpa_str_cEnviarDevolucion($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
       if (isset($gidempresa)) 
       {
           $_SESSION['gidempresa'] = $gidempresa;
           nm_limpa_str_cEnviarDevolucion($_SESSION["gidempresa"]);
       }
       if (isset($g_kardexid)) 
       {
           $_SESSION['g_kardexid'] = $g_kardexid;
           nm_limpa_str_cEnviarDevolucion($_SESSION["g_kardexid"]);
       }
       if (isset($gpost)) 
       {
           $_SESSION['gpost'] = $gpost;
           nm_limpa_str_cEnviarDevolucion($_SESSION["gpost"]);
       }
       if (isset($gvalidatns)) 
       {
           $_SESSION['gvalidatns'] = $gvalidatns;
           nm_limpa_str_cEnviarDevolucion($_SESSION["gvalidatns"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_cEnviarDevolucion = new cEnviarDevolucion_apl();
   $contr_cEnviarDevolucion->controle();
//
   function nm_limpa_str_cEnviarDevolucion(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
?>
