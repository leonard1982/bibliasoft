<?php
   include_once('grid_facturaven_contratos_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_cache']      = "";
   $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_doc']        = "";
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
    if(empty($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class grid_facturaven_contratos_ini
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
   var $link_grid_facturaven_pos_detalle_cons_emb;
   var $link_pdfreport_facturaven_cons;
   var $link_nota_credito_edit;
   var $link_pdf_nc_fe_blk;
   var $link_control_avisos_edit;
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
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "grid_facturaven_contratos"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "FACILWEBv_2022"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20180116"; 
      $this->nm_hr_criacao   = "154435"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20220706"; 
      $this->nm_hr_ult_alt   = "114018"; 
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
      $this->path_prod       = $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_doc'];
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
      if (!isset($_SESSION['scriptcase']['grid_facturaven_contratos']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['grid_facturaven_contratos']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['grid_facturaven_contratos']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Rhino/Sc9_Rhino";
      $this->str_schema_filter = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Rhino/Sc9_Rhino";
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/grid_facturaven_contratos';
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
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
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
      if (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['grid_facturaven_contratos']['actual_lang']) || $_SESSION['scriptcase']['grid_facturaven_contratos']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['grid_facturaven_contratos']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_FACILWEBv_2022',$this->str_lang,'0','/');
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
          include_once("grid_facturaven_contratos_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
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
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['ancor_save'] = $_POST['ancor_save'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
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
      $Tmp_apl_lig = "control_copiar_facturapos";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/control_copiar_facturapos_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/control_copiar_facturapos_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/control_copiar_facturapos_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/control_copiar_facturapos_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["control_copiar_facturapos"] = 'S';
          }
      }
      $this->sc_lig_target["C_@scinf_copiar"] = '_self';
      $this->sc_lig_target["C_@scinf_copiar_@scinf_control_copiar_facturapos"] = '_self';
      $Tmp_apl_lig = "blank_enviar_fe_periodo";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/blank_enviar_fe_periodo_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/blank_enviar_fe_periodo_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/blank_enviar_fe_periodo_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/blank_enviar_fe_periodo_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["blank_enviar_fe_periodo"] = 'S';
          }
      }
      $this->sc_lig_target["B_@scinf_btn_enviar_fv_periodo"] = '_blank';
      $this->sc_lig_target["B_@scinf_btn_enviar_fv_periodo_@scinf_blank_enviar_fe_periodo"] = '_blank';
      $Tmp_apl_lig = "nota_credito";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/nota_credito_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/nota_credito_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/nota_credito_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/nota_credito_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["nota_credito"] = 'S';
          }
      }
      $this->sc_lig_target["C_@scinf_nc"] = '_self';
      $this->sc_lig_target["C_@scinf_nc_@scinf_nota_credito"] = '_self';
      $Tmp_apl_lig = "pdf_nc_fe";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/pdf_nc_fe_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/pdf_nc_fe_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/pdf_nc_fe_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/pdf_nc_fe_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["pdf_nc_fe"] = 'S';
          }
      }
      $this->sc_lig_target["C_@scinf_pdf_nc"] = '_blank';
      $this->sc_lig_target["C_@scinf_pdf_nc_@scinf_pdf_nc_fe"] = '_blank';
      $Tmp_apl_lig = "control_avisos";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/control_avisos_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/control_avisos_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/control_avisos_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/control_avisos_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["control_avisos"] = 'S';
          }
      }
      $this->sc_lig_target["C_@scinf_avisos"] = 'modal';
      $this->sc_lig_target["C_@scinf_avisos_@scinf_control_avisos"] = 'modal';
      if ($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["grid_facturaven_contratos"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["grid_facturaven_contratos"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      $this->link_grid_facturaven_pos_detalle_cons_emb =  $this->root . $this->path_link  . "" . SC_dir_app_name('grid_facturaven_pos_detalle') . "/index.php" ; 
      $this->link_pdfreport_facturaven_cons =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('pdfreport_facturaven') . "/" ; 
      $this->link_nota_credito_edit =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('nota_credito') . "/" ; 
      $this->link_pdf_nc_fe_blk =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('pdf_nc_fe') . "/" ; 
      $this->link_control_avisos_edit =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('control_avisos') . "/" ; 
      $this->link_impresion_pos_pdf_cons =  $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('impresion_pos_pdf') . "/" ; 
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = "UTF-8";
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
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['redir']))
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
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_default:hover{; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:active img{filter: brightness(2)}.scButton_default:active{; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_default_selected { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_group { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:grayscale(100%);  }";
          echo ".scButton_group:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_group:hover{; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_group:active img{filter: brightness(2)}.scButton_group:active{; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=40); opacity:0.4; padding:7.8px 15px;margin:0px -5px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_group_selected { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:none;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:hover img, .scButton_groupfirst:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_small:hover{; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:active img{filter: brightness(2)}.scButton_small:active{; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_sc_image_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
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
          if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan'])) 
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
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

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
      include_once($this->path_aplicacao . "grid_facturaven_contratos_erro.class.php"); 
      $this->Erro = new grid_facturaven_contratos_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('grid_facturaven_contratos'); 
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
      $this->Tree_img_type   = "kie";
      $str_button = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_BlueBerry";
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

      $this->arr_buttons_usr['Eliminar']['hint']             = "Eliminar";
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

      $this->arr_buttons_usr['copiar_documento_como']['hint']             = "Copiar documento como";
      $this->arr_buttons_usr['copiar_documento_como']['type']             = "image";
      $this->arr_buttons_usr['copiar_documento_como']['value']            = "Copiar documento como";
      $this->arr_buttons_usr['copiar_documento_como']['display']          = "only_img";
      $this->arr_buttons_usr['copiar_documento_como']['display_position'] = "text_right";
      $this->arr_buttons_usr['copiar_documento_como']['style']            = "";
      $this->arr_buttons_usr['copiar_documento_como']['image']            = "scriptcase__NM__ico__NM__copy_32.png";

      $this->arr_buttons_usr['btn_enviar_fe']['hint']             = "Enviar Factura Electrónica";
      $this->arr_buttons_usr['btn_enviar_fe']['type']             = "image";
      $this->arr_buttons_usr['btn_enviar_fe']['value']            = "Enviar Factura";
      $this->arr_buttons_usr['btn_enviar_fe']['display']          = "only_img";
      $this->arr_buttons_usr['btn_enviar_fe']['display_position'] = "text_right";
      $this->arr_buttons_usr['btn_enviar_fe']['style']            = "";
      $this->arr_buttons_usr['btn_enviar_fe']['image']            = "scriptcase__NM__ico__NM__server_mail_download_32.png";

      $this->arr_buttons_usr['btn_recargar']['hint']             = "";
      $this->arr_buttons_usr['btn_recargar']['type']             = "image";
      $this->arr_buttons_usr['btn_recargar']['value']            = "btn_recargar";
      $this->arr_buttons_usr['btn_recargar']['display']          = "only_img";
      $this->arr_buttons_usr['btn_recargar']['display_position'] = "text_right";
      $this->arr_buttons_usr['btn_recargar']['style']            = "";
      $this->arr_buttons_usr['btn_recargar']['image']            = "scriptcase__NM__ico__NM__nav_refresh_green_32.png";

      $this->arr_buttons_usr['btn_copiar_rango']['hint']             = "Duplicar Documentos";
      $this->arr_buttons_usr['btn_copiar_rango']['type']             = "image";
      $this->arr_buttons_usr['btn_copiar_rango']['value']            = "Duplicar";
      $this->arr_buttons_usr['btn_copiar_rango']['display']          = "only_img";
      $this->arr_buttons_usr['btn_copiar_rango']['display_position'] = "text_right";
      $this->arr_buttons_usr['btn_copiar_rango']['style']            = "";
      $this->arr_buttons_usr['btn_copiar_rango']['image']            = "scriptcase__NM__ico__NM__data_copy_32.png";

      $this->arr_buttons_usr['btn_pdf_fe']['hint']             = "Ver PDF FE";
      $this->arr_buttons_usr['btn_pdf_fe']['type']             = "image";
      $this->arr_buttons_usr['btn_pdf_fe']['value']            = "Ver PDF FE";
      $this->arr_buttons_usr['btn_pdf_fe']['display']          = "only_img";
      $this->arr_buttons_usr['btn_pdf_fe']['display_position'] = "text_right";
      $this->arr_buttons_usr['btn_pdf_fe']['style']            = "";
      $this->arr_buttons_usr['btn_pdf_fe']['image']            = "grp__NM__ico__NM__ico_pdf_32x32.png";

      $this->arr_buttons_usr['btn_consultar_estado_fe']['hint']             = "Consultar estado factura electrónica";
      $this->arr_buttons_usr['btn_consultar_estado_fe']['type']             = "image";
      $this->arr_buttons_usr['btn_consultar_estado_fe']['value']            = "";
      $this->arr_buttons_usr['btn_consultar_estado_fe']['display']          = "only_img";
      $this->arr_buttons_usr['btn_consultar_estado_fe']['display_position'] = "text_right";
      $this->arr_buttons_usr['btn_consultar_estado_fe']['style']            = "";
      $this->arr_buttons_usr['btn_consultar_estado_fe']['image']            = "scriptcase__NM__ico__NM__server_from_client_32.png";

      $this->arr_buttons_usr['btn_enviar_fv_periodo']['hint']             = "Enviar facturas el periodo";
      $this->arr_buttons_usr['btn_enviar_fv_periodo']['type']             = "button";
      $this->arr_buttons_usr['btn_enviar_fv_periodo']['value']            = "Enviar facturas";
      $this->arr_buttons_usr['btn_enviar_fv_periodo']['display']          = "text_fontawesomeicon";
      $this->arr_buttons_usr['btn_enviar_fv_periodo']['display_position'] = "text_right";
      $this->arr_buttons_usr['btn_enviar_fv_periodo']['style']            = "facebook";
      $this->arr_buttons_usr['btn_enviar_fv_periodo']['image']            = "";
      $this->arr_buttons_usr['btn_enviar_fv_periodo']['has_fa']            = "true";
      $this->arr_buttons_usr['btn_enviar_fv_periodo']['fontawesomeicon']            = "fas fa-share-square";

      $this->arr_buttons_usr['btn_regenerar_estado']['hint']             = "Resetear estado";
      $this->arr_buttons_usr['btn_regenerar_estado']['type']             = "image";
      $this->arr_buttons_usr['btn_regenerar_estado']['value']            = "Resetear estado";
      $this->arr_buttons_usr['btn_regenerar_estado']['display']          = "only_img";
      $this->arr_buttons_usr['btn_regenerar_estado']['display_position'] = "text_right";
      $this->arr_buttons_usr['btn_regenerar_estado']['style']            = "";
      $this->arr_buttons_usr['btn_regenerar_estado']['image']            = "scriptcase__NM__ico__NM__document_refresh_24.png";
      $this->str_google_fonts= isset($str_google_fonts)?$str_google_fonts:'';
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      if (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/grp__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scGridPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scGridBorder\">\r\n";
              $SS_cod_html .= "    <table class=\"scGridTabela\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scGridFieldOdd\"><td class=\"scGridFieldOddFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']);
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
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQXsDQB/HIrKD5BODMBOVcB/HEFYHMBqD9XGZ1B/D1rwHuJwHgveVkJqHEXCHIB/HQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoX7HQJmZ1F7Z1vmD5rqDEBOHArCDWF/HMBOHQNmDQJsHIBeHuBiDMBYDkBOV5F/HIFGHQNmH9BqZ1NOZMFaHgNOVkJ3H5FYHMJwHQFYDQFaHArYVWJwDMvmVcFKV5BmVoBqD9BsZkFGHArKV5FaDErKHENiV5FaDorqD9NwH9X7Z1rwD5NUHuBOVIBODWFYHMBiD9BsVIraD1rwV5X7HgBeHEFKV5FaVoBqD9NwH9X7DSBYD5JsHgrYDkBODWF/VoB/DcBqH9FaD1rKZMFaDErKVkXeDWX7ZuBODcBwDQX7Z1N7V5raHgvsDkBOV5X7DoJsD9BiZ1rqHAN7D5NUDEvsHEFiV5FaDoXGHQXGH9FGHAveD5BOHuzGVcFeDWXCDoJsDcBwH9B/Z1rYHQJwHgvsVkJGDWFGZuBqD9NwDQFaHArYHuFGDMBYVIBODWFaDoXGHQNmH9BqHArKV5FUDMrYZSXeV5FqHIJsHQNmDuBqDSvCVWJeDMNOVcB/DWFaHMFUDcFYVIJwZ1vOZMJeHgNOHEJqHEFqHIX7HQXsDuBOZ1BYHuXGDMrYDkBsH5FqHINUHQJmVIraZ1rYHQJeHgNOVkJ3DWFqHIXGHQNwZ9rqD1BeD5rqHuvmVcBOH5B7VoBqHQXOZkBiDSvmZMXGHgNKHArCH5FYHIX7HQNwDQBOZ1BYHQJsHgrwVcXKDWFYHMFGHQNwVIraZ1rYHQFGHgrKZSJ3V5XCHMFGDcBiDQBOZ1zGVWBOHgvOVcXKH5FqHIX7DcNmZkFUD1rwV5FGDEBeHEXeH5X/DoF7HQNmDQBqDSN7HQJwDMBYVcFeDWFaVoBiDcFYZ1FUZ1rYHuB/HgBOHArCV5FqHINUHQNwDQBOZ1BYHQrqDMvsV9FeDWFaHMF7HQJmVIraZ1rYHQNUHgvsHArsDWXCHMBiHQXsZ9JeD1BeD5rqHuvmVcBOH5B7VoBqD9XOH9B/D1rwD5BiDErKHEFiDWX7ZuFaD9JKDQB/Z1NaV5JwHuBYVIBODWFaVoX7HQFYH9FaHIBeZMBODEvsDkBsV5FaVoJeD9NmDQJsZ1BYD5rqDMrwDkFCH5FqVoBqD9XOZSB/DSrYD5BqDEvsHEFiH5FYDoraD9NwZSX7D1vOV5JwHgNKDkBODuFqDoFGDcBqVIJwD1rwD5JeDMBYZSJqV5FaVoJeD9XsZSFGD1BeVWJsHgrYDkBOHEFYVorqHQFYZkBiHAzGZMBOHgveDkFeV5B7DoXGHQBiDuBOZ1zGVWJsDMvsVcFiV5X/VoF7HQNmZkBiHIBeHQJwDEBODkFeH5FYVoFGHQJKDQBqHAvmV5JeDMvOZSNiDWrmVorqHQBqZ1BiHAvCZMB/HgBeHEFiV5B3DoF7D9XsDuFaHAveV5BqHgvsDkBsH5FqHMBqHQJmVIJsHANOD5BqHgNKZSJ3H5BmZuBqD9NwH9FUHABYHuXGHgrwVIBsDWXCDoJsDcBwH9B/Z1rYHQJwHgvsHErCDWFqHMXGHQNmH9BiHArYHQrqDMNOVcFeV5FGVoFaHQJmZkFGHIrwHQraHgvsZSJ3V5XCHMFGHQNmZ9rqHAveHQBODMvmVcB/DWF/HMFUHQXGZSBOHAN7HuJeDMrYHENiDWr/HMXGHQNwH9BiHArYHQF7DMvmVcFKV5BmVoBqD9BsZkFGHAvsZMJeHgvCDkXKDWBmZura";
      $this->prep_conect();
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['initialize']) && $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['initialize'])  
      { 
          $this->conectDB();
          $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
if (!isset($_SESSION['gproveedor'])) {$_SESSION['gproveedor'] = "";}
if (!isset($this->sc_temp_gproveedor)) {$this->sc_temp_gproveedor = (isset($_SESSION['gproveedor'])) ? $_SESSION['gproveedor'] : "";}
  $vsql = "SELECT proveedor, if(modo='PRUEBAS',servidor_prueba1,servidor1) as server1, if(modo='PRUEBAS',servidor_prueba2,servidor2) as server2, if(modo='PRUEBAS',token_prueba,tokenempresa) as tk_empresa, if(modo='PRUEBAS',password_prueba,tokenpassword) as tk_password, modo, enviar_dian, enviar_cliente FROM webservicefe where idwebservicefe='1'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vWS = array();
      $this->vws = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vWS[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vws[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vWS = false;
          $this->vWS_erro = $this->Db->ErrorMsg();
          $this->vws = false;
          $this->vws_erro = $this->Db->ErrorMsg();
      } 
;	
if(isset($this->vws[0][0]))
{
	$this->sc_temp_gproveedor = $this->vws[0][0];
}

$vsql = "SELECT prefijo,fec_vencimiento, ultima_fac,Idres FROM resdian WHERE fecha>0 and activa='SI' and prefijo<>'00' and rangofac>0 and resolucion>0";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiActivaPJ = array();
      $this->vsiactivapj = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiActivaPJ[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiactivapj[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiActivaPJ = false;
          $this->vSiActivaPJ_erro = $this->Db->ErrorMsg();
          $this->vsiactivapj = false;
          $this->vsiactivapj_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vsiactivapj[0][0]))
{
	$vmensaje    = "";
	$vreg        = count($this->vsiactivapj );
	
	for($i=0;$i<$vreg;$i++)
	{
		$vprefijo    = $this->vsiactivapj[$i][0];
		$vfechavence = $this->vsiactivapj[$i][1];
		$vfechavence = date_create($vfechavence);
		$vfechavence2= date_format($vfechavence,"Y-m-d"); 
		$vfechavence = date_format($vfechavence,"Ymd");
		$vultimafac  = $this->vsiactivapj[$i][2];
		$vidres      = $this->vsiactivapj[$i][3];
		$vnumero     = 0;
		$vfechaactual= date("Ymd");
		$vfechaactual2 = date("Y-m-d");
		
		$vsql = "select max(numfacven) from facturaven where resolucion='".$vidres."'";
		 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNum = array();
      $this->vnum = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vNum[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vnum[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNum = false;
          $this->vNum_erro = $this->Db->ErrorMsg();
          $this->vnum = false;
          $this->vnum_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->vnum[0][0]))
		{
			$vnumero = $this->vnum[0][0];
		}
		
		if($vultimafac<$vnumero)
		{
			$vmensaje   .= "LA RESOLUCION DEL PREFIJO: ".$vprefijo." HA LLEGADO AL LÍMITE EN SU NUMERACIÓN <br> ";
		}
		
		$vndiferencia = $vultimafac-$vnumero;
		if($vndiferencia<=10)
		{
			$vmensaje   .= "LA RESOLUCION DEL PREFIJO: ".$vprefijo." ESTA LLEGADO AL LÍMITE,LE QUEDAN ".$vndiferencia." DOCUMENTOS RESTANTES  <br> ";
		}
		
		if($vfechavence<$vfechaactual)
		{
			$vmensaje   .= "LA RESOLUCION DEL PREFIJO: ".$vprefijo." ESTÁ VENCIDA <br> ";
		}
		
		$vfecha1= new DateTime($vfechaactual2);
		$vfecha2= new DateTime($vfechavence2);
		$vdiff = $vfecha1->diff($vfecha2);

		if($vdiff->days<=7)
		{
			$vmensaje   .= "LA RESOLUCION DEL PREFIJO: ".$vprefijo." LE QUEDAN ".$vdiff->days." DÍAS PARA VENCERCE <br> ";
		}
	}
	
	if(!empty($vmensaje))
	{
		$this->nm_mens_alert[] = $vmensaje;$this->nm_params_alert[] = array();}
}
if (isset($this->sc_temp_gproveedor)) {$_SESSION['gproveedor'] = $this->sc_temp_gproveedor;}
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['initialize'] = false;
          $this->Db->Close(); 
      } 
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
          if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_Rhino_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_Rhino_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = ""; 
      }
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_detalle']['ind_tree'] = 0;
      if (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['emb_linha']))
      {
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['emb_linha'] = 0;
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
              if (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao']) && $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_perfil']) && $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao']))
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
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'FACILWEBv_2022', 2, $this->force_db_utf8); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_perfil'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['embutida_init']) 
      {
          if (!isset($_SESSION['ganio'])) 
          {
              $this->nm_falta_var .= "ganio; ";
          }
          if (!isset($_SESSION['gperiodo'])) 
          {
              $this->nm_falta_var .= "gperiodo; ";
          }
          if (!isset($_SESSION['gcodzona'])) 
          {
              $this->nm_falta_var .= "gcodzona; ";
          }
          if (!isset($_SESSION['gresolucion'])) 
          {
              $this->nm_falta_var .= "gresolucion; ";
          }
          if (!isset($_SESSION['gcontador_grid_fe'])) 
          {
              $this->nm_falta_var .= "gcontador_grid_fe; ";
          }
          if (!isset($_SESSION['gbd_seleccionada'])) 
          {
              $this->nm_falta_var .= "gbd_seleccionada; ";
          }
          if (!isset($_SESSION['gidtercero'])) 
          {
              $this->nm_falta_var .= "gidtercero; ";
          }
          if (!isset($_SESSION['gIdfac'])) 
          {
              $this->nm_falta_var .= "gIdfac; ";
          }
          if (!isset($_SESSION['gproveedor'])) 
          {
              $this->nm_falta_var .= "gproveedor; ";
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
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_default:hover{; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:active img{filter: brightness(2)}.scButton_default:active{; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_default_selected { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_group { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:grayscale(100%);  }";
          echo ".scButton_group:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_group:hover{; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_group:active img{filter: brightness(2)}.scButton_group:active{; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=40); opacity:0.4; padding:7.8px 15px;margin:0px -5px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_group_selected { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:0px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:none;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:hover img, .scButton_groupfirst:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_small:hover{; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1B8FC8; border-style:solid; border-radius:2px; background-color:#1B8FC8;}.scButton_default:active img{filter: brightness(2)}.scButton_small:active{; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_disabled { font-family:Tahoma, Arial, sans-serif; color:#7d7d7d; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif; color:#3C4858; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#E0E6ED; border-style:solid; border-radius:2px; background-color:#FFFFFF; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_sc_image_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
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
          if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan'])) 
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
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv_2022', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['embutida'])
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
          $this->Db->Execute("SET TEXTSIZE 2147483647");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['embutida'])
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_sep_date1'];
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
       return (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grid_facturaven_contratos']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
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
class grid_facturaven_contratos_sub_css
{
   function __construct()
   {
      global $script_case_init;
      if (!$this->Ini) 
      { 
          $this->Ini = new grid_facturaven_contratos_ini(); 
          $this->Ini->init("Path_sub");
      } 
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_detalle']['SC_herda_css'] = "S"; 
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_detalle']['embutida'] = true;
      include_once ($this->Ini->link_grid_facturaven_pos_detalle_cons_emb);
      $this->grid_facturaven_pos_detalle = new grid_facturaven_pos_detalle_sub_css ;
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_pos_detalle']['embutida'] = false;
      $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Rhino/Sc9_Rhino";
      if ($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['SC_herda_css'] == "N")
      {
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css']['grid_facturaven_contratos']    = $str_schema_all . "_grid.css";
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css_bw']['grid_facturaven_contratos'] = $str_schema_all . "_grid_bw.css";
      }
   }
}
//
class grid_facturaven_contratos_apl
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
             $glo_senha_protect, $nmgp_opcao, $nm_call_php, $rec, $nmgp_quant_linhas, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_parms_where;

      $Parms_form_pdf = false;
      if (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_facturaven_contratos']))
      { 
          $GLOBALS['nmgp_parms'] = $_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_facturaven_contratos'];
          $Parms_form_pdf = true;
      } 
      if ($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'] || $Parms_form_pdf)
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
                       nm_limpa_str_grid_facturaven_contratos($cadapar[1]);
                       nm_protect_num_grid_facturaven_contratos($cadapar[0], $cadapar[1]);
                       if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                       $Tmp_par   = $cadapar[0];
                       $$Tmp_par = $cadapar[1];
                       if ($Tmp_par == "nmgp_opcao")
                       {
                           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] = $cadapar[1];
                       }
                   }
              }
          } 
          if (isset($ganio)) 
          {
              $_SESSION['ganio'] = $ganio;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["ganio"]);
          }
          if (isset($gperiodo)) 
          {
              $_SESSION['gperiodo'] = $gperiodo;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gperiodo"]);
          }
          if (isset($gcodzona)) 
          {
              $_SESSION['gcodzona'] = $gcodzona;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gcodzona"]);
          }
          if (isset($gresolucion)) 
          {
              $_SESSION['gresolucion'] = $gresolucion;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gresolucion"]);
          }
          if (isset($ganio2)) 
          {
              $_SESSION['ganio2'] = $ganio2;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["ganio2"]);
          }
          if (isset($gperiodo2)) 
          {
              $_SESSION['gperiodo2'] = $gperiodo2;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gperiodo2"]);
          }
          if (isset($gcodzona2)) 
          {
              $_SESSION['gcodzona2'] = $gcodzona2;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gcodzona2"]);
          }
          if (isset($gcontador_grid_fe)) 
          {
              $_SESSION['gcontador_grid_fe'] = $gcontador_grid_fe;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gcontador_grid_fe"]);
          }
          if (isset($gbd_seleccionada)) 
          {
              $_SESSION['gbd_seleccionada'] = $gbd_seleccionada;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gbd_seleccionada"]);
          }
          if (isset($gidtercero)) 
          {
              $_SESSION['gidtercero'] = $gidtercero;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gidtercero"]);
          }
          if (!isset($gIdfac) && isset($gidfac)) 
          {
             $gIdfac = $gidfac;
          }
          if (isset($gIdfac)) 
          {
              $_SESSION['gIdfac'] = $gIdfac;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gIdfac"]);
          }
          if (isset($gproveedor)) 
          {
              $_SESSION['gproveedor'] = $gproveedor;
              nm_limpa_str_grid_facturaven_contratos($_SESSION["gproveedor"]);
          }
      } 
      if ($Parms_form_pdf)
      { 
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_pdf'] = true;
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form'] = true;
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_full'] = false;
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_pai'] = "";
      } 
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      if (!$this->Ini || isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_ibase'])) 
      { 
          $this->Ini = new grid_facturaven_contratos_ini(); 
          $this->Ini->init();
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_ibase'] = true;
      }
      $this->Ini->Proc_print      = false;
      $this->Ini->Export_det_zip  = false;
      $this->Ini->Export_html_zip = false;
      $this->Ini->Export_img_zip  = false;
      $this->Ini->Img_export_zip  = array();
      $this->Ini->Init_apl_lig = array();
      $this->List_apl_lig = array('pdfreport_facturaven'=>array('type'=>'reportpdf', 'lab'=>'Factura de Venta', 'hint'=>'Factura de Venta', 'img_on'=>'scriptcase__NM__ico__NM__document_32.png', 'img_off'=>'scriptcase__NM__ico__NM__document_32.png'),'blank_enviar_fe_periodo'=>array('type'=>'blank', 'lab'=>'Enviar facturas el periodo', 'hint'=>'', 'img_on'=>'scriptcase__NM__ico__NM__server_earth_24.png', 'img_off'=>'scriptcase__NM__ico__NM__server_earth_24.png'));
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['emb_lig_aba'] = array();
      $this->Change_Menu = false;
       if ($nmgp_opcao == "link_res")  
       { 
           $nmgp_opcao = "inicio";  
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "inicio";  
           $Temp_parms = "";  
           $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms_where);
           $todox = stripslashes($todox);
           $todo  = explode("?@?", $todox);
           foreach ($todo as $param)
           {
                $cadapar  = explode("?#?", $param);
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "fecha")
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
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "sc_free_group_by")
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
                    elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_orig'][$cadapar[0]]))
                    {
                        list ($Sql_orig, $Sql_order) = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_sql'][$cadapar[0]];
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
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "formapago")
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
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porcliente")
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
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porpj")
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
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "portipo")
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
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porvendedor")
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
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porasentada")
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
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "pagada")
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
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porbanco")
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
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_resumo'] = $Temp_parms;
       } 
      if ($nmgp_opcao != "ajax_navigate" && $nmgp_opcao != "ajax_detalhe" && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_outra_jan'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_modal']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grid_facturaven_contratos']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grid_facturaven_contratos'];
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['emb_lig_aba'] = $this->Ini->Init_apl_lig;
          }
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'] && $this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_facturaven_contratos']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_facturaven_contratos']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('grid_facturaven_contratos') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_facturaven_contratos']['label'] = "Facturas de venta contrato";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "grid_facturaven_contratos")
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
      {
          $this->Change_Menu = false;
      }
      $this->Db = $this->Ini->Db; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['nm_tpbanco'] = $this->Ini->nm_tpbanco;
      include_once($this->Ini->path_aplicacao . 'webservice_receptor2.php');
      $this->nm_data = new nm_data("es");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
      { 
          include_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_erro.class.php"); 
      } 
      else 
      { 
          include_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_erro.class.php"); 
      } 
      $this->Erro      = new grid_facturaven_contratos_erro();
      $this->Erro->Ini = $this->Ini;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_lookup.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_lookup.class.php"); 
      } 
      $this->Lookup       = new grid_facturaven_contratos_lookup();
      $this->Lookup->Db   = $this->Db;
      $this->Lookup->Ini  = $this->Ini;
      $this->Lookup->Erro = $this->Erro;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
      {
          $this->Ini->sc_Include($this->Ini->path_libs . "/nm_trata_saida.php", "C", "nm_trata_saida") ; 
          $nm_saida = new nm_trata_saida();
          $ajax_opc_print = false;
          if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_export")
          {
              $this->Ini->sc_export_ajax = true;
              $this->Ini->Arr_result     = array();
              $nmgp_opcao                = $_POST['export_opc'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = $nmgp_opcao;
              if ($nmgp_opcao == "print" || $nmgp_opcao == "res_print" || $nmgp_opcao == "det_print")
              {
                  $ajax_opc_print   = true;
                  $nm_arquivo_print = "/sc_grid_facturaven_contratos_" . session_id();
                  $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_print . ".html");
                  $this->Ini->sc_export_ajax_img = true;
              }
              ob_start();
          }
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
      {
          $_SESSION['scriptcase']['saida_var'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ajax_nav'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['scroll_navigate'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['scroll_navigate_reload'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['scroll_navigate_app'] = false;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['scroll_navigate_header_row']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['scroll_navigate_header_row'] = 1;
          }
          if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_navigate" || $_POST['nmgp_opcao'] == "ajax_detalhe"))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ajax_nav'] = true;
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $this->Ini->Arr_result = array();
              $nmgp_opcao = $_POST['opc'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = $nmgp_opcao;
              if (isset($_POST['parm']) && $_POST['parm'] == "save_grid")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['save_grid'] = true;
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
                  $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['contr_total_geral'] = "NAO";
                  $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['contr_array_resumo'] = "NAO";
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['tot_geral']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['arr_total']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pivot_group_by']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pivot_x_axys']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pivot_y_axys']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pivot_fill']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pivot_order']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pivot_order_col']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pivot_order_level']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pivot_order_sort']);
                  unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pivot_tabular']);
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
          }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format'] = array();
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format']['fecha']['fechaven'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format']['fecha']['fechaven'] = 'YYYYMMDD2';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_def_sql']['fecha']['fechaven'] = 'fechaven';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format']['sc_free_group_by']['fechaven'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format']['sc_free_group_by']['fechaven'] = 'YYYYMMDD2';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format']['sc_free_group_by']['fechavenc'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_date_format']['sc_free_group_by']['fechavenc'] = 'YYYYMMDD2';
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_All_Groupby'] = array('_NM_SC_' => 'grid', 'fecha' => 'all', 'sc_free_group_by' => 'all', 'formapago' => 'all', 'porcliente' => 'all', 'porpj' => 'all', 'portipo' => 'all', 'porvendedor' => 'all', 'porasentada' => 'all', 'pagada' => 'all', 'porbanco' => 'all');
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Groupby_hide'])) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Groupby_hide'] = array();
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'])) 
      { 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_All_Groupby'] as $Ind => $Tp)
          {
              if (!in_array($Ind, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Groupby_hide'])) 
              { 
                  break;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] = $Ind;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_cmp'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_cmp']  = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_sql']  = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_orig'] = array();
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'] = array();
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "fecha")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = "Fecha";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          $Arr_free_labels = array();
          $Arr_free_labels['credito'] = "F.Pago";
          $Arr_free_labels['fechaven'] = "Fecha";
          $Arr_free_labels['fechavenc'] = "Fechavenc";
          $Arr_free_labels['idcli'] = "Cliente";
          $Arr_free_labels['pagada'] = "Pagada";
          $Arr_free_labels['asentada'] = "Asentada";
          $Arr_free_labels['resolucion'] = "PJ";
          $Arr_free_labels['vendedor'] = " Vendedor";
          $Arr_free_labels['tipo'] = "Tipo";
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_cmp'] as $Field => $Label)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = $Arr_free_labels[$Field];
          }
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "formapago")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = "F.Pago";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porcliente")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = "Cliente";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porpj")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = "PJ";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "portipo")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = "Tipo";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porvendedor")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = " Vendedor";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porasentada")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = "Asentada";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "pagada")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = "Pagada";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porbanco")
      {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Labels_GB'][] = "Caja";
      }
      if  ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "_NM_SC_")
      {
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['fecha'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['fecha'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['fecha']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['fecha'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['sc_free_group_by'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['sc_free_group_by'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['sc_free_group_by']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['sc_free_group_by'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['formapago'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['formapago'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['formapago']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['formapago'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porcliente'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porcliente'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porcliente']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porcliente'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porpj'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porpj'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porpj']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porpj'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['portipo'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['portipo'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['portipo']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['portipo'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porvendedor'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porvendedor'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porvendedor']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porvendedor'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porasentada'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porasentada'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porasentada']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porasentada'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['pagada'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['pagada'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['pagada']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['pagada'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][2] = array('label' => "" .  $this->Ini->Nm_lang['lang_btns_smry_msge_cnt'] . "", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 2;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][3] = array('label' => "Total(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 3;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][4] = array('label' => "Descuento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 4;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][5] = array('label' => "SubTotal(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 5;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][6] = array('label' => "IVA(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 6;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][7] = array('label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 7;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][8] = array('label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 8;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][9] = array('label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 9;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][10] = array('label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 10;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']['porbanco'][11] = array('label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")", 'display' => true);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']['porbanco'][] = 11;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porbanco']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']['porbanco'] = array(
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
               array(
                   'cmp_res' => "base_iva_19",
                   'label' => "Base19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '7', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"7\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_19",
                   'label' => "IVA19%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA19%",
                   'options' => array(
                       array('op' => 'S', 'index' => '8', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_19\" onChange=\"scSummChange($(this))\"><option value=\"8\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "base_iva_5",
                   'label' => "Base5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Base5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '9', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-base_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"9\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "valor_iva_5",
                   'label' => "IVA5%(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "IVA5%",
                   'options' => array(
                       array('op' => 'S', 'index' => '10', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-valor_iva_5\" onChange=\"scSummChange($(this))\"><option value=\"10\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
               array(
                   'cmp_res' => "excento",
                   'label' => "Excento(" .  $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . ")",
                   'label_field' => "Excento",
                   'options' => array(
                       array('op' => 'S', 'index' => '11', 'label' => "" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "", 'abbrev' => "Sum"),
                   ),
                   'select' => "<select class=\"sc-ui-select-excento\" onChange=\"scSummChange($(this))\"><option value=\"11\" class=\"sc-ui-select-option-S\">" . $this->Ini->Nm_lang['lang_btns_smry_msge_sumt'] . "</option></select>",
               ),
           );
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['all']['SC_Ind_Groupby'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['all']['SC_Gb_Free_cmp'] = array();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['all']['SC_Ind_Groupby'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_cmp']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['all']['SC_Gb_Free_cmp'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_cmp'];
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['res']['summarizing_fields_display'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['res']['summarizing_fields_order']   = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['res']['summarizing_fields_control'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['res']['pivot_x_axys']               = array();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['res']['summarizing_fields_display'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_display'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['res']['summarizing_fields_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_order'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['res']['summarizing_fields_control'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['summarizing_fields_control'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pivot_x_axys']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dados_orig_gb']['res']['pivot_x_axys'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pivot_x_axys'];
          }
      }
      $this->Ini->Apl_resumo  = "grid_facturaven_contratos_resumo_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] . ".class.php"; 
      $this->Ini->Apl_grafico = "grid_facturaven_contratos_grafico_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] . ".class.php"; 
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['xls_return']  = ($nmgp_opcao == "xls")  ? "volta_grid" : "resumo"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['csv_return']  = ($nmgp_opcao == "csv")  ? "volta_grid" : "resumo"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['xml_return']  = ($nmgp_opcao == "xml")  ? "volta_grid" : "resumo"; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['json_return'] = ($nmgp_opcao == "json") ? "volta_grid" : "resumo"; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['print_return'] = $this->ret_print;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
      {
          if ($this->Ini->Export_html_zip)
          {
              $this->Ini->Export_img_zip = true;
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['html_name']))
              {
                  $nm_arquivo_html = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['html_name'];
              }
              elseif ($nmgp_opcao == 'print' && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)
              {
                  $nm_arquivo_html = "/sc_grid_facturaven_contratos_" . session_id() . ".html";
              }
              else
              {
                  $nm_arquivo_html = "/sc_grid_facturaven_contratos_res_" . session_id() . ".html";
              }
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html);
          }
      }
      if ($nmgp_opcao == "doc_word") {  
          $this->ret_word = "volta_grid";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_return'] = $this->ret_word;
          $_SESSION['scriptcase']['proc_mobile'] = false;
      }
      if ($nmgp_opcao == "doc_word_res") {  
          $this->ret_word = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_return'] = $this->ret_word;
          $_SESSION['scriptcase']['proc_mobile'] = false;
      }
      if ($nmgp_opcao == "doc_word_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "doc_word"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "doc_word"; 
      }
      elseif ($nmgp_opcao == "doc_word" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "doc_word_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "doc_word_res"; 
      }
      if ($nmgp_opcao == "xls_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "xls"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "xls"; 
      }
      elseif ($nmgp_opcao == "xls" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "xls_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "xls_res"; 
      }
      if ($nmgp_opcao == "csv_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "csv"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "csv"; 
      }
      elseif ($nmgp_opcao == "csv" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "csv_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "csv_res"; 
      }
      if ($nmgp_opcao == "xml_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "xml"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "xml"; 
      }
      elseif ($nmgp_opcao == "xml" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "xml_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "xml_res"; 
      }
      if ($nmgp_opcao == "json_res" && strpos(" " . $this->Ini->SC_module_export, "grid") !== false)  
      { 
          $nmgp_opcao = "json"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "json"; 
      }
      elseif ($nmgp_opcao == "json" && strpos(" " . $this->Ini->SC_module_export, "grid") === false)  
      { 
          $nmgp_opcao = "json_res"; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "json_res"; 
      }
      $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['skip_charts'] = (strpos(" " . $this->Ini->SC_module_export, "chart") !== false) ? false : true;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_det'] = false;
      if ($nmgp_opcao == 'pdf')
      { 
          if (strpos(" " . $this->Ini->SC_module_export, "grid") === false && (strpos(" " . $this->Ini->SC_module_export, "resume") !== false || strpos(" " . $this->Ini->SC_module_export, "chart") !== false))
          { 
              $nmgp_opcao = 'pdf_res';
          } 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_res'] = false;
      if ($nmgp_opcao == 'pdf_res')
      {
          if (strpos(" " . $this->Ini->SC_module_export, "grid") !== false)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = 'pdf';
              $nmgp_opcao = 'pdf';
          }
          else
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_res'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = 'pdf';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['conf_chart_level'] = "S";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['graf_disp']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['graf_disp']        = array('Bar', 'Pie', 'Line', 'Area');
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_tipo']        = 'Bar';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_larg']        = '800';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_alt']         = '600';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['graf_opc_atual']   = '1';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['graf_mod_allowed'] = array(1, 2);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['graf_order']       = '';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_font'] = '';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['graf_subtitle_val'] = '';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['chartpallet']       = '1';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['graf_exibe_val']    = '0';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['paletteColors']     = '';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_barra_orien'] = 'Vertical';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_barra_forma'] = 'Bar';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_barra_dimen'] = '3d';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_barra_sobre'] = 'No';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_barra_empil'] = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_barra_inver'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_barra_agrup'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_barra_funil'] = 'N';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_pizza_forma'] = 'Pie';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_pizza_dimen'] = '3d';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_pizza_orden'] = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_pizza_explo'] = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_pizza_valor'] = 'Valor';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_linha_forma'] = 'Line';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_linha_inver'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_linha_agrup'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_area_forma']  = 'Area';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_area_empil']  = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_area_inver']  = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_area_agrup']  = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_marca_inver'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_marca_agrup'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_gauge_forma'] = 'Circular';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_radar_forma'] = 'Line';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_radar_empil'] = 'Off';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_polar_forma'] = 'Line';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_funil_dimen'] = '3d';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_funil_inver'] = 'Normal';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_pyram_dimen'] = '3d';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_pyram_valor'] = 'Valor';
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cfg_graf']['graf_pyram_forma'] = 'S';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida']      = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_grid']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_grid'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_init']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_init'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_label']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_label'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cab_embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cab_embutida'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_pdf']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_pdf'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_treeview']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_treeview'] = false;
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['proc_pdf'] = (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'] && ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "pdf_res")) ? true : false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['proc_pdf']) {
          $_SESSION['scriptcase']['proc_mobile'] = false;
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['proc_pdf_vert'] = false;
      include("../_lib/css/" . $this->Ini->str_schema_all . "_grid.php");
      $this->Ini->Tree_img_col    = trim($str_tree_col);
      $this->Ini->Tree_img_exp    = trim($str_tree_exp);
      $this->Ini->scGridRefinedSearchExpandFAIcon    = trim($scGridRefinedSearchExpandFAIcon);
      $this->Ini->scGridRefinedSearchCollapseFAIcon    = trim($scGridRefinedSearchCollapseFAIcon);
      $str_button = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_BlueBerry";
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

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "zona";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "barrio";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "fechaven";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "numero2";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "idcli";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "direccion2";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "total";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "a4";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "numcontrato";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "nc";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "pdf_nc";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "avisos";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "ing_terceros";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "enviar";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "opciones";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "idfacven";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "numfacven";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "credito";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "fechavenc";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "subtotal";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "valoriva";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "pagada";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "asentada";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "observaciones";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "saldo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "adicional";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "adicional2";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "adicional3";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "resolucion";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "vendedor";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "creado";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "editado";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "usuario_crea";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "inicio";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "fin";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "banco";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "dias_decredito";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "tipo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "cod_cuenta";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "base_iva_19";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "valor_iva_19";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "base_iva_5";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "valor_iva_5";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "excento";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "editarpos";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "existeentns";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "imprimir";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'][] = "imprimircopia";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'];
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel'] = array();
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['idfacven'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['numfacven'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['credito'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['fechavenc'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['subtotal'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['valoriva'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['pagada'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['asentada'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['observaciones'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['saldo'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['adicional'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['adicional2'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['adicional3'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['resolucion'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['vendedor'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['creado'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['editado'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['usuario_crea'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['inicio'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['fin'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['banco'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['dias_decredito'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['tipo'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['cod_cuenta'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['base_iva_19'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['valor_iva_19'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['base_iva_5'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['valor_iva_5'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['excento'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['editarpos'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['existeentns'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['imprimir'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel']['imprimircopia'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_contratos']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_contratos']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_contratos']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'])
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
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'])
      { 
          $this->pdf_zip = (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opc_pdf']['pdf_zip'])) ? $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opc_pdf']['pdf_zip'] : "N";
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['use_pass_pdf'] = "";
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
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_prt'] = array();
          $_SESSION['scriptcase']['sc_idioma_prt']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'modoimp' => $this->Ini->Nm_lang['lang_btns_mode_prnt_hint'], 'curr' => $this->Ini->Nm_lang['lang_othr_curr_page'], 'total' => $this->Ini->Nm_lang['lang_othr_full'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'pdf_res' => $this->Ini->Nm_lang['lang_app_xls_summry'], 'pdf_cons' => $this->Ini->Nm_lang['lang_app_xls_grid'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_word'] = array();
          $_SESSION['scriptcase']['sc_idioma_word']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_export_title'], 'modules' => $this->Ini->Nm_lang['lang_export_modules'], 'mod_grid' => $this->Ini->Nm_lang['lang_export_mod_grid'], 'mod_resume' => $this->Ini->Nm_lang['lang_export_mod_summary'], 'mod_chart' => $this->Ini->Nm_lang['lang_export_mod_chart'], 'group_general' => $this->Ini->Nm_lang['lang_pdff_group_general'], 'titulo_colunas' => $this->Ini->Nm_lang['lang_btns_clmn_hint'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint'], 'password' => $this->Ini->Nm_lang['lang_app_xls_pswd']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "fecha") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "sc_free_group_by") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $Free_sql_atual = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Gb_Free_sql'] as $cmp => $resto)
              {
                  foreach ($resto as $cmp_sql => $ord)
                  {
                      $Free_sql_atual[$cmp_sql] = 0;
                  } 
              } 
              if (!isset($Free_sql_atual['idfacven']))
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              } 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "formapago") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porcliente") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porpj") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "portipo") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porvendedor") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porasentada") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "pagada") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "porbanco") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_Ind_Groupby'] == "_NM_SC_") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']['idfacven'] = 'DESC'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ordem_select']; 
          } 
      }
      if ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig'])) && !isset($_POST['reload_comb_chart']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "busca";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_contratos']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_facturaven_contratos']['start'] == 'filter')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "grid")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "busca";
          }   
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] != "detalhe" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"])))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opc_liga'] = array();  
          if (isset($NMSC_conf_apl) && !empty($NMSC_conf_apl))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opc_liga'] = $NMSC_conf_apl;  
          }   
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opc_liga']['inicial']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opc_liga']['inicial'];
          }
      }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opc_liga']['paginacao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opc_liga']['paginacao']))
          { 
              $this->Ini->Apl_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opc_liga']['paginacao'];
          } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "busca")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "grid" ;  
      }   
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao_print']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao_print']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao_print'] = "inicio" ;  
      }   
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['print_all'] = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "print")  
      { 
          if (strpos(" " . $this->Ini->SC_module_export, "grid") === false)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "res_print";
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "res_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao']     = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['print_all'] = true;
          if (strpos(" " . $this->Ini->SC_module_export, "grid") !== false)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "print";
              $nmgp_tipo_print = "RC";
          }
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'], 0, 7) == "grafico")  
      { 
          $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "pdf")
      { 
          $this->Ini->path_img_modelo = $this->Ini->path_img_modelo;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "fast_search")  
      { 
          $this->SC_fast_search($GLOBALS["nmgp_fast_search"], $GLOBALS["nmgp_cond_fast_search"], $GLOBALS["nmgp_arg_fast_search"]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq'])
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = 'igual';
          } 
          else 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['contr_array_resumo'] = "NAO";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['contr_total_geral']  = "NAO";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['tot_geral']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = 'pesq';
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['orig_pesq'] = 'grid';
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == 'pesq' && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['orig_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['orig_pesq']))  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['orig_pesq'] == "res")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = 'resumo';
          } 
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['orig_pesq'] == "grid") 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = 'inicio';
          } 
      } 
//
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['prim_cons'] = false;  
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] != "detalhe" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"])))  
      { 
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['use_pass_pdf']);
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['prim_cons'] = true;  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['cond_pesq']         = ""; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_filtro'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_grid']   = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_lookup'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['campos_busca']      = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['grid_pesq']         = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['Grid_search']       = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_fast']   = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['contr_total_geral'] = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['tot_geral']);
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['contr_array_resumo'] = "NAO";
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_ant'];  
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
          if ($nm_call_php == "btn_enviar_fe")
          { 
              $this->btn_enviar_fe();
          } 
          if ($nm_call_php == "btn_copiar_rango")
          { 
              $this->btn_copiar_rango();
          } 
          if ($nm_call_php == "btn_pdf_fe")
          { 
              $this->btn_pdf_fe();
          } 
          if ($nm_call_php == "btn_consultar_estado_fe")
          { 
              $this->btn_consultar_estado_fe();
          } 
          if ($nm_call_php == "btn_regenerar_estado")
          { 
              $this->btn_regenerar_estado();
          } 
          $this->Db->Close(); 
          exit;
      } 
      $nm_flag_pdf   = true;
      $nm_vendo_pdf  = ("pdf" == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['graf_pdf'] = "S";
      if (isset($nmgp_graf_pdf) && !empty($nmgp_graf_pdf))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['graf_pdf'] = $nmgp_graf_pdf;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
      {
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            $nm_arquivo_htm_temp = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_facturaven_contratos_html_" . session_id() . "_2.html";
            $nm_arquivo_pdf_base = "/sc_pdf_" . md5(date("Ymd") . "_" . session_id()) . "_grid_facturaven_contratos.pdf";
            $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base;
            $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
            $nm_arquivo_de_saida = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_facturaven_contratos_html_" . session_id() . ".html";
            $nm_url_de_saida = $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_grid_facturaven_contratos_html_" . session_id() . ".html";
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "doc_word_res")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['print_navigator'] = "Microsoft Internet Explorer";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['print_all'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['doc_word']  = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao']     = "resumo";
          $_SESSION['scriptcase']['saida_word'] = true;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_name']))
          {
              $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_name'], ".");
              if ($Pos === false) {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_name'] .= ".doc";
              }
              $nm_arquivo_doc_word = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_name'];
          }
          else
          {
              $nm_arquivo_doc_word = "/sc_grid_facturaven_contratos_res_" . session_id() . ".doc";
          }
          $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $this->Ini->nm_limite_lin_res_prt = 0;
          $GLOBALS['nmgp_cor_print']        = $nmgp_cor_word;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "xls")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_xls.class.php"); 
          } 
          $this->xls  = new grid_facturaven_contratos_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "xls_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_res_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_res_xls.class.php"); 
          } 
          $this->xls  = new grid_facturaven_contratos_res_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "xml")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_xml.class.php"); 
          } 
          $this->xml  = new grid_facturaven_contratos_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "xml_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_res_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_res_xml.class.php"); 
          } 
          $this->xml  = new grid_facturaven_contratos_res_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "json")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_json.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_json.class.php"); 
          } 
          $this->json  = new grid_facturaven_contratos_json();
          $this->prep_modulos("json");
          $this->json->monta_json();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "csv")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_csv.class.php"); 
          } 
          $this->csv  = new grid_facturaven_contratos_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "csv_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_res_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_res_csv.class.php"); 
          } 
          $this->csv  = new grid_facturaven_contratos_res_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "rtf")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_rtf.class.php"); 
          } 
          $this->rtf  = new grid_facturaven_contratos_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "rtf_res")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_res_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_res_rtf.class.php"); 
          } 
          $this->rtf  = new grid_facturaven_contratos_res_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'], 0, 7) == "grafico")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . " . grid_facturaven_contratos . /" . $this->Ini->Apl_grafico); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
          } 
          $this->Graf  = new grid_facturaven_contratos_grafico();
          $this->prep_modulos("Graf");
          if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'], 7, 1) == "_")  
          { 
              $this->Graf->grafico_col(substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'], 8));
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "grid";
          }
          else
          { 
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dashboard_refresh_after_chart'])) {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dashboard_refresh_after_chart'];
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['dashboard_refresh_after_chart']);
              }
              else {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] = "grid";
              }
              $this->Graf->monta_grafico();
          }
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "busca")  
      { 
          if (!$_SESSION['scriptcase']['proc_mobile']) 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_pesq.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_mobile_pesq.class.php"); 
          } 
          $this->pesq  = new grid_facturaven_contratos_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
          $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
          $this->pesq->monta_busca();
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "resumo")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/" . $this->Ini->Apl_resumo); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          } 
          $this->Res = new grid_facturaven_contratos_resumo("out");
          $this->prep_modulos("Res");
          $this->Res->monta_resumo();
      }
      else 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "print" && $nmgp_tipo_print == "RC")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['print_navigator'] = $nmgp_navegator_print;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao']     = "pdf";
              $GLOBALS['nmgp_tipo_pdf'] = strtolower($nmgp_cor_print);
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] == "doc_word")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['print_navigator'] = "Microsoft Internet Explorer";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['doc_word']  = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao']     = "pdf";
              $_SESSION['scriptcase']['saida_word'] = true;
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_name']))
              {
                  $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_name'], ".");
                  if ($Pos === false) {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_name'] .= ".doc";
                  }
                  $nm_arquivo_doc_word =  "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_name'];
              }
              else
              {
                  $nm_arquivo_doc_word = "/sc_grid_facturaven_contratos_" . session_id() . ".doc";
              }
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
              $this->Ini->nm_limite_lin_prt = 0;
              $GLOBALS['nmgp_tipo_pdf'] = $nmgp_cor_word;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_facturaven_contratos/grid_facturaven_contratos_grid.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_facturaven_contratos_grid.class.php"); 
          } 
          $this->grid  = new grid_facturaven_contratos_grid();
          $this->prep_modulos("grid");
          $this->grid->monta_grid($linhas);
      }   
