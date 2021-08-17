<?php

class grid_caja_xls
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
   var $fecha_Old;
   var $arg_sum_fecha;
   var $Label_fecha;
   var $sc_proc_quebra_fecha;
   var $count_fecha;
   var $sum_fecha_cantidad;
   var $detalle_Old;
   var $arg_sum_detalle;
   var $Label_detalle;
   var $sc_proc_quebra_detalle;
   var $count_detalle;
   var $sum_detalle_cantidad;
   var $nota_Old;
   var $arg_sum_nota;
   var $Label_nota;
   var $sc_proc_quebra_nota;
   var $count_nota;
   var $sum_nota_cantidad;
   var $documento_Old;
   var $arg_sum_documento;
   var $Label_documento;
   var $sc_proc_quebra_documento;
   var $count_documento;
   var $sum_documento_cantidad;
   var $resolucion_Old;
   var $arg_sum_resolucion;
   var $Label_resolucion;
   var $sc_proc_quebra_resolucion;
   var $count_resolucion;
   var $sum_resolucion_cantidad;
   var $ie_Old;
   var $arg_sum_ie;
   var $Label_ie;
   var $sc_proc_quebra_ie;
   var $count_ie;
   var $sum_ie_cantidad;
   var $banco_Old;
   var $arg_sum_banco;
   var $Label_banco;
   var $sc_proc_quebra_banco;
   var $count_banco;
   var $sum_banco_cantidad;
   var $cliente_Old;
   var $arg_sum_cliente;
   var $Label_cliente;
   var $sc_proc_quebra_cliente;
   var $count_cliente;
   var $sum_cliente_cantidad;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xls_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              $oJson = new Services_JSON();
              echo $oJson->encode($this->Arr_result);
              exit;
          }
          else
          {
              $this->monta_html();
          }
      }
      else { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['opcao'] = "";
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
                   nm_limpa_str_grid_caja($cadapar[1]);
                   nm_protect_num_grid_caja($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_caja']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($empresa)) 
      {
          $_SESSION['empresa'] = $empresa;
          nm_limpa_str_grid_caja($_SESSION["empresa"]);
      }
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->SC_top = array();
      $this->SC_bot = array();
      $this->SC_bot[] = "fecha";
      $this->SC_top[] = "fecha";
      $this->SC_bot[] = "detalle";
      $this->SC_top[] = "detalle";
      $this->SC_bot[] = "nota";
      $this->SC_top[] = "nota";
      $this->SC_bot[] = "documento";
      $this->SC_top[] = "documento";
      $this->SC_bot[] = "resolucion";
      $this->SC_top[] = "resolucion";
      $this->SC_bot[] = "ie";
      $this->SC_top[] = "ie";
      $this->SC_bot[] = "banco";
      $this->SC_top[] = "banco";
      $this->SC_bot[] = "cliente";
      $this->SC_top[] = "cliente";
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "ie" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->Tem_xls_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_caja/grid_caja_res_xls.class.php"))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "grid_caja_res_xls.class.php");
              $this->Res_xls = new grid_caja_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_caja.zip";
          $this->Arquivo   .= "_grid_caja" . $this->Xls_tp;
          $this->Tit_doc    = "grid_caja" . $this->Xls_tp;
          $this->Tit_zip    = "grid_caja.zip";
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "fecha")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_caja_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_caja_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "prefijo")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_caja_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "banco")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_caja_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "documento")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_caja_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "detallle")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_caja_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_caja_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_total")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_caja_resumo("out");
          $this->prep_modulos("Res");
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "ie")
      {
          require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          $this->Res = new grid_caja_resumo("out");
          $this->prep_modulos("Res");
      }
      $this->GB_tot_php = array('fecha','sc_free_group_by','prefijo','banco','documento','detallle','_NM_SC_','sc_free_total','ie');
      if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $this->GB_tot_php))
      {
          $Tot_Gb = "totaliza_php_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'];
          $this->$Tot_Gb();
      }
      else
      {
          require_once($this->Ini->path_aplicacao . "grid_caja_total.class.php"); 
          $this->Tot = new grid_caja_total($this->Ini->sc_page);
          $this->prep_modulos("Tot");
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'];
          $this->Tot->$Gb_geral();
      }
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "fecha")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "prefijo")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "banco")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "documento")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "detallle")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "fecha")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "prefijo")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "banco")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "documento")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "detallle")
      {
          $this->sum_cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_caja']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_caja']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_caja']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->detalle = $Busca_temp['detalle']; 
          $tmp_pos = strpos($this->detalle, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle))
          {
              $this->detalle = substr($this->detalle, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->resolucion_2 = $Busca_temp['resolucion_input_2']; 
          $this->creado_inicio = $Busca_temp['creado_inicio']; 
          $tmp_pos = strpos($this->creado_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_inicio))
          {
              $this->creado_inicio = substr($this->creado_inicio, 0, $tmp_pos);
          }
          $this->creado_fin = $Busca_temp['creado_fin']; 
          $tmp_pos = strpos($this->creado_fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_fin))
          {
              $this->creado_fin = substr($this->creado_fin, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->ie = $Busca_temp['ie']; 
          $tmp_pos = strpos($this->ie, "##@@");
          if ($tmp_pos !== false && !is_array($this->ie))
          {
              $this->ie = substr($this->ie, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_name'] .= $this->Xls_tp;
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      if (!$rs->EOF)
      {
         $this->fecha = $rs->fields[0] ;  
         $this->tipo = $rs->fields[1] ;  
         $this->doc = $rs->fields[2] ;  
         $this->nota = $rs->fields[3] ;  
         $this->doc_pagado = $rs->fields[4] ;  
         $this->id_tercero = $rs->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;
         $this->cantidad = $rs->fields[6] ;  
         $this->cantidad =  str_replace(",", ".", $this->cantidad);
         $this->cantidad = (string)$this->cantidad;
         $this->banco = $rs->fields[7] ;  
         $this->banco = (string)$this->banco;
         $this->creado = $rs->fields[8] ;  
         $this->idcaja = $rs->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;
         $this->jornada = $rs->fields[10] ;  
         $this->detalle = $rs->fields[11] ;  
         $this->documento = $rs->fields[12] ;  
         $this->cierredia = $rs->fields[13] ;  
         $this->totaldia = $rs->fields[14] ;  
         $this->totaldia =  str_replace(",", ".", $this->totaldia);
         $this->totaldia = (string)$this->totaldia;
         $this->arqueo = $rs->fields[15] ;  
         $this->arqueo =  str_replace(",", ".", $this->arqueo);
         $this->arqueo = (string)$this->arqueo;
         $this->saldo = $rs->fields[16] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (string)$this->saldo;
         $this->resolucion = $rs->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;
         $this->idrc = $rs->fields[18] ;  
         $this->idrc = (string)$this->idrc;
         $this->idrp = $rs->fields[19] ;  
         $this->idrp = (string)$this->idrp;
         $this->ie = $rs->fields[20] ;  
         $this->creado_inicio = $rs->fields[21] ;  
         $this->creado_fin = $rs->fields[22] ;  
         $this->cliente = $rs->fields[23] ;  
         $this->cliente = (string)$this->cliente;
   $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 ?>
<script>
	console.log("<?php echo "Filtro por defecto: ".$this->sc_where_orig ; ?>");
	console.log("<?php echo "Filtro por busqueda: ".$this->sc_where_atual ; ?>");
</script>
<?php

$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
      }
      $this->total = 0;
      $this->SC_seq_register = 0;
      $prim_reg = true;
      $prim_gb  = true;
      $nm_houve_quebra = "N";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $prim_reg = false;
         $this->Xls_col = 0;
         $this->Xls_row++;
         $this->fecha = $rs->fields[0] ;  
         $this->tipo = $rs->fields[1] ;  
         $this->doc = $rs->fields[2] ;  
         $this->nota = $rs->fields[3] ;  
         $this->doc_pagado = $rs->fields[4] ;  
         $this->id_tercero = $rs->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;
         $this->cantidad = $rs->fields[6] ;  
         $this->cantidad =  str_replace(",", ".", $this->cantidad);
         $this->cantidad = (string)$this->cantidad;
         $this->banco = $rs->fields[7] ;  
         $this->banco = (string)$this->banco;
         $this->creado = $rs->fields[8] ;  
         $this->idcaja = $rs->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;
         $this->jornada = $rs->fields[10] ;  
         $this->detalle = $rs->fields[11] ;  
         $this->documento = $rs->fields[12] ;  
         $this->cierredia = $rs->fields[13] ;  
         $this->totaldia = $rs->fields[14] ;  
         $this->totaldia =  str_replace(",", ".", $this->totaldia);
         $this->totaldia = (string)$this->totaldia;
         $this->arqueo = $rs->fields[15] ;  
         $this->arqueo =  str_replace(",", ".", $this->arqueo);
         $this->arqueo = (string)$this->arqueo;
         $this->saldo = $rs->fields[16] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (string)$this->saldo;
         $this->resolucion = $rs->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;
         $this->idrc = $rs->fields[18] ;  
         $this->idrc = (string)$this->idrc;
         $this->idrp = $rs->fields[19] ;  
         $this->idrp = (string)$this->idrp;
         $this->ie = $rs->fields[20] ;  
         $this->creado_inicio = $rs->fields[21] ;  
         $this->creado_fin = $rs->fields[22] ;  
         $this->cliente = $rs->fields[23] ;  
         $this->cliente = (string)$this->cliente;
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "fecha")
         {
             $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fecha');
             $TP_Time     = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
             $this->arg_sum_fecha = $this->Ini->Get_date_arg_sum($TP_Time . $this->fecha, $Format_tst, "fecha");
             if (empty($this->fecha))
             {
                 $this->Tot->Sc_groupby_fecha = "fecha";
             }
             else
             {
                 $this->Tot->Sc_groupby_fecha = $this->Ini->Get_sql_date_groupby("fecha", $Format_tst);
             }
         }
         if ($this->fecha == "")
         {
             $this->arg_sum_fecha = " is null";
         }
         elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "ie")
         {
             $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
             {
                 $Cmp_orig = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'][$cmp_gb])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'][$cmp_gb] : $cmp_gb;
                 if ($Cmp_orig == "fecha")
                 {
                     $Str_arg_sum = "arg_sum_" . $cmp_gb;
                     $Format_tst  = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
                     $TP_Time     = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                     $this->$Str_arg_sum = $this->Ini->Get_date_arg_sum($TP_Time . $this->fecha, $Format_tst, "fecha");
                 }
             }
         }
         if ($this->fecha == "")
         {
             $this->arg_sum_fecha = " is null";
         }
         elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "_NM_SC_")
         {
             $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         }
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = ($this->banco == "") ? " is null " : " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = ($this->resolucion == "") ? " is null " : " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = ($this->cliente == "") ? " is null " : " = " . $this->cliente;
          $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fecha');
          $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->fecha, $Format_tst);
          if ($Cmp_tst != $this->fecha_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "fecha") 
          {  
              if (isset($this->fecha_Old) && !$prim_gb)
              {
                 $this->quebra_fecha_fecha_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fecha');
              $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->fecha_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->fecha, $Format_tst);
              $this->quebra_fecha_fecha($this->fecha) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->fecha_Old))
              {
                 $this->quebra_fecha_fecha_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by") 
          {  
              $SC_arg_Gby = array();
              $SC_arg_Sql = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                  $SC_arg_Gby[$cmp] = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
              }
              $SC_lst_Gby = array();
              $gb_ok      = false;
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $SC_arg_Sql[$cmp] = $sql;
                  $Fun_GB  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'][$cmp] : $cmp;
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
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp']);
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
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $Col_Gb => $Sql)
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
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                      $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp']);
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
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp => $sql)
                  {
                      $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'][$cmp] : $cmp;
                      $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                      $Cmp_Old   = $cmp . '_Old';
                      $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                      $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
                  }
              }
          }  
          if ($this->resolucion !== $this->resolucion_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "prefijo") 
          {  
              if (isset($this->resolucion_Old) && !$prim_gb)
              {
                 $this->quebra_resolucion_prefijo_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->resolucion_Old = $this->resolucion ; 
              $this->quebra_resolucion_prefijo($this->resolucion) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->resolucion_Old))
              {
                 $this->quebra_resolucion_prefijo_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->banco !== $this->banco_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "banco") 
          {  
              if (isset($this->banco_Old) && !$prim_gb)
              {
                 $this->quebra_banco_banco_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->banco_Old = $this->banco ; 
              $this->quebra_banco_banco($this->banco) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->banco_Old))
              {
                 $this->quebra_banco_banco_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->documento !== $this->documento_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "documento") 
          {  
              if (isset($this->documento_Old) && !$prim_gb)
              {
                 $this->quebra_documento_documento_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->documento_Old = $this->documento ; 
              $this->quebra_documento_documento($this->documento) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->documento_Old))
              {
                 $this->quebra_documento_documento_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->detalle !== $this->detalle_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "detallle") 
          {  
              if (isset($this->detalle_Old) && !$prim_gb)
              {
                 $this->quebra_detalle_detallle_bot() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'] && !$prim_gb && $this->groupby_show == "S") {
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                  $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
              }
              $this->detalle_Old = $this->detalle ; 
              $this->quebra_detalle_detallle($this->detalle) ; 
              if ($this->groupby_show == "S") {
                  $this->Xls_col = 0;
                  $this->Xls_row++;
              }
              if (isset($this->detalle_Old))
              {
                 $this->quebra_detalle_detallle_top() ; 
                 if ($this->groupby_show == "S") {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                 }
              }
              $nm_houve_quebra = "S";
          } 
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
     if ($nm_houve_quebra == "S")
     {
         $this->total = 0;
     }
     $prim_gb = false;
     $nm_houve_quebra = "N";
         //----- lookup - id_tercero
         $this->look_id_tercero = $this->id_tercero; 
         $this->Lookup->lookup_id_tercero($this->look_id_tercero, $this->id_tercero) ; 
         $this->look_id_tercero = ($this->look_id_tercero == "&nbsp;") ? "" : $this->look_id_tercero; 
         //----- lookup - banco
         $this->look_banco = $this->banco; 
         $this->Lookup->lookup_banco($this->look_banco, $this->banco) ; 
         $this->look_banco = ($this->look_banco == "&nbsp;") ? "" : $this->look_banco; 
         //----- lookup - resolucion
         $this->look_resolucion = $this->resolucion; 
         $this->Lookup->lookup_resolucion($this->look_resolucion, $this->resolucion) ; 
         $this->look_resolucion = ($this->look_resolucion == "&nbsp;") ? "" : $this->look_resolucion; 
         //----- lookup - idrc
         $this->look_idrc = $this->idrc; 
         $this->Lookup->lookup_idrc($this->look_idrc, $this->idrc) ; 
         $this->look_idrc = ($this->look_idrc == "&nbsp;") ? "" : $this->look_idrc; 
         //----- lookup - idrp
         $this->look_idrp = $this->idrp; 
         $this->Lookup->lookup_idrp($this->look_idrp, $this->idrp) ; 
         $this->look_idrp = ($this->look_idrp == "&nbsp;") ? "" : $this->look_idrp; 
         //----- lookup - cliente
         $this->look_cliente = $this->cliente; 
         $this->Lookup->lookup_cliente($this->look_cliente, $this->cliente) ; 
         $this->look_cliente = ($this->look_cliente == "&nbsp;") ? "" : $this->look_cliente; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off'; 
         $this->total += $this->cantidad;
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'] && $prim_reg)
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
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
          $this->Xls_col = 0;
          $this->Xls_row++;
       if (isset($this->fecha_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "fecha")
       {
           $this->quebra_fecha_fecha_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           $SC_lst_Gby = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $SC_lst_Gby[] = $cmp;
           }
           $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp']);
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
       if (isset($this->resolucion_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "prefijo")
       {
           $this->quebra_resolucion_prefijo_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->banco_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "banco")
       {
           $this->quebra_banco_banco_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->documento_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "documento")
       {
           $this->quebra_documento_documento_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
       if (isset($this->detalle_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "detallle")
       {
           $this->quebra_detalle_detallle_bot() ; 
           if ($this->groupby_show == "S") {
               $this->Xls_col = 0;
               $this->Xls_row++;
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
           }
       }
          $this->Xls_col = 0;
          $this->Xls_row++;
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] . "_bot";
          $this->$Gb_geral();
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_res_grid'] = true;
              $this->Res_xls->monta_xls();
              if ($this->Use_phpspreadsheet) {
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_res_sheet']);
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha"; 
          if ($Cada_col == "fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
          if ($Cada_col == "tipo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['doc'])) ? $this->New_label['doc'] : "Número"; 
          if ($Cada_col == "doc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['nota'])) ? $this->New_label['nota'] : "Nota"; 
          if ($Cada_col == "nota" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['doc_pagado'])) ? $this->New_label['doc_pagado'] : "Doc Pagado"; 
          if ($Cada_col == "doc_pagado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['id_tercero'])) ? $this->New_label['id_tercero'] : "Tercero"; 
          if ($Cada_col == "id_tercero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Valor"; 
          if ($Cada_col == "cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['banco'])) ? $this->New_label['banco'] : "Banco"; 
          if ($Cada_col == "banco" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
          if ($Cada_col == "creado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total en Caja"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['idcaja'])) ? $this->New_label['idcaja'] : "Idcaja"; 
          if ($Cada_col == "idcaja" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['jornada'])) ? $this->New_label['jornada'] : "Jornada"; 
          if ($Cada_col == "jornada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : "Detalle"; 
          if ($Cada_col == "detalle" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Número"; 
          if ($Cada_col == "documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['cierredia'])) ? $this->New_label['cierredia'] : "Cierredia"; 
          if ($Cada_col == "cierredia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['totaldia'])) ? $this->New_label['totaldia'] : "Totaldia"; 
          if ($Cada_col == "totaldia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['arqueo'])) ? $this->New_label['arqueo'] : "Arqueo"; 
          if ($Cada_col == "arqueo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
          if ($Cada_col == "saldo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['resolucion'])) ? $this->New_label['resolucion'] : "PJ"; 
          if ($Cada_col == "resolucion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['idrc'])) ? $this->New_label['idrc'] : "RC"; 
          if ($Cada_col == "idrc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['idrp'])) ? $this->New_label['idrp'] : "CE"; 
          if ($Cada_col == "idrp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                      $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $SC_Label, PHPExcel_Cell_DataType::TYPE_STRING);
                  }
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['ie'])) ? $this->New_label['ie'] : "Ie"; 
          if ($Cada_col == "ie" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['creado_inicio'])) ? $this->New_label['creado_inicio'] : "Creado Inicio"; 
          if ($Cada_col == "creado_inicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['creado_fin'])) ? $this->New_label['creado_fin'] : "Creado Fin"; 
          if ($Cada_col == "creado_fin" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
          $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Tercero"; 
          if ($Cada_col == "cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              $SC_Label = NM_charset_to_utf8($SC_Label);
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida'])
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
   //----- fecha
   function NM_export_fecha()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->fecha = substr($this->fecha, 0, 10);
         if (empty($this->fecha) || $this->fecha == "0000-00-00")
         {
             if ($this->Use_phpspreadsheet) {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fecha, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
             }
             else {
                 $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->fecha, PHPExcel_Cell_DataType::TYPE_STRING);
             }
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->fecha);
             $this->NM_ctrl_style[$current_cell_ref]['format'] = $this->SC_date_conf_region;
         }
         $this->Xls_col++;
   }
   //----- tipo
   function NM_export_tipo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->tipo = html_entity_decode($this->tipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo = strip_tags($this->tipo);
         $this->tipo = NM_charset_to_utf8($this->tipo);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tipo, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->tipo, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- doc
   function NM_export_doc()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->doc = html_entity_decode($this->doc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->doc = strip_tags($this->doc);
         $this->doc = NM_charset_to_utf8($this->doc);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->doc, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->doc, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- nota
   function NM_export_nota()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->nota = html_entity_decode($this->nota, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nota = strip_tags($this->nota);
         $this->nota = NM_charset_to_utf8($this->nota);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nota, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nota, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- doc_pagado
   function NM_export_doc_pagado()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->doc_pagado = html_entity_decode($this->doc_pagado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->doc_pagado = strip_tags($this->doc_pagado);
         $this->doc_pagado = NM_charset_to_utf8($this->doc_pagado);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->doc_pagado, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->doc_pagado, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- id_tercero
   function NM_export_id_tercero()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_id_tercero = html_entity_decode($this->look_id_tercero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_id_tercero = strip_tags($this->look_id_tercero);
         $this->look_id_tercero = NM_charset_to_utf8($this->look_id_tercero);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_id_tercero, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_id_tercero, PHPExcel_Cell_DataType::TYPE_STRING);
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
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->cantidad);
         $this->Xls_col++;
   }
   //----- banco
   function NM_export_banco()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_banco = NM_charset_to_utf8($this->look_banco);
         if (is_numeric($this->look_banco))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_banco);
         $this->Xls_col++;
   }
   //----- creado
   function NM_export_creado()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->creado))
      {
             if (substr($this->creado, 10, 1) == "-") 
             { 
                 $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
             } 
             if (substr($this->creado, 13, 1) == ".") 
             { 
                $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
             } 
             $conteudo_x =  $this->creado;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->creado, "YYYY-MM-DD HH:II:SS  ");
                 $this->creado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii"));
             } 
      }
         $this->creado = NM_charset_to_utf8($this->creado);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->creado, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->creado, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- total
   function NM_export_total()
   {
         $total_save = $this->total;
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->total = NM_charset_to_utf8($this->total);
         if (is_numeric($this->total))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->total);
         $this->Xls_col++;
         $this->total = $total_save;
   }
   //----- idcaja
   function NM_export_idcaja()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->idcaja = NM_charset_to_utf8($this->idcaja);
         if (is_numeric($this->idcaja))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->idcaja);
         $this->Xls_col++;
   }
   //----- jornada
   function NM_export_jornada()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->jornada = html_entity_decode($this->jornada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jornada = strip_tags($this->jornada);
         $this->jornada = NM_charset_to_utf8($this->jornada);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->jornada, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->jornada, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- detalle
   function NM_export_detalle()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->detalle = html_entity_decode($this->detalle, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalle = strip_tags($this->detalle);
         $this->detalle = NM_charset_to_utf8($this->detalle);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->detalle, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->detalle, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- documento
   function NM_export_documento()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->documento = html_entity_decode($this->documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->documento = strip_tags($this->documento);
         $this->documento = NM_charset_to_utf8($this->documento);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->documento, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->documento, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- cierredia
   function NM_export_cierredia()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->cierredia = html_entity_decode($this->cierredia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cierredia = strip_tags($this->cierredia);
         $this->cierredia = NM_charset_to_utf8($this->cierredia);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->cierredia, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->cierredia, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- totaldia
   function NM_export_totaldia()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->totaldia = NM_charset_to_utf8($this->totaldia);
         if (is_numeric($this->totaldia))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->totaldia);
         $this->Xls_col++;
   }
   //----- arqueo
   function NM_export_arqueo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->arqueo = NM_charset_to_utf8($this->arqueo);
         if (is_numeric($this->arqueo))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->arqueo);
         $this->Xls_col++;
   }
   //----- saldo
   function NM_export_saldo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->saldo = NM_charset_to_utf8($this->saldo);
         if (is_numeric($this->saldo))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0.00';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->saldo);
         $this->Xls_col++;
   }
   //----- resolucion
   function NM_export_resolucion()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_resolucion = NM_charset_to_utf8($this->look_resolucion);
         if (is_numeric($this->look_resolucion))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_resolucion);
         $this->Xls_col++;
   }
   //----- idrc
   function NM_export_idrc()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_idrc = NM_charset_to_utf8($this->look_idrc);
         if (is_numeric($this->look_idrc))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_idrc);
         $this->Xls_col++;
   }
   //----- idrp
   function NM_export_idrp()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_idrp = NM_charset_to_utf8($this->look_idrp);
         if (is_numeric($this->look_idrp))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_idrp);
         $this->Xls_col++;
   }
   //----- ie
   function NM_export_ie()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->ie = html_entity_decode($this->ie, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ie = strip_tags($this->ie);
         $this->ie = NM_charset_to_utf8($this->ie);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->ie, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->ie, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- creado_inicio
   function NM_export_creado_inicio()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->creado_inicio))
      {
             if (substr($this->creado_inicio, 10, 1) == "-") 
             { 
                 $this->creado_inicio = substr($this->creado_inicio, 0, 10) . " " . substr($this->creado_inicio, 11);
             } 
             if (substr($this->creado_inicio, 13, 1) == ".") 
             { 
                $this->creado_inicio = substr($this->creado_inicio, 0, 13) . ":" . substr($this->creado_inicio, 14, 2) . ":" . substr($this->creado_inicio, 17);
             } 
             $conteudo_x =  $this->creado_inicio;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->creado_inicio, "YYYY-MM-DD HH:II:SS  ");
                 $this->creado_inicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         $this->creado_inicio = NM_charset_to_utf8($this->creado_inicio);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->creado_inicio, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->creado_inicio, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- creado_fin
   function NM_export_creado_fin()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->creado_fin))
      {
             if (substr($this->creado_fin, 10, 1) == "-") 
             { 
                 $this->creado_fin = substr($this->creado_fin, 0, 10) . " " . substr($this->creado_fin, 11);
             } 
             if (substr($this->creado_fin, 13, 1) == ".") 
             { 
                $this->creado_fin = substr($this->creado_fin, 0, 13) . ":" . substr($this->creado_fin, 14, 2) . ":" . substr($this->creado_fin, 17);
             } 
             $conteudo_x =  $this->creado_fin;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->creado_fin, "YYYY-MM-DD HH:II:SS  ");
                 $this->creado_fin = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         $this->creado_fin = NM_charset_to_utf8($this->creado_fin);
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->creado_fin, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->creado_fin, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- cliente
   function NM_export_cliente()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_cliente = NM_charset_to_utf8($this->look_cliente);
         if (is_numeric($this->look_cliente))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_cliente);
         $this->Xls_col++;
   }
   //----- fecha
   function NM_sub_cons_fecha()
   {
         $this->fecha = substr($this->fecha, 0, 10);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->fecha;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "data";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $this->SC_date_conf_region;
         $this->Xls_col++;
   }
   //----- tipo
   function NM_sub_cons_tipo()
   {
         $this->tipo = html_entity_decode($this->tipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo = strip_tags($this->tipo);
         $this->tipo = NM_charset_to_utf8($this->tipo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->tipo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- doc
   function NM_sub_cons_doc()
   {
         $this->doc = html_entity_decode($this->doc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->doc = strip_tags($this->doc);
         $this->doc = NM_charset_to_utf8($this->doc);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->doc;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- nota
   function NM_sub_cons_nota()
   {
         $this->nota = html_entity_decode($this->nota, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nota = strip_tags($this->nota);
         $this->nota = NM_charset_to_utf8($this->nota);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->nota;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- doc_pagado
   function NM_sub_cons_doc_pagado()
   {
         $this->doc_pagado = html_entity_decode($this->doc_pagado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->doc_pagado = strip_tags($this->doc_pagado);
         $this->doc_pagado = NM_charset_to_utf8($this->doc_pagado);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->doc_pagado;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- id_tercero
   function NM_sub_cons_id_tercero()
   {
         $this->look_id_tercero = html_entity_decode($this->look_id_tercero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_id_tercero = strip_tags($this->look_id_tercero);
         $this->look_id_tercero = NM_charset_to_utf8($this->look_id_tercero);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_id_tercero;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
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
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- banco
   function NM_sub_cons_banco()
   {
         $this->look_banco = NM_charset_to_utf8($this->look_banco);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_banco;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- creado
   function NM_sub_cons_creado()
   {
      if (!empty($this->creado))
      {
         if (substr($this->creado, 10, 1) == "-") 
         { 
             $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
         } 
         if (substr($this->creado, 13, 1) == ".") 
         { 
            $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
         } 
         $conteudo_x =  $this->creado;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->creado, "YYYY-MM-DD HH:II:SS  ");
             $this->creado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii"));
         } 
      }
         $this->creado = NM_charset_to_utf8($this->creado);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->creado;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- total
   function NM_sub_cons_total()
   {
         $total_save = $this->total;
         $this->total = NM_charset_to_utf8($this->total);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->total;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
         $this->total = $total_save;
   }
   //----- idcaja
   function NM_sub_cons_idcaja()
   {
         $this->idcaja = NM_charset_to_utf8($this->idcaja);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->idcaja;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- jornada
   function NM_sub_cons_jornada()
   {
         $this->jornada = html_entity_decode($this->jornada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jornada = strip_tags($this->jornada);
         $this->jornada = NM_charset_to_utf8($this->jornada);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->jornada;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- detalle
   function NM_sub_cons_detalle()
   {
         $this->detalle = html_entity_decode($this->detalle, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalle = strip_tags($this->detalle);
         $this->detalle = NM_charset_to_utf8($this->detalle);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->detalle;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- documento
   function NM_sub_cons_documento()
   {
         $this->documento = html_entity_decode($this->documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->documento = strip_tags($this->documento);
         $this->documento = NM_charset_to_utf8($this->documento);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->documento;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- cierredia
   function NM_sub_cons_cierredia()
   {
         $this->cierredia = html_entity_decode($this->cierredia, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cierredia = strip_tags($this->cierredia);
         $this->cierredia = NM_charset_to_utf8($this->cierredia);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->cierredia;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- totaldia
   function NM_sub_cons_totaldia()
   {
         $this->totaldia = NM_charset_to_utf8($this->totaldia);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->totaldia;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- arqueo
   function NM_sub_cons_arqueo()
   {
         $this->arqueo = NM_charset_to_utf8($this->arqueo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->arqueo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- saldo
   function NM_sub_cons_saldo()
   {
         $this->saldo = NM_charset_to_utf8($this->saldo);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->saldo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0.00";
         $this->Xls_col++;
   }
   //----- resolucion
   function NM_sub_cons_resolucion()
   {
         $this->look_resolucion = NM_charset_to_utf8($this->look_resolucion);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_resolucion;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- idrc
   function NM_sub_cons_idrc()
   {
         $this->look_idrc = NM_charset_to_utf8($this->look_idrc);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_idrc;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- idrp
   function NM_sub_cons_idrp()
   {
         $this->look_idrp = NM_charset_to_utf8($this->look_idrp);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_idrp;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- ie
   function NM_sub_cons_ie()
   {
         $this->ie = html_entity_decode($this->ie, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ie = strip_tags($this->ie);
         $this->ie = NM_charset_to_utf8($this->ie);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->ie;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- creado_inicio
   function NM_sub_cons_creado_inicio()
   {
      if (!empty($this->creado_inicio))
      {
         if (substr($this->creado_inicio, 10, 1) == "-") 
         { 
             $this->creado_inicio = substr($this->creado_inicio, 0, 10) . " " . substr($this->creado_inicio, 11);
         } 
         if (substr($this->creado_inicio, 13, 1) == ".") 
         { 
            $this->creado_inicio = substr($this->creado_inicio, 0, 13) . ":" . substr($this->creado_inicio, 14, 2) . ":" . substr($this->creado_inicio, 17);
         } 
         $conteudo_x =  $this->creado_inicio;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->creado_inicio, "YYYY-MM-DD HH:II:SS  ");
             $this->creado_inicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         $this->creado_inicio = NM_charset_to_utf8($this->creado_inicio);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->creado_inicio;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- creado_fin
   function NM_sub_cons_creado_fin()
   {
      if (!empty($this->creado_fin))
      {
         if (substr($this->creado_fin, 10, 1) == "-") 
         { 
             $this->creado_fin = substr($this->creado_fin, 0, 10) . " " . substr($this->creado_fin, 11);
         } 
         if (substr($this->creado_fin, 13, 1) == ".") 
         { 
            $this->creado_fin = substr($this->creado_fin, 0, 13) . ":" . substr($this->creado_fin, 14, 2) . ":" . substr($this->creado_fin, 17);
         } 
         $conteudo_x =  $this->creado_fin;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->creado_fin, "YYYY-MM-DD HH:II:SS  ");
             $this->creado_fin = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         $this->creado_fin = NM_charset_to_utf8($this->creado_fin);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->creado_fin;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- cliente
   function NM_sub_cons_cliente()
   {
         $this->look_cliente = NM_charset_to_utf8($this->look_cliente);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_cliente;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['nolabel'])
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
 function quebra_fecha_fecha($fecha) 
 {
   global $tot_fecha;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_fecha = true; 
   $tot_fecha[0] = $fecha;
   $tot_fecha[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['fecha'][$fecha][0];
   $tot_fecha[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['fecha'][$fecha][1];
   $conteudo = $tot_fecha[0] ;  
   $this->count_fecha = $tot_fecha[1];
   $this->sum_fecha_cantidad = $tot_fecha[2];
   $this->campos_quebra_fecha = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fecha)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fecha');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('fecha', 'fecha');
   $TP_Time    = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_fecha[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fecha']))
   {
       $this->campos_quebra_fecha[0]['lab'] = $this->nmgp_label_quebras['fecha']; 
   }
   else
   {
   $this->campos_quebra_fecha[0]['lab'] = "Fecha"; 
   }
   $this->sc_proc_quebra_fecha = false; 
 } 
 function quebra_fecha_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_detalle = false;
   $this->sc_proc_quebra_nota = false;
   $this->sc_proc_quebra_documento = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_ie = false;
   $this->sc_proc_quebra_banco = false;
   $this->sc_proc_quebra_cliente = false;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_fecha = true; 
   $tot_fecha[0] = $this->fecha;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_fecha[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_fecha[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   $$Var_name_gb = $tot_fecha;
   $conteudo = $tot_fecha[0] ;  
   $this->count_fecha = $tot_fecha[1];
   $this->sum_fecha_cantidad = $tot_fecha[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fecha)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $Cmp_Name);
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('sc_free_group_by', $Cmp_Name);
   $TP_Time    = (in_array($Cmp_Name, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fecha']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['fecha']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Fecha"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_fecha = false; 
 } 
 function quebra_detalle_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_nota = false;
   $this->sc_proc_quebra_documento = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_ie = false;
   $this->sc_proc_quebra_banco = false;
   $this->sc_proc_quebra_cliente = false;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_detalle = true; 
   $tot_detalle[0] = $this->detalle;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_detalle[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_detalle[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   $$Var_name_gb = $tot_detalle;
   $conteudo = $tot_detalle[0] ;  
   $this->count_detalle = $tot_detalle[1];
   $this->sum_detalle_cantidad = $tot_detalle[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->detalle); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['detalle']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['detalle']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Detalle"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_detalle = false; 
 } 
 function quebra_nota_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_detalle = false;
   $this->sc_proc_quebra_documento = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_ie = false;
   $this->sc_proc_quebra_banco = false;
   $this->sc_proc_quebra_cliente = false;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_nota = true; 
   $tot_nota[0] = $this->nota;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_nota[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_nota[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   $$Var_name_gb = $tot_nota;
   $conteudo = $tot_nota[0] ;  
   $this->count_nota = $tot_nota[1];
   $this->sum_nota_cantidad = $tot_nota[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->nota); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['nota']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['nota']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Nota"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_nota = false; 
 } 
 function quebra_documento_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_detalle = false;
   $this->sc_proc_quebra_nota = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_ie = false;
   $this->sc_proc_quebra_banco = false;
   $this->sc_proc_quebra_cliente = false;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_documento = true; 
   $tot_documento[0] = $this->documento;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_documento[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_documento[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   $$Var_name_gb = $tot_documento;
   $conteudo = $tot_documento[0] ;  
   $this->count_documento = $tot_documento[1];
   $this->sum_documento_cantidad = $tot_documento[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->documento); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['documento']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['documento']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Documento"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_documento = false; 
 } 
 function quebra_resolucion_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_detalle = false;
   $this->sc_proc_quebra_nota = false;
   $this->sc_proc_quebra_documento = false;
   $this->sc_proc_quebra_ie = false;
   $this->sc_proc_quebra_banco = false;
   $this->sc_proc_quebra_cliente = false;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_resolucion = true; 
   $conteudo = $resolucion;
   $this->Lookup->lookup_sc_free_group_by_resolucion($conteudo , $this->resolucion) ; 
   $tot_resolucion[0] = $this->resolucion;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_resolucion[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_resolucion[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   $$Var_name_gb = $tot_resolucion;
   $conteudo = $tot_resolucion[0] ;  
   $this->count_resolucion = $tot_resolucion[1];
   $this->sum_resolucion_cantidad = $tot_resolucion[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->resolucion)); 
   $this->Lookup->lookup_sc_free_group_by_resolucion($conteudo , $this->resolucion) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['resolucion']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['resolucion']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Prefijo"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_resolucion = false; 
 } 
 function quebra_ie_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_detalle = false;
   $this->sc_proc_quebra_nota = false;
   $this->sc_proc_quebra_documento = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_banco = false;
   $this->sc_proc_quebra_cliente = false;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_ie = true; 
   $tot_ie[0] = $this->ie;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_ie[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_ie[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   $$Var_name_gb = $tot_ie;
   $conteudo = $tot_ie[0] ;  
   $this->count_ie = $tot_ie[1];
   $this->sum_ie_cantidad = $tot_ie[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->ie); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['ie']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['ie']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Ie"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_ie = false; 
 } 
 function quebra_banco_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_detalle = false;
   $this->sc_proc_quebra_nota = false;
   $this->sc_proc_quebra_documento = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_ie = false;
   $this->sc_proc_quebra_cliente = false;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_banco = true; 
   $conteudo = $banco;
   $this->Lookup->lookup_sc_free_group_by_banco($conteudo , $this->banco) ; 
   $tot_banco[0] = $this->banco;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_banco[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_banco[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   $$Var_name_gb = $tot_banco;
   $conteudo = $tot_banco[0] ;  
   $this->count_banco = $tot_banco[1];
   $this->sum_banco_cantidad = $tot_banco[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->banco)); 
   $this->Lookup->lookup_sc_free_group_by_banco($conteudo , $this->banco) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['banco']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['banco']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Banco"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_banco = false; 
 } 
 function quebra_cliente_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_fecha = false;
   $this->sc_proc_quebra_detalle = false;
   $this->sc_proc_quebra_nota = false;
   $this->sc_proc_quebra_documento = false;
   $this->sc_proc_quebra_resolucion = false;
   $this->sc_proc_quebra_ie = false;
   $this->sc_proc_quebra_banco = false;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_cliente = true; 
   $conteudo = $cliente;
   $this->Lookup->lookup_sc_free_group_by_cliente($conteudo , $this->cliente) ; 
   $tot_cliente[0] = $this->cliente;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_cliente[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_cliente[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   $$Var_name_gb = $tot_cliente;
   $conteudo = $tot_cliente[0] ;  
   $this->count_cliente = $tot_cliente[1];
   $this->sum_cliente_cantidad = $tot_cliente[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->cliente)); 
   $this->Lookup->lookup_sc_free_group_by_cliente($conteudo , $this->cliente) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['cliente']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['cliente']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Tercero"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_cliente = false; 
 } 
 function quebra_resolucion_prefijo($resolucion) 
 {
   global $tot_resolucion;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_resolucion = true; 
   $conteudo = $resolucion;
   $this->Lookup->lookup_prefijo_resolucion($conteudo , $this->resolucion) ; 
   $tot_resolucion[0] = $resolucion;
   $tot_resolucion[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['resolucion'][$resolucion][0];
   $tot_resolucion[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['resolucion'][$resolucion][1];
   $conteudo = $tot_resolucion[0] ;  
   $this->count_resolucion = $tot_resolucion[1];
   $this->sum_resolucion_cantidad = $tot_resolucion[2];
   $this->campos_quebra_resolucion = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->resolucion)); 
   $this->Lookup->lookup_prefijo_resolucion($conteudo , $this->resolucion) ; 
   $this->campos_quebra_resolucion[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['resolucion']))
   {
       $this->campos_quebra_resolucion[0]['lab'] = $this->nmgp_label_quebras['resolucion']; 
   }
   else
   {
   $this->campos_quebra_resolucion[0]['lab'] = "Prefijo"; 
   }
   $this->sc_proc_quebra_resolucion = false; 
 } 
 function quebra_banco_banco($banco) 
 {
   global $tot_banco;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_banco = true; 
   $conteudo = $banco;
   $this->Lookup->lookup_banco_banco($conteudo , $this->banco) ; 
   $tot_banco[0] = $banco;
   $tot_banco[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['banco'][$banco][0];
   $tot_banco[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['banco'][$banco][1];
   $conteudo = $tot_banco[0] ;  
   $this->count_banco = $tot_banco[1];
   $this->sum_banco_cantidad = $tot_banco[2];
   $this->campos_quebra_banco = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->banco)); 
   $this->Lookup->lookup_banco_banco($conteudo , $this->banco) ; 
   $this->campos_quebra_banco[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['banco']))
   {
       $this->campos_quebra_banco[0]['lab'] = $this->nmgp_label_quebras['banco']; 
   }
   else
   {
   $this->campos_quebra_banco[0]['lab'] = "Banco"; 
   }
   $this->sc_proc_quebra_banco = false; 
 } 
 function quebra_documento_documento($documento) 
 {
   global $tot_documento;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_documento = true; 
   $tot_documento[0] = $documento;
   $tot_documento[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['documento'][$documento][0];
   $tot_documento[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['documento'][$documento][1];
   $conteudo = $tot_documento[0] ;  
   $this->count_documento = $tot_documento[1];
   $this->sum_documento_cantidad = $tot_documento[2];
   $this->campos_quebra_documento = array(); 
   $conteudo = sc_strip_script($this->documento); 
   $this->campos_quebra_documento[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['documento']))
   {
       $this->campos_quebra_documento[0]['lab'] = $this->nmgp_label_quebras['documento']; 
   }
   else
   {
   $this->campos_quebra_documento[0]['lab'] = "Documento"; 
   }
   $this->sc_proc_quebra_documento = false; 
 } 
 function quebra_detalle_detallle($detalle) 
 {
   global $tot_detalle;
   $TP_Time = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fecha = $this->Ini->Get_arg_groupby($TP_Time . $fecha, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_detalle = true; 
   $tot_detalle[0] = $detalle;
   $tot_detalle[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['detalle'][$detalle][0];
   $tot_detalle[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['detalle'][$detalle][1];
   $conteudo = $tot_detalle[0] ;  
   $this->count_detalle = $tot_detalle[1];
   $this->sum_detalle_cantidad = $tot_detalle[2];
   $this->campos_quebra_detalle = array(); 
   $conteudo = sc_strip_script($this->detalle); 
   $this->campos_quebra_detalle[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['detalle']))
   {
       $this->campos_quebra_detalle[0]['lab'] = $this->nmgp_label_quebras['detalle']; 
   }
   else
   {
   $this->campos_quebra_detalle[0]['lab'] = "Detalle"; 
   }
   $this->sc_proc_quebra_detalle = false; 
 } 
   function quebra_fecha_fecha_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_fecha as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_fecha_fecha_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fecha_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_fecha_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_fecha as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_fecha_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_fecha_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_detalle_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_detalle as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_detalle_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_detalle_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_nota_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_nota as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_nota_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_nota_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_documento_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_documento as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_documento_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_documento_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_resolucion_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_resolucion as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_resolucion_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_resolucion_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_ie_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_ie as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_ie_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_ie_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_banco_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_banco as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_banco_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_banco_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_cliente_sc_free_group_by_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_cliente as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_cliente_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_cliente_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_resolucion_prefijo_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_resolucion as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_resolucion_prefijo_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_resolucion_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_banco_banco_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_banco as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_banco_banco_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_banco_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_documento_documento_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_documento as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_documento_documento_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_documento_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_detalle_detallle_top()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $lim_col  = 1;
       $temp_cmp = "";
       $cont_col = 0;
       foreach ($this->campos_quebra_detalle as $cada_campo) {
           if ($cont_col == $lim_col) {
               $temp_cmp = html_entity_decode($temp_cmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               $temp_cmp = strip_tags($temp_cmp);
               $temp_cmp = NM_charset_to_utf8($temp_cmp);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_detalle_detallle_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->xls_set_style();
       $prim_cmp = true;
       $mens_tot_base = "";
       $mens_tot = "";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Cmp_Tot    = $this->sum_detalle_cantidad;
               $prim_cmp = false;
               $Cmp_Tot = NM_charset_to_utf8($Cmp_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
   function quebra_geral_fecha_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_ie_bot() 
   {
   }
   function quebra_geral_sc_free_group_by_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_prefijo_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_banco_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_documento_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }
   function quebra_geral_detallle_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "cantidad" && (!isset($this->NM_cmp_hidden['cantidad']) || $this->NM_cmp_hidden['cantidad'] != "off"))
           {
               $Format_Num = "#,##0.00";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2];
               $prim_cmp = false;
               $Vl_Tot = NM_charset_to_utf8($Vl_Tot);
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['embutida']) {
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

   function totaliza_php_fecha()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->total = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by fecha";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fecha = $this->rs_grid->fields[0] ;  
         $this->tipo = $this->rs_grid->fields[1] ;  
         $this->doc = $this->rs_grid->fields[2] ;  
         $this->nota = $this->rs_grid->fields[3] ;  
         $this->doc_pagado = $this->rs_grid->fields[4] ;  
         $this->id_tercero = $this->rs_grid->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;  
         $this->rs_grid->fields[6] =  str_replace(",", ".", $this->rs_grid->fields[6]);  
         $this->cantidad = $this->rs_grid->fields[6] ;  
         $this->cantidad = (string)$this->cantidad;  
         $this->banco = $this->rs_grid->fields[7] ;  
         $this->banco = (string)$this->banco;  
         $this->creado = $this->rs_grid->fields[8] ;  
         $this->idcaja = $this->rs_grid->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;  
         $this->jornada = $this->rs_grid->fields[10] ;  
         $this->detalle = $this->rs_grid->fields[11] ;  
         $this->documento = $this->rs_grid->fields[12] ;  
         $this->cierredia = $this->rs_grid->fields[13] ;  
         $this->rs_grid->fields[14] =  str_replace(",", ".", $this->rs_grid->fields[14]);  
         $this->totaldia = $this->rs_grid->fields[14] ;  
         $this->totaldia = (string)$this->totaldia;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->arqueo = $this->rs_grid->fields[15] ;  
         $this->arqueo = (string)$this->arqueo;  
         $this->rs_grid->fields[16] =  str_replace(",", ".", $this->rs_grid->fields[16]);  
         $this->saldo = $this->rs_grid->fields[16] ;  
         $this->saldo = (string)$this->saldo;  
         $this->resolucion = $this->rs_grid->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;  
         $this->idrc = $this->rs_grid->fields[18] ;  
         $this->idrc = (string)$this->idrc;  
         $this->idrp = $this->rs_grid->fields[19] ;  
         $this->idrp = (string)$this->idrp;  
         $this->ie = $this->rs_grid->fields[20] ;  
         $this->creado_inicio = $this->rs_grid->fields[21] ;  
         $this->creado_fin = $this->rs_grid->fields[22] ;  
         $this->cliente = $this->rs_grid->fields[23] ;  
         $this->cliente = (string)$this->cliente;  
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fecha');
         $fecha_SV = $this->fecha;
         $this->fecha = $this->Ini->Get_arg_groupby($this->fecha, $Format_tst);
         $fecha_orig = $this->fecha;
         $detalle_orig = $this->detalle;
         $nota_orig = $this->nota;
         $documento_orig = $this->documento;
         $resolucion_orig = $this->resolucion;
         $ie_orig = $this->ie;
         $banco_orig = $this->banco;
         $cliente_orig = $this->cliente;
         $GLOBALS["id_tercero"] = $this->rs_grid->fields[5] ;  
         $GLOBALS["banco"] = $this->rs_grid->fields[7] ;  
         $GLOBALS["resolucion"] = $this->rs_grid->fields[17] ;  
         $GLOBALS["idrc"] = $this->rs_grid->fields[18] ;  
         $GLOBALS["idrp"] = $this->rs_grid->fields[19] ;  
         $GLOBALS["cliente"] = $this->rs_grid->fields[23] ;  
         if (!isset($this->Res->array_total_fecha[$fecha_orig]))
         {
             $this->total = 0;
         }
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
         $seq_acum++;
         $this->total += $this->cantidad;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'][$seq_acum]['total'] = $this->total;
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = " = " . $this->cliente;
         $this->Lookup->lookup_id_tercero($this->id_tercero, $this->id_tercero) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco($this->GB_banco, $this->banco) ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_resolucion($this->GB_resolucion, $this->resolucion) ; 
         $this->GB_idrc = $this->idrc;
         $this->Lookup->lookup_idrc($this->GB_idrc, $this->idrc) ; 
         $this->GB_idrp = $this->idrp;
         $this->Lookup->lookup_idrp($this->GB_idrp, $this->idrp) ; 
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_cliente($this->GB_cliente, $this->cliente) ; 
     $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fecha');
     $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('fecha', 'fecha');
     $TP_Time    = (in_array('fecha', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
     $this->fecha = $this->Ini->GB_date_format($TP_Time . $fecha_SV, $Format_tst, $Prefix_dat); 
         $this->GB_banco = $this->banco;
         nmgp_Form_Num_Val($this->GB_banco, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_resolucion = $this->resolucion;
         nmgp_Form_Num_Val($this->GB_resolucion, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_cliente = $this->cliente;
         nmgp_Form_Num_Val($this->GB_cliente, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->cantidad)), NM_encode_input(sc_strip_script($this->fecha)), NM_encode_input(sc_strip_script($fecha_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "fecha")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['fecha'] = $this->Res->array_total_fecha;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php_sc_free_group_by()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->total = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by fecha";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fecha = $this->rs_grid->fields[0] ;  
         $this->tipo = $this->rs_grid->fields[1] ;  
         $this->doc = $this->rs_grid->fields[2] ;  
         $this->nota = $this->rs_grid->fields[3] ;  
         $this->doc_pagado = $this->rs_grid->fields[4] ;  
         $this->id_tercero = $this->rs_grid->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;  
         $this->rs_grid->fields[6] =  str_replace(",", ".", $this->rs_grid->fields[6]);  
         $this->cantidad = $this->rs_grid->fields[6] ;  
         $this->cantidad = (string)$this->cantidad;  
         $this->banco = $this->rs_grid->fields[7] ;  
         $this->banco = (string)$this->banco;  
         $this->creado = $this->rs_grid->fields[8] ;  
         $this->idcaja = $this->rs_grid->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;  
         $this->jornada = $this->rs_grid->fields[10] ;  
         $this->detalle = $this->rs_grid->fields[11] ;  
         $this->documento = $this->rs_grid->fields[12] ;  
         $this->cierredia = $this->rs_grid->fields[13] ;  
         $this->rs_grid->fields[14] =  str_replace(",", ".", $this->rs_grid->fields[14]);  
         $this->totaldia = $this->rs_grid->fields[14] ;  
         $this->totaldia = (string)$this->totaldia;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->arqueo = $this->rs_grid->fields[15] ;  
         $this->arqueo = (string)$this->arqueo;  
         $this->rs_grid->fields[16] =  str_replace(",", ".", $this->rs_grid->fields[16]);  
         $this->saldo = $this->rs_grid->fields[16] ;  
         $this->saldo = (string)$this->saldo;  
         $this->resolucion = $this->rs_grid->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;  
         $this->idrc = $this->rs_grid->fields[18] ;  
         $this->idrc = (string)$this->idrc;  
         $this->idrp = $this->rs_grid->fields[19] ;  
         $this->idrp = (string)$this->idrp;  
         $this->ie = $this->rs_grid->fields[20] ;  
         $this->creado_inicio = $this->rs_grid->fields[21] ;  
         $this->creado_fin = $this->rs_grid->fields[22] ;  
         $this->cliente = $this->rs_grid->fields[23] ;  
         $this->cliente = (string)$this->cliente;  
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $fecha_orig = $this->fecha;
         $detalle_orig = $this->detalle;
         $nota_orig = $this->nota;
         $documento_orig = $this->documento;
         $resolucion_orig = $this->resolucion;
         $ie_orig = $this->ie;
         $banco_orig = $this->banco;
         $cliente_orig = $this->cliente;
         $GLOBALS["id_tercero"] = $this->rs_grid->fields[5] ;  
         $GLOBALS["banco"] = $this->rs_grid->fields[7] ;  
         $GLOBALS["resolucion"] = $this->rs_grid->fields[17] ;  
         $GLOBALS["idrc"] = $this->rs_grid->fields[18] ;  
         $GLOBALS["idrp"] = $this->rs_grid->fields[19] ;  
         $GLOBALS["cliente"] = $this->rs_grid->fields[23] ;  
         $contr_arr = "";
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
         {
             $temp       = $cmp_gb . "_orig";
             $contr_arr .= "['" . $$temp . "']";
         }
         $arr_name = "array_total_" . $cmp_gb . $contr_arr;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_ult_qb'] = $cmp_gb;
         eval ('
           if (!isset($this->Res->' . $arr_name . '))
           {
               $this->total = 0;
           }
         ');
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
         $seq_acum++;
         $this->total += $this->cantidad;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'][$seq_acum]['total'] = $this->total;
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = " = " . $this->cliente;
         $this->Lookup->lookup_id_tercero($this->id_tercero, $this->id_tercero) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco($this->GB_banco, $this->banco) ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_resolucion($this->GB_resolucion, $this->resolucion) ; 
         $this->GB_idrc = $this->idrc;
         $this->Lookup->lookup_idrc($this->GB_idrc, $this->idrc) ; 
         $this->GB_idrp = $this->idrp;
         $this->Lookup->lookup_idrp($this->GB_idrp, $this->idrp) ; 
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_cliente($this->GB_cliente, $this->cliente) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_sc_free_group_by_banco($this->GB_banco, $this->banco);
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_sc_free_group_by_resolucion($this->GB_resolucion, $this->resolucion);
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_sc_free_group_by_cliente($this->GB_cliente, $this->cliente);
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->cantidad)), NM_encode_input(sc_strip_script($this->fecha)), sc_strip_script($this->detalle), sc_strip_script($this->nota), sc_strip_script($this->documento), NM_encode_input(sc_strip_script($this->GB_resolucion)), sc_strip_script($this->ie), NM_encode_input(sc_strip_script($this->GB_banco)), NM_encode_input(sc_strip_script($this->GB_cliente)), NM_encode_input(sc_strip_script($fecha_orig)), sc_strip_script($detalle_orig), sc_strip_script($nota_orig), sc_strip_script($documento_orig), NM_encode_input(sc_strip_script($resolucion_orig)), sc_strip_script($ie_orig), NM_encode_input(sc_strip_script($banco_orig)), NM_encode_input(sc_strip_script($cliente_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php_prefijo()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->total = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by fecha";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fecha = $this->rs_grid->fields[0] ;  
         $this->tipo = $this->rs_grid->fields[1] ;  
         $this->doc = $this->rs_grid->fields[2] ;  
         $this->nota = $this->rs_grid->fields[3] ;  
         $this->doc_pagado = $this->rs_grid->fields[4] ;  
         $this->id_tercero = $this->rs_grid->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;  
         $this->rs_grid->fields[6] =  str_replace(",", ".", $this->rs_grid->fields[6]);  
         $this->cantidad = $this->rs_grid->fields[6] ;  
         $this->cantidad = (string)$this->cantidad;  
         $this->banco = $this->rs_grid->fields[7] ;  
         $this->banco = (string)$this->banco;  
         $this->creado = $this->rs_grid->fields[8] ;  
         $this->idcaja = $this->rs_grid->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;  
         $this->jornada = $this->rs_grid->fields[10] ;  
         $this->detalle = $this->rs_grid->fields[11] ;  
         $this->documento = $this->rs_grid->fields[12] ;  
         $this->cierredia = $this->rs_grid->fields[13] ;  
         $this->rs_grid->fields[14] =  str_replace(",", ".", $this->rs_grid->fields[14]);  
         $this->totaldia = $this->rs_grid->fields[14] ;  
         $this->totaldia = (string)$this->totaldia;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->arqueo = $this->rs_grid->fields[15] ;  
         $this->arqueo = (string)$this->arqueo;  
         $this->rs_grid->fields[16] =  str_replace(",", ".", $this->rs_grid->fields[16]);  
         $this->saldo = $this->rs_grid->fields[16] ;  
         $this->saldo = (string)$this->saldo;  
         $this->resolucion = $this->rs_grid->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;  
         $this->idrc = $this->rs_grid->fields[18] ;  
         $this->idrc = (string)$this->idrc;  
         $this->idrp = $this->rs_grid->fields[19] ;  
         $this->idrp = (string)$this->idrp;  
         $this->ie = $this->rs_grid->fields[20] ;  
         $this->creado_inicio = $this->rs_grid->fields[21] ;  
         $this->creado_fin = $this->rs_grid->fields[22] ;  
         $this->cliente = $this->rs_grid->fields[23] ;  
         $this->cliente = (string)$this->cliente;  
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $fecha_orig = $this->fecha;
         $detalle_orig = $this->detalle;
         $nota_orig = $this->nota;
         $documento_orig = $this->documento;
         $resolucion_orig = $this->resolucion;
         $ie_orig = $this->ie;
         $banco_orig = $this->banco;
         $cliente_orig = $this->cliente;
         $GLOBALS["id_tercero"] = $this->rs_grid->fields[5] ;  
         $GLOBALS["banco"] = $this->rs_grid->fields[7] ;  
         $GLOBALS["resolucion"] = $this->rs_grid->fields[17] ;  
         $GLOBALS["idrc"] = $this->rs_grid->fields[18] ;  
         $GLOBALS["idrp"] = $this->rs_grid->fields[19] ;  
         $GLOBALS["cliente"] = $this->rs_grid->fields[23] ;  
         if (!isset($this->Res->array_total_resolucion[$resolucion_orig]))
         {
             $this->total = 0;
         }
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
         $seq_acum++;
         $this->total += $this->cantidad;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'][$seq_acum]['total'] = $this->total;
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = " = " . $this->cliente;
         $this->Lookup->lookup_id_tercero($this->id_tercero, $this->id_tercero) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco($this->GB_banco, $this->banco) ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_resolucion($this->GB_resolucion, $this->resolucion) ; 
         $this->GB_idrc = $this->idrc;
         $this->Lookup->lookup_idrc($this->GB_idrc, $this->idrc) ; 
         $this->GB_idrp = $this->idrp;
         $this->Lookup->lookup_idrp($this->GB_idrp, $this->idrp) ; 
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_cliente($this->GB_cliente, $this->cliente) ; 
         $conteudo_x =  $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
             $this->fecha = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_banco = $this->banco;
         nmgp_Form_Num_Val($this->GB_banco, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_prefijo_resolucion($this->GB_resolucion, $this->resolucion);
         $this->GB_cliente = $this->cliente;
         nmgp_Form_Num_Val($this->GB_cliente, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->cantidad)), NM_encode_input(sc_strip_script($this->GB_resolucion)), NM_encode_input(sc_strip_script($resolucion_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "prefijo")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['resolucion'] = $this->Res->array_total_resolucion;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php_banco()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->total = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by fecha";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fecha = $this->rs_grid->fields[0] ;  
         $this->tipo = $this->rs_grid->fields[1] ;  
         $this->doc = $this->rs_grid->fields[2] ;  
         $this->nota = $this->rs_grid->fields[3] ;  
         $this->doc_pagado = $this->rs_grid->fields[4] ;  
         $this->id_tercero = $this->rs_grid->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;  
         $this->rs_grid->fields[6] =  str_replace(",", ".", $this->rs_grid->fields[6]);  
         $this->cantidad = $this->rs_grid->fields[6] ;  
         $this->cantidad = (string)$this->cantidad;  
         $this->banco = $this->rs_grid->fields[7] ;  
         $this->banco = (string)$this->banco;  
         $this->creado = $this->rs_grid->fields[8] ;  
         $this->idcaja = $this->rs_grid->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;  
         $this->jornada = $this->rs_grid->fields[10] ;  
         $this->detalle = $this->rs_grid->fields[11] ;  
         $this->documento = $this->rs_grid->fields[12] ;  
         $this->cierredia = $this->rs_grid->fields[13] ;  
         $this->rs_grid->fields[14] =  str_replace(",", ".", $this->rs_grid->fields[14]);  
         $this->totaldia = $this->rs_grid->fields[14] ;  
         $this->totaldia = (string)$this->totaldia;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->arqueo = $this->rs_grid->fields[15] ;  
         $this->arqueo = (string)$this->arqueo;  
         $this->rs_grid->fields[16] =  str_replace(",", ".", $this->rs_grid->fields[16]);  
         $this->saldo = $this->rs_grid->fields[16] ;  
         $this->saldo = (string)$this->saldo;  
         $this->resolucion = $this->rs_grid->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;  
         $this->idrc = $this->rs_grid->fields[18] ;  
         $this->idrc = (string)$this->idrc;  
         $this->idrp = $this->rs_grid->fields[19] ;  
         $this->idrp = (string)$this->idrp;  
         $this->ie = $this->rs_grid->fields[20] ;  
         $this->creado_inicio = $this->rs_grid->fields[21] ;  
         $this->creado_fin = $this->rs_grid->fields[22] ;  
         $this->cliente = $this->rs_grid->fields[23] ;  
         $this->cliente = (string)$this->cliente;  
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $fecha_orig = $this->fecha;
         $detalle_orig = $this->detalle;
         $nota_orig = $this->nota;
         $documento_orig = $this->documento;
         $resolucion_orig = $this->resolucion;
         $ie_orig = $this->ie;
         $banco_orig = $this->banco;
         $cliente_orig = $this->cliente;
         $GLOBALS["id_tercero"] = $this->rs_grid->fields[5] ;  
         $GLOBALS["banco"] = $this->rs_grid->fields[7] ;  
         $GLOBALS["resolucion"] = $this->rs_grid->fields[17] ;  
         $GLOBALS["idrc"] = $this->rs_grid->fields[18] ;  
         $GLOBALS["idrp"] = $this->rs_grid->fields[19] ;  
         $GLOBALS["cliente"] = $this->rs_grid->fields[23] ;  
         if (!isset($this->Res->array_total_banco[$banco_orig]))
         {
             $this->total = 0;
         }
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
         $seq_acum++;
         $this->total += $this->cantidad;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'][$seq_acum]['total'] = $this->total;
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = " = " . $this->cliente;
         $this->Lookup->lookup_id_tercero($this->id_tercero, $this->id_tercero) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco($this->GB_banco, $this->banco) ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_resolucion($this->GB_resolucion, $this->resolucion) ; 
         $this->GB_idrc = $this->idrc;
         $this->Lookup->lookup_idrc($this->GB_idrc, $this->idrc) ; 
         $this->GB_idrp = $this->idrp;
         $this->Lookup->lookup_idrp($this->GB_idrp, $this->idrp) ; 
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_cliente($this->GB_cliente, $this->cliente) ; 
         $conteudo_x =  $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
             $this->fecha = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco_banco($this->GB_banco, $this->banco);
         $this->GB_resolucion = $this->resolucion;
         nmgp_Form_Num_Val($this->GB_resolucion, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_cliente = $this->cliente;
         nmgp_Form_Num_Val($this->GB_cliente, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->cantidad)), NM_encode_input(sc_strip_script($this->GB_banco)), NM_encode_input(sc_strip_script($banco_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "banco")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['banco'] = $this->Res->array_total_banco;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php_documento()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->total = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by fecha";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fecha = $this->rs_grid->fields[0] ;  
         $this->tipo = $this->rs_grid->fields[1] ;  
         $this->doc = $this->rs_grid->fields[2] ;  
         $this->nota = $this->rs_grid->fields[3] ;  
         $this->doc_pagado = $this->rs_grid->fields[4] ;  
         $this->id_tercero = $this->rs_grid->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;  
         $this->rs_grid->fields[6] =  str_replace(",", ".", $this->rs_grid->fields[6]);  
         $this->cantidad = $this->rs_grid->fields[6] ;  
         $this->cantidad = (string)$this->cantidad;  
         $this->banco = $this->rs_grid->fields[7] ;  
         $this->banco = (string)$this->banco;  
         $this->creado = $this->rs_grid->fields[8] ;  
         $this->idcaja = $this->rs_grid->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;  
         $this->jornada = $this->rs_grid->fields[10] ;  
         $this->detalle = $this->rs_grid->fields[11] ;  
         $this->documento = $this->rs_grid->fields[12] ;  
         $this->cierredia = $this->rs_grid->fields[13] ;  
         $this->rs_grid->fields[14] =  str_replace(",", ".", $this->rs_grid->fields[14]);  
         $this->totaldia = $this->rs_grid->fields[14] ;  
         $this->totaldia = (string)$this->totaldia;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->arqueo = $this->rs_grid->fields[15] ;  
         $this->arqueo = (string)$this->arqueo;  
         $this->rs_grid->fields[16] =  str_replace(",", ".", $this->rs_grid->fields[16]);  
         $this->saldo = $this->rs_grid->fields[16] ;  
         $this->saldo = (string)$this->saldo;  
         $this->resolucion = $this->rs_grid->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;  
         $this->idrc = $this->rs_grid->fields[18] ;  
         $this->idrc = (string)$this->idrc;  
         $this->idrp = $this->rs_grid->fields[19] ;  
         $this->idrp = (string)$this->idrp;  
         $this->ie = $this->rs_grid->fields[20] ;  
         $this->creado_inicio = $this->rs_grid->fields[21] ;  
         $this->creado_fin = $this->rs_grid->fields[22] ;  
         $this->cliente = $this->rs_grid->fields[23] ;  
         $this->cliente = (string)$this->cliente;  
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $fecha_orig = $this->fecha;
         $detalle_orig = $this->detalle;
         $nota_orig = $this->nota;
         $documento_orig = $this->documento;
         $resolucion_orig = $this->resolucion;
         $ie_orig = $this->ie;
         $banco_orig = $this->banco;
         $cliente_orig = $this->cliente;
         $GLOBALS["id_tercero"] = $this->rs_grid->fields[5] ;  
         $GLOBALS["banco"] = $this->rs_grid->fields[7] ;  
         $GLOBALS["resolucion"] = $this->rs_grid->fields[17] ;  
         $GLOBALS["idrc"] = $this->rs_grid->fields[18] ;  
         $GLOBALS["idrp"] = $this->rs_grid->fields[19] ;  
         $GLOBALS["cliente"] = $this->rs_grid->fields[23] ;  
         if (!isset($this->Res->array_total_documento[$documento_orig]))
         {
             $this->total = 0;
         }
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
         $seq_acum++;
         $this->total += $this->cantidad;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'][$seq_acum]['total'] = $this->total;
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = " = " . $this->cliente;
         $this->Lookup->lookup_id_tercero($this->id_tercero, $this->id_tercero) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco($this->GB_banco, $this->banco) ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_resolucion($this->GB_resolucion, $this->resolucion) ; 
         $this->GB_idrc = $this->idrc;
         $this->Lookup->lookup_idrc($this->GB_idrc, $this->idrc) ; 
         $this->GB_idrp = $this->idrp;
         $this->Lookup->lookup_idrp($this->GB_idrp, $this->idrp) ; 
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_cliente($this->GB_cliente, $this->cliente) ; 
         $conteudo_x =  $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
             $this->fecha = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_banco = $this->banco;
         nmgp_Form_Num_Val($this->GB_banco, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_resolucion = $this->resolucion;
         nmgp_Form_Num_Val($this->GB_resolucion, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_cliente = $this->cliente;
         nmgp_Form_Num_Val($this->GB_cliente, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->cantidad)), sc_strip_script($this->documento), sc_strip_script($documento_orig));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "documento")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['documento'] = $this->Res->array_total_documento;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php_detallle()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->total = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by fecha";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fecha = $this->rs_grid->fields[0] ;  
         $this->tipo = $this->rs_grid->fields[1] ;  
         $this->doc = $this->rs_grid->fields[2] ;  
         $this->nota = $this->rs_grid->fields[3] ;  
         $this->doc_pagado = $this->rs_grid->fields[4] ;  
         $this->id_tercero = $this->rs_grid->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;  
         $this->rs_grid->fields[6] =  str_replace(",", ".", $this->rs_grid->fields[6]);  
         $this->cantidad = $this->rs_grid->fields[6] ;  
         $this->cantidad = (string)$this->cantidad;  
         $this->banco = $this->rs_grid->fields[7] ;  
         $this->banco = (string)$this->banco;  
         $this->creado = $this->rs_grid->fields[8] ;  
         $this->idcaja = $this->rs_grid->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;  
         $this->jornada = $this->rs_grid->fields[10] ;  
         $this->detalle = $this->rs_grid->fields[11] ;  
         $this->documento = $this->rs_grid->fields[12] ;  
         $this->cierredia = $this->rs_grid->fields[13] ;  
         $this->rs_grid->fields[14] =  str_replace(",", ".", $this->rs_grid->fields[14]);  
         $this->totaldia = $this->rs_grid->fields[14] ;  
         $this->totaldia = (string)$this->totaldia;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->arqueo = $this->rs_grid->fields[15] ;  
         $this->arqueo = (string)$this->arqueo;  
         $this->rs_grid->fields[16] =  str_replace(",", ".", $this->rs_grid->fields[16]);  
         $this->saldo = $this->rs_grid->fields[16] ;  
         $this->saldo = (string)$this->saldo;  
         $this->resolucion = $this->rs_grid->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;  
         $this->idrc = $this->rs_grid->fields[18] ;  
         $this->idrc = (string)$this->idrc;  
         $this->idrp = $this->rs_grid->fields[19] ;  
         $this->idrp = (string)$this->idrp;  
         $this->ie = $this->rs_grid->fields[20] ;  
         $this->creado_inicio = $this->rs_grid->fields[21] ;  
         $this->creado_fin = $this->rs_grid->fields[22] ;  
         $this->cliente = $this->rs_grid->fields[23] ;  
         $this->cliente = (string)$this->cliente;  
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $fecha_orig = $this->fecha;
         $detalle_orig = $this->detalle;
         $nota_orig = $this->nota;
         $documento_orig = $this->documento;
         $resolucion_orig = $this->resolucion;
         $ie_orig = $this->ie;
         $banco_orig = $this->banco;
         $cliente_orig = $this->cliente;
         $GLOBALS["id_tercero"] = $this->rs_grid->fields[5] ;  
         $GLOBALS["banco"] = $this->rs_grid->fields[7] ;  
         $GLOBALS["resolucion"] = $this->rs_grid->fields[17] ;  
         $GLOBALS["idrc"] = $this->rs_grid->fields[18] ;  
         $GLOBALS["idrp"] = $this->rs_grid->fields[19] ;  
         $GLOBALS["cliente"] = $this->rs_grid->fields[23] ;  
         if (!isset($this->Res->array_total_detalle[$detalle_orig]))
         {
             $this->total = 0;
         }
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
         $seq_acum++;
         $this->total += $this->cantidad;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'][$seq_acum]['total'] = $this->total;
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = " = " . $this->cliente;
         $this->Lookup->lookup_id_tercero($this->id_tercero, $this->id_tercero) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco($this->GB_banco, $this->banco) ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_resolucion($this->GB_resolucion, $this->resolucion) ; 
         $this->GB_idrc = $this->idrc;
         $this->Lookup->lookup_idrc($this->GB_idrc, $this->idrc) ; 
         $this->GB_idrp = $this->idrp;
         $this->Lookup->lookup_idrp($this->GB_idrp, $this->idrp) ; 
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_cliente($this->GB_cliente, $this->cliente) ; 
         $conteudo_x =  $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
             $this->fecha = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_banco = $this->banco;
         nmgp_Form_Num_Val($this->GB_banco, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_resolucion = $this->resolucion;
         nmgp_Form_Num_Val($this->GB_resolucion, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_cliente = $this->cliente;
         nmgp_Form_Num_Val($this->GB_cliente, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->cantidad)), sc_strip_script($this->detalle), sc_strip_script($detalle_orig));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "detallle")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['arr_total']['detalle'] = $this->Res->array_total_detalle;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php__NM_SC_()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->total = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (substr(trim($nmgp_order_by), -1) == ",")
   {
       $nmgp_order_by = " " . substr(trim($nmgp_order_by), 0, -1);
   }
   if (trim($nmgp_order_by) == "order by")
   {
       $nmgp_order_by = "";
   }
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by fecha";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fecha = $this->rs_grid->fields[0] ;  
         $this->tipo = $this->rs_grid->fields[1] ;  
         $this->doc = $this->rs_grid->fields[2] ;  
         $this->nota = $this->rs_grid->fields[3] ;  
         $this->doc_pagado = $this->rs_grid->fields[4] ;  
         $this->id_tercero = $this->rs_grid->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;  
         $this->rs_grid->fields[6] =  str_replace(",", ".", $this->rs_grid->fields[6]);  
         $this->cantidad = $this->rs_grid->fields[6] ;  
         $this->cantidad = (string)$this->cantidad;  
         $this->banco = $this->rs_grid->fields[7] ;  
         $this->banco = (string)$this->banco;  
         $this->creado = $this->rs_grid->fields[8] ;  
         $this->idcaja = $this->rs_grid->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;  
         $this->jornada = $this->rs_grid->fields[10] ;  
         $this->detalle = $this->rs_grid->fields[11] ;  
         $this->documento = $this->rs_grid->fields[12] ;  
         $this->cierredia = $this->rs_grid->fields[13] ;  
         $this->rs_grid->fields[14] =  str_replace(",", ".", $this->rs_grid->fields[14]);  
         $this->totaldia = $this->rs_grid->fields[14] ;  
         $this->totaldia = (string)$this->totaldia;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->arqueo = $this->rs_grid->fields[15] ;  
         $this->arqueo = (string)$this->arqueo;  
         $this->rs_grid->fields[16] =  str_replace(",", ".", $this->rs_grid->fields[16]);  
         $this->saldo = $this->rs_grid->fields[16] ;  
         $this->saldo = (string)$this->saldo;  
         $this->resolucion = $this->rs_grid->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;  
         $this->idrc = $this->rs_grid->fields[18] ;  
         $this->idrc = (string)$this->idrc;  
         $this->idrp = $this->rs_grid->fields[19] ;  
         $this->idrp = (string)$this->idrp;  
         $this->ie = $this->rs_grid->fields[20] ;  
         $this->creado_inicio = $this->rs_grid->fields[21] ;  
         $this->creado_fin = $this->rs_grid->fields[22] ;  
         $this->cliente = $this->rs_grid->fields[23] ;  
         $this->cliente = (string)$this->cliente;  
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $fecha_orig = $this->fecha;
         $detalle_orig = $this->detalle;
         $nota_orig = $this->nota;
         $documento_orig = $this->documento;
         $resolucion_orig = $this->resolucion;
         $ie_orig = $this->ie;
         $banco_orig = $this->banco;
         $cliente_orig = $this->cliente;
         $GLOBALS["id_tercero"] = $this->rs_grid->fields[5] ;  
         $GLOBALS["banco"] = $this->rs_grid->fields[7] ;  
         $GLOBALS["resolucion"] = $this->rs_grid->fields[17] ;  
         $GLOBALS["idrc"] = $this->rs_grid->fields[18] ;  
         $GLOBALS["idrp"] = $this->rs_grid->fields[19] ;  
         $GLOBALS["cliente"] = $this->rs_grid->fields[23] ;  
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
         $seq_acum++;
         $this->total += $this->cantidad;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'][$seq_acum]['total'] = $this->total;
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = " = " . $this->cliente;
         $this->Lookup->lookup_id_tercero($this->id_tercero, $this->id_tercero) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco($this->GB_banco, $this->banco) ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_resolucion($this->GB_resolucion, $this->resolucion) ; 
         $this->GB_idrc = $this->idrc;
         $this->Lookup->lookup_idrc($this->GB_idrc, $this->idrc) ; 
         $this->GB_idrp = $this->idrp;
         $this->Lookup->lookup_idrp($this->GB_idrp, $this->idrp) ; 
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_cliente($this->GB_cliente, $this->cliente) ; 
         $conteudo_x =  $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
             $this->fecha = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_banco = $this->banco;
         nmgp_Form_Num_Val($this->GB_banco, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_resolucion = $this->resolucion;
         nmgp_Form_Num_Val($this->GB_resolucion, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_cliente = $this->cliente;
         nmgp_Form_Num_Val($this->GB_cliente, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->cantidad)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php_sc_free_total()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->total = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (substr(trim($nmgp_order_by), -1) == ",")
   {
       $nmgp_order_by = " " . substr(trim($nmgp_order_by), 0, -1);
   }
   if (trim($nmgp_order_by) == "order by")
   {
       $nmgp_order_by = "";
   }
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by fecha";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fecha = $this->rs_grid->fields[0] ;  
         $this->tipo = $this->rs_grid->fields[1] ;  
         $this->doc = $this->rs_grid->fields[2] ;  
         $this->nota = $this->rs_grid->fields[3] ;  
         $this->doc_pagado = $this->rs_grid->fields[4] ;  
         $this->id_tercero = $this->rs_grid->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;  
         $this->rs_grid->fields[6] =  str_replace(",", ".", $this->rs_grid->fields[6]);  
         $this->cantidad = $this->rs_grid->fields[6] ;  
         $this->cantidad = (string)$this->cantidad;  
         $this->banco = $this->rs_grid->fields[7] ;  
         $this->banco = (string)$this->banco;  
         $this->creado = $this->rs_grid->fields[8] ;  
         $this->idcaja = $this->rs_grid->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;  
         $this->jornada = $this->rs_grid->fields[10] ;  
         $this->detalle = $this->rs_grid->fields[11] ;  
         $this->documento = $this->rs_grid->fields[12] ;  
         $this->cierredia = $this->rs_grid->fields[13] ;  
         $this->rs_grid->fields[14] =  str_replace(",", ".", $this->rs_grid->fields[14]);  
         $this->totaldia = $this->rs_grid->fields[14] ;  
         $this->totaldia = (string)$this->totaldia;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->arqueo = $this->rs_grid->fields[15] ;  
         $this->arqueo = (string)$this->arqueo;  
         $this->rs_grid->fields[16] =  str_replace(",", ".", $this->rs_grid->fields[16]);  
         $this->saldo = $this->rs_grid->fields[16] ;  
         $this->saldo = (string)$this->saldo;  
         $this->resolucion = $this->rs_grid->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;  
         $this->idrc = $this->rs_grid->fields[18] ;  
         $this->idrc = (string)$this->idrc;  
         $this->idrp = $this->rs_grid->fields[19] ;  
         $this->idrp = (string)$this->idrp;  
         $this->ie = $this->rs_grid->fields[20] ;  
         $this->creado_inicio = $this->rs_grid->fields[21] ;  
         $this->creado_fin = $this->rs_grid->fields[22] ;  
         $this->cliente = $this->rs_grid->fields[23] ;  
         $this->cliente = (string)$this->cliente;  
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $fecha_orig = $this->fecha;
         $detalle_orig = $this->detalle;
         $nota_orig = $this->nota;
         $documento_orig = $this->documento;
         $resolucion_orig = $this->resolucion;
         $ie_orig = $this->ie;
         $banco_orig = $this->banco;
         $cliente_orig = $this->cliente;
         $GLOBALS["id_tercero"] = $this->rs_grid->fields[5] ;  
         $GLOBALS["banco"] = $this->rs_grid->fields[7] ;  
         $GLOBALS["resolucion"] = $this->rs_grid->fields[17] ;  
         $GLOBALS["idrc"] = $this->rs_grid->fields[18] ;  
         $GLOBALS["idrp"] = $this->rs_grid->fields[19] ;  
         $GLOBALS["cliente"] = $this->rs_grid->fields[23] ;  
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
         $seq_acum++;
         $this->total += $this->cantidad;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'][$seq_acum]['total'] = $this->total;
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = " = " . $this->cliente;
         $this->Lookup->lookup_id_tercero($this->id_tercero, $this->id_tercero) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco($this->GB_banco, $this->banco) ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_resolucion($this->GB_resolucion, $this->resolucion) ; 
         $this->GB_idrc = $this->idrc;
         $this->Lookup->lookup_idrc($this->GB_idrc, $this->idrc) ; 
         $this->GB_idrp = $this->idrp;
         $this->Lookup->lookup_idrp($this->GB_idrp, $this->idrp) ; 
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_cliente($this->GB_cliente, $this->cliente) ; 
         $conteudo_x =  $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
             $this->fecha = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_banco = $this->banco;
         nmgp_Form_Num_Val($this->GB_banco, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_resolucion = $this->resolucion;
         nmgp_Form_Num_Val($this->GB_resolucion, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_cliente = $this->cliente;
         nmgp_Form_Num_Val($this->GB_cliente, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro();
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }


   function totaliza_php_ie()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      $seq_acum = 0;
      $this->total = 0;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'] = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT convert(char(23),fecha,121), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, TO_DATE(TO_CHAR(creado_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(creado_fin, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      else 
      { 
         $nmgp_select = "SELECT fecha, tipo, doc, nota, doc_pagado, id_tercero, cantidad, banco, creado, idcaja, jornada, detalle, documento, cierredia, totaldia, arqueo, saldo, resolucion, idrc, idrp, ie, creado_inicio, creado_fin, cliente from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (substr(trim($nmgp_order_by), -1) == ",")
   {
       $nmgp_order_by = " " . substr(trim($nmgp_order_by), 0, -1);
   }
   if (trim($nmgp_order_by) == "order by")
   {
       $nmgp_order_by = "";
   }
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by fecha";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->fecha = $this->rs_grid->fields[0] ;  
         $this->tipo = $this->rs_grid->fields[1] ;  
         $this->doc = $this->rs_grid->fields[2] ;  
         $this->nota = $this->rs_grid->fields[3] ;  
         $this->doc_pagado = $this->rs_grid->fields[4] ;  
         $this->id_tercero = $this->rs_grid->fields[5] ;  
         $this->id_tercero = (string)$this->id_tercero;  
         $this->rs_grid->fields[6] =  str_replace(",", ".", $this->rs_grid->fields[6]);  
         $this->cantidad = $this->rs_grid->fields[6] ;  
         $this->cantidad = (string)$this->cantidad;  
         $this->banco = $this->rs_grid->fields[7] ;  
         $this->banco = (string)$this->banco;  
         $this->creado = $this->rs_grid->fields[8] ;  
         $this->idcaja = $this->rs_grid->fields[9] ;  
         $this->idcaja = (string)$this->idcaja;  
         $this->jornada = $this->rs_grid->fields[10] ;  
         $this->detalle = $this->rs_grid->fields[11] ;  
         $this->documento = $this->rs_grid->fields[12] ;  
         $this->cierredia = $this->rs_grid->fields[13] ;  
         $this->rs_grid->fields[14] =  str_replace(",", ".", $this->rs_grid->fields[14]);  
         $this->totaldia = $this->rs_grid->fields[14] ;  
         $this->totaldia = (string)$this->totaldia;  
         $this->rs_grid->fields[15] =  str_replace(",", ".", $this->rs_grid->fields[15]);  
         $this->arqueo = $this->rs_grid->fields[15] ;  
         $this->arqueo = (string)$this->arqueo;  
         $this->rs_grid->fields[16] =  str_replace(",", ".", $this->rs_grid->fields[16]);  
         $this->saldo = $this->rs_grid->fields[16] ;  
         $this->saldo = (string)$this->saldo;  
         $this->resolucion = $this->rs_grid->fields[17] ;  
         $this->resolucion = (string)$this->resolucion;  
         $this->idrc = $this->rs_grid->fields[18] ;  
         $this->idrc = (string)$this->idrc;  
         $this->idrp = $this->rs_grid->fields[19] ;  
         $this->idrp = (string)$this->idrp;  
         $this->ie = $this->rs_grid->fields[20] ;  
         $this->creado_inicio = $this->rs_grid->fields[21] ;  
         $this->creado_fin = $this->rs_grid->fields[22] ;  
         $this->cliente = $this->rs_grid->fields[23] ;  
         $this->cliente = (string)$this->cliente;  
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig']))
         {
             foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_orig'] as $Cmp_clone => $Cmp_orig)
             {
                 $this->$Cmp_clone = $this->$Cmp_orig;
             }
         }
         $fecha_orig = $this->fecha;
         $detalle_orig = $this->detalle;
         $nota_orig = $this->nota;
         $documento_orig = $this->documento;
         $resolucion_orig = $this->resolucion;
         $ie_orig = $this->ie;
         $banco_orig = $this->banco;
         $cliente_orig = $this->cliente;
         $GLOBALS["id_tercero"] = $this->rs_grid->fields[5] ;  
         $GLOBALS["banco"] = $this->rs_grid->fields[7] ;  
         $GLOBALS["resolucion"] = $this->rs_grid->fields[17] ;  
         $GLOBALS["idrc"] = $this->rs_grid->fields[18] ;  
         $GLOBALS["idrp"] = $this->rs_grid->fields[19] ;  
         $GLOBALS["cliente"] = $this->rs_grid->fields[23] ;  
         $_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'on';
 
$sql = "SELECT tipodoc FROM caja WHERE idcaja = '".$this->idcaja ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]=='FV')
		{
		$this->tipo  = 'INGRESO A CAJA';
		}
	if($this->dt[0][0]=='NC')
		{
		$this->tipo  = 'EGRESO DE CAJA';
		}
	}
$_SESSION['scriptcase']['grid_caja']['contr_erro'] = 'off';
         $seq_acum++;
         $this->total += $this->cantidad;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_acumalado'][$seq_acum]['total'] = $this->total;
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->arg_sum_fecha = " = " . $this->Db->qstr($this->fecha);
         $this->arg_sum_nota = " = " . $this->Db->qstr($this->nota);
         $this->arg_sum_banco = " = " . $this->banco;
         $this->arg_sum_detalle = " = " . $this->Db->qstr($this->detalle);
         $this->arg_sum_documento = " = " . $this->Db->qstr($this->documento);
         $this->arg_sum_resolucion = " = " . $this->resolucion;
         $this->arg_sum_ie = " = " . $this->Db->qstr($this->ie);
         $this->arg_sum_cliente = " = " . $this->cliente;
         $this->Lookup->lookup_id_tercero($this->id_tercero, $this->id_tercero) ; 
         $this->GB_banco = $this->banco;
         $this->Lookup->lookup_banco($this->GB_banco, $this->banco) ; 
         $this->GB_resolucion = $this->resolucion;
         $this->Lookup->lookup_resolucion($this->GB_resolucion, $this->resolucion) ; 
         $this->GB_idrc = $this->idrc;
         $this->Lookup->lookup_idrc($this->GB_idrc, $this->idrc) ; 
         $this->GB_idrp = $this->idrp;
         $this->Lookup->lookup_idrp($this->GB_idrp, $this->idrp) ; 
         $this->GB_cliente = $this->cliente;
         $this->Lookup->lookup_cliente($this->GB_cliente, $this->cliente) ; 
         $conteudo_x =  $this->fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
             $this->fecha = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_banco = $this->banco;
         nmgp_Form_Num_Val($this->GB_banco, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_resolucion = $this->resolucion;
         nmgp_Form_Num_Val($this->GB_resolucion, "", "", "0", "", "", "", "N:", "") ; 
         $this->GB_cliente = $this->cliente;
         nmgp_Form_Num_Val($this->GB_cliente, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro();
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_caja"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }

   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja'][$path_doc_md5][1] = $this->Tit_doc;
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
<SCRIPT>
    window.location='<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo; ?>';
</SCRIPT>
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
