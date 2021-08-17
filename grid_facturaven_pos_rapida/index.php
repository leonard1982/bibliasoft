<?php
   include_once('grid_facturaven_pos_rapida_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_cache']      = "";
   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_doc']        = "";
   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_con_conn_firebird']         = "conn_firebird";
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
    if(empty($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class grid_facturaven_pos_rapida_ini
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
   var $str_schema_filter;
   var $Str_btn_filter;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $link_pdfreport_facturaven_cons;
   var $link_grid_facturaven_pos_detalle_cons_emb;
   var $link_impresion_pos_pdf_cons;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_limite_lin_res;
   var $nm_limite_lin_res_prt;
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
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_blocos  = array();
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
   var $nm_db_conn_firebird;
   var $nm_con_conn_firebird = array();
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
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "grid_facturaven_pos_rapida"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "FACILWEBv2"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20180116"; 
      $this->nm_hr_criacao   = "154435"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20210523"; 
      $this->nm_hr_ult_alt   = "211227"; 
      $this->Apl_paginacao   = "PARCIAL"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
      $this->nm_tp_variance  = "P";
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
      $this->path_prod       = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_doc'];
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
      if (!isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_BlueBerry/Sc9_BlueBerry";
      $this->str_schema_filter = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_BlueBerry/Sc9_BlueBerry";
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/grid_facturaven_pos_rapida';
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
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
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
      if (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['actual_lang']) || $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['actual_lang'] = $this->str_lang;
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
          include_once("grid_facturaven_pos_rapida_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
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
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['ancor_save'] = $_POST['ancor_save'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      $Tmp_apl_lig = "grid_facturaven_pos_detalle";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/grid_facturaven_pos_detalle_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/grid_facturaven_pos_detalle_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_facturaven_pos_detalle_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_facturaven_pos_detalle_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["grid_facturaven_pos_detalle"] = 'S';
          }
      }
      $this->sc_lig_target["C_@scinf_detalleventa"] = '';
      $this->sc_lig_target["C_@scinf_detalleventa_@scinf_grid_facturaven_pos_detalle"] = '';
      $Tmp_apl_lig = "impresion_pos_pdf";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/impresion_pos_pdf_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/impresion_pos_pdf_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/impresion_pos_pdf_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/impresion_pos_pdf_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["impresion_pos_pdf"] = 'S';
          }
      }
      $this->sc_lig_target["C_@scinf_imprimir"] = '_blank';
      $this->sc_lig_target["C_@scinf_imprimir_@scinf_impresion_pos_pdf"] = '_blank';
      $Tmp_apl_lig = "frm_pos";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/frm_pos_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/frm_pos_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/frm_pos_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/frm_pos_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["frm_pos"] = 'S';
          }
      }
      $this->sc_lig_target["B_@scinf_sc_btn_0"] = '_self';
      $this->sc_lig_target["B_@scinf_sc_btn_0_@scinf_frm_pos"] = '_self';
      $Tmp_apl_lig = "terceros_cliente";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/terceros_cliente_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/terceros_cliente_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/terceros_cliente_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/terceros_cliente_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["terceros_cliente"] = 'S';
          }
      }
      $this->sc_lig_target["B_@scinf_sc_btn_1"] = '_blank';
      $this->sc_lig_target["B_@scinf_sc_btn_1_@scinf_terceros_cliente"] = '_blank';
      $Tmp_apl_lig = "pdfreport_facturaven";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/pdfreport_facturaven_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/pdfreport_facturaven_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/pdfreport_facturaven_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/pdfreport_facturaven_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["pdfreport_facturaven"] = 'S';
          }
      }
      $this->sc_lig_target["C_@scinf_numfacven"] = '_blank';
      $this->sc_lig_target["C_@scinf_numfacven_@scinf_pdfreport_facturaven"] = '_blank';
      $Tmp_apl_lig = "control_copiar_documento_como";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/control_copiar_documento_como_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/control_copiar_documento_como_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/control_copiar_documento_como_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/control_copiar_documento_como_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["control_copiar_documento_como"] = 'S';
          }
      }
      $this->sc_lig_target["B_@scinf_copiar_documento_como"] = 'modal';
      $this->sc_lig_target["B_@scinf_copiar_documento_como_@scinf_control_copiar_documento_como"] = 'modal';
      $Tmp_apl_lig = "pdfreport_facturaven";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/pdfreport_facturaven_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/pdfreport_facturaven_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/pdfreport_facturaven_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/pdfreport_facturaven_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["pdfreport_facturaven"] = 'S';
          }
      }
      $this->sc_lig_target["C_@scinf_a4"] = '_blank';
      $this->sc_lig_target["C_@scinf_a4_@scinf_pdfreport_facturaven"] = '_blank';
      $Tmp_apl_lig = "grid_facturaven_pos";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/grid_facturaven_pos_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/grid_facturaven_pos_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_facturaven_pos_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_facturaven_pos_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["grid_facturaven_pos"] = 'S';
          }
      }
      $this->sc_lig_target["B_@scinf_buscar"] = '_self';
      $this->sc_lig_target["B_@scinf_buscar_@scinf_grid_facturaven_pos"] = '_self';
      if ($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["grid_facturaven_pos_rapida"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["grid_facturaven_pos_rapida"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      $this->link_pdfreport_facturaven_cons =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('pdfreport_facturaven') . "/" ; 
      $this->link_grid_facturaven_pos_detalle_cons_emb =  $this->root . $this->path_link  . "" . SC_dir_app_name('grid_facturaven_pos_detalle') . "/index.php" ; 
      $this->link_impresion_pos_pdf_cons =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('impresion_pos_pdf') . "/" ; 
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao']);
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
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['redir']))
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
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan'])) 
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
      $this->Control_Css    = "coo";
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

      $this->nm_cont_lin           = 0;
      $this->nm_limite_lin         = 0;
      $this->nm_limite_lin_prt     = 0;
      $this->nm_limite_lin_res     = 0;
      $this->nm_limite_lin_res_prt = 0;
// 
      include_once($this->path_aplicacao . "grid_facturaven_pos_rapida_erro.class.php"); 
      $this->Erro = new grid_facturaven_pos_rapida_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('grid_facturaven_pos_rapida'); 
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
      $this->Tree_img_type   = "kie";
      $str_button = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "facilweb_azul2_iconos";
      $_SESSION['scriptcase']['str_button_all'] = $str_button;
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
      $this->arr_buttons_usr = array();

      $this->arr_buttons_usr['SC_btn_0']['hint']             = "Nueva factura POS";
      $this->arr_buttons_usr['SC_btn_0']['type']             = "image";
      $this->arr_buttons_usr['SC_btn_0']['value']            = "Nueva";
      $this->arr_buttons_usr['SC_btn_0']['display']          = "only_img";
      $this->arr_buttons_usr['SC_btn_0']['display_position'] = "text_right";
      $this->arr_buttons_usr['SC_btn_0']['style']            = "";
      $this->arr_buttons_usr['SC_btn_0']['image']            = "scriptcase__NM__ico__NM__cashier_32.png";

      $this->arr_buttons_usr['Eliminar']['hint']             = "Eliminar una factura";
      $this->arr_buttons_usr['Eliminar']['type']             = "image";
      $this->arr_buttons_usr['Eliminar']['value']            = "Eliminar";
      $this->arr_buttons_usr['Eliminar']['display']          = "only_img";
      $this->arr_buttons_usr['Eliminar']['display_position'] = "text_right";
      $this->arr_buttons_usr['Eliminar']['style']            = "";
      $this->arr_buttons_usr['Eliminar']['image']            = "scriptcase__NM__ico__NM__garbage_delete_32.png";

      $this->arr_buttons_usr['SC_btn_1']['hint']             = "Nuevo Cliente";
      $this->arr_buttons_usr['SC_btn_1']['type']             = "image";
      $this->arr_buttons_usr['SC_btn_1']['value']            = "Nuevo Cliente";
      $this->arr_buttons_usr['SC_btn_1']['display']          = "only_img";
      $this->arr_buttons_usr['SC_btn_1']['display_position'] = "text_right";
      $this->arr_buttons_usr['SC_btn_1']['style']            = "";
      $this->arr_buttons_usr['SC_btn_1']['image']            = "scriptcase__NM__ico__NM__user_add_32.png";

      $this->arr_buttons_usr['Reversar']['hint']             = "Desasentar una factura";
      $this->arr_buttons_usr['Reversar']['type']             = "image";
      $this->arr_buttons_usr['Reversar']['value']            = "Reversar";
      $this->arr_buttons_usr['Reversar']['display']          = "only_img";
      $this->arr_buttons_usr['Reversar']['display_position'] = "text_right";
      $this->arr_buttons_usr['Reversar']['style']            = "";
      $this->arr_buttons_usr['Reversar']['image']            = "scriptcase__NM__ico__NM__data_out_32.png";

      $this->arr_buttons_usr['Asentar']['hint']             = "Asentar una factura";
      $this->arr_buttons_usr['Asentar']['type']             = "image";
      $this->arr_buttons_usr['Asentar']['value']            = "Asentar";
      $this->arr_buttons_usr['Asentar']['display']          = "only_img";
      $this->arr_buttons_usr['Asentar']['display_position'] = "text_right";
      $this->arr_buttons_usr['Asentar']['style']            = "";
      $this->arr_buttons_usr['Asentar']['image']            = "scriptcase__NM__ico__NM__data_into_32.png";

      $this->arr_buttons_usr['enviaratns']['hint']             = "Enviar a Facturación TNS";
      $this->arr_buttons_usr['enviaratns']['type']             = "image";
      $this->arr_buttons_usr['enviaratns']['value']            = "Enviar a TNS";
      $this->arr_buttons_usr['enviaratns']['display']          = "only_img";
      $this->arr_buttons_usr['enviaratns']['display_position'] = "text_right";
      $this->arr_buttons_usr['enviaratns']['style']            = "";
      $this->arr_buttons_usr['enviaratns']['image']            = "grp__NM__ico__NM__tns.ico";

      $this->arr_buttons_usr['copiar_documento_como']['hint']             = "Copiar documento como";
      $this->arr_buttons_usr['copiar_documento_como']['type']             = "image";
      $this->arr_buttons_usr['copiar_documento_como']['value']            = "Copiar documento como";
      $this->arr_buttons_usr['copiar_documento_como']['display']          = "only_img";
      $this->arr_buttons_usr['copiar_documento_como']['display_position'] = "text_right";
      $this->arr_buttons_usr['copiar_documento_como']['style']            = "";
      $this->arr_buttons_usr['copiar_documento_como']['image']            = "scriptcase__NM__ico__NM__copy_32.png";

      $this->arr_buttons_usr['generar_contabilidad_tns']['hint']             = "Generar Contabilidad TNS";
      $this->arr_buttons_usr['generar_contabilidad_tns']['type']             = "image";
      $this->arr_buttons_usr['generar_contabilidad_tns']['value']            = "Generar Contabilidad TNS";
      $this->arr_buttons_usr['generar_contabilidad_tns']['display']          = "only_img";
      $this->arr_buttons_usr['generar_contabilidad_tns']['display_position'] = "text_right";
      $this->arr_buttons_usr['generar_contabilidad_tns']['style']            = "";
      $this->arr_buttons_usr['generar_contabilidad_tns']['image']            = "grp__NM__ico__NM__tns.ico";

      $this->arr_buttons_usr['buscar']['hint']             = "Buscar";
      $this->arr_buttons_usr['buscar']['type']             = "image";
      $this->arr_buttons_usr['buscar']['value']            = "buscar";
      $this->arr_buttons_usr['buscar']['display']          = "only_img";
      $this->arr_buttons_usr['buscar']['display_position'] = "text_right";
      $this->arr_buttons_usr['buscar']['style']            = "";
      $this->arr_buttons_usr['buscar']['image']            = "scriptcase__NM__ico__NM__find_32.png";
      $this->str_google_fonts= isset($str_google_fonts)?$str_google_fonts:'';
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      if (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['redir_tp'] == "R") {
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
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']);
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
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9NmH9X7D1BeHQBqDMBOVcBUDur/DoJsHQBiH9BOHIveD5NUDMzGZSJqH5FYZuFaHQNmZSBiHIrKHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHABYHuBOHgBYDkXKDWXCHIFUHQFYDuFaHArYHuXGDMrwV9BUHEFYHIFUDcNmZkFGHAN7HQBiHgvCHEJqDuXKZuBqHQJKZSBiDSN7HurqDMrwVcB/HEFYHIJeHQBsZ1BODSrYHuFaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuFGDMvsZSNiDurGVEraHQJmH9BqHAN7HQF7HgvCHArCHEXCHMBiDcXGDQFUDSzGVWJeDMrwV9FeDWJeHIraHQBiZSBOD1rwHQXGHgvCHArsDuJeHIJeHQFYZSBiZ1N7HuBqHgNKDkBODuFqDoFGDcBqVIJwD1rwHuBqHgBYVkJ3HEFaHMBOHQJKDQFUDSN7HQNUDMrwV9FeHEF/HMJwHQBiZkFGHANOHQF7HgvCHEJqDWrGZuXGHQJKDQFUHIrwHurqDMrwV9FeDuX7HIF7HQNwZSBOD1rKHQraDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7VorqDcBqZ1FaD1rKV5XGDMNKDkBsV5FaZuBODcJeDQFGHAvmV5JwHuBYDkFCDuX7VEF7HQFYH9B/HIveZMB/DEBOHEXeDuX/DoB/D9NwZSX7D1BeV5BOHuvmVcFCDWXCVENUDcBqH9B/HABYD5JeDMzGHAFKV5XKDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9B/HIveD5FaDErKZSJGH5F/DoFUD9JKDQFGHANKD5F7DMvOV9BUDuFGVoX7HQFYZkBiD1NaD5BOHgvCHArsH5BmZuJeHQXGDuBqHAvOV5XGDMrYDkBsDWXCDoJsDcBwH9B/Z1rYHQJwHgNKHEXeDWFGDoBqDcBwH9X7D1veHQB/DMzGVIB/DurGVErqDcBqZkBiHAzGZMBqDEBeVkJ3HEXCHIJsD9XsZ9JeD1BeD5F7DMvmVcFiV5X7DoF7D9XOZSB/DSrYV5B/DMNKZSXeDWXCDoraDcJeZSFGD1veVWJwHuzGVIBODWFaVErqDcJUZ1B/Z1NOD5BiDErKHEFiV5FaDoXGDcXOZSFGHANOV5FUHuzGVcFKHEFYDoNUDcBqZkFUZ1NOD5BqDEBeHEBUDWF/HIJsD9XsZ9JeD1BeD5F7DMvmVcFeDWXCDoJsDcBwH9B/Z1rYHQJwDMBYHArsHEFqZuBqHQNwZSFGHAvOVWBqHuzGVcFKDWrmVoF7HQBsZ1F7HIBeHQBiHgBeHEFiV5B3DoF7D9XsDuFaHAveD5JwHuzGVcXKV5X7VoBOD9XOZSB/Z1BeV5FUDENOVkXeDWFqHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWrmVorqHQNmVINUHAzGD5BqHgBYHErsDWFGZuBqHQJKDQJsZ1vCV5FGHuNOV9FeDWXCVoBOD9BsZSBOHANOD5rqHgvsZSJqDWFqHIrqHQXOH9FUHANOD5BOHgvOVcFeDWXCDoJsDcBwH9B/Z1rYHQJwHgvsHErCDWFqHMXGHQNmH9BiHArYHQrqDMNOVcFeV5FGVoFaHQJmZkFGHIrwHQraHgvsZSJ3V5XCHMFGHQNmZ9rqHAveHQBODMvmVcB/DWF/HMFUHQXGZSBOHAN7HuJeDMrYHENiDWr/HMXGHQNwH9BiHArYHQF7DMvmVcFKV5BmVoBqD9BsZkFGHAvsZMJeHgvCDkXKDWBmZura";
      $this->prep_conect();
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['initialize']) && $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['initialize'])  
      { 
          $this->conectDB();
          $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
if (!isset($_SESSION['gintegrartns'])) {$_SESSION['gintegrartns'] = "";}
if (!isset($this->sc_temp_gintegrartns)) {$this->sc_temp_gintegrartns = (isset($_SESSION['gintegrartns'])) ? $_SESSION['gintegrartns'] : "";}
if (!isset($_SESSION['gcontador_grid_fe'])) {$_SESSION['gcontador_grid_fe'] = "";}
if (!isset($this->sc_temp_gcontador_grid_fe)) {$this->sc_temp_gcontador_grid_fe = (isset($_SESSION['gcontador_grid_fe'])) ? $_SESSION['gcontador_grid_fe'] : "";}
  $this->sc_temp_gcontador_grid_fe=1;
$this->sc_temp_gintegrartns="NO";
 
      $nm_select = "select integrar_tns from configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiIntegrarTNS = array();
      $this->vsiintegrartns = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiIntegrarTNS[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiintegrartns[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiIntegrarTNS = false;
          $this->vSiIntegrarTNS_erro = $this->Db->ErrorMsg();
          $this->vsiintegrartns = false;
          $this->vsiintegrartns_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vsiintegrartns[0][0]))
{
$this->sc_temp_gintegrartns=$this->vsiintegrartns[0][0];
}
if (isset($this->sc_temp_gcontador_grid_fe)) {$_SESSION['gcontador_grid_fe'] = $this->sc_temp_gcontador_grid_fe;}
if (isset($this->sc_temp_gintegrartns)) {$_SESSION['gintegrartns'] = $this->sc_temp_gintegrartns;}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['initialize'] = false;
          $this->Db->Close(); 
      } 
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
          if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan'])) 
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
          $this->nm_tabela = "facturaven"; 
      }
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_detalle']['ind_tree'] = 0;
      if (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['emb_linha']))
      {
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['emb_linha'] = 0;
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
              if (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao']) && $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_perfil']) && $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao']))
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
          db_conect_devel('conn_firebird', $this->root . $this->path_prod, 'FACILWEBv2', 2, $this->force_db_utf8); 
          $this->nm_con_conn_firebird['servidor']    = $_SESSION['scriptcase']['glo_servidor'];
          $this->nm_con_conn_firebird['usuario']     = $_SESSION['scriptcase']['glo_usuario'];
          $this->nm_con_conn_firebird['banco']       = $_SESSION['scriptcase']['glo_banco'];
          $this->nm_con_conn_firebird['senha']       = $_SESSION['scriptcase']['glo_senha'];
          $this->nm_con_conn_firebird['tpbanco']     = $_SESSION['scriptcase']['glo_tpbanco'];
          $this->nm_con_conn_firebird['decimal']     = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_firebird['SC_sep_date'] = $_SESSION['scriptcase']['glo_date_separator'];
          $this->nm_con_conn_firebird['protect']     = $_SESSION['scriptcase']['glo_senha_protect'];
          $this->nm_con_conn_firebird['glo_database_encoding'] = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
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
      if (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_con_conn_firebird'], $this->path_libs, "S", $this->path_conf);
          $this->nm_con_conn_firebird['servidor']               = $_SESSION['scriptcase']['glo_servidor'];
          $this->nm_con_conn_firebird['usuario']                = $_SESSION['scriptcase']['glo_usuario'];
          $this->nm_con_conn_firebird['banco']                  = $_SESSION['scriptcase']['glo_banco'];
          $this->nm_con_conn_firebird['senha']                  = $_SESSION['scriptcase']['glo_senha'];
          $this->nm_con_conn_firebird['tpbanco']                = $_SESSION['scriptcase']['glo_tpbanco'];
          $this->nm_con_conn_firebird['decimal']                = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_firebird['decimal']                = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_firebird['protect']                = $_SESSION['scriptcase']['glo_senha_protect'];
          $this->nm_con_conn_firebird['glo_database_encoding']  = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['embutida_init']) 
      {
          if (!isset($_SESSION['gcontador_grid_fe'])) 
          {
              $this->nm_falta_var .= "gcontador_grid_fe; ";
          }
          if (!isset($_SESSION['gidtercero'])) 
          {
              $this->nm_falta_var .= "gidtercero; ";
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
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date1'];
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
          if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan'])) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv2', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['embutida'])
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
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_end_clean();
          } 
      } 
   }
   function conectExtra()
   {
      if (!$_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_con_conn_firebird['glo_database_encoding'];
      $this->nm_db_conn_firebird = db_conect($this->nm_con_conn_firebird['tpbanco'], $this->nm_con_conn_firebird['servidor'], $this->nm_con_conn_firebird['usuario'], $this->nm_con_conn_firebird['senha'], $this->nm_con_conn_firebird['banco'], $this->nm_con_conn_firebird['protect'], 'S', 'N', '', $databaseEncoding); 
      if (in_array(strtolower($this->nm_con_conn_firebird['tpbanco']), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if (in_array(strtolower($this->nm_con_conn_firebird['tpbanco']), $this->nm_bases_sybase))
      {
          $this->nm_db_conn_firebird->fetchMode = ADODB_FETCH_BOTH;
          $this->nm_db_conn_firebird->Execute("set dateformat ymd");
          $this->nm_db_conn_firebird->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_con_conn_firebird['tpbanco']), $this->nm_bases_mssql))
      {
          $this->nm_db_conn_firebird->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_con_conn_firebird['tpbanco']), $this->nm_bases_oracle))
      {
          $this->nm_db_conn_firebird->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->nm_db_conn_firebird->Execute("alter session set nls_numeric_characters = '.,'");
          $this->nm_con_conn_firebird['decimal'] = "."; 
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['embutida'])
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
       eval ('set'.$this->Control_Css.$this->Tree_img_type.'("'.$this->nm_script_type.'SESSID_",base64_encode("'.$this->nm_script_by.'?".substr(md5(mt_rand()),8,16)),time()+86400);');
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date1'];
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
       return (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
   }

   function GB_date_format($val, $format, $prefix, $conf_region="S", $mask="")
   {
       if (empty($val) || empty($format)) {
           return $val;
       }
       if ($format == 'HH') {
           return $prefix . substr($val, 11, 2);
       }
       if ($format == 'DD') {
           return $prefix . substr($val, 8, 2);
       }
       if ($format == 'MM' && $conf_region == "S") {
           return $prefix . substr($val, 5, 2);
       }
       if ($format == 'WEEK' || $format == 'YYYYWEEK') {
           $part = $this->Get_Sql_Week($val);
           $part = (substr($part, 0, 1)== 0) ? substr($part, 1) : $part;
       }
       if ($format == 'DAYNAME' || $format == 'YYYYDAYNAME') {
           $daynum = $this->nm_data->GetWeekDay($val);
           if ($daynum == 0) {
               $part = $this->Nm_lang['lang_days_sund'];
           }
           if ($daynum == 1) {
               $part = $this->Nm_lang['lang_days_mond'];
           }
           if ($daynum == 2) {
               $part = $this->Nm_lang['lang_days_tued'];
           }
           if ($daynum == 3) {
               $part = $this->Nm_lang['lang_days_wend'];
           }
           if ($daynum == 4) {
               $part = $this->Nm_lang['lang_days_thud'];
           }
           if ($daynum == 5) {
               $part = $this->Nm_lang['lang_days_frid'];
           }
           if ($daynum == 6) {
               $part = $this->Nm_lang['lang_days_satd'];
           }
       }
       if ($format == 'YYYYSEMIANNUAL' || $format == 'SEMIANNUAL') {
           $part = $this->nm_data->GetSem(substr($val, 5, 2));
       }
       if ($format == 'YYYYFOURMONTHS' || $format == 'FOURMONTHS') {
           $part = $this->nm_data->GetQuadr(substr($val, 5, 2));
       }
       if ($format == 'YYYYQUARTER' || $format == 'QUARTER') {
           $part = $this->nm_data->GetTrim(substr($val, 5, 2));
       }
       if ($format == 'YYYYBIMONTHLY' || $format == 'BIMONTHLY') {
           $part = $this->nm_data->GetBim(substr($val, 5, 2));
       }
       if ($format == 'SEMIANNUAL' || $format == 'FOURMONTHS'  || $format == 'QUARTER' || $format == 'BIMONTHLY' || $format == 'WEEK' || $format == 'DAYNAME') {
           return $prefix . $part;
       }
       if ($format == 'YYYYSEMIANNUAL' || $format == 'YYYYFOURMONTHS'  || $format == 'YYYYQUARTER' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYWEEK' || $format == 'YYYYDAYNAME') {
           return $prefix . $part . " " . substr($val, 0, 4);
       }
       if ($format == 'HHIISS') {
           $tp     = 'HH';
           $mk     = 'hhiiss';
           $format = 'HH:II:SS';
           $val    = substr($val, 11, 8);
       }
       if ($format == 'HHII') {
           $tp     = 'HH';
           $mk     = 'hhii';
           $format = 'HH:II';
           $val    = substr($val, 11, 5);
       }
       if ($format == 'YYYYMMDDHHIISS') {
           $tp     = 'DH';
           $mk     = 'ddmmaaaa;hhiiss';
           $format = 'YYYY-MM-DD HH:II:SS';
       }
       if ($format == 'YYYYMMDDHHII') {
           $tp     = 'DH';
           $mk     = 'ddmmaaaa;hhii';
           $format = 'YYYY-MM-DD HH:II';
           $val    = substr($val, 0, 16);
       }
       if ($format == 'YYYYMMDDHH') {
           $tp     = 'DH';
           $mk     = 'ddmmaaaa;hh';
           $format = 'YYYY-MM-DD HH';
           $val    = substr($val, 0, 13);
       }
       if ($format == 'YYYYMMDD2') {
           $tp     = 'DT';
           $mk     = 'ddmmaaaa';
           $format = 'YYYY-MM-DD';
           $val    = substr($val, 0, 10);
       }
       if ($format == 'YYYYHH') {
           return $prefix . substr($val, 0, 4) . $_SESSION['scriptcase']['reg_conf']['date_sep'] . substr($val, 11, 2);
       }
       if ($format == 'YYYYDD') {
           return $prefix . substr($val, 0, 4) . $_SESSION['scriptcase']['reg_conf']['date_sep'] . substr($val, 8, 2);
       }
       if ($format == 'YYYYMM') {
           $tp     = 'DT';
           $mk     = 'mmaaaa';
           $format = 'YYYY-MM';
           $val = substr($val, 0, 7);
       }
       if ($format == 'MM') {
           $tp     = 'DT';
           $mk     = 'mm';
           $format = 'MM';
           $val = substr($val, 5, 2);
       }
       if ($format == 'YYYY') {
           $tp     = 'DT';
           $mk     = 'aaaa';
           $format = 'YYYY';
           $val = substr($val, 0, 4);
       }
       $conteudo_x = $val;
       nm_conv_limpa_dado($conteudo_x, $format);
       if (is_numeric($conteudo_x) && $conteudo_x > 0) 
       { 
           $this->nm_data->SetaData($val, $format);
           if ($conf_region != "S")
           { 
               $val = $this->nm_data->FormataSaida($mask);
           }
           else
           { 
               $val = $this->nm_data->FormataSaida($this->nm_data->FormatRegion($tp, $mk));
           }
       }
       return $prefix . $val;
   }

   function Get_date_arg_sum($val, $format, $cmp_sql, $arq_link_res=false, $res_metric=false)
   {
       $delimit  = $this->date_delim;
       $delimit1 = $this->date_delim1;
       if ($val == "")
       {
           return " is null";;
       }
       $arg_sum = "";
       if ($format == 'YYYYMMDDHHIISS' && (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)))
       {
           $arg_sum = " like '" . substr($val, 0, 19) . "%'";
           if ($res_metric)
           {
               return "";;
           }
       }
       elseif ($format == 'YYYYMMDDHHIISS')
       {
           $arg_sum = " = " . $delimit . $val . $delimit1;
           if ($res_metric)
           {
               return "";;
           }
       }
       elseif ($format == 'YYYY' || $format == 'YYYYMMDDHHII' || $format == 'YYYYMMDDHH' || $format == 'YYYYMMDD2' || $format == 'YYYYMM')
       {
           $valx     = substr($val, 0, 4);
           $arg_sum  = $this->Get_date_arg_sum_compl($valx, 'YYYY', $cmp_sql, $res_metric);
          if ($format == 'YYYYMMDDHHII')
           {
               $valx     = substr($val, 5, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'MM', $cmp_sql, $res_metric);
               $valx     = substr($val, 8, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'DD', $cmp_sql, $res_metric);
               $valx     = substr($val, 11, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'HH', $cmp_sql, $res_metric);
               $valx     = substr($val, 14, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'II', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYMMDDHH')
           {
               $valx     = substr($val, 5, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'MM', $cmp_sql, $res_metric);
               $valx     = substr($val, 8, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'DD', $cmp_sql, $res_metric);
               $valx     = substr($val, 11, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'HH', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYMMDD2')
           {
               $valx     = substr($val, 5, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'MM', $cmp_sql, $res_metric);
               $valx     = substr($val, 8, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'DD', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYMM')
           {
               $valx     = substr($val, 5, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'MM', $cmp_sql, $res_metric);
           }
       }
       elseif ($format == 'MM')
       {
           $valx     = ($arq_link_res) ? $val : substr($val, 5, 2);
           $arg_sum = $this->Get_date_arg_sum_compl($valx, $format, $cmp_sql, $res_metric);
       }
       elseif ($format == 'DD')
       {
            $valx    = ($arq_link_res) ? $val : substr($val, 8, 2);
           $arg_sum = $this->Get_date_arg_sum_compl($valx, $format, $cmp_sql, $res_metric);
       }
       elseif ($format == 'HH')
       {
           $valx     = ($arq_link_res) ? substr($val, 0, 2) : substr($val, 11, 2);
           $arg_sum = $this->Get_date_arg_sum_compl($valx, $format, $cmp_sql, $res_metric);
       }
       elseif ($format == 'DAYNAME')
       {
            $valx    = ($arq_link_res || $res_metric) ? $val : $this->Compat_WeekDay($val);
           $arg_sum = $this->Get_date_arg_sum_compl($valx, $format, $cmp_sql, $res_metric);
       }
       elseif ($format == 'WEEK')
       {
           $valx     = ($arq_link_res || $res_metric) ? $val : $this->Get_Sql_Week($val);
           $arg_sum = $this->Get_date_arg_sum_compl($valx, $format, $cmp_sql, $res_metric);
       }
       elseif ($format == 'BIMONTHLY')
       {
           $valx     = ($arq_link_res || $res_metric) ? $val : $this->nm_data->GetBim(substr($val, 5, 2));
           $arg_sum = $this->Get_date_arg_sum_compl($valx, $format, $cmp_sql, $res_metric);
       }
       elseif ($format == 'QUARTER')
       {
           $valx     = ($arq_link_res || $res_metric) ? $val : $this->nm_data->GetTrim(substr($val, 5, 2));
           $arg_sum = $this->Get_date_arg_sum_compl($valx, $format, $cmp_sql, $res_metric);
       }
       elseif ($format == 'FOURMONTHS')
       {
           $valx     = ($arq_link_res || $res_metric) ? $val : $this->nm_data->GetQuadr(substr($val, 5, 2));
           $arg_sum = $this->Get_date_arg_sum_compl($valx, $format, $cmp_sql, $res_metric);
       }
       elseif ($format == 'SEMIANNUAL')
       {
           $valx     = ($arq_link_res || $res_metric) ? $val : $this->nm_data->GetSem(substr($val, 5, 2));
           $arg_sum = $this->Get_date_arg_sum_compl($valx, $format, $cmp_sql, $res_metric);
       }
       elseif ($format == 'YYYYHH' || $format == 'YYYYDD' || $format == 'YYYYDAYNAME' || $format == 'YYYYWEEK' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYQUARTER' || $format == 'YYYYFOURMONTHS' || $format == 'YYYYSEMIANNUAL')
       {
           $valx     = substr($val, 0, 4);
           $arg_sum  = $this->Get_date_arg_sum_compl($valx, 'YYYY', $cmp_sql, $res_metric);
           if ($format == 'YYYYHH')
           {
               $valx      = ($arq_link_res) ?  substr($val, 4, 2) : substr($val, 11, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'HH', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYDD')
           {
                $valx     = ($arq_link_res) ?  substr($val, 4, 2) : substr($val, 8, 2);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'DD', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYDAYNAME')
           {
               $valx      = ($arq_link_res || $res_metric) ?  substr($val, 4, 1) : $this->Compat_WeekDay($val);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'DAYNAME', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYWEEK')
           {
               $valx      = ($arq_link_res || $res_metric) ?  substr($val, 4, 2) : $this->Get_Sql_Week($val);
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'WEEK', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYBIMONTHLY')
           {
               $valx      = ($arq_link_res || $res_metric) ? substr($val, 4, 1) : $this->nm_data->GetBim(substr($val, 5, 2));
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'BIMONTHLY', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYQUARTER')
           {
               $valx      = ($arq_link_res || $res_metric) ? substr($val, 4, 1) : $this->nm_data->GetTrim(substr($val, 5, 2));
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'QUARTER', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYFOURMONTHS')
           {
               $valx      = ($arq_link_res || $res_metric) ? substr($val, 4, 1) : $this->nm_data->GetQuadr(substr($val, 5, 2));
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'FOURMONTHS', $cmp_sql, $res_metric);
           }
           elseif ($format == 'YYYYSEMIANNUAL')
           {
               $valx      = ($arq_link_res || $res_metric) ? substr($val, 4, 1) : $this->nm_data->GetSem(substr($val, 5, 2));
               $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'SEMIANNUAL', $cmp_sql, $res_metric);
           }
       }
       elseif ($format == 'HHIISS')
       {
           $valx     = ($arq_link_res) ? substr($val, 0, 2) : substr($val, 11, 2);
           $arg_sum  = $this->Get_date_arg_sum_compl($valx, 'HH', $cmp_sql, $res_metric);
           $valx     = ($arq_link_res) ? substr($val, 3, 2) : substr($val, 14, 2);
           $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'II', $cmp_sql, $res_metric);
           $valx     = ($arq_link_res) ? substr($val, 6, 2) : substr($val, 17, 2);
           $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'SS', $cmp_sql, $res_metric);
       }
       elseif ($format == 'HHII')
       {
           $valx     = ($arq_link_res) ? substr($val, 0, 2) : substr($val, 11, 2);
           $arg_sum  = $this->Get_date_arg_sum_compl($valx, 'HH', $cmp_sql, $res_metric);
           $valx     = ($arq_link_res) ? substr($val, 3, 2) : substr($val, 14, 2);
           $arg_sum .= " and " . $this->Get_date_arg_sum_compl($valx, 'II', $cmp_sql, $res_metric);
       }
       else
       {
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
           {
               $arg_sum = " = #" . $val . "#";
           }
           else
           {
               $arg_sum = " = " . $this->Db->qstr($val);
           }
       }
       return $arg_sum;
   }
   function Get_date_arg_sum_compl($val, $format, $cmp_sql, $res_metric=false)
   {
       if ($res_metric) {
           return $this->Get_date_arq_res_metric($format, $cmp_sql);
       }
       $delimit  = $this->date_delim;
       $delimit1 = $this->date_delim1;
       if ($format == 'HH') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%H'," . $cmp_sql . ")  = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "hour(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('hour' from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(hour from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'HH24') = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(hour, " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "hour(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "to_char(extend(" . $cmp_sql . ", hour to second), '%H') = " . $val;
           }
           else {
               return "hour(" . $cmp_sql . ") = " . $delimit . $val . $delimit1;
           }
       }
       if ($format == 'II') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%M'," . $cmp_sql . ")  = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "minute(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('minute' from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(minute from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'MI') = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(minute, " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "minute(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "to_char(extend(" . $cmp_sql . ", hour to second), '%M') = " . $val;
           }
           else {
               return "minute(" . $cmp_sql . ") = " . $delimit . $val . $delimit1;
           }
       }
       if ($format == 'SS') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%S'," . $cmp_sql . ")  = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "second(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('second' from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(second from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'SS') = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(second, " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "second(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "to_char(extend(" . $cmp_sql . ", hour to second), '%S') = " . $val;
           }
           else {
               return "second(" . $cmp_sql . ") = " . $delimit . $val . $delimit1;
           }
       }
       if ($format == 'DD') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%d'," . $cmp_sql . ")  = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "day(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('day' from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(day from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'DD') = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(day, " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(day, " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "day(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "DAYOFMONTH(" . $cmp_sql . ") = " . $val;
           }
           else {
               return "day(" . $cmp_sql . ") = " . $delimit . $val . $delimit1;
           }
       }
       if ($format == 'MM') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%m'," . $cmp_sql . ")  = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "month(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('month' from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(month from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'MM') = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(month, " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "month(" . $cmp_sql . ") = " . $val;
           }
           else {
               return "month( " . $cmp_sql . ") = " . $delimit . $val . $delimit1;
           }
       }
       if ($format == 'YYYY') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%Y'," . $cmp_sql . ")  = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "year(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('year' from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(year from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'YYYY') = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(year, " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "year(" . $cmp_sql . ") = " . $val;
           }
           else {
               return "year( " . $cmp_sql . ") = " . $delimit . $val . $delimit1;
           }
       }
       if ($format == 'WEEK') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "DatePart('ww'," . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%W'," . $cmp_sql . ")  = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "WEEK(" . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('week' from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(week from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'WW') = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(wk, " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase)) {
               return "CONVERT(VARCHAR(2), DATEPART(wk, " . $cmp_sql . ")) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(1 + (((CAST(" . $cmp_sql . " AS DATE) - MDY(1, 1, YEAR(" . $cmp_sql . "))) +  WEEKDAY(MDY(1, 1, YEAR(" . $cmp_sql . ")))) / 7) as INT) = '" . $val . "'";
           }
           else {
               return "week( " . $cmp_sql . ") = " . $delimit . $val . $delimit1;
           }
       }
       if ($format == 'DAYNAME') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "Weekday(" . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%w'," . $cmp_sql . ")  = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "WEEKDAY(" . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('dow' from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(weekday from " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'D') = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(dw, " . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase)) {
               return "CONVERT(CHAR(1), DATEPART(dw, " . $cmp_sql . ")) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2)) {
               return "DAYOFWEEK(" . $cmp_sql . ") = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "DAYOFWEEK( " . $cmp_sql . ") = " . $delimit . $val . $delimit1;
           }
           else {
               return "WEEKDAY( " . $cmp_sql . ") = " . $delimit . $val . $delimit1;
           }
       }
       if ($format == 'SEMIANNUAL') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $cmp_sql . ") - 1) / 6 + 1)) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $cmp_sql . ") -1 ) / 6 + 1) AS INTEGER) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 6 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "CAST(((EXTRACT ('MONTH' FROM " . $cmp_sql . ") - 1) / 6 + 1) AS VARCHAR (1)) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $cmp_sql . ") - 1) / 6 + 1) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "SUBSTR(((TO_CHAR (" . $cmp_sql . ", 'MM') - 1) / 6 + 1), 1, 1) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "CAST(((DatePART (MONTH, " . $cmp_sql . ") - 1) / 6 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(CAST(((MONTH(" . $cmp_sql . ") - 1) / 6 + 1) AS float) as integer) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 6 + 1) AS INT (1)) = '" . $val . "'";
           }
           else {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 6 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
       }
       if ($format == 'FOURMONTHS') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $cmp_sql . ") - 1) / 4 + 1)) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $cmp_sql . ") -1 ) / 4 + 1) AS INTEGER) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 4 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "CAST(((EXTRACT ('MONTH' FROM " . $cmp_sql . ") - 1) / 4 + 1) AS VARCHAR (1)) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $cmp_sql . ") - 1) / 4 + 1) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "SUBSTR(((TO_CHAR (" . $cmp_sql . ", 'MM') - 1) / 4 + 1), 1, 1) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "CAST(((DatePART (MONTH, " . $cmp_sql . ") - 1) / 4 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(CAST(((MONTH(" . $cmp_sql . ") - 1) / 4 + 1) AS float) as integer) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 4 + 1) AS INT (1)) = '" . $val . "'";
           }
           else {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 4 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
       }
       if ($format == 'QUARTER') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $cmp_sql . ") - 1) / 3 + 1)) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $cmp_sql . ") -1 ) / 3 + 1) AS INTEGER) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "QUARTER(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "EXTRACT ('QUARTER' FROM " . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $cmp_sql . ") - 1) / 3 + 1) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR (" . $cmp_sql . ", 'Q') = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DatePART (QUARTER, " . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2)) {
               return "QUARTER(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "QUARTER(" . $cmp_sql . ") = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "QUARTER(" . $cmp_sql . ") = " . $val;
           }
           else {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 3 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
       }
       if ($format == 'BIMONTHLY') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $cmp_sql . ") - 1) / 2 + 1)) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $cmp_sql . ") -1 ) / 2 + 1) AS INTEGER) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 2 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "CAST(((EXTRACT ('MONTH' FROM " . $cmp_sql . ") - 1) / 2 + 1) AS VARCHAR (1)) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $cmp_sql . ") - 1) / 2 + 1) = " . $val;
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "SUBSTR(((TO_CHAR (" . $cmp_sql . ", 'MM') - 1) / 2 + 1), 1, 1) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "CAST(((DatePART (MONTH, " . $cmp_sql . ") - 1) / 2 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(CAST(((MONTH(" . $cmp_sql . ") - 1) / 2 + 1) AS float) as integer) = '" . $val . "'";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 2 + 1) AS INT (1)) = '" . $val . "'";
           }
           else {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 2 + 1) AS NCHAR (1)) = '" . $val . "'";
           }
       }
   }
   function Get_date_arq_res_metric($format, $cmp_sql)
   {
       if ($format == 'HH') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%H'," . $cmp_sql . ") *sc# strftime('%H',SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "hour(" . $cmp_sql . ") *sc# hour(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('hour' from " . $cmp_sql . ") *sc# extract('hour' from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(hour from " . $cmp_sql . ") *sc# extract(hour from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'HH24') *sc# TO_CHAR(SC." . $cmp_sql . ",'HH24')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(hour, " . $cmp_sql . ") *sc# DATEPART(hour, SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "hour(" . $cmp_sql . ") *sc# hour(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "to_char(extend(" . $cmp_sql . ", hour to second), '%H') *sc# to_char(extend(SC." . $cmp_sql . ", hour to second), '%H')";
           }
           else {
               return "hour(" . $cmp_sql . ") *sc# hour(SC." . $cmp_sql . ")";
           }
       }
       if ($format == 'II') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%M'," . $cmp_sql . ") *sc# strftime('%M',SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "minute(" . $cmp_sql . ") *sc# minute(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('minute' from " . $cmp_sql . ") *sc# extract('minute' from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(minute from " . $cmp_sql . ") *sc# extract(minute from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'MI') *sc# TO_CHAR(SC." . $cmp_sql . ",'MI')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(minute, " . $cmp_sql . ") *sc# DATEPART(minute, SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "minute(" . $cmp_sql . ") *sc# minute(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "to_char(extend(" . $cmp_sql . ", hour to second), '%M') *sc# to_char(extend(SC." . $cmp_sql . ", hour to second), '%M')";
           }
           else {
               return "minute(" . $cmp_sql . ") *sc# minute(SC." . $cmp_sql . ")";
           }
       }
       if ($format == 'SS') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%S'," . $cmp_sql . ") *sc# strftime('%S',SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "second(" . $cmp_sql . ") *sc# second(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('second' from " . $cmp_sql . ") *sc# extract('second' from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(second from " . $cmp_sql . ") *sc# extract(second from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'SS') *sc# TO_CHAR(SC." . $cmp_sql . ",'SS')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(second, " . $cmp_sql . ") *sc# DATEPART(second, SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "second(" . $cmp_sql . ") *sc# second(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "to_char(extend(" . $cmp_sql . ", hour to second), '%S') *sc# to_char(extend(SC." . $cmp_sql . ", hour to second), '%S')";
           }
           else {
               return "second(" . $cmp_sql . ") *sc# second(SC." . $cmp_sql . ")";
           }
       }
       if ($format == 'DD') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%d'," . $cmp_sql . ") *sc# strftime('%d',SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "day(" . $cmp_sql . ") *sc# day(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('day' from " . $cmp_sql . ") *sc# extract('day' from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(day from " . $cmp_sql . ") *sc# extract(day from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'DD') *sc# TO_CHAR(SC." . $cmp_sql . ",'DD')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(day, " . $cmp_sql . ") *sc# DATEPART(day, SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "day(" . $cmp_sql . ") *sc# day(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "DAYOFMONTH(" . $cmp_sql . ") *sc# DAYOFMONTH(SC." . $cmp_sql . ")";
           }
           else {
               return "day(" . $cmp_sql . ") *sc# day(SC." . $cmp_sql . ")";
           }
       }
       if ($format == 'MM') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%m'," . $cmp_sql . ") *sc# strftime('%m',SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "month(" . $cmp_sql . ") *sc# month(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('month' from " . $cmp_sql . ") *sc# extract('month' from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(month from " . $cmp_sql . ") *sc# extract(month from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'MM') *sc# TO_CHAR(SC." . $cmp_sql . ",'MM')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(month, " . $cmp_sql . ") *sc# DATEPART(month, SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "month(" . $cmp_sql . ") *sc# month(SC." . $cmp_sql . ")";
           }
           else {
               return "month(" . $cmp_sql . ") *sc# month(SC." . $cmp_sql . ")";
           }
       }
       if ($format == 'YYYY') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%Y'," . $cmp_sql . ") *sc# strftime('%Y',SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "year( " . $cmp_sql . ") *sc# year(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('year' from " . $cmp_sql . ") *sc# extract('year' from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(year from " . $cmp_sql . ") *sc# extract(year from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'YYYY') *sc# TO_CHAR(SC." . $cmp_sql . ",'YYYY')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(year, " . $cmp_sql . ") *sc# DATEPART(year, SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access)) {
               return "year(" . $cmp_sql . ") *sc# year(SC." . $cmp_sql . ")";
           }
           else {
               return "year( " . $cmp_sql . ") *sc# year(SC." . $cmp_sql . ")";
           }
       }
       if ($format == 'WEEK') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "DatePart('ww'," . $cmp_sql . ") *sc# DatePart('ww',SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%W'," . $cmp_sql . ")  *sc# strftime('%W',SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "WEEK(" . $cmp_sql . ") *sc# WEEK(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('week' from " . $cmp_sql . ") *sc# extract('week' from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(week from " . $cmp_sql . ") *sc# extract(week from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'WW') *sc# TO_CHAR(SC." . $cmp_sql . ",'WW')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(wk, " . $cmp_sql . ") *sc# DATEPART(wk, SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase)) {
               return "CONVERT(VARCHAR(2), DATEPART(wk, " . $cmp_sql . ")) *sc# CONVERT(VARCHAR(2), DATEPART(wk, SC." . $cmp_sql . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(1 + (((CAST(" . $cmp_sql . " AS DATE) - MDY(1, 1, YEAR(" . $cmp_sql . "))) +  WEEKDAY(MDY(1, 1, YEAR(" . $cmp_sql . ")))) / 7) as INT) *sc# CAST(1 + (((CAST(" . $cmp_sql . " AS DATE) - MDY(1, 1, YEAR(" . $cmp_sql . "))) +  WEEKDAY(MDY(1, 1, YEAR(" . $cmp_sql . ")))) / 7) as INT)";
           }
           else {
               return "week(" . $cmp_sql . ") *sc# week(SC." . $cmp_sql . ")";
           }
       }
       if ($format == 'DAYNAME') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "Weekday(" . $cmp_sql . ") *sc# Weekday(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "strftime('%w'," . $cmp_sql . ") *sc# strftime('%w',SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "WEEKDAY(" . $cmp_sql . ") *sc# WEEKDAY(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "extract('dow' from " . $cmp_sql . ") *sc# extract('dow' from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "extract(weekday from " . $cmp_sql . ") *sc# extract(weekday from SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR(" . $cmp_sql . ",'D') *sc# TO_CHAR(SC." . $cmp_sql . ",'D')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DATEPART(dw, " . $cmp_sql . ") *sc# DATEPART(dw, SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase)) {
               return "CONVERT(CHAR(1), DATEPART(dw, " . $cmp_sql . ")) *sc# CONVERT(CHAR(1), DATEPART(dw, SC." . $cmp_sql . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2)) {
               return "DAYOFWEEK(" . $cmp_sql . ") *sc# DAYOFWEEK(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "DAYOFWEEK(" . $cmp_sql . ") *sc# DAYOFWEEK(SC." . $cmp_sql . ")";
           }
           else {
               return "WEEKDAY(" . $cmp_sql . ") *sc# WEEKDAY(SC." . $cmp_sql . ")";
           }
       }
       if ($format == 'SEMIANNUAL') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $cmp_sql . ") - 1) / 6 + 1)) *sc# CInt(Val((MONTH(SC." . $cmp_sql . ") - 1) / 6 + 1)))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $cmp_sql . ") -1 ) / 6 + 1) AS INTEGER) *sc# CAST(((strftime('%m', SC." . $cmp_sql . ") -1 ) / 6 + 1) AS INTEGER)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 6 + 1) AS NCHAR (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 6 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "CAST(((EXTRACT ('MONTH' FROM " . $cmp_sql . ") - 1) / 6 + 1) AS VARCHAR (1)) *sc# CAST(((EXTRACT ('MONTH' FROM SC." . $cmp_sql . ") - 1) / 6 + 1) AS VARCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $cmp_sql . ") - 1) / 6 + 1) *sc# ((EXTRACT(MONTH FROM SC." . $cmp_sql . ") - 1) / 6 + 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "SUBSTR(((TO_CHAR (" . $cmp_sql . ", 'MM') - 1) / 6 + 1), 1, 1) *sc# SUBSTR(((TO_CHAR (SC." . $cmp_sql . ", 'MM') - 1) / 6 + 1), 1, 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "CAST(((DatePART (MONTH, " . $cmp_sql . ") - 1) / 6 + 1) AS NCHAR (1)) *sc# CAST(((DatePART (MONTH, SC." . $cmp_sql . ") - 1) / 6 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(CAST(((MONTH(" . $cmp_sql . ") - 1) / 6 + 1) AS float) as integer) *sc# CAST(CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 6 + 1) AS float) as integer)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 6 + 1) AS INT (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 6 + 1) AS INT (1))";
           }
           else {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 6 + 1) AS NCHAR (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 6 + 1) AS NCHAR (1))";
           }
       }
       if ($format == 'FOURMONTHS') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $cmp_sql . ") - 1) / 4 + 1)) *sc# CInt(Val((MONTH(SC." . $cmp_sql . ") - 1) / 4 + 1)))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $cmp_sql . ") -1 ) / 4 + 1) AS INTEGER) *sc# CAST(((strftime('%m', SC." . $cmp_sql . ") -1 ) / 4 + 1) AS INTEGER)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 4 + 1) AS NCHAR (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 4 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "CAST(((EXTRACT ('MONTH' FROM " . $cmp_sql . ") - 1) / 4 + 1) AS VARCHAR (1)) *sc# CAST(((EXTRACT ('MONTH' FROM SC." . $cmp_sql . ") - 1) / 4 + 1) AS VARCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $cmp_sql . ") - 1) / 4 + 1) *sc# ((EXTRACT(MONTH FROM SC." . $cmp_sql . ") - 1) / 4 + 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "SUBSTR(((TO_CHAR (" . $cmp_sql . ", 'MM') - 1) / 4 + 1), 1, 1) *sc# SUBSTR(((TO_CHAR (SC." . $cmp_sql . ", 'MM') - 1) / 4 + 1), 1, 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "CAST(((DatePART (MONTH, " . $cmp_sql . ") - 1) / 4 + 1) AS NCHAR (1)) *sc# CAST(((DatePART (MONTH, SC." . $cmp_sql . ") - 1) / 4 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(CAST(((MONTH(" . $cmp_sql . ") - 1) / 4 + 1) AS float) as integer) *sc# CAST(CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 4 + 1) AS float) as integer)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 4 + 1) AS INT (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 4 + 1) AS INT (1))";
           }
           else {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 4 + 1) AS NCHAR (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 4 + 1) AS NCHAR (1))";
           }
       }
       if ($format == 'QUARTER') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $cmp_sql . ") - 1) / 3 + 1)) *sc# CInt(Val((MONTH(SC." . $cmp_sql . ") - 1) / 3 + 1)))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $cmp_sql . ") -1 ) / 3 + 1) AS INTEGER) *sc# CAST(((strftime('%m', SC." . $cmp_sql . ") -1 ) / 3 + 1) AS INTEGER)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "QUARTER(" . $cmp_sql . ") *sc# QUARTER(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "EXTRACT ('QUARTER' FROM " . $cmp_sql . ") *sc# EXTRACT ('QUARTER' FROM SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $cmp_sql . ") - 1) / 3 + 1) *sc# ((EXTRACT(MONTH FROM SC." . $cmp_sql . ") - 1) / 3 + 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR (" . $cmp_sql . ", 'Q') *sc# TO_CHAR (SC." . $cmp_sql . ", 'Q')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DatePART (QUARTER, " . $cmp_sql . ") *sc# DatePART (QUARTER, SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "QUARTER(" . $cmp_sql . ") *sc# QUARTER(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2)) {
               return "QUARTER(" . $cmp_sql . ") *sc# QUARTER(SC." . $cmp_sql . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "QUARTER(" . $cmp_sql . ") *sc# QUARTER(SC." . $cmp_sql . ")";
           }
           else {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 3 + 1) AS NCHAR (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 3 + 1) AS NCHAR (1))";
           }
       }
       if ($format == 'BIMONTHLY') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $cmp_sql . ") - 1) / 2 + 1)) *sc# CInt(Val((MONTH(SC." . $cmp_sql . ") - 1) / 2 + 1)))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $cmp_sql . ") -1 ) / 2 + 1) AS INTEGER) *sc# CAST(((strftime('%m', SC." . $cmp_sql . ") -1 ) / 2 + 1) AS INTEGER)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 2 + 1) AS NCHAR (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 2 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "CAST(((EXTRACT ('MONTH' FROM " . $cmp_sql . ") - 1) / 2 + 1) AS VARCHAR (1)) *sc# CAST(((EXTRACT ('MONTH' FROM SC." . $cmp_sql . ") - 1) / 2 + 1) AS VARCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $cmp_sql . ") - 1) / 2 + 1) *sc# ((EXTRACT(MONTH FROM SC." . $cmp_sql . ") - 1) / 2 + 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "SUBSTR(((TO_CHAR (" . $cmp_sql . ", 'MM') - 1) / 2 + 1), 1, 1) *sc# SUBSTR(((TO_CHAR (SC." . $cmp_sql . ", 'MM') - 1) / 2 + 1), 1, 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "CAST(((DatePART (MONTH, " . $cmp_sql . ") - 1) / 2 + 1) AS NCHAR (1)) *sc# CAST(((DatePART (MONTH, SC." . $cmp_sql . ") - 1) / 2 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(CAST(((MONTH(" . $cmp_sql . ") - 1) / 2 + 1) AS float) as integer) *sc# CAST(CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 2 + 1) AS float) as integer)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 2 + 1) AS INT (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 2 + 1) AS INT (1))";
           }
           else {
               return "CAST(((MONTH(" . $cmp_sql . ") - 1) / 2 + 1) AS NCHAR (1)) *sc# CAST(((MONTH(SC." . $cmp_sql . ") - 1) / 2 + 1) AS NCHAR (1))";
           }
       }
   }
   function Get_sql_date_groupby($sql_def, $format)
   {
       if (empty($format))
       {
           return $sql_def;
       }
       if ($format != 'YYYYMMDDHHIISS')
       {
           return "";
       }
       $sql = $sql_def;
       if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
       {
           $sql = "convert(char(23)," . $sql_def . ",121)";
       }
       if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
       {
           $sql = "TO_DATE(TO_CHAR(" . $sql_def . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
       }
       if ($format != 'YYYYMMDDHHIISS' && in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
       {
           $sql = "to_char(" . $sql_def . ", 'YYYY-MM-DD HH24:MI:SS')";
       }
       if ($format != 'YYYYMMDDHHIISS' && in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix))
       {
           $sql = "EXTEND(" . $sql_def . ", YEAR TO SECOND)";
       }
       if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
       {
           $sql = $sql_def;
       }
       return $sql;
   }
   function Get_arg_groupby($val, $format)
   {
       if ($format == 'YYYYMMDDHHIISS' && (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)))
       {
           return substr($val, 0, 19) ; 
       }
       elseif ($format == 'YYYYMMDDHHII')
       {
           return substr($val, 0, 16) ; 
       }
       elseif ($format == 'YYYYMMDDHH')
       {
           return substr($val, 0, 13) ; 
       }
       elseif ($format == 'YYYYMMDD2')
       {
           return substr($val, 0, 10) ; 
       }
       elseif ($format == 'YYYYMM')
       {
           return substr($val, 0, 7) ; 
       }
       elseif ($format == 'YYYYHH')
       {
           returnsubstr($val, 0, 4) . substr($val, 11, 2); 
       }
       elseif ($format == 'YYYYSEMIANNUAL')
       {
           return substr($val, 0, 4) . $this->nm_data->GetSem(substr($val, 5, 2)); 
       }
       elseif ($format == 'YYYYFOURMONTHS')
       {
           return substr($val, 0, 4) . $this->nm_data->GetQuadr(substr($val, 5, 2)); 
       }
       elseif ($format == 'YYYYQUARTER')
       {
           return substr($val, 0, 4) . $this->nm_data->GetTrim(substr($val, 5, 2)); 
       }
       elseif ($format == 'YYYYBIMONTHLY')
       {
           return substr($val, 0, 4) . $this->nm_data->GetBim(substr($val, 5, 2)); 
       }
       elseif ($format == 'YYYYWEEK')
       {
           return substr($val, 0, 4) . $this->Get_Sql_Week($val); 
       }
       elseif ($format == 'YYYYDAYNAME')
       {
           return substr($val, 0, 4) . $this->Compat_WeekDay($val); 
       }
       elseif ($format == 'YYYY')
       {
           return substr($val, 0, 4) ; 
       }
       elseif ($format == 'SEMIANNUAL')
       {
           return $this->nm_data->GetSem(substr($val, 5, 2)); 
       }
       elseif ($format == 'FOURMONTHS')
       {
           return $this->nm_data->GetQuadr(substr($val, 5, 2)); 
       }
       elseif ($format == 'QUARTER')
       {
           return $this->nm_data->GetTrim(substr($val, 5, 2)); 
       }
       elseif ($format == 'BIMONTHLY')
       {
           return $this->nm_data->GetBim(substr($val, 5, 2)); 
       }
       elseif ($format == 'WEEK')
       {
           return $this->Get_Sql_Week($val); 
       }
       elseif ($format == 'DAYNAME')
       {
           return $this->Compat_WeekDay($val); 
       }
       elseif ($format == 'MM')
       {
           return substr($val, 5, 2); 
       }
       elseif ($format == 'DD')
       {
           return substr($val, 8, 2); 
       }
       elseif ($format == 'HH')
       {
           return substr($val, 11, 2); 
       }
       elseif ($format == 'HHIISS')
       {
           return substr($val, 11, 8); 
       }
       elseif ($format == 'HHII')
       {
           return substr($val, 11, 5); 
       }
       else
       {
           return $val; 
       }
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
       $orderby_ok = "";
       if ($format == 'YYYYMMDDHHIISS' || $format == 'YYYYMMDDHHII' || $format == 'YYYYMMDDHH')
       {
           $orderby_ok .= $sql_def . $order;
       }
       elseif ($format == 'YYYYMMDD2')
       {
           $orderby_ok .= $this->Return_date_order_groupby('YYYY', $sql_def) . $order. "#@#";
           $orderby_ok .= $this->Return_date_order_groupby('MM', $sql_def) . $order. "#@#";
           $orderby_ok .= $this->Return_date_order_groupby('DD', $sql_def) . $order;
       }
       elseif ($format == 'YYYY' || $format == 'MM' || $format == 'DD' || $format == 'HH')
       {
           $orderby_ok .= $this->Return_date_order_groupby($format, $sql_def) . $order;
       }
       elseif (substr($format, 0, 4) == 'YYYY')
       {
           $orderby_ok .= $this->Return_date_order_groupby('YYYY', $sql_def) . $order . "#@#";
           $orderby_ok .= $this->Return_date_order_groupby(substr($format, 4), $sql_def) . $order;
       }
       elseif ($format == 'SEMIANNUAL' || $format == 'FOURMONTHS' || $format == 'QUARTER' || $format == 'BIMONTHLY' || $format == 'WEEK' || $format == 'DAYNAME')
       {
           $orderby_ok .= $this->Return_date_order_groupby($format, $sql_def) . $order;
       }
       elseif ($format == 'HHIISS')
       {
           $orderby_ok .= $this->Return_date_order_groupby('HH', $sql_def) . $order. "#@#";
           $orderby_ok .= $this->Return_date_order_groupby('II', $sql_def) . $order. "#@#";
           $orderby_ok .= $this->Return_date_order_groupby('SS', $sql_def) . $order;
       }
       elseif ($format == 'HHII')
       {
           $orderby_ok .= $this->Return_date_order_groupby('HH', $sql_def) . $order. "#@#";
           $orderby_ok .= $this->Return_date_order_groupby('II', $sql_def) . $order;
       }
       else
       {
           $orderby_ok .= $sql_def . $order;
       }
       $tst_order = explode("#@#", $orderby_ok);
       foreach ($tst_order as $cada_tst)
       {
           $pos = strpos(" " . $order_old, $cada_tst);
           if ($pos === false)
           {
               $order_old .= (!empty($order_old)) ? ", " : "";
               $order_old .= $cada_tst;
           }
       }
       return $order_old;
   }
   function Return_date_order_groupby($format, $sql_def)
   {
       if ($format == 'YYYY')
       {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "YEAR(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               return "YEAR(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
           {
               return "YEAR(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
           {
               return "To_Char(" . $sql_def . ",'YYYY')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite))
           {
               return "strftime('%Y'," . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
           {
               return "(EXTRACT(YEAR FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
           {
               return "(extract(year from " . $sql_def . "))";
           }
           else
           {
               return "YEAR(" . $sql_def . ")";
           }
       }
       if ($format == 'MM')
       {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "MONTH(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               return "MONTH(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
           {
               return "MONTH(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
           {
               return "To_Char(" . $sql_def . ",'MM')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite))
           {
               return "strftime('%m'," . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
           {
               return "(EXTRACT(MONTH FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
           {
               return "(extract(month from  " . $sql_def . "))";
           }
           else
           {
               return "MONTH(" . $sql_def . ")";
           }
       }
       if ($format == 'DD')
       {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "DAY(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               return "DAY(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
           {
               return "DAY(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
           {
               return "To_Char(" . $sql_def . ",'DD')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite))
           {
               return "strftime('%d'," . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
           {
               return "(EXTRACT(DAY FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
           {
               return "(extract(day from " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
           {
               return "DAYOFMONTH(" . $sql_def . ")";
           }
           else
           {
               return "DAY(" . $sql_def . ")";
           }
       }
       if ($format == 'HH')
       {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "hour(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               return "hour(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
           {
               return "DATEPART(hour, " . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
           {
               return "To_Char(" . $sql_def . ",'HH24')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite))
           {
               return "strftime('%H'," . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
           {
               return "(EXTRACT(hour FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
           {
               return "(extract(hour FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "to_char(extend(" . $sql_def . ", hour to second), '%H')";
           }
           else
           {
               return "hour(" . $sql_def . ")";
           }
       }
       if ($format == 'II')
       {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "minute(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               return "minute(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
           {
               return "DATEPART(minute, " . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
           {
               return "To_Char(" . $sql_def . ",'MI')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite))
           {
               return "strftime('%M'," . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
           {
               return "(EXTRACT(minute FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
           {
               return "(extract(minute FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "to_char(extend(" . $sql_def . ", hour to second), '%M')";
           }
           else
           {
               return "minute(" . $sql_def . ")";
           }
       }
       if ($format == 'SS')
       {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "second(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               return "second(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
           {
               return "DATEPART(second, " . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
           {
               return "To_Char(" . $sql_def . ",'SS')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite))
           {
               return "strftime('%S'," . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
           {
               return "(EXTRACT(second FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
           {
               return "(extract(second FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "to_char(extend(" . $sql_def . ", hour to second), '%S')";
           }
           else
           {
               return "second(" . $sql_def . ")";
           }
       }
       if ($format == 'WEEK')
       {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "DatePart('ww'," . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               return "WEEK(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
           {
               return "DATEPART(wk, " . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
           {
               return "CONVERT(VARCHAR(2), DATEPART(wk, " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
           {
               return "To_Char(" . $sql_def . ",'WW')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite))
           {
               return "strftime('%W'," . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
           {
               return "(EXTRACT(week FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
           {
               return "(extract(week FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix))
           {
               return "CAST(1 + (((CAST(" . $sql_def . " AS DATE) - MDY(1, 1, YEAR(" . $sql_def . "))) +  WEEKDAY(MDY(1, 1, YEAR(" . $sql_def . ")))) / 7) as INT)";
           }
           else
           {
               return "week(" . $sql_def . ")";
           }
       }
       if ($format == 'DAYNAME')
       {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "Weekday(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               return "WEEKDAY(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
           {
               return "DATEPART(dw, " . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
           {
               return "CONVERT(CHAR(1), DATEPART(dw, " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
           {
               return "To_Char(" . $sql_def . ",'D')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite))
           {
               return "strftime('%w'," . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
           {
               return "(EXTRACT(dow FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
           {
               return "(extract(weekday FROM " . $sql_def . "))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2)) {
               return "DAYOFWEEK(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "DAYOFWEEK(" . $sql_def . ")";
           }
           else
           {
               return "weekday(" . $sql_def . ")";
           }
       }
       if ($format == 'SEMIANNUAL') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $sql_def . ") - 1) / 6 + 1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $sql_def . ") -1 ) / 6 + 1) AS INTEGER)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 6 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "CAST(((EXTRACT ('MONTH' FROM " . $sql_def . ") - 1) / 6 + 1) AS VARCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $sql_def . ") - 1) / 6 + 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "SUBSTR(((TO_CHAR (" . $sql_def . ", 'MM') - 1) / 6 + 1), 1, 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "CAST(((DatePART (MONTH, " . $sql_def . ") - 1) / 6 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(CAST(((MONTH(" . $sql_def . ") - 1) / 6 + 1) AS float) as integer)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 6 + 1) AS INT (1))";
           }
           else {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 6 + 1) AS NCHAR (1))";
           }
       }
       if ($format == 'FOURMONTHS') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $sql_def . ") - 1) / 4 + 1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $sql_def . ") -1 ) / 4 + 1) AS INTEGER)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 4 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "CAST(((EXTRACT ('MONTH' FROM " . $sql_def . ") - 1) / 4 + 1) AS VARCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $sql_def . ") - 1) / 4 + 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "SUBSTR(((TO_CHAR (" . $sql_def . ", 'MM') - 1) / 4 + 1), 1, 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "CAST(((DatePART (MONTH, " . $sql_def . ") - 1) / 4 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(CAST(((MONTH(" . $sql_def . ") - 1) / 4 + 1) AS float) as integer)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 4 + 1) AS INT (1))";
           }
           else {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 4 + 1) AS NCHAR (1))";
           }
       }
       if ($format == 'QUARTER') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $sql_def . ") - 1) / 3 + 1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $sql_def . ") -1 ) / 3 + 1) AS INTEGER)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "QUARTER(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "EXTRACT ('QUARTER' FROM " . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $sql_def . ") - 1) / 3 + 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "TO_CHAR (" . $sql_def . ", 'Q')";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "DatePART (QUARTER, " . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "QUARTER(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2)) {
               return "QUARTER(" . $sql_def . ")";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "QUARTER(" . $sql_def . ")";
           }
           else {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 3 + 1) AS NCHAR (1))";
           }
       }
       if ($format == 'BIMONTHLY') {
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
           {
               return "CInt(Val((MONTH(" . $sql_def . ") - 1) / 2 + 1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite)) {
               return "CAST(((strftime('%m', " . $sql_def . ") -1 ) / 2 + 1) AS INTEGER)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql)) {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 2 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres)) {
               return "CAST(((EXTRACT ('MONTH' FROM " . $sql_def . ") - 1) / 2 + 1) AS VARCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase)) {
               return "((EXTRACT(MONTH FROM " . $sql_def . ") - 1) / 2 + 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle)) {
               return "SUBSTR(((TO_CHAR (" . $sql_def . ", 'MM') - 1) / 2 + 1), 1, 1)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql)) {
               return "CAST(((DatePART (MONTH, " . $sql_def . ") - 1) / 2 + 1) AS NCHAR (1))";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix)) {
               return "CAST(CAST(((MONTH(" . $sql_def . ") - 1) / 2 + 1) AS float) as integer)";
           }
           elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress)) {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 2 + 1) AS INT (1))";
           }
           else {
               return "CAST(((MONTH(" . $sql_def . ") - 1) / 2 + 1) AS NCHAR (1))";
           }
       }
       return $order;
   }
   function Get_Sql_Week($val)
   {
       static $DT_in  = "";
       static $DT_out = "";
       if (empty($val))
       {
           return 0;
       }
       $sql_def = substr($val, 0, 10);
       if ($sql_def == $DT_in)
       {
           return $DT_out;
       }
       $DT_in  = $sql_def;
       $DT_out = 0;
       $sql_def = "'" . $sql_def . "'";
       if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
       {
           $cmd = "select DatePart('ww'," . $sql_def . ")";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
       {
           $cmd = "select WEEK(" . $sql_def . ")";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
       {
           $cmd = "select DATEPART(wk, " . $sql_def . ")";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
       {
           $cmd = "select CONVERT(VARCHAR(2), DATEPART(wk, " . $sql_def . "))";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
       {
           $cmd = "select To_Char(TO_DATE(" . $sql_def . ",'YYYY-MM-DD'),'WW') from dual";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sqlite))
       {
           $cmd = "select strftime('%W'," . $sql_def . ")";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
       {
           $cmd = "select EXTRACT(week FROM date " . $sql_def . ")";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
       {
           $cmd = "select extract(week FROM cast(" . $sql_def . " as date)) from RDB\$DATABASE";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2))
       {
           $cmd = "select week(" . $sql_def . ") FROM SYSIBM.SYSDUMMY1";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_informix))
       {
           $cmd = "select CAST(1 + (((CAST(to_date(" . $sql_def . ",'%Y-%m-%d') AS DATE) - MDY(1, 1, YEAR(to_date(" . $sql_def . ",'%Y-%m-%d')))) +  WEEKDAY(MDY(1, 1, YEAR(to_date(" . $sql_def . ",'%Y-%m-%d'))))) / 7) as INT) from SYSTABLES";
       }
       elseif (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
       {
           $cmd = "select week(" . $sql_def . ") FROM SYSPROGRESS.SYSCALCTABLE";
       }
       else
       {
           $cmd = "select week(" . $sql_def . ")";
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $cmd;
       $rweek = $this->Db->Execute($cmd);
       if (isset($rweek->fields[0]))
       { 
           $DT_out = $rweek->fields[0];
       } 
       $rweek->Close(); 
       return $DT_out;
   }
   function Compat_WeekDay($val)
   {
       $num = $this->nm_data->GetWeekDay($val);
       if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
       {
           $num++;
       }
       if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
       {
           $num = ($num == 0) ? 6 : $num - 1;
       }
       return $num;
   }
}
//===============================================================================
//
class grid_facturaven_pos_rapida_sub_css
{
   function __construct()
   {
      global $script_case_init;
      if (!$this->Ini) 
      { 
          $this->Ini = new grid_facturaven_pos_rapida_ini(); 
          $this->Ini->init("Path_sub");
      } 
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_detalle']['SC_herda_css'] = "S"; 
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_detalle']['embutida'] = true;
      include_once ($this->Ini->link_grid_facturaven_pos_detalle_cons_emb);
      $this->grid_facturaven_pos_detalle = new grid_facturaven_pos_detalle_sub_css ;
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_detalle']['embutida'] = false;
      $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_BlueBerry/Sc9_BlueBerry";
      if ($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['SC_herda_css'] == "N")
      {
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css']['grid_facturaven_pos_rapida']    = $str_schema_all . "_grid.css";
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css_bw']['grid_facturaven_pos_rapida'] = $str_schema_all . "_grid_bw.css";
      }
   }
}
//
class grid_facturaven_pos_rapida_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
   var $NM_ajax_flag  = false;
   var $NM_ajax_opcao = '';
   var $grid;
   var $Res;
   var $Graf;
   var $pesq;
   var $pdf;
   var $xls;
   var $xml;
   var $json;
   var $csv;
   var $rtf;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
      $this->$modulo->arr_buttons = $this->arr_buttons;
   }
//
//----- 
   function controle($linhas = 0)
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $nmgp_parms_pdf, $nmgp_graf_pdf, $nm_apl_dependente, $nmgp_navegator_print, $nmgp_tipo_print, $nmgp_cor_print, $nmgp_cor_word, $Det_use_pass_pdf, $Det_pdf_zip, $NMSC_conf_apl, $NM_contr_var_session, $NM_run_iframe, $SC_module_export, $nmgp_password,
             $glo_senha_protect, $nmgp_opcao, $nm_call_php, $rec, $nmgp_quant_linhas, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_ordem, $nmgp_parms_where;

      $Parms_form_pdf = false;
      if (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_facturaven_pos_rapida']))
      { 
          $GLOBALS['nmgp_parms'] = $_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_facturaven_pos_rapida'];
          $Parms_form_pdf = true;
      } 
      if ($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'] || $Parms_form_pdf)
      { 
          if (!empty($GLOBALS['nmgp_parms'])) 
          { 
              $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
              $todo  = explode("?@?", $todox);
              foreach ($todo as $param)
              {
                   $cadapar = explode("?#?", $param);
                   if (1 < sizeof($cadapar))
                   {
                       if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                       {
                           $cadapar[0] = substr($cadapar[0], 11);
                           $cadapar[1] = $_SESSION[$cadapar[1]];
                       }
                       if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                       }
                       elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                       }
                       nm_limpa_str_grid_facturaven_pos_rapida($cadapar[1]);
                       nm_protect_num_grid_facturaven_pos_rapida($cadapar[0], $cadapar[1]);
                       if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                       $Tmp_par   = $cadapar[0];
                       $$Tmp_par = $cadapar[1];
                       if ($Tmp_par == "nmgp_opcao")
                       {
                           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'] = $cadapar[1];
                       }
                   }
              }
          } 
          if (isset($gcontador_grid_fe)) 
          {
              $_SESSION['gcontador_grid_fe'] = $gcontador_grid_fe;
              nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gcontador_grid_fe"]);
          }
          if (isset($gintegrartns)) 
          {
              $_SESSION['gintegrartns'] = $gintegrartns;
              nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gintegrartns"]);
          }
          if (isset($gidtercero)) 
          {
              $_SESSION['gidtercero'] = $gidtercero;
              nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gidtercero"]);
          }
      } 
      if ($Parms_form_pdf)
      { 
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_pdf'] = true;
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form'] = true;
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_full'] = false;
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_pai'] = "";
      } 
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      if (!$this->Ini || isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_ibase'])) 
      { 
          $this->Ini = new grid_facturaven_pos_rapida_ini(); 
          $this->Ini->init();
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_ibase'] = true;
      }
      $this->Ini->Proc_print      = false;
      $this->Ini->Export_det_zip  = false;
      $this->Ini->Export_html_zip = false;
      $this->Ini->Export_img_zip  = false;
      $this->Ini->Img_export_zip  = array();
      $this->Ini->Init_apl_lig = array();
      $this->List_apl_lig = array('pdfreport_facturaven'=>array('type'=>'reportpdf', 'lab'=>'Factura de Venta', 'hint'=>'Factura de Venta', 'img_on'=>'scriptcase__NM__ico__NM__document_32.png', 'img_off'=>'scriptcase__NM__ico__NM__document_32.png'));
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['emb_lig_aba'] = array();
      $this->Change_Menu = false;
       if ($nmgp_opcao == "link_res")  
       { 
           $nmgp_opcao = "inicio";  
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "inicio";  
           $Temp_parms = "";  
           $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms_where);
           $todox = stripslashes($todox);
           $todo  = explode("?@?", $todox);
           foreach ($todo as $param)
           {
                $cadapar  = explode("?#?", $param);
                if ($cadapar[0] == "inicio")  
                { 
                    $cadapar[0] = str_replace("inicio", "creado", $cadapar[0]);
                } 
                if ($cadapar[0] == "fin")  
                { 
                    $cadapar[0] = str_replace("fin", "creado", $cadapar[0]);
                } 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] == "fecha")
                { 
                    $Temp_parms .= (empty($Temp_parms)) ? "" : " and ";
                    if ($cadapar[0] == "fechaven")
                    {
                        $cadapar[1]  = str_replace("@aspass@", "", $cadapar[1]);
                        $Format_tst  = $this->Ini->Get_Gb_date_format('fecha', 'fechaven');
                        $Temp_arg    = $this->Ini->Get_date_arg_sum($cadapar[1], $Format_tst, $cadapar[0], true);
                        $Temp_sql    = ($Temp_arg == " is null") ? $cadapar[0] : $this->Ini->Get_sql_date_groupby($cadapar[0], $Format_tst);
                        $Temp_parms .= $Temp_sql;
                        $Temp_parms .= $Temp_arg;
                    }
                    else
                    {
                        $Tmp_pos = strpos($cadapar[1], "@aspass@");
                        $cadapar[1] = str_replace("@aspass@", "", $cadapar[1]);
                        if ($Tmp_pos !== false)
                        {
                            $cadapar[1] = $this->Ini->Db->qstr($cadapar[1]);
                        }
                        if ($cadapar[1] == "__SCNULL__" || $cadapar[1] == "'__SCNULL__'")
                        {
                            $Temp_parms .= $cadapar[0] . " is null" ;
                        }
                        else
                        {
                            $Temp_parms .= $cadapar[0] . " = " . $cadapar[1];
                        }
                    }
                } 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] == "sc_free_group_by")
                { 
                    $Temp_parms .= (empty($Temp_parms)) ? "" : " and ";
                    if ($cadapar[0] == "fechaven")
                    {
                        $cadapar[1]  = str_replace("@aspass@", "", $cadapar[1]);
                        $Format_tst  = $this->Ini->Get_Gb_date_format('sc_free_group_by', 'fechaven');
                        $Temp_arg    = $this->Ini->Get_date_arg_sum($cadapar[1], $Format_tst, $cadapar[0], true);
                        $Temp_sql    = ($Temp_arg == " is null") ? $cadapar[0] : $this->Ini->Get_sql_date_groupby($cadapar[0], $Format_tst);
                        $Temp_parms .= $Temp_sql;
                        $Temp_parms .= $Temp_arg;
                    }
                    elseif ($cadapar[0] == "fechavenc")
                    {
                        $cadapar[1]  = str_replace("@aspass@", "", $cadapar[1]);
                        $Format_tst  = $this->Ini->Get_Gb_date_format('sc_free_group_by', 'fechavenc');
                        $Temp_arg    = $this->Ini->Get_date_arg_sum($cadapar[1], $Format_tst, $cadapar[0], true);
                        $Temp_sql    = ($Temp_arg == " is null") ? $cadapar[0] : $this->Ini->Get_sql_date_groupby($cadapar[0], $Format_tst);
                        $Temp_parms .= $Temp_sql;
                        $Temp_parms .= $Temp_arg;
                    }
                    elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_Free_orig'][$cadapar[0]]))
                    {
                        list ($Sql_orig, $Sql_order) = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_Free_sql'][$cadapar[0]];
                        $cadapar[1]  = str_replace("@aspass@", "", $cadapar[1]);
                        $Format_tst  = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cadapar[0]);
                        $Temp_arg    = $this->Ini->Get_date_arg_sum($cadapar[1], $Format_tst, $Sql_orig, true);
                        $Temp_sql    = ($Temp_arg == " is null") ? $Sql_orig : $this->Ini->Get_sql_date_groupby($Sql_orig, $Format_tst);
                        $Temp_parms .= $Temp_sql;
                        $Temp_parms .= $Temp_arg;
                    }
                    else
                    {
                        $Tmp_pos = strpos($cadapar[1], "@aspass@");
                        $cadapar[1] = str_replace("@aspass@", "", $cadapar[1]);
                        if ($Tmp_pos !== false)
                        {
                            $cadapar[1] = $this->Ini->Db->qstr($cadapar[1]);
                        }
                        if ($cadapar[1] == "__SCNULL__" || $cadapar[1] == "'__SCNULL__'")
                        {
                            $Temp_parms .= $cadapar[0] . " is null" ;
                        }
                        else
                        {
                            $Temp_parms .= $cadapar[0] . " = " . $cadapar[1];
                        }
                    }
                } 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] == "formapago")
                { 
                    $Temp_parms .= (empty($Temp_parms)) ? "" : " and ";
                    $Tmp_pos = strpos($cadapar[1], "@aspass@");
                    $cadapar[1] = str_replace("@aspass@", "", $cadapar[1]);
                    if ($Tmp_pos !== false)
                    {
                        $cadapar[1] = $this->Ini->Db->qstr($cadapar[1]);
                    }
                    if ($cadapar[1] == "__SCNULL__" || $cadapar[1] == "'__SCNULL__'")
                    {
                        $Temp_parms .= $cadapar[0] . " is null" ;
                    }
                    else
                    {
                        $Temp_parms .= $cadapar[0] . " = " . $cadapar[1];
                    }
                } 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] == "porcliente")
                { 
                    $Temp_parms .= (empty($Temp_parms)) ? "" : " and ";
                    $Tmp_pos = strpos($cadapar[1], "@aspass@");
                    $cadapar[1] = str_replace("@aspass@", "", $cadapar[1]);
                    if ($Tmp_pos !== false)
                    {
                        $cadapar[1] = $this->Ini->Db->qstr($cadapar[1]);
                    }
                    if ($cadapar[1] == "__SCNULL__" || $cadapar[1] == "'__SCNULL__'")
                    {
                        $Temp_parms .= $cadapar[0] . " is null" ;
                    }
                    else
                    {
                        $Temp_parms .= $cadapar[0] . " = " . $cadapar[1];
                    }
                } 
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_resumo'] = $Temp_parms;
       } 
      if ($nmgp_opcao != "ajax_navigate" && $nmgp_opcao != "ajax_detalhe" && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_outra_jan'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_modal']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grid_facturaven_pos_rapida']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grid_facturaven_pos_rapida'];
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
          foreach ($this->List_apl_lig as $apl_name => $Lig_parms)
          {
              if (!isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name]))
              {
                  $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name] = rand(2, 10000);
              }
              $this->Ini->Init_apl_lig[$apl_name]['ini']     = "&script_case_init=" . $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name];
              $this->Ini->Init_apl_lig[$apl_name]['type']    = $Lig_parms['type'];
              $this->Ini->Init_apl_lig[$apl_name]['lab']     = $Lig_parms['lab'];
              $this->Ini->Init_apl_lig[$apl_name]['hint']    = $Lig_parms['hint'];
              $this->Ini->Init_apl_lig[$apl_name]['img_on']  = $Lig_parms['img_on'];
              $this->Ini->Init_apl_lig[$apl_name]['img_off'] = $Lig_parms['img_off'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['emb_lig_aba'] = $this->Ini->Init_apl_lig;
          }
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'] && $this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_facturaven_pos_rapida']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_facturaven_pos_rapida']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('grid_facturaven_pos_rapida') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_facturaven_pos_rapida']['label'] = "Ventas Pos al día:";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "grid_facturaven_pos_rapida")
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      {
          $this->Change_Menu = false;
      }
      $this->Db = $this->Ini->Db; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['nm_tpbanco'] = $this->Ini->nm_tpbanco;
      $this->nm_data = new nm_data("es");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      { 
          include_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_erro.class.php"); 
      } 
      else 
      { 
          include_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_erro.class.php"); 
      } 
      $this->Erro      = new grid_facturaven_pos_rapida_erro();
      $this->Erro->Ini = $this->Ini;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_lookup.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_lookup.class.php"); 
      } 
      $this->Lookup       = new grid_facturaven_pos_rapida_lookup();
      $this->Lookup->Db   = $this->Db;
      $this->Lookup->Ini  = $this->Ini;
      $this->Lookup->Erro = $this->Erro;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      {
          $this->Ini->sc_Include($this->Ini->path_libs . "/nm_trata_saida.php", "C", "nm_trata_saida") ; 
          $nm_saida = new nm_trata_saida();
          $ajax_opc_print = false;
          if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_export")
          {
              $this->Ini->sc_export_ajax = true;
              $this->Ini->Arr_result     = array();
              $nmgp_opcao                = $_POST['export_opc'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = $nmgp_opcao;
              if ($nmgp_opcao == "print" || $nmgp_opcao == "res_print" || $nmgp_opcao == "det_print")
              {
                  $ajax_opc_print   = true;
                  $nm_arquivo_print = "/sc_grid_facturaven_pos_rapida_" . session_id();
                  $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_print . ".html");
                  $this->Ini->sc_export_ajax_img = true;
              }
              ob_start();
          }
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      {
          $_SESSION['scriptcase']['saida_var'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['ajax_nav'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['scroll_navigate'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['scroll_navigate_reload'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['scroll_navigate_app'] = false;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['scroll_navigate_header_row']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['scroll_navigate_header_row'] = 1;
          }
          if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_navigate" || $_POST['nmgp_opcao'] == "ajax_detalhe"))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['ajax_nav'] = true;
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $this->Ini->Arr_result = array();
              $nmgp_opcao = $_POST['opc'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = $nmgp_opcao;
              if (isset($_POST['parm']) && $_POST['parm'] == "save_grid")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['save_grid'] = true;
              }
              if ($nmgp_opcao == "edit" && isset($_POST['parm']) && $_POST['parm'] == "fim")
              {
                  $rec = $_POST['parm'];
              }
              if ($nmgp_opcao == "rec" || $nmgp_opcao == "muda_rec_linhas")
              {
                  $rec = $_POST['parm'];
              }
              if ($nmgp_opcao == "muda_qt_linhas")
              {
                  $nmgp_quant_linhas  = strtolower($_POST['parm']);
              }
              if (($_POST['opc'] == "igual" || $_POST['opc'] == "resumo") && isset($_POST['parm']) && ($_POST['parm'] == "reload" || $_POST['parm'] == "breload"))
              {
                  $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['contr_total_geral'] = "NAO";
                  $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['contr_array_resumo'] = "NAO";
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['tot_geral']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['arr_total']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pivot_group_by']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pivot_x_axys']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pivot_y_axys']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pivot_fill']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pivot_order']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pivot_order_col']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pivot_order_level']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pivot_order_sort']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pivot_tabular']);
              }
              if ($nmgp_opcao == "fast_search")
              {
                  $_POST['parm'] = str_replace("__NM_PLUS__", "+", $_POST['parm']);
                  $_POST['parm'] = str_replace("__NM_AMP__", "&", $_POST['parm']);
                  $_POST['parm'] = str_replace("__NM_PRC__", "%", $_POST['parm']);
                  $temp = explode("_SCQS_", $_POST['parm']);
                  $nmgp_fast_search      = (isset($temp[0])) ? $temp[0] : "";
                  $nmgp_cond_fast_search = (isset($temp[1])) ? $temp[1] : "";
                  $nmgp_arg_fast_search  = (isset($temp[2])) ? $temp[2] : "";
              }
              if ($nmgp_opcao == "ordem")
              {
                  $nmgp_ordem = $_POST['parm'];
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format'] = array();
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format']['fecha']['fechaven'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format']['fecha']['fechaven'] = 'YYYYMMDD2';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_def_sql']['fecha']['fechaven'] = 'fechaven';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format']['sc_free_group_by']['fechaven'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format']['sc_free_group_by']['fechaven'] = 'YYYYMMDD2';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format']['sc_free_group_by']['fechavenc'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_date_format']['sc_free_group_by']['fechavenc'] = 'YYYYMMDD2';
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_All_Groupby'] = array('_NM_SC_' => 'grid', 'fecha' => 'all', 'sc_free_group_by' => 'all', 'formapago' => 'all', 'porcliente' => 'all');
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Groupby_hide'])) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Groupby_hide'] = array();
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'])) 
      { 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_All_Groupby'] as $Ind => $Tp)
          {
              if (!in_array($Ind, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Groupby_hide'])) 
              { 
                  break;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] = $Ind;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_Free_cmp'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_Free_cmp']  = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_Free_sql']  = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_Free_orig'] = array();
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['Labels_GB'] = array();
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] == "fecha")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['Labels_GB'][] = "Fecha";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          $Arr_free_labels = array();
          $Arr_free_labels['credito'] = "F.P.";
          $Arr_free_labels['fechaven'] = "Fecha";
          $Arr_free_labels['fechavenc'] = "Fechavenc";
          $Arr_free_labels['idcli'] = "Cliente";
          $Arr_free_labels['pagada'] = "Pagada";
          $Arr_free_labels['asentada'] = "Asentada";
          $Arr_free_labels['resolucion'] = "PJ";
          $Arr_free_labels['vendedor'] = "Vendedor";
          $Arr_free_labels['tipo'] = "Tipo";
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_Free_cmp'] as $Field => $Label)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['Labels_GB'][] = $Arr_free_labels[$Field];
          }
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] == "formapago")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['Labels_GB'][] = "F.P.";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] == "porcliente")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['Labels_GB'][] = "Cliente";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] == "_NM_SC_")
      {
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['fecha']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['fecha'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['fecha'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['fecha'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['fecha'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['fecha'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['fecha'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['fecha'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['fecha'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['fecha'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['fecha'][] = 6;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control']['fecha']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control']['fecha'] = array(
               array(
                   'cmp_res' => "NM_Count",
                   'label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "",
                   'label_field' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "",
                   'options' => array(
                       array('op' => 'C', 'index' => '2', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_count'] . "", 'abbrev' => "Count"),
                   ),
                   'select' => "<select class=\"sc-ui-select-NM_Count\" onChange=\"scSummChange($(this))\" style=\"display: none\"><option value=\"2\" class=\"sc-ui-select-option-C\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_count'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "total",
                   'label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Total",
                   'options' => array(
                       array('op' => 'S', 'index' => '3', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-total\" onChange=\"scSummChange($(this))\"><option value=\"3\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "adicional",
                   'label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Desc.",
                   'options' => array(
                       array('op' => 'S', 'index' => '4', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-adicional\" onChange=\"scSummChange($(this))\"><option value=\"4\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "subtotal",
                   'label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "SubTotal",
                   'options' => array(
                       array('op' => 'S', 'index' => '5', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-subtotal\" onChange=\"scSummChange($(this))\"><option value=\"5\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valoriva",
                   'label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA",
                   'options' => array(
                       array('op' => 'S', 'index' => '6', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valoriva\" onChange=\"scSummChange($(this))\"><option value=\"6\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['sc_free_group_by']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['sc_free_group_by'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['sc_free_group_by'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['sc_free_group_by'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['sc_free_group_by'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['sc_free_group_by'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['sc_free_group_by'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['sc_free_group_by'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['sc_free_group_by'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['sc_free_group_by'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['sc_free_group_by'][] = 6;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control']['sc_free_group_by']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control']['sc_free_group_by'] = array(
               array(
                   'cmp_res' => "NM_Count",
                   'label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "",
                   'label_field' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "",
                   'options' => array(
                       array('op' => 'C', 'index' => '2', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_count'] . "", 'abbrev' => "Count"),
                   ),
                   'select' => "<select class=\"sc-ui-select-NM_Count\" onChange=\"scSummChange($(this))\" style=\"display: none\"><option value=\"2\" class=\"sc-ui-select-option-C\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_count'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "total",
                   'label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Total",
                   'options' => array(
                       array('op' => 'S', 'index' => '3', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-total\" onChange=\"scSummChange($(this))\"><option value=\"3\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "adicional",
                   'label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Desc.",
                   'options' => array(
                       array('op' => 'S', 'index' => '4', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-adicional\" onChange=\"scSummChange($(this))\"><option value=\"4\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "subtotal",
                   'label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "SubTotal",
                   'options' => array(
                       array('op' => 'S', 'index' => '5', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-subtotal\" onChange=\"scSummChange($(this))\"><option value=\"5\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valoriva",
                   'label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA",
                   'options' => array(
                       array('op' => 'S', 'index' => '6', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valoriva\" onChange=\"scSummChange($(this))\"><option value=\"6\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['formapago']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['formapago'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['formapago'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['formapago'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['formapago'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['formapago'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['formapago'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['formapago'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['formapago'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['formapago'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['formapago'][] = 6;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control']['formapago']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control']['formapago'] = array(
               array(
                   'cmp_res' => "NM_Count",
                   'label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "",
                   'label_field' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "",
                   'options' => array(
                       array('op' => 'C', 'index' => '2', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_count'] . "", 'abbrev' => "Count"),
                   ),
                   'select' => "<select class=\"sc-ui-select-NM_Count\" onChange=\"scSummChange($(this))\" style=\"display: none\"><option value=\"2\" class=\"sc-ui-select-option-C\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_count'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "total",
                   'label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Total",
                   'options' => array(
                       array('op' => 'S', 'index' => '3', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-total\" onChange=\"scSummChange($(this))\"><option value=\"3\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "adicional",
                   'label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Desc.",
                   'options' => array(
                       array('op' => 'S', 'index' => '4', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-adicional\" onChange=\"scSummChange($(this))\"><option value=\"4\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "subtotal",
                   'label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "SubTotal",
                   'options' => array(
                       array('op' => 'S', 'index' => '5', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-subtotal\" onChange=\"scSummChange($(this))\"><option value=\"5\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valoriva",
                   'label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA",
                   'options' => array(
                       array('op' => 'S', 'index' => '6', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valoriva\" onChange=\"scSummChange($(this))\"><option value=\"6\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['porcliente']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['porcliente'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['porcliente'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['porcliente'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['porcliente'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['porcliente'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['porcliente'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['porcliente'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['porcliente'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']['porcliente'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']['porcliente'][] = 6;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control']['porcliente']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control']['porcliente'] = array(
               array(
                   'cmp_res' => "NM_Count",
                   'label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "",
                   'label_field' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "",
                   'options' => array(
                       array('op' => 'C', 'index' => '2', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_count'] . "", 'abbrev' => "Count"),
                   ),
                   'select' => "<select class=\"sc-ui-select-NM_Count\" onChange=\"scSummChange($(this))\" style=\"display: none\"><option value=\"2\" class=\"sc-ui-select-option-C\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_count'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "total",
                   'label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Total",
                   'options' => array(
                       array('op' => 'S', 'index' => '3', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-total\" onChange=\"scSummChange($(this))\"><option value=\"3\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "adicional",
                   'label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Desc.",
                   'options' => array(
                       array('op' => 'S', 'index' => '4', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-adicional\" onChange=\"scSummChange($(this))\"><option value=\"4\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "subtotal",
                   'label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "SubTotal",
                   'options' => array(
                       array('op' => 'S', 'index' => '5', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-subtotal\" onChange=\"scSummChange($(this))\"><option value=\"5\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valoriva",
                   'label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA",
                   'options' => array(
                       array('op' => 'S', 'index' => '6', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valoriva\" onChange=\"scSummChange($(this))\"><option value=\"6\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['all']['SC_Ind_Groupby'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['all']['SC_Gb_Free_cmp'] = array();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['all']['SC_Ind_Groupby'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_Free_cmp']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['all']['SC_Gb_Free_cmp'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Gb_Free_cmp'];
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['res']['summarizing_fields_display'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['res']['summarizing_fields_order']   = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['res']['summarizing_fields_control'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['res']['pivot_x_axys']               = array();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['res']['summarizing_fields_display'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_display'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['res']['summarizing_fields_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_order'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['res']['summarizing_fields_control'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['summarizing_fields_control'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pivot_x_axys']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dados_orig_gb']['res']['pivot_x_axys'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pivot_x_axys'];
          }
      }
      $this->Ini->Apl_resumo  = "grid_facturaven_pos_rapida_resumo_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] . ".class.php"; 
      $this->Ini->Apl_grafico = "grid_facturaven_pos_rapida_grafico_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_Ind_Groupby'] . ".class.php"; 
      $_SESSION['sc_session']['path_third'] = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['real_path_third'] = $this->Ini->path_third;
      $_SESSION['sc_session']['path_prod']  = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['path_img']   = $this->Ini->path_img_global;
      $_SESSION['sc_session']['path_libs']  = $this->Ini->path_libs;
      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['xls_return']  = ($nmgp_opcao == "xls")  ? "volta_grid" : "resumo"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['csv_return']  = ($nmgp_opcao == "csv")  ? "volta_grid" : "resumo"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['xml_return']  = ($nmgp_opcao == "xml")  ? "volta_grid" : "resumo"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['json_return'] = ($nmgp_opcao == "json") ? "volta_grid" : "resumo"; 
      $this->Ini->SC_module_export = (isset($SC_module_export) && !empty($SC_module_export)) ? $SC_module_export : "grid,resume,chart"; 
      if (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'pdf')
      { 
          $this->Ini->SC_module_export = "grid,resume";
      }
      elseif (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'print')
      { 
          $this->Ini->SC_module_export = "grid";
      }
      elseif (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'pdf_res')
      { 
          $this->Ini->SC_module_export = "resume,chart";
      }
      elseif (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'res_print')
      { 
          $this->Ini->SC_module_export = "resume";
      }
      if (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'xls')
      { 
          $this->Ini->SC_module_export = "grid";
      }
      elseif (empty($this->Ini->SC_module_export) && $nmgp_opcao == 'xls_res')
      { 
          $this->Ini->SC_module_export = "resume";
      }
      if ($nmgp_opcao == 'print' || $nmgp_opcao == 'res_print') {
          $this->Ini->Proc_print = true;
          if (!empty($nmgp_password)) {
              $this->Ini->Export_html_zip = true;
          }
          $_SESSION['scriptcase']['proc_mobile'] = false;
          if ($nmgp_opcao == 'print') {
              $this->ret_print = "volta_grid";
          }
          else {
              $this->ret_print = "resumo";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['print_return'] = $this->ret_print;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      {
          if ($this->Ini->Export_html_zip)
          {
              $this->Ini->Export_img_zip = true;
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['html_name']))
              {
                  $nm_arquivo_html = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['html_name'];
              }
              elseif ($nmgp_opcao == 'print' && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)
              {
                  $nm_arquivo_html = "/sc_grid_facturaven_pos_rapida_" . session_id() . ".html";
              }
              else
              {
                  $nm_arquivo_html = "/sc_grid_facturaven_pos_rapida_res_" . session_id() . ".html";
              }
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html);
          }
      }
      if ($nmgp_opcao == "doc_word") {  
          $this->ret_word = "volta_grid";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_return'] = $this->ret_word;
          $_SESSION['scriptcase']['proc_mobile'] = false;
      }
      if ($nmgp_opcao == "doc_word_res") {  
          $this->ret_word = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_return'] = $this->ret_word;
          $_SESSION['scriptcase']['proc_mobile'] = false;
      }
      if ($nmgp_opcao == "doc_word_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "doc_word"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "doc_word"; 
      }
      elseif ($nmgp_opcao == "doc_word" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "doc_word_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "doc_word_res"; 
      }
      if ($nmgp_opcao == "xls_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "xls"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "xls"; 
      }
      elseif ($nmgp_opcao == "xls" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "xls_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "xls_res"; 
      }
      if ($nmgp_opcao == "csv_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "csv"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "csv"; 
      }
      elseif ($nmgp_opcao == "csv" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "csv_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "csv_res"; 
      }
      if ($nmgp_opcao == "xml_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "xml"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "xml"; 
      }
      elseif ($nmgp_opcao == "xml" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "xml_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "xml_res"; 
      }
      if ($nmgp_opcao == "json_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "json"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "json"; 
      }
      elseif ($nmgp_opcao == "json" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "json_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "json_res"; 
      }
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['skip_charts'] = (strpos(" " . $this->Ini->SC_module_export, "chart") !== false) ? false : true;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_det'] = false;
      if ($nmgp_opcao == 'pdf')
      { 
          if (strpos(" " . $this->Ini->SC_module_export, "grid") === false && (strpos(" " . $this->Ini->SC_module_export, "resume") !== false || strpos(" " . $this->Ini->SC_module_export, "chart") !== false))
          { 
              $nmgp_opcao = 'pdf_res';
          } 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_res'] = false;
      if ($nmgp_opcao == 'pdf_res')
      {
          if (strpos(" " . $this->Ini->SC_module_export, "grid") !== false)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = 'pdf';
              $nmgp_opcao = 'pdf';
          }
          else
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_res'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = 'pdf';
              $nmgp_opcao = 'pdf';
              $rRFP = fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp', "w");
              fwrite($rRFP, "PDF\n");
              fwrite($rRFP, "\n");
              fwrite($rRFP, "\n");
              fwrite($rRFP, "100\n");
              $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
              if (!NM_is_utf8($lang_protect))
              {
                  $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              fwrite($rRFP, 90 . "_#NM#_" . $lang_protect . "...\n");
              fclose($rRFP);
          }
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['conf_chart_level'] = "S";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_tipo']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['graf_disp']        = array('Bar', 'Pie', 'Line', 'Area');
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_tipo']        = 'Bar';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_larg']        = '800';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_alt']         = '600';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['graf_opc_atual']   = '1';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['graf_mod_allowed'] = array(1, 2);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['graf_order']       = '';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_font'] = '';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['graf_subtitle_val'] = '';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['chartpallet']       = '1';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['graf_exibe_val']    = '0';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['paletteColors']     = '';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_barra_orien'] = 'Vertical';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_barra_forma'] = 'Bar';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_barra_dimen'] = '3d';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_barra_sobre'] = 'No';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_barra_empil'] = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_barra_inver'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_barra_agrup'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_barra_funil'] = 'N';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_pizza_forma'] = 'Pie';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_pizza_dimen'] = '3d';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_pizza_orden'] = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_pizza_explo'] = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_pizza_valor'] = 'Valor';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_linha_forma'] = 'Line';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_linha_inver'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_linha_agrup'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_area_forma']  = 'Area';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_area_empil']  = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_area_inver']  = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_area_agrup']  = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_marca_inver'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_marca_agrup'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_gauge_forma'] = 'Circular';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_radar_forma'] = 'Line';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_radar_empil'] = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_polar_forma'] = 'Line';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_funil_dimen'] = '3d';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_funil_inver'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_pyram_dimen'] = '3d';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_pyram_valor'] = 'Valor';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cfg_graf']['graf_pyram_forma'] = 'S';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida']      = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_grid']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_grid'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_init']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_init'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_label']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_label'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cab_embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cab_embutida'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_pdf']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_pdf'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_treeview']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida_treeview'] = false;
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['proc_pdf'] = (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'] && ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "pdf_res")) ? true : false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['proc_pdf']) {
          $_SESSION['scriptcase']['proc_mobile'] = false;
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['proc_pdf_vert'] = false;
      include("../_lib/css/" . $this->Ini->str_schema_all . "_grid.php");
      $this->Ini->Tree_img_col    = trim($str_tree_col);
      $this->Ini->Tree_img_exp    = trim($str_tree_exp);
      $str_button = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "facilweb_azul2_iconos";
      $_SESSION['scriptcase']['str_button_all'] = $str_button;
      $this->Ini->str_chart_theme = (isset($str_chart_theme)?$str_chart_theme:'');
      $this->Ini->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Ini->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      $this->arr_buttons['group_group_2']= array(
          'value'            => "Opciones",
          'hint'             => "",
          'type'             => "button",
          'display'          => "only_text",
          'display_position' => "text_right",
          'image'            => "",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      $this->arr_buttons['group_group_1']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      $this->arr_buttons['group_group_1']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_settings'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_settings'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      { 
      $this->Ini->Color_bg_ajax            = (!isset($str_ajax_bg)       || "" == trim($str_ajax_bg))         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax            = (!isset($str_ajax_border_c) || "" == trim($str_ajax_border_c))   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax            = (!isset($str_ajax_border_s) || "" == trim($str_ajax_border_s))   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax            = (!isset($str_ajax_border_w) || "" == trim($str_ajax_border_w))   ? ""     : $str_ajax_border_w;
      $this->Ini->Img_sep_grid             = "/" . trim($str_toolbar_separator);
      $this->Ini->grid_table_width         = (!isset($str_grid_table_width) || "" == trim($str_grid_table_width)) ? "" : $str_grid_table_width;
      $this->Ini->Label_sort_pos           = trim($str_label_sort_pos);
      $this->Ini->Label_sort               = trim($str_label_sort);
      $this->Ini->Label_sort_asc           = trim($str_label_sort_asc);
      $this->Ini->Label_sort_desc          = trim($str_label_sort_desc);
      $this->Ini->Label_summary_sort_pos   = trim($str_resume_label_sort_pos);
      $this->Ini->Label_summary_sort       = trim($str_resume_label_sort);
      $this->Ini->Label_summary_sort_asc   = trim($str_resume_label_sort_asc);
      $this->Ini->Label_summary_sort_desc  = trim($str_resume_label_sort_desc);
      $this->Ini->Sum_ico_line             = trim($sum_ico_line);
      $this->Ini->Sum_ico_column           = trim($sum_ico_column);
      $this->Ini->ajax_div_icon            = trim($ajax_div_icon);
      $this->Ini->Str_toolbarnav_separator = '/' . trim($str_toolbarnav_separator);
      $this->Ini->Img_qs_search            = '' != trim($img_qs_search)        ? trim($img_qs_search)        : 'scriptcase__NM__qs_lupa.png';
      $this->Ini->Img_qs_clean             = '' != trim($img_qs_clean)         ? trim($img_qs_clean)         : 'scriptcase__NM__qs_close.png';
      $this->Ini->Str_qs_image_padding     = '' != trim($str_qs_image_padding) ? trim($str_qs_image_padding) : '0';
      $this->Ini->App_div_tree_img_col     = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp     = trim($app_div_str_tree_exp);
      $this->Ini->refinedsearch_hide           = trim($refinedsearch_hide);
      $this->Ini->refinedsearch_show          = trim($refinedsearch_show);
      $this->Ini->refinedsearch_close          = trim($refinedsearch_close);
      $this->Ini->refinedsearch_values_separator          = trim($refinedsearch_values_separator);
      $this->Ini->refinedsearch_campo_close_icon          = trim($refinedsearch_campo_close_icon);
          $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput") ; 
          $_SESSION['scriptcase']['css_popup']                 = $this->Ini->str_schema_all . "_grid.css";
          $_SESSION['scriptcase']['css_popup_dir']             = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
          $_SESSION['scriptcase']['css_btn_popup']             = $this->Ini->Str_btn_css;
          $_SESSION['scriptcase']['str_google_fonts']          = $this->Ini->str_google_fonts;
          $_SESSION['scriptcase']['css_popup_tab']             = $this->Ini->str_schema_all . "_tab.css";
          $_SESSION['scriptcase']['css_popup_tab_dir']         = $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
          $_SESSION['scriptcase']['css_popup_div']             = $this->Ini->str_schema_all . "_appdiv.css";
          $_SESSION['scriptcase']['css_popup_div_dir']         = $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
          $_SESSION['scriptcase']['bg_btn_popup']['bok']       = nmButtonOutput($this->arr_buttons, "bok_appdiv", "processa();", "processa();", "bok", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['bsair']     = nmButtonOutput($this->arr_buttons, "bsair_appdiv", "window.close()", "window.close()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] = nmButtonOutput($this->arr_buttons, "bsair_appdiv", "self.parent.tb_remove()", "self.parent.tb_remove()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "asentada";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "credito";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "tipo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "resolucion";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "numfacven";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "fechaven";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "idcli";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "total";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "vendedor";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "banco";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "editarpos";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "imprimircopia";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "existeentns";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "a4";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "idfacven";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "fechavenc";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "subtotal";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "valoriva";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "pagada";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "observaciones";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "saldo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "adicional";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "adicional2";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "adicional3";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "creado";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "editado";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "usuario_crea";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "cod_cuenta";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'][] = "imprimir";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'];
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel'] = array();
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['idfacven'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['fechavenc'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['subtotal'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['valoriva'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['pagada'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['observaciones'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['saldo'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['adicional'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['adicional2'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['adicional3'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['creado'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['editado'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['usuario_crea'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['cod_cuenta'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel']['imprimir'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_pos_rapida']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_pos_rapida']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_pos_rapida']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_page_process'] = $this->Ini->sc_page;
      } 
      $_SESSION['scriptcase']['sc_idioma_pivot']['es'] = array(
          'smry_ppup_titl'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_titl'],
          'smry_ppup_fild'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_fild'],
          'smry_ppup_posi'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi'],
          'smry_ppup_sort'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort'],
          'smry_ppup_posi_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_labl'],
          'smry_ppup_posi_data' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_data'],
          'smry_ppup_sort_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_labl'],
          'smry_ppup_sort_vlue' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_vlue'],
          'smry_ppup_chek_tabu' => $this->Ini->Nm_lang['lang_othr_smry_ppup_chek_tabu'],
      );
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
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'])
      { 
          $this->pdf_zip = (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opc_pdf']['pdf_zip'])) ? $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opc_pdf']['pdf_zip'] : "N";
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['use_pass_pdf'] = "";
          $_SESSION['scriptcase']['sc_tp_pdf'] = "wkhtmltopdf";
          $_SESSION['scriptcase']['sc_idioma_pdf'] = array();
          $_SESSION['scriptcase']['sc_idioma_pdf']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_pdff_titl'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'tp_imp' => $this->Ini->Nm_lang['lang_pdff_type'], 'color' => $this->Ini->Nm_lang['lang_pdff_colr'], 'econm' => $this->Ini->Nm_lang['lang_pdff_bndw'], 'tp_pap' => $this->Ini->Nm_lang['lang_pdff_pper'], 'carta' => $this->Ini->Nm_lang['lang_pdff_letr'], 'oficio' => $this->Ini->Nm_lang['lang_pdff_legl'], 'customiz' => $this->Ini->Nm_lang['lang_pdff_cstm'], 'alt_papel' => $this->Ini->Nm_lang['lang_pdff_pper_hgth'], 'larg_papel' => $this->Ini->Nm_lang['lang_pdff_pper_wdth'], 'orient' => $this->Ini->Nm_lang['lang_pdff_pper_orie'], 'retrato' => $this->Ini->Nm_lang['lang_pdff_prtr'], 'paisag' => $this->Ini->Nm_lang['lang_pdff_lnds'], 'book' => $this->Ini->Nm_lang['lang_pdff_bkmk'], 'grafico' => $this->Ini->Nm_lang['lang_pdff_chrt'], 'largura' => $this->Ini->Nm_lang['lang_pdff_wdth'], 'fonte' => $this->Ini->Nm_lang['lang_pdff_font'], 'create' => $this->Ini->Nm_lang['lang_pdff_create'], 'sim' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'nao' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'chart_level' => $this->Ini->Nm_lang['lang_chart_level_groupby'], 'chart_level' => $this->Ini->Nm_lang['lang_chart_level_groupby'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'group_chart' => $this->Ini->Nm_lang['lang_pdff_group_chart'], 'pdf_res' => $this->Ini->Nm_lang['lang_app_xls_summry'], 'pdf_cons' => $this->Ini->Nm_lang['lang_app_xls_grid'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd'], 'page_break' => $this->Ini->Nm_lang['lang_groupby_break_page_pdf'], 'other_options' => $this->Ini->Nm_lang['lang_app_other_options'], 'label_group' => $this->Ini->Nm_lang['lang_pdf_below_groupby'], 'page_label' => $this->Ini->Nm_lang['lang_pdf_all_pages_title'], 'page_header' => $this->Ini->Nm_lang['lang_pdf_all_pages_header'], 'format_zip' => $this->Ini->Nm_lang['lang_export_pdf_zip'], 'cancela' => $this->Ini->Nm_lang['lang_pdff_cncl']);
      } 
      $_SESSION['scriptcase']['sc_idioma_graf_flash'] = array();
      $_SESSION['scriptcase']['sc_idioma_graf_flash']['es'] = array(
          'titulo' => $this->Ini->Nm_lang['lang_chrt_titl'],
          'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'],
          'tipo_g' => $this->Ini->Nm_lang['lang_chrt_type'],
          'tp_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars'],
          'tp_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie'],
          'tp_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line'],
          'tp_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area'],
          'tp_marcador' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks'],
          'tp_gauge' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug'],
          'tp_radar' => $this->Ini->Nm_lang['lang_flsh_chrt_radr'],
          'tp_polar' => $this->Ini->Nm_lang['lang_flsh_chrt_polr'],
          'tp_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_funl'],
          'tp_pyramid' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm'],
          'largura' => $this->Ini->Nm_lang['lang_chrt_wdth'],
          'altura' => $this->Ini->Nm_lang['lang_chrt_hgth'],
          'modo_gera' => $this->Ini->Nm_lang['lang_chrt_gtmd'],
          'sintetico' => $this->Ini->Nm_lang['lang_chrt_smzd'],
          'analitico' => $this->Ini->Nm_lang['lang_chrt_anlt'],
          'order' => $this->Ini->Nm_lang['lang_chrt_ordr'],
          'order_none' => $this->Ini->Nm_lang['lang_chrt_ordr_none'],
          'order_asc' => $this->Ini->Nm_lang['lang_chrt_ordr_asc'],
          'order_desc' => $this->Ini->Nm_lang['lang_chrt_ordr_desc'],
          'barra_orien' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_layo'],
          'barra_orien_horiz' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_horz'],
          'barra_orien_verti' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_vrtc'],
          'barra_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_shpe'],
          'barra_forma_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_bars'],
          'barra_forma_cilin' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cyld'],
          'barra_forma_cone' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cone'],
          'barra_forma_piram' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_pyrm'],
          'barra_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_dmns'],
          'barra_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_2ddm'],
          'barra_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ddm'],
          'barra_sobre' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ovr'],
          'barra_sobre_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_sobre_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'barra_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stck'],
          'barra_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stan'],
          'barra_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stay'],
          'barra_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stap'],
          'barra_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invr'],
          'barra_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invn'],
          'barra_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invi'],
          'barra_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srgr'],
          'barra_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srst'],
          'barra_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srbs'],
          'barra_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_funl'],
          'barra_funil_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_funil_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'pizza_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_shpe'],
          'pizza_forma_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fpie'],
          'pizza_forma_donut' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dnts'],
          'pizza_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dmns'],
          'pizza_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_2ddm'],
          'pizza_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_3ddm'],
          'pizza_orden' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_srtn'],
          'pizza_orden_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_nsrt'],
          'pizza_orden_ascen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_asrt'],
          'pizza_orden_desce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dsrt'],
          'pizza_explo' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_expl'],
          'pizza_explo_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dxpl'],
          'pizza_explo_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_axpl'],
          'pizza_explo_click' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_cxpl'],
          'pizza_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fval'],
          'pizza_valor_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlv'],
          'pizza_valor_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlp'],
          'linha_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_shpe'],
          'linha_forma_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line_line'],
          'linha_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_line_spln'],
          'linha_forma_degra' => $this->Ini->Nm_lang['lang_flsh_chrt_line_step'],
          'linha_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invr'],
          'linha_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invn'],
          'linha_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invi'],
          'linha_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srgr'],
          'linha_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srst'],
          'linha_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srbs'],
          'area_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_shpe'],
          'area_forma_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area_area'],
          'area_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_area_spln'],
          'area_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stak'],
          'area_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stan'],
          'area_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stay'],
          'area_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stap'],
          'area_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invr'],
          'area_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invn'],
          'area_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invi'],
          'area_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srgr'],
          'area_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srst'],
          'area_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srbs'],
          'marca_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invr'],
          'marca_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invn'],
          'marca_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invi'],
          'marca_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srgr'],
          'marca_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srst'],
          'marca_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srbs'],
          'gauge_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_shpe'],
          'gauge_forma_circular' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_circ'],
          'gauge_forma_semi' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_semi'],
          'pyram_slice' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_slic'],
          'pyram_slice_s' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcs'],
          'pyram_slice_n' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcn'],
      );
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_prt'] = array();
          $_SESSION['scriptcase']['sc_idioma_prt']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'modoimp' => $this->Ini->Nm_lang['lang_btns_mode_prnt_hint'], 'curr' => $this->Ini->Nm_lang['lang_othr_curr_page'], 'total' => $this->Ini->Nm_lang['lang_othr_full'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'pdf_res' => $this->Ini->Nm_lang['lang_app_xls_summry'], 'pdf_cons' => $this->Ini->Nm_lang['lang_app_xls_grid'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_word'] = array();
          $_SESSION['scriptcase']['sc_idioma_word']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_export_title'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_xls'] = array();
          $_SESSION['scriptcase']['sc_idioma_xls']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_app_xls_title'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'tp_xls' => $this->Ini->Nm_lang['lang_app_xls_ext'], 'tot_xls' => $this->Ini->Nm_lang['lang_othr_export_excel_total'], 'xls_res' => $this->Ini->Nm_lang['lang_app_xls_summry'], 'xls_cons' => $this->Ini->Nm_lang['lang_app_xls_grid'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      $this->Ini->Gd_missing  = true;
      if (function_exists("getProdVersion"))
      {
          $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
      }
      if (function_exists("gd_info"))
      {
          $this->Ini->Gd_missing = false;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig'])))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "inicio";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_pos_rapida']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_pos_rapida']['start'] == 'filter')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "grid")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "busca";
          }   
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] != "detalhe" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"])))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opc_liga'] = array();  
          if (isset($NMSC_conf_apl) && !empty($NMSC_conf_apl))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opc_liga'] = $NMSC_conf_apl;  
          }   
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opc_liga']['inicial']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opc_liga']['inicial'];
          }
      }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opc_liga']['paginacao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opc_liga']['paginacao']))
          { 
              $this->Ini->Apl_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opc_liga']['paginacao'];
          } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "busca")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "grid" ;  
      }   
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao_print']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao_print']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao_print'] = "inicio" ;  
      }   
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['print_all'] = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "print")  
      { 
          if (strpos(" " . $this->Ini->SC_module_export, "grid") === false)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "res_print";
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "res_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao']     = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['print_all'] = true;
          if (strpos(" " . $this->Ini->SC_module_export, "grid") !== false)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "print";
              $nmgp_tipo_print = "RC";
          }
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'], 0, 7) == "grafico")  
      { 
          $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "pdf")
      { 
          $this->Ini->path_img_modelo = $this->Ini->path_img_modelo;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "fast_search")  
      { 
          $this->SC_fast_search($GLOBALS["nmgp_fast_search"], $GLOBALS["nmgp_cond_fast_search"], $GLOBALS["nmgp_arg_fast_search"]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq'])
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = 'igual';
          } 
          else 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['contr_array_resumo'] = "NAO";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['contr_total_geral']  = "NAO";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['tot_geral']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = 'pesq';
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['orig_pesq'] = 'grid';
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_refresh'] = true;
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "interativ_search")
      { 
          $this->SC_proc_interativ_search($_POST['parm']);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['contr_array_resumo'] = "NAO";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['contr_total_geral']  = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['tot_geral']);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = 'inicio';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opc_int_search'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_refresh'] = true;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == 'pesq' && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['orig_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['orig_pesq']))  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['orig_pesq'] == "res")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = 'resumo';
          } 
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['orig_pesq'] == "grid") 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = 'inicio';
          } 
      } 
