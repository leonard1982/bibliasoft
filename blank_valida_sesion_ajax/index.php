<?php
   include_once('blank_valida_sesion_ajax_session.php');
   @ini_set('session.cookie_httponly', 0);
   @ini_set('session.use_only_cookies', 0);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_cache']      = "";
   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_doc']        = "";
   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_con_conn_facilweb']         = "conn_facilweb";
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
    if(empty($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class blank_valida_sesion_ajax_ini
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
   var $nm_bases_db2;
   var $nm_bases_ibase;
   var $nm_bases_informix;
   var $nm_bases_mssql;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_oracle;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $nm_bases_progress;
   var $nm_db_conn_facilweb;
   var $nm_con_conn_facilweb = array();
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
      $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "blank_valida_sesion_ajax"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "FACILWEBv2"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20181008"; 
      $this->nm_hr_criacao   = "163540"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20220601"; 
      $this->nm_hr_ult_alt   = "185501"; 
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
      $this->path_prod       = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_doc'];
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
      if (!isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['blank_valida_sesion_ajax']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['blank_valida_sesion_ajax']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_BlueBerry/Sc9_BlueBerry";
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/blank_valida_sesion_ajax';
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
      $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
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
      if (isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['actual_lang']) || $_SESSION['scriptcase']['blank_valida_sesion_ajax']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['blank_valida_sesion_ajax']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_FACILWEBv2',$this->str_lang,'0','/');
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
          include_once("blank_valida_sesion_ajax_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
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
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['ancor_save'] = $_POST['ancor_save'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["blank_valida_sesion_ajax"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["blank_valida_sesion_ajax"] as $sTmpTargetLink => $sTmpTargetWidget)
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
          unset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao']);
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
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['redir']))
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
      $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_cancel { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=74); opacity:0.74; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=83); opacity:0.83; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=33); opacity:0.33; padding:3px 13px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_cancel_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_cancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=77); opacity:0.77; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=78); opacity:0.78; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=33); opacity:0.33; padding:3px 13px; cursor:default;  }";
          echo ".scButton_check_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=79); opacity:0.79; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=80); opacity:0.8; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=82); opacity:0.82; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=34); opacity:0.34; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_danger_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=85); opacity:0.85; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#61678C; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#6880A3; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#6880A3; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#2E2F36; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_default_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#6880A3; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_facebook { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:30px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#304d8a; border-style:solid; border-radius:30px; background-color:#304d8a; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2d4373; border-style:solid; border-radius:30px; background-color:#2d4373; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:30px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_facebook_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:#3b5998; border-color:#3b5998; border-style:solid; border-radius:30px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_facebook_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:hover { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:active { color:#61678C; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_disabled { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_selected { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_light { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light:hover { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light:active { color:#61678C; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light_disabled { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light_selected { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_light_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:30px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e0321c; border-style:solid; border-radius:30px; background-color:#e0321c; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c23321; border-style:solid; border-radius:30px; background-color:#c23321; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:30px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_google_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:30px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons { color:#61678C; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:hover { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:active { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_disabled { color:#2E2F36; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_icons_selected { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=81); opacity:0.81; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=77); opacity:0.77; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=33); opacity:0.33; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_ok_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=78); opacity:0.78; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:30px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1678c2; border-style:solid; border-radius:30px; background-color:#1678c2; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1a69a4; border-style:solid; border-radius:30px; background-color:#1a69a4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:30px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_paypal_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:30px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scButton_small { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#61678C; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#2E2F36; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:30px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:30px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:30px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:30px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:30px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:30px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:30px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:30px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:30px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:30px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:30px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#35a2f4; border-style:solid; border-radius:30px; background-color:#35a2f4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2795e9; border-style:solid; border-radius:30px; background-color:#2795e9; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:30px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_twitter_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:30px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:30px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e60000; border-style:solid; border-radius:30px; background-color:#e60000; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c00; border-style:solid; border-radius:30px; background-color:#c00; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:30px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_youtube_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:30px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube_list:hover { filter: alpha(opacity=100); opacity:1;  }";
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
          if (!$_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['sc_outra_jan'])) 
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
      include_once($this->path_aplicacao . "blank_valida_sesion_ajax_erro.class.php"); 
      $this->Erro = new blank_valida_sesion_ajax_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('blank_valida_sesion_ajax'); 
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
      $this->scGridRefinedSearchExpandFAIcon    = trim($scGridRefinedSearchExpandFAIcon);
      $this->scGridRefinedSearchCollapseFAIcon    = trim($scGridRefinedSearchCollapseFAIcon);
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
      if (isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['redir_tp'] == "R") {
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
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']);
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
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
      $this->sqlite_version      = "old";
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress     = array("pdo_progress_odbc", "progress");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9NmDQB/HANOHuBiHuzGV9FeDWFYVorqD9BiZSBqDSNOZMFaDMzGHEBUDWXCHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWJeHMBiD9BsVIraD1rwV5X7HgBeHErsHEFqVoJwDcBiDQFUD1BeD5FaDMrYVcFCH5XCDoF7D9BiZSB/Z1BeHQJwDEBODkFeH5FYVoFGHQJKDQJsHABYV5JeHgrYDkBODWJeVoX7D9BsH9B/Z1NOZMJwDMzGHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMrwDkBODWJeDoJeDcBqZ1B/Z1NOV5JsDMNKZSJGDWXCDoraD9XsDQJsDSBYD5JsHgvsVcB/V5X7VoFGDcJUZ1FaD1rwV5JeDEBOZSXeV5XCDoFUDcJeDQX7DSN7V5FUHuBOVcFiV5F/VorqD9JmZ1rqHArKHQJwDEBODkFeH5FYVoFGHQJKDQB/HArYHuJwDMrwVcBODWJeVoBOD9JmZSFaDSrYHQF7HgBOHErCDuXKDoJeHQJKZSBiHIvsVWJwDMvmVcFKV5BmVoBqD9BsZkFGHArKHuBOHgBYDkXKDWXCHIFUHQFYDuFaHArYHuXGDMrwV9BUHEFYHIFUDcNmZkFGHAN7HQBiHgvCHEJqDuXKZuBqHQJKZSBiDSN7HurqDMrwVcB/HEFYHIJeHQBsZ1BODSrYHuFaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuFGDMvsZSNiDurGVEraHQJmH9BqHAN7HQF7HgvCHArCHEXCHMBiDcXGDQFUDSzGVWJeDMrwV9FeDWJeHIraHQBiZSBOD1rwHQXGHgvCHArsDuJeHIJeHQFYZSBiZ1N7HuBqHgNKDkBODuFqDoFGDcBqVIJwD1rwHuBqHgBYVkJ3HEFaHMBOHQJKDQFUDSN7HQNUDMrwV9FeHEF/HMJwHQBiZkFGHANOHQF7HgvCHEJqDWrGZuXGHQJKDQFUHIrwHurqDMrwV9FeDuX7HIF7HQNwZSBOD1rKHQraDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7VorqDcBqZ1FaD1rKV5XGDMNKDkBsV5FaZuBODcJeDQFGHAvmV5JwHuBYDkFCDuX7VEF7HQFYH9B/HIveZMB/DEBOHEXeDuX/DoB/D9NwZSX7D1BeV5BOHuvmVcFCDWXCVENUDcBqH9B/HABYD5JeDMzGHAFKV5XKDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9B/HIveD5FaDErKZSJGH5F/DoFUD9JKDQFGHANKD5F7DMvOV9BUDuFGVoX7HQFYZkBiD1NaD5BOHgvCHArsH5BmZuJeHQXGDuBqHAvOV5XGDMrYDkBsDWXCDoJsDcBwH9B/Z1rYHQJwHgveDkXKDWBmDoJeHQBiZ9XGHANKVWJeDMvOVcBUHEFYHMBiD9BsVIraD1rwV5X7HgBeHErsDWXCVoB/HQNmDuBqD1vOD5F7HuNODkBODuFGVoF7D9JmZ1BOHArYZMB/DEBOHEJGDWXCVoBOHQNmH9BiHAveD5NUHgNKDkBOV5FYHMBiHQBiZ1FGHArYHuJeHgvsVkJ3DWX7HMX7HQXsDQFaZ1NaV5BiDMvmV9FeDuFqHMFaHQBiH9BqZ1NOHuX7HgvsDkBsDWF/HMJeHQJKDQFUHAN7HuB/DMBOVIB/DWJeHIFGDcBwZ1X7HAN7HuJeHgrKVkJ3DWX7HMFGHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VEFGHQFYVINUHAvsZMNU";
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
          if (!$_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_BlueBerry_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_BlueBerry_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
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
              if (isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao']) && $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_perfil']) && $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao']))
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
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'FACILWEBv2', 2, $this->force_db_utf8); 
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
          db_conect_devel('conn_facilweb', $this->root . $this->path_prod, 'FACILWEBv2', 2, $this->force_db_utf8); 
          $this->nm_con_conn_facilweb['servidor']    = $_SESSION['scriptcase']['glo_servidor'];
          $this->nm_con_conn_facilweb['usuario']     = $_SESSION['scriptcase']['glo_usuario'];
          $this->nm_con_conn_facilweb['banco']       = $_SESSION['scriptcase']['glo_banco'];
          $this->nm_con_conn_facilweb['senha']       = $_SESSION['scriptcase']['glo_senha'];
          $this->nm_con_conn_facilweb['tpbanco']     = $_SESSION['scriptcase']['glo_tpbanco'];
          $this->nm_con_conn_facilweb['decimal']     = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_facilweb['SC_sep_date'] = $_SESSION['scriptcase']['glo_date_separator'];
          $this->nm_con_conn_facilweb['protect']     = $_SESSION['scriptcase']['glo_senha_protect'];
          $this->nm_con_conn_facilweb['glo_database_encoding'] = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
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
      if (isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_con_conn_facilweb'], $this->path_libs, "S", $this->path_conf);
          $this->nm_con_conn_facilweb['servidor']               = $_SESSION['scriptcase']['glo_servidor'];
          $this->nm_con_conn_facilweb['usuario']                = $_SESSION['scriptcase']['glo_usuario'];
          $this->nm_con_conn_facilweb['banco']                  = $_SESSION['scriptcase']['glo_banco'];
          $this->nm_con_conn_facilweb['senha']                  = $_SESSION['scriptcase']['glo_senha'];
          $this->nm_con_conn_facilweb['tpbanco']                = $_SESSION['scriptcase']['glo_tpbanco'];
          $this->nm_con_conn_facilweb['decimal']                = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_facilweb['decimal']                = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_facilweb['protect']                = $_SESSION['scriptcase']['glo_senha_protect'];
          $this->nm_con_conn_facilweb['glo_database_encoding']  = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['embutida_init']) 
      {
          if (!isset($_SESSION['gusuario_logueo'])) 
          {
              $this->nm_falta_var .= "gusuario_logueo; ";
          }
          if (!isset($_SESSION['gpassword_logueo'])) 
          {
              $this->nm_falta_var .= "gpassword_logueo; ";
          }
          if (!isset($_SESSION['gbd_seleccionada'])) 
          {
              $this->nm_falta_var .= "gbd_seleccionada; ";
          }
          if (!isset($_SESSION['gaplicaciones_menu'])) 
          {
              $this->nm_falta_var .= "gaplicaciones_menu; ";
          }
          if (!isset($_SESSION['empresa'])) 
          {
              $this->nm_falta_var .= "empresa; ";
          }
          if (!isset($_SESSION['regimen_emp'])) 
          {
              $this->nm_falta_var .= "regimen_emp; ";
          }
          if (!isset($_SESSION['nit'])) 
          {
              $this->nm_falta_var .= "nit; ";
          }
          if (!isset($_SESSION['direccion'])) 
          {
              $this->nm_falta_var .= "direccion; ";
          }
          if (!isset($_SESSION['tele'])) 
          {
              $this->nm_falta_var .= "tele; ";
          }
          if (!isset($_SESSION['gidbanco'])) 
          {
              $this->nm_falta_var .= "gidbanco; ";
          }
          if (!isset($_SESSION['gdescuento_general'])) 
          {
              $this->nm_falta_var .= "gdescuento_general; ";
          }
          if (!isset($_SESSION['gsiaperturacaja'])) 
          {
              $this->nm_falta_var .= "gsiaperturacaja; ";
          }
          if (!isset($_SESSION['docpordefectoenpos'])) 
          {
              $this->nm_falta_var .= "docpordefectoenpos; ";
          }
          if (!isset($_SESSION['gtipo_negocio'])) 
          {
              $this->nm_falta_var .= "gtipo_negocio; ";
          }
          if (!isset($_SESSION['g_recordarme'])) 
          {
              $this->nm_falta_var .= "g_recordarme; ";
          }
          if (!isset($_SESSION['g_usuario'])) 
          {
              $this->nm_falta_var .= "g_usuario; ";
          }
          if (!isset($_SESSION['g_password'])) 
          {
              $this->nm_falta_var .= "g_password; ";
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
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['oracle_type']))
      {
          $this->nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
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
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_cancel { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=74); opacity:0.74; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=83); opacity:0.83; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=33); opacity:0.33; padding:3px 13px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_cancel_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_cancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=77); opacity:0.77; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=78); opacity:0.78; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=33); opacity:0.33; padding:3px 13px; cursor:default;  }";
          echo ".scButton_check_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=79); opacity:0.79; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=80); opacity:0.8; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=82); opacity:0.82; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=34); opacity:0.34; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_danger_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#C02A21; border-style:solid; border-radius:30px; background-color:#C02A21; filter: alpha(opacity=85); opacity:0.85; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#61678C; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#6880A3; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#6880A3; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#2E2F36; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_default_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#6880A3; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_facebook { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:30px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#304d8a; border-style:solid; border-radius:30px; background-color:#304d8a; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2d4373; border-style:solid; border-radius:30px; background-color:#2d4373; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:30px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_facebook_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:#3b5998; border-color:#3b5998; border-style:solid; border-radius:30px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_facebook_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:hover { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:active { color:#61678C; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_disabled { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_selected { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_light { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light:hover { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light:active { color:#61678C; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light_disabled { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light_selected { color:#61678C; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_light_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_light_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:30px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e0321c; border-style:solid; border-radius:30px; background-color:#e0321c; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c23321; border-style:solid; border-radius:30px; background-color:#c23321; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:30px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_google_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:30px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons { color:#61678C; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:hover { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:active { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_disabled { color:#2E2F36; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_icons_selected { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=81); opacity:0.81; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=77); opacity:0.77; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=33); opacity:0.33; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_ok_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=78); opacity:0.78; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:30px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1678c2; border-style:solid; border-radius:30px; background-color:#1678c2; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1a69a4; border-style:solid; border-radius:30px; background-color:#1a69a4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:30px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_paypal_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:30px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scButton_small { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#61678C; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#2E2F36; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#EEEEEE; border-style:solid; border-radius:30px; background-color:#EEEEEE; filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:bold; text-decoration:none; border-width:1px; border-color:#61678C; border-style:solid; border-radius:30px; background-color:#61678C; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:30px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:30px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:30px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:30px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:30px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:30px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:30px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:30px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:30px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:30px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:30px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#35a2f4; border-style:solid; border-radius:30px; background-color:#35a2f4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2795e9; border-style:solid; border-radius:30px; background-color:#2795e9; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:30px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_twitter_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:30px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:30px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e60000; border-style:solid; border-radius:30px; background-color:#e60000; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c00; border-style:solid; border-radius:30px; background-color:#c00; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:30px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_youtube_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:30px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube_list:hover { filter: alpha(opacity=100); opacity:1;  }";
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
          if (!$_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['sc_outra_jan'])) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv2', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['embutida'])
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
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2))
      {
          $this->Db->fetchMode = ADODB_FETCH_NUM;
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_end_clean();
          } 
      } 
   }
   function conectExtra()
   {
      if (!$_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_con_conn_facilweb['glo_database_encoding'];
      $this->nm_db_conn_facilweb = db_conect($this->nm_con_conn_facilweb['tpbanco'], $this->nm_con_conn_facilweb['servidor'], $this->nm_con_conn_facilweb['usuario'], $this->nm_con_conn_facilweb['senha'], $this->nm_con_conn_facilweb['banco'], $this->nm_con_conn_facilweb['protect'], 'S', 'N', '', $databaseEncoding); 
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
          $this->nm_db_conn_facilweb->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_con_conn_facilweb['tpbanco']), $this->nm_bases_mssql))
      {
          $this->nm_db_conn_facilweb->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_con_conn_facilweb['tpbanco']), $this->nm_bases_oracle))
      {
          $this->nm_db_conn_facilweb->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->nm_db_conn_facilweb->Execute("alter session set nls_numeric_characters = '.,'");
          $this->nm_con_conn_facilweb['decimal'] = "."; 
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['embutida'])
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
       if (empty($conex) || $conex == "conn_mysql")
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_sep_date1'];
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
       return (isset($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['blank_valida_sesion_ajax']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
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
class blank_valida_sesion_ajax_apl
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

      $this->Ini = new blank_valida_sesion_ajax_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['blank_valida_sesion_ajax']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['blank_valida_sesion_ajax']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['blank_valida_sesion_ajax']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['blank_valida_sesion_ajax'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['blank_valida_sesion_ajax']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['blank_valida_sesion_ajax']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('blank_valida_sesion_ajax') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['blank_valida_sesion_ajax']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "blank_valida_sesion_ajax")
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['blank_valida_sesion_ajax']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['blank_valida_sesion_ajax']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['blank_valida_sesion_ajax']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      include_once($this->Ini->path_aplicacao . 'conexionExternaBD.php');
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
      include_once($this->Ini->path_aplicacao . "blank_valida_sesion_ajax_erro.class.php"); 
      $this->Erro      = new blank_valida_sesion_ajax_erro();
      $this->Erro->Ini = $this->Ini;
//
      header("X-XSS-Protection: 0; mode=block");
      $_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'on';
if (!isset($_SESSION['gFactsinexist'])) {$_SESSION['gFactsinexist'] = "";}
if (!isset($this->sc_temp_gFactsinexist)) {$this->sc_temp_gFactsinexist = (isset($_SESSION['gFactsinexist'])) ? $_SESSION['gFactsinexist'] : "";}
if (!isset($_SESSION['gPermisosUsuario'])) {$_SESSION['gPermisosUsuario'] = "";}
if (!isset($this->sc_temp_gPermisosUsuario)) {$this->sc_temp_gPermisosUsuario = (isset($_SESSION['gPermisosUsuario'])) ? $_SESSION['gPermisosUsuario'] : "";}
if (!isset($_SESSION['docpordefectoenpos'])) {$_SESSION['docpordefectoenpos'] = "";}
if (!isset($this->sc_temp_docpordefectoenpos)) {$this->sc_temp_docpordefectoenpos = (isset($_SESSION['docpordefectoenpos'])) ? $_SESSION['docpordefectoenpos'] : "";}
if (!isset($_SESSION['gsiaperturacaja'])) {$_SESSION['gsiaperturacaja'] = "";}
if (!isset($this->sc_temp_gsiaperturacaja)) {$this->sc_temp_gsiaperturacaja = (isset($_SESSION['gsiaperturacaja'])) ? $_SESSION['gsiaperturacaja'] : "";}
if (!isset($_SESSION['gdescripciongrupo'])) {$_SESSION['gdescripciongrupo'] = "";}
if (!isset($this->sc_temp_gdescripciongrupo)) {$this->sc_temp_gdescripciongrupo = (isset($_SESSION['gdescripciongrupo'])) ? $_SESSION['gdescripciongrupo'] : "";}
if (!isset($_SESSION['gsesion_id'])) {$_SESSION['gsesion_id'] = "";}
if (!isset($this->sc_temp_gsesion_id)) {$this->sc_temp_gsesion_id = (isset($_SESSION['gsesion_id'])) ? $_SESSION['gsesion_id'] : "";}
if (!isset($_SESSION['gModificarInventario'])) {$_SESSION['gModificarInventario'] = "";}
if (!isset($this->sc_temp_gModificarInventario)) {$this->sc_temp_gModificarInventario = (isset($_SESSION['gModificarInventario'])) ? $_SESSION['gModificarInventario'] : "";}
if (!isset($_SESSION['gGrupoUsuarioComanda'])) {$_SESSION['gGrupoUsuarioComanda'] = "";}
if (!isset($this->sc_temp_gGrupoUsuarioComanda)) {$this->sc_temp_gGrupoUsuarioComanda = (isset($_SESSION['gGrupoUsuarioComanda'])) ? $_SESSION['gGrupoUsuarioComanda'] : "";}
if (!isset($_SESSION['gmensaje'])) {$_SESSION['gmensaje'] = "";}
if (!isset($this->sc_temp_gmensaje)) {$this->sc_temp_gmensaje = (isset($_SESSION['gmensaje'])) ? $_SESSION['gmensaje'] : "";}
if (!isset($_SESSION['gSerial'])) {$_SESSION['gSerial'] = "";}
if (!isset($this->sc_temp_gSerial)) {$this->sc_temp_gSerial = (isset($_SESSION['gSerial'])) ? $_SESSION['gSerial'] : "";}
if (!isset($_SESSION['gTiempoSegRefreshDoc'])) {$_SESSION['gTiempoSegRefreshDoc'] = "";}
if (!isset($this->sc_temp_gTiempoSegRefreshDoc)) {$this->sc_temp_gTiempoSegRefreshDoc = (isset($_SESSION['gTiempoSegRefreshDoc'])) ? $_SESSION['gTiempoSegRefreshDoc'] : "";}
if (!isset($_SESSION['gnaturaleza'])) {$_SESSION['gnaturaleza'] = "";}
if (!isset($this->sc_temp_gnaturaleza)) {$this->sc_temp_gnaturaleza = (isset($_SESSION['gnaturaleza'])) ? $_SESSION['gnaturaleza'] : "";}
if (!isset($_SESSION['gregimen'])) {$_SESSION['gregimen'] = "";}
if (!isset($this->sc_temp_gregimen)) {$this->sc_temp_gregimen = (isset($_SESSION['gregimen'])) ? $_SESSION['gregimen'] : "";}
if (!isset($_SESSION['gtelefono'])) {$_SESSION['gtelefono'] = "";}
if (!isset($this->sc_temp_gtelefono)) {$this->sc_temp_gtelefono = (isset($_SESSION['gtelefono'])) ? $_SESSION['gtelefono'] : "";}
if (!isset($_SESSION['gdireccion'])) {$_SESSION['gdireccion'] = "";}
if (!isset($this->sc_temp_gdireccion)) {$this->sc_temp_gdireccion = (isset($_SESSION['gdireccion'])) ? $_SESSION['gdireccion'] : "";}
if (!isset($_SESSION['gnit'])) {$_SESSION['gnit'] = "";}
if (!isset($this->sc_temp_gnit)) {$this->sc_temp_gnit = (isset($_SESSION['gnit'])) ? $_SESSION['gnit'] : "";}
if (!isset($_SESSION['grazonsoc'])) {$_SESSION['grazonsoc'] = "";}
if (!isset($this->sc_temp_grazonsoc)) {$this->sc_temp_grazonsoc = (isset($_SESSION['grazonsoc'])) ? $_SESSION['grazonsoc'] : "";}
if (!isset($_SESSION['gimpresorapos'])) {$_SESSION['gimpresorapos'] = "";}
if (!isset($this->sc_temp_gimpresorapos)) {$this->sc_temp_gimpresorapos = (isset($_SESSION['gimpresorapos'])) ? $_SESSION['gimpresorapos'] : "";}
if (!isset($_SESSION['gnombre_archivo_empresa'])) {$_SESSION['gnombre_archivo_empresa'] = "";}
if (!isset($this->sc_temp_gnombre_archivo_empresa)) {$this->sc_temp_gnombre_archivo_empresa = (isset($_SESSION['gnombre_archivo_empresa'])) ? $_SESSION['gnombre_archivo_empresa'] : "";}
if (!isset($_SESSION['gserialguardado'])) {$_SESSION['gserialguardado'] = "";}
if (!isset($this->sc_temp_gserialguardado)) {$this->sc_temp_gserialguardado = (isset($_SESSION['gserialguardado'])) ? $_SESSION['gserialguardado'] : "";}
if (!isset($_SESSION['gespaciadodetallefactura'])) {$_SESSION['gespaciadodetallefactura'] = "";}
if (!isset($this->sc_temp_gespaciadodetallefactura)) {$this->sc_temp_gespaciadodetallefactura = (isset($_SESSION['gespaciadodetallefactura'])) ? $_SESSION['gespaciadodetallefactura'] : "";}
if (!isset($_SESSION['gconsolidararticulos'])) {$_SESSION['gconsolidararticulos'] = "";}
if (!isset($this->sc_temp_gconsolidararticulos)) {$this->sc_temp_gconsolidararticulos = (isset($_SESSION['gconsolidararticulos'])) ? $_SESSION['gconsolidararticulos'] : "";}
if (!isset($_SESSION['glineasporfactura'])) {$_SESSION['glineasporfactura'] = "";}
if (!isset($this->sc_temp_glineasporfactura)) {$this->sc_temp_glineasporfactura = (isset($_SESSION['glineasporfactura'])) ? $_SESSION['glineasporfactura'] : "";}
if (!isset($_SESSION['gusuariologueado'])) {$_SESSION['gusuariologueado'] = "";}
if (!isset($this->sc_temp_gusuariologueado)) {$this->sc_temp_gusuariologueado = (isset($_SESSION['gusuariologueado'])) ? $_SESSION['gusuariologueado'] : "";}
if (!isset($_SESSION['gidresolucion'])) {$_SESSION['gidresolucion'] = "";}
if (!isset($this->sc_temp_gidresolucion)) {$this->sc_temp_gidresolucion = (isset($_SESSION['gidresolucion'])) ? $_SESSION['gidresolucion'] : "";}
if (!isset($_SESSION['gdescuento_general'])) {$_SESSION['gdescuento_general'] = "";}
if (!isset($this->sc_temp_gdescuento_general)) {$this->sc_temp_gdescuento_general = (isset($_SESSION['gdescuento_general'])) ? $_SESSION['gdescuento_general'] : "";}
if (!isset($_SESSION['gidbanco'])) {$_SESSION['gidbanco'] = "";}
if (!isset($this->sc_temp_gidbanco)) {$this->sc_temp_gidbanco = (isset($_SESSION['gidbanco'])) ? $_SESSION['gidbanco'] : "";}
if (!isset($_SESSION['gsiescajero'])) {$_SESSION['gsiescajero'] = "";}
if (!isset($this->sc_temp_gsiescajero)) {$this->sc_temp_gsiescajero = (isset($_SESSION['gsiescajero'])) ? $_SESSION['gsiescajero'] : "";}
if (!isset($_SESSION['gnombreusuario'])) {$_SESSION['gnombreusuario'] = "";}
if (!isset($this->sc_temp_gnombreusuario)) {$this->sc_temp_gnombreusuario = (isset($_SESSION['gnombreusuario'])) ? $_SESSION['gnombreusuario'] : "";}
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['regimen_emp'])) {$_SESSION['regimen_emp'] = "";}
if (!isset($this->sc_temp_regimen_emp)) {$this->sc_temp_regimen_emp = (isset($_SESSION['regimen_emp'])) ? $_SESSION['regimen_emp'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($_SESSION['gaplicaciones_menu'])) {$_SESSION['gaplicaciones_menu'] = "";}
if (!isset($this->sc_temp_gaplicaciones_menu)) {$this->sc_temp_gaplicaciones_menu = (isset($_SESSION['gaplicaciones_menu'])) ? $_SESSION['gaplicaciones_menu'] : "";}
if (!isset($_SESSION['g_password'])) {$_SESSION['g_password'] = "";}
if (!isset($this->sc_temp_g_password)) {$this->sc_temp_g_password = (isset($_SESSION['g_password'])) ? $_SESSION['g_password'] : "";}
if (!isset($_SESSION['g_usuario'])) {$_SESSION['g_usuario'] = "";}
if (!isset($this->sc_temp_g_usuario)) {$this->sc_temp_g_usuario = (isset($_SESSION['g_usuario'])) ? $_SESSION['g_usuario'] : "";}
if (!isset($_SESSION['g_recordarme'])) {$_SESSION['g_recordarme'] = "";}
if (!isset($this->sc_temp_g_recordarme)) {$this->sc_temp_g_recordarme = (isset($_SESSION['g_recordarme'])) ? $_SESSION['g_recordarme'] : "";}
if (!isset($_SESSION['gtipo_negocio'])) {$_SESSION['gtipo_negocio'] = "";}
if (!isset($this->sc_temp_gtipo_negocio)) {$this->sc_temp_gtipo_negocio = (isset($_SESSION['gtipo_negocio'])) ? $_SESSION['gtipo_negocio'] : "";}
if (!isset($_SESSION['gpassword_logueo'])) {$_SESSION['gpassword_logueo'] = "";}
if (!isset($this->sc_temp_gpassword_logueo)) {$this->sc_temp_gpassword_logueo = (isset($_SESSION['gpassword_logueo'])) ? $_SESSION['gpassword_logueo'] : "";}
if (!isset($_SESSION['gusuario_logueo'])) {$_SESSION['gusuario_logueo'] = "";}
if (!isset($this->sc_temp_gusuario_logueo)) {$this->sc_temp_gusuario_logueo = (isset($_SESSION['gusuario_logueo'])) ? $_SESSION['gusuario_logueo'] : "";}
if (!isset($_SESSION['gbd_seleccionada'])) {$_SESSION['gbd_seleccionada'] = "";}
if (!isset($this->sc_temp_gbd_seleccionada)) {$this->sc_temp_gbd_seleccionada = (isset($_SESSION['gbd_seleccionada'])) ? $_SESSION['gbd_seleccionada'] : "";}
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  $this->sc_temp_gusuario_logueo  = $_POST["usuario"];
$this->sc_temp_gpassword_logueo = $_POST["password"];
$this->sc_temp_gbd_seleccionada = $_POST["bd"];


$arr_conn = array(); 

$arr_conn['user'] = "root";
$arr_conn['password'] = ",.Facilweb2020";
$arr_conn['database'] = $_POST["bd"];

sc_connection_edit("conn_mysql", $arr_conn); 


$vestado = "";
$vpagina = "";
$vmensaje = "";
$vmenu   = "menu_mini";
$vlincencia = "";
 
      $nm_select = "select serial_licencia from terminos order by idterminos asc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vlic = array();
      if ($SCrx = $this->Ini->nm_db_conn_facilweb->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vlic[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vlic = false;
          $this->vlic_erro = $this->Ini->nm_db_conn_facilweb->ErrorMsg();
      } 
;

if(isset($this->vlic[0][0]))
{
	if(!empty($this->vlic[0][0]))
	{
		$vmenu      = "menu";
		$vlincencia = $this->vlic[0][0];
	}
}

$vsql = "select tipo_negocio from empresas where nombre='".$this->sc_temp_gbd_seleccionada."'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vTNegocio = array();
      $this->vtnegocio = array();
      if ($SCrx = $this->Ini->nm_db_conn_facilweb->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vTNegocio[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vtnegocio[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vTNegocio = false;
          $this->vTNegocio_erro = $this->Ini->nm_db_conn_facilweb->ErrorMsg();
          $this->vtnegocio = false;
          $this->vtnegocio_erro = $this->Ini->nm_db_conn_facilweb->ErrorMsg();
      } 
;
if(isset($this->vtnegocio[0][0]))
{
	$this->sc_temp_gtipo_negocio = $this->vtnegocio[0][0];
}

$vsql = "SELECT ccnit, url_pagos, monto_arriendo, fecha_inicio, public_key, modo_pruebas, modo_externo, auto_click, url_respuesta, url_confirmacion, url_aceptado, url_rechazado, url_pendiente, activo, nombre, dia_aviso, dia_corte, webservice, fecha_instalacion FROM suscripcion WHERE id_suscripcion='1'";

$vccnit = "";
$vurl_pagos = ""; 
$vmonto_arriendo = ""; 
$vfecha_inicio = ""; 
$vpublic_key = ""; 
$vmodo_pruebas = ""; 
$vmodo_externo = ""; 
$vauto_click = ""; 
$vurl_respuesta = ""; 
$vurl_confirmacion = ""; 
$vurl_aceptado = ""; 
$vurl_rechazado = ""; 
$vurl_pendiente = ""; 
$vactivo = "NO"; 
$vnombre = ""; 
$vdia_aviso = ""; 
$vdia_corte = ""; 
$vwebservice = ""; 
$vfecha_instalacion = "";
$vrecordarme = "NO";
$vusua = "";
$vpass = "";

if(isset($_POST["usuario"]))
{
	$vusua = $_POST["usuario"];
}

if(isset($_POST["password"]))
{
	$vpass = $_POST["password"];
}

if(isset($_POST["recordarme"]))
{
	$vrecordarme = $_POST["recordarme"];
}

 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiSuscrip = array();
      $this->vsisuscrip = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiSuscrip[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsisuscrip[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiSuscrip = false;
          $this->vSiSuscrip_erro = $this->Db->ErrorMsg();
          $this->vsisuscrip = false;
          $this->vsisuscrip_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vsisuscrip[0][0]))
{
	$vccnit = $this->vsisuscrip[0][0];
	$vurl_pagos = $this->vsisuscrip[0][1]; 
	$vmonto_arriendo = $this->vsisuscrip[0][2]; 
	$vfecha_inicio = $this->vsisuscrip[0][3]; 
	$vpublic_key = $this->vsisuscrip[0][4]; 
	$vmodo_pruebas = $this->vsisuscrip[0][5]; 
	$vmodo_externo = $this->vsisuscrip[0][6]; 
	$vauto_click = $this->vsisuscrip[0][7]; 
	$vurl_respuesta = $this->vsisuscrip[0][8]; 
	$vurl_confirmacion = $this->vsisuscrip[0][9]; 
	$vurl_aceptado = $this->vsisuscrip[0][10]; 
	$vurl_rechazado = $this->vsisuscrip[0][11]; 
	$vurl_pendiente = $this->vsisuscrip[0][12]; 
	$vactivo = $this->vsisuscrip[0][13]; 
	$vnombre = $this->vsisuscrip[0][14]; 
	$vdia_aviso = $this->vsisuscrip[0][15]; 
	$vdia_corte = $this->vsisuscrip[0][16]; 
	$vwebservice = $this->vsisuscrip[0][17]; 
	$vfecha_instalacion = $this->vsisuscrip[0][18];
}

$vsql = "select  
		 nombre,
		 tercero,
		 resolucion,
		 idusuarios,
		 (select lineasporfactura from configuraciones where idconfiguraciones='1') as lineasporfactura,
		 (select consolidararticulos from configuraciones where idconfiguraciones='1') as consolidararticulos,
		 (select espaciado from configuraciones where idconfiguraciones='1') as espaciado,
		 (select serial from configuraciones where idconfiguraciones='1') as serial,
		 (select coalesce(fecha,'N') from configuraciones where idconfiguraciones='1') as fecha_demo,
		 (select if(nombre_pc is not null and nombre_pc <> '' and nombre_impre is not null and nombre_impre <> '',concat('//',nombre_pc,'/',nombre_impre),'') from configuraciones where idconfiguraciones='1') as impresorapos,
		 (select if(d.nombre_pc is not null and d.nombre_pc <> '' and d.nombre_impre is not null and d.nombre_impre <> '',concat('//',d.nombre_pc,'/',d.nombre_impre),'') from resdian d where d.Idres=resolucion) as impresorapospj,
		 if(nombre_pc is not null and nombre_pc <> '' and nombre_impre is not null and nombre_impre <> '',concat('//',nombre_pc,'/',nombre_impre),'') as impresoraposusuario,
		 (select razonsoc from datosemp where iddatos='1') as razonsoc,
		 (select concat(nit,'-',dv) from datosemp where iddatos='1') as nit,
		 (select direccion from datosemp where iddatos='1') as direccion,
		 (select telefono from datosemp where iddatos='1') as telefono,
		 (select if(regimen=0,'Regimen Simplificado','Regimen Comun') from datosemp where iddatos='1') as regimen,
		 (select naturaleza from datosemp where iddatos='1') as naturaleza,
		 (select ruta_bd_tns from configuraciones where idconfiguraciones='1') as rutabdtns,
		 (select refresh_grid_doc from configuraciones where idconfiguraciones='1') as refresh_grid_doc,
		 coalesce(grupocomanda,'0') as grupocomanda,
		 (select modificainvpedido from configuraciones where idconfiguraciones='1') as modificainvpedido,
		 sesion_id,
		 (select g.descripcion from usuarios_grupos g where g.idusuarios_grupos=grupo) as grupo,
		 (select apertura_caja from configuraciones where idconfiguraciones='1') as apertura_caja,
		 (select tipodoc_pordefecto_pos from configuraciones where idconfiguraciones='1') as tipodoc_pordefecto_pos,
		 banco_movil
		 from 
		 usuarios 
		 where 
		     usuario='".$_POST["usuario"]."' 
		 and password='".$_POST["password"]."'";

 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vValidaUsuario = array();
      $this->vvalidausuario = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vValidaUsuario[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vvalidausuario[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vValidaUsuario = false;
          $this->vValidaUsuario_erro = $this->Db->ErrorMsg();
          $this->vvalidausuario = false;
          $this->vvalidausuario_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vvalidausuario[0][0]))
{
	
	$this->sc_temp_g_recordarme = $vrecordarme;
	
	if($vrecordarme=="SI")
	{
		$this->sc_temp_g_usuario  = $vusua;
		$this->sc_temp_g_password =$vpass;
	}
	else
	{
		$this->sc_temp_g_usuario  = "";
		$this->sc_temp_g_password = "";
	}
	
	 
      $nm_select = "select item_menu from aplicaciones_menu"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vlistaapp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vlistaapp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vlistaapp = false;
          $this->vlistaapp_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->vlistaapp[0][0]))
	{
	$this->sc_temp_gaplicaciones_menu = $this->vlistaapp ;
	}
	
	 
      $nm_select = "select razonsoc, regimen,nit,dv,direccion,telefono from datosemp order by iddatos desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dsEmpresa = array();
      $this->dsempresa = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dsEmpresa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dsempresa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dsEmpresa = false;
          $this->dsEmpresa_erro = $this->Db->ErrorMsg();
          $this->dsempresa = false;
          $this->dsempresa_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->dsempresa[0][0]))
	{
		$this->sc_temp_empresa     =$this->dsempresa[0][0];
		$this->sc_temp_regimen_emp =$this->dsempresa[0][1];
		$this->sc_temp_nit		  =$this->dsempresa[0][2];
		$this->sc_temp_direccion	  =$this->dsempresa[0][4];
		$this->sc_temp_tele		  =$this->dsempresa[0][5];
	}
	else
	{
		$this->sc_temp_empresa     ="EMPRESA DEMO";
	}
	
	$vnombreusu = $this->vvalidausuario[0][0];
	if(!empty($vnombreusu))
	{
		$this->sc_temp_gnombreusuario           = $this->vvalidausuario[0][0];
		$this->sc_temp_gidtercero               = $this->vvalidausuario[0][1];
		
		$escajero = "NO";
		$cajas    = 0;
		$this->sc_temp_gsiescajero = "NO";
		
		 
      $nm_select = "select es_cajero from terceros where idtercero='".$this->sc_temp_gidtercero."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiEsCajero = array();
      $this->vsiescajero = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiEsCajero[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiescajero[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiEsCajero = false;
          $this->vSiEsCajero_erro = $this->Db->ErrorMsg();
          $this->vsiescajero = false;
          $this->vsiescajero_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->vsiescajero[0][0]))
		{
			$escajero = $this->vsiescajero[0][0];
			
			if($escajero=="SI")
			{
				
				$this->sc_temp_gsiescajero = "SI";
				
				 
      $nm_select = "select count(*) from bancos where comportamiento='SI'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vCajas = array();
      $this->vcajas = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vCajas[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vcajas[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vCajas = false;
          $this->vCajas_erro = $this->Db->ErrorMsg();
          $this->vcajas = false;
          $this->vcajas_erro = $this->Db->ErrorMsg();
      } 
;

				if(isset($this->vcajas[0][0]))
				{
					if($this->vcajas[0][0]>0)
					{
						$cajas = $this->vcajas[0][0];
					}
					else
					{	
						$vestado = "";
						$vpagina = "blank_fin_sesion";
						$vmensaje = "No hay cajas configuradas. Por favor hable con el administrador.";
					}
				}
				else
				{
					$vestado = "";
					$vpagina = "blank_fin_sesion";
					$vmensaje = "No hay cajas configuradas. Por favor hable con el administrador.";
				}
			}
		}
		$this->sc_temp_gidbanco = $this->vvalidausuario[0][26];
		
		$vsqld = "select porcentaje from programar_descuentos_generales where desde <= '".date("Y-m-d H:i:s")."' and hasta>'".date("Y-m-d H:i:s")."' and activo='SI' and cajas_afectadas like '%".$this->sc_temp_gidbanco."%'";
		
		 
      $nm_select = $vsqld; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDGeneral = array();
      $this->vdgeneral = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDGeneral[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdgeneral[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDGeneral = false;
          $this->vDGeneral_erro = $this->Db->ErrorMsg();
          $this->vdgeneral = false;
          $this->vdgeneral_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($this->vdgeneral[0][0]))
		{
			$this->sc_temp_gdescuento_general = $this->vdgeneral[0][0];
		}
		else
		{
			$this->sc_temp_gdescuento_general = "0";
		}
		
		$this->sc_temp_gidresolucion            = $this->vvalidausuario[0][2];
		$this->sc_temp_gusuariologueado         = $this->sc_temp_gusuario_logueo;
		$this->sc_temp_glineasporfactura        = $this->vvalidausuario[0][4];
		$this->sc_temp_gconsolidararticulos     = $this->vvalidausuario[0][5];
		$this->sc_temp_gespaciadodetallefactura = $this->vvalidausuario[0][6];
		$this->sc_temp_gserialguardado          = $this->vvalidausuario[0][7];
		$fecha_configuraciones     = $this->vvalidausuario[0][8];
		$this->sc_temp_gnombre_archivo_empresa  = $this->sc_temp_gbd_seleccionada;
		$this->sc_temp_gimpresorapos            = $this->vvalidausuario[0][9];

		if(!empty($this->vvalidausuario[0][10]))
		{
			$this->sc_temp_gimpresorapos = $this->vvalidausuario[0][10];
		}
		if(!empty($this->vvalidausuario[0][11]))
		{
			$this->sc_temp_gimpresorapos = $this->vvalidausuario[0][11];
		}

		$this->sc_temp_grazonsoc   = $this->vvalidausuario[0][12];
		$this->sc_temp_gnit        = $this->vvalidausuario[0][13];
		$this->sc_temp_gdireccion  = $this->vvalidausuario[0][14];
		$this->sc_temp_gtelefono   = $this->vvalidausuario[0][15];
		$this->sc_temp_gregimen    = $this->vvalidausuario[0][16];
		$this->sc_temp_gnaturaleza = $this->vvalidausuario[0][17];

		$nomempresa = $this->sc_temp_gnombre_archivo_empresa;



		if(!empty($this->vvalidausuario[0][18]))
		{
			
		}
		else
		{
			
		}

		$this->sc_temp_gTiempoSegRefreshDoc = $this->vvalidausuario[0][19];

		if(trim($this->sc_temp_gSerial) !== trim($this->sc_temp_gserialguardado))
		{

			$this->sc_temp_gmensaje = "Versión demo FacilWeb, le quedan ";

			if($fecha_configuraciones == "N"){

				$fecha_configuraciones = date("Y-m-d");

				
     $nm_select = "update configuraciones set fecha='".$fecha_configuraciones."' where idconfiguraciones='1'"; 
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

			$fecha_activacion = new DateTime($fecha_configuraciones);
			$fecha_actual     = new DateTime(date("Y-m-d"));
			$intervalo        = $fecha_activacion->diff($fecha_actual);
			$dias_restantes   = 30-$intervalo->format('%a');

			if($dias_restantes <= 30 and $dias_restantes > 0){

				$this->sc_temp_gmensaje  .= $dias_restantes." días.";

			}else{

				
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Su demo FacilWeb ha caducado.";
;
			}

		}else{

			$this->sc_temp_gmensaje = "";
		}


		$this->sc_temp_gGrupoUsuarioComanda = $this->vvalidausuario[0][20];

		$this->sc_temp_gModificarInventario = $this->vvalidausuario[0][21];

		if(isset($this->vvalidausuario[0][22]))
		{
			$this->sc_temp_gsesion_id  = $this->vvalidausuario[0][22];
		}
		else
		{
			$this->sc_temp_gsesion_id  = "";
		}
		
		$vdescripciongrupo   = $this->vvalidausuario[0][23];
		$this->sc_temp_gdescripciongrupo  = $vdescripciongrupo;
		$this->sc_temp_gsiaperturacaja    = $this->vvalidausuario[0][24];
		$this->sc_temp_docpordefectoenpos = $this->vvalidausuario[0][25];
		

		$vnombre_empresa = "";
		 
      $nm_select = "select nombre_empresa from empresas where nombre='".$this->sc_temp_gbd_seleccionada."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNombreEmpresa = array();
      $this->vnombreempresa = array();
      if ($SCrx = $this->Ini->nm_db_conn_facilweb->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vNombreEmpresa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vnombreempresa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNombreEmpresa = false;
          $this->vNombreEmpresa_erro = $this->Ini->nm_db_conn_facilweb->ErrorMsg();
          $this->vnombreempresa = false;
          $this->vnombreempresa_erro = $this->Ini->nm_db_conn_facilweb->ErrorMsg();
      } 
;
		if(isset($this->vnombreempresa[0][0]))
		{
			$vnombre_empresa = $this->vnombreempresa[0][0];
		}

		if($this->sc_temp_gGrupoUsuarioComanda == 0)
		{

			if($vdescripciongrupo != "ADMINISTRADORES")
			{

					 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select * from aplicaciones_permisos_usuario where usuario='".$this->sc_temp_gidtercero."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select * from aplicaciones_permisos_usuario where usuario='".$this->sc_temp_gidtercero."'"; 
      }
      else
      { 
          $nm_select = "select * from aplicaciones_permisos_usuario where usuario='".$this->sc_temp_gidtercero."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vPermisos = array();
      $this->vpermisos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vPermisos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vpermisos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vPermisos = false;
          $this->vPermisos_erro = $this->Db->ErrorMsg();
          $this->vpermisos = false;
          $this->vpermisos_erro = $this->Db->ErrorMsg();
      } 
;

					if(isset($this->vpermisos[0][0]))
					{

						$this->sc_temp_gPermisosUsuario = $this->vpermisos ;

						$vtmpsesion2  = session_id();
						$vbuscademo   = strpos($vnombre_empresa,'DEMO');

						if($vbuscademo === false)
						{
							if($vtmpsesion2 != $this->sc_temp_gsesion_id)
							{
								
								if(empty($this->sc_temp_gsesion_id))
								{
									if($escajero=="NO")
									{
										$vguardarsesion = "update usuarios set sesion_id='".$vtmpsesion2."' where usuario='".$this->sc_temp_gusuario_logueo."' and password='".$this->sc_temp_gpassword_logueo."'";
										
     $nm_select = $vguardarsesion; 
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

										
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
										
										$vestado = "";
										$vpagina = $vmenu;
										$vmensaje = "";
									}
									else
									{
										if($cajas>0)
										{
											$vestado = "";
											$vpagina = "control_seleccionar_cajas";
											$vmensaje = "";
										}
										else
										{
											$vguardarsesion = "update usuarios set sesion_id='".$vtmpsesion2."' where usuario='".$this->sc_temp_gusuario_logueo."' and password='".$this->sc_temp_gpassword_logueo."'";
											
     $nm_select = $vguardarsesion; 
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

											
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
											$vestado = "";
											$vpagina = $vmenu;
											$vmensaje = "";
										}
									}
								}
								else
								{
								
									if($escajero=="NO")
									{
										$vestado = "";
										$vpagina = "blank_continuar_sesion";
										$vmensaje = "";
									}
									else
									{
										if($cajas>0)
										{
											$vestado = "";
											$vpagina = "control_seleccionar_cajas";
											$vmensaje = "";
										}
										else
										{
											$vguardarsesion = "update usuarios set sesion_id='".$vtmpsesion2."' where usuario='".$this->sc_temp_gusuario_logueo."' and password='".$this->sc_temp_gpassword_logueo."'";
											
     $nm_select = $vguardarsesion; 
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
											
											
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
											$vestado = "";
											$vpagina = $vmenu;
											$vmensaje = "";
										}
									}
								}
							}
							else
							{
								
								if($escajero=="NO")
								{
									$vestado = "";
									$vpagina = "blank_continuar_sesion";
									$vmensaje = "";
								}
								else
								{
									if($cajas>0)
									{
										$vestado = "";
										$vpagina = "control_seleccionar_cajas";
										$vmensaje = "";
									}
									else
									{
										$vguardarsesion = "update usuarios set sesion_id='".$vtmpsesion2."' where usuario='".$this->sc_temp_gusuario_logueo."' and password='".$this->sc_temp_gpassword_logueo."'";
										
     $nm_select = $vguardarsesion; 
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
										
										
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
										$vestado = "";
										$vpagina = $vmenu;
										$vmensaje = "";
									}
								}
							}
						}
						else
						{
							
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
							$vestado = "";
							$vpagina = $vmenu;
							$vmensaje = "";
						}

					}
					else
					{
						
						$vestado = "";
						$vpagina = "";
						$vmensaje = "El usuario: ".$this->sc_temp_gusuario_logueo." no tiene definido los permisos, ingrese con el administrador y asigne permisos al usuario.";
					}

			}
			else
			{

					$this->sc_temp_gPermisosUsuario = "";

					$vtmpsesion2  = session_id();
					$vbuscademo   = strpos($vnombre_empresa,'DEMO');

					if($vbuscademo === false)
					{
						if($vtmpsesion2 != $this->sc_temp_gsesion_id)
						{
							
							if(empty($this->sc_temp_gsesion_id))
							{
								
								if($escajero=="NO")
								{
									$vguardarsesion = "update usuarios set sesion_id='".$vtmpsesion2."' where usuario='".$this->sc_temp_gusuario_logueo."' and password='".$this->sc_temp_gpassword_logueo."'";
									
     $nm_select = $vguardarsesion; 
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
									
									
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
									$vestado = "";
									$vpagina = $vmenu;
									$vmensaje = "";
								}
								else
								{
									if($cajas>0)
									{
										$vestado = "";
										$vpagina = "control_seleccionar_cajas";
										$vmensaje = "";
									}
									else
									{
										$vguardarsesion = "update usuarios set sesion_id='".$vtmpsesion2."' where usuario='".$this->sc_temp_gusuario_logueo."' and password='".$this->sc_temp_gpassword_logueo."'";
										
     $nm_select = $vguardarsesion; 
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
										
										
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
										$vestado = "";
										$vpagina = $vmenu;
										$vmensaje = "";
									}
								}
							}
							else
							{
								
								if($escajero=="NO")
								{
									$vestado = "";
									$vpagina = "blank_continuar_sesion";
									$vmensaje = "";
								}
								else
								{
									if($cajas>0)
									{
										$vestado = "";
										$vpagina = "control_seleccionar_cajas";
										$vmensaje = "";
									}
									else
									{
										$vguardarsesion = "update usuarios set sesion_id='".$vtmpsesion2."' where usuario='".$this->sc_temp_gusuario_logueo."' and password='".$this->sc_temp_gpassword_logueo."'";
										
     $nm_select = $vguardarsesion; 
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
										
										
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
										$vestado = "";
										$vpagina = $vmenu;
										$vmensaje = "";
									}
								}
							}
						}
						else
						{
						
							if($escajero=="NO")
							{
								$vestado = "";
								$vpagina = "blank_continuar_sesion";
								$vmensaje = "";
							}
							else
							{
								if($cajas>0)
								{
									$vestado = "";
									$vpagina = "control_seleccionar_cajas";
									$vmensaje = "";
								}
								else
								{
									$vguardarsesion = "update usuarios set sesion_id='".$vtmpsesion2."' where usuario='".$this->sc_temp_gusuario_logueo."' and password='".$this->sc_temp_gpassword_logueo."'";
									
     $nm_select = $vguardarsesion; 
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
									
									
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
									$vestado = "";
									$vpagina = $vmenu;
									$vmensaje = "";
								}
							}
						}
					}
					else
					{
						
						
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='INGRESAR',observaciones=''"; 
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
						$vestado = "";
						$vpagina = $vmenu;
						$vmensaje = "";
					}
			}
		}
		else
		{
			$vestado = "";
			$vpagina = "grid_lista_comandas";
			$vmensaje = "";
		}
	}
	else
	{
		
		$vestado = "";
		$vpagina = "";
		$vmensaje = "Usuario y/o password incorrecto.";
	}
}
else
{
	
	$vestado = "";
	$vpagina = "";
	$vmensaje = "Usuario y/o password incorrecto.";
}

$this->sc_temp_gFactsinexist = 'SI';

if(empty($vlincencia))
{
	$vpagina = "menu_mini";
}

echo json_encode(
	array(
		"estado"=>$vestado,
		"pagina"=>$vpagina,
		"mensaje"=>$vmensaje,
		"usuario"=>$this->sc_temp_gusuario_logueo,
		"password"=>$this->sc_temp_gpassword_logueo,
		"bd"=>$this->sc_temp_gbd_seleccionada,
		"suscripcion"=>$vactivo
	)
);
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_gbd_seleccionada)) {$_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
if (isset($this->sc_temp_gusuario_logueo)) {$_SESSION['gusuario_logueo'] = $this->sc_temp_gusuario_logueo;}
if (isset($this->sc_temp_gpassword_logueo)) {$_SESSION['gpassword_logueo'] = $this->sc_temp_gpassword_logueo;}
if (isset($this->sc_temp_gtipo_negocio)) {$_SESSION['gtipo_negocio'] = $this->sc_temp_gtipo_negocio;}
if (isset($this->sc_temp_g_recordarme)) {$_SESSION['g_recordarme'] = $this->sc_temp_g_recordarme;}
if (isset($this->sc_temp_g_usuario)) {$_SESSION['g_usuario'] = $this->sc_temp_g_usuario;}
if (isset($this->sc_temp_g_password)) {$_SESSION['g_password'] = $this->sc_temp_g_password;}
if (isset($this->sc_temp_gaplicaciones_menu)) {$_SESSION['gaplicaciones_menu'] = $this->sc_temp_gaplicaciones_menu;}
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_regimen_emp)) {$_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
if (isset($this->sc_temp_gnombreusuario)) {$_SESSION['gnombreusuario'] = $this->sc_temp_gnombreusuario;}
if (isset($this->sc_temp_gsiescajero)) {$_SESSION['gsiescajero'] = $this->sc_temp_gsiescajero;}
if (isset($this->sc_temp_gidbanco)) {$_SESSION['gidbanco'] = $this->sc_temp_gidbanco;}
if (isset($this->sc_temp_gdescuento_general)) {$_SESSION['gdescuento_general'] = $this->sc_temp_gdescuento_general;}
if (isset($this->sc_temp_gidresolucion)) {$_SESSION['gidresolucion'] = $this->sc_temp_gidresolucion;}
if (isset($this->sc_temp_gusuariologueado)) {$_SESSION['gusuariologueado'] = $this->sc_temp_gusuariologueado;}
if (isset($this->sc_temp_glineasporfactura)) {$_SESSION['glineasporfactura'] = $this->sc_temp_glineasporfactura;}
if (isset($this->sc_temp_gconsolidararticulos)) {$_SESSION['gconsolidararticulos'] = $this->sc_temp_gconsolidararticulos;}
if (isset($this->sc_temp_gespaciadodetallefactura)) {$_SESSION['gespaciadodetallefactura'] = $this->sc_temp_gespaciadodetallefactura;}
if (isset($this->sc_temp_gserialguardado)) {$_SESSION['gserialguardado'] = $this->sc_temp_gserialguardado;}
if (isset($this->sc_temp_gnombre_archivo_empresa)) {$_SESSION['gnombre_archivo_empresa'] = $this->sc_temp_gnombre_archivo_empresa;}
if (isset($this->sc_temp_gimpresorapos)) {$_SESSION['gimpresorapos'] = $this->sc_temp_gimpresorapos;}
if (isset($this->sc_temp_grazonsoc)) {$_SESSION['grazonsoc'] = $this->sc_temp_grazonsoc;}
if (isset($this->sc_temp_gnit)) {$_SESSION['gnit'] = $this->sc_temp_gnit;}
if (isset($this->sc_temp_gdireccion)) {$_SESSION['gdireccion'] = $this->sc_temp_gdireccion;}
if (isset($this->sc_temp_gtelefono)) {$_SESSION['gtelefono'] = $this->sc_temp_gtelefono;}
if (isset($this->sc_temp_gregimen)) {$_SESSION['gregimen'] = $this->sc_temp_gregimen;}
if (isset($this->sc_temp_gnaturaleza)) {$_SESSION['gnaturaleza'] = $this->sc_temp_gnaturaleza;}
if (isset($this->sc_temp_gTiempoSegRefreshDoc)) {$_SESSION['gTiempoSegRefreshDoc'] = $this->sc_temp_gTiempoSegRefreshDoc;}
if (isset($this->sc_temp_gSerial)) {$_SESSION['gSerial'] = $this->sc_temp_gSerial;}
if (isset($this->sc_temp_gmensaje)) {$_SESSION['gmensaje'] = $this->sc_temp_gmensaje;}
if (isset($this->sc_temp_gGrupoUsuarioComanda)) {$_SESSION['gGrupoUsuarioComanda'] = $this->sc_temp_gGrupoUsuarioComanda;}
if (isset($this->sc_temp_gModificarInventario)) {$_SESSION['gModificarInventario'] = $this->sc_temp_gModificarInventario;}
if (isset($this->sc_temp_gsesion_id)) {$_SESSION['gsesion_id'] = $this->sc_temp_gsesion_id;}
if (isset($this->sc_temp_gdescripciongrupo)) {$_SESSION['gdescripciongrupo'] = $this->sc_temp_gdescripciongrupo;}
if (isset($this->sc_temp_gsiaperturacaja)) {$_SESSION['gsiaperturacaja'] = $this->sc_temp_gsiaperturacaja;}
if (isset($this->sc_temp_docpordefectoenpos)) {$_SESSION['docpordefectoenpos'] = $this->sc_temp_docpordefectoenpos;}
if (isset($this->sc_temp_gPermisosUsuario)) {$_SESSION['gPermisosUsuario'] = $this->sc_temp_gPermisosUsuario;}
if (isset($this->sc_temp_gFactsinexist)) {$_SESSION['gFactsinexist'] = $this->sc_temp_gFactsinexist;}
$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'off'; 
//--- 
       $this->Db->Close(); 
       $this->Ini->nm_db_conn_facilweb->Close(); 
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
function fGestionarFTP($rutaarchivo,$host,$port,$user,$password,$carpeta)
{
$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'on';
  	
	$mensaje = "";
	
	try
	{
		if(is_readable($rutaarchivo))
		{
			$nombrearchivo = trim(basename($rutaarchivo).PHP_EOL);

			# Realizamos la conexion con el servidor
			$conn_id=@ftp_connect($host,$port);

			if($conn_id)
			{
				# Realizamos el login con nuestro usuario y contraseña
				if(@ftp_login($conn_id,$user,$password))
				{
					if (ftp_mkdir($conn_id, $carpeta)) 
					{
					} 
					else 
					{
					}
					
					# Cambiamos al directorio especificado
					if(@ftp_chdir($conn_id,$carpeta))
					{

						# Subimos el fichero
						if(@ftp_put($conn_id,$nombrearchivo,$rutaarchivo,FTP_ASCII))
						{
							$mensaje = "Fichero subido correctamente";
						}
						else
						{
							$mensaje = "No ha sido posible subir el fichero";
						}
						
					}
					else
					{
						$mensaje = "No existe el directorio especificado";
					}
				}
				else
				{
					$mensaje = "El usuario o la contraseña son incorrectos";
				}

				# Cerramos la conexion ftp
				ftp_close($conn_id);

			}
			else
			{
				$mensaje = "No ha sido posible conectar con el servidor";
			}
		}
		else
		{
		   $mensaje = "No existe o no es legible el archivo";
		}
		
		echo $mensaje." -- Cerre la ventana.";
		
		echo "<script>";
		echo "console.log('fGestionarFTP: ".$mensaje."');";
		echo "</script>";
		
	} catch (Exception $e) {
		
		echo "<script>";
		echo "console.log('fGestionarFTP: Excepción capturada: ".$e->getMessage()."');";
		echo "</script>";
	}

$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'off';
}
function ConectarFTP()
{
$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'on';
  
	define("SERVER","ftp.solucionesnavarro.com"); 
	define("PORT",21); 
	define("USER","p@gestionftpfacilweb.solucionesnavarro.com"); 
	define("PASSWORD",".facilweb2020"); 
	define("PASV",true); 
	
	$id_ftp=ftp_connect(SERVER,PORT); 
	ftp_login($id_ftp,USER,PASSWORD); 
	ftp_pasv($id_ftp,PASV); 
	return $id_ftp; 

$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'off';
}
function SubirArchivo($archivo_local,$carpeta){
$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'on';
  
	
	$id_ftp=$this->ConectarFTP();
	
	$nombrearchivo = trim(basename($archivo_local).PHP_EOL);
	
	$directorios = ftp_nlist($id_ftp, ".");
	
	if(!in_array($carpeta,$directorios))
	{
		if (ftp_mkdir($id_ftp, $carpeta)) 
		{
			echo "Creado con exito ".$carpeta."<br>";
		} 
	}
	
	ftp_chdir($id_ftp,$carpeta);
	ftp_put($id_ftp,$nombrearchivo,$archivo_local,FTP_BINARY);
	ftp_quit($id_ftp); 
	
	echo "Copia subida con éxito a la carpeta remota: ".$carpeta."<br>";

$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'off';
}
function ObtenerRuta(){
$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'on';
  
	
	$id_ftp=$this->ConectarFTP(); 
	$Directorio=ftp_pwd($id_ftp); 
	ftp_quit($id_ftp); 
	return $Directorio; 

$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'off';
}
function fCopiasBD($nomempresa,$ruta,$tipo,$retorno=false,$sinmovimiento="NO",$ubicacion_archivo="NO",$vpuerto=3311)
{
$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'on';
if (!isset($_SESSION['gOS'])) {$_SESSION['gOS'] = "";}
if (!isset($this->sc_temp_gOS)) {$this->sc_temp_gOS = (isset($_SESSION['gOS'])) ? $_SESSION['gOS'] : "";}
  
	try {
		
		if($this->sc_temp_gOS!="WIN")
		{
			 if (isset($this->sc_temp_gOS)) {$_SESSION['gOS'] = $this->sc_temp_gOS;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('blank_copia_php') . "/", $this->nm_location, "","_self", 440, 630);
 };
		}
		
		$vruta = getcwd();
		
		if (!file_exists($vruta.'/menu'))
		{
			chdir('../');
			$vruta = getcwd();
		}
		
		if(empty($ruta))
		{
			$ruta = $vruta.'/copias/'.$nomempresa;
		}
		
		if (!file_exists($ruta))
		{
			mkdir($ruta, 0777, true);
		}
		
		 $carpeta_tmp = '../tmp';

		 if (!file_exists($carpeta_tmp))
		 {
			 mkdir($carpeta_tmp, 0777, true);
		 }
		
		$gvnit = "";
		 
      $nm_select = "select concat(nit,'-',dv) from $nomempresa.datosemp"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vnit = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vnit[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vnit = false;
          $vnit_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($vnit[0][0]))
		{
			$gvnit = $vnit[0][0];
			$gvnit = $gvnit.'_';
		}
		
		$varchivocopia = $ruta.'/'.$tipo.'_'.$gvnit.$nomempresa.'_fecha_'.date('Y-m-d').'_hora_'.date('H-i-s').'.sql';
		
		if($sinmovimiento=="NO")
		{
			$vcmd = '"'.$vruta.'\mysql\bin\mysqldump.exe" -h localhost --port='.$vpuerto.' --user=copia --password=copia --no-create-info --skip-triggers --extended-insert=true --complete-insert '.$nomempresa.' > "'.$varchivocopia.'"';
			
			
		}
		else
		{
			$vcmd = '"'.$vruta.'\mysql\bin\mysqldump.exe" -h localhost --port='.$vpuerto.' --user=copia --password=copia --no-create-info --skip-triggers --extended-insert=true --complete-insert '.$nomempresa.' aplicaciones_menu aplicaciones_permisos bodegas c_costos caja_ventas colores colorxproducto configuraciones datosemp departamento detallecombos detallekardexcombos direccion formadepago formatosimpresion formatosimpresion_prefijos grupo impuestos iva municipio paises permisos productos resdian saborxproducto tallas tallaxproducto terceros tipoautoretencion tipoica tiporetefuente tipotransfe usuarios usuarios_grupos vencimiento_lote version webservicefe  > "'.$varchivocopia.'"';
		}
		
		shell_exec($vcmd);
		
		echo "<script>";
		echo "console.log('fCopiasBD: Copia realizada.');";
		echo "</script>";
		
		include_once($this->Ini->path_third . "/zipfile/zipfile.php");
$sc_Zip_files = new zipfile();
$sc_Zip_files->set_file( $varchivocopia.'.zip');
if (is_array($varchivocopia))
{
    foreach ($varchivocopia as $SC_cada_zip)
    {
        $sc_Zip_files->sc_zip_all($SC_cada_zip);
    }
}
else
{
    $sc_Zip_files->sc_zip_all($varchivocopia);
}
$sc_Zip_files->file();
;
		
		unlink($varchivocopia);
		
		if($retorno)
		{
			return addslashes($varchivocopia);
		}
		
		if($ubicacion_archivo=="SI")
		{
			return addslashes($varchivocopia.'.zip');
		}
		
	} catch (Exception $e) {
		
		echo "<script>";
		echo "console.log('fCopiasBD: Excepción capturada: ".$e->getMessage()."');";
		echo "</script>";
	}
if (isset($this->sc_temp_gOS)) {$_SESSION['gOS'] = $this->sc_temp_gOS;}
$_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'off';
}
   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0, $opc="")
   {
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
                  $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['blank_valida_sesion_ajax'][substr($val, 1, -1)];
              }
              else
              {
                  $tmp_parms .= $val;
              }
              $tmp_parms .= "?@?";
          }
          $nm_apl_parms = $tmp_parms;
      }
      $target = (empty($nm_target)) ? "_self" : $nm_target;
      if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
      {
          echo "<SCRIPT language=\"javascript\">";
          if (strtolower($target) == "_blank")
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
          $nm_apl_dest = $this->Ini->path_link . $nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
      if ($nm_target == "modal")
      {
          if (!empty($nm_apl_parms))
          {
              $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
              $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
              $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
          }
          $par_modal = "?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
          $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
          return;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['blank_valida_sesion_ajax']['iframe_print']) && $_SESSION['sc_session'][$this->Ini->sc_page]['blank_valida_sesion_ajax']['iframe_print'] )
      {
          $target = "_parent";
      }
   ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <HTML>
      <HEAD>
      <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
      if ($_SESSION['scriptcase']['proc_mobile'])
      {
?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }
?>
       <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
       <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
       <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
       <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
       <META http-equiv="Pragma" content="no-cache"/>
       <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
      </HEAD>
      <BODY>
   <form name="Fredir" method="post" 
                     target="_self"> 
     <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($nm_apl_parms) ?>"/>