//--- 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'])
      {
           $this->Db->Close(); 
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida'])
      {
         $nm_saida->finaliza();
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['ajax_nav'])
         {
             $Temp = ob_get_clean();
             if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['opcao'] != "ajax_detalhe")  
             {
                 $this->Ini->Arr_result['setVar'][] = array('var' => 'scQtReg', 'value' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['qt_reg_grid']);
             }
             $_SESSION['scriptcase']['saida_var'] = false;
             $oJson = new Services_JSON();
             echo $oJson->encode($this->Ini->Arr_result);
             exit;
         }
            if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['export_sel_columns']['field_order']))
            {
                $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['export_sel_columns']['field_order'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['export_sel_columns']['field_order']);
            }
            if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['export_sel_columns']['usr_cmp_sel']))
            {
                $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['export_sel_columns']['usr_cmp_sel'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['export_sel_columns']['usr_cmp_sel']);
            }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['doc_word'])
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file'] = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
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
            if (!$this->Ini->sc_export_ajax && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
                    if (!NM_is_utf8($lang_protect))
                    {
                        $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                    }
                    grid_facturaven_contratos_pdf_progress_call($this->grid->progress_tot . "_#NM#_" . $this->grid->progress_tot . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
                    fwrite($this->grid->progress_fp, ($this->grid->progress_tot) . "_#NM#_" . $lang_protect . "...\n");
                    fclose($this->grid->progress_fp);
                }
            }
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name']))
            {
                $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name'], ".");
                if ($Pos === false) {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name'] .= ".pdf";
                }
                if ('/' == substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name'], 0, 1)) {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name'] = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name'], 1);
                }
                $nm_arquivo_pdf_serv = $this->Ini->root .  $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name'];
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name'];
                $nm_arquivo_pdf_base = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_name']);
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
            elseif (is_dir($this->Ini->path_third . $dir_qpdf) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['use_pass_pdf']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['use_pass_pdf']))
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
                    elseif (FALSE !== strpos(strtolower(php_uname()), '.el8.')) 
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
                $pdf_pass = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['use_pass_pdf'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['use_pass_pdf'] : "";
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
            elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['use_pass_pdf']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['use_pass_pdf']))
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
                    $pdf_pass  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['use_pass_pdf'];
                    $str_cmd_qpdf .= "--encrypt " . $pdf_pass . " " . $pdf_pass . " 256 -- " . $arq_pdf_out . " " . $arq_pdf_final;
                    exec($str_cmd_qpdf);
                    if (is_file($arq_pdf_final)) 
                    {
                        unlink($arq_pdf_out);
                    }
                }
            }
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['contr_array_resumo'] = '';
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['contr_total_geral']  = '';
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
                $oJson = new Services_JSON();
                echo $oJson->encode($this->Arr_result);
                exit;
            }
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
               $_SESSION['scriptcase']['charset_html'] = (isset($this->Ini->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->Ini->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_det'])
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
                        grid_facturaven_contratos_pdf_progress_call($this->grid->progress_tot . "_#NM#_" . ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
                        grid_facturaven_contratos_pdf_progress_call("off\n", $this->Ini->Nm_lang);
                        fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n");
                        fwrite($this->grid->progress_fp, "off\n");
                        fclose($this->grid->progress_fp);
                    }
                }
            }
unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_file']);
if (is_file($nm_arquivo_pdf_serv))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['pdf_file'] = $nm_arquivo_pdf_serv;
}
$NM_volta  = "volta_grid";
$NM_target = "_parent";
if ($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['pdf_res'])
{
  $NM_volta  = "resumo";
  $NM_target = "_self";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Facturas de venta contrato :: PDF</TITLE>
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
$downloadFileName = "grid_facturaven_contratos.pdf";
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos'][md5("newpdf_" . $downloadFileName)][0] = $nm_arquivo_pdf_url;
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos'][md5("newpdf_" . $downloadFileName)][1] = $downloadFileName;
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run'][$Run_register];
       $this->zona = $this->rs_grid->fields[0] ;  
       $this->barrio = $this->rs_grid->fields[1] ;  
       $this->fechaven = $this->rs_grid->fields[2] ;  
       $this->numero2 = $this->rs_grid->fields[3] ;  
       $this->idcli = $this->rs_grid->fields[4] ;  
       $this->idcli = (string)$this->idcli;
       $this->direccion2 = $this->rs_grid->fields[5] ;  
       $this->total = $this->rs_grid->fields[6] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (string)$this->total;
       $this->numcontrato = $this->rs_grid->fields[7] ;  
       $this->numcontrato = (string)$this->numcontrato;
       $this->ing_terceros = $this->rs_grid->fields[8] ;  
       $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
       $this->ing_terceros = (string)$this->ing_terceros;
       $this->idfacven = $this->rs_grid->fields[9] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->numfacven = $this->rs_grid->fields[10] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->credito = $this->rs_grid->fields[11] ;  
       $this->credito = (string)$this->credito;
       $this->fechavenc = $this->rs_grid->fields[12] ;  
       $this->subtotal = $this->rs_grid->fields[13] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[14] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[15] ;  
       $this->asentada = $this->rs_grid->fields[16] ;  
       $this->asentada = (string)$this->asentada;
       $this->observaciones = $this->rs_grid->fields[17] ;  
       $this->saldo = $this->rs_grid->fields[18] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[19] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[20] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[21] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->resolucion = $this->rs_grid->fields[22] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->vendedor = $this->rs_grid->fields[23] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->creado = $this->rs_grid->fields[24] ;  
       $this->editado = $this->rs_grid->fields[25] ;  
       $this->usuario_crea = $this->rs_grid->fields[26] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->inicio = $this->rs_grid->fields[27] ;  
       $this->fin = $this->rs_grid->fields[28] ;  
       $this->banco = $this->rs_grid->fields[29] ;  
       $this->banco = (string)$this->banco;
       $this->dias_decredito = $this->rs_grid->fields[30] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->tipo = $this->rs_grid->fields[31] ;  
       $this->cod_cuenta = $this->rs_grid->fields[32] ;  
       $this->base_iva_19 = $this->rs_grid->fields[33] ;  
       $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
       $this->base_iva_19 = (string)$this->base_iva_19;
       $this->valor_iva_19 = $this->rs_grid->fields[34] ;  
       $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
       $this->valor_iva_19 = (string)$this->valor_iva_19;
       $this->base_iva_5 = $this->rs_grid->fields[35] ;  
       $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
       $this->base_iva_5 = (string)$this->base_iva_5;
       $this->valor_iva_5 = $this->rs_grid->fields[36] ;  
       $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
       $this->valor_iva_5 = (string)$this->valor_iva_5;
       $this->excento = $this->rs_grid->fields[37] ;  
       $this->excento =  str_replace(",", ".", $this->excento);
       $this->excento = (string)$this->excento;
       $this->enviada_a_tns = $this->rs_grid->fields[38] ;  
       $this->factura_tns = $this->rs_grid->fields[39] ;  
       $this->cufe = $this->rs_grid->fields[40] ;  
       $this->periodo = $this->rs_grid->fields[41] ;  
       $this->periodo = (string)$this->periodo;
       $this->anio = $this->rs_grid->fields[42] ;  
       $this->anio = (string)$this->anio;
       $this->enviada = $this->rs_grid->fields[43] ;  
       $this->tiene_nota = $this->rs_grid->fields[44] ;  
       $this->tiene_nota = (string)$this->tiene_nota;
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
       { 
           if (!empty($this->qr_base64))
           { 
               $this->qr_base64 = $this->Db->BlobDecode($this->qr_base64, false, true, "BLOB");
           }
       }
      $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
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

if($this->pagada =="NO" and ($this->asentada =="0" or empty($this->asentada )))
{
	if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

	
	$idfactura = $this->idfacven ;
	$vnomcli   = "";
	$vtot      = 0;
	$vnumdoc   = "";
	$vfechaven = "";
	
	$vsql3 = "select c.nombres,v.total,concat(p.prefijo,'/',v.numfacven) as numero,v.fechaven from facturaven_contratos v left join terceros c on v.idcli=c.idtercero left join resdian p on v.resolucion=p.Idres where v.idfacven='".$idfactura."'";

	 
      $nm_select = $vsql3; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vInfoDoc = array();
      $this->vinfodoc = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vInfoDoc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vinfodoc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vInfoDoc = false;
          $this->vInfoDoc_erro = $this->Db->ErrorMsg();
          $this->vinfodoc = false;
          $this->vinfodoc_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->vinfodoc[0][0]))
	{
		$vnomcli   = $this->vinfodoc[0][0];
		$vtot      = $this->vinfodoc[0][1];
		$vnumdoc   = $this->vinfodoc[0][2];
		$vfechaven = $this->vinfodoc[0][3];
	}
	
	 
      $nm_select = "select iddet from detalleventa where numfac='".$idfactura."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vItemsVenta = array();
      $this->vitemsventa = array();
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
			$vsql = "update casos set factura=0 where factura='".$idfactura."'";
			
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
	
	
	
     $nm_select = "delete from inventario where nufacvta='".$idfactura."'"; 
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
	
	$vsql = "select deperiodo from terceros_contratos_factura where deperiodo='SI' and factura='".$idfactura."'";
	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDePeriodo = array();
      $this->vdeperiodo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDePeriodo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdeperiodo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDePeriodo = false;
          $this->vDePeriodo_erro = $this->Db->ErrorMsg();
          $this->vdeperiodo = false;
          $this->vdeperiodo_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->vdeperiodo[0][0]))
	{
	
		
     $nm_select = "delete from facturaven_contratos where idfacven='".$idfactura."'"; 
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


		$vsql = "select count(*) from terceros_contratos_factura tcf where tcf.id_contrato=(select tcf.id_contrato from terceros_contratos_factura tcf where tcf.factura='".$idfactura."' limit 1)";
		 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiHayMas = array();
      $this->vsihaymas = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiHayMas[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsihaymas[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiHayMas = false;
          $this->vSiHayMas_erro = $this->Db->ErrorMsg();
          $this->vsihaymas = false;
          $this->vsihaymas_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->vsihaymas[0][0]))
		{
			if(intval($this->vsihaymas[0][0])>1)
			{
				$vid_contrato = "";
				$vsql = "select tcf.id_contrato from terceros_contratos_factura tcf where tcf.factura='".$idfactura."' limit 1";
				 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vIdContrato = array();
      $this->vidcontrato = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vIdContrato[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vidcontrato[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vIdContrato = false;
          $this->vIdContrato_erro = $this->Db->ErrorMsg();
          $this->vidcontrato = false;
          $this->vidcontrato_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->vidcontrato[0][0]))
				{
					$vid_contrato = $this->vidcontrato[0][0];
				}	

				$vsql = "delete from terceros_contratos_factura where factura='".$idfactura."'";
				
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

				$vsql = "update terceros_contratos set fecha_factura=coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),null),valor_ultimafactura=coalesce((select tcf.valor_facura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),0),mesultimafactura=(case when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=1 then 'ENERO' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=2 then 'FEBRERO' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=3 then 'MARZO' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=4 then 'ABRIL' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=5 then 'MAYO' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=6 then 'JUNIO' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=7 then 'JULIO' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=8 then 'AGOSTO' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=9 then 'SEPTIEMBRE' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=10 then 'OCTUBRE' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=11 then 'NOVIEMBRE' when MONTH(coalesce((select tcf.fecha_factura from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),1))=12 then 'DICIEMBRE' else 'ENERO' end),fecha_limitepago=NULL,fecha_corte=NULL, saldoanterior=coalesce((select sum(tcf.valor_facura) from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont),0),saldoactual=coalesce((select tcf.saldo from terceros_contratos_factura tcf where tcf.id_contrato=id_ter_cont order by tcf.id desc limit 1),0) where id_ter_cont='".$vid_contrato."'";
				
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
			else
			{

				$vsql = "update terceros_contratos set fecha_factura=null,valor_ultimafactura=0,mesultimafactura='ENERO',fecha_limitepago=NULL,fecha_corte=NULL, saldoanterior=0,saldoactual=0 where id_ter_cont=(select tcf.id_contrato from terceros_contratos_factura tcf where tcf.factura='".$idfactura."' limit 1)";
				
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

				$vsql = "delete from terceros_contratos_factura where factura='".$idfactura."'";
				
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
	}
	else
	{
		$vsql = "delete from terceros_contratos_factura where factura='".$idfactura."'";
		
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
	

	if(!empty($vnumdoc))
	{
		$vsql4 = "insert into log set usuario='".$this->sc_temp_gidtercero."',accion='ELIMINAR',observaciones='EL USUARIO ELIMINÓ LA VENTA: ".$vnumdoc.", CLIENTE: ".$vnomcli.", FECHA VENTA: ".$vfechaven.", TOTAL: ".$vtot."'";
		
     $nm_select = $vsql4; 
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
		
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

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
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run'][$Run_register];
       $this->zona = $this->rs_grid->fields[0] ;  
       $this->barrio = $this->rs_grid->fields[1] ;  
       $this->fechaven = $this->rs_grid->fields[2] ;  
       $this->numero2 = $this->rs_grid->fields[3] ;  
       $this->idcli = $this->rs_grid->fields[4] ;  
       $this->idcli = (string)$this->idcli;
       $this->direccion2 = $this->rs_grid->fields[5] ;  
       $this->total = $this->rs_grid->fields[6] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (string)$this->total;
       $this->numcontrato = $this->rs_grid->fields[7] ;  
       $this->numcontrato = (string)$this->numcontrato;
       $this->ing_terceros = $this->rs_grid->fields[8] ;  
       $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
       $this->ing_terceros = (string)$this->ing_terceros;
       $this->idfacven = $this->rs_grid->fields[9] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->numfacven = $this->rs_grid->fields[10] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->credito = $this->rs_grid->fields[11] ;  
       $this->credito = (string)$this->credito;
       $this->fechavenc = $this->rs_grid->fields[12] ;  
       $this->subtotal = $this->rs_grid->fields[13] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[14] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[15] ;  
       $this->asentada = $this->rs_grid->fields[16] ;  
       $this->asentada = (string)$this->asentada;
       $this->observaciones = $this->rs_grid->fields[17] ;  
       $this->saldo = $this->rs_grid->fields[18] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[19] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[20] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[21] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->resolucion = $this->rs_grid->fields[22] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->vendedor = $this->rs_grid->fields[23] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->creado = $this->rs_grid->fields[24] ;  
       $this->editado = $this->rs_grid->fields[25] ;  
       $this->usuario_crea = $this->rs_grid->fields[26] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->inicio = $this->rs_grid->fields[27] ;  
       $this->fin = $this->rs_grid->fields[28] ;  
       $this->banco = $this->rs_grid->fields[29] ;  
       $this->banco = (string)$this->banco;
       $this->dias_decredito = $this->rs_grid->fields[30] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->tipo = $this->rs_grid->fields[31] ;  
       $this->cod_cuenta = $this->rs_grid->fields[32] ;  
       $this->base_iva_19 = $this->rs_grid->fields[33] ;  
       $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
       $this->base_iva_19 = (string)$this->base_iva_19;
       $this->valor_iva_19 = $this->rs_grid->fields[34] ;  
       $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
       $this->valor_iva_19 = (string)$this->valor_iva_19;
       $this->base_iva_5 = $this->rs_grid->fields[35] ;  
       $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
       $this->base_iva_5 = (string)$this->base_iva_5;
       $this->valor_iva_5 = $this->rs_grid->fields[36] ;  
       $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
       $this->valor_iva_5 = (string)$this->valor_iva_5;
       $this->excento = $this->rs_grid->fields[37] ;  
       $this->excento =  str_replace(",", ".", $this->excento);
       $this->excento = (string)$this->excento;
       $this->enviada_a_tns = $this->rs_grid->fields[38] ;  
       $this->factura_tns = $this->rs_grid->fields[39] ;  
       $this->cufe = $this->rs_grid->fields[40] ;  
       $this->periodo = $this->rs_grid->fields[41] ;  
       $this->periodo = (string)$this->periodo;
       $this->anio = $this->rs_grid->fields[42] ;  
       $this->anio = (string)$this->anio;
       $this->enviada = $this->rs_grid->fields[43] ;  
       $this->tiene_nota = $this->rs_grid->fields[44] ;  
       $this->tiene_nota = (string)$this->tiene_nota;
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
       { 
           if (!empty($this->qr_base64))
           { 
               $this->qr_base64 = $this->Db->BlobDecode($this->qr_base64, false, true, "BLOB");
           }
       }
      $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  if(!empty($this->cufe ))
{
	echo "NO SE PUEDE REVERSAR UN DOCUMENTO ELECTRÓNICO ENVIADO.";
}
else
{
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
		$idfac = $this->idfacven ;
		$vsqltotal = "update 
		  facturaven_contratos 
		  set 
		  total=(select coalesce(sum(d.tneto),0) from detalleventa d where d.numfac='".$idfac."'),
		  saldo=(select coalesce(sum(d.tneto),0) from detalleventa d where d.numfac='".$idfac."'),
		  valoriva=round((select coalesce(sum(d.iva),0) from detalleventa d where d.numfac='".$idfac."')), 
		  subtotal=round((select coalesce(sum(d.tbase),0) from detalleventa d where d.numfac='".$idfac."')) 
		  where 
		  idfacven='".$idfac."'
		  ";

		
     $nm_select = $vsqltotal; 
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

		if($this->enviada_a_tns =="NO")
		{
			$this->fAsentarContratos($this->idfacven ,"NO",0,0,false);	
			
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

			echo "No se puede reversar el documento: ".$this->factura_tns ." porque ya fue enviado a TNS.<br>";
		}
	}
}
}
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run'][$Run_register];
       $this->zona = $this->rs_grid->fields[0] ;  
       $this->barrio = $this->rs_grid->fields[1] ;  
       $this->fechaven = $this->rs_grid->fields[2] ;  
       $this->numero2 = $this->rs_grid->fields[3] ;  
       $this->idcli = $this->rs_grid->fields[4] ;  
       $this->idcli = (string)$this->idcli;
       $this->direccion2 = $this->rs_grid->fields[5] ;  
       $this->total = $this->rs_grid->fields[6] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (string)$this->total;
       $this->numcontrato = $this->rs_grid->fields[7] ;  
       $this->numcontrato = (string)$this->numcontrato;
       $this->ing_terceros = $this->rs_grid->fields[8] ;  
       $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
       $this->ing_terceros = (string)$this->ing_terceros;
       $this->idfacven = $this->rs_grid->fields[9] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->numfacven = $this->rs_grid->fields[10] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->credito = $this->rs_grid->fields[11] ;  
       $this->credito = (string)$this->credito;
       $this->fechavenc = $this->rs_grid->fields[12] ;  
       $this->subtotal = $this->rs_grid->fields[13] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[14] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[15] ;  
       $this->asentada = $this->rs_grid->fields[16] ;  
       $this->asentada = (string)$this->asentada;
       $this->observaciones = $this->rs_grid->fields[17] ;  
       $this->saldo = $this->rs_grid->fields[18] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[19] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[20] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[21] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->resolucion = $this->rs_grid->fields[22] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->vendedor = $this->rs_grid->fields[23] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->creado = $this->rs_grid->fields[24] ;  
       $this->editado = $this->rs_grid->fields[25] ;  
       $this->usuario_crea = $this->rs_grid->fields[26] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->inicio = $this->rs_grid->fields[27] ;  
       $this->fin = $this->rs_grid->fields[28] ;  
       $this->banco = $this->rs_grid->fields[29] ;  
       $this->banco = (string)$this->banco;
       $this->dias_decredito = $this->rs_grid->fields[30] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->tipo = $this->rs_grid->fields[31] ;  
       $this->cod_cuenta = $this->rs_grid->fields[32] ;  
       $this->base_iva_19 = $this->rs_grid->fields[33] ;  
       $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
       $this->base_iva_19 = (string)$this->base_iva_19;
       $this->valor_iva_19 = $this->rs_grid->fields[34] ;  
       $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
       $this->valor_iva_19 = (string)$this->valor_iva_19;
       $this->base_iva_5 = $this->rs_grid->fields[35] ;  
       $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
       $this->base_iva_5 = (string)$this->base_iva_5;
       $this->valor_iva_5 = $this->rs_grid->fields[36] ;  
       $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
       $this->valor_iva_5 = (string)$this->valor_iva_5;
       $this->excento = $this->rs_grid->fields[37] ;  
       $this->excento =  str_replace(",", ".", $this->excento);
       $this->excento = (string)$this->excento;
       $this->enviada_a_tns = $this->rs_grid->fields[38] ;  
       $this->factura_tns = $this->rs_grid->fields[39] ;  
       $this->cufe = $this->rs_grid->fields[40] ;  
       $this->periodo = $this->rs_grid->fields[41] ;  
       $this->periodo = (string)$this->periodo;
       $this->anio = $this->rs_grid->fields[42] ;  
       $this->anio = (string)$this->anio;
       $this->enviada = $this->rs_grid->fields[43] ;  
       $this->tiene_nota = $this->rs_grid->fields[44] ;  
       $this->tiene_nota = (string)$this->tiene_nota;
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
       { 
           if (!empty($this->qr_base64))
           { 
               $this->qr_base64 = $this->Db->BlobDecode($this->qr_base64, false, true, "BLOB");
           }
       }
      $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
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
		$idfac = $this->idfacven ;
		$vsqltotal = "update 
		  facturaven 
		  set 
		  total=(select coalesce(sum(d.tneto),0) from detalleventa d where d.numfac='".$idfac."'),
		  saldo=(select coalesce(sum(d.tneto),0) from detalleventa d where d.numfac='".$idfac."'),
		  valoriva=round((select coalesce(sum(d.iva),0) from detalleventa d where d.numfac='".$idfac."')), 
		  subtotal=round((select coalesce(sum(d.tbase),0) from detalleventa d where d.numfac='".$idfac."')) 
		  where 
		  idfacven='".$idfac."'
		  ";

		
     $nm_select = $vsqltotal; 
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
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
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
   function btn_enviar_fe() 
   {
      global 
      $nm_apl_dependente;
      $nm_f_saida = "./";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['contr_array_resumo'] = "NAO";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['contr_total_geral']  = "NAO";
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['tot_geral']);
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_GET['nm_check'])) ? explode(";", $_GET['nm_check']) : array();
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run'][$Run_register];
       $this->zona = $this->rs_grid->fields[0] ;  
       $this->barrio = $this->rs_grid->fields[1] ;  
       $this->fechaven = $this->rs_grid->fields[2] ;  
       $this->numero2 = $this->rs_grid->fields[3] ;  
       $this->idcli = $this->rs_grid->fields[4] ;  
       $this->idcli = (string)$this->idcli;
       $this->direccion2 = $this->rs_grid->fields[5] ;  
       $this->total = $this->rs_grid->fields[6] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (string)$this->total;
       $this->numcontrato = $this->rs_grid->fields[7] ;  
       $this->numcontrato = (string)$this->numcontrato;
       $this->ing_terceros = $this->rs_grid->fields[8] ;  
       $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
       $this->ing_terceros = (string)$this->ing_terceros;
       $this->idfacven = $this->rs_grid->fields[9] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->numfacven = $this->rs_grid->fields[10] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->credito = $this->rs_grid->fields[11] ;  
       $this->credito = (string)$this->credito;
       $this->fechavenc = $this->rs_grid->fields[12] ;  
       $this->subtotal = $this->rs_grid->fields[13] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[14] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[15] ;  
       $this->asentada = $this->rs_grid->fields[16] ;  
       $this->asentada = (string)$this->asentada;
       $this->observaciones = $this->rs_grid->fields[17] ;  
       $this->saldo = $this->rs_grid->fields[18] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[19] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[20] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[21] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->resolucion = $this->rs_grid->fields[22] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->vendedor = $this->rs_grid->fields[23] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->creado = $this->rs_grid->fields[24] ;  
       $this->editado = $this->rs_grid->fields[25] ;  
       $this->usuario_crea = $this->rs_grid->fields[26] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->inicio = $this->rs_grid->fields[27] ;  
       $this->fin = $this->rs_grid->fields[28] ;  
       $this->banco = $this->rs_grid->fields[29] ;  
       $this->banco = (string)$this->banco;
       $this->dias_decredito = $this->rs_grid->fields[30] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->tipo = $this->rs_grid->fields[31] ;  
       $this->cod_cuenta = $this->rs_grid->fields[32] ;  
       $this->base_iva_19 = $this->rs_grid->fields[33] ;  
       $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
       $this->base_iva_19 = (string)$this->base_iva_19;
       $this->valor_iva_19 = $this->rs_grid->fields[34] ;  
       $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
       $this->valor_iva_19 = (string)$this->valor_iva_19;
       $this->base_iva_5 = $this->rs_grid->fields[35] ;  
       $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
       $this->base_iva_5 = (string)$this->base_iva_5;
       $this->valor_iva_5 = $this->rs_grid->fields[36] ;  
       $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
       $this->valor_iva_5 = (string)$this->valor_iva_5;
       $this->excento = $this->rs_grid->fields[37] ;  
       $this->excento =  str_replace(",", ".", $this->excento);
       $this->excento = (string)$this->excento;
       $this->enviada_a_tns = $this->rs_grid->fields[38] ;  
       $this->factura_tns = $this->rs_grid->fields[39] ;  
       $this->cufe = $this->rs_grid->fields[40] ;  
       $this->periodo = $this->rs_grid->fields[41] ;  
       $this->periodo = (string)$this->periodo;
       $this->anio = $this->rs_grid->fields[42] ;  
       $this->anio = (string)$this->anio;
       $this->enviada = $this->rs_grid->fields[43] ;  
       $this->tiene_nota = $this->rs_grid->fields[44] ;  
       $this->tiene_nota = (string)$this->tiene_nota;
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
       { 
           if (!empty($this->qr_base64))
           { 
               $this->qr_base64 = $this->Db->BlobDecode($this->qr_base64, false, true, "BLOB");
           }
       }
      $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  ?>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'bootstrap/js/bootstrap.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'bootstrap/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'bootstrap/css/bootstrap-theme.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'bootstrap/css/bootstrap.min.css'); ?>">
	
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
body{
	background:white !important;
	padding: 10px !important;
}
table{
	border:0px !important;
}
input{
	padding:10px !important;
	border-radius: 5px !important;
	color: white !important;
	background:#5877b9 !important;
}
</style>
<?php


$this->fEnviarFV($this->idfacven );

$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
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
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\" onclick=\"self.parent.tb_remove()\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "  self.parent.tb_remove();";
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
   function btn_copiar_rango() 
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run'][$Run_register];
       $this->zona = $this->rs_grid->fields[0] ;  
       $this->barrio = $this->rs_grid->fields[1] ;  
       $this->fechaven = $this->rs_grid->fields[2] ;  
       $this->numero2 = $this->rs_grid->fields[3] ;  
       $this->idcli = $this->rs_grid->fields[4] ;  
       $this->idcli = (string)$this->idcli;
       $this->direccion2 = $this->rs_grid->fields[5] ;  
       $this->total = $this->rs_grid->fields[6] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (string)$this->total;
       $this->numcontrato = $this->rs_grid->fields[7] ;  
       $this->numcontrato = (string)$this->numcontrato;
       $this->ing_terceros = $this->rs_grid->fields[8] ;  
       $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
       $this->ing_terceros = (string)$this->ing_terceros;
       $this->idfacven = $this->rs_grid->fields[9] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->numfacven = $this->rs_grid->fields[10] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->credito = $this->rs_grid->fields[11] ;  
       $this->credito = (string)$this->credito;
       $this->fechavenc = $this->rs_grid->fields[12] ;  
       $this->subtotal = $this->rs_grid->fields[13] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[14] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[15] ;  
       $this->asentada = $this->rs_grid->fields[16] ;  
       $this->asentada = (string)$this->asentada;
       $this->observaciones = $this->rs_grid->fields[17] ;  
       $this->saldo = $this->rs_grid->fields[18] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[19] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[20] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[21] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->resolucion = $this->rs_grid->fields[22] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->vendedor = $this->rs_grid->fields[23] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->creado = $this->rs_grid->fields[24] ;  
       $this->editado = $this->rs_grid->fields[25] ;  
       $this->usuario_crea = $this->rs_grid->fields[26] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->inicio = $this->rs_grid->fields[27] ;  
       $this->fin = $this->rs_grid->fields[28] ;  
       $this->banco = $this->rs_grid->fields[29] ;  
       $this->banco = (string)$this->banco;
       $this->dias_decredito = $this->rs_grid->fields[30] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->tipo = $this->rs_grid->fields[31] ;  
       $this->cod_cuenta = $this->rs_grid->fields[32] ;  
       $this->base_iva_19 = $this->rs_grid->fields[33] ;  
       $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
       $this->base_iva_19 = (string)$this->base_iva_19;
       $this->valor_iva_19 = $this->rs_grid->fields[34] ;  
       $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
       $this->valor_iva_19 = (string)$this->valor_iva_19;
       $this->base_iva_5 = $this->rs_grid->fields[35] ;  
       $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
       $this->base_iva_5 = (string)$this->base_iva_5;
       $this->valor_iva_5 = $this->rs_grid->fields[36] ;  
       $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
       $this->valor_iva_5 = (string)$this->valor_iva_5;
       $this->excento = $this->rs_grid->fields[37] ;  
       $this->excento =  str_replace(",", ".", $this->excento);
       $this->excento = (string)$this->excento;
       $this->enviada_a_tns = $this->rs_grid->fields[38] ;  
       $this->factura_tns = $this->rs_grid->fields[39] ;  
       $this->cufe = $this->rs_grid->fields[40] ;  
       $this->periodo = $this->rs_grid->fields[41] ;  
       $this->periodo = (string)$this->periodo;
       $this->anio = $this->rs_grid->fields[42] ;  
       $this->anio = (string)$this->anio;
       $this->enviada = $this->rs_grid->fields[43] ;  
       $this->tiene_nota = $this->rs_grid->fields[44] ;  
       $this->tiene_nota = (string)$this->tiene_nota;
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
       { 
           if (!empty($this->qr_base64))
           { 
               $this->qr_base64 = $this->Db->BlobDecode($this->qr_base64, false, true, "BLOB");
           }
       }
      $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  $vidfacven = $this->idfacven ;
$vidfacven_nuevo = "";
$vsql = "INSERT INTO facturaven(numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe)(SELECT (select max(f2.numfacven)+1 from facturaven f2), f.nremision, f.credito, NOW(), (if(f.credito=1,(date_add(f.fechaven,interval datediff(f.fechavenc,f.fechaven) day)),f.fechavenc)), f.idcli, f.subtotal, f.valoriva, f.total, 'NO', 0, f.observaciones, f.total, f.adicional, f.formapago, 0, 0, f.obspago, f.vendedor, f.pedido, f.resolucion, f.dircliente, f.imconsumo, f.retefuente, f.reteiva, f.reteica, f.cree, f.espos, f.cufe, f.enlacepdf, f.estado, f.avisos, f.dias_decredito, f.banco, f.tipo, f.id_fact, f.enviada_a_tns, f.fecha_a_tns, f.factura_tns, f.creado_en_movil, f.disponible_en_movil, f.mot_nc, f.mot_nd, NOW(), NOW(), f.usuario_crea, f.cod_cuenta, f.qr_base64, f.fecha_validacion, f.id_trans_fe  from facturaven f where f.idfacven='".$vidfacven."')";
if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}


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

