<?php
   include_once('frm_pos_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['frm_pos']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['frm_pos']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['frm_pos']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['frm_pos']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['frm_pos']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['frm_pos']['glo_nm_path_cache']      = "";
   $_SESSION['scriptcase']['frm_pos']['glo_nm_path_doc']        = "";
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
    if(empty($_SESSION['scriptcase']['frm_pos']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['frm_pos']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['frm_pos']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['frm_pos']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['frm_pos']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['frm_pos']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['frm_pos']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['frm_pos']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['frm_pos']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['frm_pos']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class frm_pos_ini
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
      $_SESSION['sc_session'][$this->sc_page]['frm_pos']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "frm_pos"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "FACILWEBv2"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20180605"; 
      $this->nm_hr_criacao   = "163114"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20210922"; 
      $this->nm_hr_ult_alt   = "171402"; 
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
      $this->path_prod       = $_SESSION['scriptcase']['frm_pos']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['frm_pos']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['frm_pos']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['frm_pos']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['frm_pos']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['frm_pos']['glo_nm_path_doc'];
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
      if (!isset($_SESSION['scriptcase']['frm_pos']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['frm_pos']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['frm_pos']['save_session']['data'] = '';
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/frm_pos';
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
      $_SESSION['sc_session'][$this->sc_page]['frm_pos']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
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
      if (isset($_SESSION['scriptcase']['frm_pos']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['frm_pos']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['frm_pos']['actual_lang']) || $_SESSION['scriptcase']['frm_pos']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['frm_pos']['actual_lang'] = $this->str_lang;
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
          include_once("frm_pos_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['frm_pos']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['frm_pos']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['frm_pos']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
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
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['ancor_save'] = $_POST['ancor_save'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['frm_pos']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["frm_pos"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["frm_pos"] as $sTmpTargetLink => $sTmpTargetWidget)
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
          unset($_SESSION['scriptcase']['frm_pos']['glo_nm_conexao']);
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
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['frm_pos']['session_timeout']['redir']))
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
      $_SESSION['sc_session'][$this->sc_page]['frm_pos']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['frm_pos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['frm_pos']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['frm_pos']['sc_outra_jan'])) 
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
      include_once($this->path_aplicacao . "frm_pos_erro.class.php"); 
      $this->Erro = new frm_pos_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('frm_pos'); 
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
      if (isset($_SESSION['scriptcase']['frm_pos']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['frm_pos']['session_timeout']['redir_tp'] == "R") {
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
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['frm_pos']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['frm_pos']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['frm_pos']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['frm_pos']['session_timeout']);
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
      $_SESSION['sc_session'][$this->sc_page]['frm_pos']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['frm_pos']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQXsDuBqHAN7VWBODMvOVcFKDur/VoFGHQBiZSB/HIrwV5JsDMBYHEJGDurmDoBOHQNwZSBiZ1BYHQJeDMrwV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgveHArCV5B7ZuJsHQXOH9BiHABYHQB/DMvmVcB/DuFGDoXGHQBqZ1BOHABYHQJeHgBeVkJ3H5FGVoFGDcXGZ9F7HIrwHuF7DMzGVIBsDWrmDoXGDcNmZ1BOHAN7HQBiDMveHArCHEXKDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQBqZ1BiHArYHQX7HgBeVkJ3DurmVoFGHQNwH9FUD1veHuJwHgvOV9BUDWBmDoXGHQJmZSBqDSBeHuXGHgNOZSJqDurmVoFGHQJeDQB/HIrKHQF7DMBYVIB/HEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3DuX/ZuJsHQNwZSBiHIBeHuB/HgvOVIB/H5B3DoXGHQXOZSBqHArYHuBOHgBOVkJ3DurmVoFGHQFYZ9XGDSBYHuB/HgrwDkBsDWrmDoXGHQBsH9BqZ1vOZMBqDMvCHErCDWB3DoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9FaHArKD5NUDEvsHEFiDuJeDoFUHQXGZSFGHAN7V5FUHuzGZSrCV5X7VEF7D9BiH9FaHIBOD5FaDEBeHEBUH5F/VoFGD9XsDQBOZ1rwV5BqHgvsDkFCDWJeDoFGD9XOZ1rqD1rKD5rqDMBYHEJGH5FYVoB/HQXGZ9rqD1BeD5rqHuvmVcBOH5B7VoBqD9XOH9B/D1rwD5BiDEBeHEFiV5FaDoXGD9NmDQB/Z1rwD5BqHuzGVcFiV5X/VoF7HQNwVIJsHAvCV5X7HgveDkB/DWFGVoFGHQXODQBqHIvsD5F7DMvOV9BUDWXKVEF7HQJmZ1F7Z1vmD5rqDEBOHArCDWF/HIBqHQJKZ9F7D1BeHQrqHuzGVcFeH5XCVoB/D9BsZ1FGHANOHQBOHgBYHEBUH5X/DoBOHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoraDcJUZSFaHAN7V5X7DMNKZSJGDWF/DoB/D9NwZ9rqZ1N7V5JeHuvmVcrsDWXCHMBiD9BsVIraD1rwV5X7HgBeHErCDWF/VoBiDcJUZSX7Z1BYHuFaHuvmZSNiHEX/DoXGDcNmZ1rqD1rKHQF7DEBOHEXeDuXKZuFaDcBiH9FUZ1rwHuF7HgvOVcBUHEFYHMBiD9BsVIraD1rwV5X7HgBeHEFiDWFqDoBODcXOZSX7HANOV5BOHuNODkBOV5F/VEBiDcJUZkFGHArKV5FUDMrYZSXeV5FqHIJsHQBiZ9XGHANKV5BODMvOV9BUDWB3VEFGHQNmVINUHAN7HQJwDEBODkFeH5FYVoFGHQJKDQJwHAN7HQJsHuvmDkBsDur/DoF7D9BiZkFGHAzGZMFaDErKDkXKDWXCVoFaHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHIrqHQBsZkFGZ1BeHuXGHgBeHEJqDWr/HIBiHQNmZ9rqHAveHuB/DMBYVcFeDWF/HIFGHQBiZSBOD1rwHuJeDMrYHErCV5XCHIJwDcXGH9BiHArYHQrqDMBOVIBsV5FGVoFaHQXGZSBqZ1BeHuB/HgBeHEJqH5FYHIJsD9XsZ9JeD1BeD5F7DMvmVcBUHEX/DoJsHQNmZ1XGZ1veZMNU";
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['frm_pos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['frm_pos']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['frm_pos']['sc_outra_jan'])) 
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
              if (isset($_SESSION['scriptcase']['frm_pos']['glo_nm_conexao']) && $_SESSION['scriptcase']['frm_pos']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['frm_pos']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['frm_pos']['glo_nm_perfil']) && $_SESSION['scriptcase']['frm_pos']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['frm_pos']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['frm_pos']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['frm_pos']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['frm_pos']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['frm_pos']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['frm_pos']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['frm_pos']['glo_nm_conexao']))
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
      }
      if (isset($_SESSION['scriptcase']['frm_pos']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['frm_pos']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['frm_pos']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['frm_pos']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['frm_pos']['embutida_init']) 
      {
          if (!isset($_SESSION['gsiescajero'])) 
          {
              $this->nm_falta_var .= "gsiescajero; ";
          }
          if (!isset($_SESSION['gdescripciongrupo'])) 
          {
              $this->nm_falta_var .= "gdescripciongrupo; ";
          }
          if (!isset($_SESSION['docpordefectoenpos'])) 
          {
              $this->nm_falta_var .= "docpordefectoenpos; ";
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
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date1'];
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
          if (!$_SESSION['sc_session'][$script_case_init]['frm_pos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['frm_pos']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['frm_pos']['sc_outra_jan'])) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['frm_pos']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['frm_pos']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['frm_pos']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv2', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['frm_pos']['embutida'])
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
          $_SESSION['sc_session'][$this->sc_page]['frm_pos']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['frm_pos']['embutida'])
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_sep_date1'];
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
       return (isset($_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['frm_pos']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
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
class frm_pos_apl
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

      $this->Ini = new frm_pos_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['frm_pos']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['frm_pos']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['frm_pos']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['frm_pos'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['frm_pos']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['frm_pos']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('frm_pos') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['frm_pos']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "frm_pos")
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['frm_pos']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['frm_pos']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['frm_pos']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
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
      include_once($this->Ini->path_aplicacao . "frm_pos_erro.class.php"); 
      $this->Erro      = new frm_pos_erro();
      $this->Erro->Ini = $this->Ini;
//
      header("X-XSS-Protection: 1; mode=block");
      header("X-Frame-Options: SAMEORIGIN");
      $_SESSION['scriptcase']['frm_pos']['contr_erro'] = 'on';
if (!isset($_SESSION['docpordefectoenpos'])) {$_SESSION['docpordefectoenpos'] = "";}
if (!isset($this->sc_temp_docpordefectoenpos)) {$this->sc_temp_docpordefectoenpos = (isset($_SESSION['docpordefectoenpos'])) ? $_SESSION['docpordefectoenpos'] : "";}
if (!isset($_SESSION['gdescripciongrupo'])) {$_SESSION['gdescripciongrupo'] = "";}
if (!isset($this->sc_temp_gdescripciongrupo)) {$this->sc_temp_gdescripciongrupo = (isset($_SESSION['gdescripciongrupo'])) ? $_SESSION['gdescripciongrupo'] : "";}
if (!isset($_SESSION['gsiescajero'])) {$_SESSION['gsiescajero'] = "";}
if (!isset($this->sc_temp_gsiescajero)) {$this->sc_temp_gsiescajero = (isset($_SESSION['gsiescajero'])) ? $_SESSION['gsiescajero'] : "";}
  $vporcentaje_propina_sugerida = 0;

 
      $nm_select = "SELECT valor_propina_sugerida FROM configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vConfiguraciones = array();
      $this->vconfiguraciones = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vConfiguraciones[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vconfiguraciones[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vConfiguraciones = false;
          $this->vConfiguraciones_erro = $this->Db->ErrorMsg();
          $this->vconfiguraciones = false;
          $this->vconfiguraciones_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vconfiguraciones[0][0]))
{
	$vporcentaje_propina_sugerida = $this->vconfiguraciones[0][0];
}

;
;
;
;
;
;
;
;
;

?>
<head>
<!--
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">-->

<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'jquery-ui.css'); ?>">
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-ui.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'sweetalert2/sweetalert2.all.min.js'); ?>"></script>

	
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'sweetalert2/sweetalert2.min.css'); ?>">
<script src="<?php echo sc_url_library('prj', 'js', 'alertify.js'); ?>"></script>
	
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/alertify.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/default.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/semantic.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/bootstrap.min.css'); ?>">
	
<script src="<?php echo sc_url_library('prj', 'js', 'jquery.blockUI.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/alertify.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/default.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/semantic.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/bootstrap.min.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'bootstrap.min.css'); ?>">
	
<script src="<?php echo sc_url_library('prj', 'js', 'popper.min.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'bootstrap.min.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'bootbox.min.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'bootbox.locales.min.js'); ?>"></script>
	
<script>
$(document).ready(function(){
	$.blockUI({ 
		message: 'Cargando...', 
		css: { 
		border: 'none', 
		padding: '15px', 
		backgroundColor: '#000', 
		'-webkit-border-radius': '10px', 
		'-moz-border-radius': '10px', 
		opacity: .5, 
		color: '#fff'
		}
	});	
});
</script>
	
<style>
iframe { margin:0; padding:0; height:100%; }
    iframe { display:block; width:100%; border:none; }
</style>

<?php
$this->CSS();
$this->JS();
?>
</head>
<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">

<iframe src="" id="miVentana" style="display:none;position:fixed;margin:0;padding:0;z-index:9999;"></iframe>

<div style='width:100%;'>
<div class="columnacontenido columna1">
<br>
<table border="0" width="100%">
	<tr>
		<!--
		<td width='60px'>
			<label>GRUPOS</label>
		</td>
        -->
		<td width='60px'>
			<label>UNIDAD</label>
		</td>
		<td>
			<label>PRECIO</label>
		</td>
		<td width='200px'>
			<input type="hidden" id="idproductoseleccionado" />
			<input type="hidden" id="ivaproductoseleccionado" />
			<input type="hidden" id="iventaunidad" />
			<input type="hidden" id="idbodega" />
			<input type="hidden" id="ifechavec" />
			<input type="hidden" id="ilote2" />
			<input type="hidden" id="idfactura" value="<?php if(isset($_GET['gidfactura'])){ echo $_GET['gidfactura'];} ?>"/>
			<input type="hidden" id="isiescajero" value="<?php if(isset($this->sc_temp_gsiescajero)){ echo $this->sc_temp_gsiescajero;} ?>"/>
			<input type="hidden" id="siesadmin" value="<?php if(isset($this->sc_temp_gdescripciongrupo)){ echo $this->sc_temp_gdescripciongrupo;} ?>"/>
			
			<label>CODBARRA</label>
		</td>
		<td>
			<table style="width:100%;" border="0">
			<tr>
			<td>
			<label>PRODUCTO</label>
			</td>
			<?php
			if($vporcentaje_propina_sugerida>0)
			{
				echo "<td style='text-align:right;'>PROPINA SUGERIDA: $<span id='valor_propina'>0</span></td><td style='width:70px;text-align:right;'><input id='si_propina' type='checkbox' value='SI' checked='checked'/><label for='si_propina'>SI</label><input id='porcentaje_propina' type='hidden' value='".intval($vporcentaje_propina_sugerida)."' /></td>";
			}
			else
			{
				echo "<td style='text-align:right;display:none;'>PROPINA SUGERIDA: $<span id='valor_propina'></span></td><td style='width:70px;display:none;'><input id='si_propina' type='checkbox' value='SI' /><label for='si_propina'>SI</label><input id='porcentaje_propina' type='hidden' value='".intval($vporcentaje_propina_sugerida)."' /></td>";
			}
			?>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<!--
		<td  style="text-align:center;">
			<a id="ventagrupos"  style="cursor:pointer;"><img src='../_lib/img/scriptcase__NM__ico__NM__cubes_32.png' width='40px' /></a>
		</td>
        -->
		<td>
			<select id="ventaunidad" style="width:100px;">
				<option>MENOR</option>
				<option>MAYOR</option>
			</select>
		</td>
		<td>
			<select id="sc_precio" style="width:100px;">
				<option value='1'>PRECIO1</option>
				<option value='2'>PRECIO2</option>
				<option value='3'>PRECIO3</option>
			</select>
		</td>
		<td>
			<input id="txt_articulo" name="txt_articulo" class="inputingreso" type="text"  style="width:200px;" autocomplete="off" autofocus/>
		</td>
		<td style="width:100%;">
			<input id="ventaarticulomanual" name="ventaarticulomanual" class="inputingreso" type="text" autocomplete="off" style="width:100%;"/>
		</td>
	</tr>
</table>
<div id="rautocompletar"></div>
<br>
<table class="formatotabla" id="detallefactura">
	<thead>
		<tr>
			<th width="40px">ITEM</th>
			<th>PRODUCTO</th>
			<th width="100px">CANTIDAD</th>
			<th width="150px" style="text-align:center;" >UNITARIO</th>
			<th width="150px" style="text-align:center;" >DTO.</th>
			<th width="100px" style="text-align:center;" >TOTAL</th>
			<th width="40px"></th>
			<th width="40px"></th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
</table>
</div>
<div class="columnacontenido columna2">
	<div id="masterventa">
		<table border="0">
			<tbody>
				<tr>
					<th colspan='2'>
						<table border='0' width='100%'> 
							<tr>
								<td  style="text-align:center;" ><a id="ventapagar" style="cursor:pointer;" ><img  src='../_lib/img/scriptcase__NM__ico__NM__money_bill_32.png' width='35px' title='Cobrar'/></a></td>
								<td  style="text-align:center;" ><a id="ventacobrar" style="cursor:pointer;" ><img  src='../_lib/img/scriptcase__NM__ico__NM__cashier_32.png' width='30px' title='Varias formas de pago'/></a></td>
								<td style="text-align:center;"><a id="vaciarfactura" style="cursor:pointer;" width='30px'><img src='../_lib/img/scriptcase__NM__ico__NM__garbage_empty_32.png' width='30px' title='Borrar los productos del documento'/></a></td>
								<td style="text-align:center;"><a id="abrircajon" style="cursor:pointer;"><img src='../_lib/img/scriptcase__NM__ico__NM__cabinet_open_32.png' width='30px' title='Abrir cajón monedero' /></a></td>
								<td style="text-align:center;"><a id="btn_imprimir" style="cursor:pointer;"><img src='../_lib/img/scriptcase__NM__ico__NM__printer3_32.png' width='30px' title='Imprimir sin asentar' /></a></td>
								<td style="text-align:center;"><a id="volveralalista" style="cursor:pointer;"><img src='../_lib/img/scriptcase__NM__ico__NM__undo_32.png' width='30px' title='Volver a la lista' /></a></td>
							</tr>
						</table>
					</th>
				</tr>
				<tr>
					<th colspan="2">
						<div id="totalventa">$<span id="vtotalventa">0</span></div>
					</th>
				</tr>
				<tr>
				  <td colspan="2">
					<table border="0">
						<tr>
							<th>
								<label>CANTIDAD</label>
							</th>
							<th>
								<label>UNITARIO</label>
							</th>
							<th>
								<label>DTO.</label>
							</th>
						</tr>
						<tr>
							<td>
								<input id="ventaitemcantidad" name="ventaitemcantidad" class="inputingreso2" type="text" />
							</td>
							<td>
								<input id="ventaitemprecio" name="ventaitemprecio" class="inputingreso2" type="text"  />
							</td>
							<td>
								<input id="ventaitemdescuento" name="ventaitemdescuento" class="inputingreso2" type="text"  />
							</td>
						</tr>
					</table>
				  </td>
				</tr>
				<tr>
					<th>
						<label>CAJA</label>
					</th>
					<th>
						<label>TIPO</label>
					</th>
				</tr>
				<tr>
					<th>
						<select id="cajadocumento" name="cajadocumento">
							
						</select>
					</th>
					<th>
						<select id="tipodocumento" name="tipodocumento">
							<?php
							if(isset($this->sc_temp_docpordefectoenpos))
							{
								if($this->sc_temp_docpordefectoenpos=="FV")
								{
									echo "<option value='FV' selected='selected'>FACTURA</option>";
									echo "<option value='RS' >REMISION</option>";
								}

								if($this->sc_temp_docpordefectoenpos=="RS")
								{
									echo "<option value='FV' >FACTURA</option>";
									echo "<option value='RS' selected='selected'>REMISION</option>";
								}
								
								if(empty($this->sc_temp_docpordefectoenpos))
								{
									echo "<option value='FV' selected='selected'>FACTURA</option>";
									echo "<option value='RS' >REMISION</option>";
								}
							}
							else
							{
								echo "<option value='FV' selected='selected'>FACTURA</option>";
								echo "<option value='RS' >REMISION</option>";
							}
							?>
						</select>
					</th>
				</tr>
				<tr>
					<th colspan="2">
						<select id="tipod" name="tipod">
							<option value='1' >Venta Nacional</option>
							<option value='2' >Exportación</option>
							<option value='3' >Contingencia</option>
							<option value='AIU' >Venta AIU</option>
						</select>
					</th>
				</tr>
				<tr>
				  <td colspan="2">
					<table border="0" id="div_aiu" style="display:none;">
						<tr>
							<th>
								<label>ADMON%</label>
							</th>
							<th>
								<label>IMPREVISTO%</label>
							</th>
							<th>
								<label>UTILIDAD%</label>
							</th>
						</tr>
						<tr>
							<td>
								<input id="venta_admon" name="venta_admon" class="inputingreso2" type="number" style="text-align:center;" value="8"/>
							</td>
							<td>
								<input id="venta_imprevisto" name="venta_imprevisto" class="inputingreso2" type="number" style="text-align:center;" value="2" />
							</td>
							<td>
								<input id="venta_utilidad" name="venta_utilidad" class="inputingreso2" type="number" style="text-align:center;"  value="6"/>
							</td>
						</tr>
						<tr>
							<td>
								<input id="venta_admon_valor" name="venta_admon_valor" class="inputingreso2" type="text" />
							</td>
							<td>
								<input id="venta_imprevisto_valor" name="venta_imprevisto_valor" class="inputingreso2" type="text" />
							</td>
							<td>
								<input id="venta_utilidad_valor" name="venta_utilidad_valor" class="inputingreso2" type="text" />
							</td>
						</tr>
					</table>
				  </td>
				</tr>
				<tr>
					<th>
						<label>PREFIJO</label>
					</th>
					<th>
						<label>F.PAGO</label>
					</th>
				</tr>
				<tr>
					<td>
						<select id="ventaprefijo"></select>
					</td>
					<td>
						<select id="formapago" data-mini="true">
							<option value="2">CONTADO</option>
							<option value="1">CREDITO</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="numerofactura">Nº VENTA</label>
					</th>
					<th>
						<label for="formapago">FECHA</label>
					</th>
				</tr>
				<tr>
					<td>
						<input id="numerofactura" size="10" type="text" value="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
					</td>
					<td>
						<input id="fecha" type="date" />
					</td>
				</tr>
				<tr>
					<th>
						<label class="sicredito" style="display:none;">DIAS</label>
					</th>
					<th>
						<label class="sicredito" style="display:none;">VENCIMIENTO</label>
					</th>
				</tr>
				<tr>
					<td>
						<input id="ventadiascredito" type="text" class="sicredito" style="display:none;" size="10"  style="text-align:center;"/>
					</td>
					<td>
						<input id="ventavencimiento" type="date" class="sicredito" style="display:none;" />
					</td>
				</tr>
				<tr>
					<td style="text-align:center;">
						
						<a id="ventacliente" style="cursor:pointer;"><img src='../_lib/img/scriptcase__NM__ico__NM__user_view_32.png' width='40px' /></a>
					</td>
					<td>
						<input id="cliente" type="text" placeholder="CC/NIT" value="0000000"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text"  id="nombrecliente" value="VARIOS" disabled="disabled">
						<hr>
					</td>
				</tr>
				<tr>
					<th colspan="2">
						<label>DIRECCIÓN</label>
					</th>
				</tr>
				
				<tr>
					<td colspan="2">
						<select id="ventadireccion"></select>
					</td>
				</tr>
			
				<tr style="display:none;">
					<th>
						<label>RECIBIDO</label>
					</th>
					<th>
						<label>VUELTO</label>
					</th>
				</tr>
				<tr style="display:none;">
					
					<th class="vrecibido">
						$<span id="vrecibido"></span>
					</th>
					<th class="vvuelto">
						$<span id="vvuelto"></span>
					</th>
				</tr>
				
				<tr>
					<th colspan="2">
						<label>VENDEDOR</label>
					</th>
				</tr>
				<tr>
					<th colspan="2">
						<select id="idvendedor">
							
						</select>
					</th>
				</tr>
				
				<tr>
					<th colspan="2">
						<label>OBSERVACIONES</label>
					</th>
				</tr>
				<tr>
					<th colspan="2">
						<textArea id="idobservaciones" style="width:100%;text-transform: uppercase;" rows="5" class='form-control'>
							
						</textArea>
					</th>
				</tr>
				
				<tr>
					<th>
						<label>ORDEN COMPRA</label>
					</th>
					<th>
						<label>FECHA ORDEN</label>
					</th>
				</tr>
				<tr>
					
					<th>
						<input id="ordencompra" name="ordencompra" type="text" class="form-control" autocomplete="off"/>
					</th>
					<th>
						<input id="ordenfecha" name="ordenfecha" type="date" class="form-control"/>
					</th>
				</tr>
					
			</tbody>
		</table>
	</div>
</div>
<div id="dialog" title="Autorizar">
	<center>
	<input id="dusuario" type="text" size="25" autocomplete="false" placeholder="Usuario" required />
	<br>
    <input id="dpassword" type="password" size="25" autocomplete="false" placeholder="Contraseña"/>
	<br><br>
	<button id="idautorizar">Autorizar</button>
	</center>
</div>
</div>
</body>
<?php
if (isset($this->sc_temp_gsiescajero)) {$_SESSION['gsiescajero'] = $this->sc_temp_gsiescajero;}
if (isset($this->sc_temp_gdescripciongrupo)) {$_SESSION['gdescripciongrupo'] = $this->sc_temp_gdescripciongrupo;}
if (isset($this->sc_temp_docpordefectoenpos)) {$_SESSION['docpordefectoenpos'] = $this->sc_temp_docpordefectoenpos;}
$_SESSION['scriptcase']['frm_pos']['contr_erro'] = 'off'; 
//--- 
       $this->Db->Close(); 
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
function CSS()
{
$_SESSION['scriptcase']['frm_pos']['contr_erro'] = 'on';
  
?>
<style>
button{
	cursor:pointer;	
}
#detallefactura{
	
	font-size: 16px !important;
}
input:focus{
	
	background-color: #f9f9f9;
}
select:focus{

	background-color: #f9f9f9;
}

select{
	
	text-align:center;
	font-size: 16px;
	height: 35px !important;
	padding: 3px;
	border-radius: 5px;
}

*{
	font-family: Arial;
}

input{

	padding-left: 10px;
	
}

label{
	
	color: #636363;
}

td{
	
	color: #636363; 
}

#detallefactura input{

	border: 1px solid white;
	background-color: white;
}

.formatotabla{

	font-size:12px;
	font-family:Arial;
	border-collapse: collapse;
	width: 100%;
}

.formatotabla tr td{ 

  background: #fff; 
  border-bottom: 2px solid #ccc; 
}
.formatotabla th { 

  background: #fff; 
  color: #636363; 
  border-bottom: 4px solid #636363;
}
.formatotabla td{
	
	color: #636363; 
}
.formatotabla td, th {

  padding: 6px; 
  text-align: left;
  cursor:pointer; 
}

input[type=text]{
	
	border: 1px solid #b1afae;
	color: #636363; 
	border-radius: 5px !important;
	-webkit-appearance: none;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	
}

.inputingreso{

	font-size: 30px;
}
	
.inputingreso2{

	font-size: 20px;
}

.inputcenter{
	
	text-align:center;
	font-size: 16px;
}

.columna1{
	
	width:78%;
	float:left;
	margin-right:5px;
	margin-left:5px;
}

.columna2{
	
	padding: 5px;
	width:20%;
	float:left;
	border: 0px solid #b1afae;
	border-radius: 5px;
}

#totalventa{
	
	width:100%;
	height: 60px;
	background-color: #727cf5;
	color: white;
	font-size: 30px;
	text-align:center;
	padding-top:20px;
	border-radius: 5px;
}

#masterventa{
	
	width:100%;
}

#masterventa table{
	
	width:100%;
}

#masterventa th{
	
	color: #636363; 
}

#masterventa input,select{
	
	width:100%;
	border: 1px solid #b1afae;
	height: 30px;
	color: #636363; 
	
}
hr{

	background: #b1afae; 
	border: 1px solid #b1afae;
}

button{
	
	width:100%;
	height: 30px;
	background-color:  #34495e;
	color: white;
	font-size: 18px;
	text-align:center;
	padding: 3px;
	border-radius: 5px;
}

#numerofactura{

	text-align: center;
}

.vrecibido{

	background-color: #828282;
	color: white !important;
	border-radius: 5px;
}
.vvuelto{

	background-color: #34495e;
	color: white !important;
	border-radius: 5px;
}

.editarcantidaditem{

	background-color: #c93434 !important;
	color: white !important;
}

#ventamodo{

	font-size: 16px;
	width: 120px;
	height: 38px;
	margin-left: 0px;
}