//
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['prim_cons'] = false;  
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] != "detalhe" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"])))  
      { 
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['use_pass_pdf']);
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['prim_cons'] = true;  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig'] = " where espos = 'SI' and  fechaven=current_date";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_ant']   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['cond_pesq'] = ""; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_fast'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['contr_total_geral'] = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['tot_geral']);
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['contr_array_resumo'] = "NAO";
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_ant'];  
      if ($nmgp_opcao == "formphp")
      { 
          if ($nm_call_php == "Eliminar")
          { 
              $this->Eliminar();
          } 
          if ($nm_call_php == "Reversar")
          { 
              $this->Reversar();
          } 
          if ($nm_call_php == "Asentar")
          { 
              $this->Asentar();
          } 
          if ($nm_call_php == "enviaratns")
          { 
              $this->enviaratns();
          } 
          if ($nm_call_php == "generar_contabilidad_tns")
          { 
              $this->generar_contabilidad_tns();
          } 
          $this->Db->Close(); 
          $this->Ini->nm_db_conn_firebird->Close(); 
          exit;
      } 
      $nm_flag_pdf   = true;
      $nm_vendo_pdf  = ("pdf" == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['graf_pdf'] = "S";
      if (isset($nmgp_graf_pdf) && !empty($nmgp_graf_pdf))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['graf_pdf'] = $nmgp_graf_pdf;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      {
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            $nm_arquivo_htm_temp = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_facturaven_pos_rapida_html_" . session_id() . "_2.html";
            $nm_arquivo_pdf_base = "/sc_pdf_" . md5(date("Ymd") . "_" . session_id()) . "_grid_facturaven_pos_rapida.pdf";
            $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base;
            $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
            $nm_arquivo_de_saida = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_facturaven_pos_rapida_html_" . session_id() . ".html";
            $nm_url_de_saida = $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_grid_facturaven_pos_rapida_html_" . session_id() . ".html";
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida, $_SESSION['scriptcase']['charset']);
            }
            else
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida);
            }
         }
      }
