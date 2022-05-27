<?php
//
   if (!session_id())
   {
   include_once('terceros_06052022_session.php');
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
       if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
       {
          include_once('terceros_06052022_mob.php');
          exit;
       }
   }

   $_SESSION['scriptcase']['terceros_06052022']['error_buffer'] = '';

   $_SESSION['scriptcase']['terceros_06052022']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_cache']  = "";
   $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_doc']        = "";
   $_SESSION['scriptcase']['terceros_06052022']['glo_con_conn_facilweb']         = "conn_facilweb";
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
   if(empty($_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check img
   if(empty($_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imagens']))
   {
           /*check img*/$_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //check cache
   if(empty($_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_cache']))
   {
           /*check cache*/$_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
   }
   //check doc
   if(empty($_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_doc']))
   {
           /*check doc*/$_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
   }
   //end check publication with the prod
//
class terceros_06052022_ini
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
   var $link_grid_codigo_postal_cons;
   var $link_form_direccion_edit;
   var $link_form_det_trib_x_tercero_edit;
   var $link_form_resp_trib_x_tercero_edit;
   var $link_form_ciiu_tercero_edit;
   var $link_form_zona_clientes_edit;
   var $link_form_clasificacion_clientes_edit;
   var $link_grid_gestor_archivos_tercero_cons;
   var $link_terceros_06052022_inline;
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
   var $nm_db_conn_facilweb;
   var $nm_con_conn_facilweb = array();
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
      $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "terceros_06052022"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "FACILWEBv2"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "edgar"; 
      $this->nm_script_by    = "netmake"; 
      $this->nm_script_type  = "PHP"; 
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20171205"; 
      $this->nm_hr_criacao   = "171843"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20220511"; 
      $this->nm_hr_ult_alt   = "110652"; 
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
      $this->path_prod       = $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imag_temp'];
      $this->path_cache      = $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_doc'];
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/terceros_06052022';
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
      if (isset($_SESSION['scriptcase']['terceros_06052022']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['terceros_06052022']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['terceros_06052022']['actual_lang']) || $_SESSION['scriptcase']['terceros_06052022']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['terceros_06052022']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_FACILWEBv2',$this->str_lang,'0','/');
      }
      global $inicial_terceros_06052022;
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
                  if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag) && $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag)
                  {
                      $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      terceros_06052022_pack_ajax_response();
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
          unset($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      $_SESSION['scriptcase']['charset'] = "UTF-8";
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
      if (isset($_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir_tp'] == "R") {
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
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['terceros_06052022']['session_timeout']);
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
          $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']['action']  = "./";
          $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']['target']  = "_self";
          $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']['metodo']  = "post";
          $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
          terceros_06052022_pack_ajax_response();
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir']))
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
      $Tmp_apl_lig = "form_direccion";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_direccion_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_direccion_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_direccion_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_direccion_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_direccion"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_zona_clientes";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_zona_clientes_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_zona_clientes_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_zona_clientes_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_zona_clientes_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_zona_clientes"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_clasificacion_clientes";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_clasificacion_clientes_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_clasificacion_clientes_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_clasificacion_clientes_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_clasificacion_clientes_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_clasificacion_clientes"] = 'S';
          }
      }
      $Tmp_apl_lig = "grid_codigo_postal";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/grid_codigo_postal_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/grid_codigo_postal_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_codigo_postal_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_codigo_postal_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["grid_codigo_postal"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_det_trib_x_tercero";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_det_trib_x_tercero_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_det_trib_x_tercero_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_det_trib_x_tercero_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_det_trib_x_tercero_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_det_trib_x_tercero"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_resp_trib_x_tercero";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_resp_trib_x_tercero_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_resp_trib_x_tercero_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_resp_trib_x_tercero_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_resp_trib_x_tercero_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_resp_trib_x_tercero"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_ciiu_tercero";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_ciiu_tercero_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_ciiu_tercero_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_ciiu_tercero_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_ciiu_tercero_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_ciiu_tercero"] = 'S';
          }
      }
      $Tmp_apl_lig = "grid_gestor_archivos_tercero";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/grid_gestor_archivos_tercero_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/grid_gestor_archivos_tercero_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_gestor_archivos_tercero_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/grid_gestor_archivos_tercero_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["grid_gestor_archivos_tercero"] = 'S';
          }
      }
      $Tmp_apl_lig = "form_direccion";
      if (is_file($this->root . $this->path_link . "_lib/friendly_url/form_direccion_ini.txt"))
      {
          $Friendly = file($this->root . $this->path_link . "_lib/friendly_url/form_direccion_ini.txt");
          if (isset($Friendly[0]) && !empty($Friendly[0]))
          {
              $Tmp_apl_lig = trim($Friendly[0]);
          }
      }
      if (is_file($this->root . $this->path_link . $Tmp_apl_lig . "/form_direccion_ini.txt"))
      {
          $L_md5 = file($this->root . $this->path_link . $Tmp_apl_lig . "/form_direccion_ini.txt");
          if (isset($L_md5[6]) && trim($L_md5[6]) == "LigMd5")
          {
              $this->sc_lig_md5["form_direccion"] = 'S';
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
      $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['terceros_06052022']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan'] != 'terceros_06052022')) 
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      $this->link_grid_codigo_postal_cons = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('grid_codigo_postal') . "/";
      $this->sc_lig_target["C_@scinf_c_postal"] = 'nmsc_iframe_liga_grid_codigo_postal';
      $this->sc_lig_iframe["nmsc_iframe_liga_grid_codigo_postal"] = 'nmsc_iframe_liga_grid_codigo_postal';
      $this->link_form_direccion_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_direccion') . "/";
      $this->sc_lig_target["C_@scinf_direcciones"] = 'nmsc_iframe_liga_form_direccion';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_direccion"] = 'nmsc_iframe_liga_form_direccion';
      $this->link_form_det_trib_x_tercero_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_det_trib_x_tercero') . "/";
      $this->sc_lig_target["C_@scinf_detalle_tributario"] = 'nmsc_iframe_liga_form_det_trib_x_tercero';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_det_trib_x_tercero"] = 'nmsc_iframe_liga_form_det_trib_x_tercero';
      $this->link_form_resp_trib_x_tercero_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_resp_trib_x_tercero') . "/";
      $this->sc_lig_target["C_@scinf_responsabilidad_fiscal"] = 'nmsc_iframe_liga_form_resp_trib_x_tercero';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_resp_trib_x_tercero"] = 'nmsc_iframe_liga_form_resp_trib_x_tercero';
      $this->link_form_ciiu_tercero_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_ciiu_tercero') . "/";
      $this->sc_lig_target["C_@scinf_ciiu"] = 'nmsc_iframe_liga_form_ciiu_tercero';
      $this->sc_lig_iframe["nmsc_iframe_liga_form_ciiu_tercero"] = 'nmsc_iframe_liga_form_ciiu_tercero';
      $this->link_form_zona_clientes_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_zona_clientes') . "/";
      $this->link_form_clasificacion_clientes_edit = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_clasificacion_clientes') . "/";
      $this->link_grid_gestor_archivos_tercero_cons = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('grid_gestor_archivos_tercero') . "/";
      $this->sc_lig_target["C_@scinf_Archivos"] = 'nmsc_iframe_liga_grid_gestor_archivos_tercero';
      $this->sc_lig_iframe["nmsc_iframe_liga_grid_gestor_archivos_tercero"] = 'nmsc_iframe_liga_grid_gestor_archivos_tercero';
      $this->link_terceros_06052022_inline = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('terceros_06052022') . "/terceros_06052022_inline.php";
      if ($_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["terceros_06052022"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["terceros_06052022"] as $sTmpTargetLink => $sTmpTargetWidget)
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
      if(function_exists('set_php_timezone'))  set_php_timezone('terceros_06052022'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/fix.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_terceros_06052022, $NM_run_iframe;
      if ((isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag) && $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['embutida_call']) || $NM_run_iframe == 1)
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
      if (!function_exists("SC_Mail_Image"))
      {
          include_once("terceros_06052022_sc_mail_image.php");
      }
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
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcBiDuFaD1BeV5BOHuBOVcFKDurGVoFGHQXGZSFaHANOHuBOHgBeHEFiV5B3DoF7D9XsDuFaHANKV5BODMvmVcFKV5BmVoBqD9BsZkFGHAvsZMB/DEvsHArsDWFqZuJeHQNwZSFGHIrKHuBqHgvsVIB/DuX7VEBiHQNwH9BqHAN7HQFUHgBeZSJqDWX7HIB/HQJKDQJsZ1vCV5FGHuNOV9FeDWXCDoraD9XOZ1X7Z1BeD5F7DErKVkXeV5FaVoBiD9FYH9X7HABYHuFaHuNOZSrCH5FqDoXGHQJmZ1FUZ1BeZMB/DMzGHEJGDWr/DoF7DcBwDQFGHANOV5JwHuzGDkB/V5FGVorqHQNwVINUHAvsZMFaHgveDkXKDWBmDoJeHQBiZ9JeZ1N7V5JeHuvmVcrsDWXCHMBiD9BsVIraD1rwV5X7HgBeHEFiDWX7HIFGHQXsDQFGDSvCVWJeDMzGVIBOV5F/HIraHQJmZ1F7Z1vmD5rqDEBOHArCDWF/HMBqHQJeZ9XGHAN7HuraDMBOV9FeDWFaHMF7HQFYZkBiDSrYHuJsDMveHArCDWr/HIFUHQXGDQFUHINaVWXGDMvmDkBsHEF/HMJeHQFYZ1BODSrYHuFGHgBOHEJqHEFqHMB/DcJUZSX7HIBeD5BqHgvsZSJ3H5FqHMBqHQBqVINUHINKZMFaHgBeZSJ3DWr/HIrqHQXGDuFaDSN7HQNUHgrwVcB/HEX/VErqHQFYZkFGHAN7HuFaHgvsVkJqH5FYHIJeHQXGDuBqHIrKHuBODMBODkBsV5F/HMFGDcBwH9B/HIrwV5JeDMBYDkBsH5FYHMBOHQJeH9BiDSrwHQJeDMvmVcB/HEF/HIJsHQFYZkFGDSNOHQBiHgvsHArCDWXCHIrqHQXGDQFUHAvmVWBqDMvmVcB/DuX7HMJeHQFYZkFGHIBeHuBOHgNKVkJqH5F/HINUDcJUZSX7HIBeD5BqHgvsZSJ3H5FqVoFGDcBqH9BOZ1BeD5BqDMBYHEJGH5F/VoJeDcXOZ9rqZ1rwVWJeHgvsVcFCDWrmVoraD9BiH9FaHIBeZMBOHgvCZSXeDuJeZuFaD9XsDQX7HIBOV5JwHuzGDkBOH5FqVoX7D9JmZ1FaHArKZMB/DMBYZSXeDWX7DoXGDcBwDuBOZ1NaV5FGHuNOVcFKHEFYVoBqDcBwH9FaD1rwD5rqDMNKZSXeDuJeDoB/D9NwZSFGD1veV5raHuvmVcFCDWB3DoXGHQNmZkBiHIBOD5XGHgvCHArsH5X/DoBqHQXGDuBqD1NKVWBODMrwV9BUDWXKVoF7HQNwH9BqHArKV5FUDMrYZSXeV5FqHIJsHQBiZ9XGHANKV5BODMvOZSNiDWB3VEraHQNmVINUHIBeHQJwDEBODkFeH5FYVoFGHQJKDQJwHANOV5FGHuNOV9FeV5X7DoFGHQJmZSBqZ1NOHuFaDMvCHErCV5B3DoXGDcJeZSBiHIrKHQFaDMvmVcFKV5BmVoBqD9BsZkFGHArKHuBqHgBOHArCV5FaHMJeHQJKDQFUHANOHuNUDMBYZSJ3DWXCHMFUHQBiZ1FGHANOHuJeHgvsVkJqH5FYHMXGDcJUDQFaZ1N7HuB/HgrwVIBsDWFaHIJeHQXGZSBqZ1BOD5raHgNOVkJ3V5FaHMFaHQJKDQFUD1BeHuFaHuNOZSrCH5FqDoXGHQJmZ1BiDSvOV5FUHgveHEBOV5JeZura";
      $this->prep_conect();
      if (isset($_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['initialize']) && $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['initialize'])  
      { 
      }
   }

   function init2()
   {
      if (isset($_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['initialize']) && $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['initialize'])  
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_06052022']['initialize'] = false;
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
          if (!$_SESSION['sc_session'][$script_case_init]['terceros_06052022']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan'] != 'terceros_06052022')) 
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
      $con_devel             =  (isset($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao']) && $_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['terceros_06052022']['glo_nm_perfil']) && $_SESSION['scriptcase']['terceros_06052022']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['terceros_06052022']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['terceros_06052022']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['terceros_06052022']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao']))
      {
          db_conect_devel('conn_facilweb', $this->root . $this->path_prod, 'FACILWEBv2', 2, $this->force_db_utf8); 
          $this->nm_con_conn_facilweb['servidor'] = $_SESSION['scriptcase']['glo_servidor'];
          $this->nm_con_conn_facilweb['usuario']  = $_SESSION['scriptcase']['glo_usuario'];
          $this->nm_con_conn_facilweb['banco']    = $_SESSION['scriptcase']['glo_banco'];
          $this->nm_con_conn_facilweb['senha']    = $_SESSION['scriptcase']['glo_senha'];
          $this->nm_con_conn_facilweb['tpbanco']  = $_SESSION['scriptcase']['glo_tpbanco'];
          $this->nm_con_conn_facilweb['decimal']  = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_facilweb['SC_sep_date'] = $_SESSION['scriptcase']['glo_date_separator'];
          $this->nm_con_conn_facilweb['protect']  = "S";
          $this->nm_con_conn_facilweb['database_encoding']  = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'FACILWEBv2', 2, $this->force_db_utf8); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['terceros_06052022']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['terceros_06052022']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['terceros_06052022']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($_SESSION['scriptcase']['terceros_06052022']['glo_con_conn_facilweb'], $this->path_libs, "S");
          $this->nm_con_conn_facilweb['servidor'] = $_SESSION['scriptcase']['glo_servidor'];
          $this->nm_con_conn_facilweb['usuario']  = $_SESSION['scriptcase']['glo_usuario'];
          $this->nm_con_conn_facilweb['banco']    = $_SESSION['scriptcase']['glo_banco'];
          $this->nm_con_conn_facilweb['senha']    = $_SESSION['scriptcase']['glo_senha'];
          $this->nm_con_conn_facilweb['tpbanco']  = $_SESSION['scriptcase']['glo_tpbanco'];
          $this->nm_con_conn_facilweb['decimal']  = $_SESSION['scriptcase']['glo_decimal_db'];
          $this->nm_con_conn_facilweb['SC_sep_date'] = $_SESSION['scriptcase']['glo_date_separator'];
          $this->nm_con_conn_facilweb['protect']  = $_SESSION['scriptcase']['glo_senha_protect'];
          $this->nm_con_conn_facilweb['database_encoding']  = isset($_SESSION['scriptcase']['glo_database_encoding'])?$_SESSION['scriptcase']['glo_database_encoding']:'';
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
      if (!$_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['embutida_form'] || !$_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['embutida_proc']) 
      {
          if (!isset($_SESSION['gnit'])) 
          {
              $this->nm_falta_var .= "gnit; ";
          }
          if (!isset($_SESSION['gidtercero'])) 
          {
              $this->nm_falta_var .= "gidtercero; ";
          }
          if (!isset($_SESSION['gurl_reg_empresa'])) 
          {
              $this->nm_falta_var .= "gurl_reg_empresa; ";
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
         $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
          {
              $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date1'];
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "terceros"; 
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
          if (!$_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['sc_outra_jan'] != 'terceros_06052022')) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv2', 1, $this->force_db_utf8); 
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
          $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['decimal_db'] = "."; 
      } 
  }
// 
   function conectExtra()
   {
      $database_encodding = $this->force_db_utf8 ? 'utf8' : $this->nm_con_conn_facilweb['database_encoding'];
      $this->nm_db_conn_facilweb = db_conect($this->nm_con_conn_facilweb['tpbanco'], $this->nm_con_conn_facilweb['servidor'], $this->nm_con_conn_facilweb['usuario'], $this->nm_con_conn_facilweb['senha'], $this->nm_con_conn_facilweb['banco'], $this->nm_con_conn_facilweb['protect'], 'S', 'N', '', $database_encodding);
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
      if (in_array(strtolower($this->nm_con_conn_facilweb['tpbanco']), $this->nm_bases_db2))
      {
          $this->nm_db_conn_facilweb->fetchMode = ADODB_FETCH_NUM;
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
   }

  function setConnectionHash() {
    if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao'])) {
      list($connectionDbms, $connectionHost, $connectionUser, $connectionPassword, $connectionDatabase) = db_conect_devel($_SESSION['scriptcase']['terceros_06052022']['glo_nm_conexao'], $this->root . $this->path_prod, 'FACILWEBv2', 1, $this->force_db_utf8);
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['terceros_06052022']['SC_sep_date1'];
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
class terceros_06052022_edit
{
    var $contr_terceros_06052022;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("terceros_06052022_apl.php");
        $this->contr_terceros_06052022 = new terceros_06052022_apl();
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
    $_SESSION['scriptcase']['terceros_06052022']['contr_erro'] = 'off';
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
             nm_limpa_str_terceros_06052022($nmgp_val);
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
             nm_limpa_str_terceros_06052022($nmgp_val);
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
        elseif (is_file($root . $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt")) {
            $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['terceros_06052022']['glo_nm_path_imag_temp'] . "/sc_apl_default_FACILWEBv2.txt"));
        }
        if (isset($apl_def)) {
            if ($apl_def[0] != "terceros_06052022") {
                $_SESSION['scriptcase']['sem_session'] = true;
                if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                    $_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir'] = $apl_def[0];
                }
                else {
                    $_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
                }
                $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
                $_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir_tp'] = $Redir_tp;
            }
            if (isset($_COOKIE['sc_actual_lang_FACILWEBv2'])) {
                $_SESSION['scriptcase']['terceros_06052022']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_FACILWEBv2'];
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
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']) && !isset($_SESSION['scriptcase']['terceros_06052022']['session_timeout']['redir']))
    {
        if ('ajax_terceros_06052022_validate_tipo' == $_POST['rs'])
        {
            $tipo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_regimen' == $_POST['rs'])
        {
            $regimen = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_tipo_documento' == $_POST['rs'])
        {
            $tipo_documento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_documento' == $_POST['rs'])
        {
            $documento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_dv' == $_POST['rs'])
        {
            $dv = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_codigo_tercero' == $_POST['rs'])
        {
            $codigo_tercero = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_sexo' == $_POST['rs'])
        {
            $sexo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_notificar' == $_POST['rs'])
        {
            $notificar = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_nombre1' == $_POST['rs'])
        {
            $nombre1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_nombre2' == $_POST['rs'])
        {
            $nombre2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_apellido1' == $_POST['rs'])
        {
            $apellido1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_apellido2' == $_POST['rs'])
        {
            $apellido2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_tel_cel' == $_POST['rs'])
        {
            $tel_cel = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_urlmail' == $_POST['rs'])
        {
            $urlmail = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_idtercero' == $_POST['rs'])
        {
            $idtercero = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_r_social' == $_POST['rs'])
        {
            $r_social = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_nombres' == $_POST['rs'])
        {
            $nombres = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_nombre_comercil' == $_POST['rs'])
        {
            $nombre_comercil = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_representante' == $_POST['rs'])
        {
            $representante = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_direccion' == $_POST['rs'])
        {
            $direccion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_departamento' == $_POST['rs'])
        {
            $departamento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_idmuni' == $_POST['rs'])
        {
            $idmuni = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_ciudad' == $_POST['rs'])
        {
            $ciudad = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_codigo_postal' == $_POST['rs'])
        {
            $codigo_postal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_observaciones' == $_POST['rs'])
        {
            $observaciones = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_lenguaje' == $_POST['rs'])
        {
            $lenguaje = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_c_postal' == $_POST['rs'])
        {
            $c_postal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_correo_notificafe' == $_POST['rs'])
        {
            $correo_notificafe = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_celular_notificafe' == $_POST['rs'])
        {
            $celular_notificafe = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_cliente' == $_POST['rs'])
        {
            $cliente = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_proveedor' == $_POST['rs'])
        {
            $proveedor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_empleado' == $_POST['rs'])
        {
            $empleado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_es_tecnico' == $_POST['rs'])
        {
            $es_tecnico = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_activo' == $_POST['rs'])
        {
            $activo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_credito' == $_POST['rs'])
        {
            $credito = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_cupo' == $_POST['rs'])
        {
            $cupo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_cupodis' == $_POST['rs'])
        {
            $cupodis = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_dias_credito' == $_POST['rs'])
        {
            $dias_credito = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_dias_mora' == $_POST['rs'])
        {
            $dias_mora = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_efec_retencion' == $_POST['rs'])
        {
            $efec_retencion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_listaprecios' == $_POST['rs'])
        {
            $listaprecios = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_loatiende' == $_POST['rs'])
        {
            $loatiende = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_autorizado' == $_POST['rs'])
        {
            $autorizado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_relleno2' == $_POST['rs'])
        {
            $relleno2 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_direcciones' == $_POST['rs'])
        {
            $direcciones = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_sucur_cliente' == $_POST['rs'])
        {
            $sucur_cliente = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_detalle_tributario' == $_POST['rs'])
        {
            $detalle_tributario = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_responsabilidad_fiscal' == $_POST['rs'])
        {
            $responsabilidad_fiscal = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_ciiu' == $_POST['rs'])
        {
            $ciiu = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_nacimiento' == $_POST['rs'])
        {
            $nacimiento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_fechault' == $_POST['rs'])
        {
            $fechault = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_saldo' == $_POST['rs'])
        {
            $saldo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_afiliacion' == $_POST['rs'])
        {
            $afiliacion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_es_cajero' == $_POST['rs'])
        {
            $es_cajero = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_cupo_vendedor' == $_POST['rs'])
        {
            $cupo_vendedor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_autoretenedor' == $_POST['rs'])
        {
            $autoretenedor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_creditoprov' == $_POST['rs'])
        {
            $creditoprov = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_dias' == $_POST['rs'])
        {
            $dias = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_url' == $_POST['rs'])
        {
            $url = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_contacto' == $_POST['rs'])
        {
            $contacto = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_telefonos_prov' == $_POST['rs'])
        {
            $telefonos_prov = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_email' == $_POST['rs'])
        {
            $email = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_fechultcomp' == $_POST['rs'])
        {
            $fechultcomp = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_saldoapagar' == $_POST['rs'])
        {
            $saldoapagar = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_codigo_ter' == $_POST['rs'])
        {
            $codigo_ter = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_zona_clientes' == $_POST['rs'])
        {
            $zona_clientes = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_clasificacion_clientes' == $_POST['rs'])
        {
            $clasificacion_clientes = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_puc_auxiliar_deudores' == $_POST['rs'])
        {
            $puc_auxiliar_deudores = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_puc_retefuente_ventas' == $_POST['rs'])
        {
            $puc_retefuente_ventas = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_puc_retefuente_servicios_clie' == $_POST['rs'])
        {
            $puc_retefuente_servicios_clie = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_puc_auxiliar_proveedores' == $_POST['rs'])
        {
            $puc_auxiliar_proveedores = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_puc_retefuente_compras' == $_POST['rs'])
        {
            $puc_retefuente_compras = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_puc_retefuente_servicios_prov' == $_POST['rs'])
        {
            $puc_retefuente_servicios_prov = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_archivo_cedula' == $_POST['rs'])
        {
            $archivo_cedula = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_archivo_rut' == $_POST['rs'])
        {
            $archivo_rut = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_archivo_nit' == $_POST['rs'])
        {
            $archivo_nit = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_archivo_pago' == $_POST['rs'])
        {
            $archivo_pago = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_id_plan' == $_POST['rs'])
        {
            $id_plan = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_valor_plan' == $_POST['rs'])
        {
            $valor_plan = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_fecha_registro_fe' == $_POST['rs'])
        {
            $fecha_registro_fe = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_nombre_contador' == $_POST['rs'])
        {
            $nombre_contador = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_estado' == $_POST['rs'])
        {
            $estado = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_si_nomina' == $_POST['rs'])
        {
            $si_nomina = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_n_trabajadores' == $_POST['rs'])
        {
            $n_trabajadores = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_si_factura_electronica' == $_POST['rs'])
        {
            $si_factura_electronica = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_nombre_empresa_bd' == $_POST['rs'])
        {
            $nombre_empresa_bd = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_archivos' == $_POST['rs'])
        {
            $archivos = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_es_restaurante' == $_POST['rs'])
        {
            $es_restaurante = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_validate_porcentaje_propina_sugerida' == $_POST['rs'])
        {
            $porcentaje_propina_sugerida = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_refresh_departamento' == $_POST['rs'])
        {
            $departamento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_terceros_06052022_refresh_idmuni' == $_POST['rs'])
        {
            $idmuni = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_terceros_06052022_lkpedt_refresh_zona_clientes' == $_POST['rs'])
        {
            $zona_clientes = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_terceros_06052022_lkpedt_refresh_clasificacion_clientes' == $_POST['rs'])
        {
            $clasificacion_clientes = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nmgp_refresh_fields = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_terceros_06052022_event_apellido1_onchange' == $_POST['rs'])
        {
            $nombre1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $apellido1 = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_terceros_06052022_event_apellido2_onchange' == $_POST['rs'])
        {
            $nombre1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $apellido2 = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_terceros_06052022_event_cliente_onchange' == $_POST['rs'])
        {
            $idtercero = NM_utf8_urldecode($_POST['rsargs'][0]);
            $cliente = NM_utf8_urldecode($_POST['rsargs'][1]);
            $credito = NM_utf8_urldecode($_POST['rsargs'][2]);
            $cupodis = NM_utf8_urldecode($_POST['rsargs'][3]);
            $cupo = NM_utf8_urldecode($_POST['rsargs'][4]);
            $efec_retencion = NM_utf8_urldecode($_POST['rsargs'][5]);
            $listaprecios = NM_utf8_urldecode($_POST['rsargs'][6]);
            $loatiende = NM_utf8_urldecode($_POST['rsargs'][7]);
            $proveedor = NM_utf8_urldecode($_POST['rsargs'][8]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][9]);
        }
        if ('ajax_terceros_06052022_event_credito_onchange' == $_POST['rs'])
        {
            $credito = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dias_credito = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dias_mora = NM_utf8_urldecode($_POST['rsargs'][2]);
            $cupo = NM_utf8_urldecode($_POST['rsargs'][3]);
            $cupodis = NM_utf8_urldecode($_POST['rsargs'][4]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][5]);
        }
        if ('ajax_terceros_06052022_event_creditoprov_onchange' == $_POST['rs'])
        {
            $creditoprov = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_event_cupo_onchange' == $_POST['rs'])
        {
            $cupodis = NM_utf8_urldecode($_POST['rsargs'][0]);
            $cupo = NM_utf8_urldecode($_POST['rsargs'][1]);
            $saldo = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_terceros_06052022_event_documento_onchange' == $_POST['rs'])
        {
            $tipo_documento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dv = NM_utf8_urldecode($_POST['rsargs'][1]);
            $documento = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_terceros_06052022_event_nombre1_onchange' == $_POST['rs'])
        {
            $nombre1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_event_nombre2_onchange' == $_POST['rs'])
        {
            $nombre1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nombre2 = NM_utf8_urldecode($_POST['rsargs'][1]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('ajax_terceros_06052022_event_nombre_comercil_onchange' == $_POST['rs'])
        {
            $tipo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nombres = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nombre_comercil = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_terceros_06052022_event_nombres_onblur' == $_POST['rs'])
        {
            $nombres = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_event_nombres_onfocus' == $_POST['rs'])
        {
            $nombre1 = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nombres = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nombre2 = NM_utf8_urldecode($_POST['rsargs'][2]);
            $apellido1 = NM_utf8_urldecode($_POST['rsargs'][3]);
            $apellido2 = NM_utf8_urldecode($_POST['rsargs'][4]);
            $tipo = NM_utf8_urldecode($_POST['rsargs'][5]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][6]);
        }
        if ('ajax_terceros_06052022_event_proveedor_onchange' == $_POST['rs'])
        {
            $proveedor = NM_utf8_urldecode($_POST['rsargs'][0]);
            $autoretenedor = NM_utf8_urldecode($_POST['rsargs'][1]);
            $creditoprov = NM_utf8_urldecode($_POST['rsargs'][2]);
            $dias = NM_utf8_urldecode($_POST['rsargs'][3]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][4]);
        }
        if ('ajax_terceros_06052022_event_r_social_onchange' == $_POST['rs'])
        {
            $tipo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $r_social = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nombre2 = NM_utf8_urldecode($_POST['rsargs'][2]);
            $apellido2 = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nombres = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nombre1 = NM_utf8_urldecode($_POST['rsargs'][5]);
            $apellido1 = NM_utf8_urldecode($_POST['rsargs'][6]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][7]);
        }
        if ('ajax_terceros_06052022_event_regimen_onchange' == $_POST['rs'])
        {
            $regimen = NM_utf8_urldecode($_POST['rsargs'][0]);
            $tipo_documento = NM_utf8_urldecode($_POST['rsargs'][1]);
            $dv = NM_utf8_urldecode($_POST['rsargs'][2]);
            $documento = NM_utf8_urldecode($_POST['rsargs'][3]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][4]);
        }
        if ('ajax_terceros_06052022_event_sucur_cliente_onchange' == $_POST['rs'])
        {
            $idtercero = NM_utf8_urldecode($_POST['rsargs'][0]);
            $sucur_cliente = NM_utf8_urldecode($_POST['rsargs'][1]);
            $idmuni = NM_utf8_urldecode($_POST['rsargs'][2]);
            $direccion = NM_utf8_urldecode($_POST['rsargs'][3]);
            $tel_cel = NM_utf8_urldecode($_POST['rsargs'][4]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][5]);
        }
        if ('ajax_terceros_06052022_event_tipo_documento_onchange' == $_POST['rs'])
        {
            $tipo_documento = NM_utf8_urldecode($_POST['rsargs'][0]);
            $dv = NM_utf8_urldecode($_POST['rsargs'][1]);
            $documento = NM_utf8_urldecode($_POST['rsargs'][2]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][3]);
        }
        if ('ajax_terceros_06052022_event_tipo_onchange' == $_POST['rs'])
        {
            $tipo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $regimen = NM_utf8_urldecode($_POST['rsargs'][1]);
            $efec_retencion = NM_utf8_urldecode($_POST['rsargs'][2]);
            $tipo_documento = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nombre_comercil = NM_utf8_urldecode($_POST['rsargs'][4]);
            $representante = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nombre1 = NM_utf8_urldecode($_POST['rsargs'][6]);
            $apellido1 = NM_utf8_urldecode($_POST['rsargs'][7]);
            $nombre2 = NM_utf8_urldecode($_POST['rsargs'][8]);
            $apellido2 = NM_utf8_urldecode($_POST['rsargs'][9]);
            $r_social = NM_utf8_urldecode($_POST['rsargs'][10]);
            $documento = NM_utf8_urldecode($_POST['rsargs'][11]);
            $dv = NM_utf8_urldecode($_POST['rsargs'][12]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][13]);
        }
        if ('ajax_terceros_06052022_autocomp_puc_auxiliar_deudores' == $_POST['rs'])
        {
            $puc_auxiliar_deudores = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_autocomp_puc_retefuente_ventas' == $_POST['rs'])
        {
            $puc_retefuente_ventas = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_autocomp_puc_retefuente_servicios_clie' == $_POST['rs'])
        {
            $puc_retefuente_servicios_clie = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_autocomp_puc_auxiliar_proveedores' == $_POST['rs'])
        {
            $puc_auxiliar_proveedores = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_autocomp_puc_retefuente_compras' == $_POST['rs'])
        {
            $puc_retefuente_compras = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_autocomp_puc_retefuente_servicios_prov' == $_POST['rs'])
        {
            $puc_retefuente_servicios_prov = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_terceros_06052022_submit_form' == $_POST['rs'])
        {
            $tipo = NM_utf8_urldecode($_POST['rsargs'][0]);
            $regimen = NM_utf8_urldecode($_POST['rsargs'][1]);
            $tipo_documento = NM_utf8_urldecode($_POST['rsargs'][2]);
            $documento = NM_utf8_urldecode($_POST['rsargs'][3]);
            $dv = NM_utf8_urldecode($_POST['rsargs'][4]);
            $codigo_tercero = NM_utf8_urldecode($_POST['rsargs'][5]);
            $sexo = NM_utf8_urldecode($_POST['rsargs'][6]);
            $notificar = NM_utf8_urldecode($_POST['rsargs'][7]);
            $nombre1 = NM_utf8_urldecode($_POST['rsargs'][8]);
            $nombre2 = NM_utf8_urldecode($_POST['rsargs'][9]);
            $apellido1 = NM_utf8_urldecode($_POST['rsargs'][10]);
            $apellido2 = NM_utf8_urldecode($_POST['rsargs'][11]);
            $tel_cel = NM_utf8_urldecode($_POST['rsargs'][12]);
            $urlmail = NM_utf8_urldecode($_POST['rsargs'][13]);
            $idtercero = NM_utf8_urldecode($_POST['rsargs'][14]);
            $r_social = NM_utf8_urldecode($_POST['rsargs'][15]);
            $nombres = NM_utf8_urldecode($_POST['rsargs'][16]);
            $nombre_comercil = NM_utf8_urldecode($_POST['rsargs'][17]);
            $representante = NM_utf8_urldecode($_POST['rsargs'][18]);
            $direccion = NM_utf8_urldecode($_POST['rsargs'][19]);
            $departamento = NM_utf8_urldecode($_POST['rsargs'][20]);
            $idmuni = NM_utf8_urldecode($_POST['rsargs'][21]);
            $ciudad = NM_utf8_urldecode($_POST['rsargs'][22]);
            $codigo_postal = NM_utf8_urldecode($_POST['rsargs'][23]);
            $observaciones = NM_utf8_urldecode($_POST['rsargs'][24]);
            $lenguaje = NM_utf8_urldecode($_POST['rsargs'][25]);
            $c_postal = NM_utf8_urldecode($_POST['rsargs'][26]);
            $correo_notificafe = NM_utf8_urldecode($_POST['rsargs'][27]);
            $celular_notificafe = NM_utf8_urldecode($_POST['rsargs'][28]);
            $cliente = NM_utf8_urldecode($_POST['rsargs'][29]);
            $proveedor = NM_utf8_urldecode($_POST['rsargs'][30]);
            $empleado = NM_utf8_urldecode($_POST['rsargs'][31]);
            $es_tecnico = NM_utf8_urldecode($_POST['rsargs'][32]);
            $activo = NM_utf8_urldecode($_POST['rsargs'][33]);
            $credito = NM_utf8_urldecode($_POST['rsargs'][34]);
            $cupo = NM_utf8_urldecode($_POST['rsargs'][35]);
            $cupodis = NM_utf8_urldecode($_POST['rsargs'][36]);
            $dias_credito = NM_utf8_urldecode($_POST['rsargs'][37]);
            $dias_mora = NM_utf8_urldecode($_POST['rsargs'][38]);
            $efec_retencion = NM_utf8_urldecode($_POST['rsargs'][39]);
            $listaprecios = NM_utf8_urldecode($_POST['rsargs'][40]);
            $loatiende = NM_utf8_urldecode($_POST['rsargs'][41]);
            $autorizado = NM_utf8_urldecode($_POST['rsargs'][42]);
            $relleno2 = NM_utf8_urldecode($_POST['rsargs'][43]);
            $sucur_cliente = NM_utf8_urldecode($_POST['rsargs'][44]);
            $detalle_tributario = NM_utf8_urldecode($_POST['rsargs'][45]);
            $responsabilidad_fiscal = NM_utf8_urldecode($_POST['rsargs'][46]);
            $ciiu = NM_utf8_urldecode($_POST['rsargs'][47]);
            $nacimiento = NM_utf8_urldecode($_POST['rsargs'][48]);
            $fechault = NM_utf8_urldecode($_POST['rsargs'][49]);
            $saldo = NM_utf8_urldecode($_POST['rsargs'][50]);
            $afiliacion = NM_utf8_urldecode($_POST['rsargs'][51]);
            $es_cajero = NM_utf8_urldecode($_POST['rsargs'][52]);
            $cupo_vendedor = NM_utf8_urldecode($_POST['rsargs'][53]);
            $autoretenedor = NM_utf8_urldecode($_POST['rsargs'][54]);
            $creditoprov = NM_utf8_urldecode($_POST['rsargs'][55]);
            $dias = NM_utf8_urldecode($_POST['rsargs'][56]);
            $url = NM_utf8_urldecode($_POST['rsargs'][57]);
            $contacto = NM_utf8_urldecode($_POST['rsargs'][58]);
            $telefonos_prov = NM_utf8_urldecode($_POST['rsargs'][59]);
            $email = NM_utf8_urldecode($_POST['rsargs'][60]);
            $fechultcomp = NM_utf8_urldecode($_POST['rsargs'][61]);
            $saldoapagar = NM_utf8_urldecode($_POST['rsargs'][62]);
            $codigo_ter = NM_utf8_urldecode($_POST['rsargs'][63]);
            $zona_clientes = NM_utf8_urldecode($_POST['rsargs'][64]);
            $clasificacion_clientes = NM_utf8_urldecode($_POST['rsargs'][65]);
            $puc_auxiliar_deudores = NM_utf8_urldecode($_POST['rsargs'][66]);
            $puc_retefuente_ventas = NM_utf8_urldecode($_POST['rsargs'][67]);
            $puc_retefuente_servicios_clie = NM_utf8_urldecode($_POST['rsargs'][68]);
            $puc_auxiliar_proveedores = NM_utf8_urldecode($_POST['rsargs'][69]);
            $puc_retefuente_compras = NM_utf8_urldecode($_POST['rsargs'][70]);
            $puc_retefuente_servicios_prov = NM_utf8_urldecode($_POST['rsargs'][71]);
            $archivo_cedula = NM_utf8_urldecode($_POST['rsargs'][72]);
            $archivo_rut = NM_utf8_urldecode($_POST['rsargs'][73]);
            $archivo_nit = NM_utf8_urldecode($_POST['rsargs'][74]);
            $archivo_pago = NM_utf8_urldecode($_POST['rsargs'][75]);
            $id_plan = NM_utf8_urldecode($_POST['rsargs'][76]);
            $valor_plan = NM_utf8_urldecode($_POST['rsargs'][77]);
            $fecha_registro_fe = NM_utf8_urldecode($_POST['rsargs'][78]);
            $nombre_contador = NM_utf8_urldecode($_POST['rsargs'][79]);
            $estado = NM_utf8_urldecode($_POST['rsargs'][80]);
            $si_nomina = NM_utf8_urldecode($_POST['rsargs'][81]);
            $n_trabajadores = NM_utf8_urldecode($_POST['rsargs'][82]);
            $si_factura_electronica = NM_utf8_urldecode($_POST['rsargs'][83]);
            $nombre_empresa_bd = NM_utf8_urldecode($_POST['rsargs'][84]);
            $es_restaurante = NM_utf8_urldecode($_POST['rsargs'][85]);
            $porcentaje_propina_sugerida = NM_utf8_urldecode($_POST['rsargs'][86]);
            $archivo_cedula_ul_name = NM_utf8_urldecode($_POST['rsargs'][87]);
            $archivo_cedula_ul_type = NM_utf8_urldecode($_POST['rsargs'][88]);
            $archivo_rut_ul_name = NM_utf8_urldecode($_POST['rsargs'][89]);
            $archivo_rut_ul_type = NM_utf8_urldecode($_POST['rsargs'][90]);
            $archivo_nit_ul_name = NM_utf8_urldecode($_POST['rsargs'][91]);
            $archivo_nit_ul_type = NM_utf8_urldecode($_POST['rsargs'][92]);
            $archivo_pago_ul_name = NM_utf8_urldecode($_POST['rsargs'][93]);
            $archivo_pago_ul_type = NM_utf8_urldecode($_POST['rsargs'][94]);
            $archivo_cedula_salva = NM_utf8_urldecode($_POST['rsargs'][95]);
            $archivo_cedula_limpa = NM_utf8_urldecode($_POST['rsargs'][96]);
            $archivo_rut_salva = NM_utf8_urldecode($_POST['rsargs'][97]);
            $archivo_rut_limpa = NM_utf8_urldecode($_POST['rsargs'][98]);
            $archivo_nit_salva = NM_utf8_urldecode($_POST['rsargs'][99]);
            $archivo_nit_limpa = NM_utf8_urldecode($_POST['rsargs'][100]);
            $archivo_pago_salva = NM_utf8_urldecode($_POST['rsargs'][101]);
            $archivo_pago_limpa = NM_utf8_urldecode($_POST['rsargs'][102]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][103]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][104]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][105]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][106]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][107]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][108]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][109]);
            $csrf_token = NM_utf8_urldecode($_POST['rsargs'][110]);
        }
        if ('ajax_terceros_06052022_navigate_form' == $_POST['rs'])
        {
            $idtercero = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_fast_search = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_cond_fast_search = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nmgp_arg_fast_search = NM_utf8_urldecode($_POST['rsargs'][6]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][7]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][8]);
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_parms']);
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
               nm_limpa_str_terceros_06052022($cadapar[1]);
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
        if (isset($pa)) 
        {
            $_SESSION['pa'] = $pa;
        }
        if (isset($sa)) 
        {
            $_SESSION['sa'] = $sa;
        }
        if (isset($id_tercero)) 
        {
            $_SESSION['id_tercero'] = $id_tercero;
        }
        if (isset($nomb)) 
        {
            $_SESSION['nomb'] = $nomb;
        }
        if (isset($pn)) 
        {
            $_SESSION['pn'] = $pn;
        }
        if (isset($sn)) 
        {
            $_SESSION['sn'] = $sn;
        }
        if (isset($gnit)) 
        {
            $_SESSION['gnit'] = $gnit;
        }
        if (isset($gidtercero)) 
        {
            $_SESSION['gidtercero'] = $gidtercero;
        }
        if (isset($gurl_reg_empresa)) 
        {
            $_SESSION['gurl_reg_empresa'] = $gurl_reg_empresa;
        }
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['parms']);
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
    if (isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe']);
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "terceros_06052022";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'terceros_06052022' || $achou)
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
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'terceros_06052022')
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_modal'] = true;
            $nm_url_saida = "terceros_06052022_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan'] = true;
    }
    if (!isset($nm_apl_dependente)) {
        $nm_apl_dependente = 0;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/terceros_06052022/'))
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/terceros_06052022_erro.php");
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
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['opcao'] = $nmgp_opcao ; 
        }
        if (isset($_POST["pa"])) 
        {
            $_SESSION['pa'] = $_POST["pa"];
            nm_limpa_str_terceros_06052022($_SESSION['pa']);
        }
        if (isset($_GET["pa"])) 
        {
            $_SESSION['pa'] = $_GET["pa"];
            nm_limpa_str_terceros_06052022($_SESSION['pa']);
        }
        if (isset($_POST["sa"])) 
        {
            $_SESSION['sa'] = $_POST["sa"];
            nm_limpa_str_terceros_06052022($_SESSION['sa']);
        }
        if (isset($_GET["sa"])) 
        {
            $_SESSION['sa'] = $_GET["sa"];
            nm_limpa_str_terceros_06052022($_SESSION['sa']);
        }
        if (isset($_POST["id_tercero"])) 
        {
            $_SESSION['id_tercero'] = $_POST["id_tercero"];
            nm_limpa_str_terceros_06052022($_SESSION['id_tercero']);
        }
        if (isset($_GET["id_tercero"])) 
        {
            $_SESSION['id_tercero'] = $_GET["id_tercero"];
            nm_limpa_str_terceros_06052022($_SESSION['id_tercero']);
        }
        if (isset($_POST["nomb"])) 
        {
            $_SESSION['nomb'] = $_POST["nomb"];
            nm_limpa_str_terceros_06052022($_SESSION['nomb']);
        }
        if (isset($_GET["nomb"])) 
        {
            $_SESSION['nomb'] = $_GET["nomb"];
            nm_limpa_str_terceros_06052022($_SESSION['nomb']);
        }
        if (isset($_POST["pn"])) 
        {
            $_SESSION['pn'] = $_POST["pn"];
            nm_limpa_str_terceros_06052022($_SESSION['pn']);
        }
        if (isset($_GET["pn"])) 
        {
            $_SESSION['pn'] = $_GET["pn"];
            nm_limpa_str_terceros_06052022($_SESSION['pn']);
        }
        if (isset($_POST["sn"])) 
        {
            $_SESSION['sn'] = $_POST["sn"];
            nm_limpa_str_terceros_06052022($_SESSION['sn']);
        }
        if (isset($_GET["sn"])) 
        {
            $_SESSION['sn'] = $_GET["sn"];
            nm_limpa_str_terceros_06052022($_SESSION['sn']);
        }
        if (isset($_POST["gnit"])) 
        {
            $_SESSION['gnit'] = $_POST["gnit"];
            nm_limpa_str_terceros_06052022($_SESSION['gnit']);
        }
        if (isset($_GET["gnit"])) 
        {
            $_SESSION['gnit'] = $_GET["gnit"];
            nm_limpa_str_terceros_06052022($_SESSION['gnit']);
        }
        if (isset($_POST["gidtercero"])) 
        {
            $_SESSION['gidtercero'] = $_POST["gidtercero"];
            nm_limpa_str_terceros_06052022($_SESSION['gidtercero']);
        }
        if (isset($_GET["gidtercero"])) 
        {
            $_SESSION['gidtercero'] = $_GET["gidtercero"];
            nm_limpa_str_terceros_06052022($_SESSION['gidtercero']);
        }
        if (isset($_POST["gurl_reg_empresa"])) 
        {
            $_SESSION['gurl_reg_empresa'] = $_POST["gurl_reg_empresa"];
            nm_limpa_str_terceros_06052022($_SESSION['gurl_reg_empresa']);
        }
        if (isset($_GET["gurl_reg_empresa"])) 
        {
            $_SESSION['gurl_reg_empresa'] = $_GET["gurl_reg_empresa"];
            nm_limpa_str_terceros_06052022($_SESSION['gurl_reg_empresa']);
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_redirect_tp'] = "";
            $nm_url_saida = "terceros_06052022_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "terceros_06052022_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['retorno_edit'] . "?script_case_init=" . $script_case_init;  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['terceros_06052022']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "terceros_06052022_fim.php"; 
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
        if (empty($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init; 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_modal'] = true;
             $nm_url_saida = "terceros_06052022_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['terceros_06052022']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_terceros_06052022 = new terceros_06052022_edit();
    $inicial_terceros_06052022->inicializa();

    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html'] = array();
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['tipo'] = "class=\"sc-js-input scFormObjectOdd css_tipo_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_tipo\" name=\"tipo\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['regimen'] = "class=\"sc-js-input scFormObjectOdd css_regimen_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_regimen\" name=\"regimen\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['tipo_documento'] = "class=\"sc-js-input scFormObjectOdd css_tipo_documento_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_tipo_documento\" name=\"tipo_documento\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['sexo'] = "class=\"sc-js-input scFormObjectOdd css_sexo_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_sexo\" name=\"sexo\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['notificar'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['departamento'] = "class=\"sc-js-input scFormObjectOdd css_departamento_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_departamento\" name=\"departamento\" size=\"1\" alt=\"{type: 'select', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['idmuni'] = "class=\"sc-js-input scFormObjectOdd css_idmuni_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_idmuni\" name=\"idmuni\" size=\"1\" alt=\"{type: 'select', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['ciudad'] = "class=\"sc-js-input scFormObjectOdd css_ciudad_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_ciudad\" name=\"ciudad\" size=\"1\" alt=\"{type: 'select', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['codigo_postal'] = "class=\"sc-js-input scFormObjectOdd css_codigo_postal_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_codigo_postal\" name=\"codigo_postal\" size=\"1\" alt=\"{type: 'select', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['lenguaje'] = "class=\"sc-js-input scFormObjectOdd css_lenguaje_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_lenguaje\" name=\"lenguaje\" size=\"1\" alt=\"{type: 'select', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['cliente'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['proveedor'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['empleado'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['es_tecnico'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['activo'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['credito'] = "class=\"sc-js-input scFormObjectOdd css_credito_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_credito\" name=\"credito\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['efec_retencion'] = "class=\"sc-js-input scFormObjectOdd css_efec_retencion_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_efec_retencion\" name=\"efec_retencion\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['listaprecios'] = "class=\"sc-js-input scFormObjectOdd css_listaprecios_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_listaprecios\" name=\"listaprecios\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['loatiende'] = "class=\"sc-js-input scFormObjectOdd css_loatiende_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_loatiende\" name=\"loatiende\" size=\"1\" alt=\"{type: 'select', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['autorizado'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['sucur_cliente'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['es_cajero'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['autoretenedor'] = "class=\"sc-js-input scFormObjectOdd css_autoretenedor_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_autoretenedor\" name=\"autoretenedor\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['creditoprov'] = "class=\"sc-js-input scFormObjectOdd css_creditoprov_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_creditoprov\" name=\"creditoprov\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['zona_clientes'] = "class=\"sc-js-input scFormObjectOdd css_zona_clientes_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_zona_clientes\" name=\"zona_clientes\" size=\"1\" alt=\"{type: 'select', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['clasificacion_clientes'] = "class=\"sc-js-input scFormObjectOdd css_clasificacion_clientes_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_clasificacion_clientes\" name=\"clasificacion_clientes\" size=\"1\" alt=\"{type: 'select', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['id_plan'] = "class=\"sc-js-input scFormObjectOdd css_id_plan_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_id_plan\" name=\"id_plan\" size=\"1\" alt=\"{type: 'select', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['estado'] = "class=\"sc-js-input scFormObjectOdd css_estado_obj{SC_100PERC_CLASS_INPUT}\" style=\"\" id=\"id_sc_field_estado\" name=\"estado\" size=\"1\" alt=\"{type: \'select\', enterTab: true}\"";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['si_nomina'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['si_factura_electronica'] = " onClick=\"\" ";
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['select_html']['es_restaurante'] = " onClick=\"\" ";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/terceros_06052022_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/terceros_06052022_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_terceros_06052022_validate_tipo");
    sajax_export("ajax_terceros_06052022_validate_regimen");
    sajax_export("ajax_terceros_06052022_validate_tipo_documento");
    sajax_export("ajax_terceros_06052022_validate_documento");
    sajax_export("ajax_terceros_06052022_validate_dv");
    sajax_export("ajax_terceros_06052022_validate_codigo_tercero");
    sajax_export("ajax_terceros_06052022_validate_sexo");
    sajax_export("ajax_terceros_06052022_validate_notificar");
    sajax_export("ajax_terceros_06052022_validate_nombre1");
    sajax_export("ajax_terceros_06052022_validate_nombre2");
    sajax_export("ajax_terceros_06052022_validate_apellido1");
    sajax_export("ajax_terceros_06052022_validate_apellido2");
    sajax_export("ajax_terceros_06052022_validate_tel_cel");
    sajax_export("ajax_terceros_06052022_validate_urlmail");
    sajax_export("ajax_terceros_06052022_validate_idtercero");
    sajax_export("ajax_terceros_06052022_validate_r_social");
    sajax_export("ajax_terceros_06052022_validate_nombres");
    sajax_export("ajax_terceros_06052022_validate_nombre_comercil");
    sajax_export("ajax_terceros_06052022_validate_representante");
    sajax_export("ajax_terceros_06052022_validate_direccion");
    sajax_export("ajax_terceros_06052022_validate_departamento");
    sajax_export("ajax_terceros_06052022_validate_idmuni");
    sajax_export("ajax_terceros_06052022_validate_ciudad");
    sajax_export("ajax_terceros_06052022_validate_codigo_postal");
    sajax_export("ajax_terceros_06052022_validate_observaciones");
    sajax_export("ajax_terceros_06052022_validate_lenguaje");
    sajax_export("ajax_terceros_06052022_validate_c_postal");
    sajax_export("ajax_terceros_06052022_validate_correo_notificafe");
    sajax_export("ajax_terceros_06052022_validate_celular_notificafe");
    sajax_export("ajax_terceros_06052022_validate_cliente");
    sajax_export("ajax_terceros_06052022_validate_proveedor");
    sajax_export("ajax_terceros_06052022_validate_empleado");
    sajax_export("ajax_terceros_06052022_validate_es_tecnico");
    sajax_export("ajax_terceros_06052022_validate_activo");
    sajax_export("ajax_terceros_06052022_validate_credito");
    sajax_export("ajax_terceros_06052022_validate_cupo");
    sajax_export("ajax_terceros_06052022_validate_cupodis");
    sajax_export("ajax_terceros_06052022_validate_dias_credito");
    sajax_export("ajax_terceros_06052022_validate_dias_mora");
    sajax_export("ajax_terceros_06052022_validate_efec_retencion");
    sajax_export("ajax_terceros_06052022_validate_listaprecios");
    sajax_export("ajax_terceros_06052022_validate_loatiende");
    sajax_export("ajax_terceros_06052022_validate_autorizado");
    sajax_export("ajax_terceros_06052022_validate_relleno2");
    sajax_export("ajax_terceros_06052022_validate_direcciones");
    sajax_export("ajax_terceros_06052022_validate_sucur_cliente");
    sajax_export("ajax_terceros_06052022_validate_detalle_tributario");
    sajax_export("ajax_terceros_06052022_validate_responsabilidad_fiscal");
    sajax_export("ajax_terceros_06052022_validate_ciiu");
    sajax_export("ajax_terceros_06052022_validate_nacimiento");
    sajax_export("ajax_terceros_06052022_validate_fechault");
    sajax_export("ajax_terceros_06052022_validate_saldo");
    sajax_export("ajax_terceros_06052022_validate_afiliacion");
    sajax_export("ajax_terceros_06052022_validate_es_cajero");
    sajax_export("ajax_terceros_06052022_validate_cupo_vendedor");
    sajax_export("ajax_terceros_06052022_validate_autoretenedor");
    sajax_export("ajax_terceros_06052022_validate_creditoprov");
    sajax_export("ajax_terceros_06052022_validate_dias");
    sajax_export("ajax_terceros_06052022_validate_url");
    sajax_export("ajax_terceros_06052022_validate_contacto");
    sajax_export("ajax_terceros_06052022_validate_telefonos_prov");
    sajax_export("ajax_terceros_06052022_validate_email");
    sajax_export("ajax_terceros_06052022_validate_fechultcomp");
    sajax_export("ajax_terceros_06052022_validate_saldoapagar");
    sajax_export("ajax_terceros_06052022_validate_codigo_ter");
    sajax_export("ajax_terceros_06052022_validate_zona_clientes");
    sajax_export("ajax_terceros_06052022_validate_clasificacion_clientes");
    sajax_export("ajax_terceros_06052022_validate_puc_auxiliar_deudores");
    sajax_export("ajax_terceros_06052022_validate_puc_retefuente_ventas");
    sajax_export("ajax_terceros_06052022_validate_puc_retefuente_servicios_clie");
    sajax_export("ajax_terceros_06052022_validate_puc_auxiliar_proveedores");
    sajax_export("ajax_terceros_06052022_validate_puc_retefuente_compras");
    sajax_export("ajax_terceros_06052022_validate_puc_retefuente_servicios_prov");
    sajax_export("ajax_terceros_06052022_validate_archivo_cedula");
    sajax_export("ajax_terceros_06052022_validate_archivo_rut");
    sajax_export("ajax_terceros_06052022_validate_archivo_nit");
    sajax_export("ajax_terceros_06052022_validate_archivo_pago");
    sajax_export("ajax_terceros_06052022_validate_id_plan");
    sajax_export("ajax_terceros_06052022_validate_valor_plan");
    sajax_export("ajax_terceros_06052022_validate_fecha_registro_fe");
    sajax_export("ajax_terceros_06052022_validate_nombre_contador");
    sajax_export("ajax_terceros_06052022_validate_estado");
    sajax_export("ajax_terceros_06052022_validate_si_nomina");
    sajax_export("ajax_terceros_06052022_validate_n_trabajadores");
    sajax_export("ajax_terceros_06052022_validate_si_factura_electronica");
    sajax_export("ajax_terceros_06052022_validate_nombre_empresa_bd");
    sajax_export("ajax_terceros_06052022_validate_archivos");
    sajax_export("ajax_terceros_06052022_validate_es_restaurante");
    sajax_export("ajax_terceros_06052022_validate_porcentaje_propina_sugerida");
    sajax_export("ajax_terceros_06052022_refresh_departamento");
    sajax_export("ajax_terceros_06052022_refresh_idmuni");
    sajax_export("ajax_terceros_06052022_lkpedt_refresh_zona_clientes");
    sajax_export("ajax_terceros_06052022_lkpedt_refresh_clasificacion_clientes");
    sajax_export("ajax_terceros_06052022_event_apellido1_onchange");
    sajax_export("ajax_terceros_06052022_event_apellido2_onchange");
    sajax_export("ajax_terceros_06052022_event_cliente_onchange");
    sajax_export("ajax_terceros_06052022_event_credito_onchange");
    sajax_export("ajax_terceros_06052022_event_creditoprov_onchange");
    sajax_export("ajax_terceros_06052022_event_cupo_onchange");
    sajax_export("ajax_terceros_06052022_event_documento_onchange");
    sajax_export("ajax_terceros_06052022_event_nombre1_onchange");
    sajax_export("ajax_terceros_06052022_event_nombre2_onchange");
    sajax_export("ajax_terceros_06052022_event_nombre_comercil_onchange");
    sajax_export("ajax_terceros_06052022_event_nombres_onblur");
    sajax_export("ajax_terceros_06052022_event_nombres_onfocus");
    sajax_export("ajax_terceros_06052022_event_proveedor_onchange");
    sajax_export("ajax_terceros_06052022_event_r_social_onchange");
    sajax_export("ajax_terceros_06052022_event_regimen_onchange");
    sajax_export("ajax_terceros_06052022_event_sucur_cliente_onchange");
    sajax_export("ajax_terceros_06052022_event_tipo_documento_onchange");
    sajax_export("ajax_terceros_06052022_event_tipo_onchange");
    sajax_export("ajax_terceros_06052022_autocomp_puc_auxiliar_deudores");
    sajax_export("ajax_terceros_06052022_autocomp_puc_retefuente_ventas");
    sajax_export("ajax_terceros_06052022_autocomp_puc_retefuente_servicios_clie");
    sajax_export("ajax_terceros_06052022_autocomp_puc_auxiliar_proveedores");
    sajax_export("ajax_terceros_06052022_autocomp_puc_retefuente_compras");
    sajax_export("ajax_terceros_06052022_autocomp_puc_retefuente_servicios_prov");
    sajax_export("ajax_terceros_06052022_submit_form");
    sajax_export("ajax_terceros_06052022_navigate_form");
    sajax_handle_client_request();

if (isset($_POST['wizard_action']) && 'change_step' == $_POST['wizard_action']) {
    $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'] = true;
    ob_start();
}

    $inicial_terceros_06052022->contr_terceros_06052022->controle();
//
    function nm_limpa_str_terceros_06052022(&$str)
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

    function ajax_terceros_06052022_validate_tipo($tipo, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_tipo';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'tipo' => NM_utf8_urldecode($tipo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_tipo

    function ajax_terceros_06052022_validate_regimen($regimen, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_regimen';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'regimen' => NM_utf8_urldecode($regimen),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_regimen

    function ajax_terceros_06052022_validate_tipo_documento($tipo_documento, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_tipo_documento';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'tipo_documento' => NM_utf8_urldecode($tipo_documento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_tipo_documento

    function ajax_terceros_06052022_validate_documento($documento, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_documento';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'documento' => NM_utf8_urldecode($documento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_documento

    function ajax_terceros_06052022_validate_dv($dv, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_dv';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'dv' => NM_utf8_urldecode($dv),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_dv

    function ajax_terceros_06052022_validate_codigo_tercero($codigo_tercero, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_codigo_tercero';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'codigo_tercero' => NM_utf8_urldecode($codigo_tercero),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_codigo_tercero

    function ajax_terceros_06052022_validate_sexo($sexo, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_sexo';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'sexo' => NM_utf8_urldecode($sexo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_sexo

    function ajax_terceros_06052022_validate_notificar($notificar, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_notificar';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'notificar' => NM_utf8_urldecode($notificar),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_notificar

    function ajax_terceros_06052022_validate_nombre1($nombre1, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_nombre1';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre1' => NM_utf8_urldecode($nombre1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_nombre1

    function ajax_terceros_06052022_validate_nombre2($nombre2, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_nombre2';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre2' => NM_utf8_urldecode($nombre2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_nombre2

    function ajax_terceros_06052022_validate_apellido1($apellido1, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_apellido1';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'apellido1' => NM_utf8_urldecode($apellido1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_apellido1

    function ajax_terceros_06052022_validate_apellido2($apellido2, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_apellido2';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'apellido2' => NM_utf8_urldecode($apellido2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_apellido2

    function ajax_terceros_06052022_validate_tel_cel($tel_cel, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_tel_cel';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'tel_cel' => NM_utf8_urldecode($tel_cel),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_tel_cel

    function ajax_terceros_06052022_validate_urlmail($urlmail, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_urlmail';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'urlmail' => NM_utf8_urldecode($urlmail),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_urlmail

    function ajax_terceros_06052022_validate_idtercero($idtercero, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_idtercero';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'idtercero' => NM_utf8_urldecode($idtercero),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_idtercero

    function ajax_terceros_06052022_validate_r_social($r_social, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_r_social';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'r_social' => NM_utf8_urldecode($r_social),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_r_social

    function ajax_terceros_06052022_validate_nombres($nombres, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_nombres';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombres' => NM_utf8_urldecode($nombres),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_nombres

    function ajax_terceros_06052022_validate_nombre_comercil($nombre_comercil, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_nombre_comercil';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre_comercil' => NM_utf8_urldecode($nombre_comercil),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_nombre_comercil

    function ajax_terceros_06052022_validate_representante($representante, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_representante';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'representante' => NM_utf8_urldecode($representante),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_representante

    function ajax_terceros_06052022_validate_direccion($direccion, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_direccion';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'direccion' => NM_utf8_urldecode($direccion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_direccion

    function ajax_terceros_06052022_validate_departamento($departamento, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_departamento';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'departamento' => NM_utf8_urldecode($departamento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_departamento

    function ajax_terceros_06052022_validate_idmuni($idmuni, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_idmuni';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'idmuni' => NM_utf8_urldecode($idmuni),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_idmuni

    function ajax_terceros_06052022_validate_ciudad($ciudad, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_ciudad';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'ciudad' => NM_utf8_urldecode($ciudad),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_ciudad

    function ajax_terceros_06052022_validate_codigo_postal($codigo_postal, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_codigo_postal';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'codigo_postal' => NM_utf8_urldecode($codigo_postal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_codigo_postal

    function ajax_terceros_06052022_validate_observaciones($observaciones, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_observaciones';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'observaciones' => NM_utf8_urldecode($observaciones),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_observaciones

    function ajax_terceros_06052022_validate_lenguaje($lenguaje, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_lenguaje';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'lenguaje' => NM_utf8_urldecode($lenguaje),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_lenguaje

    function ajax_terceros_06052022_validate_c_postal($c_postal, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_c_postal';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'c_postal' => NM_utf8_urldecode($c_postal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_c_postal

    function ajax_terceros_06052022_validate_correo_notificafe($correo_notificafe, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_correo_notificafe';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'correo_notificafe' => NM_utf8_urldecode($correo_notificafe),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_correo_notificafe

    function ajax_terceros_06052022_validate_celular_notificafe($celular_notificafe, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_celular_notificafe';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'celular_notificafe' => NM_utf8_urldecode($celular_notificafe),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_celular_notificafe

    function ajax_terceros_06052022_validate_cliente($cliente, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_cliente';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'cliente' => NM_utf8_urldecode($cliente),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_cliente

    function ajax_terceros_06052022_validate_proveedor($proveedor, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_proveedor';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'proveedor' => NM_utf8_urldecode($proveedor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_proveedor

    function ajax_terceros_06052022_validate_empleado($empleado, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_empleado';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'empleado' => NM_utf8_urldecode($empleado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_empleado

    function ajax_terceros_06052022_validate_es_tecnico($es_tecnico, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_es_tecnico';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'es_tecnico' => NM_utf8_urldecode($es_tecnico),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_es_tecnico

    function ajax_terceros_06052022_validate_activo($activo, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_activo';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'activo' => NM_utf8_urldecode($activo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_activo

    function ajax_terceros_06052022_validate_credito($credito, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_credito';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'credito' => NM_utf8_urldecode($credito),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_credito

    function ajax_terceros_06052022_validate_cupo($cupo, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_cupo';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'cupo' => NM_utf8_urldecode($cupo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_cupo

    function ajax_terceros_06052022_validate_cupodis($cupodis, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_cupodis';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'cupodis' => NM_utf8_urldecode($cupodis),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_cupodis

    function ajax_terceros_06052022_validate_dias_credito($dias_credito, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_dias_credito';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'dias_credito' => NM_utf8_urldecode($dias_credito),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_dias_credito

    function ajax_terceros_06052022_validate_dias_mora($dias_mora, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_dias_mora';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'dias_mora' => NM_utf8_urldecode($dias_mora),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_dias_mora

    function ajax_terceros_06052022_validate_efec_retencion($efec_retencion, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_efec_retencion';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'efec_retencion' => NM_utf8_urldecode($efec_retencion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_efec_retencion

    function ajax_terceros_06052022_validate_listaprecios($listaprecios, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_listaprecios';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'listaprecios' => NM_utf8_urldecode($listaprecios),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_listaprecios

    function ajax_terceros_06052022_validate_loatiende($loatiende, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_loatiende';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'loatiende' => NM_utf8_urldecode($loatiende),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_loatiende

    function ajax_terceros_06052022_validate_autorizado($autorizado, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_autorizado';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'autorizado' => NM_utf8_urldecode($autorizado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_autorizado

    function ajax_terceros_06052022_validate_relleno2($relleno2, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_relleno2';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'relleno2' => NM_utf8_urldecode($relleno2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_relleno2

    function ajax_terceros_06052022_validate_direcciones($direcciones, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_direcciones';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'direcciones' => NM_utf8_urldecode($direcciones),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_direcciones

    function ajax_terceros_06052022_validate_sucur_cliente($sucur_cliente, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_sucur_cliente';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'sucur_cliente' => NM_utf8_urldecode($sucur_cliente),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_sucur_cliente

    function ajax_terceros_06052022_validate_detalle_tributario($detalle_tributario, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_detalle_tributario';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'detalle_tributario' => NM_utf8_urldecode($detalle_tributario),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_detalle_tributario

    function ajax_terceros_06052022_validate_responsabilidad_fiscal($responsabilidad_fiscal, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_responsabilidad_fiscal';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'responsabilidad_fiscal' => NM_utf8_urldecode($responsabilidad_fiscal),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_responsabilidad_fiscal

    function ajax_terceros_06052022_validate_ciiu($ciiu, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_ciiu';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'ciiu' => NM_utf8_urldecode($ciiu),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_ciiu

    function ajax_terceros_06052022_validate_nacimiento($nacimiento, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_nacimiento';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nacimiento' => NM_utf8_urldecode($nacimiento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_nacimiento

    function ajax_terceros_06052022_validate_fechault($fechault, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_fechault';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'fechault' => NM_utf8_urldecode($fechault),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_fechault

    function ajax_terceros_06052022_validate_saldo($saldo, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_saldo';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'saldo' => NM_utf8_urldecode($saldo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_saldo

    function ajax_terceros_06052022_validate_afiliacion($afiliacion, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_afiliacion';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'afiliacion' => NM_utf8_urldecode($afiliacion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_afiliacion

    function ajax_terceros_06052022_validate_es_cajero($es_cajero, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_es_cajero';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'es_cajero' => NM_utf8_urldecode($es_cajero),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_es_cajero

    function ajax_terceros_06052022_validate_cupo_vendedor($cupo_vendedor, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_cupo_vendedor';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'cupo_vendedor' => NM_utf8_urldecode($cupo_vendedor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_cupo_vendedor

    function ajax_terceros_06052022_validate_autoretenedor($autoretenedor, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_autoretenedor';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'autoretenedor' => NM_utf8_urldecode($autoretenedor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_autoretenedor

    function ajax_terceros_06052022_validate_creditoprov($creditoprov, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_creditoprov';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'creditoprov' => NM_utf8_urldecode($creditoprov),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_creditoprov

    function ajax_terceros_06052022_validate_dias($dias, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_dias';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'dias' => NM_utf8_urldecode($dias),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_dias

    function ajax_terceros_06052022_validate_url($url, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_url';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'url' => NM_utf8_urldecode($url),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_url

    function ajax_terceros_06052022_validate_contacto($contacto, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_contacto';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'contacto' => NM_utf8_urldecode($contacto),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_contacto

    function ajax_terceros_06052022_validate_telefonos_prov($telefonos_prov, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_telefonos_prov';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'telefonos_prov' => NM_utf8_urldecode($telefonos_prov),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_telefonos_prov

    function ajax_terceros_06052022_validate_email($email, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_email';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'email' => NM_utf8_urldecode($email),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_email

    function ajax_terceros_06052022_validate_fechultcomp($fechultcomp, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_fechultcomp';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'fechultcomp' => NM_utf8_urldecode($fechultcomp),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_fechultcomp

    function ajax_terceros_06052022_validate_saldoapagar($saldoapagar, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_saldoapagar';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'saldoapagar' => NM_utf8_urldecode($saldoapagar),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_saldoapagar

    function ajax_terceros_06052022_validate_codigo_ter($codigo_ter, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_codigo_ter';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'codigo_ter' => NM_utf8_urldecode($codigo_ter),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_codigo_ter

    function ajax_terceros_06052022_validate_zona_clientes($zona_clientes, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_zona_clientes';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'zona_clientes' => NM_utf8_urldecode($zona_clientes),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_zona_clientes

    function ajax_terceros_06052022_validate_clasificacion_clientes($clasificacion_clientes, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_clasificacion_clientes';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'clasificacion_clientes' => NM_utf8_urldecode($clasificacion_clientes),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_clasificacion_clientes

    function ajax_terceros_06052022_validate_puc_auxiliar_deudores($puc_auxiliar_deudores, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_puc_auxiliar_deudores';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_auxiliar_deudores' => NM_utf8_urldecode($puc_auxiliar_deudores),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_puc_auxiliar_deudores

    function ajax_terceros_06052022_validate_puc_retefuente_ventas($puc_retefuente_ventas, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_puc_retefuente_ventas';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_retefuente_ventas' => NM_utf8_urldecode($puc_retefuente_ventas),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_puc_retefuente_ventas

    function ajax_terceros_06052022_validate_puc_retefuente_servicios_clie($puc_retefuente_servicios_clie, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_puc_retefuente_servicios_clie';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_retefuente_servicios_clie' => NM_utf8_urldecode($puc_retefuente_servicios_clie),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_puc_retefuente_servicios_clie

    function ajax_terceros_06052022_validate_puc_auxiliar_proveedores($puc_auxiliar_proveedores, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_puc_auxiliar_proveedores';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_auxiliar_proveedores' => NM_utf8_urldecode($puc_auxiliar_proveedores),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_puc_auxiliar_proveedores

    function ajax_terceros_06052022_validate_puc_retefuente_compras($puc_retefuente_compras, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_puc_retefuente_compras';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_retefuente_compras' => NM_utf8_urldecode($puc_retefuente_compras),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_puc_retefuente_compras

    function ajax_terceros_06052022_validate_puc_retefuente_servicios_prov($puc_retefuente_servicios_prov, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_puc_retefuente_servicios_prov';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_retefuente_servicios_prov' => NM_utf8_urldecode($puc_retefuente_servicios_prov),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_puc_retefuente_servicios_prov

    function ajax_terceros_06052022_validate_archivo_cedula($archivo_cedula, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_archivo_cedula';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'archivo_cedula' => NM_utf8_urldecode($archivo_cedula),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_archivo_cedula

    function ajax_terceros_06052022_validate_archivo_rut($archivo_rut, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_archivo_rut';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'archivo_rut' => NM_utf8_urldecode($archivo_rut),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_archivo_rut

    function ajax_terceros_06052022_validate_archivo_nit($archivo_nit, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_archivo_nit';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'archivo_nit' => NM_utf8_urldecode($archivo_nit),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_archivo_nit

    function ajax_terceros_06052022_validate_archivo_pago($archivo_pago, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_archivo_pago';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'archivo_pago' => NM_utf8_urldecode($archivo_pago),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_archivo_pago

    function ajax_terceros_06052022_validate_id_plan($id_plan, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_id_plan';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'id_plan' => NM_utf8_urldecode($id_plan),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_id_plan

    function ajax_terceros_06052022_validate_valor_plan($valor_plan, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_valor_plan';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'valor_plan' => NM_utf8_urldecode($valor_plan),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_valor_plan

    function ajax_terceros_06052022_validate_fecha_registro_fe($fecha_registro_fe, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_fecha_registro_fe';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'fecha_registro_fe' => NM_utf8_urldecode($fecha_registro_fe),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_fecha_registro_fe

    function ajax_terceros_06052022_validate_nombre_contador($nombre_contador, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_nombre_contador';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre_contador' => NM_utf8_urldecode($nombre_contador),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_nombre_contador

    function ajax_terceros_06052022_validate_estado($estado, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_estado';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'estado' => NM_utf8_urldecode($estado),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_estado

    function ajax_terceros_06052022_validate_si_nomina($si_nomina, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_si_nomina';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'si_nomina' => NM_utf8_urldecode($si_nomina),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_si_nomina

    function ajax_terceros_06052022_validate_n_trabajadores($n_trabajadores, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_n_trabajadores';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'n_trabajadores' => NM_utf8_urldecode($n_trabajadores),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_n_trabajadores

    function ajax_terceros_06052022_validate_si_factura_electronica($si_factura_electronica, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_si_factura_electronica';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'si_factura_electronica' => NM_utf8_urldecode($si_factura_electronica),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_si_factura_electronica

    function ajax_terceros_06052022_validate_nombre_empresa_bd($nombre_empresa_bd, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_nombre_empresa_bd';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre_empresa_bd' => NM_utf8_urldecode($nombre_empresa_bd),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_nombre_empresa_bd

    function ajax_terceros_06052022_validate_archivos($archivos, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_archivos';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'archivos' => NM_utf8_urldecode($archivos),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_archivos

    function ajax_terceros_06052022_validate_es_restaurante($es_restaurante, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_es_restaurante';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'es_restaurante' => NM_utf8_urldecode($es_restaurante),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_es_restaurante

    function ajax_terceros_06052022_validate_porcentaje_propina_sugerida($porcentaje_propina_sugerida, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'validate_porcentaje_propina_sugerida';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'porcentaje_propina_sugerida' => NM_utf8_urldecode($porcentaje_propina_sugerida),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_validate_porcentaje_propina_sugerida

    function ajax_terceros_06052022_refresh_departamento($departamento, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'refresh_departamento';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'departamento' => NM_utf8_urldecode($departamento),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_refresh_departamento

    function ajax_terceros_06052022_refresh_idmuni($idmuni, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'refresh_idmuni';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'idmuni' => NM_utf8_urldecode($idmuni),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_refresh_idmuni

    function ajax_terceros_06052022_lkpedt_refresh_zona_clientes($zona_clientes, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'lkpedt_refresh_zona_clientes';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'zona_clientes' => NM_utf8_urldecode($zona_clientes),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_lkpedt_refresh_zona_clientes

    function ajax_terceros_06052022_lkpedt_refresh_clasificacion_clientes($clasificacion_clientes, $nmgp_refresh_fields, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'lkpedt_refresh_clasificacion_clientes';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'clasificacion_clientes' => NM_utf8_urldecode($clasificacion_clientes),
                  'nmgp_refresh_fields' => NM_utf8_urldecode($nmgp_refresh_fields),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_lkpedt_refresh_clasificacion_clientes

    function ajax_terceros_06052022_event_apellido1_onchange($nombre1, $apellido1, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_apellido1_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre1' => NM_utf8_urldecode($nombre1),
                  'apellido1' => NM_utf8_urldecode($apellido1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_apellido1_onchange

    function ajax_terceros_06052022_event_apellido2_onchange($nombre1, $apellido2, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_apellido2_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre1' => NM_utf8_urldecode($nombre1),
                  'apellido2' => NM_utf8_urldecode($apellido2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_apellido2_onchange

    function ajax_terceros_06052022_event_cliente_onchange($idtercero, $cliente, $credito, $cupodis, $cupo, $efec_retencion, $listaprecios, $loatiende, $proveedor, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_cliente_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'idtercero' => NM_utf8_urldecode($idtercero),
                  'cliente' => NM_utf8_urldecode($cliente),
                  'credito' => NM_utf8_urldecode($credito),
                  'cupodis' => NM_utf8_urldecode($cupodis),
                  'cupo' => NM_utf8_urldecode($cupo),
                  'efec_retencion' => NM_utf8_urldecode($efec_retencion),
                  'listaprecios' => NM_utf8_urldecode($listaprecios),
                  'loatiende' => NM_utf8_urldecode($loatiende),
                  'proveedor' => NM_utf8_urldecode($proveedor),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_cliente_onchange

    function ajax_terceros_06052022_event_credito_onchange($credito, $dias_credito, $dias_mora, $cupo, $cupodis, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_credito_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'credito' => NM_utf8_urldecode($credito),
                  'dias_credito' => NM_utf8_urldecode($dias_credito),
                  'dias_mora' => NM_utf8_urldecode($dias_mora),
                  'cupo' => NM_utf8_urldecode($cupo),
                  'cupodis' => NM_utf8_urldecode($cupodis),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_credito_onchange

    function ajax_terceros_06052022_event_creditoprov_onchange($creditoprov, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_creditoprov_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'creditoprov' => NM_utf8_urldecode($creditoprov),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_creditoprov_onchange

    function ajax_terceros_06052022_event_cupo_onchange($cupodis, $cupo, $saldo, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_cupo_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'cupodis' => NM_utf8_urldecode($cupodis),
                  'cupo' => NM_utf8_urldecode($cupo),
                  'saldo' => NM_utf8_urldecode($saldo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_cupo_onchange

    function ajax_terceros_06052022_event_documento_onchange($tipo_documento, $dv, $documento, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_documento_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'tipo_documento' => NM_utf8_urldecode($tipo_documento),
                  'dv' => NM_utf8_urldecode($dv),
                  'documento' => NM_utf8_urldecode($documento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_documento_onchange

    function ajax_terceros_06052022_event_nombre1_onchange($nombre1, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_nombre1_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre1' => NM_utf8_urldecode($nombre1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_nombre1_onchange

    function ajax_terceros_06052022_event_nombre2_onchange($nombre1, $nombre2, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_nombre2_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre1' => NM_utf8_urldecode($nombre1),
                  'nombre2' => NM_utf8_urldecode($nombre2),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_nombre2_onchange

    function ajax_terceros_06052022_event_nombre_comercil_onchange($tipo, $nombres, $nombre_comercil, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_nombre_comercil_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'tipo' => NM_utf8_urldecode($tipo),
                  'nombres' => NM_utf8_urldecode($nombres),
                  'nombre_comercil' => NM_utf8_urldecode($nombre_comercil),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_nombre_comercil_onchange

    function ajax_terceros_06052022_event_nombres_onblur($nombres, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_nombres_onblur';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombres' => NM_utf8_urldecode($nombres),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_nombres_onblur

    function ajax_terceros_06052022_event_nombres_onfocus($nombre1, $nombres, $nombre2, $apellido1, $apellido2, $tipo, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_nombres_onfocus';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'nombre1' => NM_utf8_urldecode($nombre1),
                  'nombres' => NM_utf8_urldecode($nombres),
                  'nombre2' => NM_utf8_urldecode($nombre2),
                  'apellido1' => NM_utf8_urldecode($apellido1),
                  'apellido2' => NM_utf8_urldecode($apellido2),
                  'tipo' => NM_utf8_urldecode($tipo),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_nombres_onfocus

    function ajax_terceros_06052022_event_proveedor_onchange($proveedor, $autoretenedor, $creditoprov, $dias, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_proveedor_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'proveedor' => NM_utf8_urldecode($proveedor),
                  'autoretenedor' => NM_utf8_urldecode($autoretenedor),
                  'creditoprov' => NM_utf8_urldecode($creditoprov),
                  'dias' => NM_utf8_urldecode($dias),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_proveedor_onchange

    function ajax_terceros_06052022_event_r_social_onchange($tipo, $r_social, $nombre2, $apellido2, $nombres, $nombre1, $apellido1, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_r_social_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'tipo' => NM_utf8_urldecode($tipo),
                  'r_social' => NM_utf8_urldecode($r_social),
                  'nombre2' => NM_utf8_urldecode($nombre2),
                  'apellido2' => NM_utf8_urldecode($apellido2),
                  'nombres' => NM_utf8_urldecode($nombres),
                  'nombre1' => NM_utf8_urldecode($nombre1),
                  'apellido1' => NM_utf8_urldecode($apellido1),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_r_social_onchange

    function ajax_terceros_06052022_event_regimen_onchange($regimen, $tipo_documento, $dv, $documento, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_regimen_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'regimen' => NM_utf8_urldecode($regimen),
                  'tipo_documento' => NM_utf8_urldecode($tipo_documento),
                  'dv' => NM_utf8_urldecode($dv),
                  'documento' => NM_utf8_urldecode($documento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_regimen_onchange

    function ajax_terceros_06052022_event_sucur_cliente_onchange($idtercero, $sucur_cliente, $idmuni, $direccion, $tel_cel, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_sucur_cliente_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'idtercero' => NM_utf8_urldecode($idtercero),
                  'sucur_cliente' => NM_utf8_urldecode($sucur_cliente),
                  'idmuni' => NM_utf8_urldecode($idmuni),
                  'direccion' => NM_utf8_urldecode($direccion),
                  'tel_cel' => NM_utf8_urldecode($tel_cel),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_sucur_cliente_onchange

    function ajax_terceros_06052022_event_tipo_documento_onchange($tipo_documento, $dv, $documento, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_tipo_documento_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'tipo_documento' => NM_utf8_urldecode($tipo_documento),
                  'dv' => NM_utf8_urldecode($dv),
                  'documento' => NM_utf8_urldecode($documento),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_tipo_documento_onchange

    function ajax_terceros_06052022_event_tipo_onchange($tipo, $regimen, $efec_retencion, $tipo_documento, $nombre_comercil, $representante, $nombre1, $apellido1, $nombre2, $apellido2, $r_social, $documento, $dv, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'event_tipo_onchange';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'tipo' => NM_utf8_urldecode($tipo),
                  'regimen' => NM_utf8_urldecode($regimen),
                  'efec_retencion' => NM_utf8_urldecode($efec_retencion),
                  'tipo_documento' => NM_utf8_urldecode($tipo_documento),
                  'nombre_comercil' => NM_utf8_urldecode($nombre_comercil),
                  'representante' => NM_utf8_urldecode($representante),
                  'nombre1' => NM_utf8_urldecode($nombre1),
                  'apellido1' => NM_utf8_urldecode($apellido1),
                  'nombre2' => NM_utf8_urldecode($nombre2),
                  'apellido2' => NM_utf8_urldecode($apellido2),
                  'r_social' => NM_utf8_urldecode($r_social),
                  'documento' => NM_utf8_urldecode($documento),
                  'dv' => NM_utf8_urldecode($dv),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_event_tipo_onchange

    function ajax_terceros_06052022_autocomp_puc_auxiliar_deudores($puc_auxiliar_deudores, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'autocomp_puc_auxiliar_deudores';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_auxiliar_deudores' => NM_utf8_urldecode($puc_auxiliar_deudores),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_auxiliar_deudores'] = utf8_decode(urldecode($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_auxiliar_deudores']));
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_autocomp_puc_auxiliar_deudores

    function ajax_terceros_06052022_autocomp_puc_retefuente_ventas($puc_retefuente_ventas, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'autocomp_puc_retefuente_ventas';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_retefuente_ventas' => NM_utf8_urldecode($puc_retefuente_ventas),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_retefuente_ventas'] = utf8_decode(urldecode($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_retefuente_ventas']));
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_autocomp_puc_retefuente_ventas

    function ajax_terceros_06052022_autocomp_puc_retefuente_servicios_clie($puc_retefuente_servicios_clie, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'autocomp_puc_retefuente_servicios_clie';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_retefuente_servicios_clie' => NM_utf8_urldecode($puc_retefuente_servicios_clie),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_retefuente_servicios_clie'] = utf8_decode(urldecode($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_retefuente_servicios_clie']));
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_autocomp_puc_retefuente_servicios_clie

    function ajax_terceros_06052022_autocomp_puc_auxiliar_proveedores($puc_auxiliar_proveedores, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'autocomp_puc_auxiliar_proveedores';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_auxiliar_proveedores' => NM_utf8_urldecode($puc_auxiliar_proveedores),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_auxiliar_proveedores'] = utf8_decode(urldecode($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_auxiliar_proveedores']));
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_autocomp_puc_auxiliar_proveedores

    function ajax_terceros_06052022_autocomp_puc_retefuente_compras($puc_retefuente_compras, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'autocomp_puc_retefuente_compras';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_retefuente_compras' => NM_utf8_urldecode($puc_retefuente_compras),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_retefuente_compras'] = utf8_decode(urldecode($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_retefuente_compras']));
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_autocomp_puc_retefuente_compras

    function ajax_terceros_06052022_autocomp_puc_retefuente_servicios_prov($puc_retefuente_servicios_prov, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'autocomp_puc_retefuente_servicios_prov';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'puc_retefuente_servicios_prov' => NM_utf8_urldecode($puc_retefuente_servicios_prov),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_retefuente_servicios_prov'] = utf8_decode(urldecode($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['puc_retefuente_servicios_prov']));
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_autocomp_puc_retefuente_servicios_prov

    function ajax_terceros_06052022_submit_form($tipo, $regimen, $tipo_documento, $documento, $dv, $codigo_tercero, $sexo, $notificar, $nombre1, $nombre2, $apellido1, $apellido2, $tel_cel, $urlmail, $idtercero, $r_social, $nombres, $nombre_comercil, $representante, $direccion, $departamento, $idmuni, $ciudad, $codigo_postal, $observaciones, $lenguaje, $c_postal, $correo_notificafe, $celular_notificafe, $cliente, $proveedor, $empleado, $es_tecnico, $activo, $credito, $cupo, $cupodis, $dias_credito, $dias_mora, $efec_retencion, $listaprecios, $loatiende, $autorizado, $relleno2, $sucur_cliente, $detalle_tributario, $responsabilidad_fiscal, $ciiu, $nacimiento, $fechault, $saldo, $afiliacion, $es_cajero, $cupo_vendedor, $autoretenedor, $creditoprov, $dias, $url, $contacto, $telefonos_prov, $email, $fechultcomp, $saldoapagar, $codigo_ter, $zona_clientes, $clasificacion_clientes, $puc_auxiliar_deudores, $puc_retefuente_ventas, $puc_retefuente_servicios_clie, $puc_auxiliar_proveedores, $puc_retefuente_compras, $puc_retefuente_servicios_prov, $archivo_cedula, $archivo_rut, $archivo_nit, $archivo_pago, $id_plan, $valor_plan, $fecha_registro_fe, $nombre_contador, $estado, $si_nomina, $n_trabajadores, $si_factura_electronica, $nombre_empresa_bd, $es_restaurante, $porcentaje_propina_sugerida, $archivo_cedula_ul_name, $archivo_cedula_ul_type, $archivo_rut_ul_name, $archivo_rut_ul_type, $archivo_nit_ul_name, $archivo_nit_ul_type, $archivo_pago_ul_name, $archivo_pago_ul_type, $archivo_cedula_salva, $archivo_cedula_limpa, $archivo_rut_salva, $archivo_rut_limpa, $archivo_nit_salva, $archivo_nit_limpa, $archivo_pago_salva, $archivo_pago_limpa, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init, $csrf_token)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'submit_form';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'tipo' => NM_utf8_urldecode($tipo),
                  'regimen' => NM_utf8_urldecode($regimen),
                  'tipo_documento' => NM_utf8_urldecode($tipo_documento),
                  'documento' => NM_utf8_urldecode($documento),
                  'dv' => NM_utf8_urldecode($dv),
                  'codigo_tercero' => NM_utf8_urldecode($codigo_tercero),
                  'sexo' => NM_utf8_urldecode($sexo),
                  'notificar' => NM_utf8_urldecode($notificar),
                  'nombre1' => NM_utf8_urldecode($nombre1),
                  'nombre2' => NM_utf8_urldecode($nombre2),
                  'apellido1' => NM_utf8_urldecode($apellido1),
                  'apellido2' => NM_utf8_urldecode($apellido2),
                  'tel_cel' => NM_utf8_urldecode($tel_cel),
                  'urlmail' => NM_utf8_urldecode($urlmail),
                  'idtercero' => NM_utf8_urldecode($idtercero),
                  'r_social' => NM_utf8_urldecode($r_social),
                  'nombres' => NM_utf8_urldecode($nombres),
                  'nombre_comercil' => NM_utf8_urldecode($nombre_comercil),
                  'representante' => NM_utf8_urldecode($representante),
                  'direccion' => NM_utf8_urldecode($direccion),
                  'departamento' => NM_utf8_urldecode($departamento),
                  'idmuni' => NM_utf8_urldecode($idmuni),
                  'ciudad' => NM_utf8_urldecode($ciudad),
                  'codigo_postal' => NM_utf8_urldecode($codigo_postal),
                  'observaciones' => NM_utf8_urldecode($observaciones),
                  'lenguaje' => NM_utf8_urldecode($lenguaje),
                  'c_postal' => NM_utf8_urldecode($c_postal),
                  'correo_notificafe' => NM_utf8_urldecode($correo_notificafe),
                  'celular_notificafe' => NM_utf8_urldecode($celular_notificafe),
                  'cliente' => NM_utf8_urldecode($cliente),
                  'proveedor' => NM_utf8_urldecode($proveedor),
                  'empleado' => NM_utf8_urldecode($empleado),
                  'es_tecnico' => NM_utf8_urldecode($es_tecnico),
                  'activo' => NM_utf8_urldecode($activo),
                  'credito' => NM_utf8_urldecode($credito),
                  'cupo' => NM_utf8_urldecode($cupo),
                  'cupodis' => NM_utf8_urldecode($cupodis),
                  'dias_credito' => NM_utf8_urldecode($dias_credito),
                  'dias_mora' => NM_utf8_urldecode($dias_mora),
                  'efec_retencion' => NM_utf8_urldecode($efec_retencion),
                  'listaprecios' => NM_utf8_urldecode($listaprecios),
                  'loatiende' => NM_utf8_urldecode($loatiende),
                  'autorizado' => NM_utf8_urldecode($autorizado),
                  'relleno2' => NM_utf8_urldecode($relleno2),
                  'sucur_cliente' => NM_utf8_urldecode($sucur_cliente),
                  'detalle_tributario' => NM_utf8_urldecode($detalle_tributario),
                  'responsabilidad_fiscal' => NM_utf8_urldecode($responsabilidad_fiscal),
                  'ciiu' => NM_utf8_urldecode($ciiu),
                  'nacimiento' => NM_utf8_urldecode($nacimiento),
                  'fechault' => NM_utf8_urldecode($fechault),
                  'saldo' => NM_utf8_urldecode($saldo),
                  'afiliacion' => NM_utf8_urldecode($afiliacion),
                  'es_cajero' => NM_utf8_urldecode($es_cajero),
                  'cupo_vendedor' => NM_utf8_urldecode($cupo_vendedor),
                  'autoretenedor' => NM_utf8_urldecode($autoretenedor),
                  'creditoprov' => NM_utf8_urldecode($creditoprov),
                  'dias' => NM_utf8_urldecode($dias),
                  'url' => NM_utf8_urldecode($url),
                  'contacto' => NM_utf8_urldecode($contacto),
                  'telefonos_prov' => NM_utf8_urldecode($telefonos_prov),
                  'email' => NM_utf8_urldecode($email),
                  'fechultcomp' => NM_utf8_urldecode($fechultcomp),
                  'saldoapagar' => NM_utf8_urldecode($saldoapagar),
                  'codigo_ter' => NM_utf8_urldecode($codigo_ter),
                  'zona_clientes' => NM_utf8_urldecode($zona_clientes),
                  'clasificacion_clientes' => NM_utf8_urldecode($clasificacion_clientes),
                  'puc_auxiliar_deudores' => NM_utf8_urldecode($puc_auxiliar_deudores),
                  'puc_retefuente_ventas' => NM_utf8_urldecode($puc_retefuente_ventas),
                  'puc_retefuente_servicios_clie' => NM_utf8_urldecode($puc_retefuente_servicios_clie),
                  'puc_auxiliar_proveedores' => NM_utf8_urldecode($puc_auxiliar_proveedores),
                  'puc_retefuente_compras' => NM_utf8_urldecode($puc_retefuente_compras),
                  'puc_retefuente_servicios_prov' => NM_utf8_urldecode($puc_retefuente_servicios_prov),
                  'archivo_cedula' => NM_utf8_urldecode($archivo_cedula),
                  'archivo_rut' => NM_utf8_urldecode($archivo_rut),
                  'archivo_nit' => NM_utf8_urldecode($archivo_nit),
                  'archivo_pago' => NM_utf8_urldecode($archivo_pago),
                  'id_plan' => NM_utf8_urldecode($id_plan),
                  'valor_plan' => NM_utf8_urldecode($valor_plan),
                  'fecha_registro_fe' => NM_utf8_urldecode($fecha_registro_fe),
                  'nombre_contador' => NM_utf8_urldecode($nombre_contador),
                  'estado' => NM_utf8_urldecode($estado),
                  'si_nomina' => NM_utf8_urldecode($si_nomina),
                  'n_trabajadores' => NM_utf8_urldecode($n_trabajadores),
                  'si_factura_electronica' => NM_utf8_urldecode($si_factura_electronica),
                  'nombre_empresa_bd' => NM_utf8_urldecode($nombre_empresa_bd),
                  'es_restaurante' => NM_utf8_urldecode($es_restaurante),
                  'porcentaje_propina_sugerida' => NM_utf8_urldecode($porcentaje_propina_sugerida),
                  'archivo_cedula_ul_name' => NM_utf8_urldecode($archivo_cedula_ul_name),
                  'archivo_cedula_ul_type' => NM_utf8_urldecode($archivo_cedula_ul_type),
                  'archivo_rut_ul_name' => NM_utf8_urldecode($archivo_rut_ul_name),
                  'archivo_rut_ul_type' => NM_utf8_urldecode($archivo_rut_ul_type),
                  'archivo_nit_ul_name' => NM_utf8_urldecode($archivo_nit_ul_name),
                  'archivo_nit_ul_type' => NM_utf8_urldecode($archivo_nit_ul_type),
                  'archivo_pago_ul_name' => NM_utf8_urldecode($archivo_pago_ul_name),
                  'archivo_pago_ul_type' => NM_utf8_urldecode($archivo_pago_ul_type),
                  'archivo_cedula_salva' => NM_utf8_urldecode($archivo_cedula_salva),
                  'archivo_cedula_limpa' => NM_utf8_urldecode($archivo_cedula_limpa),
                  'archivo_rut_salva' => NM_utf8_urldecode($archivo_rut_salva),
                  'archivo_rut_limpa' => NM_utf8_urldecode($archivo_rut_limpa),
                  'archivo_nit_salva' => NM_utf8_urldecode($archivo_nit_salva),
                  'archivo_nit_limpa' => NM_utf8_urldecode($archivo_nit_limpa),
                  'archivo_pago_salva' => NM_utf8_urldecode($archivo_pago_salva),
                  'archivo_pago_limpa' => NM_utf8_urldecode($archivo_pago_limpa),
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
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_submit_form

    function ajax_terceros_06052022_navigate_form($idtercero, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_terceros_06052022;
        //register_shutdown_function("terceros_06052022_pack_ajax_response");
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_flag          = true;
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao         = 'navigate_form';
        $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param'] = array(
                  'idtercero' => NM_utf8_urldecode($idtercero),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_fast_search' => NM_utf8_urldecode($nmgp_fast_search),
                  'nmgp_cond_fast_search' => NM_utf8_urldecode($nmgp_cond_fast_search),
                  'nmgp_arg_fast_search' => NM_utf8_urldecode($nmgp_arg_fast_search),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_terceros_06052022->contr_terceros_06052022->controle();
        exit;
    } // ajax_navigate_form


   function terceros_06052022_pack_ajax_response()
   {
      global $inicial_terceros_06052022;
      $aResp = array();

      if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['wizard']))
      {
          $aResp['wizard'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['wizard'];
      }
      if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            terceros_06052022_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            terceros_06052022_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            terceros_06052022_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            terceros_06052022_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = terceros_06052022_pack_protect_string($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            terceros_06052022_pack_ajax_ok($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['focus']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['focus'];
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['closeLine']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['clearUpload']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['btnDisabled']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['btnDisabled'])
         {
            terceros_06052022_pack_btn_disabled($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['btnLabel']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['btnLabel'])
         {
            terceros_06052022_pack_btn_label($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['varList']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['varList']))
         {
            terceros_06052022_pack_var_list($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['masterValue']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['masterValue'])
         {
            terceros_06052022_pack_master_value($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxAlert']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxAlert'])
         {
            terceros_06052022_pack_ajax_alert($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage'])
         {
            terceros_06052022_pack_ajax_message($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxJavascript']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxJavascript'])
         {
            terceros_06052022_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir']))
         {
            terceros_06052022_pack_ajax_redir($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redirExit']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redirExit']))
         {
            terceros_06052022_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['blockDisplay']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['blockDisplay']))
         {
            terceros_06052022_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['fieldDisplay']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['fieldDisplay']))
         {
            terceros_06052022_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['buttonDisplay']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['buttonDisplay']))
         {
            $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['buttonDisplay'] = $inicial_terceros_06052022->contr_terceros_06052022->nmgp_botoes;
            terceros_06052022_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['buttonDisplayVert']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['buttonDisplayVert']))
         {
            terceros_06052022_pack_ajax_button_display_vert($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['fieldLabel']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['fieldLabel']))
         {
            terceros_06052022_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['readOnly']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['readOnly']))
         {
            terceros_06052022_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navStatus']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navStatus']))
         {
            terceros_06052022_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navSummary']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navSummary']))
         {
            terceros_06052022_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navPage']))
         {
            terceros_06052022_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['btnVars']) && !empty($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['btnVars']))
         {
            terceros_06052022_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['quickSearchRes']) && $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['event_field']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['event_field'])
         {
            $aResp['eventField'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['event_field'];
         }
         else
         {
            $aResp['eventField'] = '__SC_NO_FIELD';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output']) && $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = terceros_06052022_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
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
   } // terceros_06052022_pack_ajax_response

   function terceros_06052022_pack_calendar_reload(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['calendarReload'] = 'OK';
   } // terceros_06052022_pack_calendar_reload

   function terceros_06052022_pack_ajax_errors(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['errList'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_terceros_06052022' == $sField)
         {
             $aMsg = terceros_06052022_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_terceros_06052022' != $sField)
                       ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => terceros_06052022_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // terceros_06052022_pack_ajax_errors

   function terceros_06052022_pack_ajax_remove_erros($aErrors)
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
   } // terceros_06052022_pack_ajax_remove_erros

   function terceros_06052022_pack_ajax_ok(&$aResp)
   {
      global $inicial_terceros_06052022;
      $iNumLinha = (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => terceros_06052022_pack_protect_string($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // terceros_06052022_pack_ajax_ok

   function terceros_06052022_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_terceros_06052022;
      $iNumLinha = (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['fldList'] as $sField => $aData)
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
            $aField['imgFile'] = terceros_06052022_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = terceros_06052022_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = terceros_06052022_pack_protect_string($aData['imgLink']);
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
            $aField['docLink'] = terceros_06052022_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = terceros_06052022_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['docReadonly']))
         {
            $aField['docReadonly'] = terceros_06052022_pack_protect_string($aData['docReadonly']);
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
            $aField['imgHtml'] = terceros_06052022_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = terceros_06052022_pack_protect_string($aData['mulHtml']);
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
               $aValue['label'] = terceros_06052022_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? terceros_06052022_pack_protect_string($sValue) : $sValue;
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
                     $aField['optList'][] = array('value' => terceros_06052022_pack_protect_string($sOpt),
                                                  'label' => terceros_06052022_pack_protect_string($sLabel));
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
   } // terceros_06052022_pack_ajax_set_fields

   function terceros_06052022_pack_ajax_redir(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redir'][$sTag];
         }
      }
   } // terceros_06052022_pack_ajax_redir

   function terceros_06052022_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // terceros_06052022_pack_ajax_redir_exit

   function terceros_06052022_pack_var_list(&$aResp)
   {
      global $inicial_terceros_06052022;
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['varList'] as $varData)
      {
         $aResp['varList'][] = array('index' => key($varData),
                                      'value' => current($varData));
      }
   } // terceros_06052022_pack_var_list

   function terceros_06052022_pack_master_value(&$aResp)
   {
      global $inicial_terceros_06052022;
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // terceros_06052022_pack_master_value

   function terceros_06052022_pack_btn_disabled(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['btnDisabled'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['btnDisabled'] as $btnName => $btnStatus) {
        $aResp['btnDisabled'][$btnName] = $btnStatus;
      }
   } // terceros_06052022_pack_ajax_alert

   function terceros_06052022_pack_btn_label(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['btnLabel'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['btnLabel'] as $btnName => $btnLabel) {
        $aResp['btnLabel'][$btnName] = $btnLabel;
      }
   } // terceros_06052022_pack_ajax_alert

   function terceros_06052022_pack_ajax_alert(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['ajaxAlert'] = array('message' => $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxAlert']['message'], 'params' =>  $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxAlert']['params']);
   } // terceros_06052022_pack_ajax_alert

   function terceros_06052022_pack_ajax_message(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['ajaxMessage'] = array('message'      => terceros_06052022_pack_protect_string($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => terceros_06052022_pack_protect_string($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'toast'        => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['toast'])        ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['toast']        : 'N',
                                    'toast_pos'    => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['toast_pos'])    ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['toast_pos']    : '',
                                    'type'         => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['type'])         ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['type']         : '',
                                    'redir_target' => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // terceros_06052022_pack_ajax_message

   function terceros_06052022_pack_ajax_javascript(&$aResp)
   {
      global $inicial_terceros_06052022;
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // terceros_06052022_pack_ajax_javascript

   function terceros_06052022_pack_ajax_block_display(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // terceros_06052022_pack_ajax_block_display

   function terceros_06052022_pack_ajax_field_display(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // terceros_06052022_pack_ajax_field_display

   function terceros_06052022_pack_ajax_button_display(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // terceros_06052022_pack_ajax_button_display

   function terceros_06052022_pack_ajax_button_display_vert(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['buttonDisplayVert'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['buttonDisplayVert'] as $aButtonData)
      {
        $aResp['buttonDisplayVert'][] = $aButtonData;
      }
   } // terceros_06052022_pack_ajax_button_display

   function terceros_06052022_pack_ajax_field_label(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, terceros_06052022_pack_protect_string($sFieldLabel));
      }
   } // terceros_06052022_pack_ajax_field_label

   function terceros_06052022_pack_ajax_readonly(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['readOnly'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // terceros_06052022_pack_ajax_readonly

   function terceros_06052022_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['navStatus'] = array();
      if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navStatus']['ret']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navStatus']['ava']) && '' != $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navStatus']['ava'];
      }
   } // terceros_06052022_pack_ajax_nav_status

   function terceros_06052022_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navSummary']['reg_tot'];
   } // terceros_06052022_pack_ajax_nav_Summary

   function terceros_06052022_pack_ajax_navPage(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['navPage'] = $inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['navPage'];
   } // terceros_06052022_pack_ajax_navPage


   function terceros_06052022_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_terceros_06052022;
      $aResp['btnVars'] = array();
      foreach ($inicial_terceros_06052022->contr_terceros_06052022->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, terceros_06052022_pack_protect_string($sBtnValue));
      }
   } // terceros_06052022_pack_ajax_btn_vars

   function terceros_06052022_pack_protect_string($sString)
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
   } // terceros_06052022_pack_protect_string
?>