#ventaitemcantidad{

	text-align: center;
}

#ventaitemprecio{

	text-align: right;
}

#ventaitemdescuento{

	text-align: center;
}
</style>
<?php

$_SESSION['scriptcase']['frm_pos']['contr_erro'] = 'off';
}
function JS()
{
$_SESSION['scriptcase']['frm_pos']['contr_erro'] = 'on';
  
?>
<script>

function redirect_blank(url) {
  var a = document.createElement('a');
  a.target="_blank";
  a.href=url;
  a.click();
}
	
function cuantasVecesAparece(cadena, caracter)
{
  var indices = [];
  for(var i = 0; i < cadena.length; i++) {
    if (cadena[ i].toLowerCase() === caracter) indices.push(i);
  }
	return indices.length;
}
								   
function fReemplazarCaracter(cadena,caracter)
{
	var cantidadcaracteres = cuantasVecesAparece(cadena, caracter);	
	
	for(i=0;cantidadcaracteres>=i;i++)
	{
		cadena = cadena.replace(caracter,"");
	}
	
	return cadena;
}
	
	
function fVerDetalleItem(viddet2)
{
	
	console.log("fVerDetalleItem: ");
	console.log(viddet2);
	
	if(!$.isEmptyObject(viddet2))
	{
	
		$.post("../frm_pos_gestionardetalle/index.php",{

				viddet2:viddet2,
				consultarlvs:""

			},function(r){

				alertify.alert('Detalle',r, 

					function()
					{ 
					}
				);
		});
	}
	else
	{
		alertify.error('No maneja Lote, Vencimiento y/o Serial.'); 
	}
}
	
function fVerObservacionItem(viddet2)
{
	
	console.log("fVerObservacionItem: ");
	console.log(viddet2);
	
	if(!$.isEmptyObject(viddet2))
	{
	
		$.post("../frm_pos_gestionardetalle/index.php",{

				viddet2:viddet2,
				observacionitem:""

			},function(r){

			   
			
				bootbox.prompt({
					title: "Digite la observación:",
					inputType: 'textarea',
					value: r,
					closeButton: false,
					callback: function (result) {
						console.log(result);
						if(result!=null && result != 'null' && !$.isEmptyObject(result))
						{
							fCambiarObservacionItem(viddet2,result);
						}
					}
				});
	
				
		});
	}
}
	
function fCambiarObservacionItem(viddet2,observaciones)
{
	console.log("fCambiarObservacionItem: ");
	console.log("iddet: "+viddet2+" -- observaciones: "+observaciones);
	
	if(!$.isEmptyObject(viddet2))
	{
	
		$.post("../frm_pos_gestionardetalle/index.php",{

				viddet2:viddet2,
	            observaciones:observaciones,
				cambiarobservacionitem:""

			},function(r){

				console.log(r);
		});
	}
}
	
	
function fDiasEntreFechas(f1,f2)
{
 var aFecha1 = f1.split('-');
 var aFecha2 = f2.split('-');
 var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]);
 var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]);
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
 return dias;
}
	