$vsql = "select idfacven from facturaven order by idfacven desc limit 1";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vId = array();
      $this->vid = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vId[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vid[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vId = false;
          $this->vId_erro = $this->Db->ErrorMsg();
          $this->vid = false;
          $this->vid_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vid[0][0]))
{
	$vidfacven_nuevo = $this->vid[0][0];
	$vsql = "INSERT INTO detalleventa(numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, numdevo, iddeta, obs, descr, vencimiento, lote, fecha_fab, serial_codbarra, tipo_doc, tipo_tran, id_nota, tbase, tneto)(select '".$vidfacven_nuevo."', d.remision, d.idpro, d.unidadmayor, d.factor, d.idbod, d.costop, d.cantidad, d.valorunit, d.valorpar, d.iva, d.descuento, d.adicional, d.adicional1, d.devuelto, d.colores, d.tallas, d.sabor, d.numdevo, d.iddeta, d.obs, d.descr, d.vencimiento, d.lote, d.fecha_fab, d.serial_codbarra, d.tipo_doc, d.tipo_tran, d.id_nota, (d.valorpar-d.iva), (d.valorpar-d.descuento) from detalleventa d where d.numfac='".$vidfacven."')";
	
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
	
	$vsql = "select iddet,idpro from detalleventa where numfac='".$vidfacven."'";
	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDetalle = array();
      $this->vdetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDetalle = false;
          $this->vDetalle_erro = $this->Db->ErrorMsg();
          $this->vdetalle = false;
          $this->vdetalle_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->vdetalle[0][0]))
	{
		$vnreg = count($this->vdetalle );
		
		for($i=0;$i<$vnreg;$i++)
		{
			$viddet = $this->vdetalle[$i][0];
			$vidpro = $this->vdetalle[$i][1];
			 
      $nm_select = "select idgrup from productos where idprod='".$vidpro."'"; 
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
					$this->fGestionaStock($viddet,2);
				}
			}
			
		}
		
		$this->fActualizarTotalFactura($vidfacven_nuevo);
	}
}

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
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
   function btn_pdf_fe() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run'][$Run_register];
       $this->zona = $this->rs_grid->fields[0] ;  
       $this->barrio = $this->rs_grid->fields[1] ;  
       $this->fechaven = $this->rs_grid->fields[2] ;  
       $this->numero2 = $this->rs_grid->fields[3] ;  
       $this->idcli = $this->rs_grid->fields[4] ;  
       $this->idcli = (string)$this->idcli;
       $this->direccion2 = $this->rs_grid->fields[5] ;  
       $this->total = $this->rs_grid->fields[6] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (string)$this->total;
       $this->numcontrato = $this->rs_grid->fields[7] ;  
       $this->numcontrato = (string)$this->numcontrato;
       $this->ing_terceros = $this->rs_grid->fields[8] ;  
       $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
       $this->ing_terceros = (string)$this->ing_terceros;
       $this->idfacven = $this->rs_grid->fields[9] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->numfacven = $this->rs_grid->fields[10] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->credito = $this->rs_grid->fields[11] ;  
       $this->credito = (string)$this->credito;
       $this->fechavenc = $this->rs_grid->fields[12] ;  
       $this->subtotal = $this->rs_grid->fields[13] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[14] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[15] ;  
       $this->asentada = $this->rs_grid->fields[16] ;  
       $this->asentada = (string)$this->asentada;
       $this->observaciones = $this->rs_grid->fields[17] ;  
       $this->saldo = $this->rs_grid->fields[18] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[19] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[20] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[21] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->resolucion = $this->rs_grid->fields[22] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->vendedor = $this->rs_grid->fields[23] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->creado = $this->rs_grid->fields[24] ;  
       $this->editado = $this->rs_grid->fields[25] ;  
       $this->usuario_crea = $this->rs_grid->fields[26] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->inicio = $this->rs_grid->fields[27] ;  
       $this->fin = $this->rs_grid->fields[28] ;  
       $this->banco = $this->rs_grid->fields[29] ;  
       $this->banco = (string)$this->banco;
       $this->dias_decredito = $this->rs_grid->fields[30] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->tipo = $this->rs_grid->fields[31] ;  
       $this->cod_cuenta = $this->rs_grid->fields[32] ;  
       $this->base_iva_19 = $this->rs_grid->fields[33] ;  
       $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
       $this->base_iva_19 = (string)$this->base_iva_19;
       $this->valor_iva_19 = $this->rs_grid->fields[34] ;  
       $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
       $this->valor_iva_19 = (string)$this->valor_iva_19;
       $this->base_iva_5 = $this->rs_grid->fields[35] ;  
       $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
       $this->base_iva_5 = (string)$this->base_iva_5;
       $this->valor_iva_5 = $this->rs_grid->fields[36] ;  
       $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
       $this->valor_iva_5 = (string)$this->valor_iva_5;
       $this->excento = $this->rs_grid->fields[37] ;  
       $this->excento =  str_replace(",", ".", $this->excento);
       $this->excento = (string)$this->excento;
       $this->enviada_a_tns = $this->rs_grid->fields[38] ;  
       $this->factura_tns = $this->rs_grid->fields[39] ;  
       $this->cufe = $this->rs_grid->fields[40] ;  
       $this->periodo = $this->rs_grid->fields[41] ;  
       $this->periodo = (string)$this->periodo;
       $this->anio = $this->rs_grid->fields[42] ;  
       $this->anio = (string)$this->anio;
       $this->enviada = $this->rs_grid->fields[43] ;  
       $this->tiene_nota = $this->rs_grid->fields[44] ;  
       $this->tiene_nota = (string)$this->tiene_nota;
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
       { 
           if (!empty($this->qr_base64))
           { 
               $this->qr_base64 = $this->Db->BlobDecode($this->qr_base64, false, true, "BLOB");
           }
       }
      $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