//----------------------------------->
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "doc_word_res")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['print_navigator'] = "Microsoft Internet Explorer";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['print_all'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['doc_word']  = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao']     = "resumo";
          $_SESSION['scriptcase']['saida_word'] = true;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_name']))
          {
              $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_name'], ".");
              if ($Pos === false) {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_name'] .= ".doc";
              }
              $nm_arquivo_doc_word = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_name'];
          }
          else
          {
              $nm_arquivo_doc_word = "/sc_grid_facturaven_pos_rapida_res_" . session_id() . ".doc";
          }
          $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $this->Ini->nm_limite_lin_res_prt = 0;
          $GLOBALS['nmgp_cor_print']        = $nmgp_cor_word;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "xls")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_xls.class.php"); 
          } 
          $this->xls  = new grid_facturaven_pos_rapida_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "xls_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_res_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_res_xls.class.php"); 
          } 
          $this->xls  = new grid_facturaven_pos_rapida_res_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "xml")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_xml.class.php"); 
          } 
          $this->xml  = new grid_facturaven_pos_rapida_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "xml_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_res_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_res_xml.class.php"); 
          } 
          $this->xml  = new grid_facturaven_pos_rapida_res_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "json")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_json.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_json.class.php"); 
          } 
          $this->json  = new grid_facturaven_pos_rapida_json();
          $this->prep_modulos("json");
          $this->json->monta_json();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "csv")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_csv.class.php"); 
          } 
          $this->csv  = new grid_facturaven_pos_rapida_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "csv_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_res_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_res_csv.class.php"); 
          } 
          $this->csv  = new grid_facturaven_pos_rapida_res_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "rtf")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_rtf.class.php"); 
          } 
          $this->rtf  = new grid_facturaven_pos_rapida_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "rtf_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_res_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_res_rtf.class.php"); 
          } 
          $this->rtf  = new grid_facturaven_pos_rapida_res_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'], 0, 7) == "grafico")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . " . grid_facturaven_pos_rapida . /" . $this->Ini->Apl_grafico); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
          } 
          $this->Graf  = new grid_facturaven_pos_rapida_grafico();
          $this->prep_modulos("Graf");
          if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'], 7, 1) == "_")  
          { 
              $this->Graf->grafico_col(substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'], 8));
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "grid";
          }
          else
          { 
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dashboard_refresh_after_chart'])) {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dashboard_refresh_after_chart'];
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['dashboard_refresh_after_chart']);
              }
              else {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] = "grid";
              }
              $this->Graf->monta_grafico();
          }
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "busca")  
      { 
          if (!$_SESSION['scriptcase']['proc_mobile']) 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_pesq.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_mobile_pesq.class.php"); 
          } 
          $this->pesq  = new grid_facturaven_pos_rapida_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
          $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
          $this->pesq->monta_busca();
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "resumo")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/" . $this->Ini->Apl_resumo); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          } 
          $this->Res = new grid_facturaven_pos_rapida_resumo("out");
          $this->prep_modulos("Res");
          $this->Res->monta_resumo();
      }
      else 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "print" && $nmgp_tipo_print == "RC")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['print_navigator'] = $nmgp_navegator_print;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao']     = "pdf";
              $GLOBALS['nmgp_tipo_pdf'] = strtolower($nmgp_cor_print);
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] == "doc_word")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['print_navigator'] = "Microsoft Internet Explorer";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['doc_word']  = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao']     = "pdf";
              $_SESSION['scriptcase']['saida_word'] = true;
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_name']))
              {
                  $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_name'], ".");
                  if ($Pos === false) {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_name'] .= ".doc";
                  }
                  $nm_arquivo_doc_word =  "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_name'];
              }
              else
              {
                  $nm_arquivo_doc_word = "/sc_grid_facturaven_pos_rapida_" . session_id() . ".doc";
              }
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
              $this->Ini->nm_limite_lin_prt = 0;
              $GLOBALS['nmgp_tipo_pdf'] = $nmgp_cor_word;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_pos_rapida/grid_facturaven_pos_rapida_grid.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_pos_rapida_grid.class.php"); 
          } 
          $this->grid  = new grid_facturaven_pos_rapida_grid();
          $this->prep_modulos("grid");
          $this->grid->monta_grid($linhas);
      }   