function sumarDias(fecha,d)
{
  	var Fecha = new Date();
	var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
	var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
	var aFecha = sFecha.split(sep);
	var fecha = aFecha[0]+'/'+aFecha[1]+'/'+aFecha[2];
	fecha= new Date(fecha);
	fecha.setDate(fecha.getDate()+parseInt(d));
	var anno=fecha.getFullYear();
	var mes= fecha.getMonth()+1;
	var dia= fecha.getDate();
	mes = (mes < 10) ? ("0" + mes) : mes;
	dia = (dia < 10) ? ("0" + dia) : dia;
	var fechaFinal = anno+sep+mes+sep+dia;
	return (fechaFinal);
}	
	
function fSimularEnterAutoPos(id)
{
	var e = jQuery.Event("keypress")
	e.which = 13;
	$("#"+id).keypress(function(){}).trigger(e);	
	
	console.log(id);
}
	
var SORTER = {};

SORTER.sort = function(which, dir) {

	SORTER.dir = (dir == "desc") ? -1 : 1;

	$(which).each(function() {

		var sorted = $(this).find("> tr").sort(function(a, b) {

		return $(a).find('input').val() > $(b).find('input').val() ? SORTER.dir : -SORTER.dir;});

		$(this).append(sorted);

	});

};
	
window.history.forward();
function sinVueltaAtras(){ window.history.forward(); }

function fHoy(anio=true,mes=true,dia=true){

	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();

	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;

	if(anio && mes && dia){

		return today = year + "-" + month + "-" + day; 
	}

	if(anio && mes && dia==false){

		return today = year + "-" + month + "-01"; 
	}

	if(anio && mes==false && dia){

		return today = year + "-01-" + day; 
	}
	
	if(anio==false && mes && dia==false){

		return today = month; 
	}
}

function formatNumber(amount, decimals) {

    amount += ''; 
    amount = parseFloat(amount.replace(/[^.,0-9]/, '')); 
	
    decimals = decimals || 2; 

    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}
	
function formatNumber2(amount, decimals) {

    amount += ''; 
    amount = parseFloat(amount.replace(/[^.,0-9]/, '')); 
	
    decimals = decimals || 0; 

    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}
	
function fListarElementos(idtabla,idlocalStorage){

	var tabla;
	var clave = localStorage.key(idlocalStorage);
    var dato = $.parseJSON(localStorage.getItem(clave));
	var contadorp = 1;

    $.each(dato,function(index,d){
		
		var contador = 1;
		tabla += "<tr id='items"+contadorp+"' >";
		$.each(d,function(id,data){
	
			  if(contador == 1){

				tabla += "<td><input id='itemsagregados"+contadorp+"' type='radio' onkeyup='fEliminarItem(event,\"items"+contadorp+"\",this.id);' name='itemsagregados' /></td>";


			  }else if(contador == 2){

			  }else if(contador == 4){
	
				  var cant1 = data;
	              var cant2 = cant1;
				  
				  tabla += '<td><input size="7" class="inputcenter solonumeros" type="text" value=' +formatNumber(cant2)+ ' /></td>';
	
			  }else if(contador == 5){
				  tabla += '<td><input size="12" class="inputcenter solonumeros" type="text" value=' +formatNumber(data)+ ' /></td>';
			  }else{
				  tabla += '<td>' +data+ '</td>';						
			  }

			  contador++;
		});
		tabla += '</tr>';
		contadorp++;
    });


	$(idtabla).append(tabla);
}

function fGuardarEnMemoria(id,datos){
	
	if(!$.isEmptyObject(id) && !$.isEmptyObject(datos)){
		
        localStorage.removeItem(id);
		
		if(!localStorage.setItem(id,JSON.stringify(datos))){
	
		}
	}
}
	
if(localStorage.tabladetalle != undefined){
	
}
	
function fIndexarTablaDetalle()
{
	var valor = [];
	var contador = 1;
	
	$("input[type=radio]").each(function(){
       	valor[ contador] = $(this).val();
    	contador++;
    });
		
	for(i=$("#detallefactura tr").length;i >= 0;i--){
				
		if(i>0){
	
			$("#detallefactura tr:eq("+i+")").attr("id","items"+i);
			$("#detallefactura tr:eq("+i+") td:eq(0)").html(i+"<input id='itemsagregados"+i+"' value='"+valor[ i]+"' type='radio' onkeyup='fEliminarItem(event,\"items"+i+"\",this.id);' name='itemsagregados' />");
		}			
	}	
}

	
function fEliminarItem(e,id,idradio){
	
	var code = (e.keyCode ? e.keyCode : e.which);
	
	if(code == 46){

		var iddet = $("#itemsagregados"+id.substr(5,7)).val();
		var sipropina   = "NO";
		
		if($('#si_propina').prop('checked'))
		{
			sipropina = "SI";
		}
		
		console.log("iddet: "+iddet);

		$.post("../frm_pos_gestionardetalle/index.php",{

			iddet:iddet,
			idfactura: $("#idfactura").val(),
			sipropina: sipropina

		},function(r){

			console.log("Log data fEliminarItem: ");
			console.log(r);
	
			$("#"+id).remove();
			$("#txt_articulo").focus();
			
			$("#valor_propina").text(formatNumber(r));
	
			SORTER.sort('#detallefactura tbody','desc');

			fRecalcular();




			console.log("Filas despues de eliminar item: "+$("#detallefactura tr").length);

			
		});
	}
	
	if(code == 38){
		
		if(idradio == $("input[type=radio]").first().attr("id")){

			$('#'+$("input[type=radio]").first().attr("id")).prop("checked", false);
			$("#txt_articulo").focus();
		}
	}
}
					  
function fRecalcular(){

	var filas = document.getElementById("detallefactura").getElementsByTagName('tr').length;
	var vtotal = 0;		
	var vbase = 0;
	var viva = 0;
	if(filas > 1){
		for(i=0;i<filas;i++){
			if(i>=1){

				p = document.getElementById("detallefactura").getElementsByTagName('tr')[ i].getElementsByTagName('input')[4].value;
				p = p.replace(",","");
				p = p.replace(",","");
				p = p.replace(",","");

				vtotal += parseFloat(p);
			}
		}	
	
		$("#vtotalventa").text(formatNumber(vtotal));

	}else{

		$("#vtotalventa").text(0);
	}

	$("#vrecibido").text("");
	$("#vvuelto").text("");
	
	var valorpropina = $("#valor_propina").text();
		valorpropina = valorpropina.replace(",","");
		valorpropina = valorpropina.replace(",","");
		valorpropina = valorpropina.replace(",","");
		valorpropina = valorpropina.replace(",","");
	
	var total = $("#vtotalventa").text();
		    total = total.replace(",","");
			total = total.replace(",","");
			total = total.replace(",","");
			total = total.replace(",","");
	
	if($('#si_propina').prop('checked'))
	{
		total = parseFloat(total) + parseFloat(valorpropina);
		$("#vtotalventa").text(formatNumber(total));

	}
}
					  
function fSoloNumerosCantidad(e,obj){



	var n = obj.value;
	var precio = obj.parentNode.parentNode.getElementsByTagName('input')[3].value;
	var descuento = obj.parentNode.parentNode.getElementsByTagName('input')[4].value;

	if(n.indexOf(".") != -1){

	}else{

		n = n.replace(",","");
		n = n.replace(",","");
		n = n.replace(",","");

		precio = precio.replace(",","");
		precio = precio.replace(",","");
		precio = precio.replace(",","");

		descuento = descuento.replace(",","");
		descuento = descuento.replace(",","");
		descuento = descuento.replace(",","");

		var vtotal = parseFloat(n)*parseFloat(precio);

		if(!$.isEmptyObject(descuento) && descuento != "0"){

			var tasa = 100-descuento;
			vtotal = vtotal*parseFloat("0."+tasa);
		}

		obj.parentNode.parentNode.getElementsByTagName('input')[5].value=formatNumber(vtotal);
							 					  
		obj.value=formatNumber(n);

		fRecalcular();
	}
}