if (!isset($_SESSION['gIdfac'])) {$_SESSION['gIdfac'] = "";}
if (!isset($this->sc_temp_gIdfac)) {$this->sc_temp_gIdfac = (isset($_SESSION['gIdfac'])) ? $_SESSION['gIdfac'] : "";}
  $vproveedor        = '';
$TokenEnterprise   = '';
$TokenAutorizacion = '';
$vServidor         = '';
$vPFe              = '';
$vPref             = '';
$venlacepdf        = '';

$vsql = "select proveedor, token, password, servidor, enlacepdf from facturaven_contratos where idfacven='".$this->idfacven ."'";
 
      $nm_select = $vsql; 
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
	$vproveedor        = $this->vdatos[0][0];
	$TokenEnterprise   = $this->vdatos[0][1];
	$TokenAutorizacion = $this->vdatos[0][2];
	$vServidor         = $this->vdatos[0][3];
	$venlacepdf        = $this->vdatos[0][4];
}

 
      $nm_select = "SELECT prefijo, prefijo_fe FROM resdian WHERE Idres = $this->resolucion  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_res = array();
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
                        $this->ds_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_res = false;
          $this->ds_res_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->ds_res[0][1]))
{
	$vPref = $this->ds_res[0][0];
	$vPFe  = $this->ds_res[0][1];
}

if($vPFe=='FE')
{
	switch($vproveedor)
	{
		case 'CADENA S. A.':
			 
      $nm_select = "select idfacven from facturaven where numfacven=$this->numfacven   and resolucion=$this->resolucion  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_idf = array();
     if ($this->numfacven !== "" && $this->resolucion !== "")
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
                        $this->dt_idf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_idf = false;
          $this->dt_idf_erro = $this->Db->ErrorMsg();
      } 
     } 
;
			if(isset($this->dt_idf[0][0]))
			{
				$vidfacven=$this->dt_idf[0][0];
				$this->sc_temp_gIdfac = $vidfacven;
				 if (isset($this->sc_temp_gIdfac)) {$_SESSION['gIdfac'] = $this->sc_temp_gIdfac;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('blank_pdf_facturatech') . "/", $this->nm_location, "_blank?#?" . NM_encode_input("") . "?@?","_self", 440, 630);
 };
			}
			else
			{
				echo "Factura no se puede procesar!!!";
				goto error;
			}
		break;

		case 'FACILWEB':
			
			$varchivo = file_get_contents($venlacepdf, true);
			$file = $vPref.$this->numfacven .'.pdf';
			file_put_contents($file, $varchivo);
			echo "<a id='ver' href='$file' style='display:none;'>Factura: documento $file </a>";
			echo "<script>window.onload = function(){document.getElementById('ver').click();};</script>";

		break;

		case 'THE FACTORY HKA':

			error_reporting(E_ERROR);
			$WebService = new WebService();
			$options = array('exceptions' => true, 'trace' => true);

			$params;
			$params = array (
						'tokenEmpresa'	=>$TokenEnterprise,
						'tokenPassword'	=>$TokenAutorizacion,
						'documento'		=>$vPref.$this->numfacven );

			$descargas = $WebService->Descargas($vServidor,$options,$params,'pdf');


			if($descargas["codigo"]==200 or $descargas["codigo"]==201)
			{
				$salida="NO";
				if($salida=="NO")
				{
					$decoded = base64_decode($descargas["documento"]);
					$file = $vPref.$this->numfacven .'.pdf';
					file_put_contents($file, $decoded);
					echo "<a id='ver' href='$file' style='display:none;'>Factura: documento $file </a>";
					echo "<script>window.onload = function(){document.getElementById('ver').click();};</script>";
				}
				else
				{
					$decoded = base64_decode($descargas["documento"]);
					header('Content-Type: application/pdf');
					echo $decoded;
				}
			}
			else
			{
				echo "No se puede descargar!"."<br>";
			}

		break;
	}			

}
else
{
	echo "Documento ".$vPref." - ".$this->numfacven ." No contiene resolución de F. Electrónica!"."<br>";
}
error:;
if (isset($this->sc_temp_gIdfac)) {$_SESSION['gIdfac'] = $this->sc_temp_gIdfac;}
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
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
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\" onclick=\"window.close()\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "  window.close();";
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
      $this->SC_redir_btn = false;
   }
   function btn_consultar_estado_fe() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_GET['nm_check'])) ? explode(";", $_GET['nm_check']) : array();
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run'][$Run_register];
       $this->zona = $this->rs_grid->fields[0] ;  
       $this->barrio = $this->rs_grid->fields[1] ;  
       $this->fechaven = $this->rs_grid->fields[2] ;  
       $this->numero2 = $this->rs_grid->fields[3] ;  
       $this->idcli = $this->rs_grid->fields[4] ;  
       $this->idcli = (string)$this->idcli;
       $this->direccion2 = $this->rs_grid->fields[5] ;  
       $this->total = $this->rs_grid->fields[6] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (string)$this->total;
       $this->numcontrato = $this->rs_grid->fields[7] ;  
       $this->numcontrato = (string)$this->numcontrato;
       $this->ing_terceros = $this->rs_grid->fields[8] ;  
       $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
       $this->ing_terceros = (string)$this->ing_terceros;
       $this->idfacven = $this->rs_grid->fields[9] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->numfacven = $this->rs_grid->fields[10] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->credito = $this->rs_grid->fields[11] ;  
       $this->credito = (string)$this->credito;
       $this->fechavenc = $this->rs_grid->fields[12] ;  
       $this->subtotal = $this->rs_grid->fields[13] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[14] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[15] ;  
       $this->asentada = $this->rs_grid->fields[16] ;  
       $this->asentada = (string)$this->asentada;
       $this->observaciones = $this->rs_grid->fields[17] ;  
       $this->saldo = $this->rs_grid->fields[18] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[19] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[20] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[21] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->resolucion = $this->rs_grid->fields[22] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->vendedor = $this->rs_grid->fields[23] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->creado = $this->rs_grid->fields[24] ;  
       $this->editado = $this->rs_grid->fields[25] ;  
       $this->usuario_crea = $this->rs_grid->fields[26] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->inicio = $this->rs_grid->fields[27] ;  
       $this->fin = $this->rs_grid->fields[28] ;  
       $this->banco = $this->rs_grid->fields[29] ;  
       $this->banco = (string)$this->banco;
       $this->dias_decredito = $this->rs_grid->fields[30] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->tipo = $this->rs_grid->fields[31] ;  
       $this->cod_cuenta = $this->rs_grid->fields[32] ;  
       $this->base_iva_19 = $this->rs_grid->fields[33] ;  
       $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
       $this->base_iva_19 = (string)$this->base_iva_19;
       $this->valor_iva_19 = $this->rs_grid->fields[34] ;  
       $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
       $this->valor_iva_19 = (string)$this->valor_iva_19;
       $this->base_iva_5 = $this->rs_grid->fields[35] ;  
       $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
       $this->base_iva_5 = (string)$this->base_iva_5;
       $this->valor_iva_5 = $this->rs_grid->fields[36] ;  
       $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
       $this->valor_iva_5 = (string)$this->valor_iva_5;
       $this->excento = $this->rs_grid->fields[37] ;  
       $this->excento =  str_replace(",", ".", $this->excento);
       $this->excento = (string)$this->excento;
       $this->enviada_a_tns = $this->rs_grid->fields[38] ;  
       $this->factura_tns = $this->rs_grid->fields[39] ;  
       $this->cufe = $this->rs_grid->fields[40] ;  
       $this->periodo = $this->rs_grid->fields[41] ;  
       $this->periodo = (string)$this->periodo;
       $this->anio = $this->rs_grid->fields[42] ;  
       $this->anio = (string)$this->anio;
       $this->enviada = $this->rs_grid->fields[43] ;  
       $this->tiene_nota = $this->rs_grid->fields[44] ;  
       $this->tiene_nota = (string)$this->tiene_nota;
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
       { 
           if (!empty($this->qr_base64))
           { 
               $this->qr_base64 = $this->Db->BlobDecode($this->qr_base64, false, true, "BLOB");
           }
       }
      $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
if (!isset($_SESSION['gIdfac'])) {$_SESSION['gIdfac'] = "";}
if (!isset($this->sc_temp_gIdfac)) {$this->sc_temp_gIdfac = (isset($_SESSION['gIdfac'])) ? $_SESSION['gIdfac'] : "";}
   
      $nm_select = "select proveedor, servidor1, tokenempresa as usuario, tokenpassword from webservicefe order by idwebservicefe ASC limit 1 "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dcx = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dcx[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dcx = false;
          $this->dcx_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->dcx[0][0]))
		{
		if ($this->dcx[0][0]=='CADENA S. A.')
			{
			 
      $nm_select = "select idfacven from facturaven_contratos where numfacven=$this->numfacven   and resolucion=$this->resolucion  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_idf = array();
     if ($this->numfacven !== "" && $this->resolucion !== "")
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
                        $this->dt_idf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_idf = false;
          $this->dt_idf_erro = $this->Db->ErrorMsg();
      } 
     } 
;
			if(isset($this->dt_idf[0][0]))
				{
				$vidfacven=$this->dt_idf[0][0];
				$this->sc_temp_gIdfac = $vidfacven;
				 if (isset($this->sc_temp_gIdfac)) {$_SESSION['gIdfac'] = $this->sc_temp_gIdfac;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('blank_recursos_facturatech') . "/", $this->nm_location, "_blank?#?" . NM_encode_input("") . "?@?" . "nmgp_url_saida?#?modal?@?NMSC_modal?#?ok?@?nmgp_outra_jan?#?true?@?","_self", 440, 630);
 };
				}
			else
				{
				echo "Factura no se puede procesar!!!";
				goto error;
				}
			
			}
		}

$decoded 	= '';
$decoded	= '';
$vcufe		= '';
$vcufe		= '';
$vestado	= '';
$vestado	= '';
$vavisos	= '';
$vqr		= '';
$vconsecutivo =$this->numfacven ;

 
      $nm_select = "select idfacven from facturaven_contratos where numfacven=$this->numfacven   and resolucion=$this->resolucion  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_idf = array();
     if ($this->numfacven !== "" && $this->resolucion !== "")
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
                        $this->dt_idf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_idf = false;
          $this->dt_idf_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->dt_idf[0][0]))
	{
	$vidfacven=$this->dt_idf[0][0];
	}
else
	{
	echo "Factura no se puede procesar!!!";
	goto error;
	}


$TokenEnterprise = '';
$TokenAutorizacion = '';
$vServidor='';
$vPFe= '';
 
      $nm_select = "SELECT prefijo, prefijo_fe FROM resdian WHERE Idres = $this->resolucion  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_res = array();
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
                        $this->ds_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_res = false;
          $this->ds_res_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->ds_res[0][1]))
	{
	$vPref=$this->ds_res[0][0];
	$vPFe=$this->ds_res[0][1];
	}

if($vPFe=='FE')
	{
	 
      $nm_select = "select servidor1, servidor2, tokenempresa, tokenpassword from webservicefe order by idwebservicefe desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->ds_fv[0][0]) and (isset($this->ds_fv[0][1])) and (isset($this->ds_fv[0][2])) and (isset($this->ds_fv[0][3])))
		{
		if(!empty(($this->ds_fv[0][0])) and (!empty($this->ds_fv[0][1])) and (!empty($this->ds_fv[0][2])) and (!empty($this->ds_fv[0][3])))
			{
			error_reporting(E_ERROR);
			$WebService = new WebService();
			$options = array('exceptions' => true, 'trace' => true);

			$params;
			$TokenEnterprise = $this->ds_fv[0][2];
			$TokenAutorizacion = $this->ds_fv[0][3];
			$vServidor=$this->ds_fv[0][0];


			$params = array (
						'tokenEmpresa'	=>$TokenEnterprise,
						'tokenPassword'	=>$TokenAutorizacion,
						'documento'		=>$vPref.$this->numfacven );
			$resultado = $WebService->getEstadoDocumento($vServidor,$options,$params);


			if($resultado["codigo"]==200 or $resultado["codigo"]==201)
				{
				echo "Documento ".$vPref." - ".$this->numfacven ." Se ha aceptado y procesado con éxito!"."<br>";
				
				error_reporting(E_ERROR);
				$WebService2 = new WebService();
				$options2 = array('exceptions' => true, 'trace' => true);

				$params2 = array (
						'tokenEmpresa'	=>$TokenEnterprise,
						'tokenPassword'	=>$TokenAutorizacion,
						'documento'		=>$vPref.$vconsecutivo);

				$descargas = $WebService2->Descargas($vServidor,$options2,$params2,'pdf');
		
				if($descargas["codigo"]==200 or $descargas["codigo"]==201)
					{
					$decoded 	= $descargas["documento"];
					$decoded	= strval($decoded);
					$vcufe		= $resultado["cufe"];
					$vcufe		= strval($vcufe);
					$vestado	= $resultado["codigo"];
					$vestado	= strval($vestado);
					$vavisos	= implode(";", $resultado);
				
					$sql="UPDATE facturaven_contratos SET cufe = '".$vcufe."', enlacepdf='".$decoded."', estado='".$vestado."', avisos='".$vavisos."', enviada='SI' WHERE idfacven='".$vidfacven."'";
					
     $nm_select = $sql; 
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
				echo "Documento ".$vPref." - ".$this->numfacven ." No se ha envido y/o aceptado con éxito!"."<br>";
				}
			}
	
		}
error:;	
	}

else
	{
	echo "Documento ".$vPref." - ".$this->numfacven ." No contiene resolución de F. Electrónica!"."<br>";
	}
if (isset($this->sc_temp_gIdfac)) {$_SESSION['gIdfac'] = $this->sc_temp_gIdfac;}
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
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
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\" onclick=\"self.parent.tb_remove()\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "  self.parent.tb_remove();";
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
      $this->SC_redir_btn = false;
   }
   function btn_regenerar_estado() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run']))
{
    foreach ($NM_index_reg as $Run_register)
    {
       if (!is_numeric($Run_register)) { continue; }
       $this->rs_grid->fields = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['sc_sql_btn_run'][$Run_register];
       $this->zona = $this->rs_grid->fields[0] ;  
       $this->barrio = $this->rs_grid->fields[1] ;  
       $this->fechaven = $this->rs_grid->fields[2] ;  
       $this->numero2 = $this->rs_grid->fields[3] ;  
       $this->idcli = $this->rs_grid->fields[4] ;  
       $this->idcli = (string)$this->idcli;
       $this->direccion2 = $this->rs_grid->fields[5] ;  
       $this->total = $this->rs_grid->fields[6] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (string)$this->total;
       $this->numcontrato = $this->rs_grid->fields[7] ;  
       $this->numcontrato = (string)$this->numcontrato;
       $this->ing_terceros = $this->rs_grid->fields[8] ;  
       $this->ing_terceros =  str_replace(",", ".", $this->ing_terceros);
       $this->ing_terceros = (string)$this->ing_terceros;
       $this->idfacven = $this->rs_grid->fields[9] ;  
       $this->idfacven = (string)$this->idfacven;
       $this->numfacven = $this->rs_grid->fields[10] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->credito = $this->rs_grid->fields[11] ;  
       $this->credito = (string)$this->credito;
       $this->fechavenc = $this->rs_grid->fields[12] ;  
       $this->subtotal = $this->rs_grid->fields[13] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[14] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (string)$this->valoriva;
       $this->pagada = $this->rs_grid->fields[15] ;  
       $this->asentada = $this->rs_grid->fields[16] ;  
       $this->asentada = (string)$this->asentada;
       $this->observaciones = $this->rs_grid->fields[17] ;  
       $this->saldo = $this->rs_grid->fields[18] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->adicional = $this->rs_grid->fields[19] ;  
       $this->adicional =  str_replace(",", ".", $this->adicional);
       $this->adicional = (string)$this->adicional;
       $this->adicional2 = $this->rs_grid->fields[20] ;  
       $this->adicional2 = (string)$this->adicional2;
       $this->adicional3 = $this->rs_grid->fields[21] ;  
       $this->adicional3 = (string)$this->adicional3;
       $this->resolucion = $this->rs_grid->fields[22] ;  
       $this->resolucion = (string)$this->resolucion;
       $this->vendedor = $this->rs_grid->fields[23] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->creado = $this->rs_grid->fields[24] ;  
       $this->editado = $this->rs_grid->fields[25] ;  
       $this->usuario_crea = $this->rs_grid->fields[26] ;  
       $this->usuario_crea = (string)$this->usuario_crea;
       $this->inicio = $this->rs_grid->fields[27] ;  
       $this->fin = $this->rs_grid->fields[28] ;  
       $this->banco = $this->rs_grid->fields[29] ;  
       $this->banco = (string)$this->banco;
       $this->dias_decredito = $this->rs_grid->fields[30] ;  
       $this->dias_decredito = (string)$this->dias_decredito;
       $this->tipo = $this->rs_grid->fields[31] ;  
       $this->cod_cuenta = $this->rs_grid->fields[32] ;  
       $this->base_iva_19 = $this->rs_grid->fields[33] ;  
       $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
       $this->base_iva_19 = (string)$this->base_iva_19;
       $this->valor_iva_19 = $this->rs_grid->fields[34] ;  
       $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
       $this->valor_iva_19 = (string)$this->valor_iva_19;
       $this->base_iva_5 = $this->rs_grid->fields[35] ;  
       $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
       $this->base_iva_5 = (string)$this->base_iva_5;
       $this->valor_iva_5 = $this->rs_grid->fields[36] ;  
       $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
       $this->valor_iva_5 = (string)$this->valor_iva_5;
       $this->excento = $this->rs_grid->fields[37] ;  
       $this->excento =  str_replace(",", ".", $this->excento);
       $this->excento = (string)$this->excento;
       $this->enviada_a_tns = $this->rs_grid->fields[38] ;  
       $this->factura_tns = $this->rs_grid->fields[39] ;  
       $this->cufe = $this->rs_grid->fields[40] ;  
       $this->periodo = $this->rs_grid->fields[41] ;  
       $this->periodo = (string)$this->periodo;
       $this->anio = $this->rs_grid->fields[42] ;  
       $this->anio = (string)$this->anio;
       $this->enviada = $this->rs_grid->fields[43] ;  
       $this->tiene_nota = $this->rs_grid->fields[44] ;  
       $this->tiene_nota = (string)$this->tiene_nota;
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
       { 
           if (!empty($this->qr_base64))
           { 
               $this->qr_base64 = $this->Db->BlobDecode($this->qr_base64, false, true, "BLOB");
           }
       }
      $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  ?>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'bootstrap/js/bootstrap.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'bootstrap/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'bootstrap/css/bootstrap-theme.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'bootstrap/css/bootstrap.min.css'); ?>">
	
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
body{
	background:white !important;
	padding: 10px !important;
}
table{
	border:0px !important;
}
input{
	padding:10px !important;
	border-radius: 5px !important;
	color: white !important;
	background:#5877b9 !important;
}
</style>
<?php

switch($this->enviada )
{
	case 'SI':
		echo "<div>EL ESTADO DEL DOCUMENTO: ".$this->numero2 ." NO SE PUEDE RESETEAR PORQUE YA HA SIDO ENVIADO.</div><br>";
	break;
	case 'NO':
		echo "<div>EL ESTADO DEL DOCUMENTO: ".$this->numero2 ."  NO NECESITA RESETEO.</div><br>";
	break;
	case 'PT':
		$vsql = "update facturaven_contratos set avisos=null, enviada='NO' where idfacven='".$this->idfacven ."'";
		
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
		echo "<div>EL ESTADO DEL DOCUMENTO: ".$this->numero2 ."  HA SIDO RESETEADO, YA PUEDE ENVIARLO.</div><br>";
	break;
	case 'PR':
		$vsql = "update facturaven_contratos set avisos=null, enviada='NO' where idfacven='".$this->idfacven ."'";
		
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
		echo "<div>ACABA DE RESETEAR EL ESTADO DE ENVÍO DEL DOCUMENTO: ".$this->numero2 ."!!!.</div><br>";
	break;
}
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
    }  
    $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off'; 
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
      $this->SC_redir_btn = false;
   }
