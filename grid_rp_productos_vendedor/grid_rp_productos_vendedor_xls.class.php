<?php

class grid_rp_productos_vendedor_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Xls_dados;
   var $Xls_workbook;
   var $Xls_col;
   var $Xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $NM_ctrl_style = array();
   var $Arquivo;
   var $Tit_doc;
   var $count_ger;
   var $sum_cantidad;
   var $sum_total;
   var $v_nombres_Old;
   var $arg_sum_v_nombres;
   var $Label_v_nombres;
   var $sc_proc_quebra_v_nombres;
   var $count_v_nombres;
   var $sum_v_nombres_cantidad;
   var $sum_v_nombres_total;
   var $p_nompro_Old;
   var $arg_sum_p_nompro;
   var $Label_p_nompro;
   var $sc_proc_quebra_p_nompro;
   var $count_p_nompro;
   var $sum_p_nompro_cantidad;
   var $sum_p_nompro_total;
   var $f_fechaven_Old;
   var $arg_sum_f_fechaven;
   var $Label_f_fechaven;
   var $sc_proc_quebra_f_fechaven;
   var $count_f_fechaven;
   var $sum_f_fechaven_cantidad;
   var $sum_f_fechaven_total;
   var $periodo_Old;
   var $arg_sum_periodo;
   var $Label_periodo;
   var $sc_proc_quebra_periodo;
   var $count_periodo;
   var $sum_periodo_cantidad;
   var $sum_periodo_total;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xls_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($this->Arr_result);
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
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
                   nm_limpa_str_grid_rp_productos_vendedor($cadapar[1]);
                   nm_protect_num_grid_rp_productos_vendedor($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_rp_productos_vendedor']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->SC_top = array();
      $this->SC_bot = array();
      $this->SC_bot[] = "v_nombres";
      $this->SC_top[] = "v_nombres";
      $this->SC_bot[] = "p_nompro";
      $this->SC_top[] = "p_nompro";
      $this->SC_bot[] = "f_fechaven";
      $this->SC_top[] = "f_fechaven";
      $this->SC_bot[] = "periodo";
      $this->SC_top[] = "periodo";
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
      { 
          if ($this->Use_phpspreadsheet) {
              require_once $this->Ini->path_third . '/phpspreadsheet/vendor/autoload.php';
          } 
          else { 
              set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/Cell/AdvancedValueBinder.php';
          } 
      } 
      $orig_form_dt = strtoupper($_SESSION['scriptcase']['reg_conf']['date_format']);
      $this->SC_date_conf_region = "";
      for ($i = 0; $i < 8; $i++)
      {
          if ($i > 0 && substr($orig_form_dt, $i, 1) != substr($this->SC_date_conf_region, -1, 1)) {
              $this->SC_date_conf_region .= $_SESSION['scriptcase']['reg_conf']['date_sep'];
          }
          $this->SC_date_conf_region .= substr($orig_form_dt, $i, 1);
      }
      $this->Xls_tp = ".xlsx";
      if (isset($_REQUEST['nmgp_tp_xls']) && !empty($_REQUEST['nmgp_tp_xls']))
      {
          $this->Xls_tp = "." . $_REQUEST['nmgp_tp_xls'];
      }
      $this->groupby_show = "N";
      if (isset($_REQUEST['nmgp_tot_xls']) && !empty($_REQUEST['nmgp_tot_xls']))
      {
          $this->groupby_show = $_REQUEST['nmgp_tot_xls'];
      }
      $this->Xls_col      = 0;
      $this->Tem_xls_res  = false;
      $this->Xls_password = "";
      $this->nm_data      = new nm_data("es");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->Tem_xls_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_rp_productos_vendedor/grid_rp_productos_vendedor_res_xls.class.php"))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "grid_rp_productos_vendedor_res_xls.class.php");
              $this->Res_xls = new grid_rp_productos_vendedor_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_rp_productos_vendedor.zip";
          $this->Arquivo   .= "_grid_rp_productos_vendedor" . $this->Xls_tp;
          $this->Tit_doc    = "grid_rp_productos_vendedor" . $this->Xls_tp;
          $this->Tit_zip    = "grid_rp_productos_vendedor.zip";
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          if ($this->Use_phpspreadsheet) {
              $this->Xls_dados = new PhpOffice\PhpSpreadsheet\Spreadsheet();
              \PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
          }
          else {
              PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
              $this->Xls_dados = new PHPExcel();
          }
          $this->Xls_dados->setActiveSheetIndex(0);
          $this->Nm_ActiveSheet = $this->Xls_dados->getActiveSheet();
          $this->Nm_ActiveSheet->setTitle($this->Ini->Nm_lang['lang_othr_grid_titl']);
          if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
          {
              $this->Nm_ActiveSheet->setRightToLeft(true);
          }
      }
      require_once($this->Ini->path_aplicacao . "grid_rp_productos_vendedor_total.class.php"); 
      $this->Tot = new grid_rp_productos_vendedor_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'];
      $this->Tot->$Gb_geral();
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][1];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_producto")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_fecha")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor_producto")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "periodo")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_rp_productos_vendedor']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_return']);
          if ($this->Tem_xls_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot );
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_producto")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_fecha")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor_producto")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "periodo")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
          $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
      }
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function grava_arquivo()
   {
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_rp_productos_vendedor']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_rp_productos_vendedor']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_rp_productos_vendedor']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->periodo = $Busca_temp['periodo']; 
          $tmp_pos = strpos($this->periodo, "##@@");
          if ($tmp_pos !== false && !is_array($this->periodo))
          {
              $this->periodo = substr($this->periodo, 0, $tmp_pos);
          }
          $this->f_fechaven = $Busca_temp['f_fechaven']; 
          $tmp_pos = strpos($this->f_fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->f_fechaven))
          {
              $this->f_fechaven = substr($this->f_fechaven, 0, $tmp_pos);
          }
          $this->f_fechaven_2 = $Busca_temp['f_fechaven_input_2']; 
          $this->v_nombres = $Busca_temp['v_nombres']; 
          $tmp_pos = strpos($this->v_nombres, "##@@");
          if ($tmp_pos !== false && !is_array($this->v_nombres))
          {
              $this->v_nombres = substr($this->v_nombres, 0, $tmp_pos);
          }
          $this->grupo = $Busca_temp['grupo']; 
          $tmp_pos = strpos($this->grupo, "##@@");
          if ($tmp_pos !== false && !is_array($this->grupo))
          {
              $this->grupo = substr($this->grupo, 0, $tmp_pos);
          }
          $this->p_nompro = $Busca_temp['p_nompro']; 
          $tmp_pos = strpos($this->p_nompro, "##@@");
          if ($tmp_pos !== false && !is_array($this->p_nompro))
          {
              $this->p_nompro = substr($this->p_nompro, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_name'] .= $this->Xls_tp;
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT month(f.fechaven) as periodo, str_replace (convert(char(10),f.fechaven,102), '.', '-') + ' ' + convert(char(8),f.fechaven,20) as f_fechaven, v.nombres as v_nombres, g.nomgrupo as grupo, p.nompro as p_nompro, d.cantidad as cantidad, d.valorpar as total from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT month(f.fechaven) as periodo, f.fechaven as f_fechaven, v.nombres as v_nombres, g.nomgrupo as grupo, p.nompro as p_nompro, d.cantidad as cantidad, d.valorpar as total from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT month(f.fechaven) as periodo, convert(char(23),f.fechaven,121) as f_fechaven, v.nombres as v_nombres, g.nomgrupo as grupo, p.nompro as p_nompro, d.cantidad as cantidad, d.valorpar as total from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT month(f.fechaven) as periodo, f.fechaven as f_fechaven, v.nombres as v_nombres, g.nomgrupo as grupo, p.nompro as p_nompro, d.cantidad as cantidad, d.valorpar as total from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT month(f.fechaven) as periodo, EXTEND(f.fechaven, YEAR TO DAY) as f_fechaven, v.nombres as v_nombres, g.nomgrupo as grupo, p.nompro as p_nompro, d.cantidad as cantidad, d.valorpar as total from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT month(f.fechaven) as periodo, f.fechaven as f_fechaven, v.nombres as v_nombres, g.nomgrupo as grupo, p.nompro as p_nompro, d.cantidad as cantidad, d.valorpar as total from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $prim_reg = true;
      $prim_gb  = true;
      $nm_houve_quebra = "N";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $prim_reg = false;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->periodo = $rs->fields[0] ;  
         $this->periodo = (string)$this->periodo;
         $this->f_fechaven = $rs->fields[1] ;  
         $this->v_nombres = $rs->fields[2] ;  
         $this->grupo = $rs->fields[3] ;  
         $this->p_nompro = $rs->fields[4] ;  
         $this->cantidad = $rs->fields[5] ;  
         $this->cantidad = (string)$this->cantidad;
         $this->total = $rs->fields[6] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $this->arg_sum_periodo = ($this->periodo == "") ? " is null " : " = " . $this->periodo;
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_fecha")
         {
             $Format_tst = $this->Ini->Get_Gb_date_format('por_fecha', 'f_fechaven');
             $TP_Time     = (in_array('f_fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
             $this->arg_sum_f_fechaven = $this->Ini->Get_date_arg_sum($TP_Time . $this->f_fechaven, $Format_tst, "f.fechaven");
             if (empty($this->f_fechaven))
             {
                 $this->Tot->Sc_groupby_f_fechaven = "f.fechaven";
             }
             else
             {
                 $this->Tot->Sc_groupby_f_fechaven = $this->Ini->Get_sql_date_groupby("f.fechaven", $Format_tst);
             }
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "sc_free_group_by")
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
             {
                 $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
                 if ($Cmp_orig == "f_fechaven")
                 {
                     $Str_arg_sum = "arg_sum_" . $cmp_gb;
                     $Format_tst  = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                     $TP_Time     = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                     $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->f_fechaven, $Format_tst, "f.fechaven");
                 }
             }
         }
         if ($this->f_fechaven == "")
         {
             $this->arg_sum_f_fechaven = " is null";
         }
         elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "_NM_SC_")
         {
             $this->arg_sum_f_fechaven = " = " . $this->Db->qstr($this->f_fechaven);
         }
         $this->arg_sum_v_nombres = " = " . $this->Db->qstr($this->v_nombres);
         $this->arg_sum_p_nompro = " = " . $this->Db->qstr($this->p_nompro);
          if ($this->v_nombres !== $this->v_nombres_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor") 
          {  
              if (isset($this->v_nombres_Old) && !$prim_gb)
              {
                 $this->quebra_v_nombres_por_asesor_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->v_nombres_Old = $this->v_nombres ; 
              $this->quebra_v_nombres_por_asesor($this->v_nombres) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->v_nombres_Old))
              {
                 $this->quebra_v_nombres_por_asesor_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->p_nompro !== $this->p_nompro_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_producto") 
          {  
              if (isset($this->p_nompro_Old) && !$prim_gb)
              {
                 $this->quebra_p_nompro_por_producto_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->p_nompro_Old = $this->p_nompro ; 
              $this->quebra_p_nompro_por_producto($this->p_nompro) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->p_nompro_Old))
              {
                 $this->quebra_p_nompro_por_producto_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          $Format_tst = $this->Ini->Get_Gb_date_format('por_fecha', 'f_fechaven');
          $TP_Time = (in_array('f_fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->f_fechaven, $Format_tst);
          if ($Cmp_tst != $this->f_fechaven_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_fecha") 
          {  
              if (isset($this->f_fechaven_Old) && !$prim_gb)
              {
                 $this->quebra_f_fechaven_por_fecha_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $Format_tst = $this->Ini->Get_Gb_date_format('por_fecha', 'f_fechaven');
              $TP_Time = (in_array('f_fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->f_fechaven_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->f_fechaven, $Format_tst);
              $this->quebra_f_fechaven_por_fecha($this->f_fechaven) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->f_fechaven_Old))
              {
                 $this->quebra_f_fechaven_por_fecha_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->v_nombres !== $this->v_nombres_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor_producto") 
          {  
              if (isset($this->p_nompro_Old) && !$prim_gb)
              {
                 $this->quebra_p_nompro_por_asesor_producto_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if (isset($this->v_nombres_Old) && !$prim_gb)
              {
                 $this->quebra_v_nombres_por_asesor_producto_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->p_nompro_Old = $this->p_nompro ; 
              $this->quebra_p_nompro_por_asesor_producto($this->v_nombres, $this->p_nompro) ; 
              $this->v_nombres_Old = $this->v_nombres ; 
              $this->quebra_v_nombres_por_asesor_producto($this->v_nombres) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->v_nombres_Old))
              {
                 $this->quebra_v_nombres_por_asesor_producto_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if (isset($this->p_nompro_Old))
              {
                 $this->quebra_p_nompro_por_asesor_producto_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->p_nompro !== $this->p_nompro_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor_producto") 
          {  
              if (isset($this->p_nompro_Old) && !$prim_gb)
              {
                 $this->quebra_p_nompro_por_asesor_producto_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->p_nompro_Old = $this->p_nompro ; 
              $this->quebra_p_nompro_por_asesor_producto($this->v_nombres, $this->p_nompro) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->p_nompro_Old))
              {
                 $this->quebra_p_nompro_por_asesor_producto_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "sc_free_group_by") 
          {  
              $SC_arg_Gby = array();
              $SC_arg_Sql = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                  $SC_arg_Gby[$cmp] = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
              }
              $SC_lst_Gby = array();
              $gb_ok      = false;
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $SC_arg_Sql[$cmp] = $sql;
                  $Fun_GB  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  if (!empty($Format_tst))
                  {
                      $temp = $this->$cmp;
                      if (!empty($temp))
                      {
                          $SC_arg_Sql[$cmp] = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                      }
                  }
                  $temp = $cmp . "_Old";
                  if ($SC_arg_Gby[$cmp] != $this->$temp || $gb_ok)
                  {
                      $SC_lst_Gby[] = $cmp;
                      $gb_ok = true;
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp']);
              krsort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_bot) && !$prim_gb)
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                      $this->$tmp($cmp);
                      $this->Nivel_gbBot--;
                      if ($this->groupby_show == "S") {
                          $this->Xls_col = 0;
                          $this->Xls_row++;
                      }
                  }
                  $sql_where = "";
                  $cmp_qb     = $this->$cmp;
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp'] as $Col_Gb => $Sql)
                  {
                      $tmp        = "arg_sum_" . $Col_Gb;
                      $sql_where .= (!empty($sql_where)) ? " and " : "";
                      $sql_where .= $SC_arg_Sql[$Col_Gb] . $this->$tmp;
                      if ($Col_Gb == $cmp)
                      {
                          break;
                      }
                  }
                  $tmp  = "quebra_" . $cmp . "_sc_free_group_by";
                  $this->$tmp($cmp_qb, $sql_where, $cmp);
              }
              if (!empty($SC_lst_Gby) && !$prim_gb && $this->groupby_show == "S" && $this->groupby_show == "S")
              {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp']);
              ksort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_top))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
                      $this->$tmp($cmp);
                      if ($this->groupby_show == "S") {
                          $this->Xls_col = 0;
                          $this->Xls_row++;
                      }
                  }
              }
              if (!empty($SC_lst_Gby))
              {
                  $nm_houve_quebra = "S";
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp'] as $cmp => $sql)
                  {
                      $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_orig'][$cmp] : $cmp;
                      $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                      $Cmp_Old   = $cmp . '_Old';
                      $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                      $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
                  }
              }
          }  
          if ($this->periodo !== $this->periodo_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "periodo") 
          {  
              if (isset($this->periodo_Old) && !$prim_gb)
              {
                 $this->quebra_periodo_periodo_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->periodo_Old = $this->periodo ; 
              $this->quebra_periodo_periodo($this->periodo) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->periodo_Old))
              {
                 $this->quebra_periodo_periodo_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
         { 
             if ($prim_gb) {
                 $this->count_span = 0;
                 $this->proc_label();
             }
             if ($prim_gb || $nm_houve_quebra == "S") {
                 $this->xls_sub_cons_copy_label($this->Xls_row);
                 $this->Xls_row++;
             }
         }
         elseif ($prim_gb || $nm_houve_quebra == "S")
         {
             $this->count_span = 0;
             $this->proc_label();
         }
     }
     else {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
         { 
             if ($prim_gb)
             {
                 $this->count_span = 0;
                 $this->proc_label();
                 $this->xls_sub_cons_copy_label($this->Xls_row);
                 $this->Xls_row++;
             }
         }
         elseif ($prim_gb)
         {
             $this->count_span = 0;
             $this->proc_label();
         }
     }
     $prim_gb = false;
     $nm_houve_quebra = "N";
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
                { 
                    $NM_func_exp = "NM_sub_cons_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
                else 
                { 
                    $NM_func_exp = "NM_export_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
            } 
         } 
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'] && $prim_reg)
      { 
          $this->proc_label();
          $this->xls_sub_cons_copy_label($this->Xls_row);
          $nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
          $nm_grid_sem_reg  = NM_charset_to_utf8($nm_grid_sem_reg);
          $this->Xls_row++;
          $this->arr_export['lines'][$this->Xls_row][1]['data']   = $nm_grid_sem_reg;
          $this->arr_export['lines'][$this->Xls_row][1]['align']  = "right";
          $this->arr_export['lines'][$this->Xls_row][1]['type']   = "char";
          $this->arr_export['lines'][$this->Xls_row][1]['format'] = "";
      }
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
          $this->Xls_col = 0;
          $this->Xls_row++;
       if (isset($this->v_nombres_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor")
       {
           $this->quebra_v_nombres_por_asesor_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->p_nompro_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_producto")
       {
           $this->quebra_p_nompro_por_producto_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->f_fechaven_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_fecha")
       {
           $this->quebra_f_fechaven_por_fecha_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->p_nompro_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor_producto")
       {
           $this->quebra_p_nompro_por_asesor_producto_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->v_nombres_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "por_asesor_producto")
       {
           $this->quebra_v_nombres_por_asesor_producto_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           $SC_lst_Gby = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $SC_lst_Gby[] = $cmp;
           }
           $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Gb_Free_cmp']);
           krsort ($SC_lst_Gby);
           foreach ($SC_lst_Gby as $Ind => $cmp)
           {
               if (in_array($cmp, $this->SC_bot) && !$prim_gb)
               {
                   $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                   $this->$tmp($cmp);
                   $this->Nivel_gbBot--;
                   if ($this->groupby_show == "S") {
                       $this->Xls_col = 0;;
                       $this->Xls_row++;;
                   }
               }
           }
       }
       if (isset($this->periodo_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] == "periodo")
       {
           $this->quebra_periodo_periodo_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
          $this->Xls_col = 0;
          $this->Xls_row++;
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['SC_Ind_Groupby'] . "_bot";
          $this->$Gb_geral();
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_res_grid'] = true;
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              $this->Res_xls->monta_xls();
              if ($this->Use_phpspreadsheet) {
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_res_sheet']);
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Use_phpspreadsheet) {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->Xls_dados);
              } 
              else {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xls($this->Xls_dados);
              } 
          } 
          else {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PHPExcel_Writer_Excel2007($this->Xls_dados);
              } 
              else {
                  $objWriter = new PHPExcel_Writer_Excel5($this->Xls_dados);
              } 
          } 
          $objWriter->save($this->Xls_f);
          if ($this->Xls_password != "")
          { 
              $str_zip   = "";
              $Zip_f     = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input = (FALSE !== strpos($this->Xls_f, ' ')) ? " \"" . $this->Xls_f . "\"" :  $this->Xls_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe -P -j " . $this->Xls_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za -p" . $this->Xls_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za -p" . $this->Xls_password . " a " . $Zip_f . " " . $Arq_input;
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
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Xls_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
          } 
      } 
      else 
      { 
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['periodo'])) ? $this->New_label['periodo'] : "Periodo"; 
          if ($Cada_col == "periodo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['f_fechaven'])) ? $this->New_label['f_fechaven'] : "Fecha"; 
          if ($Cada_col == "f_fechaven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "center";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['v_nombres'])) ? $this->New_label['v_nombres'] : "Vendedor"; 
          if ($Cada_col == "v_nombres" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['grupo'])) ? $this->New_label['grupo'] : "Grupo"; 
          if ($Cada_col == "grupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['p_nompro'])) ? $this->New_label['p_nompro'] : "Producto"; 
          if ($Cada_col == "p_nompro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Cantidad"; 
          if ($Cada_col == "cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
      } 
      $this->Xls_col = 0;
      $this->Xls_row++;
   } 
   //----- periodo
   function NM_export_periodo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->periodo = NM_charset_to_utf8($this->periodo);
         if (is_numeric($this->periodo))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->periodo);
         $this->Xls_col++;
   }
   //----- f_fechaven
   function NM_export_f_fechaven()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->f_fechaven = substr($this->f_fechaven, 0, 10);
         if (empty($this->f_fechaven) || $this->f_fechaven == "0000-00-00")
         {
             if ($this->Use_phpspreadsheet) {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->f_fechaven, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
             }
             else {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->f_fechaven, PHPExcel_Cell_DataType::TYPE_STRING);
             }
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->f_fechaven);
             $this->NM_ctrl_style[$current_cell_ref]['format'] = $this->SC_date_conf_region;
         }
         $this->Xls_col++;
   }
   //----- v_nombres
   function NM_export_v_nombres()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->v_nombres = html_entity_decode($this->v_nombres, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->v_nombres = strip_tags($this->v_nombres);
         $this->v_nombres = NM_charset_to_utf8($this->v_nombres);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->v_nombres, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->v_nombres, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- grupo
   function NM_export_grupo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->grupo = html_entity_decode($this->grupo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->grupo = strip_tags($this->grupo);
         $this->grupo = NM_charset_to_utf8($this->grupo);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->grupo, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->grupo, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- p_nompro
   function NM_export_p_nompro()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->p_nompro = html_entity_decode($this->p_nompro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p_nompro = strip_tags($this->p_nompro);
         $this->p_nompro = NM_charset_to_utf8($this->p_nompro);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->p_nompro, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->p_nompro, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- cantidad
   function NM_export_cantidad()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->cantidad = NM_charset_to_utf8($this->cantidad);
         if (is_numeric($this->cantidad))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->cantidad);
         $this->Xls_col++;
   }
   //----- total
   function NM_export_total()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->total = NM_charset_to_utf8($this->total);
         if (is_numeric($this->total))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->total);
         $this->Xls_col++;
   }
   //----- periodo
   function NM_sub_cons_periodo()
   {
         $this->periodo = NM_charset_to_utf8($this->periodo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->periodo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- f_fechaven
   function NM_sub_cons_f_fechaven()
   {
         $this->f_fechaven = substr($this->f_fechaven, 0, 10);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->f_fechaven;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "data";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $this->SC_date_conf_region;
         $this->Xls_col++;
   }
   //----- v_nombres
   function NM_sub_cons_v_nombres()
   {
         $this->v_nombres = html_entity_decode($this->v_nombres, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->v_nombres = strip_tags($this->v_nombres);
         $this->v_nombres = NM_charset_to_utf8($this->v_nombres);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->v_nombres;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- grupo
   function NM_sub_cons_grupo()
   {
         $this->grupo = html_entity_decode($this->grupo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->grupo = strip_tags($this->grupo);
         $this->grupo = NM_charset_to_utf8($this->grupo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->grupo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- p_nompro
   function NM_sub_cons_p_nompro()
   {
         $this->p_nompro = html_entity_decode($this->p_nompro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->p_nompro = strip_tags($this->p_nompro);
         $this->p_nompro = NM_charset_to_utf8($this->p_nompro);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->p_nompro;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- cantidad
   function NM_sub_cons_cantidad()
   {
         $this->cantidad = NM_charset_to_utf8($this->cantidad);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->cantidad;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- total
   function NM_sub_cons_total()
   {
         $this->total = NM_charset_to_utf8($this->total);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->total;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['nolabel'])
       {
           foreach ($this->arr_export['label'] as $col => $dados)
           {
               $this->arr_export['lines'][$row][$col] = $dados;
           }
       }
   }
   function xls_set_style()
   {
       if (!empty($this->NM_ctrl_style))
       {
           foreach ($this->NM_ctrl_style as $col => $dados)
           {
               $cell_ref = $col . $dados['ini'] . ":" . $col . $dados['end'];
               if ($this->Use_phpspreadsheet) {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                   }
               }
               else {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                   }
               }
               if (isset($dados['format'])) {
                   $this->Nm_ActiveSheet->getStyle($cell_ref)->getNumberFormat()->setFormatCode($dados['format']);
               }
           }
           $this->NM_ctrl_style = array();
       }
   }
 function quebra_v_nombres_por_asesor($v_nombres) 
 {
   global $tot_v_nombres;
   $this->sc_proc_quebra_v_nombres = true; 
   $this->Tot->quebra_v_nombres_por_asesor($v_nombres, $this->arg_sum_v_nombres);
   $conteudo = $tot_v_nombres[0] ;  
   $this->count_v_nombres = $tot_v_nombres[1];
   $this->sum_v_nombres_cantidad = $tot_v_nombres[2];
   $this->sum_v_nombres_total = $tot_v_nombres[3];
   $this->campos_quebra_v_nombres = array(); 
   $conteudo = sc_strip_script($this->v_nombres); 
   $this->campos_quebra_v_nombres[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['v_nombres']))
   {
       $this->campos_quebra_v_nombres[0]['lab'] = $this->nmgp_label_quebras['v_nombres']; 
   }
   else
   {
   $this->campos_quebra_v_nombres[0]['lab'] = "Vendedor"; 
   }
   $this->sc_proc_quebra_v_nombres = false; 
 } 
 function quebra_p_nompro_por_producto($p_nompro) 
 {
   global $tot_p_nompro;
   $this->sc_proc_quebra_p_nompro = true; 
   $this->Tot->quebra_p_nompro_por_producto($p_nompro, $this->arg_sum_p_nompro);
   $conteudo = $tot_p_nompro[0] ;  
   $this->count_p_nompro = $tot_p_nompro[1];
   $this->sum_p_nompro_cantidad = $tot_p_nompro[2];
   $this->sum_p_nompro_total = $tot_p_nompro[3];
   $this->campos_quebra_p_nompro = array(); 
   $conteudo = sc_strip_script($this->p_nompro); 
   $this->campos_quebra_p_nompro[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['p_nompro']))
   {
       $this->campos_quebra_p_nompro[0]['lab'] = $this->nmgp_label_quebras['p_nompro']; 
   }
   else
   {
   $this->campos_quebra_p_nompro[0]['lab'] = "Producto"; 
   }
   $this->sc_proc_quebra_p_nompro = false; 
 } 
 function quebra_f_fechaven_por_fecha($f_fechaven) 
 {
   global $tot_f_fechaven;
   $TP_Time = (in_array('f_fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $f_fechaven = $this->Ini->Get_arg_groupby($TP_Time . $f_fechaven, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_f_fechaven = true; 
   $this->Tot->quebra_f_fechaven_por_fecha($f_fechaven, $this->arg_sum_f_fechaven);
   $conteudo = $tot_f_fechaven[0] ;  
   $this->count_f_fechaven = $tot_f_fechaven[1];
   $this->sum_f_fechaven_cantidad = $tot_f_fechaven[2];
   $this->sum_f_fechaven_total = $tot_f_fechaven[3];
   $this->campos_quebra_f_fechaven = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->f_fechaven)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('por_fecha', 'f_fechaven');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('por_fecha', 'f_fechaven');
   $TP_Time    = (in_array('f_fechaven', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_f_fechaven[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['f_fechaven']))
   {
       $this->campos_quebra_f_fechaven[0]['lab'] = $this->nmgp_label_quebras['f_fechaven']; 
   }
   else
   {
   $this->campos_quebra_f_fechaven[0]['lab'] = "Fecha"; 
   }
   $this->sc_proc_quebra_f_fechaven = false; 
 } 
 function quebra_v_nombres_por_asesor_producto($v_nombres) 
 {
   global $tot_v_nombres;
   $this->sc_proc_quebra_p_nompro = false;
   $this->sc_proc_quebra_v_nombres = true; 
   $this->Tot->quebra_v_nombres_por_asesor_producto($v_nombres, $this->arg_sum_v_nombres);
   $conteudo = $tot_v_nombres[0] ;  
   $this->count_v_nombres = $tot_v_nombres[1];
   $this->sum_v_nombres_cantidad = $tot_v_nombres[2];
   $this->sum_v_nombres_total = $tot_v_nombres[3];
   $this->campos_quebra_v_nombres = array(); 
   $conteudo = sc_strip_script($this->v_nombres); 
   $this->campos_quebra_v_nombres[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['v_nombres']))
   {
       $this->campos_quebra_v_nombres[0]['lab'] = $this->nmgp_label_quebras['v_nombres']; 
   }
   else
   {
   $this->campos_quebra_v_nombres[0]['lab'] = "Vendedor"; 
   }
   $this->sc_proc_quebra_v_nombres = false; 
 } 
 function quebra_p_nompro_por_asesor_producto($v_nombres, $p_nompro) 
 {
   global $tot_p_nompro;
   $this->sc_proc_quebra_v_nombres = false;
   $this->sc_proc_quebra_p_nompro = true; 
   $this->Tot->quebra_p_nompro_por_asesor_producto($v_nombres, $p_nompro, $this->arg_sum_v_nombres, $this->arg_sum_p_nompro);
   $conteudo = $tot_p_nompro[0] ;  
   $this->count_p_nompro = $tot_p_nompro[1];
   $this->sum_p_nompro_cantidad = $tot_p_nompro[2];
   $this->sum_p_nompro_total = $tot_p_nompro[3];
   $this->campos_quebra_p_nompro = array(); 
   $conteudo = sc_strip_script($this->p_nompro); 
   $this->campos_quebra_p_nompro[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['p_nompro']))
   {
       $this->campos_quebra_p_nompro[0]['lab'] = $this->nmgp_label_quebras['p_nompro']; 
   }
   else
   {
   $this->campos_quebra_p_nompro[0]['lab'] = "Producto"; 
   }
   $this->sc_proc_quebra_p_nompro = false; 
 } 
 function quebra_v_nombres_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_p_nompro = false;
   $this->sc_proc_quebra_f_fechaven = false;
   $this->sc_proc_quebra_periodo = false;
   $this->sc_proc_quebra_v_nombres = true; 
   $this->Tot->quebra_v_nombres_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_v_nombres = $$Var_name_gb;
   $conteudo = $tot_v_nombres[0] ;  
   $this->count_v_nombres = $tot_v_nombres[1];
   $this->sum_v_nombres_cantidad = $tot_v_nombres[2];
   $this->sum_v_nombres_total = $tot_v_nombres[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->v_nombres); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['v_nombres']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['v_nombres']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Vendedor"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_v_nombres = false; 
 } 
 function quebra_p_nompro_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_v_nombres = false;
   $this->sc_proc_quebra_f_fechaven = false;
   $this->sc_proc_quebra_periodo = false;
   $this->sc_proc_quebra_p_nompro = true; 
   $this->Tot->quebra_p_nompro_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_p_nompro = $$Var_name_gb;
   $conteudo = $tot_p_nompro[0] ;  
   $this->count_p_nompro = $tot_p_nompro[1];
   $this->sum_p_nompro_cantidad = $tot_p_nompro[2];
   $this->sum_p_nompro_total = $tot_p_nompro[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->p_nompro); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['p_nompro']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['p_nompro']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Producto"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_p_nompro = false; 
 } 
 function quebra_f_fechaven_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_v_nombres = false;
   $this->sc_proc_quebra_p_nompro = false;
   $this->sc_proc_quebra_periodo = false;
   $this->sc_proc_quebra_f_fechaven = true; 
   $this->Tot->quebra_f_fechaven_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_f_fechaven = $$Var_name_gb;
   $conteudo = $tot_f_fechaven[0] ;  
   $this->count_f_fechaven = $tot_f_fechaven[1];
   $this->sum_f_fechaven_cantidad = $tot_f_fechaven[2];
   $this->sum_f_fechaven_total = $tot_f_fechaven[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->f_fechaven)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $Cmp_Name);
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('sc_free_group_by', $Cmp_Name);
   $TP_Time    = (in_array($Cmp_Name, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['f_fechaven']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['f_fechaven']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Fecha"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_f_fechaven = false; 
 } 
 function quebra_periodo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_v_nombres = false;
   $this->sc_proc_quebra_p_nompro = false;
   $this->sc_proc_quebra_f_fechaven = false;
   $this->sc_proc_quebra_periodo = true; 
   $this->Tot->quebra_periodo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_periodo = $$Var_name_gb;
   $conteudo = $tot_periodo[0] ;  
   $this->count_periodo = $tot_periodo[1];
   $this->sum_periodo_cantidad = $tot_periodo[2];
   $this->sum_periodo_total = $tot_periodo[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->periodo)); 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['periodo']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['periodo']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Periodo"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_periodo = false; 
 } 
 function quebra_periodo_periodo($periodo) 
 {
   global $tot_periodo;
   $this->sc_proc_quebra_periodo = true; 
   $this->Tot->quebra_periodo_periodo($periodo, $this->arg_sum_periodo);
   $conteudo = $tot_periodo[0] ;  
   $this->count_periodo = $tot_periodo[1];
   $this->sum_periodo_cantidad = $tot_periodo[2];
   $this->sum_periodo_total = $tot_periodo[3];
   $this->campos_quebra_periodo = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->periodo)); 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
   $this->campos_quebra_periodo[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['periodo']))
   {
       $this->campos_quebra_periodo[0]['lab'] = $this->nmgp_label_quebras['periodo']; 
   }
   else
   {
   $this->campos_quebra_periodo[0]['lab'] = "Periodo"; 
   }
   $this->sc_proc_quebra_periodo = false; 
 } 
   function quebra_v_nombres_por_asesor_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_v_nombres as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_v_nombres_por_asesor_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_v_nombres_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_v_nombres_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_p_nompro_por_producto_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_p_nompro as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_p_nompro_por_producto_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_p_nompro_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_p_nompro_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_f_fechaven_por_fecha_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_f_fechaven as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_f_fechaven_por_fecha_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_f_fechaven_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_f_fechaven_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_v_nombres_por_asesor_producto_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_v_nombres as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_v_nombres_por_asesor_producto_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_v_nombres_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_v_nombres_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_p_nompro_por_asesor_producto_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_p_nompro as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_p_nompro_por_asesor_producto_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_p_nompro_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_p_nompro_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_v_nombres_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_v_nombres as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_v_nombres_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_v_nombres_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_v_nombres_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_p_nompro_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_p_nompro as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_p_nompro_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_p_nompro_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_p_nompro_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_f_fechaven_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_f_fechaven as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_f_fechaven_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_f_fechaven_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_f_fechaven_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_periodo_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_periodo as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_periodo_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_periodo_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_periodo_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_periodo_periodo_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_periodo as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $temp_cmp = "";
               $cont_col = 0;
               $this->Xls_row++;
           }
           $temp_cmp .= $cada_campo['lab'] . " => " . $cada_campo['cmp'] . "  ";
           $cont_col++;
       }
       if (!empty($temp_cmp)) {
           $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
           $temp_cmp = strip_tags($temp_cmp);
           $temp_cmp = NM_charset_to_utf8($temp_cmp);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']       = $temp_cmp;
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']      = "left";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']       = "char";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format']     = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']       = "";
               $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['col_span_f'] = $this->Xls_tot_col;
           }
           else {
               $current_cell_ref = $this->calc_cell($this->Xls_col);
               if ($this->Use_phpspreadsheet) {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
               }
               else {
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
               $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $temp_cmp);
               $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
           }
       }
   }
   function quebra_periodo_periodo_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_periodo_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Cmp_Tot    = $this->sum_periodo_total;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Cmp_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Cmp_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Cmp_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Cmp_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
   }
   function quebra_geral_por_asesor_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_por_asesor();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_por_producto_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_por_producto();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_por_fecha_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_por_fecha();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_por_asesor_producto_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_por_asesor_producto();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_sc_free_group_by();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_periodo_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_periodo();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral__NM_SC__bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral__NM_SC_();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['tot_geral'][3];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   $mens_tot = NM_charset_to_utf8($mens_tot);
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Reporte Productos x Vendedor :: Excel</TITLE>
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
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
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
   <td class="scExportTitle" style="height: 25px">XLS</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_rp_productos_vendedor_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_rp_productos_vendedor"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_rp_productos_vendedor']['xls_return']); ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
}

?>