//--- 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'])
      {
           $this->Db->Close(); 
           $this->Ini->nm_db_conn_firebird->Close(); 
      }
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['embutida'])
      {
         $nm_saida->finaliza();
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['ajax_nav'])
         {
             $Temp = ob_get_clean();
             if ($Temp !== false && trim($Temp) != "")
             {
                 $this->Ini->Arr_result['htmOutput'] = $Temp;
             }
             if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['opcao'] != "ajax_detalhe")  
             {
                 $this->Ini->Arr_result['setVar'][] = array('var' => 'scQtReg', 'value' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['qt_reg_grid']);
             }
             $_SESSION['scriptcase']['saida_var'] = false;
             $oJson = new Services_JSON();
             echo $oJson->encode($this->Ini->Arr_result);
             exit;
         }
            if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['export_sel_columns']['field_order']))
            {
                $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['export_sel_columns']['field_order'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['export_sel_columns']['field_order']);
            }
            if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['export_sel_columns']['usr_cmp_sel']))
            {
                $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['export_sel_columns']['usr_cmp_sel'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['export_sel_columns']['usr_cmp_sel']);
            }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['doc_word'])
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file'] = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
             $this->html_doc_word($nm_arquivo_doc_word, $nmgp_password);
         }
         if ($this->Ini->Export_html_zip)
         {
             $this->html_export_print($nm_arquivo_html, $nmgp_password);
         }
         if ($ajax_opc_print)
         {
             $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_print . ".html");
             $this->Arr_result['title_export'] = NM_charset_to_utf8($nm_arquivo_print);
             $Temp = ob_get_clean();
             if ($Temp !== false && trim($Temp) != "")
             {
                 $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
             }
             $oJson = new Services_JSON();
             echo $oJson->encode($this->Arr_result);
             exit;
        }
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            if (isset($nmgp_parms_pdf) && !empty($nmgp_parms_pdf))
            {
                $str_pd4ml    = $nmgp_parms_pdf;
            }
            else
            {
                $str_pd4ml    = " --page-size Letter --orientation Portrait";
            }
            if (!$this->Ini->sc_export_ajax && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
                    if (!NM_is_utf8($lang_protect))
                    {
                        $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                    }
                    grid_facturaven_pos_rapida_pdf_progress_call($this->grid->progress_tot . "_#NM#_" . $this->grid->progress_tot . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
                    fwrite($this->grid->progress_fp, ($this->grid->progress_tot) . "_#NM#_" . $lang_protect . "...\n");
                    fclose($this->grid->progress_fp);
                }
            }
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name']))
            {
                $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name'], ".");
                if ($Pos === false) {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name'] .= ".pdf";
                }
                if ('/' == substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name'], 0, 1)) {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name'] = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name'], 1);
                }
                $nm_arquivo_pdf_serv = $this->Ini->root .  $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name'];
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name'];
                $nm_arquivo_pdf_base = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_name']);
            }
            $arq_pdf_out  = (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " \"" . $nm_arquivo_pdf_serv . "\"" :  $nm_arquivo_pdf_serv;
            $arq_pdf_in   = (FALSE !== strpos($nm_url_de_saida, ' '))     ? " \"" . $nm_url_de_saida . "\""     :  $nm_url_de_saida;
            if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
            {
                $dir_qpdf = "/qpdf/win/bin";
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    $dir_qpdf = "/qpdf/linux-i386";
                }
                else
                {
                    $dir_qpdf = "/qpdf/linux-amd64";
                }
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
            {
                $dir_qpdf = "/qpdf/osx";
            }
            if ($this->pdf_zip == "S")
            {
                $arq_pdf_final = str_replace(".pdf", ".zip", $arq_pdf_out);
            }
            elseif (is_dir($this->Ini->path_third . $dir_qpdf) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['use_pass_pdf']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['use_pass_pdf']))
            {
                $arq_pdf_final = $arq_pdf_out;
                $arq_pdf_out   = str_replace(".pdf", "_wk.pdf", $arq_pdf_out);
            }
            $Win_autentication = "";
            if (isset($_SESSION['sc_pdf_usr']) && !empty($_SESSION['sc_pdf_usr']))
            {
                $_SESSION['sc_iis_usr'] = $_SESSION['sc_pdf_usr'];
            }
            if (isset($_SESSION['sc_iis_usr']) && !empty($_SESSION['sc_iis_usr']))
            {
                $Win_autentication .= " --username " . $_SESSION['sc_iis_usr'];
            }
            if (isset($_SESSION['sc_pdf_pw']) && !empty($_SESSION['sc_pdf_pw']))
            {
                $_SESSION['sc_iis_pw'] = $_SESSION['sc_pdf_pw'];
            }
            if (isset($_SESSION['sc_iis_pw']) && !empty($_SESSION['sc_iis_pw']))
            {
                $Win_autentication .= " --password " . $_SESSION['sc_iis_pw'];
            }
            if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/win");
                $str_execcmd2 = 'wkhtmltopdf ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]"';
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    if (FALSE !== strpos(php_uname(), 'Debian 4.19')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/buster");
                    }
                    elseif (FALSE !== strpos(php_uname(), 'Debian 4.9')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/stretch");
                    }
                    else
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/linux-i386");
                    }
                    $str_execcmd2 = './wkhtmltopdf-i386 ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]"';
                }
                else
                {
                    if (FALSE !== strpos(php_uname(), 'Debian 4.19')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/buster");
                    }
                    elseif (FALSE !== strpos(php_uname(), 'Debian 4.9')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/stretch");
                    }
                    elseif (FALSE !== strpos(php_uname(), '.el8.')) 
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/centos8");
                    }
                    else
                    {
                        chdir($this->Ini->path_third . "/wkhtmltopdf/linux-amd64");
                    }
                    $str_execcmd2 = './wkhtmltopdf-amd64 ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]"';
                }
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/osx/Contents/MacOS");
                $str_execcmd2 = './wkhtmltopdf ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]"';
            }

            if (!isset($_SESSION['scriptcase']['phantomjs_charts']) || !$_SESSION['scriptcase']['phantomjs_charts'])
            {
                $str_execcmd2 .= ' --javascript-delay ' . 2000;
            }

            $str_execcmd2 .= ' ' . $arq_pdf_in . ' ' . $arq_pdf_out;

            $arr_execcmd = array();
            $str_execcmd = $str_execcmd2;
            exec($str_execcmd2);
            $str_cmd_qpdf = "";
            $str_zip      = "";
            if ($this->pdf_zip == "S")
            {
                $pdf_pass = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['use_pass_pdf'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['use_pass_pdf'] : "";
                $opt_pass = (!empty($pdf_pass)) ? " -p" : "";
                if (is_file($arq_pdf_final)) {
                    unlink($arq_pdf_final);
                }
                if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                {
                    chdir($this->Ini->path_third . "/zip/windows");
                    $str_zip = "zip.exe" . strtoupper($opt_pass) . " -j " . $pdf_pass . " " . $arq_pdf_final . " " . $arq_pdf_out;
                }
                elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                {
                      if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                      {
                          chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                      }
                      else
                      {
                          chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                      }
                      $str_zip = "./7za" . $opt_pass . $pdf_pass . " a " . $arq_pdf_final . " " . $arq_pdf_out;
                }
                elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                {
                    chdir($this->Ini->path_third . "/zip/mac/bin");
                    $str_zip = "./7za" . $opt_pass . $pdf_pass . " a " . $arq_pdf_final . " " . $arq_pdf_out;
                }
                if (!empty($str_zip)) {
                    exec($str_zip);
                }
                if (is_file($arq_pdf_final)) 
                {
                    unlink($arq_pdf_out);
                }
            }
            elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['use_pass_pdf']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['use_pass_pdf']))
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                {
                    $dir_qpdf = "/qpdf/win/bin";
                    $str_cmd_qpdf = "qpdf.exe ";
                }
                elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                {
                    if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                    {
                        $dir_qpdf = "/qpdf/linux-i386";
                        $str_cmd_qpdf = "./qpdf-linux-x86 ";
                    }
                    else
                    {
                        $dir_qpdf = "/qpdf/linux-amd64";
                        $str_cmd_qpdf = "./qpdf-linux-amd64 ";
                    }
                }
                elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                {
                    $dir_qpdf = "/qpdf/osx";
                    $str_cmd_qpdf = "./qpdf-darwin-x86 ";
                }
                if (is_dir($this->Ini->path_third . $dir_qpdf)) 
                {
                    chdir($this->Ini->path_third . $dir_qpdf);
                    $pdf_pass  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['use_pass_pdf'];
                    $str_cmd_qpdf .= "--encrypt " . $pdf_pass . " " . $pdf_pass . " 256 -- " . $arq_pdf_out . " " . $arq_pdf_final;
                    exec($str_cmd_qpdf);
                    if (is_file($arq_pdf_final)) 
                    {
                        unlink($arq_pdf_out);
                    }
                }
            }
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['contr_array_resumo'] = '';
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['contr_total_geral']  = '';
            // ----- PDF log
            $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . str_replace(array(".pdf",".zip"), array("",""), $nm_arquivo_pdf_base) . '.log', 'w');
            if ($fp)
            {
                @fwrite($fp, $str_execcmd . "\r\n\r\n");
                @fwrite($fp, implode("\r\n", $arr_execcmd));
                @fwrite($fp, $str_cmd_qpdf . "\r\n\r\n");
                @fwrite($fp, $str_zip . "\r\n\r\n");
                @fclose($fp);
            }
            if ($this->Ini->sc_export_ajax)
            {
                $this->Arr_result['file_export']  = NM_charset_to_utf8($nm_arquivo_pdf_serv);
                $this->Arr_result['title_export'] = NM_charset_to_utf8(substr($nm_arquivo_pdf_base, 1));
                $Temp = ob_get_clean();
                if ($Temp !== false && trim($Temp) != "")
                {
                    $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
                }
                $oJson = new Services_JSON();
                echo $oJson->encode($this->Arr_result);
                exit;
            }
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
               $_SESSION['scriptcase']['charset_html'] = (isset($this->Ini->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->Ini->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $this->grid->progress_fp = fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp', 'a');
                    if ($this->grid->progress_fp)
                    {
                         $lang_protect = $this->Ini->Nm_lang['lang_pdff_fnsh'];
                         if (!NM_is_utf8($lang_protect))
                         {
                             $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                          }
                        grid_facturaven_pos_rapida_pdf_progress_call($this->grid->progress_tot . "_#NM#_" . ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
                        grid_facturaven_pos_rapida_pdf_progress_call("off\n", $this->Ini->Nm_lang);
                        fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n");
                        fwrite($this->grid->progress_fp, "off\n");
                        fclose($this->grid->progress_fp);
                    }
                }
            }
unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_file']);
if (is_file($nm_arquivo_pdf_serv))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['pdf_file'] = $nm_arquivo_pdf_serv;
}
$NM_volta  = "volta_grid";
$NM_target = "_parent";
if ($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['pdf_res'])
{
  $NM_volta  = "resumo";
  $NM_target = "_self";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Ventas Pos al día: :: PDF</TITLE>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php 
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
 ?> 
 <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
 <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY>
<?php echo $this->Ini->Ajax_result_set ?>
<table class="scGridTabela" valign="top"><tr class="scGridFieldOddVert"><td>
<?php
}
                    $rRFP = fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp', "w");
                    fwrite($rRFP, "PDF\n");
                    fwrite($rRFP, "\n");
                    fwrite($rRFP, "\n");
                    fwrite($rRFP, "100\n");
                    fwrite($rRFP, 1 . "_#NM#_" . $this->Ini->Nm_lang['lang_pdff_gnrt'] . "...\n");
                    fwrite($rRFP, 100 . "_#NM#_" . $this->Ini->Nm_lang['lang_pdff_fnsh'] . "...\n");
                    fwrite($rRFP, "off\n");
                    fclose($rRFP);