function fActualizarTotalFactura($idfac)
{
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
if(!empty($idfac))
{
	$vsqltotal = "update 
		  facturaven 
		  set 
		  total=(select coalesce(sum(d.tneto),0) from detalleventa d where d.numfac='".$idfac."'),
		  saldo=(select coalesce(sum(d.tneto),0) from detalleventa d where d.numfac='".$idfac."'),
		  valoriva=round((select coalesce(sum(d.iva),0) from detalleventa d where d.numfac='".$idfac."')), 
		  subtotal=round((select coalesce(sum(d.tbase),0) from detalleventa d where d.numfac='".$idfac."')) 
		  where 
		  idfacven='".$idfac."'
		  ";

	
     $nm_select = $vsqltotal; 
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
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
}
function fAlinearTexto($texto, $titulo, $retorno, $distancia, $alineacion='izquierda')
{
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
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


$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
}
function fGestionaStock($iddet, $tipo=2)
{
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
}
function fPagarFacVen($idfactura,$formapago=1,$retorno=true,$vidrecibo=0,$sipropina="NO")
{
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
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
          $nm_select = "select f.total, f.resolucion, f.numfacven, f.vendedor, f.banco, str_replace (convert(char(10),f.fechaven,102), '.', '-') + ' ' + convert(char(8),f.fechaven,20), str_replace (convert(char(10),coalesce(f.creado,NOW()),102), '.', '-') + ' ' + convert(char(8),coalesce(f.creado,NOW()),20) as sc_alias_0, f.tipo, r.prefijo, f.idcli, t.porcentaje_propina_sugerida, f.pedido from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero where f.idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select f.total, f.resolucion, f.numfacven, f.vendedor, f.banco, convert(char(23),f.fechaven,121), convert(char(23),coalesce(f.creado,NOW()),121) as sc_alias_0, f.tipo, r.prefijo, f.idcli, t.porcentaje_propina_sugerida, f.pedido from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero where f.idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select f.total,f.resolucion,f.numfacven,f.vendedor,f.banco,f.fechaven,coalesce(f.creado,NOW()),f.tipo,r.prefijo,f.idcli,t.porcentaje_propina_sugerida,f.pedido from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero where f.idfacven='".$idfactura."'"; 
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
                 $SCrx->fields[11] = str_replace(',', '.', $SCrx->fields[11]);
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
                 $SCrx->fields[11] = (strpos(strtolower($SCrx->fields[11]), "e")) ? (float)$SCrx->fields[11] : $SCrx->fields[11];
                 $SCrx->fields[11] = (string)$SCrx->fields[11];
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
			$vidpedido  = $this->vdatos[0][11];
			$vinsertarencaja = true;
			
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

					if($vidpedido>0)
					{
						$vsql = "select total, saldo from pedidos where idpedido='".$vidpedido."'";
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosPedido = array();
      $this->vdatospedido = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatosPedido[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatospedido[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosPedido = false;
          $this->vDatosPedido_erro = $this->Db->ErrorMsg();
          $this->vdatospedido = false;
          $this->vdatospedido_erro = $this->Db->ErrorMsg();
      } 
;
						if(isset($this->vdatospedido[0][0]))
						{
							$vtp = $this->vdatospedido[0][0];
							$vsp = $this->vdatospedido[0][1];
							
							if(intval($vtp)>0 and intval($vsp)==0)
							{
								$vinsertarencaja = false;
							}
						}
					}
					
					if($vinsertarencaja)
					{
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
					}
					
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
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
}
function fAsentar($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
}
function fAsentarContratos($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
}
function fPagarPedido($id,$formapago=1,$retorno=true)
{
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
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
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
}
function fAsentarPedido($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true)
{
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
	
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
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
}
function fEnviarFV($vidfacven)
{
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'on';
  
	$vmensaje = "";
	$vcufe	  = "";	
	$vconsecutivo = "";
	$vTotf    = 0;
	$vfechaven= "";
	$vcredito = "";
	$vfechavenc= "";
	$idmu='828';

	$Nciudad="CUCUTA";
	$cdep='54';
	$cmun='001';
	$cdepmun=$cdep.$cmun;
	$Ndep='NORTE DE SANTANDER';
	$dir ='';
	$vnumerocontrato = "";
	$vresolucion = "";
	$vidcli = "";
	$vobserv= "";

	$vsql = "select coalesce(fc.cufe,''), numfacven, fc.total, fc.fechaven, fc.credito, fc.fechavenc, fc.direccion,fc.numcontrato, fc.codigo_mun, fc.codigo_dep, fc.enviada, fc.periodo, fc.anio, (select d.departamento from departamento d where d.codigo=fc.codigo_dep limit 1) as depart, (select m.municipio from municipio m where m.codigo_mu=fc.codigo_mun and m.codigo_dep=fc.codigo_dep limit 1) as munic, fc.resolucion,fc.idcli,fc.observaciones from facturaven_contratos fc where fc.idfacven='".$vidfacven."'";

	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDFV = array();
      $this->vdfv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDFV[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdfv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDFV = false;
          $this->vDFV_erro = $this->Db->ErrorMsg();
          $this->vdfv = false;
          $this->vdfv_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->vdfv[0][0]))
	{

		$vcufe	  = $this->vdfv[0][0];	
		$vconsecutivo = $this->vdfv[0][1];
		$vTotf    = $this->vdfv[0][2];
		$vfechaven= $this->vdfv[0][3];
		$vcredito = $this->vdfv[0][4];
		$vfechavenc= $this->vdfv[0][5];

		$Nciudad   = $this->vdfv[0][14];
		$cdep      = $this->vdfv[0][9];
		$cmun      = $this->vdfv[0][8];
		$cdepmun   = $cdep.$cmun;
		$Ndep      = $this->vdfv[0][13];
		$dir       = $this->vdfv[0][6];
		$vnumerocontrato = $this->vdfv[0][7];
		$vresolucion = $this->vdfv[0][15];
		$vidcli   = $this->vdfv[0][16];
		$vobserv  = $this->vdfv[0][17];

		if(!empty($vcufe))
		{
		}
		else
		{
			$TokenEnterprise = '';
			$TokenAutorizacion = '';
			$vServidor='';
			$vPFe= '';

			$vrango="F4NN-1"; 

			$vcorreo = "easeing@outlook.com.com";
			$vaccion = "Enviar";

			$ciuu="";
			$vcorreo="";
			$nitodoc="";
			$tel="";
			$codImp="";
			$zonpos="";
			$nomcomerc="";
			$nombr="";
			$vdv="";
			$tipodoc="";
			$obligac="";
			$ti_per="";

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
			$vestado = '';
			$vavisos = '';
			$eldesc	 = 0;
			$t		 = 0;
			$elmonto = 0;
			$bas_br	 = 0;

			$t_reg	 ='';
			$vEsfac	 ='NO';

			$lafechadevencimiento = '';

			$a=0;
			$b=1;
			$c=0;
			$d=0;
			$vtotalingresosparaterceros = 0;
			$vobs = new strings();

			$vprimerfac=1;

			 
      $nm_select = "SELECT prefijo, prefijo_fe, pref_factura, primerfactura FROM resdian WHERE Idres = $vresolucion"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_res = false;
          $this->ds_res_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->ds_res[0][1]))
			{
				$vPref	=$this->ds_res[0][0];
				$vPFe	=$this->ds_res[0][1];
				$vEsfac	=$this->ds_res[0][2];
				$vprimerfac = $this->ds_res[0][3];
				$vrango = $vPref."-"."$vprimerfac";
			}

			if($vPFe=='FE' and $vEsfac=='SI')
			{
				 
      $nm_select = "select servidor1, servidor2, tokenempresa, tokenpassword from webservicefe order by idwebservicefe desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->ds_fv[0][0]) and (isset($this->ds_fv[0][1])) and (isset($this->ds_fv[0][2])) and (isset($this->ds_fv[0][3])))
				{
					if(!empty(($this->ds_fv[0][0])) and (!empty($this->ds_fv[0][1])) and (!empty($this->ds_fv[0][2])) and (!empty($this->ds_fv[0][3])))
					{


						error_reporting(E_ERROR);
						$WebService = new WebService();
						$factura = new FacturaGeneral();
						$cliente= new Cliente();
						$destinatario = new Destinatario();
						$direccion = new Direccion();
						$det_tributario = new Tributos();
						$emaildest = new Strings();
						$vServidor=$this->ds_fv[0][0];

						$options = array('exceptions' => true, 'trace' => true);

						$params;
						$TokenEnterprise = $this->ds_fv[0][2];
						$TokenAutorizacion = $this->ds_fv[0][3];



						$enviarAdjunto = false;

						$sql_fe="select coalesce((select codigo_ciiu from ciiu_tercero where id_tercero=$vidcli),'0010') as ciiu, t.urlmail, t.documento, t.tel_cel, coalesce((select cod_det_trib from det_trib_x_tercero where id_tercero=$vidcli),'ZY') as det_tri,  t.idmuni, t.direccion, t.codigo_postal, t.nombre_comercil, t.nombres, t.dv, t.tipo_documento,coalesce((select codigo_rt from resp_trib_x_tercero where id_tercero=$vidcli order by id_resp_tr_ter ASC LIMIT 1),'R-99-PN') as obligacion, (if(t.tipo='NAT',2,1)) as tipo_per, (if(t.regimen='SIM', 49, 48)) as regimen_ter from terceros t where t.idtercero=$vidcli ";
						 
      $nm_select = $sql_fe; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fe = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fe[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fe = false;
          $this->ds_fe_erro = $this->Db->ErrorMsg();
      } 
;	

						if(isset($this->ds_fe[0][1]) and !empty($this->ds_fe[0][1]))
						{
							$a=1;
							if(isset($this->ds_fe[0][0]) and !empty($this->ds_fe[0][0]))
							{
								$b=1;
							}
							if(isset($this->ds_fe[0][4]) and !empty($this->ds_fe[0][4]))
							{
								$c=1;
							}
							if(isset($this->ds_fe[0][12]) and !empty($this->ds_fe[0][12]))
							{
								$d=1;
							}	
							if($b==1 and $c==1 and $d==1)
							{
								if(!isset($this->ds_fe[0][8]) or empty($this->ds_fe[0][8]))
								{
									$nomcomerc	= $this->ds_fe[0][9];
								}
								else
								{
									$nomcomerc	=$this->ds_fe[0][8];
								}
								$ciuu		=$this->ds_fe[0][0];
								$vcorreo	=$this->ds_fe[0][1];
								$nitodoc	=$this->ds_fe[0][2];
								$tel		=$this->ds_fe[0][3];
								$codImp		=$this->ds_fe[0][4];
								$idmu		=$this->ds_fe[0][5];
								$zonpos		=$this->ds_fe[0][7];

								$nombr		=$this->ds_fe[0][9];
								$vdv		=$this->ds_fe[0][10];
								$tipodoc	=$this->ds_fe[0][11];
								$obligac	=$this->ds_fe[0][12];
								$ti_per		=$this->ds_fe[0][13];
								$t_reg		=$this->ds_fe[0][14];
							}
							else
							{
								echo "Datos incompletos del Cliente!","<br>";
								if($b==0)
								{
								}
								if($c==0)
								{
								}
								if($d==0)
								{
								}

								if(!isset($this->ds_fe[0][8]) or empty($this->ds_fe[0][8]))
								{
									$nomcomerc	= $this->ds_fe[0][9];
								}
								else
								{
									$nomcomerc	=$this->ds_fe[0][8];
								}

								$ciuu		=$this->ds_fe[0][0];
								$vcorreo	=$this->ds_fe[0][1];
								$nitodoc	=$this->ds_fe[0][2];
								$tel		=$this->ds_fe[0][3];
								$codImp		=$this->ds_fe[0][4];
								$idmu		=$this->ds_fe[0][5];
								$zonpos		=$this->ds_fe[0][7];

								$nombr		=$this->ds_fe[0][9];
								$vdv		=$this->ds_fe[0][10];
								$tipodoc	=$this->ds_fe[0][11];
								$obligac	=$this->ds_fe[0][12];
								$ti_per		=$this->ds_fe[0][13];
								$t_reg		=$this->ds_fe[0][14];
							}

						}
						else
						{
							if(isset($this->ds_fe[0][0]) and !empty($this->ds_fe[0][0]))
							{
								$b=1;
							}
							if(isset($this->ds_fe[0][4]) and !empty($this->ds_fe[0][4]))
							{
								$c=1;
							}
							if(isset($this->ds_fe[0][12]) and !empty($this->ds_fe[0][12]))
							{
								$d=1;
							}

							$vmensaje .= "No configurado el email\n";
							
							if($c==0)
							{
							}
							if($d==0)
							{
							}


							goto error_DC;

						}




						if($vaccion=="Enviar"){

							$factura = new FacturaGeneral();
							$factura->cliente = new Cliente();
							$factura->cantidadDecimales = "2";
							$destinatarios = new Destinatario();	
							$destinatarios->canalDeEntrega = "0";

							$correodestinatario = new strings();	 
							$correodestinatario->string = $vcorreo;

							$destinatarios->email = $correodestinatario;
							$destinatarios->nitProveedorReceptor = $nitodoc;
							$destinatarios->telefono = $tel;	

							$factura->cliente->destinatario[0] = $destinatarios;

							$tributos1 = new Tributos();	
							$tributos1->codigoImpuesto = $codImp;

							$extensible1 = new Extensibles();
							$extensible1->controlInterno1 = "";
							$extensible1->controlInterno2 = "";
							$extensible1->nombre = "";
							$extensible1->valor = "";

							$tributos1->extras[0] = $extensible1;

							$factura->cliente->detallesTributarios[0] = $tributos1;

							$DireccionFiscal[0] = new Direccion();	
							$DireccionFiscal[0]->aCuidadoDe = "";
							$DireccionFiscal[0]->aLaAtencionDe = "";
							$DireccionFiscal[0]->bloque = "";
							$DireccionFiscal[0]->buzon = "";
							$DireccionFiscal[0]->calle = "";
							$DireccionFiscal[0]->calleAdicional = "";
							$DireccionFiscal[0]->ciudad = $Nciudad;
							$DireccionFiscal[0]->codigoDepartamento = $cdep;
							$DireccionFiscal[0]->correccionHusoHorario = "";
							$DireccionFiscal[0]->departamento = $Ndep;
							$DireccionFiscal[0]->departamentoOrg = "";
							$DireccionFiscal[0]->habitacion = "";
							$DireccionFiscal[0]->distrito = "";
							$DireccionFiscal[0]->lenguaje = "es";
							$DireccionFiscal[0]->municipio = $cdepmun;
							$DireccionFiscal[0]->nombreEdificio = "";
							$DireccionFiscal[0]->numeroParcela = "";
							$DireccionFiscal[0]->pais = "CO";
							$DireccionFiscal[0]->piso = "";
							$DireccionFiscal[0]->region = "";
							$DireccionFiscal[0]->subDivision = "";
							$DireccionFiscal[0]->ubicacion = "";
							$DireccionFiscal[0]->zonaPostal = $zonpos;	
							$DireccionFiscal[0]->direccion  = $dir;

							$DireccionFiscal[1] = new Direccion();	
							$DireccionFiscal[1]->aCuidadoDe = "";
							$DireccionFiscal[1]->aLaAtencionDe = "";
							$DireccionFiscal[1]->bloque = "";
							$DireccionFiscal[1]->buzon = "";
							$DireccionFiscal[1]->calle = "";
							$DireccionFiscal[1]->calleAdicional = "";
							$DireccionFiscal[1]->ciudad = $Nciudad;
							$DireccionFiscal[1]->codigoDepartamento = $cdep;
							$DireccionFiscal[1]->correccionHusoHorario = "";
							$DireccionFiscal[1]->departamento = $Ndep;
							$DireccionFiscal[1]->departamentoOrg = "";
							$DireccionFiscal[1]->habitacion = "";
							$DireccionFiscal[1]->distrito = "";
							$DireccionFiscal[1]->lenguaje = "es";
							$DireccionFiscal[1]->municipio = $cdepmun;
							$DireccionFiscal[1]->nombreEdificio = "";
							$DireccionFiscal[1]->numeroParcela = "";
							$DireccionFiscal[1]->pais = "CO";
							$DireccionFiscal[1]->piso = "";
							$DireccionFiscal[1]->region = "";
							$DireccionFiscal[1]->subDivision = "";
							$DireccionFiscal[1]->ubicacion = "";
							$DireccionFiscal[1]->zonaPostal = $zonpos;	
							$DireccionFiscal[1]->direccion  = $dir;

							$factura->cliente->direccionFiscal  = $DireccionFiscal[0];
							$factura->cliente->direccionCliente = $DireccionFiscal[1];
							$factura->cliente->telefono = $tel;
							$factura->cliente->email = $vcorreo;


							$InfoLegalCliente = new InformacionLegalCliente();
							$InfoLegalCliente->codigoEstablecimiento = "00001";
							$InfoLegalCliente->nombreRegistroRUT = $nombr;
							$InfoLegalCliente->numeroIdentificacion = $nitodoc;
							$InfoLegalCliente->numeroIdentificacionDV = $vdv;
							$InfoLegalCliente->tipoIdentificacion = $tipodoc;	

							$factura->cliente->informacionLegalCliente = $InfoLegalCliente;


							$factura->cliente->nombreRazonSocial  = $nombr;
							$factura->cliente->notificar = "SI";
							$factura->cliente->numeroDocumento = $nitodoc;
							$factura->cliente->numeroIdentificacionDV = $vdv;

							$obligacionesCliente = new Obligaciones();
							$obligacionesCliente->obligaciones = $obligac;
							$obligacionesCliente->regimen = $t_reg;

							$factura->cliente->responsabilidadesRut[0] = $obligacionesCliente;

							$factura->cliente->tipoIdentificacion = $tipodoc;
							$factura->cliente->tipoPersona = $ti_per;


							$factura->consecutivoDocumento = $vconsecutivo;
							


							 
      $nm_select = "select round(d.cantidad,2) as cantidad, p.codigobar, d.descr, p.codigoprod, (d.valorpar-(d.descuento+d.iva)) as base, (if(iv.tipo_impuesto='CONSUMO','02','01')) as codigoimpuesto, d.adicional as porciva, d.iva, d.adicional1 as porcdesc, (d.valorpar/((d.adicional/100)+1)) as bas_br,p.idprod FROM detalleventa d inner join productos p on d.idpro=p.idprod inner join iva iv on p.idiva=iv.idiva where d.numfac='".$vidfacven."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDetalle = array();
      $this->vdetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[8] = str_replace(',', '.', $SCrx->fields[8]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[10] = str_replace(',', '.', $SCrx->fields[10]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
                 $SCrx->fields[8] = (strpos(strtolower($SCrx->fields[8]), "e")) ? (float)$SCrx->fields[8] : $SCrx->fields[8];
                 $SCrx->fields[8] = (string)$SCrx->fields[8];
                 $SCrx->fields[9] = (strpos(strtolower($SCrx->fields[9]), "e")) ? (float)$SCrx->fields[9] : $SCrx->fields[9];
                 $SCrx->fields[9] = (string)$SCrx->fields[9];
                 $SCrx->fields[10] = (strpos(strtolower($SCrx->fields[10]), "e")) ? (float)$SCrx->fields[10] : $SCrx->fields[10];
                 $SCrx->fields[10] = (string)$SCrx->fields[10];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDetalle = false;
          $this->vDetalle_erro = $this->Db->ErrorMsg();
          $this->vdetalle = false;
          $this->vdetalle_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($this->vdetalle[0][0]))
							{	


								for($i=0;$i<count($this->vdetalle );$i++)
								{
									$cant	=$this->vdetalle[$i][0];
									$codbp	=$this->vdetalle[$i][1];
									$desc	=$this->vdetalle[$i][2];
									$codest	=$this->vdetalle[$i][3];
									$base	=$this->vdetalle[$i][4];
									$codImp	=$this->vdetalle[$i][5];
									$Timp	=$this->vdetalle[$i][6];
									$Timp	=$Timp.".00";
									$eliva	=$this->vdetalle[$i][7];
									$eldesc	=$this->vdetalle[$i][8];
									$bas_br	=$this->vdetalle[$i][9];
									$vidprod=$this->vdetalle[$i][10]; 
									$tot	=$base+$eliva;
									$tot	=strval ($tot);
									$valun	=round(($base/$cant), 2);
									$sec=$i+1;
									$sec=strval($sec);


									$factDetalle[$i] = new FacturaDetalle();
									$factDetalle[$i]->cantidadPorEmpaque = "1";
									$factDetalle[$i]->cantidadReal = $cant;
									$factDetalle[$i]->cantidadRealUnidadMedida = "WSD"; 
									$factDetalle[$i]->cantidadUnidades = $cant;
									$factDetalle[$i]->codigoProducto = $codbp;
									$factDetalle[$i]->descripcion = $desc;
									$factDetalle[$i]->descripcionTecnica = $desc;
									$factDetalle[$i]->estandarCodigo = "999";
									$factDetalle[$i]->estandarCodigoProducto = $codest;


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

									 
      $nm_select = "select t.documento,t.dv,t.tipo_documento from productos p inner join terceros t on p.idpro1=t.idtercero where p.idprod='".$vidprod."' and p.tipo_producto='RE'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vCodMan = array();
      $this->vcodman = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vCodMan[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vcodman[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vCodMan = false;
          $this->vCodMan_erro = $this->Db->ErrorMsg();
          $this->vcodman = false;
          $this->vcodman_erro = $this->Db->ErrorMsg();
      } 
;

									if(isset($this->vcodman[0][0]))
									{
										$vid_mandatorio = $this->vcodman[0][0];
										$vdv_mandatorio = $this->vcodman[0][1];
										$vid_tipo       = $this->vcodman[0][2];

										$factDetalle[$i]->mandatorioNumeroIdentificacion   = $vid_mandatorio;
										$factDetalle[$i]->mandatorioNumeroIdentificacionDV = $vdv_mandatorio;
										$factDetalle[$i]->mandatorioTipoIdentificacion     = $vid_tipo;

										$vtotalingresosparaterceros += $tot;
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


									$impTot[$i] = new ImpuestosTotales;
									$impTot[$i]->codigoTOTALImp = $codImp;
									$impTot[$i]->montoTotal = $eliva;

									$factDetalle[$i]->impuestosTotales[0] = $impTot[$i];

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

							$vfechaemision     = $vfechaven.date(' H:i:s');
							$vfechaemision     = date_create($vfechaemision);
							$vfechaemision     = date_format($vfechaemision,'Y-m-d H:i:s');	

							$factura->fechaEmision = $vfechaemision;

							if($vcredito==1)
							{
								$lafechadevencimiento	 = $vfechavenc;
								$lafechadevencimiento	 = date_create($lafechadevencimiento);
								$lafechadevencimiento	 = date_format($lafechadevencimiento, 'Y-m-d');

								$factura->fechaVencimiento = $lafechadevencimiento;
							}





							 
      $nm_select = "select sum(valorpar-(descuento+iva)) as base, (if(iv.tipo_impuesto='CONSUMO','02','01')) as codigoimpuesto, iv.trifa as porcentaje, sum(iva) as iva from detalleventa d inner join productos p on d.idpro=p.idprod inner join iva iv on p.idiva=iv.idiva where numfac='".$vidfacven."' group by iv.tipo_impuesto,iv.trifa"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_impfac = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_impfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_impfac = false;
          $this->dt_impfac_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($this->dt_impfac[0][0]))
							{

								for($t=0;$t<count($this->dt_impfac );$t++)
								{

									$base		=$this->dt_impfac[$t][0];
									$base		=strval($base);
									$codImp		=$this->dt_impfac[$t][1];
									$codImp		=strval($codImp);
									$Timp		=$this->dt_impfac[$t][2];
									$Timp		=$Timp.".00";
									$eliva		=$this->dt_impfac[$t][3];

									$objImpGen[$t] = new FacturaImpuestos;

									$objImpGen[$t]->baseImponibleTOTALImp = $base;
									$objImpGen[$t]->codigoTOTALImp = $codImp;
									$objImpGen[$t]->controlInterno = "";
									$objImpGen[$t]->porcentajeTOTALImp = $Timp;
									$objImpGen[$t]->unidadMedida = "";
									$objImpGen[$t]->unidadMedidaTributo = "";
									$objImpGen[$t]->valorTOTALImp = $eliva;
									$objImpGen[$t]->valorTributoUnidad = "0.00";

									$factura->impuestosGenerales[$t] = $objImpGen[$t];

								}
							}

							 
      $nm_select = "select (if(iv.tipo_impuesto='CONSUMO','02','01')) as codigoimpuesto, sum(iva) as iva, sum(valorpar-(descuento+iva)) as base from detalleventa d inner join productos p on d.idpro=p.idprod inner join iva iv on p.idiva=iv.idiva where numfac='".$vidfacven."' group by iv.tipo_impuesto"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_impTfac = array();
      $this->dt_imptfac = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_impTfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dt_imptfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_impTfac = false;
          $this->dt_impTfac_erro = $this->Db->ErrorMsg();
          $this->dt_imptfac = false;
          $this->dt_imptfac_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($this->dt_imptfac[0][0]))
							{
								$codImp		=$this->dt_imptfac[0][0];
								$codImp		=strval($codImp);
								$eliva		=$this->dt_imptfac[0][1];
								$base		=$this->dt_imptfac[0][2];
								$tot		=$base+$eliva;


								$impTot[$i] = new ImpuestosTotales;
								$impTot[$i]->codigoTOTALImp = $codImp;
								$impTot[$i]->montoTotal = $eliva;
							}


							 
      $nm_select = "SELECT count(*) from detalleventa where numfac='".$vidfacven."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont = array();
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
                        $this->ds_cont[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont = false;
          $this->ds_cont_erro = $this->Db->ErrorMsg();
      } 
;
							if(isset($this->ds_cont[0][0]))
							{
								$totalitems=$this->ds_cont[0][0];
							}
							else
							{
								$totalitems='1';
							}


							$factura->impuestosTotales[0] = $impTot[$i];

							$vultimopago    = "";
							$vnumeroatrasos = 0;
							$vsaldoatrasos  = 0;
							$vtotalapagar   = 0;
							$vidcontra      = 0;
							$vfechacorte    = "";
							$vfechalimite   = "";

							$vsql = "select id_contrato from terceros_contratos_factura where factura='".$vidfacven."' limit 1";
							 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vIdContrato = array();
      $this->vidcontrato = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vIdContrato[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vidcontrato[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vIdContrato = false;
          $this->vIdContrato_erro = $this->Db->ErrorMsg();
          $this->vidcontrato = false;
          $this->vidcontrato_erro = $this->Db->ErrorMsg();
      } 
;
							if(isset($this->vidcontrato[0][0]))
							{
								$vidcontra = $this->vidcontrato[0][0];
							}

							if($vidcontra>0)
							{
								$vsql = "select fecha_ultimopago from terceros_contratos where id_ter_cont='".$vidcontra."'";
								 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vFechUlt = array();
      $this->vfechult = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vFechUlt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vfechult[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vFechUlt = false;
          $this->vFechUlt_erro = $this->Db->ErrorMsg();
          $this->vfechult = false;
          $this->vfechult_erro = $this->Db->ErrorMsg();
      } 
;
								if(isset($this->vfechult[0][0]))
								{
									$vultimopago = $this->vfechult[0][0];
								}

								$vsql = "select count(*) from terceros_contratos_factura where id_contrato='".$vidcontra."' and deperiodo='SI' and saldo>0 and factura<>'".$vidfacven."'";
								 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vAtrasos = array();
      $this->vatrasos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vAtrasos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vatrasos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vAtrasos = false;
          $this->vAtrasos_erro = $this->Db->ErrorMsg();
          $this->vatrasos = false;
          $this->vatrasos_erro = $this->Db->ErrorMsg();
      } 
;
								if(isset($this->vatrasos[0][0]))
								{
									$vnumeroatrasos = $this->vatrasos[0][0];
								}

								$vsql = "select sum(saldo) from terceros_contratos_factura where id_contrato='".$vidcontra."' and deperiodo='SI' and saldo>0 and factura<>'".$vidfacven."'";
								 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vAtrasosSal = array();
      $this->vatrasossal = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vAtrasosSal[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vatrasossal[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vAtrasosSal = false;
          $this->vAtrasosSal_erro = $this->Db->ErrorMsg();
          $this->vatrasossal = false;
          $this->vatrasossal_erro = $this->Db->ErrorMsg();
      } 
;
								if(isset($this->vatrasossal[0][0]))
								{
									$vsaldoatrasos  = $this->vatrasossal[0][0];
								}
								
								$vsql = "select fecha_limitepago, fecha_corte from terceros_contratos where id_ter_cont='".$vidcontra."'";
								 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vFinicioFcorte = array();
      $this->vfiniciofcorte = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vFinicioFcorte[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vfiniciofcorte[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vFinicioFcorte = false;
          $this->vFinicioFcorte_erro = $this->Db->ErrorMsg();
          $this->vfiniciofcorte = false;
          $this->vfiniciofcorte_erro = $this->Db->ErrorMsg();
      } 
;
								if(isset($this->vfiniciofcorte[0][0]))
								{
									$vfechalimite = $this->vfiniciofcorte[0][0];
									$vfechalimite = date_create($vfechalimite);
									$vfechalimite = date_format($vfechalimite,"d-m-Y");
									
									$vfechacorte  = $this->vfiniciofcorte[0][1];
									$vfechacorte  = date_create($vfechacorte);
									$vfechacorte  = date_format($vfechacorte,"d-m-Y");
								}
							}

							$vtotalapagar   = $vsaldoatrasos + $tot;

							if(!empty($vobserv))
							{
								$vobs->string[0] = $vobserv;
								if($vtotalingresosparaterceros>0)
								{
									$vobs->string[1] = "Total ingresos para terceros: $".number_format($vtotalingresosparaterceros);
									$vobs->string[2] = "Último pago: ".$vultimopago;
									$vobs->string[3] = "Número de atrasos: ".$vnumeroatrasos;
									$vobs->string[4] = "Saldo atrasos: $".number_format($vsaldoatrasos);
									$vobs->string[5] = "<b>TOTAL A PAGAR: $".number_format($vtotalapagar)."</b>";
									$vobs->string[6] = "Número usuario: ".$vnumerocontrato;
									$vobs->string[7] = "Fecha límite de pago: ".$vfechalimite." - fecha corte: ".$vfechacorte;
								}
								else
								{
									$vobs->string[1] = "Último pago: ".$vultimopago;
									$vobs->string[2] = "Número de atrasos: ".$vnumeroatrasos;
									$vobs->string[3] = "Saldo atrasos: $".number_format($vsaldoatrasos);
									$vobs->string[4] = "<b>TOTAL A PAGAR: $".number_format($vtotalapagar)."</b>";
									$vobs->string[5] = "Número usuario: ".$vnumerocontrato;
									$vobs->string[6] = "Fecha límite de pago: ".$vfechalimite." - fecha corte: ".$vfechacorte;
								}
							}
							else
							{
								if($vtotalingresosparaterceros>0)
								{
									$vobs->string[0] = "Total ingresos para terceros: $".number_format($vtotalingresosparaterceros);
									$vobs->string[1] = "Último pago: ".$vultimopago;
									$vobs->string[2] = "Número de atrasos: ".$vnumeroatrasos;
									$vobs->string[3] = "Saldo atrasos: $".number_format($vsaldoatrasos);
									$vobs->string[4] = "<b>TOTAL A PAGAR: $".number_format($vtotalapagar)."</b>";
									$vobs->string[5] = "Número usuario: ".$vnumerocontrato;
									$vobs->string[6] = "Fecha límite de pago: ".$vfechalimite." - fecha corte: ".$vfechacorte;
								}
								else
								{
									$vobs->string[0] = "Último pago: ".$vultimopago;
									$vobs->string[1] = "Número de atrasos: ".$vnumeroatrasos;
									$vobs->string[2] = "Saldo atrasos: $".number_format($vsaldoatrasos);
									$vobs->string[3] = "<b>TOTAL A PAGAR: $".number_format($vtotalapagar)."</b>";
									$vobs->string[4] = "Número usuario: ".$vnumerocontrato;
									$vobs->string[5] = "Fecha límite de pago: ".$vfechalimite." - fecha corte: ".$vfechacorte;
								}
							}

							if(isset($vobs->string[0]))
							{
								$factura->informacionAdicional = $vobs;
							}

							if($vcredito==1)
							{
								$pagos = new MediosDePago();
								$pagos->medioPago = "ZZZ";
								$pagos->metodoDePago = "2";
								$pagos->numeroDeReferencia = "01";
								$pagos->fechaDeVencimiento = $lafechadevencimiento;
							}
							else
							{
								$pagos = new MediosDePago();
								$pagos->medioPago = "ZZZ";
								$pagos->metodoDePago = "1";
								$pagos->numeroDeReferencia = "01";	
							}

							$factura->mediosDePago[0] = $pagos;

							$factura->moneda = "COP";
							$factura->redondeoAplicado = "0.00"	;
							$factura->rangoNumeracion = $vrango;

							$factura->tipoOperacion = "10";
							$factura->totalBaseImponible = $base;
							$factura->totalBrutoConImpuesto = $tot;
							$factura->totalMonto =$tot;
							$factura->totalProductos=$totalitems;
							$factura->totalSinImpuestos=$base;


							$factura->tipoDocumento="01";

							if ($enviarAdjunto == "TRUE")
							{
								$adjuntos="1";
							}
							else
							{
								$adjuntos="0";
							}


							$params = array(
								'tokenEmpresa' =>  $TokenEnterprise,
								'tokenPassword' =>$TokenAutorizacion,
								'factura' => $factura ,
								'adjuntos' => $adjuntos);


							$resultado = $WebService->enviar($vServidor,$options,$params);

							$vmensaje .= "Resultado de la Emisión\n";
							if($resultado["codigo"]==200 or $resultado["codigo"]==201)
							{
								$vmensaje .=  "La factura: ".$vPref."-".$vconsecutivo." se ha enviado con éxito!\n";

								error_reporting(E_ERROR);
								$WebService2 = new WebService();
								$options2 = array('exceptions' => true, 'trace' => true);

								$params2 = array (
									'tokenEmpresa'	=>$TokenEnterprise,
									'tokenPassword'	=>$TokenAutorizacion,
									'documento'		=>$vPref.$vconsecutivo);

								$descargas = $WebService2->Descargas($vServidor,$options2,$params2,'pdf');

								if($descargas["codigo"]==200 or $descargas["codigo"]==201)
								{
									$decoded 	= $descargas["documento"];
									$decoded	= strval($decoded);
									$vcufe		= $resultado["cufe"];
									$vcufe		=  strval($vcufe);
									$vestado	= $resultado["codigo"];
									$vestado	=  strval($vestado);
									$vavisos	=  implode(";", $resultado);
									$vqr        = strval($resultado["qr"]);
									$vfechavalidacion = $resultado["fechaRespuesta"];
									$vfechavalidacion = substr($vfechavalidacion, 0, 18);

									$sql="UPDATE facturaven_contratos SET cufe = '".$vcufe."', enlacepdf='".$decoded."', estado='".$vestado."', avisos='".$vavisos."',qr_base64='".$vqr."',fecha_validacion='".$vfechavalidacion."',enviada='SI',periodo=MONTH(fechaven),anio=YEAR(fechaven) WHERE idfacven='".$vidfacven."'";
									
     $nm_select = $sql; 
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
								$vavisos =  implode(";", $resultado);
								$sql="UPDATE facturaven_contratos SET avisos='".$vavisos."', enviada='PT' WHERE idfacven='".$vidfacven."'";
								
     $nm_select = $sql; 
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

								if($resultado["codigo"]==101)
								{
									$vmensaje .= "La factura: ".$vPref."-".$vconsecutivo." no se puede enviar porque ya ha sido enviada.\n";

								}
								else
								{
									print_r("Código: " .$resultado["codigo"] ."</br>Mensaje:  " .$resultado["mensaje"] ."</br>Fecha de Respuesta:  " .$resultado["fechaRespuesta"] ."</br>Mensaje Validación:  " );
									for($i = 0; $i < $max;$i++)
									{
										print_r("</br>" .$resultado["mensajesValidacion"]->string[$i]  );
									}

									echo "<br><br>";
									print_r($resultado);
								}
							}
						}

						error_DC:
						;
					}
				}
			}
			else
			{
				$vmensaje .=  "EL DOCUMENTO NO ES FACTURA DE FACTURACIÓN ELECTRÓNICA!\n";
			}
		}
	}
	echo $vmensaje;
$_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
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
                  $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos'][substr($val, 1, -1)];
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
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../")
      {
          echo "<SCRIPT language=\"javascript\">";
          if (strtolower($target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
              echo "</SCRIPT>";
              return;
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
              echo "</SCRIPT>";
              exit;
          }
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
           if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['embutida_form_full']) || (isset($this->grid_emb_form_full) && $this->grid_emb_form_full))
           {
              $this->redir_modal = "$(function() { parent.tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
           }
           else
           {
              $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
           }
          return;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['iframe_print']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['iframe_print'] )
      {
          $target = "_parent";
      }
      if (!isset($this->SC_redir_btn) || !$this->SC_redir_btn)
      {
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
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0," />
<?php
}
?>
       <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
       <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
       <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
       <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
       <META http-equiv="Pragma" content="no-cache"/>
      </HEAD>
      <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
      <BODY>
   <?php
      }
   ?>
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
      <SCRIPT type="text/javascript">
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
   <?php
      if (!isset($this->SC_redir_btn) || !$this->SC_redir_btn)
      {
   ?>
      </BODY>
      </HTML>
   <?php
      }
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
  function close_emb()
  {
      if ($this->Db)
      {
          $this->Db->Close(); 
      }
  }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode("_VLS_", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          $tmp_cmd = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_fast'] = "";
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig'])) 
          {
              $tmp_cmd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig']; 
          }
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_filtro'])) 
          {
              if (!empty($tmp_cmd)) 
              {
                  $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_filtro'] . ")"; 
              }
              else
              {
                  $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_filtro'] . ")"; 
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq'] = $tmp_cmd;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['fast_search']);
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_fast'] = $comando;
      $tmp_cmd = "";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig'])) 
      {
          $tmp_cmd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_orig']; 
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_filtro'])) 
      {
          if (!empty($tmp_cmd)) 
          {
              $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_filtro'] . ")"; 
          }
          else
          {
              $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq_filtro'] . ")"; 
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['where_pesq'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['fast_search'][0] = $in_fields;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['fast_search'][2] = $sv_data;
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
      $nm_numeric[] = "idfacven";$nm_numeric[] = "numfacven";$nm_numeric[] = "credito";$nm_numeric[] = "idcli";$nm_numeric[] = "subtotal";$nm_numeric[] = "valoriva";$nm_numeric[] = "total";$nm_numeric[] = "asentada";$nm_numeric[] = "saldo";$nm_numeric[] = "adicional";$nm_numeric[] = "adicional2";$nm_numeric[] = "adicional3";$nm_numeric[] = "resolucion";$nm_numeric[] = "vendedor";$nm_numeric[] = "usuario_crea";$nm_numeric[] = "banco";$nm_numeric[] = "dias_decredito";$nm_numeric[] = "periodo";$nm_numeric[] = "anio";$nm_numeric[] = "numcontrato";$nm_numeric[] = "base_iva_19";$nm_numeric[] = "valor_iva_19";$nm_numeric[] = "base_iva_5";$nm_numeric[] = "valor_iva_5";$nm_numeric[] = "excento";$nm_numeric[] = "ing_terceros";$nm_numeric[] = "tiene_nota";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['decimal_db'] == ".")
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
      $Nm_datas['fechaven'] = "date";$Nm_datas['fechavenc'] = "date";$Nm_datas['creado'] = "datetime";$Nm_datas['editado'] = "datetime";$Nm_datas['inicio'] = "datetime";$Nm_datas['fin'] = "datetime";$Nm_datas['fecha_validacion'] = "datetime";
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
      if (isset($Nm_datas[$campo_join]) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_sep_date']))
      {
          $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_sep_date'];
          $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['SC_sep_date1'];
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
  function html_doc_word($nm_arquivo_doc_word, $nmgp_password)
  {
      global $nm_url_saida;
      $Word_password = "";
      if ($this->Ini->Export_zip || $Word_password != "")
      { 
          $Parm_pass  = ($Word_password != "") ? " -p" : "";
          $Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file'], ".");
          if ($Pos !== false) {
              $Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file'], 0, $Pos);
          }
          $Arq_zip .= ".zip";
          $Arq_doc = $nm_arquivo_doc_word;
          $Pos = strrpos($nm_arquivo_doc_word, ".");
          if ($Pos !== false) {
              $Arq_doc = substr($nm_arquivo_doc_word, 0, $Pos);
          }
          $Arq_doc  .= ".zip";
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file'], ' ')) ? " \"" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file'] . "\"" :  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file'];
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
               unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file']);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file'] = $Arq_zip;
               $nm_arquivo_doc_word = $Arq_doc;
          } 
      } 
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos']['word_file']);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($nm_arquivo_doc_word);
          $Temp = ob_get_clean();
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      if (strpos(" " . $this->Ini->SC_module_export, "grid") !== false || strpos(" " . $this->Ini->SC_module_export, "resume") !== false)
      {
          $path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos'][$path_doc_md5][1] = substr($nm_arquivo_doc_word, 1);
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp'] . "/");
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
 <TITLE>Facturas de venta contrato :: Doc</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
   <link rel="stylesheet" type="text/css" href="../_lib/lib/css/nm_export_mobile.css" /> 
<?php
}
$path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_doc_word);
$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
$_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos'][$path_doc_md5][1] = substr($nm_arquivo_doc_word, 1);
?>
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
<form name="Fdown" method="get" action="grid_facturaven_contratos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_facturaven_contratos"> 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_html;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_facturaven_contratos'][$path_doc_md5][1] = substr($nm_arquivo_html, 1);
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp'] . "/");
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
   if (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['sc_process_barr'])) {
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
   SC_dir_app_ini('FACILWEBv_2022');
   $_SESSION['scriptcase']['grid_facturaven_contratos']['contr_erro'] = 'off';
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
            nm_limpa_str_grid_facturaven_contratos($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            nm_protect_num_grid_facturaven_contratos($nmgp_var, $nmgp_val);
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
            nm_limpa_str_grid_facturaven_contratos($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            nm_protect_num_grid_facturaven_contratos($nmgp_var, $nmgp_val);
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
       if (isset($_COOKIE['sc_apl_default_FACILWEBv_2022'])) {
           $apl_def = explode(",", $_COOKIE['sc_apl_default_FACILWEBv_2022']);
       }
       elseif (is_file($root . $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv_2022.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['grid_facturaven_contratos']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv_2022.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "grid_facturaven_contratos") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_FACILWEBv_2022'])) {
               $_SESSION['scriptcase']['grid_facturaven_contratos']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_FACILWEBv_2022'];
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
   if (isset($ganio)) 
   {
       $_SESSION['ganio'] = $ganio;
   }
   if (isset($gperiodo)) 
   {
       $_SESSION['gperiodo'] = $gperiodo;
   }
   if (isset($gcodzona)) 
   {
       $_SESSION['gcodzona'] = $gcodzona;
   }
   if (isset($gresolucion)) 
   {
       $_SESSION['gresolucion'] = $gresolucion;
   }
   if (isset($ganio2)) 
   {
       $_SESSION['ganio2'] = $ganio2;
   }
   if (isset($gperiodo2)) 
   {
       $_SESSION['gperiodo2'] = $gperiodo2;
   }
   if (isset($gcodzona2)) 
   {
       $_SESSION['gcodzona2'] = $gcodzona2;
   }
   if (isset($gcontador_grid_fe)) 
   {
       $_SESSION['gcontador_grid_fe'] = $gcontador_grid_fe;
   }
   if (isset($gbd_seleccionada)) 
   {
       $_SESSION['gbd_seleccionada'] = $gbd_seleccionada;
   }
   if (isset($gidtercero)) 
   {
       $_SESSION['gidtercero'] = $gidtercero;
   }
   if (isset($gIdfac)) 
   {
       $_SESSION['gIdfac'] = $gIdfac;
   }
   if (isset($gproveedor)) 
   {
       $_SESSION['gproveedor'] = $gproveedor;
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
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_pai']))
   {
       $apl_pai = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_pai'];
       if (isset($_SESSION['sc_session'][$script_case_init][$apl_pai]['embutida_filho']))
       {
           foreach ($_SESSION['sc_session'][$script_case_init][$apl_pai]['embutida_filho'] as $init_filho)
           {
               if (isset($_SESSION['sc_session'][$init_filho]['grid_facturaven_contratos']['master_pai']) && $_SESSION['sc_session'][$init_filho]['grid_facturaven_contratos']['master_pai'] == $script_case_init)
               {
                   $script_case_init = $init_filho;
                   break;
               }
           }
       }
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form'] && !isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['master_pai']))
   {
       $SC_init_ant = $script_case_init;
       $script_case_init = rand(2, 10000);
       if (isset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_contratos']['embutida_pai']))
       {
           $_SESSION['sc_session'][$SC_init_ant][$_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_contratos']['embutida_pai']]['embutida_filho'][] = $script_case_init;
       }
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['master_pai'] = $SC_init_ant;
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['master_pai']))
   {
       $SC_init_ant = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['master_pai'];
       if (!isset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_contratos']['embutida_form_parms']))
       {
           $_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_contratos']['embutida_form_parms'] = "";
       }
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_parms'] = $_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_contratos']['embutida_form_parms'];
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form'] = true;
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_full'] = (isset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_contratos']['embutida_form_full'])) ? $_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_contratos']['embutida_form_full'] : false;
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['reg_start'] = "";
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] = "inicio";
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_contratos']['embutida_form']);
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_facturaven_contratos']['embutida_form_parms']);
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_parms'])) 
   {
       if (!empty($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_parms'])) 
       {
           $nmgp_parms = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_parms'];
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_parms'] = "";
       }
   }
   elseif (isset($script_case_init))
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form']);
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_full']);
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_parms']);
   }
   if (!isset($nmgp_opcao) || !isset($script_case_init) || ((!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida']) && $nmgp_opcao != "formphp"))
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
                    nm_limpa_str_grid_facturaven_contratos($cadapar[1]);
                    nm_protect_num_grid_facturaven_contratos($cadapar[0], $cadapar[1]);
                    if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                    $Tmp_par   = $cadapar[0];
                    $$Tmp_par = $cadapar[1];
                }
           }
           if (isset($ganio)) 
           {
               $_SESSION['ganio'] = $ganio;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["ganio"]);
           }
           if (isset($gperiodo)) 
           {
               $_SESSION['gperiodo'] = $gperiodo;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gperiodo"]);
           }
           if (isset($gcodzona)) 
           {
               $_SESSION['gcodzona'] = $gcodzona;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gcodzona"]);
           }
           if (isset($gresolucion)) 
           {
               $_SESSION['gresolucion'] = $gresolucion;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gresolucion"]);
           }
           if (isset($ganio2)) 
           {
               $_SESSION['ganio2'] = $ganio2;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["ganio2"]);
           }
           if (isset($gperiodo2)) 
           {
               $_SESSION['gperiodo2'] = $gperiodo2;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gperiodo2"]);
           }
           if (isset($gcodzona2)) 
           {
               $_SESSION['gcodzona2'] = $gcodzona2;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gcodzona2"]);
           }
           if (isset($gcontador_grid_fe)) 
           {
               $_SESSION['gcontador_grid_fe'] = $gcontador_grid_fe;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gcontador_grid_fe"]);
           }
           if (isset($gbd_seleccionada)) 
           {
               $_SESSION['gbd_seleccionada'] = $gbd_seleccionada;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gbd_seleccionada"]);
           }
           if (isset($gidtercero)) 
           {
               $_SESSION['gidtercero'] = $gidtercero;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gidtercero"]);
           }
           if (!isset($gIdfac) && isset($gidfac)) 
           {
               $_SESSION["gIdfac"] = $gidfac;
           }
           if (isset($gIdfac)) 
           {
               $_SESSION['gIdfac'] = $gIdfac;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gIdfac"]);
           }
           if (isset($gproveedor)) 
           {
               $_SESSION['gproveedor'] = $gproveedor;
               nm_limpa_str_grid_facturaven_contratos($_SESSION["gproveedor"]);
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
               unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']);
               $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['b_sair'] = false;
           }   
       } 
   } 
   $ini_embutida = "";
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'])
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
        if (!isset($_SESSION['sc_session'][$ini_embutida]['grid_facturaven_contratos']['embutida']))
        { 
           $_SESSION['sc_session'][$ini_embutida]['grid_facturaven_contratos']['embutida'] = false;
        }
        if (!$_SESSION['sc_session'][$ini_embutida]['grid_facturaven_contratos']['embutida'])
        { 
           $script_case_init = $ini_embutida;
        }
   }
   if (isset($_SESSION['scriptcase']['grid_facturaven_contratos']['protect_modal']) && !empty($_SESSION['scriptcase']['grid_facturaven_contratos']['protect_modal']))
   {
       $script_case_init = $_SESSION['scriptcase']['grid_facturaven_contratos']['protect_modal'];
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_emb    = false;
   $salva_iframe = false;
   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['doc_word'] = false;
   $_SESSION['scriptcase']['saida_word'] = false;
   if (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['skip_charts']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['skip_charts'] = false;
   }
   if (isset($_REQUEST['sc_create_charts']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['skip_charts'] = 'N' == $_REQUEST['sc_create_charts'];
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['iframe_menu']);
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida']))
   {
       $salva_emb = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "grid_facturaven_contratos";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'grid_facturaven_contratos' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['iframe_menu'] = $salva_iframe;
   }
   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'] = $salva_emb;

   if (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '/grid_facturaven_contratos/'))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['initialize'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['initialize'] = false;
   }
   if ($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['initialize'])
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['tot_geral']);
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['contr_total_geral'] = "NAO";
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($nmgp_opcao) && $nmgp_opcao == "busca" && isset($nmgp_orig_pesq))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['orig_pesq'] = $nmgp_orig_pesq;
   }
   if (!isset($nmgp_opcao) || empty($nmgp_opcao) || $nmgp_opcao == "grid" && (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['b_sair'])))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['b_sair'] = true;
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'grid_facturaven_contratos')
   {
       $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/grid_facturaven_contratos_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['scriptcase']['sc_tp_saida']))  ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
   $salva_url_saida  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
   if (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_facturaven_contratos']))
   { 
       return;
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'] && $nmgp_opcao != "formphp")
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
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_change_lang'] = true;
           unset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['tot_geral']);
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['contr_total_geral'] = "NAO";
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
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['num_css'] = rand(0, 1000);
       } 
       if ($nmgp_opcao == "volta_grid")  
       { 
           $nmgp_opcao = "igual";  
       }   
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] = $nmgp_opcao ;  
       }   
       if (isset($_POST["ganio"])) 
       {
           $_SESSION["ganio"] = $_POST["ganio"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["ganio"]);
       }
       if (isset($_GET["ganio"])) 
       {
           $_SESSION["ganio"] = $_GET["ganio"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["ganio"]);
       }
       if (!isset($_SESSION["ganio"])) 
       {
           $_SESSION["ganio"] = "";
       }
       if (isset($_POST["gperiodo"])) 
       {
           $_SESSION["gperiodo"] = $_POST["gperiodo"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gperiodo"]);
       }
       if (isset($_GET["gperiodo"])) 
       {
           $_SESSION["gperiodo"] = $_GET["gperiodo"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gperiodo"]);
       }
       if (!isset($_SESSION["gperiodo"])) 
       {
           $_SESSION["gperiodo"] = "";
       }
       if (isset($_POST["gcodzona"])) 
       {
           $_SESSION["gcodzona"] = $_POST["gcodzona"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gcodzona"]);
       }
       if (isset($_GET["gcodzona"])) 
       {
           $_SESSION["gcodzona"] = $_GET["gcodzona"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gcodzona"]);
       }
       if (!isset($_SESSION["gcodzona"])) 
       {
           $_SESSION["gcodzona"] = "";
       }
       if (isset($_POST["gresolucion"])) 
       {
           $_SESSION["gresolucion"] = $_POST["gresolucion"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gresolucion"]);
       }
       if (isset($_GET["gresolucion"])) 
       {
           $_SESSION["gresolucion"] = $_GET["gresolucion"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gresolucion"]);
       }
       if (!isset($_SESSION["gresolucion"])) 
       {
           $_SESSION["gresolucion"] = "";
       }
       if (isset($_POST["ganio2"])) 
       {
           $_SESSION["ganio2"] = $_POST["ganio2"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["ganio2"]);
       }
       if (isset($_GET["ganio2"])) 
       {
           $_SESSION["ganio2"] = $_GET["ganio2"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["ganio2"]);
       }
       if (!isset($_SESSION["ganio2"])) 
       {
           $_SESSION["ganio2"] = "";
       }
       if (isset($_POST["gperiodo2"])) 
       {
           $_SESSION["gperiodo2"] = $_POST["gperiodo2"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gperiodo2"]);
       }
       if (isset($_GET["gperiodo2"])) 
       {
           $_SESSION["gperiodo2"] = $_GET["gperiodo2"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gperiodo2"]);
       }
       if (!isset($_SESSION["gperiodo2"])) 
       {
           $_SESSION["gperiodo2"] = "";
       }
       if (isset($_POST["gcodzona2"])) 
       {
           $_SESSION["gcodzona2"] = $_POST["gcodzona2"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gcodzona2"]);
       }
       if (isset($_GET["gcodzona2"])) 
       {
           $_SESSION["gcodzona2"] = $_GET["gcodzona2"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gcodzona2"]);
       }
       if (!isset($_SESSION["gcodzona2"])) 
       {
           $_SESSION["gcodzona2"] = "";
       }
       if (isset($_POST["gcontador_grid_fe"])) 
       {
           $_SESSION["gcontador_grid_fe"] = $_POST["gcontador_grid_fe"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gcontador_grid_fe"]);
       }
       if (isset($_GET["gcontador_grid_fe"])) 
       {
           $_SESSION["gcontador_grid_fe"] = $_GET["gcontador_grid_fe"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gcontador_grid_fe"]);
       }
       if (!isset($_SESSION["gcontador_grid_fe"])) 
       {
           $_SESSION["gcontador_grid_fe"] = "";
       }
       if (isset($_POST["gbd_seleccionada"])) 
       {
           $_SESSION["gbd_seleccionada"] = $_POST["gbd_seleccionada"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gbd_seleccionada"]);
       }
       if (isset($_GET["gbd_seleccionada"])) 
       {
           $_SESSION["gbd_seleccionada"] = $_GET["gbd_seleccionada"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gbd_seleccionada"]);
       }
       if (!isset($_SESSION["gbd_seleccionada"])) 
       {
           $_SESSION["gbd_seleccionada"] = "";
       }
       if (isset($_POST["gidtercero"])) 
       {
           $_SESSION["gidtercero"] = $_POST["gidtercero"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gidtercero"]);
       }
       if (isset($_GET["gidtercero"])) 
       {
           $_SESSION["gidtercero"] = $_GET["gidtercero"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gidtercero"]);
       }
       if (!isset($_SESSION["gidtercero"])) 
       {
           $_SESSION["gidtercero"] = "";
       }
       if (isset($_POST["gIdfac"])) 
       {
           $_SESSION["gIdfac"] = $_POST["gIdfac"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gIdfac"]);
       }
       if (!isset($_POST["gIdfac"]) && isset($_POST["gidfac"])) 
       {
           $_SESSION["gIdfac"] = $_POST["gidfac"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gIdfac"]);
       }
       if (isset($_GET["gIdfac"])) 
       {
           $_SESSION["gIdfac"] = $_GET["gIdfac"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gIdfac"]);
       }
       if (!isset($_GET["gIdfac"]) && isset($_GET["gidfac"])) 
       {
           $_SESSION["gIdfac"] = $_GET["gidfac"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gIdfac"]);
       }
       if (!isset($_SESSION["gIdfac"])) 
       {
           $_SESSION["gIdfac"] = "";
       }
       if (isset($_POST["gproveedor"])) 
       {
           $_SESSION["gproveedor"] = $_POST["gproveedor"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gproveedor"]);
       }
       if (isset($_GET["gproveedor"])) 
       {
           $_SESSION["gproveedor"] = $_GET["gproveedor"];
           nm_limpa_str_grid_facturaven_contratos($_SESSION["gproveedor"]);
       }
       if (!isset($_SESSION["gproveedor"])) 
       {
           $_SESSION["gproveedor"] = "";
       }
       if (isset($nmgp_lig_edit_lapis)) 
       {
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['mostra_edit'] = $nmgp_lig_edit_lapis;
           unset($GLOBALS["nmgp_lig_edit_lapis"]) ;  
           if (isset($_SESSION['nmgp_lig_edit_lapis'])) 
           {
               unset($_SESSION['nmgp_lig_edit_lapis']);
           }
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan'] = true;
       }
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['volta_redirect_apl']))
       {
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['volta_redirect_tp'] = "";
           $nm_url_saida = "grid_facturaven_contratos_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan'])
           {
               if ($nmgp_url_saida == "modal")
               {
                   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_modal'] = true;
               }
               $nm_url_saida = "grid_facturaven_contratos_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['retorno_cons']  . "?script_case_init=" . NM_encode_input($script_case_init);  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida ; 
               } 
               $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
               $nm_url_saida = "grid_facturaven_contratos_fim.php"; 
               $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] != "pdf" ) 
       { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['scriptcase']['nm_sc_retorno']; 
            $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['menu_desenv'] = true;   
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
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['dado_psq_ret']  = $todo[2];
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['js_apos_busca'] = $nm_evt_ret_busca;
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opc_psq'] = true;   
           if (isset($nmgp_iframe_ret)) {
               $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['iframe_ret_cap'] = $nmgp_iframe_ret;
           }
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['psq_edit'] = 'N';   
           if (isset($nmgp_perm_edit)) {
               $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['psq_edit'] = $nmgp_perm_edit;
           }
       } 
       elseif (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opc_psq']))
       {
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opc_psq']  = false;   
           $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['psq_edit'] = 'N';   
       } 
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form'])
       {
           if (!isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_full']) || !$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida_form_full'])
           {
               $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['mostra_edit'] = "N";   
           } 
           $_SESSION['scriptcase']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $salva_url_saida;
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_grid_facturaven_contratos = new grid_facturaven_contratos_apl();

      if ('ajax_autocomp' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] = "busca";
          $contr_grid_facturaven_contratos->NM_ajax_flag = true;
          $contr_grid_facturaven_contratos->NM_ajax_opcao = $NM_ajax_opcao;
      }
      if ('ajax_filter_save' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] = "busca";
          $contr_grid_facturaven_contratos->NM_ajax_flag = true;
          $contr_grid_facturaven_contratos->NM_ajax_opcao = "ajax_filter_save";
      }
      if ('ajax_filter_delete' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] = "busca";
          $contr_grid_facturaven_contratos->NM_ajax_flag = true;
          $contr_grid_facturaven_contratos->NM_ajax_opcao = "ajax_filter_delete";
      }
      if ('ajax_filter_select' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] = "busca";
          $contr_grid_facturaven_contratos->NM_ajax_flag = true;
          $contr_grid_facturaven_contratos->NM_ajax_opcao = "ajax_filter_select";
      }
      if ('ajax_refresh_field' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['opcao'] = "busca";
          $contr_grid_facturaven_contratos->NM_ajax_flag = true;
          $contr_grid_facturaven_contratos->NM_ajax_opcao = "ajax_refresh_field";
      }
       $contr_grid_facturaven_contratos->controle();
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['grid_facturaven_contratos']['embutida'] && $nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_grid_facturaven_contratos = new grid_facturaven_contratos_apl();
       $contr_grid_facturaven_contratos->controle();
   } 
//
   function nm_limpa_str_grid_facturaven_contratos(&$str)
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
   function nm_protect_num_grid_facturaven_contratos($name, &$val)
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
       $Nm_numeric[] = "periodo";
       $Nm_numeric[] = "anio";
       $Nm_numeric[] = "numcontrato";
       $Nm_numeric[] = "base_iva_19";
       $Nm_numeric[] = "valor_iva_19";
       $Nm_numeric[] = "base_iva_5";
       $Nm_numeric[] = "valor_iva_5";
       $Nm_numeric[] = "excento";
       $Nm_numeric[] = "ing_terceros";
       $Nm_numeric[] = "tiene_nota";
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
   function grid_facturaven_contratos_pack_protect_string($sString)
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

    function grid_facturaven_contratos_pdf_progress_call($message, $Nm_lang, $flushBuffer = false) {
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