function fSoloNumerosPrecio(e,obj){

	var code = (e.keyCode ? e.keyCode : e.which);

	obj.value = (obj.value + '').replace(/[^.,0-9]/, '');

	var n = obj.value;

	if(n.indexOf(".") != -1){

	}else{

		n = n.replace(",","");
		n = n.replace(",","");
		n = n.replace(",","");

		var vtotal = parseFloat(obj.parentNode.parentNode.getElementsByTagName('input')[1].value)*parseFloat(n);
		obj.parentNode.parentNode.getElementsByTagName('td')[5].innerHTML=formatNumber(vtotal);
	
		fRecalcular();
					  
		obj.value=formatNumber(n);
	}
}


function fGestionarMaster(accion,pj=1,nitcliente="0000000"){
	
	var pj         = pj;
	var nitcliente = nitcliente;
	var tipodoc    = $("#tipodocumento").val();
	var banco      = $("#cajadocumento").val();
	
	console.log("fGestionarMaster: ");
	console.log("pj: "+pj+" nitcliente: "+nitcliente+" accion: "+accion);

	$.post("../frm_pos_gestionarmaster/index.php",{

		accion:accion,
		pj:pj,
		nitcliente:nitcliente,
		tipodoc:tipodoc,
		banco:banco

	},function(r){

		console.log("Los data fGestionarMaster: ");
		console.log(r);
	
		var obj = JSON.parse(r);

		$("#idfactura").val(obj.idfactura);
		$("#numerofactura").val(obj.numero);

		if($.isEmptyObject(obj.idfactura)){

			$("#fecha").val(fHoy());
		}
	
		if($.isEmptyObject(obj.codcliente))
		{
			alertify.set('notifier','position', 'top-center');
			alertify.error('Vuelva a intentarlo. No se pudo guardar porque el codigo del cliente estaba inválido. Ya fue corregido por el codigo del cliente "VARIOS".');
			$("#cliente").val("0000000");
		}
	
		
		if($("#idfactura").val()==0 || $.isEmptyObject($("#idfactura").val()))
		{
			if(confirm("Hubo un problema al crear la factura, contacte a soporte!!!"))
			{
				$('#volveralalista').click();			   
			}
			else
			{
				$('#volveralalista').click();				   
			}
		}
		$.unblockUI();
	});
}

function fAgregarItemDetalle(idfactura,articulo,precio,cantidad=1,iva=0,descuento=0,costo=0,tasaiva=0,idfila,unidmaymen,recmayamen,vencimiento='',lote='')
{
								   
	if($("#idfactura").val()==0 || $.isEmptyObject($("#idfactura").val()))
	{
		if(confirm("Hubo un problema al crear la factura, contacte a soporte!!!"))
		{
			$('#volveralalista').click();			   
		}
		else
		{
			$('#volveralalista').click();				   
		}
	}
	else
	{

		console.log("idfactura: "+idfactura+" idarticulo: "+articulo+" precio: "+precio+" cantidad: "+cantidad+" iva: "+iva+" descuento: "+descuento+" costo: "+costo+" idfila: "+idfila+" unidmaymen: "+unidmaymen+" recmayamen: "+recmayamen+" vencimiento: "+vencimiento+" lote: "+lote);

		var idbodega    = $("#idbodega").val();
		var ventaunidad = $("#ventaunidad").val();
		var sipropina   = "NO";
		
		if($('#si_propina').prop('checked'))
		{
			sipropina = "SI";
		}

		$.post("../frm_pos_gestionardetalle/index.php",{

			idfactura:idfactura,
			articulo:articulo,
			precio:precio,
			cantidad:cantidad,
			iva:iva,
			descuento:descuento,
			costo:costo,
			tasaiva:tasaiva,
			idbodega:idbodega,
			insertaritem:"",
			unidmaymen:unidmaymen,
			recmayamen:recmayamen,
			vencimiento:vencimiento,
			lote:lote,
			ventaunidad:ventaunidad,
			sipropina:sipropina

		},function(r){

			console.log("Log data fAgregarItemDetalle: ");
			console.log(r);

			var r2 = JSON.parse(r);

			$("#ventaitemprecio").val("");
			$("#ventaitemcantidad").val("");
			$("#ventaitemdescuento").val("");

			if(!$.isEmptyObject(idfila))
			{
				$("#"+idfila).val(r2.iddetallefactura);
				$("#idbodega").val("");
				$("#iventaunidad").val("");

				if(r2.descuento_general>0)
				{
					if(r2.dgeneral=="SI")
					{
						$("#ventaitemdescuento").val(r2.descuento_general);
					}

					var fila = document.getElementById("detallefactura").getElementsByTagName('tr').length;
					fila = fila-1;
					document.getElementById("detallefactura").getElementsByTagName('tr')[ fila].getElementsByTagName('input')[3].value=r2.descuento_general;
				}
				else
				{
					var fila = document.getElementById("detallefactura").getElementsByTagName('tr').length;
						fila = fila-1;
					document.getElementById("detallefactura").getElementsByTagName('tr')[ fila].getElementsByTagName('input')[3].value="0.0";
				}
				
				$("#valor_propina").text(formatNumber(r2.valor_propina));

				SORTER.sort('#detallefactura tbody','desc');

				fRecalcular();


				$('#sc_precio').val('1');
				$('#ventaunidad').val('MENOR');
				
			}
			else
			{

				$.post("../frm_pos_gestionardetalle/index.php",{

					idfactura: idfactura,
					cargardetalle: ""

				},function(r2){

					console.log(r2);

					if(r2.length>0)
					{

						$("#detallefactura tbody").html("");

						for(i=0;i<r2.length;i++)
						{

							var filas = $("#detallefactura tr").length;

							fAgregarFilaTabla(filas, r2[ i].descripcionproducto,r2[ i].cantidad,r2[ i].valorunit,r2[ i].descuento,r2[ i].valorpar,r2[ i].iddet);
						}

							SORTER.sort('#detallefactura tbody','desc');

							fRecalcular();


							$("#txt_articulo").val("");
							$("#txt_articulo").focus();
					}

				},"json");
			}

		});
	}
}


function fAutorizar(){

	console.log("autorizar");

	$("#dialog").show();
	
	$( "#dialog").dialog();
}

function fEditarCantidad(id,accion=true,event="",iddet,idfacven,cantidad)
{

	var iddet2 = $("#itemsagregados"+id).val();
	console.log("id: "+id+" accion: "+accion+" event: "+event+" iddet2:"+iddet2+" idfacven: "+idfacven+" cantidad: "+cantidad);
	
	var code = (event.keyCode ? event.keyCode : event.which);

	if(code==13)
	{
		$("#editarcantidad"+id).val(formatNumber(cantidad,2));
	}
}
	
function fSiLote(codigo,idbodega,ventaunidad)
{
	console.log("fSiLote: ");
	console.log("codigo: "+codigo+"--idbodega: "+idbodega+"--ventaunidad: "+ventaunidad);
											 
	var vcantidadmanual = $("#ventaitemcantidad").val();
											 
	$.post("../frm_pos_gestionardetalle/index.php",{
						
		codigo:codigo,
		idbodega:idbodega,
		unidad:ventaunidad,
		silote:"",
		cantidadmanual:vcantidadmanual
	
	},function(r){
						
		console.log("si lote: ");
		console.log(r);
		
		alertify.set('notifier','position', 'bottom-center');
		alertify.alert('Existencias', r, function(){ });
	
	});	
}

function fIrInput(event,codigo,fila,idbodega,ventaunidad,silotetallasonada,tipoprecio)
{

	var code = (event.keyCode ? event.keyCode : event.which);

	if(code==13)
	{
		
		if($.isEmptyObject(silotetallasonada))
		{
			e = jQuery.Event("keypress")
			e.which = 13; 

			console.log("Log fIrInput: ");
			console.log("codigo: "+codigo+" fila: "+fila+" idbodega: "+idbodega+" ventaunidad: "+ventaunidad);

			$("#idbodega").val(idbodega);
			$("#txt_articulo").val(codigo);
			$("#iventaunidad").val(ventaunidad);
			$("#txt_articulo").keypress(function(){}).trigger(e);
			$("#rautocompletar").html("");
			$("#ventaarticulomanual").val("");
			$("#ventaarticulomanual").focus();
		}
		else
		{
			switch(silotetallasonada)
			{
				case 'lote':
					
					var ventaunid = $("#ventaunidad").val();
					fSiLote(codigo,idbodega,ventaunid);
	
				break;
	
				case 'tallas':
	
				break;
			}
		}
	}

	if(code==38){

		var idprimerregistro = $("#listaautocompletar tr").first().attr("id");

		if(idprimerregistro==fila){	

			$("#ventaarticulomanual").focus();
		}
	}
}
	
function fIrInput2(codigo,fila,idbodega,ventaunidad,silotetallasonada){

	e = jQuery.Event("keypress")
	e.which = 13; 
	
	console.log("Log fIrInput2: ");
	console.log("codigo: "+codigo+" fila: "+fila+" idbodega: "+idbodega+" ventaunidad: "+ventaunidad);
		
	$("#idbodega").val(idbodega);
	$("#txt_articulo").val(codigo);
	$("#iventaunidad").val(ventaunidad);
	$("#txt_articulo").keypress(function(){}).trigger(e);
	$("#rautocompletar").html("");
	$("#ventaarticulomanual").val("");
	$("#ventaarticulomanual").focus();

}
	
function fIrInput3(codigo,idpro,idbodega,vence,lote,cantidad,valoriva,costo,tasaiva,unidmaymen,factor,precio)
{

	e = jQuery.Event("keypress")
	e.which = 13; 
	
	var idfactura = $("#idfactura").val();
	$("#idbodega").val(idbodega);
	
	var cant = $("#ventaitemcantidad").val(); 
	if(!$.isEmptyObject(cantidad))
	{
		cant = cantidad;
	}
	
	var desc = 0;
	if(!$.isEmptyObject($("#ventaitemdescuento").val()))
	{
	desc = $("#ventaitemdescuento").val();										 
	}
	var idfila = "";
	var vprecio = precio;
	if(!$.isEmptyObject($("#ventaitemprecio").val()))
	{
		vprecio = $("#ventaitemprecio").val();
		vprecio = vprecio.replace(",","");
		vprecio = vprecio.replace(",","");
		vprecio = vprecio.replace(",","");
	}
	
	console.log("Log fIrInput3: ");
	console.log(
		
		" codigo: "+codigo+
		" idpro: "+idpro+
		" idbodega: "+idbodega+
		" vence: "+vence+
		" lote: "+lote+
		" cantidad: "+cant+
		" valoriva: "+valoriva+
		" costo: "+costo+
		" tasaiva: "+tasaiva+
		" unidadmayor: "+unidmaymen+
		" factor: "+factor+
		" precio: "+vprecio
	);
	
	fAgregarItemDetalle(idfactura,idpro,vprecio,cant,valoriva,desc,costo,tasaiva,idfila,unidmaymen,factor,vence,lote);
	$("#text_articulo").val("");
	$("#listaautocompletar").html("");
	$("#ventaarticulomanual").val("");
	$("#text_articulo").focus();

}
	
	
function fCargarPrefijos(funcion)
{
	$.post("../frm_pos_gestionarmaster/index.php",{

			prefijo:""

		},function(r){

			console.log("Prefijos cargados: ");
			console.log(r);
	
			var obj = JSON.parse(r);

			if(!$.isEmptyObject(obj.prefijos)){

				$.each(obj.prefijos,function(id,valor){

					$("#ventaprefijo").append("<option value='"+id+"'>"+valor+"</option>");
				});

				$("#ventaprefijo").val(obj.predeterminada);
	
				funcion();

			}else{

				console.log("Por favor configurar la resolucion.");
			}

	});
}
											 
function fCargarDirecciones(funcion)
{
	$.post("../frm_pos_gestionarmaster/index.php",{

			cargardirecciones:"",
			clientedireccion:$("#cliente").val()

		},function(r){

			console.log("Direcciones cargadas: ");
			console.log(r);
	
			var obj2 = JSON.parse(r);

			if(!$.isEmptyObject(obj2.registros)){

				$("#ventadireccion").html("");
											 
				$.each(obj2.registros,function(id,valor){
					
					$("#ventadireccion").append("<option value='"+valor["iddireccion"]+"'>"+valor["direccion"]+"</option>");
				});
	
				funcion();
			}
	});
}
	
function fCargarVendedores(funcion)
{
	$.post("../frm_pos_gestionarmaster/index.php",{

			cargarvendedores:""

		},function(r){

			console.log("Vendedores cargados: ");
			console.log(r);
	
			var obj2 = JSON.parse(r);

			if(!$.isEmptyObject(obj2.registros)){

				$.each(obj2.registros,function(id,valor){

					$("#idvendedor").append("<option value='"+id+"'>"+valor+"</option>");
				});

				$("#idvendedor").val(obj2.predeterminada);
	
				funcion();

			}else{

				console.log("Por favor configurar vendedores.");
			}

	});
}
											
