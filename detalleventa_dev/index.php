<?php
//
   include_once('detalleventa_dev_session.php');
           include_once("../_lib/lib/php/fix.php");
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
       if (!function_exists("sc_check_mobile"))
       {
           include_once("../_lib/lib/php/nm_check_mobile.php");
       }
       $_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
       $_SESSION['scriptcase']['proc_mobile']   = $_SESSION['scriptcase']['device_mobile'];
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

   $_SESSION['scriptcase']['detalleventa_dev']['error_buffer'] = '';

   $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_cache']  = "";
   $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_doc']        = "";
   $NM_dir_atual = getcwd();
   if (empty($NM_dir_atual))
   {
       $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
       $str_path_sys  = str_replace("\\", '/', $str_path_sys);
   }
   else
   {
       $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
       $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
   }
   //check publication with the prod
   $str_path_apl_url = $_SERVER['PHP_SELF'];
   $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
   $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
   $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
   $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
   $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
   //check prod
   if(empty($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check img
   if(empty($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imagens']))
   {
           /*check img*/$_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //check cache
   if(empty($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_cache']))
   {
           /*check cache*/$_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
   }
   //check doc
   if(empty($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_doc']))
   {
           /*check doc*/$_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
   }
   //end check publication with the prod
//
class detalleventa_dev_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_grupo_versao;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $cor_bg_table;
   var $border_grid;
   var $cor_bg_grid;
   var $cor_cab_grid;
   var $cor_borda;
   var $cor_txt_cab_grid;
   var $cab_fonte_tipo;
   var $cab_fonte_tamanho;
   var $rod_fonte_tipo;
   var $rod_fonte_tamanho;
   var $cor_rod_grid;
   var $cor_txt_rod_grid;
   var $cor_barra_nav;
   var $cor_titulo;
   var $cor_txt_titulo;
   var $titulo_fonte_tipo;
   var $titulo_fonte_tamanho;
   var $cor_grid_impar;
   var $cor_grid_par;
   var $cor_txt_grid;
   var $texto_fonte_tipo;
   var $texto_fonte_tamanho;
   var $cor_lin_grupo;
   var $cor_txt_grupo;
   var $grupo_fonte_tipo;
   var $grupo_fonte_tamanho;
   var $cor_lin_sub_tot;
   var $cor_txt_sub_tot;
   var $sub_tot_fonte_tipo;
   var $sub_tot_fonte_tamanho;
   var $cor_lin_tot;
   var $cor_txt_tot;
   var $tot_fonte_tipo;
   var $tot_fonte_tamanho;
   var $cor_link_cab;
   var $cor_link_dados;
   var $img_fun_pag;
   var $img_fun_cab;
   var $img_fun_rod;
   var $img_fun_tit;
   var $img_fun_gru;
   var $img_fun_tot;
   var $img_fun_sub;
   var $img_fun_imp;
   var $img_fun_par;
   var $root;
   var $server;
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
   var $str_schema_all;
   var $str_google_fonts;
   var $str_conf_reg;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
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
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_pages   = array();
   var $nm_page_names     = array();
   var $nm_page_blocks    = array();
   var $nm_block_page     = array();
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
   var $sc_lig_iframe = array();
   var $force_db_utf8 = false;
//
   function init()
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init;

      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
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
      $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "detalleventa_dev"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "FACILWEBv2"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake"; 
      $this->nm_script_type  = "PHP"; 
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20180801"; 
      $this->nm_hr_criacao   = "175942"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20220505"; 
      $this->nm_hr_ult_alt   = "111214"; 
      list($NM_usec, $NM_sec) = explode(" ", microtime()); 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0"; 
// 
      $this->border_grid           = ""; 
      $this->cor_bg_grid           = ""; 
      $this->cor_bg_table          = ""; 
      $this->cor_borda             = ""; 
      $this->cor_cab_grid          = ""; 
      $this->cor_txt_pag           = ""; 
      $this->cor_link_pag          = ""; 
      $this->pag_fonte_tipo        = ""; 
      $this->pag_fonte_tamanho     = ""; 
      $this->cor_txt_cab_grid      = ""; 
      $this->cab_fonte_tipo        = ""; 
      $this->cab_fonte_tamanho     = ""; 
      $this->rod_fonte_tipo        = ""; 
      $this->rod_fonte_tamanho     = ""; 
      $this->cor_rod_grid          = ""; 
      $this->cor_txt_rod_grid      = ""; 
      $this->cor_barra_nav         = ""; 
      $this->cor_titulo            = ""; 
      $this->cor_txt_titulo        = ""; 
      $this->titulo_fonte_tipo     = ""; 
      $this->titulo_fonte_tamanho  = ""; 
      $this->cor_grid_impar        = ""; 
      $this->cor_grid_par          = ""; 
      $this->cor_txt_grid          = ""; 
      $this->texto_fonte_tipo      = ""; 
      $this->texto_fonte_tamanho   = ""; 
      $this->cor_lin_grupo         = ""; 
      $this->cor_txt_grupo         = ""; 
      $this->grupo_fonte_tipo      = ""; 
      $this->grupo_fonte_tamanho   = ""; 
      $this->cor_lin_sub_tot       = ""; 
      $this->cor_txt_sub_tot       = ""; 
      $this->sub_tot_fonte_tipo    = ""; 
      $this->sub_tot_fonte_tamanho = ""; 
      $this->cor_lin_tot           = ""; 
      $this->cor_txt_tot           = ""; 
      $this->tot_fonte_tipo        = ""; 
      $this->tot_fonte_tamanho     = ""; 
      $this->cor_link_cab          = ""; 
      $this->cor_link_dados        = ""; 
      $this->img_fun_pag           = ""; 
      $this->img_fun_cab           = ""; 
      $this->img_fun_rod           = ""; 
      $this->img_fun_tit           = ""; 
      $this->img_fun_gru           = ""; 
      $this->img_fun_tot           = ""; 
      $this->img_fun_sub           = ""; 
      $this->img_fun_imp           = ""; 
      $this->img_fun_par           = ""; 
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
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
// 
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->path_prod       = $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imag_temp'];
      $this->path_cache      = $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_doc'];
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
      $this->str_schema_all  = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Rhino/Sc9_Rhino";
      $this->str_google_fonts  = isset($str_google_fonts)?$str_google_fonts:'';
      $this->server          = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->server_pdf      = $this->sc_protocolo . $this->server;
      $this->server          = "";
      $this->sc_protocolo    = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/detalleventa_dev';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php/";
      $this->url_lib_js      = $this->path_link . "_lib/lib/js/";
      $this->url_lib         = $this->path_link . '/_lib/';
      $this->url_third       = $this->path_prod . '/third/';
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";

      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      if (isset($_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['detalleventa_dev']['actual_lang']) || $_SESSION['scriptcase']['detalleventa_dev']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['detalleventa_dev']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_FACILWEBv2',$this->str_lang,'0','/');
      }
      global $inicial_detalleventa_dev;
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag) && $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag)
                  {
                      $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      detalleventa_dev_pack_ajax_response();
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
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1); 
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      $_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];

      asort($this->Nm_lang_conf_region);
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
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
      if (isset($_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_form.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scFormPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scFormBorder\">\r\n";
              $SS_cod_html .= "    <table width='100%' cellspacing=0 cellpadding=0><tr><td class=\"scFormDataOdd\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['detalleventa_dev']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_dyn_refresh_field" || $_POST['nmgp_opcao'] == "ajax_add_dyn_search" || $_POST['nmgp_opcao'] == "ajax_ch_bi_dyn_search"))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html) && isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
      {
          $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']['action']  = "./";
          $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']['target']  = "_self";
          $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']['metodo']  = "post";
          $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
          detalleventa_dev_pack_ajax_response();
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir']))
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
      if (-1 != version_compare(phpversion(), '5.0.0'))
      {
         $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph5/src";
      }
      else
      {
          $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph4/src";
      }
      $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      $_SESSION['scriptcase']['nm_root_cep']  = $this->root; 
      $_SESSION['scriptcase']['nm_path_cep']  = $this->path_cep; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan'] != 'detalleventa_dev')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["detalleventa_dev"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["detalleventa_dev"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      if (isset($this->sc_lig_iframe[$this->sc_lig_target[$sTmpTargetLink]]))
                      {
                          $this->sc_lig_iframe[$this->sc_lig_target[$sTmpTargetLink]] = $sTmpTargetWidget;
                      }
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php");
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod");
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib");
      if(function_exists('set_php_timezone'))  set_php_timezone('detalleventa_dev'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/fix.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_detalleventa_dev, $NM_run_iframe;
      if ((isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag) && $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['embutida_call']) || $NM_run_iframe == 1)
      {
           $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      }
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']) || empty($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1; 
      } 
      $this->Export_img_zip = false;;
      $this->Img_export_zip  = array();
      $this->regionalDefault();
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_access     = array("access", "ado_access", "ace_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress   = array("progress", "pdo_progress_odbc");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQNmDQBqHAvOVWJeDMvmVcFCH5FqHINUD9JmH9B/DSBeHuB/HgBeHEFiV5B3DoF7D9XsDuFaHANKV5BODMvmVcFKV5BmVoBqD9BsZkFGHArKHuJsDEBeHEFiDuFaDoXGD9JKZSFGHArYHQJeDMNODkBsDur/HMFaHQNwZkFGDSvmZMB/DErKDkXKDuFaHMX7HQJKDQJsZ1vCV5FGHuNOV9FeDWXCDoraD9XOZ1X7Z1BeD5F7DErKVkXeV5FaVoBiD9FYH9X7HABYHuFaHuNOZSrCH5FqDoXGHQJmZ1FUZ1BeV5B/DMzGHEJGH5F/DoraD9XsDQJsHIBeD5JwHuBYVIBODWFYDoJsD9BiZ1F7HABYD5BiDMzGHEFiDWFqZuBOHQXGH9FGHAveD5BOHuzGVcFeDWXCDoJsDcBwH9B/Z1rYHQJwDEBeDkXKHEFqHIF7D9FYDQJsHAvCVWJwHuBYDkBsHEFGVEFGD9XOZSBODSvOZMXGHgNOHEBUDWFGZuBOD9NmDQFaHAveD5NUHgNKDkBOV5FYHMBiHQBiZkBiDSvmZMBqHgBOHEJqDWX7HIJwDcXGZ9rqZ1zGVWBqDMBOVcB/HEFYHMJeHQBsZkFUZ1rYHQBOHgNKZSJ3H5FYHMFaHQJKZ9JeZ1BYHuBqDMBOVIBsDWFYHMFGHQXOVIJwD1rwV5FGDEBeHEXeH5X/DoF7HQNwDuBqDSvCVWBODMrYV9FeH5FqHMJeHQXOZ1FUZ1rYHuB/DMvCHENiDWFqHIXGHQXOZ9JeZ1BYHurqDMzGDkBsV5F/HIXGDcNmZ1FUZ1vOZMXGDMveHENiH5FYHMJeDcBiDuBOD1BeD5rqHuvmVcBOH5B7VoBqHQBiZ1BiDSNOHuFaHgvsHErCDWX7DoJsDcXGDQBOZ1BYHQJsDMNOV9FeV5FYHMFaHQXOZ1FUZ1rYHuFGHgBYHArCDWX7HIBqHQJKZ9JeZ1BYHuFUDMBYV9BUDWF/HIJsHQBsVIraD1rwV5FGDEBeHEXeH5X/DoF7D9NwZSX7D1BeV5raHuzGVcFKDWFaVENUD9JmZ1X7Z1BOD5FaDEvsVkXeDWX7DoJeHQXGZSFGHIrwVWXGHuBYZSJ3V5X7DoX7D9BiZ1F7Z1rYV5FGHgvCZSJGH5FYDoF7D9NwH9X7DSBYV5JeHuBYVcFKH5FqVoB/D9XOH9B/D1zGD5FaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7DoX7D9BsH9FaD1rwZMB/DMNKZSXeHEFqDoBOHQXGDuBqHAvOVWXGDMvOZSrCV5X/VoFGHQNmZkFUZ1vOZMB/HgBYHEFKV5B7DoBqHQBiDuBqHIrwHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHAvCD5BqHgveDkXKDWrGDoBOHQXODuBqHAvOV5XGDMvmVcFKV5BmVoBqD9BsZkFGHArKZMFaHgBeVkJ3HEFaZuJsD9FYH9BiHIrwVWJsHuNOVcFeDWXCDoJsDcBwH9B/Z1rYHQJwHgvsHErCDWFqHMXGHQNmH9BiHArYHQrqDMNOVcFeV5FGVoFaHQJmZkFGHIrwHQraHgvsZSJ3V5XCHMFGHQNmZ9rqHAveHQBODMvmVcB/DWF/HMFUHQXGZSBOHAN7HuJeDMrYHENiDWr/HMXGHQNwH9BiHArYHQF7DMvmVcFKV5BmVoBqD9BsZkFGHAvsZMJeHgvCDkXKDWBmZura";
      $this->prep_conect();
      if (!isset($_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['ordem_cmp'])) { 
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['ordem_cmp'] = ""; 
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['ordem_ord'] = ""; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan'] != 'detalleventa_dev')) 
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
   }
   function prep_conect()
   {
      $con_devel             =  (isset($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao']) && $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_perfil']) && $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['detalleventa_dev']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['detalleventa_dev']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'FACILWEBv2', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S");
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!$_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['embutida_form'] || !$_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['embutida_proc']) 
      {
          if (!isset($_SESSION['par_numfacventa'])) 
          {
              $this->nm_falta_var .= "par_numfacventa; ";
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
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
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
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
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
      if (isset($_SESSION['scriptcase']['oracle_type']))
      {
          $this->nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "detalleventaself"; 
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
          if (!$_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['sc_outra_jan'] != 'detalleventa_dev')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }

      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) && $this->force_db_utf8) {
          putenv('DB2CODEPAGE=1208');
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
// 
  function conectDB()
  {
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv2', 1, $this->force_db_utf8); 
      } 
      else 
      { 
         if (!isset($this->nm_con_persistente))
         {
            $this->nm_con_persistente = 'N';
         }
         if (!isset($this->nm_con_db2))
         {
            $this->nm_con_db2 = '';
         }
         if (!isset($this->nm_database_encoding))
         {
            $this->nm_database_encoding = '';
         }
         if ($this->force_db_utf8)
         {
            $this->nm_database_encoding = 'utf8';
         }
         if (!isset($this->nm_arr_db_extra_args))
         {
            $this->nm_arr_db_extra_args = array();
         }
         $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding, $this->nm_arr_db_extra_args); 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
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
          $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['decimal_db'] = "."; 
      } 
  }

  function setConnectionHash() {
    if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao'])) {
      list($connectionDbms, $connectionHost, $connectionUser, $connectionPassword, $connectionDatabase) = db_conect_devel($_SESSION['scriptcase']['detalleventa_dev']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv2', 1, $this->force_db_utf8);
    }
    else {
      $connectionDbms     = $this->nm_tpbanco;
      $connectionHost     = $this->nm_servidor;
      $connectionUser     = $this->nm_usuario;
      $connectionPassword = $this->nm_senha;
      $connectionDatabase = $this->nm_banco;
    }

    $this->connectionHash = "{$connectionDbms}_SC_" . md5("{$connectionHost}_SC_{$connectionUser}_SC_{$connectionPassword}_SC_{$connectionDatabase}");
  } // setConnectionHash
// 

   function regionalDefault($sConfReg = '')
   {
      if ('' == $sConfReg)
      {
         $sConfReg = $this->str_conf_reg;
      }

      $_SESSION['scriptcase']['reg_conf']['date_format']           = (isset($this->Nm_conf_reg[$sConfReg]['data_format']))              ?  $this->Nm_conf_reg[$sConfReg]['data_format']                  : "ddmmyyyy";
      $_SESSION['scriptcase']['reg_conf']['date_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['data_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['data_sep']                     : "/";
      $_SESSION['scriptcase']['reg_conf']['date_week_ini']         = (isset($this->Nm_conf_reg[$sConfReg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$sConfReg]['prim_dia_sema']                : "SU";
      $_SESSION['scriptcase']['reg_conf']['time_format']           = (isset($this->Nm_conf_reg[$sConfReg]['hora_format']))              ?  $this->Nm_conf_reg[$sConfReg]['hora_format']                  : "hhiiss";
      $_SESSION['scriptcase']['reg_conf']['time_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['hora_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['hora_sep']                     : ":";
      $_SESSION['scriptcase']['reg_conf']['time_pos_ampm']         = (isset($this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']                : "right_without_space";
      $_SESSION['scriptcase']['reg_conf']['time_simb_am']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']              : "am";
      $_SESSION['scriptcase']['reg_conf']['time_simb_pm']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']              : "pm";
      $_SESSION['scriptcase']['reg_conf']['simb_neg']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$sConfReg]['num_sinal_neg']                : "-";
      $_SESSION['scriptcase']['reg_conf']['grup_num']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_agr']                  : ".";
      $_SESSION['scriptcase']['reg_conf']['dec_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_dec']                  : ",";
      $_SESSION['scriptcase']['reg_conf']['neg_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$sConfReg]['num_format_num_neg']           : 2;
      $_SESSION['scriptcase']['reg_conf']['monet_simb']            = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']            : "$";
      $_SESSION['scriptcase']['reg_conf']['monet_f_pos']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos']     : 3;
      $_SESSION['scriptcase']['reg_conf']['monet_f_neg']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg']     : 13;
      $_SESSION['scriptcase']['reg_conf']['grup_val']              = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']            : ".";
      $_SESSION['scriptcase']['reg_conf']['dec_val']               = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']            : ",";
      $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$sConfReg]['num_group_digit']))          ?  $this->Nm_conf_reg[$sConfReg]['num_group_digit']              : "1";
      $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']))    ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']        : "1";
      $_SESSION['scriptcase']['reg_conf']['html_dir']              = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] . "'" : "";
      $_SESSION['scriptcase']['reg_conf']['css_dir']               = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] : "LTR";
      if ('' == $_SESSION['scriptcase']['reg_conf']['num_group_digit'])
      {
          $_SESSION['scriptcase']['reg_conf']['num_group_digit'] = '1';
      }
      if ('' == $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'])
      {
          $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = '1';
      }
   }
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['detalleventa_dev']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
}
//===============================================================================
class detalleventa_dev_edit
{
    var $contr_detalleventa_dev;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("detalleventa_dev_apl.php");
        require_once("detalleventa_dev_form0.php");
        $this->contr_detalleventa_dev = new detalleventa_dev_form();
    }
}
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}
ob_start();
//
//----------------  
//
    $_SESSION['scriptcase']['detalleventa_dev']['contr_erro'] = 'off';
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }
    if (!function_exists("SC_dir_app_ini"))
    {
        include_once("../_lib/lib/php/nm_ctrl_app_name.php");
    }
    SC_dir_app_ini('FACILWEBv2');
    $sc_conv_var = array();
    $sc_conv_var['iddet'] = "iddet_";
    $sc_conv_var['numfac'] = "numfac_";
    $sc_conv_var['remision'] = "remision_";
    $sc_conv_var['idpro'] = "idpro_";
    $sc_conv_var['unidadmayor'] = "unidadmayor_";
    $sc_conv_var['factor'] = "factor_";
    $sc_conv_var['idbod'] = "idbod_";
    $sc_conv_var['costop'] = "costop_";
    $sc_conv_var['cantidad'] = "cantidad_";
    $sc_conv_var['valorunit'] = "valorunit_";
    $sc_conv_var['valorpar'] = "valorpar_";
    $sc_conv_var['iva'] = "iva_";
    $sc_conv_var['descuento'] = "descuento_";
    $sc_conv_var['adicional'] = "adicional_";
    $sc_conv_var['adicional1'] = "adicional1_";
    $sc_conv_var['devuelto'] = "devuelto_";
    $sc_conv_var['colores'] = "colores_";
    $sc_conv_var['tallas'] = "tallas_";
    $sc_conv_var['sabor'] = "sabor_";
    $sc_conv_var['iddev'] = "iddev_";
    $sc_conv_var['procesado'] = "procesado_";
    $sc_conv_var['stockubica'] = "stockubica_";
    $sc_conv_var['unidad'] = "unidad_";
    if (!empty($_FILES))
    {
        foreach ($_FILES as $nmgp_campo => $nmgp_valores)
        {
             if (isset($sc_conv_var[$nmgp_campo]))
             {
                 $nmgp_campo = $sc_conv_var[$nmgp_campo];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_campo)]))
             {
                 $nmgp_campo = $sc_conv_var[strtolower($nmgp_campo)];
             }
             $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
             $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
             $$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
             $$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
             $$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
        }
    }
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
             if (isset($sc_conv_var[$nmgp_var]))
             {
                 $nmgp_var = $sc_conv_var[$nmgp_var];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
             {
                 $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
             }
             nm_limpa_str_detalleventa_dev($nmgp_val);
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
             if (isset($sc_conv_var[$nmgp_var]))
             {
                 $nmgp_var = $sc_conv_var[$nmgp_var];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
             {
                 $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
             }
             nm_limpa_str_detalleventa_dev($nmgp_val);
             $nmgp_val = NM_decode_input($nmgp_val);
             $$nmgp_var = $nmgp_val;
        }
    }
    if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($_POST['rs']) && !isset($nmgp_start) ))
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
        elseif (is_file($root . $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt")) {
            $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['detalleventa_dev']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt"));
        }
        if (isset($apl_def)) {
            if ($apl_def[0] != "detalleventa_dev") {
                $_SESSION['scriptcase']['sem_session'] = true;
                if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                    $_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir'] = $apl_def[0];
                }
                else {
                    $_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
                }
                $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
                $_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir_tp'] = $Redir_tp;
            }
            if (isset($_COOKIE['sc_actual_lang_FACILWEBv2'])) {
                $_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_FACILWEBv2'];
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
    if (isset($SC_where_pdf) && !empty($SC_where_pdf))
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']) && !isset($_SESSION['scriptcase']['detalleventa_dev']['session_timeout']['redir']))
    {
        if ('ajax_detalleventa_dev_validate_idpro_' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_colores_' == $_POST['rs'])
        {
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_tallas_' == $_POST['rs'])
        {
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_sabor_' == $_POST['rs'])
        {
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_idbod_' == $_POST['rs'])
        {
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_unidadmayor_' == $_POST['rs'])
        {
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_stockubica_' == $_POST['rs'])
        {
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_unidad_' == $_POST['rs'])
        {
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_cantidad_' == $_POST['rs'])
        {
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_valorunit_' == $_POST['rs'])
        {
            $valorunit_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_valorpar_' == $_POST['rs'])
        {
            $valorpar_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_descuento_' == $_POST['rs'])
        {
            $descuento_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_adicional_' == $_POST['rs'])
        {
            $adicional_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_adicional1_' == $_POST['rs'])
        {
            $adicional1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_factor_' == $_POST['rs'])
        {
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_iva_' == $_POST['rs'])
        {
            $iva_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_validate_costop_' == $_POST['rs'])
        {
            $costop_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_detalleventa_dev_refresh_idpro_' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_detalleventa_dev_event_cantidad__onchange' == $_POST['rs'])
        {
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $adicional1_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $descuento_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $valorpar_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $adicional_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $iva_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $valorunit_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_detalleventa_dev_event_cantidad__onfocus' == $_POST['rs'])
        {
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        for ($iSeq = 1; $iSeq <= 10; $iSeq++)
        {
            if ('ajax_detalleventa_dev_autocomp_idpro_' . $iSeq == $_POST['rs'])
            {
                $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
                $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
            }
        }
        for ($iSeq = 1; $iSeq <= 10; $iSeq++)
        {
            if ('ajax_detalleventa_dev_autocomp_idbod_' . $iSeq == $_POST['rs'])
            {
                $idbod_ = NM_utf8_urldecode($_POST['rsargs'][0]);
                $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
            }
        }
        for ($iSeq = 1; $iSeq <= 10; $iSeq++)
        {
            if ('ajax_detalleventa_dev_autocomp_colores_' . $iSeq == $_POST['rs'])
            {
                $colores_ = NM_utf8_urldecode($_POST['rsargs'][0]);
                $idpro_ = NM_utf8_urldecode($_POST['rsargs'][1]);
                $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
            }
        }
        for ($iSeq = 1; $iSeq <= 10; $iSeq++)
        {
            if ('ajax_detalleventa_dev_autocomp_tallas_' . $iSeq == $_POST['rs'])
            {
                $tallas_ = NM_utf8_urldecode($_POST['rsargs'][0]);
                $idpro_ = NM_utf8_urldecode($_POST['rsargs'][1]);
                $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
            }
        }
        for ($iSeq = 1; $iSeq <= 10; $iSeq++)
        {
            if ('ajax_detalleventa_dev_autocomp_sabor_' . $iSeq == $_POST['rs'])
            {
                $sabor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
                $idpro_ = NM_utf8_urldecode($_POST['rsargs'][1]);
                $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
            }
        }
        if ('ajax_detalleventa_dev_submit_form' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $valorunit_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $valorpar_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $descuento_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $adicional_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $adicional1_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $iva_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $costop_ = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][18]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][19]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][20]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][21]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][22]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][23]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][24]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][25]);
        }
        if ('ajax_detalleventa_dev_navigate_form' == $_POST['rs'])
        {
            $iddet_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $iddev_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][5]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][6]);
        }
        if ('ajax_detalleventa_dev_add_new_line' == $_POST['rs'])
        {
            $sc_clone = NM_utf8_urldecode($_POST['rsargs'][0]);
            $sc_seq_clone = NM_utf8_urldecode($_POST['rsargs'][1]);
            $sc_seq_vert = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_detalleventa_dev_backup_line' == $_POST['rs'])
        {
            $iddet_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $iddev_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][3]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][4]);
        }
        if ('ajax_detalleventa_dev_table_refresh' == $_POST['rs'])
        {
            $iddet_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $iddev_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][5]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][6]);
        }
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_parms']);
    } 
    if (isset($nmgp_parms) && !empty($nmgp_parms) && !is_array($nmgp_parms)) 
    { 
        if (isset($_SESSION['nm_aba_bg_color'])) 
        { 
            unset($_SESSION['nm_aba_bg_color']);
        }   
        $nmgp_parms = NM_decode_input($nmgp_parms);
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
               nm_limpa_str_detalleventa_dev($cadapar[1]);
               if (isset($sc_conv_var[$cadapar[0]]))
               {
                   $cadapar[0] = $sc_conv_var[$cadapar[0]];
               }
               elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
               {
                   $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
               }
               if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
               $Tmp_par   = $cadapar[0];
               $$Tmp_par = $cadapar[1];
           }
           $ix++;
        }
        if (isset($par_numfacventa)) 
        {
            $_SESSION['par_numfacventa'] = $par_numfacventa;
        }
        if (isset($edit_cantidad)) 
        {
            $_SESSION['edit_cantidad'] = $edit_cantidad;
        }
        if (isset($sw)) 
        {
            $_SESSION['sw'] = $sw;
        }
        if (isset($vtotal)) 
        {
            $_SESSION['vtotal'] = $vtotal;
        }
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['parms']);
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
               $Tmp_par   = $cadapar[0];
               $$Tmp_par = $cadapar[1];
               $ix++;
            }
        }
    } 
    if (isset($script_case_init) && $script_case_init != preg_replace('/[^0-9.]/', '', $script_case_init))
    {
        unset($script_case_init);
    }
    if (!isset($script_case_init) || empty($script_case_init) || is_array($script_case_init))
    {
        $script_case_init = rand(2, 10000);
    }
    $salva_run = "N";
    $salva_iframe = false;
    if (isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "detalleventa_dev";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'detalleventa_dev' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'detalleventa_dev')
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_modal'] = true;
            $nm_url_saida = "detalleventa_dev_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan'] = true;
    }
    if (!isset($nm_apl_dependente)) {
        $nm_apl_dependente = 0;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/detalleventa_dev/'))
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/detalleventa_dev_erro.php");
    $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Konqueror") ;
    if (is_int($nm_browser))   
    {
        $nm_browser = "Konqueror"; 
    } 
    else  
    {
        $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Opera") ;
        if (is_int($nm_browser))   
        {
            $nm_browser = "Opera"; 
        }
    } 
    $_SESSION['scriptcase']['change_regional_old'] = '';
    $_SESSION['scriptcase']['change_regional_new'] = '';
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_lang_t" || $nmgp_opcao == "change_lang_b" || $nmgp_opcao == "change_lang_f" || $nmgp_opcao == "force_lang"))  
    {
        $Temp_lang = $nmgp_opcao == "force_lang" ? explode(";" , $nmgp_idioma) : explode(";" , $nmgp_idioma_novo);  
        if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
        { 
            $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
        } 
        if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
        { 
            $_SESSION['scriptcase']['change_regional_old'] = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "es_co";
            $_SESSION['scriptcase']['str_conf_reg']        = $Temp_lang[1];
            $_SESSION['scriptcase']['change_regional_new'] = $_SESSION['scriptcase']['str_conf_reg'];
        } 
        $nmgp_opcao = $nmgp_opcao == "force_lang" ? "inicio" : "igual";
    } 
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_schema_t" || $nmgp_opcao == "change_schema_b" || $nmgp_opcao == "change_schema_f"))  
    {
        if ($nmgp_opcao == "change_schema_t")  
        {
            $nmgp_schema = $nmgp_schema_t . "/" . $nmgp_schema_t;  
        } 
        elseif ($nmgp_opcao == "change_schema_b")  
        {
            $nmgp_schema = $nmgp_schema_b . "/" . $nmgp_schema_b;  
        } 
        else 
        {
            $nmgp_schema = $nmgp_schema_f . "/" . $nmgp_schema_f;  
        } 
        $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
        $nmgp_opcao = "recarga";  
    } 
    if (!empty($nmgp_opcao) && $nmgp_opcao == "lookup")  
    {
        $nm_opc_lookup = $nmgp_opcao;
    }
    elseif (!empty($nmgp_opcao) && $nmgp_opcao == "formphp")  
    {
        $nm_opc_form_php = $nmgp_opcao;
    }
    else
    {
        if (!empty($nmgp_opcao))  
        {
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['opcao'] = $nmgp_opcao ; 
        }
        if (isset($_POST["par_numfacventa"])) 
        {
            $_SESSION['par_numfacventa'] = $_POST["par_numfacventa"];
            nm_limpa_str_detalleventa_dev($_SESSION['par_numfacventa']);
        }
        if (isset($_GET["par_numfacventa"])) 
        {
            $_SESSION['par_numfacventa'] = $_GET["par_numfacventa"];
            nm_limpa_str_detalleventa_dev($_SESSION['par_numfacventa']);
        }
        if (isset($_POST["edit_cantidad"])) 
        {
            $_SESSION['edit_cantidad'] = $_POST["edit_cantidad"];
            nm_limpa_str_detalleventa_dev($_SESSION['edit_cantidad']);
        }
        if (isset($_GET["edit_cantidad"])) 
        {
            $_SESSION['edit_cantidad'] = $_GET["edit_cantidad"];
            nm_limpa_str_detalleventa_dev($_SESSION['edit_cantidad']);
        }
        if (isset($_POST["sw"])) 
        {
            $_SESSION['sw'] = $_POST["sw"];
            nm_limpa_str_detalleventa_dev($_SESSION['sw']);
        }
        if (isset($_GET["sw"])) 
        {
            $_SESSION['sw'] = $_GET["sw"];
            nm_limpa_str_detalleventa_dev($_SESSION['sw']);
        }
        if (isset($_POST["vtotal"])) 
        {
            $_SESSION['vtotal'] = $_POST["vtotal"];
            nm_limpa_str_detalleventa_dev($_SESSION['vtotal']);
        }
        if (isset($_GET["vtotal"])) 
        {
            $_SESSION['vtotal'] = $_GET["vtotal"];
            nm_limpa_str_detalleventa_dev($_SESSION['vtotal']);
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_redirect_tp'] = "";
            $nm_url_saida = "detalleventa_dev_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "detalleventa_dev_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['retorno_edit'] . "?script_case_init=" . $script_case_init;  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "detalleventa_dev_fim.php"; 
                $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
                if ($nm_apl_dependente == 1) 
                { 
                    $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
                } 
                if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
                { 
                    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['scriptcase']['nm_sc_retorno']; 
                } 
            } 
        }
        if (empty($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init; 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_modal'] = true;
             $nm_url_saida = "detalleventa_dev_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['detalleventa_dev']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_detalleventa_dev = new detalleventa_dev_edit();
    $inicial_detalleventa_dev->inicializa();

    $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['select_html'] = array();
    $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['select_html']['unidadmayor_'] = "class=\\\"sc-js-input scFormObjectOddMult css_unidadmayor__obj{SC_100PERC_CLASS_INPUT}\\\" style=\\\"\\\" id=\\\"id_sc_field_unidadmayor_\" . \$sc_seq_vert . \"\\\" name=\\\"unidadmayor_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: \\'select\\', enterTab: true}\\\"";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/detalleventa_dev_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/detalleventa_dev_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_detalleventa_dev_validate_idpro_");
    sajax_export("ajax_detalleventa_dev_validate_colores_");
    sajax_export("ajax_detalleventa_dev_validate_tallas_");
    sajax_export("ajax_detalleventa_dev_validate_sabor_");
    sajax_export("ajax_detalleventa_dev_validate_idbod_");
    sajax_export("ajax_detalleventa_dev_validate_unidadmayor_");
    sajax_export("ajax_detalleventa_dev_validate_stockubica_");
    sajax_export("ajax_detalleventa_dev_validate_unidad_");
    sajax_export("ajax_detalleventa_dev_validate_cantidad_");
    sajax_export("ajax_detalleventa_dev_validate_valorunit_");
    sajax_export("ajax_detalleventa_dev_validate_valorpar_");
    sajax_export("ajax_detalleventa_dev_validate_descuento_");
    sajax_export("ajax_detalleventa_dev_validate_adicional_");
    sajax_export("ajax_detalleventa_dev_validate_adicional1_");
    sajax_export("ajax_detalleventa_dev_validate_factor_");
    sajax_export("ajax_detalleventa_dev_validate_iva_");
    sajax_export("ajax_detalleventa_dev_validate_costop_");
    sajax_export("ajax_detalleventa_dev_refresh_idpro_");
    sajax_export("ajax_detalleventa_dev_event_cantidad__onchange");
    sajax_export("ajax_detalleventa_dev_event_cantidad__onfocus");
    for ($iSeq = 1; $iSeq <= 60; $iSeq++)
    {
        sajax_export("ajax_detalleventa_dev_autocomp_idpro_" . $iSeq);
    }
    for ($iSeq = 1; $iSeq <= 60; $iSeq++)
    {
        sajax_export("ajax_detalleventa_dev_autocomp_idbod_" . $iSeq);
    }
    for ($iSeq = 1; $iSeq <= 60; $iSeq++)
    {
        sajax_export("ajax_detalleventa_dev_autocomp_colores_" . $iSeq);
    }
    for ($iSeq = 1; $iSeq <= 60; $iSeq++)
    {
        sajax_export("ajax_detalleventa_dev_autocomp_tallas_" . $iSeq);
    }
    for ($iSeq = 1; $iSeq <= 60; $iSeq++)
    {
        sajax_export("ajax_detalleventa_dev_autocomp_sabor_" . $iSeq);
    }
    sajax_export("ajax_detalleventa_dev_submit_form");
    sajax_export("ajax_detalleventa_dev_navigate_form");
    sajax_export("ajax_detalleventa_dev_add_new_line");
    sajax_export("ajax_detalleventa_dev_backup_line");
    sajax_export("ajax_detalleventa_dev_table_refresh");
    sajax_handle_client_request();

if (isset($_POST['wizard_action']) && 'change_step' == $_POST['wizard_action']) {
    $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'] = true;
    ob_start();
}

    $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
//
    function nm_limpa_str_detalleventa_dev(&$str)
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

    function ajax_detalleventa_dev_validate_idpro_($idpro_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_idpro_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_idpro_

    function ajax_detalleventa_dev_validate_colores_($colores_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_colores_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_colores_

    function ajax_detalleventa_dev_validate_tallas_($tallas_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_tallas_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_tallas_

    function ajax_detalleventa_dev_validate_sabor_($sabor_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_sabor_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_sabor_

    function ajax_detalleventa_dev_validate_idbod_($idbod_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_idbod_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_idbod_

    function ajax_detalleventa_dev_validate_unidadmayor_($unidadmayor_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_unidadmayor_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_unidadmayor_

    function ajax_detalleventa_dev_validate_stockubica_($stockubica_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_stockubica_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_stockubica_

    function ajax_detalleventa_dev_validate_unidad_($unidad_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_unidad_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_unidad_

    function ajax_detalleventa_dev_validate_cantidad_($cantidad_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_cantidad_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_cantidad_

    function ajax_detalleventa_dev_validate_valorunit_($valorunit_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_valorunit_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'valorunit_' => NM_utf8_urldecode($valorunit_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_valorunit_

    function ajax_detalleventa_dev_validate_valorpar_($valorpar_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_valorpar_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'valorpar_' => NM_utf8_urldecode($valorpar_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_valorpar_

    function ajax_detalleventa_dev_validate_descuento_($descuento_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_descuento_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'descuento_' => NM_utf8_urldecode($descuento_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_descuento_

    function ajax_detalleventa_dev_validate_adicional_($adicional_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_adicional_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'adicional_' => NM_utf8_urldecode($adicional_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_adicional_

    function ajax_detalleventa_dev_validate_adicional1_($adicional1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_adicional1_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'adicional1_' => NM_utf8_urldecode($adicional1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_adicional1_

    function ajax_detalleventa_dev_validate_factor_($factor_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_factor_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'factor_' => NM_utf8_urldecode($factor_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_factor_

    function ajax_detalleventa_dev_validate_iva_($iva_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_iva_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'iva_' => NM_utf8_urldecode($iva_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_iva_

    function ajax_detalleventa_dev_validate_costop_($costop_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'validate_costop_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'costop_' => NM_utf8_urldecode($costop_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_validate_costop_

    function ajax_detalleventa_dev_refresh_idpro_($idpro_, $nmgp_refresh_row, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'refresh_idpro_';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_refresh_idpro_

    function ajax_detalleventa_dev_event_cantidad__onchange($cantidad_, $idpro_, $adicional1_, $descuento_, $valorpar_, $adicional_, $iva_, $valorunit_, $colores_, $tallas_, $sabor_, $idbod_, $unidadmayor_, $factor_, $stockubica_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'event_cantidad__onchange';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'adicional1_' => NM_utf8_urldecode($adicional1_),
                  'descuento_' => NM_utf8_urldecode($descuento_),
                  'valorpar_' => NM_utf8_urldecode($valorpar_),
                  'adicional_' => NM_utf8_urldecode($adicional_),
                  'iva_' => NM_utf8_urldecode($iva_),
                  'valorunit_' => NM_utf8_urldecode($valorunit_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_event_cantidad__onchange

    function ajax_detalleventa_dev_event_cantidad__onfocus($cantidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'event_cantidad__onfocus';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_event_cantidad__onfocus

    function ajax_detalleventa_dev_autocomp_idpro_1($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_1';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_1
    function ajax_detalleventa_dev_autocomp_idpro_2($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_2';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_2
    function ajax_detalleventa_dev_autocomp_idpro_3($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_3';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_3
    function ajax_detalleventa_dev_autocomp_idpro_4($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_4';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_4
    function ajax_detalleventa_dev_autocomp_idpro_5($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_5';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_5
    function ajax_detalleventa_dev_autocomp_idpro_6($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_6';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_6
    function ajax_detalleventa_dev_autocomp_idpro_7($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_7';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_7
    function ajax_detalleventa_dev_autocomp_idpro_8($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_8';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_8
    function ajax_detalleventa_dev_autocomp_idpro_9($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_9';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_9
    function ajax_detalleventa_dev_autocomp_idpro_10($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_10';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_10
    function ajax_detalleventa_dev_autocomp_idpro_11($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_11';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_11
    function ajax_detalleventa_dev_autocomp_idpro_12($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_12';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_12
    function ajax_detalleventa_dev_autocomp_idpro_13($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_13';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_13
    function ajax_detalleventa_dev_autocomp_idpro_14($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_14';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_14
    function ajax_detalleventa_dev_autocomp_idpro_15($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_15';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_15
    function ajax_detalleventa_dev_autocomp_idpro_16($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_16';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_16
    function ajax_detalleventa_dev_autocomp_idpro_17($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_17';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_17
    function ajax_detalleventa_dev_autocomp_idpro_18($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_18';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_18
    function ajax_detalleventa_dev_autocomp_idpro_19($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_19';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_19
    function ajax_detalleventa_dev_autocomp_idpro_20($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_20';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_20
    function ajax_detalleventa_dev_autocomp_idpro_21($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_21';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_21
    function ajax_detalleventa_dev_autocomp_idpro_22($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_22';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_22
    function ajax_detalleventa_dev_autocomp_idpro_23($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_23';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_23
    function ajax_detalleventa_dev_autocomp_idpro_24($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_24';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_24
    function ajax_detalleventa_dev_autocomp_idpro_25($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_25';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_25
    function ajax_detalleventa_dev_autocomp_idpro_26($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_26';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_26
    function ajax_detalleventa_dev_autocomp_idpro_27($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_27';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_27
    function ajax_detalleventa_dev_autocomp_idpro_28($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_28';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_28
    function ajax_detalleventa_dev_autocomp_idpro_29($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_29';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_29
    function ajax_detalleventa_dev_autocomp_idpro_30($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_30';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_30
    function ajax_detalleventa_dev_autocomp_idpro_31($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_31';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_31
    function ajax_detalleventa_dev_autocomp_idpro_32($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_32';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_32
    function ajax_detalleventa_dev_autocomp_idpro_33($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_33';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_33
    function ajax_detalleventa_dev_autocomp_idpro_34($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_34';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_34
    function ajax_detalleventa_dev_autocomp_idpro_35($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_35';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_35
    function ajax_detalleventa_dev_autocomp_idpro_36($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_36';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_36
    function ajax_detalleventa_dev_autocomp_idpro_37($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_37';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_37
    function ajax_detalleventa_dev_autocomp_idpro_38($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_38';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_38
    function ajax_detalleventa_dev_autocomp_idpro_39($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_39';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_39
    function ajax_detalleventa_dev_autocomp_idpro_40($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_40';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_40
    function ajax_detalleventa_dev_autocomp_idpro_41($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_41';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_41
    function ajax_detalleventa_dev_autocomp_idpro_42($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_42';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_42
    function ajax_detalleventa_dev_autocomp_idpro_43($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_43';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_43
    function ajax_detalleventa_dev_autocomp_idpro_44($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_44';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_44
    function ajax_detalleventa_dev_autocomp_idpro_45($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_45';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_45
    function ajax_detalleventa_dev_autocomp_idpro_46($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_46';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_46
    function ajax_detalleventa_dev_autocomp_idpro_47($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_47';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_47
    function ajax_detalleventa_dev_autocomp_idpro_48($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_48';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_48
    function ajax_detalleventa_dev_autocomp_idpro_49($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_49';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_49
    function ajax_detalleventa_dev_autocomp_idpro_50($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_50';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_50
    function ajax_detalleventa_dev_autocomp_idpro_51($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_51';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_51
    function ajax_detalleventa_dev_autocomp_idpro_52($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_52';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_52
    function ajax_detalleventa_dev_autocomp_idpro_53($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_53';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_53
    function ajax_detalleventa_dev_autocomp_idpro_54($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_54';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_54
    function ajax_detalleventa_dev_autocomp_idpro_55($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_55';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_55
    function ajax_detalleventa_dev_autocomp_idpro_56($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_56';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_56
    function ajax_detalleventa_dev_autocomp_idpro_57($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_57';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_57
    function ajax_detalleventa_dev_autocomp_idpro_58($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_58';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_58
    function ajax_detalleventa_dev_autocomp_idpro_59($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_59';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_59
    function ajax_detalleventa_dev_autocomp_idpro_60($idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idpro_60';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idpro_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idpro_60

    function ajax_detalleventa_dev_autocomp_idbod_1($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_1';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_1
    function ajax_detalleventa_dev_autocomp_idbod_2($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_2';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_2
    function ajax_detalleventa_dev_autocomp_idbod_3($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_3';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_3
    function ajax_detalleventa_dev_autocomp_idbod_4($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_4';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_4
    function ajax_detalleventa_dev_autocomp_idbod_5($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_5';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_5
    function ajax_detalleventa_dev_autocomp_idbod_6($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_6';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_6
    function ajax_detalleventa_dev_autocomp_idbod_7($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_7';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_7
    function ajax_detalleventa_dev_autocomp_idbod_8($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_8';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_8
    function ajax_detalleventa_dev_autocomp_idbod_9($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_9';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_9
    function ajax_detalleventa_dev_autocomp_idbod_10($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_10';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_10
    function ajax_detalleventa_dev_autocomp_idbod_11($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_11';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_11
    function ajax_detalleventa_dev_autocomp_idbod_12($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_12';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_12
    function ajax_detalleventa_dev_autocomp_idbod_13($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_13';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_13
    function ajax_detalleventa_dev_autocomp_idbod_14($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_14';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_14
    function ajax_detalleventa_dev_autocomp_idbod_15($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_15';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_15
    function ajax_detalleventa_dev_autocomp_idbod_16($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_16';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_16
    function ajax_detalleventa_dev_autocomp_idbod_17($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_17';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_17
    function ajax_detalleventa_dev_autocomp_idbod_18($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_18';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_18
    function ajax_detalleventa_dev_autocomp_idbod_19($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_19';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_19
    function ajax_detalleventa_dev_autocomp_idbod_20($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_20';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_20
    function ajax_detalleventa_dev_autocomp_idbod_21($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_21';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_21
    function ajax_detalleventa_dev_autocomp_idbod_22($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_22';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_22
    function ajax_detalleventa_dev_autocomp_idbod_23($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_23';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_23
    function ajax_detalleventa_dev_autocomp_idbod_24($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_24';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_24
    function ajax_detalleventa_dev_autocomp_idbod_25($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_25';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_25
    function ajax_detalleventa_dev_autocomp_idbod_26($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_26';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_26
    function ajax_detalleventa_dev_autocomp_idbod_27($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_27';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_27
    function ajax_detalleventa_dev_autocomp_idbod_28($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_28';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_28
    function ajax_detalleventa_dev_autocomp_idbod_29($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_29';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_29
    function ajax_detalleventa_dev_autocomp_idbod_30($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_30';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_30
    function ajax_detalleventa_dev_autocomp_idbod_31($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_31';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_31
    function ajax_detalleventa_dev_autocomp_idbod_32($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_32';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_32
    function ajax_detalleventa_dev_autocomp_idbod_33($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_33';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_33
    function ajax_detalleventa_dev_autocomp_idbod_34($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_34';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_34
    function ajax_detalleventa_dev_autocomp_idbod_35($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_35';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_35
    function ajax_detalleventa_dev_autocomp_idbod_36($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_36';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_36
    function ajax_detalleventa_dev_autocomp_idbod_37($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_37';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_37
    function ajax_detalleventa_dev_autocomp_idbod_38($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_38';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_38
    function ajax_detalleventa_dev_autocomp_idbod_39($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_39';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_39
    function ajax_detalleventa_dev_autocomp_idbod_40($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_40';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_40
    function ajax_detalleventa_dev_autocomp_idbod_41($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_41';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_41
    function ajax_detalleventa_dev_autocomp_idbod_42($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_42';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_42
    function ajax_detalleventa_dev_autocomp_idbod_43($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_43';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_43
    function ajax_detalleventa_dev_autocomp_idbod_44($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_44';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_44
    function ajax_detalleventa_dev_autocomp_idbod_45($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_45';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_45
    function ajax_detalleventa_dev_autocomp_idbod_46($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_46';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_46
    function ajax_detalleventa_dev_autocomp_idbod_47($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_47';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_47
    function ajax_detalleventa_dev_autocomp_idbod_48($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_48';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_48
    function ajax_detalleventa_dev_autocomp_idbod_49($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_49';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_49
    function ajax_detalleventa_dev_autocomp_idbod_50($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_50';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_50
    function ajax_detalleventa_dev_autocomp_idbod_51($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_51';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_51
    function ajax_detalleventa_dev_autocomp_idbod_52($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_52';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_52
    function ajax_detalleventa_dev_autocomp_idbod_53($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_53';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_53
    function ajax_detalleventa_dev_autocomp_idbod_54($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_54';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_54
    function ajax_detalleventa_dev_autocomp_idbod_55($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_55';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_55
    function ajax_detalleventa_dev_autocomp_idbod_56($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_56';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_56
    function ajax_detalleventa_dev_autocomp_idbod_57($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_57';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_57
    function ajax_detalleventa_dev_autocomp_idbod_58($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_58';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_58
    function ajax_detalleventa_dev_autocomp_idbod_59($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_59';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_59
    function ajax_detalleventa_dev_autocomp_idbod_60($idbod_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_idbod_60';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['idbod_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_idbod_60

    function ajax_detalleventa_dev_autocomp_colores_1($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_1';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_1
    function ajax_detalleventa_dev_autocomp_colores_2($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_2';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_2
    function ajax_detalleventa_dev_autocomp_colores_3($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_3';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_3
    function ajax_detalleventa_dev_autocomp_colores_4($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_4';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_4
    function ajax_detalleventa_dev_autocomp_colores_5($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_5';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_5
    function ajax_detalleventa_dev_autocomp_colores_6($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_6';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_6
    function ajax_detalleventa_dev_autocomp_colores_7($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_7';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_7
    function ajax_detalleventa_dev_autocomp_colores_8($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_8';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_8
    function ajax_detalleventa_dev_autocomp_colores_9($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_9';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_9
    function ajax_detalleventa_dev_autocomp_colores_10($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_10';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_10
    function ajax_detalleventa_dev_autocomp_colores_11($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_11';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_11
    function ajax_detalleventa_dev_autocomp_colores_12($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_12';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_12
    function ajax_detalleventa_dev_autocomp_colores_13($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_13';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_13
    function ajax_detalleventa_dev_autocomp_colores_14($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_14';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_14
    function ajax_detalleventa_dev_autocomp_colores_15($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_15';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_15
    function ajax_detalleventa_dev_autocomp_colores_16($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_16';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_16
    function ajax_detalleventa_dev_autocomp_colores_17($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_17';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_17
    function ajax_detalleventa_dev_autocomp_colores_18($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_18';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_18
    function ajax_detalleventa_dev_autocomp_colores_19($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_19';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_19
    function ajax_detalleventa_dev_autocomp_colores_20($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_20';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_20
    function ajax_detalleventa_dev_autocomp_colores_21($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_21';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_21
    function ajax_detalleventa_dev_autocomp_colores_22($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_22';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_22
    function ajax_detalleventa_dev_autocomp_colores_23($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_23';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_23
    function ajax_detalleventa_dev_autocomp_colores_24($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_24';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_24
    function ajax_detalleventa_dev_autocomp_colores_25($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_25';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_25
    function ajax_detalleventa_dev_autocomp_colores_26($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_26';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_26
    function ajax_detalleventa_dev_autocomp_colores_27($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_27';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_27
    function ajax_detalleventa_dev_autocomp_colores_28($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_28';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_28
    function ajax_detalleventa_dev_autocomp_colores_29($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_29';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_29
    function ajax_detalleventa_dev_autocomp_colores_30($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_30';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_30
    function ajax_detalleventa_dev_autocomp_colores_31($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_31';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_31
    function ajax_detalleventa_dev_autocomp_colores_32($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_32';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_32
    function ajax_detalleventa_dev_autocomp_colores_33($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_33';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_33
    function ajax_detalleventa_dev_autocomp_colores_34($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_34';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_34
    function ajax_detalleventa_dev_autocomp_colores_35($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_35';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_35
    function ajax_detalleventa_dev_autocomp_colores_36($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_36';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_36
    function ajax_detalleventa_dev_autocomp_colores_37($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_37';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_37
    function ajax_detalleventa_dev_autocomp_colores_38($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_38';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_38
    function ajax_detalleventa_dev_autocomp_colores_39($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_39';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_39
    function ajax_detalleventa_dev_autocomp_colores_40($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_40';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_40
    function ajax_detalleventa_dev_autocomp_colores_41($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_41';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_41
    function ajax_detalleventa_dev_autocomp_colores_42($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_42';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_42
    function ajax_detalleventa_dev_autocomp_colores_43($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_43';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_43
    function ajax_detalleventa_dev_autocomp_colores_44($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_44';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_44
    function ajax_detalleventa_dev_autocomp_colores_45($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_45';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_45
    function ajax_detalleventa_dev_autocomp_colores_46($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_46';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_46
    function ajax_detalleventa_dev_autocomp_colores_47($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_47';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_47
    function ajax_detalleventa_dev_autocomp_colores_48($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_48';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_48
    function ajax_detalleventa_dev_autocomp_colores_49($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_49';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_49
    function ajax_detalleventa_dev_autocomp_colores_50($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_50';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_50
    function ajax_detalleventa_dev_autocomp_colores_51($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_51';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_51
    function ajax_detalleventa_dev_autocomp_colores_52($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_52';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_52
    function ajax_detalleventa_dev_autocomp_colores_53($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_53';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_53
    function ajax_detalleventa_dev_autocomp_colores_54($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_54';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_54
    function ajax_detalleventa_dev_autocomp_colores_55($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_55';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_55
    function ajax_detalleventa_dev_autocomp_colores_56($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_56';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_56
    function ajax_detalleventa_dev_autocomp_colores_57($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_57';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_57
    function ajax_detalleventa_dev_autocomp_colores_58($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_58';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_58
    function ajax_detalleventa_dev_autocomp_colores_59($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_59';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_59
    function ajax_detalleventa_dev_autocomp_colores_60($colores_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_colores_60';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['colores_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_colores_60

    function ajax_detalleventa_dev_autocomp_tallas_1($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_1';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_1
    function ajax_detalleventa_dev_autocomp_tallas_2($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_2';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_2
    function ajax_detalleventa_dev_autocomp_tallas_3($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_3';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_3
    function ajax_detalleventa_dev_autocomp_tallas_4($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_4';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_4
    function ajax_detalleventa_dev_autocomp_tallas_5($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_5';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_5
    function ajax_detalleventa_dev_autocomp_tallas_6($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_6';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_6
    function ajax_detalleventa_dev_autocomp_tallas_7($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_7';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_7
    function ajax_detalleventa_dev_autocomp_tallas_8($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_8';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_8
    function ajax_detalleventa_dev_autocomp_tallas_9($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_9';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_9
    function ajax_detalleventa_dev_autocomp_tallas_10($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_10';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_10
    function ajax_detalleventa_dev_autocomp_tallas_11($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_11';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_11
    function ajax_detalleventa_dev_autocomp_tallas_12($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_12';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_12
    function ajax_detalleventa_dev_autocomp_tallas_13($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_13';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_13
    function ajax_detalleventa_dev_autocomp_tallas_14($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_14';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_14
    function ajax_detalleventa_dev_autocomp_tallas_15($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_15';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_15
    function ajax_detalleventa_dev_autocomp_tallas_16($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_16';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_16
    function ajax_detalleventa_dev_autocomp_tallas_17($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_17';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_17
    function ajax_detalleventa_dev_autocomp_tallas_18($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_18';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_18
    function ajax_detalleventa_dev_autocomp_tallas_19($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_19';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_19
    function ajax_detalleventa_dev_autocomp_tallas_20($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_20';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_20
    function ajax_detalleventa_dev_autocomp_tallas_21($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_21';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_21
    function ajax_detalleventa_dev_autocomp_tallas_22($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_22';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_22
    function ajax_detalleventa_dev_autocomp_tallas_23($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_23';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_23
    function ajax_detalleventa_dev_autocomp_tallas_24($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_24';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_24
    function ajax_detalleventa_dev_autocomp_tallas_25($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_25';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_25
    function ajax_detalleventa_dev_autocomp_tallas_26($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_26';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_26
    function ajax_detalleventa_dev_autocomp_tallas_27($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_27';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_27
    function ajax_detalleventa_dev_autocomp_tallas_28($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_28';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_28
    function ajax_detalleventa_dev_autocomp_tallas_29($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_29';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_29
    function ajax_detalleventa_dev_autocomp_tallas_30($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_30';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_30
    function ajax_detalleventa_dev_autocomp_tallas_31($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_31';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_31
    function ajax_detalleventa_dev_autocomp_tallas_32($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_32';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_32
    function ajax_detalleventa_dev_autocomp_tallas_33($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_33';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_33
    function ajax_detalleventa_dev_autocomp_tallas_34($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_34';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_34
    function ajax_detalleventa_dev_autocomp_tallas_35($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_35';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_35
    function ajax_detalleventa_dev_autocomp_tallas_36($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_36';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_36
    function ajax_detalleventa_dev_autocomp_tallas_37($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_37';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_37
    function ajax_detalleventa_dev_autocomp_tallas_38($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_38';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_38
    function ajax_detalleventa_dev_autocomp_tallas_39($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_39';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_39
    function ajax_detalleventa_dev_autocomp_tallas_40($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_40';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_40
    function ajax_detalleventa_dev_autocomp_tallas_41($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_41';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_41
    function ajax_detalleventa_dev_autocomp_tallas_42($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_42';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_42
    function ajax_detalleventa_dev_autocomp_tallas_43($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_43';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_43
    function ajax_detalleventa_dev_autocomp_tallas_44($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_44';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_44
    function ajax_detalleventa_dev_autocomp_tallas_45($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_45';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_45
    function ajax_detalleventa_dev_autocomp_tallas_46($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_46';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_46
    function ajax_detalleventa_dev_autocomp_tallas_47($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_47';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_47
    function ajax_detalleventa_dev_autocomp_tallas_48($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_48';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_48
    function ajax_detalleventa_dev_autocomp_tallas_49($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_49';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_49
    function ajax_detalleventa_dev_autocomp_tallas_50($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_50';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_50
    function ajax_detalleventa_dev_autocomp_tallas_51($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_51';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_51
    function ajax_detalleventa_dev_autocomp_tallas_52($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_52';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_52
    function ajax_detalleventa_dev_autocomp_tallas_53($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_53';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_53
    function ajax_detalleventa_dev_autocomp_tallas_54($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_54';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_54
    function ajax_detalleventa_dev_autocomp_tallas_55($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_55';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_55
    function ajax_detalleventa_dev_autocomp_tallas_56($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_56';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_56
    function ajax_detalleventa_dev_autocomp_tallas_57($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_57';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_57
    function ajax_detalleventa_dev_autocomp_tallas_58($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_58';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_58
    function ajax_detalleventa_dev_autocomp_tallas_59($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_59';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_59
    function ajax_detalleventa_dev_autocomp_tallas_60($tallas_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_tallas_60';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['tallas_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_tallas_60

    function ajax_detalleventa_dev_autocomp_sabor_1($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_1';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_1
    function ajax_detalleventa_dev_autocomp_sabor_2($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_2';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_2
    function ajax_detalleventa_dev_autocomp_sabor_3($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_3';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_3
    function ajax_detalleventa_dev_autocomp_sabor_4($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_4';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_4
    function ajax_detalleventa_dev_autocomp_sabor_5($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_5';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_5
    function ajax_detalleventa_dev_autocomp_sabor_6($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_6';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_6
    function ajax_detalleventa_dev_autocomp_sabor_7($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_7';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_7
    function ajax_detalleventa_dev_autocomp_sabor_8($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_8';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_8
    function ajax_detalleventa_dev_autocomp_sabor_9($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_9';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_9
    function ajax_detalleventa_dev_autocomp_sabor_10($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_10';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_10
    function ajax_detalleventa_dev_autocomp_sabor_11($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_11';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_11
    function ajax_detalleventa_dev_autocomp_sabor_12($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_12';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_12
    function ajax_detalleventa_dev_autocomp_sabor_13($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_13';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_13
    function ajax_detalleventa_dev_autocomp_sabor_14($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_14';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_14
    function ajax_detalleventa_dev_autocomp_sabor_15($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_15';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_15
    function ajax_detalleventa_dev_autocomp_sabor_16($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_16';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_16
    function ajax_detalleventa_dev_autocomp_sabor_17($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_17';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_17
    function ajax_detalleventa_dev_autocomp_sabor_18($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_18';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_18
    function ajax_detalleventa_dev_autocomp_sabor_19($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_19';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_19
    function ajax_detalleventa_dev_autocomp_sabor_20($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_20';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_20
    function ajax_detalleventa_dev_autocomp_sabor_21($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_21';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_21
    function ajax_detalleventa_dev_autocomp_sabor_22($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_22';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_22
    function ajax_detalleventa_dev_autocomp_sabor_23($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_23';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_23
    function ajax_detalleventa_dev_autocomp_sabor_24($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_24';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_24
    function ajax_detalleventa_dev_autocomp_sabor_25($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_25';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_25
    function ajax_detalleventa_dev_autocomp_sabor_26($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_26';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_26
    function ajax_detalleventa_dev_autocomp_sabor_27($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_27';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_27
    function ajax_detalleventa_dev_autocomp_sabor_28($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_28';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_28
    function ajax_detalleventa_dev_autocomp_sabor_29($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_29';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_29
    function ajax_detalleventa_dev_autocomp_sabor_30($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_30';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_30
    function ajax_detalleventa_dev_autocomp_sabor_31($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_31';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_31
    function ajax_detalleventa_dev_autocomp_sabor_32($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_32';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_32
    function ajax_detalleventa_dev_autocomp_sabor_33($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_33';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_33
    function ajax_detalleventa_dev_autocomp_sabor_34($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_34';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_34
    function ajax_detalleventa_dev_autocomp_sabor_35($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_35';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_35
    function ajax_detalleventa_dev_autocomp_sabor_36($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_36';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_36
    function ajax_detalleventa_dev_autocomp_sabor_37($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_37';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_37
    function ajax_detalleventa_dev_autocomp_sabor_38($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_38';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_38
    function ajax_detalleventa_dev_autocomp_sabor_39($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_39';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_39
    function ajax_detalleventa_dev_autocomp_sabor_40($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_40';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_40
    function ajax_detalleventa_dev_autocomp_sabor_41($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_41';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_41
    function ajax_detalleventa_dev_autocomp_sabor_42($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_42';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_42
    function ajax_detalleventa_dev_autocomp_sabor_43($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_43';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_43
    function ajax_detalleventa_dev_autocomp_sabor_44($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_44';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_44
    function ajax_detalleventa_dev_autocomp_sabor_45($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_45';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_45
    function ajax_detalleventa_dev_autocomp_sabor_46($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_46';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_46
    function ajax_detalleventa_dev_autocomp_sabor_47($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_47';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_47
    function ajax_detalleventa_dev_autocomp_sabor_48($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_48';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_48
    function ajax_detalleventa_dev_autocomp_sabor_49($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_49';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_49
    function ajax_detalleventa_dev_autocomp_sabor_50($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_50';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_50
    function ajax_detalleventa_dev_autocomp_sabor_51($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_51';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_51
    function ajax_detalleventa_dev_autocomp_sabor_52($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_52';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_52
    function ajax_detalleventa_dev_autocomp_sabor_53($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_53';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_53
    function ajax_detalleventa_dev_autocomp_sabor_54($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_54';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_54
    function ajax_detalleventa_dev_autocomp_sabor_55($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_55';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_55
    function ajax_detalleventa_dev_autocomp_sabor_56($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_56';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_56
    function ajax_detalleventa_dev_autocomp_sabor_57($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_57';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_57
    function ajax_detalleventa_dev_autocomp_sabor_58($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_58';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_58
    function ajax_detalleventa_dev_autocomp_sabor_59($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_59';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_59
    function ajax_detalleventa_dev_autocomp_sabor_60($sabor_, $idpro_, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'autocomp_sabor_60';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_'] = utf8_decode(urldecode($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['sabor_']));
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_autocomp_sabor_60

    function ajax_detalleventa_dev_submit_form($idpro_, $colores_, $tallas_, $sabor_, $idbod_, $unidadmayor_, $stockubica_, $unidad_, $cantidad_, $valorunit_, $valorpar_, $descuento_, $adicional_, $adicional1_, $factor_, $iva_, $costop_, $nmgp_refresh_row, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'submit_form';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'valorunit_' => NM_utf8_urldecode($valorunit_),
                  'valorpar_' => NM_utf8_urldecode($valorpar_),
                  'descuento_' => NM_utf8_urldecode($descuento_),
                  'adicional_' => NM_utf8_urldecode($adicional_),
                  'adicional1_' => NM_utf8_urldecode($adicional1_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'iva_' => NM_utf8_urldecode($iva_),
                  'costop_' => NM_utf8_urldecode($costop_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_url_saida' => NM_utf8_urldecode($nmgp_url_saida),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ancora' => NM_utf8_urldecode($nmgp_ancora),
                  'nmgp_num_form' => NM_utf8_urldecode($nmgp_num_form),
                  'nmgp_parms' => NM_utf8_urldecode($nmgp_parms),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'csrf_token' => NM_utf8_urldecode($csrf_token),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_submit_form

    function ajax_detalleventa_dev_navigate_form($iddet_, $iddev_, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'navigate_form';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'iddet_' => NM_utf8_urldecode($iddet_),
                  'iddev_' => NM_utf8_urldecode($iddev_),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_navigate_form

    function ajax_detalleventa_dev_add_new_line($sc_clone, $sc_seq_clone, $sc_seq_vert, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'add_new_line';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'sc_clone' => NM_utf8_urldecode($sc_clone),
                  'sc_seq_clone' => NM_utf8_urldecode($sc_seq_clone),
                  'sc_seq_vert' => NM_utf8_urldecode($sc_seq_vert),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_add_new_line

    function ajax_detalleventa_dev_backup_line($iddet_, $iddev_, $nmgp_refresh_row, $nm_form_submit, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'backup_line';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'iddet_' => NM_utf8_urldecode($iddet_),
                  'iddev_' => NM_utf8_urldecode($iddev_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_backup_line

    function ajax_detalleventa_dev_table_refresh($iddet_, $iddev_, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_detalleventa_dev;
        //register_shutdown_function("detalleventa_dev_pack_ajax_response");
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_flag          = true;
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao         = 'table_refresh';
        $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param'] = array(
                  'iddet_' => NM_utf8_urldecode($iddet_),
                  'iddev_' => NM_utf8_urldecode($iddev_),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_detalleventa_dev->contr_detalleventa_dev->controle();
        exit;
    } // ajax_table_refresh


   function detalleventa_dev_pack_ajax_response()
   {
      global $inicial_detalleventa_dev;
      $aResp = array();

      if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['wizard']))
      {
          $aResp['wizard'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['wizard'];
      }
      if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            detalleventa_dev_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            detalleventa_dev_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            detalleventa_dev_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            detalleventa_dev_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = detalleventa_dev_pack_protect_string($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            detalleventa_dev_pack_ajax_ok($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['focus']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['focus'];
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['closeLine']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['clearUpload']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['btnDisabled']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['btnDisabled'])
         {
            detalleventa_dev_pack_btn_disabled($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['btnLabel']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['btnLabel'])
         {
            detalleventa_dev_pack_btn_label($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['varList']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['varList']))
         {
            detalleventa_dev_pack_var_list($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['masterValue']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['masterValue'])
         {
            detalleventa_dev_pack_master_value($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxAlert']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxAlert'])
         {
            detalleventa_dev_pack_ajax_alert($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage'])
         {
            detalleventa_dev_pack_ajax_message($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxJavascript']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxJavascript'])
         {
            detalleventa_dev_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir']))
         {
            detalleventa_dev_pack_ajax_redir($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redirExit']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redirExit']))
         {
            detalleventa_dev_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['blockDisplay']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['blockDisplay']))
         {
            detalleventa_dev_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['fieldDisplay']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['fieldDisplay']))
         {
            detalleventa_dev_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['buttonDisplay']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['buttonDisplay']))
         {
            $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['buttonDisplay'] = $inicial_detalleventa_dev->contr_detalleventa_dev->nmgp_botoes;
            detalleventa_dev_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['buttonDisplayVert']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['buttonDisplayVert']))
         {
            detalleventa_dev_pack_ajax_button_display_vert($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['fieldLabel']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['fieldLabel']))
         {
            detalleventa_dev_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['readOnly']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['readOnly']))
         {
            detalleventa_dev_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navStatus']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navStatus']))
         {
            detalleventa_dev_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navSummary']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navSummary']))
         {
            detalleventa_dev_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navPage']))
         {
            detalleventa_dev_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['btnVars']) && !empty($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['btnVars']))
         {
            detalleventa_dev_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['quickSearchRes']) && $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['event_field']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['event_field'])
         {
            $aResp['eventField'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['event_field'];
         }
         else
         {
            $aResp['eventField'] = '__SC_NO_FIELD';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output']) && $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = detalleventa_dev_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          if (isset($aResp['wizard'])) {
              echo json_encode($aResp);
          }
          else {
              $oJson = new Services_JSON();
              echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
          }
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // detalleventa_dev_pack_ajax_response

   function detalleventa_dev_pack_calendar_reload(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['calendarReload'] = 'OK';
   } // detalleventa_dev_pack_calendar_reload

   function detalleventa_dev_pack_ajax_errors(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['errList'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_detalleventa_dev' == $sField)
         {
             $aMsg = detalleventa_dev_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_detalleventa_dev' != $sField)
                       ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => detalleventa_dev_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // detalleventa_dev_pack_ajax_errors

   function detalleventa_dev_pack_ajax_remove_erros($aErrors)
   {
       $aNewErrors = array();
       if (!empty($aErrors))
       {
           $sErrorMsgs = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), implode('<br />', $aErrors));
           $aErrorMsgs = explode('<BR>', $sErrorMsgs);
           foreach ($aErrorMsgs as $sErrorMsg)
           {
               $sErrorMsg = trim($sErrorMsg);
               if ('' != $sErrorMsg && !in_array($sErrorMsg, $aNewErrors))
               {
                   $aNewErrors[] = $sErrorMsg;
               }
           }
       }
       return $aNewErrors;
   } // detalleventa_dev_pack_ajax_remove_erros

   function detalleventa_dev_pack_ajax_ok(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $iNumLinha = (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => detalleventa_dev_pack_protect_string($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // detalleventa_dev_pack_ajax_ok

   function detalleventa_dev_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $iNumLinha = (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['row']))
         {
            $aField['row'] = $aData['row'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = detalleventa_dev_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = detalleventa_dev_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = detalleventa_dev_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['hideName']))
         {
            $aField['hideName'] = $aData['hideName'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = detalleventa_dev_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = detalleventa_dev_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['docReadonly']))
         {
            $aField['docReadonly'] = detalleventa_dev_pack_protect_string($aData['docReadonly']);
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['optComp']))
         {
            $aField['optComp'] = $aData['optComp'];
         }
         if (isset($aData['optClass']))
         {
            $aField['optClass'] = $aData['optClass'];
         }
         if (isset($aData['optMulti']))
         {
            $aField['optMulti'] = $aData['optMulti'];
         }
         if (isset($aData['switch']))
         {
            $aField['switch'] = $aData['switch'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = detalleventa_dev_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = detalleventa_dev_pack_protect_string($aData['mulHtml']);
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = detalleventa_dev_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? detalleventa_dev_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         foreach ($aField['valList'] as $iIndex => $aFieldData)
         {
             if ("null" == $aFieldData['value'])
             {
                 $aField['valList'][$iIndex]['value'] = '';
             }
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => detalleventa_dev_pack_protect_string($sOpt),
                                                  'label' => detalleventa_dev_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // detalleventa_dev_pack_ajax_set_fields

   function detalleventa_dev_pack_ajax_redir(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redir'][$sTag];
         }
      }
   } // detalleventa_dev_pack_ajax_redir

   function detalleventa_dev_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // detalleventa_dev_pack_ajax_redir_exit

   function detalleventa_dev_pack_var_list(&$aResp)
   {
      global $inicial_detalleventa_dev;
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['varList'] as $varData)
      {
         $aResp['varList'][] = array('index' => key($varData),
                                      'value' => current($varData));
      }
   } // detalleventa_dev_pack_var_list

   function detalleventa_dev_pack_master_value(&$aResp)
   {
      global $inicial_detalleventa_dev;
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // detalleventa_dev_pack_master_value

   function detalleventa_dev_pack_btn_disabled(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['btnDisabled'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['btnDisabled'] as $btnName => $btnStatus) {
        $aResp['btnDisabled'][$btnName] = $btnStatus;
      }
   } // detalleventa_dev_pack_ajax_alert

   function detalleventa_dev_pack_btn_label(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['btnLabel'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['btnLabel'] as $btnName => $btnLabel) {
        $aResp['btnLabel'][$btnName] = $btnLabel;
      }
   } // detalleventa_dev_pack_ajax_alert

   function detalleventa_dev_pack_ajax_alert(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['ajaxAlert'] = array('message' => $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxAlert']['message'], 'params' =>  $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxAlert']['params']);
   } // detalleventa_dev_pack_ajax_alert

   function detalleventa_dev_pack_ajax_message(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['ajaxMessage'] = array('message'      => detalleventa_dev_pack_protect_string($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => detalleventa_dev_pack_protect_string($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'toast'        => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['toast'])        ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['toast']        : 'N',
                                    'toast_pos'    => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['toast_pos'])    ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['toast_pos']    : '',
                                    'type'         => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['type'])         ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['type']         : '',
                                    'redir_target' => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // detalleventa_dev_pack_ajax_message

   function detalleventa_dev_pack_ajax_javascript(&$aResp)
   {
      global $inicial_detalleventa_dev;
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // detalleventa_dev_pack_ajax_javascript

   function detalleventa_dev_pack_ajax_block_display(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // detalleventa_dev_pack_ajax_block_display

   function detalleventa_dev_pack_ajax_field_display(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // detalleventa_dev_pack_ajax_field_display

   function detalleventa_dev_pack_ajax_button_display(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // detalleventa_dev_pack_ajax_button_display

   function detalleventa_dev_pack_ajax_button_display_vert(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['buttonDisplayVert'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['buttonDisplayVert'] as $aButtonData)
      {
        $aResp['buttonDisplayVert'][] = $aButtonData;
      }
   } // detalleventa_dev_pack_ajax_button_display

   function detalleventa_dev_pack_ajax_field_label(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, detalleventa_dev_pack_protect_string($sFieldLabel));
      }
   } // detalleventa_dev_pack_ajax_field_label

   function detalleventa_dev_pack_ajax_readonly(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['readOnly'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // detalleventa_dev_pack_ajax_readonly

   function detalleventa_dev_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['navStatus'] = array();
      if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navStatus']['ret']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navStatus']['ava']) && '' != $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navStatus']['ava'];
      }
   } // detalleventa_dev_pack_ajax_nav_status

   function detalleventa_dev_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navSummary']['reg_tot'];
   } // detalleventa_dev_pack_ajax_nav_Summary

   function detalleventa_dev_pack_ajax_navPage(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['navPage'] = $inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['navPage'];
   } // detalleventa_dev_pack_ajax_navPage


   function detalleventa_dev_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_detalleventa_dev;
      $aResp['btnVars'] = array();
      foreach ($inicial_detalleventa_dev->contr_detalleventa_dev->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, detalleventa_dev_pack_protect_string($sBtnValue));
      }
   } // detalleventa_dev_pack_ajax_btn_vars

   function detalleventa_dev_pack_protect_string($sString)
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
/*             return htmlentities($sString, ENT_COMPAT, $_SESSION['scriptcase']['charset']); */
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
   } // detalleventa_dev_pack_protect_string
?>
