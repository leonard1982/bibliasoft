<?php
//
   include_once('form_detalleventa_111121_session.php');
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

   $_SESSION['scriptcase']['form_detalleventa_111121']['error_buffer'] = '';

   $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_cache']  = "";
   $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_doc']        = "";
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
   if(empty($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check img
   if(empty($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imagens']))
   {
           /*check img*/$_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //check cache
   if(empty($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_cache']))
   {
           /*check cache*/$_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
   }
   //check doc
   if(empty($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_doc']))
   {
           /*check doc*/$_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
   }
   //end check publication with the prod
//
class form_detalleventa_111121_ini
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
   var $link_form_detalleventa_observ_edit;
   var $link_grid_stock_cons;
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
      $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_detalleventa_111121"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "FACILWEBv2"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "edgar"; 
      $this->nm_script_by    = "netmake"; 
      $this->nm_script_type  = "PHP"; 
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20180801"; 
      $this->nm_hr_criacao   = "175942"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20211223"; 
      $this->nm_hr_ult_alt   = "110934"; 
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
      $this->path_prod       = $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imag_temp'];
      $this->path_cache      = $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_doc'];
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
      $this->str_schema_all  = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_BlueBerry/Sc9_BlueBerry";
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_detalleventa_111121';
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
      if (isset($_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['form_detalleventa_111121']['actual_lang']) || $_SESSION['scriptcase']['form_detalleventa_111121']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['form_detalleventa_111121']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_FACILWEBv2',$this->str_lang,'0','/');
      }
      global $inicial_form_detalleventa_111121;
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
                  if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag) && $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag)
                  {
                      $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      form_detalleventa_111121_pack_ajax_response();
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
          unset($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao']);
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
      if (isset($_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir_tp'] == "R") {
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
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']);
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
          $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']['action']  = "./";
          $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']['target']  = "_self";
          $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']['metodo']  = "post";
          $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
          form_detalleventa_111121_pack_ajax_response();
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir']))
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
      $Tmp_apl_lig = "grid_stock";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/grid_stock_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/grid_stock_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_stock_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_stock_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["grid_stock"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_detalleventa_observ";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_detalleventa_observ_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_detalleventa_observ_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_detalleventa_observ_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_detalleventa_observ_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_detalleventa_observ"] = 'S';
          }
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
      $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan'] != 'form_detalleventa_111121')) 
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
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      $this->link_form_detalleventa_observ_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_detalleventa_observ') . "/";
      $this->sc_lig_target["C_@scinf_desc_"] = 'nmsc_iframe_liga_form_detalleventa_observ';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_detalleventa_observ"] = 'nmsc_iframe_liga_form_detalleventa_observ';
      $this->link_grid_stock_cons = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('grid_stock') . "/";
      $this->sc_lig_target["C_@scinf_existencia_"] = 'nmsc_iframe_liga_grid_stock';
      $this->sc_lig_iframe["nmsc_iframe_liga_grid_stock"] = 'nmsc_iframe_liga_grid_stock';
      if ($_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_detalleventa_111121"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["form_detalleventa_111121"] as $sTmpTargetLink => $sTmpTargetWidget)
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
      if(function_exists('set_php_timezone'))  set_php_timezone('form_detalleventa_111121'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/fix.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_form_detalleventa_111121, $NM_run_iframe;
      if ((isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag) && $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['embutida_call']) || $NM_run_iframe == 1)
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
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcXGDuBqD1veD5FaHuBYVcBODWFYHIJeHQXGZ1F7HANOV5BqDEBeVkXeDuJeHINUDcBwDuFaZ1NaVWBOHuvmV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgveHArCV5B7ZuJsHQXOH9BiHABYHQB/DMvmVcB/DuFGDoXGHQBqZ1BOHABYHQJeHgBeVkJ3H5FGVoFGDcXGZ9F7HIrwHuF7DMzGVIBsDWrmDoXGDcNmZ1BOHAN7HQBiDMveHArCHEXKDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQBqZ1BiHArYHQX7HgBeVkJ3DurmVoFGHQNwH9FUD1veHuJwHgvOV9BUDWBmDoXGHQJmZSBqDSBeHuXGHgNOZSJqDurmVoFGHQJeDQB/HIrKHQF7DMBYVIB/HEX/VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3DuX/ZuJsHQNwZSBiHIBeHuB/HgvOVIB/H5B3DoXGHQXOZSBqHArYHuBOHgBOVkJ3DurmVoFGHQFYZ9XGDSBYHuB/HgrwDkBsDWrmDoXGHQBsH9BqZ1vOZMBqDMvCHErCDWB3DoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9FaHArKD5NUDEvsHEFiDuJeDoFUHQXGZSFGHAN7V5FUHuzGZSrCV5X7VEF7D9BiH9FaHIBOD5FaDEBeHEBUH5F/VoFGD9XsDQBOZ1rwV5BqHgvsDkFCDWJeDoFGD9XOZ1rqD1rKD5rqDMBYHEJGH5FYVoB/HQXGZ9rqD1BeD5rqHuvmVcBOH5B7VoBqD9XOH9B/D1rwD5BiDEBeHEFiV5FaDoXGD9NmDQB/Z1rwD5BqHuzGVcFiV5X/VoF7HQNwVIJsHAvCV5X7HgveDkB/DWFGVoFGHQXODQBqHIvsD5F7DMvOV9BUDWXKVEF7HQJmZ1F7Z1vmD5rqDEBOHArCDWF/HIBOHQNwZSBiHANOHuFUHuBYVIBOV5FYHMBOD9BsH9BqHArKV5FUDMrYZSXeV5FqHIJsHQXGZSX7HAN7V5JwHuzGVIBOV5FYVoJwDcJUZ1F7HArYZMB/DMBYHEXeDuFYVoX7DcBwDQFGHAN7D5JwHuNOVIFCH5XCVoB/DcNwVIJsHAzGD5BOHgveHArsDWFGDoJeHQBiDuBOZ1N7V5JeHuvmVcrsDWXCHMBiD9BsVIraD1rwV5X7HgBeHErCDWF/VoBiDcJUZSX7Z1BYHuFaHuzGVcFeHEX7DoJeD9XOZ1FaDSrYV5FGDMveHEJqDWrGZuBOD9JKDuBqD1NKVWBqDMvmVcFKV5BmVoBqD9BsZkFGHArKV5FaDErKHENiV5FaDorqD9NwH9X7Z1rwD5NUHuBOVIBODWFYHMBiD9BsVIraD1rwV5X7HgBeHErsDWrGDoBOHQBiZ9XGHAvmV5JeDMvOV9BUDWXKVENUHQJmZ1F7Z1vmD5rqDEBOHArCDWF/DoBqD9XsDuFaHAN7HQBOHgrKVIB/H5XKVoFGDcBqVIJsHArKHQJwDEBODkFeH5FYVoFGHQJKDQFaHIBeHuraDMBYDkBsV5F/HMFUHQXGZSBqD1rKHuJeDMrYHErCDWX7HMBOHQXsH9BiZ1rwHQBODMBODkBsV5FGVoFaHQBiZSBqHABYHQBqHgBeHEJqDWr/HMX7HQNmZ9rqHAveHQrqDMBYDkBsHEF/HMFUHQXGH9BqHArKV5FUDMrYZSXeV5FqHIJsHQJeDuBOZ1vCV5Je";
      $this->prep_conect();
      if (!isset($_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['ordem_cmp'])) { 
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['ordem_cmp'] = ""; 
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['ordem_ord'] = ""; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan'] != 'form_detalleventa_111121')) 
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
   }
   function prep_conect()
   {
      $con_devel             =  (isset($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_detalleventa_111121']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_detalleventa_111121']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'FACILWEBv2', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_perfil'];
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
      if (!$_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['embutida_form'] || !$_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['embutida_proc']) 
      {
          if (!isset($_SESSION['par_numfacventa'])) 
          {
              $this->nm_falta_var .= "par_numfacventa; ";
          }
          if (!isset($_SESSION['gFactsinexist'])) 
          {
              $this->nm_falta_var .= "gFactsinexist; ";
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
         $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "detalleventa"; 
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
          if (!$_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['sc_outra_jan'] != 'form_detalleventa_111121')) 
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
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv2', 1, $this->force_db_utf8); 
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
          $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['decimal_db'] = "."; 
      } 
  }

  function setConnectionHash() {
    if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao'])) {
      list($connectionDbms, $connectionHost, $connectionUser, $connectionPassword, $connectionDatabase) = db_conect_devel($_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv2', 1, $this->force_db_utf8);
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['form_detalleventa_111121']['SC_sep_date1'];
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
class form_detalleventa_111121_edit
{
    var $contr_form_detalleventa_111121;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_detalleventa_111121_apl.php");
        require_once("form_detalleventa_111121_form0.php");
        $this->contr_form_detalleventa_111121 = new form_detalleventa_111121_form();
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
    $_SESSION['scriptcase']['form_detalleventa_111121']['contr_erro'] = 'off';
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
    $sc_conv_var['numdevo'] = "numdevo_";
    $sc_conv_var['iddeta'] = "iddeta_";
    $sc_conv_var['obs'] = "obs_";
    $sc_conv_var['elcolor'] = "elcolor_";
    $sc_conv_var['elsabor'] = "elsabor_";
    $sc_conv_var['existencia'] = "existencia_";
    $sc_conv_var['latalla'] = "latalla_";
    $sc_conv_var['stockubica'] = "stockubica_";
    $sc_conv_var['unidad'] = "unidad_";
    $sc_conv_var['desc'] = "desc_";
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
             nm_limpa_str_form_detalleventa_111121($nmgp_val);
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
             nm_limpa_str_form_detalleventa_111121($nmgp_val);
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
        elseif (is_file($root . $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt")) {
            $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['form_detalleventa_111121']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt"));
        }
        if (isset($apl_def)) {
            if ($apl_def[0] != "form_detalleventa_111121") {
                $_SESSION['scriptcase']['sem_session'] = true;
                if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                    $_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir'] = $apl_def[0];
                }
                else {
                    $_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
                }
                $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
                $_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir_tp'] = $Redir_tp;
            }
            if (isset($_COOKIE['sc_actual_lang_FACILWEBv2'])) {
                $_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_FACILWEBv2'];
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
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']) && !isset($_SESSION['scriptcase']['form_detalleventa_111121']['session_timeout']['redir']))
    {
        if ('ajax_form_detalleventa_111121_validate_numfac_' == $_POST['rs'])
        {
            $numfac_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_idpro_' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_desc_' == $_POST['rs'])
        {
            $desc_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_obs_' == $_POST['rs'])
        {
            $obs_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_existencia_' == $_POST['rs'])
        {
            $existencia_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_colores_' == $_POST['rs'])
        {
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_elcolor_' == $_POST['rs'])
        {
            $elcolor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_tallas_' == $_POST['rs'])
        {
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_latalla_' == $_POST['rs'])
        {
            $latalla_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_sabor_' == $_POST['rs'])
        {
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_elsabor_' == $_POST['rs'])
        {
            $elsabor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_idbod_' == $_POST['rs'])
        {
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_unidadmayor_' == $_POST['rs'])
        {
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_stockubica_' == $_POST['rs'])
        {
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_unidad_' == $_POST['rs'])
        {
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_cantidad_' == $_POST['rs'])
        {
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_valorunit_' == $_POST['rs'])
        {
            $valorunit_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_valorpar_' == $_POST['rs'])
        {
            $valorpar_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_descuento_' == $_POST['rs'])
        {
            $descuento_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_adicional_' == $_POST['rs'])
        {
            $adicional_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_adicional1_' == $_POST['rs'])
        {
            $adicional1_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_factor_' == $_POST['rs'])
        {
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_iva_' == $_POST['rs'])
        {
            $iva_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_validate_costop_' == $_POST['rs'])
        {
            $costop_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_form_detalleventa_111121_refresh_idpro_' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_detalleventa_111121_event_cantidad__onblur' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $valorunit_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $adicional1_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $descuento_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $valorpar_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $adicional_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $iva_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_detalleventa_111121_event_cantidad__onfocus' == $_POST['rs'])
        {
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][10]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][11]);
        }
        if ('ajax_form_detalleventa_111121_event_colores__onchange' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][9]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][10]);
        }
        if ('ajax_form_detalleventa_111121_event_idbod__onblur' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][9]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][10]);
        }
        if ('ajax_form_detalleventa_111121_event_idbod__onchange' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][9]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][10]);
        }
        if ('ajax_form_detalleventa_111121_event_idpro__onchange' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $numfac_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $valorunit_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $costop_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $adicional_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $adicional1_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $descuento_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $valorpar_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $iva_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][15]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][16]);
        }
        if ('ajax_form_detalleventa_111121_event_sabor__onchange' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][9]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][10]);
        }
        if ('ajax_form_detalleventa_111121_event_tallas__onchange' == $_POST['rs'])
        {
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][9]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][10]);
        }
        if ('ajax_form_detalleventa_111121_event_unidadmayor__onchange' == $_POST['rs'])
        {
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $valorunit_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $adicional1_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $descuento_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $valorpar_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $adicional_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $iva_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][17]);
        }
        if ('ajax_form_detalleventa_111121_event_valorunit__onblur' == $_POST['rs'])
        {
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $costop_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $valorunit_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $adicional1_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $descuento_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $valorpar_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $adicional_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $iva_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][16]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][17]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][18]);
        }
        for ($iSeq = 1; $iSeq <= 100; $iSeq++)
        {
            if ('ajax_form_detalleventa_111121_autocomp_idpro_' . $iSeq == $_POST['rs'])
            {
                $idpro_ = NM_utf8_urldecode($_POST['rsargs'][0]);
                $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
            }
        }
        if ('ajax_form_detalleventa_111121_submit_form' == $_POST['rs'])
        {
            $numfac_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $idpro_ = NM_utf8_urldecode($_POST['rsargs'][1]);
            $desc_ = NM_utf8_urldecode($_POST['rsargs'][2]);
            $obs_ = NM_utf8_urldecode($_POST['rsargs'][3]);
            $existencia_ = NM_utf8_urldecode($_POST['rsargs'][4]);
            $colores_ = NM_utf8_urldecode($_POST['rsargs'][5]);
            $elcolor_ = NM_utf8_urldecode($_POST['rsargs'][6]);
            $tallas_ = NM_utf8_urldecode($_POST['rsargs'][7]);
            $latalla_ = NM_utf8_urldecode($_POST['rsargs'][8]);
            $sabor_ = NM_utf8_urldecode($_POST['rsargs'][9]);
            $elsabor_ = NM_utf8_urldecode($_POST['rsargs'][10]);
            $idbod_ = NM_utf8_urldecode($_POST['rsargs'][11]);
            $unidadmayor_ = NM_utf8_urldecode($_POST['rsargs'][12]);
            $stockubica_ = NM_utf8_urldecode($_POST['rsargs'][13]);
            $unidad_ = NM_utf8_urldecode($_POST['rsargs'][14]);
            $cantidad_ = NM_utf8_urldecode($_POST['rsargs'][15]);
            $valorunit_ = NM_utf8_urldecode($_POST['rsargs'][16]);
            $valorpar_ = NM_utf8_urldecode($_POST['rsargs'][17]);
            $descuento_ = NM_utf8_urldecode($_POST['rsargs'][18]);
            $adicional_ = NM_utf8_urldecode($_POST['rsargs'][19]);
            $adicional1_ = NM_utf8_urldecode($_POST['rsargs'][20]);
            $factor_ = NM_utf8_urldecode($_POST['rsargs'][21]);
            $iva_ = NM_utf8_urldecode($_POST['rsargs'][22]);
            $costop_ = NM_utf8_urldecode($_POST['rsargs'][23]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][24]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][25]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][26]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][27]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][28]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][29]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][30]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][31]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][32]);
        }
        if ('ajax_form_detalleventa_111121_navigate_form' == $_POST['rs'])
        {
            $iddet_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][4]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][5]);
        }
        if ('ajax_form_detalleventa_111121_add_new_line' == $_POST['rs'])
        {
            $sc_clone = NM_utf8_urldecode($_POST['rsargs'][0]);
            $sc_seq_clone = NM_utf8_urldecode($_POST['rsargs'][1]);
            $sc_seq_vert = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_detalleventa_111121_backup_line' == $_POST['rs'])
        {
            $iddet_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_row = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_form_detalleventa_111121_table_refresh' == $_POST['rs'])
        {
            $iddet_ = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][4]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][5]);
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_parms']);
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
               nm_limpa_str_form_detalleventa_111121($cadapar[1]);
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
        if (!isset($gFactsinexist) && isset($gfactsinexist)) 
        {
            $gFactsinexist = $gfactsinexist;
        }
        if (isset($gFactsinexist)) 
        {
            $_SESSION['gFactsinexist'] = $gFactsinexist;
        }
        if (isset($color_pedido)) 
        {
            $_SESSION['color_pedido'] = $color_pedido;
        }
        if (isset($talla_pedido)) 
        {
            $_SESSION['talla_pedido'] = $talla_pedido;
        }
        if (isset($sabor_pedido)) 
        {
            $_SESSION['sabor_pedido'] = $sabor_pedido;
        }
        if (isset($articulo)) 
        {
            $_SESSION['articulo'] = $articulo;
        }
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['parms']);
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
    if (isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_detalleventa_111121";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_detalleventa_111121' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_detalleventa_111121')
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_modal'] = true;
            $nm_url_saida = "form_detalleventa_111121_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan'] = true;
    }
    if (!isset($nm_apl_dependente)) {
        $nm_apl_dependente = 0;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_detalleventa_111121/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_detalleventa_111121_erro.php");
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
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['opcao'] = $nmgp_opcao ; 
        }
        if (isset($_POST["par_numfacventa"])) 
        {
            $_SESSION['par_numfacventa'] = $_POST["par_numfacventa"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['par_numfacventa']);
        }
        if (isset($_GET["par_numfacventa"])) 
        {
            $_SESSION['par_numfacventa'] = $_GET["par_numfacventa"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['par_numfacventa']);
        }
        if (isset($_POST["edit_cantidad"])) 
        {
            $_SESSION['edit_cantidad'] = $_POST["edit_cantidad"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['edit_cantidad']);
        }
        if (isset($_GET["edit_cantidad"])) 
        {
            $_SESSION['edit_cantidad'] = $_GET["edit_cantidad"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['edit_cantidad']);
        }
        if (isset($_POST["sw"])) 
        {
            $_SESSION['sw'] = $_POST["sw"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['sw']);
        }
        if (isset($_GET["sw"])) 
        {
            $_SESSION['sw'] = $_GET["sw"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['sw']);
        }
        if (isset($_POST["gFactsinexist"])) 
        {
            $_SESSION['gFactsinexist'] = $_POST["gFactsinexist"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['gFactsinexist']);
        }
        if (!isset($_POST["gFactsinexist"]) && isset($_POST["gfactsinexist"])) 
        {
            $_SESSION['gFactsinexist'] = $_POST["gfactsinexist"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['gFactsinexist']);
        }
        if (isset($_GET["gFactsinexist"])) 
        {
            $_SESSION['gFactsinexist'] = $_GET["gFactsinexist"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['gFactsinexist']);
        }
        if (!isset($_GET["gFactsinexist"]) && isset($_GET["gfactsinexist"])) 
        {
            $_SESSION['gFactsinexist'] = $_GET["gfactsinexist"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['gFactsinexist']);
        }
        if (isset($_POST["color_pedido"])) 
        {
            $_SESSION['color_pedido'] = $_POST["color_pedido"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['color_pedido']);
        }
        if (isset($_GET["color_pedido"])) 
        {
            $_SESSION['color_pedido'] = $_GET["color_pedido"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['color_pedido']);
        }
        if (isset($_POST["talla_pedido"])) 
        {
            $_SESSION['talla_pedido'] = $_POST["talla_pedido"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['talla_pedido']);
        }
        if (isset($_GET["talla_pedido"])) 
        {
            $_SESSION['talla_pedido'] = $_GET["talla_pedido"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['talla_pedido']);
        }
        if (isset($_POST["sabor_pedido"])) 
        {
            $_SESSION['sabor_pedido'] = $_POST["sabor_pedido"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['sabor_pedido']);
        }
        if (isset($_GET["sabor_pedido"])) 
        {
            $_SESSION['sabor_pedido'] = $_GET["sabor_pedido"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['sabor_pedido']);
        }
        if (isset($_POST["articulo"])) 
        {
            $_SESSION['articulo'] = $_POST["articulo"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['articulo']);
        }
        if (isset($_GET["articulo"])) 
        {
            $_SESSION['articulo'] = $_GET["articulo"];
            nm_limpa_str_form_detalleventa_111121($_SESSION['articulo']);
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_detalleventa_111121_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_detalleventa_111121_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['retorno_edit'] . "?script_case_init=" . $script_case_init;  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_detalleventa_111121_fim.php"; 
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
        if (empty($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init; 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_modal'] = true;
             $nm_url_saida = "form_detalleventa_111121_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_detalleventa_111121']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_form_detalleventa_111121 = new form_detalleventa_111121_edit();
    $inicial_form_detalleventa_111121->inicializa();

    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['select_html'] = array();
    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['select_html']['colores_'] = "class=\\\"sc-js-input scFormObjectOddMult css_colores__obj{SC_100PERC_CLASS_INPUT}\\\" style=\\\"\\\" id=\\\"id_sc_field_colores_\" . \$sc_seq_vert . \"\\\" name=\\\"colores_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: 'select', enterTab: true}\\\"";
    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['select_html']['elcolor_'] = "class=\\\"sc-js-input scFormObjectOddMult css_elcolor__obj{SC_100PERC_CLASS_INPUT}\\\" style=\\\"\\\" id=\\\"id_sc_field_elcolor_\" . \$sc_seq_vert . \"\\\" name=\\\"elcolor_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: 'select', enterTab: true}\\\"";
    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['select_html']['tallas_'] = "class=\\\"sc-js-input scFormObjectOddMult css_tallas__obj{SC_100PERC_CLASS_INPUT}\\\" style=\\\"\\\" id=\\\"id_sc_field_tallas_\" . \$sc_seq_vert . \"\\\" name=\\\"tallas_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: 'select', enterTab: true}\\\"";
    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['select_html']['latalla_'] = "class=\\\"sc-js-input scFormObjectOddMult css_latalla__obj{SC_100PERC_CLASS_INPUT}\\\" style=\\\"\\\" id=\\\"id_sc_field_latalla_\" . \$sc_seq_vert . \"\\\" name=\\\"latalla_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: 'select', enterTab: true}\\\"";
    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['select_html']['sabor_'] = "class=\\\"sc-js-input scFormObjectOddMult css_sabor__obj{SC_100PERC_CLASS_INPUT}\\\" style=\\\"\\\" id=\\\"id_sc_field_sabor_\" . \$sc_seq_vert . \"\\\" name=\\\"sabor_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: 'select', enterTab: true}\\\"";
    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['select_html']['elsabor_'] = "class=\\\"sc-js-input scFormObjectOddMult css_elsabor__obj{SC_100PERC_CLASS_INPUT}\\\" style=\\\"\\\" id=\\\"id_sc_field_elsabor_\" . \$sc_seq_vert . \"\\\" name=\\\"elsabor_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: 'select', enterTab: true}\\\"";
    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['select_html']['idbod_'] = "class=\\\"sc-js-input scFormObjectOddMult css_idbod__obj{SC_100PERC_CLASS_INPUT}\\\" style=\\\"\\\" id=\\\"id_sc_field_idbod_\" . \$sc_seq_vert . \"\\\" name=\\\"idbod_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: 'select', enterTab: true}\\\"";
    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['select_html']['unidadmayor_'] = "class=\\\"sc-js-input scFormObjectOddMult css_unidadmayor__obj{SC_100PERC_CLASS_INPUT}\\\" style=\\\"\\\" id=\\\"id_sc_field_unidadmayor_\" . \$sc_seq_vert . \"\\\" name=\\\"unidadmayor_\" . \$sc_seq_vert . \"\\\" size=\\\"1\\\" alt=\\\"{type: \\'select\\', enterTab: true}\\\"";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_detalleventa_111121_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_detalleventa_111121_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_detalleventa_111121_validate_numfac_");
    sajax_export("ajax_form_detalleventa_111121_validate_idpro_");
    sajax_export("ajax_form_detalleventa_111121_validate_desc_");
    sajax_export("ajax_form_detalleventa_111121_validate_obs_");
    sajax_export("ajax_form_detalleventa_111121_validate_existencia_");
    sajax_export("ajax_form_detalleventa_111121_validate_colores_");
    sajax_export("ajax_form_detalleventa_111121_validate_elcolor_");
    sajax_export("ajax_form_detalleventa_111121_validate_tallas_");
    sajax_export("ajax_form_detalleventa_111121_validate_latalla_");
    sajax_export("ajax_form_detalleventa_111121_validate_sabor_");
    sajax_export("ajax_form_detalleventa_111121_validate_elsabor_");
    sajax_export("ajax_form_detalleventa_111121_validate_idbod_");
    sajax_export("ajax_form_detalleventa_111121_validate_unidadmayor_");
    sajax_export("ajax_form_detalleventa_111121_validate_stockubica_");
    sajax_export("ajax_form_detalleventa_111121_validate_unidad_");
    sajax_export("ajax_form_detalleventa_111121_validate_cantidad_");
    sajax_export("ajax_form_detalleventa_111121_validate_valorunit_");
    sajax_export("ajax_form_detalleventa_111121_validate_valorpar_");
    sajax_export("ajax_form_detalleventa_111121_validate_descuento_");
    sajax_export("ajax_form_detalleventa_111121_validate_adicional_");
    sajax_export("ajax_form_detalleventa_111121_validate_adicional1_");
    sajax_export("ajax_form_detalleventa_111121_validate_factor_");
    sajax_export("ajax_form_detalleventa_111121_validate_iva_");
    sajax_export("ajax_form_detalleventa_111121_validate_costop_");
    sajax_export("ajax_form_detalleventa_111121_refresh_idpro_");
    sajax_export("ajax_form_detalleventa_111121_event_cantidad__onblur");
    sajax_export("ajax_form_detalleventa_111121_event_cantidad__onfocus");
    sajax_export("ajax_form_detalleventa_111121_event_colores__onchange");
    sajax_export("ajax_form_detalleventa_111121_event_idbod__onblur");
    sajax_export("ajax_form_detalleventa_111121_event_idbod__onchange");
    sajax_export("ajax_form_detalleventa_111121_event_idpro__onchange");
    sajax_export("ajax_form_detalleventa_111121_event_sabor__onchange");
    sajax_export("ajax_form_detalleventa_111121_event_tallas__onchange");
    sajax_export("ajax_form_detalleventa_111121_event_unidadmayor__onchange");
    sajax_export("ajax_form_detalleventa_111121_event_valorunit__onblur");
    for ($iSeq = 1; $iSeq <= 150; $iSeq++)
    {
        sajax_export("ajax_form_detalleventa_111121_autocomp_idpro_" . $iSeq);
    }
    sajax_export("ajax_form_detalleventa_111121_submit_form");
    sajax_export("ajax_form_detalleventa_111121_navigate_form");
    sajax_export("ajax_form_detalleventa_111121_add_new_line");
    sajax_export("ajax_form_detalleventa_111121_backup_line");
    sajax_export("ajax_form_detalleventa_111121_table_refresh");
    sajax_handle_client_request();

if (isset($_POST['wizard_action']) && 'change_step' == $_POST['wizard_action']) {
    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'] = true;
    ob_start();
}

    $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
//
    function nm_limpa_str_form_detalleventa_111121(&$str)
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

    function ajax_form_detalleventa_111121_validate_numfac_($numfac_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_numfac_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'numfac_' => NM_utf8_urldecode($numfac_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_numfac_

    function ajax_form_detalleventa_111121_validate_idpro_($idpro_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_idpro_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_idpro_

    function ajax_form_detalleventa_111121_validate_desc_($desc_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_desc_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'desc_' => NM_utf8_urldecode($desc_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_desc_

    function ajax_form_detalleventa_111121_validate_obs_($obs_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_obs_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'obs_' => NM_utf8_urldecode($obs_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_obs_

    function ajax_form_detalleventa_111121_validate_existencia_($existencia_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_existencia_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'existencia_' => NM_utf8_urldecode($existencia_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_existencia_

    function ajax_form_detalleventa_111121_validate_colores_($colores_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_colores_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'colores_' => NM_utf8_urldecode($colores_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_colores_

    function ajax_form_detalleventa_111121_validate_elcolor_($elcolor_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_elcolor_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'elcolor_' => NM_utf8_urldecode($elcolor_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_elcolor_

    function ajax_form_detalleventa_111121_validate_tallas_($tallas_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_tallas_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_tallas_

    function ajax_form_detalleventa_111121_validate_latalla_($latalla_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_latalla_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'latalla_' => NM_utf8_urldecode($latalla_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_latalla_

    function ajax_form_detalleventa_111121_validate_sabor_($sabor_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_sabor_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_sabor_

    function ajax_form_detalleventa_111121_validate_elsabor_($elsabor_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_elsabor_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'elsabor_' => NM_utf8_urldecode($elsabor_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_elsabor_

    function ajax_form_detalleventa_111121_validate_idbod_($idbod_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_idbod_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_idbod_

    function ajax_form_detalleventa_111121_validate_unidadmayor_($unidadmayor_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_unidadmayor_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_unidadmayor_

    function ajax_form_detalleventa_111121_validate_stockubica_($stockubica_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_stockubica_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_stockubica_

    function ajax_form_detalleventa_111121_validate_unidad_($unidad_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_unidad_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_unidad_

    function ajax_form_detalleventa_111121_validate_cantidad_($cantidad_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_cantidad_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_cantidad_

    function ajax_form_detalleventa_111121_validate_valorunit_($valorunit_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_valorunit_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'valorunit_' => NM_utf8_urldecode($valorunit_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_valorunit_

    function ajax_form_detalleventa_111121_validate_valorpar_($valorpar_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_valorpar_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'valorpar_' => NM_utf8_urldecode($valorpar_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_valorpar_

    function ajax_form_detalleventa_111121_validate_descuento_($descuento_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_descuento_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'descuento_' => NM_utf8_urldecode($descuento_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_descuento_

    function ajax_form_detalleventa_111121_validate_adicional_($adicional_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_adicional_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'adicional_' => NM_utf8_urldecode($adicional_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_adicional_

    function ajax_form_detalleventa_111121_validate_adicional1_($adicional1_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_adicional1_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'adicional1_' => NM_utf8_urldecode($adicional1_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_adicional1_

    function ajax_form_detalleventa_111121_validate_factor_($factor_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_factor_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'factor_' => NM_utf8_urldecode($factor_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_factor_

    function ajax_form_detalleventa_111121_validate_iva_($iva_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_iva_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'iva_' => NM_utf8_urldecode($iva_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_iva_

    function ajax_form_detalleventa_111121_validate_costop_($costop_, $nmgp_refresh_row, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'validate_costop_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'costop_' => NM_utf8_urldecode($costop_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_validate_costop_

    function ajax_form_detalleventa_111121_refresh_idpro_($idpro_, $nmgp_refresh_row, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'refresh_idpro_';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_refresh_idpro_

    function ajax_form_detalleventa_111121_event_cantidad__onblur($idpro_, $colores_, $tallas_, $sabor_, $valorunit_, $cantidad_, $stockubica_, $adicional1_, $descuento_, $valorpar_, $adicional_, $iva_, $idbod_, $unidadmayor_, $factor_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_cantidad__onblur';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'valorunit_' => NM_utf8_urldecode($valorunit_),
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'adicional1_' => NM_utf8_urldecode($adicional1_),
                  'descuento_' => NM_utf8_urldecode($descuento_),
                  'valorpar_' => NM_utf8_urldecode($valorpar_),
                  'adicional_' => NM_utf8_urldecode($adicional_),
                  'iva_' => NM_utf8_urldecode($iva_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_cantidad__onblur

    function ajax_form_detalleventa_111121_event_cantidad__onfocus($cantidad_, $idpro_, $idbod_, $colores_, $tallas_, $sabor_, $unidadmayor_, $factor_, $stockubica_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_cantidad__onfocus';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_cantidad__onfocus

    function ajax_form_detalleventa_111121_event_colores__onchange($idpro_, $idbod_, $colores_, $tallas_, $sabor_, $unidadmayor_, $factor_, $stockubica_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_colores__onchange';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_colores__onchange

    function ajax_form_detalleventa_111121_event_idbod__onblur($idpro_, $idbod_, $colores_, $tallas_, $sabor_, $unidadmayor_, $factor_, $stockubica_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_idbod__onblur';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_idbod__onblur

    function ajax_form_detalleventa_111121_event_idbod__onchange($idpro_, $idbod_, $colores_, $tallas_, $sabor_, $unidadmayor_, $factor_, $stockubica_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_idbod__onchange';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_idbod__onchange

    function ajax_form_detalleventa_111121_event_idpro__onchange($idpro_, $numfac_, $valorunit_, $unidadmayor_, $costop_, $factor_, $adicional_, $adicional1_, $descuento_, $valorpar_, $iva_, $cantidad_, $colores_, $tallas_, $sabor_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_idpro__onchange';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'numfac_' => NM_utf8_urldecode($numfac_),
                  'valorunit_' => NM_utf8_urldecode($valorunit_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'costop_' => NM_utf8_urldecode($costop_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'adicional_' => NM_utf8_urldecode($adicional_),
                  'adicional1_' => NM_utf8_urldecode($adicional1_),
                  'descuento_' => NM_utf8_urldecode($descuento_),
                  'valorpar_' => NM_utf8_urldecode($valorpar_),
                  'iva_' => NM_utf8_urldecode($iva_),
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_idpro__onchange

    function ajax_form_detalleventa_111121_event_sabor__onchange($idpro_, $idbod_, $colores_, $tallas_, $sabor_, $unidadmayor_, $factor_, $stockubica_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_sabor__onchange';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_sabor__onchange

    function ajax_form_detalleventa_111121_event_tallas__onchange($idpro_, $idbod_, $colores_, $tallas_, $sabor_, $unidadmayor_, $factor_, $stockubica_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_tallas__onchange';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_tallas__onchange

    function ajax_form_detalleventa_111121_event_unidadmayor__onchange($unidadmayor_, $idpro_, $valorunit_, $adicional1_, $descuento_, $valorpar_, $adicional_, $iva_, $cantidad_, $idbod_, $colores_, $tallas_, $sabor_, $factor_, $stockubica_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_unidadmayor__onchange';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'valorunit_' => NM_utf8_urldecode($valorunit_),
                  'adicional1_' => NM_utf8_urldecode($adicional1_),
                  'descuento_' => NM_utf8_urldecode($descuento_),
                  'valorpar_' => NM_utf8_urldecode($valorpar_),
                  'adicional_' => NM_utf8_urldecode($adicional_),
                  'iva_' => NM_utf8_urldecode($iva_),
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_unidadmayor__onchange

    function ajax_form_detalleventa_111121_event_valorunit__onblur($unidadmayor_, $factor_, $costop_, $valorunit_, $idpro_, $adicional1_, $descuento_, $valorpar_, $adicional_, $iva_, $cantidad_, $idbod_, $colores_, $tallas_, $sabor_, $stockubica_, $unidad_, $script_case_init, $nmgp_refresh_row)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'event_valorunit__onblur';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'unidadmayor_' => NM_utf8_urldecode($unidadmayor_),
                  'factor_' => NM_utf8_urldecode($factor_),
                  'costop_' => NM_utf8_urldecode($costop_),
                  'valorunit_' => NM_utf8_urldecode($valorunit_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'adicional1_' => NM_utf8_urldecode($adicional1_),
                  'descuento_' => NM_utf8_urldecode($descuento_),
                  'valorpar_' => NM_utf8_urldecode($valorpar_),
                  'adicional_' => NM_utf8_urldecode($adicional_),
                  'iva_' => NM_utf8_urldecode($iva_),
                  'cantidad_' => NM_utf8_urldecode($cantidad_),
                  'idbod_' => NM_utf8_urldecode($idbod_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'stockubica_' => NM_utf8_urldecode($stockubica_),
                  'unidad_' => NM_utf8_urldecode($unidad_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_event_valorunit__onblur

    function ajax_form_detalleventa_111121_autocomp_idpro_1($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_1';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_1
    function ajax_form_detalleventa_111121_autocomp_idpro_2($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_2';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_2
    function ajax_form_detalleventa_111121_autocomp_idpro_3($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_3';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_3
    function ajax_form_detalleventa_111121_autocomp_idpro_4($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_4';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_4
    function ajax_form_detalleventa_111121_autocomp_idpro_5($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_5';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_5
    function ajax_form_detalleventa_111121_autocomp_idpro_6($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_6';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_6
    function ajax_form_detalleventa_111121_autocomp_idpro_7($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_7';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_7
    function ajax_form_detalleventa_111121_autocomp_idpro_8($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_8';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_8
    function ajax_form_detalleventa_111121_autocomp_idpro_9($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_9';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_9
    function ajax_form_detalleventa_111121_autocomp_idpro_10($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_10';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_10
    function ajax_form_detalleventa_111121_autocomp_idpro_11($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_11';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_11
    function ajax_form_detalleventa_111121_autocomp_idpro_12($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_12';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_12
    function ajax_form_detalleventa_111121_autocomp_idpro_13($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_13';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_13
    function ajax_form_detalleventa_111121_autocomp_idpro_14($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_14';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_14
    function ajax_form_detalleventa_111121_autocomp_idpro_15($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_15';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_15
    function ajax_form_detalleventa_111121_autocomp_idpro_16($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_16';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_16
    function ajax_form_detalleventa_111121_autocomp_idpro_17($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_17';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_17
    function ajax_form_detalleventa_111121_autocomp_idpro_18($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_18';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_18
    function ajax_form_detalleventa_111121_autocomp_idpro_19($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_19';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_19
    function ajax_form_detalleventa_111121_autocomp_idpro_20($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_20';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_20
    function ajax_form_detalleventa_111121_autocomp_idpro_21($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_21';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_21
    function ajax_form_detalleventa_111121_autocomp_idpro_22($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_22';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_22
    function ajax_form_detalleventa_111121_autocomp_idpro_23($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_23';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_23
    function ajax_form_detalleventa_111121_autocomp_idpro_24($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_24';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_24
    function ajax_form_detalleventa_111121_autocomp_idpro_25($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_25';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_25
    function ajax_form_detalleventa_111121_autocomp_idpro_26($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_26';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_26
    function ajax_form_detalleventa_111121_autocomp_idpro_27($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_27';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_27
    function ajax_form_detalleventa_111121_autocomp_idpro_28($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_28';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_28
    function ajax_form_detalleventa_111121_autocomp_idpro_29($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_29';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_29
    function ajax_form_detalleventa_111121_autocomp_idpro_30($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_30';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_30
    function ajax_form_detalleventa_111121_autocomp_idpro_31($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_31';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_31
    function ajax_form_detalleventa_111121_autocomp_idpro_32($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_32';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_32
    function ajax_form_detalleventa_111121_autocomp_idpro_33($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_33';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_33
    function ajax_form_detalleventa_111121_autocomp_idpro_34($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_34';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_34
    function ajax_form_detalleventa_111121_autocomp_idpro_35($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_35';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_35
    function ajax_form_detalleventa_111121_autocomp_idpro_36($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_36';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_36
    function ajax_form_detalleventa_111121_autocomp_idpro_37($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_37';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_37
    function ajax_form_detalleventa_111121_autocomp_idpro_38($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_38';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_38
    function ajax_form_detalleventa_111121_autocomp_idpro_39($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_39';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_39
    function ajax_form_detalleventa_111121_autocomp_idpro_40($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_40';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_40
    function ajax_form_detalleventa_111121_autocomp_idpro_41($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_41';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_41
    function ajax_form_detalleventa_111121_autocomp_idpro_42($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_42';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_42
    function ajax_form_detalleventa_111121_autocomp_idpro_43($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_43';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_43
    function ajax_form_detalleventa_111121_autocomp_idpro_44($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_44';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_44
    function ajax_form_detalleventa_111121_autocomp_idpro_45($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_45';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_45
    function ajax_form_detalleventa_111121_autocomp_idpro_46($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_46';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_46
    function ajax_form_detalleventa_111121_autocomp_idpro_47($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_47';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_47
    function ajax_form_detalleventa_111121_autocomp_idpro_48($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_48';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_48
    function ajax_form_detalleventa_111121_autocomp_idpro_49($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_49';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_49
    function ajax_form_detalleventa_111121_autocomp_idpro_50($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_50';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_50
    function ajax_form_detalleventa_111121_autocomp_idpro_51($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_51';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_51
    function ajax_form_detalleventa_111121_autocomp_idpro_52($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_52';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_52
    function ajax_form_detalleventa_111121_autocomp_idpro_53($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_53';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_53
    function ajax_form_detalleventa_111121_autocomp_idpro_54($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_54';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_54
    function ajax_form_detalleventa_111121_autocomp_idpro_55($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_55';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_55
    function ajax_form_detalleventa_111121_autocomp_idpro_56($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_56';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_56
    function ajax_form_detalleventa_111121_autocomp_idpro_57($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_57';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_57
    function ajax_form_detalleventa_111121_autocomp_idpro_58($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_58';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_58
    function ajax_form_detalleventa_111121_autocomp_idpro_59($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_59';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_59
    function ajax_form_detalleventa_111121_autocomp_idpro_60($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_60';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_60
    function ajax_form_detalleventa_111121_autocomp_idpro_61($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_61';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_61
    function ajax_form_detalleventa_111121_autocomp_idpro_62($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_62';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_62
    function ajax_form_detalleventa_111121_autocomp_idpro_63($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_63';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_63
    function ajax_form_detalleventa_111121_autocomp_idpro_64($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_64';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_64
    function ajax_form_detalleventa_111121_autocomp_idpro_65($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_65';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_65
    function ajax_form_detalleventa_111121_autocomp_idpro_66($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_66';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_66
    function ajax_form_detalleventa_111121_autocomp_idpro_67($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_67';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_67
    function ajax_form_detalleventa_111121_autocomp_idpro_68($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_68';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_68
    function ajax_form_detalleventa_111121_autocomp_idpro_69($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_69';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_69
    function ajax_form_detalleventa_111121_autocomp_idpro_70($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_70';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_70
    function ajax_form_detalleventa_111121_autocomp_idpro_71($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_71';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_71
    function ajax_form_detalleventa_111121_autocomp_idpro_72($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_72';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_72
    function ajax_form_detalleventa_111121_autocomp_idpro_73($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_73';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_73
    function ajax_form_detalleventa_111121_autocomp_idpro_74($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_74';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_74
    function ajax_form_detalleventa_111121_autocomp_idpro_75($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_75';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_75
    function ajax_form_detalleventa_111121_autocomp_idpro_76($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_76';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_76
    function ajax_form_detalleventa_111121_autocomp_idpro_77($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_77';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_77
    function ajax_form_detalleventa_111121_autocomp_idpro_78($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_78';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_78
    function ajax_form_detalleventa_111121_autocomp_idpro_79($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_79';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_79
    function ajax_form_detalleventa_111121_autocomp_idpro_80($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_80';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_80
    function ajax_form_detalleventa_111121_autocomp_idpro_81($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_81';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_81
    function ajax_form_detalleventa_111121_autocomp_idpro_82($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_82';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_82
    function ajax_form_detalleventa_111121_autocomp_idpro_83($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_83';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_83
    function ajax_form_detalleventa_111121_autocomp_idpro_84($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_84';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_84
    function ajax_form_detalleventa_111121_autocomp_idpro_85($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_85';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_85
    function ajax_form_detalleventa_111121_autocomp_idpro_86($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_86';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_86
    function ajax_form_detalleventa_111121_autocomp_idpro_87($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_87';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_87
    function ajax_form_detalleventa_111121_autocomp_idpro_88($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_88';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_88
    function ajax_form_detalleventa_111121_autocomp_idpro_89($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_89';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_89
    function ajax_form_detalleventa_111121_autocomp_idpro_90($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_90';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_90
    function ajax_form_detalleventa_111121_autocomp_idpro_91($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_91';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_91
    function ajax_form_detalleventa_111121_autocomp_idpro_92($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_92';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_92
    function ajax_form_detalleventa_111121_autocomp_idpro_93($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_93';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_93
    function ajax_form_detalleventa_111121_autocomp_idpro_94($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_94';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_94
    function ajax_form_detalleventa_111121_autocomp_idpro_95($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_95';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_95
    function ajax_form_detalleventa_111121_autocomp_idpro_96($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_96';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_96
    function ajax_form_detalleventa_111121_autocomp_idpro_97($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_97';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_97
    function ajax_form_detalleventa_111121_autocomp_idpro_98($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_98';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_98
    function ajax_form_detalleventa_111121_autocomp_idpro_99($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_99';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_99
    function ajax_form_detalleventa_111121_autocomp_idpro_100($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_100';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_100
    function ajax_form_detalleventa_111121_autocomp_idpro_101($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_101';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_101
    function ajax_form_detalleventa_111121_autocomp_idpro_102($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_102';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_102
    function ajax_form_detalleventa_111121_autocomp_idpro_103($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_103';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_103
    function ajax_form_detalleventa_111121_autocomp_idpro_104($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_104';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_104
    function ajax_form_detalleventa_111121_autocomp_idpro_105($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_105';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_105
    function ajax_form_detalleventa_111121_autocomp_idpro_106($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_106';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_106
    function ajax_form_detalleventa_111121_autocomp_idpro_107($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_107';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_107
    function ajax_form_detalleventa_111121_autocomp_idpro_108($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_108';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_108
    function ajax_form_detalleventa_111121_autocomp_idpro_109($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_109';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_109
    function ajax_form_detalleventa_111121_autocomp_idpro_110($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_110';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_110
    function ajax_form_detalleventa_111121_autocomp_idpro_111($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_111';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_111
    function ajax_form_detalleventa_111121_autocomp_idpro_112($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_112';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_112
    function ajax_form_detalleventa_111121_autocomp_idpro_113($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_113';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_113
    function ajax_form_detalleventa_111121_autocomp_idpro_114($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_114';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_114
    function ajax_form_detalleventa_111121_autocomp_idpro_115($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_115';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_115
    function ajax_form_detalleventa_111121_autocomp_idpro_116($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_116';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_116
    function ajax_form_detalleventa_111121_autocomp_idpro_117($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_117';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_117
    function ajax_form_detalleventa_111121_autocomp_idpro_118($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_118';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_118
    function ajax_form_detalleventa_111121_autocomp_idpro_119($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_119';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_119
    function ajax_form_detalleventa_111121_autocomp_idpro_120($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_120';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_120
    function ajax_form_detalleventa_111121_autocomp_idpro_121($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_121';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_121
    function ajax_form_detalleventa_111121_autocomp_idpro_122($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_122';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_122
    function ajax_form_detalleventa_111121_autocomp_idpro_123($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_123';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_123
    function ajax_form_detalleventa_111121_autocomp_idpro_124($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_124';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_124
    function ajax_form_detalleventa_111121_autocomp_idpro_125($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_125';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_125
    function ajax_form_detalleventa_111121_autocomp_idpro_126($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_126';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_126
    function ajax_form_detalleventa_111121_autocomp_idpro_127($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_127';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_127
    function ajax_form_detalleventa_111121_autocomp_idpro_128($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_128';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_128
    function ajax_form_detalleventa_111121_autocomp_idpro_129($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_129';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_129
    function ajax_form_detalleventa_111121_autocomp_idpro_130($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_130';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_130
    function ajax_form_detalleventa_111121_autocomp_idpro_131($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_131';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_131
    function ajax_form_detalleventa_111121_autocomp_idpro_132($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_132';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_132
    function ajax_form_detalleventa_111121_autocomp_idpro_133($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_133';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_133
    function ajax_form_detalleventa_111121_autocomp_idpro_134($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_134';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_134
    function ajax_form_detalleventa_111121_autocomp_idpro_135($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_135';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_135
    function ajax_form_detalleventa_111121_autocomp_idpro_136($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_136';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_136
    function ajax_form_detalleventa_111121_autocomp_idpro_137($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_137';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_137
    function ajax_form_detalleventa_111121_autocomp_idpro_138($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_138';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_138
    function ajax_form_detalleventa_111121_autocomp_idpro_139($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_139';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_139
    function ajax_form_detalleventa_111121_autocomp_idpro_140($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_140';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_140
    function ajax_form_detalleventa_111121_autocomp_idpro_141($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_141';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_141
    function ajax_form_detalleventa_111121_autocomp_idpro_142($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_142';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_142
    function ajax_form_detalleventa_111121_autocomp_idpro_143($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_143';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_143
    function ajax_form_detalleventa_111121_autocomp_idpro_144($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_144';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_144
    function ajax_form_detalleventa_111121_autocomp_idpro_145($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_145';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_145
    function ajax_form_detalleventa_111121_autocomp_idpro_146($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_146';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_146
    function ajax_form_detalleventa_111121_autocomp_idpro_147($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_147';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_147
    function ajax_form_detalleventa_111121_autocomp_idpro_148($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_148';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_148
    function ajax_form_detalleventa_111121_autocomp_idpro_149($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_149';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_149
    function ajax_form_detalleventa_111121_autocomp_idpro_150($idpro_, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'autocomp_idpro_150';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_'] = utf8_decode(urldecode($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['idpro_']));
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_autocomp_idpro_150

    function ajax_form_detalleventa_111121_submit_form($numfac_, $idpro_, $desc_, $obs_, $existencia_, $colores_, $elcolor_, $tallas_, $latalla_, $sabor_, $elsabor_, $idbod_, $unidadmayor_, $stockubica_, $unidad_, $cantidad_, $valorunit_, $valorpar_, $descuento_, $adicional_, $adicional1_, $factor_, $iva_, $costop_, $nmgp_refresh_row, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'submit_form';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'numfac_' => NM_utf8_urldecode($numfac_),
                  'idpro_' => NM_utf8_urldecode($idpro_),
                  'desc_' => NM_utf8_urldecode($desc_),
                  'obs_' => NM_utf8_urldecode($obs_),
                  'existencia_' => NM_utf8_urldecode($existencia_),
                  'colores_' => NM_utf8_urldecode($colores_),
                  'elcolor_' => NM_utf8_urldecode($elcolor_),
                  'tallas_' => NM_utf8_urldecode($tallas_),
                  'latalla_' => NM_utf8_urldecode($latalla_),
                  'sabor_' => NM_utf8_urldecode($sabor_),
                  'elsabor_' => NM_utf8_urldecode($elsabor_),
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
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_detalleventa_111121_navigate_form($iddet_, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'iddet_' => NM_utf8_urldecode($iddet_),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_navigate_form

    function ajax_form_detalleventa_111121_add_new_line($sc_clone, $sc_seq_clone, $sc_seq_vert, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'add_new_line';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'sc_clone' => NM_utf8_urldecode($sc_clone),
                  'sc_seq_clone' => NM_utf8_urldecode($sc_seq_clone),
                  'sc_seq_vert' => NM_utf8_urldecode($sc_seq_vert),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_add_new_line

    function ajax_form_detalleventa_111121_backup_line($iddet_, $nmgp_refresh_row, $nm_form_submit, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'backup_line';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'iddet_' => NM_utf8_urldecode($iddet_),
                  'nmgp_refresh_row' => NM_utf8_urldecode($nmgp_refresh_row),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_backup_line

    function ajax_form_detalleventa_111121_table_refresh($iddet_, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_detalleventa_111121;
        //register_shutdown_function("form_detalleventa_111121_pack_ajax_response");
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_flag          = true;
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao         = 'table_refresh';
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param'] = array(
                  'iddet_' => NM_utf8_urldecode($iddet_),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->controle();
        exit;
    } // ajax_table_refresh


   function form_detalleventa_111121_pack_ajax_response()
   {
      global $inicial_form_detalleventa_111121;
      $aResp = array();

      if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['wizard']))
      {
          $aResp['wizard'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['wizard'];
      }
      if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_detalleventa_111121_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_detalleventa_111121_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_detalleventa_111121_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_detalleventa_111121_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_detalleventa_111121_pack_protect_string($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_detalleventa_111121_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['focus']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['closeLine']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['clearUpload']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['btnDisabled']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['btnDisabled'])
         {
            form_detalleventa_111121_pack_btn_disabled($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['btnLabel']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['btnLabel'])
         {
            form_detalleventa_111121_pack_btn_label($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['varList']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['varList']))
         {
            form_detalleventa_111121_pack_var_list($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['masterValue']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['masterValue'])
         {
            form_detalleventa_111121_pack_master_value($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxAlert'])
         {
            form_detalleventa_111121_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage'])
         {
            form_detalleventa_111121_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxJavascript'])
         {
            form_detalleventa_111121_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir']))
         {
            form_detalleventa_111121_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redirExit']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redirExit']))
         {
            form_detalleventa_111121_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['blockDisplay']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['blockDisplay']))
         {
            form_detalleventa_111121_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['fieldDisplay']))
         {
            form_detalleventa_111121_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['buttonDisplay'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->nmgp_botoes;
            form_detalleventa_111121_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['buttonDisplayVert']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['buttonDisplayVert']))
         {
            form_detalleventa_111121_pack_ajax_button_display_vert($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['fieldLabel']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['fieldLabel']))
         {
            form_detalleventa_111121_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['readOnly']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['readOnly']))
         {
            form_detalleventa_111121_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navStatus']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navStatus']))
         {
            form_detalleventa_111121_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navSummary']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navSummary']))
         {
            form_detalleventa_111121_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navPage']))
         {
            form_detalleventa_111121_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['btnVars']) && !empty($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['btnVars']))
         {
            form_detalleventa_111121_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['quickSearchRes']) && $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['event_field']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['event_field'])
         {
            $aResp['eventField'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['event_field'];
         }
         else
         {
            $aResp['eventField'] = '__SC_NO_FIELD';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output']) && $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_detalleventa_111121_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
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
   } // form_detalleventa_111121_pack_ajax_response

   function form_detalleventa_111121_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['calendarReload'] = 'OK';
   } // form_detalleventa_111121_pack_calendar_reload

   function form_detalleventa_111121_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['errList'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_detalleventa_111121' == $sField)
         {
             $aMsg = form_detalleventa_111121_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_detalleventa_111121' != $sField)
                       ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_detalleventa_111121_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_detalleventa_111121_pack_ajax_errors

   function form_detalleventa_111121_pack_ajax_remove_erros($aErrors)
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
   } // form_detalleventa_111121_pack_ajax_remove_erros

   function form_detalleventa_111121_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $iNumLinha = (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_detalleventa_111121_pack_protect_string($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_detalleventa_111121_pack_ajax_ok

   function form_detalleventa_111121_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $iNumLinha = (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['fldList'] as $sField => $aData)
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
            $aField['imgFile'] = form_detalleventa_111121_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_detalleventa_111121_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_detalleventa_111121_pack_protect_string($aData['imgLink']);
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
            $aField['docLink'] = form_detalleventa_111121_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_detalleventa_111121_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['docReadonly']))
         {
            $aField['docReadonly'] = form_detalleventa_111121_pack_protect_string($aData['docReadonly']);
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
            $aField['imgHtml'] = form_detalleventa_111121_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_detalleventa_111121_pack_protect_string($aData['mulHtml']);
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
               $aValue['label'] = form_detalleventa_111121_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_detalleventa_111121_pack_protect_string($sValue) : $sValue;
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
                     $aField['optList'][] = array('value' => form_detalleventa_111121_pack_protect_string($sOpt),
                                                  'label' => form_detalleventa_111121_pack_protect_string($sLabel));
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
   } // form_detalleventa_111121_pack_ajax_set_fields

   function form_detalleventa_111121_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_detalleventa_111121_pack_ajax_redir

   function form_detalleventa_111121_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_detalleventa_111121_pack_ajax_redir_exit

   function form_detalleventa_111121_pack_var_list(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['varList'] as $varData)
      {
         $aResp['varList'][] = array('index' => key($varData),
                                      'value' => current($varData));
      }
   } // form_detalleventa_111121_pack_var_list

   function form_detalleventa_111121_pack_master_value(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_detalleventa_111121_pack_master_value

   function form_detalleventa_111121_pack_btn_disabled(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['btnDisabled'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['btnDisabled'] as $btnName => $btnStatus) {
        $aResp['btnDisabled'][$btnName] = $btnStatus;
      }
   } // form_detalleventa_111121_pack_ajax_alert

   function form_detalleventa_111121_pack_btn_label(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['btnLabel'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['btnLabel'] as $btnName => $btnLabel) {
        $aResp['btnLabel'][$btnName] = $btnLabel;
      }
   } // form_detalleventa_111121_pack_ajax_alert

   function form_detalleventa_111121_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['ajaxAlert'] = array('message' => $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxAlert']['message'], 'params' =>  $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxAlert']['params']);
   } // form_detalleventa_111121_pack_ajax_alert

   function form_detalleventa_111121_pack_ajax_message(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['ajaxMessage'] = array('message'      => form_detalleventa_111121_pack_protect_string($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_detalleventa_111121_pack_protect_string($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'toast'        => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['toast'])        ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['toast']        : 'N',
                                    'toast_pos'    => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['toast_pos'])    ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['toast_pos']    : '',
                                    'type'         => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['type'])         ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['type']         : '',
                                    'redir_target' => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_detalleventa_111121_pack_ajax_message

   function form_detalleventa_111121_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_detalleventa_111121_pack_ajax_javascript

   function form_detalleventa_111121_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_detalleventa_111121_pack_ajax_block_display

   function form_detalleventa_111121_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_detalleventa_111121_pack_ajax_field_display

   function form_detalleventa_111121_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_detalleventa_111121_pack_ajax_button_display

   function form_detalleventa_111121_pack_ajax_button_display_vert(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['buttonDisplayVert'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['buttonDisplayVert'] as $aButtonData)
      {
        $aResp['buttonDisplayVert'][] = $aButtonData;
      }
   } // form_detalleventa_111121_pack_ajax_button_display

   function form_detalleventa_111121_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_detalleventa_111121_pack_protect_string($sFieldLabel));
      }
   } // form_detalleventa_111121_pack_ajax_field_label

   function form_detalleventa_111121_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_detalleventa_111121_pack_ajax_readonly

   function form_detalleventa_111121_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navStatus']['ava'];
      }
   } // form_detalleventa_111121_pack_ajax_nav_status

   function form_detalleventa_111121_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navSummary']['reg_tot'];
   } // form_detalleventa_111121_pack_ajax_nav_Summary

   function form_detalleventa_111121_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['navPage'] = $inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['navPage'];
   } // form_detalleventa_111121_pack_ajax_navPage


   function form_detalleventa_111121_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_detalleventa_111121;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_detalleventa_111121->contr_form_detalleventa_111121->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_detalleventa_111121_pack_protect_string($sBtnValue));
      }
   } // form_detalleventa_111121_pack_ajax_btn_vars

   function form_detalleventa_111121_pack_protect_string($sString)
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
   } // form_detalleventa_111121_pack_protect_string
?>