function fCargarCajas(funcion)
{
	$.post("../frm_pos_gestionarmaster/index.php",{

			cajas:""

		},function(r){

			console.log("Cajas cargadas: ");
			console.log(r);
	
			var obj = JSON.parse(r);

			if(!$.isEmptyObject(obj.registros)){

				$.each(obj.registros,function(id,valor){

					$("#cajadocumento").append("<option value='"+id+"'>"+valor+"</option>");
				});

				$("#cajadocumento").val(obj.predeterminada);
											 
				if(obj.bloqueada=="SI")
				{
					$("#cajadocumento").attr('disabled',true);		
					$("#ventaprefijo").attr('disabled',true);	
				}
				else
				{
					$("#cajadocumento").attr('disabled',false);	
					$("#ventaprefijo").attr('disabled',false);		
				}
	
				funcion();

			}else{

				console.log("No hay cajas configuradas.");
			}

	});
}
	
function fAutocompletarArticulos(indicio,ventaunidad,tipoprecio)
{
	var idfactura = $("#idfactura").val();
											 
	if(!$.isEmptyObject(indicio)){

		$.post("../frm_pos_autocompletararticulos/index.php",{

			indicio: indicio,
			ventaunidad:ventaunidad,
			tipoprecio:tipoprecio,
		 	idfactura:idfactura

		},function(r){

			console.log("Log data autocompletar articulos: ");
			console.log(r);
			$("#rautocompletar").html(r);
		});
	}
}
											 
function fAgregarFilaTabla(fila, descripcionproducto,cantidad,preciounitario,descuento,total,iddet="")
{

		var iditem      = "items"+fila;
		var	datosnuevos = "";
		var idfacven    = $("#idfactura").val();
											 
		datosnuevos += "<tr id='"+iditem+"'>";
											 
		datosnuevos += "<td>";
		datosnuevos += fila;
		datosnuevos += "<input id='itemsagregados"+fila+"' type='radio' value='"+iddet+"' onkeyup='fEliminarItem(event,\""+iditem+"\",this.id);' name='itemsagregados' />";
		datosnuevos += "</td>";
		datosnuevos += "<td>"+descripcionproducto+"</td>";
	
		datosnuevos += "<td>";
		datosnuevos += "<input size='7' id='editarcantidad"+fila+"' class='inputcenter' value='"+formatNumber(cantidad,2)+"' onkeypress='fEditarCantidad(\""+fila+"\",false,event,\""+iddet+"\",\""+idfacven+"\",this.value);' type='text' />";
		datosnuevos += "</td>";
											 
		datosnuevos += "<td>";
		datosnuevos += "<input size='12' class='inputcenter' style='text-align:right;' id='autorizarprecio"+fila+"' value='"+formatNumber(preciounitario)+"' type='text' />";
		datosnuevos += "</td>";
											 
		datosnuevos += "<td>";
		datosnuevos += "<input size='7' class='inputcenter' style='text-align:right;' type='text' value='"+descuento+"' />";
		datosnuevos += "</td>";
											 
		if(!$.isEmptyObject(descuento))
		{						
			if(descuento>0)
			{
				total = total-(total*(descuento/100));					 
			}
		}
		datosnuevos += "<td>";
		datosnuevos += "<input  class='inputcenter' id='autorizartotal"+fila+"'  style='text-align:right;'  type='text' value='"+formatNumber(total)+"' />";
		datosnuevos += "</td>";
											 
		datosnuevos += "<td>";
		datosnuevos += "<img  src='../_lib/img/scriptcase__NM__ico__NM__barcode_32.png' onclick='fVerDetalleItem($(\"#itemsagregados"+fila+"\").val());' width='30px' />";
		datosnuevos += "</td>";
	
		datosnuevos += "<td>";
		datosnuevos += "<img src='../_lib/img/scriptcase__NM__ico__NM__text_marked_32.png' onclick='fVerObservacionItem($(\"#itemsagregados"+fila+"\").val());' width='30px' />";
		datosnuevos += "</td>";
											 
		datosnuevos += "</tr>";


		$("#detallefactura tbody").append(datosnuevos);

}
	
function fCambiarNumero()
{
	var idfactura = $("#idfactura").val();
	var vprefijo  = $("#ventaprefijo").val();
	var vnumero   = $("#numerofactura").val();
	var tipodoc   = $("#tipodocumento").val();

	if(!$.isEmptyObject(numerofactura))
	{

		$.post("../frm_pos_gestionarmaster/index.php",{

			idfactura:idfactura,
			pj:vprefijo,
			numero:vnumero,
			cambiarnumero:"",
			tipodoc:tipodoc

		},function(r){

			console.log(r);	
	
			var obj = JSON.parse(r);
	
			if(!$.isEmptyObject(obj.mensaje))
			{
				alert(obj.mensaje);
				$("#numerofactura").val(obj.numero);
			}
		});
	}
}

function fCambiarDireccion()
{
	var idfactura     = $("#idfactura").val();
	var dircliente    = $("#ventadireccion").val();

	if(!$.isEmptyObject(idfactura))
	{
		$.post("../frm_pos_gestionarmaster/index.php",{

			idfactura:idfactura,
			dircliente:dircliente,
			cambiardireccion:""

		},function(r){

			console.log("Log cambiar direccion: ");
			console.log(r);

			$("#txt_articulo").focus();

		});
	}	
}