$downloadFileName = "grid_facturaven_pos_rapida.pdf";
if ($this->pdf_zip == 'S') {
    $nm_arquivo_pdf_serv = str_replace('.pdf', '.zip', $nm_arquivo_pdf_serv);
    $nm_arquivo_pdf_url = str_replace('.pdf', '.zip', $nm_arquivo_pdf_url);
    $downloadFileName = str_replace('.pdf', '.zip', $downloadFileName);
}
if (!is_file($nm_arquivo_pdf_serv))
{
?>
  <br><b><?php echo $this->Ini->Nm_lang['lang_pdff_errg']; ?></b></td></tr></table>
<script type="text/javascript">
if (window.parent && typeof window.parent.displayErrorPdf === "function") {
    window.parent.displayErrorPdf("<?php echo $this->Ini->Nm_lang['lang_pdff_errg']; ?>");
}
</script>
<?php
}
else
{
?>
<?php echo $this->Ini->Nm_lang['lang_pdff_file_loct']; ?>
<BR>
<A href="<?php echo $nm_arquivo_pdf_url; ?>" target="_blank" class="scGridPageLink"><B><?php echo $nm_arquivo_pdf_url; ?></B></A>.
<BR>
<?php echo $this->Ini->Nm_lang['lang_pdff_clck_mesg']; ?>
</td></tr></table>
<script type="text/javascript">
if (window.parent && typeof window.parent.updateGeneratedPdfFile === "function") {
    window.parent.updateGeneratedPdfFile("<?php echo $nm_arquivo_pdf_url; ?>");
}
</script>
<?php
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida'][md5("newpdf_" . $downloadFileName)][0] = $nm_arquivo_pdf_url;
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida'][md5("newpdf_" . $downloadFileName)][1] = $downloadFileName;
}
   echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "sc_b_sai", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<FORM name="F0" method=post action="./" target="<?php echo $NM_target; ?>"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($NM_volta); ?>"> 
</FORM>
</td></tr></table>
</BODY>
</HTML>
<?php
         }
      }
   } 
   function Eliminar() 
   {
      global 
      $nm_apl_dependente;
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
        <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_POST['nm_run_opt_sel'])) ? explode(";", $_POST['nm_run_opt_sel']) : array();
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run'][$Run_register];
       $this->asentada = $this->rs_grid->fields[0] ;  
       $this->asentada = (string)$this->asentada;
       $this->credito = $this->rs_grid->fields[1] ;  
       $this->credito = (string)$this->credito;
       $this->tipo = $this->rs_grid->fields[2] ;  
       $this->resolucion = $this->rs_grid->fields[3] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->numfacven = $this->rs_grid->fields[4] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->fechaven = $this->rs_grid->fields[5] ;  
       $this->idcli = $this->rs_grid->fields[6] ;  
       $this->idcli = (string)$this->idcli;
       $this->total = $this->rs_grid->fields[7] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
       $this->total = (string)$this->total;
       $this->vendedor = $this->rs_grid->fields[8] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->banco = $this->rs_grid->fields[9] ;  
       $this->banco = (string)$this->banco;
       $this->idfacven = $this->rs_grid->fields[10] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->fechavenc = $this->rs_grid->fields[11] ;  
       $this->subtotal = $this->rs_grid->fields[12] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[13] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[14] ;  
       $this->observaciones = $this->rs_grid->fields[15] ;  
       $this->saldo = $this->rs_grid->fields[16] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[17] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[18] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[19] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->creado = $this->rs_grid->fields[20] ;  
       $this->editado = $this->rs_grid->fields[21] ;  
       $this->usuario_crea = $this->rs_grid->fields[22] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->cod_cuenta = $this->rs_grid->fields[23] ;  
       $this->dias_decredito = $this->rs_grid->fields[24] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->enviada_a_tns = $this->rs_grid->fields[25] ;  
       $this->factura_tns = $this->rs_grid->fields[26] ;  
      $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  if($this->pagada =="NO" and ($this->asentada =="0" or empty($this->asentada )))
{
	$vpj = "";
	 
      $nm_select = "select prefijo from resdian where Idres='".$this->resolucion  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vprefijo = array();
     if ($this->resolucion !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vprefijo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vprefijo = false;
          $this->vprefijo_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->vprefijo[0][0]))
	{
		$vpj = $this->vprefijo[0][0];
	}
	 
      $nm_select = "select iddet from detalleventa where numfac='".$this->idfacven  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vItemsVenta = array();
      $this->vitemsventa = array();
     if ($this->idfacven !== "")
     { 
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
                        $this->vItemsVenta[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vitemsventa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vItemsVenta = false;
          $this->vItemsVenta_erro = $this->Db->ErrorMsg();
          $this->vitemsventa = false;
          $this->vitemsventa_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	
	if(isset($this->vitemsventa[0][0]))
	{
			
		for($i=0;$i<count($this->vitemsventa );$i++)
		{
			$iddet = $this->vitemsventa[$i][0];

			 
      $nm_select = "select idpro, cantidad,numfac from detalleventa where iddet='".$iddet."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatos = array();
      $this->vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatos = false;
          $this->vDatos_erro = $this->Db->ErrorMsg();
          $this->vdatos = false;
          $this->vdatos_erro = $this->Db->ErrorMsg();
      } 
;

			if(isset($this->vdatos[0][0]))
			{
				$idfactura = $this->idfacven ;

				 
      $nm_select = "select idgrup from productos where idprod='".$this->vdatos[0][0] ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vGrupo = array();
      $this->vgrupo = array();
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
                        $this->vGrupo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vgrupo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vGrupo = false;
          $this->vGrupo_erro = $this->Db->ErrorMsg();
          $this->vgrupo = false;
          $this->vgrupo_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->vgrupo[0][0]))
				{
					$gru = $this->vgrupo[0][0];

					if($gru != 1)
					{
						$this->fGestionaStock($iddet,1);
					}
				}
			}

			$vsql = "delete from detalleventa where iddet='".$iddet."'";
			
     $nm_select = $vsql; 
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
	
	
	
     $nm_select = "delete from facturaven where idfacven='".$this->idfacven  ."'"; 
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
	
     $nm_select = "delete from inventario where nufacvta='".$this->idfacven  ."'"; 
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
	
	
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='ELIMINAR',observaciones='Se eliminó la factura: ".$vpj."/".$this->numfacven  ."'"; 
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
else
{
	
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='OTRO',observaciones='Se intentó eliminar la factura: ".$vpj."/".$this->numfacven  ."'"; 
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
		
	echo "NO SE PUEDE ELIMINAR LA FACTURA : ".$vpj."/".$this->numfacven ." PORQUE ESTÁ ASENTADA.<br>";	
}
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
}  
    $this->NM_buffer = ob_get_contents();
    if (!empty($this->NM_buffer))
    {
        ob_end_flush();
    }
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
<?php
    if (!empty($this->NM_buffer))
    {
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "document.F4.submit();";
        echo "</script>";
    }
?>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
   function Reversar() 
   {
      global 
      $nm_apl_dependente;
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
        <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_POST['nm_run_opt_sel'])) ? explode(";", $_POST['nm_run_opt_sel']) : array();
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run'][$Run_register];
       $this->asentada = $this->rs_grid->fields[0] ;  
       $this->asentada = (string)$this->asentada;
       $this->credito = $this->rs_grid->fields[1] ;  
       $this->credito = (string)$this->credito;
       $this->tipo = $this->rs_grid->fields[2] ;  
       $this->resolucion = $this->rs_grid->fields[3] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->numfacven = $this->rs_grid->fields[4] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->fechaven = $this->rs_grid->fields[5] ;  
       $this->idcli = $this->rs_grid->fields[6] ;  
       $this->idcli = (string)$this->idcli;
       $this->total = $this->rs_grid->fields[7] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
       $this->total = (string)$this->total;
       $this->vendedor = $this->rs_grid->fields[8] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->banco = $this->rs_grid->fields[9] ;  
       $this->banco = (string)$this->banco;
       $this->idfacven = $this->rs_grid->fields[10] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->fechavenc = $this->rs_grid->fields[11] ;  
       $this->subtotal = $this->rs_grid->fields[12] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[13] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[14] ;  
       $this->observaciones = $this->rs_grid->fields[15] ;  
       $this->saldo = $this->rs_grid->fields[16] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[17] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[18] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[19] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->creado = $this->rs_grid->fields[20] ;  
       $this->editado = $this->rs_grid->fields[21] ;  
       $this->usuario_crea = $this->rs_grid->fields[22] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->cod_cuenta = $this->rs_grid->fields[23] ;  
       $this->dias_decredito = $this->rs_grid->fields[24] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->enviada_a_tns = $this->rs_grid->fields[25] ;  
       $this->factura_tns = $this->rs_grid->fields[26] ;  
      $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  $vpj = "";
 
      $nm_select = "select prefijo from resdian where Idres='".$this->resolucion  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vPrefijo = array();
      $this->vprefijo = array();
     if ($this->resolucion !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vPrefijo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vprefijo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vPrefijo = false;
          $this->vPrefijo_erro = $this->Db->ErrorMsg();
          $this->vprefijo = false;
          $this->vprefijo_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->vprefijo[0][0]))
{
$vpj = $this->vprefijo[0][0];
}

 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select monto,saldofac,nurecibo,str_replace (convert(char(10),fecharecibo,102), '.', '-') + ' ' + convert(char(8),fecharecibo,20) from recibocaja where resolucion='".$this->resolucion  ."' and nufac='".$this->numfacven  ."' and cliente='".$this->idcli  ."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select monto,saldofac,nurecibo,convert(char(23),fecharecibo,121) from recibocaja where resolucion='".$this->resolucion  ."' and nufac='".$this->numfacven  ."' and cliente='".$this->idcli  ."'"; 
      }
      else
      { 
          $nm_select = "select monto,saldofac,nurecibo,fecharecibo from recibocaja where resolucion='".$this->resolucion  ."' and nufac='".$this->numfacven  ."' and cliente='".$this->idcli  ."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiRC = array();
      $this->vsirc = array();
     if ($this->resolucion !== "" && $this->numfacven !== "" && $this->idcli !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiRC[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsirc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiRC = false;
          $this->vSiRC_erro = $this->Db->ErrorMsg();
          $this->vsirc = false;
          $this->vsirc_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if(isset($this->vsirc[0][0]))
{
	$nrc = $this->vsirc[0][2];
	$nfc = $this->vsirc[0][3];
	$nfc = date_create($nfc);
	$nfc = date_format($nfc,"d/m/Y");
	
	echo "No se puede reversar el documento: ".$this->tipo ."/".$vpj."/".$this->numfacven ." porque tiene recibo de caja No: ".$nrc.", con fecha: ".$nfc.".<br>";
}
else
{
	
	 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select concat(prefijo,'/',numero) as sc_alias_0, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20) from terceros_cuentas where cod_cuenta='".$this->cod_cuenta  ."' and tipo='RC'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select concat(prefijo,'/',numero) as sc_alias_0, convert(char(23),fecha,121) from terceros_cuentas where cod_cuenta='".$this->cod_cuenta  ."' and tipo='RC'"; 
      }
      else
      { 
          $nm_select = "select concat(prefijo,'/',numero),fecha from terceros_cuentas where cod_cuenta='".$this->cod_cuenta  ."' and tipo='RC'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDoc = array();
      $this->vsidoc = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiDoc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsidoc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDoc = false;
          $this->vSiDoc_erro = $this->Db->ErrorMsg();
          $this->vsidoc = false;
          $this->vsidoc_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vsidoc[0][0]))
	{
		$nrc = $this->vsidoc[0][0];
		$nfc = $this->vsidoc[0][1];
		$nfc = date_create($nfc);
		$nfc = date_format($nfc,"d/m/Y");

		echo "No se puede reversar el documento: ".$this->tipo ."/".$vpj."/".$this->numfacven ." porque tiene documento en cartera No: ".$nrc.", con fecha: ".$nfc.".<br>";
	}
	else
	{

		if($this->enviada_a_tns =="NO")
		{
			$this->fAsentar($this->idfacven ,"NO",0,0,false);	
			
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='OTRO',observaciones='Se reversó la factura: ".$vpj."/".$this->numfacven  ."'"; 
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
		else
		{

			 
      $nm_select = "select kardexid,fecasentad from kardex where codcomp||codprefijo||numero='".$this->factura_tns  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiAsentadaTNS = array();
      $this->vsiasentadatns = array();
      if ($SCrx = $this->Ini->nm_db_conn_firebird->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiAsentadaTNS[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiasentadatns[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiAsentadaTNS = false;
          $this->vSiAsentadaTNS_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
          $this->vsiasentadatns = false;
          $this->vsiasentadatns_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
      } 
;

			if(!isset($this->vsiasentadatns[0][1]))
			{
				
     $nm_select = "delete from kardex where codcomp||codprefijo||numero='".$this->factura_tns  ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_firebird->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_firebird->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;
				$this->fAsentar($this->idfacven ,"NO",0,0,false);
				
     $nm_select = "update facturaven set enviada_a_tns='NO',fecha_a_tns=null,factura_tns=null where idfacven='".$this->idfacven  ."'"; 
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

				
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='OTRO',observaciones='Se reversó la factura: ".$vpj."/".$this->numfacven  ."'"; 
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
			else
			{
				echo "No se puede reversar el documento: ".$this->factura_tns ." porque ya esta asentada en TNS.<br>";
			}
		}
	}
}
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
}  
    $this->NM_buffer = ob_get_contents();
    if (!empty($this->NM_buffer))
    {
        ob_end_flush();
    }
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
<?php
    if (!empty($this->NM_buffer))
    {
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "document.F4.submit();";
        echo "</script>";
    }
?>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
   function Asentar() 
   {
      global 
      $nm_apl_dependente;
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
        <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_POST['nm_run_opt_sel'])) ? explode(";", $_POST['nm_run_opt_sel']) : array();
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run'][$Run_register];
       $this->asentada = $this->rs_grid->fields[0] ;  
       $this->asentada = (string)$this->asentada;
       $this->credito = $this->rs_grid->fields[1] ;  
       $this->credito = (string)$this->credito;
       $this->tipo = $this->rs_grid->fields[2] ;  
       $this->resolucion = $this->rs_grid->fields[3] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->numfacven = $this->rs_grid->fields[4] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->fechaven = $this->rs_grid->fields[5] ;  
       $this->idcli = $this->rs_grid->fields[6] ;  
       $this->idcli = (string)$this->idcli;
       $this->total = $this->rs_grid->fields[7] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
       $this->total = (string)$this->total;
       $this->vendedor = $this->rs_grid->fields[8] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->banco = $this->rs_grid->fields[9] ;  
       $this->banco = (string)$this->banco;
       $this->idfacven = $this->rs_grid->fields[10] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->fechavenc = $this->rs_grid->fields[11] ;  
       $this->subtotal = $this->rs_grid->fields[12] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[13] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[14] ;  
       $this->observaciones = $this->rs_grid->fields[15] ;  
       $this->saldo = $this->rs_grid->fields[16] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[17] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[18] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[19] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->creado = $this->rs_grid->fields[20] ;  
       $this->editado = $this->rs_grid->fields[21] ;  
       $this->usuario_crea = $this->rs_grid->fields[22] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->cod_cuenta = $this->rs_grid->fields[23] ;  
       $this->dias_decredito = $this->rs_grid->fields[24] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->enviada_a_tns = $this->rs_grid->fields[25] ;  
       $this->factura_tns = $this->rs_grid->fields[26] ;  
      $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  $vpj = "";
 
      $nm_select = "select prefijo from resdian where Idres='".$this->resolucion  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vPrefijo = array();
      $this->vprefijo = array();
     if ($this->resolucion !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vPrefijo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vprefijo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vPrefijo = false;
          $this->vPrefijo_erro = $this->Db->ErrorMsg();
          $this->vprefijo = false;
          $this->vprefijo_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->vprefijo[0][0]))
{
$vpj = $this->vprefijo[0][0];
}

if($this->asentada ==0)
{
	if($this->total >0)
	{
		 
      $nm_select = "select iddet from detalleventa where numfac='".$this->idfacven  ."' limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDetalle = array();
      $this->vsidetalle = array();
     if ($this->idfacven !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsidetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDetalle = false;
          $this->vSiDetalle_erro = $this->Db->ErrorMsg();
          $this->vsidetalle = false;
          $this->vsidetalle_erro = $this->Db->ErrorMsg();
      } 
     } 
;

		if(isset($this->vsidetalle[0][0]))
		{
			$this->fAsentar($this->idfacven ,"SI",$this->total ,0,false,true);
			

			if($this->credito ==2)
			{
				$this->fPagarFacVen($this->idfacven ,2,false);
			}
			
			
     $nm_select = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='OTRO',observaciones='Se asentó la factura: ".$vpj."/".$this->numfacven  ."'"; 
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
		else
		{
			echo "No se puede asentar el documento: ".$vpj."/".$this->numfacven ." porque no tiene detalle.<br>";
		}
	}
	else
	{
		echo "No se puede asentar el documento: ".$vpj."/".$this->numfacven ." porque el total esta en cero.<br>";
	}
}
else
{
	echo "No se puede asentar el documento: ".$vpj."/".$this->numfacven ." porque ya está asentada.<br>";
}
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
}  
    $this->NM_buffer = ob_get_contents();
    if (!empty($this->NM_buffer))
    {
        ob_end_flush();
    }
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
<?php
    if (!empty($this->NM_buffer))
    {
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "document.F4.submit();";
        echo "</script>";
    }
?>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
   function enviaratns() 
   {
      global 
      $nm_apl_dependente;
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
        <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_POST['nm_run_opt_sel'])) ? explode(";", $_POST['nm_run_opt_sel']) : array();
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run'][$Run_register];
       $this->asentada = $this->rs_grid->fields[0] ;  
       $this->asentada = (string)$this->asentada;
       $this->credito = $this->rs_grid->fields[1] ;  
       $this->credito = (string)$this->credito;
       $this->tipo = $this->rs_grid->fields[2] ;  
       $this->resolucion = $this->rs_grid->fields[3] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->numfacven = $this->rs_grid->fields[4] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->fechaven = $this->rs_grid->fields[5] ;  
       $this->idcli = $this->rs_grid->fields[6] ;  
       $this->idcli = (string)$this->idcli;
       $this->total = $this->rs_grid->fields[7] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
       $this->total = (string)$this->total;
       $this->vendedor = $this->rs_grid->fields[8] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->banco = $this->rs_grid->fields[9] ;  
       $this->banco = (string)$this->banco;
       $this->idfacven = $this->rs_grid->fields[10] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->fechavenc = $this->rs_grid->fields[11] ;  
       $this->subtotal = $this->rs_grid->fields[12] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[13] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[14] ;  
       $this->observaciones = $this->rs_grid->fields[15] ;  
       $this->saldo = $this->rs_grid->fields[16] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[17] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[18] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[19] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->creado = $this->rs_grid->fields[20] ;  
       $this->editado = $this->rs_grid->fields[21] ;  
       $this->usuario_crea = $this->rs_grid->fields[22] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->cod_cuenta = $this->rs_grid->fields[23] ;  
       $this->dias_decredito = $this->rs_grid->fields[24] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->enviada_a_tns = $this->rs_grid->fields[25] ;  
       $this->factura_tns = $this->rs_grid->fields[26] ;  
      $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
if (!isset($_SESSION['gcontador_grid_fe'])) {$_SESSION['gcontador_grid_fe'] = "";}
if (!isset($this->sc_temp_gcontador_grid_fe)) {$this->sc_temp_gcontador_grid_fe = (isset($_SESSION['gcontador_grid_fe'])) ? $_SESSION['gcontador_grid_fe'] : "";}
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  ?>
<style>		
		.formatotabla1{

			font-size:12px;
			font-family:Arial;
			border-collapse: collapse;
			width: 98%;
		}
		
		.formatotabla1 input{
			
			border: 1px solid white;
			text-align:center !important;
		}

		.formatotabla1 tr:nth-of-type(odd) { 
		  background: #fff; 
		}
		.formatotabla1 th { 
		  background: #333; 
		  color: white; 
		  font-weight: bold; 
		}
		.formatotabla1 td, th { 
		  padding: 2px; 
		  border: 1px solid #ccc; 
		  text-align: left;
		  cursor:pointer; 
		}
		
		
		.formatotabla2{

			font-size:16px;
			font-family:Arial;
			border-collapse: collapse;
		}
		
		.formatotabla2 input{
			
			border: 1px solid white;
			text-align:center !important;
		}

		.formatotabla2 tr:nth-of-type(odd) { 
		  background: #fff; 
		}
		.formatotabla2 th { 
		  background: #024674; 
		  color: white; 
		  font-weight: bold; 
		}
		.formatotabla2 td, th { 
		  padding: 5px; 
		  border: 1px solid #ccc; 
		  text-align: left;
		  cursor:pointer; 
		}
		.formatotabla2 tbody tr:hover { 
		  background:#024674;
		  color:white;
		}
	</style>
<?php

$vfechaven = $this->fechaven ;
$vfechaven = date_create($vfechaven);
$vfechaven = date_format($vfechaven,"d/m/Y");
$vpj       = "";
$aviso     = "";
$vdocumento= "";
$vbanco    = "00";
$simaster  = true;
$vdocumento_vendedor = "";


$vnumero = $this->numfacven ;
 
      $nm_select = "SELECT prefijo FROM resdian WHERE Idres = '".$this->resolucion  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vprefijo = array();
     if ($this->resolucion !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vprefijo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vprefijo = false;
          $this->vprefijo_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->vprefijo[0][0]))
{
$vnumero = $this->vprefijo[0][0]."/".$vnumero;
$vpj     = $this->vprefijo[0][0];
}

$vcliente = "";
 
      $nm_select = "select nombres,documento from terceros where idtercero='".$this->idcli  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vnombrecliente = array();
     if ($this->idcli !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vnombrecliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vnombrecliente = false;
          $this->vnombrecliente_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->vnombrecliente[0][0]))
{
$vcliente   = $this->vnombrecliente[0][0];
$vdocumento = $this->vnombrecliente[0][1];
}

 
      $nm_select = "select documento from terceros where idtercero='".$this->vendedor  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vvendedor = array();
     if ($this->vendedor !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vvendedor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vvendedor = false;
          $this->vvendedor_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->vvendedor[0][0]))
{
$vdocumento_vendedor = $this->vvendedor[0][0];
}

 
      $nm_select = "select codigo_banco from bancos where cajero='".$this->sc_temp_gidtercero."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vCajaPredeterminada = array();
      $this->vcajapredeterminada = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vCajaPredeterminada[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vcajapredeterminada[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vCajaPredeterminada = false;
          $this->vCajaPredeterminada_erro = $this->Db->ErrorMsg();
          $this->vcajapredeterminada = false;
          $this->vcajapredeterminada_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vcajapredeterminada[0][0]))
{
	$vbanco = $this->vcajapredeterminada[0][0];
}
else
{
	 
      $nm_select = "select b.codigo_banco from usuarios u inner join bancos b on u.banco_movil=b.idcaja_vta where u.tercero='".$this->sc_temp_gidtercero."' and u.banco_movil<>0"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vCajaUsuario = array();
      $this->vcajausuario = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vCajaUsuario[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vcajausuario[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vCajaUsuario = false;
          $this->vCajaUsuario_erro = $this->Db->ErrorMsg();
          $this->vcajausuario = false;
          $this->vcajausuario_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->vcajausuario[0][0]))
	{
	$vbanco = $this->vcajausuario[0][0];	
	}
}

if($this->sc_temp_gcontador_grid_fe==1)
{
	echo "<table class='formatotabla2' border='1' width='1200px'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>No</th>";
	echo "<th>FECHA</th>";
	echo "<th>FACTURA</th>";
	echo "<th>CLIENTE</th>";
	echo "<th>ESTADO</th>";
	echo "</tr>";
	echo "</thead>";
	
	echo "<tbody>";
}