<?php
   if ($target == "_blank")
   {
?>
       <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
     <input type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($nm_apl_retorno) ?>">
     <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page) ?>"/> 
<?php
   }
?>
   </form> 
      <SCRIPT language="javascript">
          window.onload = function(){
             submit_Fredir();
          };
          function submit_Fredir()
          {
              document.Fredir.target = "<?php echo $target ?>"; 
              document.Fredir.action = "<?php echo $nm_apl_dest ?>";
              document.Fredir.submit();
          }
      </SCRIPT>
      </BODY>
      </HTML>
   <?php
      if ($target != "_blank")
      {
          exit;
      }
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
   SC_dir_app_ini('FACILWEBv2');
   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['contr_erro'] = 'off';
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
            nm_limpa_str_blank_valida_sesion_ajax($nmgp_val);
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
            nm_limpa_str_blank_valida_sesion_ajax($nmgp_val);
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
       if (isset($_COOKIE['sc_apl_default_FACILWEBv2'])) {
           $apl_def = explode(",", $_COOKIE['sc_apl_default_FACILWEBv2']);
       }
       elseif (is_file($root . $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['blank_valida_sesion_ajax']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "blank_valida_sesion_ajax") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_FACILWEBv2'])) {
               $_SESSION['scriptcase']['blank_valida_sesion_ajax']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_FACILWEBv2'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["gusuario_logueo"])) 
   {
       $_SESSION["gusuario_logueo"] = $_POST["gusuario_logueo"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gusuario_logueo"]);
   }
   if (isset($_GET["gusuario_logueo"])) 
   {
       $_SESSION["gusuario_logueo"] = $_GET["gusuario_logueo"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gusuario_logueo"]);
   }
   if (!isset($_SESSION["gusuario_logueo"])) 
   {
       $_SESSION["gusuario_logueo"] = "";
   }
   if (isset($_POST["gpassword_logueo"])) 
   {
       $_SESSION["gpassword_logueo"] = $_POST["gpassword_logueo"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gpassword_logueo"]);
   }
   if (isset($_GET["gpassword_logueo"])) 
   {
       $_SESSION["gpassword_logueo"] = $_GET["gpassword_logueo"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gpassword_logueo"]);
   }
   if (!isset($_SESSION["gpassword_logueo"])) 
   {
       $_SESSION["gpassword_logueo"] = "";
   }
   if (isset($_POST["gbd_seleccionada"])) 
   {
       $_SESSION["gbd_seleccionada"] = $_POST["gbd_seleccionada"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gbd_seleccionada"]);
   }
   if (isset($_GET["gbd_seleccionada"])) 
   {
       $_SESSION["gbd_seleccionada"] = $_GET["gbd_seleccionada"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gbd_seleccionada"]);
   }
   if (!isset($_SESSION["gbd_seleccionada"])) 
   {
       $_SESSION["gbd_seleccionada"] = "";
   }
   if (isset($_POST["gaplicaciones_menu"])) 
   {
       $_SESSION["gaplicaciones_menu"] = $_POST["gaplicaciones_menu"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gaplicaciones_menu"]);
   }
   if (isset($_GET["gaplicaciones_menu"])) 
   {
       $_SESSION["gaplicaciones_menu"] = $_GET["gaplicaciones_menu"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gaplicaciones_menu"]);
   }
   if (!isset($_SESSION["gaplicaciones_menu"])) 
   {
       $_SESSION["gaplicaciones_menu"] = "";
   }
   if (isset($_POST["empresa"])) 
   {
       $_SESSION["empresa"] = $_POST["empresa"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["empresa"]);
   }
   if (isset($_GET["empresa"])) 
   {
       $_SESSION["empresa"] = $_GET["empresa"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["empresa"]);
   }
   if (!isset($_SESSION["empresa"])) 
   {
       $_SESSION["empresa"] = "";
   }
   if (isset($_POST["regimen_emp"])) 
   {
       $_SESSION["regimen_emp"] = $_POST["regimen_emp"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["regimen_emp"]);
   }
   if (isset($_GET["regimen_emp"])) 
   {
       $_SESSION["regimen_emp"] = $_GET["regimen_emp"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["regimen_emp"]);
   }
   if (!isset($_SESSION["regimen_emp"])) 
   {
       $_SESSION["regimen_emp"] = "";
   }
   if (isset($_POST["nit"])) 
   {
       $_SESSION["nit"] = $_POST["nit"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["nit"]);
   }
   if (isset($_GET["nit"])) 
   {
       $_SESSION["nit"] = $_GET["nit"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["nit"]);
   }
   if (!isset($_SESSION["nit"])) 
   {
       $_SESSION["nit"] = "";
   }
   if (isset($_POST["direccion"])) 
   {
       $_SESSION["direccion"] = $_POST["direccion"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["direccion"]);
   }
   if (isset($_GET["direccion"])) 
   {
       $_SESSION["direccion"] = $_GET["direccion"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["direccion"]);
   }
   if (!isset($_SESSION["direccion"])) 
   {
       $_SESSION["direccion"] = "";
   }
   if (isset($_POST["tele"])) 
   {
       $_SESSION["tele"] = $_POST["tele"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["tele"]);
   }
   if (isset($_GET["tele"])) 
   {
       $_SESSION["tele"] = $_GET["tele"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["tele"]);
   }
   if (!isset($_SESSION["tele"])) 
   {
       $_SESSION["tele"] = "";
   }
   if (isset($_POST["gnombreusuario"])) 
   {
       $_SESSION["gnombreusuario"] = $_POST["gnombreusuario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnombreusuario"]);
   }
   if (isset($_GET["gnombreusuario"])) 
   {
       $_SESSION["gnombreusuario"] = $_GET["gnombreusuario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnombreusuario"]);
   }
   if (!isset($_SESSION["gnombreusuario"])) 
   {
       $_SESSION["gnombreusuario"] = "";
   }
   if (isset($_POST["gidtercero"])) 
   {
       $_SESSION["gidtercero"] = $_POST["gidtercero"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gidtercero"]);
   }
   if (isset($_GET["gidtercero"])) 
   {
       $_SESSION["gidtercero"] = $_GET["gidtercero"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gidtercero"]);
   }
   if (!isset($_SESSION["gidtercero"])) 
   {
       $_SESSION["gidtercero"] = "";
   }
   if (isset($_POST["gsiescajero"])) 
   {
       $_SESSION["gsiescajero"] = $_POST["gsiescajero"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gsiescajero"]);
   }
   if (isset($_GET["gsiescajero"])) 
   {
       $_SESSION["gsiescajero"] = $_GET["gsiescajero"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gsiescajero"]);
   }
   if (!isset($_SESSION["gsiescajero"])) 
   {
       $_SESSION["gsiescajero"] = "";
   }
   if (isset($_POST["gidbanco"])) 
   {
       $_SESSION["gidbanco"] = $_POST["gidbanco"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gidbanco"]);
   }
   if (isset($_GET["gidbanco"])) 
   {
       $_SESSION["gidbanco"] = $_GET["gidbanco"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gidbanco"]);
   }
   if (!isset($_SESSION["gidbanco"])) 
   {
       $_SESSION["gidbanco"] = "";
   }
   if (isset($_POST["gdescuento_general"])) 
   {
       $_SESSION["gdescuento_general"] = $_POST["gdescuento_general"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gdescuento_general"]);
   }
   if (isset($_GET["gdescuento_general"])) 
   {
       $_SESSION["gdescuento_general"] = $_GET["gdescuento_general"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gdescuento_general"]);
   }
   if (!isset($_SESSION["gdescuento_general"])) 
   {
       $_SESSION["gdescuento_general"] = "";
   }
   if (isset($_POST["gidresolucion"])) 
   {
       $_SESSION["gidresolucion"] = $_POST["gidresolucion"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gidresolucion"]);
   }
   if (isset($_GET["gidresolucion"])) 
   {
       $_SESSION["gidresolucion"] = $_GET["gidresolucion"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gidresolucion"]);
   }
   if (!isset($_SESSION["gidresolucion"])) 
   {
       $_SESSION["gidresolucion"] = "";
   }
   if (isset($_POST["gusuariologueado"])) 
   {
       $_SESSION["gusuariologueado"] = $_POST["gusuariologueado"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gusuariologueado"]);
   }
   if (isset($_GET["gusuariologueado"])) 
   {
       $_SESSION["gusuariologueado"] = $_GET["gusuariologueado"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gusuariologueado"]);
   }
   if (!isset($_SESSION["gusuariologueado"])) 
   {
       $_SESSION["gusuariologueado"] = "";
   }
   if (isset($_POST["glineasporfactura"])) 
   {
       $_SESSION["glineasporfactura"] = $_POST["glineasporfactura"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["glineasporfactura"]);
   }
   if (isset($_GET["glineasporfactura"])) 
   {
       $_SESSION["glineasporfactura"] = $_GET["glineasporfactura"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["glineasporfactura"]);
   }
   if (!isset($_SESSION["glineasporfactura"])) 
   {
       $_SESSION["glineasporfactura"] = "";
   }
   if (isset($_POST["gconsolidararticulos"])) 
   {
       $_SESSION["gconsolidararticulos"] = $_POST["gconsolidararticulos"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gconsolidararticulos"]);
   }
   if (isset($_GET["gconsolidararticulos"])) 
   {
       $_SESSION["gconsolidararticulos"] = $_GET["gconsolidararticulos"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gconsolidararticulos"]);
   }
   if (!isset($_SESSION["gconsolidararticulos"])) 
   {
       $_SESSION["gconsolidararticulos"] = "";
   }
   if (isset($_POST["gespaciadodetallefactura"])) 
   {
       $_SESSION["gespaciadodetallefactura"] = $_POST["gespaciadodetallefactura"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gespaciadodetallefactura"]);
   }
   if (isset($_GET["gespaciadodetallefactura"])) 
   {
       $_SESSION["gespaciadodetallefactura"] = $_GET["gespaciadodetallefactura"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gespaciadodetallefactura"]);
   }
   if (!isset($_SESSION["gespaciadodetallefactura"])) 
   {
       $_SESSION["gespaciadodetallefactura"] = "";
   }
   if (isset($_POST["gserialguardado"])) 
   {
       $_SESSION["gserialguardado"] = $_POST["gserialguardado"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gserialguardado"]);
   }
   if (isset($_GET["gserialguardado"])) 
   {
       $_SESSION["gserialguardado"] = $_GET["gserialguardado"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gserialguardado"]);
   }
   if (!isset($_SESSION["gserialguardado"])) 
   {
       $_SESSION["gserialguardado"] = "";
   }
   if (isset($_POST["gnombre_archivo_empresa"])) 
   {
       $_SESSION["gnombre_archivo_empresa"] = $_POST["gnombre_archivo_empresa"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnombre_archivo_empresa"]);
   }
   if (isset($_GET["gnombre_archivo_empresa"])) 
   {
       $_SESSION["gnombre_archivo_empresa"] = $_GET["gnombre_archivo_empresa"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnombre_archivo_empresa"]);
   }
   if (!isset($_SESSION["gnombre_archivo_empresa"])) 
   {
       $_SESSION["gnombre_archivo_empresa"] = "";
   }
   if (isset($_POST["gimpresorapos"])) 
   {
       $_SESSION["gimpresorapos"] = $_POST["gimpresorapos"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gimpresorapos"]);
   }
   if (isset($_GET["gimpresorapos"])) 
   {
       $_SESSION["gimpresorapos"] = $_GET["gimpresorapos"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gimpresorapos"]);
   }
   if (!isset($_SESSION["gimpresorapos"])) 
   {
       $_SESSION["gimpresorapos"] = "";
   }
   if (isset($_POST["grazonsoc"])) 
   {
       $_SESSION["grazonsoc"] = $_POST["grazonsoc"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["grazonsoc"]);
   }
   if (isset($_GET["grazonsoc"])) 
   {
       $_SESSION["grazonsoc"] = $_GET["grazonsoc"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["grazonsoc"]);
   }
   if (!isset($_SESSION["grazonsoc"])) 
   {
       $_SESSION["grazonsoc"] = "";
   }
   if (isset($_POST["gnit"])) 
   {
       $_SESSION["gnit"] = $_POST["gnit"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnit"]);
   }
   if (isset($_GET["gnit"])) 
   {
       $_SESSION["gnit"] = $_GET["gnit"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnit"]);
   }
   if (!isset($_SESSION["gnit"])) 
   {
       $_SESSION["gnit"] = "";
   }
   if (isset($_POST["gdireccion"])) 
   {
       $_SESSION["gdireccion"] = $_POST["gdireccion"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gdireccion"]);
   }
   if (isset($_GET["gdireccion"])) 
   {
       $_SESSION["gdireccion"] = $_GET["gdireccion"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gdireccion"]);
   }
   if (!isset($_SESSION["gdireccion"])) 
   {
       $_SESSION["gdireccion"] = "";
   }
   if (isset($_POST["gtelefono"])) 
   {
       $_SESSION["gtelefono"] = $_POST["gtelefono"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gtelefono"]);
   }
   if (isset($_GET["gtelefono"])) 
   {
       $_SESSION["gtelefono"] = $_GET["gtelefono"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gtelefono"]);
   }
   if (!isset($_SESSION["gtelefono"])) 
   {
       $_SESSION["gtelefono"] = "";
   }
   if (isset($_POST["gregimen"])) 
   {
       $_SESSION["gregimen"] = $_POST["gregimen"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gregimen"]);
   }
   if (isset($_GET["gregimen"])) 
   {
       $_SESSION["gregimen"] = $_GET["gregimen"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gregimen"]);
   }
   if (!isset($_SESSION["gregimen"])) 
   {
       $_SESSION["gregimen"] = "";
   }
   if (isset($_POST["gnaturaleza"])) 
   {
       $_SESSION["gnaturaleza"] = $_POST["gnaturaleza"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnaturaleza"]);
   }
   if (isset($_GET["gnaturaleza"])) 
   {
       $_SESSION["gnaturaleza"] = $_GET["gnaturaleza"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnaturaleza"]);
   }
   if (!isset($_SESSION["gnaturaleza"])) 
   {
       $_SESSION["gnaturaleza"] = "";
   }
   if (isset($_POST["gTiempoSegRefreshDoc"])) 
   {
       $_SESSION["gTiempoSegRefreshDoc"] = $_POST["gTiempoSegRefreshDoc"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gTiempoSegRefreshDoc"]);
   }
   if (!isset($_POST["gTiempoSegRefreshDoc"]) && isset($_POST["gtiemposegrefreshdoc"])) 
   {
       $_SESSION["gTiempoSegRefreshDoc"] = $_POST["gtiemposegrefreshdoc"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gTiempoSegRefreshDoc"]);
   }
   if (isset($_GET["gTiempoSegRefreshDoc"])) 
   {
       $_SESSION["gTiempoSegRefreshDoc"] = $_GET["gTiempoSegRefreshDoc"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gTiempoSegRefreshDoc"]);
   }
   if (!isset($_GET["gTiempoSegRefreshDoc"]) && isset($_GET["gtiemposegrefreshdoc"])) 
   {
       $_SESSION["gTiempoSegRefreshDoc"] = $_GET["gtiemposegrefreshdoc"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gTiempoSegRefreshDoc"]);
   }
   if (!isset($_SESSION["gTiempoSegRefreshDoc"])) 
   {
       $_SESSION["gTiempoSegRefreshDoc"] = "";
   }
   if (isset($_POST["gSerial"])) 
   {
       $_SESSION["gSerial"] = $_POST["gSerial"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gSerial"]);
   }
   if (!isset($_POST["gSerial"]) && isset($_POST["gserial"])) 
   {
       $_SESSION["gSerial"] = $_POST["gserial"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gSerial"]);
   }
   if (isset($_GET["gSerial"])) 
   {
       $_SESSION["gSerial"] = $_GET["gSerial"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gSerial"]);
   }
   if (!isset($_GET["gSerial"]) && isset($_GET["gserial"])) 
   {
       $_SESSION["gSerial"] = $_GET["gserial"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gSerial"]);
   }
   if (!isset($_SESSION["gSerial"])) 
   {
       $_SESSION["gSerial"] = "";
   }
   if (isset($_POST["gmensaje"])) 
   {
       $_SESSION["gmensaje"] = $_POST["gmensaje"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gmensaje"]);
   }
   if (isset($_GET["gmensaje"])) 
   {
       $_SESSION["gmensaje"] = $_GET["gmensaje"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gmensaje"]);
   }
   if (!isset($_SESSION["gmensaje"])) 
   {
       $_SESSION["gmensaje"] = "";
   }
   if (isset($_POST["gGrupoUsuarioComanda"])) 
   {
       $_SESSION["gGrupoUsuarioComanda"] = $_POST["gGrupoUsuarioComanda"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gGrupoUsuarioComanda"]);
   }
   if (!isset($_POST["gGrupoUsuarioComanda"]) && isset($_POST["ggrupousuariocomanda"])) 
   {
       $_SESSION["gGrupoUsuarioComanda"] = $_POST["ggrupousuariocomanda"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gGrupoUsuarioComanda"]);
   }
   if (isset($_GET["gGrupoUsuarioComanda"])) 
   {
       $_SESSION["gGrupoUsuarioComanda"] = $_GET["gGrupoUsuarioComanda"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gGrupoUsuarioComanda"]);
   }
   if (!isset($_GET["gGrupoUsuarioComanda"]) && isset($_GET["ggrupousuariocomanda"])) 
   {
       $_SESSION["gGrupoUsuarioComanda"] = $_GET["ggrupousuariocomanda"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gGrupoUsuarioComanda"]);
   }
   if (!isset($_SESSION["gGrupoUsuarioComanda"])) 
   {
       $_SESSION["gGrupoUsuarioComanda"] = "";
   }
   if (isset($_POST["gModificarInventario"])) 
   {
       $_SESSION["gModificarInventario"] = $_POST["gModificarInventario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gModificarInventario"]);
   }
   if (!isset($_POST["gModificarInventario"]) && isset($_POST["gmodificarinventario"])) 
   {
       $_SESSION["gModificarInventario"] = $_POST["gmodificarinventario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gModificarInventario"]);
   }
   if (isset($_GET["gModificarInventario"])) 
   {
       $_SESSION["gModificarInventario"] = $_GET["gModificarInventario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gModificarInventario"]);
   }
   if (!isset($_GET["gModificarInventario"]) && isset($_GET["gmodificarinventario"])) 
   {
       $_SESSION["gModificarInventario"] = $_GET["gmodificarinventario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gModificarInventario"]);
   }
   if (!isset($_SESSION["gModificarInventario"])) 
   {
       $_SESSION["gModificarInventario"] = "";
   }
   if (isset($_POST["gsesion_id"])) 
   {
       $_SESSION["gsesion_id"] = $_POST["gsesion_id"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gsesion_id"]);
   }
   if (isset($_GET["gsesion_id"])) 
   {
       $_SESSION["gsesion_id"] = $_GET["gsesion_id"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gsesion_id"]);
   }
   if (!isset($_SESSION["gsesion_id"])) 
   {
       $_SESSION["gsesion_id"] = "";
   }
   if (isset($_POST["gdescripciongrupo"])) 
   {
       $_SESSION["gdescripciongrupo"] = $_POST["gdescripciongrupo"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gdescripciongrupo"]);
   }
   if (isset($_GET["gdescripciongrupo"])) 
   {
       $_SESSION["gdescripciongrupo"] = $_GET["gdescripciongrupo"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gdescripciongrupo"]);
   }
   if (!isset($_SESSION["gdescripciongrupo"])) 
   {
       $_SESSION["gdescripciongrupo"] = "";
   }
   if (isset($_POST["gsiaperturacaja"])) 
   {
       $_SESSION["gsiaperturacaja"] = $_POST["gsiaperturacaja"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gsiaperturacaja"]);
   }
   if (isset($_GET["gsiaperturacaja"])) 
   {
       $_SESSION["gsiaperturacaja"] = $_GET["gsiaperturacaja"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gsiaperturacaja"]);
   }
   if (!isset($_SESSION["gsiaperturacaja"])) 
   {
       $_SESSION["gsiaperturacaja"] = "";
   }
   if (isset($_POST["docpordefectoenpos"])) 
   {
       $_SESSION["docpordefectoenpos"] = $_POST["docpordefectoenpos"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["docpordefectoenpos"]);
   }
   if (isset($_GET["docpordefectoenpos"])) 
   {
       $_SESSION["docpordefectoenpos"] = $_GET["docpordefectoenpos"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["docpordefectoenpos"]);
   }
   if (!isset($_SESSION["docpordefectoenpos"])) 
   {
       $_SESSION["docpordefectoenpos"] = "";
   }
   if (isset($_POST["gPermisosUsuario"])) 
   {
       $_SESSION["gPermisosUsuario"] = $_POST["gPermisosUsuario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gPermisosUsuario"]);
   }
   if (!isset($_POST["gPermisosUsuario"]) && isset($_POST["gpermisosusuario"])) 
   {
       $_SESSION["gPermisosUsuario"] = $_POST["gpermisosusuario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gPermisosUsuario"]);
   }
   if (isset($_GET["gPermisosUsuario"])) 
   {
       $_SESSION["gPermisosUsuario"] = $_GET["gPermisosUsuario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gPermisosUsuario"]);
   }
   if (!isset($_GET["gPermisosUsuario"]) && isset($_GET["gpermisosusuario"])) 
   {
       $_SESSION["gPermisosUsuario"] = $_GET["gpermisosusuario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gPermisosUsuario"]);
   }
   if (!isset($_SESSION["gPermisosUsuario"])) 
   {
       $_SESSION["gPermisosUsuario"] = "";
   }
   if (isset($_POST["gFactsinexist"])) 
   {
       $_SESSION["gFactsinexist"] = $_POST["gFactsinexist"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gFactsinexist"]);
   }
   if (!isset($_POST["gFactsinexist"]) && isset($_POST["gfactsinexist"])) 
   {
       $_SESSION["gFactsinexist"] = $_POST["gfactsinexist"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gFactsinexist"]);
   }
   if (isset($_GET["gFactsinexist"])) 
   {
       $_SESSION["gFactsinexist"] = $_GET["gFactsinexist"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gFactsinexist"]);
   }
   if (!isset($_GET["gFactsinexist"]) && isset($_GET["gfactsinexist"])) 
   {
       $_SESSION["gFactsinexist"] = $_GET["gfactsinexist"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gFactsinexist"]);
   }
   if (!isset($_SESSION["gFactsinexist"])) 
   {
       $_SESSION["gFactsinexist"] = "";
   }
   if (isset($_POST["gtipo_negocio"])) 
   {
       $_SESSION["gtipo_negocio"] = $_POST["gtipo_negocio"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gtipo_negocio"]);
   }
   if (isset($_GET["gtipo_negocio"])) 
   {
       $_SESSION["gtipo_negocio"] = $_GET["gtipo_negocio"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gtipo_negocio"]);
   }
   if (!isset($_SESSION["gtipo_negocio"])) 
   {
       $_SESSION["gtipo_negocio"] = "";
   }
   if (isset($_POST["g_recordarme"])) 
   {
       $_SESSION["g_recordarme"] = $_POST["g_recordarme"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["g_recordarme"]);
   }
   if (isset($_GET["g_recordarme"])) 
   {
       $_SESSION["g_recordarme"] = $_GET["g_recordarme"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["g_recordarme"]);
   }
   if (!isset($_SESSION["g_recordarme"])) 
   {
       $_SESSION["g_recordarme"] = "";
   }
   if (isset($_POST["g_usuario"])) 
   {
       $_SESSION["g_usuario"] = $_POST["g_usuario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["g_usuario"]);
   }
   if (isset($_GET["g_usuario"])) 
   {
       $_SESSION["g_usuario"] = $_GET["g_usuario"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["g_usuario"]);
   }
   if (!isset($_SESSION["g_usuario"])) 
   {
       $_SESSION["g_usuario"] = "";
   }
   if (isset($_POST["g_password"])) 
   {
       $_SESSION["g_password"] = $_POST["g_password"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["g_password"]);
   }
   if (isset($_GET["g_password"])) 
   {
       $_SESSION["g_password"] = $_GET["g_password"];
       nm_limpa_str_blank_valida_sesion_ajax($_SESSION["g_password"]);
   }
   if (!isset($_SESSION["g_password"])) 
   {
       $_SESSION["g_password"] = "";
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
   if (isset($_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['iframe_menu']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "blank_valida_sesion_ajax";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'blank_valida_sesion_ajax' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('blank_valida_sesion_ajax' == $sReferer || 'blank_valida_sesion_ajax_' == substr($sReferer, 0, 25))
       {
           $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'blank_valida_sesion_ajax')
   {
       $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['blank_valida_sesion_ajax']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/blank_valida_sesion_ajax_erro.php");
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
                nm_limpa_str_blank_valida_sesion_ajax($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
       if (isset($gusuario_logueo)) 
       {
           $_SESSION['gusuario_logueo'] = $gusuario_logueo;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gusuario_logueo"]);
       }
       if (isset($gpassword_logueo)) 
       {
           $_SESSION['gpassword_logueo'] = $gpassword_logueo;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gpassword_logueo"]);
       }
       if (isset($gbd_seleccionada)) 
       {
           $_SESSION['gbd_seleccionada'] = $gbd_seleccionada;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gbd_seleccionada"]);
       }
       if (isset($gaplicaciones_menu)) 
       {
           $_SESSION['gaplicaciones_menu'] = $gaplicaciones_menu;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gaplicaciones_menu"]);
       }
       if (isset($empresa)) 
       {
           $_SESSION['empresa'] = $empresa;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["empresa"]);
       }
       if (isset($regimen_emp)) 
       {
           $_SESSION['regimen_emp'] = $regimen_emp;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["regimen_emp"]);
       }
       if (isset($nit)) 
       {
           $_SESSION['nit'] = $nit;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["nit"]);
       }
       if (isset($direccion)) 
       {
           $_SESSION['direccion'] = $direccion;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["direccion"]);
       }
       if (isset($tele)) 
       {
           $_SESSION['tele'] = $tele;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["tele"]);
       }
       if (isset($gnombreusuario)) 
       {
           $_SESSION['gnombreusuario'] = $gnombreusuario;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnombreusuario"]);
       }
       if (isset($gidtercero)) 
       {
           $_SESSION['gidtercero'] = $gidtercero;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gidtercero"]);
       }
       if (isset($gsiescajero)) 
       {
           $_SESSION['gsiescajero'] = $gsiescajero;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gsiescajero"]);
       }
       if (isset($gidbanco)) 
       {
           $_SESSION['gidbanco'] = $gidbanco;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gidbanco"]);
       }
       if (isset($gdescuento_general)) 
       {
           $_SESSION['gdescuento_general'] = $gdescuento_general;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gdescuento_general"]);
       }
       if (isset($gidresolucion)) 
       {
           $_SESSION['gidresolucion'] = $gidresolucion;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gidresolucion"]);
       }
       if (isset($gusuariologueado)) 
       {
           $_SESSION['gusuariologueado'] = $gusuariologueado;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gusuariologueado"]);
       }
       if (isset($glineasporfactura)) 
       {
           $_SESSION['glineasporfactura'] = $glineasporfactura;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["glineasporfactura"]);
       }
       if (isset($gconsolidararticulos)) 
       {
           $_SESSION['gconsolidararticulos'] = $gconsolidararticulos;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gconsolidararticulos"]);
       }
       if (isset($gespaciadodetallefactura)) 
       {
           $_SESSION['gespaciadodetallefactura'] = $gespaciadodetallefactura;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gespaciadodetallefactura"]);
       }
       if (isset($gserialguardado)) 
       {
           $_SESSION['gserialguardado'] = $gserialguardado;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gserialguardado"]);
       }
       if (isset($gnombre_archivo_empresa)) 
       {
           $_SESSION['gnombre_archivo_empresa'] = $gnombre_archivo_empresa;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnombre_archivo_empresa"]);
       }
       if (isset($gimpresorapos)) 
       {
           $_SESSION['gimpresorapos'] = $gimpresorapos;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gimpresorapos"]);
       }
       if (isset($grazonsoc)) 
       {
           $_SESSION['grazonsoc'] = $grazonsoc;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["grazonsoc"]);
       }
       if (isset($gnit)) 
       {
           $_SESSION['gnit'] = $gnit;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnit"]);
       }
       if (isset($gdireccion)) 
       {
           $_SESSION['gdireccion'] = $gdireccion;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gdireccion"]);
       }
       if (isset($gtelefono)) 
       {
           $_SESSION['gtelefono'] = $gtelefono;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gtelefono"]);
       }
       if (isset($gregimen)) 
       {
           $_SESSION['gregimen'] = $gregimen;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gregimen"]);
       }
       if (isset($gnaturaleza)) 
       {
           $_SESSION['gnaturaleza'] = $gnaturaleza;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gnaturaleza"]);
       }
       if (!isset($gTiempoSegRefreshDoc) && isset($gtiemposegrefreshdoc)) 
       {
           $_SESSION["gTiempoSegRefreshDoc"] = $gtiemposegrefreshdoc;
       }
       if (isset($gTiempoSegRefreshDoc)) 
       {
           $_SESSION['gTiempoSegRefreshDoc'] = $gTiempoSegRefreshDoc;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gTiempoSegRefreshDoc"]);
       }
       if (!isset($gSerial) && isset($gserial)) 
       {
           $_SESSION["gSerial"] = $gserial;
       }
       if (isset($gSerial)) 
       {
           $_SESSION['gSerial'] = $gSerial;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gSerial"]);
       }
       if (isset($gmensaje)) 
       {
           $_SESSION['gmensaje'] = $gmensaje;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gmensaje"]);
       }
       if (!isset($gGrupoUsuarioComanda) && isset($ggrupousuariocomanda)) 
       {
           $_SESSION["gGrupoUsuarioComanda"] = $ggrupousuariocomanda;
       }
       if (isset($gGrupoUsuarioComanda)) 
       {
           $_SESSION['gGrupoUsuarioComanda'] = $gGrupoUsuarioComanda;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gGrupoUsuarioComanda"]);
       }
       if (!isset($gModificarInventario) && isset($gmodificarinventario)) 
       {
           $_SESSION["gModificarInventario"] = $gmodificarinventario;
       }
       if (isset($gModificarInventario)) 
       {
           $_SESSION['gModificarInventario'] = $gModificarInventario;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gModificarInventario"]);
       }
       if (isset($gsesion_id)) 
       {
           $_SESSION['gsesion_id'] = $gsesion_id;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gsesion_id"]);
       }
       if (isset($gdescripciongrupo)) 
       {
           $_SESSION['gdescripciongrupo'] = $gdescripciongrupo;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gdescripciongrupo"]);
       }
       if (isset($gsiaperturacaja)) 
       {
           $_SESSION['gsiaperturacaja'] = $gsiaperturacaja;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gsiaperturacaja"]);
       }
       if (isset($docpordefectoenpos)) 
       {
           $_SESSION['docpordefectoenpos'] = $docpordefectoenpos;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["docpordefectoenpos"]);
       }
       if (!isset($gPermisosUsuario) && isset($gpermisosusuario)) 
       {
           $_SESSION["gPermisosUsuario"] = $gpermisosusuario;
       }
       if (isset($gPermisosUsuario)) 
       {
           $_SESSION['gPermisosUsuario'] = $gPermisosUsuario;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gPermisosUsuario"]);
       }
       if (!isset($gFactsinexist) && isset($gfactsinexist)) 
       {
           $_SESSION["gFactsinexist"] = $gfactsinexist;
       }
       if (isset($gFactsinexist)) 
       {
           $_SESSION['gFactsinexist'] = $gFactsinexist;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gFactsinexist"]);
       }
       if (isset($gtipo_negocio)) 
       {
           $_SESSION['gtipo_negocio'] = $gtipo_negocio;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["gtipo_negocio"]);
       }
       if (isset($g_recordarme)) 
       {
           $_SESSION['g_recordarme'] = $g_recordarme;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["g_recordarme"]);
       }
       if (isset($g_usuario)) 
       {
           $_SESSION['g_usuario'] = $g_usuario;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["g_usuario"]);
       }
       if (isset($g_password)) 
       {
           $_SESSION['g_password'] = $g_password;
           nm_limpa_str_blank_valida_sesion_ajax($_SESSION["g_password"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_blank_valida_sesion_ajax = new blank_valida_sesion_ajax_apl();
   $contr_blank_valida_sesion_ajax->controle();
//
   function nm_limpa_str_blank_valida_sesion_ajax(&$str)
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