$(document).ready(function(){
	
	$("#tipod").change(function(){
		
		if($("#tipod").val()=="AIU")
		{
		   $("#div_aiu").css("display","block");
		}
		else
		{
		   $("#div_aiu").css("display","none");
		}
	});
	
	$("#si_propina").change(function(){
		
		if($('#si_propina').prop('checked'))
		{
			$('#si_propina').prop('checked',true);
			
			var valorpropina = $("#valor_propina").text();
				valorpropina = valorpropina.replace("+","");
				valorpropina = valorpropina.replace(",","");
				valorpropina = valorpropina.replace(",","");
				valorpropina = valorpropina.replace(",","");

			var total = $("#vtotalventa").text();
				total = total.replace(",","");
				total = total.replace(",","");
				total = total.replace(",","");
			
			total = parseFloat(total) + parseFloat(valorpropina);
			$("#vtotalventa").text(formatNumber(total));
			
		}
		else
		{
			$('#si_propina').prop('checked',false);
			
			var valorpropina = $("#valor_propina").text();
				valorpropina = valorpropina.replace("+","");
				valorpropina = valorpropina.replace(",","");
				valorpropina = valorpropina.replace(",","");
				valorpropina = valorpropina.replace(",","");

			var total = $("#vtotalventa").text();
				total = total.replace(",","");
				total = total.replace(",","");
				total = total.replace(",","");
			
			total = parseFloat(total) - parseFloat(valorpropina);
			$("#vtotalventa").text(formatNumber(total));
		}
	});
	
	$("#ventadireccion").change(function(){
		
		fCambiarDireccion();
	});
	
	$("#idobservaciones").change(function(){
		
		var idfactura     = $("#idfactura").val();
		var observaciones = this.value;
	
		if(!$.isEmptyObject(idfactura))
		{
			$.post("../frm_pos_gestionarmaster/index.php",{
			
				idfactura:idfactura,
				observacionmaster:observaciones,
				cambiarobservacionmaster:""
	
			},function(r){
				
				console.log("Log cambiar observaciones: ");
				console.log(r);
				
				$("#txt_articulo").focus();
	
			},"json");
		}
	});
	
	$("#ordencompra").blur(function(){
		
		var idfactura     = $("#idfactura").val();
		var ordencompra   = this.value;
	
		if(!$.isEmptyObject(idfactura))
		{
			$.post("../frm_pos_gestionarmaster/index.php",{
			
				idfactura:idfactura,
				ordencompra:ordencompra,
				ordendecompra:""
	
			},function(r){
				
				console.log("Log establecer orden de compra ");
				console.log(r);
	
			});
		}
	});
	
	$("#ordenfecha").change(function(){
		
		var idfactura     = $("#idfactura").val();
		var ordenfecha    = this.value;
	
		if(!$.isEmptyObject(idfactura))
		{
			$.post("../frm_pos_gestionarmaster/index.php",{
			
				idfactura:idfactura,
				ordenfecha:ordenfecha,
				ordendecomprafecha:""
	
			},function(r){
				
				console.log("Log establecer la fecha de la orden de compra ");
				console.log(r);
	
			});
		}
	});
	
	$('#ventapagar').click(function(e){
		
		e.preventDefault();
	
		
	});
	
	$('#btn_imprimir').click(function(e){
		
		e.preventDefault();
	
		var vtot = $("#vtotalventa").text();
			vtot = fReemplazarCaracter(vtot,",");
	
		if(vtot>0)
		{
			var idfactura  = $("#idfactura").val();
			window.open('../frm_pos_impresion_html/index.php?idfactura='+idfactura, '_blank');
		}
		else
		{
			alertify.alert('', 'No se puede imprimir un documento sin detalle!!!', function(){ });
		}
	});
	
	$("#ventacobrar").click(function(e){
	
		e.preventDefault();
	
		function mostrarVentana()
		{
			var ventana = document.getElementById("miVentana");
			ventana.src = "../blank_recibocaja/index.php?idfacven="+$("#idfactura").val();
			ventana.style.display = "block";
		}
		
		if(!$.isEmptyObject($("#idfactura").val()))
		{
			if($("#formapago").val()==2)
			{
				var vtot = $("#vtotalventa").text();
					vtot = fReemplazarCaracter(vtot,",");
	
				if(vtot>0)
				{
					mostrarVentana();
				}
				else
				{
					alertify.alert('', 'No se puede pagar un documento sin detalle!!!', function(){ });
				}
			}
			else
			{
				alertify.alert('', 'No se puede usar con forma de pago "CREDITO" ', function(){ });
			}
		}
		else
		{
			alertify.alert('', 'No hay un documento cargado!!!', function(){ });
		}
	});
											 
	$("#abrircajon").click(function(e){
		
		e.preventDefault();
											 
		$.post("../frm_pos_gestionarmaster/index.php",{
											 
			abrircajon:""
											 
		},function(r){
											 
			console.log("Log data abrircajon: ");
			console.log(r);
											 
			var obj = JSON.parse(r);
											 
			if($.isEmptyObject(obj.impresora))
			{
				alertify.set('notifier','position', 'bottom-center');
				alertify.alert('Notificación', 'El usuario no tiene configurada impresora.', function(){ });								 
			}
		});
	});
	
	$("#ventagrupos").click(function(e){
		
		e.preventDefault();
	
		window.open("../blank_grupos_calculadora","","fullscreen,scrollbars");
	});
	
	$("#txt_articulo").focus();
	
	
	$("#ventaunidad").change(function(){
		
		var indicio     = $("#ventaarticulomanual").val();
		var ventaunidad = $(this).val();
		var tipoprecio  = $('#sc_precio').val();
		
		$("#iventaunidad").val(ventaunidad);
	
		fAutocompletarArticulos(indicio,ventaunidad,tipoprecio);
	
		$("#txt_articulo").select();
	});
	
	$("#sc_precio").change(function(){
		
		var indicio     = $("#ventaarticulomanual").val();
		var ventaunidad = $(this).val();
		var tipoprecio  = $('#sc_precio').val();
		
		$("#iventaunidad").val(ventaunidad);
	
		fAutocompletarArticulos(indicio,ventaunidad,tipoprecio);
	
		$("#txt_articulo").select();
	});
	
	
	$("#idvendedor").change(function(){
		
		var idfactura  = $("#idfactura").val();
		var registro   = this.value;
	
		if(!$.isEmptyObject(idfactura) && !$.isEmptyObject(registro))
		{
			$.post("../frm_pos_gestionarmaster/index.php",{
			
				idfactura:idfactura,
				registro:registro,
				cambiarvendedor:""
	
			},function(r){
				
				console.log("Log cambiar vendedor: ");
				console.log(r);
				
				$("#txt_articulo").focus();
	
			},"json");
		}
	});
	
	
	function fCambiarTipoPJ()
	{
		var idfactura  = $("#idfactura").val();
		var resolucion = $("#ventaprefijo").val();
		var tipodocumento = $("#tipodocumento").val();
	
		if(!$.isEmptyObject(idfactura) && !$.isEmptyObject(resolucion))
		{
			$.post("../frm_pos_gestionarmaster/index.php",{
			
				idfactura:idfactura,
				resolucion:resolucion,
				tipodocumento:tipodocumento,
				cambiarpj:""
	
			},function(r){
				
				console.log("Log cambiar tipo documento y prefijo: ");
				console.log(r);
				var obj = JSON.parse(r);
				
				if(obj.ultima_fac>0 && obj.disponibles<=0)
				{
				   alert("Su resolución llegó al límite de numeración.");
				}
				$("#numerofactura").val(obj.numero);
	
			});
		}
	}
	
	
	$("#ventaprefijo").change(function(){
		
		fCambiarTipoPJ();
	});
	
	function fCambiarCajaDocumento()
	{
		var idfactura  = $("#idfactura").val();
		var banco      = $("#cajadocumento").val();
	
		if(!$.isEmptyObject(idfactura) && !$.isEmptyObject(banco))
		{
			$.post("../frm_pos_gestionarmaster/index.php",{
			
				idfactura:idfactura,
				banco:banco,
				cambiarcaja:""
	
			},function(r){
				
				console.log("Log cambiar caja: ");
				console.log(r);
			});
		}
	}
	
	$("#cajadocumento").change(function(){
		
		fCambiarCajaDocumento();
	});
	
	$("#tipodocumento").change(function(){
		
		fCambiarTipoPJ();
	});
	

	$("#volveralalista").click(function(e){

		e.preventDefault();
											 
		var siescajero = $("#isiescajero").val();
		var siesadmin  = $("#siesadmin").val();
	
		
		
		
		if(siesadmin=='ADMINISTRADORES')
		{
			window.location.href = "../grid_facturaven_pos/index.php";
		}
		else
		{
			if(siescajero=="SI")
			{
				window.location.href = "../blank_grid_pos_usuario/index.php";
			}
			else
			{
				window.location.href = "../grid_facturaven_pos/index.php";
			}
		}

	});


	$("#dialog").hide();

	function fValidarUsuario(usuario,clave){
		
		var usuarioadmin  = "admin";
		var passwordadmin = "admin";

		if(clave == usuarioadmin && usuario == passwordadmin){

			$("#dialog").hide();
			$("#dialog").dialog("close");

			$("#autorizarprecio").attr("readonly",false);

			$("#autorizarprecio").select();


		}else{

			alert("Credenciales inválidas");
		}
	}

	$("#idautorizar").click(function(e){
		
		e.preventDefault();
		
		var  usuario = $("#dusuario").val();
		var  clave   = $("#dpassword").val();

		if(!$.isEmptyObject(clave) && !$.isEmptyObject(usuario)){

			fValidarUsuario(usuario,clave);

		}else{

			alert("Digite usuario y clave");
		}
	});

	$("#dpassword").keypress(function(e){

		var code = (e.keyCode ? e.keyCode : e.which);

		if(code == 13) {

			var  usuario = $("#dusuario").val();
			var  clave   = $("#dpassword").val();

			if(!$.isEmptyObject(clave) && !$.isEmptyObject(usuario)){

				fValidarUsuario(usuario,clave);

			}else{

				alert("Digite usuario y clave");

			}

		 	return false;
		}

	});
	
	$("#ventaitemcantidad").keypress(function(e){

		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13)
		{
			$("#ventaitemprecio").select();
			return false;
		}
	});
	
	$("#ventaitemprecio").keypress(function(e){

		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13)
		{
			$("#ventaitemdescuento").select();
			return false;
		}
	});
	
	$("#ventaitemdescuento").keypress(function(e){

		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13)
		{
			$("#txt_articulo").select();
			return false;
		}
	});

	if(!$.isEmptyObject($("#idfactura").val()))
	{
			
			function fCargarFactura()
			{
				$.post("../frm_pos_gestionarmaster/index.php",{

					idfactura:$("#idfactura").val(),
					cargardocumento:""

				},function(r){

					console.log("Al cargar el documento: ");
					console.log(r);
	
					var obj = JSON.parse(r);

					if(!$.isEmptyObject(obj.idfactura)){

						$("#numerofactura").val(obj.numero);
						$("#fecha").val(obj.fecha);
						$("#formapago").val(obj.creditocontado);
						$("#cliente").val(obj.idcliente);
						$("#nombrecliente").val(obj.nombrecliente);
	
						fCargarDirecciones(function(){
	
							$("#ventadireccion").val(obj.dircliente);
						});
						$("#vtotalventa").text(formatNumber(obj.total));
						$("#ventaprefijo").val(obj.resolucion);
						$("#idvendedor").val(obj.vendedor);
						$("#tipodocumento").val(obj.tipo);
						$("#cajadocumento").val(obj.banco);
	
						if(obj.bloqueado=="SI")
						{
							$("#cajadocumento").attr('disabled',true);		
							$("#ventaprefijo").attr('disabled',true);	
						}
						else
						{
							$("#cajadocumento").attr('disabled',false);	
							$("#ventaprefijo").attr('disabled',false);		
						}
						
						if(obj.creditocontado==1)
						{
							$(".sicredito").css("display","block");
							$(".sicredito").css("text-align","center");
							
							if(obj.dias_decredito>0)
							{
								$("#ventadiascredito").val(obj.dias_decredito);
							}
							
							if(!$.isEmptyObject(obj.fechavenc))
							{
								$("#ventavencimiento").val(obj.fechavenc);
							}
						}
						
						if(obj.aplica_propina=="SI")
						{
							if(obj.valor_propina>0)
							{
								$("#valor_propina").text(formatNumber(obj.valor_propina));

								var total_mas_propina = parseFloat(obj.total) + parseFloat(obj.valor_propina);
								$("#vtotalventa").text(formatNumber(total_mas_propina));
							}
							else
							{
								$("#valor_propina").text(formatNumber(obj.valor_propina));
								$("#vtotalventa").text(formatNumber(parseFloat(obj.total)));
							}
						}
						else
						{
							$("#valor_propina").text(formatNumber(obj.valor_propina));
							$('#si_propina').prop('checked',false);
							$("#vtotalventa").text(formatNumber(parseFloat(obj.total)));
						}
	
						$("#idobservaciones").val(obj.observaciones);
						
						if(!$.isEmptyObject(obj.orden_compra))
						{
						   $("#ordencompra").val(obj.orden_compra);						   
						}
						
						if(!$.isEmptyObject(obj.orden_fecha))
						{
						   $("#ordenfecha").val(obj.orden_fecha);						   
						}

						$.post("../frm_pos_gestionardetalle/index.php",{

							idfactura: obj.idfactura,
							cargardetalle: ""

						},function(r2){

							console.log("Cargar Detalle: ");
							console.log(r2);
	
							var o = JSON.parse(r2);

							if(o.length>0){

								for(i=0;i<o.length;i++){

									var filas = $("#detallefactura tr").length;

									fAgregarFilaTabla(filas, o[ i].descripcionproducto,o[ i].cantidad,o[ i].valorunit,o[ i].descuento,o[ i].valorpar,o[ i].iddet);
								}

								SORTER.sort('#detallefactura tbody','desc');

								fRecalcular();


								$("#txt_articulo").val("");
								$("#txt_articulo").focus();
							}
														 
							$.unblockUI();
						});
					}
				});
			}
														  
			fCargarPrefijos(function(){
													  
				fCargarVendedores(function(){
														 
					fCargarCajas(function(){
														 
						fCargarFactura();								 
					})
				});								  
			});
		}
		else
		{
			fCargarPrefijos(function(){
													  
				fCargarVendedores(function(){
					
					fCargarCajas(function(){
					
						fCargarDirecciones(function(){
														 
							var vpj = $('#ventaprefijo').val();
							fGestionarMaster('crear',vpj);
						});
					});
				});
													  
			});
													  
		}
		  
		$("#fecha").val(fHoy());
					  
		$("#vaciarfactura").click(function(e){
			
			if(confirm("¿Desea borrar el detalle de la venta?")){

				var idfactura = $("#idfactura").val();

				$.post("../frm_pos_gestionardetalle/index.php",{

					vaciar: "vaciar",
					idfactura: idfactura

				},function(r){

					var filas = $("#detallefactura tr").length;

					if(filas > 1){

						for(i=1;i<=filas;i++){

							$("#detallefactura tr").eq(1).remove();
						}
					}

					$("#vtotalventa").text("0");
					$("#ventaitemcantidad").val("");
					$("#ventaitemprecio").val("");
					$("#ventaitemdescuento").val("");
					$("#txt_articulo").val("");
					$("#txt_articulo").focus();
				});
			}
			
		});


		function fPagarFactura(){

			if(!$.isEmptyObject($("#idfactura").val())){

				var total = $("#vtotalventa").text();
				total = total.replace(",","");
				total = total.replace(",","");
				total = total.replace(",","");

				var valorrecibido = $("#txt_articulo").val();
				valorrecibido = valorrecibido.replace("+","");
				valorrecibido = valorrecibido.replace(",","");
				valorrecibido = valorrecibido.replace(",","");
				valorrecibido = valorrecibido.replace(",","");
				
				
				var sipropina = "NO";
				
				if($('#si_propina').prop('checked'))
				{
					sipropina = "SI";
				}

				
				if(!$.isEmptyObject(valorrecibido))
				{
					if(parseFloat(valorrecibido) < parseFloat(total)){

						alertify.set('notifier','position', 'top-center');
						alertify.error('El valor digitado es menor al total de la factura.');

					}
					else
					{

						var vueltos = parseFloat(valorrecibido)-parseFloat(total);
						
						if(sipropina=="SI")
						{
						   	var valorpropina = $("#valor_propina").text();
							valorpropina = valorpropina.replace("+","");
							valorpropina = valorpropina.replace(",","");
							valorpropina = valorpropina.replace(",","");
							valorpropina = valorpropina.replace(",","");
							
						}

						$("#vrecibido").text(formatNumber(valorrecibido));
						$("#vvuelto").text(formatNumber(vueltos));

						alertify.confirm('Confirme','¿Desea concluir la venta?', 

							function(){ 

								var idfactura = $("#idfactura").val();		
								var pj        = $("#ventaprefijo").val();	

								$.post("../frm_pos_gestionarmaster/index.php",{

									idfactura:idfactura,
									pagado: valorrecibido,
									vueltos: vueltos,
									asentar: "SI",
									asentarfacven:""

								},function(r1){
	
									console.log("Log data asentar factura: ");
									console.log(r1);
	
									var obj = JSON.parse(r1);
	
									if($.isEmptyObject(obj.mensajes))
									{
	
										console.log("Log json asentar factura: ");
										console.log(obj);

										if(obj.estado==2)
										{

											$.post("../frm_pos_gestionarmaster/index.php",{

												idfactura:idfactura,
												formapago:2,
												pagarfacven:"",
												sipropina: sipropina

											},function(r4){

												console.log("Log data pagar factura: ");
												console.log(r4);

												var obj = JSON.parse(r4);

												console.log("Log json pagar factura: ");
												console.log(obj);

												if(obj.estado==2)
												{
													var idfac = $("#idfactura").val();

													$.post("../frm_pos_impresion_html_cmd/index.php",{

															idfactura: idfac

													},function(r3){

														console.log("Log impresion: ");
														console.log(r3);

														
													});

													
	
													alertify.confirm('Impresión',"<b style='padding:2px;border-radius:3px;font-size:30px;backgrond:#29abe2;'>Pagado: $"+formatNumber(valorrecibido)+"</b><br><b style='padding:2px;border-radius:3px;font-size:30px;backgrond:#29abe2;'>Vueltos: $ "+formatNumber(vueltos)+"</b>", 		   
													function(){ 

														var url = window.location.href;
														url = url.split("index.php"); 
														location.href = url[0];
													}
													, function(){ 

														var url = '../frm_pos_impresion_html/index.php?idfactura='+idfac;
														redirect_blank(url);
														return false;

													}).set('labels', {ok:'Nuevo', cancel:'Imprimir Ticket'});
	
												}
												else
												{
													alertify.set('notifier','position', 'top-center');
													alertify.error('Hubo un error al pagar la factura.');
												}
											});

											$("#txt_articulo").val("");
											$("#txt_articulo").focus();
										}
										else
										{
											alertify.set('notifier','position', 'top-center');
											alertify.alert('', 'Hubo un error al asentar la factura.', function(){ });
										}
									}
									else
									{
										alertify.alert('', obj.mensajes, function(){  });
									}
								});
							}, 
							function(){ 

								alertify.set('notifier','position', 'top-center');
								alertify.error('Cancelado');

								$("#vrecibido").text("");
								$("#vvuelto").text("");

								$("#txt_articulo").select();

							}
						).set('labels', {ok:'Concluir', cancel:'Cancelar'});
					}
				}
				else
				{
					alertify.set('notifier','position', 'top-center');
					alertify.error('Por favor digite el mas(+) luego el valor recibido del cliente.');
					$("#txt_articulo").select();
				}

			}else{

				alertify.set('notifier','position', 'top-center');
				alertify.error('Por favor cree una factura antes de cobrar.');

				$("#txt_articulo").val("");
				$("#txt_articulo").select();
			}
		}


		

		$("#ventacliente").click(function(e){

			e.preventDefault();

			var idfactura = $("#idfactura").val();

			if(!$.isEmptyObject(idfactura)){

				var seleccionarcliente = window.open("../grid_terceros_pos/index.php", "_blank", "toolbar=no,scrollbars=yes,resizable=no,top=30,left=150,width=1000,height=560");

			}else{


				alertify.set('notifier','position', 'top-center');
				alertify.error('Agregue un articulo para poder cambiar el cliente.');

				$("#txt_articulo").val("");
				$("#txt_articulo").focus();
			}
		});
	
		
		$("#txt_articulo").keypress(function(e)
		{

			var code = (e.keyCode ? e.keyCode : e.which);
			
	        console.log("Al presionar una tecla en txt_articulo: ")
			console.log(code);

			if(code == 13)
			{
	
				var codbarras = this.value;
				var vventaunidad = $("#ventaunidad").val();
				$("#iventaunidad").val(vventaunidad);
				var tipoprecio = $('#sc_precio').val();

			 	
				if(!$.isEmptyObject(this.value))
				{

					if(codbarras.indexOf("&") != -1 || codbarras.indexOf("*") != -1 || codbarras.indexOf("/") != -1 || codbarras.indexOf("%") != -1 || codbarras.indexOf("!") != -1 || (codbarras.indexOf("-") != -1 && codbarras.length==1) )
					{

						function fObtenerValorManual(valor,tipo)
						{

							var v = "";
	
							console.log("fObtenerValorManual: valor=>"+valor);

							if(valor.indexOf(tipo) != -1)
							{

								valor = valor.replace(",","");
								valor = valor.replace(",","");
								valor = valor.replace(",","");

								var v2  = valor.substr(valor.indexOf(tipo)+1);
								console.log("fObtenerValorManual: valor sin comas=>"+v2);

								for(i=0;i<v2.length;i++)
								{

									var val = v2.charAt(i);
														  
									console.log("fObtenerValorManual: charAt=>"+val);

									if(isNaN(val) && i>0 && val!=".")
									{

										break;
									}

									if(!isNaN(val) || val==".")
									{

										v += val.toString();
									}
								}
							}
	
							console.log("fObtenerValorManual: valor retorno=>"+v);
							return v;
						}

						var c = fObtenerValorManual(codbarras,"*");
						var p = fObtenerValorManual(codbarras,"/");
						var d = fObtenerValorManual(codbarras,"%");

						if(!$.isEmptyObject(c)){

							$("#ventaitemcantidad").val(formatNumber(c,2));
						}
						
						if(!$.isEmptyObject(p)){

							$("#ventaitemprecio").val(formatNumber(p));
						}
						
						if(!$.isEmptyObject(d)){

							$("#ventaitemdescuento").val(d);
						}


						if(codbarras.indexOf("-") != -1 && codbarras.length==1){

							$("#ventaitemcantidad").val("");
							$("#ventaitemprecio").val("");
							$("#ventaitemdescuento").val("");
						}
	
						if(codbarras.indexOf("&") != -1)
						{
							switch(codbarras.toLowerCase())
							{
								case '&ma':

									$("#ventaunidad").val("MAYOR");
									$("#ventaunidad").change();

								break;

								case '&me':

									$("#ventaunidad").val("MENOR");
									$("#ventaunidad").change();
	
								break;
	
								case '&co':

									$("#formapago").val("2");
									$("#formapago").change();

								break;
	
								case '&cr':

									$("#formapago").val("1");
									$("#formapago").change();

								break;
								
								case '&s':

									$('#volveralalista').click();

								break;
	
								case '&b':

									$('#vaciarfactura').click();

								break;
	
								case '&c':

									$('#ventacliente').click();

								break;
	
								case '&v':

									$('#idvendedor').focus();

								break;
	
								case '&1':

									$('#sc_precio').val('1');

								break;
	
								case '&2':

									$('#sc_precio').val('2');

								break;
	
								case '&3':

									$('#sc_precio').val('3');

								break;
							}
	
							if(codbarras.indexOf("&d") != -1)
							{
									
								var vdias = $("#txt_articulo").val();
									vdias = vdias.replace("&d","");
								$("#ventadiascredito").val(vdias);
									
								$("#ventadiascredito").change();
							}
						}
	
	
						if(codbarras == "!")
						{
							var idfactura = $("#idfactura").val();		
							var pj        = $("#ventaprefijo").val();	

							$.post("../frm_pos_gestionarmaster/index.php",{

								idfactura:idfactura,
								pagado: 0,
								vueltos: 0,
								asentar: "SI",
								asentarfacven:"",
								formapago:2,
								pagarfacven:""

							},function(rr){
								
								alertify.confirm('Impresión','Venta finalizada.', 		   
									function(){ 

									var url = window.location.href;
									url = url.split("index.php"); 
									location.href = url[0];
									}
									, function(){ 

									var url = '../frm_pos_impresion_html/index.php?idfactura='+idfactura;
									redirect_blank(url);
									return false;
								}).set('labels', {ok:'Nuevo', cancel:'Imprimir Ticket'});
							});
						}
						this.value = "";

					}
					else if(codbarras.indexOf("+") != -1)
					{

						
						console.log("Log si hay detalle: ");
						console.log($("#totalventa").html());
	
						if($("#vtotalventa").text()!='0')
						{
							
							var idfac = $("#idfactura").val();
	
							if($("#formapago").val()==1)
							{
								$.post("../frm_pos_gestionarmaster/index.php",{
									
									idfactura:idfac,
									pagarcredito:""
	
								},function(r){
									
									console.log("data log pagar factura credito: ");
									console.log(r);
	
									var vjson = JSON.parse(r);
									
									if($.isEmptyObject(vjson.mensajes))
									{
	
										switch(vjson.estado)
										{
											case 1:

												alertify.alert('Impresión', "<center><a href='../frm_pos_impresion_html/index.php?idfactura="+idfac+"' target='_blank' style='padding:5px;border-radius:5px;'>Imprimir Ticket</a></center>",
												function(){ 

													var url = window.location.href;
													url = url.split("index.php"); 
													location.href = url[0];
												});

											break;

											case 2:
												alertify.alert('Sin Crédito.','El cliente no tiene crédito configurado.',
												function(){ });
											break;

											case 3:
												alertify.alert('Sin Cupo.','El cliente no tiene cupo disponible. (Cupo disponible: ' + vjson.saldo_disponible +')',
												function(){ });
											break;
										}

										$("#txt_articulo").val("");
										$("#txt_articulo").focus();
									}
									else
									{
										alertify.alert('',vjson.mensajes,function(){ });
									}
								});
							}
							else
							{
								console.log("Llamamos pagar factura. ");
								fPagarFactura();
							}
						}
						else
						{
							alertify.set('notifier','position', 'top-center');
							alertify.error('No ha agregado productos.');
						}
						

					}
					else if(codbarras.indexOf("$") != -1)
					{
	
						console.log("Log si hay detalle: ");
						console.log($("#totalventa").html());
	
						if($("#vtotalventa").text()!='0')
						{
							
							var idfac = $("#idfactura").val();
	
							if($("#formapago").val()==1)
							{
								$.post("../frm_pos_gestionarmaster/index.php",{
									
									idfactura:idfac,
									pagarcredito:""
	
								},function(r){
									
									console.log("data log pagar factura credito: ");
									console.log(r);
	
									alertify.alert('Impresión', "<center><a href='../frm_pos_impresion_html/index.php?idfactura="+idfac+"' target='_blank' style='padding:5px;border-radius:5px;'>Imprimir Ticket</a></center>",
									function(){ 
													
										var url = window.location.href;
										url = url.split("index.php"); 
										location.href = url[0];
									});
								});
							}
							else
							{
								console.log("Llamamos pagar venta. ");
								var idfactura = $("#idfactura").val();
								window.location.href='../blank_recibocaja/index.php?idfacven='+idfactura;
							}
						}
						else
						{
							alertify.set('notifier','position', 'top-center');
							alertify.error('No ha agregado productos.');
						}
	
					}
					else
					{
							
						if(codbarras == ".")
						{
							$.post("../blank_traer_peso/index.php",{ok:''},function(rp){
								
								console.log("Log data traer peso");
								console.log(rp);

								var drp = JSON.parse(rp);
								$("#txt_articulo").val('*'+drp.peso);
							});
						}
						else
						{
						
							var vventaunidad = $("#iventaunidad").val();
							var idfactura = $("#idfactura").val();

							console.log("codbarras: "+codbarras+" -- unidad: "+vventaunidad);

							$.post("../frm_pos_buscarcodbarra/index.php",{

								codbarras:codbarras,
								ventaunidad:vventaunidad,
								tipoprecio:tipoprecio,
								idfactura:idfactura

							},function(r){

								console.log("Log al agregar codigo en txt_articulo: ");
								console.log(r);

								var o = JSON.parse(r);

								if(o.maneja_tcs_lfs=='NA')
								{

									if(!$.isEmptyObject(o.idpro))
									{

										var c = 1;
										var p = o.preciopro;
										var d = 0;
										var t = 0;

										var ventaitemcantidad  = $("#ventaitemcantidad").val();

										if(!$.isEmptyObject(ventaitemcantidad)){

											c = ventaitemcantidad;
											c = c.replace(",","");
											c = c.replace(",","");
											c = c.replace(",","");
										}

										var ventaitemprecio    = $("#ventaitemprecio").val();

										if(!$.isEmptyObject(ventaitemprecio) && o.precio_editable=='SI'){

											p = ventaitemprecio;
											p = p.replace(",","");
											p = p.replace(",","");
											p = p.replace(",","");
										}

										t = c*p;


										var ventaitemdescuento = $("#ventaitemdescuento").val();

										if(o.gdescuento=="SI")
										{
											ventaitemdescuento = o.descuento;
										}

										if(!$.isEmptyObject(ventaitemdescuento)){

											d = ventaitemdescuento;

										}


										var filas = $("#detallefactura tr").length;

										$("#ventaitemcantidad").val("");
										$("#ventaitemprecio").val("");
										$("#ventaitemdescuento").val("");
										$("#txt_articulo").val("");
										$("#txt_articulo").focus();

										console.log(filas);

										var idfactura = $("#idfactura").val();
										var articulo  = o.idpro;
										var precio  = p;
										var cantidad = c;
										var iva = p-(p/o.ivapro);
										var descuento = 0;
										if(!$.isEmptyObject(d))
										{
										descuento = d;
										}
										var costo = o.costo;
										var tasaiva = o.tasaiva;
										var idfila  = "itemsagregados"+filas;
										var vunidmaymen = o.unidmaymen;
										var vrecmayamen = o.recmayamen;

										$("#idbodega").val('1');

										fAgregarItemDetalle
										(
												idfactura,
												articulo,
												precio,
												cantidad,
												iva,
												descuento,
												costo,
												tasaiva,
												idfila,
												vunidmaymen,
												vrecmayamen
										);

										
										c = parseFloat(c);
										c = c.toFixed(3);
										
										fAgregarFilaTabla
										(
												filas, 
												o.nompro,
												c,
												p,
												d,
												t
										);

										fRecalcular();

									}else{ 

										alertify.set('notifier','position', 'top-center');
										alertify.error('Artículo inexistente.');
										$("#txt_articulo").val("");
										$("#txt_articulo").focus();
									}

								}
								if(o.maneja_tcs_lfs=='LFS')
								{

									var ventaunid = $("#ventaunidad").val();
									fSiLote(codbarras,1,ventaunid);
								}
							});
						}
					}

				}
			
			 	return false;
			}

		});

		$("#cliente").keypress(function(e){

			var code = (e.keyCode ? e.keyCode : e.which);

			if(code == 13)
			{
				var idfactura = $("#idfactura").val();
				var formapago = $("#formapago").val();
				var identificacion = this.value;

				if(!$.isEmptyObject(identificacion) && !$.isEmptyObject(idfactura))
				{

					$.post("../frm_pos_gestionarmaster/index.php",{

						idfactura:idfactura,
						identificacion:identificacion,
						editarcliente:"",
						formapago:formapago

					},function(r){

						console.log("Editar cliente data keypress: ");
						console.log(r);

						var obj = JSON.parse(r);
	
						$('#sc_precio').val(obj.preciolista);

						if(!$.isEmptyObject(obj.nombrecliente))
						{
							if(obj.formapago==1)
							{
								if(obj.credito=="SI")
								{
									if(obj.nombrecliente==obj.clienteanterior)
									{
										$("#ventadiascredito").val(obj.diasanteriores);
									}
									else
									{
										$("#ventadiascredito").val(obj.dias);
									}
									$("#nombrecliente").val(obj.nombrecliente);
									$("#ventadiascredito").change();
								}
								else
								{
									$("#nombrecliente").val(obj.clienteanterior);
									$("#cliente").val(obj.nitclienteanterior);
									$("#ventadiascredito").val(obj.diasanteriores);
									$("#ventadiascredito").change();

									alertify.set('notifier','position', 'top-center');
									alertify.error('El cliente no tiene credito parametrizado.');
								}
							}
							else
							{
								$("#nombrecliente").val(obj.nombrecliente);
							}
	
							fCargarDirecciones(function(){

								fCambiarDireccion();
							});

						}
						else
						{

							alertify.set('notifier','position', 'top-center');
							alertify.error('Cliente inválido.');

							$("#cliente").select();
							$("#cliente").val("0000000");
						}
						
						
						var valorpropina = obj.valor_propina;

						var total = obj.total;

						if($('#si_propina').prop('checked'))
						{
							total = parseFloat(total) + parseFloat(valorpropina);
							$("#vtotalventa").text(formatNumber(total));
							$("#valor_propina").text(formatNumber(valorpropina));
							$("#porcentaje_propina").val(obj.porcentaje_propina);
						}
					});
				}
			}
		});

		$("#cliente").click(function(e){

			e.preventDefault();

			var idfactura = $("#idfactura").val();
			var formapago = $("#formapago").val();
			var identificacion = this.value;

			if(!$.isEmptyObject(identificacion) && !$.isEmptyObject(idfactura))
			{

				$.post("../frm_pos_gestionarmaster/index.php",{

					idfactura:idfactura,
					identificacion:identificacion,
					editarcliente:"",
					formapago:formapago

				},function(r){
	
					console.log("Editar cliente data keypress: ");
					console.log(r);
	
					var obj = JSON.parse(r);
	
					$('#sc_precio').val(obj.preciolista);

					if(!$.isEmptyObject(obj.nombrecliente))
					{
						if(obj.formapago==1)
						{
							if(obj.credito=="SI")
							{
								if(obj.nombrecliente==obj.clienteanterior)
								{
									$("#ventadiascredito").val(obj.diasanteriores);
								}
								else
								{
									$("#ventadiascredito").val(obj.dias);
								}
								$("#nombrecliente").val(obj.nombrecliente);
								$("#ventadiascredito").change();
							}
							else
							{
								$("#nombrecliente").val(obj.clienteanterior);
								$("#cliente").val(obj.nitclienteanterior);
								$("#ventadiascredito").val(obj.diasanteriores);
								$("#ventadiascredito").change();
	
								alertify.set('notifier','position', 'top-center');
								alertify.error('El cliente no tiene credito parametrizado.');
							}
						}
						else
						{
							$("#nombrecliente").val(obj.nombrecliente);
						}
	
						fCargarDirecciones(function(){
							
							fCambiarDireccion();
						});

					}
					else
					{

						alertify.set('notifier','position', 'top-center');
						alertify.error('Cliente inválido.');

						$("#cliente").select();
						$("#cliente").val("0000000");
					}
					
					var valorpropina = obj.valor_propina;

					var total = obj.total;

					if($('#si_propina').prop('checked'))
					{
						total = parseFloat(total) + parseFloat(valorpropina);
						$("#vtotalventa").text(formatNumber(total));
						$("#valor_propina").text(formatNumber(valorpropina));
						$("#porcentaje_propina").val(obj.porcentaje_propina);
					}

				});
			}
		});
	
		$("#numerofactura").keypress(function(e){

			var code = (e.keyCode ? e.keyCode : e.which);

			if(code == 13)
			{
				fCambiarNumero();
			}
		});
	
		$("#numerofactura").blur(function(){

			fCambiarNumero();
		});

		$("#formapago").change(function(){

			var idfactura = $("#idfactura").val();
			var formapago = this.value;
			var vence     = $("#ventavencimiento").val();
			var dias      = $("#ventadiascredito").val();

			if(!$.isEmptyObject(idfactura))
			{

				console.log("forma de pago: ");
				console.log(formapago);
					
				if(formapago==1)
				{
					if($("#nombrecliente").val()!="VARIOS")
					{
	
						$.post("../frm_pos_gestionarmaster/index.php",{

							 idfactura: idfactura,
							 formapago: formapago,
							 cambiarcreditocontado:"",
							 vence:vence,
							 dias:dias

						},function(r){
	
							console.log("formapago log data - credito: ");
							console.log(r);		
	
							var obj = JSON.parse(r);
							if(obj.sicredito=="SI")
							{
								$(".sicredito").css("display","block");
								$("#ventadiascredito").css("text-align","center");
								$("#ventavencimiento").css("text-align","center");
	
								if(obj.dias_credito>0)
								{
									$("#ventadiascredito").val(obj.dias_credito);
									$("#ventadiascredito").change();
								}
							}
							else
							{
								if(!$.isEmptyObject(obj.mensaje))
								{
									alertify.set('notifier','position', 'top-center');
									alertify.error(obj.mensaje);
								}
		
								$("#formapago").val("2");
							}
						});
					}
					else
					{
						$("#formapago").val("2");
	
						alertify.set('notifier','position', 'top-center');
						alertify.error('Debe seleccionar un cliente que no sea "VARIOS".');
					}
				}
				else
				{
					$.post("../frm_pos_gestionarmaster/index.php",{

						 idfactura: idfactura,
						 formapago: formapago,
						 cambiarcreditocontado:"",
						 vence:vence,
					     dias:dias

					},function(r){
						
						console.log("formapago log data - contado: ");
						console.log(r);					
	
						$(".sicredito").css("display","none");
						$("#ventadiascredito").val("");
						$("#ventavencimiento").val("");
					});
				}
				

			}else{

				$("#formapago").val("2");
				$("#ventadiascredito").val("");
				$("#ventavencimiento").val("");
			}
		});

		$("#fecha").change(function(){

			var idfactura = $("#idfactura").val();
			var fecha = this.value;

			if(!$.isEmptyObject(idfactura)){

				$.post("../frm_pos_gestionarmaster/index.php",{

					 idfactura: idfactura,
					 fecha: fecha,
					 cambiarfecha:""

				},function(r){


				});

			}else{

				$(this).val(fHoy());
			}
		});
	
		$("#ventadiascredito").change(function(){
	
			var idfactura = $("#idfactura").val();	
			var fecha = $("#fecha").val();
			var dias  = $(this).val();
	
			var resultado = sumarDias(fecha, dias);
	
			$("#ventavencimiento").val(resultado);
			console.log(resultado);
	
			$.post("../frm_pos_gestionarmaster/index.php",{

				idfactura: idfactura,
				vence: resultado,
				dias:dias,
				cambiarvencimiento:""

			},function(r){
				
				console.log("dias cambiados con exito.");

			});
			
		});
		
		$("#ventavencimiento").change(function(){
			
			var idfactura = $("#idfactura").val();	
			var fecha1 = $("#fecha").val();
			var fecha2  = $(this).val();
	
			console.log("fecha1: "+fecha1+" fecha2: "+fecha2);
	
			var resultado = fDiasEntreFechas(fecha1,fecha2);
	
			$("#ventadiascredito").val(resultado);
			console.log(resultado);
	
			$.post("../frm_pos_gestionarmaster/index.php",{

				idfactura: idfactura,
				vence: fecha2,
				dias:resultado,
				cambiarvencimiento:""

			},function(r){
				
				console.log("fecha vencimiento cambiada con exito.");

			});
			
		});

		function fDarFormatoConSimboloaNumero(objeto,simbolo){

			var darformato = objeto.value;
			darformato = darformato.replace(simbolo,"");
			darformato = darformato.replace(",","");
			darformato = darformato.replace(",","");
			darformato = darformato.replace(",","");
			if(darformato>0){

				objeto.value = simbolo+formatNumber2(darformato);
			}
		}
		
		
		$("#txt_articulo").keyup(function(e){

			var code = (e.keyCode ? e.keyCode : e.which);
	
			console.log("Al levantar la tecla precionada en txt_articulo: ");
			console.log(code);
	
			if(code == 40){
				
	
				if($.isEmptyObject(this.value)){
	
					if($("#detallefactura tr").length>1){
	
						$("#detallefactura tr:eq(1) input:eq(0)").focus();
						$("#detallefactura tr:eq(1) input:eq(0)").prop("checked", true);
					}
				}
				
				return false;
			}
	
			if(code == 39){
				
				$("#ventaarticulomanual").focus();
			}

				
				if(this.value.indexOf("/") != -1){
					fDarFormatoConSimboloaNumero(this,"/");
				}

				if(this.value.indexOf("+") != -1){
					fDarFormatoConSimboloaNumero(this,"+");
				}
			
		});
		

		$("#ventaarticulomanual").keyup(function(e){

			var code = (e.keyCode ? e.keyCode : e.which);
			var ventaunidad = $("#ventaunidad").val();
			var tipoprecio  = $("#sc_precio").val();
	
			console.log("Tecla pulsada articulo manual keyup: ");
			console.log(code);

			if(code == 40){
				
				console.log("abajo");
				
				if(!$.isEmptyObject(this.value)){
					
					if($("input[name=listaarticulos]").length>0){
						
						$("#listaarticulos1").focus();
						$('#listaarticulos1').prop("checked", true);
	
					}
	
	
				}else{
	
					if($("#detallefactura tr").length>1){
	
						$("#detallefactura tr:eq(1) input:eq(0)").focus();
						$("#detallefactura tr:eq(1) input:eq(0)").prop("checked", true);
					}
				}
				
				return false;
			}
	
			if(code != 13){
				
				if(this.value.length>2)
				{
					fAutocompletarArticulos(this.value,ventaunidad,tipoprecio);
				}
			}
			
			if(code == 37){
				
				$("#txt_articulo").focus();
			}

			if($.isEmptyObject(this.value)){

				$("#rautocompletar").html("");
			}
			
		});
	
});
</script>
<?php