if($this->asentada >0)
{
	
	 
      $nm_select = "select first 1 codprefijo from prefijo where codprefijo='".$vpj."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExistePJ = array();
      $this->vsiexistepj = array();
      if ($SCrx = $this->Ini->nm_db_conn_firebird->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiExistePJ[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiexistepj[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExistePJ = false;
          $this->vSiExistePJ_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
          $this->vsiexistepj = false;
          $this->vsiexistepj_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
      } 
;
	if(!isset($this->vsiexistepj[0][0]))
	{
		$aviso   .= "El prefijo: ".$vpj." no existe en tns. ";
		$simaster = false;
	}
	else
	{
	}
	
	if($vdocumento=="0000000")
	{
	$vdocumento = "00";
	}
	 
      $nm_select = "select terid from terceros where nit='".$vdocumento."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExisteCliente = array();
      $this->vsiexistecliente = array();
      if ($SCrx = $this->Ini->nm_db_conn_firebird->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiExisteCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiexistecliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExisteCliente = false;
          $this->vSiExisteCliente_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
          $this->vsiexistecliente = false;
          $this->vsiexistecliente_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
      } 
;
	if(!isset($this->vsiexistecliente[0][0]))
	{
		$aviso   .= "El cliente: ".$vdocumento." -- ".$vcliente." no existe en tns. ";
		$simaster = false;
		
		 
      $nm_select = "select idtercero,tipo_documento,direccion,tel_cel,observaciones,urlmail,creado,nombre1,nombre2,apellido1,apellido2,tipo from terceros where documento='".$vdocumento."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vTDatos = array();
      $this->vtdatos = array();
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
                        $this->vTDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vtdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vTDatos = false;
          $this->vTDatos_erro = $this->Db->ErrorMsg();
          $this->vtdatos = false;
          $this->vtdatos_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($this->vtdatos[0][0]))
		{
			$vcodigo          = $vdocumento;
			$vtipodoc         = "C";
			if($this->vtdatos[0][1]==31)
			{
			$vtipodoc = "N";
			}
			$vnombre_completo = $vcliente;
			$vdireccion       = $this->vtdatos[0][2];
			$vzona            = "1";
			$vtelefono        = $this->vtdatos[0][3];
			$vobservaciones   = $this->vtdatos[0][4];
			$vcorreo          = $this->vtdatos[0][5];
			$vfecha           = $this->vtdatos[0][6];
			$vfecha           = date_create($vfecha);
			$vfecha           = date_format($vfecha,"Y-m-d");
			$vclasificacion   = "1";
			$vciudad          = "NULL";
			$vnombretributario= $vnombre_completo;
			$vnombre          = "NULL";
			if(!empty($this->vtdatos[0][7]))
			{
			$vnombre = "'".$this->vtdatos[0][7]."'";
			}
			$vnombre2         = "NULL";
			if(!empty($this->vtdatos[0][8]))
			{
			$vnombre2 = "'".$this->vtdatos[0][8]."'";
			}
			$vapellido1       = "NULL";
			if(!empty($this->vtdatos[0][9]))
			{
			$vapellido1 = "'".$this->vtdatos[0][9]."'";
			}
			$vapellido2       = "NULL";
			if(!empty($this->vtdatos[0][10]))
			{
			$vapellido2 = "'".$this->vtdatos[0][10]."'";
			}
			$vnaturaleza      = "N";
			if($this->vtdatos[0][11]=="JUR")
			{
			$vnaturaleza = "J";
			}

			$vsql_cliente="INSERT INTO TERCEROS(NIT,TIPODOCIDEN,NITTRI,CIUDADREXP,NOMBRE,DIRECC1,DIRECC2,ZONA1,ZONA2,CIUDAD,TELEF1,TELEF2,REPLEG,CLIENTE,PROVEED,VENDED,COBRA,OBSERV,EMAIL,BEEPER,EMPBEEPER,CELULAR,EMPCELULAR,FECHCREAC,FECHACT,FECHULTCOM,VRULTCOM,NROULTCOM,FECHULTVEN,VRULTVEN,NROULTVEN,CLASIFICAID,MAXCREDCXP,MAXCREDCXC,PORRETEN,CTACLI,CTAPRO,CTARETCLI,CTARETPRO,CTARETSCLI,CTARETSPRO,FECNACI,CODRECIP,PORCRECIP,CONDUCTOR,TOMADOR,PROPIETARIO,EMPLEADO,INMPROPIETARIO,INMINQUILINO,CIUDANEID,CIUDADEXP,FIADOR,INACTIVO,NOMREGTRI,TARJETAPUNTOS,PORCRETVEN,NOMBRE1,NOMBRE2,APELLIDO1,APELLIDO2,OTRO,MOTIVODEVID,FECHINACTIVO,MAXCREDDIAS,NITTRIOFI,ACTECONOMICAID,MESA,MOSTRADOR,PORCRIVAC,PORCRIVAV,PORCRICAC,PORCRICAV,NATJURIDICA,BARRIOINID,FECAFILIA,PORCRCREEV,PORCRCREEC,TIPOCREEV,TIPOCREEC,NUMCUE,TIPCUE,ACTCOMERID,FECULTENVIO,CONSECTERWS,FECLEGAL,EMAILEMP,PAGWEB,ETERRITORIAL,LISTAPRECIOID,EXTLOCAL)VALUES('".$vcodigo."','".$vtipodoc."','".$vcodigo."','','".$vnombre_completo."','".$vdireccion."',NULL,'".$vzona."',NULL,'NDS','".$vtelefono."',NULL,NULL,'S','N','N','N','".$vobservaciones."','".$vcorreo."',NULL,NULL,NULL,NULL,'".$vfecha."','".$vfecha."',NULL,0,NULL,NULL,0,NULL,'".$vclasificacion."',0,0,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N','N','N','N',NULL,NULL,".$vciudad.",NULL,'N','','".$vnombretributario."',NULL,NULL,".$vnombre.",".$vnombre2.",".$vapellido1.",".$vapellido2.",'N',NULL,NULL,NULL,NULL,NULL,'N','N',NULL,NULL,NULL,NULL,'".$vnaturaleza."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NI',NULL,NULL)";


			
     $nm_select = $vsql_cliente; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_firebird->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_firebird->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;

			 
      $nm_select = "select nit from terceros where nit='".$vcodigo."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiTerceroTNS = array();
      $this->vsitercerotns = array();
      if ($SCrx = $this->Ini->nm_db_conn_firebird->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiTerceroTNS[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsitercerotns[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiTerceroTNS = false;
          $this->vSiTerceroTNS_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
          $this->vsitercerotns = false;
          $this->vsitercerotns_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
      } 
;
			
			if(isset($this->vsitercerotns[0][0]))
			{
			$simaster = true;
			}
		}
		
	}
	else
	{
	}
	
	if($vdocumento_vendedor=="0000000")
	{
	$vdocumento_vendedor = "00";
	}
	 
      $nm_select = "select terid from terceros where nit='".$vdocumento_vendedor."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExisteVendedor = array();
      $this->vsiexistevendedor = array();
      if ($SCrx = $this->Ini->nm_db_conn_firebird->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiExisteVendedor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiexistevendedor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExisteVendedor = false;
          $this->vSiExisteVendedor_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
          $this->vsiexistevendedor = false;
          $this->vsiexistevendedor_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
      } 
;
	if(!isset($this->vsiexistevendedor[0][0]))
	{
		$aviso   .= "El vendedor: ".$vdocumento_vendedor." no existe en tns. ";
		$simaster = false;
	}
	else
	{
	}
	
	 
      $nm_select = "select codigo from banco where codigo='".$vbanco."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExisteBanco = array();
      $this->vsiexistebanco = array();
      if ($SCrx = $this->Ini->nm_db_conn_firebird->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiExisteBanco[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiexistebanco[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExisteBanco = false;
          $this->vSiExisteBanco_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
          $this->vsiexistebanco = false;
          $this->vsiexistebanco_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
      } 
;
	if(!isset($this->vsiexistebanco[0][0]))
	{
		$aviso   .= "El Banco: ".$vbanco." no existe en tns. ";
		$simaster = false;
	}
	else
	{
	}
	
	if($simaster)
	{
		$vobsv    = "NULL";
		if(!empty($this->observaciones ))
		{
		$vobsv    = "'".$this->observaciones ."'";
		}
		$vperiodo = $this->fechaven ;
		$vperiodo = date_create($vperiodo);
		$vperiodo = date_format($vperiodo,"m");
		$vsucid   = "1";
		$vcodcomp = "FV";
		$vfpago   = "CO";
		if($this->credito =="1")
		{
		$vfpago = "CR";
		}
		$vdiascredito = "NULL";
		if($this->dias_decredito >0)
		{
		$vdiascredito = "'".$this->dias_decredito ."'";
		}
		$vhora = date("H:i");
		$vcantclientes = "1";
		$vfechaentregadoc = "NULL";
		$vfechaven2 = $this->fechaven ;
		$vusuario   = "ADMIN";
		$vfechavenc = "NULL";
		if(!empty($this->fechavenc ))
		{
		$vfechavenc = "'".$this->fechavenc ."'";
		}
		$vnumero2 = $this->numfacven ;
		
		 
      $nm_select = "select codcomp,codprefijo,numero,fecasentad from kardex where codcomp='".$vcodcomp."' and codprefijo='".$vpj."' and numero='".$vnumero2."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExisteFV = array();
      $this->vsiexistefv = array();
      if ($SCrx = $this->Ini->nm_db_conn_firebird->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiExisteFV[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiexistefv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExisteFV = false;
          $this->vSiExisteFV_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
          $this->vsiexistefv = false;
          $this->vsiexistefv_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
      } 
;
		
		if(!isset($this->vsiexistefv[0][0]))
		{
			
			$vsql2="INSERT INTO KARDEX(CODCOMP,CODPREFIJO,NUMERO,FECHA,FECASENTAD,OBSERV,PERIODO,CENID,AREADID,SUCID,CLIENTE, VENDEDOR,FORMAPAGO,PLAZODIAS,BCOID,TIPODOC,DOCUMENTO,CONCEPTO,FECVENCE,RETIVA,RETICA,RETFTE,AJUSTEBASE,AJUSTEIVA,AJUSTEIVAEXC,AJUSTENETO,VRBASE,VRIVA,VRICONSUMO,VRRFTE,VRRICA,VRRIVA,TOTAL,DOCUID,FPCONTADO,FPCREDITO,DESPACHAR_A,USUARIO, HORA,FACTORCONV,NROFACPROV,VEHICULOID,FECANULADO,DESXCAMBIO,DEVOLXCAMBIO,TIPOICA2ID,MONEDA,NROCONTROL, PRONTOPAGO,MOTIVODEVID,IMPRESA,HORACREA,PUNXVEN,EXPORTACION,ANTICIPO,IMPORTADO,HORACOMANDA,FECEMI,ANTICIPOADIC,RECIBOID,IMPNOTENT, MOTIVOCIERRE,CONTRATO,VRIVAEXC,PROPINA,CONTRATOINMID,CANTCLIENTES,PERIODOFACT,ANOFACT,CONTRATOID,APARTADO,FECHAENT,HORAENT,ASENTANDO,RETCREE,VRRCREE,TIPOCREEID,NROCOMVEN,NROFACTEQ)VALUES('".$vcodcomp."','".$vpj."','".$vnumero2."','".$vfechaven2."',NULL,".$vobsv.",'".$vperiodo."','1','1','".$vsucid."',coalesce((select c.terid from terceros c where c.nit='".$vdocumento."'),'1'),coalesce((select v.terid from terceros v where v.nit='".$vdocumento_vendedor."'),'1'),'".$vfpago."',".$vdiascredito.",coalesce((select bcoid from banco where codigo='".$vbanco."'),'1'),'',NULL,NULL,".$vfechavenc.",'0','0','0','0','0','0','0','0','0','0', '0','0','0','0',NULL,'0','0',coalesce((select c.terid from terceros c where   c.nit='".$vdocumento."'),'1'),'".$vusuario."','".$vhora."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'".$vhora."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,'".$vcantclientes."',NULL,NULL,NULL,NULL,".$vfechaentregadoc.",NULL,NULL,'0','0',NULL,NULL,NULL)";

			
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_firebird->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_firebird->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;
			
			 
      $nm_select = "select kardexid from kardex where codcomp='".$vcodcomp."' and  codprefijo='".$vpj."' and numero='".$vnumero2."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiKardex = array();
      $this->vsikardex = array();
      if ($SCrx = $this->Ini->nm_db_conn_firebird->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiKardex[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsikardex[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiKardex = false;
          $this->vSiKardex_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
          $this->vsikardex = false;
          $this->vsikardex_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
      } 
;
			
			if(isset($this->vsikardex[0][0]))
			{
				$vkardexid = $this->vsikardex[0][0];
				$vmatid    = "1";
				$vbodega   = "00";
				$vtipund   = "D";
				$vporciva  = "0";
				$vdescuento= "0";
				$vcantidad = "1";
				$vpreciolista = "0";
				$vpreciovta= "0";
				$vprecioneto  = "0";
				$vpreciobase  = "0";
				$vprecioiva= "0";
				$vparcvta  = "0";
				$vpreciotasa="0";
				
				 
      $nm_select = "select p.codigobar,d.unidadmayor,d.adicional, d.adicional1, d.cantidad, d.valorunit from detalleventa d inner join productos p on d.idpro=p.idprod where d.numfac='".$this->idfacven  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDetalle = array();
      $this->vsidetalle = array();
     if ($this->idfacven !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsidetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDetalle = false;
          $this->vSiDetalle_erro = $this->Db->ErrorMsg();
          $this->vsidetalle = false;
          $this->vsidetalle_erro = $this->Db->ErrorMsg();
      } 
     } 
;
				
				if(isset($this->vsidetalle[0][0]))
				{	
					for($a=0;$a<count($this->vsidetalle );$a++)
					{
						$vmatid = $this->vsidetalle[$a][0];

						if($this->vsidetalle[$a][1]=="SI")
						{
						$vtipund = "M";
						}

						$vporciva = intval($this->vsidetalle[$a][2]);

						$vdescuento = intval($this->vsidetalle[$a][3]);

						$vcantidad = $this->vsidetalle[$a][4];

						$vpreciovta   =  $this->vsidetalle[$a][5];						
						
						$vporcdes    = $vpreciovta*($vdescuento/100);
						$vpreciovta  = $vpreciovta-$vporcdes;
						
						$vprecioneto  =  $vpreciovta;
						$vpreciolista =  $this->vsidetalle[$a][5];
						$vpreciotasa  =  $this->vsidetalle[$a][5];

						$vpreciobase = $vpreciovta/((intval($vporciva)/100)+1);
						$vpreciobase = number_format($vpreciobase,2,'.','');
						$vprecioiva  = $vpreciobase*(intval($vporciva)/100);
						$vprecioiva  = number_format($vprecioiva,2,'.','');
						$vprecioneto = $vpreciovta;
						$vparcvta    = $vpreciovta*$vcantidad;

						$vsql_detalle = "INSERT INTO DEKARDEX (KARDEXID,MATID,BODID,PRIORIDAD,REMTOTFAC,TIPUND,PORCIVA,DESCUENTO,CANLISTA,CANMAT,PRECIOLISTA,PRECIOVTA,PRECIOBASE,PRECIOIVA,PRECIOEXCENTO,PRECIOICONSUMO,PRECIONETO,PARCVTA,PARCOSTO,SALCAN,SALCOST,DCTOADIC,IMPRESO,DESCUENTO3,SOBRANTE,FALTANTE,CAMBIO,CALIDAD,DESCUENTO4,TALLACOLOR,CONREM,TIPOVTA,DAJUSTEBASE,CENID,EXCLUIDO,REALID,IMPRESOP,PRECIOTASA,PARCTASA,CONTRATOINMID,FECMAXDEVRE)VALUES('".$vkardexid."',(select m.matid from material m where m.codigo='".$vmatid."'),(SELECT BODID FROM BODEGA WHERE CODIGO='".$vbodega."'),NULL,'0','".$vtipund."','".$vporciva."','".$vdescuento."','".$vcantidad."','".$vcantidad."','".$vpreciolista."','".$vpreciovta."','".$vpreciobase."','".$vprecioiva."','0','0','".$vprecioneto."','".$vparcvta."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'".$vpreciotasa."','0',NULL,NULL)";
						
						
     $nm_select = $vsql_detalle; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_firebird->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_firebird->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;
						
					}
					
					$aviso = "Agregada con éxito en TNS.";
						
					$vfechaatns  = date("Y-m-d H:i:s");
					$vfacturatns = "FV".$vpj.$vnumero2;
				}
			}

		}
		else
		{
			if(isset($this->vsiexistefv[0][3]))
			{
			$aviso = "La factura ya esta asentada en TNS, no se puede reescribir, primero reverse la factura en TNS.";
			}
			else
			{
			$aviso = "Factura sin asentar en TNS.";
				
			
     $nm_select = "delete from kardex where codcomp='".$vcodcomp."' and codprefijo='".$vpj."' and numero='".$vnumero2."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_firebird->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_firebird->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;
				
				$vsql2="INSERT INTO KARDEX(CODCOMP,CODPREFIJO,NUMERO,FECHA,FECASENTAD,OBSERV,PERIODO,CENID,AREADID,SUCID,CLIENTE, VENDEDOR,FORMAPAGO,PLAZODIAS,BCOID,TIPODOC,DOCUMENTO,CONCEPTO,FECVENCE,RETIVA,RETICA,RETFTE,AJUSTEBASE,AJUSTEIVA,AJUSTEIVAEXC,AJUSTENETO,VRBASE,VRIVA,VRICONSUMO,VRRFTE,VRRICA,VRRIVA,TOTAL,DOCUID,FPCONTADO,FPCREDITO,DESPACHAR_A,USUARIO, HORA,FACTORCONV,NROFACPROV,VEHICULOID,FECANULADO,DESXCAMBIO,DEVOLXCAMBIO,TIPOICA2ID,MONEDA,NROCONTROL, PRONTOPAGO,MOTIVODEVID,IMPRESA,HORACREA,PUNXVEN,EXPORTACION,ANTICIPO,IMPORTADO,HORACOMANDA,FECEMI,ANTICIPOADIC,RECIBOID,IMPNOTENT, MOTIVOCIERRE,CONTRATO,VRIVAEXC,PROPINA,CONTRATOINMID,CANTCLIENTES,PERIODOFACT,ANOFACT,CONTRATOID,APARTADO,FECHAENT,HORAENT,ASENTANDO,RETCREE,VRRCREE,TIPOCREEID,NROCOMVEN,NROFACTEQ)VALUES('".$vcodcomp."','".$vpj."','".$vnumero2."','".$vfechaven2."',NULL,".$vobsv.",'".$vperiodo."','1','1','".$vsucid."',coalesce((select c.terid from terceros c where c.nit='".$vdocumento."'),'1'),coalesce((select v.terid from terceros v where v.nit='".$vdocumento_vendedor."'),'1'),'".$vfpago."',".$vdiascredito.",coalesce((select bcoid from banco where codigo='".$vbanco."'),'1'),'',NULL,NULL,".$vfechavenc.",'0','0','0','0','0','0','0','0','0','0', '0','0','0','0',NULL,'0','0',coalesce((select c.terid from terceros c where   c.nit='".$vdocumento."'),'1'),'".$vusuario."','".$vhora."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'".$vhora."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,'".$vcantclientes."',NULL,NULL,NULL,NULL,".$vfechaentregadoc.",NULL,NULL,'0','0',NULL,NULL,NULL)";

				
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_firebird->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_firebird->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;

				 
      $nm_select = "select kardexid from kardex where codcomp='".$vcodcomp."' and  codprefijo='".$vpj."' and numero='".$vnumero2."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiKardex = array();
      $this->vsikardex = array();
      if ($SCrx = $this->Ini->nm_db_conn_firebird->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiKardex[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsikardex[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiKardex = false;
          $this->vSiKardex_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
          $this->vsikardex = false;
          $this->vsikardex_erro = $this->Ini->nm_db_conn_firebird->ErrorMsg();
      } 
;

				if(isset($this->vsikardex[0][0]))
				{
					$vkardexid = $this->vsikardex[0][0];
					$vmatid    = "1";
					$vbodega   = "00";
					$vtipund   = "D";
					$vporciva  = "0";
					$vdescuento= "0";
					$vcantidad = "1";
					$vpreciolista = "0";
					$vpreciovta= "0";
					$vprecioneto  = "0";
					$vpreciobase  = "0";
					$vprecioiva= "0";
					$vparcvta  = "0";
					$vpreciotasa="0";

					 
      $nm_select = "select p.codigobar,d.unidadmayor,d.adicional, d.adicional1, d.cantidad, d.valorunit from detalleventa d inner join productos p on d.idpro=p.idprod where d.numfac='".$this->idfacven  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDetalle = array();
      $this->vsidetalle = array();
     if ($this->idfacven !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsidetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDetalle = false;
          $this->vSiDetalle_erro = $this->Db->ErrorMsg();
          $this->vsidetalle = false;
          $this->vsidetalle_erro = $this->Db->ErrorMsg();
      } 
     } 
;

					if(isset($this->vsidetalle[0][0]))
					{	
						for($a=0;$a<count($this->vsidetalle );$a++)
						{
							$vmatid = $this->vsidetalle[$a][0];

							if($this->vsidetalle[$a][1]=="SI")
							{
							$vtipund = "M";
							}

							$vporciva = intval($this->vsidetalle[$a][2]);

							$vdescuento = intval($this->vsidetalle[$a][3]);

							$vcantidad = $this->vsidetalle[$a][4];

							$vpreciovta   =  $this->vsidetalle[$a][5];						

							$vporcdes    = $vpreciovta*($vdescuento/100);
							$vpreciovta  = $vpreciovta-$vporcdes;

							$vprecioneto  =  $vpreciovta;
							$vpreciolista =  $this->vsidetalle[$a][5];
							$vpreciotasa  =  $this->vsidetalle[$a][5];

							$vpreciobase = $vpreciovta/((intval($vporciva)/100)+1);
							$vpreciobase = number_format($vpreciobase,2,'.','');
							$vprecioiva  = $vpreciobase*(intval($vporciva)/100);
							$vprecioiva  = number_format($vprecioiva,2,'.','');
							$vprecioneto = $vpreciovta;
							$vparcvta    = $vpreciovta*$vcantidad;

							$vsql_detalle = "INSERT INTO DEKARDEX (KARDEXID,MATID,BODID,PRIORIDAD,REMTOTFAC,TIPUND,PORCIVA,DESCUENTO,CANLISTA,CANMAT,PRECIOLISTA,PRECIOVTA,PRECIOBASE,PRECIOIVA,PRECIOEXCENTO,PRECIOICONSUMO,PRECIONETO,PARCVTA,PARCOSTO,SALCAN,SALCOST,DCTOADIC,IMPRESO,DESCUENTO3,SOBRANTE,FALTANTE,CAMBIO,CALIDAD,DESCUENTO4,TALLACOLOR,CONREM,TIPOVTA,DAJUSTEBASE,CENID,EXCLUIDO,REALID,IMPRESOP,PRECIOTASA,PARCTASA,CONTRATOINMID,FECMAXDEVRE)VALUES('".$vkardexid."',(select m.matid from material m where m.codigo='".$vmatid."'),(SELECT BODID FROM BODEGA WHERE CODIGO='".$vbodega."'),NULL,'0','".$vtipund."','".$vporciva."','".$vdescuento."','".$vcantidad."','".$vcantidad."','".$vpreciolista."','".$vpreciovta."','".$vpreciobase."','".$vprecioiva."','0','0','".$vprecioneto."','".$vparcvta."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'".$vpreciotasa."','0',NULL,NULL)";

							
     $nm_select = $vsql_detalle; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_firebird->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_firebird->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;

						}
						
						$aviso = "Se reescribió la factura en TNS con éxito.";
						
						$vfechaatns  = date("Y-m-d H:i:s");
						$vfacturatns = "FV".$vpj.$vnumero2;

					}
				}
			}
			
		}
	}
	
	echo "<tr>";
	
	echo "<td>";
	echo $this->sc_temp_gcontador_grid_fe;
	echo "</td>";
	
	echo "<td>";
	echo $vfechaven;
	echo "</td>";
	
	echo "<td>";
	echo $vnumero;
	echo "</td>";
	
	echo "<td>";
	echo $vcliente;
	echo "</td>";
	
	echo "<td>";
	echo "<p>".$aviso."</p>";
	echo "</td>";
	
	echo "</tr>";
}
else
{
	echo "<tr>";
	
	echo "<td>";
	echo $this->sc_temp_gcontador_grid_fe;
	echo "</td>";
	
	echo "<td>";
	echo $vfechaven;
	echo "</td>";
	
	echo "<td>";
	echo $vnumero;
	echo "</td>";
	
	echo "<td>";
	echo $vcliente;
	echo "</td>";
	
	echo "<td>";
	echo "No se puede exportar a TNS una factura sin asentar.";
	echo "</td>";
	
	echo "</tr>";
}

$this->sc_temp_gcontador_grid_fe++;
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_gcontador_grid_fe)) {$_SESSION['gcontador_grid_fe'] = $this->sc_temp_gcontador_grid_fe;}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
if (!isset($_SESSION['gcontador_grid_fe'])) {$_SESSION['gcontador_grid_fe'] = "";}
if (!isset($this->sc_temp_gcontador_grid_fe)) {$this->sc_temp_gcontador_grid_fe = (isset($_SESSION['gcontador_grid_fe'])) ? $_SESSION['gcontador_grid_fe'] : "";}
  if($this->sc_temp_gcontador_grid_fe>1)
{
	echo "</tbody>";
	echo "</table>";
}

if (isset($this->sc_temp_gcontador_grid_fe)) {$_SESSION['gcontador_grid_fe'] = $this->sc_temp_gcontador_grid_fe;}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
}  
    $this->NM_buffer = ob_get_contents();
    if (!empty($this->NM_buffer))
    {
        ob_end_flush();
    }
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
<?php
    if (!empty($this->NM_buffer))
    {
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "document.F4.submit();";
        echo "</script>";
    }
?>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
   function generar_contabilidad_tns() 
   {
      global 
      $nm_apl_dependente;
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
        <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_POST['nm_run_opt_sel'])) ? explode(";", $_POST['nm_run_opt_sel']) : array();
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['sc_sql_btn_run'][$Run_register];
       $this->asentada = $this->rs_grid->fields[0] ;  
       $this->asentada = (string)$this->asentada;
       $this->credito = $this->rs_grid->fields[1] ;  
       $this->credito = (string)$this->credito;
       $this->tipo = $this->rs_grid->fields[2] ;  
       $this->resolucion = $this->rs_grid->fields[3] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->numfacven = $this->rs_grid->fields[4] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->fechaven = $this->rs_grid->fields[5] ;  
       $this->idcli = $this->rs_grid->fields[6] ;  
       $this->idcli = (string)$this->idcli;
       $this->total = $this->rs_grid->fields[7] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
       $this->total = (string)$this->total;
       $this->vendedor = $this->rs_grid->fields[8] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->banco = $this->rs_grid->fields[9] ;  
       $this->banco = (string)$this->banco;
       $this->idfacven = $this->rs_grid->fields[10] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->fechavenc = $this->rs_grid->fields[11] ;  
       $this->subtotal = $this->rs_grid->fields[12] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[13] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[14] ;  
       $this->observaciones = $this->rs_grid->fields[15] ;  
       $this->saldo = $this->rs_grid->fields[16] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[17] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[18] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[19] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->creado = $this->rs_grid->fields[20] ;  
       $this->editado = $this->rs_grid->fields[21] ;  
       $this->usuario_crea = $this->rs_grid->fields[22] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->cod_cuenta = $this->rs_grid->fields[23] ;  
       $this->dias_decredito = $this->rs_grid->fields[24] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->enviada_a_tns = $this->rs_grid->fields[25] ;  
       $this->factura_tns = $this->rs_grid->fields[26] ;  
      $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
   
      $nm_select = "select habilitar_comprobantes from configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiHabilitar = array();
      $this->vsihabilitar = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiHabilitar[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsihabilitar[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiHabilitar = false;
          $this->vSiHabilitar_erro = $this->Db->ErrorMsg();
          $this->vsihabilitar = false;
          $this->vsihabilitar_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vsihabilitar[0][0]))
{
	if($this->vsihabilitar[0][0]=='SI')
	{
		 
      $nm_select = "select c.idcomprobante from comprobantes c where c.tipo='".$this->tipo  ."' and c.prefijo=(select r.prefijo from resdian r where r.Idres='".$this->resolucion  ."') and c.numero='".$this->numfacven  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExisteComprobante = array();
      $this->vsiexistecomprobante = array();
     if ($this->resolucion !== "" && $this->numfacven !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiExisteComprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiexistecomprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExisteComprobante = false;
          $this->vSiExisteComprobante_erro = $this->Db->ErrorMsg();
          $this->vsiexistecomprobante = false;
          $this->vsiexistecomprobante_erro = $this->Db->ErrorMsg();
      } 
     } 
;
		
		if(!isset($this->vsiexistecomprobante[0][0]))
		{
			
     $nm_select = "insert into comprobantes set tipo='".$this->tipo  ."', prefijo=(select r.prefijo from resdian r where r.Idres='".$this->resolucion  ."'), numero='".$this->numfacven  ."', fecha='".$this->fechaven  ."', observaciones=(select t.nombres from terceros t where t.idtercero='".$this->idcli  ."'), total_debito='".$this->total  ."', total_credito='".$this->total  ."', asentada=1, periodo=MONTH('".$this->fechaven  ."'), sucursal=1, importado='NO', usuario='".$this->vendedor  ."'"; 
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
			
			 
      $nm_select = "select c.idcomprobante from comprobantes c where c.tipo='".$this->tipo  ."' and c.prefijo=(select r.prefijo from resdian r where r.Idres='".$this->resolucion  ."') and c.numero='".$this->numfacven  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiComprobante = array();
      $this->vsicomprobante = array();
     if ($this->resolucion !== "" && $this->numfacven !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiComprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsicomprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiComprobante = false;
          $this->vSiComprobante_erro = $this->Db->ErrorMsg();
          $this->vsicomprobante = false;
          $this->vsicomprobante_erro = $this->Db->ErrorMsg();
      } 
     } 
;

			if(isset($this->vsicomprobante[0][0]))
			{
				$vidcomprobante = $this->vsicomprobante[0][0];
					
				if($this->credito ==2)
				{
					$vsql = "select dc.plan_cuenta from comprobantes_detalle dc where dc.plan_cuenta=(select b.puc from bancos b where b.idcaja_vta='".$this->banco ."') and dc.comprobante='".$vidcomprobante."' and c.numero='".$this->numfacven ."'";
					
					 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDetalle = array();
      $this->vsidetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsidetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDetalle = false;
          $this->vSiDetalle_erro = $this->Db->ErrorMsg();
          $this->vsidetalle = false;
          $this->vsidetalle_erro = $this->Db->ErrorMsg();
      } 
;
					
					if(!isset($this->vsidetalle[0][0]))
					{
						
     $nm_select = "insert into comprobantes_detalle set comprobante='".$vidcomprobante."', plan_cuenta=(select b.puc from bancos b where b.idcaja_vta='".$this->banco  ."'), valor='".$this->total  ."', tipo='debito', tercero='".$this->idcli  ."', observacion=concat('Factura de Venta No. ',(select r.prefijo from resdian r where r.Idres='".$this->resolucion  ."'),'".$this->numfacven  ."'), trifa='0', valor_iva='0', base='0', centro_costo='1'"; 
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
				
				if($this->credito ==1)
				{
					$vsql = "select dc.plan_cuenta from comprobantes_detalle dc where dc.plan_cuenta=(select t.puc_auxiliar_deudores from terceros t where t.idtercero='".$this->idcli ."') and dc.comprobante='".$vidcomprobante."' and c.numero='".$this->numfacven ."'";
					
					 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDetalle = array();
      $this->vsidetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsidetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDetalle = false;
          $this->vSiDetalle_erro = $this->Db->ErrorMsg();
          $this->vsidetalle = false;
          $this->vsidetalle_erro = $this->Db->ErrorMsg();
      } 
;
					
					if(!isset($this->vsidetalle[0][0]))
					{
						
     $nm_select = "insert into comprobantes_detalle set comprobante='".$vidcomprobante."', plan_cuenta=(select t.puc_auxiliar_deudores from terceros t where t.idtercero='".$this->idcli  ."'), valor='".$this->total  ."', tipo='debito', tercero='".$this->idcli  ."', observacion=concat('Factura de Venta No. ',(select r.prefijo from resdian r where r.Idres='".$this->resolucion  ."'),'".$this->numfacven  ."'), trifa='0', valor_iva='0', base='0', centro_costo='1'"; 
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
				
				
				$vsql2 = "select g.puc_ingresos,sum(d.valorpar) from detalleventa d inner join productos p on d.idpro=p.idprod inner join grupos_contables g on p.cod_cuenta=g.codigo where d.numfac='".$this->idfacven ."'";
				
				 
      $nm_select = $vsql2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vpucs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vpucs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vpucs = false;
          $this->vpucs_erro = $this->Db->ErrorMsg();
      } 
;
				
				if(isset($this->vpucs[0][0]))
				{
					$vcant = count($this->vpucs );
					
					for($i=0;$i<$vcant;$i++)
					{
						$vplan  = $this->vpucs[$i][0];
						$vvalor = $this->vpucs[$i][1];  	
						
						$vsql3 = "insert into comprobantes_detalle set comprobante='".$vidcomprobante."', plan_cuenta='".$vplan."', valor='".$vvalor."', tipo='credito', tercero='".$this->idcli ."', observacion=concat('Factura de Venta No. ',(select r.prefijo from resdian r where r.Idres='".$this->resolucion ."'),'".$this->numfacven ."'), tipo_documento='FV', numero_documento=concat((select r.prefijo from resdian r where r.Idres='".$this->resolucion ."'),'".$this->numfacven ."'), trifa='0', valor_iva='0', base='0', centro_costo='1'";
						
						
     $nm_select = $vsql3; 
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
			}
		}
		else
		{
			$vidcomprobante = $this->vsiexistecomprobante[0][0];
			
     $nm_select = "delete from comprobantes_detalle where comprobante='".$vidcomprobante."'"; 
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
			
     $nm_select = "delete from comprobantes where idcomprobante='".$vidcomprobante."'"; 
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
			
			
     $nm_select = "insert into comprobantes set tipo='".$this->tipo  ."', prefijo=(select r.prefijo from resdian r where r.Idres='".$this->resolucion  ."'), numero='".$this->numfacven  ."', fecha='".$this->fechaven  ."', observaciones=(select t.nombres from terceros t where t.idtercero='".$this->idcli  ."'), total_debito='".$this->total  ."', total_credito='".$this->total  ."', asentada=1, periodo=MONTH('".$this->fechaven  ."'), sucursal=1, importado='NO', usuario='".$this->vendedor  ."'"; 
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
			
			 
      $nm_select = "select c.idcomprobante from comprobantes c where c.tipo='".$this->tipo  ."' and c.prefijo=(select r.prefijo from resdian r where r.Idres='".$this->resolucion  ."') and c.numero='".$this->numfacven  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiComprobante = array();
      $this->vsicomprobante = array();
     if ($this->resolucion !== "" && $this->numfacven !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiComprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsicomprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiComprobante = false;
          $this->vSiComprobante_erro = $this->Db->ErrorMsg();
          $this->vsicomprobante = false;
          $this->vsicomprobante_erro = $this->Db->ErrorMsg();
      } 
     } 
;

			if(isset($this->vsicomprobante[0][0]))
			{
				if($this->credito ==2)
				{
					$vsql = "select dc.plan_cuenta from comprobantes_detalle dc where dc.plan_cuenta=(select b.puc from bancos b where b.idcaja_vta='".$this->banco ."') and dc.comprobante='".$vidcomprobante."' and c.numero='".$this->numfacven ."'";
					
					 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDetalle = array();
      $this->vsidetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsidetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDetalle = false;
          $this->vSiDetalle_erro = $this->Db->ErrorMsg();
          $this->vsidetalle = false;
          $this->vsidetalle_erro = $this->Db->ErrorMsg();
      } 
;
					
					if(!isset($this->vsidetalle[0][0]))
					{
						
     $nm_select = "insert into comprobantes_detalle set comprobante='".$vidcomprobante."', plan_cuenta=(select b.puc from bancos b where b.idcaja_vta='".$this->banco  ."'), valor='".$this->total  ."', tipo='debito', tercero='".$this->idcli  ."', observacion=concat('Factura de Venta No. ',(select r.prefijo from resdian r where r.Idres='".$this->resolucion  ."'),'".$this->numfacven  ."'), trifa='0', valor_iva='0', base='0', centro_costo='1'"; 
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
				
				if($this->credito ==1)
				{
					$vsql = "select dc.plan_cuenta from comprobantes_detalle dc where dc.plan_cuenta=(select t.puc_auxiliar_deudores from terceros t where t.idtercero='".$this->idcli ."') and dc.comprobante='".$vidcomprobante."' and c.numero='".$this->numfacven ."'";
					
					 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDetalle = array();
      $this->vsidetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsidetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDetalle = false;
          $this->vSiDetalle_erro = $this->Db->ErrorMsg();
          $this->vsidetalle = false;
          $this->vsidetalle_erro = $this->Db->ErrorMsg();
      } 
;
					
					if(!isset($this->vsidetalle[0][0]))
					{
						
     $nm_select = "insert into comprobantes_detalle set comprobante='".$vidcomprobante."', plan_cuenta=(select t.puc_auxiliar_deudores from terceros t where t.idtercero='".$this->idcli  ."'), valor='".$this->total  ."', tipo='debito', tercero='".$this->idcli  ."', observacion=concat('Factura de Venta No. ',(select r.prefijo from resdian r where r.Idres='".$this->resolucion  ."'),'".$this->numfacven  ."'), trifa='0', valor_iva='0', base='0', centro_costo='1'"; 
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
				
				$vsql2 = "select g.puc_ingresos,sum(d.valorpar) from detalleventa d inner join productos p on d.idpro=p.idprod inner join grupos_contables g on p.cod_cuenta=g.codigo where d.numfac='".$this->idfacven ."'";
				
				 
      $nm_select = $vsql2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vpucs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vpucs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vpucs = false;
          $this->vpucs_erro = $this->Db->ErrorMsg();
      } 
;
				
				if(isset($this->vpucs[0][0]))
				{
					$vcant = count($this->vpucs );
					
					for($i=0;$i<$vcant;$i++)
					{
						$vplan  = $this->vpucs[$i][0];
						$vvalor = $this->vpucs[$i][1];  	
						
						$vsql3 = "insert into comprobantes_detalle set comprobante='".$vidcomprobante."', plan_cuenta='".$vplan."', valor='".$vvalor."', tipo='credito', tercero='".$this->idcli ."', observacion=concat('Factura de Venta No. ',(select r.prefijo from resdian r where r.Idres='".$this->resolucion ."'),'".$this->numfacven ."'), tipo_documento='FV', numero_documento=concat((select r.prefijo from resdian r where r.Idres='".$this->resolucion ."'),'".$this->numfacven ."'), trifa='0', valor_iva='0', base='0', centro_costo='1'";
						
						
     $nm_select = $vsql3; 
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
			}
		}
	}
	else
	{
		echo "No se puede generar comprobantes de contabilidad a TNS porque no lo tiene activado en la configuración.<br>";
	}
}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off'; 
}  
    $this->NM_buffer = ob_get_contents();
    if (!empty($this->NM_buffer))
    {
        ob_end_flush();
    }
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
<?php
    if (!empty($this->NM_buffer))
    {
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "document.F4.submit();";
        echo "</script>";
    }
?>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
function fAlinearTexto($texto, $titulo, $retorno, $distancia, $alineacion='izquierda')
{
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
if(!empty($texto) or !empty($titulo))
{	
	if($alineacion=="centro")
	{	
		$distancia = (42-strlen($texto))/2;
	}
	
	$linea  = str_pad($titulo,$distancia," ").$texto;
	
	if(!empty($retornos) and $retornos > 0)
	{
		for($i=1;$i<=$retornos;$i++)
		{
			$linea .= "\n";
		}
	}
	
	return $linea;
}
else
{
	echo "NO SE RECIBIO PARAMETRO.";	
}


$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off';
}
function fGestionaStock($iddet, $tipo=2)
{
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
if(!empty($iddet))
{	
	$vsqldetalle = "select 
					cantidad,
					idpro,
					costop,
					valorpar,
					idbod,
					numfac,
					unidadmayor,
					factor
					from 
					detalleventa 
					where 
					iddet='".$iddet."'
					";
	
	 
      $nm_select = $vsqldetalle; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosDetalle = array();
      $this->vdatosdetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatosDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatosdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosDetalle = false;
          $this->vDatosDetalle_erro = $this->Db->ErrorMsg();
          $this->vdatosdetalle = false;
          $this->vdatosdetalle_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vdatosdetalle[0][0]))
	{
		$vcantidad = $this->vdatosdetalle[0][0];
		$vidpro    = $this->vdatosdetalle[0][1];
		$vcosto    = $this->vdatosdetalle[0][2];
		$vvalorpar = $this->vdatosdetalle[0][3];
		$vidbod    = $this->vdatosdetalle[0][4];
		$vnumfac   = $this->vdatosdetalle[0][5];
		$vtipo     = $this->tipo;
		$vdetalle  = "Venta";
		$vidmov    = 1;
		$vfecha    = date("Y-m-d");
		$vunidadmayor = $this->vdatosdetalle[0][6];
		$vfactor   = $this->vdatosdetalle[0][7];
		
		if($vunidadmayor!="SI" and $vfactor > 0)
		{
			$vcantidad = $vcantidad/$vfactor;
		}
	}
	
	
	if($tipo==2)
	{
		$vsqlinv = "INSERT 
			  inventario 
			  SET 
			  fecha		   ='".$vfecha."', 
			  cantidad	   =(".$vcantidad."*-1), 
			  idpro		   ='".$vidpro."', 
			  costo		   ='".$vcosto."',
			  valorparcial ='".$vvalorpar."', 
			  idbod        ='".$vidbod."', 
			  tipo		   ='".$vtipo."', 
			  detalle	   ='".$vdetalle."', 
			  idmov		   ='".$vidmov."',
			  nufacvta	   ='".$vnumfac."', 
			  iddetalle	   ='".$iddet."'
			  ";

		
     $nm_select = $vsqlinv; 
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

		$vsqlstock="UPDATE 
			   productos 
			   SET 
			   stockmen = stockmen-$vcantidad
			   WHERE 
			   idprod='".$vidpro."'
			   ";

		
     $nm_select = $vsqlstock; 
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
		
		 
      $nm_select = "select escombo from productos where idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiEsCombo = array();
      $this->vsiescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiEsCombo = false;
          $this->vSiEsCombo_erro = $this->Db->ErrorMsg();
          $this->vsiescombo = false;
          $this->vsiescombo_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($this->vsiescombo[0][0]))
		{
			$vescombo = $this->vsiescombo[0][0];
			
			if($vescombo=='SI')
			{
				 
      $nm_select = "select idproducto,cantidad,precio from detallecombos where idcombo='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vItemsCombo = array();
      $this->vitemscombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vItemsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vitemscombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vItemsCombo = false;
          $this->vItemsCombo_erro = $this->Db->ErrorMsg();
          $this->vitemscombo = false;
          $this->vitemscombo_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->vitemscombo[0][0]))
				{
					for($i=0;$i<count($this->vitemscombo );$i++)
					{
						$vidpro2    = $this->vitemscombo[$i][0];
						$vcantidad2 = $this->vitemscombo[$i][1];
						$vprecio2   = $this->vitemscombo[$i][2];
						
						$vsqlinv2 = "INSERT 
							  inventario 
							  SET 
							  fecha		   ='".$vfecha."', 
							  cantidad	   =(($vcantidad2*$vcantidad)*-1), 
							  idpro		   ='".$vidpro2."', 
							  costo		   ='".$vprecio2."',
							  valorparcial =($vprecio2*($vcantidad2*$vcantidad)), 
							  idbod        ='".$vidbod."', 
							  tipo		   ='".$vtipo."', 
							  detalle	   ='".$vdetalle."', 
							  idmov		   ='".$vidmov."',
							  nufacvta	   ='".$vnumfac."', 
							  iddetalle	   ='".$iddet."',
							  idcombo      ='".$vidpro."'
							  ";

						
     $nm_select = $vsqlinv2; 
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

						$vsqlstock2="UPDATE 
							   productos 
							   SET 
							   stockmen = stockmen-($vcantidad2*$vcantidad)
							   WHERE 
							   idprod='".$vidpro2."'
							   ";

						
     $nm_select = $vsqlstock2; 
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
			}
		}
	}
	
	if($tipo==1)
	{
		 
      $nm_select = "select escombo from productos where idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiEsCombo = array();
      $this->vsiescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiEsCombo = false;
          $this->vSiEsCombo_erro = $this->Db->ErrorMsg();
          $this->vsiescombo = false;
          $this->vsiescombo_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($this->vsiescombo[0][0]))
		{
			$vescombo = $this->vsiescombo[0][0];
			
			if($vescombo=='SI')
			{
				 
      $nm_select = "select idproducto,cantidad,precio from detallecombos where idcombo='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vItemsCombo = array();
      $this->vitemscombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vItemsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vitemscombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vItemsCombo = false;
          $this->vItemsCombo_erro = $this->Db->ErrorMsg();
          $this->vitemscombo = false;
          $this->vitemscombo_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->vitemscombo[0][0]))
				{
					for($i=0;$i<count($this->vitemscombo );$i++)
					{
						$vidpro2    = $this->vitemscombo[$i][0];
						$vcantidad2 = $this->vitemscombo[$i][1];
						$vprecio2   = $this->vitemscombo[$i][2];
						
						$vsqlinv2="delete 
								  from 
								  inventario 
								  where 
									  idpro='".$vidpro2."' 
								  and nufacvta='".$vnumfac."' 
								  and detalle like '%Venta%' 
								  and iddetalle='".$iddet."'
								  and idcombo='".$vidpro."'
								  ";

						
     $nm_select = $vsqlinv2; 
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

						$vsqlstock2="UPDATE 
							   productos 
							   SET 
							   stockmen = stockmen+($vcantidad*$vcantidad2) 
							   WHERE 
							   idprod='".$vidpro2."'
							   ";

						
     $nm_select = $vsqlstock2; 
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
			}
		}
		
		
		$vsqlinv="delete 
				  from 
				  inventario 
				  where 
				      idpro='".$vidpro."' 
				  and nufacvta='".$vnumfac."' 
				  and detalle like '%Venta%' 
				  and iddetalle='".$iddet."'
				  ";
		
		
     $nm_select = $vsqlinv; 
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
		
		$vsqlstock="UPDATE 
			   productos 
			   SET 
			   stockmen = stockmen+$vcantidad 
			   WHERE 
			   idprod='".$vidpro."'
			   ";

		
     $nm_select = $vsqlstock; 
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
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off';
}
function fPagarFacVen($idfactura,$formapago=1,$retorno=true,$vidrecibo=0,$sipropina="NO")
{
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
	$estado     = 1;
	$tot        = "";
	$this->resolucion = "";
	$numero     = "";
	$vfecha      = "";
	$res        = "";
	$vvendedor  = "";
	$vbanco     = 1;
	$vporcentaje_propina_tercero = 0;

	if(!empty($idfactura))
	{
		 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select f.total,f.resolucion,f.numfacven,f.vendedor,f.banco,str_replace (convert(char(10),f.fechaven,102), '.', '-') + ' ' + convert(char(8),f.fechaven,20),str_replace (convert(char(10),f.creado,102), '.', '-') + ' ' + convert(char(8),f.creado,20),f.tipo,r.prefijo,f.idcli,t.porcentaje_propina_sugerida from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero where f.idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select f.total,f.resolucion,f.numfacven,f.vendedor,f.banco,convert(char(23),f.fechaven,121),convert(char(23),f.creado,121),f.tipo,r.prefijo,f.idcli,t.porcentaje_propina_sugerida from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero where f.idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select f.total,f.resolucion,f.numfacven,f.vendedor,f.banco,f.fechaven,f.creado,f.tipo,r.prefijo,f.idcli,t.porcentaje_propina_sugerida from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero where f.idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatos = array();
      $this->vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[10] = str_replace(',', '.', $SCrx->fields[10]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[9] = (strpos(strtolower($SCrx->fields[9]), "e")) ? (float)$SCrx->fields[9] : $SCrx->fields[9];
                 $SCrx->fields[9] = (string)$SCrx->fields[9];
                 $SCrx->fields[10] = (strpos(strtolower($SCrx->fields[10]), "e")) ? (float)$SCrx->fields[10] : $SCrx->fields[10];
                 $SCrx->fields[10] = (string)$SCrx->fields[10];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatos = false;
          $this->vDatos_erro = $this->Db->ErrorMsg();
          $this->vdatos = false;
          $this->vdatos_erro = $this->Db->ErrorMsg();
      } 
;

		if(isset($this->vdatos[0][0]))
		{

			$vfecha      = $this->vdatos[0][5]; 
			$tot        = round($this->vdatos[0][0]);
			$this->resolucion = $this->vdatos[0][1];
			$res        = $this->vdatos[0][1];
			$numero     = $this->vdatos[0][2];
			$vvendedor  = $this->vdatos[0][3];
			$vbanco     = $this->vdatos[0][4];
			$vcreado    = $this->vdatos[0][6];
			$vtipo      = $this->vdatos[0][7];
			$vpj        = $this->vdatos[0][8];
			$vidcli     = $this->vdatos[0][9];
			$vporcentaje_propina_tercero = $this->vdatos[0][10];
			
			$vdoc       = $vpj."/".$numero;
			$vsql1      = "";
			$vsql2      = "";

			switch($formapago)
			{
				case 	2:
				
					$vdetalle = "FAC. CONTADO";
					$vnota    = "VENTA";
					$vsqlrc   = "";
				
					if($vidrecibo>0)
					{
						$vdetalle = "R. CAJA";
						$vnota    = "FACTURA VENTA CONTADO";
						$vsqlrc   = " ,idrc='".$vidrecibo."'";
					}

					$vsql1 = "insert into caja  set fecha='".$vfecha."', detalle='".$vdetalle."',  nota='".$vnota."', documento='".$numero."', cantidad='".$tot."',  cierredia='NO', resolucion='".$res."', banco='".$vbanco."',creado='".$vcreado."', usuario='".$vvendedor."',tipodoc='".$vtipo."',doc='".$vdoc."',id_tercero='".$vidcli."' ".$vsqlrc;
					
					
     $nm_select = $vsql1; 
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
					
					$vsql2 = "update facturaven set pagada='SI', saldo='0',valor_propina='0',porcentaje_propina_sugerida='0',aplica_propina='NO' where idfacven='".$idfactura."'";
					
					$vporcentaje_propina_sugerida = 0;
					
					if($sipropina=="SI")
					{

						 
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
							
							if($vporcentaje_propina_tercero>0)
							{
								$vporcentaje_propina_sugerida = $vporcentaje_propina_tercero;
							}
							
							if($vporcentaje_propina_sugerida>0)
							{
								$vvalor_propina = $tot * ($vporcentaje_propina_sugerida/100);
								$vvalor_propina = $vvalor_propina/100;
								$vvalor_propina = ceil($vvalor_propina);
								$vvalor_propina = $vvalor_propina*100;
								
								$vsql2 = "update facturaven set pagada='SI', saldo='0',valor_propina='".$vvalor_propina."',porcentaje_propina_sugerida='".$vporcentaje_propina_sugerida."',aplica_propina='SI'	where idfacven='".$idfactura."'";
							}
						}
					}
					
					
     $nm_select = $vsql2; 
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
				
					$estado = 2; 
						
				break;

				case 1:
				
					$estado = 2;

				break;

			}
		}
	}
	
	if($retorno)
	{
		echo  json_encode(
			
			array(
				
				"funcion"=>"fPagarFacVen",
				"estado"=>$estado,
				"idfactura"=>$idfactura,
				"formapago"=>$formapago,
				"numerofac"=>$numero,
				"fecha"=>$vfecha,
				"resolucion"=>$this->resolucion,
				"total"=>$tot,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2,
				"vendedor"=>$vvendedor,
				"banco"=>$vbanco
			)
		);
	}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off';
}
function fAsentar($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
	$tot        = "";
	$vfecha      = "";
	$idtercero  = "";
	$estado     = 1;
	$vsql1      = "";
	$vsql2      = "";
	$vsql3      = "";
	$this->resolucion = "";
	$res        = "";
	
	$vtotal     = 0;
	$vidcli     = "";
	$vfechaven  = "";
	$vestado    = 1;
	$vcupo      = 0;
	$vsaldo     = 0;
	$vdias_credito = 0;
	$vsaldo_disponible = 0;
	$vcredito   = "";
	$vasentada  = "";
	$vsicomprobante = "NO";
	$vpucdeudores = "";
	$vpucbanco    = "";
	$vmensajes    = "";
	$sipucdetalle = true;
	$vnomcli = "";
	$vnumfac = "";
	
	 
      $nm_select = "select habilitar_comprobantes from configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiGenerarComprobante = array();
      $this->vsigenerarcomprobante = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiGenerarComprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsigenerarcomprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiGenerarComprobante = false;
          $this->vSiGenerarComprobante_erro = $this->Db->ErrorMsg();
          $this->vsigenerarcomprobante = false;
          $this->vsigenerarcomprobante_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vsigenerarcomprobante[0][0]))
	{
		$vsicomprobante = $this->vsigenerarcomprobante[0][0];
		
		if($vsicomprobante=="SI")
		{
			 
      $nm_select = "select p.codigobar,p.nompro,gc.puc_ingresos from productos p left join grupos_contables gc on p.cod_cuenta=gc.codigo left join detalleventa d on d.idpro=p.idprod where d.numfac='".$idfactura."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiPUCProducto = array();
      $this->vsipucproducto = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiPUCProducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsipucproducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiPUCProducto = false;
          $this->vSiPUCProducto_erro = $this->Db->ErrorMsg();
          $this->vsipucproducto = false;
          $this->vsipucproducto_erro = $this->Db->ErrorMsg();
      } 
;
			
			if(isset($this->vsipucproducto[0][0]))
			{
				for($i=0;$i<count($this->vsipucproducto );$i++)
				{
					if(empty(trim($this->vsipucproducto[$i][2])))
					{
						$vmensajes .= "Debe parametrizar la cuenta contable del producto: ".$this->vsipucproducto[$i][0]." - ".$this->vsipucproducto[$i][1]."<br>";
						
						$sipucdetalle = false;
					}
				}
			}
		}
	}
	
	
	 
      $nm_select = "select f.total,f.fechaven,f.idcli,f.numfacven,f.resolucion,f.credito,f.asentada,f.observaciones,(select t.puc_auxiliar_deudores from terceros t where t.idtercero=f.idcli) as puc_auxiliar_deudores,(select b.puc from bancos b where b.idcaja_vta=f.banco) as puc_caja,(select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,concat(f.tipo,'/',(select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numf  from facturaven f where f.idfacven='".$idfactura."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatos = array();
      $this->vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatos = false;
          $this->vDatos_erro = $this->Db->ErrorMsg();
          $this->vdatos = false;
          $this->vdatos_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vdatos[0][0]))
	{
		$tot        = $this->vdatos[0][0];
		$vfecha      = $this->vdatos[0][1];
		$idtercero  = $this->vdatos[0][2];
		$numero     = $this->vdatos[0][3];
		$this->resolucion = $this->vdatos[0][4];
		$res        = $this->vdatos[0][4];
		$vcredito   = $this->vdatos[0][5];
		$vasentada  = $this->vdatos[0][6];
		$vobserv    = $this->vdatos[0][7];
		$vpucdeudores = $this->vdatos[0][8];
		$vpucbanco    = $this->vdatos[0][9];
		$vnomcli = $this->vdatos[0][10];
		$vnumfac = $this->vdatos[0][11];
		
	
		
		if($asentar=="SI" and $vasentada==0)
		{
			if($vcredito==2)
			{
				if($vsicomprobante=="SI")
				{
					if(!empty($vpucbanco) and $sipucdetalle)
					{
						$vsql1 = "update facturaven set asentada='1', adicional2='".$pagado."',	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
						
						if($pagado==0)
						{
							$vsql1 = "update facturaven set asentada='1', adicional2=total,	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
						}

						
     $nm_select = $vsql1; 
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

						if($vobserv=="TEMPORAL")
						{
						
     $nm_select = "update facturaven set observaciones=null where idfacven='".$idfactura."'"; 
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


						$vsql2 = "update terceros set fechultcomp='".$vfecha."' where idtercero='".$idtercero."'";

						
     $nm_select = $vsql2; 
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

						$estado = 2;
					}
					else
					{
						$vmensajes .= "Debe configurar la cuenta de caja.<br>";
					}
				}
				else
				{
					$vsql1 = "update facturaven set asentada='1', adicional2='".$pagado."',	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
					
					if($pagado==0)
					{
						$vsql1 = "update facturaven set asentada='1', adicional2=total,	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
					}
					
					
     $nm_select = $vsql1; 
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

					if($vobserv=="TEMPORAL")
					{
						
     $nm_select = "update facturaven set observaciones=null where idfacven='".$idfactura."'"; 
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
					$vsql2 = "update terceros set fechultcomp='".$vfecha."' where idtercero='".$idtercero."'";
					
     $nm_select = $vsql2; 
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
					$estado = 2;
				}
			}
			
			if($vcredito==1) 
			{
				if($vsicomprobante=="SI")
				{
					if(!empty($vpucdeudores)  and $sipucdetalle)
					{

						 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,idcli,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20) from facturaven where idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,idcli,convert(char(23),fechaven,121) from facturaven where idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,idcli,fechaven from facturaven where idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSaldoCliente = array();
      $this->vsaldocliente = array();
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
                        $this->vSaldoCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsaldocliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSaldoCliente = false;
          $this->vSaldoCliente_erro = $this->Db->ErrorMsg();
          $this->vsaldocliente = false;
          $this->vsaldocliente_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($this->vsaldocliente[0][0]))
						{
							$vtotal    = $this->vsaldocliente[0][0];
							$vidcli    = $this->vsaldocliente[0][1];
							$vfechaven = $this->vsaldocliente[0][2];

							 
      $nm_select = "select cupo,saldo,dias_credito,credito from terceros where idtercero='".$vidcli."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosCliente = array();
      $this->vdatoscliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatosCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatoscliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosCliente = false;
          $this->vDatosCliente_erro = $this->Db->ErrorMsg();
          $this->vdatoscliente = false;
          $this->vdatoscliente_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($this->vdatoscliente[0][0]))
							{
								$vcupo  = $this->vdatoscliente[0][0];
								$vsaldo = $this->vdatoscliente[0][1];
								$vdias_credito = $this->vdatoscliente[0][2];
								$vcredito = $this->vdatoscliente[0][3];

								if($vcredito == "SI")
								{
									if($vcupo > 0)
									{
										$vsaldo_disponible = $vcupo - $vsaldo;

										if($vsaldo_disponible < $vtotal)
										{
											$vestado = 3; 
											$vmensajes .= "El cliente: $vnomcli no tiene cupo disponible, documento: $vnumfac.<br>";
										}
										else
										{
											
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
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
											
     $nm_select = "UPDATE facturaven set asentada=1 where idfacven=$idfactura"; 
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
									else 
									{
										
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
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
										
     $nm_select = "UPDATE facturaven set asentada=1 where idfacven=$idfactura"; 
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
								else
								{
									$vestado = 2;
									$vmensajes .= "El cliente: $vnomcli no tiene crédito configurado, documento: $vnumfac.<br>";
								}
							}
						}
					}
					else
					{
						$vmensajes .= "Debe configurar la cuenta del tercero/cliente: $vnomcli.<br>";
					}
				}
				else
				{
					 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,idcli,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20) from facturaven where idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,idcli,convert(char(23),fechaven,121) from facturaven where idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,idcli,fechaven from facturaven where idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSaldoCliente = array();
      $this->vsaldocliente = array();
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
                        $this->vSaldoCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsaldocliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSaldoCliente = false;
          $this->vSaldoCliente_erro = $this->Db->ErrorMsg();
          $this->vsaldocliente = false;
          $this->vsaldocliente_erro = $this->Db->ErrorMsg();
      } 
;

					if(isset($this->vsaldocliente[0][0]))
					{
						$vtotal    = $this->vsaldocliente[0][0];
						$vidcli    = $this->vsaldocliente[0][1];
						$vfechaven = $this->vsaldocliente[0][2];

						 
      $nm_select = "select cupo,saldo,dias_credito,credito from terceros where idtercero='".$vidcli."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosCliente = array();
      $this->vdatoscliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatosCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatoscliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosCliente = false;
          $this->vDatosCliente_erro = $this->Db->ErrorMsg();
          $this->vdatoscliente = false;
          $this->vdatoscliente_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($this->vdatoscliente[0][0]))
						{
							$vcupo  = $this->vdatoscliente[0][0];
							$vsaldo = $this->vdatoscliente[0][1];
							$vdias_credito = $this->vdatoscliente[0][2];
							$vcredito = $this->vdatoscliente[0][3];

							if($vcredito == "SI")
							{
								if($vcupo > 0)
								{
									$vsaldo_disponible = $vcupo - $vsaldo;

									if($vsaldo_disponible < $vtotal)
									{
										$vestado = 3; 
										$vmensajes .= "El cliente: $vnomcli no tiene cupo disponible, documento: $vnumfac.<br>";
									}
									else
									{
										
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
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
										
     $nm_select = "UPDATE facturaven set asentada=1 where idfacven=$idfactura"; 
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
								else 
								{
									
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
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
									
     $nm_select = "UPDATE facturaven set asentada=1 where idfacven=$idfactura"; 
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
							else
							{
								$vestado = 2;
								$vmensajes .= "El cliente: $vnomcli no tiene crédito configurado, documento: $vnumfac.<br>";
							}
						}
					}
				}
			}

		}
		else if($asentar=="NO" and $vasentada==1)
		{

			if($vcredito==2)
			{
				$vsql1 = "update 
						facturaven 
						set 
						asentada='0', 
						adicional2='".$pagado."',
						adicional3='".$vueltos."',
						pagada='NO', 
						saldo=total
						where 
						idfacven='".$idfactura."'";

				
     $nm_select = $vsql1; 
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

				$vsql3 = "delete from caja where resolucion=".$res." and documento='".$numero."'";
				
     $nm_select = $vsql3; 
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

				$vsql2 = "update 
						  terceros 
						  set 
						  fechultcomp=(select f.fechaven from facturaven f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1)  
						  where idtercero='".$idtercero."'";

				
     $nm_select = $vsql2; 
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

				$estado = 2;
			}
			else
			{
				$vsql1 = "update 
						facturaven 
						set 
						asentada='0'
						where 
						idfacven='".$idfactura."'";

				
     $nm_select = $vsql1; 
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

				$vsql2 = "update 
						  terceros 
						  set 
						  fechultcomp=(select f.fechaven from facturaven f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1),
						  saldo = (saldo+$tot)
						  where idtercero='".$idtercero."'";

				
     $nm_select = $vsql2; 
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

				$estado = 2;
			}
		}
	}
	
	if($retorno_mensajes)
	{
		echo $vmensajes;
	}
	
	
	if($retorno)
	{
		echo json_encode(
			
			array(
				
				"funcion"=>"fAsentar",
				"estado"=>$estado,
				"idfactura"=>$idfactura,
				"asentar"=>$asentar,
				"pagado"=>$pagado,
				"vueltos"=>$vueltos,
				"total"=>$tot,
				"fecha"=>$vfecha,
				"idtercero"=>$idtercero,
				"numerofac"=>$numero,
				"resolucion"=>$this->resolucion,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2,
				"vsql3"=>$vsql3,
				"total"=>$vtotal,
				"idcli"=>$vidcli,
				"fechaven"=>$vfechaven,
				"estado"=>$estado,
				"descrip_estado"=>"1 ok, 2 no tiene configurado credito, 3 no tiene cupo disponible.",
				"cupo"=>$vcupo,
				"saldo"=>$vsaldo,
				"dias_credito"=>$vdias_credito,
				"saldo_disponible"=>number_format($vsaldo_disponible),
				"credito"=>$vcredito,
				"mensajes"=>$vmensajes
			)
		);
	}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off';
}
function fAsentarContratos($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
	$tot        = "";
	$vfecha      = "";
	$idtercero  = "";
	$estado     = 1;
	$vsql1      = "";
	$vsql2      = "";
	$vsql3      = "";
	$this->resolucion = "";
	$res        = "";
	
	$vtotal     = 0;
	$vidcli     = "";
	$vfechaven  = "";
	$vestado    = 1;
	$vcupo      = 0;
	$vsaldo     = 0;
	$vdias_credito = 0;
	$vsaldo_disponible = 0;
	$vcredito   = "";
	$vasentada  = "";
	$vsicomprobante = "NO";
	$vpucdeudores = "";
	$vpucbanco    = "";
	$vmensajes    = "";
	$sipucdetalle = true;
	$vnomcli = "";
	$vnumfac = "";
	
	 
      $nm_select = "select habilitar_comprobantes from configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiGenerarComprobante = array();
      $this->vsigenerarcomprobante = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiGenerarComprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsigenerarcomprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiGenerarComprobante = false;
          $this->vSiGenerarComprobante_erro = $this->Db->ErrorMsg();
          $this->vsigenerarcomprobante = false;
          $this->vsigenerarcomprobante_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vsigenerarcomprobante[0][0]))
	{
		$vsicomprobante = $this->vsigenerarcomprobante[0][0];
		
		if($vsicomprobante=="SI")
		{
			 
      $nm_select = "select p.codigobar,p.nompro,gc.puc_ingresos from productos p left join grupos_contables gc on p.cod_cuenta=gc.codigo left join detalleventa d on d.idpro=p.idprod where d.numfac='".$idfactura."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiPUCProducto = array();
      $this->vsipucproducto = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiPUCProducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsipucproducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiPUCProducto = false;
          $this->vSiPUCProducto_erro = $this->Db->ErrorMsg();
          $this->vsipucproducto = false;
          $this->vsipucproducto_erro = $this->Db->ErrorMsg();
      } 
;
			
			if(isset($this->vsipucproducto[0][0]))
			{
				for($i=0;$i<count($this->vsipucproducto );$i++)
				{
					if(empty(trim($this->vsipucproducto[$i][2])))
					{
						$vmensajes .= "Debe parametrizar la cuenta contable del producto: ".$this->vsipucproducto[$i][0]." - ".$this->vsipucproducto[$i][1]."<br>";
						
						$sipucdetalle = false;
					}
				}
			}
		}
	}
	
	
	 
      $nm_select = "select f.total,f.fechaven,f.idcli,f.numfacven,f.resolucion,f.credito,f.asentada,f.observaciones,(select t.puc_auxiliar_deudores from terceros t where t.idtercero=f.idcli) as puc_auxiliar_deudores,(select b.puc from bancos b where b.idcaja_vta=f.banco) as puc_caja,(select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,concat(f.tipo,'/',(select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numf  from facturaven_contratos f where f.idfacven='".$idfactura."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatos = array();
      $this->vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatos = false;
          $this->vDatos_erro = $this->Db->ErrorMsg();
          $this->vdatos = false;
          $this->vdatos_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vdatos[0][0]))
	{
		$tot        = $this->vdatos[0][0];
		$vfecha      = $this->vdatos[0][1];
		$idtercero  = $this->vdatos[0][2];
		$numero     = $this->vdatos[0][3];
		$this->resolucion = $this->vdatos[0][4];
		$res        = $this->vdatos[0][4];
		$vcredito   = $this->vdatos[0][5];
		$vasentada  = $this->vdatos[0][6];
		$vobserv    = $this->vdatos[0][7];
		$vpucdeudores = $this->vdatos[0][8];
		$vpucbanco    = $this->vdatos[0][9];
		$vnomcli = $this->vdatos[0][10];
		$vnumfac = $this->vdatos[0][11];
		
	
		
		if($asentar=="SI" and $vasentada==0)
		{
			if($vcredito==2)
			{
				if($vsicomprobante=="SI")
				{
					if(!empty($vpucbanco) and $sipucdetalle)
					{
						$vsql1 = "update facturaven_contratos set asentada='1', adicional2='".$pagado."',	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
						
						if($pagado==0)
						{
							$vsql1 = "update facturaven_contratos set asentada='1', adicional2=total,	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
						}

						
     $nm_select = $vsql1; 
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

						if($vobserv=="TEMPORAL")
						{
						
     $nm_select = "update facturaven_contratos set observaciones=null where idfacven='".$idfactura."'"; 
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


						$vsql2 = "update terceros set fechultcomp='".$vfecha."' where idtercero='".$idtercero."'";

						
     $nm_select = $vsql2; 
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

						$estado = 2;
					}
					else
					{
						$vmensajes .= "Debe configurar la cuenta de caja.<br>";
					}
				}
				else
				{
					$vsql1 = "update facturaven_contratos set asentada='1', adicional2='".$pagado."',	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
					
					if($pagado==0)
					{
						$vsql1 = "update facturaven_contratos set asentada='1', adicional2=total,	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
					}
					
					
     $nm_select = $vsql1; 
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

					if($vobserv=="TEMPORAL")
					{
						
     $nm_select = "update facturaven_contratos set observaciones=null where idfacven='".$idfactura."'"; 
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
					$vsql2 = "update terceros set fechultcomp='".$vfecha."' where idtercero='".$idtercero."'";
					
     $nm_select = $vsql2; 
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
					$estado = 2;
				}
			}
			
			if($vcredito==1) 
			{
				if($vsicomprobante=="SI")
				{
					if(!empty($vpucdeudores)  and $sipucdetalle)
					{

						 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,idcli,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20) from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,idcli,convert(char(23),fechaven,121) from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,idcli,fechaven from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSaldoCliente = array();
      $this->vsaldocliente = array();
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
                        $this->vSaldoCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsaldocliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSaldoCliente = false;
          $this->vSaldoCliente_erro = $this->Db->ErrorMsg();
          $this->vsaldocliente = false;
          $this->vsaldocliente_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($this->vsaldocliente[0][0]))
						{
							$vtotal    = $this->vsaldocliente[0][0];
							$vidcli    = $this->vsaldocliente[0][1];
							$vfechaven = $this->vsaldocliente[0][2];

							 
      $nm_select = "select cupo,saldo,dias_credito,credito from terceros where idtercero='".$vidcli."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosCliente = array();
      $this->vdatoscliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatosCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatoscliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosCliente = false;
          $this->vDatosCliente_erro = $this->Db->ErrorMsg();
          $this->vdatoscliente = false;
          $this->vdatoscliente_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($this->vdatoscliente[0][0]))
							{
								$vcupo  = $this->vdatoscliente[0][0];
								$vsaldo = $this->vdatoscliente[0][1];
								$vdias_credito = $this->vdatoscliente[0][2];
								$vcredito = $this->vdatoscliente[0][3];

								if($vcredito == "SI")
								{
									if($vcupo > 0)
									{
										$vsaldo_disponible = $vcupo - $vsaldo;

										if($vsaldo_disponible < $vtotal)
										{
											$vestado = 3; 
											$vmensajes .= "El cliente: $vnomcli no tiene cupo disponible, documento: $vnumfac.<br>";
										}
										else
										{
											
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
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
											
     $nm_select = "UPDATE facturaven_contratos set asentada=1 where idfacven=$idfactura"; 
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
									else 
									{
										
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
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
										
     $nm_select = "UPDATE facturaven_contratos set asentada=1 where idfacven=$idfactura"; 
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
								else
								{
									$vestado = 2;
									$vmensajes .= "El cliente: $vnomcli no tiene crédito configurado, documento: $vnumfac.<br>";
								}
							}
						}
					}
					else
					{
						$vmensajes .= "Debe configurar la cuenta del tercero/cliente: $vnomcli.<br>";
					}
				}
				else
				{
					 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,idcli,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20) from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,idcli,convert(char(23),fechaven,121) from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,idcli,fechaven from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSaldoCliente = array();
      $this->vsaldocliente = array();
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
                        $this->vSaldoCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsaldocliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSaldoCliente = false;
          $this->vSaldoCliente_erro = $this->Db->ErrorMsg();
          $this->vsaldocliente = false;
          $this->vsaldocliente_erro = $this->Db->ErrorMsg();
      } 
;

					if(isset($this->vsaldocliente[0][0]))
					{
						$vtotal    = $this->vsaldocliente[0][0];
						$vidcli    = $this->vsaldocliente[0][1];
						$vfechaven = $this->vsaldocliente[0][2];

						 
      $nm_select = "select cupo,saldo,dias_credito,credito from terceros where idtercero='".$vidcli."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosCliente = array();
      $this->vdatoscliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatosCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatoscliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosCliente = false;
          $this->vDatosCliente_erro = $this->Db->ErrorMsg();
          $this->vdatoscliente = false;
          $this->vdatoscliente_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($this->vdatoscliente[0][0]))
						{
							$vcupo  = $this->vdatoscliente[0][0];
							$vsaldo = $this->vdatoscliente[0][1];
							$vdias_credito = $this->vdatoscliente[0][2];
							$vcredito = $this->vdatoscliente[0][3];

							if($vcredito == "SI")
							{
								if($vcupo > 0)
								{
									$vsaldo_disponible = $vcupo - $vsaldo;

									if($vsaldo_disponible < $vtotal)
									{
										$vestado = 3; 
										$vmensajes .= "El cliente: $vnomcli no tiene cupo disponible, documento: $vnumfac.<br>";
									}
									else
									{
										
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
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
										
     $nm_select = "UPDATE facturaven_contratos set asentada=1 where idfacven=$idfactura"; 
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
								else 
								{
									
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
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
									
     $nm_select = "UPDATE facturaven_contratos set asentada=1 where idfacven=$idfactura"; 
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
							else
							{
								$vestado = 2;
								$vmensajes .= "El cliente: $vnomcli no tiene crédito configurado, documento: $vnumfac.<br>";
							}
						}
					}
				}
			}

		}
		else if($asentar=="NO" and $vasentada==1)
		{

			if($vcredito==2)
			{
				$vsql1 = "update 
						facturaven_contratos 
						set 
						asentada='0', 
						adicional2='".$pagado."',
						adicional3='".$vueltos."',
						pagada='NO', 
						saldo=total
						where 
						idfacven='".$idfactura."'";

				
     $nm_select = $vsql1; 
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

				$vsql3 = "delete from caja where resolucion=".$res." and documento='".$numero."'";
				
     $nm_select = $vsql3; 
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

				$vsql2 = "update 
						  terceros 
						  set 
						  fechultcomp=(select f.fechaven from facturaven_contratos f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1)  
						  where idtercero='".$idtercero."'";

				
     $nm_select = $vsql2; 
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

				$estado = 2;
			}
			else
			{
				$vsql1 = "update 
						facturaven_contratos 
						set 
						asentada='0'
						where 
						idfacven='".$idfactura."'";

				
     $nm_select = $vsql1; 
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

				$vsql2 = "update 
						  terceros 
						  set 
						  fechultcomp=(select f.fechaven from facturaven f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1),
						  saldo = (saldo+$tot)
						  where idtercero='".$idtercero."'";

				
     $nm_select = $vsql2; 
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

				$estado = 2;
			}
		}
	}
	
	if($retorno_mensajes)
	{
		echo $vmensajes;
	}
	
	
	if($retorno)
	{
		echo json_encode(
			
			array(
				
				"funcion"=>"fAsentar",
				"estado"=>$estado,
				"idfactura"=>$idfactura,
				"asentar"=>$asentar,
				"pagado"=>$pagado,
				"vueltos"=>$vueltos,
				"total"=>$tot,
				"fecha"=>$vfecha,
				"idtercero"=>$idtercero,
				"numerofac"=>$numero,
				"resolucion"=>$this->resolucion,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2,
				"vsql3"=>$vsql3,
				"total"=>$vtotal,
				"idcli"=>$vidcli,
				"fechaven"=>$vfechaven,
				"estado"=>$estado,
				"descrip_estado"=>"1 ok, 2 no tiene configurado credito, 3 no tiene cupo disponible.",
				"cupo"=>$vcupo,
				"saldo"=>$vsaldo,
				"dias_credito"=>$vdias_credito,
				"saldo_disponible"=>number_format($vsaldo_disponible),
				"credito"=>$vcredito,
				"mensajes"=>$vmensajes
			)
		);
	}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off';
}
function fPagarPedido($id,$formapago=1,$retorno=true)
{
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
	$estado     = 1;
	$tot        = "";
	$this->resolucion = "";
	$numero     = "";
	$vfecha      = "";
	$res        = "";

	if(!empty($id))
	{
		 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select p.total,p.prefijo_ped,p.numpedido,str_replace (convert(char(10),p.fechaven,102), '.', '-') + ' ' + convert(char(8),p.fechaven,20),p.fechadocu,r.prefijo,p.idcli from pedidos p inner join resdian r on  p.prefijo_ped=r.Idres where p.idpedido='".$id."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select p.total,p.prefijo_ped,p.numpedido,convert(char(23),p.fechaven,121),p.fechadocu,r.prefijo,p.idcli from pedidos p inner join resdian r on  p.prefijo_ped=r.Idres where p.idpedido='".$id."'"; 
      }
      else
      { 
          $nm_select = "select p.total,p.prefijo_ped,p.numpedido,p.fechaven,p.fechadocu,r.prefijo,p.idcli from pedidos p inner join resdian r on  p.prefijo_ped=r.Idres where p.idpedido='".$id."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatos = array();
      $this->vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatos = false;
          $this->vDatos_erro = $this->Db->ErrorMsg();
          $this->vdatos = false;
          $this->vdatos_erro = $this->Db->ErrorMsg();
      } 
;

		if(isset($this->vdatos[0][0]))
		{

			$vfecha      = $this->vdatos[0][3]; 
			$tot        = $this->vdatos[0][0];
			$this->resolucion = $this->vdatos[0][1];
			$res        = $this->vdatos[0][1];
			$numero     = $this->vdatos[0][2];
			$vcreado    = $this->vdatos[0][4];
			$vdoc       = $this->vdatos[0][5];
			$vidcli     = $this->vdatos[0][6];
			$vdoc       = $vdoc."/".$numero;
			$vsql1      = "";
			$vsql2      = "";

			switch($formapago)
			{
				case 	2:

					$vsql1 = "insert into caja 
							  set 
							  fecha='".$vfecha."',
							  detalle='FAC. CONTADO',
							  nota='VENTA',
							  cantidad='".$tot."',
							  cierredia='NO',
							  resolucion='".$res."',
							  idpedido='".$id."',
							  creado='".$vcreado."',
							  tipodoc='PV',
							  doc='".$vdoc."',
							  id_tercero='".$vidcli."'
							  ";

					
     $nm_select = $vsql1; 
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
				
					$vsql2 = "update 
							pedidos
							set 
							saldo='0'
							where 
							idpedido='".$id."'";

					
     $nm_select = $vsql2; 
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
				
					$estado = 2; 
						
				break;

				case 1:
				
					$estado = 2;

				break;

			}
		}
	}
	
	if($retorno)
	{
		echo  json_encode(
			
			array(
				
				"funcion"=>"fPagarPedido",
				"estado"=>$estado,
				"idpedido"=>$id,
				"formapago"=>$formapago,
				"numerofac"=>$numero,
				"fecha"=>$vfecha,
				"resolucion"=>$this->resolucion,
				"total"=>$tot,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2
			)
		);
	}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off';
}
function fAsentarPedido($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true)
{
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'on';
  
	
	$tot        = "";
	$vfecha      = "";
	$idtercero  = "";
	$estado     = 1;
	$vsql1      = "";
	$vsql2      = "";
	$vsql3      = "";
	$this->resolucion = "";
	$res        = "";
	
	 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20),idcli,numpedido,prefijo_ped from pedidos where idpedido='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,convert(char(23),fechaven,121),idcli,numpedido,prefijo_ped from pedidos where idpedido='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,fechaven,idcli,numpedido,prefijo_ped from pedidos where idpedido='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatos = array();
      $this->vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatos = false;
          $this->vDatos_erro = $this->Db->ErrorMsg();
          $this->vdatos = false;
          $this->vdatos_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vdatos[0][0]))
	{
		$tot        = $this->vdatos[0][0];
		$vfecha      = $this->vdatos[0][1];
		$idtercero  = $this->vdatos[0][2];
		$numero     = $this->vdatos[0][3];
		$this->resolucion = $this->vdatos[0][4];
		$res        = $this->vdatos[0][4];
		
		if($asentar=="SI")
		{

			$vsql1 = "update 
					pedidos 
					set 
					asentada='1', 
					adicional2='".$pagado."',
					adicional3='".$vueltos."'
					where 
					idpedido='".$idfactura."'";

			
     $nm_select = $vsql1; 
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

			$vsql2 = "update 
					  terceros 
					  set 
					  fechultcomp='".$vfecha."' 
					  where idtercero='".$idtercero."'";

			
     $nm_select = $vsql2; 
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

			$estado = 2;

		}
		else
		{

			$vsql1 = "update 
					pedidos
					set 
					asentada='0', 
					adicional2='".$pagado."',
					adicional3='".$vueltos."',
					saldo=total
					where 
					idfacven='".$idfactura."'";

			
     $nm_select = $vsql1; 
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

			$vsql3 = "delete from caja where resolucion=".$res." and idpedido='".$idfactura."'";
			
     $nm_select = $vsql3; 
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

			$vsql2 = "update 
					  terceros 
					  set 
					  fechultcomp=(select f.fechaven from facturaven f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1)  
					  where idtercero='".$idtercero."'";

			
     $nm_select = $vsql2; 
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

			$estado = 2;
		}
	}
	
	if($retorno)
	{
		echo json_encode(
			
			array(
				
				"funcion"=>"fAsentar",
				"estado"=>$estado,
				"idpedido"=>$idfactura,
				"asentar"=>$asentar,
				"pagado"=>$pagado,
				"vueltos"=>$vueltos,
				"total"=>$tot,
				"fecha"=>$vfecha,
				"idtercero"=>$idtercero,
				"numerofac"=>$numero,
				"resolucion"=>$this->resolucion,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2,
				"vsql3"=>$vsql3
			)
		);
	}