$_SESSION['scriptcase']['frm_pos']['contr_erro'] = 'off';
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
   $_SESSION['scriptcase']['frm_pos']['contr_erro'] = 'off';
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
            nm_limpa_str_frm_pos($nmgp_val);
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
            nm_limpa_str_frm_pos($nmgp_val);
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
       elseif (is_file($root . $_SESSION['scriptcase']['frm_pos']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['frm_pos']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "frm_pos") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['frm_pos']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['frm_pos']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['frm_pos']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_FACILWEBv2'])) {
               $_SESSION['scriptcase']['frm_pos']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_FACILWEBv2'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["gsiescajero"])) 
   {
       $_SESSION["gsiescajero"] = $_POST["gsiescajero"];
       nm_limpa_str_frm_pos($_SESSION["gsiescajero"]);
   }
   if (isset($_GET["gsiescajero"])) 
   {
       $_SESSION["gsiescajero"] = $_GET["gsiescajero"];
       nm_limpa_str_frm_pos($_SESSION["gsiescajero"]);
   }
   if (!isset($_SESSION["gsiescajero"])) 
   {
       $_SESSION["gsiescajero"] = "";
   }
   if (isset($_POST["gdescripciongrupo"])) 
   {
       $_SESSION["gdescripciongrupo"] = $_POST["gdescripciongrupo"];
       nm_limpa_str_frm_pos($_SESSION["gdescripciongrupo"]);
   }
   if (isset($_GET["gdescripciongrupo"])) 
   {
       $_SESSION["gdescripciongrupo"] = $_GET["gdescripciongrupo"];
       nm_limpa_str_frm_pos($_SESSION["gdescripciongrupo"]);
   }
   if (!isset($_SESSION["gdescripciongrupo"])) 
   {
       $_SESSION["gdescripciongrupo"] = "";
   }
   if (isset($_POST["docpordefectoenpos"])) 
   {
       $_SESSION["docpordefectoenpos"] = $_POST["docpordefectoenpos"];
       nm_limpa_str_frm_pos($_SESSION["docpordefectoenpos"]);
   }
   if (isset($_GET["docpordefectoenpos"])) 
   {
       $_SESSION["docpordefectoenpos"] = $_GET["docpordefectoenpos"];
       nm_limpa_str_frm_pos($_SESSION["docpordefectoenpos"]);
   }
   if (!isset($_SESSION["docpordefectoenpos"])) 
   {
       $_SESSION["docpordefectoenpos"] = "";
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
   if (isset($_SESSION['sc_session'][$script_case_init]['frm_pos']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['frm_pos']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['frm_pos']['iframe_menu']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "frm_pos";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'frm_pos' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['frm_pos']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['frm_pos']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['frm_pos']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['frm_pos']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['frm_pos']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['frm_pos']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('frm_pos' == $sReferer || 'frm_pos_' == substr($sReferer, 0, 8))
       {
           $_SESSION['sc_session'][$script_case_init]['frm_pos']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['frm_pos']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'frm_pos')
   {
       $_SESSION['sc_session'][$script_case_init]['frm_pos']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['frm_pos']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/frm_pos_erro.php");
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
                nm_limpa_str_frm_pos($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
       if (isset($gsiescajero)) 
       {
           $_SESSION['gsiescajero'] = $gsiescajero;
           nm_limpa_str_frm_pos($_SESSION["gsiescajero"]);
       }
       if (isset($gdescripciongrupo)) 
       {
           $_SESSION['gdescripciongrupo'] = $gdescripciongrupo;
           nm_limpa_str_frm_pos($_SESSION["gdescripciongrupo"]);
       }
       if (isset($docpordefectoenpos)) 
       {
           $_SESSION['docpordefectoenpos'] = $docpordefectoenpos;
           nm_limpa_str_frm_pos($_SESSION["docpordefectoenpos"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_frm_pos = new frm_pos_apl();
   $contr_frm_pos->controle();
//
   function nm_limpa_str_frm_pos(&$str)
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