$_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off';
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
  function close_emb()
  {
      if ($this->Db)
      {
          $this->Db->Close(); 
      }
      if(isset($this->Ini->nm_db_conn_firebird)){ 
        $this->Ini->nm_db_conn_firebird->Close(); 
      }
  }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode("_VLS_", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          $tmp_cmd = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_fast'] = "";
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig'])) 
          {
              $tmp_cmd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig']; 
          }
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'])) 
          {
              if (!empty($tmp_cmd)) 
              {
                  $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'] . ")"; 
              }
              else
              {
                  $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'] . ")"; 
              }
          }
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'])) 
          {
              if (!empty($tmp_cmd)) 
              {
                  $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'] . ")"; 
              }
              else
              {
                  $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'] . ")"; 
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq'] = $tmp_cmd;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['fast_search']);
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numfacven", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_idcli($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "idcli", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "observaciones", $arg_search, $data_search);
          }
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_fast'] = $comando;
      $tmp_cmd = "";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig'])) 
      {
          $tmp_cmd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig']; 
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'])) 
      {
          if (!empty($tmp_cmd)) 
          {
              $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'] . ")"; 
          }
          else
          {
              $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'] . ")"; 
          }
      }
      if (!empty($tmp_cmd)) 
      {
          $comando = $tmp_cmd . " and (" . $comando . ")"; 
      }
      else
      {
          $comando = " where (" . $comando . ")"; 
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'])) 
      {
          $comando .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'] . ")";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['fast_search'][0] = $in_fields;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['fast_search'][2] = $sv_data;
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "idfacven";$nm_numeric[] = "numfacven";$nm_numeric[] = "credito";$nm_numeric[] = "idcli";$nm_numeric[] = "subtotal";$nm_numeric[] = "valoriva";$nm_numeric[] = "total";$nm_numeric[] = "asentada";$nm_numeric[] = "saldo";$nm_numeric[] = "adicional";$nm_numeric[] = "adicional2";$nm_numeric[] = "adicional3";$nm_numeric[] = "resolucion";$nm_numeric[] = "vendedor";$nm_numeric[] = "usuario_crea";$nm_numeric[] = "banco";$nm_numeric[] = "dias_decredito";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
      if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
      {
          $nome      = "CAST ($nome AS TEXT)";
          $nm_aspas  = "'";
          $nm_aspas1 = "'";
      }
      if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nome      = "CAST ($nome AS TEXT)";
          $nm_aspas  = "'";
          $nm_aspas1 = "'";
      }
      if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
      {
          $nome      = "CAST ($nome AS VARCHAR)";
          $nm_aspas  = "'";
          $nm_aspas1 = "'";
      }
      if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
      {
          $nome      = "CAST ($nome AS VARCHAR(255))";
          $nm_aspas  = "'";
          $nm_aspas1 = "'";
      }
      $Nm_datas['fechaven'] = "date";$Nm_datas['fechavenc'] = "date";$Nm_datas['creado'] = "datetime";$Nm_datas['editado'] = "datetime";$Nm_datas['creado'] = "datetime";$Nm_datas['creado'] = "datetime";
      if (isset($Nm_datas[$nome]))
      {
          for ($x = 0; $x < strlen($campo); $x++)
          {
              $tst = substr($campo, $x, 1);
              if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
              {
                  return;
              }
          }
      }
      if (isset($Nm_datas[$campo_join]) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
         $nm_aspas  = "#";
         $nm_aspas1 = "#";
      }
      if (isset($Nm_datas[$campo_join]) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date']))
      {
          $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date'];
          $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date1'];
      }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not" . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_idcli($condicao, $campo)
   {
       $result     = array();
       $campo_orig = $campo;
       $campo      = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT nombres, idtercero FROM terceros WHERE (nombres LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = (isset($rx->fields[1])) ? $rx->fields[1] : $rx->fields[0];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_proc_interativ_search($Parms)
   {
       $Parms = str_replace("__NM_PLUS__", "+", $Parms);
       $Parms = str_replace("__NM_AMP__", "&", $Parms);
       $Parms = str_replace("__NM_PRC__", "%", $Parms);
       $cmps_numeric = array();
       $cmps_numeric[] = "total";
       $cmps_numeric[] = "idcli";
       $range_bw = array();
       if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($Parms))
       {
           $Parms = NM_conv_charset($Parms, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $tmp     = explode("__DL__", $Parms);
       $cmd_sql = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['int_search_sql'][$tmp[0]];
       $vls     = "";
       $bol_numeric = false;
       if ($tmp[3] != "clear_interativ")
       {
           $vls  = explode("_VLS_", $tmp[3]);
           if($tmp[2] == "nn" || $tmp[2] == "bw")
           {
               $bol_numeric = true;
               $delim  = "";
               $delim1 = "";
           }
           else
           {
               $delim  = "'";
               $delim1 = "'";
           }
           if ($tmp[2] == "dt" || $tmp[2] == "dh" || $tmp[2] == "hh")
           {
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
               {
                   $delim  = "#";
                   $delim1 = "#";
               }
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date']))
               {
                   $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date'];
                   $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['SC_sep_date1'];
               }
           }
       }
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'][$tmp[0]]);
       if (!empty($vls))
       {
           $prep = "";
           $bol_has_empty = false;
           foreach ($vls as $cada_val)
           {
               $cada_val = NM_charset_decode($cada_val);
               $descr = $cada_val;
               $tmp_pos = strpos($cada_val, "##@@");
               if ($tmp_pos !== false)
               {
                   $descr    = substr($cada_val, $tmp_pos + 4);
                   $cada_val = substr($cada_val, 0, $tmp_pos);
               }
               $cada_val = substr($this->Db->qstr($cada_val), 1, -1);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'][$tmp[0]]['lab'][$tmp[1]][] = $descr;
               if ($cada_val == "")
               {
                   $bol_has_empty = true;
               }
               if (in_array($tmp[0], $cmps_numeric))
               {
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['decimal_db'] == ".")
                  {
                      $cada_val  = str_replace(",", ".", $cada_val);
                  }
                  else
                  {
                      $delim  = "'";
                      $delim1 = "'";
                      $cada_val  = str_replace(".", ",", $cada_val);
                  }
                   $prep .= ($prep != "") ? "," : "";
                   $prep .= $delim . $cada_val . $delim1;
               }
               else
               {
                   $prep .= ($prep != "") ? "," : "";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && $cada_val == "")
                   {
                       $prep .= 'null';
                   }
                   else
                   $prep .= $delim . $cada_val . $delim1;
               }
               $range_bw[] = $cada_val;
           }
               $str_add_null    = '';
               $str_add_null_or = '';
               if($bol_has_empty)
               {
                   $str_add_null    = ' ' . $cmd_sql . ' is null ';
                   $str_add_null_or = ' OR ' . $cmd_sql . ' is null ';
               }
           if ($prep == "" && $bol_numeric)
           {
               if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'][$tmp[0]]['val'] = $cmd_sql . " is null";
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'][$tmp[0]]['val'] = $cmd_sql . " = '' or " . $cmd_sql . " is null";
               }
           }
           elseif ($prep == "" && $delim != "")
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'][$tmp[0]]['val'] = $cmd_sql . " = '' or " . $cmd_sql . " is null";
           }
           elseif ( $tmp[2] == "bw")
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'][$tmp[0]]['val'] = $cmd_sql . " between " . $delim . $range_bw[0] .  $delim1 . " and " . $delim . $range_bw[1] .  $delim1 . $str_add_null_or;
           }
           elseif ( $tmp[2] == "dt")
           {
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
               {
                   $cmd_sql = "to_char ($cmd_sql, 'YYYY-MM-DD')";
               }
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
               {
                 $cmd_sql = "convert(char(10),$cmd_sql,121)";
               }
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
               {
                   $cmd_sql = "EXTEND($cmd_sql, YEAR TO DAY)";
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'][$tmp[0]]['val'] = $cmd_sql . " IN (" . $prep . ")" . $str_add_null_or;
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'][$tmp[0]]['val'] = $cmd_sql . " IN (" . $prep . ")" . $str_add_null_or;
           }
       }
      $tmp_cmd = "";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig'])) 
      {
          $tmp_cmd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_orig']; 
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'])) 
      {
          if (!empty($tmp_cmd)) 
          {
              $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'] . ")"; 
          }
          else
          {
              $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_filtro'] . ")"; 
          }
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_fast'])) 
      {
          if (!empty($tmp_cmd)) 
          {
              $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_fast'] . ")";
          }
          else 
          {
              $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_fast'] . ")";
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_resumo'])) 
      { 
          if (empty($tmp_where)) 
          { 
              $tmp_cmd = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_resumo']; 
          } 
          else
          { 
              $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_resumo'] . ")"; 
          } 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'] = "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_sem_interativ']  = $tmp_cmd;
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'])) 
      {
          $prim = true;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['interativ_search'] as $cmp => $val) 
          {
              if (!$prim)
              {
                 $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'] .= " and ";
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'] .= "(" . $val['val'] . ")";
              $prim = false;
          }
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'])) 
      {
          if (!empty($tmp_cmd)) 
          {
              $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'] . ")"; 
          }
          else
          {
              $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq_interativ'] . ")"; 
          }
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['where_pesq'] = $tmp_cmd;
      if(isset($tmp[4]) && $tmp[4] == 'N')
      {
          $this->Arr_result['interativ_search'] = array();
          $oJson = new Services_JSON();
          echo $oJson->encode( $this->Arr_result );
          exit;
      }
   }
  function html_doc_word($nm_arquivo_doc_word, $nmgp_password)
  {
      global $nm_url_saida;
      $Word_password = "";
      if ($this->Ini->Export_zip || $Word_password != "")
      { 
          $Parm_pass  = ($Word_password != "") ? " -p" : "";
          $Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file'], ".");
          if ($Pos !== false) {
              $Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file'], 0, $Pos);
          }
          $Arq_zip .= ".zip";
          $Arq_doc = $nm_arquivo_doc_word;
          $Pos = strrpos($nm_arquivo_doc_word, ".");
          if ($Pos !== false) {
              $Arq_doc = substr($nm_arquivo_doc_word, 0, $Pos);
          }
          $Arq_doc  .= ".zip";
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file'], ' ')) ? " \"" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file'] . "\"" :  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file'];
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Word_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Word_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Word_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
              $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Word_password . " " . $Zip_f . " " . $cada_img_zip;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  $str_zip = "./7za " . $Parm_pass . $Word_password . " a " . $Zip_f . " " . $cada_img_zip;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  $str_zip = "./7za " . $Parm_pass . $Word_password . " a " . $Zip_f . " " . $cada_img_zip;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
           }
           if (is_file($Arq_zip)) {
               unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file']);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file'] = $Arq_zip;
               $nm_arquivo_doc_word = $Arq_doc;
          } 
      } 
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida']['word_file']);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($nm_arquivo_doc_word);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      if (strpos(" " . $this->Ini->SC_module_export, "grid") !== false || strpos(" " . $this->Ini->SC_module_export, "resume") !== false)
      {
          $path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida'][$path_doc_md5][1] = substr($nm_arquivo_doc_word, 1);
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
              $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->pb->setProgressbarMessage($Mens_bar);
          $this->pb->setDownloadLink($this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $this->pb->setDownloadMd5($path_doc_md5);
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($this->ret_word);
          $this->pb->completed();
          return;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Ventas Pos al día: :: Doc</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
$path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_doc_word);
$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida'][$path_doc_md5][1] = substr($nm_arquivo_doc_word, 1);
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">WORD</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . $nm_arquivo_doc_word ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_facturaven_pos_rapida_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_facturaven_pos_rapida"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($this->ret_word) ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
  }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      global $nm_url_saida;
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Arq_zip   = $Arq_base;
          $Pos = strrpos($Arq_base, ".");
          if ($Pos !== false) {
              $Arq_zip = substr($Arq_base, 0, $Pos);
          }
          $Arq_zip .= ".zip";
          $Arq_htm  = $nm_arquivo_html;
          $Pos = strrpos($nm_arquivo_html, ".");
          if ($Pos !== false) {
              $Arq_htm = substr($nm_arquivo_html, 0, $Pos);
          }
          $Arq_htm  .= ".zip";
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_sort;
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_sort_desc;
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_sort_asc;
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_summary_sort_desc;
           $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/" . $this->Ini->Label_summary_sort_asc;
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
               $nm_arquivo_html = $Arq_htm;
           } 
          $path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_html);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_html;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_pos_rapida'][$path_doc_md5][1] = substr($nm_arquivo_html, 1);
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
              $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->pb->setProgressbarMessage($Mens_bar);
          $this->pb->setDownloadLink($this->Ini->path_imag_temp . $nm_arquivo_html);
          $this->pb->setDownloadMd5($path_doc_md5);
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($this->ret_print);
          $this->pb->completed();
          return;
  }
} 
// 
//======= =========================
   if (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['sc_process_barr'])) {
       return;
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
   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['contr_erro'] = 'off';
   $sc_conv_var = array();
   $Sc_lig_md5 = false;
   $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
   $_SESSION['scriptcase']['sem_session'] = false;
   if (!empty($_POST))
   {
       if (isset($_POST['parm']))
       {
           $_POST['parm'] = str_replace("__NM_PLUS__", "+", $_POST['parm']);
           $_POST['parm'] = str_replace("__NM_AMP__", "&", $_POST['parm']);
           $_POST['parm'] = str_replace("__NM_PRC__", "%", $_POST['parm']);
       }
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            $nmgp_val = str_replace("__NM_PLUS__", "+", $nmgp_val);
            $nmgp_val = str_replace("__NM_AMP__", "&", $nmgp_val);
            $nmgp_val = str_replace("__NM_PRC__", "%", $nmgp_val);
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
             if ($nmgp_var == "nmgp_parms_where" && substr($nmgp_val, 0, 8) == "@SC_par@")
             {
                 $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]];
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
             }
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_grid_facturaven_pos_rapida($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            nm_protect_num_grid_facturaven_pos_rapida($nmgp_var, $nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       if (isset($_GET['parm']))
       {
           $_GET['parm'] = str_replace("__NM_PLUS__", "+", $_GET['parm']);
           $_GET['parm'] = str_replace("__NM_AMP__", "&", $_GET['parm']);
           $_GET['parm'] = str_replace("__NM_PRC__", "%", $_GET['parm']);
       }
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            $nmgp_val = str_replace("__NM_PLUS__", "+", $nmgp_val);
            $nmgp_val = str_replace("__NM_AMP__", "&", $nmgp_val);
            $nmgp_val = str_replace("__NM_PRC__", "%", $nmgp_val);
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
             if ($nmgp_var == "nmgp_parms_where" && substr($nmgp_val, 0, 8) == "@SC_par@")
             {
                 $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]];
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
             }
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_grid_facturaven_pos_rapida($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            nm_protect_num_grid_facturaven_pos_rapida($nmgp_var, $nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!isset($_SERVER['HTTP_REFERER']) && !isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start))
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
       elseif (is_file($root . $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "grid_facturaven_pos_rapida") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_FACILWEBv2'])) {
               $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_FACILWEBv2'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
   {
       $nmgp_parms = "";
   }
   if (isset($gcontador_grid_fe)) 
   {
       $_SESSION['gcontador_grid_fe'] = $gcontador_grid_fe;
   }
   if (isset($gintegrartns)) 
   {
       $_SESSION['gintegrartns'] = $gintegrartns;
   }
   if (isset($gidtercero)) 
   {
       $_SESSION['gidtercero'] = $gidtercero;
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
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_pai']))
   {
       $apl_pai = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_pai'];
       if (isset($_SESSION['sc_session'][$script_case_init][$apl_pai]['embutida_filho']))
       {
           foreach ($_SESSION['sc_session'][$script_case_init][$apl_pai]['embutida_filho'] as $init_filho)
           {
               if (isset($_SESSION['sc_session'][$init_filho]['grid_facturaven_pos_rapida']['master_pai']) && $_SESSION['sc_session'][$init_filho]['grid_facturaven_pos_rapida']['master_pai'] == $script_case_init)
               {
                   $script_case_init = $init_filho;
                   break;
               }
           }
       }
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form'] && !isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['master_pai']))
   {
       $SC_init_ant = $script_case_init;
       $script_case_init = rand(2, 10000);
       if (isset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_pos_rapida']['embutida_pai']))
       {
           $_SESSION['sc_session'][$SC_init_ant][$_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_pos_rapida']['embutida_pai']]['embutida_filho'][] = $script_case_init;
       }
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['master_pai'] = $SC_init_ant;
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['master_pai']))
   {
       $SC_init_ant = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['master_pai'];
       if (!isset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_pos_rapida']['embutida_form_parms']))
       {
           $_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_pos_rapida']['embutida_form_parms'] = "";
       }
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_parms'] = $_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_pos_rapida']['embutida_form_parms'];
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form'] = true;
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_full'] = (isset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_pos_rapida']['embutida_form_full'])) ? $_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_pos_rapida']['embutida_form_full'] : false;
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['reg_start'] = "";
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'] = "inicio";
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_pos_rapida']['embutida_form']);
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_pos_rapida']['embutida_form_parms']);
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_parms'])) 
   {
       if (!empty($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_parms'])) 
       {
           $nmgp_parms = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_parms'];
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_parms'] = "";
       }
   }
   elseif (isset($script_case_init))
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form']);
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_full']);
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_parms']);
   }
   if (!isset($nmgp_opcao) || !isset($script_case_init) || ((!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida']) && $nmgp_opcao != "formphp"))
   { 
       if (!empty($nmgp_parms)) 
       { 
           $nmgp_parms = NM_decode_input($nmgp_parms);
           $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
           $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
           $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
           $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
           $todo  = explode("?@?", $todox);
           foreach ($todo as $param)
           {
                $cadapar = explode("?#?", $param);
                if (1 < sizeof($cadapar))
                {
                    if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                    {
                        $cadapar[0] = substr($cadapar[0], 11);
                        $cadapar[1] = $_SESSION[$cadapar[1]];
                    }
                    if (isset($sc_conv_var[$cadapar[0]]))
                    {
                        $cadapar[0] = $sc_conv_var[$cadapar[0]];
                    }
                    elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
                    {
                        $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
                    }
                    nm_limpa_str_grid_facturaven_pos_rapida($cadapar[1]);
                    nm_protect_num_grid_facturaven_pos_rapida($cadapar[0], $cadapar[1]);
                    if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                    $Tmp_par   = $cadapar[0];
                    $$Tmp_par = $cadapar[1];
                }
           }
           if (isset($gcontador_grid_fe)) 
           {
               $_SESSION['gcontador_grid_fe'] = $gcontador_grid_fe;
               nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gcontador_grid_fe"]);
           }
           if (isset($gintegrartns)) 
           {
               $_SESSION['gintegrartns'] = $gintegrartns;
               nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gintegrartns"]);
           }
           if (isset($gidtercero)) 
           {
               $_SESSION['gidtercero'] = $gidtercero;
               nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gidtercero"]);
           }
           $NMSC_conf_apl = array();
           if (isset($NMSC_inicial))
           {
               $NMSC_conf_apl['inicial'] = $NMSC_inicial;
           }
           if (isset($NMSC_rows))
           {
               $NMSC_conf_apl['rows'] = $NMSC_rows;
           }
           if (isset($NMSC_cols))
           {
               $NMSC_conf_apl['cols'] = $NMSC_cols;
           }
           if (isset($NMSC_paginacao))
           {
               $NMSC_conf_apl['paginacao'] = $NMSC_paginacao;
           }
           if (isset($NMSC_cab))
           {
               $NMSC_conf_apl['cab'] = $NMSC_cab;
           }
           if (isset($NMSC_nav))
           {
               $NMSC_conf_apl['nav'] = $NMSC_nav;
           }
           if (isset($NM_run_iframe) && $NM_run_iframe == 1) 
           { 
               unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']);
               $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['b_sair'] = false;
           }   
       } 
   } 
   $ini_embutida = "";
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'])
   {
       $nmgp_outra_jan = "";
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (isset($GLOBALS["script_case_init"]) && !empty($GLOBALS["script_case_init"]))
   {
       $ini_embutida = $GLOBALS["script_case_init"];
        if (!isset($_SESSION['sc_session'][$ini_embutida]['grid_facturaven_pos_rapida']['embutida']))
        { 
           $_SESSION['sc_session'][$ini_embutida]['grid_facturaven_pos_rapida']['embutida'] = false;
        }
        if (!$_SESSION['sc_session'][$ini_embutida]['grid_facturaven_pos_rapida']['embutida'])
        { 
           $script_case_init = $ini_embutida;
        }
   }
   if (isset($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['protect_modal']) && !empty($_SESSION['scriptcase']['grid_facturaven_pos_rapida']['protect_modal']))
   {
       $script_case_init = $_SESSION['scriptcase']['grid_facturaven_pos_rapida']['protect_modal'];
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_emb    = false;
   $salva_iframe = false;
   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['doc_word'] = false;
   $_SESSION['scriptcase']['saida_word'] = false;
   if (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['skip_charts']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['skip_charts'] = false;
   }
   if (isset($_REQUEST['sc_create_charts']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['skip_charts'] = 'N' == $_REQUEST['sc_create_charts'];
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['iframe_menu']);
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida']))
   {
       $salva_emb = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1 && !$salva_emb)
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "grid_facturaven_pos_rapida";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'grid_facturaven_pos_rapida' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
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
        $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['iframe_menu'] = $salva_iframe;
   }
   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'] = $salva_emb;

   if (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '/grid_facturaven_pos_rapida/'))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['initialize'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['initialize'] = false;
   }
   if ($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['initialize'])
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['tot_geral']);
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['contr_total_geral'] = "NAO";
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($nmgp_opcao) && $nmgp_opcao == "busca" && isset($nmgp_orig_pesq))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['orig_pesq'] = $nmgp_orig_pesq;
   }
   if (!isset($nmgp_opcao) || empty($nmgp_opcao) || $nmgp_opcao == "grid" && (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['b_sair'])))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['b_sair'] = true;
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'grid_facturaven_pos_rapida')
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/grid_facturaven_pos_rapida_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['scriptcase']['sc_tp_saida']))  ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
   $salva_url_saida  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
   if (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_facturaven_pos_rapida']))
   { 
       return;
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'] && $nmgp_opcao != "formphp")
   { 
       if ($nmgp_opcao == "change_lang" || $nmgp_opcao == "change_lang_res" || $nmgp_opcao == "change_lang_fil" || $nmgp_opcao == "force_lang")  
       { 
           if ($nmgp_opcao == "change_lang_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_lang_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_change_lang'] = true;
           unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['tot_geral']);
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['contr_total_geral'] = "NAO";
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
       if ($nmgp_opcao == "change_schema" || $nmgp_opcao == "change_schema_fil" || $nmgp_opcao == "change_schema_res")  
       { 
           if ($nmgp_opcao == "change_schema_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_schema_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           $nmgp_schema = $nmgp_schema . "/" . $nmgp_schema;  
           $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['num_css'] = rand(0, 1000);
       } 
       if ($nmgp_opcao == "volta_grid")  
       { 
           $nmgp_opcao = "igual";  
       }   
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'] = $nmgp_opcao ;  
       }   
       if (isset($_POST["gcontador_grid_fe"])) 
       {
           $_SESSION["gcontador_grid_fe"] = $_POST["gcontador_grid_fe"];
           nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gcontador_grid_fe"]);
       }
       if (isset($_GET["gcontador_grid_fe"])) 
       {
           $_SESSION["gcontador_grid_fe"] = $_GET["gcontador_grid_fe"];
           nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gcontador_grid_fe"]);
       }
       if (!isset($_SESSION["gcontador_grid_fe"])) 
       {
           $_SESSION["gcontador_grid_fe"] = "";
       }
       if (isset($_POST["gintegrartns"])) 
       {
           $_SESSION["gintegrartns"] = $_POST["gintegrartns"];
           nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gintegrartns"]);
       }
       if (isset($_GET["gintegrartns"])) 
       {
           $_SESSION["gintegrartns"] = $_GET["gintegrartns"];
           nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gintegrartns"]);
       }
       if (!isset($_SESSION["gintegrartns"])) 
       {
           $_SESSION["gintegrartns"] = "";
       }
       if (isset($_POST["gidtercero"])) 
       {
           $_SESSION["gidtercero"] = $_POST["gidtercero"];
           nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gidtercero"]);
       }
       if (isset($_GET["gidtercero"])) 
       {
           $_SESSION["gidtercero"] = $_GET["gidtercero"];
           nm_limpa_str_grid_facturaven_pos_rapida($_SESSION["gidtercero"]);
       }
       if (!isset($_SESSION["gidtercero"])) 
       {
           $_SESSION["gidtercero"] = "";
       }
       if (isset($nmgp_lig_edit_lapis)) 
       {
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['mostra_edit'] = $nmgp_lig_edit_lapis;
           unset($GLOBALS["nmgp_lig_edit_lapis"]) ;  
           if (isset($_SESSION['nmgp_lig_edit_lapis'])) 
           {
               unset($_SESSION['nmgp_lig_edit_lapis']);
           }
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan'] = true;
       }
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['volta_redirect_apl']))
       {
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['volta_redirect_tp'] = "";
           $nm_url_saida = "grid_facturaven_pos_rapida_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan'])
           {
               if ($nmgp_url_saida == "modal")
               {
                   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_modal'] = true;
               }
               $nm_url_saida = "grid_facturaven_pos_rapida_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['retorno_cons']  . "?script_case_init=" . NM_encode_input($script_case_init);  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida ; 
               } 
               $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
               $nm_url_saida = "grid_facturaven_pos_rapida_fim.php"; 
               $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'] != "pdf" ) 
       { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['scriptcase']['nm_sc_retorno']; 
            $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['menu_desenv'] = true;   
       } 
       if (isset($nmgp_parms_ret)) 
       {
           $todo = explode(",", $nmgp_parms_ret);
           if (isset($sc_conv_var[$todo[2]]))
           {
               $todo[2] = $sc_conv_var[$todo[2]];
           }
           elseif (isset($sc_conv_var[strtolower($todo[2])]))
           {
               $todo[2] = $sc_conv_var[strtolower($todo[2])];
           }
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['dado_psq_ret']  = $todo[2];
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['js_apos_busca'] = $nm_evt_ret_busca;
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opc_psq'] = true;   
           if (isset($nmgp_iframe_ret)) 
           {
               $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['iframe_ret_cap'] = $nmgp_iframe_ret;
           }
       } 
       elseif (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opc_psq']))
       {
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opc_psq'] = false ;   
       } 
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form'])
       {
           if (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_full']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida_form_full'])
           {
               $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['mostra_edit'] = "N";   
           } 
           $_SESSION['scriptcase']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $salva_url_saida;
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_grid_facturaven_pos_rapida = new grid_facturaven_pos_rapida_apl();

      if ('ajax_autocomp' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'] = "busca";
          $contr_grid_facturaven_pos_rapida->NM_ajax_flag = true;
          $contr_grid_facturaven_pos_rapida->NM_ajax_opcao = $NM_ajax_opcao;
      }
      if ('ajax_filter_save' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'] = "busca";
          $contr_grid_facturaven_pos_rapida->NM_ajax_flag = true;
          $contr_grid_facturaven_pos_rapida->NM_ajax_opcao = "ajax_filter_save";
      }
      if ('ajax_filter_delete' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'] = "busca";
          $contr_grid_facturaven_pos_rapida->NM_ajax_flag = true;
          $contr_grid_facturaven_pos_rapida->NM_ajax_opcao = "ajax_filter_delete";
      }
      if ('ajax_filter_select' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['opcao'] = "busca";
          $contr_grid_facturaven_pos_rapida->NM_ajax_flag = true;
          $contr_grid_facturaven_pos_rapida->NM_ajax_opcao = "ajax_filter_select";
      }
       $contr_grid_facturaven_pos_rapida->controle();
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_rapida']['embutida'] && $nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_grid_facturaven_pos_rapida = new grid_facturaven_pos_rapida_apl();
       $contr_grid_facturaven_pos_rapida->controle();
   } 
//
   function nm_limpa_str_grid_facturaven_pos_rapida(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = str_replace("@aspasd@", '"', $str[$x]);
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = str_replace("@aspasd@", '"', $str);
               $str = stripslashes($str);
           }
       }
   }
   function nm_protect_num_grid_facturaven_pos_rapida($name, &$val)
   {
       if (empty($val))
       {
          return;
       }
       $Nm_numeric = array();
       $Nm_numeric[] = "idfacven";
       $Nm_numeric[] = "numfacven";
       $Nm_numeric[] = "credito";
       $Nm_numeric[] = "idcli";
       $Nm_numeric[] = "subtotal";
       $Nm_numeric[] = "valoriva";
       $Nm_numeric[] = "total";
       $Nm_numeric[] = "asentada";
       $Nm_numeric[] = "saldo";
       $Nm_numeric[] = "adicional";
       $Nm_numeric[] = "adicional2";
       $Nm_numeric[] = "adicional3";
       $Nm_numeric[] = "resolucion";
       $Nm_numeric[] = "vendedor";
       $Nm_numeric[] = "usuario_crea";
       $Nm_numeric[] = "banco";
       $Nm_numeric[] = "dias_decredito";
       if (in_array($name, $Nm_numeric))
       {
           if (is_array($val))
           {
               foreach ($val as $cada_val)
               {
                  $tmp_pos = strpos($cada_val, "##@@");
                  if ($tmp_pos !== false)
                   {
                      $cada_val = substr($cada_val, 0, $tmp_pos);
                  }
                  for ($x = 0; $x < strlen($cada_val); $x++)
                  {
                      if (($cada_val[$x] < 0 || $cada_val[$x] > 9) && $cada_val[$x] != "."  && $cada_val[$x] != "," && $cada_val[$x] != "-")
                      {
                          $val = array();
                          return;
                      }
                   }
               }
               return;
           }
           $cada_val = $val;
           $tmp_pos = strpos($cada_val, "##@@");
           if ($tmp_pos !== false)
            {
               $cada_val = substr($cada_val, 0, $tmp_pos);
           }
           for ($x = 0; $x < strlen($cada_val); $x++)
           {
               if (($cada_val[$x] < 0 || $cada_val[$x] > 9) && $cada_val[$x] != "."  && $cada_val[$x] != "," && $cada_val[$x] != "-")
               {
                   $val = 0;
                   return;
               }
           }
       }
   }
   function grid_facturaven_pos_rapida_pack_protect_string($sString)
   {
      $sString = (string) $sString;
      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
             return sc_htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   }

    function grid_facturaven_pos_rapida_pdf_progress_call($message, $Nm_lang, $flushBuffer = false) {
        $message = trim($message);
        if ('off' == $message)
        {
            $bol_end = TRUE;
        }
        elseif (false !== strpos($message, 'HDOC_#NM#_'))
        {
            $bol_end    = FALSE;
            $arr_partes = explode('_#NM#_', $message);
            if (4 == sizeof($arr_partes))
            {
                $int_size = $arr_partes[0];
                $str_msg  = ('F' == $arr_partes[2]) ? $Nm_lang['lang_pdff_frmt_page']  : $Nm_lang['lang_pdff_wrtg'];
                $str_msg .= $arr_partes[2];
                $int_step = ('F' == $arr_partes[2]) ? floor($int_size * 0.9) : floor($int_size * 0.95);
            }
            else
            {
                $bol_load = FALSE;
            }
        }
        else
        {
            $bol_end    = FALSE;
            $arr_partes = explode('_#NM#_', $message);
            if (3 == sizeof($arr_partes))
            {
                $int_size = $arr_partes[0];
                $int_step = $arr_partes[1];
                $str_msg  = $arr_partes[2];
            }
            else
            {
                $bol_load = FALSE;
            }
        }
        $return_message = $int_size . '!#!' . $int_step . '!#!' . ($bol_end ? '1' : '0') . '!#!' . ($bol_end ? $Nm_lang['lang_pdff_fnsh'] : $str_msg);
?>
<script type="text/javascript">
if (window.parent && typeof window.parent.updateProgressBar === "function") {
    window.parent.updateProgressBar("<?php echo trim($return_message); ?>");
}
</script>
<?php
        if ($flushBuffer) {
            $bufferSize = @ini_get('output_buffering');
            if ('' != $bufferSize) {
                echo str_repeat('&nbsp;', $bufferSize * 5);
            }
        }
        flush();
    }

?>
